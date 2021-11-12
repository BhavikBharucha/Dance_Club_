<?php

if (isset($_POST['btnpost'])) {
    $from_attachment = $_FILES['attachment']['tmp_name'];
    $attachment_dest = "notifications/" . basename($_FILES['attachment']['tmp_name']);
    $file_size = $_FILES['attachment']['size'];
    $a = $_FILES["attachment"]["name"];
    $temp_a = explode(".", $a);
    $extension_attachment = end($temp_a);
    //echo $extension_attachment . "<br>";
    $c = $_FILES["recipients"]["name"];
    $temp = explode(".", $c);
    $ext_c = end($temp);
    //echo $ext_c . "<br>";
    if (!empty($_FILES["attachment"]["name"]) && !empty($_FILES["recipients"]["name"])) {
        if ($extension_attachment == "pdf" && $ext_c == "csv") {
            if ($file_size > 2097152) {
                echo "<script> alert('File size must be excately 2 MB')</script> ";
            } else {
                $q = "INSERT INTO tblnotification(subject, description, datetime, venue, attachments) VALUES ('" . $_POST['txtsubject'] . "' , '" . $_POST['description'] . "' , '" . $_POST['date'] . "' , '" . $_POST['venue'] . "' , '$attachment_dest')";
                echo $q;
                $r = mysqli_query($con, $q);
                if ($r) {
                    $input_filename = $_FILES['recipients']['tmp_name'];
                    $input_filesize = filesize($input_filename);
                    if (($handle = fopen($input_filename, "r")) === FALSE) {
                        die('Error opening file');
                    }

                    $cardCodes = array();

                    while ($row = fgetcsv($handle, $input_filesize, ",")) {

                        $cardCodes[] = $row;
                    }

                    foreach ($cardCodes as $cardCodes1) {

// multiple recipients


                        $filenameee = $_FILES['attachment']['name'];
                        $fileName = $_FILES['attachment']['tmp_name'];
//                        $name = $_POST['name'];
//                        $email = $_POST['email'];
//                        $usermessage = $_POST['message'];
                        $body_content="<html>
                            <body> 
                                <table> 
                                    <tr> 
                                        <td> Description : </td> 
                                        <td> '" . $_POST['description'] . "' </td>
                                    </tr> 
                                    <tr> 
                                        <td> Venue : </td> 
                                        <td> '" . $_POST['venue'] . "' </td> 
                                    </tr> 
                                    <tr> 
                                        <td> Date and Time  : </td> 
                                        <td> '" . $_POST['date'] . "' </td> 
                                    </tr>
                                </table> 
                            </body>
                           </html>";
                        
                        $message = $body_content;

                        $subject = $_POST['txtsubject'];
                        $fromname = "Dance Club Management System";
                        $fromemail = '19bmiit012.com';  //if u dont have an email create one on your cpanel

                        $mailto = $cardCodes1[0];  //the email which u want to recv this email




                        $content = file_get_contents($fileName);
                        $content = chunk_split(base64_encode($content));

// a random hash will be necessary to send mixed content
                        $separator = md5(time());

// carriage return type (RFC)
                        $eol = "\r\n";

// main header (multipart mandatory)
                        $headers = "From: " . $fromname . " <" . $fromemail . ">" . $eol;
                        $headers .= "MIME-Version: 1.0" . $eol;
                        $headers .= "Content-Type: multipart/mixed; boundary=\"" . $separator . "\"" . $eol;
                        $headers .= "Content-Transfer-Encoding: 7bit" . $eol;
                        $headers .= "This is a MIME encoded message." . $eol;

// message
                        $body = "--" . $separator . $eol;
                        $body .= "Content-Type: text/html; charset=\"iso-8859-1\"" . $eol;
                        $body .= "Content-Transfer-Encoding: 8bit" . $eol;
                        $body .= $message . $eol;

// attachment
                        $body .= "--" . $separator . $eol;
                        $body .= "Content-Type: application/octet-stream; name=\"" . $filenameee . "\"" . $eol;
                        $body .= "Content-Transfer-Encoding: base64" . $eol;
                        $body .= "Content-Disposition: attachment" . $eol;
                        $body .= $content . $eol;
                        $body .= "--" . $separator . "--";

//SEND Mail
                        if (mail($mailto, $subject, $body, $headers)) {
                            echo "<script LANGUAGE='JavaScript'> window.alert('Message Sent !'); window.location.href='chairman_manage_notification.php'; </script>";
                        } else {
                            echo "mail send ... ERROR!";
                            //print_r(error_get_last());
                        }
                    }
                }
            }
        } else {
            echo "<script> alert('Error uploading ! Only PDF files are allowed !') </script> ";
        }
    } else {
        echo "<script> alert('No files selected.') </script>";
    }
}