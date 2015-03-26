/*
$(window).on('load resize', function() {

	
	function columnHeight() {
		// Column heights should equal the document height minus the header height
		var newHeight = $(document).height()  -20 + "px";
		$(".sidebar-col").css("height", newHeight);
		$(".content-col").css("height", newHeight);
	}
	
	columnHeight();

});
*/

document.domain = "dnt.dev";




var colors1 = [
	'rgba(88,88,88,1)',
	'rgba(76,76,76,1)',
	'rgba(58,58,58,1)',
	'rgba(30,30,30,1)',
	'rgba(9,188,135,1)',
]


var data = [
    {
        value: 300,
        color: colors1[0],
        highlight: colors1[4],
        label: "Red"
    },
    {
        value: 50,
        color: colors1[1],
        highlight: colors1[4],
        label: "Green"
    },
    {
        value: 100,
        color: colors1[2],
        highlight: colors1[4],
        label: "Yellow"
    },
    {
        value: 40,
        color: colors1[3],
        highlight: colors1[4],
        label: "Grey"
    },
    {
        value: 120,
        color: colors1[4],
        highlight: colors1[4],
        label: "Dark Grey"
    }

];

// Get the context of the canvas element we want to select
var ctx = document.getElementById("myChart").getContext("2d");
var myNewChart = new Chart(ctx).Doughnut(data,polar_chart_options);