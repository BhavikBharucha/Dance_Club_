<?php
ob_start();
session_start();
if($_SESSION['chairmanpages']!=1){
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
        <title>Manage Notification | Dance Club Management System</title>
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
                                            <strong class="card-title">Notification</strong>
                                            <div style="float: right;"><a href="chairman_new_notification.php" class="btn btn-info"><i class="fa fa-plus"></i> New</a>
                                                <a href="chairman_dashboard.php" class="btn btn-success"><i class="fa fa-plus"></i> Back</a></div>
                                        </div>
                                        <div class="card-body">
                                            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th width="10%" class="th">Sr</th>
                                                        <th class="th">Subject</th>
                                                        <th class="th">Description</th>
                                                        <th class="th">Date</th>
                                                        <th class="th">Venue</th>
                                                        <th class="th">Attachment</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <?php
                                                    $sql = "SELECT * FROM tblnotification";

                                                    $r = mysqli_query($con, $sql);
                                                    while ($row = mysqli_fetch_assoc($r)) {

                                                        // Display each field of the records.
                                                        ?>
                                                        <tr>
                                                            <td><?php echo $row['id']; ?></td>
                                                            <td><?php echo $row["subject"]; ?></td>
                                                            <td><?php echo $row["description"]; ?></td>
                                                            <td><?php echo $row["datetime"]; ?></td>
                                                            <td><?php echo $row["venue"]; ?></td>
                                                            <td><?php echo $row['attachments'] ?></td>
                                                            <td style="text-align: center;"><?php
//                                                                echo "<a href='admin_manage_coChairman.php?did=" . $row['id'] . "'><i class='fa fa-trash' style='color: red; font-size: 18px;'></i></a>&nbsp;&nbsp;&nbsp;";
                                                                //echo "<a href='admin_update_coChairman.php?id=" . $row['id'] . "&fname=" . $row['firstname'] . "&mname=" . $row['middlename'] . "&lname=" . $row['lastname'] . "&city=" . $row['city'] . "&dob=" . $row['dob'] . "&gender=" . $row['gender'] . "&contact=" . $row['contactno'] . "&email=" . $row['email'] . "&ins_id=" . $row['id'] . "&ins_name=" . $row['institutename'] . "'><i class='fa fa-edit' style='color: green; font-size: 18px;'></i></a>";
                                                                ?>
                                                            </td>
                                                        </tr>
                                                        <?php
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