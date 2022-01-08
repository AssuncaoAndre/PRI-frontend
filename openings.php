<?php
    include("head.php");
    include("navbar.php");

    include("database/connection.php");
    include("database/database_queries.php");

    $openings = getRandomOpenings();

?>

<div id="page_content" class="container" style="margin-top: 2em;">
    <h1>Openings</h1>

    <ul class="list-group">

<?php foreach($openings as $opening) { ?>
    
<li class="list-group-item">

<div class="container">
    
    <h4><?=$opening['op_name'] ?> <img src="chess-placeholder.jpg" alt="placeholder" width=20 height=20> </h4>

    <p> <?=$opening['pgn_moves']?> </p>

    <a href="./opening.php?opening_id=<?=$opening['opening_id']?>">See more about this opening</a>
    
    
    
    
   
    
    
    

</div>
</li>   

<?php } ?>

</ul>
        
</div>