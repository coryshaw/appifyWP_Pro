<?php

// App Info

$config = array(
	'title' 	=> __('App Info', 'theme_admin'),
	'group_id' 	=> 'info',
	'context'	=> 'normal',
	'priority' 	=> 'high',
	'types' 	=> array( 'app' ),
	'multi' 	=> false
);

$options = array(
  
  array(
  	'type' 			=> 'image',
  	'id' 			=> 'app_icon',
  	'title' 		=> __('App Icon', 'theme_admin'),
  	'description' 	=> __('Your App Icon. ', 'theme_admin')
  ),

  array(
  	'type' 			=> 'on_off',
  	'id' 			=> 'use_image',
  	'toggle' 		=> 'toggle-use-image',
  	'title' 		=> __('Use an image as the title', 'theme_admin'),
  	'description' 	=> __('Turn "on" to use an image in place of your app title', 'theme_admin'),
  ),
  
  array(
  	'type' 			=> 'image',
  	'id' 			=> 'app_logo',
  	'toggle_group' 	=> 'toggle-use-image',
  	'title' 		=> __('App Image / Logo', 'theme_admin'),
  	'description' 	=> __('Choose image to use as your app logo.', 'theme_admin')
  ),
  
  array(
  	'type' 			=> 'textarea',
  	'id' 			=> 'description_primary',
  	'title'		 	=> __('Primary App Description', 'theme_admin'),
  	'description' 	=> __('What does your app do in a sentence?', 'theme_admin'),
  ),

  array(
  	'type' 			=> 'textarea',
  	'id' 			=> 'description_secondary',
  	'title'		 	=> __('Secondary App Description', 'theme_admin'),
  	'description' 	=> __('Add a sentance or two of additonal details about your app.', 'theme_admin'),
  ),

  

);
new metaboxes_tool($config,$options);

// APPEARENCE

$config = array(
	'title' 	=> __('App Appearence', 'theme_admin'),
	'group_id' 	=> 'appearance',
	'context'	=> 'normal',
	'priority' 	=> 'high',
	'types' 	=> array( 'app' ),
	'multi' 	=> false
);

$options = array(

  array(
		'type' 			=> 'radio_img',
		'id' 			=> 'background_image',
		'title' 		=> __('App Showcase Background Image', 'theme_admin'),
		'description' 	=> __('Select a background image that you would like to appear behind your app screenshots and description', 'theme_admin'),
		'default' 		=> 'above_water',
		'options' 		=> array(
			'none' 	=> __('None', 'theme_admin'),
			'above_water' => __('Above Water', 'theme_admin'),
			'pink_sunset' => __('Pink Sunset', 'theme_admin'),
			'space' => __('Space', 'theme_admin'),
			'beach_sunset' => __('Beach Sunset', 'theme_admin'),
			'under_water' => __('Under Water', 'theme_admin'),
			'custom' => __('Custom  ', 'theme_admin'),
		),
  ),

  array(
  	'type' 			=> 'image',
  	'id' 			=> 'custom_background_image',
  	'title' 		=> __('Custom App Background Image', 'theme_admin'),
  	'description' 	=> __('Upload a custom image to use behind your app showcase.', 'theme_admin')
  ),
  
  array(
  	'type' 			=> 'color',
  	'id' 			=> 'background_color',
  	'title' 		=> __('App Showcase Background Color', 'theme_admin'),
  	'description' 	=> __('If you selected "none" or a semi-transparent background image, this color will show in the background','theme_admin'),
  	'default' 		=> '#CCCCCC'
  ),

  array(
		'type' 			=> 'on_off',
		'id' 			=> 'parallax',
		'title'		 	=> __('Background Parallax Effect', 'theme_admin'),
		'description' 	=> __('Hipster effect that animates the background image as you scroll.', 'theme_admin'),
		'default' 		=> 'on'
	),

  array(
		'type' 			=> 'on_off',
		'id' 			=> 'sidebar',
		'title'		 	=> __('Sidebar', 'theme_admin'),
		'description' 	=> __('If set to "off", the sidebar will be hidden from this app page and content will span the entire width.', 'theme_admin'),
		'default' 		=> 'on'
	),

  

  array(
  	'type' 			=> 'radio_img',
  	'id' 			=> 'foreground_contrast',
  	'title' 		=> __('App Showcase Foreground Contrast', 'theme_admin'),
  	'description' 	=> __('If your App Showcase background color or image is dark, choose light. If your App Showcase background color or image is light, choose "Dark"','theme_admin'),
  	'default' 		=> 'dark-foreground',
	'options' 		=> array(
		'light-foreground' 	=> __('Light', 'theme_admin'),
		'dark-foreground' => __('Dark', 'theme_admin'),
	),
  ),

  array(
  	'type' 			=> 'color',
  	'id' 			=> 'showcase_font_color',
  	'title' 		=> __('App Showcase Text Color', 'theme_admin'),
  	'description' 	=> __('Customize the text color of the app showcase area. If no color is selected it will default to using white or black based on the Foreground Contrast above','theme_admin')
  ),

);
new metaboxes_tool($config,$options);



// PLATFORMS

$config = array(
	'title' 	=> __('Platforms', 'theme_admin'),
	'group_id' 	=> 'platforms',
	'context'	=> 'normal',
	'priority' 	=> 'high',
	'types' 	=> array( 'app' ),
	'multi' 	=> false
);

