<?php
ob_start();
session_start();
//if (isset($_SESSION['flag']) != 1) {
//    header("Location: ./login.php");
//}
include './connection.php';
?>
<html>
    <head>

        <?php
        include './head.php';
        ?>
        <title>Add Student Member | Faculty Dashboard</title>
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
                                <form action="" method="POST"  style="border: 3px solid white ; box-shadow: 1px 1px 7px 7px; width: 886px; padding: 22px; border-radius: 7px; margin-top: 50px; margin-bottom: 50px;">
                                    <h1>Add Student Member</h1>
                                    <div style="border: 1px solid black;">
                                        
                                    </div><br>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="text" class="cssinput" id="txtenro" title="Enter Enrollment Number" name="txtenro" placeholder="Enrollment Number" required style=" padding: 5px; width: 837px; margin-bottom: 19px; text-align: center;">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4"> 
                                            <input type="text" class="cssinput" id="txtfname" name="txtfname" pattern="^[A-Za-z]+$" placeholder="First Name" required style=" padding: 5px; width: 260px;"><br>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" class="cssinput" id="txtmname" name="txtmname" pattern="^[A-Za-z]+$" placeholder="Middle Name" required style=" padding: 5px; width: 260px;"><br>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" class="cssinput" id="txtlname" name="txtlname" pattern="^[A-Za-z]+$" placeholder="Last Name" required style=" padding: 5px; width: 260px;"><br>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <br><input type="text" class="cssinput" id="txtnumber" name="txtnumber" pattern="^[6789][0-9]{9}$" maxlength="10" placeholder="Contact Number" required style=" padding: 5px; width: 260px;"><br>
                                        </div>

                                        <div class="col-md-4">
                                            <br><select name="city" id="city" class="cssinput">
                                                <option>----City----</option>
                                                <option value="Surat">Surat</option>
                                                <option value="Navsari">Navsari</option>
                                                <option value="Valsad">Valsad</option>
                                                <option value="Bardoli">Bardoli</option>
                                            </select>
                                        </div>

                                        <div class="col-md-4">
                                            <br><select name="gender" id="gender" class="cssinput">
                                                <option>----Gender----</option>
                                                <option value="F">Female</option>
                                                <option value="M">Male</option>
<!--                                                <option>Others</option>-->
                                            </select><br>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-7">
                                            <br><select name="drwninstitute" id="institute" style="text-align: center;margin-left: -1px; height: 43px; border: 1px solid lightgray; border-radius: 5px; width: 552px;color: gray;">
                                                <option>----Institute----</option>
                                                <!--                populate value using php-->
                                                <?php
                                                $query = "SELECT * FROM tblinstitute";
                                                $results = mysqli_query($con, $query);
                                                //loop
                                                foreach ($results as $institute) {
                                                    ?>
                                                    <option value="<?php echo $institute["id"]; ?>"><?php echo $institute["institutename"]; ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>

                                        <div class="col-md-4">
                                            <br><input type="email" id="email" name="txtemail" placeholder="E-Mail" class="cssinput" style="margin-left: 72px;" required>
                                        </div>
                                    </div>

                                    <br>
                                    <center><input type="submit" id="btnregister" name="btnregister" value="ADD" class="btn btn-info" style="width: 151px;"></center><br>

                                </form>
                            </center>
                </section>
            </div>

            <?php
        if (isset($_POST['btnregister'])) {

            $sql = "select count(*) from tblstudent where email = '" . $_POST['txtemail'] . "'";
            $result = mysqli_query($con, $sql);

            $row = mysqli_fetch_row($result);

            if ($row[0] > 0) {
                echo "Email is already exists!!";
                exit();
            } else {
//                $enro=$_POST['txtenro'];
//                echo $enro;
                $sql = "insert into tblstudent(enro,firstname,middlename,lastname,city,gender,contactno,email,instituteid) values('" . $_POST['txtenro'] . "','" . $_POST['txtfname'] . "','" . $_POST['txtmname'] . "','" . $_POST['txtlname'] . "','" . $_POST['city'] . "','" . $_POST['gender'] . "','" . $_POST['txtnumber'] . "','" . $_POST['txtemail'] . "','" . $_POST['drwninstitute'] . "')";
                echo $sql;
                $result = mysqli_query($con, $sql);
                if ($result) {
                    echo 'thay to che......';
                    echo "<script>Alert('Registered Successfully')</script>";
                    header("Location:manage_student_member.php");
                }
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