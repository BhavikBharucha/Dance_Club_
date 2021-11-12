<?php
session_start();
ob_start();
if($_SESSION['adminpages']!=1){
    header("Location:index.php");
}
try {
    include './connection.php';
} catch (Exception $ex) {
    header("Location: error.php");
}
?>
<html>
    <head>
        <title>Update Co-Chairman | Dance Club Management System</title>
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
                        <form action="" method="POST"   style="border: 3px solid white ; width: 886px; box-shadow: 1px 1px 7px 7px;padding: 22px; border-radius: 7px; margin-top: 50px; margin-bottom: 50px;">
                            <h1>Registration</h1>
                            <div style="border: 1px solid black;">

                            </div><br>
                            <div class="row">
                                <div class="col-md-4"> 
                                    <input type="text" id="txtfname" name="txtfname" value="<?php echo $_REQUEST['fname']; ?>" pattern="^[A-Za-z]+$" title="Enter Characters Only !" placeholder="First Name" required style=" padding: 5px; width: 260px; border: 1px solid lightgray;border-radius: 5px;"><br>
                                </div>
                                <div class="col-md-4">
                                    <input type="text" id="txtmname" name="txtmname" value="<?php echo $_REQUEST['mname']; ?>" pattern="^[A-Za-z]+$" title="Enter Characters Only !" placeholder="Middle Name" required style=" padding: 5px; width: 260px; border: 1px solid lightgray;border-radius: 5px;"><br>
                                </div>
                                <div class="col-md-4">
                                    <input type="text" style="width: 246px;" id="txtlname" name="txtlname" value="<?php echo $_REQUEST['lname']; ?>" pattern="^[A-Za-z]+$" title="Enter Characters Only !" placeholder="Last Name" required style=" padding: 5px; width: 260px;"><br>
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col-md-4"> 
                                    <input type="text" id="txtnumber"  name="txtnumber" value="<?php echo $_REQUEST['contact']; ?>" pattern="^[6789][0-9]{9}$" title="The number should start with either 6,7,8 or 9 and must not be more than 10 digits long. " maxlength="10" placeholder="Contact Number" required style=" padding: 5px; width: 260px;border: 1px solid lightgray;border-radius: 5px;"><br>
                                </div>
                                <div class="col-md-4"> 
                                    <select name="city" id="city" required>
                                        <?php
                                        $arr = array("Surat", "Navsari", "Valsad", "Bardoli");
                                        foreach ($arr as $city) {
                                            if ($city == $_GET['city']) {
                                                echo "<option selected value='" . $city . "'>$city</option>";
                                            } else {
                                                echo "<option value='" . $city . "'>$city</option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>


                                <div class="col-md-4"> 
                                    <select name="gender" id="gender" required>
                                        <?php
                                        $gen_arr = array("M", "F", "O");
                                        $g = 'Female';
                                        foreach ($gen_arr as $gen) {
                                            if ($_GET['gender'] == 'M') {
                                                $g = 'Male';
                                            }
                                            if ($gen == $_GET['gender']) {
                                                echo "<option selected value='" . $gen . "'>$g</option>";
                                                echo "<option  value='F'>Female</option>";
                                                echo"<option  value='O'>Others</option>";
                                            } elseif ($gen == $_GET['gender']) {
                                                echo "<option  value='" . $gen . "'>$g</option>";
                                                echo "<option selected value='M'>Male</option>";
                                                echo"<option  value='O'>Others</option>";
                                            } elseif ($gen == $_GET['gender']) {
                                                echo "<option  value='" . $gen . "'>$g</option>";
                                                echo "<option  value='F'>Female</option>";
                                                echo"<option selected value='M'>Male</option>";
                                            }
                                        }
                                        ?>
                                    </select><br>
                                </div>
                            </div>

                            <br> <div class="row">
                                <div class="col-md-12"> 
                                    <select name="institute" id="institute" style="text-align: center;width: 833px;height: 37px;border: 1px solid lightgray; height: 37px; border-radius: 5px;color: gray;" required>;
                                        <?php
                                        $q = "SELECT * FROM tblinstitute";
                                        $result = mysqli_query($con, $q);
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            if ($_REQUEST['ins_id'] == $row['id']) {
                                                echo "<option selected value='$row[id]'>" . $row['institutename'] . "</option>";
                                            } else {
                                                echo "<option value='$row[id]'>" . $row['institutename'] . "</option>";
                                            }
                                        }
                                        ?>
                                    </select><br>
                                </div><br>

                            </div><br>
                            <div class="row">
                                <div class="col-md-6">
                                    <input style="border: 1px solid lightgray; height: 37px; border-radius: 5px; width: 395px; color: gray; " type="date" onclick="validateDate()"  id="dob_u" name="dob" value="<?php echo $_REQUEST['dob']; ?>" required>
                                    <label id="dob" style="visibility: hidden;">"Please Enter Valid Date Of Birth !</label>
                                </div>
                                <div class="col-md-6">
                                    <input type="email" id="email"  name="txtemail" value="<?php echo $_REQUEST['email']; ?>" placeholder="E-Mail" pattern="^([\w]*[\w\.]*(?!\.)@gmail.com)" title="Only gmail account are valid! Like xyz@gmail.com" style="width: 395px;" required>
                                </div>
                            </div>
                            <center><br>
                                <input type="submit" id="btnadd" name="btnadd" value="Add" class="btn btn-info" style="width: 151px;"><br><br>
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
if (isset($_POST['btnadd'])) {
    $fname = $_POST['txtfname'];
    $mname = $_POST['txtmname'];
    $lname = $_POST['txtlname'];
    $num = $_POST['txtnumber'];
    $city = $_POST['city'];
    $gen = $_POST['gender'];
    $dob = $_POST['dob'];
    $inst_id = $_POST['institute'];
    $email = $_POST['txtemail'];
    $q = "UPDATE tblmember SET firstname='$fname',middlename='$mname',lastname='$lname',city='$city',dob='$dob',gender='$gen',contactno='$num',email='$email',instituteid='$inst_id' WHERE id='" . $_GET['id'] . "'";
    //echo $q;
    //echo "<script> alert('".$q."') </script>";
    $r = mysqli_query($con, $q);
    if ($r) {
        echo "<script> window.alert('Updated Successfully !'); window.location.href='admin_manage_coChairman.php' </script>";
    } else {
        echo "<script> alert('Unsuccessfull !') </script>";
    }
}