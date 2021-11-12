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
        <title>Manage Student Coordinator | Dance Club Management System</title>
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
                                            <strong class="card-title">Manage Student Coordinator</strong>
                                            <div style="float: right;">
                                                <a href="faculty_assign_student_coordinator.php" class="btn btn-info"><i class="fa fa-plus"></i> Assign</a>
                                                <a href="faculty_dashboard.php" class="btn btn-success"><i class="fa fa-plus"></i> Back</a></div>
                                        </div>
                                        <div class="card-body">
                                            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th class="th">Event Name</th>
                                                        <th class="th">Student First Name</th>
                                                        <th class="th">Student Last Name</th>
                                                        <th class="th">Status</th>
                                                        <th class="th">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $sql = "SELECT sc.id,s.enro,e.name,s.firstname,s.lastname,s.status FROM (((tblstudent_coordinator sc INNER JOIN tbleventcoordinator tec ON sc.tec_id = tec.id) INNER JOIN tblstudent s ON sc.enro = s.enro) INNER JOIN tblevent e ON tec.eventid=e.id)";

                                                    $rs_result = mysqli_query($con, $sql);
                                                    while ($row = mysqli_fetch_assoc($rs_result)) {
                                                        // Display each field of the records.
                                                        ?>
                                                        <tr>
                                                            <td><?php echo $row["name"]; ?></td>
                                                            <td><?php echo $row["firstname"]; ?></td>
                                                            <td><?php echo $row["lastname"]; ?></td>
                                                            <td><?php
                                                                if ($row['status'] == 'A') {
                                                                    echo "Active";
                                                                } else {
                                                                    echo "Dactive";
                                                                }
                                                                ?></td>
                                                            <td><?php
                                                            echo "<a href='manage_student_coordinator.php?did=" . $row['enro'] . "'><i class='fa fa-trash' style='color: red; font-size: 18px;'></i></a>&nbsp;";
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

            <?php
            if (isset($_GET['did'])) {
                $sql = "delete from tblmember where id='" . $_GET['did'] . "'";
                $sql = "UPDATE tblmember SET status='D' WHERE id='" . $_GET['did'] . "'";
                $result = mysqli_query($con, $sql);

                header("Location: manage_student_coordinator.php");
            }
            ?>

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