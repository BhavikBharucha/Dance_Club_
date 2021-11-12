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
        <title>Manage Events | Dance Club Management System</title>
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
                                            <strong class="card-title">Event Details</strong>
                                            <div style="float: right;">
                                                <a href="chairman_addevent.php" class="btn btn-info"><i class="fa fa-plus"></i> Add</a>
                                                <a href="coChairman_dashboard.php" class="btn btn-success"><i class="fa fa-plus"></i> Back</a></div>
                                        </div>
                                        <div class="card-body">
                                            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th width="10%" class="th">ID</th>
                                                        <th class="th">Event Name</th>
                                                        <th class="th">Type</th>
                                                        <th class="th">Date</th>
                                                        <th class="th">Venue</th>
                                                        <th class="th">Poster</th>
                                                        <th class="th">Rules</th>
                                                        <th class="th">Agenda</th>

                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <?php
                                                    $sql = "SELECT * FROM tblevent";

                                                    $r = mysqli_query($con, $sql);
                                                    while ($row = mysqli_fetch_assoc($r)) {

                                                        // Display each field of the records.
                                                        ?>
                                                        <tr>
                                                            <td><?php echo $row["name"]; ?></td>
                                                            <td><?php echo $row["eventtype"]; ?></td>
                                                            <td><?php echo $row["event_date"]; ?></td>
                                                            <td><?php echo $row["venue"]; ?></td>
                                                            <td><?php echo $row["poster"]; ?></td>
                                                            <td><?php echo $row["rules"]; ?></td>
                                                            <td><?php echo $row["agenda"]; ?></td>
                                                            <td><?php
//                                                                echo "<a href='manage_chairman.php?did=" . $row['id'] . "'>Delete</a>&nbsp;";
                                                                //echo "<a href='update_chairman.php?uid=".$row['id']."&fname=".$row['firstname']."&mname=".$row['middlename']."&lname=".$row['lastname']."&city=".$row['city']."&gender=".$row['gender']."&contact=".$row['contactno']."&dob=".$row['dob']."&email=".$row['email']."&fname=".$row['firstname']."&ins_id=".$row['instituteid']."&ins_name=".$row['institutename']."'>Update</a>";
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