<?php


header("Content-Type:application/json");

if(!empty($_GET['query']))
{
	
	$user_input = urlencode($_GET['query']);

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        // The request is using the POST method
        header("HTTP/1.1 200 OK");
    
    }

	


	$query = "select?defType=edismax&indent=true&q.op=OR&q=".$user_input ."&qf=irl_name%5E1%20op_description%5E1%20op_name%5E1%20pgn_moves%5E1&rows=20&wt=json'";
    $command = "curl 'http://localhost:8983/solr/chess_system/".$query;
	
	
	
	$solr_search=shell_exec($command);

	response(200,$solr_search);	
}
else
{
	response(400,"Empty Query","Empty Query");
}

function response($status,$data)
{
	header("HTTP/1.1 ".$status);
	
	if($data == NULL){
		echo "Error 503 Service Unavailable";
		return;
	}

	$response['status']=$status;
	$response['data']=$data;

	
	
	echo $response['data'];
}
