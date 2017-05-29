<?php
include 'config.php';
if($debugmode = 0) {
    error_reporting(0);
}
$con = mysqli_connect($ip, $user, $password, $database);
if(!$con) {
    die("Connection Failed! It is down or under maintenance!");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $servername." KitBattle Stats";?></title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Quantico" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/theme/<?php echo strtolower($style); ?>.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/hover-min.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>
<body>
<!-- Include Navbar -->
<?php include 'navbar.php';?>

<div class="container players">
  <div class="well">
    <h1>{NAME} Stats</h1>
    <!-- COMING SOON! PLEASE DO NOT PUT THIS ON YOUR SERVER YET -->
  </div>
</div>

</body>
</html>
