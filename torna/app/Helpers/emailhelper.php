<?php

namespace App\Helpers;
use Illuminate\Http\Request;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Illuminate\Support\Facades\Config;
use App\Models\EmailSetting;
use Dompdf\Dompdf;
use Smalot\PdfParser\Parser;





class EmailHelper{

    // public static function senEmail($company)
    // {
    //     //ini_set('max_execution_time', 120);
    //     // try {
    //         // Fetch email credentials from the database
    //         // $emailCredential = EmailCredential::find($id);
    //         //$emailCredentials = EmailCredential::skip(1)->take(1)->first();
            
    //         // Check if credentials are found
    //         if (!$company) {
    //             return response()->json(['error' => 'No email credentials found'], 500);
    //         }
            
    //         // Create a new PHPMailer instance
    //         $mail = new PHPMailer(true); // Enable exceptions

    //         // Set SMTP server settings
    //         $mail->isSMTP();
    //         $mail->Host = 'smtp.gmail.com';
    //         $mail->Port = '587';
    //         $mail->SMTPAuth = true;
    //         $mail->Username = 'jagtapsaurabh74@gmail.com';
    //         $mail->Password = 'isnvhwsotwkmdswm';

    //         Config::set('mail.username', $mail->Username);
    //         Config::set('mail.password', $mail->Password);
    //         Config::set('mail.host', $mail->Host);
    //         Config::set('mail.port', $mail->Port);

            
    //         // Set sender and recipient
    //         $mail->setFrom($mail->Username, 'Torna');
           
    //         $recipientEmail = $company->email;
    //         $mail->addAddress($recipientEmail);
           

    //         $subject = "Torna Exhibitions";
    //         $mail->Subject = $subject;

    //         $message = "Congratulations! Your registration for ". $company->company_name ." is complete. Welcome aboard! 🎉 ";
    //         $mail->isHTML(true); // Set email format to HTML
    //         $mail->Body = $message;
    
    //         $mail->send();
        
           
    //         return response()->json(['message' => 'Email sent successfully'], 200);
    //     // } catch (Exception $e) {
    //     //     return response()->json(['error' => 'Failed to send email: ' . $mail->ErrorInfo], 500);
    //     // }
    // }

