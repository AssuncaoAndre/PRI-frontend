<?php

    include("head.php");
    include("navbar.php");
    include("database/connection.php");
    include("database/database_queries.php");

    $player_id = $_GET['player_id'];

?>

<?php

$playerArray = getPlayerByID($player_id);
?>
<div class="container" style="margin-top: 2em;">
    <h1><?= $playerArray["irl_name"] ?></h1> 
    <a href="https://lichess.org/@/<?=$playerArray['online_name']?>" >Lichess Profile</a>
    <p id="description"><?= $playerArray["bio"] ?></p>
</div>

