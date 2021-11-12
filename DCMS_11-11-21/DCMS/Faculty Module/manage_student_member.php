<?php
ob_start();
session_start();
if (isset($_SESSION['flag']) != 1) {
    header("Location: ./login.php");
}
include './connection.php';
?>
<html>
    <head>

        <?php
        include './head.php';
        ?>
        <title>Manage Student Member | Faculty Dashboard</title>
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
                                            <strong class="card-title">Manage Student Member</strong>
                                            <div style="float: right;"><a href="add_student_member.php" class="btn btn-info"><i class="fa fa-plus"></i> Add</a>
                                                <a href="faculty_dashboard.php" class="btn btn-success"><i class="fa fa-plus"></i> Back</a></div>
                                        </div>
                                        <div class="card-body">
                                            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th width="10%" class="th">Enrollment Number</th>
                                                        <th class="th">First Name</th>
                                                        <th class="th">Middle Name</th>
                                                        <th class="th">Last Name</th>
                                                        <th class="th">City</th>
                                                        <th class="th">Gender</th>
                                                        <th class="th">Contact</th>
                                                        <th class="th">E-mail</th>
                                                        <th class="th">Institute</th>
                                                        <th class="th">Status</th>
                                                        <th class="th">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <?php
                                                    $sql = "select s.enro,s.firstname,s.middlename,s.lastname,s.city,s.gender,s.contactno,s.email,s.status,i.institutename,i.id from tblstudent s inner join tblinstitute i on s.instituteid = i.id";

                                                    $rs_result = mysqli_query($con, $sql);

                                                    while ($row = mysqli_fetch_assoc($rs_result)) {
                                                        // Display each field of the records.
                                                        ?>
                                                        <tr>
                                                            <td><?php echo $row["enro"]; ?></td>
                                                            <td><?php echo $row["firstname"]; ?></td>
                                                            <td><?php echo $row["middlename"]; ?></td>
                                                            <td><?php echo $row["lastname"]; ?></td>
                                                            <td><?php echo $row["city"]; ?></td>
                                                            <td><?php echo $row["gender"]; ?></td>
                                                            <td><?php echo $row["contactno"]; ?></td>
                                                            <td><?php echo $row["email"]; ?></td>
                                                            <td><?php echo $row["institutename"]; ?></td>
                                                            <td>
                                                                <?php
                                                                if ($row['status'] == 'A') {
                                                                    echo "Active";
                                                                } else {
                                                                    echo "Dactive";
                                                                }
                                                                ?>
                                                            </td>
                                                            <td style="text-align: center;"><?php
                                                                echo "<a href='manage_student_member.php?did=" . $row['enro'] . "'><i class='fa fa-trash' style='color: red; font-size: 18px;'></i></a>&nbsp;&nbsp;&nbsp;";
                                                                echo "<a href='update_student_member.php?enro=" . $row['enro'] . "&fname=" . $row['firstname'] . "&mname=" . $row['middlename'] . "&lname=" . $row['lastname'] . "&city=" . $row['city'] . "&gender=" . $row['gender'] . "&contact=" . $row['contactno'] . "&email=" . $row['email'] . "&ins_id=" . $row['id'] . "&ins_name=" . $row['institutename'] . "'><i class='fa fa-edit' style='color: green; font-size: 18px;'></i></a>";
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
                $sql = "update tblstudent set status='D' where enro='" . $_GET['did'] . "'";
                $result = mysqli_query($con, $sql);
                header("Location: manage_student_member.php");
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