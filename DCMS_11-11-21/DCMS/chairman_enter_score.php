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
        <title>Enter Score | Dance Club Management System</title>
        <?php
        include './head.php';
        ?>
        <style>
            #city{
                width: 260px;
                height: 38px;
                border: 1px solid lightgray;
                height: 37px;
                border-radius: 5px;
                color: gray;
            }
            #criteria{
                width: 205px;
                height: 38px;
                /*border: 1px solid lightgray;*/
                height: 37px;
                border-radius: 5px;
                /*color: gray;*/
                -webkit-appearance: none;
                text-align: center;
                opacity: .8;
            }
            #judge{
                width: 162px;
                height: 38px;
                border: 1px solid lightgray;
                height: 37px;
                border-radius: 5px;
                color: gray;
                -webkit-appearance: none;
                text-align: center;
            }

            #txtlname{
                width: 206px;
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
                        <form  method="POST"   style="border: 3px solid white ; width: 1063px; box-shadow: 1px 1px 7px 7px;padding: 22px; border-radius: 7px; margin-top: 50px; margin-bottom: 50px;">
                            <h1>Enter Score</h1>
                            <div style="border: 1px solid black;">

                            </div><br>
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="text" name="txtevent" id="txtlname" value="<?php echo $_REQUEST['name']; ?>" readonly>
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col-md-12">
                                    <select name="team_code" id="city" >
                                        <option value="1">TEST</option>
                                        <?php
                                        $q = "SELECT p.teamid,t.teamcode FROM tbleventparticipants p INNER JOIN tblteam t ON p.teamid=t.id WHERE eventid='" . $_REQUEST['id'] . "' GROUP BY p.teamid ";
                                        $r = mysqli_query($con, $q);
                                        if ($r) {
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                echo "<option value=" . $row['teamid'] . ">" . $row['teamcode'] . "</option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col-md-12">

                                    <table>
                                        <thead>
                                        <th></th>

                                        <?php
                                        $q = "SELECT e.id,c.criteria,e.weightage FROM tbleventcriteria e INNER JOIN tblevaluationcriteria c ON e.evaluationcriteriaid=c.id WHERE e.eventid='" . $_REQUEST['id'] . "'";
                                        $r = mysqli_query($con, $q);
                                        $c_arr = array();
                                        $c_weightage=array();
                                        $i = 0;
                                        $c = 1;
                                        if ($r) {
                                            while ($row = mysqli_fetch_assoc($r)) {
                                                array_push($c_arr, $row['criteria']);
                                                array_push($c_weightage,$row['weightage']);
                                                ?>
                                                <th>
                                                    <select id="criteria" name="cid<?php echo $c; ?>" style=" border:0.2px solid #fff ; opacity: .4; color: black; font-weight: bolder" >
                                                        <?php
                                                        if ($row['criteria'] == $c_arr[$i]) {
                                                            echo "<option selected value=" . $row['id'] . " >" . $row['criteria'] . "</option>";
                                                        }
                                                        ?>
                                                    </select></th>
                                                <?php
                                                $c++;
                                                $i++;
                                            }
                                        }
                                        ?>

                                        </thead>
                                        <tbody>
                                            <?php
                                            $q = "SELECT e.id,j.firstname,j.lastname FROM tbleventjudge e INNER JOIN tbljudge j ON e.judgeid=j.id WHERE eventid= '" . $_REQUEST['id'] . "'";
                                            $r = mysqli_query($con, $q);
                                            $name = array();
                                            if ($r) {
                                                $c = 1;
                                                $i = 0;
                                                while ($row = mysqli_fetch_assoc($r)) {

                                                    $temp = $row['firstname'] . " " . $row['lastname'];

                                                    array_push($name, $row['firstname']);
                                                    ?>
                                                    <tr>
                                                        <td>
                                                            <select name="judge<?php echo $c; ?>" id="judge" style="border:0.2px solid #fff ; opacity: .4; color: black; font-weight: bold">
                                                                <?php
                                                                //echo $row['firstname'] ." -> " .$name[$i] ."<br>";
                                                                if ($row['firstname'] == $name[$i]) {
                                                                    echo "<option selected value=" . $row['id'] . " > $temp </option>";
                                                                }
                                                                ?>
                                                            </select>
                                                        </td>
                                                        <td><input type = "number" title="Marks out of <?php echo $c_weightage[0]; ?>" max="<?php echo $c_weightage[0]; ?>" min="0" name = "c1_<?php echo $c; ?>" id="txtlname" placeholder = "exp" required></td>
                                                        <td><input type = "number" title="Marks out of <?php echo $c_weightage[1]; ?>" max="<?php echo $c_weightage[1]; ?>" min="0" name = "c2_<?php echo $c; ?>" id="txtlname" placeholder = "syc" required></td>
                                                        <td><input type = "number" title="Marks out of <?php echo $c_weightage[2]; ?>" max="<?php echo $c_weightage[2]; ?>" min="0" name = "c3_<?php echo $c; ?>" id="txtlname" placeholder = "abc" required></td>
                                                        <td><input type = "number" title="Marks out of <?php echo $c_weightage[3]; ?>" max="<?php echo $c_weightage[3]; ?>" min="0" name = "c4_<?php echo $c; ?>" id="txtlname" placeholder = "xyz" required></td>
                                                    </tr>
                                                    <?php
                                                    $c++;
                                                    $i++;
                                                }
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <center><br>
                                <input type="submit" id="btnadd" name="btnadd" value="Add" class="btn btn-info" style="width: 151px;"><br><br>
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
    $sql_j1 = "INSERT INTO tbleventscore (eventJudgeid, teamid, eventCriteriaid, team_score) VALUES ('" . $_POST['judge1'] . "' , '" . $_POST['team_code'] . "' , '" . $_POST['cid1'] . "' , '" . $_POST['c1_1'] . "') , ('" . $_POST['judge1'] . "' , '" . $_POST['team_code'] . "' , '" . $_POST['cid2'] . "' , '" . $_POST['c2_1'] . "') , ('" . $_POST['judge1'] . "' , '" . $_POST['team_code'] . "' , '" . $_POST['cid3'] . "' , '" . $_POST['c3_1'] . "') , ('" . $_POST['judge1'] . "' , '" . $_POST['team_code'] . "' , '" . $_POST['cid4'] . "' , '" . $_POST['c4_1'] . "')";
    $sql_j2 = "INSERT INTO tbleventscore (eventJudgeid, teamid, eventCriteriaid, team_score) VALUES ('" . $_POST['judge2'] . "' , '" . $_POST['team_code'] . "' , '" . $_POST['cid1'] . "' , '" . $_POST['c1_2'] . "') , ('" . $_POST['judge2'] . "' , '" . $_POST['team_code'] . "' , '" . $_POST['cid2'] . "' , '" . $_POST['c2_2'] . "') , ('" . $_POST['judge2'] . "' , '" . $_POST['team_code'] . "' , '" . $_POST['cid3'] . "' , '" . $_POST['c3_2'] . "') , ('" . $_POST['judge2'] . "' , '" . $_POST['team_code'] . "' , '" . $_POST['cid4'] . "' , '" . $_POST['c4_2'] . "')";
    $sql_j3 = "INSERT INTO tbleventscore (eventJudgeid, teamid, eventCriteriaid, team_score) VALUES ('" . $_POST['judge3'] . "' , '" . $_POST['team_code'] . "' , '" . $_POST['cid1'] . "' , '" . $_POST['c1_3'] . "') , ('" . $_POST['judge3'] . "' , '" . $_POST['team_code'] . "' , '" . $_POST['cid2'] . "' , '" . $_POST['c2_3'] . "') , ('" . $_POST['judge3'] . "' , '" . $_POST['team_code'] . "' , '" . $_POST['cid3'] . "' , '" . $_POST['c3_3'] . "') , ('" . $_POST['judge3'] . "' , '" . $_POST['team_code'] . "' , '" . $_POST['cid4'] . "' , '" . $_POST['c4_3'] . "')";
    echo $sql_j1 . "<br>" . $sql_j2 . "<br>" . $sql_j3 . "<br>";
    $r_j1 = mysqli_query($con, $sql_j1);
    $r_j2 = mysqli_query($con, $sql_j2);
    $r_j3 = mysqli_query($con, $sql_j3);
    if ($r_j1 && $r_j2 && $r_j3) {
        echo "<script> alert('SUCCESSFULL Wooh !') </script>";
    }
//    echo $_POST['judge1'] ."<br>" .$_POST['judge2'] ."<br>" .$_POST['judge3'] ."<br>";
//    echo $_POST['cid1'] ."<br>" .$_POST['cid2'] ."<br>" .$_POST['cid3'] ."<br>" .$_POST['cid4'] ."<br>";
//    echo $_POST['c1_1'] ."<br>" .$_POST['c1_2'] ."<br>" .$_POST['c1_3'] ."<br> " ;
//    echo $_POST['c2_1'] ."<br>" .$_POST['c2_2'] ."<br>" .$_POST['c2_3'] ."<br>" ;
//    echo $_POST['c3_1'] ."<br>" .$_POST['c3_2'] ."<br>" .$_POST['c3_3'] ."<br>" ;
}   