<?php
session_start();
ob_start();
if($_SESSION['chairmanpages']!=1 && $_SESSION['coChairmanpages']!=1){
    header("Location:index.php");
}
try {
    include './connection.php';
} catch (Exception $ex) {
    header("Location: error.php");
}
?>
<html>
    <head>
        <title>Assign Criteria | Dance Club Management System</title>
        <?php
        include './head.php';
        ?>
        <style>
            #event,#criteria{
                width: 260px;
                height: 38px;
                border: 1px solid lightgray;
                height: 37px;
                border-radius: 5px;
                color: gray;
            }
            #weightage{
                width: 260px;
                height: 38px;
                border: 1px solid lightgray;
                height: 37px;
                border-radius: 5px;
                border-radius: 5px;
            }
            h1{
                font-weight: bold;
                font-size: 29px;
                text-align: left;
            }
        </style>
    </head>
    <body>
        <?php
        include './sidebar.php';
        ?>

        <div id="right-panel" class="right-panel">
            <?php
            include './header.php';
            ?>

            <div class="content" >
                <section>
                    <center>
                        <form action="" method="POST"   style="border: 3px solid white ; width: 886px; box-shadow: 1px 1px 7px 7px;padding: 22px; border-radius: 7px; margin-top: 50px; margin-bottom: 50px;">
                            <h1>Assign Criteria</h1>
                            <div style="border: 1px solid black;">

                            </div><br>
                            <div class="row">
                                <div class="col-md-12">
                                    <select name="event" id="event">
                                        <?php
                                        $q = "SELECT id,name FROM tblevent";
                                        $r = mysqli_query($con, $q);
                                        if ($r) {
                                            while ($row = mysqli_fetch_assoc($r)) {
                                                echo "<option value=" . $row['id'] . ">" . $row['name'] . "</option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col-md-12">
                                    <select name="criteria" id="criteria">
                                        <?php
                                        $q = "SELECT id,criteria FROM tblevaluationcriteria";
                                        $r = mysqli_query($con, $q);
                                        if ($r) {
                                            while ($row = mysqli_fetch_assoc($r)) {
                                                echo "<option value=" . $row['id'] . ">" . $row['criteria'] . "</option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="number" name="weightage" id="weightage" title="Enter Weightage of Criteria" placeholder="Weightage" required>
                                </div>
                            </div>
                            <center><br>
                                <input type="submit" id="btnadd" name="btnadd" value="Assign" class="btn btn-info" style="width: 151px;"><br><br>
                            </center>
                        </form>
                    </center>
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
        ?>
    </body>
</html>
<?php
if (isset($_POST['btnadd'])) {
    $q_check = "SELECT COUNT(*) as total FROM tbleventcriteria WHERE eventid='" . $_POST['event'] . "' evaluationCriteriaId='" . $_POST['criteria'] . "'";
    $r_check = mysqli_query($con, $q_check);
    $row_check = mysqli_fetch_assoc($r_check);
    if ($row_check['total'] >= 1) {
        echo "<script LANGUAGE='JavaScript'>
    window.alert('This Criteria Has Already Been Assigned !');
    window.location.href='chairman_manage_criteria.php';
    </script>";
        //header("Location:admin_manage_chairman.php");
    } else {
        $q = "INSERT INTO tbleventcriteria (eventid,evaluationCriteriaId,weightage) VALUES ('" . $_POST['event'] . "' , '" . $_POST['criteria'] . "' , '" . $_POST['weightage'] . "')";
        $r = mysqli_query($con, $q);
        if ($r) {
            echo "<script LANGUAGE='JavaScript'>
    window.alert('Criteria Assigned !');
    window.location.href='chairman_manage_criteria.php';
    </script>";
        } else {
            echo "<script> alert('Something Went Wrong ! Try Again ') </script>";
        }
    }
}