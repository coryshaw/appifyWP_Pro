<?php
/*
 * Resize images dynamically using wp built in functions
 * Victor Teixeira
 *
 * php 5.2+
 *
 * Exemplo de uso:
 * 
 * <?php 
 * $thumb = get_post_thumbnail_id(); 
 * $image = vt_resize( $thumb, '', 140, 110, true );
 * ?>
 * <img src="<?php echo $image[url]; ?>" width="<?php echo $image[width]; ?>" height="<?php echo $image[height]; ?>" />
 *
 * @param int $attach_id
 * @param string $img_url
 * @param int $width
 * @param int $height
 * @param bool $crop
 * @return array
 */
function vt_resize( $attach_id = null, $img_url = null, $width, $height, $crop = false ) {

	// this is an attachment, so we have the ID
	if ( $attach_id ) {
	
		$image_src = wp_get_attachment_image_src( $attach_id, 'full' );
		$file_path = get_attached_file( $attach_id );
	
	// this is not an attachment, let's use the image url
	} else if ( $img_url ) {
		
		$file_path = getLocalImagePath( $img_url, calcDocRoot() );
		$orig_size = @getimagesize( $file_path );
		if( !$orig_size ) $orig_size = getimagesize( $img_url );

		$image_src[0] = $img_url;
		$image_src[1] = $orig_size[0];
		$image_src[2] = $orig_size[1];
	}
	
	$file_info = pathinfo( $file_path );
	$extension = '.'. $file_info['extension'];

	// the image path without the extension
	$no_ext_path = $file_info['dirname'].'/'.$file_info['filename'];

	$cropped_img_path = $no_ext_path.'-'.$width.'x'.$height.$extension;

	// checking if the file size is larger than the target size
	// if it is smaller or the same size, stop right here and return
	if ( $image_src[1] > $width || $image_src[2] > $height ) {

		// the file is larger, check if the resized version already exists (for $crop = true but will also work for $crop = false if the sizes match)
		if ( @file_exists( $cropped_img_path ) ) {

			$cropped_img_url = str_replace( basename( $image_src[0] ), basename( $cropped_img_path ), $image_src[0] );
			
			$vt_image = array (
				'url' => $cropped_img_url,
				'width' => $width,
				'height' => $height
			);
			
			return $vt_image;
		}

		// $crop = false
		if ( $crop == false ) {
		
			// calculate the size proportionaly
			$proportional_size = wp_constrain_dimensions( $image_src[1], $image_src[2], $width, $height );
			$resized_img_path = $no_ext_path.'-'.$proportional_size[0].'x'.$proportional_size[1].$extension;			

			// checking if the file already exists
			if ( @file_exists( $resized_img_path ) ) {
			
				$resized_img_url = str_replace( basename( $image_src[0] ), basename( $resized_img_path ), $image_src[0] );

				$vt_image = array (
					'url' => $resized_img_url,
					'width' => $proportional_size[0],
					'height' => $proportional_size[1]
				);
				
				return $vt_image;
			}
		}

		// no cache files - let's finally resize it
		$new_img_path = image_resize( $file_path, $width, $height, $crop, null, null, 100 );

		// If there are error in resizing process
		if( is_wp_error( $new_img_path ) ) {
			// resized output
			$vt_image = array (
				'url' => $image_src[0],
				'width' => $image_src[1],
				'height' => $image_src[2]
			);
		} else {
			$new_img_size = getimagesize( $new_img_path );
			$new_img = str_replace( basename( $image_src[0] ), basename( $new_img_path ), $image_src[0] );

			// resized output
			$vt_image = array (
				'url' => $new_img,
				'width' => $new_img_size[0],
				'height' => $new_img_size[1]
			);
		}

		return $vt_image;
	}

	// default output - without resizing
	$vt_image = array (
		'url' => $image_src[0],
		'width' => $image_src[1],
		'height' => $image_src[2]
	);
	
	return $vt_image;
}

