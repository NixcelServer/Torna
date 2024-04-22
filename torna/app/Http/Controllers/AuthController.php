<?php

namespace App\Http\Controllers;

use App\Models\UserDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Helpers\EncryptionDecryptionHelper;
use App\Models\CompanyDetail;
use App\Models\ExhibitionDetail;
use Illuminate\Support\Facades\Date;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Models\Industry;





class AuthController extends Controller
{

    public function loginPage()
    {
        return view('HomePages/Login');
    }
    public function login(Request $request)

    {
        //check if user exists 

        $user = UserDetail::where('email', $request->email)->first();

        //check if user is found
        if (!$user) {
            return redirect()->back()->with('error', 'Invalid email. Please enter a valid email.');
        }

        //get the password from request
        $password = $request->password;

        //encrypt the password
        $encrypted_pass = EncryptionDecryptionHelper::encryptData($password);


        //if user exists validate password and redirect to respective page
        if (strcmp($user->password, $encrypted_pass) === 0) {

            //enter the user activity into auditlog
            //  $activity_name = "login";
            //  $activity_by = $user->tbl_user_id;

            Auth::login($user);

            Session::put('user', $user);

            if ($user->role_id == '1') {
                return redirect('/AdminDashboard');
            } else if ($user->role_id == '2') {
                return redirect('/OrgDashboard');
            } else {
                return redirect('/ExDashboard');
            }
            // dd("success");
            //get the user id and iterate over rolemodules to get the data of modules assigned to him
            // $role_id = $user->tbl_role_id;

        } else {
            // if passwords are not same display following msg
            return redirect()->back()->withInput()->with('error', 'Invalid password. Please enter a valid password.');
        }
    }



    public function logout(Request $request)
    {
        $user_details = session('user');
        $request->session()->flush();

        Auth::logout();

        return redirect('/');
    }


    public function OrganizerRegistrationSubmitForm(Request $request)
    {

        // Create a new user using the validated data
        $company = new CompanyDetail();
        $company->unique_name = $request->unique_name;
        $company->company_name = $request->company_name;
        $company->contact_no = $request->contact_no;
        $company->email = $request->email;

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
            $company->save();
        } catch (\Illuminate\Database\QueryException $e) {
            // Handle the exception (e.g., log error, display message)
            dd($e->getMessage()); // Dump the error message for debugging
        }




        $user = new UserDetail();
        $user->tbl_comp_id = $company->tbl_comp_id;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->contact_no = $request->contact_no;
        $user->email = $request->email;
        $user->password = EncryptionDecryptionHelper::encryptData($request->password);
        $user->created_date = Date::now()->toDateString();
        $user->created_time = Date::now()->toTimeString();
        $user->role_id = '2';

        // Save the user to the database
        $user->save();

        return redirect()->route('Home')->with('success', 'Registration successful!');




        // Optionally, you can also handle additional actions like sending emails, notifications, etc.

        // Redirect the user to a success page or any other page as needed
        //return view('OrganizerForm');

        return view('OrganizerPages/OrganizerForm');
    }
    public function ExhibitorRegistrationSubmitForm(Request $request)
    {
        
        // Create a new user using the validated data
        $exhibitor = new CompanyDetail();
        $exhibitor->unique_name = $request->unique_name;
        $exhibitor->company_name = $request->company_name;
        $exhibitor->contact_no = $request->contact_no;
        $exhibitor->industry_name = $request->industry_name;
        $exhibitor->email = $request->email;

        // Handle company logo upload if a file was uploaded
        if ($request->hasFile('company_logo')) {
            $image = $request->file('company_logo');
            $base64Image = base64_encode(file_get_contents($image->path())); // Convert the image to base64
            $exhibitor->company_logo = $base64Image; // Save the base64 encoded image to the company_logo column
        }

        try {
            $exhibitor->save();
        } catch (\Illuminate\Database\QueryException $e) {
            // Handle the exception (e.g., log error, display message)
            dd($e->getMessage()); // Dump the error message for debugging
        }

        $user = new UserDetail();
        $user->tbl_comp_id = $exhibitor->tbl_comp_id;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->contact_no = $request->contact_no;
        $user->email = $request->email;
        $user->password = EncryptionDecryptionHelper::encryptData($request->password);
        $user->created_date = Date::now()->toDateString();
        $user->created_time = Date::now()->toTimeString();
        $user->role_id = '3'; // Assuming '3' is the role ID for exhibitors

        // Save the user to the database
        $user->save();

        return redirect()->route('Home')->with('success', 'Registration successful!');
    }





    public function AdminDashboard()
    {
        // $company = CompanyDetail::where('active_status', 'Pending')->get();
        // $company = CompanyDetail::where('active_status', 'Approved')->get();
        // $company = CompanyDetail::where('active_status', 'Rejected')->get();

        // $unapprovedOrgCount = $company->count();
        // $approvedOrgCount = $company->count();
        // $rejectedOrgCount = $company->count();

        $unapprovedOrgCount = UserDetail::where('active_status', 'Pending')->where('role_id', 2)->count();
        $approvedOrgCount = UserDetail::where('active_status', 'Approved')->where('role_id', 2)->count();
        $rejectedOrgCount = UserDetail::where('active_status', 'Rejected')->where('role_id', 2)->count();

        $unapprovedExCount = UserDetail::where('active_status', 'Pending')->where('role_id', 3)->count();
        $approvedExCount = UserDetail::where('active_status', 'Approved')->where('role_id', 3)->count();
        $rejectedExCount = UserDetail::where('active_status', 'Rejected')->where('role_id', 3)->count();


        // $unapprovedExCount = $company->count();
        // $approvedExCount = $company->count();
        // $rejectedExCount = $company->count();




        return view('AdminPages/AdminDashboard', ['unapprovedOrgCount' => $unapprovedOrgCount, 'approvedOrgCount' => $approvedOrgCount, 'rejectedOrgCount' => $rejectedOrgCount, 'unapprovedExCount' => $unapprovedExCount, 'approvedExCount' => $approvedExCount, 'rejectedExCount' => $rejectedExCount]);
        //return view('AdminDashboard', ['unapprovedOrgCount' => $unapprovedOrgCount,'approvedOrgCount'=>$approvedOrgCount,'rejectedOrgCount'=>$rejectedOrgCount]);

    }

    public function Home()
    {
        return view('HomePages/Home');
    }

    public function OrganizerRegistrationForm()
    {
        $industries = Industry::where('flag', 'show')->get();

        foreach ($industries as $industry) {
            $industry->encIndId = EncryptionDecryptionHelper::encdecId($industry->tbl_industry_id, 'encrypt');
        }
        return view('OrganizerPages/OrganizerForm', ['industries' => $industries]);
    }
    public function ExhibitorForm()
    {
        $industries = Industry::where('flag', 'show')->get();

        foreach ($industries as $industry) {
            $industry->encIndId = EncryptionDecryptionHelper::encdecId($industry->tbl_industry_id, 'encrypt');
        }
        return view('ExhibitorPages/ExhibitorForm', ['industries' => $industries]);
    }
    // public function Login()
    // {
    //     return view('Login');
    // }
}
