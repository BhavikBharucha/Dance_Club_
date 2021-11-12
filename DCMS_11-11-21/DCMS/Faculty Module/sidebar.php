
<aside id="left-panel" class="left-panel" style="width: 305px;">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">


                <?php
                if (isset($_SESSION['sessionrole']) == 'Faculty') {
                    ?>
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="images/admin.jpg" alt="User Avatar">
                            <?php
                            if (isset($_SESSION['flag']) == 1) {
                                echo "<span style='font-size: 13px;'>".$_SESSION['name']."</span>";
                                ?>
                                
                                <?php
                            }
                            ?>
                        </a>

                        <div class="user-menu dropdown-menu">
                            <?php
                            echo "<a href='faculty_profile.php?mail='" . $_SESSION['mail'] . "'' class='nav-link'><i class='fa fa- user'></i>My Profile</a>";
                            ?>

                            <a class="nav-link" href="./signout.php"><i class="fa fa-power -off"></i>Logout</a>
                        </div>
                    </div>

                    <li class="active">
                        <a href="faculty_dashboard.php"><i class="menu-icon ti ti-home"></i>Dashboard </a>
                    </li>
                    <li>
                        <a href="manage_student_member.php" style="font-size: 12px; font-weight: bold;"><i class="menu-icon ti ti-user"></i>Manage Student Member</a>
                    </li>
                    <li>
                        <a href="manage_student_coordinator.php" style="font-size: 12px; font-weight: bold;"><i class="menu-icon fa fa-picture-o"></i>Manage Student Coordinator</a>
                    </li>
                    <li>
                        <a href="manage_participants.php" style="font-size: 12px; font-weight: bold;"><i class="menu-icon fa fa-picture-o"></i>Manage Participants</a>
                    </li>
                    <li>
                        <a href="manage_faculty_notifications.php" style="font-size: 12px; font-weight: bold;"><i class="menu-icon fa fa-bell"></i>Notifications</a>
                    </li>
                    <li>
                        <a href="report.php" style="font-size: 12px; font-weight: bold;"><i class="menu-icon fa fa-document"></i>Report</a>
                    </li>
                    <?php
                } elseif (isset($_SESSION['sessionrole']) == 'Admin') {
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
                            echo "<a href='admin_profile.php?mail='" . $_SESSION['mail'] . "'' class='nav-link'><i class='fa fa- user'></i>My Profile</a>";
                            ?>

                            <a class="nav-link" href="./signout.php"><i class="fa fa-power -off"></i>Logout</a>
                        </div>
                    </div>
                    <li class="active">
                        <a href="#"><i class="menu-icon ti ti-home"></i>Dashboard </a>
                    </li>

                    <li>
                        <a href="#" style="font-size: 13px; font-weight: bold;"><i class="menu-icon ti ti-layout-grid3"></i>Manage Chairman</a>
                    </li>
                    <li>
                        <a href="#" style="font-size: 13px; font-weight: bold;"><i class="menu-icon fa fa-picture-o"></i>Manage Co-Chairman</a>
                    </li>
                    <li>
                        <a href="#" style="font-size: 13px; font-weight: bold;"><i class="menu-icon fa fa-picture-o"></i>Manage Institute</a>
                    </li>
                    <li>
                        <a href="#" style="font-size: 13px; font-weight: bold;"><i class="menu-icon fa fa-picture-o"></i>Manage Faculty Member</a>
                    </li>
                    <li>
                        <a href="#" style="font-size: 13px; font-weight: bold;"><i class="menu-icon fa fa-picture-o"></i>Manage Approval</a>
                    </li>

                    <?php
                }elseif (isset($_SESSION['sessionrole']) == 'Chairman') {
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
                            echo "<a href='chairman_profile.php?mail='" . $_SESSION['mail'] . "'' class='nav-link'><i class='fa fa- user'></i>My Profile</a>";
                            ?>

                            <a class="nav-link" href="./signout.php"><i class="fa fa-power -off"></i>Logout</a>
                        </div>
                    </div>
                    <li class="active">
                        <a href="#"><i class="menu-icon ti ti-home"></i>Dashboard </a>
                    </li>

                    <li>
                        <a href="#" style="font-size: 13px; font-weight: bold;"><i class="menu-icon ti ti-layout-grid3"></i>Manage Co-Chairman</a>
                    </li>
                    <li>
                        <a href="#" style="font-size: 13px; font-weight: bold;"><i class="menu-icon fa fa-picture-o"></i>Manage Notifications</a>
                    </li>
                    <li>
                        <a href="#" style="font-size: 13px; font-weight: bold;"><i class="menu-icon fa fa-picture-o"></i>Manage Faculty Coordinators</a>
                    </li>
                    <li>
                        <a href="#" style="font-size: 13px; font-weight: bold;"><i class="menu-icon fa fa-picture-o"></i>Manage Judge</a>
                    </li>
                    <li>
                        <a href="#" style="font-size: 13px; font-weight: bold;"><i class="menu-icon fa fa-picture-o"></i>Manage Evaluation Criteria</a>
                    </li>
                    <li>
                        <a href="#" style="font-size: 13px; font-weight: bold;"><i class="menu-icon fa fa-picture-o"></i>Manage Score</a>
                    </li>
                    <li>
                        <a href="#" style="font-size: 13px; font-weight: bold;"><i class="menu-icon fa fa-picture-o"></i>Manage Result</a>
                    </li>
                    <li>
                        <a href="#" style="font-size: 13px; font-weight: bold;"><i class="menu-icon fa fa-picture-o"></i>Manage Reports</a>
                    </li>
                    <?php
                }elseif (isset($_SESSION['sessionrole']) == 'Co-Chairman') {
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
                            echo "<a href='co_chairman_profile.php?mail='" . $_SESSION['mail'] . "'' class='nav-link'><i class='fa fa- user'></i>My Profile</a>";
                            ?>

                            <a class="nav-link" href="./signout.php"><i class="fa fa-power -off"></i>Logout</a>
                        </div>
                    </div>
                    <li class="active">
                        <a href="#"><i class="menu-icon ti ti-home"></i>Dashboard </a>
                    </li>

                    <li>
                        <a href="#" style="font-size: 13px; font-weight: bold;"><i class="menu-icon ti ti-layout-grid3"></i>Manage Rules</a>
                    </li>
                    <li>
                        <a href="#" style="font-size: 13px; font-weight: bold;"><i class="menu-icon fa fa-picture-o"></i>Manage Faculty Coordinators</a>
                    </li>
                    <li>
                        <a href="#" style="font-size: 13px; font-weight: bold;"><i class="menu-icon fa fa-picture-o"></i>Manage Judge</a>
                    </li>
                    <li>
                        <a href="#" style="font-size: 13px; font-weight: bold;"><i class="menu-icon fa fa-picture-o"></i>Manage Evaluation Criteria</a>
                    </li>
                    <li>
                        <a href="#" style="font-size: 13px; font-weight: bold;"><i class="menu-icon fa fa-picture-o"></i>Manage Score</a>
                    </li>
                    <li>
                        <a href="#" style="font-size: 13px; font-weight: bold;"><i class="menu-icon fa fa-picture-o"></i>Manage Result</a>
                    </li>
                    <li>
                        <a href="#" style="font-size: 13px; font-weight: bold;"><i class="menu-icon fa fa-picture-o"></i>Manage Reports</a>
                    </li>
                    <?php
                }

                //Admin,Chairman,Co-chairman
                ?>
                <!--
                                
                                        <li class="menu-title">Admin</li>
                                        
                                
                                <li>
                                    <a href="#"><i class="menu-icon ti ti-layout-grid3"></i>Manage product</a>
                                </li>
                                <li>
                                    <a href="#"><i class="menu-icon fa fa-picture-o"></i>Main website</a>
                                </li>-->

            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside>