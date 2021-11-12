<?php
ob_start();
session_start();
if ($_SESSION['flag'] != 1) {
    header("Location:index.php");
}
$_SESSION['chairmanpages'] = 1;
try {
    include './connection.php';
} catch (Exception $ex) {
    header("Location:error.php");
}
?>
<html>
    <head>
        <title>Chairman Dashboard | Dance Club Management System</title>
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
    <body>
        <?php
        include './sidebar.php';
        $mail_send = $_SESSION['email'];
        $_SESSION['mail_profile'] = $mail_send;
        ?>

        <div id="right-panel" class="right-panel">
            <?php
            include './header.php';
            ?>

            <div class="content" style="height: 520px;">
                <section>
                    <div class="row">
                        <div class="col-md-4">

                            <a href="chairman_manage_events.php" style="text-decoration: none;">
                                <div class="divdesign"style="background-color: blue;">
                                    <span class="heading">Manage Event
                                        <br>
                                        <?php // echo $event_count['total'];  ?>
                                    </span>
                                </div>
                            </a>

                        </div>
                        <div class="col-md-4">
                            <a href="chairman_manage_member_coordinator.php" style="text-decoration: none; ">
                                <div class="divdesign" style="background-color: gold;">
                                    <span class="heading">Manage Member Coordinator 
                                        <br>
                                        <?php //echo $rowcochairman['total'];  ?>
                                    </span>
                                </div>
                            </a>

                        </div>
                        <div class="col-md-4">
                            <a href="chairman_manage_judges.php" style="text-decoration: none;">
                                <div class="divdesign" style="background-color: red;">
                                    <span class="heading">Manage Judges
                                        <br>
                                        <?php //echo $rowinst['total'];  ?>
                                    </span>
                                </div>
                            </a>
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-md-4">
                            <a href="chairman_manage_notification.php" style="text-decoration: none;">
                                <div class="divdesign" style="background-color: greenyellow;">
                                    <span class="heading">Manage Notification
                                        <br>
                                        <?php //echo $rowinst['total'];  ?>
                                    </span>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4">
                            <a href="chairman_manage_criteria.php" style="text-decoration: none;">
                                <div class="divdesign" style="background-color: lightsalmon;">
                                    <span class="heading">Manage Criteria
                                        <br>
                                        <?php //echo $rowinst['total'];  ?>
                                    </span>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4">
                            <a href="chairman_manage_score.php" style="text-decoration: none;">
                                <div class="divdesign" style="background-color: skyblue;">
                                    <span class="heading">Manage Score
                                        <br>
                                        <?php //echo $rowinst['total'];  ?>
                                    </span>
                                </div>
                            </a>
                        </div>
                    </div><br>
                    <div class="row">
                        <!--<center>-->
                        <div class="col-md-4">
                        </div>
                        <div class="col-md-4">
                            <a href="report.php" style="text-decoration: none;">
                                <div class="divdesign" style="background-color: khaki;">
                                    <span class="heading">Generate Report
                                        <br>
                                        <?php //echo $rowinst['total'];  ?>
                                    </span>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4">
                        </div>
                        <!--</center>-->
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
        include './script.php';
        ?>
    </body>
</html>