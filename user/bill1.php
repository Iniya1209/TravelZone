<?php
if (session_status() == PHP_SESSION_NONE  || session_id() == '') {
        session_start();
    }
date_default_timezone_set('Asia/Kolkata');
$databaseHost='localhost';
$databaseName='train';
$databaseUsername='root';
$databasePassword='';
$conn=mysqli_connect($databaseHost,$databaseUsername,$databasePassword,$databaseName);
$start=$_POST["src"];
$dest=$_POST["dest"];
$num4=$_POST["number"];
$date = date('Y-m-d g:i a');
if(isset($_SESSION["email"])) {
    $mail=$_SESSION['email'];
    $_SESSION["da"]=$date;
    $_SESSION["s"]=$start;
    $_SESSION["d"]=$dest;
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
        $s2=$row["Age"];
        $s3=$row["PhNo"];
}
}
$res4 = $res3 * $num4;
if($res1==$start && $res2==$dest)
{

  $_SESSION['price'] = $res4;
  
}
else
{
echo "Invalid Credintials";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>TravelZone</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <style>
.mySlides {display:none;}
hr.bold {
  border: 6px solid #008CBA;
  border-radius: 5px;
}
.button {
  background-color: #008CBA;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
}
}
</style>
<script>
var myIndex = 0;
carousel();

function carousel() {
  var i;
  var x = document.getElementsByClassName("mySlides");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  myIndex++;
  if (myIndex > x.length) {myIndex = 1}    
  x[myIndex-1].style.display = "block";  
  setTimeout(carousel, 2000); 
}
function startTime() {
  var today = new Date();
  var h = today.getHours();
  var m = today.getMinutes();
  var s = today.getSeconds();
  var mo = today.getUTCMonth();
  var d=today.getDate();
  var yr=today.getFullYear();
  m = checkTime(m);
  s = checkTime(s);
  document.getElementById('txt').innerHTML =
 "  "+"Date:" + d + "-" + mo + "-" + yr + " " +"  "+"Time:" + h + ":" + m + ":" + s + "  ";
  var t = setTimeout(startTime, 500);
}
function checkTime(i) {
  if (i < 10) {i = "0" + i};  
  return i;
}
</script>
</head>
<body onload="startTime()">

<nav class="navbar navbar-info">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand">TravelZone</a>
    </div>
    <ul class="nav navbar-nav">
   
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Ticket <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="userpro.php">Book Ticket</a></li>
          <li><a href="balance.html">Add Balance</a></li>
        </ul>
      </li>
      <li><a href="contact.html">Contact Us</a></li>
      <li><div id="txt"></div></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="profile1.php"><span class="glyphicon glyphicon-user"></span></a></li>
      <li><a href="home.html"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
    </ul>
  </div>
</nav>
<hr class="bold">
<div class="container">
  <div class="col-xs-6">
  <h2>TICKET</h2>  <br>     
  <table class="table table-borderless">
    <tbody>
      <tr>
        <td style="width: 40%">Name:</td>
        <td><?php echo $s1;?></td>
      </tr>
      <tr>
        <td style="width: 40%">Age:</td>
        <td><?php echo $s2;?></td>
      </tr>
      <tr>
        <td>Starting Point:</td>
        <td><?php echo $res1." "."Railway Station";?></td>
      </tr>
      <tr>
        <td>Destination:</td>
        <td><?php echo $res2." "."Railway Station";?></td>
      </tr>
      <tr>
        <td>Time:</td>
        <td><?php echo $date;?></td>
      </tr>
      <tr>
        <td>Mobile Number:</td>
        <td><?php echo $s3;?></td>
      </tr>
      <tr>
        <td>Cost:</td>
        <td><?php echo $res4;?></td>
      </tr>
    </tbody>
  </table>
  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a href="userpro1.php" class="button">Confirm Booking</a>
</div>
</div>
<br><br>
<br><hr class="bold">
</body>
</html>