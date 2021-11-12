<?php
ob_start();
session_start();
if (isset($_SESSION['flag']) != 1) {
    header("Location: ./login.php");
}
include './connection.php';
//For coordinaor
$sql = "select count(*) as total from tblstudent";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);

$sqlstdcod = "select count(*) as total from tblstudent_coordinator";
$resultcod = mysqli_query($con, $sqlstdcod);
$rowstdcod = mysqli_fetch_assoc($resultcod);

$sqlevent = "select count(*) as total from tblevent";
$resultevent = mysqli_query($con, $sqlevent);
$rowevent = mysqli_fetch_assoc($resultevent);

$mail_send = $_SESSION['mail'];
$_SESSION['mail_profile'] = $mail_send;
?>

<html>
    <head>

        <?php
        include './head.php';
        ?>
        <title>Faculty Dashboard</title>
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
    <body>
        <?php
        include './sidebar.php';
        ?>

        <div id="right-panel" class="right-panel">
            <?php
            include './header.php';
            ?>

            <div class="content">
<!--                <div>
                    <?php //echo "<a href='faculty_profile.php?mail='" . $_SESSION['mail'] . "'' style='float: left; margin-top: 20px; margin-left: 40px;'>  '" . $_SESSION['name'] . "'" ?></a>
                    <a href="./signout.php" style="text-decoration: none; float: right;  margin-top: 20px;margin-right: 40px;">Logout</a>
                </div>-->
                <section>
                    <h1 style="margin-left: 50px; background-color: lightgray;">Dashboard</h1><br>
                    
                    <div class="row" style="margin-left: 50px;margin-top: 50px; margin-bottom: 250px;">

                            <div class="col-md-4">
                                <a href="manage_student_member.php" style="text-decoration: none;">
                                    <div class="divdesign"style="background-color: blue;">
                                        <span class="heading">Manage Student Member
                                            <br>
                                            <?php echo $row['total']; ?>
                                        </span>
                                    </div>
                                </a>
                            </div>


                            <div class="col-md-4">
                                <a href="manage_student_coordinator.php" style="text-decoration: none; ">
                                    <div class="divdesign" style="background-color: gold;">
                                        <span class="heading">Manage Student Coordinator 
                                            <br>
                                            <?php echo $rowstdcod['total']; ?>
                                        </span>
                                    </div>
                                </a>
                            </div>


                            <div class="col-md-4">
                                <a href="manage_participants.php" style="text-decoration: none;">
                                    <div class="divdesign" style="background-color: red;">
                                        <span class="heading">Manage Participants
                                            <br>
                                            <?php echo $rowevent['total']; ?>
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
                include './footer.php';
                ?>
            </footer>
        </div>

        <?php
        include './script.php'
        ?>
    </body>
</html>