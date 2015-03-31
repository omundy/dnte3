




var current_step = 0;
var steps = ['step0','step1','step2','step3']

/*


$('#step0_link').on('click',function(){ load_step(0); })
$('#step1_link').on('click',function(){ load_step(1); })
$('#step2_link').on('click',function(){ load_step(2); })
$('#step3_link').on('click',function(){ load_step(3); })



// scroll to id / target
function load_step(step){
	// get target element
    var target = $( $('#step'+step) );
    console.log(target)
    
	// animate using scrollTop
    $('body').animate({
        scrollTop: target.offset().top
    }, 800, function(){ // callback after complete
	    // update current_step
	    //var current_step = step;
	    // update nav
        //show_selected_nav(step)
    });
};
*/
// updates nav with selected step
function show_selected_nav(link){
	// remove selected class from each
	$.each(steps,function(key,value){
		$('.nav_steps a').removeClass('selected')
	})
	// assign correct step selected class
	$(link+'_link').addClass('selected')
}
// show step once they scroll too it
function show_step(current_step){
	console.log(current_step)
}
// scroll to id / target
$('a[href^="#"]').on('click', function(event) {
	// get target element
    var target = $( $(this).attr('href') );
	$href = $(this).attr('href')
	

     var current_step = $href.replace('#step','');
		    // update nav
			show_selected_nav($href)
			show_step(current_step)

});
  /*
function close_all(){
	$.each('.step',function(key,value){
		$(this).slideDown();
	})
}


  

function close_accordion_section(open) {
        $('.step .content').removeClass('active');
        $('.step .content').slideUp(300).removeClass('open');
        
        console.log(open)
        	$(open).addClass('active');
        $(open).slideDown(300).addClass('open'); 
        
    }
 
    

    
        // Grab current anchor value
        var currentAttrValue = $(this).attr('href');
 
        if($(e.target).is('.active')) {
            close_accordion_section();
        }else {
            close_accordion_section();
 
            // Add active class to section title
            $(this).addClass('active');
            // Open up the hidden content panel
            $('.accordion ' + currentAttrValue).slideDown(300).addClass('open'); 
        }
 
   }
    
    */
    
    



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






var colors1 = [
	'rgba(88,88,88,1)',
	'rgba(76,76,76,1)',
	'rgba(58,58,58,1)',
	'rgba(30,30,30,1)',
	'rgba(9,188,135,1)',
]














