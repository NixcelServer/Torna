<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\EncryptionDecryptionHelper;
use App\Helpers\AuditLogHelper;
use App\Models\Notify;
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
            

            $notify = new Notify;
            
            $options = $request->options; // Assuming $request is the request object
            
            // Check if email is selected
            if (in_array('email', $options)) {
                $notify->email_service = 'enabled';
            }

            // Check if SMS is selected
            if (in_array('sms', $options)) {
                $notify->sms_service = 'enabled';
            }

            // Check if WhatsApp is selected
            if (in_array('whatsapp', $options)) {
                $notify->whatsapp_service = 'enabled';
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
<<<<<<< HEAD



=======
public function notificationSetting(){
    return view('ExhibitorPages.notificationSetting');
}
    
>>>>>>> e48a78e1b5ecd0d5e288b099eee3ea8da129a605
}
