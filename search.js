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
                
                let ids=[];
                let names=[];

                

                results.forEach(function(item) {
                  ids.push(item.opening_id)
                  names.push(item.op_name); 
                })

                addSearchResults(ids,names);

                if(openings.length==0){
                   searchString.innerHTML = `Your search ${searchString} didn't extract any results`
                }
            
              }
            }
          
          }
})

function addSearchResults(ids,names) {
  
  let search_results = document.getElementById("page_content");
  
  search_results.innerHTML = "<h1> Search Results </h1>";

  search_results.innerHTML += "<ul>";

  ids.forEach((id, index) => {
    
    let item = '<li> <a href="./opening.php?opening_id=' + id + '">' + names[index] + '</a></li>';

    search_results.innerHTML += item;

  });

  search_results.innerHTML += "</ul>";

 
}

function displaySOLRerror(){

  let search_results = document.getElementById("page_content");
  search_results.innerHTML = "<h2>SOLR Service not available </h2>"

}

function itemPlayer(){



}

function itemChessOpening(){



}