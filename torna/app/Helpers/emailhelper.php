<?php

namespace App\Helpers;
use Illuminate\Http\Request;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Illuminate\Support\Facades\Config;



class EmailHelper{

    public static function sendEmail($company)
    {
        //ini_set('max_execution_time', 120);
        // try {
            // Fetch email credentials from the database
            // $emailCredential = EmailCredential::find($id);
            //$emailCredentials = EmailCredential::skip(1)->take(1)->first();
            
            // Check if credentials are found
            if (!$company) {
                return response()->json(['error' => 'No email credentials found'], 500);
            }
            
            // Create a new PHPMailer instance
            $mail = new PHPMailer(true); // Enable exceptions

            // Set SMTP server settings
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->Port = '587';
            $mail->SMTPAuth = true;
            $mail->Username = 'jagtapsaurabh74@gmail.com';
            $mail->Password = 'isnvhwsotwkmdswm';

            Config::set('mail.username', $mail->Username);
            Config::set('mail.password', $mail->Password);
            Config::set('mail.host', $mail->Host);
            Config::set('mail.port', $mail->Port);

            
            // Set sender and recipient
            $mail->setFrom($mail->Username, 'Torna');
           
            $recipientEmail = $company->email;
            $mail->addAddress($recipientEmail);
           

            $subject = "Torna Exhibitions";
            $mail->Subject = $subject;

            $message = "Congratulations! Your registration for ". $company->company_name ." is complete. Welcome aboard! 🎉 ";
            $mail->isHTML(true); // Set email format to HTML
            $mail->Body = $message;
            
            // Set email subject and body
            
            
            //$mail->Body  = $message;

            //$filePath = $emailCredential->email_attachment;
            // dd($filePath);
            // $absolutePath = storage_path('app/' . $filePath);
            
            // //$absolutePath = public_path($filePath);
            
            // $mail->addAttachment($absolutePath);
            //dd($filePath);
            // Check if attachment file exists
        // if ($filePath && file_exists($filePath)) {
            // Attach the file using its path
            //$mail->addAttachment($filePath);
        // } else {
            // Attachment file not found or path is empty
            //dd($filePath);
        //     return response()->json(['error' => 'Attachment file not found'], 500);
        // }

        // $filePath = $emailCredential->email_attachment;
        // if ($filePath) {
        //     // Get the absolute path of the attachment
        //     $absolutePath = storage_path('app/' . $filePath);
        //     // Attach the file using its absolute path
        //     $mail->addAttachment($absolutePath);
        // }
            
            $mail->send();
        
           
            return response()->json(['message' => 'Email sent successfully'], 200);
        // } catch (Exception $e) {
        //     return response()->json(['error' => 'Failed to send email: ' . $mail->ErrorInfo], 500);
        // }
    }

   
}    

?>