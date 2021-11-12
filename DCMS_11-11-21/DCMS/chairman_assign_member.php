<?php
session_start();
ob_start();
if($_SESSION['chairmanpages']!=1&& $_SESSION['coChairmanpages']!=1){
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
        <title>Assign Faculty Coordinator | Dance Club Management System</title>
        <?php
        include './head.php';
        ?>
        <style>
            #event,#member{
                width: 260px;
                height: 38px;
                border: 1px solid lightgray;
                height: 37px;
                border-radius: 5px;
                color: gray;
            }

            #txtlname{
                width: 260px;
                height: 38px;
                border: 1px solid lightgray;
                height: 37px;
                border-radius: 5px;
                border-radius: 5px;
            }

            #gender{
                height: 37px;
                width: 250px;
                border: 1px solid lightgray;height: 37px;
                border-radius: 5px;
                color: gray;
            }

            #email{
                width: 420px;
                height: 37px;
                border: 1px solid lightgray;
                border-radius: 5px;
            }

            #password{
                width: 395px;
                height: 37px;
                border: 1px solid lightgray;
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
                            <h1>Assign Coordinator</h1>
                            <div style="border: 1px solid black;">

                            </div><br>
                            <div class="row">
                                <div class="col-md-12"> 
                                    <select name="select_event" id="event">
                                        <?php
                                        $q = "SELECT id,name FROM tblevent";
                                        $result = mysqli_query($con, $q);
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo "<option value='" . $row["id"] . "'>" . $row["name"] . "</option><br>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col-md-12"> 
                                    <select name="select_member"id="member">
                                        <?php
                                        $q = "SELECT id,firstname,lastname FROM tblmember WHERE role='Faculty' and status='A'";
                                        $result = mysqli_query($con, $q);
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $f_name = $row["firstname"] . " " . $row["lastname"];
                                            echo "<option value='" . $row["id"] . "'>" . $f_name . "</option><br>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div><br>
                            <center>
                                <input type="submit" id="btnadd" name="btnassign" value="Assign" class="btn btn-info" style="width: 151px;"><br><br>
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
if (isset($_POST['btnassign'])) {
    $eid = $_POST['select_event'];
    $mid = $_POST['select_member'];
    $q = "INSERT INTO tbleventcoordinator (eventid,memberid) values ('$eid','$mid')";
    $r = mysqli_query($con, $q);
    if ($r) {
        header("Location:chairman_manage_member_coordinator.php");
    }
}