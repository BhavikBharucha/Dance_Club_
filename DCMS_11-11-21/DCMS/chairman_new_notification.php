<?php
session_start();
ob_start();
if($_SESSION['chairmanpages']!=1){
    header("Location:index.php");
}
include './mail/function.php';
include './mail/smtp/PHPMailerAutoload.php';

try {
    include './connection.php';
} catch (Exception $ex) {
    header("Location: error.php");
}
include './sendMail.php';
?>
<html>
    <head>
        <title>New Notification | Dance Club Management System</title>
        <?php
        include './head.php';
        ?>
        <style>
            #city{
                width: 260px;
                height: 38px;
                border: 1px solid lightgray;
                height: 37px;
                border-radius: 5px;
                color: gray;
            }

            #txtlname{
                width: 260px;
                height: 38px;
                border: 1px solid lightgray;
                height: 37px;
                border-radius: 5px;
                border-radius: 5px;
            }

            #gender{
                height: 37px;
                width: 250px;
                border: 1px solid lightgray;height: 37px;
                border-radius: 5px;
                color: gray;
            }

            #email{
                width: 420px;
                height: 37px;
                border: 1px solid lightgray;
                border-radius: 5px;
            }

            #password{
                width: 395px;
                height: 37px;
                border: 1px solid lightgray;
                border-radius: 5px;
            }

            h1{
                font-weight: bold;
                font-size: 29px;
                text-align: left;
            }
            #address{
                width: 260px;
                height: 38px;
                border: 1px solid lightgray;
                height: 37px;
                border-radius: 5px;
                border-radius: 5px;
            }
        </style>
    </head>
    <body>
        <?php
        include './sidebar.php';
        ?>

        <div id="right-panel" class="right-panel">
            <?php
            include './header.php';
            ?>

            <div class="content" >
                <section>
                    <center>
                        <form action="" method="POST"  enctype="multipart/form-data" style="border: 3px solid white ; width: 886px; box-shadow: 1px 1px 7px 7px;padding: 22px; border-radius: 7px; margin-top: 50px; margin-bottom: 50px;">
                            <h1>New Notification</h1>
                            <div style="border: 1px solid black;">

                            </div><br>
                            <div class="row">
                                <div class="col-md-6"> 
                                    <input type="text" id="txtfname" name="txtsubject" title="Enter Subject !" placeholder="Subject" required style=" padding: 5px; width: 260px; border: 1px solid lightgray;border-radius: 5px;"><br>
                                </div>
                                <div class="col-md-6">
                                    <textarea name="description" id="address"  placeholder="Description" rows="2" cols="10"required=""></textarea>
                                </div>

                            </div><br>
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="datetime-local" style="width: 246px;" name="date" required style=" padding: 5px; width: 260px;"><br>
                                </div>
                                <div class="col-md-6"> 
                                    <textarea name="venue" id="address"  placeholder="Venue" rows="2" cols="10"required=""></textarea>
                                </div>
                            </div><br> 
                            <div class="row">
                                <div class="col-md-6"> 
                                    <label style="margin-left:10px;">Attachment(s):</label>
                                    <input type="file" name="attachment" title="PDF file only" required="" style="width:212px;">
                                </div>
                                <div class="col-md-6"> 
                                    <label style="margin-left: -36px;">Recipients:</label>
                                    <input type="file" name="recipients" title="CSV file only" required=""style="width:212px;">
                                </div>
                            </div>

                            <center><br>
                                <input type="submit" id="btnadd" name="btnpost" value="Post" class="btn btn-info" style="width: 151px;"><br><br>
                            </center>
                        </form>
                    </center>
                </section>
            </div>

            <div class="clearfix"></div>
            <footer class="site-footer">
                <?php
                include './footer.php';
                ?>
            </footer>
        </div>

        <?php
        include './script.php';
        ?>
    </body>
