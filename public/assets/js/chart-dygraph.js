// Darken a color
      function darkenColor(colorStr) {
        // Defined in dygraph-utils.js
        var color = Dygraph.toRGB_(colorStr);
        color.r = Math.floor((115 + color.r) / 2);
        color.g = Math.floor((108 + color.g) / 2);
        color.b = Math.floor((199 + color.b) / 2);
        return 'rgb(' + color.r + ',' + color.g + ',' + color.b + ')';
      }
	  colors:
            ["#7FFF00", "#00FFFF", "#008080", "#00BFFF", "#FFD700", "#FF69B42", "#20B2AA",
             "#FF0000", "#FFFF00", "#FF1493", "#000080", "#00FF00", "#6B8E23", "#00FA9A",
             "#B0C4DE", "#F0E68C", "#DAA520"];

      function barChartPlotter(e) {
        var ctx = e.drawingContext;
        var points = e.points;
        var y_bottom = e.dygraph.toDomYCoord(0);

        ctx.fillStyle = darkenColor(e.color);

        // Find the minimum separation between x-values.
        // This determines the bar width.
        var min_sep = Infinity;
        for (var i = 1; i < points.length; i++) {
          var sep = points[i].canvasx - points[i - 1].canvasx;
          if (sep < min_sep) min_sep = sep;
        }
        var bar_width = Math.floor(2.0 / 3 * min_sep);

        // Do the actual plotting.
        for (var i = 0; i < points.length; i++) {
          var p = points[i];
          var center_x = p.canvasx;

          ctx.fillRect(center_x - bar_width / 2, p.canvasy,
              bar_width, y_bottom - p.canvasy);

          ctx.strokeRect(center_x - bar_width / 2, p.canvasy,
              bar_width, y_bottom - p.canvasy);
        }
      }
	


    // Bar and Line chart
    var short_data = data_nolabel();
    short_data = short_data.split('\n').slice(0, 20).join('\n');

    g3 = new Dygraph(
            document.getElementById("barlinechart"),
            short_data,
            {
              labels: ['Date', 'A', 'B'],
              includeZero: true,
              series: {
                "A": {
                  strokeWidth: 2
                },
                "B": {
                  plotter: barChartPlotter
                }
              }
            });


    
   
