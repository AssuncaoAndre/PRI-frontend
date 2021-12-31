
var div=document.querySelector('#plot-rates');
var white_games=div.getAttribute("white");
var draw_games=div.getAttribute("draw");
var black_games=div.getAttribute("black");
var games=div.getAttribute("games");

var white_win = {
    x: ['1000'],
    y: [(white_games/games)*100],
    name: 'White win rate',
    marker: {color: 'rgb(220,220,220)'},
    type: 'bar'
  };
  
  var draw = {
    x: ['1000'],
    y: [(draw_games/games)*100],
    name: 'Draw rate',
    marker: {color: 'rgb(150,150,150)'},
    type: 'bar'
  };

  var black_win = {
    x: ['1000'],
    y: [(black_games/games)*100],
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