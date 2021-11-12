<?php
ob_start();
session_start();
//if ($_SESSION['flag'] != 1) {
//    header("Location:login.php");
//}
try{
include './connection.php';
} catch (Exception $e){
    header("Location: error.php");
}
?>
<html>
    <head>

        <?php
        include './head.php';
        ?>
        <title>My Profile | Dance Club Management System</title>
        <style>
            .addbtncss{
                background-color: gold;
                color: white;
                text-decoration: none;
                padding: 5px;
                border: 1px solid;
                border-radius: 5px;
                float: right;   
            }

            h3{
                text-align: left;
                margin-top: 8px;
                margin-bottom: -20px;
                font-size: 32px;
            }

            .backbncss{
                border: 1px solid blue;
                background-color: blue;
                color: white;
                text-decoration: none;
                padding: 5px;
                border-radius: 5px;
                float: right;
                margin-left: 5px;
            }

            .th{
                font-size: 17px;
            }

            h1{
                font-weight: bold;
                font-size: 29px;
                text-align: left;
            }
            
            #txtfname,#txtmname,#txtlname,#txtnumber{
                border: 1px solid lightgray;
                border-radius: 5px;
                height: 43px;
                color: gray;
            }

            #city,#gender{
                height: 43px;
                border: 1px solid lightgray;
                border-radius: 5px;
                width: 261px;
                color: gray;
                text-align: center;
                color: gray;
            }
            
            #email{
                border: 1px solid lightgray;
                border-radius: 5px;
                height: 43px;
                width: 261px;
                color: gray;
            }
            
            #institute{
                border: 1px solid lightgray;
                border-radius: 5px;
                height: 43px;
                width: 850px;
                color: gray;
                text-align: center;
            }
            
            #password{
                border: 1px solid lightgray;
                border-radius: 5px;
                height: 43px;
                width: 415px;
                color: gray;
            }
        </style>
    </head>
    <?php
    $mail = $_SESSION['mail_profile'];
    $s = "SELECT * FROM tblmember m INNER JOIN tblinstitute i ON m.instituteid=i.id WHERE m.email='$mail'";
    while ($row = mysqli_fetch_assoc(mysqli_query($con, $s))) {
        ?>
        <body>
            <?php
            include './sidebar.php';
            ?>

            <div id="right-panel" class="right-panel">
                <?php
                include './header.php';
                ?>

                <div class="content">
                    <section>

                        <center>
                            <form action="" method="POST" style="border: 3px solid white ;box-shadow: 1px 1px 7px 7px; width: 900px; padding: 22px; border-radius: 7px; margin-top: 50px; margin-bottom: 50px;">

                                <div>
                                    <h1>Profile</h1>
                                    <!--<a href="faculty_dashboard.php" class="btn btn-success" style="text-decoration: none ; margin-top: -36px; float: right;"><i class="fa fa-plus"></i>Back</a>-->
                                </div>

    <!--                                    <a href="faculty_dashboard.php" class="btn btn-success" style="text-decoration: none ; margin-top: 25px;"><i class="fa fa-plus"></i>Back</a>-->
                                <div style="border: 1px solid black; margin-top: 10px;">

                                </div><br>

                                <div class="row">
                                    <div class="col-md-4"> 
                                        <input type="text" name="txtfname" id="txtfname" pattern="^[A-Za-z]+$" value="<?php echo $row['firstname']; ?>" placeholder="First Name" required style=" padding: 5px; width: 260px;"><br>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="text" name="txtmname" id="txtmname" pattern="^[A-Za-z]+$" value="<?php echo $row['middlename']; ?>" placeholder="Middle Name" required style=" padding: 5px; width: 260px;"><br>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="text" name="txtlname" id="txtlname" pattern="^[A-Za-z]+$" value="<?php echo $row['lastname']; ?>" placeholder="Last Name" required style=" padding: 5px; width: 260px;"><br>
                                    </div>
                                </div>

                                <br><div class="row">
                                    <div class="col-md-6"> 
                                        <input type="text" name="txtnumber" id="txtnumber" pattern="^[6789][0-9]{9}$" value="<?php echo $row['contactno']; ?>" placeholder="Contact Number" required style=" padding: 5px; width: 415px;"><br>
                                    </div>
                                    <div class="col-md-6"> 
                                        <?php
                                        $arr = array("Surat", "Navsari", "Bardoli", "Valsad");
                                        ?>
                                        <select name="city" id="city" style="width: 408px;">
                                            <?php
                                            foreach ($arr as $city) {
                                                if ($city == $row['city']) {
                                                    echo "<option selected value='" . $city . "'>$city</option>";
                                                } else {
                                                    echo "<option value='" . $city . "'>$city</option>";
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                
                                <br><div class="row">
                                    <div class="col-md-6"> 
                                        <?php $gen_arr = array("M", "F", "O") ?>
                                        <select name="gender" id="gender" style="width: 415px;">
                                            <?php
                                            $g = 'Female';
                                            foreach ($gen_arr as $gen) {
                                                if ($row['gender'] == 'M') {
                                                    $g = 'Male';
                                                }
                                                if ($gen == $row['gender']) {
                                                    echo "<option selected value='" . $gen . "'>$g</option>";
                                                    echo "<option  value='F'>Female</option>";
                                                    echo"<option  value='O'>Others</option>";
                                                } elseif ($gen == $row['gender']) {
                                                    echo "<option  value='" . $gen . "'>$g</option>";
                                                    echo "<option selected value='M'>Male</option>";
                                                    echo"<option  value='O'>Others</option>";
                                                } elseif ($gen == $row['gender']) {
                                                    echo "<option  value='" . $gen . "'>$g</option>";
                                                    echo "<option  value='F'>Female</option>";
                                                    echo"<option selected value='M'>Male</option>";
                                                }
                                            }
                                            ?>
                                        </select><br>
                                    </div>
                                    <div class="col-md-6"> 
                                        <input type="date" name="dob" value="<?php echo $row['dob'] ?>" required style=" width: 410px; color: gray; height: 43px; border: 1px solid lightgrey; border-radius: 5px;">
                                    </div>
                                </div>
                                
                                <br><div class="row">
                                    <div class="col-md-12"> 
                                        <select name="institute" id="institute">
                                            <?php
                                            $q = "SELECT institutename FROM tblinstitute";
                                            $result = mysqli_query($con, $q);
                                            while ($row_q = mysqli_fetch_assoc($result)) {
                                                if ($row['institutename'] == $row_q['institutename']) {
                                                    echo "<option selected value=" . $row['id'] . ">" . $row['institutename'] . "</option>";
                                                } else {
                                                    echo "<option value=" . $row['instituteid'] . ">" . $row['institutename'] . "</option>";
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div><br>
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="email" value="<?php echo $row['email']; ?>" id="email" name="txtemail" placeholder="E-Mail" style="width: 415px;" required><br>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="password" name="txtpass" id="password" placeholder="New Password">
                                    </div>
                                </div>
                                
                                <br><center><input type="submit" name="btnupdate" value="Update" class="btn btn-info" style="width: 151px;"></center><br>
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
            include './script.php'
            ?>
        </body>
    </html>
    <?php
    if (isset($_POST['btnupdate'])) {
        $fname = $_POST['txtfname'];
        $mname = $_POST['txtmname'];
        $lname = $_POST['txtlname'];
        $num = $_POST['txtnumber'];
        $city = $_POST['city'];
        $gen = $_POST['gender'];
        $dob = $_POST['dob'];
        $inst_id = $_POST['institute'];
        $email = $_POST['txtemail'];
        $pass_text = $_POST['txtpass'];
        $hash_pass = password_hash($pass_text, PASSWORD_DEFAULT);
        $q = "UPDATE tblmember SET firstname='$fname',middlename='$mname',lastname='$lname',city='$city',dob='$dob',gender='$gen',contactno='$num',email='$email',instituteid='$inst_id',password='$hash_pass' WHERE id='" . $row['id'] . "'";
        echo $q;
        $r = mysqli_query($con, $q);
        if ($r) {
            echo "Successfully Updated !";
            header("Location:faculty_dashboard.php");
        }
    }
    break;
}
ob_flush();
?>