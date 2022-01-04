<?php
header("Content-Type:application/json");



if(!empty($_GET['query']))
{
	$query=$_GET['query'];
	
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        // The request is using the POST method
        header("HTTP/1.1 200 OK");
    
    }
    
    //TODO change query depending on result $_GET["search"]
    $command="curl http://localhost:8983/solr/core1/query -d '".$query."'";
    $solr_search=shell_exec($command);

	response(200,$solr_search);	
}
else
{
	response(400,"Invalid Request",NULL);
}

function response($status,$data)
{
	header("HTTP/1.1 ".$status);
	
	$response['status']=$status;
	$response['data']=$data;
	
	$json_response = json_encode($response);
	echo $json_response;
}