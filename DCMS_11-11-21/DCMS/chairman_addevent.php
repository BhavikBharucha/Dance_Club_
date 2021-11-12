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
        <title>Add Event | Dance Club Management System</title>
        <?php
        include './head.php';
        ?>
        <style>
            #type,#venue{
                width: 260px;
                height: 38px;
                border: 1px solid lightgray;
                height: 37px;
                border-radius: 5px;
                color: gray;
            }

            #txtname{
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
                        <form action="" method="POST" enctype="multipart/form-data"  style="border: 3px solid white ; width: 886px; box-shadow: 1px 1px 7px 7px;padding: 22px; border-radius: 7px; margin-top: 50px; margin-bottom: 50px;">
                            <h1>Add Co-Chairman</h1>
                            <div style="border: 1px solid black;">
                            </div><br>
                            <div class="row">
                                <div class="col-md-6"> 
                                    <input type="text" id="txtname" name="txtname" placeholder="Event Name" required style=" padding: 5px; width: 260px;"><br>
                                </div>
                                <div class="col-md-6">
                                    <select name="e_type" id="type">
                                        <option>--Event Type--</option>
                                        <option value="Solo"> Solo</option>
                                        <option value="Duo">Duo</option>
                                        <option value="Gxroup">Group</option>
                                    </select>
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col-md-12">
                                    <select name="venue" id="venue" style="width: 451px; text-align: center;">
                                        <option>--Event Venue--</option>
                                        <option value="PT Hall"> PT Hall</option>
                                        <option value="JD Hall"> JD Hall</option>
                                        <option value="Rangmanch"> Rangmanch </option>
                                    </select><br>
                                </div>
                            </div><br>
                            <div class="row">

                                <div class="col-md-6">
                                    <label style="">Event Date: </label><input type="datetime-local" name="e_date" id="edate" style="margin-left: 10px;" required>
                                </div>
                                <div class="col-md-6"> 
                                    <label style="">Poster : </label><input type="file" name="poster" style="margin-left: 10px;">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-6"> 
                                    <label style="">Rules :</label><input type="file" name="rules" style="margin-left: 10px;">
                                </div>

                                <div class="col-md-6"> 
                                    <label style="">Agenda :</label><input type="file" name="agenda" style="margin-left: 10px;"><br>
                                </div>

                            </div>
                            <br>

                            <center><input type="submit" id="btnpost_if" name="btnpost" value="Post" class="btn btn-info" style="width: 151px;"></center>
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
if (isset($_POST['btnpost'])) {
    $e_name = $_POST['txtname'];
    $e_type = $_POST['e_type'];
    $e_date = $_POST['e_date'];
    $venue = $_POST['venue'];
    $poster_dest = "files/" . basename($_FILES['poster']['tmp_name']);
    $from_poster = $_FILES['poster']['tmp_name'];
    $rules_dest = "files/" . basename($_FILES['rules']['tmp_name']);
    $from_rules = $_FILES['rules']['tmp_name'];
    $agenda_dest = "files/" . basename($_FILES['agenda']['tmp_name']);
    $from_agenda = $_FILES['agenda']['tmp_name'];

    $p = $_FILES["poster"]["name"];
    $r = $_FILES["rules"]["name"];
    $a = $_FILES["agenda"]["name"];
    $temp_post = explode(".", $p);
    $extension_poster = end($temp_post);
    $temp_rules = explode(".", $r);
    $extension_rules = end($temp_rules);
    $temp_agenda = explode(".", $a);
    $extension_agenda = end($temp_agenda);

    $ext = array("jpg", "jpeg", "png", "gif", "pdf");
    if (in_array($extension_poster, $ext)) {
        $checked = 1;
    } else {
        $checked = 0;
    }
    $q = "INSERT INTO tblevent(name, eventtype, event_date, venue, poster, rules, agenda) VALUES ('$e_name','$e_type','$e_date','$venue','$poster_dest','$rules_dest','$agenda_dest')";
    if ($checked == 0 || $extension_rules != "pdf" || $extension_agenda != "pdf") {
        echo "<script> alert('Please Upload PDF !') </script>";
    } else if (move_uploaded_file($from_poster, $poster_dest) && move_uploaded_file($from_rules, $rules_dest) && move_uploaded_file($from_agenda, $agenda_dest)) {
        $result_event = mysqli_query($con, $q);
        if ($result_event) {
            header("Location: chairman_manage_events.php");
        }
    }
}
ob_flush();
