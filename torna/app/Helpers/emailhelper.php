<?php

namespace App\Helpers;
use Illuminate\Http\Request;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Illuminate\Support\Facades\Config;
use App\Models\EmailSetting;
use Dompdf\Dompdf;
use Smalot\PdfParser\Parser;
use Illuminate\Support\Facades\Storage;
use XLSXWriter;







class EmailHelper{
    public static function sendEmail($recipientEmailId = null, $id = null, $documents = null,$company = null, $password = null)
    {
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
            // Fetch email credentials from the database
            $emailCredential = EmailSetting::where('tbl_comp_id',$id)->first();
            
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

    }
        // Send the email
if ($mail->send()) {
    // Clean up temporary files
    foreach ($documents as $document) {
        $fileName = 'document_' . $document->tbl_doc_id . '.pdf';
        $filePath = $directoryPath . $fileName;
        
        if (file_exists($filePath)) {
            unlink($filePath);
        }
    }
    
    // Clean up logo path if necessary
    if (isset($logoPath) && file_exists($logoPath)) {
        unlink($logoPath);
    }
} else {
    // Handle the error
    echo 'Email could not be sent.';
}
            //$mail->send();        
            return response()->json(['message' => 'Email sent successfully'], 200);
        
    }



    public static function sendAdminEmail($company,$role=null)
{
    // Fetch admin email from configuration or database
    $adminEmail = 'abhitryai@gmail.com'; // Change this to your actual admin email address

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

public static function sendOrganizerEmail($user)
{
    // Fetch admin email from configuration or database
    $adminEmail = 'abhitryai@gmail.com'; // Change this to your actual admin email address

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
    
    
    $subject = "New Exhibitor Participated in your Exhibition";
    $message = "New Exhibitor Participated in your Exhibition:\n\n";
   
    
    $mail->Subject = $subject;

    
    $message .= "Exhibitor Name: " . $user->first_name . "\n";
    $message .= "Exhibitor Email: " . $user->email . "\n";
    $message .= "Exhibitor Contact No: " . $user->contact_no . "\n";

    $mail->isHTML(false); // Set email format to plain text
    $mail->Body = $message;

    $mail->send();

    return response()->json(['message' => 'Organizer Email sent successfully'], 200);
}

public static function sendOtp($otp,$email)
{
    // Fetch admin email from configuration or database
   // Change this to your actual admin email address

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
    $mail->addAddress($email);
    
    
        $subject = "Email Authentication";
        $message = "Your otp is \n\n" . $otp. " " ;
    
    
    $mail->Subject = $subject;

    
    // $message .= "Company Name: " . $company->company_name . "\n";
    // $message .= "Email: " . $company->email . "\n";
    // $message .= "Contact No: " . $company->contact_no . "\n";

    $mail->isHTML(false); // Set email format to plain text
    $mail->Body = $message;

    $mail->send();

    return response()->json(['message' => 'OTP sent successfully'], 200);
}

public static function sendCollectDataEmail($user, $excelFilePath)
{
    $adminEmail = session('user')->email;

    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = '587';
    $mail->SMTPAuth = true;
    $mail->Username = 'jagtapsaurabh74@gmail.com';
    $mail->Password = 'isnvhwsotwkmdswm';

    $mail->setFrom($mail->Username, 'Torna');
    $mail->addAddress($adminEmail);
    
    $subject = "New Exhibitor Participated in your Exhibition";
    $message = "New Exhibitor Participated in your Exhibition:\n\n";
    
    $mail->Subject = $subject;
    $message .= "Exhibitor Name: " . $user->first_name . "\n";
    $message .= "Exhibitor Email: " . $user->email . "\n";
    $message .= "Exhibitor Contact No: " . $user->contact_no . "\n";

    $mail->isHTML(false);
    $mail->Body = $message;

    $mail->addAttachment(storage_path('app/' . $excelFilePath));

    $mail->send();

    return response()->json(['message' => 'Organizer Email sent successfully'], 200);
}


public static function shareExhibitionEmail($emails, $user, $ExhibitionDetails, $exhibitionId)
{
    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = '587';
    $mail->SMTPAuth = true;
    $mail->Username = 'jagtapsaurabh74@gmail.com';
    $mail->Password = 'isnvhwsotwkmdswm';

    $mail->setFrom($mail->Username, 'Connexha');

    // Add all participant emails as recipients
    foreach ($emails as $email) {
        $mail->addAddress($email);
    }

    $subject = "Exciting News: New Upcoming Exhibition!";
    $mail->Subject = $subject;

    $message = "Hello Exhibitor,\n\n";
    $message .= "We are thrilled to share the exciting news that a new exhibition is coming! All details are below, please do check!\n\n";

    // Filter the exhibition details based on the provided exhibition ID
    $relevantExhibition = $ExhibitionDetails->where('tbl_ex_id', $exhibitionId)->first();

    if ($relevantExhibition) {
        $message .= "Exhibition Name: " . $relevantExhibition->exhibition_name . "\n";
        $message .= "Exhibition From date: " . $relevantExhibition->ex_from_date . "\n";
        $message .= "Exhibition To date: " . $relevantExhibition->ex_to_date . "\n";
        $message .= "Exhibition Start Time: " . $relevantExhibition->start_time . "\n";
        $message .= "Exhibition End Time: " . $relevantExhibition->end_time . "\n";
        $message .= "Exhibition Venue: " . $relevantExhibition->venue . "\n";
        $message .= "Exhibition Website: " . $relevantExhibition->exhibition_website . "\n";
        $message .= "Exhibition Register link: " . $relevantExhibition->registration_url . "\n\n";

        $directoryPath = storage_path('app/tmp/');

        if (!file_exists($directoryPath)) {
            mkdir($directoryPath, 0777, true);
        }

        // Check if attachment document exists
        if (!empty($relevantExhibition->attach_document)) {
            $binaryData = $relevantExhibition->attach_document;
            $fileName = 'Exhibition Document.pdf';
            $filePath = $directoryPath . $fileName;
            file_put_contents($filePath, base64_decode($binaryData));

            $mail->addAttachment($filePath, $fileName);
        }

        // Check if company logo exists
        if (!empty($relevantExhibition->company_logo)) {
            $logoData = $relevantExhibition->company_logo;
            $logoName = 'Exhibition Image.png';
            $logoPath = $directoryPath . $logoName;
            file_put_contents($logoPath, base64_decode($logoData));

            $mail->addAttachment($logoPath, $logoName);
        }
    } else {
        $message .= "No exhibition details found for the provided ID.\n\n";
    }

    $message .= "Exhibition is Coming soon, don't miss the opportunity to participate!\n";
    $message .= "Best regards,\nConnexha Team";

    $mail->isHTML(false);
    $mail->Body = $message;
    $mail->send();

    // Clean up temporary files
    if (isset($filePath) && file_exists($filePath)) {
        unlink($filePath);
    }
    if (isset($logoPath) && file_exists($logoPath)) {
        unlink($logoPath);
    }

    return response()->json(['message' => 'Organizer Email sent successfully'], 200);
}

}    

?>