<?php
ob_start();
session_start();
if (isset($_SESSION['flag']) != 1) {
    header("Location: ./login.php");
    exit();
}
else if(isset ($_SESSION['eventnamecodwise']) == "")
{
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
        <title>Event Wise Coordinator Report | Dance Club Management System</title>
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
                            
                            <h4 style="text-align: center;"><b>Report Type:</b>Event Wise Coordinator Report</h4>
<!--                            <div style="border: 1px solid black;">

                            </div>-->
                            <br>
                            <p style="text-align: left; color: black;"><?php echo "<b>Date: </b>" . date("d/m/Y") ?></p>
                            <span style="float: right; margin-top: -50px;">

                                <button onclick="window.print()" id="printbtn" style="background-color: #17a2b8; color: white; height: 30px; border-color: #17a2b8; margin-top: 9px;">Print</button>

                            </span>
                            <table style="width: 830px;">

                                <?php
                                $sql = "select e.name,m.firstname,m.middlename,m.lastname,m.contactno,m.email,i.institutename from (((tbleventcoordinator evc INNER JOIN tblevent e on evc.eventid = e.id)INNER JOIN tblmember m on evc.memberid = m.id)INNER JOIN tblinstitute i on m.instituteid = i.id) where e.id='".$_SESSION['eventnamecodwise']."'";

                                $rs_result = mysqli_query($con, $sql);

                                $row = mysqli_fetch_assoc($rs_result);
                                ?>
                                <tr>
                                    <td width="20%"><b>Event Name</b></td>
                                    <td><?php echo $row['name'] ?></td>
                                </tr>

                                <tr>
                                    <td><b>Coordinator Name</b></td>
                                    <td><?php echo $row['firstname'] . " " .$row['middlename'] . " " . $row['lastname'] ?></td>
                                </tr>

<!--                                <tr>
                                    <td width="20%"><b>Event Type</b></td>
                                    <td><?php //echo $row['middlename'] ?></td>
                                </tr>

                                <tr>
                                    <td width="20%"><b>Event Date</b></td>
                                    <td><?php //echo $row['lastname'] ?></td>
                                </tr>-->

                                <tr>
                                    <td width="20%"><b>Contactno</b></td>
                                    <td><?php echo $row['contactno'] ?></td>
                                </tr>

                                <tr>
                                    <td width="20%"><b>Email Address</b></td>
                                    <td><?php echo $row['email'] ?></td>
                                </tr>

                                <tr>
                                    <td width="20%"><b>Institute Name</b></td>
                                    <td><?php echo $row['institutename'] ?></td>
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