</html>
<?php
//if (isset($_POST['btnpost'])) {
//    $from_attachment = $_FILES['attachment']['tmp_name'];
//    $attachment_dest = "notifications/" . basename($_FILES['attachment']['tmp_name']);
//    $file_size = $_FILES['attachment']['size'];
//    $a = $_FILES["attachment"]["name"];
//    $temp_a = explode(".", $a);
//    $extension_attachment = end($temp_a);
//    echo $extension_attachment . "<br>";
//    $c = $_FILES["recipients"]["name"];
//    $temp = explode(".", $c);
//    $ext_c = end($temp);
//    echo $ext_c . "<br>";
//    if (!empty($_FILES["attachment"]["name"]) && !empty($_FILES["recipients"]["name"])) {
//        if ($extension_attachment == "pdf" && $ext_c == "csv") {
//            if ($file_size > 2097152) {
//                echo "<script> alert('File size must be excately 2 MB')</script> ";
//            } else {
//                $q = "INSERT INTO tblnotification(subject, description, datetime, venue, attachments) VALUES ('" . $_POST['txtsubject'] . "' , '" . $_POST['description'] . "' , '" . $_POST['date'] . "' , '" . $_POST['venue'] . "' , '$attachment_dest')";
//                echo $q;
//                $r = mysqli_query($con, $q);
//                if ($r) {
//                    $input_filename = $_FILES['recipients']['tmp_name'];
//                    $input_filesize = filesize($input_filename);
//                    if (($handle = fopen($input_filename, "r")) === FALSE) {
//                        die('Error opening file');
//                    }
//
//                    $body = "<html>
//                            <body> 
//                                <table> 
//                                    <tr> 
//                                        <td> Description </td> 
//                                        <td> '" . $_POST['description'] . "' </td>
//                                    </tr> 
//                                    <tr> 
//                                        <td> Venue </td> 
//                                        <td> '" . $_POST['venue'] . "' </td> 
//                                    </tr> 
//                                    <tr> 
//                                        <td> Date and Time </td> 
//                                        <td> '" . $_POST['date'] . "' </td> 
//                                    </tr>
//                                    <tr>
//                                        <td> Attachment </td>
//                                        <td> <a href='localhost/dcms/download.php?file_location='$attachment_dest'' style='text-decoration:none;' >Download</a> </td>
//                                    </tr>
//                                </table> 
//                            </body>
//                           </html>";
//                    //$headers = fgetcsv($handle, $input_filesize, ‘,’);
//
//                    $cardCodes = array();
//
//                    while ($row = fgetcsv($handle, $input_filesize, ",")) {
//
//                        $cardCodes[] = $row;
//                    }
//
//                    foreach ($cardCodes as $cardCodes1) {
//
//// multiple recipients
//
//                        $to = $cardCodes1[0];
//
//// subject
//
//                        $subject = $_POST['txtsubject'];
//
//// To send HTML mail, the Content-type header must be set
//
//                        $headers = 'MIME-Version: 1.0' . "\r\n";
//
//                        $headers .= 'Content-type: text / html;
//                        charset = iso - 8859 - 1' . "\r\n";
//
//// Additional headers
//
//                        $headers .= 'To: <' . $cardCodes1[0] . '>' . "\r\n";
//
//                        $headers .= 'From: Dance Club Management System<DCMS>' . "\r\n";
//
//                        if (filter_var($to, FILTER_VALIDATE_EMAIL)) {
//// Mail it
//                            send_email($to, $body, $subject, $headers);
//                            $_SESSION['file_location']=$attachment_dest;
//                            echo "<script LANGUAGE='JavaScript'> window.alert('Message Sent !'); window.location.href='chairman_manage_notification.php'; </script>";
//                        }
//                    }
//                } else {
//                    echo "<script> alert('Something Went Wrong !') </script>";
//                }
//            }
//        } else {
//            //echo "oops";
//            echo "<script> alert('Error uploading ! Only PDF files are allowed !') </script> ";
//        }
//    } else {
//        echo "<script> alert('No files selected.') </script>";
//    }
//}
//
//
    