
$(function(e) {
	
	/* ---hightchart7----*/
	var chart = Highcharts.chart('highchart7', {
		title: {
			text: ''
		},
		subtitle: {
			text: 'Plain'
		},
		exporting: {
			enabled: false
		},
		credits: {
			enabled: false
		},
		xAxis: {
			categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
		},
		colors: ['#6e00ff ', '#ff6e00', '#ecb403', '#24CBE5', '#64E572', '#FF9655', '#f1c40f', '#6AF9C4'],
		series: [{
			type: 'column',
			colorByPoint: true,
			data: [29.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4],
			showInLegend: false
		}]
	});
	$('#plain').click(function() {
		chart.update({
			chart: {
				inverted: false,
				polar: false
			},
			subtitle: {
				text: 'Plain'
			}
		});
	});
	$('#inverted').click(function() {
		chart.update({
			chart: {
				inverted: true,
				polar: false
			},
			subtitle: {
				text: 'Inverted'
			}
		});
	});
	$('#polar').click(function() {
		chart.update({
			chart: {
				inverted: false,
				polar: true
			},
			subtitle: {
				text: 'Polar'
			}
		});
	});
});