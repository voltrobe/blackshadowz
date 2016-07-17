<?php
date_default_timezone_set('Asia/kolkata');
error_reporting(E_ALL & ~E_DEPRECATED);
$con=mysql_connect('mysql.hostinger.in','u346280470_testu','tavor007');
mysql_select_db('u346280470_test');
// For Inserting data if CODE is not duplicate for a day
 if(isset($_GET['q'])){
	$code=$_GET['q'];
	$format=$_GET['format'];
	$type=$_GET['type'];
$var=mysql_query("select date from qrcode where qrcode='$code'");
if(mysql_num_rows($var)){
$qry=mysql_fetch_row($var);
 if(strcmp(date('j m',$qry[0]),date('j m',time()))==0)
 goto end; }
else{
aim:mysql_query("insert into qrcode values('$code','$format','$type',".time().")"); }
end:
} //Endisset
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
$query=mysql_query('select * from qrcode order by date desc');
$num=mysql_num_rows($query);

if($num>0){
echo "<span id='code'><p align='center'>------------ ATTENDANCE -------------</p><hr/><br/>";
echo "<table ><th>Encoded Data</th><th>Type</th>";
echo "<th>Format</th><th>Date/Time</th>";
  while($row=mysql_fetch_row($query))
echo "<tr><td>".$row[0]."</td><td>".$row[1]."</td><td>".$row[2]."</td><td>".date('l jS \of F Y h:i:s A',$row[3])."</td></tr>";
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