    public static function sendEmail($recipientEmailId = null, $id = null, $documents = null,$company = null, $password = null)
    {
        
       //dd($id);
       if (is_null($documents) && !is_null($company)) {
        
        // Send email using default mail address
        if (!$company) {
            return response()->json(['error' => 'No email credentials found'], 500);
        }
        $emailCredential = EmailSetting::where('tbl_user_id','1')->first();


        // Create a new PHPMailer instance
        $mail = new PHPMailer(true); // Enable exceptions

        

        // Set SMTP server settings
         $mail->isSMTP();
            $mail->Host = $emailCredential->smtp;
            $mail->Port = $emailCredential->port;
            $mail->SMTPAuth = true;
            $mail->Username = $emailCredential->username;
            $mail->Password = $emailCredential->password;

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

        //$message = "Congratulations! Your registration for ". $company->company_name ." is complete. Welcome aboard! "." Your login credentials are:\nEmail: ". $company->email ."\nPassword: ". $password;
        $message = "Congratulations! Your registration for " . $company->company_name . " is complete. Welcome aboard!<br><br>";
        $message .= "Your login credentials are:<br>";
        $message .= "Email: " . $company->email . "<br>";
        $message .= "Password: " . $password;
        $mail->isHTML(true); // Set email format to HTML
        $mail->Body = $message;

        $mail->send();
    
       
        return response()->json(['message' => 'Email sent successfully'], 200);
    }
       
        // try {
            // Fetch email credentials from the database
            $emailCredential = EmailSetting::where('tbl_comp_id',$id)->first();
            //$emailCredentials = EmailCredential::skip(1)->take(1)->first();
          //  dd($emailCredential);
            // Check if credentials are found
            if (!$emailCredential) {
                return response()->json(['error' => 'No email credentials found'], 500);
            }
            
            // Create a new PHPMailer instance
            $mail = new PHPMailer(true); // Enable exceptions

            // Set SMTP server settings
            $mail->isSMTP();
            $mail->Host = $emailCredential->smtp;
            $mail->Port = $emailCredential->port;
            $mail->SMTPAuth = true;
            $mail->Username = $emailCredential->username;
            $mail->Password = $emailCredential->password;
            
            // Set sender and recipient
           $mail->setFrom($emailCredential->username, 'Your Name');
           
            $recipientEmail = $recipientEmailId;
            $mail->addAddress($recipientEmail);
           

            $subject = "Thank you";
            $mail->Subject = $subject;

            $message = "Thank You for visitin us ";
            $mail->isHTML(true); // Set email format to HTML
            $mail->Body = $message;
           // dd($mail);

          // $dompdf = new Dompdf();
            
            foreach ($documents as $document) {
                $binaryData = $document->document_attachment;

                // Generate a unique filename for each document
                $fileName = 'document_' . $document->tbl_doc_id . '.pdf';
            
                // Create the directory if it doesn't exist
                $directoryPath = storage_path('app/tmp/');
                if (!file_exists($directoryPath)) {
                    mkdir($directoryPath, 0777, true);
                }
            
                // Create the file path where we want to save the PDF file
                $filePath = $directoryPath . $fileName;
            
                // Write the binary data to a PDF file
                file_put_contents($filePath, $binaryData);


                $mail->addAttachment($filePath, $fileName);



                // Retrieve the binary data from the blob field (assuming $document represents the model instance for each document)
        // Retrieve the binary data from the blob field (assuming $document represents the model instance for each document)
        // $binaryData = $document->document_attachment;

        // // Create a parser instance
        // $parser = new Parser();
    
        // // Parse the binary data to extract text content
        // $pdf = $parser->parseContent($binaryData);
    
        // // Get the text content from the PDF
        // $textContent = $pdf->getText();
    
        // // Now you have the text content of the PDF, you can use it to generate HTML
        // // For example, you can wrap the text content in HTML tags
        // $htmlContent = "<html><body>{$textContent}</body></html>";
    
        // // Now you can load the HTML content into Dompdf
        // $dompdf = new Dompdf();
        // $dompdf->loadHtml($htmlContent);
    
        // // Render the PDF
        // $dompdf->render();
    
        // // Get the PDF content as a string
        // $pdfContent = $dompdf->output();
    
        // // Attach the PDF content to the email
        // $mail->addStringAttachment($pdfContent, 'document_' . $document->id . '.pdf');
    }
        
            
           
            $mail->send();

            // foreach ($documents as $document) {
            //     $fileName = 'document_' . $document->tbl_doc_id . '.pdf';
            //     $filePath = storage_path('app/tmp/' . $fileName);
            //     unlink($filePath);
            // }
        
           
            return response()->json(['message' => 'Email sent successfully'], 200);
        
    }



    public static function sendAdminEmail($company,$role=null)
{
    // Fetch admin email from configuration or database
    $adminEmail = 'harshal.mandale@nixcelsoft.com'; // Change this to your actual admin email address

    // Create a new PHPMailer instance
    $mail = new PHPMailer(true); // Enable exceptions

    // Set SMTP server settings
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com'; // Change this to your SMTP host
    $mail->Port = '587'; // Change this to your SMTP port
    $mail->SMTPAuth = true;
    $mail->Username = 'jagtapsaurabh74@gmail.com'; // Change this to your SMTP username
    $mail->Password = 'isnvhwsotwkmdswm'; // Change this to your SMTP password

    // You can also fetch SMTP settings from a database if needed

    // Set sender and recipient
    $mail->setFrom($mail->Username, 'Torna');
    $mail->addAddress($adminEmail);
    
    if($role == '3'){
        $subject = "New Exhibitor Registration";
        $message = "A new exhibitor has registered:\n\n";
    }

    else{
        $subject = "New Organizer Registration";
        $message = "A new organizer has registered:\n\n";
    }
    
    $mail->Subject = $subject;

    
    $message .= "Company Name: " . $company->company_name . "\n";
    $message .= "Email: " . $company->email . "\n";
    $message .= "Contact No: " . $company->contact_no . "\n";

    $mail->isHTML(false); // Set email format to plain text
    $mail->Body = $message;

    $mail->send();

    return response()->json(['message' => 'Admin Email sent successfully'], 200);
}

   
}    

?>