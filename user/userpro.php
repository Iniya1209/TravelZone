
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
input[type=text], select {
  width: 75%;
  padding: 12px 20px;
  margin: 12px 0;
  display: inline-block;
  border: 3px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}
</style>
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
<div class="w3-content w3-section" style="max-width:1365px"  style="max-height: 100px">
  <img class="mySlides" src="slide9.jpg" style="width:100%" style="height:100px">
  <img class="mySlides" src="slide7.png" style="width:100%" style="height:100px">
  <img class="mySlides" src="slide6.png" style="width:100%" style="height:100px">
</div>

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
<form name="f1" action="bill1.php" method="post">
<center><br><h1>Book your journey now</h1><br><br>
<select name="src" required>
  <option value="" disabled selected>Choose Your Starting Point</option>
  <option value="Central">Central</option>
  <option value="Korattur">Korattur</option>
  <option value="Avadi">Avadi</option>
  <option value="Thiruvallur">Thiruvallur</option>
  <option value="Arakkonam">Arakkonam</option>
</select><br><img src="arrows.png" height="40" width="50"><br>
<select name="dest" required>
  <option value="" disabled selected>Choose Your Destination</option>
  <option value="Arakkonam">Arakkonam</option>
  <option value="Thiruvallur">Thiruvallur</option>
  <option value="Avadi">Avadi</option>
  <option value="Korattur">Korattur</option>
  <option value="Central">Central</option>
</select>
<select name="number" required>
  <option value="" disabled selected>No. of seats</option>
  <option value="1">1</option>
  <option value="2">2</option>
  <option value="3">3</option>
  <option value="4">4</option>
  <option value="5">5</option>
</select></center><br><br>
<center><input type="submit" value="PROCEED"></center>
<br><br>
</form>
</body>
</html>