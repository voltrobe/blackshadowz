<?php
	if(isset($_REQUEST['batch']))
	{
		$batch=$_POST['batch'];
	}
	else
	{
		$batch="";
	}
require_once('../include/connect.php');
if(!isset($_SESSION['userid']))
header('Location: ../../index.php');
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Attendance | BlackkShadowzzz</title>
  <!-- Image upload -->
  <!-- GLOBAL STYLES -->
    <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
 
    <link rel="stylesheet" href="../../assets/css/main.css" />
    <link rel="stylesheet" href="../../assets/css/theme.css" />
    <link rel="stylesheet" href="../../assets/css/MoneAdmin.css" />
    <link rel="stylesheet" href="../../assets/plugins/Font-Awesome/css/font-awesome.css" />
    <!--Switch-->
    <link href="../../assets/css/jquery-ui.css" rel="stylesheet" />  
<link rel="stylesheet" href="../../plugins/bootstrap-switch.css" />

    <script src="../../plugins/bootstrap-toggle.min.css"></script>
    <script src="../../plugins/highlight.css"></script>
    <!--END GLOBAL STYLES -->

    <!-- PAGE LEVEL STYLES --><!--
<link rel="stylesheet" href="../../assets/css/bootstrap-fileupload.min.css" />-->
<!-- Image upload end -->

<script>var count =0;</script>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
 <!-- <!-- Bootstrap 3.3.6 
  <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">-->
    <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="../../plugins/datepicker/datepicker3.css">
<!-- Select2 -->
  <link rel="stylesheet" href="../../plugins/select2/select2.min.css">
      <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../../plugins/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../../plugins/datatables/dataTables.bootstrap.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
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
  <?php include_once '../include/sidebar.php';?>
  <!--Sidebar-->

    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Student Attendance.
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Attendance</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
         <!-- /.box -->

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Attendance.</h3>
            </div>
            <!-- /.box-header --> 
            <div class="box-body">
              <div class="box box-info" >
            <div class="box-header with-border">
              <h3 class="box-title">Fields with * are mandatory.</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
              <div class="box-body">
              <div class="form-group">
                  <label for="name" class="col-sm-2 control-label">Select Batch *</label>
                  <div class="col-md-6">                        
                    <select id="batch" class="form-control select2" name="batch"  name="Select1">
                    	<option value="regular">Regular Batch</option>
						<option value="monday">Monday Batch </option>
						<option value="tuesday">Tuesday Batch</option>
						<option value="weekend">Weekend Batch</option>
					</select>
					</div>
					<button type="submit" class="btn btn-info" style="width: 150px">Submit</button>
                  
                </div>
              </div>
              <!-- /.box-body -->
              <!-- /.box-footer -->
            </form>
         <hr>
            <!--Table-->
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Student Name</th>
                  <th>Phone No.</th>
                  <th>Batch</th>
                  <th>Time/Date</th>
                  <th>Attendance</th>
                  
                </tr>
                </thead>
                <tbody>
             <?php
            
            //	include 'connect.php';
                $sql=mysql_query("select * from student_info where batch='$batch'");
                $num=mysql_num_rows($sql);
                if($num > 0){
                    $i=1;
                    while($row=mysql_fetch_array($sql))
                   { $qry=mysql_query("select attenddate from attendance where studid=".$row['id']."");
                    	$sqlrow=mysql_fetch_row($qry);
                        ?>
                       <tr>
                <td><a href="viewdetail.php?id=<?php echo $row['id']; ?>"><?php echo $row['name'];?></a></td>
                <td><?php echo $row['contact'];?></td>
                <td><?php echo $row['batch'];?></td>
            	<td><?php echo date('D,j M Y',$sqlrow[0]); ?></td>
                <td><div class="form-group">
                  <div class="make-switch">
    <input type="checkbox" checked="true" id="<?php echo $row['id'] ?>" onchange="slidercount('<?php echo $row['id'] ?>')" data-off-text="Absent"  name="<?php echo $row['id'] ?>" data-on-text="Present" data-on-color="success" data-off-color="warning"  class="probeProbe" />
</div>
                                </div>        		
				</td>
              </tr><?php
                      $i++;  
                    }
                } 
             ?>             
            </tbody>
          </table>	
          
          				</div>
 			</div>          
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
   <!-- </div>-->
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
<!-- Bootstrap 3.3.6 -->
<script src="../../bootstrap/js/bootstrap.min.js"></script>
<!-- Select2 -->
<script src="../../plugins/select2/select2.full.min.js"></script>
<!-- DataTables -->
<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- bootstrap datepicker -->
<script src="../../plugins/datepicker/bootstrap-datepicker.js"></script>
<!--Switch-->
<script src="../../plugins/bootstrap-switch.js"></script>
<!--
<script src="../../assets/js/jquery-ui.min.js"></script>-->
<!-- FastClick -->
<script src="../../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/app.min.js"></script>

<!--
    <script src="../../plugins/bootstrap-toggle.min.js"></script>
    <script src="../../plugins/highlight.min.js"></script>-->
<!-- page script -->
<script>
$.ajaxSetup({ cache: false });
  $(function () {
 $('.probeProbe').bootstrapSwitch('state', false);
//$('#CheckBoxValue').text($("#TheCheckBox").bootstrapSwitch('state'));

	 var fc=document.querySelectorAll('.probeProbe');
	var fcid, i; 
	for(i=0;i<=fc.length;i++){
		fcid=fc[i].getAttribute('name');
		//alert(fcid);
		$.get("processattend.php?init="+fcid ,function(data){ 
		//alert(data);
 	$('input[name="'+fcid+'"]').bootstrapSwitch('state', data);
		});
	}

    $('#datepicker').datepicker({
      autoclose: true
    });
 
    $("#example1").DataTable();
  $(".select2").select2();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
<script>


</script>
<script>
var count=0;
var stat=false;  // true for present

function slidercount(idy){
	var state=($('input#'+idy).bootstrapSwitch('state'))? "present":"absent";
	//alert(state);
/*			if(parseInt($('#'+id).attr('data-count'))%2==0){
			if($('#'+id).attr('rel').includes("absent")){
	$('#'+id).attr('rel','present');
	}}
	else{
	$('#'+id).attr('rel','absent');
	}
 count=parseInt($('#'+id).attr('data-count'))+1;
$('#'+id).attr('data-count',count);
*/
	$.get("processattend.php?id="+idy+"&attend="+state ,function(){
		});
}
</script>
</body>
</html>
<?php /* DNS --103.57.80.19 */?>