<?php
<<<<<<< HEAD
	 error_reporting(E_ALL ^ E_DEPRECATED);
	// session_start();
=======
		  include '../student/connect.php';
	 //session_start();
>>>>>>> origin/master
	$email=$_SESSION["email"]; ?>

<script src="../../plugins/pace-macosx.js"></script>

<header>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                <p>
                  Alexander Pierce - Web Developer
                  <small>Member since Nov. 2012</small>
                </p>
              </li>
</ul>

</header>


<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

<?php

$sql=mysql_query("select * from login_info where email='$email'");
             //   echo "select * from hall_garden where user_id='$vender_id'and Name in(select particularname from eventrecord where event_date='$_SESSION[eventdate]') ";
                $num=mysql_num_rows($sql);
                if($num > 0){
                    $i=1;
                    while($row=mysql_fetch_array($sql))
                    {
?>

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div style='width:120px;height:120px;' class="pull-left image">
          <img style='max-width:90px ;border-radius:30% ;' src="<?php echo $row['myfile']; ?>" class="img-circle" alt="User Image">
        </div>
        <div style='margin-left:50px;' class="pull-left info">
          <h4><?php echo $row['name']; ?></h4>
          <!-- Status -->
          <?php
                      $i++;  
                    }
                }
                
             ?>

        </div>
      </div>
      <!-- search form (Optional) -->
      <!-- /.search form -->

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
        <li class="header">HEADER</li>
        <!-- Optionally, you can add icons to the links -->
<<<<<<< HEAD
        <li><a href="../student/studentlist.php"><i class="fa fa-link"></i> <span>Students list</span></a></li>
        <li><a href="../student/addstudent.php"><i class="fa fa-link"></i> <span>Add new student</span></a></li>
        <li><a href="../student/attendance.php"><i class="fa fa-link"></i> <span>Attendance</span></a></li>
=======
        <li class='active'><a href="../student/studentlist.php" ><i class="fa fa-link"></i> <span>Students list</span></a></li>
        <li><a href="../student/addstudent.php"><i class="fa fa-link"></i> <span>Add new student</span></a></li>
        
>>>>>>> origin/master
        <li><a href="#"><i class="fa fa-link"></i> <span>Fees information</span></a></li>
        <li class="treeview">
          <a href="#"><i class="fa fa-link"></i> <span>Settings</span> <i class="fa fa-angle-left pull-right"></i></a>
          <ul class="treeview-menu">
            <li><a href="../admin/changepass.php">Change password</a></li>
            <li><a href="../admin/adduser.php">Add a user account</a></li>
          </ul>
          <li><a href="../include/logout.php"><i class="fa fa-link"></i> <span>Logout</span></a></li>
        </li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>