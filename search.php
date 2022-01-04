<?php
    include("head.php");
    include("navbar.php");

    $query='{ query:"op_name:caro-kann"}';

    $results=$solr_search->response->docs;
    
    $size=sizeof($results)>10 ? 10 : sizeof($results);

    for ($i=0;$i<$size;$i++)
    {
        
    }
?>
