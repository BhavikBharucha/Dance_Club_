<?php
ob_start();
session_start();
if($_SESSION['coChairmanpages']!=1){
    header("Location:index.php");
}
try {
    include './connection.php';
} catch (Exception $e) {
    header("Location: error.php");
}
?>
<html>
    <head>
        <title>Manage Score | Dance Club Management System</title>
        <?php
        include './head.php';
        ?>
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
                    <div class="content">
                        <div class="animated fadeIn">
                            <div class="row">

                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <strong class="card-title">Manage Score</strong>
                                            <div style="float: right;">
                                                <!--<a href="admin_add_coChairman.php" class="btn btn-info"><i class="fa fa-plus"></i> Add</a>-->
                                                <a href="coChairman_dashboard.php" class="btn btn-success"><i class="fa fa-plus"></i> Back</a></div>
                                        </div>
                                        <div class="card-body">
                                            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th width="10%" class="th">Sr</th>
                                                        <th class="th">Event</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <?php
                                                    $sql = "SELECT id,name FROM tblevent WHERE event_date < now()";

                                                    $r = mysqli_query($con, $sql);
                                                    while ($row = mysqli_fetch_assoc($r)) {
                                                        $sr = 1;
                                                        // Display each field of the records.
                                                        ?>
                                                        <tr>
                                                            <td><?php echo $sr; ?></td>
                                                            <td><?php echo $row["name"]; ?></td>
                                                            <td style="text-align: center;"><?php
                                                                echo "<a href='chairman_enter_score.php?id=" . $row['id'] . "&name=" . $row['name'] . "'>Select</a>&nbsp;&nbsp;&nbsp;";
                                                                //echo "<a href='admin_update_coChairman.php?id=" . $row['id'] . "&fname=" . $row['firstname'] . "&mname=" . $row['middlename'] . "&lname=" . $row['lastname'] . "&city=" . $row['city'] . "&dob=" . $row['dob'] . "&gender=" . $row['gender'] . "&contact=" . $row['contactno'] . "&email=" . $row['email'] . "&ins_id=" . $row['id'] . "&ins_name=" . $row['institutename'] . "'><i class='fa fa-edit' style='color: green; font-size: 18px;'></i></a>";
                                                                ?>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                        $sr++;
                                                    }
                                                    ?>


                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
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