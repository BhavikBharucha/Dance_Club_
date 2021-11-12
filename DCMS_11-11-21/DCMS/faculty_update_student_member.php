<?php
ob_start();
session_start();
if ($_SESSION['facultypages'] != 1) {
    header("Location: index.php");
}
try{
include './connection.php';
} catch (Exception $e){
    header("Location:error.php");
}
?>
<html>
    <head>

        <?php
        include './head.php';
        ?>
        <title>Update Student Member | Dance Club Management System</title>
        <style>
            .heading {
                font-size: 19px;
                font-weight: bold;
            }

            .divdesign {
                padding: 10px;

                color: black;
                height: 126px;
                width: 300px;
                border: 0px solid blue;
                border-radius: 5px;
            }

            #txtenro,#txtfname,#txtmname,#txtlname,#txtnumber{
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

            <div class="content">
                <section>
                    <center>
                        <form action="" method="POST"  style="border: 3px solid white ; box-shadow: 1px 1px 7px 7px;width: 886px; padding: 22px; border-radius: 7px; margin-top: 50px; margin-bottom: 50px;">
                            <h1>Update Student Member</h1>
                            <div style="border: 1px solid black;">

                            </div><br>
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="text" class="cssinput" id="txtenro" name="txtenro" readonly value="<?php echo $_REQUEST['enro']; ?>" placeholder="Enrollment Number" required style=" padding: 5px; width: 837px; margin-bottom: 19px; text-align: center;">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4"> 
                                    <input type="text" class="cssinput" id="txtfname" value="<?php echo $_REQUEST['fname']; ?>" name="txtfname" pattern="^[A-Za-z]+$" placeholder="First Name" required style=" padding: 5px; width: 260px;"><br>
                                </div>
                                <div class="col-md-4">
                                    <input type="text" class="cssinput" id="txtmname" value="<?php echo $_REQUEST['mname']; ?>" name="txtmname" pattern="^[A-Za-z]+$" placeholder="Middle Name" required style=" padding: 5px; width: 260px;"><br>
                                </div>
                                <div class="col-md-4">
                                    <input type="text" class="cssinput" id="txtlname" value="<?php echo $_REQUEST['lname']; ?>" name="txtlname" pattern="^[A-Za-z]+$" placeholder="Last Name" required style=" padding: 5px; width: 260px;"><br>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <br><input type="text" class="cssinput" id="txtnumber" value="<?php echo $_REQUEST['contact']; ?>" name="txtnumber" pattern="^[6789][0-9]{9}$" maxlength="10" placeholder="Contact Number" required style=" padding: 5px; width: 260px;"><br>
                                </div>

                                <div class="col-md-4">

                                    <br><select name="city" id="city" class="cssinput">
                                        <?php
                                        $arr_city = array("Surat", "Navsari", "Valsad", "Bardoli");
                                        foreach ($arr_city as $city) {
                                            if ($_GET['city'] == $city) {
                                                echo "<option selected value=$city> $city <option>";
                                            } else {
                                                echo "<option value=$city> $city <option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="col-md-4">
                                    <br><select name="gender" id="gender" class="cssinput">
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

                            <div class="row">
                                <div class="col-md-7">
                                    <br><select name="drwninstitute" id="institute" style="text-align: center;margin-left: -1px; height: 40px; border: 1px solid lightgray; border-radius: 5px; width: 540px;color: gray;">
                                        <?php
                                        $q = "SELECT * FROM tblinstitute";
                                        $result = mysqli_query($con, $q);
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            if ($_GET['ins_name'] == $row['institutename']) {
                                                echo "<option selected value=" . $row['id'] . ">" . $row['institutename'] . "</option>";
                                            } else {
                                                echo "<option value=" . $row['instituteid'] . ">" . $row['institutename'] . "</option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="col-md-4">
                                    <br><input type="email" id="email" value="<?php echo $_REQUEST['email'] ?>" name="txtemail" placeholder="E-Mail" class="cssinput" style="margin-left: 72px;" required>
                                </div>
                            </div>

                            <br>
                            <center><input type="submit" id="btnregister" name="btnregister" value="UPDATE" class="btn btn-info" style="width: 151px;"></center><br>

                        </form>
                    </center>
                </section>
            </div>

            <?php
            if (isset($_POST['btnregister'])) {
                $sql = "UPDATE tblstudent SET firstname='" . $_POST['txtfname'] . "',middlename='" . $_POST['txtmname'] . "',lastname='" . $_POST['txtlname'] . "',city='" . $_POST['city'] . "',gender='" . $_POST['gender'] . "',contactno='" . $_POST['txtnumber'] . "',email='" . $_POST['txtemail'] . "',instituteid='" . $_POST['drwninstitute'] . "' WHERE enro='" . $_POST['txtenro'] . "';";

                echo $sql;
                $result = mysqli_query($con, $sql);
                if ($result) {
                    echo 'thay to che......';
                    echo "<script>Alert('Registered Successfully')</script>";
                    header("Location:manage_student_member.php");
                }
            }
            ?>

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