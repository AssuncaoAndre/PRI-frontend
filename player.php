<?php

    include("head.php");
    include("navbar.php");
    include("database/connection.php");
    include("database/database_queries.php");

    $player_id = $_GET['player_id'];

?>

<?php

$playerArray = getPlayerByID($player_id);

    echo $playerArray["irl_name"] ."<br>" . $playerArray["online_name"]."<br>". $playerArray["bio"]. "<br>";
?>

