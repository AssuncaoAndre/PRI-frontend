
var div=document.querySelector('#plot-rates');


var white1 = div.getAttribute("white1");
var white2 = div.getAttribute("white2");
var white3 = div.getAttribute("white3");

var black1 = div.getAttribute("black1");
var black2 = div.getAttribute("black2");
var black3 = div.getAttribute("black3");

var draw1 = div.getAttribute("draw1");
var draw2 = div.getAttribute("draw2");
var draw3 = div.getAttribute("draw3");

var white_win = {
    x: ['<1200','1200-1800','>1800'],
    y: [white1*100, white2*100, white3*100],
    name: 'White win rate',
    marker: {color: 'rgb(220,220,220)'},
    type: 'bar'
  };
  
  var draw = {
    x: ['<1200','1200-1800','>1800'],
    y: [draw1*100, draw2*100, draw3*100],
    name: 'Draw rate',
    marker: {color: 'rgb(150,150,150)'},
    type: 'bar'
  };

  var black_win = {
    x: ['<1200','1200-1800','>1800'],
    y: [black1*100, black2*100, black3*100],
    name: 'Black win rate',
    marker: {color: 'rgb(0,0,0)'},
    type: 'bar'
  }; 
  var data = [white_win, draw, black_win];


  var layout = {
      barmode: 'stack',
      title: 'Winning rates'
    };
  
  Plotly.newPlot('plot-rates', data, layout);