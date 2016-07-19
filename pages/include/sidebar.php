<?php
// HEAD
error_reporting(E_ALL ^ E_DEPRECATED);
//include_once '../include/connect.php';
//session_start();
//>>>>>>> origin/master
$email = $_SESSION["email"]; ?>
<header class="main-header">
    <!-- Logo -->
    <a href="../../index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b class="fa fa-dashboard">BS</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Black</b>Shadowz</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
<script src="../../plugins/pace-macosx.js"></script>



<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <?php

        $sql = mysql_query("select * from login_info where email='$email'");
        //   echo "select * from hall_garden where user_id='$vender_id'and Name in(select particularname from eventrecord where event_date='$_SESSION[eventdate]') ";
        $num = mysql_num_rows($sql);
        if ($num > 0){
        $i = 1;
        while ($row = mysql_fetch_array($sql))
        {
        ?>

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div style='width:120px;height:120px;' class="pull-left image">
                <img style='max-width:90px ;border-radius:30% ;' src="<?php echo $row['myfile']; ?>" class="img-circle"
                     alt="User Image">
            </div>
            <div style='margin-left:50px;' class="pull-left info">
                <h4><?php echo $row['name']; ?></h4>
                <!-- Status -->
                <?php
                $i++;
                }
                }
                //   active();
                ?>

            </div>
        </div>
        <!-- search form (Optional) -->
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">HEADER</li>
            <!-- Optionally, you can add icons to the links -->

            <li class='<?php active('studentlist.php'); ?>'><a href="../student/studentlist.php"><i
                        class="fa fa-users"></i> <span>Students list</span></a></li>
            <li class='<?php active('addstudent.php'); ?>'><a href="../student/addstudent.php"><i
                        class="fa fa-save"></i> <span>Add new student</span></a></li>
            <li class='<?php active('attendance.php'); ?>'><a href="../student/attendance.php"><i
                        class="fa fa-bullhorn"></i> <span>Attendance</span></a></li>

            <!-- >>>>>> origin/master -->
            <li><a href="#"><i class="fa fa-pie-chart"></i> <span>Fees information</span></a></li>
            <li class='treeview <?php active('changepass.php');
            active('adduser.php'); ?>'>
                <a href="#"><i class="fa fa-edit"></i> <span>Settings</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li class='<?php active('changepass.php'); ?>'><a href="../admin/changepass.php"><i class="fa fa-laptop"></i>Change password</a>
                    </li>
                    <li class='<?php active('adduser.php'); ?>'><a href="../admin/adduser.php"><i class="fa fa-files-o"></i>Add a user account</a>
                    </li>
                </ul>
            </li>
            <li><a href="../include/logout.php"><i class="fa fa-link"></i> <span>Logout</span></a></li>

        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside></aside>