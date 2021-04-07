<?php

/* Text */

add_filter( 'of_sanitize_text', 'sanitize_text_field' );

/* Textarea */

function of_sanitize_textarea($input) {
	global $allowedposttags;
	$output = wp_kses( $input, $allowedposttags);
	return $output;
}

add_filter( 'of_sanitize_textarea', 'of_sanitize_textarea' );

/* Select */

add_filter( 'of_sanitize_select', 'of_sanitize_enum', 10, 2);

/* Radio */

add_filter( 'of_sanitize_radio', 'of_sanitize_enum', 10, 2);

/* Images */

add_filter( 'of_sanitize_images', 'of_sanitize_enum', 10, 2);

/* Checkbox */

function of_sanitize_checkbox( $input ) {
	if ( $input ) {
		$output = '1';
	} else {
		$output = false;
	}
	return $output;
}
add_filter( 'of_sanitize_checkbox', 'of_sanitize_checkbox' );

/**
 * Sanitization for multicheck
 *
 * @param array of checkbox values
 * @return array of sanitized values ('1' or false)
 */
function of_sanitize_multicheck( $input, $option ) {
	$output = (array) '';
	if ( is_array( $input ) ) {
		foreach( $option['options'] as $key => $value ) {
			$output[$key] = '';
		}
		foreach( $input as $key => $value ) {
			if ( array_key_exists( $key, $option['options'] ) && $value ) {
				$output[$key] = '1';
			}
		}
	}
	return $output;
}
add_filter( 'of_sanitize_multicheck', 'of_sanitize_multicheck', 10, 2 );





/* Color Picker */

add_filter( 'of_sanitize_color', 'of_sanitize_hex' );

/* Uploader */

function of_sanitize_upload( $input ) {
	$output = '';
	$filetype = wp_check_filetype($input);
	if ( $filetype["ext"] ) {
		$output = $input;
	}
	return $output;
}
add_filter( 'of_sanitize_upload', 'of_sanitize_upload' );

/* Editor */

function of_sanitize_editor($input) {
	if ( current_user_can( 'unfiltered_html' ) ) {
		$output = $input;
	}
	else {
		global $allowedtags;
		$output = wpautop(wp_kses( $input, $allowedtags));
	}
	return $output;
}
add_filter( 'of_sanitize_editor', 'of_sanitize_editor' );

/* Allowed Tags */

function of_sanitize_allowedtags($input) {
	global $allowedtags;
	$output = wpautop(wp_kses( $input, $allowedtags));
	return $output;
}

/* Allowed Post Tags */

function of_sanitize_allowedposttags($input) {
	global $allowedposttags;
	$output = wpautop(wp_kses( $input, $allowedposttags));
	return $output;
}

add_filter( 'of_sanitize_info', 'of_sanitize_allowedposttags' );


/* Check that the key value sent is valid */

function of_sanitize_enum( $input, $option ) {
	$output = '';
	if ( array_key_exists( $input, $option['options'] ) ) {
		$output = $input;
	}
	return $output;
}

/* Background */

function of_sanitize_background( $input ) {
	$output = wp_parse_args( $input, array(
		'color' => '',
		'image'  => '',
		'repeat'  => 'repeat',
		'position' => 'top center',
		'attachment' => 'scroll'
	) );

	$output['color'] = apply_filters( 'of_sanitize_hex', $input['color'] );
	$output['image'] = apply_filters( 'of_sanitize_upload', $input['image'] );
	$output['repeat'] = apply_filters( 'of_background_repeat', $input['repeat'] );
	$output['position'] = apply_filters( 'of_background_position', $input['position'] );
	$output['attachment'] = apply_filters( 'of_background_attachment', $input['attachment'] );

	return $output;
}
add_filter( 'of_sanitize_background', 'of_sanitize_background' );

function of_sanitize_background_repeat( $value ) {
	$recognized = of_recognized_background_repeat();
	if ( array_key_exists( $value, $recognized ) ) {
		return $value;
	}
	return apply_filters( 'of_default_background_repeat', current( $recognized ) );
}
add_filter( 'of_background_repeat', 'of_sanitize_background_repeat' );

