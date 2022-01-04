<?php

    include("head.php"); 
    include("navbar.php");
    include("database/connection.php");
    include("database/database_queries.php");

    $opening_id = $_GET['opening_id'];

?>

<?php

$openingArray = getOpeningByID($opening_id);

$name = $openingArray["op_name"];
$games1=getOpeningGamesByElo($name,0,1200);
$games1 = $games1==0 ? 1 : $games1;

$games2 = getOpeningGamesByElo($name,1200,1800);
$games2 = $games2==0 ? 1 : $games2;

$games3 = getOpeningGamesByElo($name,1800,2600);
$games3 = $games3==0 ? 1 : $games3;

$white1 = getWhiteWinsByElo($name,0,1200) / $games1;
$white2 = getWhiteWinsByElo($name,1200,1800) / $games2;
$white3 = getWhiteWinsByElo($name,1800,2600) / $games3;

$black1 = getBlackWinsByElo($name,0,1200) / $games1;
$black2 = getBlackWinsByElo($name,1200,1800) / $games2;
$black3 = getBlackWinsByElo($name,1800,2600) / $games3;

$draw1 = getDrawsByElo($name,0,1200) / $games1;
$draw2 = getDrawsByElo($name,1200,1800) / $games2;
$draw3 = getDrawsByElo($name,1800,2600) / $games3;

?>

<div class="container" style="margin-top: 2em;">
    <h1><?php echo $openingArray["op_name"] ?></h1>

    <p id="description"><?php echo $openingArray["op_description"] ?></p>
    <p id="moves"><?php $openingArray["pgn_moves"] ?></p>

    <h2>Plots</h2>
    <div id="plot-rates" white1=<?=$white1?> white2=<?=$white2?> white3=<?=$white3?> draw1=<?=$draw1?> draw2=<?=$draw2?> draw3=<?=$draw3?> black1=<?=$black1?> black2=<?=$black2?> black3=<?=$black3?>></div>
    <div id="plot-popularity" pop1=<?=$games1?> pop2=<?=$games2?> pop3=<?=$games3?> > </div>

</div>

<script src="plot-rates.js"></script>
<script src="plot-popularity.js"></script>
</body>

