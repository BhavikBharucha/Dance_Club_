<?php
ob_start();
session_start();
if (isset($_SESSION['flag']) != 1) {
    header("Location: ./login.php");
}
include './connection.php';
?>
<html>
    <head>

        <?php
        include './head.php';
        ?>
        <title>Report | Faculty Dashboard</title>
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
                <section>
                    <div class="row" style="margin-left: 50px;margin-top: 50px;">

                        <div class="col-md-4">
                            <a href="event_report.php" style="text-decoration: none;">
                                <div class="divdesign"style="background-color: blue;">
                                    <span class="heading">Event Report
                                        <br>
                                        <?php //echo $row['total']; ?>
                                    </span>
                                </div>
                            </a>
                        </div>


                        <div class="col-md-4">
                            <a href="event_wise_coordinator_report.php" style="text-decoration: none; ">
                                <div class="divdesign" style="background-color: gold;">
                                    <span class="heading">Event Wise Coordinator Report 
                                        <br>
                                        <?php //echo $rowstdcod['total']; ?>
                                    </span>
                                </div>
                            </a>
                        </div>


                        <div class="col-md-4">
                            <a href="event_wise_judge_report.php" style="text-decoration: none;">
                                <div class="divdesign" style="background-color: red;">
                                    <span class="heading">Event Wise Judge Report
                                        <br>
                                        <?php //echo $rowevent['total']; ?>
                                    </span>
                                </div>
                            </a>
                        </div>

                    </div><br>

                    <div class="row" style="margin-left: 50px;margin-top: 50px;margin-bottom: 250px;">
                        <div class="col-md-4">
                            <a href="report_between_two_date.php" style="text-decoration: none;">
                                <div class="divdesign" style="background-color: #00c292;">
                                    <span class="heading">Manage Event Report
                                        <br>
                                        <?php //echo $rowevent['total']; ?>
                                    </span>
                                </div>
                            </a>
                        </div>
                        
                        <div class="col-md-4">
                            <a href="event_wise_participant_report.php" style="text-decoration: none;">
                                <div class="divdesign" style="background-color: coral;">
                                    <span class="heading">Event Wise Participant Report
                                        <br>
                                        <?php //echo $rowevent['total']; ?>
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