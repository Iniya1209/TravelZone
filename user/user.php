<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">TravelZone</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active">time</a></li>
      <li class="active"><a href="#">Home</a></li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Ticket <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="#">Ticket Cancellation</a></li>
          <li><a href="#">Ticket Booking</a></li>
          <li><a href="#">Check Schedule</a></li>
        </ul>
      </li>
      <li><a href="#"></a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#"><span class="glyphicon glyphicon-user"></span></a></li>
      <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
    </ul>
  </div>
</nav>
<body>

<div class="w3-content w3-section" style="max-width:500px">
  <img class="mySlides" src="slide1.jpg" style="width:100%">
  <img class="mySlides" src="slide2.png" style="width:100%">
  <img class="mySlides" src="slide3.jpg" style="width:100%">
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
  setTimeout(carousel, 2000); // Change image every 2 seconds
}
</script>

</body>
</html>