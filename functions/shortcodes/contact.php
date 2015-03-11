<?php

// Contact Info
add_shortcode('contact_info', 'theme_shortcode_contact_info');
function theme_shortcode_contact_info($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		'info' => '',
		'location' => '',
		'email' => '',
		'telephone' => '',
		'mobile' => '',
		'fax' => '',
	), $atts));
	
	$list = '';
	$list .= ( $location != '' ) ? '<li class="address">' . $location . '</li>' : '';
	$list .= ( $email != '' ) ? '<li class="email">' . $email . '</li>' : '';
	$list .= ( $telephone != '' ) ? '<li class="telephone">' . $telephone . '</li>' : '';
	$list .= ( $mobile != '' ) ? '<li class="mobile">' . $mobile . '</li>' : '';
	$list .= ( $fax != '' ) ? '<li class="fax">' . $fax . '</li>' : '';
	
	return <<<RET
<div class="contact-info-text">$info</div>
<ul class="contact-info">$list</ul>
RET;
}

// Contact Form
add_shortcode('contact_form', 'theme_shortcode_contact_form');
function theme_shortcode_contact_form($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		'mail_to' => '',
		'form_id' => false,
		'button_color' => 'black'
	), $atts));
	
	$id = mt_rand(0, 1000);
	$template_directory = get_template_directory_uri();
	$ajax_url = admin_url('admin-ajax.php');
	
	$mail_to = str_replace('@','[at]',$mail_to);
	
	$name_text = __('Name', 'theme_front');
	$email_text = __('Email', 'theme_front');
	$message_text = __('Message', 'theme_front');
	$submit_text = __('Submit', 'theme_front');
	
	$form_id = ( $form_id ) ? '<input type="hidden" name="form-id" value="' . $form_id . '" />' : '';
	
	return <<<RET
[raw]
<form method="post" action="$ajax_url" id="form-$id" class="contact-form ajax-form validate-form">
	<div class="form-input-item clearfix">
		<label for="contact-form-$id-contact-name">$name_text <span class="required-star">*</span></label>
		<input type="text" class="input-text" name="contact-name-h" id="contact-form-contact-name-h">
		<input type="text" tabindex="8" size="22" value="" class="input-text {required:true}" name="contact-name" id="contact-form-$id-contact-name">
		<div class="form-error-box"></div>
	</div>
	
	<div class="form-input-item clearfix">
		<label for="contact-form-$id-contact-email">$email_text <span class="required-star">*</span></label>
		<input type="text" tabindex="9" size="22" value="" class="input-text {required:true, email:true}" name="contact-email" id="contact-form-$id-contact-email">
		<div class="form-error-box"></div>
	</div>
	
	<div class="form-input-item clearfix">
		<label for="contact-form-$id-contact-content">$message_text <span class="required-star">*</span></label>
		<textarea tabindex="10" rows="5" cols="30" class="input-textarea {required:true}" id="contact-form-$id-contact-content" name="contact-content"></textarea>
		<div class="form-error-box"></div>
	</div>
	
	<div class="form-response"></div>
	
	<div class="form-input-item form-input-item-last clearfix">
		<button class="button medium $button_color" type="submit"><span>$submit_text</span></button>
	</div>
	$form_id
	<input type="hidden" name="mail_to" value="$mail_to">
	<input type="hidden" name="action" value="do_contact" />
</form>
[/raw]
RET;
}