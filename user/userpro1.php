<!DOCTYPE html>
<html lang="en">
<head>
  <title>TravelZone</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
<div class="jumbotron text-center">
  <h1 class="display-3"> Thank You!</h1>
  <h3>We are glad to render you our service.</h3>
  <p class="lead"><strong>Please Download the Ticket for further Authentication.</strong> For further instructions check out our contact page. 
  </p>
  <hr>
  <p class="lead">
    <a class="btn btn-primary btn-sm" href="index.php" role="button">Download the Ticket</a>&nbsp&nbsp&nbsp&nbsp<a class="btn btn-primary btn-sm" href="userpro.php" role="button">Back to Home Page</a>
  </p>
</div>
</body>
</html><?php
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
$bal=$_SESSION["price"];
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
$upbal=$res2-$bal;
$sql="UPDATE register SET Balance='$upbal' WHERE Mail='$res1'";
mysqli_close($conn);
?>
