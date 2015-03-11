jQuery(document).ready(function($) {


	// On-Off
	$('.input-on-off').iphoneStyle();
	
	// Toggle Group
	$('.input-on-off[toggle]').change(function(){
		if($(this).is(':checked')) {
			$('.input-list.' + $(this).attr('toggle') ).show();
			$( $('.input-on-off:not(.isdefaultplatform), .input-radio', '.input-list.' + $(this).attr('toggle')).get().reverse() ).trigger('change');
		} else {
			$('.input-list.' + $(this).attr('toggle') ).hide();
		}
	});
	
	$('.input-radio[toggle]').change(function(){
		if( $(this).is(':checked') ) {
			$('.input-list.' + $(this).attr('toggle') ).hide();
			$('.input-list.' + $(this).attr('toggle') + '-' + $(this).attr('value') ).show();
			$( $('.input-on-off, .input-radio', '.input-list.' + $(this).attr('toggle') + '-' + $(this).attr('value')).get().reverse() ).trigger('change');
		}
	});
	// Hide Toggle Group
	$( $('.input-on-off, .input-radio').get().reverse() ).trigger('change');
	
	// Color
	$('.colorpicker').wpColorPicker();
	
	// Date
	$('.input-date').each( function(){
		var input_date = $(this);
		$(this).dateinput({
			trigger : true,
			format : 'dd mmmm yyyy',
			change: function() {
				
				var isoDate = parseDate(this.getValue('yyyy-mm-dd')) / 1000;
				$(input_date).siblings('.input-date-value').val(isoDate);
			},
			onHide: function(){
				if( $(input_date).val() === '' ) {
					$(input_date).siblings('.input-date-value').val('');
				}
			}
		});
	});
	
	function parseDate(input, format) {
    format = format || 'yyyy-mm-dd';
    var parts = input.match(/(\d+)/g),
      i = 0, fmt = {};
    format.replace(/(yyyy|dd|mm)/g, function(part) { fmt[part] = i++; });
    return new Date(Date.UTC(parts[fmt['yyyy']], parts[fmt['mm']]-1, parts[fmt['dd']]));
  }
	
	// Time
	$('.input-time').timeEntry({spinnerImage: '', show24Hours: true});
	$('.time-trigger').click(function(e){
		e.preventDefault();
		$('.input-time', $(this).parent('.input-field')).focus();
	});
	
	// Range
	$('.input-range').rangeinput({
		progress : false
	});
	
	//File upload
	$('.upload-file-bt-box').each(function(){
		var cur_item = $(this);
		var cur_parent = $(cur_item).parents('.input-field');
		var cur_input_name = $('.dummy-input', cur_parent).attr('name');
		new qq.FileUploader({
		    element: $(this)[0],
		    action: ajaxurl,
		    params : {
		    	action: 'theme_ajax_action',
		    	method: 'upload_file',
		    	allowedExtensions: $('.file-extensions', $(cur_parent)).attr('value').split(','),
		    	post_id: ( typeof $('#post_ID').attr('value') != 'undefined' ) ? $('#post_ID').attr('value') : '0'
		    },
		    multiple : false,
		    template: '<div class="qq-uploader">' +
		                  '<div class="qq-upload-drop-area"><span>Drop files here to upload</span></div>' +
		                  '<div class="qq-upload-button">Upload a File</div>' +
		                  '<ul class="qq-upload-list"></ul>' +
		              '</div>',
		    onSubmit: function(id, fileName){
		    	$('.upload-image-bt-ajax-load', $(cur_parent)).show();
		    },
		    onComplete : function(id, fileName, responseJSON){
		    	$('.upload-image-bt-ajax-load', $(cur_parent)).hide();
		    	if( responseJSON.success ) {
			    	$('.uploaded-file-container', $(cur_parent)).html('<div class="uploaded-file">'+responseJSON.file_path+'<a class="remove" href="#">remove</a><input type="hidden" value="'+ responseJSON.attach_id +'" name="'+ cur_input_name +'" /></div>').fadeIn();
			    } else {
			    	alert( responseJSON.error );
			    }
		    }
		});
	});
	



var tgm_media_frame;
window.wpActiveEditor = null;


	$('.upload-image').click(function() {
	
	    var send_attachment_bkp = wp.media.editor.send.attachment;
	    var button = $(this);
	    var cur_input_name = $(button).parent().find('.dummy-input').attr('name');
	    
	    wp.media.editor.send.attachment = function(props, attachment) {
	        
	        if($(button).parent().find('img').length){
	          $(button).parent().find('.uploaded-image').remove();
	          $(button).before('<div class="uploaded-image"><img src="'+attachment.url+'"/><a class="remove" href="#">remove</a><input type="hidden" value="'+ attachment.id +'" name="'+ cur_input_name +'" /></div><div class="clear"></div>');
	        } else {
	          $(button).before('<div class="uploaded-image"><img src="'+attachment.url+'"/><a class="remove" href="#">remove</a><input type="hidden" value="'+ attachment.id +'" name="'+ cur_input_name +'" /></div><div class="clear"></div>');
	        }
	
	        wp.media.editor.send.attachment = send_attachment_bkp;
	    }
	
	    wp.media.editor.open();
	
	    return false;       
	});
	
	
	
	$('.upload-images').click(function() {
	  var button = $(this);
	  var cur_input_name = $(button).parent().find('.dummy-input').attr('name');
	  
	  tgm_media_frame = wp.media.frames.tgm_media_frame = wp.media({
	    multiple: true,
	    library: {
	      type: 'image'
	    },
	  });
	  
	  tgm_media_frame.on('select', function(){
	    var selection = tgm_media_frame.state().get('selection');
	    selection.map( function( attachment ) {
	      attachment = attachment.toJSON();
	        $(button).parent().find('.uploaded-images-container').append('<div class="uploaded-image"><img src="'+attachment.url+'"/><a class="remove" href="#">remove</a><input type="hidden" name="'+ cur_input_name +'[]'+ '" value="'+ attachment.id +'"/></div>');
	    });
	    
	  });
		
	  tgm_media_frame.open();
      
	});
	
	
	
	$('.uploaded-image .remove, .uploaded-file .remove').live('click', function(e){
		e.preventDefault();
		$(this).parent().fadeOut(function(){
			$(this).remove();
		});
	});

	$('.uploaded-images-container').sortable({
		items : '.uploaded-image',
		cursor : 'move',
		placeholder : 'uploaded-image-dummy'
	});
	
	
	// Radio Image
	$('.radio-img-list label').click(function(){
		$('.radio-img-list label', $(this).parents('.input-field') ).removeClass('active');
		$(this).addClass('active');
	});
	
	// Checkbox Image
	$('.checkbox-img-list input[type="checkbox"]').change(function(){
		$(this).is(':checked') ? $(this).siblings('label').addClass('active') : $(this).siblings('label').removeClass('active');
	});
	
	// Theme Box
	$('#theme-box-tabs ul li').click(function(e){
		e.preventDefault();
		if( ! $(this).hasClass('active') ){
			$('#theme-box-tabs ul li').removeClass('active');
			$(this).addClass('active');
			$('#theme-box-content .theme-box-content-pane').removeClass('active').hide();
			$('#theme-box-content .theme-box-content-pane:eq('+$(this).index()+')').addClass('active').fadeIn();
		}
	});
	
	// Input List Odd
	$('.input-list:odd').addClass('odd');
	
	// Option Box save button
	$('#theme-options-save').click(function(event){
		var current = $(this);
		$('.notification-box').html('<div class="ajax-load-icon"></div>saving …').stop(true, true).fadeIn();
		
		var data = {
			action: 'theme_ajax_action',
			method: 'save_option',
			options: $('#theme-options-form').serialize()
		};
		var jqxhr = $.post(ajaxurl, data, function(response) {
		    
  			$('.notification-box').html('Settings Saved').delay(1000).fadeOut('slow');
  			$('#advanced-theme_export_option').val(response.encodedOptions);
		}, 'json')
		.fail( function(xhr, textStatus, errorThrown) {
        	$('.notification-box').html('An Error Occured :/').delay(1000).fadeOut('slow');
        	console.log(errorThrown);
        	console.log(textStatus);
    	});
    	if( $('#advanced-theme_import_option').val() != '' ) location.reload();

	});
	
	// Type - Re-order
	$('.wp-list-table tbody').sortable({
		items : 'tr',
		handle : '.reorder-handle',
		axis : 'y',
		placeholder : 'ui-state-highlight',
		helper : function(e, tr)
		{
		    var $originals = tr.children();
		    var $helper = tr.clone();
		    $helper.children().each(function(index)
		    {
		      $(this).width($originals.eq(index).width())
		    });
		    return $helper;
		},
		start : function(e, ui) {
			$('tr.ui-state-highlight').append('<td colspan="0"></td>');
		},
		update : function(e, ui) {
			$('.ajax-load-icon', ui.item).show();
			var data = {
				action: 'theme_ajax_action',
				method: 'update_post_order',
				post_order: $(this).sortable('serialize')
			};
			$.post(ajaxurl, data, function(response) {
			   	if('ok' == response.result){
				    $('.ajax-load-icon', ui.item).hide();
				}
			}, 'json');
		}
	});
	
	// Defulat Platform Selectors

	$('input.isdefaultplatform').click(function(){
		jQuery('input.isdefaultplatform').not(this).removeAttr('checked');
	});
	
});