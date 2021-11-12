<?php
ob_start();
session_start();
try {
    include './connection.php';
} catch (Exception $e) {
    header("Location:error.php");
}
include('./mail/function.php');
include('./mail/smtp/PHPMailerAutoload.php');

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Forgot Password | Dance Club Management System</title>
        <link rel="stylesheet" href="assets/css/login_css.css">
    </head>
    <body>
        <form method="post" style="margin-top:99px;">
            <h1>Forgot Password</h1>
            <div class="inset">
                <p>
                    <label for="email">EMAIL ADDRESS</label>
                    <input type="email" name="email" id="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" title="Please Enter Valid E-mail" required>
                </p>

                <center><input type="submit" name="btnlogin" id="go" value="Send Mail"></center>

            </div>

        </form>
        <?php
        if (isset($_POST['btnlogin'])) {
            $email = $_POST['email'];
            $q = "SELECT COUNT(id) as total FROM tblmember WHERE email='$email'";
//            echo $q;
            $r = mysqli_query($con, $q);
            $row = mysqli_fetch_assoc($r);
//            echo "total = " . $row['total'] . "<br>";
            if ($row['total'] > 0) {
//                echo "thay che<br>";
                $to = $email;
                $subject = "Request Password Reset.";
                $link = "<a href='localhost/DCMS/resetpassword.php?email=" . $email . "'>Click here to reset your password</a>";
                $html = "$link <br><p>If you have'nt requested to reset the password do not respond !</p>";
                send_email($email, $html, $subject);
                header("Location:index.php");
            }
        }
        ?>
    </body>
</html>