function of_sanitize_background_position( $value ) {
	$recognized = of_recognized_background_position();
	if ( array_key_exists( $value, $recognized ) ) {
		return $value;
	}
	return apply_filters( 'of_default_background_position', current( $recognized ) );
}
add_filter( 'of_background_position', 'of_sanitize_background_position' );

function of_sanitize_background_attachment( $value ) {
	$recognized = of_recognized_background_attachment();
	if ( array_key_exists( $value, $recognized ) ) {
		return $value;
	}
	return apply_filters( 'of_default_background_attachment', current( $recognized ) );
}
add_filter( 'of_background_attachment', 'of_sanitize_background_attachment' );


/* Typography */

function of_sanitize_typography( $input, $option ) {

	$output = wp_parse_args( $input, array(
		'size'  => '',
		'face'  => '',
		'style' => '',
		'color' => ''
	) );

	if ( isset( $option['options']['faces'] ) && isset( $input['face'] ) ) {
		if ( !( array_key_exists( $input['face'], $option['options']['faces'] ) ) ) {
			$output['face'] = '';
		}
	}
	else {
		$output['face']  = apply_filters( 'of_font_face', $output['face'] );
	}

	$output['size']  = apply_filters( 'of_font_size', $output['size'] );
	$output['style'] = apply_filters( 'of_font_style', $output['style'] );
	$output['color'] = apply_filters( 'of_sanitize_color', $output['color'] );
	return $output;
}
add_filter( 'of_sanitize_typography', 'of_sanitize_typography', 10, 2 );

function of_sanitize_font_size( $value ) {
	$recognized = of_recognized_font_sizes();
	$value_check = preg_replace('/px/','', $value);
	if ( in_array( (int) $value_check, $recognized ) ) {
		return $value;
	}
	return apply_filters( 'of_default_font_size', $recognized );
}
add_filter( 'of_font_size', 'of_sanitize_font_size' );


function of_sanitize_font_style( $value ) {
	$recognized = of_recognized_font_styles();
	if ( array_key_exists( $value, $recognized ) ) {
		return $value;
	}
	return apply_filters( 'of_default_font_style', current( $recognized ) );
}
add_filter( 'of_font_style', 'of_sanitize_font_style' );


function of_sanitize_font_face( $value ) {
	$recognized = of_recognized_font_faces();
	if ( array_key_exists( $value, $recognized ) ) {
		return $value;
	}
	return apply_filters( 'of_default_font_face', current( $recognized ) );
}
add_filter( 'of_font_face', 'of_sanitize_font_face' );



//sendsay

function of_sanitize_smart( $input ) {

	$output = wp_parse_args( $input, array(
		'formname'  => '',
		'sendsayformkod'  => '',
		'sendsayformid' => '',
		'idname' => ''
		
		
	) );
	
	$output['formname']  = apply_filters( 'of_sanitize_formname', $output['formname'] );
	$output['sendsayformkod'] = apply_filters( 'of_sanitize_sendsayformkod', $output['sendsayformkod'] );
	$output['sendsayformid'] = apply_filters( 'of_sanitize_sendsayformid', $output['sendsayformid'] );
	$output['idname'] = apply_filters( 'of_sanitize_idname', $output['idname'] );
	
	
	return $output;
	
	
	}
	add_filter( 'of_sanitize_smart', 'of_sanitize_smart', 10, 2 );

function of_sanitize_formname( $value ) {
	add_filter( 'of_sanitize_formname', 'sanitize_formname_field' );
	}
	
	function of_sanitize_sendsayformid( $value ) {
	add_filter( 'of_sanitize_sendsayformid', 'sanitize_sendsayformid_field' );
	}

function of_sanitize_sendsayformkod( $value ) {
	add_filter( 'of_sanitize_sendsayformkod', 'sanitize_sendsayformkod_field' );
	}
	
	function of_sanitize_idname( $value ) {
	add_filter( 'of_sanitize_idname', 'sanitize_idname_field' );
	}
	
	
	
	
	
	//getresponse
	





