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

<div class="container top-player">
    <div class="row">
        <div class="col-md-9">
            <div class="well text-center">
                <h1>TOP <?php echo $topplayers." ".strtoupper($servername);?> PLAYERS</h1>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Name</th>
                        <th> </th>
                        <th>Kills</th>
                        <th>Deaths</th>
                        <th>Coins</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if(isset($_GET['sort']) || (!empty($_GET['sort']))) {
                        $sortby = $_GET['sort'];
                        if($sortby == "kills") {
                            $query = "SELECT * FROM ".$table." ORDER BY Kills DESC LIMIT ".$topplayers;
                            $result = mysqli_query($con, $query);
                            if(mysqli_num_rows($result) > 0) {
                                $num = 0;
                                while($row = mysqli_fetch_array($result)) {
                                    $name = $row['player_name'];
                                    $kills = $row['Kills'];
                                    $deaths = $row['Deaths'];
                                    $coins = $row['Coins'];
                                    $num++;?>
                                    <tr>
                                        <td><?php echo $num;?>.</td>
                                        <td><?php echo $name;?></td>
                                        <td><img src="https://minotar.net/helm/<?php echo $name."/".$playerheadsize;?>" class="img-responsive"></td>
                                        <td><?php echo $kills;?></td>
                                        <td><?php echo $deaths;?></td>
                                        <td><?php echo $coins;?></td>
                                    </tr>
                                    <?php
                                }
                            } else {?>
                                <tr>
                                    <td>NONE</td>
                                    <td>NONE</td>
                                    <td><img src="https://minotar.net/helm/HeroBrine/<?php echo $playerheadsize;?>" class="img-responsive"></td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                </tr>
                            <?php
                            }
                        }
                        else if($sortby == "deaths") {
                            $query = "SELECT * FROM ".$table." ORDER BY Deaths DESC LIMIT ".$topplayers;
                            $result = mysqli_query($con, $query);
                            if(mysqli_num_rows($result) > 0) {
                                $num = 0;
                                while($row = mysqli_fetch_array($result)) {
                                    $name = $row['player_name'];
                                    $kills = $row['Kills'];
                                    $deaths = $row['Deaths'];
                                    $coins = $row['Coins'];
                                    $num++;?>
                                    <tr>
                                        <td><?php echo $num;?>.</td>
                                        <td><?php echo $name;?></td>
                                        <td><img src="https://minotar.net/helm/<?php echo $name."/".$playerheadsize;?>" class="img-responsive"></td>
                                        <td><?php echo $kills;?></td>
                                        <td><?php echo $deaths;?></td>
                                        <td><?php echo $coins;?></td>
                                    </tr>
                                    <?php
                                }
                            } else {?>
                                <tr>
                                    <td>NONE</td>
                                    <td>NONE</td>
                                    <td><img src="https://minotar.net/helm/HeroBrine/<?php echo $playerheadsize;?>" class="img-responsive"></td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                </tr>
                            <?php
                            }
                        }
                        else if($sortby == "coins") {
                            $query = "SELECT * FROM ".$table." ORDER BY Coins DESC LIMIT ".$topplayers;
                            $result = mysqli_query($con, $query);
                            if(mysqli_num_rows($result) > 0) {
                                $num = 0;
                                while($row = mysqli_fetch_array($result)) {
                                    $name = $row['player_name'];
                                    $kills = $row['Kills'];
                                    $deaths = $row['Deaths'];
                                    $coins = $row['Coins'];
                                    $num++;?>
                                <tr>
                                    <td><?php echo $num;?>.</td>
                                    <td><?php echo $name;?></td>
                                    <td><img src="https://minotar.net/helm/<?php echo $name."/".$playerheadsize;?>" class="img-responsive"></td>
                                    <td><?php echo $kills;?></td>
                                    <td><?php echo $deaths;?></td>
                                    <td><?php echo $coins;?></td>
                                </tr>
                                    <?php
                                }
                            } else {?>
                                <tr>
                                    <td>NONE</td>
                                    <td>NONE</td>
                                    <td><img src="https://minotar.net/helm/HeroBrine/<?php echo $playerheadsize;?>" class="img-responsive"></td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                </tr>
                            <?php
                            }
                        }
                    } else {
                        $query = "SELECT * FROM ".$table." ORDER BY Kills DESC LIMIT ".$topplayers;
                            $result = mysqli_query($con, $query);
                            if(mysqli_num_rows($result) > 0) {
                                $num = 0;
                                while($row = mysqli_fetch_array($result)) {
                                    $name = $row['player_name'];
                                    $kills = $row['Kills'];
                                    $deaths = $row['Deaths'];
                                    $coins = $row['Coins'];
                                    $num++;
                                    ?>
                                    <tr>
                                        <td><?php echo $num;?>.</td>
                                        <td><?php echo $name;?></td>
                                        <td><img src="https://minotar.net/helm/<?php echo $name."/".$playerheadsize;?>" class="img-responsive"></td>
                                        <td><?php echo $kills;?></td>
                                        <td><?php echo $deaths;?></td>
                                        <td><?php echo $coins;?></td>
                                    </tr>
                                    <?php
                                }
                            } else {?>
                                <tr>
                                    <td>NONE</td>
                                    <td>NONE</td>
                                    <td><img src="https://minotar.net/helm/HeroBrine/<?php echo $playerheadsize;?>" class="img-responsive"></td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                </tr>
                            <?php
                            }
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <div class="col-md-3">
            <div class="well text-center">
                <h1>Options</h1>
            </div>
            <div class="list-group">
                <li class="list-group-item text-center"><h3>Sort By:</h3></li>
                <a href="?sort=deaths" class="list-group-item"><i class="fa fa-arrow-right" aria-hidden="true"></i> Deaths</a>
                <a href="?sort=kills" class="list-group-item"><i class="fa fa-arrow-right" aria-hidden="true"></i> Kills</a>
                <a href="?sort=coins" class="list-group-item"><i class="fa fa-arrow-right" aria-hidden="true"></i> Coins</a>
            </div>
        </div>
    </div>
</div>

</body>
</html>
