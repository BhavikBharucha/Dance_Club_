<?php
ob_start();
session_start();
if ($_SESSION['flag'] != 1) {
    header("Location:index.php");
}
$_SESSION['facultypages']=1;
try {
    include './connection.php';
} catch (Exception $ex) {
    header("Location:error.php");
}
?>
<html>
    <head>
        <title>Faculty Dashboard | Dance Club Management System</title>
        <?php
        include './head.php';
        ?>
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
        </style>
    </head>
    <?php
   

    $mail_send = $_SESSION['email'];
    $_SESSION['mail_profile'] = $mail_send;
    ?>
    <body>
        <?php
        include './sidebar.php';
        ?>

        <div id="right-panel" class="right-panel">
            <?php
            include './header.php';
            ?>

            <div class="content" style="height: 340px;">
                <section>
                    <div class="row">
                        <div class="col-md-4">
                            <a href="faculty_manage_student_member.php" style="text-decoration: none;">
                                <div class="divdesign"style="background-color: blue;">
                                    <span class="heading">Manage Student Member
                                        <br>
                                       <?php // echo $row['total']; ?>
                                    </span>
                                </div>
                            </a>
                        </div>


                        <div class="col-md-4">
                            <a href="faculty_manage_student_coordinator.php" style="text-decoration: none; ">
                                <div class="divdesign" style="background-color: gold;">
                                    <span class="heading">Manage Student Coordinator 
                                        <br>
                                        <?php // echo $rowstdcod['total']; ?>
                                    </span>
                                </div>
                            </a>
                        </div>


                        <div class="col-md-4">
                            <a href="faculty_manage_participants.php" style="text-decoration: none;">
                                <div class="divdesign" style="background-color: red;">
                                    <span class="heading">Manage Participants
                                        <br>
                                        <?php // echo $rowevent['total']; ?>
                                    </span>
                                </div>
                            </a>
                        </div>
                    </div>
                </section>
            </div>

            <div class="clearfix"></div>
            <footer class="site-footer">
                <?php
                $q = "SELECT firstname,lastname,contactno,email,role FROM tblmember WHERE role='Chairman' or role='Co-Chairman' and status='A'";
                $r = mysqli_query($con, $q);
                $name = array();
                $contact = array();
                $email = array();
                while ($row = mysqli_fetch_assoc($r)) {
                    $temp = $row['firstname'] . " " . $row['lastname'];
                    array_push($name, $temp);
                    array_push($contact, $row['contactno']);
                    array_push($email, $row['email']);
                }
                ?>
                <div class="footer-inner bg-white" style="bottom: 0; height: 10px; position: relative;">
                    <div class="row">
                        <div class="col-md-4" style="height: 10px;">
                            <p><?php echo $name[0] . " : " . $contact[0] . "<p style='margin-left: 117px; margin-top: -17px'>{$email[0]}</p>"; ?></p>    
                            <p><?php echo $name[1] . " : " . $contact[1] . " \n <p style='margin-top:-16px ; margin-left:99px;'> {$email[1]} </p>"; ?></p>
                        </div>
                        <div class="col-md-6 text-right">
                            Designed by <a href="#">DCMS</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>

        <?php
        include './script.php';
        ob_flush();
        ?>
    </body>
</html>