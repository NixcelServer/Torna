<?php

namespace App\Http\Controllers;

use App\Models\UserDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Helpers\EncryptionDecryptionHelper;
use App\Models\CompanyDetail;
use App\Models\UserOtp;
use App\Models\ExhibitionDetail;
use Illuminate\Support\Facades\Date;
use App\Helpers\EmailHelper;
use App\Helpers\AuditLogHelper;
use App\Models\AuditLogDetail;
use App\Models\ExhibitorOtp;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Models\Industry;





class AuthController extends Controller
{

    public function loginPage()
    {
        return view('HomePages/Login');
    }
    // public function login(Request $request)

    // {
    //     //check if user exists 

    //     $user = UserDetail::where('email', $request->email)->first();

    //     //check if user is found
    //     if (!$user) {
    //         return redirect()->back()->with('error', 'Invalid email. Please enter a valid email.');
    //     }

    //     //get the password from request
    //     $password = $request->password;

    //     //encrypt the password
    //     $encrypted_pass = EncryptionDecryptionHelper::encryptData($password);


    //     //if user exists validate password and redirect to respective page
    //     if (strcmp($user->password, $encrypted_pass) === 0) {

    //         //enter the user activity into auditlog
    //         //  $activity_name = "login";
    //         //  $activity_by = $user->tbl_user_id;

    //         Auth::login($user);

    //         Session::put('user', $user);
    //         AuditLogHelper::logDetails('login', $user->tbl_user_id);

    //         if ($user->role_id == '1') {
    //             return redirect('/AdminDashboard');
    //         } else if ($user->role_id == '2') {
    //             return redirect('/activeExhibitions');
    //         } else {
    //             return redirect('/upcomingExhibitions');
    //         }
    //         // dd("success");
    //         //get the user id and iterate over rolemodules to get the data of modules assigned to him
    //         // $role_id = $user->tbl_role_id;

    //     } else {
    //         // if passwords are not same display following msg
    //         return redirect()->back()->withInput()->with('error', 'Invalid password. Please enter a valid password.');
    //     }
    // }

