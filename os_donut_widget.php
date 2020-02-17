<div class="col-md-4">

	<div class="panel panel-default" id="os-donut-widget">

		<div class="panel-heading">

			<h3 class="panel-title"><i class="fa fa-apple"></i>
			    <span data-i18n="machine.os.title"></span>
			    <list-link data-url="/show/listing/reportdata/clients"></list-link>
			</h3>

		</div>
		
		<div id="os-panel" class="panel-body text-center">

		<svg id="os-plot" style="width:100%; height: 300px"></svg>

		</div>

	</div><!-- /panel -->

</div><!-- /col -->

<script>

$(document).on('appUpdate', function() {

	var url = appUrl + '/module/machine/os'
	var chart;

				
	d3.json(url, function(err, data){

	var height = 300;
	var width = 350;	

	// Use custom colors instead of what seems like d3.scale.category20();	
	var myColors = ["#2ca02c", "#1f77b4", "#ff7f0e", "#d62728", "#9467bd", "#8c564b", "#e377c2", "#7f7f7f", "#bcbd22", "#17becf"];
    d3.scale.myColors = function() {
        return d3.scale.ordinal().range(myColors);
    };

	nv.addGraph(function() {
		var chart = nv.models.pieChart() 
			.x(function(d) { return mr.integerToVersion(d.label) })
			.y(function(d) { return d.count })
			.showLabels(false).color(d3.scale.myColors().range());

			chart.title("" + d3.sum(data, function(d){
			return d.count;
	}));

	chart.pie.donut(true);
	
	var total = d3.sum(data, function(d){
			return d.count;
	});
	// remove decimals in tooltips with valueFormatter override
	chart.tooltip.valueFormatter(function(d){
    return (d);
	}); 
	// BEGIN valueFormatter to removes Decimals in Tooltips
	chart.tooltip.valueFormatter(function(d){
    return (d);
	// END valueFormatter to removes Decimals in Tooltips
	// BEGIN valueFormatter to rshow Percentages in Tooltips
	// chart.tooltip.valueFormatter(function(d){
    // return (d * 100/total).toFixed() + '%';
	// END valueFormatter to rshow Percentages in Tooltips
	}); 

	d3.select("#os-plot")
		.datum(data)
		.transition().duration(1200)
		.style('height', height)
		.call(chart);
	// Adjust title (count) depending on active slices
		chart.dispatch.on('stateChange.legend', function (newState) {
		var disabled = newState.disabled;
		chart.title("" + d3.sum(data, function(d, i){
			return d.count * !disabled[i];
		}));
	});

	return chart;

		});

	});

});
</script>
