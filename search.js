search_bar=document.querySelector("#search")
const searchRes = document.querySelector('#search-results div')
search_bar.addEventListener("keyup", (e)=>
{
    const searchString = e.target.value


    console.log(searchString)
    if(searchString!="")
        {
            var url = "./query.php?query="+searchString;
            var xhr = new XMLHttpRequest();
            xhr.open("GET", url, true);

            //Send the proper header information along with the request
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

            xhr.send();
            xhr.onload= function()
            {  
              if(xhr.responseText == "Error 503 Service Unavailable"){
                  displaySOLRerror();
              }else{

              

                results = JSON.parse(xhr.responseText).response.docs;
                
                addSearchResults(results,searchString);
              }
            }
          
          }
})

function addSearchResults(results,searchString) {
  

  let search_results = document.getElementById("page_content");
  search_results.innerHTML = "<h1> Search Results </h1>";
  search_results.innerHTML += '<ul class="list-group">';
  
  results.forEach(function(item) {
                  
    if("opening_id" in item){

      search_results.innerHTML += itemChessOpening(item['opening_id'],item['op_name'],item['pgn_moves']);

    }else if("player_id" in item){

      search_results.innerHTML += itemPlayer(item['player_id'],item['irl_name'],item['online_name']);

    }
    
    
  })
 

  search_results.innerHTML += "</ul>";

  if(results.length==0){
    search_results.innerHTML = `Your search ${searchString} didn't extract any results`
 }

 
}

function displaySOLRerror(){

  let search_results = document.getElementById("page_content");
  search_results.innerHTML = "<h2>SOLR Service not available </h2>"

}

function itemPlayer(){

  //TBD


}

function itemChessOpening(id,name,moves){

  let item = '<li class="list-group-item">'

  item += '<div class="container">';
  item += '<h4>'+ name + '<img src="chess-placeholder.jpg" alt="placeholder" width=20 height=20> </h4>';
  item += '<p>' + moves + '</p>';
  item += '<a href="./opening.php?opening_id='+ id + '">See more about this opening</a>';


  return item


}