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
                    <center>

                        <form action="" method="POST" style="border: 3px solid white ; box-shadow: 1px 1px 7px 7px;width: 480px; padding: 22px; border-radius: 7px; margin-right: 10px; margin-top: 50px;">
                            <h1 style="text-align: left;font-weight: bold; font-size: 32px;">Event Wise Report</h1>
                            <div style="border: 1px solid black;">

                            </div><br>
                            <div class="row">
                                <div class="col-md-12"> 
                                    <select name="eventname" style="height: 43px; width: 320px; text-align: center; color: gray; border: 1px solid lightgray; border-radius: 5px;">
                                        <option>-----Select Event Name----</option>
                                        <?php
                                            $sql = "select * from tblevent";
                                            $result = mysqli_query($con, $sql);
                                            foreach ($result as $event)
                                            {
                                                ?>
                                        <option value="<?php echo $event['id']; ?>"><?php echo $event['name']; ?></option>
                                                <?php
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            
                            <br><center><input type="submit" onclick="window.open('view_event_report.php','_blank')" id="btnregister" name="btnregister" value="Submit" class="btn btn-info" style="width: 151px;"></center><br>                                
                        </form>
                    </center>
                </section>
            </div>

            <?php
            if (isset($_POST['btnregister'])) {
                $eventid = $_POST['eventname'];
                
                if(!empty($eventid))
                {
                    $_SESSION['eventname'] = $eventid;
                    //header("Location: view_event_report.php");
                }else{
                    echo "Please select event";
                }
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