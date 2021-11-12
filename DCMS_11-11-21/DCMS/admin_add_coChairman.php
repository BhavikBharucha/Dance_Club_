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
        <title>Add Co-Chairman | Dance Club Management System</title>
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
                            <h1>Add Co-Chairman</h1>
                            <div style="border: 1px solid black;">

                            </div><br>
                            <div class="row">
                                <div class="col-md-4"> 
                                    <input type="text" id="txtfname" name="txtfname" pattern="^[A-Za-z]+$" title="Enter Characters Only !" placeholder="First Name" required style=" padding: 5px; width: 260px; border: 1px solid lightgray;border-radius: 5px;"><br>
                                </div>
                                <div class="col-md-4">
                                    <input type="text" id="txtmname" name="txtmname" pattern="^[A-Za-z]+$" title="Enter Characters Only !" placeholder="Middle Name" required style=" padding: 5px; width: 260px; border: 1px solid lightgray;border-radius: 5px;"><br>
                                </div>
                                <div class="col-md-4">
                                    <input type="text" style="width: 246px;" id="txtlname" name="txtlname" pattern="^[A-Za-z]+$" title="Enter Characters Only !" placeholder="Last Name" required style=" padding: 5px; width: 260px;"><br>
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col-md-4"> 
                                    <input type="text" id="txtnumber"  name="txtnumber" pattern="^[6789][0-9]{9}$" title="The number should start with either 6,7,8 or 9 and must not be more than 10 digits long. " maxlength="10" placeholder="Contact Number" required style=" padding: 5px; width: 260px;border: 1px solid lightgray;border-radius: 5px;"><br>
                                </div>
                                <div class="col-md-4"> 
                                    <select name="city" id="city" required>
                                        <option>--City--</option>
                                        <option value="Surat">Surat</option>
                                        <option value="Navsari">Navsari</option>
                                        <option value="Valsad">Valsad</option>
                                        <option value="Bardoli">Bardoli</option>
                                    </select>
                                </div>


                                <div class="col-md-4"> 
                                    <select name="gender" id="gender" required>
                                        <option>--Gender--</option>
                                        <option value="F">Female</option>
                                        <option value="M">Male</option>
                                        <option value="O">Others</option>
                                    </select><br>
                                </div>
                            </div>

                            <br> <div class="row">
                                <div class="col-md-7"> 
                                    <select name="institute" id="institute" style="text-align: center;width: 420px;height: 37px; margin-left: -55px;border: 1px solid lightgray; height: 37px; border-radius: 5px;color: gray;" required>;
                                        <?php
                                        $q = "SELECT * FROM tblinstitute";
                                        $result = mysqli_query($con, $q);
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo "<option value='$row[id]'>" . $row['institutename'] . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <input style="border: 1px solid lightgray; height: 37px; border-radius: 5px; width: 395px; color: gray; margin-left: -69px;" type="date" onclick="validateDate()"  id="dob_u" name="dob" required>
                                    <label id="dob" style="visibility: hidden;">"Please Enter Valid Date Of Birth !</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="email" id="email"  name="txtemail" placeholder="E-Mail" pattern="^([\w]*[\w\.]*(?!\.)@gmail.com)" title="Only gmail account are valid! Like xyz@gmail.com" required>
                                </div>
                                <div class="col-md-6">
                                    <input type="password" id="password"  name="txtpwd"  placeholder="Password" required><br>
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
    $q_check = "SELECT COUNT(*) as total FROM tblmember WHERE role='Co-Chairman' and status='A'";
    $r_check = mysqli_query($con, $q_check);
    $row_check = mysqli_fetch_assoc($r_check);
    if ($row_check['total'] >= 1) {
        echo "<script LANGUAGE='JavaScript'>
    window.alert('Maximum Number of Co-Chairman Reached !');
    window.location.href='admin_manage_coChairman.php';
    </script>";
        //header("Location:admin_manage_chairman.php");
    } else {
        $p= $_POST['txtpwd'];
        $pass_hash= password_hash($p, PASSWORD_DEFAULT);
        $q = "INSERT INTO tblmember (firstname, middlename, lastname, city, dob, gender, contactno, email, password, instituteid, role, status) VALUES ('" . $_POST['txtfname'] . "','" . $_POST['txtmname'] . "','" . $_POST['txtlname'] . "','" . $_POST['city'] . "','" . $_POST['dob'] . "','" . $_POST['gender'] . "','" . $_POST['txtnumber'] . "','" . $_POST['txtemail'] . "','$pass_hash','" . $_POST['institute'] . "','Co-Chairman','A')";
        $r = mysqli_query($con, $q);
        if ($r) {
            header("Location:admin_manage_coChairman.php");
        } else {
            echo "<script> alert('Something Went Wrong ! Try Again ') </script>";
        }
    }
}