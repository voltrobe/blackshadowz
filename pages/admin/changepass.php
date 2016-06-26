<?php
session_start();
if(!isset($_SESSION['userid']))
header('Location: ../../index.php');
else
 {
	$userid=$_SESSION['userid'];
	$username=$_SESSION['name'];
	$useremail=$_SESSION['email'];
 }
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
        Change Password.
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Students List</li>
      </ol>
    </section>
 <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Please enter the details below.</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="processchangepass.php" method="post" role="form">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Enter your current password.</label>
                  <input type="password" class="form-control" onblur="passcheck(<?php echo $userid; ?>,this.value);" id="pass" placeholder="Enter current password">
                  <span style="font-size:14px;" id="error"></span>
                </div>
              
                <div class="form-group">
                  <label for="exampleInputPassword1">Enter New Password</label>
                  <input type="password" class="form-control" id="pass1" name="pass1" placeholder="Enter New Password" onblur="checkPass(); return false;">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Retype your New Password</label>
                  <input type="password" class="form-control" id="pass2" name="pass2" placeholder="Retype New Password" onkeyup="checkPass(); return false;">
           		  <span id="confirmMessage" class="confirmMessage"></span>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
              <center><div class="box-footer">
              	<button type="submit" id="submit" class="btn btn-info pull-right" style="width: 150px">Change password</button>
                <span><button type="reset" class="btn btn-default pull-left" style="width: 150px">Cancel</button></span>
                
              </div></center>
              </div>
            </form>
          </div>
          <!-- /.box -->
</div>
        <!-- /.col -->
      </div>  </section>
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
<script>
function passcheck(userid,pass)
{
//alert(userid+" "+pass);
$.get('../student/connect.php?userid='+userid+'&pass='+pass,function(data){
//alert(data)
if(data==0)
{
$('#error').html("<font style='color:red;'>Please Enter Correct Password</font>");
$("#submit").attr("disabled",true);

}
else
{
$('#error').html("<font style='color:green;'>Password Seems Wokay...Go Ahead</font>");
$("#submit").attr("disabled",false);
}
});

}

function checkPass()
{
    //Store the password field objects into variables ...
    var pass1 = document.getElementById('pass1');
    var pass2 = document.getElementById('pass2');
    //Store the Confimation Message Object ...
    var message = document.getElementById('confirmMessage');
    //Set the colors we will be using ...
    var goodColor = "#34A853";
    var badColor = "#ff6666";
    //Compare the values in the password field 
    //and the confirmation field
    if(pass1.value == pass2.value){
        //The passwords match. 
        //Set the color to the good color and inform
        //the user that they have entered the correct password 
        pass2.style.borderColor = goodColor;
        message.style.color = goodColor;
        message.innerHTML = "Passwords Match!"
        $("#submit").attr("disabled",false);
    }else{
        //The passwords do not match.
        //Set the color to the bad color and
        //notify the user.
        pass2.style.borderColor = badColor;
        message.style.color = badColor;
        message.innerHTML = "Passwords Do Not Match!"
        $("#submit").attr("disabled",true);

    }
}
</script>
</body>
</html>