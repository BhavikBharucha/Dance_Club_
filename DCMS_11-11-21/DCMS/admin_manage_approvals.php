<?php
ob_start();
session_start();
if($_SESSION['adminpages']!=1){
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
        <title>Manage Approval | Dance Club Management System</title>
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
                                            <strong class="card-title">Approvals</strong>
                                            <div style="float: right;">
                                                <!--<a href="admin_add_coChairman.php" class="btn btn-info"><i class="fa fa-plus"></i> Add</a>-->
                                                <a href="admin_dashboard.php" class="btn btn-success"><i class="fa fa-plus"></i> Back</a></div>
                                        </div>
                                        <div class="card-body">
                                            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th width="10%" class="th">Sr</th>
                                                        <th class="th">First Name</th>
                                                        <th class="th">Middle Name</th>
                                                        <th class="th">Last Name</th>
                                                        <th class="th">City</th>
                                                        <th class="th">Date of Birth</th>
                                                        <th class="th">Gender</th>
                                                        <th class="th">Contact</th>
                                                        <th class="th">E-mail</th>
                                                        <th class="th">Institute</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <?php
                                                    $sql = "SELECT  m.id,m.fname, m.mname, m.lname, m.city, m.dob, m.gender, m.contactno, m.email,m.password,i.institutename FROM tblapproval m INNER JOIN tblinstitute i ON m.instituteid=i.id";

                                                    $r = mysqli_query($con, $sql);
                                                    while ($row = mysqli_fetch_assoc($r)) {

                                                        // Display each field of the records.
                                                        ?>
                                                        <tr>
                                                            <td><?php echo $row['id']; ?></td>
                                                            <td><?php echo $row["fname"]; ?></td>
                                                            <td><?php echo $row["mname"]; ?></td>
                                                            <td><?php echo $row["lname"]; ?></td>
                                                            <td><?php echo $row["city"]; ?></td>
                                                            <td><?php echo $row['dob'] ?></td>
                                                            <td><?php
                                                                if ($row["gender"] == 'M') {
                                                                    echo 'Male';
                                                                } elseif ($row['gender'] == 'F') {
                                                                    echo 'Female';
                                                                } elseif ($row['gender'] == 'O') {
                                                                    echo 'Others';
                                                                }
                                                                ?></td>
                                                            }
                                                            <td><?php echo $row["contactno"]; ?></td>
                                                            <td><?php echo $row["email"]; ?></td>
                                                            <td><?php echo $row["institutename"]; ?></td>
                                                            <td style="text-align: center;"><?php
//                                                                echo "<a href='admin_manage_coChairman.php?did=" . $row['id'] . "'><i class='fa fa-trash' style='color: red; font-size: 18px;'></i></a>&nbsp;&nbsp;&nbsp;";
                                                                echo "<a href='admin_change_approval.php?id=" . $row['id'] . "&fname=" . $row['fname'] . "&mname=" . $row['mname'] . "&lname=" . $row['lname'] . "&city=" . $row['city'] . "&dob=" . $row['dob'] . "&gender=" . $row['gender'] . "&contact=" . $row['contactno'] . "&email=" . $row['email'] . "&password=".$row['password']."&ins_id=" . $row['id'] . "&ins_name=" . $row['institutename'] . "'><i class='fa fa-edit' style='color: green; font-size: 18px;'></i></a>";
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