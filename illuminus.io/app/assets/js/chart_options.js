Chart.defaults.global = {
	
	animation: true,		// Boolean - Whether to animate the chart
	animationSteps: 60,		// Number - Number of animation steps
	animationEasing: "easeOutQuart",	// String - Animation easing effect
	
	showScale: true,		// Boolean - If we should show the scale at all
	scaleOverride: false,	// Boolean - If we want to override with a hard coded scale
	// ** Required if scaleOverride is true **
	scaleSteps: null,		// Number - The number of steps in a hard coded scale
	scaleStepWidth: null,	// Number - The value jump in the hard coded scale
	scaleStartValue: null,	// Number - The scale starting value
	
	scaleLineColor: "rgba(0,0,0,.1)",	// String - Colour of the scale line
	scaleLineWidth: 1,			// Number - Pixel width of the scale line
	scaleShowLabels: true,		// Boolean - Whether to show labels on the scale
	scaleLabel: "<%=value%>",	// Interpolated JS string - can access value
	scaleIntegersOnly: true,	// Boolean - Whether the scale should stick to integers, not floats even if drawing space is there
	scaleBeginAtZero: false,	// Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
	scaleFontFamily: "'Helvetica Neue', 'Helvetica', 'Arial', sans-serif",	// String - Scale label font declaration for the scale label
	scaleFontSize: 12,			// Number - Scale label font size in pixels
	scaleFontStyle: "normal",	// String - Scale label font weight style
	scaleFontColor: "#666",		// String - Scale label font colour
	
	responsive: false,			// Boolean - whether or not the chart should be responsive and resize when the browser does.
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




var polar_chart_options = {
	scaleShowLabelBackdrop : true,	// Boolean - Show a backdrop to the scale label
	scaleBackdropColor : "rgba(255,255,255,0.75)", // String - The colour of the label backdrop
	scaleBeginAtZero : true,		// Boolean - Whether the scale should begin at zero
	scaleBackdropPaddingY : 2, 		// Number - The backdrop padding above & below the label in pixels
	scaleBackdropPaddingX : 2,		// Number - The backdrop padding to the side of the label in pixels
	scaleShowLine : true,			// Boolean - Show line for each value in the scale
	segmentShowStroke : false,		// Boolean - Stroke a line around each segment in the chart
	segmentStrokeColor : "#fff",	// String - The colour of the stroke on each segement.
	segmentStrokeWidth : 2,			// Number - The width of the stroke value in pixels
	animationSteps : 100,			// Number - Amount of animation steps
	animationEasing : "easeOutBounce",		// String - Animation easing effect.
	animateRotate : true,			// Boolean - Whether to animate the rotation of the chart
	animateScale : false,		// Boolean - Whether to animate scaling the chart from the centre
	// String - A legend template
	legendTemplate : "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>"

}