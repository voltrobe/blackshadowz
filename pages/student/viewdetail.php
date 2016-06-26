<?php
session_start();
if(!isset($_SESSION['userid']))
header('Location: ../../index.php');
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Data Tables</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
      <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="../../plugins/datepicker/datepicker3.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../../plugins/datatables/dataTables.bootstrap.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
    <!-- Popup window -->
 <link type="text/css" rel="stylesheet" href="../popup/popModal.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="../../index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Black</b>Shadowz</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->

  <!--Sidebar-->
  <?php include '../include/sidebar.php';?>
  <!--Sidebar-->



    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Student information.
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Student details</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
         <!-- /.box -->

          <div class="box" style="width:50%">
            <div class="box-header">
              <h3 class="box-title">Details of the student.</h3>
            </div>
            <!-- /.box-header --> 
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                
                            <?php
                            $id=$_GET['id'] ;
include 'connect.php';
$q=mysql_query("select *from student_info where id=$id");
$num=mysql_num_rows($q);
if($num > 0)
{
	$i=1;
	while($row=mysql_fetch_array($q))
	{
		$name=$row['name'];
		$id=$row['id'];
		
    	$doj=$row['doj'];
		$contact=$row['contact'];
		
        $email=$row['email'];
        $age=$row['age']; 
        $address=$row['address'];
        
		$feespaid=$row['feespaid'];
		$totalfees=$row['totalfees'];
		$myfile=$row['myfile'];
		
		$dues=$row['totalfees']-$row['feespaid'];
		?>

                 <tr>
                  <th>Sr. No.</th>
                  <td><?php echo $id;?></td>
                 </tr>
                 <tr> 
                  <th>Student Name</th>
             	  <td><?php echo $name;?></td>
             	 </tr>
             	  <tr> 
                  <th>Email</th>
                  <td><?php echo $email;?></td>
                  </tr>
                 <tr> 
                  <th>Date of joining</th>
                  <td><?php echo $doj;?></td>
                  </tr>
                  <tr>
                  <th>Contact info</th>
                  <td><?php echo $contact;?></td>
                  </tr>
                  <tr>
                  <th>Total Fees</th>
                  <td><?php echo $totalfees;?></td>
                  </tr>
                  <tr>
                  <th>Fees paid</th>
                  <td><?php echo $feespaid;?></td>
                  </tr>
                  <tr>
                  <th>Dues</th>
                  <td><?php echo $dues;?></td>
                  </tr>
                  <tr>
                  <th>Address</th>
                  <td><?php echo $address;?></td>
                  </tr>
                  <tr>
                  <th>Photo</th>
                  <td><img src="<?php echo $myfile;?>" height="200px"></td>

                  		<?php
		$i++;
	}
		
}
?>
                </tr>
                </thead>
                <tbody>

                  
                                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      Developed by <a href="http://vebcrumbs.com" target="_blank"><b>Vebcrumbs.com</b></a>
    </div>
    <strong>Copyright &copy; 2016 <a href="#">B<span class="text-light-blue">lackShadowz</span></a>.</strong> All rights
    reserved.
  </footer>

  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.0 -->
<script src="../../plugins/jQuery/jQuery-2.2.0.min.js"></script>
<!--Popup script-->
<script src="../popup/popModal.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="../../bootstrap/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- page script -->
</body>
</html>
