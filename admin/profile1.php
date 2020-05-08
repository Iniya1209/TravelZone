
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
$res1=$row["Fname"];
$res2=$row["Lname"];
$res8=$row["DOB"];
$res3=$row["Age"];
$res4=$row["Gender"];
$res5=$row["PhNo"];
$res6=$row["Mail"];
$res7=$row["Balance"];
}
}
mysqli_close($conn);
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
  border: 6px solid #6A86D2;
  border-radius: 5px;
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
  <h2>PROFILE</h2>  <br>     
  <table class="table table-borderless">
    <tbody>
      <tr>
        <td style="width: 40%">First Name:</td>
        <td><?php echo $res1;?></td>
      </tr>
      <tr>
        <td>Last Name:</td>
        <td><?php echo $res2;?></td>
      </tr>
      <tr>
        <td>Date of Birth:</td>
        <td><?php echo $res8;?></td>
      </tr>
      <tr>
        <td>Age:</td>
        <td><?php echo $res3;?></td>
      </tr>
      <tr>
        <td>Gender:</td>
        <td><?php echo $res4;?></td>
      </tr>
      <tr>
        <td>Mobile:</td>
        <td><?php echo $res5;?></td>
      </tr>
      <tr>
        <td>Mail:</td>
        <td><?php echo $res6;?></td>
      </tr>
      <tr>
        <td>Balance:</td>
        <td><?php echo $res7;?></td>
      </tr>
    </tbody>
  </table>
</div>
</div>
<br><br>

<br><hr class="bold">
</body>
</html>