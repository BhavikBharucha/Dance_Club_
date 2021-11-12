<?php
ob_start();
session_start();
if ($_SESSION['facultypages'] != 1) {
    header("Location: index.php");
}
try{
include './connection.php';
} catch (Exception $e){
    header("Location: error.php");
}
?>
<html>
    <head>

        <?php
        include './head.php';
        ?>
        <title>Assign Student Coordinator | Dance Club Management System</title>
        <style>
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

            <div class="content">
                <section>
                    <center>
                        <form action="" method="POST" style="border: 3px solid white ; box-shadow: 1px 1px 7px 7px; width: 550px; padding: 22px; border-radius: 7px; margin-right: 10px;">
                            <h1>Assign Student Coordinator</h1>
                            <div style="border: 1px solid black;">

                            </div><br>
                            <div class="row">
                                <div class="col-md-4">
                                    <span style="font-family: inherit; font-size: 14px; font-weight: bold;color: grey;">Select Event:</span>
                                </div>
                                <div class="col-md-4"> 
                                    <select name="event" style="padding: 7px; width: 250px; color: gray; border: 1px solid lightgray; border-radius: 5px;">
                                        <option>----Select Event----</option>
                                        <?php
                                        $query = "SELECT id,name from tblevent";
                                        $result = mysqli_query($con, $query);

                                        foreach ($result as $event) {
                                            ?>
                                            <option value="<?php echo $event['id']; ?>"><?php echo $event['name'] ?></option>
                                            <?php
                                        }
                                        ?>

                                    </select>
                                </div>
                            </div><br>

                            <div class="row">
                                <div class="col-md-4">
                                    <span style="font-family: inherit; font-size: 14px; font-weight: bold;color: gray;">Select student:</span>
                                </div>
                                <div class="col-md-4"> 
                                    <select name="enro" style="padding: 7px; width: 250px; color: gray; border: 1px solid lightgray; border-radius: 5px;">
                                        <option>----Select student----</option>
                                        <?php
                                        $query = "select enro,firstname from tblstudent";
                                        $result = mysqli_query($con, $query);

                                        foreach ($result as $event) {
                                            ?>
                                            <option value="<?php echo $event['enro']; ?>"><?php echo $event['firstname'] ?></option>
                                            <?php
                                        }
                                        ?>

                                    </select>
                                </div>
                            </div><br>

                            <center><input type="submit" id="btnregister" name="btnassign" value="Assign" class="btn btn-info" style="width: 151px;color: black; font-weight: bold;"></center><br>
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
        include './script.php'
        ?>
    </body>
</html>