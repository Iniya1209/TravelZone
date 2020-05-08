<?php
$databaseHost='localhost';
$databaseName='train';
$databaseUsername='root';
$databasePassword='';
$conn=mysqli_connect($databaseHost,$databaseUsername,$databasePassword,$databaseName);
if(!$conn){
die("Connection error".mysqli_connect_error());
}
mysqli_select_db($conn,'$databaseName');
$UserId=$_POST["mail"];
$Password=$_POST["pass"];
$s="select * from admin where Username = '$UserId' && Password = '$Password'";
$result=mysqli_query($conn , $s);
$num = mysqli_num_rows($result);
if($num==1){
while($row = $result-> fetch_assoc())
{  
$res1=$row["Username"];
        $res2=$row["Password"];
  
    }
if($res1==$UserId && $res2==$Password)
{

header('location:dash.php');
}
}
else
{
echo "Invalid Credintials";
}

?>
