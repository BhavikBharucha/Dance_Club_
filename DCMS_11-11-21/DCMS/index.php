<?php
ob_start();
session_start();
$_SESSION['flag'] = 0;
$_SESSION['adminpages'] = 0;
$_SESSION['chairmanpages'] = 0;
$_SESSION['coChairmanpages'] = 0;
$_SESSION['facultypages']=0;
try {
    include './connection.php';
} catch (Exception $e) {
    header("Location:error.php");
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login | Dance Club Management System</title>
        <link rel="stylesheet" href="assets/css/login_css.css">
    </head>
    <body>
        <form method="post" style="margin-top:99px;">
            <h1>Log in</h1>
            <div class="inset">
                <p>
                    <label for="email">EMAIL ADDRESS</label>
                    <input type="email" name="email" id="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" title="Please Enter Valid E-mail" required>
                </p>
                <p>
                    <label for="password">PASSWORD</label>
                    <input type="password" name="password" id="password" required>
                </p>
                <center><input type="submit" name="btnlogin" id="go" value="Log in"></center>

            </div>
            <p class="p-container" style="margin-top: -37px;">
            <center>
                <span><a href="forgotpassword.php" style="text-decoration: none; color: whitesmoke;">Forgot password ?</a></span><br>
                <span>Not a Member ?<a href="registration.php" style="text-decoration: none; color: whitesmoke;"> Register Here!</a></span>
            </center>
        </p>
    </form>
    <?php
    if (isset($_POST['btnlogin'])) {
        $h_p= password_hash($_POST['password'], PASSWORD_DEFAULT);
        $q = "SELECT firstname,lastname,password,role FROM tblmember WHERE email='" . $_POST['email'] . "' and status='A' ";
        $r = mysqli_query($con, $q);
        if (!$r) {
            echo "<script>alert('Something Went Wrong !') </script>";
        }
        $row = mysqli_fetch_assoc($r);
//        echo "database wala ->" .$row['password'] ."<br>" ."userinput wala ->" .$h_p ."<br>";
        $name = $row['firstname'] . " " . $row['lastname'];
        $_SESSION['name'] = $name;
        $_SESSION['sessionrole'] = $row['role'];
        $_SESSION['email'] = $_POST['email'];
        if ($row['role'] == "Admin" && $_POST['password'] == "admin") {
            $_SESSION['flag'] = 1;
            header("Location: admin_dashboard.php");
        }
        if (password_verify($_POST['password'], $row['password'])) {
            if ($row['role'] == 'Chairman') {
                $_SESSION['flag'] = 1;
                header("Location: chairman_dashboard.php");
            } elseif ($row['role'] == 'Co-Chairman') {
                $_SESSION['flag'] = 1;
                header("Location: coChairman_dashboard.php");
            } elseif ($row['role'] == 'Faculty') {
                $_SESSION['flag'] = 1;
                header("Location: faculty_dashboard.php");
            } else {
                echo "<script> alert('Invalid Email or Password !') <script>";
            }
        }else{
            echo "<script> alert('Invalid Email or Password'); </script>";
        }
    }
    ?>
</body>
</html>