    public function login(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required|string',
    ]);

    // Check if user exists
    $user = UserDetail::where('email', $request->email)->first();

    // Check if user is found
    if (!$user) {
        return redirect()->back()->with('error', 'Invalid email. Please enter a valid email.');
    }

    $email = $request->email;
    $password = $request->password;

    $maxAttempts = 5; // Maximum number of attempts allowed
    $decayMinutes = 1; // Lockout period in minutes

    if (RateLimiter::tooManyAttempts($this->throttleKey($email), $maxAttempts)) {
        $seconds = RateLimiter::availableIn($this->throttleKey($email));
        return redirect()->back()->withErrors([
            'error' => "Too many attempts. Please try again in $seconds seconds.",
        ]);
    }

    // Encrypt the password
    $encrypted_pass = EncryptionDecryptionHelper::encryptData($password);

    // If user exists, validate password and redirect to respective page
    if (strcmp($user->password, $encrypted_pass) === 0) {
        // Clear rate limit attempts
        RateLimiter::clear($this->throttleKey($email));

        Auth::login($user);
        Session::put('user', $user);
        AuditLogHelper::logDetails('Login', $user->tbl_user_id);

        if ($user->role_id == '1') {
            // Update exhibition statuses for admin
            $currentDate = Carbon::now()->format('Y-m-d');
            $exhibitions = ExhibitionDetail::where('active_status', 'Active')->get();
    
            foreach($exhibitions as $exhibition) {
                $exhibitionDate = Carbon::parse($exhibition->ex_to_date);
        
                if ($exhibitionDate->lessThan($currentDate)) {
                    ExhibitionDetail::where('tbl_ex_id', $exhibition->tbl_ex_id)
                        ->update(['active_status' => 'Past']);
                }
            }

            return redirect('/AdminDashboard');
        } elseif ($user->role_id == '2') {
            return redirect('/activeExhibitions');
        } else {
            return redirect('/upcomingExhibitions');
        }
    } else {
        // Increment the rate limit attempts
        RateLimiter::hit($this->throttleKey($email), $decayMinutes * 60);

        // If passwords do not match, display following message
        return redirect()->back()->withInput()->with('error', 'Invalid password. Please enter a valid password.');
    }
}


    protected function throttleKey($email)
    {
        return strtolower($email) . '|' . request()->ip();
    }



    public function logout(Request $request)
    {
        $user_details = session('user');
        AuditLogHelper::logDetails('Logout', $user_details->tbl_user_id);
        $request->session()->flush();

        Auth::logout();

        return redirect('/');
    }


    public function OrganizerRegistrationSubmitForm(Request $request)
    {
        //dd($request);
        $request->validate([
            'company_name' => 'unique:mst_tbl_company_details',
            'email' => 'unique:mst_tbl_user_details|email',
            'contact_no' => 'unique:mst_tbl_user_details',
        ], [
            'email.unique' => 'This email address is already in use.',
            'contact_no.unique' => 'This contact number is already in use.',
            'company_name.unique' => 'This Company is already registered.'
        ]);
        //  return response()->json(['success' => true, 'message' => 'Registration successful'], 200);

        // Create a new user using the validated data
        $company = new CompanyDetail();
        $company->company_name = $request->company_name;
        $company->contact_no = $request->contact_no;
        $company->email = $request->email;
        $company->registered_date = Date::now()->toDateString();
        $company->registered_time = Date::now()->toTimeString();
       
        
        if ($request->hasFile('company_logo')) {
            $image = $request->file('company_logo');
            $base64Image = base64_encode(file_get_contents($image->path())); // Convert the image to base64
            $company->company_logo = $base64Image; // Save the base64 encoded image to the company_logo column
        }
         try {
            $company->save();
            EmailHelper::sendEmail(null,null,null,$company,$request->password);
            // Send email to admin
            EmailHelper::sendAdminEmail($company);
            
        } catch (\Exception $e) {
            // Log the error message
            \Illuminate\Support\Facades\Log::error('Error occurred during registration: ' . $e->getMessage());
        
            // Return a JSON response with an error message
            return response()->json([
                'success' => false,
                'message' => 'An error occurred during registration. Please try again later.'
            ], 500);
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
        //dd($user);

        // Save the user to the database
        $user->save();
        
      AuditLogHelper::logDetails('Registered as organizer', $user->tbl_user_id);

      //  return redirect()->route('Home')->with('success', 'Registration successful!');




        // Optionally, you can also handle additional actions like sending emails, notifications, etc.

        // Redirect the user to a success page or any other page as needed
        //return view('OrganizerForm');

       // return redirect()->back()->with('success', 'Registration successful!');
       return response()->json(['success' => true, 'message' => 'Registration successful'], 200);

    }
    public function ExhibitorRegistrationSubmitForm(Request $request)
    {

        $request->validate([
            'company_name' => 'unique:mst_tbl_company_details',
            'email' => 'unique:mst_tbl_user_details|email',
            'contact_no' => 'unique:mst_tbl_user_details',
        ], [
            'email.unique' => 'This email address is already in use.',
            'contact_no.unique' => 'This contact number is already in use.',
            'company_name.unique' => 'This Company is already registered.'
        ]);
        // Create a new user using the validated data
        $exhibitor = new CompanyDetail();
        $exhibitor->company_name = $request->company_name;
        $exhibitor->contact_no = $request->contact_no;
        $exhibitor->industry_name = $request->industry_name;
        $exhibitor->email = $request->email;
        $exhibitor->registered_date = Date::now()->toDateString();
        $exhibitor->registered_time = Date::now()->toTimeString();

        // Handle company logo upload if a file was uploaded
        if ($request->hasFile('company_logo')) {
            $image = $request->file('company_logo');
            $base64Image = base64_encode(file_get_contents($image->path())); // Convert the image to base64
            $exhibitor->company_logo = $base64Image; // Save the base64 encoded image to the company_logo column
        }
        

      //  try {
            $exhibitor->save();
            EmailHelper::sendEmail(null,null,null,$exhibitor,$request->password);
            EmailHelper::sendAdminEmail($exhibitor,$role = '3');
        //} catch (\Illuminate\Database\QueryException $e) {
            // Handle the exception (e.g., log error, display message)
            // dd($e->getMessage()); // Dump the error message for debugging
        //}

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
        

        AuditLogHelper::logDetails('Registered as exhibitor', $user->tbl_user_id);

        //return redirect()->route('Home')->with('success', 'Registration successful!');
        return response()->json(['success' => true, 'message' => 'Registration successful'], 200);

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
        $upcomingExs = ExhibitionDetail::where('active_status', 'Active')->where('flag', 'show')->get();

        foreach ($upcomingExs as $upcomingEx) {
            $upcomingEx->attach_document = base64_encode($upcomingEx->attach_document);
        }
        return view('HomePages/Home',['upcomingExs' => $upcomingExs]);
    }

    public function OrganizerRegistrationForm()
    {
        // Retrieve the email based on the tbl_user_otp_id
        $email = UserOtp::orderBy('tbl_user_otp_id', 'desc')->value('email');
        $industries = Industry::where('flag', 'show')->get();

        foreach ($industries as $industry) {
            $industry->encIndId = EncryptionDecryptionHelper::encdecId($industry->tbl_industry_id, 'encrypt');
        }
        return view('OrganizerPages/OrganizerForm', ['email' => $email]);
    }
    public function ExhibitorForm()
    {
        // Retrieve the email based on the tbl_user_otp_id
        $email = UserOtp::orderBy('tbl_user_otp_id', 'desc')->value('email');
        $industries = Industry::where('flag', 'show')->get();

        foreach ($industries as $industry) {
            $industry->encIndId = EncryptionDecryptionHelper::encdecId($industry->tbl_industry_id, 'encrypt');
        }
        return view('ExhibitorPages/ExhibitorForm', ['industries' => $industries, 'email' => $email]);
    }
    // public function Login()
    // {
    //     return view('Login');
    // }

    public function auditLogDetails()
    {
        $auditlogs = AuditLogDetail::orderBy('activity_time','desc')->get();

        foreach($auditlogs as $auditlog){
         
         $user = UserDetail::where('tbl_user_id',$auditlog->activity_by)->first();
     
         if($user){
             $auditlog->username = $user->first_name . " " . $user->last_name;
             
         }
        }
        
         return view('AdminPages.AuditLog',['auditlogs'=>$auditlogs]);
    }


    public function RegistrationWithEmail()
    {
        return view('HomePages/Registration');
    }
    public function RegistrationWithEmailEx()
    {
        return view('HomePages/RegistrationEx');
    }
    public function ChangeEmailAdd()
    {
        // Get the user from the session
    $user = session('user');

    // Extract the email from the user attributes
    $email = $user['email'];

    // Pass the email to the view using an associative array
    return view('ExhibitorPages/ChangeEmailAdd', ['email' => $email]);
    }

    public function generateOTP()
{
    // Generate a random 6-digit OTP
    $otp = mt_rand(100000, 999999);

    // Store the OTP in a session variable for later verification
    session(['otp' => $otp]);

    return $otp;
}

    // public function registerwithmail(Request $request)
    // {
    //     //dd($request);
    //     // Generate OTP
    // $otp = $this->generateOTP();

    // // Debug output to check if OTP is generated
    // dd('OTP generated: ' . $otp);

    // // Return the view for registration
    // return view('HomePages/Registration');
        
    // }
    public function registerwithmail(Request $request)
{
    // Validate the incoming request data
    $validatedData = $request->validate([
        'email' => 'required|email|unique:users,email',
    ]);

    // Generate OTP
    $otp = $this->generateOTP();

    // Create a new user record in the database
    $user = new UserOtp();
    $user->email = $validatedData['email'];
    $user->otp = $otp; // Assuming you have an 'otp' column in your users table
    $user->expire_at = now()->addMinutes(3);
    $user->save();

    EmailHelper::sendOtp($otp,$request->email);
    // return view('HomePages/VerifyOtp');
    $encryptedId = EncryptionDecryptionHelper::encdecId($user->tbl_user_otp_id, 'encrypt');

    return redirect()->route('verifyotp');
    // Debug output to check if OTP is generated and user is saved
    //dd('User registered with email: ' . $user->email . ' and OTP: ' . $otp . ' Expiration At: ' .  $user->expire_at);

    // Return the view for registration
   
}
public function registerwithmailEx(Request $request)
{
    // Validate the incoming request data
    $validatedData = $request->validate([
        'email' => 'required|email|unique:users,email',
    ]);

    // Generate OTP
    $otp = $this->generateOTP();

    // Create a new user record in the database
    $user = new UserOtp();
    $user->email = $validatedData['email'];
    $user->otp = $otp; // Assuming you have an 'otp' column in your users table
    $user->expire_at = now()->addMinutes(3);
    $user->save();

    EmailHelper::sendOtp($otp,$request->email);
    // return view('HomePages/VerifyOtp');
    $encryptedId = EncryptionDecryptionHelper::encdecId($user->tbl_user_otp_id, 'encrypt');

    return redirect()->route('verifyotpex');
    // Debug output to check if OTP is generated and user is saved
    //dd('User registered with email: ' . $user->email . ' and OTP: ' . $otp . ' Expiration At: ' .  $user->expire_at);

    // Return the view for registration
   
}
public function ChangeEmailEx(Request $request)
{
    //dd($request);
    // Validate the incoming request data
    $validatedData = $request->validate([
        'email' => 'required|email|unique:users,email',
        'oldemail' => 'required|email',
    ]);

    // Fetch the user from the session
   $user = session('user');

// Check if user exists and has 'tbl_user_id'
    $user->tbl_user_id;
    // Store 'tbl_user_id' in $userId variable
    $userId = $user->tbl_user_id;
    
    // Optionally, you can dump and die to check the value of $userId
    //dd($userId);


    // Generate OTP
    $otp = $this->generateOTP();

    // Create a new user record in the database
    $user = new ExhibitorOtp();
    $user->email = $validatedData['email'];
    $user->old_email = $validatedData['oldemail'];
    $user->otp = $otp; // Assuming you have an 'otp' column in your users table
    $user->updated_by = $userId;
    $user->expire_at = now()->addMinutes(3);
    $user->save();

    

// Update User Email and add updated_by, updated_date, updated_time
$userDetail = UserDetail::where('email', $validatedData['oldemail'])->first();
//dd($userDetail);
if ($userDetail) {
    $userDetail->email = $validatedData['email'];
    $userDetail->updated_by = $userId; // Use the user ID from the session
    $userDetail->updated_date = now()->format('Y-m-d');
    $userDetail->updated_time = now()->format('H:i:s');
    $userDetail->save();
}

// Update Company Details Email and add updated_by, updated_date, updated_time
$companyDetail = CompanyDetail::where('email', $validatedData['oldemail'])->first();
if ($companyDetail) {
    $companyDetail->email = $validatedData['email'];
    $companyDetail->updated_by = $userId; // Use the user ID from the session
    $companyDetail->updated_date = now()->format('Y-m-d');
    $companyDetail->updated_time = now()->format('H:i:s');
    $companyDetail->save();
}



    EmailHelper::sendOtp($otp,$request->email);
    // return view('HomePages/VerifyOtp');
    $encryptedId = EncryptionDecryptionHelper::encdecId($user->tbl_user_otp_id, 'encrypt');

    return redirect()->route('verifyotpemailex');
    // Debug output to check if OTP is generated and user is saved
    //dd('User registered with email: ' . $user->email . ' and OTP: ' . $otp . ' Expiration At: ' .  $user->expire_at);

    // Return the view for registration
   
}
public function verifyOTP()
    {
        

        // Retrieve the email based on the tbl_user_otp_id
        $email = UserOtp::orderBy('tbl_user_otp_id', 'desc')->value('email');

        //dd($email);

        // Pass the email to the view
        return view('HomePages/VerifyOtp', ['email' => $email]);
    }

    public function verifyOTPEx()
    {
        

        // Retrieve the email based on the tbl_user_otp_id
        $email = UserOtp::orderBy('tbl_user_otp_id', 'desc')->value('email');

        //dd($email);

        // Pass the email to the view
        return view('HomePages/VerifyOtpEx', ['email' => $email]);
    }   
    public function verifyotpemailex()
    {
        

        // Retrieve the email based on the tbl_user_otp_id
        $email = ExhibitorOtp::orderBy('tbl_user_otp_id', 'desc')->value('email');

        //dd($email);

        // Pass the email to the view
        return view('ExhibitorPages/VerifyEmailOtpEx', ['email' => $email]);
    }    


// public function verifyotppost(Request $request)
// {
//     //dd($request);
//     //dd('hii');
//     // Validate the OTP input
//     $validatedData = $request->validate([
//         'email' => 'required|email',
//         'otp' => 'required',
//     ]);

    
//     // Retrieve the email and OTP from the session
//     $sessionEmail = session('email');
//     $sessionOTP = session('otp');

//     // Check if the input email matches the session email and OTP matches the session OTP
//     if ($validatedData['email'] === $sessionEmail && $validatedData['otp'] == $sessionOTP) {
//         dd("success");
//         // OTP verification successful, redirect to VerifyOtp route
//         return redirect('/organizerform');
//     } else {
//         // OTP verification failed
//         return redirect()->back()->withErrors(['otp' => 'Invalid OTP']);
//     }
// }

public function verifyotppost(Request $request)
{
    //dd($request);
    // Validate the OTP input
    $validatedData = $request->validate([
        'email' => 'required|email',
        'otp' => 'required',
    ]);

    // Retrieve the email and OTP from the request
    $inputEmail = $request->input('email');
    $inputOTP = $request->input('otp');

    // Fetch the OTP record from the database
    $otpRecord = UserOtp::where('email', $inputEmail)->orderBy('created_at', 'desc')->first();

    // Check if the OTP record exists and if the input OTP matches the stored OTP
    if ($otpRecord && $inputOTP == $otpRecord->otp) {
        // OTP verification successful, redirect to organizer form
        return redirect('/organizerform');
    } else {
        // OTP verification failed
        return redirect()->back()->withErrors(['otp' => 'Invalid OTP']);
    }
}

public function verifyotppostEx(Request $request)
{
    //dd($request);
    // Validate the OTP input
    $validatedData = $request->validate([
        'email' => 'required|email',
        'otp' => 'required',
    ]);

    // Retrieve the email and OTP from the request
    $inputEmail = $request->input('email');
    $inputOTP = $request->input('otp');

    // Fetch the OTP record from the database
    $otpRecord = UserOtp::where('email', $inputEmail)->orderBy('created_at', 'desc')->first();

    // Check if the OTP record exists and if the input OTP matches the stored OTP
    if ($otpRecord && $inputOTP == $otpRecord->otp) {
        // OTP verification successful, redirect to organizer form
        return redirect('/exhibitorform');
    } else {
        // OTP verification failed
        return redirect()->back()->withErrors(['otp' => 'Invalid OTP']);
    }
}


public function verifyemailotppostEx(Request $request)
{
    //dd($request);
    // Validate the OTP input
    $validatedData = $request->validate([
        'email' => 'required|email',
        'otp' => 'required',
    ]);

    // Retrieve the email and OTP from the request
    $inputEmail = $request->input('email');
    $inputOTP = $request->input('otp');

    // Fetch the OTP record from the database
    $otpRecord = ExhibitorOtp::where('email', $inputEmail)->orderBy('created_at', 'desc')->first();

    // Check if the OTP record exists and if the input OTP matches the stored OTP
    if ($otpRecord && $inputOTP == $otpRecord->otp) {
        // OTP verification successful
        // Check the role_id in the session
        if (session('user')->role_id == 2) {
            return redirect('/companysetupform-O');
        } else {
            return redirect('/companysetupform');
        }
    } else {
        // OTP verification failed
        return redirect()->back()->withErrors(['otp' => 'Invalid OTP']);
    }
}
    
}
