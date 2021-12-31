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
?>

<div class="container" style="margin-top: 2em;">
    <h1><?php echo $openingArray["op_name"] ?></h1>

    <p id="description"><?php echo $openingArray["op_description"] ?></p>
    <p id="moves"><?php $openingArray["pgn_moves"] ?></p>

    <h2>Dummy plots (not yet implemented)</h2>
    <div id="plot-rates" games=<?=getOpeningGames($name)?> white=<?=getWhiteWins($name)?> draw=<?=getDraws($name)?> black=<?=getBlackWins($name)?>></div>
    <div id="plot-popularity"></div>

</div>

<script src="request.js"></script>
<script src="plot-rates.js"></script>
<script src="plot-popularity.js"></script>
</body>

<?php

    include("common/footer.php");

?>