<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotifyController extends Controller
{
    //
    public function selectNotifyOptions(Request $request)
    {
        // $user = session('user');
        // $notify = new Notify;
        
        // $options = $request->options; // Assuming $request is the request object
       

        // // Check if email is selected
        // if (in_array('email', $options)) {
        //     $notify->email_service = 'enabled';
            
        // }

        // // Check if SMS is selected
        // if (in_array('sms', $options)) {
        //     $notify->sms_service = 'enabled';
            
        // }

        // // Check if WhatsApp is selected
        // if (in_array('whatsapp', $options)) {
        //     $notify->whatsapp_service = 'enabled';
            
        // }

        // $notify->tbl_user_id = $user->tbl_user_id;
        
        // $notify->add_date = Date::now()->toDateString();
        // $notify->add_time = Date::now()->toTimeString();
        // $notify->save();

        return response()->json($request);
    }
}
