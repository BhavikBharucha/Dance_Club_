<?php
ob_start();
session_start();
//if (isset($_SESSION['flag']) != 1) {
//    header("Location: ./login.php");
//}

if (!isset($_REQUEST['eid'])) {
    header("Location: manage_participants.php");
}
include './connection.php';
?>
<html>
    <head>

        <?php
        include './head.php';
        ?>

        <style>
            #txtenro,#txtfname,#txtmname,#txtlname,#txtnumber{
                border: 1px solid lightgray;
                border-radius: 5px;
                height: 43px;
                color: gray;
/*                margin-left: 19px;*/
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
            
            form.scroll{
                margin: 4px 4px;
                padding: 4px;
                height: 470px;
                width: 500px;
                overflow-x: hidden;
                overflow-y: auto;
                text-align: justify;
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
                        <?php
                        if ($_REQUEST['type'] == "Solo") {
                            ?>
                            <form action="" method="POST"  style="border: 3px solid white;box-shadow: 1px 1px 7px 7px;width: 886px; padding: 22px; border-radius: 7px; margin-top: 50px; margin-bottom: 50px;">
                                <h1>Add Participants For Solo Event</h1>
                                <div style="border: 1px solid black;">

                                </div><br>
                                <div class="row">
                                    <div class="col-md-12">
    <!--                                            <input type="text" placeholder="Team Code" class="cssinput" name="txtTeamcode" required="" style="width: 300px; margin-left: 555px;"><br>-->
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="cssinput" id="txtenro" name="txtenro" placeholder="Enrollment Number" required style=" padding: 5px; width: 837px; margin-bottom: 19px; text-align: center;">
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
                                    <div class="col-md-6">
                                        <br><input type="text" class="cssinput" id="txtnumber" name="txtnumber" pattern="^[6789][0-9]{9}$" maxlength="10" placeholder="Contact Number" required style=" padding: 5px; width: 404px;"><br>
                                    </div>

<!--                                    <div class="col-md-4">
                                        <br><select name="city" id="city" class="cssinput">
                                            <option>--City--</option>
                                            <option>Surat</option>
                                            <option>Navsari</option>
                                            <option>Valsad</option>
                                            <option>Bardoli</option>
                                        </select>
                                    </div>-->

                                    <div class="col-md-6">
                                        <br><select name="gender" id="gender" class="cssinput" style="width: 404px;">
                                            <option>--Gender--</option>
                                            <option value="F">Female</option>
                                            <option value="M">Male</option>
                                            <option>Others</option>
                                        </select><br>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-7">
                                        <br><select name="institute" id="institute" style="text-align: center;margin-left: -1px; height: 43px; border: 1px solid lightgray; border-radius: 5px; width: 540px;color: gray;">
                                            <option value="">Select Institute</option>
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
                                </div><br>
                                <center><input type="submit" id="btnregister" name="btnregister_solo" value="ADD" class="btn btn-info" style="width: 151px;"></center><br>
                            </form>
                        <?php } elseif ($_REQUEST['type'] == "Duo") { ?>
                            <form action="" method="POST" class="scroll" style="border: 3px solid white ;box-shadow: 1px 1px 7px 7px; width: 980px; padding: 22px; border-radius: 7px; margin-top: 50px; margin-bottom: 50px;">
                                <div>
                                    <h1>Add Participants For Duo Event</h1>
                                    <div style="border: 1px solid black;">

                                    </div><br>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="text" placeholder="Team Code" class="cssinput" name="txtTeamcode" required="" style="width: 300px; margin-left: 555px;"><br>
                                        </div>
                                    </div>
                                    <br><div style="border: 2px dashed gray; border-radius: 5px;">
                                        <h6 style="text-align: left;color: red;font-size: 17px;padding-left: 13px;margin-top: 10px;"><b>Member 1:&nbsp;-</b></h6>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <br><input type="text" class="cssinput" id="txtenro" name="txtenro_1" placeholder="Enrollment Number" required style=" padding: 5px; width: 870px; margin-bottom: 19px; text-align: center; margin-left: 15px;">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4"> 
                                                <input type="text" class="cssinput" id="txtfname" name="txtfname_1" pattern="^[A-Za-z]+$" placeholder="First Name" required style=" padding: 5px; width: 260px; margin-left: 15px;"><br>
                                            </div>
                                            <div class="col-md-4">
                                                <input type="text" class="cssinput" id="txtmname" name="txtmname_1" pattern="^[A-Za-z]+$" placeholder="Middle Name" required style=" padding: 5px; width: 260px;"><br>
                                            </div>
                                            <div class="col-md-4">
                                                <input type="text" class="cssinput" id="txtlname" name="txtlname_1" pattern="^[A-Za-z]+$" placeholder="Last Name" required style=" padding: 5px; width: 260px;"><br>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <br><input type="text" class="cssinput" id="txtnumber" name="txtnumber_1" pattern="^[6789][0-9]{9}$" maxlength="10" placeholder="Contact Number" required style=" padding: 5px; width: 415px;margin-left: 15px;"><br>
                                            </div>

                                            <div class="col-md-6">
                                                <br><select name="gender_1" id="gender" class="cssinput" style="width: 419px;">
                                                    <option>----Gender----</option>
                                                    <option value="F">Female</option>
                                                    <option value="M">Male</option>
                                                    <option>Others</option>
                                                </select><br>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-7">
                                                <br><select name="institute_1" id="institute" style="text-align: center;margin-left: 15px; height: 43px; border: 1px solid lightgray; border-radius: 5px; width: 581px;color: gray;">
                                                    <option value="">Select Institute</option>
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
                                                <br><input type="email" id="email" name="txtemail_1" placeholder="E-Mail" class="cssinput" style="margin-left: 80px;" required>
                                            </div>
                                        </div><br>
                                    </div>
                                    </fieldset>
                                    <!-- Second Form -->
                                    <br>
                                    <div style="border: 2px dashed gray; border-radius: 5px;">
                                        <h6 style="text-align: left;color: red;font-size: 17px;padding-left: 13px;margin-top: 10px;"><b>Member 2:&nbsp;-</b></h6>
                                        <div class="row" >
                                            <div class="col-md-12">
                                                <br><input type="text" class="cssinput" id="txtenro" name="txtenro_2" placeholder="Enrollment Number" required style=" padding: 5px; width: 870px; margin-bottom: 19px; text-align: center; margin-left: 15px;">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4"> 
                                                <input type="text" class="cssinput" id="txtfname" name="txtfname_2" pattern="^[A-Za-z]+$" placeholder="First Name" required style=" padding: 5px; width: 260px; margin-left: 15px;"><br>
                                            </div>
                                            <div class="col-md-4">
                                                <input type="text" class="cssinput" id="txtmname" name="txtmname_2" pattern="^[A-Za-z]+$" placeholder="Middle Name" required style=" padding: 5px; width: 260px;"><br>
                                            </div>
                                            <div class="col-md-4">
                                                <input type="text" class="cssinput" id="txtlname" name="txtlname_2" pattern="^[A-Za-z]+$" placeholder="Last Name" required style=" padding: 5px; width: 260px;"><br>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <br><input type="text" class="cssinput" id="txtnumber" name="txtnumber_2" pattern="^[6789][0-9]{9}$" maxlength="10" placeholder="Contact Number" required style=" padding: 5px; width: 415px; margin-left: 15px;"><br>
                                            </div>

                                            <div class="col-md-6">
                                                <br><select name="gender_2" id="gender" class="cssinput" style="width: 419px;">
                                                    <option>----Gender----</option>
                                                    <option value="F">Female</option>
                                                    <option value="M">Male</option>
                                                    <option>Others</option>
                                                </select><br>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-7">
                                                <br><select name="institute_2" id="institute" style="text-align: center;margin-left: 15px; height: 43px; border: 1px solid lightgray; border-radius: 5px; width: 581px;color: gray;">
                                                    <option value="">Select Institute</option>
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
                                                <br><input type="email" id="email" name="txtemail_2" placeholder="E-Mail" class="cssinput" style="margin-left: 80px;" required>
                                            </div>
                                        </div><br>
                                    </div><br>
                                    <center><input type="submit" id="btnregister" name="btnregister_duo" value="ADD" class="btn btn-info" style="width: 151px;"></center><br>
                                </div>

                            </form>
                        <?php } else if ($_REQUEST['type'] == "Group") { ?>
                            <form action="" method="POST" class="scroll" style="border: 3px solid white ;box-shadow: 1px 1px 7px 7px; width: 980px; padding: 22px; border-radius: 7px; margin-top: 50px; margin-bottom: 50px;">
                                <div>
                                    <h1>Add Participants For Group Event</h1>
                                    <div style="border: 1px solid black;">

                                    </div><br>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="text" placeholder="Team Code" class="cssinput" name="txtTeamcode" required="" style="width: 300px; margin-left: 555px;"><br>
                                        </div>
                                    </div>
                                    
                                    <br><div style="border: 2px dashed black; border-radius: 5px;">
                                        <h6 style="text-align: left;color: red;font-size: 17px;padding-left: 13px;margin-top: 10px;"><b>Member 1:&nbsp;-</b></h6><br>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input type="text" class="cssinput" id="txtenro" name="txtenro_1" placeholder="Enrollment Number" required style=" padding: 5px; width: 870px; margin-bottom: 19px; text-align: center; margin-left: 15px;">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4"> 
                                                <input type="text" class="cssinput" id="txtfname" name="txtfname_1" pattern="^[A-Za-z]+$" placeholder="First Name" required style=" padding: 5px; width: 260px; margin-left: 15px;"><br>
                                            </div>
                                            <div class="col-md-4">
                                                <input type="text" class="cssinput" id="txtmname" name="txtmname_1" pattern="^[A-Za-z]+$" placeholder="Middle Name" required style=" padding: 5px; width: 260px;"><br>
                                            </div>
                                            <div class="col-md-4">
                                                <input type="text" class="cssinput" id="txtlname" name="txtlname_1" pattern="^[A-Za-z]+$" placeholder="Last Name" required style=" padding: 5px; width: 260px;"><br>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <br><input type="text" class="cssinput" id="txtnumber" name="txtnumber_1" pattern="^[6789][0-9]{9}$" maxlength="10" placeholder="Contact Number" required style=" padding: 5px; width: 415px; margin-left: 15px;"><br>
                                            </div>

                                            <div class="col-md-6">
                                                <br><select name="gender_1" id="gender" class="cssinput" style="width: 415px;">
                                                    <option>--Gender--</option>
                                                    <option value="F">Female</option>
                                                    <option value="M">Male</option>
                                                    <option>Others</option>
                                                </select><br>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-7">
                                                <br><select name="institute_1" id="institute" style="text-align: center;margin-left: 15px; height: 43px; border: 1px solid lightgray; border-radius: 5px; width: 581px;color: gray;">
                                                    <option value="">Select Institute</option>
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
                                                <br><input type="email" id="email" name="txtemail_1" placeholder="E-Mail" class="cssinput" style="margin-left: 79px;" required>
                                            </div>
                                        </div><br>
                                    </div>
                                    <br>
                                    
                                    <!-- Second Form -->
                                    <div style="border: 2px dashed black; border-radius: 5px;">
                                        
                                        <h6 style="text-align: left;color: red;font-size: 17px;padding-left: 13px;margin-top: 10px;"><b>Member 2:&nbsp;-</b></h6><br>
                                        
                                        <div class="row" >
                                            <div class="col-md-12">
                                                <input type="text" class="cssinput" id="txtenro" name="txtenro_2" placeholder="Enrollment Number" required style=" padding: 5px; width: 870px; margin-bottom: 19px; text-align: center; margin-left: 15px;">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4"> 
                                                <input type="text" class="cssinput" id="txtfname" name="txtfname_2" pattern="^[A-Za-z]+$" placeholder="First Name" required style=" padding: 5px; width: 260px; margin-left: 15px;"><br>
                                            </div>
                                            <div class="col-md-4">
                                                <input type="text" class="cssinput" id="txtmname" name="txtmname_2" pattern="^[A-Za-z]+$" placeholder="Middle Name" required style=" padding: 5px; width: 260px;"><br>
                                            </div>
                                            <div class="col-md-4">
                                                <input type="text" class="cssinput" id="txtlname" name="txtlname_2" pattern="^[A-Za-z]+$" placeholder="Last Name" required style=" padding: 5px; width: 260px;"><br>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <br><input type="text" class="cssinput" id="txtnumber" name="txtnumber_2" pattern="^[6789][0-9]{9}$" maxlength="10" placeholder="Contact Number" required style=" padding: 5px; width: 415px; margin-left: 15px;"><br>
                                            </div>

                                            <div class="col-md-6">
                                                <br><select name="gender_2" id="gender" class="cssinput" style="width: 415px;">
                                                    <option>--Gender--</option>
                                                    <option value="F">Female</option>
                                                    <option value="M">Male</option>
                                                    <option>Others</option>
                                                </select><br>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-7">
                                                <br><select name="institute_2" id="institute" style="text-align: center;margin-left: 15px; height: 43px; border: 1px solid lightgray; border-radius: 5px; width: 581px;color: gray;">
                                                    <option value="">Select Institute</option>
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
                                                <br><input type="email" id="email" name="txtemail_2" placeholder="E-Mail" class="cssinput" style="margin-left: 80px;" required>
                                            </div>
                                        </div><br>
                                    </div>

                                    <br><div style="border: 2px dashed black; border-radius: 5px;">
                                        <h6 style="text-align: left;color: red;font-size: 17px;padding-left: 13px;margin-top: 10px;"><b>Member 3:&nbsp;-</b></h6><br>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input type="text" class="cssinput" id="txtenro" name="txtenro_3" placeholder="Enrollment Number" required style=" padding: 5px; width: 870px; margin-bottom: 19px; text-align: center; margin-left: 15px;">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4"> 
                                                <input type="text" class="cssinput" id="txtfname" name="txtfname_3" pattern="^[A-Za-z]+$" placeholder="First Name" required style=" padding: 5px; width: 260px;margin-left: 15px;"><br>
                                            </div>
                                            <div class="col-md-4">
                                                <input type="text" class="cssinput" id="txtmname" name="txtmname_3" pattern="^[A-Za-z]+$" placeholder="Middle Name" required style=" padding: 5px; width: 260px;"><br>
                                            </div>
                                            <div class="col-md-4">
                                                <input type="text" class="cssinput" id="txtlname" name="txtlname_3" pattern="^[A-Za-z]+$" placeholder="Last Name" required style=" padding: 5px; width: 260px;"><br>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <br><input type="text" class="cssinput" id="txtnumber" name="txtnumber_3" pattern="^[6789][0-9]{9}$" maxlength="10" placeholder="Contact Number" required style=" padding: 5px; width: 415px;margin-left: 15px;"><br>
                                            </div>

                                            <div class="col-md-6">
                                                <br><select name="gender_3" id="gender" class="cssinput" style="width: 415px;">
                                                    <option>--Gender--</option>
                                                    <option value="F">Female</option>
                                                    <option value="M">Male</option>
                                                    <option>Others</option>
                                                </select><br>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-7">
                                                <br><select name="institute_3" id="institute" style="text-align: center;margin-left: 15px; height: 43px; border: 1px solid lightgray; border-radius: 5px; width: 581px;color: gray;">
                                                    <option value="">Select Institute</option>
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
                                                <br><input type="email" id="email" name="txtemail_3" placeholder="E-Mail" class="cssinput" style="margin-left: 80px;" required>
                                            </div>
                                        </div><br>
                                    </div>
                                    <br>

                                    <div style="border: 2px dashed black; border-radius: 5px;">
                                        <h6 style="text-align: left;color: red;font-size: 17px;padding-left: 13px;margin-top: 10px;"><b>Member 4:&nbsp;-</b></h6><br>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input type="text" class="cssinput" id="txtenro" name="txtenro_4" placeholder="Enrollment Number" required style=" padding: 5px; width: 870px; margin-bottom: 19px; text-align: center; margin-left: 15px;">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4"> 
                                                <input type="text" class="cssinput" id="txtfname" name="txtfname_4" pattern="^[A-Za-z]+$" placeholder="First Name" required style=" padding: 5px; width: 260px;margin-left: 15px;"><br>
                                            </div>
                                            <div class="col-md-4">
                                                <input type="text" class="cssinput" id="txtmname" name="txtmname_4" pattern="^[A-Za-z]+$" placeholder="Middle Name" required style=" padding: 5px; width: 260px;"><br>
                                            </div>
                                            <div class="col-md-4">
                                                <input type="text" class="cssinput" id="txtlname" name="txtlname_4" pattern="^[A-Za-z]+$" placeholder="Last Name" required style=" padding: 5px; width: 260px;"><br>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <br><input type="text" class="cssinput" id="txtnumber" name="txtnumber_4" pattern="^[6789][0-9]{9}$" maxlength="10" placeholder="Contact Number" required style=" padding: 5px; width: 415px;margin-left: 15px;"><br>
                                            </div>

                                            <div class="col-md-6">
                                                <br><select name="gender_4" id="gender" class="cssinput" style="width: 415px;">
                                                    <option>--Gender--</option>
                                                    <option value="F">Female</option>
                                                    <option value="M">Male</option>
                                                    <option>Others</option>
                                                </select><br>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-7">
                                                <br><select name="institute_4" id="institute" style="text-align: center;margin-left: 15px; height: 43px; border: 1px solid lightgray; border-radius: 5px; width: 581px;color: gray;">
                                                    <option value="">Select Institute</option>
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
                                                <br><input type="email" id="email" name="txtemail_4" placeholder="E-Mail" class="cssinput" style="margin-left: 80px;" required>
                                            </div>
                                        </div><br>
                                    </div>
                                    <br>
                                    <div style="border: 2px dashed black; border-radius: 5px;">
                                        <h6 style="text-align: left;color: red;font-size: 17px;padding-left: 13px;margin-top: 10px;"><b>Member 5:&nbsp;-</b></h6><br>
                                        <div class="row" >
                                            <div class="col-md-12">
                                                <input type="text" class="cssinput" id="txtenro" name="txtenro_5" placeholder="Enrollment Number" required style=" padding: 5px; width: 870px; margin-bottom: 19px; text-align: center;margin-left: 15px;">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4"> 
                                                <input type="text" class="cssinput" id="txtfname" name="txtfname_5" pattern="^[A-Za-z]+$" placeholder="First Name" required style=" padding: 5px; width: 260px;margin-left: 15px;"><br>
                                            </div>
                                            <div class="col-md-4">
                                                <input type="text" class="cssinput" id="txtmname" name="txtmname_5" pattern="^[A-Za-z]+$" placeholder="Middle Name" required style=" padding: 5px; width: 260px;"><br>
                                            </div>
                                            <div class="col-md-4">
                                                <input type="text" class="cssinput" id="txtlname" name="txtlname_5" pattern="^[A-Za-z]+$" placeholder="Last Name" required style=" padding: 5px; width: 260px;"><br>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <br><input type="text" class="cssinput" id="txtnumber" name="txtnumber_5" pattern="^[6789][0-9]{9}$" maxlength="10" placeholder="Contact Number" required style=" padding: 5px; width: 415px;margin-left: 15px;"><br>
                                            </div>

                                            <div class="col-md-6">
                                                <br><select name="gender_5" id="gender" class="cssinput" style="width: 415px;">
                                                    <option>--Gender--</option>
                                                    <option value="F">Female</option>
                                                    <option value="M">Male</option>
                                                    <option>Others</option>
                                                </select><br>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-7">
                                                <br><select name="institute_5" id="institute" style="text-align: center;margin-left: 15px; height: 43px; border: 1px solid lightgray; border-radius: 5px; width: 581px;color: gray;">
                                                    <option value="">Select Institute</option>
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
                                                <br><input type="email" id="email" name="txtemail_5" placeholder="E-Mail" class="cssinput" style="margin-left: 80px;" required>
                                            </div>
                                        </div><br>
                                    </div>

                                    <br><div style="border: 2px dashed black; border-radius: 5px;">
                                        <h6 style="text-align: left;color: red;font-size: 17px;padding-left: 13px;margin-top: 10px;"><b>Member 6:&nbsp;-</b></h6><br>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input type="text" class="cssinput" id="txtenro" name="txtenro_6" placeholder="Enrollment Number" required style=" padding: 5px; width: 870px; margin-bottom: 19px; text-align: center;margin-left: 15px;">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4"> 
                                                <input type="text" class="cssinput" id="txtfname" name="txtfname_6" pattern="^[A-Za-z]+$" placeholder="First Name" required style=" padding: 5px; width: 260px;margin-left: 15px;"><br>
                                            </div>
                                            <div class="col-md-4">
                                                <input type="text" class="cssinput" id="txtmname" name="txtmname_6" pattern="^[A-Za-z]+$" placeholder="Middle Name" required style=" padding: 5px; width: 260px;"><br>
                                            </div>
                                            <div class="col-md-4">
                                                <input type="text" class="cssinput" id="txtlname" name="txtlname_6" pattern="^[A-Za-z]+$" placeholder="Last Name" required style=" padding: 5px; width: 260px;"><br>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <br><input type="text" class="cssinput" id="txtnumber" name="txtnumber_6" pattern="^[6789][0-9]{9}$" maxlength="10" placeholder="Contact Number" required style=" padding: 5px; width: 415px;"><br>
                                            </div>

                                            <div class="col-md-6">
                                                <br><select name="gender_6" id="gender" class="cssinput" style="width: 415px;">
                                                    <option>--Gender--</option>
                                                    <option value="F">Female</option>
                                                    <option value="M">Male</option>
                                                    <option>Others</option>
                                                </select><br>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-7">
                                                <br><select name="institute_6" id="institute" style="text-align: center;margin-left: 15px; height: 43px; border: 1px solid lightgray; border-radius: 5px; width: 581px;color: gray;">
                                                    <option value="">Select Institute</option>
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
                                                <br><input type="email" id="email" name="txtemail_6" placeholder="E-Mail" class="cssinput" style="margin-left: 80px;" required>
                                            </div>
                                        </div><br>
                                    </div>
                                    <br>

                                    <center><input type="submit" id="btnregister" name="btnregister_group" value="ADD" class="btn btn-info" style="width: 151px;"></center><br>
                                </div><br>


                            </form>
                        <?php } ?>


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
if (isset($_POST['btnregister_solo'])) {
    $q_tblp = "INSERT INTO tblparticipants (enro,firstname, middlename, lastname, gender, contactno, email, instituteid) VALUES ('" . $_POST['txtenro'] . "','" . $_POST['txtfname'] . "','" . $_POST['txtmname'] . "','" . $_POST['txtlname'] . "','" . $_POST['gender'] . "','" . $_POST['txtnumber'] . "','" . $_POST['txtemail'] . "','" . $_POST['institute'] . "')";
    $r_tblp = mysqli_query($con, $q_tblp);

    $q_tbltc = "INSERT INTO tblteam (teamcode) VALUES ('" . $_POST['txtTeamcode'] . "')";
    $r_tbltc = mysqli_query($con, $q_tbltc);
    $last_id = mysqli_insert_id($con);

    $eid = $_REQUEST['eid'];
    $q_tblep = "INSERT INTO tbleventparticipants (enro,eventid,teamid) VALUES ('" . $_POST['txtenro'] . "','$eid',$last_id)";
    $r_tblep = mysqli_query($con, $q_tblep);

    if ($r_tblep && $r_tblp && $r_tbltc) {
        header("Location:manage_participants.php");
    } else {
        echo "Something went wrong !";
    }
} elseif (isset($_POST['btnregister_duo'])) {

    $q_tblp = "INSERT INTO tblparticipants (enro,firstname, middlename, lastname, gender, contactno, email, instituteid) VALUES ('" . $_POST['txtenro_1'] . "','" . $_POST['txtfname_1'] . "','" . $_POST['txtmname_1'] . "','" . $_POST['txtlname_1'] . "','" . $_POST['gender_1'] . "','" . $_POST['txtnumber_1'] . "','" . $_POST['txtemail_1'] . "','" . $_POST['institute_1'] . "') , ('" . $_POST['txtenro_2'] . "','" . $_POST['txtfname_2'] . "','" . $_POST['txtmname_2'] . "','" . $_POST['txtlname_2'] . "','" . $_POST['gender_2'] . "','" . $_POST['txtnumber_2'] . "','" . $_POST['txtemail_2'] . "','" . $_POST['institute_2'] . "')";
    $r_tblp = mysqli_query($con, $q_tblp);

    $q_tbltc = "INSERT INTO tblteam (teamcode) VALUES ('" . $_POST['txtTeamcode'] . "')";
    $r_tbltc = mysqli_query($con, $q_tbltc);
    $last_id = mysqli_insert_id($con);

    $eid = $_REQUEST['eid'];
    $q_tblep = "INSERT INTO tbleventparticipants (enro,eventid,teamid) VALUES ('" . $_POST['txtenro_1'] . "','$eid',$last_id) , ('" . $_POST['txtenro_2'] . "','$eid',$last_id)";
    $r_tblep = mysqli_query($con, $q_tblep);

    if ($r_tblep && $r_tblp && $r_tbltc) {
        header("Location:manage_participants.php");
    } else {
        echo "Something went wrong !";
    }
} elseif (isset($_POST['btnregister_group'])) {
//    $c = $_REQUEST['c'];
//    echo $c;
//    if ($c == 3) {
//        $q_tblp = "INSERT INTO tblparticipants (enro,firstname, middlename, lastname, gender, city, contactno, email, instituteid) VALUES ('" . $_POST['txtenro_1'] . "','" . $_POST['txtfname_1'] . "','" . $_POST['txtmname_1'] . "','" . $_POST['txtlname_1'] . "','" . $_POST['gender_1'] . "','" . $_POST['city_1'] . "','" . $_POST['txtnumber_1'] . "','" . $_POST['txtemail_1'] . "','" . $_POST['institute_1'] . "') , ('" . $_POST['txtenro_2'] . "','" . $_POST['txtfname_2'] . "','" . $_POST['txtmname_2'] . "','" . $_POST['txtlname_2'] . "','" . $_POST['gender_2'] . "','" . $_POST['city_2'] . "','" . $_POST['txtnumber_2'] . "','" . $_POST['txtemail_2'] . "','" . $_POST['institute_2'] . "') , ('" . $_POST['txtenro_3'] . "','" . $_POST['txtfname_3'] . "','" . $_POST['txtmname_3'] . "','" . $_POST['txtlname_3'] . "','" . $_POST['gender_3'] . "','" . $_POST['city_3'] . "','" . $_POST['txtnumber_3'] . "','" . $_POST['txtemail_3'] . "','" . $_POST['institute_3'] . "') ";
//        $r_tblp = mysqli_query($con, $q_tblp);
//    } elseif ($c == 4) {
//        $q_tblp = "INSERT INTO tblparticipants (enro,firstname, middlename, lastname, gender, city, contactno, email, instituteid) VALUES ('" . $_POST['txtenro_1'] . "','" . $_POST['txtfname_1'] . "','" . $_POST['txtmname_1'] . "','" . $_POST['txtlname_1'] . "','" . $_POST['gender_1'] . "','" . $_POST['city_1'] . "','" . $_POST['txtnumber_1'] . "','" . $_POST['txtemail_1'] . "','" . $_POST['institute_1'] . "') , ('" . $_POST['txtenro_2'] . "','" . $_POST['txtfname_2'] . "','" . $_POST['txtmname_2'] . "','" . $_POST['txtlname_2'] . "','" . $_POST['gender_2'] . "','" . $_POST['city_2'] . "','" . $_POST['txtnumber_2'] . "','" . $_POST['txtemail_2'] . "','" . $_POST['institute_2'] . "') , ('" . $_POST['txtenro_3'] . "','" . $_POST['txtfname_3'] . "','" . $_POST['txtmname_3'] . "','" . $_POST['txtlname_3'] . "','" . $_POST['gender_3'] . "','" . $_POST['city_3'] . "','" . $_POST['txtnumber_3'] . "','" . $_POST['txtemail_3'] . "','" . $_POST['institute_3'] . "') , ('" . $_POST['txtenro_4'] . "','" . $_POST['txtfname_4'] . "','" . $_POST['txtmname_4'] . "','" . $_POST['txtlname_4'] . "','" . $_POST['gender_4'] . "','" . $_POST['city_4'] . "','" . $_POST['txtnumber_4'] . "','" . $_POST['txtemail_4'] . "','" . $_POST['institute_4'] . "')";
//        $r_tblp = mysqli_query($con, $q_tblp);
//    } elseif ($c == 5) {
//        $q_tblp = "INSERT INTO tblparticipants (enro,firstname, middlename, lastname, gender, city, contactno, email, instituteid) VALUES ('" . $_POST['txtenro_1'] . "','" . $_POST['txtfname_1'] . "','" . $_POST['txtmname_1'] . "','" . $_POST['txtlname_1'] . "','" . $_POST['gender_1'] . "','" . $_POST['city_1'] . "','" . $_POST['txtnumber_1'] . "','" . $_POST['txtemail_1'] . "','" . $_POST['institute_1'] . "') , ('" . $_POST['txtenro_2'] . "','" . $_POST['txtfname_2'] . "','" . $_POST['txtmname_2'] . "','" . $_POST['txtlname_2'] . "','" . $_POST['gender_2'] . "','" . $_POST['city_2'] . "','" . $_POST['txtnumber_2'] . "','" . $_POST['txtemail_2'] . "','" . $_POST['institute_2'] . "') , ('" . $_POST['txtenro_3'] . "','" . $_POST['txtfname_3'] . "','" . $_POST['txtmname_3'] . "','" . $_POST['txtlname_3'] . "','" . $_POST['gender_3'] . "','" . $_POST['city_3'] . "','" . $_POST['txtnumber_3'] . "','" . $_POST['txtemail_3'] . "','" . $_POST['institute_3'] . "') , ('" . $_POST['txtenro_4'] . "','" . $_POST['txtfname_4'] . "','" . $_POST['txtmname_4'] . "','" . $_POST['txtlname_4'] . "','" . $_POST['gender_4'] . "','" . $_POST['city_4'] . "','" . $_POST['txtnumber_4'] . "','" . $_POST['txtemail_4'] . "','" . $_POST['institute_4'] . "') , ('" . $_POST['txtenro_5'] . "','" . $_POST['txtfname_5'] . "','" . $_POST['txtmname_5'] . "','" . $_POST['txtlname_5'] . "','" . $_POST['gender_5'] . "','" . $_POST['city_5'] . "','" . $_POST['txtnumber_5'] . "','" . $_POST['txtemail_5'] . "','" . $_POST['institute_5'] . "')";
//        $r_tblp = mysqli_query($con, $q_tblp);
//    } elseif ($c == 6) {
        $q_tblp = "INSERT INTO tblparticipants (enro,firstname, middlename, lastname, gender, contactno, email, instituteid) VALUES ('" . $_POST['txtenro_1'] . "','" . $_POST['txtfname_1'] . "','" . $_POST['txtmname_1'] . "','" . $_POST['txtlname_1'] . "','" . $_POST['gender_1'] . "','" . $_POST['txtnumber_1'] . "','" . $_POST['txtemail_1'] . "','" . $_POST['institute_1'] . "') , ('" . $_POST['txtenro_2'] . "','" . $_POST['txtfname_2'] . "','" . $_POST['txtmname_2'] . "','" . $_POST['txtlname_2'] . "','" . $_POST['gender_2'] . "','" . $_POST['txtnumber_2'] . "','" . $_POST['txtemail_2'] . "','" . $_POST['institute_2'] . "') , ('" . $_POST['txtenro_3'] . "','" . $_POST['txtfname_3'] . "','" . $_POST['txtmname_3'] . "','" . $_POST['txtlname_3'] . "','" . $_POST['gender_3'] . "','" . $_POST['txtnumber_3'] . "','" . $_POST['txtemail_3'] . "','" . $_POST['institute_3'] . "') , ('" . $_POST['txtenro_4'] . "','" . $_POST['txtfname_4'] . "','" . $_POST['txtmname_4'] . "','" . $_POST['txtlname_4'] . "','" . $_POST['gender_4'] . "','" . $_POST['txtnumber_4'] . "','" . $_POST['txtemail_4'] . "','" . $_POST['institute_4'] . "') , ('" . $_POST['txtenro_5'] . "','" . $_POST['txtfname_5'] . "','" . $_POST['txtmname_5'] . "','" . $_POST['txtlname_5'] . "','" . $_POST['gender_5'] . "','" . $_POST['txtnumber_5'] . "','" . $_POST['txtemail_5'] . "','" . $_POST['institute_5'] . "') , ('" . $_POST['txtenro_6'] . "','" . $_POST['txtfname_6'] . "','" . $_POST['txtmname_6'] . "','" . $_POST['txtlname_6'] . "','" . $_POST['gender_6'] . "','" . $_POST['txtnumber_6'] . "','" . $_POST['txtemail_6'] . "','" . $_POST['institute_6'] . "')";
        $r_tblp = mysqli_query($con, $q_tblp);
//        echo $q_tblp;
//        exit();
    //}

    $q_tbltc = "INSERT INTO tblteam (teamcode) VALUES ('" . $_POST['txtTeamcode'] . "')";
    $r_tbltc = mysqli_query($con, $q_tbltc);
    $last_id = mysqli_insert_id($con);

    $eid = $_REQUEST['eid'];
    $q_tblep = "INSERT INTO tbleventparticipants (enro,eventid,teamid) VALUES ('" . $_POST['txtenro_1'] . "','$eid',$last_id) , ('" . $_POST['txtenro_2'] . "','$eid',$last_id), ('" . $_POST['txtenro_3'] . "','$eid',$last_id), ('" . $_POST['txtenro_4'] . "','$eid',$last_id), ('" . $_POST['txtenro_5'] . "','$eid',$last_id), ('" . $_POST['txtenro_6'] . "','$eid',$last_id)";
    $r_tblep = mysqli_query($con, $q_tblep);

    if ($r_tblep && $r_tblp && $r_tbltc) {
        header("Location:manage_participants.php");
    } else {
        echo "Something went wrong !";
    }
}
?>