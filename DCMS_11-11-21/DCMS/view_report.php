<?php
ob_start();
session_start();
if (isset($_SESSION['flag']) != 1) {
    header("Location: ./login.php");
    exit();
}
include './connection.php';
//include('./vendor/autoload.php');
//
//if (isset($_POST['btnprint'])) {
//    $html = ob_get_contents();
//    echo $html;
//    die();
////    $mpdf = new \Mpdf\Mpdf();
////    $mpdf->WriteHTML('view_report.php');
////    $file = time() . '.pdf';
////    $mpdf->Output($file, 'D');
//}
?>
<html>
    <head>

        <?php
        //include './head.php';
        ?>
        <title>Event Wise Report | Dance Club Management System</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="stylesheet" type="text/css" href="print.css" media="print">

        <style>
            table,tr,td {
                border: 1px solid gray;
                padding: 5px;
                border-collapse: collapse;
            }

            th, td {
                text-align: left;
                padding: 8px;
            }

            tr:nth-child(odd) {background-color: lightsalmon;}
        </style>
    </head>
    <body>
        <?php
        //include './sidebar.php';
        ?>

        <div id="right-panel" class="right-panel">
            <?php
            //include './header.php';
            ?>

            <div class="content">
                <section>
                    <center>
                        <div style="border: 3px solid darkgray;width: 886px; padding: 22px; border-radius: 7px; margin-top: 50px; margin-bottom: 50px;">
                            <h1 style="text-align: left;">Event Report</h1>
                            <div style="border: 1px solid black;">

                            </div><br>
                            <p style="text-align: left; color: black;"><?php echo "<b>Date: </b>" . date("d/m/Y") ?></p>
                            <span style="float: right; margin-top: -50px;">

                                                                <button onclick="window.print()" id="printbtn" style="background-color: #17a2b8; color: white; height: 30px; border-color: #17a2b8; margin-top: 9px;">Print</button>
<!--                                <form method="post">
                                    <input type="submit" name="btnprint" value="Print">
                                </form>-->


                            </span>
                            <table style="width: 830px;">

                                <?php
                                $sql = "select e.name,e.eventtype,e.event_date,e.venue,e.poster,e.rules,e.agenda,count(t.teamcode) as 'Total',evs.team_score,j.firstname from (((((tbleventscore evs INNER JOIN tblteam t on evs.teamid = t.id) INNER JOIN tbleventcriteria evc on evs.eventCriteriaid = evc.id) INNER JOIN tblevent e on evc.eventid = e.id)INNER JOIN tbleventjudge ej on evs.eventJudgeid = ej.id)INNER join tbljudge j on ej.judgeid = j.id)where e.id='" . $_GET['id'] . "' ORDER BY evs.team_score DESC;";

                                $rs_result = mysqli_query($con, $sql);

                                $row = mysqli_fetch_assoc($rs_result);
                                ?>
                                <tr>
                                    <td width="20%"><b>Event Name</b></td>
                                    <td><?php echo $row['name'] ?></td>
                                </tr>

                                <tr>
                                    <td><b>Coordinator Name</b></td>
                                    <td>
                                        <?php
                                        $q = "select e.name,m.firstname from ((tbleventcoordinator ev INNER JOIN tblevent e on ev.eventid = e.id) INNER JOIN tblmember m on ev.memberid = m.id) where e.id='" . $_GET['id'] . "'";
                                        $rsl = mysqli_query($con, $q);

                                        while ($w = mysqli_fetch_assoc($rsl)) {
                                            echo $w['firstname'];
                                        }
                                        ?>
                                    </td>
                                </tr>

                                <tr>
                                    <td width="20%"><b>Event Type</b></td>
                                    <td><?php echo $row['eventtype'] ?></td>
                                </tr>

                                <tr>
                                    <td width="20%"><b>Event Date</b></td>
                                    <td><?php echo $row['event_date'] ?></td>
                                </tr>

                                <tr>
                                    <td width="20%"><b>Venue</b></td>
                                    <td><?php echo $row['venue'] ?></td>
                                </tr>

                                <tr>
                                    <td width="20%"><b>Poster</b></td>
                                    <td><?php echo $row['poster'] ?></td>
                                </tr>

                                <tr>
                                    <td width="20%"><b>Rule</b></td>
                                    <td><?php echo $row['rules'] ?></td>
                                </tr>

                                <tr>
                                    <td width="20%"><b>Agenda</b></td>
                                    <td><?php echo $row['agenda'] ?></td>
                                </tr>

                                <tr>
                                    <td><b>Judge Name</b></td>
                                    <td><?php
                                        $s = "select j.firstname,e.name from ((tbleventjudge ej INNER JOIN tbljudge j on ej.judgeid = j.id) INNER join tblevent e on ej.eventid = e.id) where e.id='" . $_GET['id'] . "'";
                                        $r = mysqli_query($con, $s);

                                        while ($w = mysqli_fetch_assoc($r)) {
                                            echo $w['firstname'] . "<br>";
                                        }
                                        ?></td>
                                </tr>

                                <tr>
                                    <td><b>Total Teams</b></td>
                                    <td><?php echo $row['Total'] ?></td>
                                </tr>

                                <tr>
                                    <td><b>Criteria</b></td>
                                    <td>
                                        <?php
                                        $sql = "select e.name,evc.weightage,c.criteria from ((tbleventcriteria evc INNER join tblevaluationcriteria c on evc.evaluationCriteriaId = c.id) INNER join tblevent e on evc.eventid = e.id) where e.id='" . $_GET['id'] . "'";
                                        $result = mysqli_query($con, $sql);

                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo $row['criteria'] . " - " . $row['weightage'] . "<br>";
                                        }
                                        ?>
                                    </td>
                                </tr>
                                <?php ?>
                            </table>
                        </div>
                    </center>
                </section>
            </div>


            <div class="clearfix"></div>
            <footer class="site-footer">
                <?php
                //include './footer.php';
                ?>
            </footer>
        </div>

        <?php
        include './script.php'
        ?>
    </body>
</html>