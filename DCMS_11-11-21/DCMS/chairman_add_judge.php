<?php
session_start();
ob_start();
if($_SESSION['chairmanpages']!=1 && $_SESSION['coChairmanpages']!=1){
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
        <title>Add Judge | Dance Club Management System</title>
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
                        <form action="" method="POST" enctype="multipart/form-data"  style="border: 3px solid white ; width: 886px; box-shadow: 1px 1px 7px 7px;padding: 22px; border-radius: 7px; margin-top: 50px; margin-bottom: 50px;">
                            <h1>Add Judge</h1>
                            <div style="border: 1px solid black;">

                            </div><br>
                            <div class="row">
                                <div class="col-md-4"> 
                                    <input type="text" id="txtfname" name="txtfname" pattern="^[A-Za-z]+$"  placeholder="First Name" required style=" "><br>
                                </div>
                                <div class="col-md-4">
                                    <input type="text" id="txtmname" name="txtmname" pattern="^[A-Za-z]+$" placeholder="Middle Name" required style=""><br>
                                </div>
                                <div class="col-md-4">
                                    <input type="text" id="txtlname" name="txtlname" pattern="^[A-Za-z]+$" placeholder="Last Name" required style=""><br>
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col-md-4">
                                    <textarea name="address" id="address"  placeholder="Address" rows="2" cols="10"></textarea>
                                </div>
                                <div class="col-md-4">

                                    <select name="city" id="city">
                                        <option value="Surat">Surat</option>
                                        <option value="Navsari">Navsari</option>
                                        <option value="Valsad">Valsad</option>
                                        <option value="Bardoli">Bardoli</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <select name="gender" id="gender" style="">
                                        <option value="M">Male</option>
                                        <option value="F">Female</option>
                                        <option value="O">Other</option>
                                    </select>
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col-md-4"> 
                                    <input type="tel" name="txtcontact" id="txtnumber" placeholder="Contact Nummber"style="">
                                </div>

                                <div class="col-md-4"> 
                                    <input type="email" name="txtemail" id="txtemail" placeholder="E-Mail">
                                </div>
                                
                                <div class="col-md-4">
                                    <input type="file" name="profile" required>
                                </div>

                            </div>
                            <br>

                            <center><input type="submit" id="btnpost_if" name="btnadd" value="Add" class="btn btn-info" style="width: 151px;"></center>
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
    $q_check = "SELECT COUNT(*) as total FROM tbljudge WHERE firstname='" . $_POST['txtfname'] . "' and middlename='" . $_POST['txtmname'] . "' and lastname='" . $_POST['txtlname'] . "' and address='" . $_POST['address'] . "' and city='" . $_POST['city'] . "' and gender='" . $_POST['gender'] . "' and contactno='" . $_POST['txtcontact'] . "' and email='" . $_POST['txtemail'] . "'";
    echo $q_check;
    $r_check = mysqli_query($con, $q_check);
    if ($r_check) {
        $row = mysqli_fetch_assoc($r_check);
        if ($row['total'] >= 1) {
            echo "<script> window.alert('This Judge is Already Registered !'); window.location.href='chairman_manage_judge.php' </script>";
        } else {
            $f_name = $_POST['txtfname'];
            $m_name = $_POST['txtmname'];
            $l_name = $_POST['txtlname'];
            $address = $_POST['address'];
            $city = $_POST['city'];
            $gender = $_POST['gender'];
            $con_num = $_POST['txtcontact'];
            $mail = $_POST['txtemail'];
            $from_profile = $_FILES['profile']['tmp_name'];
            $profile_dest = "files/" . basename($_FILES['profile']['tmp_name']);
            $p = $_FILES["profile"]["name"];
            $temp = explode(".", $p);
            $extension_profile = end($temp);

            $ext = array("pdf", "docx", "jpeg");
            if (in_array($extension_profile, $ext)) {
                $q = "INSERT INTO tbljudge(firstname, middlename, lastname, address, city,gender, contactno, email, profile_attachment) VALUES ('$f_name','$m_name','$l_name','$address','$city','$gender','$con_num','$mail','$profile_dest')";
                $r = mysqli_query($con, $q);
                if ($r) {
                    echo "<script LANGUAGE='JavaScript'> window.alert('Judge Added Successfully !'); window.location.href='chairman_manage_judges.php'; </script>";
                }
            }
        }
    }
}