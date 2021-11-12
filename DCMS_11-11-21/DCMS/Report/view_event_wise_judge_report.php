<?php
ob_start();
session_start();
if (isset($_SESSION['flag']) != 1) {
    header("Location: ./login.php");
    exit();
} else if (isset($_SESSION['eventnamejudgewise']) == "") {
    header("Location: event_wise_coordinator_report.php");
    exit();
}
include './connection.php';
?>
<html>
    <head>

        <?php
//include './head.php';
        ?>
        <title>Event Wise Judge Report | Dance Club Management System</title>
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
                            <h1 style="text-align: center;margin-top: -5px;"><span style="float: left;margin-top: -7px;margin-right: -80px;"><img src="images/UTU only NAAC.png" height="108" width="100"></span>UKA Tarsadia University,<br>Maliba Campus</h1><br>
                            <div style="border: 2px dashed black;">
                                
                            </div>
                            
                            <h4 style="text-align: center;"><b>Report Type</b>Event Wise Judge Report</h4>
<!--                            <div style="border: 1px solid black;">

                            </div>-->
                            <br>
                            <p style="text-align: left; color: black;"><?php echo "<b>Date: </b>" . date("d/m/Y") ?></p>
                            <span style="float: right; margin-top: -50px;">

                                <button onclick="window.print()" id="printbtn" style="background-color: #17a2b8; color: white; height: 30px; border-color: #17a2b8; margin-top: 9px;">Print</button>

                            </span>
                            <table style="width: 830px;">

                                <?php
                                $sql = "SELECT e.name,j.firstname,j.middlename,j.lastname,j.address,j.city,j.gender,j.contactno,j.email from ((tbleventjudge ej INNER JOIN tblevent e on ej.eventid = e.id) INNER join tbljudge j on ej.judgeid = j.id) where e.id='" . $_SESSION['eventnamejudgewise'] . "'";

                                $rs_result = mysqli_query($con, $sql);

                                $row = mysqli_fetch_assoc($rs_result);
                                ?>
                                <tr>
                                    <td width="20%"><b>Event Name</b></td>
                                    <td><?php echo $row['name'] ?></td>
                                </tr>

                                <tr>
                                    <td><b>Judge Name</b></td>
                                    <td><?php
                                        $s = "SELECT e.name,j.firstname,j.middlename,j.lastname,j.address,j.city,j.gender,j.contactno,j.email from ((tbleventjudge ej INNER JOIN tblevent e on ej.eventid = e.id) INNER join tbljudge j on ej.judgeid = j.id) where e.id='" . $_SESSION['eventnamejudgewise'] . "'";
                                        $r = mysqli_query($con, $s);

                                        while ($w = mysqli_fetch_assoc($r)) {
                                            echo $w['firstname'] . " " . $w['middlename'] . " " . $w['lastname'] . "<br>";
                                        }
                                        ?>
                                    </td>
                                </tr>

                                <tr>
                                    <td width="20%"><b>Address</b></td>
                                    <td><?php
                                        $s = "SELECT e.name,j.firstname,j.address from ((tbleventjudge ej INNER JOIN tblevent e on ej.eventid = e.id) INNER join tbljudge j on ej.judgeid = j.id) where e.id='" . $_SESSION['eventnamejudgewise'] . "'";
                                        $r = mysqli_query($con, $s);

                                        while ($w = mysqli_fetch_assoc($r)) {
                                            echo $w['firstname'] . " - " . $w['address'] . "<br>";
                                        }
                                        ?></td>
                                </tr>

                                <tr>
                                    <td width="20%"><b>City</b></td>
                                    <td><?php
                                        $s = "SELECT e.name,j.firstname,j.city from ((tbleventjudge ej INNER JOIN tblevent e on ej.eventid = e.id) INNER join tbljudge j on ej.judgeid = j.id) where e.id='" . $_SESSION['eventnamejudgewise'] . "'";
                                        $r = mysqli_query($con, $s);

                                        while ($w = mysqli_fetch_assoc($r)) {
                                            echo $w['firstname'] . " - " . $w['city'] . "<br>";
                                        }
                                        ?></td>
                                </tr>

                                <tr>
                                    <td width="20%"><b>Gender</b></td>
                                    <td><?php
                                        
                                        ?>
                                        <?php
                                        $s = "SELECT e.name,j.firstname,j.gender from ((tbleventjudge ej INNER JOIN tblevent e on ej.eventid = e.id) INNER join tbljudge j on ej.judgeid = j.id) where e.id='" . $_SESSION['eventnamejudgewise'] . "'";
                                        $r = mysqli_query($con, $s);
                                        
                                        while ($w = mysqli_fetch_assoc($r)) {
                                            
                                        $g = "";
                                        if ($w['gender'] == 'M') {
                                            $g = "Male";
                                        } elseif ($w['gender'] == 'F') {
                                            $g = "Female";
                                        }
                                            echo $w['firstname'] . " - " .$g . "<br>";
                                        }
                                        ?>
                                    </td>
                                </tr>

                                <tr>
                                    <td width="20%"><b>Contactno</b></td>
                                    <td><?php
                                        $s = "SELECT e.name,j.firstname,j.contactno from ((tbleventjudge ej INNER JOIN tblevent e on ej.eventid = e.id) INNER join tbljudge j on ej.judgeid = j.id) where e.id='" . $_SESSION['eventnamejudgewise'] . "'";
                                        $r = mysqli_query($con, $s);

                                        while ($w = mysqli_fetch_assoc($r)) {
                                            echo $w['firstname'] . " - " . $w['contactno'] . "<br>";
                                        }
                                        ?></td>
                                </tr>

                                <tr>
                                    <td width="20%"><b>Email Address</b></td>
                                    <td><?php
                                        $s = "SELECT e.name,j.firstname,j.email from ((tbleventjudge ej INNER JOIN tblevent e on ej.eventid = e.id) INNER join tbljudge j on ej.judgeid = j.id) where e.id='" . $_SESSION['eventnamejudgewise'] . "'";
                                        $r = mysqli_query($con, $s);

                                        while ($w = mysqli_fetch_assoc($r)) {
                                            echo $w['firstname'] . " - " . $w['email'] . "<br>";
                                        }
                                        ?></td>
                                </tr>
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