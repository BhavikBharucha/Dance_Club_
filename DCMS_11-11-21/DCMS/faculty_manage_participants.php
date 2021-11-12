<?php
ob_start();
session_start();
if ($_SESSION['facultypages'] != 1) {
    header("Location: index.php");
}
try {
    include './connection.php';
} catch (Exception $e) {
    header("Location:error.php");
}
?>
<html>
    <head>

        <?php
        include './head.php';
        ?>
        <title>Manage Participants | Dance Club Management System</title>
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
                                            <strong class="card-title">Manage Participants</strong>
                                            <div style="float: right;">
<!--                                                <a href="add_participants.php" class="btn btn-info"><i class="fa fa-plus"></i> Add</a>-->
                                                <a href="faculty_dashboard.php" class="btn btn-success"><i class="fa fa-plus"></i> Back</a></div>
                                        </div>
                                        <div class="card-body">
                                            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th width="10%" class="th">ID</th>
                                                        <th class="th">Event Name</th>
                                                        <th class="th">Type</th>
                                                        <th class="th">Date</th>
                                                        <th class="th" width="10%">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $sr = 0;
                                                    $sql = "select * from tblevent";
                                                    $rs_result = mysqli_query($con, $sql);
                                                    while ($row = mysqli_fetch_assoc($rs_result)) {
                                                        $sr = 1;
                                                        // Display each field of the records.
                                                        ?>
                                                        <tr>
                                                            <td><?php echo $sr; ?></td>
                                                            <td><?php echo $row["name"]; ?></td>
                                                            <td><?php echo $row["eventtype"]; ?></td>
                                                            <td><?php echo $row["event_date"]; ?></td>

                                                            <td style="text-align: center;">
                                                                <?php
                                                                echo "<a href='faculty_add_participants.php?eid=" . $row['id'] . "&type=" . $row['eventtype'] . "' class='btn btn-info'><i class='fa fa-plus'></i> Add</a>&nbsp;";
                                                                //echo "<a href='update_chairman.php?uid=".$row['id']."&fname=".$row['firstname']."&mname=".$row['middlename']."&lname=".$row['lastname']."&city=".$row['city']."&gender=".$row['gender']."&contact=".$row['contactno']."&dob=".$row['dob']."&email=".$row['email']."&fname=".$row['firstname']."&ins_id=".$row['instituteid']."&ins_name=".$row['institutename']."'>Update</a>";
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