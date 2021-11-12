<?php
ob_start();
session_start();
if($_SESSION['flag']!=1){
    header("Location:index.php");
}
$_SESSION['adminpages']=1;
try {
    include './connection.php';
} catch (Exception $ex) {
    header("Location:error.php");
}
?>
<html>
    <head>
        <title>Admin Dashboard | Dance Club Management System</title>
        <?php
        include './head.php';
        ?>
        <style>
            .heading {
                font-size: 19px;
                font-weight: bold;
            }

            .divdesign {
                padding: 10px;

                color: black;
                height: 126px;
                width: 300px;
                border: 0px solid blue;
                border-radius: 5px;
            }
        </style>
    </head>
    <?php
//For Institute
    $inst = "select count(*) as total from tblinstitute";
    $resultinst = mysqli_query($con, $inst);
    $rowinst = mysqli_fetch_assoc($resultinst);

//For chairman
    $chairman = "select count(*) as total from tblmember where role='Chairman'";
    $resultchairman = mysqli_query($con, $chairman);
    $rowchairman = mysqli_fetch_assoc($resultchairman);

//For co-chairman
    $cochairman = "select count(*) as total from tblmember where role='Co-Chairma'";
    $resultcochairman = mysqli_query($con, $cochairman);
    $rowcochairman = mysqli_fetch_assoc($resultcochairman);

//For faculty member
    $faculty = "select count(*) as total from tblmember where role='Faculty'";
    $resultfaculty = mysqli_query($con, $faculty);
    $rowfaculty = mysqli_fetch_assoc($resultfaculty);

//For Approval
    $approval = "SELECT COUNT(*) AS total FROM tblapproval";
    $resultapproval = mysqli_query($con, $approval);
    $rowapproval = mysqli_fetch_assoc($resultapproval);

    $mail_send = $_SESSION['email'];
    $_SESSION['mail_profile'] = $mail_send;
    ?>
    ?>
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

                    <div class="row">

                        <div class="col-md-4">

                            <a href="admin_manage_chairman.php" style="text-decoration: none;">
                                <div class="divdesign"style="background-color: blue;">
                                    <span class="heading">Manage Chairman
                                        <br>
                                        <?php //echo $rowchairman['total'];  ?>
                                    </span>
                                </div>
                            </a>

                        </div>


                        <div class="col-md-4">
                            <a href="admin_manage_coChairman.php" style="text-decoration: none; ">
                                <div class="divdesign" style="background-color: gold;">
                                    <span class="heading">Manage Co-Chairman
                                        <br>
                                        <?php // echo $rowcochairman['total'];  ?>
                                    </span>
                                </div>
                            </a>
                        </div>


                        <div class="col-md-4">
                            <a href="admin_manage_institute.php" style="text-decoration: none;">
                                <div class="divdesign" style="background-color: red;">
                                    <span class="heading">Manage Institute
                                        <br>
                                        <?php //echo $rowinst['total'];  ?>
                                    </span>
                                </div>
                            </a>

                        </div>
                    </div><br><br><br>

                    <div class="row">
                        <div class="col-md-4">
                            <a href="admin_manage_faculty.php" style="text-decoration: none;ch">
                                <div class="divdesign" style="background-color: lightgreen;">
                                    <span class="heading">Manage Faculty member
                                        <br>
                                        <?php //echo $rowfaculty['total'];  ?>
                                    </span>
                                </div>
                            </a>
                        </div>

                        <div class="col-md-4">
                            <a href="admin_manage_approvals.php" style="text-decoration: none;ch">
                                <div class="divdesign"style="background-color: brown;">
                                    <span class="heading">Manage Approval<br>
                                        <?php // echo $rowapproval['total'];  ?>
                                    </span>
                                </div>
                            </a>
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
        include './script.php';
        ob_flush();
        ?>
    </body>
</html>