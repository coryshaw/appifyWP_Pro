<script type="text/javascript">
	jQuery(document).ready(function($) {

    var currentappheight = $('.app-showcase-block.current').height();
      
		$('.flexslider').flexslider({
			animation: '<?php echo $img_slide_effect; ?>',
			slideshowSpeed: <?php echo $img_slide_pause; ?>,
			<?php if ($img_slideshow_autoplay != 'on') :?>
			slideshow: false,
			<?php endif ?>
			controlNav: false
		});
		
		<?php foreach ($platforms as $platform => $platformdata) { 

	    	if ($platformdata['value'] == 'on'): ?>
	    	var slider = $('.platform-<?php echo $platform ?> .flexslider').data('flexslider');
	    <?php endif; }  ?>

	    	$('.app-showcase-block').each(function(){
	    		var appname = $(this).attr('class').split(' ')[1];
	    		if($('.flexslider',this).length != 0 && $('.flexslider .slides li',this).length > 1 ) {
	    			slider.appname = $('.flexslider',this).data('flexslider');
	    			console.log(this.appname);
	    		}	
	    	});


			$(".fancybox").fancybox({
				openEffect	: 'elastic',
    		closeEffect	: 'elastic',
        helpers : {
          media : {}
        }
			});

			
			var platformheight = $('.platform.current').height();

			var bgheight;


			function switchplatforms(){
			  $('.app-showcase-block:not(.current)').hide();
				platformheight = $('.app-showcase-block.current').height()+headerheight;
   			bgheight = $(".app-showcase-block.current .showcase-background").height();
   				<?php if ($img_slideshow_autoplay == 'on') :?>
   					$('.app-showcase-block').each(function(){
			    		var appname = $(this).attr('class').split(' ')[1];
			    		if($('.flexslider',this).length != 0 && $('.flexslider .slides li',this).length > 1 ) {
			    			slider.appname.pause();
	    		}	
	    	});

	   				if(!$('.app-showcase-block.current .flexslider').length == 0 && $('.app-showcase-block.current .flexslider .slides li').length > 1){
	   					appname = $('.app-showcase-block.current').attr('class').split(' ')[1];
	   			  		slider.appname.play();
	   				}
   				<?php endif ?>
   				
   				setTimeout(function(){
   				      
   				      $('.app-showcase-block.current').fadeIn('fast');

   							setTimeout(function(){
   										$('.app-showcase-block.current .screen').fadeIn('fast');
   										$('.app-showcase-block.current .platform').addClass('current');
   								}, 200);
   					}, 100);
   				
   					
   					
   					
			}

      

	 		$('.app-nav a').click(function(event){
	 		  
				if(!$(this).hasClass('current')){
					$('.app-showcase-block.current .screen').hide();
					var clickedapp = $(this).attr('class').split(' ')[0];
					$('.app-nav a').removeClass('current');
					$(this).addClass('current');
				  $('.platform.current').removeClass('current');	
				$('.app-showcase-block.current').removeClass('current').fadeOut();
				$('.'+clickedapp).addClass('current');
				setTimeout(function(){
				      currentappheight = $('.app-showcase-block.current').height();
				      $('.app-showcase-wrapper').height(currentappheight+'px');
				      setTimeout(function(){
				          	switchplatforms();
				      }, 200);	
							
							
					}, 300);	
					
				}
				
			});
			

			 $(window).resize(function() {
    			switchplatforms();
    			currentappheight = $('.app-showcase-block.current').height();
    			$('.app-showcase-wrapper').height(currentappheight+'px');
    			if($(this).hasClass('parallax')){
    			  showcaseheight = $(this).height();
    			  paralaxheight = headerheight + appnavheight + showcaseheight;
    			  $('.showcase-background', this).css('height',paralaxheight+'px').css('top','-'+headerheight+'px');
    			}
    			//adjustbodyheight();
			 });

			setTimeout(function(){
			      currentappheight = $('.app-showcase-block.current').height();
			      $('.app-showcase-wrapper').height(currentappheight+'px');
			      
      			switchplatforms();
    	}, 320);


			
			// parallax

			var headerheight = $('.navbar .container').height();
			var appnavheight = $('.app-nav').height();
			var showcaseheight;
			var paralaxheight;
			headerheight = headerheight + appnavheight;
			
			$('.app-showcase-block').each(function(){
			  if($(this).hasClass('parallax')){
  			  showcaseheight = $(this).height();
  			  paralaxheight = headerheight + appnavheight + showcaseheight;
  			  $('.showcase-background', this).css('height',paralaxheight+'px').css('top','-'+headerheight+'px');
  			}
			});


			$(window).scroll(function() {
  				var s = $(window).scrollTop();
  				if(s < bgheight){
  					$(".app-showcase-block.current.parallax .showcase-background").css('-webkit-transform', 'translate3d(0,'+(s/2)+'px,0)');
  				}
  				
			});
			
			
			


			// if hash in url, highlight proper nav section
		  	if(window.location.hash) {
		  	 
		  	 	var currenthash = window.location.hash.substring(1);
          
		  	  	if (jQuery('.app-nav a.'+currenthash).length != 0) {
		  		  	jQuery('.app-nav a').removeClass('current');
		  		  	jQuery('.app-nav a.'+currenthash).addClass('current');	
		  		  	jQuery('.app-showcase-block.current').removeClass('current');
		  		  	
		  		  	jQuery('.app-showcase-block.'+currenthash).addClass('current');
		  		  	currentappheight = $('.app-showcase-block.current').height();
		  		  	setTimeout(function(){
		  		  	  $('.app-showcase-wrapper').height(currentappheight+'px');
		  		  	}, 320);
		  		  	switchplatforms();	
		  	  	}
		  	// if no hash, ensure that there's at least a current section, and if not pick the first one  	
		  	} else if (jQuery('.app-showcase-block.current').length == 0){
		  		jQuery('.app-showcase-block').first().addClass('current');
		  		jQuery('.app-nav a').first().addClass('current');	
		  	}// end if hash in url
		  	
		  	
		  	$('.showtooltip').tooltip();
		  	
				
		}); // end doc ready

	</script>