<?php
include 'connect.php';
$id=$_POST['id'];
$name=$_POST['name'];
$batch=$_POST['batch'];
$attend=$_POST['attend'];
$date=date("d/m/Y H:i:s");
echo $id,$name,$batch,$date;
$q=mysql_query("insert into attend_info(id,name,date,batch,attend) values ('$id','$name','$date','$batch','$attend')");
/*echo "insert into patient_info(adharid,paientname,address,phonenumber,emailid) values ('$adharid','$name','$address','$phoneno','$emailid')";*/
if($q>0)
{
 ?> 
 <script>
 alert(" Attendance added sucessfully");
 window.location.href="attendance.php";
 </script>
 
    <?php
}
else
{
    ?>
  <script>
 alert(" unable to insert Record");
 window.location.href="attendance.php";
 </script>
 
    <?php
}
?>
