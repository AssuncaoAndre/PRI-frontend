var data = [
    {
      x: ['1000', '1500', '2000'],
      y: [2, 5, 1],
      type: 'bar'
    }
  ];
  layout={
      title:"popularity"
  }
  Plotly.newPlot('plot-popularity', data, layout);