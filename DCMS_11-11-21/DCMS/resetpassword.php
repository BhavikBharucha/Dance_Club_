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
        <title>Reset Password | Dance Club Management System</title>
        <link rel="stylesheet" href="assets/css/login_css.css">
    </head>
    <body>
        <form method="post" style="margin-top:99px;">
            <h1>Reset Password</h1>
            <div class="inset">
                <p>
                    <label for="email">New Password</label>
                    <input type="password" name="password" id="password"  title="Please Enter New Password" required>
                </p>
                <p>
                    <label for="email">Confirm Password</label>
                    <input type="password" name="confirmpassword" id="password"  title="Please Enter New Password" required>
                </p>

                <center><input type="submit" name="btnreset" id="go" value="RESET"></center>

            </div>

        </form>
        <?php
        if (isset($_POST['btnreset'])) {
            if ($_POST['password'] == $_POST['confirmpassword']) {
                $email = $_REQUEST['email'];
                $p = $_POST['confirmpswd'];
                $h_p = password_hash($p, PASSWORD_DEFAULT);
                $q = "UPDATE tblmember SET password='$h_p' WHERE email='$email'";
                $r = mysqli_query($con, $q);
                if ($r) {
                    header("Location:index.php");
                }
            }else{
                echo "<script> alert('Confirm Password did'nt match !') </script>";
            }
        }
        ob_flush();
        ?>
    </body>
</html>
