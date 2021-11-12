
<aside id="left-panel" class="left-panel" style="width: 305px;">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">


                <?php
                if ($_SESSION['sessionrole'] == 'Faculty') {
                    ?>
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="images/admin.jpg" alt="User Avatar">
                            <?php
                            if (isset($_SESSION['flag']) == 1) {
                                echo "<span style='font-size: 13px;'>" . $_SESSION['name'] . "</span>";
                            }
                            ?>
                        </a>

                        <div class="user-menu dropdown-menu">
                            <?php
                            echo "<a href='profile.php?mail='" . $_SESSION['email'] . "'' class='nav-link'><i class='fa fa- user'></i>My Profile</a>";
                            ?>

                            <a class="nav-link" href="./signout.php"><i class="fa fa-power -off"></i>Logout</a>
                        </div>
                    </div>

                    <li class="active">
                        <a href="faculty_dashboard.php"><i class="menu-icon ti ti-home"></i>Dashboard </a>
                    </li>
                    <li>
                        <a href="faculty_manage_student_member.php"><i class="menu-icon ti ti-user"></i>Manage Student Member</a>
                    </li>
                    <li>
                        <a href="faculty_manage_student_coordinator.php"><i class="menu-icon fa fa-picture-o"></i>Manage Student Coordinator</a>
                    </li>
                    <li>
                        <a href="faculty_manage_participants.php"><i class="menu-icon fa fa-picture-o"></i>Manage Participants</a>
                    </li>
                    <li>
                        <a href="#"><i class="menu-icon fa fa-bell"></i>Notifications</a>
                    </li>
                    <?php
                } elseif ($_SESSION['sessionrole'] == 'Admin') {
                    ?>
                    <div class="user-area dropdown float-right">


                        <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="images/admin.jpg" alt="User Avatar">
                            <?php
                            if (isset($_SESSION['flag']) == 1) {
                                echo $_SESSION['name'];
                                ?>

                                <?php
                            }
                            ?>
                        </a>

                        <div class="user-menu dropdown-menu">
                            <?php
                            echo "<a href='profile.php?mail='" . $_SESSION['email'] . "'' class='nav-link'><i class='fa fa- user'></i>My Profile</a>";
                            ?>

                            <a class="nav-link" href="./signout.php"><i class="fa fa-power -off"></i>Logout</a>
                        </div>
                    </div>
                    <li class="active">
                        <a href="admin_dashboard.php"><i class="menu-icon ti ti-home"></i>Dashboard </a>
                    </li>

                    <li>
                        <a href="admin_manage_chairman.php"><i class="menu-icon ti ti-layout-grid3"></i>Manage Chairman</a>
                    </li>
                    <li>
                        <a href="admin_manage_coChairman.php"><i class="menu-icon fa fa-picture-o"></i>Manage Co-Chairman</a>
                    </li>
                    <li>
                        <a href="admin_manage_institute.php"><i class="menu-icon fa fa-picture-o"></i>Manage Institute</a>
                    </li>
                    <li>
                        <a href="admin_manage_faculty.php"><i class="menu-icon fa fa-picture-o"></i>Manage Faculty Member</a>
                    </li>
                    <li>
                        <a href="admin_manage_approvals.php"><i class="menu-icon fa fa-picture-o"></i>Manage Approval</a>
                    </li>
                    <li>
                        <a href="report.php" ><i class="menu-icon fa fa-picture-o"></i>Report</a>
                    </li>

                    <?php
                } elseif ($_SESSION['sessionrole'] == 'Chairman') {
                    ?>
                    <div class="user-area dropdown float-right">


                        <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="images/admin.jpg" alt="User Avatar">
                            <?php
                            if (isset($_SESSION['flag']) == 1) {
                                echo $_SESSION['name'];
                                ?>

                                <?php
                            }
                            ?>
                        </a>

                        <div class="user-menu dropdown-menu">
                            <?php
                            echo "<a href='profile.php?mail='" . $_SESSION['email'] . "'' class='nav-link'><i class='fa fa- user'></i>My Profile</a>";
                            ?>

                            <a class="nav-link" href="./signout.php"><i class="fa fa-power -off"></i>Logout</a>
                        </div>
                    </div>
                    <li class="active">
                        <a href="chairman_dashboard.php"><i class="menu-icon ti ti-home"></i>Dashboard </a>
                    </li>

                    <li>
                        <a href="chairman_manage_events.php"><i class="menu-icon ti ti-layout-grid3"></i>Manage Events</a>
                    </li>
                    <li>
                        <a href="chairman_manage_member_coordinator.php"><i class="menu-icon fa fa-picture-o"></i>Manage Member Coordinator</a>
                    </li>
                    <li>
                        <a href="chairman_manage_judges.php"><i class="menu-icon fa fa-picture-o"></i>Manage Judge</a>
                    </li>
                    <li>
                        <a href="chairman_manage_notification.php"><i class="menu-icon fa fa-picture-o"></i>Manage Notification</a>
                    </li>
                    <li>
                        <a href="chairman_manage_criteria.php"><i class="menu-icon fa fa-picture-o"></i>Manage Criteria</a>
                    </li>
                    <li>
                        <a href="chairman_manage_score.php"><i class="menu-icon fa fa-picture-o"></i>Manage Score</a>
                    </li>
                    <li>
                        <a href="report.php"><i class="menu-icon fa fa-picture-o"></i> Reports</a>
                    </li>
                    <?php
                } elseif ($_SESSION['sessionrole'] == 'Co-Chairman') {
                    ?>
                    <div class="user-area dropdown float-right">


                        <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="images/admin.jpg" alt="User Avatar">
                            <?php
                            if (isset($_SESSION['flag']) == 1) {
                                echo $_SESSION['name'];
                                ?>

                                <?php
                            }
                            ?>
                        </a>

                        <div class="user-menu dropdown-menu">
                            <?php
                            echo "<a href='profile.php?mail='" . $_SESSION['email'] . "'' class='nav-link'><i class='fa fa- user'></i>My Profile</a>";
                            ?>

                            <a class="nav-link" href="./signout.php"><i class="fa fa-power -off"></i>Logout</a>
                        </div>
                    </div>
                    <li class="active">
                        <a href="#"><i class="menu-icon ti ti-home"></i>Dashboard </a>
                    </li>

                    <li>
                        <a href="coChairman_manage_events.php" ><i class="menu-icon ti ti-layout-grid3"></i>Manage Events</a>
                    </li>
                    <li>
                        <a href="coChairman_manage_member_coordinator.php"><i class="menu-icon fa fa-picture-o"></i>Manage Member Coordinators</a>
                    </li>
                    <li>
                        <a href="coChairman_manage_judges.php"><i class="menu-icon fa fa-picture-o"></i>Manage Judge</a>
                    </li>
                    <li>
                        <a href="coChairman_manage_criteria.php"><i class="menu-icon fa fa-picture-o"></i>Manage Criteria</a>
                    </li>
                    <li>
                        <a href="coChairman_manage_score.php"><i class="menu-icon fa fa-picture-o"></i>Manage Score</a>
                    </li>
                    <li>
                        <a href="report.php"><i class="menu-icon fa fa-picture-o"></i> Reports</a>
                    </li>
                    <?php } ?>

            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside>