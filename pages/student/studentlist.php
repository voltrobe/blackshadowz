<?php
require_once('../include/connect.php');
if(!isset($_SESSION['userid']))
header('Location: ../../index.php');
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>StudentList | BlackkShadowzzz</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
        <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="../../plugins/datepicker/datepicker3.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../../plugins/datatables/dataTables.bootstrap.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
  
    <link rel="stylesheet" href="../../assets/plugins/Font-Awesome/css/font-awesome.css" />
  <!-- Ionicons -->
  <link rel="stylesheet" href="../../plugins/ionicons.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/font-awesome.min.css">
    <!-- Popup window -->
<!-- <link type="text/css" rel="stylesheet" href="../popup/popModal.css">-->
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
<body class="hold-transition skin-blue sidebar-mini fixed">
<div class="wrapper">

  <!--Sidebar-->
  <?php include_once '../include/sidebar.php';?>
  <!--Sidebar-->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Student information.
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Students List</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
         <!-- /.box -->

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">List of all the students.</h3>
            </div>
            <!-- /.box-header --> 
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped text-center">
                <thead>
                <tr>
                  <th>Batch Day</th>
                  <th>Student Name</th>
                  <!--<th>Date of joining</th>-->
                  <th>Contact info</th>
                  <th class='text-center'>Fees paid / Total</th>
                  <th>Dues</th>
                </tr>
                </thead>
                <tbody>
                
                            <?php
//include 'connect.php';
$q=mysql_query("select *from student_info order by doj desc");
$num=mysql_num_rows($q);
if($num > 0)
{
	$i=1;
	while($row=mysql_fetch_array($q))
	{
		$name=$row['name'];
		$id=$row['id'];
		$batch=$row['batch'];
    	$doj=$row['doj'];
		$contact=$row['contact'];
		
        $email=$row['email'];
        $age=$row['age']; 
        $address=$row['address'];
        
		$feespaid=$row['feespaid'];
		$totalfees=$row['totalfees'];
		
		$dues=$row['totalfees']-$row['feespaid'];
		?>

                
                <tr>
                  <td><?php echo $batch;?></td>
                  <td><a href="viewdetail.php?id=<?php echo $id;?>"><span id="name"><?php echo ucfirst($name);?></span></a></td>
                  <!--<td><?php echo $doj;?></td>-->
                  <td><?php echo $contact;?></td>
                  <td class="text-center"><?php echo $feespaid." / ".$totalfees;?></td>
                  <td><?php echo $dues;?></td>
                  
                  		<?php
		$i++;
	}
		
}
?>

                  
                </tr>
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
    <strong>Copyright &copy; 2016 <a href="#">Blackk<span class="text-green">ShadowzZz</span></a>.</strong> All rights
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
<!--<script src="../popup/popModal.js"></script>-->
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
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
        //popup
/*$('#demo').popModal({
html : $('#content').html()
});	*/

  });
</script>
</body>
</html>

<?php
//function pops($eventy){
//if(isset($_GET['popy'])){
	/*
echo<<<_END
<div id="popup1" style="display:none">
	<div class="popup">
		<h3>Details of: $name</h3>

<div class="box-header with-border">
		<div class="table-responsive">
            <table class="table">
              <tr>
                <th style="width:50%">Name:</th>
                <td>$name</td>
              </tr>
              <tr>
                <th>Email:</th>
                <td>$email</td>
              </tr>
              <tr>
                <th>Contact no.:</th>
                <td>$contact</td>
              </tr>
              <tr>
                <th>Age:</th>
                <td>$age</td>
              </tr>
              <tr>
                <th>Joining Date:</th>
                <td>$doj</td>
              </tr>
              <tr>
                <th>Total Fees:</th>
                <td>$totalfees</td>
              </tr>
              <tr>
                <th>Fees Paid:</th>
                <td>$feespaid</td>
              </tr>
              <tr>
                <th>Address:</th>
                <td>$address</td>
              </tr>
            </table>          
          </div>
          <div class="popModal_footer">
<button type="button" data-popModalBut="ok">ok</button>
<button type="button" data-popModalBut="cancel">cancel</button>
</div>
</div>




	</div>
</div>
_END;
//}
//}
*/
?>