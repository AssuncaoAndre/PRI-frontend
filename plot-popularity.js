var div=document.querySelector('#plot-popularity');


var popularity1 = div.getAttribute("pop1");
var popularity2 = div.getAttribute("pop2");
var popularity3 = div.getAttribute("pop3");

var data = [
    {
      x: ['<1200', '1200-1800', '>1800'],
      y: [popularity1, popularity2, popularity3],
      type: 'bar'
    }
  ];
  layout={
      title:"popularity"
  }
  Plotly.newPlot('plot-popularity', data, layout);