function of_sanitize_getresponse( $input ) {





	$output = wp_parse_args( $input, array(
		'formid'  => '',
		'old'  => '',
		'thankyouurl' =>''
		
	) );
	
	$output['formid']  = apply_filters( 'of_sanitize_formid', $output['formid'] );
	$output['thankyouurl']  = apply_filters( 'of_sanitize_thankyouurl', $output['thankyouurl'] );
	
	

		if ( $output['old'] ) {
		$output['old'] = '1';
	} else {
		$output['old'] = false;
	}
	
	return $output;
	
	
	}
	add_filter( 'of_sanitize_getresponse', 'of_sanitize_getresponse', 10, 2 );

function of_sanitize_formid( $value ) {
	add_filter( 'of_sanitize_formid', 'sanitize_formid_field' );

	}
	
	function of_sanitize_old( $value ) {
	add_filter( 'of_sanitize_old', 'sanitize_old_field' );

	}
	
	function of_sanitize_thankyouurl( $value ) {
	add_filter( 'of_sanitize_thankyouurl', 'sanitize_thankyouurl_field' );

	}
	
	
	
	
	
	//getresponse360
	
function of_sanitize_getresponse360( $input ) {

$output = wp_parse_args( $input, array(
		'formid360'  => '',
		'getresponse360link'  => '',
		'thankyou360' =>''
		
	) );
	
	$output['formid360']  = apply_filters( 'of_sanitize_formid360', $output['formid360'] );
	$output['thankyou360']  = apply_filters( 'of_sanitize_thankyou360', $output['thankyou360'] );
		$output['getresponse360link']  = apply_filters( 'of_sanitize_getresponse360link', $output['getresponse360link'] );
	

	
	return $output;
	
	
	}
	add_filter( 'of_sanitize_getresponse360', 'of_sanitize_getresponse360', 10, 2 );

function of_sanitize_formid360( $value ) {
	add_filter( 'of_sanitize_formid360', 'sanitize_formid360_field' );

	}
	
	function of_sanitize_getresponse360link( $value ) {
	add_filter( 'of_sanitize_getresponse360link', 'sanitize_getresponse360link_field' );

	}
	
	function of_sanitize_thankyou360( $value ) {
	add_filter( 'of_sanitize_thankyou360', 'sanitize_thankyou360_field' );

	}
	
	
	
	
	//sendpulse

function of_sanitize_sendpulse( $input ) {

	$output = wp_parse_args( $input, array(
		'idform'  => '',
		'hashform'  => '',
		'idscript' => '',
		'sendpulseidscript' => ''
		
		
	) );
	
	$output['idform']  = apply_filters( 'of_sanitize_idform', $output['idform'] );
	$output['hashform'] = apply_filters( 'of_sanitize_hashform', $output['hashform'] );
	$output['idscript'] = apply_filters( 'of_sanitize_idscript', $output['idscript'] );
	$output['sendpulseidscript'] = apply_filters( 'of_sanitize_sendpulseidscript', $output['sendpulseidscript'] );
	
	
	return $output;
	
	
	}
	add_filter( 'of_sanitize_sendpulse', 'of_sanitize_sendpulse', 10, 2 );

function of_sanitize_idform( $value ) {
	add_filter( 'of_sanitize_idform', 'sanitize_idform_field' );
	}
	
	function of_sanitize_hashform( $value ) {
	add_filter( 'of_sanitize_hashform', 'sanitize_hashform_field' );
	}

function of_sanitize_idscript( $value ) {
	add_filter( 'of_sanitize_idscript', 'sanitize_idscript_field' );
	}
	
	function of_sanitize_sendpulseidscript( $value ) {
	add_filter( 'of_sanitize_sendpulseidscript', 'sanitize_sendpulseidscript_field' );
	}
	

	

	
	
		//onebutton

