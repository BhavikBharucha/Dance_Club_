<?php
ob_start();
session_start();
if ($_SESSION['adminpages'] != 1 && $_SESSION['chairmanpages'] != 1 && $_SESSION['coChairmanpages'] != 1 ) {
    header("Location:index.php");
}
try {
    include './connection.php';
} catch (Exception $ex) {
    header("Location:error.php");
}
?>
<html>
    <head>
        <title>Generate Report | Dance Club Management System</title>
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
        ?>

        <div id="right-panel" class="right-panel">
            <?php
            include './header.php';
            ?>

            <div class="content">
                <section>
                    <div class="row">

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
                            <a href="event_wise_coordinator.php" style="text-decoration: none; ">
                                <div class="divdesign" style="background-color: gold;">
                                    <span class="heading">Event Wise Coordinator Report 
                                        <br>
                                        <?php //echo $rowstdcod['total']; ?>
                                    </span>
                                </div>
                            </a>
                        </div>


                        <div class="col-md-4">
                            <a href="event_wise_judge.php" style="text-decoration: none;">
                                <div class="divdesign" style="background-color: red;">
                                    <span class="heading">Event Wise Judge Report
                                        <br>
                                        <?php //echo $rowevent['total']; ?>
                                    </span>
                                </div>
                            </a>
                        </div>

                    </div><br>

                    <div class="row" >
                        <div class="col-md-4">
                            <a href="report_between_two_dates.php" style="text-decoration: none;">
                                <div class="divdesign" style="background-color: #00c292;">
                                    <span class="heading">Date Wise Event Report
                                        <br>
                                        <?php //echo $rowevent['total']; ?>
                                    </span>
                                </div>
                            </a>
                        </div>

                        <div class="col-md-4">
                            <a href="event_wise_participants.php" style="text-decoration: none;">
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
        include './script.php';
        ob_flush();
        ?>
    </body>
</html>