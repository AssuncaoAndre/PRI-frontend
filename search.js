search_bar=document.querySelector("#search")
const searchRes = document.querySelector('#search-results div')
search_bar.addEventListener("keyup", (e)=>
{
    const searchString = e.target.value
    console.log(searchString)
    if(searchString!="")
        {
            var query='{ query:"op_name:';
            query =query+searchString+'"}' ;
            console.log(query)
            var url = "http://localhost:8000/query.php?query="+query;
            var xhr = new XMLHttpRequest();
            xhr.open("GET", url, true);

            //Send the proper header information along with the request
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

            xhr.send();
            xhr.onload= function()
            {  
                openings=JSON.parse(JSON.parse(xhr.responseText).data).response.docs
                openings.forEach(function(item, index, array) {
                    console.log(item.op_name)
                    searchRes.appendChild(buildSearchDiv(item))
                  })
                  if(openings.lenght==0){
                    searchString.innerHTML = `Your search ${search_parameter} did not find any animal`
                  }
            }
            
        }
})

function buildSearchDiv(opening) {
    console.log("here")
    const div = document.createElement('div')
    div.className = 'search-result'
  
    div.innerHTML = `
          <div class="search-description">
            <header>
              <h4>${opening.op_name}</h4>
            </header>
            <main>
              <span>${
                opening.op_description
              } </span>
            </main>
          </div>
    `
  
    div.onclick = () => (window.location.href = `./opening.php?id=${opening.id}`)
    console.log(div)
    return div
  }