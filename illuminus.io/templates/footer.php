
	</div>
</div>


<script src="app/assets/js/bootstrap.min.js"></script>

<script>
	$('.homepage_video').click(function(){this.paused?this.play():this.pause();});
	$('.homepage_video').on('ended',function(){
	    $(this).load();
	});

	$(document).ready(function(){
	  $('a[href*=#]').click(function() {
	    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'')
	    && location.hostname == this.hostname) {
	      var $target = $(this.hash);
	      $target = $target.length && $target
	      || $('[name=' + this.hash.slice(1) +']');
	      if ($target.length) {
	        var targetOffset = $target.offset().top;
	        $('html,body')
	        .animate({scrollTop: targetOffset}, 1000);
	       return false;
	      }
	    }
	  });
	});

</script>


</body>
</html>