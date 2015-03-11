<?php

/*///////////////////////////////////////////////////////////////////////
Part of the code from the book 
Building Findable Websites: Web Standards, SEO, and Beyond
by Aarron Walter (aarron@buildingfindablewebsites.com)
http://buildingfindablewebsites.com

Distrbuted under Creative Commons license
http://creativecommons.org/licenses/by-sa/3.0/us/
///////////////////////////////////////////////////////////////////////*/
add_action( 'wp_ajax_nopriv_mailchimp_subscribe', 'mailchimp_subscribe' );
add_action( 'wp_ajax_mailchimp_subscribe', 'mailchimp_subscribe' );
function mailchimp_subscribe() {
	die( storeAddress() );
}
function storeAddress(){
	
	// Validation
	if(!$_POST['email']){ 
		$result = array('result' => false, 'response_text' => __('Please insert email address.', 'theme_admin'));
		die( htmlspecialchars(json_encode($result), ENT_NOQUOTES) );
	} 

	if(!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*$/i", $_POST['email'])) {
		$result = array('result' => false, 'response_text' => '<strong>' . __('Failed', 'theme_admin') . '</strong> : ' . __('email address is invalid.', 'theme_admin'));
		die( json_encode($result) );
	}

	require_once('MCAPI.class.php');
	// grab an API Key from http://admin.mailchimp.com/account/api/
	if( theme_options('advanced', 'mailchimp_api_key') == '' ) {
		return 'Add your MailChimp API at AppifyWP > Settings > Advanced > MailChimp';
		$result = array('result' => false, 'response_text' => __('Add your MailChimp API at AppifyWP > Settings > Advanced > MailChimp', 'theme_admin'));
		die( json_encode($result) );
	}
	
	$api = new MCAPI( theme_options('advanced', 'mailchimp_api_key') );
	
	// grab your List's Unique Id by going to http://admin.mailchimp.com/lists/
	// Click the "settings" link for the list - the Unique Id is at the bottom of that page. 
	$list_id = $_POST['list_id'];

	if($api->listSubscribe($list_id, $_POST['email'], '') === true) {
		$result = array('result' => true, 'response_text' => '<strong>' . __('Success!', 'theme_admin') . '</strong> ' . __('Check your email to confirm sign up.', 'theme_admin'));
	}else{
		$result = array('result' => false, 'response_text' => '<strong>'. __('Failed', 'theme_admin') .'</strong> : ' . $api->errorMessage);
	}
	die( json_encode($result) );
}

add_action( 'wp_ajax_nopriv_do_contact', 'do_contact' );
add_action( 'wp_ajax_do_contact', 'do_contact' );
function do_contact(){
	
	if( $_POST['contact-name-h'] != '' ) {
		$result = array('result' => false, 'response_text' => '<strong>'. __('Failed', 'theme_admin') .'</strong> : ' . __('Honey Pot!', 'theme_admin'));
		die( json_encode($result) );
	}

	$site_name = get_bloginfo('name');
	$site_url =  home_url();
	$site_email = get_bloginfo( 'admin_email' );
	
	$name = isset( $_POST['contact-name'] ) ? trim($_POST['contact-name']):'';
	$email = isset( $_POST['contact-email'] ) ? trim($_POST['contact-email']):'';
	$message = isset( $_POST['contact-content'] ) ? trim(nl2br($_POST['contact-content'])):'';
	$form_id = isset( $_POST['form-id'] ) ? trim(nl2br($_POST['form-id'])):'';
	
	$to = ( $_POST['mail_to'] != '' ) ? $_POST['mail_to'] : $site_email;
	$to = str_replace('[at]','@',$to);

	$subject = '[ ' . $site_name . ' ] ' . __('message from', 'theme_admin') . ' ' . $name;
	$color = '#FAFAFA';
	
	$body = '<div style="padding: 10px; background: ' . $color . '; line-height: 20px;">';
	$body .= ( $form_id ) ? '<strong>' . __('Form ID', 'theme_admin') . ':</strong> ' . $form_id . '<br />' : '';
	$body .= '<strong>' . __('Name', 'theme_admin') . ':</strong> ' . $name . '<br />';
	$body .= '<strong>' . __('Email', 'theme_admin') . ':</strong> ' . $email . '<br /><br />';
	$body .= '<strong>' . __('Message', 'theme_admin') . ':</strong> <br />';
	$body .= $message . '<br /><br />';
	$body .= '</div>';
	
	$body .= '<div style="padding: 10px; background: #555; line-height: 20px; color: #F1F1F1;">';
	$body .= '<small>' . __('This message has been sent from', 'theme_admin') . ' : <a href="' . $site_url . '" style="color: #F1F1F1; text-decoration: none;">' . $site_name . '</a></small>';
	$body .= "</div>";
	
	$headers  = "From: $name <$email>\r\n"; 
    $headers .= "Reply-To: $name <$email>\r\n";
    $headers .= 'MIME-Version: 1.0' . "\n"; 
    $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n"; 
	
	if(wp_mail($to, $subject, $body, $headers)){
		$result = array('result' => true, 'response_text' => '<strong>' . __('Success', 'theme_admin') . '</strong> : ' . __('your message has been sent.', 'theme_admin'));
	}else{
		$result = array('result' => false, 'response_text' => '<strong>'. __('Failed', 'theme_admin') .'</strong> : ' . __('some issue occur while sending your message', 'theme_admin'));
	}
	
	die( json_encode($result) );
}

