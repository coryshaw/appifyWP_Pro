<script type="text/javascript">
	jQuery(document).ready(function($) {

      
		$('.flexslider').flexslider({
			animation: '<?php echo $img_slide_effect; ?>',
			slideshowSpeed: <?php echo $img_slide_pause; ?>,
			<?php if ($img_slideshow_autoplay != 'on') :?>
			slideshow: false,
			<?php endif ?>
			controlNav: false
		});

		//$('.flexslider').data('flexslider');

	    <?php foreach ($platforms as $platform => $platformdata) { 
	    	if ($platformdata['value'] == 'on'): ?>
	    	var slider<?php echo $platform ?> = $('.platform-<?php echo $platform ?> .flexslider').data('flexslider');
	    	<?php endif; }  ?>

			var platformheight = $('.platform.current').height();

			var bgheight;


			function switchplatforms(){
				platformheight = $('.app-showcase-block').height()+headerheight;
				jQuery('.showcase-background').css('height',platformheight+'px');
   				bgheight = $(".showcase-background").height();
   				showcomingsoon();
   				<?php if ($img_slideshow_autoplay == 'on') :?>
   					<?php foreach ($platforms as $platform => $platformdata) { 
   			  		if ($platformdata['value'] == 'on') : ?>
   			  			if(!$('.<?php echo $platform ?> .flexslider').length == 0 && $('.<?php echo $platform ?> .flexslider .slides li').length > 1){
   			  				slider<?php echo $platform ?>.pause();
   			  			}
   					<?php endif; }  ?>

	   				if(!$('.platform.current .flexslider').length == 0 && $('.platform.current .flexslider .slides li').length > 1){
	   			  		eval('slider'+$('.platform.current').attr('class').split(' ')[2]).play();
	   				}
   				<?php endif ?>
			}

			function showcomingsoon(){

				if ($('.platform.current .coming-soon').length){
        		 	
        		 	$('.coming-soon div').removeClass('show');

        		 	setTimeout(function(){
      					$(".platform.current .coming-soon div").addClass('show');
    				}, 1000);
    			}

    			if ($('.platform.current .app-price').length){
        		 	
        		 	$('.app-price div').removeClass('show');

        		 	setTimeout(function(){
      					$(".platform.current .app-price div").addClass('show');
    				}, 1000);
    			}


			}	

	 		$('.platforms-nav a').click(function(){
				if(!$(this).hasClass('current')){
					$('.screen').hide();
					var clickedplatform = $(this).attr('class').split(' ')[0];
					$('.platforms-nav a').removeClass('current');
					$(this).addClass('current');
					$('.platform').removeClass('current');
					$('.platform.'+clickedplatform).addClass('current');
					switchplatforms();
					setTimeout(function(){
      					$('.screen').fadeIn('fast');
    				}, 700);
					
				}
			});

			$(window).resize(function() {
    			switchplatforms();
			});

			setTimeout(function(){
      			switchplatforms();
    		}, 3);


      var headerheight = $('.navbar .container').height();
      var showcaseheight = $('#app-showcase-block').height();

			<?php if ($appearance_parallax == 'on' && $deviceType == 'computer') : ?>
			// parallax

			
			var paralaxheight = headerheight + showcaseheight;
			$('.showcase-background').css('height',paralaxheight+'px');
			$('.showcase-background').css('top','-'+headerheight+'px');

			$(window).scroll(function() {
  				var s = $(window).scrollTop();
  				if(s < bgheight){
  					$(".showcase-background").css('-webkit-transform', 'translate3d(0,'+(s/2)+'px,0)');
  				}
  				
			});

			<?php endif; ?>


			switchplatforms();

			// if hash in url, highlight proper nav section
		  	if(window.location.hash) {
		  	 
		  	 	var currenthash = window.location.hash.substring(1);

		  	  	if (jQuery('.platforms-nav a.'+currenthash).length != 0) {
		  		  	
		  		  	jQuery('.platforms-nav a').removeClass('current');
		  		  	jQuery('.platforms-nav a.'+currenthash).addClass('current');	
		  		  	jQuery('.platform').removeClass('current');
		  		  	
		  		  	jQuery('.platform.'+currenthash).addClass('current');
		  		  	switchplatforms();	
		  	  	}
		  	// if no hash, ensure that there's at least a current section, and if not pick the first one  	
		  	} else if (jQuery('.platform.current').length == 0){
		  		jQuery('.platform').first().addClass('current');
		  		jQuery('.platforms-nav a').first().addClass('current');	
		  	}// end if hash in url
		  	
		  	
				
		}); // end doc ready

	</script>