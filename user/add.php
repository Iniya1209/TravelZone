<?php
session_start();
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
$s="select * from register where Mail = '$UserId' && Password = '$Password'";
$result=mysqli_query($conn , $s);
$num = mysqli_num_rows($result);
if($num==1){
while($row = $result-> fetch_assoc())
{  
$res1=$row["Mail"];
        $res2=$row["Password"];
        $res3=$row["Fname"];
        $res4=$row["Lname"];
        $res5=$row["Age"];
        $res6=$row["Gender"];
        $res7=$row["PhNo"];
    }
if($res1==$UserId && $res2==$Password)
{

$_SESSION['email'] = $res1;
$_SESSION['first'] = $res3;
$_SESSION['last'] = $res4;
$_SESSION['age'] = $res5;
$_SESSION['gender'] = $res6;
$_SESSION['mob'] = $res7;
header('location:userpro.php');
}
}
else
{
echo "Invalid Credintials";
}

?>