function of_sanitize_onebutton( $input ) {

	$output = wp_parse_args( $input, array(
		'oneid'  => ''
	) );
	
	$output['oneid']  = apply_filters( 'of_sanitize_oneid', $output['oneid'] );
	
	return $output;
	
	
	}
	add_filter( 'of_sanitize_onebutton', 'of_sanitize_onebutton', 10, 2 );

function of_sanitize_oneid( $value ) {
	add_filter( 'of_sanitize_oneid', 'sanitize_oneid_field' );
	}
	
	
	//Justclick
	
	function of_sanitize_just( $input ) {

	$output = wp_parse_args( $input, array(
		'login'  => '',
		'marker'  => '',
		'group' => '',
	    'linktwo' => ''
	) );
	
	$output['login']  = apply_filters( 'of_sanitize_login', $output['login'] );
	$output['marker'] = apply_filters( 'of_sanitize_marker', $output['marker'] );
	$output['group'] = apply_filters( 'of_sanitize_group', $output['group'] );
	$output['linktwo'] = apply_filters( 'of_sanitize_linktwo', $output['linktwo'] );
	return $output;
	
	
	}
	add_filter( 'of_sanitize_just', 'of_sanitize_just', 10, 2 );

function of_sanitize_login( $value ) {
	add_filter( 'of_sanitize_login', 'sanitize_login_field' );
	}
	
	function of_sanitize_marker( $value ) {
	add_filter( 'of_sanitize_marker', 'sanitize_marker_field' );
	}

function of_sanitize_group( $value ) {
	add_filter( 'of_sanitize_group', 'sanitize_group_field' );
	}



function of_sanitize_linktwo( $value ) {
	add_filter( 'of_sanitize_linktwo', 'sanitize_linktwo_field' );
	}



//Mailchimp
	
	function of_sanitize_mailchimp( $input ) {

	$output = wp_parse_args( $input, array(
		'login'  => '',
		'marker'  => '',
		'group' => ''
	    
	) );
	
	$output['login']  = apply_filters( 'of_sanitize_login_mailchimp', $output['login'] );
	$output['marker'] = apply_filters( 'of_sanitize_marker_mailchimp', $output['marker'] );
	$output['group'] = apply_filters( 'of_sanitize_group_mailchimp', $output['group'] );
		return $output;
	
	
	}
	add_filter( 'of_sanitize_mailchimp', 'of_sanitize_mailchimp', 10, 2 );

function of_sanitize_login_mailchimp( $value ) {
	add_filter( 'of_sanitize_login_mailchimp', 'sanitize_login_field' );
	}
	
	function of_sanitize_marker_mailchimp( $value ) {
	add_filter( 'of_sanitize_marker_mailchimp', 'sanitize_marker_field' );
	}

function of_sanitize_group_mailchimp( $value ) {
	add_filter( 'of_sanitize_group_mailchimp', 'sanitize_group_field' );
	}




//UniSender
	
	function of_sanitize_unisender( $input ) {

	$output = wp_parse_args( $input, array(
		'id'  => '',
		'hash'  => ''
	    
	) );
	
	$output['id']  = apply_filters( 'of_sanitize_unisenderid', $output['id'] );
	$output['hash'] = apply_filters( 'of_sanitize_unisenderhash', $output['hash'] );
	
		return $output;
	
	
	}
	add_filter( 'of_sanitize_unisender', 'of_sanitize_unisender', 10, 2 );

function of_sanitize_unisenderid( $value ) {
	add_filter( 'of_sanitize_unisenderid', 'sanitize_unisenderid' );
	}
	
	function of_sanitize_unisenderhash( $value ) {
	add_filter( 'of_sanitize_unisenderhash', 'sanitize_unisenderhash' );
	}

	


