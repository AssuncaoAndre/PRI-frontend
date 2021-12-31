
const request = new XMLHttpRequest();
let url="http://localhost:8983/solr/#/core1/query?q=*:*&q.op=OR&indent=true"
request.open("POST", "http://localhost:8983/", true);

request.setRequestHeader("Accept", "application/json");
request.setRequestHeader('Content-Type', 'application/json');
request.setRequestHeader('Access-Control-Allow-Origin', '*');
var data = {
    "query": "*"
  };
  
request.send(data);

request.onload = () => {
    const data = request.response;
    console.log(data);
};