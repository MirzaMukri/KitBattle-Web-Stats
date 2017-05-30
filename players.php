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
  <?php
  if(!isset($_GET['u']) || empty($_GET['u'])) {
    ?>
    <div class="well text-center">
      <h1>Search a Players</h1>
      <form class="form-inline search-bar" action="players.php" method="get">
        <div class="input-group">
          <input type="text" name="u" autocomplete="off" class="form-control" placeholder="Search Players..">
          <span class="input-group-btn">
            <button class="btn btn-default" type="submit"><span class="fa fa-search"></span></button>
          </span>
        </div>
      </form>
    </div>
  <?php
  } else {

    $username = htmlspecialchars($_GET['u']);
    $query = "SELECT * FROM ".$table." WHERE player_name=?";
    $statement = mysqli_prepare($con, $query);

    mysqli_stmt_bind_param($statement, "s", $username);
    mysqli_stmt_execute($statement);
    $result = mysqli_stmt_get_result($statement);

    if(mysqli_num_rows($result) > 0) {
      while($row = mysqli_fetch_array($result)) {
        $p_name = $row['player_name'];
        $p_coins = $row['Coins'];
        $p_kills = $row['Kills'];
        $p_deaths = $row['Deaths'];
        $p_kitunlockers = $row['Kitunlockers'];
        $p_exp = $row['Exp'];
        $p_uuid = $row['player_uuid'];

        ?>

        <div class="panel panel-default">
          <div class="panel-heading text-center">
            <form class="form-inline search-bar" action="players.php" method="get">
    					<div class="input-group">
    						<input type="text" name="u" autocomplete="off" class="form-control" placeholder="Search Players..">
    						<span class="input-group-btn">
    							<button class="btn btn-default" type="submit"><span class="fa fa-search"></span></button>
    						</span>
    					</div>
    	      </form>
          </div>
          <div class="panel-body">
            <div class="row">
              <div class="col-md-5">
                <div class="well well-inside">
                  <img src="https://minotar.net/armor/bust/<?php echo $p_name;?>/200.png" class="img-responsive">
                </div>
              </div>
              <div class="col-md-7">
                <div class="well well-inside">
                  <h1><?php echo $p_name;?> Stats</h1>
                  <span class="info"><strong>Name:</strong></span> <?php echo $p_name;?><br>
                  <?php if($showuuid == 1) {?>
                  <span class="info"><strong>UUID:</strong></span> <?php echo $p_uuid."<br>";

                }?>
                  <span class="info">Kills:</span> <?php echo $p_kills;?><br>
                  <span class="info">Deaths:</span> <?php echo $p_deaths;?><br>
                  <span class="info">Exp:</span> <?php echo $p_exp;?><br>
                  <span class="info">Coins:</span> <?php echo $p_coins;?><br>
                  <span class="info">KitUnlockers:</span> <?php echo $p_kitunlockers;?><br>
                </div>
              </div>
            </div>
          </div>
        </div>

      <?php
      }
    } else {
      ?>
      <div class="well text-center">
        <h1>Player Not Found!</h1>
        <p>Find another players</p>
        <form class="form-inline" action="players.php" method="get">
          <div class="form-group">
            <input type="text" name="u" autocomplete="off" class="form-control" placeholder="Search Players">
            <button class="btn btn-info" type="submit"><span class="fa fa-search"></span></button>
          </div>
        </form>
      </div>
      <?php
    }
  }

  mysqli_close($con);
  ?>
</div>

</body>
</html>
