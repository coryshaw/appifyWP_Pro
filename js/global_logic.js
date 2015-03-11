jQuery(document).ready(function($){

	jQuery.fn.exists = function(){return this.length>0;};
	
	
	var bodyHeight = jQuery('body').height();
	var windowHeight = jQuery(window).height();
	
	function adjustbodyheight() {
	  bodyHeight = jQuery('body').height();
	  windowHeight = jQuery(window).height();
	  
	  //console.log('windowheight:'+windowHeight);
	  //console.log('bodyheight:'+bodyHeight);
	  if (bodyHeight < windowHeight) {
	  	jQuery('body').height(windowHeight);
	  }
	}
	
	// sticky sidebar
	if ($('.sidebar .sticky').length){
	
	  var scrollpos = $(window).scrollTop();
	  var stickyPosTop = $('.sidebar .sticky').offset().top;
	  var stickyHeight = $('.sidebar .sticky').height();
	  var contentHeight = $('#body .content').height();
	  var footerOffset = $('footer').offset().top - stickyHeight;
	
  	function calculateStickySidebar(){
  	  scrollpos = $(window).scrollTop();
  	  stickyPosTop = $('.sidebar .sticky').offset().top;
  	  stickyHeight = $('.sidebar .sticky').height();
  	  contentHeight = $('#body .content').height();
  	  footerOffset = $('footer').offset().top - stickyHeight;
//  	  console.log('scrollpos:'+scrollpos);
//  	  console.log('stickyPosTop:'+stickyPosTop);
//  	  console.log('stickyHeight:'+stickyHeight);
//  	  console.log('contentHeight:'+contentHeight);
//  	  console.log('stickyHeight:'+stickyHeight);
//  	  console.log('footerOffset:'+footerOffset);
  	}
	
	  $('body').scrollspy('refresh').attr('data-target','.nav');
	  $('body').scrollspy();
	  
	  calculateStickySidebar();
	  
	  $(window).scroll(function(){
	    scrollpos = $(window).scrollTop();
	    //console.log(scrollpos);
	    if(scrollpos >= stickyPosTop && stickyHeight <= contentHeight){
	      //console.log('firstpass');
	      if(scrollpos >= footerOffset){
	        $('.sidebar .sticky').addClass('bottom').removeClass('fixed');
	      } else {
	        $('.sidebar .sticky').addClass('fixed').removeClass('bottom');
	      }
	    } else {
	      $('.sidebar .sticky').removeClass('fixed');
	    }
	  });
	  
	  
	  
	  
	  
	  
	  // SMART SIDEBAR
	  
	  if (!$('.sidebar .sticky .nav').length && $('#sidebar').length && $('.content section').length) {
	    $('#sidebar .sidebar-list').prepend('<ul class="nav"></ul>');
      
      // Get Page Title
      var title = '';
      if($('h1#app-title img').length){
        title = $('h1#app-title img').attr('alt');
      } else if ($('h1#app-title').length) {
        title = $('h1#app-title').text();
      } else if ($('h1').length) {
        title = $('h1').text();
      }

      
      //console.log(title);
      
      if(title != ''){
        $('.sticky .nav').prepend('<h3 class="widget-title">'+title+'</h3>');
      }
      
      $('.content section').each(function(){
        if($(this).attr('id').length){
          var sectionid = $(this).attr('id');

          if($(this).attr('data-title') !== undefined){
            var smartNavTitle = $(this).attr('data-title');
          } else {
            var smartNavTitle = $(this).attr('id');
          }
          
          $('.sticky .nav').append('<li><a href="#'+sectionid+'"><i class="icon-caret-left"></i> '+smartNavTitle+'</a></li>');
        }
      });  
      
      
      
      $('body').scrollspy('refresh');
      calculateStickySidebar();
	  }
	  
	  
	  //sticky scrollTo animation
	  $('.sticky .nav li a').on("click", function(event){
	    event.preventDefault();
	    var clickedhash = $(this).attr('href');
	    //console.log(clickedhash);
	    var offset = $(clickedhash).offset();
	    //console.log(offset);
	    $("html,body").animate({
	        scrollTop: offset.top,
	    }, 500, 'swing');
	    
	  });
	  
	  
	} // end if .sticky
	
	

	
	
	$('button, .button').addClass('btn');
	
	
	setTimeout(function(){
	    	adjustbodyheight();
	}, 500);
	

	if (jQuery('.reply').exists()){
		jQuery('.reply a').addClass('btn btn-secondary');
	}

	if (jQuery('#respond').exists()){
		jQuery('#respond #submit').addClass('btn btn-secondary');
	}
	
	$(".fancybox").fancybox({
		openEffect	: 'elastic',
		closeEffect	: 'elastic',
	  helpers : {
	    media : {}
	  }  
	});
	
	
	$('a[href*=".jpg"], a[href*="jpeg"], a[href*=".png"], a[href*=".gif"]').addClass('fancybox');
  
  
  // fix for bootstrap mobile nav
  
  $('.dropdown-toggle').click(function(e) {
    e.preventDefault();
    setTimeout($.proxy(function() {
      if ('ontouchstart' in document.documentElement) {
        $(this).siblings('.dropdown-backdrop').off().remove();
      }
    }, this), 0);
  });
  
}); // end doc ready