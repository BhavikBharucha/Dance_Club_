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
        <title>Assign Judge | Dance Club Management System</title>
        <?php
        include './head.php';
        ?>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.7.5/css/bootstrap-select.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.7.5/js/bootstrap-select.min.js"></script>
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
                            <h1>Assign Judge</h1>
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
                                    <select name="judge[]" id="judge" class="selectpicker" data-style="btn-primary" multiple data-max-options="3" data-min-option="3">
                                        <?php
                                        $q = "SELECT * FROM tbljudge";
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
                                <input type="submit" id="btnassign" name="btnassign" value="Assign" class="btn btn-info" style="width: 151px;"><br><br>
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
        <script>
            $(document).ready(function () {
                $("#btnassign").click(function () {
                    alert("Clicked !");
                    if ($("#judge option:selected").length > 3) {
                        alert("Select Atmost 3 Judge");
                    } else if ($("#judge option:selected").length < 3) {
                        alert("Select Atleast 3 Judge");
                    }
                });
            });
        </script>
    </body>
</html>
<?php
if (isset($_POST['btnassign'])) {
    $temp_arr = $_POST['judge'];
    $count_judge = count($_POST['judge']);
    switch ($count_judge) {
        case 1:
            $q = "INSERT INTO tbleventjudge (eventid, judgeid) VALUES ('" . $_POST['select_event'] . "' , '$temp_arr[0]')";
            break;
        case 2:
            $q = "INSERT INTO tbleventjudge (eventid, judgeid) VALUES ('" . $_POST['select_event'] . "' , '$temp_arr[0]'),('" . $_POST['select_event'] . "' , '$temp_arr[1]')";
            break;
        case 3:
            $q = "INSERT INTO tbleventjudge (eventid, judgeid) VALUES ('" . $_POST['select_event'] . "' , '$temp_arr[0]'),('" . $_POST['select_event'] . "' , '$temp_arr[1]') , ('" . $_POST['select_event'] . "' , '$temp_arr[2]')";
            break;
    }
    echo $q;
    // echo "<script> alert('okay....!'); </script>";

    $r = mysqli_query($con, $q);

    if ($r) {
        echo "<script LANGUAGE='JavaScript'>
    window.alert('Assigned Successfully !');
    window.location.href='chairman_manage_judges.php';
    </script>";
    }
}