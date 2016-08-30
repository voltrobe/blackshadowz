<?php

require_once('../include/connect.php');
if(isset($_REQUEST['batch'])){
$batch = $_POST['batch'];
$_SESSION['batchselect'] = $batch;
$bt = $_SESSION['batchselect'];
}
else
$_SESSION['batchselect'] = $batch = $bt    = "";

if(isset($_REQUEST['datechoose'])){
	$dateofattend=$_POST['datechoose'];
	$_SESSION['dateofattend']=$dateofattend;
}
else {
$dateofattend =  $_SESSION['dateofattend'] = date('d/m/y');
 }

if(!isset($_SESSION['userid']))
header('Location: ../../index.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>
		Attendance | BlackkShadowzzz
	</title>
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

	<script src="../../plugins/bootstrap-toggle.min.css">
	</script>
	<script src="../../plugins/highlight.css">
	</script>
	<!--END GLOBAL STYLES -->

	<!-- PAGE LEVEL STYLES --><!--
	<link rel="stylesheet" href="../../assets/css/bootstrap-fileupload.min.css" />-->
	<!-- Image upload end -->

	<script>
		var count =0;
	</script>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- <!-- Bootstrap 3.3.6
	<link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">-->
	<!-- bootstrap datepicker -->
	<link rel="stylesheet" href="../../plugins/datepicker/datepicker3.css">
	<!-- daterange picker -->
  <link rel="stylesheet" href="../../plugins/daterangepicker/daterangepicker-bs3.css">
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
<body onload="" class="hold-transition skin-blue sidebar-mini fixed">
	<div class="wrapper">

		<!--Sidebar-->
		<?php include_once '../include/sidebar.php';?>
		<!--Sidebar-->

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<section class="content-header">
				<h1>
					Student Attendance.
				</h1>
				<ol class="breadcrumb">
					<li>
						<a href="#">
							<i class="fa fa-dashboard">
							</i>Home
						</a>
					</li>
					<li class="active">
						Attendance
					</li>
				</ol>
			</section>

			<!-- Main content -->
			<section class="content">
			<div class="row">
				<div class="col-xs-12">
					<!-- /.box -->

					<div class="box">
						<div class="box-header">
							<h3 class="box-title">
								Attendance.
							</h3>
						</div>
						<!-- /.box-header -->
						<div class="box-body">
							<div class="box box-info" >
								<div class="box-header with-border">
									<h3 class="box-title">
										<?php echo isset($bt)?ucwords($bt." Batch ,".$_SESSION['dateofattend']):"Fields with * are mandatory."; ?>
									</h3>
								</div>
								<!-- /.box-header -->
								<!-- form start -->
								<form class="form-horizontal" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
									<div class="box-body">
										<div class="form-group">
											<label for="name" class="col-xs-2  control-label">
												Select Batch *
											</label>
											<div class="col-sm-3">
												<select id="batch" class="form-control select2" name="batch"  name="Select1">
													<option value="">
														Select a Batch
													</option>
													<option value="regular">
														Regular Batch
													</option>
													<option value="monday">
														Monday Batch
													</option>
													<option value="tuesday">
														Tuesday Batch
													</option>
													<option value="weekend">
														Weekend Batch
													</option>
												</select>
											</div>
																			 <!-- Date -->
                <label class="col-sm-2 control-label">Date:</label>

                <div class="input-group date col-xs-3">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" name="datechoose" class="form-control" id="datepicker">
                </div>
                <!-- /.input group -->

											<div class="col-xs-2">
												<button type="submit" class="btn btn-info  pull-right" >
													Submit
												</button>
											</div>
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
											<th>
												Student Name
											</th>
											<th>
												Phone No.
											</th>
											<th>
												Attendance
											</th>
											<!--<th>Batch</th>-->
											<th>
												Time/Date
											</th>
										</tr>
									</thead>
									<tbody>
										<?php

										//	include 'connect.php';
										$sql = mysql_query("select * from student_info where batch='$batch'");
										if(mysql_num_rows($sql) > 0)
										{
											$i = 1;
											while($row = mysql_fetch_array($sql)){ // populate all the selected batch student
												$qry    = mysql_query("select attenddate from attendance where studid=".$row['id']."");
												$sqlrow = mysql_fetch_row($qry);
												?>
												<tr>
													<td>
														<a href="viewdetail.php?id=<?php echo $row['id']; ?>">
															<?php echo ucwords($row['name']);?>
														</a>
													</td>
													<td>
														<?php echo $row['contact'];?>
													</td>
													<!--<td><?php echo ucwords($row['batch']);?></td>-->
													<td>
														<div class="make-switch">
														<!--onfocus="slidercount('<?php echo $row['id'] ?>','<?php echo $row['name'] ?>',this)"-->
															<input type="checkbox"  data-off-text="Absent"  data-count="<?php echo $row['id'] ?>" data-on-text="Present" data-on-color="success" data-off-color="warning"  class="probeProbe" />
														</div>
													</td>
													<td>
														<?php echo $sqlrow[0]; ?>
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
				Developed by
				<a href="http://vebcrumbs.com" target="_blank">
					<b>
						Vebcrumbs.com
					</b>
				</a>
			</div>
			<strong>
				Copyright &copy; 2016
				<a href="#">
					Blackk
					<span class="text-green">
						ShadowzZz
					</span>
				</a>.
			</strong> All rights
			reserved.
		</footer>

		<!-- Add the sidebar's background. This div must be placed
		immediately after the control sidebar -->
		<div class="control-sidebar-bg">
		</div>
	</div>

	<!-- ./wrapper -->

	<!-- jQuery 2.2.0 -->
	<script src="../../plugins/jQuery/jQuery-2.2.0.min.js">
	</script>
	<!-- Bootstrap 3.3.6 -->
	<script src="../../bootstrap/js/bootstrap.min.js">
	</script>
	<!-- Select2 -->
	<script src="../../plugins/select2/select2.full.min.js">
	</script>
	<!-- DataTables -->
	<script src="../../plugins/datatables/jquery.dataTables.min.js">
	</script>
	<script src="../../plugins/datatables/dataTables.bootstrap.min.js">
	</script>
	<!-- SlimScroll -->
	<script src="../../plugins/slimScroll/jquery.slimscroll.min.js">
	</script>
	<!-- bootstrap datepicker -->
	<script src="../../plugins/datepicker/bootstrap-datepicker.js">
	</script>
	<!-- date-range-picker -->
<!--
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="../../plugins/daterangepicker/daterangepicker.js"></script>
-->
	<!--Switch-->
	<script src="../../plugins/bootstrap-switch.js">
	</script>
	<!--
	<script src="../../assets/js/jquery-ui.min.js"></script>-->
	<!-- FastClick -->
	<script src="../../plugins/fastclick/fastclick.js">
	</script>
	<!-- AdminLTE App -->
	<script src="../../dist/js/app.min.js">
	</script>

	<!--
	<script src="../../plugins/bootstrap-toggle.min.js"></script>
	<script src="../../plugins/highlight.min.js"></script>-->
	<!-- page script -->
	<script>
		$.ajaxSetup({ cache: false });
		var loly,nami ;
		//$('.probeProbe').bootstrapSwitch();
		// var fc=document.querySelectorAll('.probeProbe');
		// initialising the switches accord. to the database values
		$(".probeProbe").each(function(indexi,element)
			{
				nami = $(this).attr('data-count');
				console.log(indexi);
				window.setTimeout(ajaxyi(nami,loly),90);
			});
		function ajaxyi(namid,loly)
		{
			$.get("processattend.php?init="+namid+"&dateinit=<?php echo $_SESSION['dateofattend']; ?>" ,function(data)
				{
					loly=(data==1)?true:false;
					console.log(namid);
					$("input[data-count='"+namid+"']").bootstrapSwitch('state',loly );
					console.log(loly);
				});
		}
	/// initialisation ends
		$(function ()
			{
				
    //Date range picker
//    $('#reservation').daterangepicker();
    //Date range picker with time picker
//    $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YY h:mm A'});
    //Date range as a button
    /*$('#daterange-btn').daterangepicker(
        {
          ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
          },
          startDate: moment().subtract(29, 'days'),
          endDate: moment()
        },
        function (start, end) {
          $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }
    );*/
    
				$('#datepicker').datepicker(
					{
						autoclose: true,
						format: 'dd/mm/yy'
					});

				$("#example1").DataTable();
				$(".select2").select2();
				$('#example2').DataTable(
					{
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
		var count=0;
		var stat=false;  // true for present
		$('.probeProbe').on('switchChange.bootstrapSwitch', function(event, state)
			{
				console.log(this); // DOM element
				console.log(event); // jQuery event
				console.log(state); // true | false
				var staty=(state)?"present":"absent";
				$.get("processattend.php?id="+$(this).attr('data-count')+"&attend="+staty+"&dateselect=<?php echo $_SESSION['dateofattend']; ?>" ,function()
					{
					});

			});
		/*function slidercount(idy,name,eve){
		var state=($('input[data-count="'+idy+'"]').bootstrapSwitch('state'))? "present":"absent";
		var confy=confirm("Confrim "+state+" for "+name+"..?");
		if(confy)
		$.get("processattend.php?id="+idy+"&attend="+state ,function(){
		});
		else $('input[data-count="'+idy+'"]').bootstrapSwitch('toggleState');
		}*/
	</script>
</body>
</html>
<?php /* DNS --103.57.80.19 */?>