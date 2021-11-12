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
        <title>Manage Faculty Coordinator | Dance Club Management System</title>
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
                                            <strong class="card-title">Member Coordinator Details</strong>
                                            <div style="float: right;">
                                                <a href="chairman_assign_member.php" class="btn btn-info"><i class="fa fa-plus"></i> Assign</a>
                                                <a href="chairman_dashboard.php" class="btn btn-success"><i class="fa fa-plus"></i> Back</a></div>
                                        </div>
                                        <div class="card-body">
                                            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th width="10%" class="th">ID</th>
                                                        <th class="th">Event Name</th>
                                                        <th class="th">Member</th>

                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <?php
                                                    $sql = "SELECT ec.id ,e.name,m.firstname,m.lastname FROM (( tbleventcoordinator ec INNER JOIN tblmember m ON ec.memberid = m.id) INNER JOIN tblevent e ON ec.eventid = e.id)";

                                                    $r = mysqli_query($con, $sql);
                                                    while ($row = mysqli_fetch_assoc($r)) {
                                                        $m_name = $row["firstname"] . " " . $row["lastname"];
                                                        // Display each field of the records.
                                                        ?>
                                                        <tr>
                                                            <td><?php echo $row['id']; ?></td>
                                                            <td><?php echo $row["name"]; ?></td>
                                                            <td><?php echo $m_name; ?></td>
                                                            <td><?php
                                                                echo "<a href='chairman_manage_member_coordinator.php?did=" . $row['id'] . "'>Delete</a>&nbsp;";
                                                                //echo "<a href='update_m_coordinator.php?uid=" . $row['id'] . "'&ename=".$row['name']."&name='$m_name''>Update</a>";
//                                                                echo "<a href='chairman_update_member_coordinator.php?id=" . $row['id'] . "&ename=" . $row['name'] . "&mname=$m_name'>Update</a>";
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