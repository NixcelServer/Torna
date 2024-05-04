<?php

namespace App\Http\Controllers;

use App\Models\CompanyDetail;
use App\Models\UserDetail;
use App\Models\Document;
use App\Models\ProductDetail;
use App\Models\Industry;
use App\Models\AssignProduct;
use App\Models\Participate;
use App\Models\Visitor;
use App\Models\Notify;
use App\Models\EmailSetting;
use App\Models\SMSSetting;



use Illuminate\Support\Facades\Date;
use App\Helpers\EncryptionDecryptionHelper;
use App\Helpers\EmailHelper;

use App\Helpers\AuditLogHelper;

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

            //AuditLogHelper::logDetails('update exhibition status to active', $user->tbl_user_id);

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
            $companyDetails = CompanyDetail::where('tbl_comp_id', $company->tbl_comp_id)->first();
            $company->company_name = $companyDetails->company_name;
            $company->company_logo = $companyDetails->company_logo; // Assuming company_logo is stored as a base64 string
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

    public function industrymasterO()
    {
        // $industries = Industry::all();
        $industries = Industry::where('flag', 'show')->get();

    foreach ($industries as $industry) {
        $industry->enc_id = EncryptionDecryptionHelper::encdecId($industry->tbl_industry_id, 'encrypt');

        // Check if the industry was created by a user with role_id = 1 (admin)
        if ($industry->created_by == 1) {
            $industry->delete_disabled = true; // Add a delete_disabled attribute
        } else {
            $industry->delete_disabled = false; // Add a delete_disabled attribute
        }
    }
        return view('OrganizerPages/industrymasterO', ['industries' => $industries]);
    }


    


    public function storeindustrydetails(Request $request)
    {



        $user = session('user');
        $user_id = $user->tbl_user_id;

        $industry = new Industry;
        $industry->industry_name = $request->industryName;
        $industry->created_date = Date::now()->toDateString();
        $industry->created_time = Date::now()->toTimeString();
        $industry->created_by = $user->role_id;
        $industry->flag = "show";
        $industry->save();

        AuditLogHelper::logDetails('created '.$request->industryName . ' industry', $user->tbl_user_id);


        return redirect('/industrymaster');
    }
    public function storeindustrydetailso(Request $request)
    {



        $user = session('user');
        $user_id = $user->tbl_user_id;

        $industry = new Industry;
        $industry->industry_name = $request->industryName;
        $industry->created_date = Date::now()->toDateString();
        $industry->created_time = Date::now()->toTimeString();
        $industry->flag = "show";
        $industry->save();

        AuditLogHelper::logDetails('created '.$request->industryName . ' industry', $user->tbl_user_id);


        return redirect('/industrymasterO');
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

        AuditLogHelper::logDetails('deleted ' .$industry->industy_name. ' industry', $user_details->tbl_user_id);

        return redirect('/industrymaster');
    }
    public function deleteindustryo($enc_id)
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

        AuditLogHelper::logDetails('deleted ' .$industry->industy_name. ' industry', $user_details->tbl_user_id);

        return redirect('/industrymasterO');
    }
    public function deleteproduct($enc_id)
    {

        //dd("hi");
        //get the industry details from db and set the flag as deleted
        $user_details = session('user');
        $action = 'decrypt';
        $dec_id = EncryptionDecryptionHelper::encdecId($enc_id, $action);

        $product = ProductDetail::findOrFail($dec_id);

        $assignedProdCount = AssignProduct::where('tbl_product_id',$product->tbl_product_id)->count();

        if($assignedProdCount>0){
            // Return a response indicating that it cannot be deleted
        return response()->json(['message' => 'Cannot delete Product because it is assigned to a document'], 400);
        }

        $product->flag = "deleted";

        $product->save();
        AuditLogHelper::logDetails('deleted ' .$product->product_name . 'product', $user_details->tbl_user_id);
        return redirect('/products');
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
        //dd($request);
        // Create a new exhibition using the validated data
        $user = session('user');
        //$company = CompanyDetail::where('tbl_user_id',$user->tbl_user_id)->first();

        $exhibition = new ExhibitionDetail();
        $exhibition->tbl_comp_id = $user->tbl_comp_id;
        //$exhibition->unique_name = $request->unique_name;
        $exhibition->exhibition_name = $request->exhibition_name;
       // $exhibition->ex_organized_by = $company->company_name;
        $exhibition->from_date = $request->from_date;
        $exhibition->to_date = $request->to_date;
        $exhibition->start_time = $request->start_time;
        $exhibition->end_time = $request->end_time;
        $exhibition->venue = $request->venue;
        //$exhibition->organized_by = $request->organized_by;
        //$exhibition->notify_by = $request->notify_by;
        $exhibition->industry = $request->industry_name;
        
        $exhibition->active_status = $request->active_status;
        $exhibition->created_by = $user->tbl_user_id;
        $exhibition->created_date = Date::now()->toDateString();
        $exhibition->created_time = Date::now()->toTimeString();
       // $exhibition->exhibition_website = $request->exhibition_website;
        //$exhibition->attach_document = $request->attach_document;
        //$exhibition->registration_url = $request->registration_url;

        


        // Handle company logo upload if a file was uploaded
        // if ($request->hasFile('company_logo')) {
        //     $image = $request->file('company_logo');
        //     $base64Image = base64_encode(file_get_contents($image->path())); // Convert the image to base64
        //     $exhibition->company_logo = $base64Image; // Save the base64 encoded image to the company_logo column
        // }
        if ($request->hasFile('company_logo')) {
            $image = $request->file('company_logo');
            $imagePath = $image->store('company_logos'); // Save the image and get the path
            $exhibition->company_logo = $imagePath; // Save the image path to the company_logo column
        }
        

        try {
            $exhibition->save();
        } catch (\Illuminate\Database\QueryException $e) {
            // Handle the exception (e.g., log error, display message)
            dd($e->getMessage()); // Dump the error message for debugging
        }

        AuditLogHelper::logDetails('created ' . $exhibition->ex_name . ' exhibition', $user->tbl_user_id);

        return redirect()->route('activeExhibitions')->with('success', 'Exhibition created successfully!');
    }
    public function storeExhibitionformE(Request $request)
    {
        //dd($request);
        // Create a new exhibition using the validated data
        $user = session('user');
        //$company = CompanyDetail::where('tbl_user_id',$user->tbl_user_id)->first();

        $exhibition = new ExhibitionDetail();
        $exhibition->tbl_comp_id = $user->tbl_comp_id;
        //$exhibition->unique_name = $request->unique_name;
        $exhibition->exhibition_name = $request->exhibition_name;
       // $exhibition->ex_organized_by = $company->company_name;
        $exhibition->from_date = $request->from_date;
        $exhibition->to_date = $request->to_date;
        $exhibition->start_time = $request->start_time;
        $exhibition->end_time = $request->end_time;
        $exhibition->venue = $request->venue;
        //$exhibition->organized_by = $request->organized_by;
        //$exhibition->notify_by = $request->notify_by;
        $exhibition->industry = $request->industry_name;
        
        $exhibition->active_status = $request->active_status;
        $exhibition->created_by = $user->tbl_user_id;
        $exhibition->created_date = Date::now()->toDateString();
        $exhibition->created_time = Date::now()->toTimeString();
       // $exhibition->exhibition_website = $request->exhibition_website;
        //$exhibition->attach_document = $request->attach_document;
        //$exhibition->registration_url = $request->registration_url;

        


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

        AuditLogHelper::logDetails('created ' . $exhibition->ex_name . ' exhibition', $user->tbl_user_id);

        return redirect()->route('upcomingExhibitions')->with('success', 'Exhibition created successfully!');
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

        $user->session('user');
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

        AuditLogHelper::logDetails('update ' .$exhibition->exhibition_name . ' to inactive', $user->tbl_user_id);

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
        $products = ProductDetail::where('flag','show')->get();

        foreach ($products as $product) {
            $product->encProductId = EncryptionDecryptionHelper::encdecId($product->tbl_product_id, 'encrypt');
            $product->assignedProdCount = AssignProduct::where('tbl_product_id',$product->tbl_product_id)->count();
        }
        //dd($products);
        return view('ExhibitorPages/products', ['products' => $products]);
    }
    public function documents()
    {
        $documents = Document::where('flag','show')->get();

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

        AuditLogHelper::logDetails('created ' .$product->product_name . ' product', $userDetails->tbl_user_id);

        // Redirect back to the products page
        return redirect('/products');
    }

    public function storedocuments(Request $request)
    {
        $user = session('user');
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
            AuditLogHelper::logDetails('created ' .$document->doc_name. 'document', $user->tbl_user_id);

        } catch (\Illuminate\Database\QueryException $e) {
            // Handle the exception (e.g., log error, display message)
            dd($e->getMessage()); // Dump the error message for debugging
        }

        return redirect('/documents')->with('success', 'Document created successfully');
        
    }

    public function deleteDocument($id)
    {
        // //get the industry details from db and set the flag as deleted
         $user = session('user');
        
         $decDocId = EncryptionDecryptionHelper::encdecId($id, 'decrypt');
        
         $doc = Document::findOrFail($decDocId);
         $doc->flag = 'deleted';
         $doc->updated_by = $user->tbl_user_id;
         $doc->updated_date = Date::now()->toDateString();
         $doc->updated_time = Date::now()->toTimeString();
         $doc->save();   
        

        

         AuditLogHelper::logDetails('deleted ' .$doc->doc_name. ' document', $user->tbl_user_id);

         return redirect()->back();

    }

    public function upcomingExhibitions()
    {
        $user = session('user');

        $company = CompanyDetail::where('tbl_comp_id', $user->tbl_comp_id)->first();

        // $industry_name = $company->industry_name;
        // dd($industry_name);
        $upcomingExs = ExhibitionDetail::where('active_status', 'Active')->where('industry', $company->industry_name)->where('flag', 'show')->get();



        foreach ($upcomingExs as $upcomingEx) {
            $upcomingEx->encExId = EncryptionDecryptionHelper::encdecId($upcomingEx->tbl_ex_id, 'encrypt');
            $upcomingEx->participated = Participate::where('tbl_ex_id', $upcomingEx->tbl_ex_id)->where('tbl_user_id', $user->tbl_user_id)->exists();
                }

        

        return view('ExhibitorPages/upcomingExhibitions', ['upcomingExs' => $upcomingExs]);
    }
    public function upcomingExhibitionsO()
    {
        $user = session('user');

        $company = CompanyDetail::where('tbl_comp_id', $user->tbl_comp_id)->first();

        // $industry_name = $company->industry_name;
        // dd($industry_name);
        $upcomingExs = ExhibitionDetail::where('active_status', 'Active')->where('industry', $company->industry_name)->where('flag', 'Show')->get();



        foreach ($upcomingExs as $upcomingEx) {
            $upcomingEx->encExId = EncryptionDecryptionHelper::encdecId($upcomingEx->tbl_ex_id, 'encrypt');
        }

        

        return view('OrganizerPages/upcomingExhibitionsO', ['upcomingExs' => $upcomingExs]);
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


   

    public function createExhibitionformE(){
        $industries = Industry::where('flag', 'show')->get();

        foreach ($industries as $industry) {
            $industry->encIndId = EncryptionDecryptionHelper::encdecId($industry->tbl_industry_id, 'encrypt');
        }

        return view('ExhibitorPages/createExhibitionformE', ['industries' => $industries]);
   }

   public function companysetupform()
   {
    $user = session('user');
    $company = CompanyDetail::where('tbl_comp_id',$user->tbl_comp_id)->first();
    $company->encCompId = EncryptionDecryptionHelper::encdecId($company->tbl_comp_id, 'encrypt');
    unset($company->tbl_comp_id);
    
    $industries = Industry::where('flag', 'show')->get();

        foreach ($industries as $industry) {
            $industry->enc_id = EncryptionDecryptionHelper::encdecId($industry->tbl_industry_id, 'encrypt');
           // $industry->count = CompanyDetail::where('industry_name',$industry->industry_name)->count();
        }
    
    return view('ExhibitorPages/companysetupform',['industries'=>$industries,'company'=>$company]);
    }


public function companysetupformo()
{
    $user = session('user');
    $company = CompanyDetail::where('tbl_comp_id',$user->tbl_comp_id)->first();
    $company->encCompId = EncryptionDecryptionHelper::encdecId($company->tbl_comp_id, 'encrypt');
    unset($company->tbl_comp_id);
    
    $industries = Industry::where('flag', 'show')->get();

        foreach ($industries as $industry) {
            $industry->enc_id = EncryptionDecryptionHelper::encdecId($industry->tbl_industry_id, 'encrypt');
           // $industry->count = CompanyDetail::where('industry_name',$industry->industry_name)->count();
        }
    //dd($company);
    return view('OrganizerPages/companysetupformo',['industries'=>$industries,'company'=>$company]);
    }

    

    public function assignProducts($encDocumentId)
    {
        
        $decDocumentId=EncryptionDecryptionHelper::encdecId($encDocumentId,'decrypt');
        
        $document = Document::where('tbl_doc_id', EncryptionDecryptionHelper::encdecId($encDocumentId,'decrypt'))->first();
       //unset($document->tbl_document_id);
        $document->encDocumentId = $encDocumentId;

        $products = ProductDetail::where('flag','show')->get();
        foreach($products as $product){
            $product->encProdId = EncryptionDecryptionHelper::encdecId($product->tbl_product_id,'encrypt');
            //unset($product->tbl_product_id,$product->created_by,$product->updated_by);
        }
        

        $assignedProds = AssignProduct::where('tbl_doc_id', $decDocumentId)->where('flag','show')->get(); 
        
        foreach($assignedProds as $assignedProd){
            $productDetails = ProductDetail::where('tbl_product_id', $assignedProd->tbl_product_id)->where('flag','show')->first();
    
           if($productDetails){
            // Attach the product name to the assigned product model
            $assignedProd->product_name = $productDetails->product_name;

            $assignedProd->encAssignedProdId = EncryptionDecryptionHelper::encdecId($assignedProd->tbl_assigned_prod_id,'encrypt');
           }

            
        }
        
            
        return view('ExhibitorPages.assignproducts',['document'=>$document,'products'=>$products,'assignedProds'=>$assignedProds]);
   }

    
        


   public function assignProd(Request $request)
   {
    
    $userDetails = session('user');
    $assignProd = new AssignProduct;
    $assignProd->tbl_doc_id = EncryptionDecryptionHelper::encdecId($request->encDocumentId,'decrypt');
    $assignProd->tbl_product_id = EncryptionDecryptionHelper::encdecId($request->encProductId,'decrypt');
    $assignProd->created_by = $userDetails->tbl_user_id;
    $assignProd->created_date = Date::now()->toDateString();
    $assignProd->created_time = Date::now()->toTimeString();
    $assignProd->save();

    AuditLogHelper::logDetails('assigned Product with prod ID ' .$assignProd->tbl_product_id . ' to Document ID'.$assignProd->tbl_doc_id.' ', $userDetails->tbl_user_id);

    
    return redirect()->back();
    
   }

   public function deleteAssignedProducts($id)
   {
    $userDetails = session('user');

    $decAssignedProdId = EncryptionDecryptionHelper::encdecId($id,'decrypt');
    
    $assignedProd = AssignProduct::where('tbl_assigned_prod_id',$decAssignedProdId)->first();
    $assignedProd->flag = 'deleted';
    $assignedProd->deleted_by = $userDetails->tbl_user_id;
    $assignedProd->deleted_date = Date::now()->toDateString();
    $assignedProd->deleted_time = Date::now()->toTimeString();
    $assignedProd->save();

    AuditLogHelper::logDetails('deleted assigned Product with ID ' .$decAssignedProdId . '', $userDetails->tbl_user_id);
    
    return redirect()->back();
    
   }


   public function updateCompanyDetails(Request $request)
   {
        $user = session('user');
        $decCompId = EncryptionDecryptionHelper::encdecId($request->encCompId,'decrypt');
        $company = CompanyDetail::where('tbl_comp_id',$decCompId)->first();
        //dd($company);
        $company->unique_name = $request->unique_name;
        $company->company_name = $request->company_name;
        $company->comp_address = $request->address;
        $company->comp_website = $request->website;
        $company->industry_name = $request->industry_name;

        $company->contact_no = $request->contact_no;
        $company->email = $request->email;
        $company->updated_by = session('user')->tbl_user_id;
        $company->updated_date = Date::now()->toDateString();
        $company->updated_time = Date::now()->toTimeString();


        // Handle company logo upload if a file was uploaded
        //  if ($request->hasFile('company_logo')) {
        //     $image = $request->file('company_logo');
        //     $company->company_logo = file_get_contents($image->path()); // Store image data as binary
        // }
        // if ($request->hasFile('company_logo')) {
        //     $image = $request->file('company_logo');
        //     $company->company_logo = file_get_contents($image->path()); // Store image data as binary
        // }
        if ($request->hasFile('company_logo')) {
            $image = $request->file('company_logo');
            $base64Image = base64_encode(file_get_contents($image->path())); // Convert the image to base64
            $company->company_logo = $base64Image; // Save the base64 encoded image to the company_logo column
        }

        try {
            //dd($company);
            $company->save();
            AuditLogHelper::logDetails('updated '.$company->company_name .' details with ID ' .$company->tbl_comp_id . ' product', $user->tbl_user_id);
            return redirect()->route('OrgDashboard')->with('success', 'Company details updated successfully.');

            
        } catch (\Illuminate\Database\QueryException $e) {
            // Handle the exception (e.g., log error, display message)
            dd($e->getMessage()); // Dump the error message for debugging
        }
   }
   public function updatecompanydetailsE(Request $request)
   {
        $user = session('user');
        $decCompId = EncryptionDecryptionHelper::encdecId($request->encCompId,'decrypt');
        $company = CompanyDetail::where('tbl_comp_id',$decCompId)->first();
        //dd($company);
        $company->unique_name = $request->unique_name;
        $company->company_name = $request->company_name;
        $company->comp_address = $request->address;
        $company->comp_website = $request->website;
        $company->industry_name = $request->industry_name;

        $company->contact_no = $request->contact_no;
        $company->email = $request->email;
        $company->updated_by = session('user')->tbl_user_id;
        $company->updated_date = Date::now()->toDateString();
        $company->updated_time = Date::now()->toTimeString();


        // Handle company logo upload if a file was uploaded
        //  if ($request->hasFile('company_logo')) {
        //     $image = $request->file('company_logo');
        //     $company->company_logo = file_get_contents($image->path()); // Store image data as binary
        // }
        // if ($request->hasFile('company_logo')) {
        //     $image = $request->file('company_logo');
        //     $company->company_logo = file_get_contents($image->path()); // Store image data as binary
        // }
        if ($request->hasFile('company_logo')) {
            $image = $request->file('company_logo');
            $base64Image = base64_encode(file_get_contents($image->path())); // Convert the image to base64
            $company->company_logo = $base64Image; // Save the base64 encoded image to the company_logo column
        }

        try {
            //dd($company);
            $company->save();
            AuditLogHelper::logDetails('updated '.$company->company_name .' details with ID ' .$company->tbl_comp_id . ' product', $user->tbl_user_id);
            return redirect()->route('ExDashboard')->with('success', 'Company details updated successfully.');

            
        } catch (\Illuminate\Database\QueryException $e) {
            // Handle the exception (e.g., log error, display message)
            dd($e->getMessage()); // Dump the error message for debugging
        }
   }

   public function pendingexcounts()
   {
       $companies = UserDetail::where('active_status', 'Approved')->where('role_id', 2)->get();

       foreach ($companies as $company) {
           $company->company_name = CompanyDetail::where('tbl_comp_id', $company->tbl_comp_id)->value('company_name');
       }
       return view('OrganizerPages/pendingexcounts', ['companies' => $companies]);
   }


   public function participatedExhibitions()
{
    $user = session('user');
    $notify = Notify::where('tbl_user_id', $user->tbl_user_id)->first();
    $encUserId = EncryptionDecryptionHelper::encdecId($user->tbl_user_id, 'encrypt');
    $encCompanyId = EncryptionDecryptionHelper::encdecId($user->tbl_comp_id, 'encrypt');
    $participatedExs = Participate::where('tbl_user_id', $user->tbl_user_id)
                        ->where('active_status', 'active')
                        ->where('flag', 'show')
                        ->get();

    foreach ($participatedExs as $participatedEx) {
        $participatedEx->exDetails = ExhibitionDetail::where('tbl_ex_id', $participatedEx->tbl_ex_id)->first();
        $encExhibitionID = EncryptionDecryptionHelper::encdecId($participatedEx->tbl_ex_id, 'encrypt');
        $participatedEx->encExId = $encExhibitionID;
        $participatedEx->encParticipationId = EncryptionDecryptionHelper::encdecId($participatedEx->tbl_participation_id, 'encrypt');
        
        
        //Check if email_service is enabled
        if ($notify->email_service === 'enabled') {
            $participatedEx->emailServiceEnabled = true;
        } else {
            $participatedEx->emailServiceEnabled = false;
        }
    }
    
    return view('ExhibitorPages/participatedExhibitions', ['participatedExs' => $participatedExs]);
}


   
   

   public function visitorsdetails($id)
   {
    
    $user = session('user');
    $decPartId = EncryptionDecryptionHelper::encdecId($id,'decrypt');
    
    $participatedEx = Participate::where('tbl_participation_id',$decPartId)->first();

    $userDetails = UserDetail::where('tbl_user_id',$participatedEx->tbl_user_id)->first();
    
    $participatedEx->exDetails = ExhibitionDetail::where('tbl_ex_id', $participatedEx->tbl_ex_id)->first();
    $participatedEx->encExId = EncryptionDecryptionHelper::encdecId($participatedEx->tbl_ex_id,'encrypt');
    $participatedEx->encCompId = EncryptionDecryptionHelper::encdecId($userDetails->tbl_comp_id,'encrypt');

    $participatedEx->compDetails = CompanyDetail::where('tbl_comp_id',$userDetails->tbl_comp_id)->first();
    
    $services = ProductDetail::where('tbl_comp_id',$userDetails->tbl_comp_id)->get();
    

        foreach ($services as $service) {
            $service->encServiceId = EncryptionDecryptionHelper::encdecId($service->tbl_product_id, 'encrypt');
        }
        
       
       return view('VisitorPages/visitorsdetails',['participatedEx'=>$participatedEx,'services'=>$services]);
   }
   
   public function participate($id)
   {
    //dd($id);
    $user = session('user');
    $decExId = EncryptionDecryptionHelper::encdecId($id,'decrypt');
   // dd($decExId);

    // Check if the user has already participated
    $existingParticipation = Participate::where('tbl_ex_id', $decExId)
                                        ->where('tbl_user_id', $user->tbl_user_id)
                                        ->exists();

    // If the user has already participated, return a JSON response
    if ($existingParticipation) 
    {
        return redirect()->back()->withErrors(['error' => 'You have already participated in this exhibition.']);   
     }
        
        
        $participate = new Participate;
        $participate->tbl_ex_id = $decExId;
        $participate->tbl_user_id = $user->tbl_user_id;
        $participate->add_date = Date::now()->toDateString();
        $participate->add_time = Date::now()->toTimeString();
        $participate->save();

        $notify = new Notify;
        $notify->tbl_ex_id = $decExId;
        $notify->tbl_user_id = $user->tbl_user_id;
        $notify->tbl_comp_id = $user->tbl_comp_id;
        $notify->add_date = now()->toDateString();
        $notify->add_time = now()->toTimeString();
        $notify->save();        

        $email = new EmailSetting;
        $email->tbl_user_id = $user->tbl_user_id;
        $email->tbl_comp_id = $user->tbl_comp_id;
        $email->add_date = Date::now()->toDateString();
        $email->add_time = Date::now()->toTimeString();
        $email->save();

        $sms = new SMSSetting;
        $sms->tbl_user_id = $user->tbl_user_id;
        $sms->tbl_comp_id = $user->tbl_comp_id;
        $sms->add_date = Date::now()->toDateString();
        $sms->add_time = Date::now()->toTimeString();
        $sms->save();



        AuditLogHelper::logDetails(' user with user ID: '.$user->tbl_user_id. ' has participated in exhibition ID'. $decExId . '', $user->tbl_user_id);

        return redirect()->back();
        
   }

   public function regVisitor(Request $request)
   {
   // dd($request);
   $decProdId = EncryptionDecryptionHelper::encdecId($request->services,'decrypt');

    $visitor = new Visitor;
    $visitor->tbl_ex_id = EncryptionDecryptionHelper::encdecId($request->encExId,'decrypt');
    $visitor->tbl_comp_id = EncryptionDecryptionHelper::encdecId($request->encCompId,'decrypt');
    $visitor->name = $request->visitor_name;
    $visitor->email = $request->email;
    $visitor->contact_no = $request->contact_no;
    $visitor->service = $decProdId;
    $visitor->add_date = Date::now()->toDateString();
    $visitor->add_time = Date::now()->toTimeString();
    $visitor->save();

    
    //dd($decProdId);
    $product = ProductDetail::where('tbl_product_id',$decProdId)->first();

    $assignedProds = AssignProduct::where('tbl_product_id',$decProdId)->get();
    
    $documents = collect(); // Initialize an empty collection to store documents

    foreach ($assignedProds as $assignedProd) {
        // Retrieve documents associated with each assigned product
        $docs = Document::where('tbl_doc_id', $assignedProd->tbl_doc_id)->get();
        
        // Merge retrieved documents into the documents collection
        $documents = $documents->merge($docs);
    }

    
    EmailHelper::sendEmail($visitor->email,$visitor->tbl_comp_id,$documents,null);

    return redirect()->back();

   }

public function collectdata($id){
    $participatedEx = Participate::where('tbl_participation_id',EncryptionDecryptionHelper::encdecId($id,'decrypt'))->first();
    $user = UserDetail::where('tbl_user_id',$participatedEx->tbl_user_id)->first();
    // dd($participatedEx);
    $visitors = Visitor::where('tbl_comp_id',$user->tbl_comp_id)->where('tbl_ex_id',$participatedEx->tbl_ex_id)->get();

    foreach($visitors as $visitor){
        $visitor->service_name = ProductDetail::where('tbl_product_id',$visitor->service)->value('product_name');
    }
    
    return view('VisitorPages/collectdata',['visitors'=>$visitors]);

}

public function fetchvisitordata()
{
    dd("hi");
    $user = session('user');
    $visitorlogs = Visitor::orderBy('add_date', 'desc')->get();

    $auditLogsWithUsername = [];

    foreach ($visitorlogs as $visitorlog) {
        $user = UserDetail::where('tbl_user_id', $visitorlog->activity_by)->first();

        if ($user) {
            $auditLogsWithUsername[] = [
                'id' => $visitorlog->id,
                'activity_name' => $visitorlog->name, // Assuming activity_name is the visitor's name in your table
                'activity_by' => $user->first_name . " " . $user->last_name,
                'activity_date' => $visitorlog->add_date, // Assuming add_date is the activity date in your table
                'activity_time' => $visitorlog->add_time, // Assuming add_time is the activity time in your table
                'email' => $visitorlog->email, // Assuming email is the visitor's email in your table
                'contact_no' => $visitorlog->contact_no, // Assuming contact_no is the visitor's contact number in your table
                'service' => $visitorlog->service, // Assuming service is the visitor's service in your table
            ];
        }
    }

    return response()->json([
        'success' => true,
        'data' => $auditLogsWithUsername,
    ]);
}

public function editExhibition($id)
{
    $user = session('user');
    $decExId = EncryptionDecryptionHelper::encdecId($id, 'decrypt');
    $exhibition = ExhibitionDetail::where('tbl_ex_id', $decExId)->first();
    // Assuming you have an Exhibition model
    $exhibition->encExhibitionId = EncryptionDecryptionHelper::encdecId($exhibition->tbl_ex_id , 'encrypt');
    unset($exhibition->tbl_ex_id );
    // If you have industries related to exhibitions, fetch them as well
    $industries = Industry::where('flag', 'show')->get();

    foreach ($industries as $industry) {
        $industry->enc_id = EncryptionDecryptionHelper::encdecId($industry->tbl_industry_id, 'encrypt');
    }

    return view('OrganizerPages/editExhibition', ['industries' => $industries, 'exhibition' => $exhibition]);
}

public function updateExhibition(Request $request)
{
    //dd($request);
    $user = session('user');
    $decExId = EncryptionDecryptionHelper::encdecId($request->encExhibitionId,'decrypt');
    $exhibition = ExhibitionDetail::where('tbl_ex_id', $decExId)->first();
    //dd($exhibition);
    if (!$exhibition) {
        return redirect()->back()->with('error', 'Exhibition not found.');
    }

    $exhibition->exhibition_name = $request->exhibition_name;
    $exhibition->from_date = $request->from_date;
    $exhibition->to_date = $request->to_date;
    $exhibition->start_time = $request->start_time;
    $exhibition->end_time = $request->end_time;
    $exhibition->venue = $request->venue;
    $exhibition->exhibition_website = $request->exhibition_website;
    $exhibition->registration_url = $request->registration_url;
    $exhibition->industry = $request->industry_name;
    $exhibition->active_status = $request->active_status;
    $exhibition->updated_by = $user->tbl_user_id;
    $exhibition->updated_date = now()->toDateString();
    $exhibition->updated_time = now()->toTimeString();
    
    if ($request->hasFile('company_logo')) {
        $image = $request->file('company_logo');
        $base64Image = base64_encode(file_get_contents($image->path()));
        $exhibition->company_logo = $base64Image;
    }
    if ($request->hasFile('attach_document')) {
        $document = $request->file('attach_document');
        $base64Document = base64_encode(file_get_contents($document->path()));
        $exhibition->attach_document = $base64Document;
    }
   // dd($exhibition);
    // try {
       //dd($exhibition);
        $exhibition->save();
        AuditLogHelper::logDetails('updated ' . $exhibition->exhibition_name . ' details with ID ' . $exhibition->tbl_ex_id . ' exhibition', $user->tbl_user_id);
        return redirect()->route('OrgDashboard')->with('success', 'Exhibition details updated successfully.');
    // } catch (\Exception $e) {
    //     // Handle the exception (e.g., log error, display message)
    //     return redirect()->back()->with('error', 'Error updating exhibition details: ' . $e->getMessage());
    // }
}


   
}