//autoweboffice
	
	function of_sanitize_autoweboffice( $input ) {

	$output = wp_parse_args( $input, array(
		'id'  => '',
		'rassylka'  => '',
		'login'  => ''
	    
	) );
	
	
	
	$output['login']  = apply_filters( 'of_sanitize_loginautoweboffice', $output['login'] );
	$output['id']  = apply_filters( 'of_sanitize_idautoweboffice', $output['id'] );
	$output['rassylka']  = apply_filters( 'of_sanitize_idautowebofficepassylki', $output['id'] );

	
		return $output;
	
	
	}
	add_filter( 'of_sanitize_autoweboffice', 'of_sanitize_autoweboffice', 10, 2 );
	
	
	function of_sanitize_loginautoweboffice( $value ) {
	add_filter( 'of_sanitize_loginautoweboffice', 'sanitize_loginautoweboffice' );
	}

function of_sanitize_idautoweboffice( $value ) {
	add_filter( 'of_sanitize_idautoweboffice', 'sanitize_idautoweboffice' );
	}
	
	function of_sanitize_idautowebofficepassylki( $value ) {
	add_filter( 'of_sanitize_idautowebofficepassylki', 'sanitize_idautowebofficepassylki' );
	}
	
	
	
	


//mailerlite
	
	function of_sanitize_mailerlite( $input ) {

	$output = wp_parse_args( $input, array(
		'id'  => '',
		'page'  => '',
		'hash'  => '',
		'thanks'  => ''
	    
	) );
	
	$output['id']  = apply_filters( 'of_sanitize_idformmailerlite', $output['id'] );
	$output['page'] = apply_filters( 'of_sanitize_idlandingmailerlite', $output['page'] );
	$output['hash'] = apply_filters( 'of_sanitize_idstatistic', $output['hash'] );
	$output['thanks'] = apply_filters( 'of_sanitize_thankyoumailerlite', $output['thanks'] );
	
	
		return $output;
	
	
	}
	add_filter( 'of_sanitize_mailerlite', 'of_sanitize_mailerlite', 10, 2 );

function of_sanitize_idformmailerlite( $value ) {
	add_filter( 'of_sanitize_idformmailerlite', 'sanitize_idformmailerlite' );
	}
	
	function of_sanitize_idlandingmailerlite( $value ) {
	add_filter( 'of_sanitize_idlandingmailerlite', 'sanitize_idlandingmailerlite' );
	}
	
	function of_sanitize_idstatistic( $value ) {
	add_filter( 'of_sanitize_idstatistic', 'sanitize_idstatistic' );
	}
function of_sanitize_thankyoumailerlite( $value ) {
	add_filter( 'of_sanitize_thankyoumailerlite', 'sanitize_thankyoumailerlite' );
	}




/**
 * Get recognized background repeat settings
 *
 * @return   array
 *
 */
function of_recognized_background_repeat() {
	$default = array(
		'no-repeat' => __( 'Не повторять', 'inspiration' ),
		'repeat-x'  => __( 'Повторять по горизонтали', 'inspiration' ),
		'repeat-y'  => __( 'Повторять по вертикали', 'inspiration' ),
		'repeat'    => __( 'Повторять все', 'inspiration' ),
		);
	return apply_filters( 'of_recognized_background_repeat', $default );
}

/**
 * Get recognized background positions
 *
 * @return   array
 *
 */
function of_recognized_background_position() {
	$default = array(
		'top left'      => __( 'Сверху Слева', 'inspiration' ),
		'top center'    => __( 'Сверху По Центру', 'inspiration' ),
		'top right'     => __( 'Сверху Справа', 'inspiration' ),
		'center left'   => __( 'Посередине Слева', 'inspiration' ),
		'center center' => __( 'Посередине По Центру', 'inspiration' ),
		'center right'  => __( 'Посередине Справа', 'inspiration' ),
		'bottom left'   => __( 'Внизу Слева', 'inspiration' ),
		'bottom center' => __( 'Внизу По Центру', 'inspiration' ),
		'bottom right'  => __( 'Внизу Справа', 'inspiration')
		);
	return apply_filters( 'of_recognized_background_position', $default );
}

/**
 * Get recognized background attachment
 *
 * @return   array
 *
 */
