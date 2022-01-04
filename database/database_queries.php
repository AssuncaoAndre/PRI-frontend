<?php 

    function getOpeningByID($id){

        global $db;

        $stmt = $db->prepare("SELECT op_name,code,pgn_moves,op_description,is_mainline FROM openings WHERE opening_id=?");
        $stmt->execute([$id]);
        return $stmt->fetch();

    }

    function getPlayerByID($id){

        global $db;

        $stmt = $db->prepare("SELECT irl_name,online_name,bio FROM players WHERE player_id=?");
        $stmt->execute([$id]);
        return $stmt->fetch();

    }

    function getOpeningGamesByElo($name,$lower, $upper){

        global $db;
        
        $query = "SELECT count(*) AS 'ntimes' FROM games WHERE opening LIKE '%$name%' AND (white_elo+black_elo) / 2 >= $lower AND (white_elo+black_elo) / 2 < $upper";

        $stmt = $db->prepare($query);
        $stmt->execute();

        return $stmt->fetch()['ntimes'];

    }

    function getWhiteWinsByElo($name,$lower,$upper){

        global $db;
        
        $query = "SELECT count(*) AS 'ntimes' FROM games WHERE opening LIKE '%$name%' AND result=0 AND (white_elo+black_elo) / 2 >= $lower AND (white_elo+black_elo) / 2 < $upper";

        $stmt = $db->prepare($query);
        $stmt->execute();

        return $stmt->fetch()['ntimes'];

    }

    function getDrawsByElo($name,$lower,$upper){

        global $db;
        
        $query = "SELECT count(*) AS 'ntimes' FROM games WHERE opening LIKE '%$name%' AND result=1 AND (white_elo+black_elo) / 2 >= $lower AND (white_elo+black_elo) / 2 < $upper";

        $stmt = $db->prepare($query);
        $stmt->execute();

        return $stmt->fetch()['ntimes'];

    }

    
    function getBlackWinsByElo($name,$lower,$upper){

        global $db;
        
        $query = "SELECT count(*) AS 'ntimes' FROM games WHERE opening LIKE '%$name%' AND result=2 AND (white_elo+black_elo) / 2 >= $lower AND (white_elo+black_elo) / 2 < $upper";

        $stmt = $db->prepare($query);
        $stmt->execute();

        return $stmt->fetch()['ntimes'];

    }


    


?>