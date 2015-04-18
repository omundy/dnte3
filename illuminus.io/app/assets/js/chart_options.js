Chart.defaults.global = {
	
	animation: false,		// Boolean - Whether to animate the chart
	animationSteps: 60,		// Number - Number of animation steps
	animationEasing: "easeOutQuart",	// String - Animation easing effect
	
	showScale: true,		// Boolean - If we should show the scale at all
	scaleOverride: false,	// Boolean - If we want to override with a hard coded scale
	// ** Required if scaleOverride is true **
	scaleSteps: null,		// Number - The number of steps in a hard coded scale
	scaleStepWidth: null,	// Number - The value jump in the hard coded scale
	scaleStartValue: null,	// Number - The scale starting value
	
	scaleLineColor: "rgba(255,255,255,.5)",	// String - Colour of the scale line
	scaleLineWidth: 1,			// Number - Pixel width of the scale line
	scaleShowLabels: true,		// Boolean - Whether to show labels on the scale
	scaleLabel: "<%=value%>",	// Interpolated JS string - can access value
	scaleIntegersOnly: true,	// Boolean - Whether the scale should stick to integers, not floats even if drawing space is there
	scaleBeginAtZero: false,	// Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
	scaleFontFamily: "'Helvetica Neue', 'Helvetica', 'Arial', sans-serif",	// String - Scale label font declaration for the scale label
	scaleFontSize: 12,			// Number - Scale label font size in pixels
	scaleFontStyle: "normal",	// String - Scale label font weight style
	scaleFontColor: "#666",		// String - Scale label font colour
	
	responsive: true,			// Boolean - whether or not the chart should be responsive and resize when the browser does.
	maintainAspectRatio: true,	// Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container

	showTooltips: true,				// Boolean - Determines whether to draw tooltips on the canvas or not
	// Function - Determines whether to execute the customTooltips function instead of drawing the built in tooltips (See [Advanced - External Tooltips](#advanced-usage-custom-tooltips))
	customTooltips: false,
	tooltipEvents: ["mousemove", "touchstart", "touchmove"],	// Array - Array of string names to attach tooltip events
	tooltipFillColor: "rgba(0,0,0,0.8)",	// String - Tooltip background colour
	tooltipFontFamily: "'Helvetica Neue', 'Helvetica', 'Arial', sans-serif",	// String - Tooltip label font declaration for the scale label
	tooltipFontSize: 14,			// Number - Tooltip label font size in pixels
	tooltipFontStyle: "normal",		// String - Tooltip font weight style
	tooltipFontColor: "#fff",		// String - Tooltip label font colour
	tooltipTitleFontFamily: "'Helvetica Neue', 'Helvetica', 'Arial', sans-serif",	// String - Tooltip title font declaration for the scale label
	tooltipTitleFontSize: 14,		// Number - Tooltip title font size in pixels
	tooltipTitleFontStyle: "bold",	// String - Tooltip title font weight style
	tooltipTitleFontColor: "#fff",	// String - Tooltip title font colour
	tooltipYPadding: 6,				// Number - pixel width of padding around tooltip text
	tooltipXPadding: 6,				// Number - pixel width of padding around tooltip text
	tooltipCaretSize: 8,			// Number - Size of the caret on the tooltip
	tooltipCornerRadius: 6,			// Number - Pixel radius of the tooltip border
	tooltipXOffset: 10,				// Number - Pixel offset from point x to tooltip edge
	tooltipTemplate: "<%if (label){%><%=label%>: <%}%><%= value %>",	// String - Template string for single tooltips
	multiTooltipTemplate: "<%= value %>",	// String - Template string for multiple tooltips
	
	onAnimationProgress: function(){},	// Function - Will fire on animation progression.
	onAnimationComplete: function(){}	// Function - Will fire on animation completion.
}


var pie_chart_options = {
    segmentShowStroke : true,	// Boolean - Whether we should show a stroke on each segment
    segmentStrokeColor : "#fff",	// String - The colour of each segment stroke
    segmentStrokeWidth : .1,	// Number - The width of each segment stroke
    percentageInnerCutout : 50, // Number - The percentage of the chart that we cut out of the middle. This is 0 for Pie charts
    animationSteps : 100,	// Number - Amount of animation steps
    animationEasing : "easeOutBounce",	// String - Animation easing effect
    animateRotate : true,	// Boolean - Whether we animate the rotation of the Doughnut
    animateScale : false,  // Boolean - Whether we animate scaling the Doughnut from the centre
    //String - A legend template
    legendTemplate : "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>"

}

var radar_chart_options = {
	//Boolean - Whether to show lines for each scale point
    scaleShowLine : true,

    //Boolean - Whether we show the angle lines out of the radar
    angleShowLineOut : true,

    //Boolean - Whether to show labels on the scale
    scaleShowLabels : true,

    // Boolean - Whether the scale should begin at zero
    scaleBeginAtZero : true,

    //String - Colour of the angle line
    angleLineColor : "rgba(39,165,130,.1)",

    //Number - Pixel width of the angle line
    angleLineWidth : 1,

    
    pointLabelFontFamily : "'Arial'",	//String - Point label font declaration 
    pointLabelFontStyle : "normal",		//String - Point label font weight
    pointLabelFontSize : 13,			//Number - Point label font size in pixels
    pointLabelFontColor : "#999",		//String - Point label font colour

    //Boolean - Whether to show a dot for each point
    pointDot : true,

    //Number - Radius of each point dot in pixels
    pointDotRadius : 3,

    //Number - Pixel width of point dot stroke
    pointDotStrokeWidth : 1,

    //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
    pointHitDetectionRadius : 20,

    //Boolean - Whether to show a stroke for datasets
    datasetStroke : true,

    //Number - Pixel width of dataset stroke
    datasetStrokeWidth : 2,

    //Boolean - Whether to fill the dataset with a colour
    datasetFill : true,

    //String - A legend template
    legendTemplate : "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].strokeColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>"

}



var bar_chart_options = {
    //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
    scaleBeginAtZero : true,

    //Boolean - Whether grid lines are shown across the chart
    scaleShowGridLines : true,

    //String - Colour of the grid lines
    scaleGridLineColor : "rgba(255,255,255,.1)",

    //Number - Width of the grid lines
    scaleGridLineWidth : 1,

    //Boolean - Whether to show horizontal lines (except X axis)
    scaleShowHorizontalLines: true,

    //Boolean - Whether to show vertical lines (except Y axis)
    scaleShowVerticalLines: true,

    //Boolean - If there is a stroke on each bar
    barShowStroke : true,

    //Number - Pixel width of the bar stroke
    barStrokeWidth : 2,

    //Number - Spacing between each of the X value sets
    barValueSpacing : 5,

    //Number - Spacing between data sets within X values
    barDatasetSpacing : 1,

    //String - A legend template
    legendTemplate : "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].fillColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>"

}

