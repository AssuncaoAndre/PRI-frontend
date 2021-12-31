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

    function getOpeningGames($name){

        global $db;
        
        $query = "SELECT count(*) AS 'ntimes' FROM games WHERE opening LIKE '%$name%'";

        $stmt = $db->prepare($query);
        $stmt->execute();

        return $stmt->fetch()['ntimes'];

    }

    function getWhiteWins($name){

        global $db;
        
        $query = "SELECT count(*) AS 'ntimes' FROM games WHERE opening LIKE '%$name%' AND result=0";

        $stmt = $db->prepare($query);
        $stmt->execute();

        return $stmt->fetch()['ntimes'];

    }

    function getDraws($name){

        global $db;
        
        $query = "SELECT count(*) AS 'ntimes' FROM games WHERE opening LIKE '%$name%' AND result=1";

        $stmt = $db->prepare($query);
        $stmt->execute();

        return $stmt->fetch()['ntimes'];

    }

    
    function getBlackWins($name){

        global $db;
        
        $query = "SELECT count(*) AS 'ntimes' FROM games WHERE opening LIKE '%$name%' AND result=2";

        $stmt = $db->prepare($query);
        $stmt->execute();

        return $stmt->fetch()['ntimes'];

    }


    


?>