function of_recognized_background_attachment() {
	$default = array(
		'scroll' => __( 'Прокручивается', 'inspiration' ),
		'fixed'  => __( 'Фиксирован', 'inspiration')
		);
	return apply_filters( 'of_recognized_background_attachment', $default );
}

/**
 * Sanitize a color represented in hexidecimal notation.
 *
 * @param    string    Color in hexidecimal notation. "#" may or may not be prepended to the string.
 * @param    string    The value that this function should return if it cannot be recognized as a color.
 * @return   string
 *
 */

function of_sanitize_hex( $hex, $default = '' ) {
	if ( of_validate_hex( $hex ) ) {
		return $hex;
	}
	return $default;
}

/**
 * Get recognized font sizes.
 *
 * Returns an indexed array of all recognized font sizes.
 * Values are integers and represent a range of sizes from
 * smallest to largest.
 *
 * @return   array
 */

function of_recognized_font_sizes() {
	$sizes = range( 9, 71 );
	$sizes = apply_filters( 'of_recognized_font_sizes', $sizes );
	$sizes = array_map( 'absint', $sizes );
	return $sizes;
}

/**
 * Get recognized font faces.
 *
 * Returns an array of all recognized font faces.
 * Keys are intended to be stored in the database
 * while values are ready for display in in html.
 *
 * @return   array
 *
 */
function of_recognized_font_faces() {
	$default = array(
		'arial' => 'Arial',
		'verdana'   => 'Verdana, Geneva',
		'helvetica' => 'Helvetica',
		'tahoma'    => 'Tahoma, Geneva',
		'\'Lucida Console\', Monaco, monospace' => 'Lucida Console',
		'Open Sans'    => 'Open Sans',
		'Open Sans Condensed'  => 'Open Sans Condensed',
		'PT Sans Narrow'  => 'PT Sans Narrow',	
		'Trebuchet' => 'Trebuchet',
		'georgia'   => 'Georgia',
		'times'     => 'Times New Roman',
		'palatino'  => 'Palatino',
		'\'Comic Sans MS\', cursive' => 'Comic Sans MS',
		'\'Courier New\', monospace' => 'Courier New',
		'Impact, Charcoal, sans-serif' => 'Impact', 
		'Marck Script'  => 'Marck Script',
		'Neucha'  => 'Neucha',
		'Poiret One'  => 'Poiret One',
		'Lobster'  => 'Lobster',
		'Comfortaa'  => 'Comfortaa',
		'Didact Gothic'  => 'Didact Gothic',
		'Roboto'  => 'Roboto',
		'Willamette SF'  => 'Willamette SF'		
	
	);
	return apply_filters( 'of_recognized_font_faces', $default );
}



/**
 * Get recognized font styles.
 *
 * Returns an array of all recognized font styles.
 * Keys are intended to be stored in the database
 * while values are ready for display in in html.
 *
 * @return   array
 *
 */
function of_recognized_font_styles() {
	$default = array(
		'normal'      => __( 'Обычный', 'inspiration' ),
		'italic'      => __( 'Наклонный', 'inspiration' ),
		'bold'        => __( 'Жирный', 'inspiration' ),
		'bold italic' => __( 'Жирный Наклонный', 'inspiration' )
	);
	return apply_filters( 'of_recognized_font_styles', $default );
}

/**
 * Is a given string a color formatted in hexidecimal notation?
 *
 * @param    string    Color in hexidecimal notation. "#" may or may not be prepended to the string.
 * @return   bool
 *
 */

function of_validate_hex( $hex ) {
	$hex = trim( $hex );
	/* Strip recognized prefixes. */
	if ( 0 === strpos( $hex, '#' ) ) {
		$hex = substr( $hex, 1 );
	}
	elseif ( 0 === strpos( $hex, '%23' ) ) {
		$hex = substr( $hex, 3 );
	}
	/* Regex match. */
	if ( 0 === preg_match( '/^[0-9a-fA-F]{6}$/', $hex ) ) {
		return false;
	}
	else {
		return true;
	}
}