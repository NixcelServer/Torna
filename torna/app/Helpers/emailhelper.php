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

    // public static function sendEmail($company)
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
            
    //         // Set email subject and body
            
            
    //         //$mail->Body  = $message;

    //         //$filePath = $emailCredential->email_attachment;
    //         // dd($filePath);
    //         // $absolutePath = storage_path('app/' . $filePath);
            
    //         // //$absolutePath = public_path($filePath);
            
    //         // $mail->addAttachment($absolutePath);
    //         //dd($filePath);
    //         // Check if attachment file exists
    //     // if ($filePath && file_exists($filePath)) {
    //         // Attach the file using its path
    //         //$mail->addAttachment($filePath);
    //     // } else {
    //         // Attachment file not found or path is empty
    //         //dd($filePath);
    //     //     return response()->json(['error' => 'Attachment file not found'], 500);
    //     // }

    //     // $filePath = $emailCredential->email_attachment;
    //     // if ($filePath) {
    //     //     // Get the absolute path of the attachment
    //     //     $absolutePath = storage_path('app/' . $filePath);
    //     //     // Attach the file using its absolute path
    //     //     $mail->addAttachment($absolutePath);
    //     // }
            
    //         $mail->send();
        
           
    //         return response()->json(['message' => 'Email sent successfully'], 200);
    //     // } catch (Exception $e) {
    //     //     return response()->json(['error' => 'Failed to send email: ' . $mail->ErrorInfo], 500);
    //     // }
    // }

    public static function sendEmail($recipientEmailId , $id , $documents)
    {
       //dd($id);
       
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
   
}    

?>