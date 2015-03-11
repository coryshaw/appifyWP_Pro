jQuery(document).ready(function($) {
	

	
	// Ads 125
	$('.ads-count').live('change',function(){
		var cur_widget = $(this).parents('.widget');
		var count = $(this).val();
		$('.ads-info', cur_widget).hide();
		for(var i = 1; i <= count; i++){
			$('#ads-info-'+i, cur_widget).show();
		}
	});
	
	// Social
	$('.social-icon-sites').live('change',function(){
		var cur_widget = $(this).parents('.widget');
		var sites = $(this).val();
		$('.social-icon-config', cur_widget).hide();
		for(var i = 0; i < sites.length; i++){
			$('#social-icon-'+sites[i], cur_widget).show();
		}
	});
	
});