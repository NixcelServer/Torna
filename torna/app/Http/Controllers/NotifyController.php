<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\EncryptionDecryptionHelper;
use App\Helpers\AuditLogHelper;
use App\Helpers\EmailHelper;

use App\Models\Notify;
use App\Models\EmailSetting;
use App\Models\SMSSetting;
use App\Models\Visitor;
use App\Models\ProductDetail;
use App\Models\AssignProduct;
use App\Models\Document;


use Illuminate\Support\Facades\Date;



class NotifyController extends Controller
{
    //
    public function selectNotifyOptions(Request $request)
    {
       
       
        $user = session('user');
       

        try {
            // Decrypt the exhibition ID
            $decExId = EncryptionDecryptionHelper::encdecId($request->encExId, 'decrypt');



            $existingDetails = Notify::where('tbl_ex_id', $decExId)
                                        ->where('tbl_user_id', $user->tbl_user_id)
                                        ->exists();

    // If the user has already participated, return a JSON response
    if ($existingDetails) {
        // $notify = Notify::where('tbl_ex_id')   
     }
            

        $notify = Notify::where('tbl_user_id', $user->tbl_user_id)->where('tbl_ex_id', $decExId)->first();
            
            $options = $request->options; // Assuming $request is the request object
            
            // Check if email is selected
            if (in_array('email', $options)) {
                $notify->email_service = 'enabled';
                
            }else{
                $notify->email_service = 'disabled';
            }

            // Check if SMS is selected
            if (in_array('sms', $options)) {
                $notify->sms_service = 'enabled';
            }else{
                $notify->sms_service = 'disabled';
            }

            // Check if WhatsApp is selected
            if (in_array('whatsapp', $options)) {
                $notify->whatsapp_service = 'enabled';
            }else{
                $notify->whatsapp_service = 'disabled';
            }

            if (in_array('emailAfter', $options)) {
                $notify->email_after_service = 'enabled';
            }else{
                $notify->email_after_service = 'disabled';
            }


            $notify->tbl_user_id = $user->tbl_user_id;
            $notify->tbl_comp_id = $user->tbl_comp_id;
            $notify->tbl_ex_id = $decExId; // Use the decrypted exhibition ID
            $notify->add_date = Date::now()->toDateString();
            $notify->add_time = Date::now()->toTimeString();
            
            $notify->save();

            

            // Return success response
            return response()->json(['message' => 'Notification saved successfully'], 200);
        } catch (\Exception $e) {
            // Handle any exceptions
            // For example, log the error or return a response
            Log::error($e->getMessage());
            return response()->json(['error' => 'An error occurred while saving notification'], 500);
        }    
    }

public function notificationSetting(){

    $user = session('user');
    $emailDetails = EmailSetting::where('tbl_user_id',$user->tbl_user_id)->where('flag','show')->first();
    // $emailDetails = EmailSetting::where('tbl_user_id', $user->tbl_user_id)->value('tbl_email_setting_id');
    // $emailDetails = EmailSetting::where('tbl_email_setting_id', $emailDetails)->first();
// First, fetch the tbl_email_setting_id based on tbl_user_id
    //$emailDetails = EmailSetting::where('tbl_user_id', 69)->where('flag', 'show')->first();

  //  $smsDetails = SMSSetting::where('tbl_user_id',$user->tbl_user_id)->where('flag','show')->first();
    // $whatsappDetails = WhatsappSetting::where('tbl_user_id',$user->tbl_user_id)->where('flag','show')->first();
    //dd($user);
    //dd($emailDetails);
    return view('ExhibitorPages.notificationSetting',['emailDetails'=>$emailDetails]);
}
    
public function storeEmailSettings(Request $request)
{
    
    $user = session('user');
    $email = EmailSetting::where('tbl_user_id',$user->tbl_user_id)->first();

    $email->smtp = $request->smtp;
    $email->port = $request->port;
    $email->username = $request->username;
    $email->password = $request->password;
    $email->save();
    
    return redirect()->back();
}

public function storeSMSSettings(Request $request)
{
    
    $user = session('user');
    $sms = SMSSetting::where('tbl_user_id',$user->tbl_user_id)->first();
    $sms->sid = $request->sid;
    $sms->auth_token = $request->authToken;
    $sms->mobile_no = $request->mobileNo;
    dd($sms);
    $sms->save();

    return redirect()->back();

}

public function sendMail($id)
{
    
    $decVisitorId = EncryptionDecryptionHelper::encdecId($id, 'decrypt');
    
    $visitor = Visitor::where('tbl_visitor_detail_id',EncryptionDecryptionHelper::encdecId($id,'decrypt'))->first();

    

    $product = ProductDetail::where('tbl_product_id',$visitor->service)->first();

    

    $assignedProds = AssignProduct::where('tbl_product_id',$visitor->service)->get();
    
    
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
}