add_action( 'wp_ajax_nopriv_do_feedback', 'do_feedback' );
add_action( 'wp_ajax_do_feedback', 'do_feedback' );
function do_feedback(){
	
	if( $_POST['contact-name-h'] != '' ) {
		$result = array('result' => false, 'response_text' => '<strong>'. __('Failed', 'theme_admin') .'</strong> : ' . __('Honey Pot!', 'theme_admin'));
		die( json_encode($result) );
	}

	$site_name = get_bloginfo('name');
	$site_url =  home_url();
	$site_email = get_bloginfo( 'admin_email' );
	
	$app_title = $_POST['app_title'];
	$feedback = trim( nl2br( $_POST['feedback'] ) );
	$type = $_POST['type'];
	
	if( $feedback == '' ) {
		$result = array('result' => true, 'response_text' => '<strong>' . __('Failed', 'theme_admin') . '</strong> : ' . __('please fill the message.', 'theme_admin'));
		die( json_encode($result) );
	}
	
	$to = ( $_POST['mail_to'] != '' ) ? $_POST['mail_to'] : $site_email;
	$to = str_replace('[at]','@',$to);
	
	$subject = "[ $type ] - $app_title";
	
	switch( $type ) {
		case 'Bug': $color = '#d1de79';
		break;
		case 'Comment': $color = '#9ed4e2';
		break;
		case 'Request': $color = '#f3d981';
		break;
	}
	
	$body = '<div style="padding: 10px; background: '. $color . '; line-height: 20px;">';
	$body .= '<strong>' . __('Application', 'theme_admin') . ':</strong> ' . $app_title . '<br />';
	$body .= '<strong>' . __('Type', 'theme_admin') . ':</strong> ' . $type . '<br /><br />';
	$body .= $feedback . '<br /><br />';
	$body .= '</div>';
	
	$body .= '<div style="padding: 10px; background: #555; line-height: 20px; color: #F1F1F1;">';
	$body .= '<small>' . __('This message has been sent from', 'theme_admin') . ' : <a href="' . $site_url . '" style="color: #F1F1F1; text-decoration: none;">' . $site_name . '</a></small>';
	$body .= "</div>";
	
	$headers  = "From: $site_name <$site_email>\r\n"; 
	$headers .= 'MIME-Version: 1.0' . "\n"; 
	$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n"; 
	
	if(wp_mail($to, $subject, $body, $headers)){
		$result = array('result' => true, 'response_text' => '<strong>' . __('Success', 'theme_admin') . '</strong> : ' . __('your message has been sent.', 'theme_admin'));
	}else{
		$result = array('result' => false, 'response_text' => '<strong>'. __('Failed', 'theme_admin') . '</strong> : ' . __('some issue occur while sending your message', 'theme_admin'));
	}
	
	die( json_encode($result) );
}