$options = array(	
		
	
	
	
	// iphone
	
	array(
		'type' 	=> 'separator',
		'title' => __('iPhone', 'theme_admin')
	),
	
	array(
		'type' 			=> 'on_off',
		'id' 			=> 'iphone',
		'toggle' 		=> 'iphone-group',
		'title'		 	=> __('iPhone', 'theme_admin'),
		'description' 	=> '',
		'default' 		=> array(),
	),
		
	array(
		'type' 			=> 'radio_img',
		'id' 			=> 'iphone_orientation',
		'toggle_group' => 'iphone-group',
		'title' 		=> __('iPhone Orientation', 'theme_admin'),
		'description' 	=> __('Choose the orientation of the iPhone', 'theme_admin'),
		'default' 		=> 'portrait',
		'options' 		=> array(
			'portrait' 	=> __('Portrait', 'theme_admin'),
			'landscape' => __('Landscape', 'theme_admin'),
		),
		'images' 		=> array(
			'portrait' 	=> 'phone_portrait.png',
			'landscape' => 'phone_landscape.png',
		)
	),
	
	array(
		'type' 			=> 'checkbox',
		'id' 			=> 'iphone_default',
		'classgroup'	=>  'isdefaultplatform',
		'toggle_group' => 'iphone-group',
		'title'		 	=> __('Make iPhone the Default Platform?', 'theme_admin'),
		'description' 	=> __('Make the iPhone App visible by default when someone visits this app page. If your visitor is browsing on a device that matches one of your other enabled platforms, the default platform is ignored.', 'theme_admin'),
		'default' 		=> 'unchecked',
	),
	
	array(
	'type' 			=> 'textarea',
	'id' 			=> 'iphone_description',
	'toggle_group' => 'iphone-group',
	'title'		 	=> __('iPhone specific description text', 'theme_admin'),
	'description' 	=> __('Add specific description text for the iPhone', 'theme_admin'),
),
	
	array(
		'type' 			=> 'on_off',
		'id' 			=> 'iphone_coming_soon',
		'toggle'		=>  'comingsoon',
		'toggle_group' => 'iphone-group',
		'title'		 	=> __('Coming Soon Mode', 'theme_admin'),
		'description' 	=> __('If "ON", a "Coming Soon" button will display in place of the app store button.', 'theme_admin'),
		'default' 		=> 'off',
	),

	array(
		'type' 			=> 'text',
		'toggle_group'	=> 'iphone-group comingsoon',
		'id' 			=> 'iphone_coming_soon_text',
		'title'		 	=> __('Coming Soon Text', 'theme_admin'),
		'description' 	=> __('Text describing that your app is coming soon', 'theme_admin'),
	),

	array(
		'type' 			=> 'text',
		'toggle_group'	=> 'iphone-group',
		'id' 			=> 'iphone_appstore_url',
		'title'		 	=> __('iPhone App Store URL', 'theme_admin'),
		'description' 	=> __('Enter the URL of your iPhone app in the app store. This will link your visitors to buy your app. (include http://)
		', 'theme_admin'),
	),

	array(
		'type' 			=> 'text',
		'toggle_group'	=> 'iphone-group',
		'id' 			=> 'iphone_price',
		'title'		 	=> __('Price', 'theme_admin'),
		'description' 	=> __('Enter the price of your app in the app store (include currency symbol)
		', 'theme_admin'),
	),
	
	array(
		'type' 			=> 'radio_img',
		'id' 			=> 'iphone_effect',
		'toggle' 		=> 'toggle-effect-iphone',
		'toggle_group' => 'iphone-group',
		'title' 		=> __('iPhone App Showcase Type', 'theme_admin'),
		'description' 	=> 'Select how you would like to showcase your iPhone app',
		'default' 		=> 'slideshow',
		'options' 		=> array(
			'slideshow' 	=> __('Slideshow', 'theme_admin'),
			'video' 	=> __('Video', 'theme_admin'),
		),

	),
	array(
		'type' 			=> 'images',
		'id' 			=> 'iphone_slideshow_images',
		'toggle_group' 	=> 'toggle-effect-iphone toggle-effect-iphone-slideshow iphone-group',
		'title' 		=> __('Images or screenshots for iPhone slideshow', 'theme_admin'),
		'description' 	=> ''
	),
	array(
		'type' 			=> 'text',
		'id' 			=> 'iphone_video_id',
		'toggle_group' 	=> 'toggle-effect-iphone toggle-effect-iphone-video iphone-group',
		'title' 		=> __('Video ID', 'theme_admin'),
		'description' 	=> __('YouTube Video ID (the alphanumeric code after "v=" in the url) or Vimeo video ID (numeric code at the end of the url)', 'theme_admin')
	),
	




// iPad

array(
	'type' 	=> 'separator',
	'title' => __('iPad', 'theme_admin')
),

array(
	'type' 			=> 'on_off',
	'id' 			=> 'ipad',
	'toggle' 		=> 'ipad-group',
	'title'		 	=> __('iPad', 'theme_admin'),
	'description' 	=> '',
	'default' 		=> array(),
),
	
array(
	'type' 			=> 'radio_img',
	'id' 			=> 'ipad_orientation',
	'toggle_group' => 'ipad-group',
	'title' 		=> __('iPad Orientation', 'theme_admin'),
	'description' 	=> __('Choose the orientation of the iPad', 'theme_admin'),
	'default' 		=> 'portrait',
	'options' 		=> array(
		'portrait' 	=> __('Portrait', 'theme_admin'),
		'landscape' => __('Landscape', 'theme_admin'),
	),
),

array(
	'type' 			=> 'checkbox',
	'id' 			=> 'ipad_default',
	'classgroup'	=>  'isdefaultplatform',
	'toggle_group'  => 'ipad-group',
	'title'		 	=> __('Make iPad the Default Platform?', 'theme_admin'),
	'description' 	=> __('Make the iPad App visible by default when someone visits this app page. If your visitor is browsing on a device that matches one of your enabled platforms, the default platform is ignored.', 'theme_admin'),
	'default' 		=> 'unchecked',
),

array(
	'type' 			=> 'textarea',
	'id' 			=> 'ipad_description',
	'toggle_group' => 'ipad-group',
	'title'		 	=> __('iPad specific description text', 'theme_admin'),
	'description' 	=> __('Add specific description text for the iPad', 'theme_admin'),
),
	
array(
	'type' 			=> 'on_off',
	'id' 			=> 'ipad_coming_soon',
	'toggle'		=>  'ipad-comingsoon',
	'toggle_group' => 'ipad-group',
	'title'		 	=> __('Coming Soon Mode', 'theme_admin'),
	'description' 	=> __('If "ON", a "Coming Soon" button will display in place of the app store button.', 'theme_admin'),
	'default' 		=> 'off',
),

	array(
		'type' 			=> 'text',
		'toggle_group'	=> 'ipad-group ipad-comingsoon',
		'id' 			=> 'ipad_coming_soon_text',
		'title'		 	=> __('Coming Soon Text', 'theme_admin'),
		'description' 	=> __('Text describing that your app is coming soon', 'theme_admin'),
		'default' 		=> 'Coming Soon',
	),

array(
	'type' 			=> 'text',
	'id' 			=> 'ipad_appstore_url',
	'toggle_group'  => 'ipad-group',
	'title'		 	=> __('iPad App Store URL', 'theme_admin'),
	'description' 	=> __('Enter the URL of your iPad app in the app store. This will link your visitors to buy your app. (include http://)
	', 'theme_admin'),
),

array(
	'type' 			=> 'text',
	'toggle_group'	=> 'ipad-group',
	'id' 			=> 'ipad_price',
	'title'		 	=> __('Price', 'theme_admin'),
	'description' 	=> __('Enter the price of your app in the app store (include currency symbol)
	', 'theme_admin'),
),

array(
	'type' 			=> 'radio_img',
	'id' 			=> 'ipad_effect',
	'toggle' 		=> 'toggle-effect-ipad',
	'toggle_group'  => 'ipad-group',
	'title' 		=> __('iPad App Showcase Type', 'theme_admin'),
	'description' 	=> 'Select how you would like to showcase your iPad app',
	'default' 		=> 'slideshow',
	'options' 		=> array(
		'slideshow' 	=> __('Slideshow', 'theme_admin'),
		'video' 	=> __('Video', 'theme_admin'),
	),
	'images' => array(
		'slideshow' 	=> 'slideshow.png',
		'video' 	=> 'video.png',
	)
),
array(
	'type' 			=> 'images',
	'id' 			=> 'ipad_slideshow_images',
	'toggle_group' 	=> 'toggle-effect-ipad toggle-effect-ipad-slideshow ipad-group',
	'title' 		=> __('Images or screenshots for iPad slideshow', 'theme_admin'),
	'description' 	=> ''
),
array(
	'type' 			=> 'text',
	'id' 			=> 'ipad_video_id',
	'toggle_group' 	=> 'toggle-effect-ipad toggle-effect-ipad-video ipad-group',
	'title' 		=> __('Video ID', 'theme_admin'),
	'description' 	=> __('YouTube Video ID (the alphanumeric code after "v=" in the url) or Vimeo video ID (numeric code at the end of the url)', 'theme_admin')
),

	


// Android Phone

array(
	'type' 	=> 'separator',
	'title' => __('Android Phone', 'theme_admin')
),

array(
	'type' 			=> 'on_off',
	'id' 			=> 'android_phone',
	'toggle' 		=> 'android-phone-group',
	'title'		 	=> __('Android Phone', 'theme_admin'),
	'description' 	=> '',
	'default' 		=> array(),
),
	
array(
	'type' 			=> 'radio_img',
	'id' 			=> 'android_phone_orientation',
	'toggle_group' => 'android-phone-group',
	'title' 		=> __('Android Phone Orientation', 'theme_admin'),
	'description' 	=> __('Choose the orientation of the Android phone', 'theme_admin'),
	'default' 		=> 'portrait',
	'options' 		=> array(
		'portrait' 	=> __('Portrait', 'theme_admin'),
		'landscape' => __('Landscape', 'theme_admin'),
	),
),

array(
	'type' 			=> 'checkbox',
	'id' 			=> 'android_phone_default',
	'classgroup'	=>  'isdefaultplatform',
	'toggle_group' => 'android-phone-group',
	'title'		 	=> __('Make Android phone the Default Platform?', 'theme_admin'),
	'description' 	=> __('Make the Android phone app visible by default when someone visits this app page. If your visitor is browsing on a device that matches one of your other enabled platforms, the default platform is ignored.', 'theme_admin'),
	'default' 		=> 'unchecked',
),

array(
	'type' 			=> 'textarea',
	'id' 			=> 'android_phone_description',
	'toggle_group' => 'android-phone-group',
	'title'		 	=> __('Android Phone App Description', 'theme_admin'),
	'description' 	=> __('What does your app do in a couple of sentences or less? TIP: HTML is supported.', 'theme_admin'),
),

array(
	'type' 			=> 'on_off',
	'id' 			=> 'android_phone_coming_soon',
	'toggle'		=>  'android_phone_comingsoon',
	'toggle_group' => 'android-phone-group',
	'title'		 	=> __('Coming Soon Mode', 'theme_admin'),
	'description' 	=> __('If "ON", a "Coming Soon" button will display in place of the app store button.', 'theme_admin'),
	'default' 		=> 'unchecked',
),

array(
	'type' 			=> 'text',
	'toggle_group'	=> 'android-phone-group android_phone_comingsoon',
	'id' 			=> 'android_phone_coming_soon_text',
	'title'		 	=> __('Coming Soon Text', 'theme_admin'),
	'description' 	=> __('Text describing that your app is coming soon', 'theme_admin'),
	'default' 		=> 'Coming Soon',
),

array(
	'type' 			=> 'text',
	'id' 			=> 'android_phone_google_play_appstore_url',
	'toggle_group' => 'android-phone-group',
	'title'		 	=> __('Android Phone Google Play Store URL', 'theme_admin'),
	'description' 	=> __('Enter the URL of your Android phone app in the Google Play app store. This will link your visitors to get your app. (include http://)
	', 'theme_admin'),
),

array(
	'type' 			=> 'text',
	'id' 			=> 'android_phone_kindle_appstore_url',
	'toggle_group' => 'android-phone-group',
	'title'		 	=> __('Android Phone Kindle App Store URL', 'theme_admin'),
	'description' 	=> __('Enter the URL of your Android phone app in the Kindle app store. This will link your visitors to get your app for. (include http://)
	', 'theme_admin'),
),

array(
	'type' 			=> 'text',
	'toggle_group'	=> 'android-phone-group',
	'id' 			=> 'android_phone_price',
	'title'		 	=> __('Price', 'theme_admin'),
	'description' 	=> __('Enter the price of your app in the app store (include currency symbol)
	', 'theme_admin'),
),



array(
	'type' 			=> 'radio_img',
	'id' 			=> 'android_phone_effect',
	'toggle' 		=> 'toggle-effect-android-phone',
	'toggle_group' => 'android-phone-group',
	'title' 		=> __('Android Phone App Showcase Type', 'theme_admin'),
	'description' 	=> 'Select how you would like to showcase your Android phone app',
	'default' 		=> 'slideshow',
	'options' 		=> array(
		'slideshow' 	=> __('Slideshow', 'theme_admin'),
		'video' 	=> __('Video', 'theme_admin'),
	),
),
array(
	'type' 			=> 'images',
	'id' 			=> 'android_phone_slideshow_images',
	'toggle_group' 	=> 'toggle-effect-android-phone toggle-effect-android-phone-slideshow android-phone-group',
	'title' 		=> __('Images or screenshots for Android phone slideshow', 'theme_admin'),
	'description' 	=> ''
),
array(
	'type' 			=> 'text',
	'id' 			=> 'android_phone_video_id',
	'toggle_group' 	=> 'toggle-effect-android-phone toggle-effect-android-phone-video android-phone-group',
	'title' 		=> __('Video ID', 'theme_admin'),
	'description' 	=> __('YouTube Video ID (the alphanumeric code after "v=" in the url) or Vimeo video ID (numeric code at the end of the url)', 'theme_admin')
),







// Android Tablet

array(
	'type' 	=> 'separator',
	'title' => __('Android Tablet', 'theme_admin')
),

array(
	'type' 			=> 'on_off',
	'id' 			=> 'android_tablet',
	'toggle' 		=> 'android-tablet-group',
	'title'		 	=> __('Android Tablet', 'theme_admin'),
	'description' 	=> '',
	'default' 		=> array(),
),
	
array(
	'type' 			=> 'radio_img',
	'id' 			=> 'android_tablet_orientation',
	'toggle_group' => 'android-tablet-group',
	'title' 		=> __('Android Tablet Orientation', 'theme_admin'),
	'description' 	=> __('Choose the orientation of the Android Tablet', 'theme_admin'),
	'default' 		=> 'portrait',
	'options' 		=> array(
		'portrait' 	=> __('Portrait', 'theme_admin'),
		'landscape' => __('Landscape', 'theme_admin'),
	),
),

array(
	'type' 			=> 'checkbox',
	'id' 			=> 'android_tablet_default',
	'classgroup'	=>  'isdefaultplatform',
	'toggle_group' => 'android-tablet-group',
	'title'		 	=> __('Make Android Tablet the Default Platform?', 'theme_admin'),
	'description' 	=> __('Make the Android Tablet app visible by default when someone visits this app page. If your visitor is browsing on a device that matches one of your other enabled platforms, the default platform is ignored.', 'theme_admin'),
	'default' 		=> 'unchecked',
),

array(
	'type' 			=> 'textarea',
	'id' 			=> 'android_tablet_description',
	'toggle_group' => 'android-tablet-group',
	'title'		 	=> __('Android Tablet App Description', 'theme_admin'),
	'description' 	=> __('What does your app do in a couple of sentences or less? TIP: HTML is supported.', 'theme_admin'),
),

array(
	'type' 			=> 'on_off',
	'id' 			=> 'android_tablet_coming_soon',
	'toggle'		=>  'android_tablet_comingsoon',
	'toggle_group' => 'android-tablet-group',
	'title'		 	=> __('Coming Soon Mode', 'theme_admin'),
	'description' 	=> __('If "ON", a "Coming Soon" button will display in place of the app store button.', 'theme_admin'),
	'default' 		=> 'unchecked',
),

array(
	'type' 			=> 'text',
	'toggle_group'	=> 'android-tablet-group android_tablet_comingsoon',
	'id' 			=> 'android_tablet_coming_soon_text',
	'title'		 	=> __('Coming Soon Text', 'theme_admin'),
	'description' 	=> __('Text describing that your app is coming soon', 'theme_admin'),
	'default' 		=> 'Coming Soon',
),

array(
	'type' 			=> 'text',
	'id' 			=> 'android_tablet_google_play_appstore_url',
	'toggle_group' => 'android-tablet-group',
	'title'		 	=> __('Android Tablet Google Play Store URL', 'theme_admin'),
	'description' 	=> __('Enter the URL of your Android Tablet app in the Google Play app store. This will link your visitors to get your app. (include http://)
	', 'theme_admin'),
),

array(
	'type' 			=> 'text',
	'id' 			=> 'android_tablet_kindle_appstore_url',
	'toggle_group' => 'android-tablet-group',
	'title'		 	=> __('Android Tablet Kindle App Store URL', 'theme_admin'),
	'description' 	=> __('Enter the URL of your Android Tablet app in the Kindle app store. This will link your visitors to get your app for. (include http://)
	', 'theme_admin'),
),

array(
	'type' 			=> 'text',
	'toggle_group'	=> 'android-tablet-group',
	'id' 			=> 'android_tablet_price',
	'title'		 	=> __('Price', 'theme_admin'),
	'description' 	=> __('Enter the price of your app in the app store (include currency symbol)
	', 'theme_admin'),
),



array(
	'type' 			=> 'radio_img',
	'id' 			=> 'android_tablet_effect',
	'toggle' 		=> 'toggle-effect-android-tablet',
	'toggle_group' => 'android-tablet-group',
	'title' 		=> __('Android Tablet App Showcase Type', 'theme_admin'),
	'description' 	=> 'Select how you would like to showcase your Android Tablet app',
	'default' 		=> 'slideshow',
	'options' 		=> array(
		'slideshow' 	=> __('Slideshow', 'theme_admin'),
		'video' 	=> __('Video', 'theme_admin'),
	),
),
array(
	'type' 			=> 'images',
	'id' 			=> 'android_tablet_slideshow_images',
	'toggle_group' 	=> 'toggle-effect-android-tablet toggle-effect-android-tablet-slideshow android-tablet-group',
	'title' 		=> __('Images or screenshots for Android Tablet slideshow', 'theme_admin'),
	'description' 	=> ''
),
array(
	'type' 			=> 'text',
	'id' 			=> 'android_tablet_video_id',
	'toggle_group' 	=> 'toggle-effect-android-tablet toggle-effect-android-tablet-video android-tablet-group',
	'title' 		=> __('Video ID', 'theme_admin'),
	'description' 	=> __('YouTube Video ID (the alphanumeric code after "v=" in the url) or Vimeo video ID (numeric code at the end of the url)', 'theme_admin')
),











	
	
// windows phone

array(
	'type' 	=> 'separator',
	'title' => __('Windows Phone', 'theme_admin')
),

array(
	'type' 			=> 'on_off',
	'id' 			=> 'windowsphone',
	'toggle' 		=> 'windowsphone-group',
	'title'		 	=> __('Windows Phone', 'theme_admin'),
	'description' 	=> '',
	'default' 		=> array(),
),
	
array(
	'type' 			=> 'radio_img',
	'id' 			=> 'windowsphone_orientation',
	'toggle_group' => 'windowsphone-group',
	'title' 		=> __('Windows Phone Orientation', 'theme_admin'),
	'description' 	=> __('Choose the orientation of the Windows Phone', 'theme_admin'),
	'default' 		=> 'portrait',
	'options' 		=> array(
		'portrait' 	=> __('Portrait', 'theme_admin'),
		'landscape' => __('Landscape', 'theme_admin'),
	),
),

array(
	'type' 			=> 'checkbox',
	'id' 			=> 'windowsphone_default',
	'classgroup'	=>  'isdefaultplatform',
	'toggle_group'  => 'windowsphone-group',
	'title'		 	=> __('Make Windows Phone the Default Platform?', 'theme_admin'),
	'description' 	=> __('Make the Windows Phone App visible by default when someone visits this app page. If your visitor is browsing on a device that matches one of your enabled platforms, the default platform is ignored.', 'theme_admin'),
	'default' 		=> 'unchecked',
),

array(
	'type' 			=> 'textarea',
	'id' 			=> 'windowsphone_description',
	'toggle_group' => 'windowsphone-group',
	'title'		 	=> __('Windows Phone specific description text', 'theme_admin'),
	'description' 	=> __('Add specific description text for the Windows Phone', 'theme_admin'),
),
	
array(
	'type' 			=> 'on_off',
	'id' 			=> 'windowsphone_coming_soon',
	'toggle'		=>  'windowsphone-comingsoon',
	'toggle_group' => 'windowsphone-group',
	'title'		 	=> __('Coming Soon Mode', 'theme_admin'),
	'description' 	=> __('If "ON", a "Coming Soon" button will display in place of the app store button.', 'theme_admin'),
	'default' 		=> 'unchecked',
),

	array(
		'type' 			=> 'text',
		'toggle_group'	=> 'windowsphone-group windowsphone-comingsoon',
		'id' 			=> 'windowsphone_coming_soon_text',
		'title'		 	=> __('Coming Soon Text', 'theme_admin'),
		'description' 	=> __('Text describing that your app is coming soon', 'theme_admin'),
		'default' 		=> 'Coming Soon',
	),

array(
	'type' 			=> 'text',
	'id' 			=> 'windowsphone_appstore_url',
	'toggle_group'  => 'windowsphone-group',
	'title'		 	=> __('Windows Phone App Store URL', 'theme_admin'),
	'description' 	=> __('Enter the URL of your Windows Phone app in the app store. This will link your visitors to buy your app. (include http://)
	', 'theme_admin'),
),

array(
	'type' 			=> 'text',
	'toggle_group'	=> 'windowsphone-group',
	'id' 			=> 'windowsphone_price',
	'title'		 	=> __('Price', 'theme_admin'),
	'description' 	=> __('Enter the price of your app in the app store (include currency symbol)
	', 'theme_admin'),
),

array(
	'type' 			=> 'radio_img',
	'id' 			=> 'windowsphone_effect',
	'toggle' 		=> 'toggle-effect-windowsphone',
	'toggle_group'  => 'windowsphone-group',
	'title' 		=> __('Windows Phone App Showcase Type', 'theme_admin'),
	'description' 	=> 'Select how you would like to showcase your Windows Phone app',
	'default' 		=> 'slideshow',
	'options' 		=> array(
		'slideshow' 	=> __('Slideshow', 'theme_admin'),
		'video' 	=> __('Video', 'theme_admin'),
	),
	'images' => array(
		'slideshow' 	=> 'slideshow.png',
		'video' 	=> 'video.png',
	)
),
array(
	'type' 			=> 'images',
	'id' 			=> 'windowsphone_slideshow_images',
	'toggle_group' 	=> 'toggle-effect-windowsphone toggle-effect-windowsphone-slideshow windowsphone-group',
	'title' 		=> __('Images or screenshots for Windows Phone slideshow', 'theme_admin'),
	'description' 	=> ''
),
array(
	'type' 			=> 'text',
	'id' 			=> 'windowsphone_video_id',
	'toggle_group' 	=> 'toggle-effect-windowsphone toggle-effect-windowsphone-video windowsphone-group',
	'title' 		=> __('Video ID', 'theme_admin'),
	'description' 	=> __('YouTube Video ID (the alphanumeric code after "v=" in the url) or Vimeo video ID (numeric code at the end of the url)', 'theme_admin')
),






// Windows Tablet

array(
	'type' 	=> 'separator',
	'title' => __('Windows Tablet', 'theme_admin')
),

array(
	'type' 			=> 'on_off',
	'id' 			=> 'windowstablet',
	'toggle' 		=> 'windowstablet-group',
	'title'		 	=> __('Windows Tablet', 'theme_admin'),
	'description' 	=> '',
	'default' 		=> array(),
),
	
array(
	'type' 			=> 'radio_img',
	'id' 			=> 'windowstablet_orientation',
	'toggle_group' => 'windowstablet-group',
	'title' 		=> __('Windows Tablet Orientation', 'theme_admin'),
	'description' 	=> __('Choose the orientation of the Windows Tablet', 'theme_admin'),
	'default' 		=> 'portrait',
	'options' 		=> array(
		'portrait' 	=> __('Portrait', 'theme_admin'),
		'landscape' => __('Landscape', 'theme_admin'),
	),
),

array(
	'type' 			=> 'checkbox',
	'id' 			=> 'windowstablet_default',
	'classgroup'	=>  'isdefaultplatform',
	'toggle_group'  => 'windowstablet-group',
	'title'		 	=> __('Make Windows Tablet the Default Platform?', 'theme_admin'),
	'description' 	=> __('Make the Windows Tablet App visible by default when someone visits this app page. If your visitor is browsing on a device that matches one of your enabled platforms, the default platform is ignored.', 'theme_admin'),
	'default' 		=> 'unchecked',
),

array(
	'type' 			=> 'textarea',
	'id' 			=> 'windowstablet_description',
	'toggle_group' => 'windowstablet-group',
	'title'		 	=> __('Windows Tablet specific description text', 'theme_admin'),
	'description' 	=> __('Add specific description text for the Windows Tablet', 'theme_admin'),
),
	
array(
	'type' 			=> 'on_off',
	'id' 			=> 'windowstablet_coming_soon',
	'toggle'		=>  'windowstablet-comingsoon',
	'toggle_group' => 'windowstablet-group',
	'title'		 	=> __('Coming Soon Mode', 'theme_admin'),
	'description' 	=> __('If "ON", a "Coming Soon" button will display in place of the app store button.', 'theme_admin'),
	'default' 		=> 'unchecked',
),

	array(
		'type' 			=> 'text',
		'toggle_group'	=> 'windowstablet-group windowstablet-comingsoon',
		'id' 			=> 'windowstablet_coming_soon_text',
		'title'		 	=> __('Coming Soon Text', 'theme_admin'),
		'description' 	=> __('Text describing that your app is coming soon', 'theme_admin'),
		'default' 		=> 'Coming Soon',
	),

array(
	'type' 			=> 'text',
	'id' 			=> 'windowstablet_appstore_url',
	'toggle_group'  => 'windowstablet-group',
	'title'		 	=> __('Windows Tablet App Store URL', 'theme_admin'),
	'description' 	=> __('Enter the URL of your Windows Tablet app in the app store. This will link your visitors to buy your app. (include http://)
	', 'theme_admin'),
),

array(
	'type' 			=> 'text',
	'toggle_group'	=> 'windowstablet-group',
	'id' 			=> 'windowstablet_price',
	'title'		 	=> __('Price', 'theme_admin'),
	'description' 	=> __('Enter the price of your app in the app store (include currency symbol)
	', 'theme_admin'),
),

array(
	'type' 			=> 'radio_img',
	'id' 			=> 'windowstablet_effect',
	'toggle' 		=> 'toggle-effect-windowstablet',
	'toggle_group'  => 'windowstablet-group',
	'title' 		=> __('Windows Tablet App Showcase Type', 'theme_admin'),
	'description' 	=> 'Select how you would like to showcase your Windows Tablet app',
	'default' 		=> 'slideshow',
	'options' 		=> array(
		'slideshow' 	=> __('Slideshow', 'theme_admin'),
		'video' 	=> __('Video', 'theme_admin'),
	),
	'images' => array(
		'slideshow' 	=> 'slideshow.png',
		'video' 	=> 'video.png',
	)
),
array(
	'type' 			=> 'images',
	'id' 			=> 'windowstablet_slideshow_images',
	'toggle_group' 	=> 'toggle-effect-windowstablet toggle-effect-windowstablet-slideshow windowstablet-group',
	'title' 		=> __('Images or screenshots for Windows Tablet slideshow', 'theme_admin'),
	'description' 	=> ''
),
array(
	'type' 			=> 'text',
	'id' 			=> 'windowstablet_video_id',
	'toggle_group' 	=> 'toggle-effect-windowstablet toggle-effect-windowstablet-video windowstablet-group',
	'title' 		=> __('Video ID', 'theme_admin'),
	'description' 	=> __('YouTube Video ID (the alphanumeric code after "v=" in the url) or Vimeo video ID (numeric code at the end of the url)', 'theme_admin')
),






// blackberry

array(
	'type' 	=> 'separator',
	'title' => __('BlackBerry', 'theme_admin')
),

array(
	'type' 			=> 'on_off',
	'id' 			=> 'blackberry',
	'toggle' 		=> 'blackberry-group',
	'title'		 	=> __('BlackBerry', 'theme_admin'),
	'description' 	=> '',
	'default' 		=> array(),
),
	
array(
	'type' 			=> 'radio_img',
	'id' 			=> 'blackberry_orientation',
	'toggle_group' => 'blackberry-group',
	'title' 		=> __('BlackBerry Orientation', 'theme_admin'),
	'description' 	=> __('Choose the orientation of the BlackBerry', 'theme_admin'),
	'default' 		=> 'portrait',
	'options' 		=> array(
		'portrait' 	=> __('Portrait', 'theme_admin'),
		'landscape' => __('Landscape', 'theme_admin'),
	),
),

array(
	'type' 			=> 'checkbox',
	'id' 			=> 'blackberry_default',
	'classgroup'	=>  'isdefaultplatform',
	'toggle_group'  => 'blackberry-group',
	'title'		 	=> __('Make BlackBerry the Default Platform?', 'theme_admin'),
	'description' 	=> __('Make the BlackBerry App visible by default when someone visits this app page. If your visitor is browsing on a device that matches one of your enabled platforms, the default platform is ignored.', 'theme_admin'),
	'default' 		=> 'unchecked',
),

array(
	'type' 			=> 'textarea',
	'id' 			=> 'blackberry_description',
	'toggle_group' => 'blackberry-group',
	'title'		 	=> __('BlackBerry specific description text', 'theme_admin'),
	'description' 	=> __('Add specific description text for the BlackBerry', 'theme_admin'),
),
	
array(
	'type' 			=> 'on_off',
	'id' 			=> 'blackberry_coming_soon',
	'toggle'		=>  'blackberry-comingsoon',
	'toggle_group' => 'blackberry-group',
	'title'		 	=> __('Coming Soon Mode', 'theme_admin'),
	'description' 	=> __('If "ON", a "Coming Soon" button will display in place of the app store button.', 'theme_admin'),
	'default' 		=> 'unchecked',
),

	array(
		'type' 			=> 'text',
		'toggle_group'	=> 'blackberry-group blackberry-comingsoon',
		'id' 			=> 'blackberry_coming_soon_text',
		'title'		 	=> __('Coming Soon Text', 'theme_admin'),
		'description' 	=> __('Text describing that your app is coming soon', 'theme_admin'),
		'default' 		=> 'Coming Soon',
	),

array(
	'type' 			=> 'text',
	'id' 			=> 'blackberry_appstore_url',
	'toggle_group'  => 'blackberry-group',
	'title'		 	=> __('BlackBerry App Store URL', 'theme_admin'),
	'description' 	=> __('Enter the URL of your BlackBerry app in the app store. This will link your visitors to buy your app. (include http://)
	', 'theme_admin'),
),

array(
	'type' 			=> 'text',
	'toggle_group'	=> 'blackberry-group',
	'id' 			=> 'blackberry_price',
	'title'		 	=> __('Price', 'theme_admin'),
	'description' 	=> __('Enter the price of your app in the app store (include currency symbol)
	', 'theme_admin'),
),

array(
	'type' 			=> 'radio_img',
	'id' 			=> 'blackberry_effect',
	'toggle' 		=> 'toggle-effect-blackberry',
	'toggle_group'  => 'blackberry-group',
	'title' 		=> __('BlackBerry App Showcase Type', 'theme_admin'),
	'description' 	=> 'Select how you would like to showcase your BlackBerry app',
	'default' 		=> 'slideshow',
	'options' 		=> array(
		'slideshow' 	=> __('Slideshow', 'theme_admin'),
		'video' 	=> __('Video', 'theme_admin'),
	),
	'images' => array(
		'slideshow' 	=> 'slideshow.png',
		'video' 	=> 'video.png',
	)
),
array(
	'type' 			=> 'images',
	'id' 			=> 'blackberry_slideshow_images',
	'toggle_group' 	=> 'toggle-effect-blackberry toggle-effect-blackberry-slideshow blackberry-group',
	'title' 		=> __('Images or screenshots for BlackBerry slideshow', 'theme_admin'),
	'description' 	=> ''
),
array(
	'type' 			=> 'text',
	'id' 			=> 'blackberry_video_id',
	'toggle_group' 	=> 'toggle-effect-blackberry toggle-effect-blackberry-video blackberry-group',
	'title' 		=> __('Video ID', 'theme_admin'),
	'description' 	=> __('YouTube Video ID (the alphanumeric code after "v=" in the url) or Vimeo video ID (numeric code at the end of the url)', 'theme_admin')
),




// Mac Desktop

array(
	'type' 	=> 'separator',
	'title' => __('Mac Desktop', 'theme_admin')
),

array(
	'type' 			=> 'on_off',
	'id' 			=> 'desktopmac',
	'toggle' 		=> 'desktopmac-group',
	'title'		 	=> __('Mac Desktop', 'theme_admin'),
	'description' 	=> '',
	'default' 		=> array(),
),

array(
	'type' 			=> 'checkbox',
	'id' 			=> 'desktopmac_default',
	'classgroup'	=>  'isdefaultplatform',
	'toggle_group'  => 'desktopmac-group',
	'title'		 	=> __('Make Mac Desktop the Default Platform?', 'theme_admin'),
	'description' 	=> __('Make the Mac Desktop App visible by default when someone visits this app page. If your visitor is browsing on a device that matches one of your enabled platforms, the default platform is ignored.', 'theme_admin'),
	'default' 		=> 'unchecked',
),

array(
	'type' 			=> 'textarea',
	'id' 			=> 'desktopmac_description',
	'toggle_group' => 'desktopmac-group',
	'title'		 	=> __('Mac Desktop specific description text', 'theme_admin'),
	'description' 	=> __('Add specific description text for the Mac Desktop', 'theme_admin'),
),
	
array(
	'type' 			=> 'on_off',
	'id' 			=> 'desktopmac_coming_soon',
	'toggle'		=>  'desktopmac-comingsoon',
	'toggle_group' => 'desktopmac-group',
	'title'		 	=> __('Coming Soon Mode', 'theme_admin'),
	'description' 	=> __('If "ON", a "Coming Soon" button will display in place of the app store button.', 'theme_admin'),
	'default' 		=> 'unchecked',
),

	array(
		'type' 			=> 'text',
		'toggle_group'	=> 'desktopmac-group desktopmac-comingsoon',
		'id' 			=> 'desktopmac_coming_soon_text',
		'title'		 	=> __('Coming Soon Text', 'theme_admin'),
		'description' 	=> __('Text describing that your app is coming soon', 'theme_admin'),
		'default' 		=> 'Coming Soon',
	),

array(
	'type' 			=> 'text',
	'id' 			=> 'desktopmac_appstore_url',
	'toggle_group'  => 'desktopmac-group',
	'title'		 	=> __('Mac Desktop URL', 'theme_admin'),
	'description' 	=> __('Enter the URL of your Mac Desktop app in the app store. This will link your visitors to buy your app. (include http://)
	', 'theme_admin'),
),

array(
	'type' 			=> 'text',
	'toggle_group'	=> 'desktopmac-group',
	'id' 			=> 'desktopmac_price',
	'title'		 	=> __('Price', 'theme_admin'),
	'description' 	=> __('Enter the price of your app in the app store (include currency symbol)
	', 'theme_admin'),
),

array(
	'type' 			=> 'radio_img',
	'id' 			=> 'desktopmac_effect',
	'toggle' 		=> 'toggle-effect-desktopmac',
	'toggle_group'  => 'desktopmac-group',
	'title' 		=> __('Mac Desktop Showcase Type', 'theme_admin'),
	'description' 	=> 'Select how you would like to showcase your Mac Desktop app',
	'default' 		=> 'slideshow',
	'options' 		=> array(
		'slideshow' 	=> __('Slideshow', 'theme_admin'),
		'video' 	=> __('Video', 'theme_admin'),
	),
	'images' => array(
		'slideshow' 	=> 'slideshow.png',
		'video' 	=> 'video.png',
	)
),
array(
	'type' 			=> 'images',
	'id' 			=> 'desktopmac_slideshow_images',
	'toggle_group' 	=> 'toggle-effect-desktopmac toggle-effect-desktopmac-slideshow desktopmac-group',
	'title' 		=> __('Images or screenshots for Mac Desktop slideshow', 'theme_admin'),
	'description' 	=> ''
),
array(
	'type' 			=> 'text',
	'id' 			=> 'desktopmac_video_id',
	'toggle_group' 	=> 'toggle-effect-desktopmac toggle-effect-desktopmac-video desktopmac-group',
	'title' 		=> __('Video ID', 'theme_admin'),
	'description' 	=> __('YouTube Video ID (the alphanumeric code after "v=" in the url) or Vimeo video ID (numeric code at the end of the url)', 'theme_admin')
),





// Windows Desktop

array(
	'type' 	=> 'separator',
	'title' => __('Windows Desktop', 'theme_admin')
),

array(
	'type' 			=> 'on_off',
	'id' 			=> 'desktoppc',
	'toggle' 		=> 'desktoppc-group',
	'title'		 	=> __('Windows Desktop', 'theme_admin'),
	'description' 	=> '',
	'default' 		=> array(),
),

array(
	'type' 			=> 'checkbox',
	'id' 			=> 'desktoppc_default',
	'classgroup'	=>  'isdefaultplatform',
	'toggle_group'  => 'desktoppc-group',
	'title'		 	=> __('Make Windows Desktop the Default Platform?', 'theme_admin'),
	'description' 	=> __('Make the Windows Desktop App visible by default when someone visits this app page. If your visitor is browsing on a device that matches one of your enabled platforms, the default platform is ignored.', 'theme_admin'),
	'default' 		=> 'unchecked',
),

array(
	'type' 			=> 'textarea',
	'id' 			=> 'desktoppc_description',
	'toggle_group' => 'desktoppc-group',
	'title'		 	=> __('Windows Desktop specific description text', 'theme_admin'),
	'description' 	=> __('Add specific description text for the Windows Desktop', 'theme_admin'),
),
	
array(
	'type' 			=> 'on_off',
	'id' 			=> 'desktoppc_coming_soon',
	'toggle'		=>  'desktoppc-comingsoon',
	'toggle_group' => 'desktoppc-group',
	'title'		 	=> __('Coming Soon Mode', 'theme_admin'),
	'description' 	=> __('If "ON", a "Coming Soon" button will display in place of the app store button.', 'theme_admin'),
	'default' 		=> 'unchecked',
),

	array(
		'type' 			=> 'text',
		'toggle_group'	=> 'desktoppc-group desktoppc-comingsoon',
		'id' 			=> 'desktoppc_coming_soon_text',
		'title'		 	=> __('Coming Soon Text', 'theme_admin'),
		'description' 	=> __('Text describing that your app is coming soon', 'theme_admin'),
		'default' 		=> 'Coming Soon',
	),

array(
	'type' 			=> 'text',
	'id' 			=> 'desktoppc_appstore_url',
	'toggle_group'  => 'desktoppc-group',
	'title'		 	=> __('Windows Desktop Download URL', 'theme_admin'),
	'description' 	=> __('Enter the URL of your Windows Desktop app in the app store. This will link your visitors to buy your app. (include http://)
	', 'theme_admin'),
),

array(
	'type' 			=> 'text',
	'toggle_group'	=> 'desktoppc-group',
	'id' 			=> 'desktoppc_price',
	'title'		 	=> __('Price', 'theme_admin'),
	'description' 	=> __('Enter the price of your app in the app store (include currency symbol)
	', 'theme_admin'),
),

array(
	'type' 			=> 'radio_img',
	'id' 			=> 'desktoppc_effect',
	'toggle' 		=> 'toggle-effect-desktoppc',
	'toggle_group'  => 'desktoppc-group',
	'title' 		=> __('Windows Desktop Showcase Type', 'theme_admin'),
	'description' 	=> 'Select how you would like to showcase your Windows Desktop app',
	'default' 		=> 'slideshow',
	'options' 		=> array(
		'slideshow' 	=> __('Slideshow', 'theme_admin'),
		'video' 	=> __('Video', 'theme_admin'),
	),
	'images' => array(
		'slideshow' 	=> 'slideshow.png',
		'video' 	=> 'video.png',
	)
),
array(
	'type' 			=> 'images',
	'id' 			=> 'desktoppc_slideshow_images',
	'toggle_group' 	=> 'toggle-effect-desktoppc toggle-effect-desktoppc-slideshow desktoppc-group',
	'title' 		=> __('Images or screenshots for Windows Desktop slideshow', 'theme_admin'),
	'description' 	=> ''
),
array(
	'type' 			=> 'text',
	'id' 			=> 'desktoppc_video_id',
	'toggle_group' 	=> 'toggle-effect-desktoppc toggle-effect-desktoppc-video desktoppc-group',
	'title' 		=> __('Video ID', 'theme_admin'),
	'description' 	=> __('YouTube Video ID (the alphanumeric code after "v=" in the url) or Vimeo video ID (numeric code at the end of the url)', 'theme_admin')
),
	
		
	
);
new metaboxes_tool($config,$options);

?>