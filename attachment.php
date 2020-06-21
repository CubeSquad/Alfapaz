<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);

    $name_of_uploaded_file =basename($_FILES['uploaded_file']['name']);
    $formData = $_POST;
    getFile( $name_of_uploaded_file, $formData );

    function getFile( $filename , $formData ) {

        $allowedExts = array("csv","pdf","jpg","png","JPG","PNG","jpeg","JPEG");
        $temp = explode(".", $_FILES["uploaded_file"]["name"]);
        $extension = end($temp);
        $mimes = array('application/vnd.ms-excel','text/plain','text/csv','text/tsv','application/jpg','image/jpg', 'image/jpeg', 'image/png','image/gif');

        if (in_array($_FILES['uploaded_file']['type'],$mimes )
        && ($_FILES["uploaded_file"]["size"] < 2000000)
        && in_array($extension, $allowedExts))
          {
          if ($_FILES["uploaded_file"]["error"] > 0)
            {
            echo "Return Code: " . $_FILES["uploaded_file"]["error"] . "<br>";
            }
          else
            {      
                sendMailAsAttachment($_FILES["uploaded_file"]["tmp_name"],$_FILES["uploaded_file"]["name"],$formData);         
            }
          }
        else
          {
          echo "Invalid file " . $extension . " {} " . $_FILES['uploaded_file']['type'];
          //echo in_array($_FILES['uploaded_file']['type'],$mimes );
          }  
    }



//This function accepts post data on form submissions and prepare the email message from the form data.

    function prepareEmail( $formData ) {

        // email fields: to, from, subject, and so on
        $to = "Wwebmaster@alfapaz.com";
        $from = "webmaster@alfapaz.com"; 
        $subject =""; 
        $message = "Uploaded File\n";
        $message .= "Nombre :". $formData['name']."\n";
        $message .= "Dirección de correo :". $formData['email']."\n";
        $headers = "Remitente: $from";

        // boundary 
        $semi_rand = md5(time()); 
        $mime_boundary = "==Multipart_Boundary_x{$semi_rand}x"; 

        // headers for attachment 
        $headers .= "\nMIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"{$mime_boundary}\""; 

        // multipart boundary 
        $message .= "This is a multi-part message in MIME format.\n\n" . "--{$mime_boundary}\n" . "Content-Type: text/plain; charset=\"iso-8859-1\"\n" . "Content-Transfer-Encoding: 7bit\n\n" . $message . "\n\n"; 
        $message .= "--{$mime_boundary}\n";

        $emailData = array (
            'to' => $to,
            'from' => $from,
            'subject' => $subject,
            'headers' => $headers,
            'message' => $message
        );

        return $emailData;

    }

    function prepareAttachment( $filename ,$fileorgname) {
        $semi_rand = md5(time()); 
        $mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";
        $attachContent = '';
        $file = fopen($filename,"rb");
        $data = fread($file,filesize($filename));
        fclose($file);
        $cvData = chunk_split(base64_encode($data));
        $attachContent .= "Content-Type: {\"application/octet-stream\"};\n" . " name=\"$fileorgname\"\n" . 
        "Content-Disposition: attachment;\n" . " filename=\"$fileorgname\"\n" . 
        "Content-Transfer-Encoding: base64\n\n" . $cvData . "\n\n";
        $attachContent .= "--{$mime_boundary}\n"; 
        return $attachContent;

    }

    function sendMailAsAttachment( $filename, $fileorgname, $formData ) {

        $emailData = prepareEmail( $formData );
        $attachContent = prepareAttachment( $filename,$fileorgname );
        $message = $emailData['message'].$attachContent;
        $ok = @mail($emailData['to'], $emailData['subject'], $message, $emailData['headers']); 
        if ($ok) { 
                echo "<p>mail sent to " . $emailData['to'] . "!</p>"; 
        } else { 
                echo "<p>mail could not be sent!</p>"; 
        } 
    }



?>