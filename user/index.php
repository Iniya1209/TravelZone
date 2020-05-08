<?php
require_once 'dompdf/autoload.inc.php'; 
use Dompdf\Dompdf; 
if (session_status() == PHP_SESSION_NONE  || session_id() == '') {
        session_start();
    }
$databaseHost='localhost';
$databaseName='train';
$databaseUsername='root';
$databasePassword='';
$conn=mysqli_connect($databaseHost,$databaseUsername,$databasePassword,$databaseName);
if(isset($_SESSION["email"])) {
    $mail=$_SESSION['email'];
    $date=$_SESSION["da"];
    $start=$_SESSION["s"];
    $dest=$_SESSION["d"];

    
}
$s="select * from trainn where TrainStart = '$start' && TrainDest = '$dest'";
$q="select * from register where Mail = '$mail'";
$result=mysqli_query($conn , $s);
$result1=mysqli_query($conn , $q);
$num = mysqli_num_rows($result);
$num1 = mysqli_num_rows($result1);
if($num==1){
while($row = $result-> fetch_assoc())
{  
    $res1=$row["TrainStart"];
        $res2=$row["TrainDest"];
        $res3=$row["Price"];
}
}
if($num1==1){
while($row = $result1-> fetch_assoc())
{  
    $s1=$row["Fname"];
    $f=$row["Lname"];
        $s2=$row["Age"];
        $s3=$row["PhNo"];
}
}
if($res1==$start && $res2==$dest)
{

   $ress=$_SESSION['price'];
  
}
else
{
echo "Invalid Credintials";
}
?>
<?php
$dompdf = new Dompdf();

$dompdf->loadHtml('<center><h1>TRAVELZONE e-Ticket</h1><img src="rlogo.png" height="50" width="50"><br><br><h2>TICKET</h2><table  align=center width=400>
<tr><td>Name : </td><td>'.$s1.' '.$f.'</td></tr>
<tr><td>Age : </td><td>'.$s2.'</td></tr>
<tr><td>Starting Point : </td><td>'.$res1.' Railway Station'.'</td></tr>
<tr><td>Destination : </td><td>'.$res2.' Railway Station'.'</td></tr>
<tr><td>Time : </td><td>'.$date.'</td></tr>
<tr><td>Mobile Number : </td><td>'.$s3.'</td></tr>
<tr><td>Price : </td><td>'.$ress.'</td></tr></center>
</table>'); 
 $dompdf->setPaper('A4', 'landscape'); 
 $dompdf->render(); 
 $dompdf->stream();
$dompdf->stream("codexworld", array("Attachment" => 0));
?>