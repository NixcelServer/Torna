<?php

namespace App\Http\Controllers;

use App\Models\CompanyDetail;
use App\Models\UserDetail;
use App\Models\Document;
use App\Models\ProductDetail;
use App\Models\Industry;
use Illuminate\Support\Facades\Date;
use App\Helpers\EncryptionDecryptionHelper;
use App\Models\ExhibitionDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class ExhibitionController extends Controller
{
    public function updateStatus(Request $request)
    {
        //dd($request);
        $companyName = $request->input('companyName');
        $compId = $request->input('compId');
        $email = $request->input('email');
        $contactNo = $request->input('contactNo');
        $activeStatus = $request->input('activeStatus');

        // Update the active_status in your database based on the provided data
        $company = CompanyDetail::where('tbl_comp_id', $compId)
            ->where('company_name', $companyName)
            ->where('email', $email)
            ->where('contact_no', $contactNo)
            ->update(['active_status' => $activeStatus]);

        $user = UserDetail::where('tbl_comp_id', $compId)
            ->where('email', $email)
            ->where('contact_no', $contactNo)
            ->update(['active_status' => $activeStatus]);

        return response()->json(['message' => 'Status updated successfully'], 200);
    }
    public function approvedorgcount()
    {
        $companies = UserDetail::where('active_status', 'Approved')->where('role_id', 2)->get();

        foreach ($companies as $company) {
            $company->company_name = CompanyDetail::where('tbl_comp_id', $company->tbl_comp_id)->value('company_name');
        }
        return view('AdminPages/ApprovedOrgList', ['companies' => $companies]);
    }

    public function unapprovedorgcount()
    {

        $companies = UserDetail::where('active_status', 'Pending')->where('role_id', 2)->get();

        foreach ($companies as $company) {
            $company->company_name = CompanyDetail::where('tbl_comp_id', $company->tbl_comp_id)->value('company_name');
        }

        return view('AdminPages/UnApprovedOrgList', ['companies' => $companies]);
    }

    public function approvedexcount()
    {
        $companies = UserDetail::where('active_status', 'Approved')->where('role_id', 3)->get();

        foreach ($companies as $company) {
            $company->company_name = CompanyDetail::where('tbl_comp_id', $company->tbl_comp_id)->value('company_name');
        }
        return view('AdminPages/ApprovedExList', ['companies' => $companies]);
    }

    public function unapprovedexcount()
    {
        $companies = UserDetail::where('active_status', 'Pending')->where('role_id', 3)->get();

        foreach ($companies as $company) {
            $company->company_name = CompanyDetail::where('tbl_comp_id', $company->tbl_comp_id)->value('company_name');
        }

        return view('AdminPages/UnApprovedExList', ['companies' => $companies]);
    }
    public function rejectedorgcount()
    {
        $companies = UserDetail::where('active_status', 'Rejected')->where('role_id', 2)->get();

        foreach ($companies as $company) {
            $company->company_name = CompanyDetail::where('tbl_comp_id', $company->tbl_comp_id)->value('company_name');
        }
        return view('AdminPages/RejectedOrgList', ['companies' => $companies]);
    }
    public function rejectedexcount()
    {
        $companies = UserDetail::where('active_status', 'Rejected')->where('role_id', 3)->get();

        foreach ($companies as $company) {
            $company->company_name = CompanyDetail::where('tbl_comp_id', $company->tbl_comp_id)->value('company_name');
        }
        return view('AdminPages/RejectedExList', ['companies' => $companies]);
    }
    public function exdashboard()
    {
        return view('ExhibitorPages/ExDashboard');
    }
    public function orgdashboard()
    {
        return view('OrganizerPages/OrgDashboard');
    }
    public function industrymaster()
    {
        // $industries = Industry::all();
        $industries = Industry::where('flag', 'show')->get();

        foreach ($industries as $industry) {
            $industry->enc_id = EncryptionDecryptionHelper::encdecId($industry->tbl_industry_id, 'encrypt');
            $industry->count = CompanyDetail::where('industry_name',$industry->industry_name)->count();
        }
        
        return view('AdminPages/IndustryDashboard', ['industries' => $industries]);
    }


    public function storeindustrydetails(Request $request)
    {



        $user = session('user');
        $user_id = $user->tbl_user_id;

        $industry = new Industry;
        $industry->industry_name = $request->industryName;
        $industry->created_date = Date::now()->toDateString();
        $industry->created_time = Date::now()->toTimeString();
        $industry->flag = "show";
        $industry->save();


        return redirect('/industrymaster');
    }

    public function deleteindustry($enc_id)
    {

        //get the industry details from db and set the flag as deleted
        $user_details = session('user');
        $action = 'decrypt';
        $dec_id = EncryptionDecryptionHelper::encdecId($enc_id, $action);

        $industry = Industry::findOrFail($dec_id);
        

        $assignedIndCount = CompanyDetail::where('industry_name',$industry->industry_name)->count();

        if($assignedIndCount>0){
            // Return a response indicating that it cannot be deleted
        return response()->json(['message' => 'Cannot delete industry because it is assigned to a company'], 400);
        }
        

        $industry->flag = "deleted";
        $industry->save();

        return redirect('/industrymaster');
    }

    public function createExhibitionform()
    {
        
        // $user = session('user');
       
        // $first_name = $user->first_name;
        

        $industries = Industry::where('flag', 'show')->get();

        foreach ($industries as $industry) {
            $industry->encIndId = EncryptionDecryptionHelper::encdecId($industry->tbl_industry_id, 'encrypt');
        }
        // dd($industries);
        return view('OrganizerPages/CreateExhibitionForm', ['industries' => $industries]);
    }
    public function StoreExhibitionForm(Request $request)
    {
        // Create a new exhibition using the validated data
        $user = session('user');

        $exhibition = new ExhibitionDetail();
        $exhibition->tbl_comp_id = $user->tbl_comp_id;
        $exhibition->unique_name = $request->unique_name;
        $exhibition->exhibition_name = $request->exhibition_name;
        $exhibition->from_date = $request->from_date;
        $exhibition->to_date = $request->to_date;
        $exhibition->start_time = $request->start_time;
        $exhibition->end_time = $request->end_time;
        $exhibition->venue = $request->venue;
        $exhibition->organized_by = $request->organized_by;
        $exhibition->notify_by = $request->notify_by;
        $exhibition->industry = $request->industry_name;

        // Handle company logo upload if a file was uploaded
        if ($request->hasFile('company_logo')) {
            $image = $request->file('company_logo');
            $base64Image = base64_encode(file_get_contents($image->path())); // Convert the image to base64
            $exhibition->company_logo = $base64Image; // Save the base64 encoded image to the company_logo column
        }

        try {
            $exhibition->save();
        } catch (\Illuminate\Database\QueryException $e) {
            // Handle the exception (e.g., log error, display message)
            dd($e->getMessage()); // Dump the error message for debugging
        }

        return redirect()->route('OrgDashboard')->with('success', 'Exhibition created successfully!');
    }

    public function activeExhibitions()
    {
        $activeExs = ExhibitionDetail::where('active_status', 'Active')->where('flag', 'show')->get();


        // dd($activeExs);
        foreach ($activeExs as $activeEx) {
            $activeEx->encActiveExId = EncryptionDecryptionHelper::encdecId($activeEx->tbl_ex_id, 'encrypt');
        }

        return view('OrganizerPages/activeExhibitions', ['activeExs' => $activeExs]);
    }

    public function updateExStatus($id)
    {

        $decExId = EncryptionDecryptionHelper::encdecId($id, 'decrypt');
        $ex = ExhibitionDetail::where('tbl_ex_id', $decExId)->first();

        $ex->active_status = 'Inactive';
        $ex->save();

        // $companyName = $request->input('companyName');
        // $compId = $request->input('compId');
        // $email = $request->input('email');
        // $contactNo = $request->input('contactNo');
        // $activeStatus = $request->input('activeStatus');

        // // Update the active_status in your database based on the provided data
        // $company = CompanyDetail::where('tbl_comp_id', $compId)
        //     ->where('company_name', $companyName)
        //     ->where('email', $email)
        //     ->where('contact_no', $contactNo)
        //     ->update(['active_status' => $activeStatus]);

        // $user = UserDetail::where('tbl_comp_id', $compId)
        //     ->where('email', $email)
        //     ->where('contact_no', $contactNo)
        //     ->update(['active_status' => $activeStatus]);

        return redirect()->back();
    }


    public function InactiveExhibitions()
    {
        $inActiveExs = ExhibitionDetail::where('active_status', 'Inactive')->where('flag', 'show')->get();



        foreach ($inActiveExs as $inActiveEx) {
            $inActiveEx->encInActiveExId = EncryptionDecryptionHelper::encdecId($inActiveEx->tbl_ex_id, 'encrypt');
        }

        return view('OrganizerPages/InactiveExhibitions', ['inActiveExs' => $inActiveExs]);
    }

    public function products()
    {
        $products = ProductDetail::all();

        foreach ($products as $product) {
            $product->encProductId = EncryptionDecryptionHelper::encdecId($product->tbl_prod_id, 'encrypt');
        }
        return view('ExhibitorPages/products', ['products' => $products]);
    }
    public function documents()
    {
        $documents = Document::all();

        foreach ($documents as $document) {
            $document->encDocumentId = EncryptionDecryptionHelper::encdecId($document->tbl_doc_id, 'encrypt');
            $document->document_content = base64_encode($document->document_attachment);
            
        }
       // dd($documents);
        
        return view('ExhibitorPages/documents', ['documents' => $documents]);
    }




    public function storeproductdetails(Request $request)
    {


        // Get the logged-in user's ID from the session
        $userDetails = Session::get('user');
       // dd($userDetails);
         $companyId = CompanyDetail::where('tbl_comp_id',$userDetails->tbl_comp_id)->value('tbl_comp_id');
        // Create a new instance of the ProductDetail model
        $product = new ProductDetail;
        // Assign values from the request
        $product->tbl_comp_id = $companyId;
        $product->product_name = $request->productName;
        $product->created_by = $userDetails->tbl_user_id;
        $product->created_date = Date::now()->toDateString();
        $product->created_time = Date::now()->toTimeString();
        $product->flag = 'show'; // Assuming 'Show' is the default value for 'flag'
        
        // Save the product details
        $product->save();

        // Redirect back to the products page
        return redirect('/products');
    }

    public function storedocuments(Request $request)
    {
        //dd($request);
        // Assuming you have user authentication and you're retrieving the user ID from the session
        //$user_id = Session::get('user')->tbl_user_id;

        // Create a new Document instance
        $document = new Document;

        // Fill the document details from the request
        $document->doc_name = $request->documentName;
        $document->created_date = Date::now()->toDateString();
        $document->created_time = Date::now()->toTimeString();
        $document->flag = 'show'; // Assuming default flag is Show

        // Handle document attachment upload
        // if ($request->hasFile('document_attachment')) {
        //     $image = $request->file('document_attachment');
        //     $base64Image = base64_encode(file_get_contents($image->path())); // Convert the image to base64
        //     $document->document_attachment = $base64Image; // Save the base64 encoded image to the company_logo column
        // }
        if ($request->hasFile('file')) {
            $file = $request->file('file');

            
            // Get the file contents as binary data
            $binaryData = file_get_contents($file->path());

            // dd($binaryData);

            // Store the binary data in the document_attachment column
            $document->document_attachment = $binaryData;
        }

        //dd($document);
        try {
            $document->save();
        } catch (\Illuminate\Database\QueryException $e) {
            // Handle the exception (e.g., log error, display message)
            dd($e->getMessage()); // Dump the error message for debugging
        }

        return redirect('/documents')->with('success', 'Document created successfully');
    }

    public function upcomingExhibitions()
    {
        $user = session('user');

        $company = CompanyDetail::where('tbl_comp_id', $user->tbl_comp_id)->first();

        // $industry_name = $company->industry_name;
        // dd($industry_name);
        $upcomingExs = ExhibitionDetail::where('active_status', 'Active')->where('industry', $company->industry_name)->where('flag', 'show')->get();



        foreach ($upcomingExs as $upcomingEx) {
            $upcomingEx->encInActiveExId = EncryptionDecryptionHelper::encdecId($upcomingEx->tbl_ex_id, 'encrypt');
        }



        return view('ExhibitorPages/upcomingExhibitions', ['upcomingExs' => $upcomingExs]);
    }


    public function pastExhibitions()
    {

        $user = session('user');
        $company = CompanyDetail::where('tbl_comp_id', $user->tbl_comp_id)->first();
        // $industry_name = $company->industry_name;
        // dd($industry_name);
        $pastcomingExs = ExhibitionDetail::where('active_status', 'Inactive')->where('industry', $company->industry_name)->where('flag', 'show')->get();
        //dd($pastcomingExs);


        foreach ($pastcomingExs as $pastcomingEx) {
            $pastcomingEx->encInActiveExId = EncryptionDecryptionHelper::encdecId($pastcomingEx->tbl_ex_id, 'encrypt');
        }



        return view('ExhibitorPages/pastExhibitions', ['pastcomingExs' => $pastcomingExs]);
    }
}
