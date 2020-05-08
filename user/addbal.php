<?php
if (session_status() == PHP_SESSION_NONE  || session_id() == '') {
        session_start();
    }
$databaseHost='localhost';
$databaseName='train';
$databaseUsername='root';
$databasePassword='';
$conn=mysqli_connect($databaseHost,$databaseUsername,$databasePassword,$databaseName);
if(!$conn){
die("Connection error".mysqli_connect_error());
}
$bal=$_POST["ad"];
mysqli_select_db($conn,'$databaseName');

if(isset($_SESSION["email"])) {
    $mail=$_SESSION['email'];
}
$s="select * from register where Mail = '$mail'";
$result=mysqli_query($conn , $s);
$num = mysqli_num_rows($result);
if($num==1){
while($row = $result-> fetch_assoc())
{  
$res1=$row["Mail"];
$res2=$row["Balance"];
}
}
$upbal=$bal+$res2;
$sql="UPDATE register SET Balance='$upbal' WHERE Mail='$res1'";
if(mysqli_query($conn, $sql))
{
   echo "Records were updated successfully.";
   header('location:userpro.php');
}
else
{
echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}
mysqli_close($conn);
?>
