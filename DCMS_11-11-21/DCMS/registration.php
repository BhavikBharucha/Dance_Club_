<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
ob_start();
session_start();
try {
    include './connection.php';
} catch (Exception $e) {
    header("Location:error.php");
}
include './mail/function.php';
include './mail/smtp/PHPMailerAutoload.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Registration | Dance Club Management System</title>
        <link rel="stylesheet" href="assets/css/registration_css.css">
    </head>
    <body>
        <form method="post" style="margin-top:99px; height: 366px;;">
            <h1>Registration</h1>
            <div class="row" >
                <center>
                    <div class="col-md-4">
                        <input type="text" id="txtfname" name="txtfname" pattern="^[A-Za-z]+$" title="Enter Characters Only !" placeholder="First Name" required style="  width: 260px;">

                        <input type="text" id="txtmname" name="txtmname" pattern="^[A-Za-z]+$" title="Enter Characters Only !" placeholder="Middle Name" required style="  width: 260px;">

                        <input type="text" id="txtlname" name="txtlname" pattern="^[A-Za-z]+$" title="Enter Characters Only !" placeholder="Last Name" required style=" width: 260px;">
                    </div>
                </center>
            </div>
            <div class="row">
                <center>
                    <div class="col-md-4"> 
                        <input type="text" id="txtnumber"  name="txtnumber" pattern="^[6789][0-9]{9}$" title="The number should start with either 6,7,8 or 9 and must not be more than 10 digits long. " maxlength="10" placeholder="Contact Number" required style=" width: 260px;">

                        <select name="city" id="city" style="width: 260px;" required>
                            <option>--City--</option>
                            <option value="Surat">Surat</option>
                            <option value="Navsari">Navsari</option>
                            <option value="Valsad">Valsad</option>
                            <option value="Bardoli">Bardoli</option>
                        </select>

                        <select name="gender" id="gender" style="width: 260px;" required>
                            <option>--Gender--</option>
                            <option value="F">Female</option>
                            <option value="M">Male</option>
                            <option value="O">Others</option>
                        </select><br>
                    </div>
                </center>
            </div>

            <div class="row">
                <center>
                    <div class="col-md-12"> 
                        <select name="instituteid" id="institute" style="text-align: center;width: 785px;" required>
                            <?php
                            $q = "SELECT * FROM tblinstitute";
                            $result = mysqli_query($con, $q);
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<option value='$row[id]'>" . $row['institutename'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                </center>
            </div>
            <div class="row">
                <center>
                    <div class="col-md-4">
                        <input style="width: 260px;" type="date"  id="dob_u" name="dob" required>

                        <input type="email" id="email"  name="txtemail" placeholder="E-Mail" style="width: 260px;" required>

                        <input type="password" id="password"  name="txtpwd"  placeholder="Password" style="width: 260px;" required>
                    </div>
                </center>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <center><input type="submit" id="btnregister" name="btnregister" value="Register" style="width: 210px;"><br><br>
                        Already have an account?<a href="index.php" > Login </a><br>
                    </center>
                </div>
            </div>
        </form>

    </body>
</html>
<?php
if (isset($_POST['btnregister'])) {

    $fname = $_POST['txtfname'];
    $mname = $_POST['txtmname'];
    $lname = $_POST['txtlname'];
    $num = $_POST['txtnumber'];
    $city = $_POST['city'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
//    $institute_name = $_POST['institute'];
    $email = $_POST['txtemail'];
    $temp_p = $_POST['txtpwd'];
    $hash_p = password_hash($temp_p, PASSWORD_DEFAULT);
    $institute_id = $_POST['instituteid'];
    $q_checck = "SELECT COUNT(id) as total FROM tblapproval where email='$email'";
    $r_check = mysqli_query($con, $q_checck);
    $ro_check = mysqli_fetch_assoc($r_check);
    if ($ro_check['total'] > 0) {
        echo "<script> alert('Already Registered !'); </script>";
    } else {
//        echo  "id -> $institute_id <br>" ;
        $q2 = "INSERT INTO tblapproval(fname, mname, lname, city,dob, gender, contactno, email, password, instituteid) VALUES  ('$fname','$mname','$lname','$city','$dob','$gender','$num','$email','$hash_p','$institute_id')";
//        echo $q2;
        $r = mysqli_query($con, $q2);
        if ($r) {
            $name = "$fname $lname";

            $email = $_POST['txtemail'];
            $subject = "Request for Registration.";
            $html = "Hello '$name', your request for registration has been placed !";
            send_email($email, $html, $subject);
            header("Location:index.php");
        } else {
            echo "<script> alert('Something Went Wrong !'); </script>";
        }
    }
}
