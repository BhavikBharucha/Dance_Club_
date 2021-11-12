<?php
    $name=$_SESSION['name'];
?>
<aside id="left-panel" class="left-panel" >
    <nav class="navbar navbar-expand-sm navbar-default">
        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="admin_profile.php" style="text-decoration: none;"><?php echo $name; ?></a>
                </li>
                <li><a href="admin_dashboard.php">Dashboard</a></li>
                <li><a href="admin_manage_chairman.php">Manage Chairman</a></li>
                <li><a href="admin_manage_coChairman.php">Manage Co-chairman</a></li>
                <li><a href="admin_manage_institute.php">Manage Institute</a></li>
                <li><a href="admin_manage_faculty.php">Manage Faculty Member</a></li>
                <li><a href="admin_manage_approvals.php">Manage Approval</a></li>
                <li><a href="signout.php">Signout</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside>