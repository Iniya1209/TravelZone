<?php
$databaseHost='localhost';
$databaseName='train';
$databaseUsername='root';
$databasePassword='';
$conn=mysqli_connect($databaseHost,$databaseUsername,$databasePassword,$databaseName);
if(!$conn)
die("Connection error".mysqli_connect_error());
echo "Connected Properly.....";
$Fname=$_POST["n"];
$Lname=$_POST["ln"];
$Mail=$_POST["mail"];
$Password=$_POST["pass"];
$Age=$_POST["age"];
$Gender=$_POST["sex"];
$DOB=$_POST["dob"];
$Mobile=$_POST["mob"];
$Ans=$_POST["ans"];
$Acc=$_POST["acc"];
$Cvv=$_POST["cvv"];
$Expiry=$_POST["da"];
$Balance=$_POST["bal"];
$sql="insert into register values('$Fname','$Lname','$Mail','$Password','$Age','$DOB','$Gender','$Mobile','$Balance','$Ans')";
if(!mysqli_query($conn,$sql))
echo "Insertion Failure...";
$sql="insert into payment values('$Acc','$Cvv','$Expiry','$Mail')";
if(mysqli_query($conn,$sql)){
	echo "Congratulations!! You have registered successfully..!!!";
	header('location:home.html');
}
else
echo "Insertion Failure...".mysqli_error($conn);
mysqli_close($conn);
?>