function calcDocRoot(){
	$docRoot = @$_SERVER['DOCUMENT_ROOT'];
	if (defined('LOCAL_FILE_BASE_DIRECTORY')) {
		$docRoot = LOCAL_FILE_BASE_DIRECTORY;   
	}
	if(!isset($docRoot)){ 
		vt_debug(3, "DOCUMENT_ROOT is not set. This is probably windows. Starting search 1.");
		if(isset($_SERVER['SCRIPT_FILENAME'])){
			$docRoot = str_replace( '\\', '/', substr($_SERVER['SCRIPT_FILENAME'], 0, 0-strlen($_SERVER['PHP_SELF'])));
			vt_debug(3, "Generated docRoot using SCRIPT_FILENAME and PHP_SELF as: $docRoot");
		} 
	}
	if(!isset($docRoot)){ 
		vt_debug(3, "DOCUMENT_ROOT still is not set. Starting search 2.");
		if(isset($_SERVER['PATH_TRANSLATED'])){
			$docRoot = str_replace( '\\', '/', substr(str_replace('\\\\', '\\', $_SERVER['PATH_TRANSLATED']), 0, 0-strlen($_SERVER['PHP_SELF'])));
			vt_debug(3, "Generated docRoot using PATH_TRANSLATED and PHP_SELF as: $docRoot");
		} 
	}
	if($docRoot && $_SERVER['DOCUMENT_ROOT'] != '/'){ $docRoot = preg_replace('/\/$/', '', $docRoot); }
	
	return $docRoot;
}

function getLocalImagePath($src, $docRoot){
	
	$myHost = preg_replace('/^www\./i', '', $_SERVER['HTTP_HOST']);
	$src = preg_replace('/https?:\/\/(?:www\.)?' . $myHost . '/i', '', $src);

	$src = ltrim($src, '/'); //strip off the leading '/'
	if(! $docRoot){
		vt_debug(3, "We have no document root set, so as a last resort, lets check if the image is in the current dir and serve that.");
		//We don't support serving images outside the current dir if we don't have a doc root for security reasons.
		$file = preg_replace('/^.*?([^\/\\\\]+)$/', '$1', $src); //strip off any path info and just leave the filename.
		if(is_file($file)){
			return vt_realpath($file);
		}
		return vt_error("Could not find your website document root and the file specified doesn't exist in timthumbs directory. We don't support serving files outside timthumb's directory without a document root for security reasons.");
	} //Do not go past this point without docRoot set

	//Try src under docRoot
	if(@file_exists ($docRoot . '/' . $src)) {
		vt_debug(3, "Found file as " . $docRoot . '/' . $src);
		$real = vt_realpath($docRoot . '/' . $src);
		if(stripos($real, $docRoot) === 0){
			return $real;
		} else {
			vt_debug(1, "Security block: The file specified occurs outside the document root.");
			//allow search to continue
		}
	}
	//Check absolute paths and then verify the real path is under doc root
	$absolute = vt_realpath('/' . $src);
	if($absolute && @file_exists($absolute)){ //vt_realpath does @file_exists check, so can probably skip the exists check here
		vt_debug(3, "Found absolute path: $absolute");
		if(! $docRoot){ $this->sanityFail("docRoot not set when checking absolute path."); }
		if(stripos($absolute, $docRoot) === 0){
			return $absolute;
		} else {
			vt_debug(1, "Security block: The file specified occurs outside the document root.");
			//and continue search
		}
	}
	
	$base = $docRoot;
	
	// account for Windows directory structure
	if (strstr($_SERVER['SCRIPT_FILENAME'],':')) {
		$sub_directories = explode('\\', str_replace($docRoot, '', $_SERVER['SCRIPT_FILENAME']));
	} else {
		$sub_directories = explode('/', str_replace($docRoot, '', $_SERVER['SCRIPT_FILENAME']));
	}

	foreach ($sub_directories as $sub){
		$base .= $sub . '/';
		vt_debug(3, "Trying file as: " . $base . $src);
		
		if(@file_exists($base . $src)){
			vt_debug(3, "Found file as: " . $base . $src);
			$real = vt_realpath($base . $src);
			if(stripos($real, vt_realpath($docRoot)) === 0){
				return $real;
			} else {
				vt_debug(1, "Security block: The file specified occurs outside the document root.");
				//And continue search
			}
		}
	}
	return false;
}

function vt_realpath($path){
	//try to remove any relative paths
	$remove_relatives = '/\w+\/\.\.\//';
	while(preg_match($remove_relatives,$path)){
	    $path = preg_replace($remove_relatives, '', $path);
	}
	//if any remain use PHP vt_realpath to strip them out, otherwise return $path
	//if using vt_realpath, any symlinks will also be resolved
	return preg_match('#^\.\./|/\.\./#', $path) ? vt_realpath($path) : $path;
}

function vt_debug($level, $msg){
	return;
}

function vt_error($level, $msg){
	die($msg);
}

