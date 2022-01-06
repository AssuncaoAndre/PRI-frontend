<?php
    include("head.php");
    include("navbar.php");

    include("database/connection.php");
    include("database/database_queries.php");

    $players = getRandomPlayers();

?>

<div id="page_content" class="container" style="margin-top: 2em;">
        <h1>Players Page</h1>
        
        <ul class="list-group">

        <?php foreach($players as $player) { ?>
            
        <li class="list-group-item">

        <div class="container">
            
            GM <?=$player['irl_name'] ?>
            <a href="./player.php?player_id=<?=$player['player_id']?>">Go to his page</a>
            
            <img src="person-placeholder.jpg" alt="placeholder" width=20 height=20>
            
            <a href="https://lichess.org/@/<?= $player['online_name'] ?>">Lichess Profile</a>
           
            
            
            

        </div>
    </li>   

     <?php } ?>

        </ul>
</div>