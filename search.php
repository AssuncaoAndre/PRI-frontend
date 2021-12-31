<?php
    include("head.php");
    include("navbar.php");

    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: *");
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        // The request is using the POST method
        header("HTTP/1.1 200 OK");
    
    }

    //TODO change query depending on result $_GET["search"]
    $query='{ query:"op_name:caro-kann"}';
    $command="curl http://localhost:8983/solr/core1/query -d '".$query."'";
    $solr_search=shell_exec($command);
    $solr_search=json_decode($solr_search);
    
    $result=$solr_search->response->docs[0];
    
?>
