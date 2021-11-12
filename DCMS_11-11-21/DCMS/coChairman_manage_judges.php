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
        <title>Manage Judges | Dance Club Management System</title>
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
                                            <strong class="card-title">Manage Judge</strong>
                                            <div style="float: right;">
                                                <a href="chairman_add_judge.php" class="btn btn-info"><i class="fa fa-plus"></i> Add</a>
                                                <a href="chairman_assign_judge.php" class="btn btn-info" >Assign</a>
                                                <a href="coChairman_dashboard.php" class="btn btn-success"><i class="fa fa-plus"></i> Back</a></div>
                                        </div>
                                        <div class="card-body">
                                            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th width="10%" class="th">Sr</th>
                                                        <th class="th">First Name</th>
                                                        <th class="th">Middle Name</th>
                                                        <th class="th">Last Name</th>
                                                        <th class="th">Address</th>
                                                        <th class="th">City</th>
                                                        <th class="th">Gender</th>
                                                        <th class="th">Contact Number</th>
                                                        <th class="th">Email</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <?php
                                                    $sql = "SELECT * FROM tbljudge";

                                                    $r = mysqli_query($con, $sql);
                                                    while ($row = mysqli_fetch_assoc($r)) {

                                                        // Display each field of the records.
                                                        ?>
                                                        <tr>
                                                            <td><?php echo $row['id']; ?></td>
                                                            <td><?php echo $row["firstname"]; ?></td>
                                                            <td><?php echo $row["middlename"]; ?></td>
                                                            <td><?php echo $row["lastname"]; ?></td>}
                                                            <td><?php echo $row["address"]; ?></td>}
                                                            <td><?php echo $row["city"]; ?></td>
                                                            <td>
                                                                <?php
                                                                if ($row['gender'] == 'M') {
                                                                    echo "Male";
                                                                } else {
                                                                    echo "Female";
                                                                }
                                                                ?>
                                                            </td>
                                                            <td><?php echo $row["contactno"]; ?></td>
                                                            <td><?php echo $row["email"]; ?></td>
                                                            <td><?php
//                                                                echo "<a href='chairman_manage_judges.php?did=" . $row['id'] . "'>Delete</a>&nbsp;";
                                                                echo "<a href='chairman_update_judge.php?id=" . $row['id'] . "&fname=" . $row['firstname'] . "&mname=" . $row['middlename'] . "&lname=" . $row['lastname'] . "&address=" . $row['address'] . "&city=" . $row['city'] . "&gender=" . $row['gender'] . "&contact=" . $row['contactno'] . "&email=" . $row['email'] . "'>Update</a>";
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