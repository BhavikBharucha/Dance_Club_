<?php
session_start();
ob_start();
if($_SESSION['chairmanpages']!=1){
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
        <title>Update Judge | Dance Club Management System</title>
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

            #txtfname,#txtmname,#txtlname,#txtnumber,#txtemail{
                width: 260px;
                height: 38px;
                border: 1px solid lightgray;
                height: 37px;
                border-radius: 5px;
                border-radius: 5px;
            }
            #address{
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
                            <h1>Update Judge Details</h1>
                            <div style="border: 1px solid black;">

                            </div><br>
                            <div class="row">
                                <div class="col-md-4"> 
                                    <input type="text" id="txtfname" name="txtfname" pattern="^[A-Za-z]+$" value="<?php echo $_GET['fname'] ?>" placeholder="First Name" required style=" "><br>
                                </div>
                                <div class="col-md-4">
                                    <input type="text" id="txtmname" name="txtmname" pattern="^[A-Za-z]+$" value="<?php echo $_GET['mname']; ?>" placeholder="Middle Name" required style=""><br>
                                </div>
                                <div class="col-md-4">
                                    <input type="text" id="txtlname" name="txtlname" pattern="^[A-Za-z]+$" value="<?php echo $_GET['lname']; ?>" placeholder="Last Name" required style=""><br>
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col-md-4">
                                    <textarea name="address" id="address"  placeholder="Address" rows="2" cols="10"><?php echo $_GET['address']; ?></textarea>
                                </div>
                                <div class="col-md-4">

                                    <select name="city" id="city">
                                        <?php
                                        $arr_city = array("Surat", "Valsad", "Navsari", "Bardoli");
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
                                    <select name="gender" id="gender" style="">
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
                                    </select>
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col-md-6" style=""> 
                                    <input type="tel" name="txtcontact" id="txtnumber" value="<?php echo $_GET['contact']; ?>" placeholder="Contact Nummber"style="">
                                </div>

                                <div class="col-md-6"> 
                                    <input type="email" name="txtemail" id="txtemail" value="<?php echo $_GET['email']; ?>" placeholder="E-Mail">
                                </div>



                            </div>
                            <br>

                            <center><input type="submit" id="btnpost_if" name="btnupdate" value="Update" class="btn btn-info" style="width: 151px;"></center>
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
if (isset($_POST['btnupdate'])) {
    $f_name = $_POST['txtfname'];
    $m_name = $_POST['txtmname'];
    $l_name = $_POST['txtlname'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $gender = $_POST['gender'];
    $con_num = $_POST['txtcontact'];
    $mail = $_POST['txtemail'];

    $q = "UPDATE tbljudge SET firstname='$f_name',middlename='$m_name',lastname='$l_name',address='$address',city='$city',gender='$gender',contactno='$con_num',email='$mail' WHERE id='" . $_GET['id'] . "'";
    $r = mysqli_query($con, $q);
    if ($r) {
        header("Location:chairman_manage_judges.php");
    }
}