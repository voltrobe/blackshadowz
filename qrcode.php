<?php
date_default_timezone_set('Asia/kolkata');
error_reporting(E_ALL & ~E_DEPRECATED);
$con=mysql_connect('localhost','blackksh_shadowu','tavor007');
mysql_select_db('blackksh_shadow',$con);
// For Inserting data if CODE is not duplicate for a day
 if(isset($_GET['code'])){
	$code=split('-',trim($_GET['code']," "));
	$idy=$code[0];
	$datey=$code[1];
$var=mysql_query("select * from attendance where id=".$idy." and attenddate='".$datey."' ");
//fetching student details
$dataquery=mysql_query("select * from student_info where id=".$idy);
$datafetch=mysql_fetch_array($dataquery);
if(mysql_num_rows($var)){ //update into DB if already exist
 //if(strcmp(date('j m',$qry[0]),date('j m',time()))==0)
	 mysql_query("update attendance set attendance='present' where id=".$idy." and attenddate='".$datey."' ");
 goto end;}
else{ //Insert into DB if New entry
aim:mysql_query("insert into attendance values(".$idy.",'".$datafetch['name']."','".$datafetch['batch']."','present' ,'".$datey."')");
}
end: } //Endisset
?>
<style>
table {border-collapse: collapse;width: 100%;}
th, td {text-align: left; padding: 8px;}
tr:nth-child(even){background-color: #f2f2f2}
th {background-color: #4CAF50;color: white;}
b {color:#0dad88;}
em {color:#4CAF50;}
i {color:orange;}
</style>
<?php
// For Outputing The Data
$query=mysql_query('select * from attendance order by attenddate desc');
$num=mysql_num_rows($query);

if($num>0){
echo "<span id='code'><p align='center'>------------ ATTENDANCE -------------</p><hr/><br/>";
echo "<table ><th>Student Name</th><th>Type</th>";
echo "<th>Batch</th><th>Status</th><th>Date/Time</th>";
  while($row=mysql_fetch_array($query))
echo "<tr><td>".$row['studname']."</td><td>".$row['studbatch']." Batch</td><td>".$row['attendance']."</td><td>".$row['attenddate']."</td></tr>";
echo "</table>";}
echo "<br/><br/><p align='center'>Powered By <em>&copy;</em> Ve<b>bCr</b>umbs &trade; 20<i>16</i></p></span>";
echo"<script>
function loadDoc() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
   if (xhttp.readyState == 4 && xhttp.status == 200) {
    document.getElementById('code').innerHTML = xhttp.responseText; }};
  xhttp.open('GET', 'qrcode.php', true);
  xhttp.send();}
setInterval('loadDoc()', 1500);
</script>";
?>