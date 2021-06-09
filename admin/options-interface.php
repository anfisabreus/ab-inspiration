<?php

/**
 * Generates the tabs that are used in the options menu
 */

function optionsframework_tabs() {


	$counter = 0;
	$options =& _optionsframework_options();
	$menu = '';

	foreach ( $options as $value ) {
		// Heading for Navigation
		if ( $value['type'] == "heading" ) {
			$counter++;
			$class = '';
			$class = ! empty( $value['id'] ) ? $value['id'] : $value['name'];
			$class = preg_replace('/[^a-zA-Z0-9._\-]/', '', strtolower($class) ) . '-tab';
			$menu .= '<a id="options-group-'.  $counter . '-tab" class="nav-tab ' . $class .'" title="' . esc_attr( $value['name'] ) . '" href="' . esc_attr( '#options-group-'.  $counter ) . '">' . esc_html( $value['name'] ) . '</a>';
		}
	}

	return $menu;
}


/**
 * Generates the options fields that are used in the form.
 */
 
function optionsframework_fields() {
 
	global $allowedtags;
	$optionsframework_settings = get_option( 'optionsframework' );

	// Gets the unique option id
	if ( isset( $optionsframework_settings['id'] ) ) {
		$option_name = $optionsframework_settings['id'];
	}
	else {
		$option_name = 'options_framework_theme';
	};

	$settings = get_option($option_name);
	$options =& _optionsframework_options();

	$counter = 0;
	$menu = '';

	foreach ( $options as $value ) {

		$val = '';
		$select_value = '';
		$checked = '';
		$output = '';



		// Wrap all options
		if ( ( $value['type'] != "heading" ) && ( $value['type'] != "info" ) && ( $value['type'] != "devider" ) && ( $value['type'] != "subdesc" ) ) {

			// Keep all ids lowercase with no spaces
			$value['id'] = preg_replace('/[^a-zA-Z0-9._\-]/', '', strtolower( $value['id'] ) );

			$id = 'section-' . $value['id'];

			$class = 'section';
			if ( isset( $value['type'] ) ) {
				$class .= ' section-' . $value['type'];
			}
			if ( isset( $value['class'] ) ) {
				$class .= ' ' . $value['class'];
			}

			$output .= '<div id="' . esc_attr( $id ) .'" class="' . esc_attr( $class ) . '">'."\n";
			if ( isset( $value['name'] ) ) {
				$output .= '<h4 class="heading">' . esc_html( $value['name'] ) . '</h4>' . "\n";
			}
			if ( $value['type'] != 'editor' ) {
				$output .= '<div class="option">' . "\n" . '<div class="controls">' . "\n";
			}
			else {
				$output .= '<div class="option">' . "\n" . '<div>' . "\n";
			}
		}

		// Set default value to $val
		if ( isset( $value['std'] ) ) {
			$val = $value['std'];
		}

		// If the option is already saved, ovveride $val
		if ( ( $value['type'] != 'heading' ) && ( $value['type'] != 'info') && ( $value['type'] != "devider" ) && ( $value['type'] != "subdesc" ) ) {
			if ( isset( $settings[($value['id'])]) ) {
				$val = $settings[($value['id'])];
				// Striping slashes of non-array options
				if ( !is_array($val) ) {
					$val = stripslashes( $val );
				}
			}
		}

		// If there is a description save it for labels
		$explain_value = '';
		if ( isset( $value['desc'] ) ) {
			$explain_value = $value['desc'];
		}

		switch ( $value['type'] ) {

		// Basic text input
		case 'text':
			$output .= '<input id="' . esc_attr( $value['id'] ) . '" class="of-input" name="' . esc_attr( $option_name . '[' . $value['id'] . ']' ) . '" type="text" value="' . esc_attr( $val ) . '" />';
			break;

		// Password input
		case 'password':
			$output .= '<input id="' . esc_attr( $value['id'] ) . '" class="of-input" name="' . esc_attr( $option_name . '[' . $value['id'] . ']' ) . '" type="password" value="' . esc_attr( $val ) . '" />';
			break;

		// Textarea
		case 'textarea':
			$rows = '8';

			if ( isset( $value['settings']['rows'] ) ) {
				$custom_rows = $value['settings']['rows'];
				if ( is_numeric( $custom_rows ) ) {
					$rows = $custom_rows;
				}
			}

			$val = stripslashes( $val );
			$output .= '<textarea id="' . esc_attr( $value['id'] ) . '" class="of-input" name="' . esc_attr( $option_name . '[' . $value['id'] . ']' ) . '" rows="' . $rows . '" cols="70">' . esc_textarea( $val ) . '</textarea>';
			break;

		// Select Box
		case 'select':
			$output .= '<select class="of-input" name="' . esc_attr( $option_name . '[' . $value['id'] . ']' ) . '" id="' . esc_attr( $value['id'] ) . '">';

			foreach ($value['options'] as $key => $option ) {
				$selected = '';
				if ( $val != '' ) {
					if ( $val == $key) { $selected = ' selected="selected"';}
				}
				$output .= '<option'. $selected .' value="' . esc_attr( $key ) . '">' . esc_html( $option ) . '</option>';
			}
			$output .= '</select>';
			break;


		// Radio Box
		case "radio":
			$name = $option_name .'['. $value['id'] .']';
			foreach ($value['options'] as $key => $option) {
				$id = $option_name . '-' . $value['id'] .'-'. $key;
				$output .= '<input class="of-input of-radio" type="radio" name="' . esc_attr( $name ) . '" id="' . esc_attr( $id ) . '" value="'. esc_attr( $key ) . '" '. checked( $val, $key, false) .' /><label for="' . esc_attr( $id ) . '">' . esc_html( $option ) . '</label>';
			}
			break;

		// Image Selectors
		case "images":
			$name = $option_name .'['. $value['id'] .']';
			foreach ( $value['options'] as $key => $option ) {
				$selected = '';
				$checked = '';
				if ( $val != '' ) {
					if ( $val == $key ) {
						$selected = ' of-radio-img-selected';
						$checked = ' checked="checked"';
					}
				}
				$output .= '<input type="radio" id="' . esc_attr( $value['id'] .'_'. $key) . '" class="of-radio-img-radio" value="' . esc_attr( $key ) . '" name="' . esc_attr( $name ) . '" '. $checked .' />';
				$output .= '<div class="of-radio-img-label">' . esc_html( $key ) . '</div>';
				$output .= '<img src="' . esc_url( $option ) . '" alt="' . $option .'" class="of-radio-img-img' . $selected .'" onclick="document.getElementById(\''. esc_attr($value['id'] .'_'. $key) .'\').checked=true;">';
			}
			break;

		// Checkbox
		case "checkbox":
			$output .= '<input id="' . esc_attr( $value['id'] ) . '" class="checkbox of-input" type="checkbox" name="' . esc_attr( $option_name . '[' . $value['id'] . ']' ) . '" '. checked( $val, 1, false) .' />';
			$output .= '<label class="explain" for="' . esc_attr( $value['id'] ) . '">' . wp_kses( $explain_value, $allowedtags) . '</label>';
			break;

		// Multicheck
			case "multicheck":
				foreach ($value['options'] as $key => $option) {
					$checked = '';
					$label = $option;
					$option = preg_replace('/[^a-zA-Z0-9._\-]/', '', strtolower($key));

					$id = $option_name . '-' . $value['id'] . '-'. $option;
					$name = $option_name . '[' . $value['id'] . '][' . $option .']';

					if ( isset($val[$option]) ) {
						$checked = checked($val[$option], 1, false);
					}

					$output .= '<input id="' . esc_attr( $id ) . '" class="checkbox of-input" type="checkbox" name="' . esc_attr( $name ) . '" ' . $checked . ' /><label for="' . esc_attr( $id ) . '">' . esc_html( $label ) . '</label>';
				}
				break;

		// Color picker
		case "color":
			$default_color = '';
			if ( isset($value['std']) ) {
				if ( $val !=  $value['std'] )
					$default_color = ' data-default-color="' .$value['std'] . '" ';
			}
			$output .= '<input name="' . esc_attr( $option_name . '[' . $value['id'] . ']' ) . '" id="' . esc_attr( $value['id'] ) . '" class="of-color"  type="text" value="' . esc_attr( $val ) . '"' . $default_color .' />';
 	
			break;

		// Uploader
		case "upload":
			$output .= optionsframework_uploader( $value['id'], $val, null );
			
			break;

		// Typography
		case 'typography':
		
			unset( $font_size, $font_style, $font_face, $font_color );
		
			$typography_defaults = array(
				'size' => '',
				'face' => '',
				'style' => '',
				'color' => ''
			);
			
			$typography_stored = wp_parse_args( $val, $typography_defaults );
			
			$typography_options = array(
				'sizes' => of_recognized_font_sizes(),
				'faces' => of_recognized_font_faces(),
				'styles' => of_recognized_font_styles(),
				'color' => true
			);
			
			if ( isset( $value['options'] ) ) {
				$typography_options = wp_parse_args( $value['options'], $typography_options );
			}

			// Font Size
			if ( $typography_options['sizes'] ) {
				$font_size = '<select class="of-typography of-typography-size" name="' . esc_attr( $option_name . '[' . $value['id'] . '][size]' ) . '" id="' . esc_attr( $value['id'] . '_size' ) . '">';
				$sizes = $typography_options['sizes'];
				foreach ( $sizes as $i ) {
					$size = $i . 'px';
					$font_size .= '<option value="' . esc_attr( $size ) . '" ' . selected( $typography_stored['size'], $size, false ) . '>' . esc_html( $size ) . '</option>';
				}
				$font_size .= '</select>
									
				';
			}

			// Font Face
			if ( $typography_options['faces'] ) {
				$font_face = '<select class="of-typography of-typography-face" name="' . esc_attr( $option_name . '[' . $value['id'] . '][face]' ) . '" id="' . esc_attr( $value['id'] . '_face' ) . '" class="font-choose">';
				$faces = $typography_options['faces'];
				foreach ( $faces as $key => $face ) {
					$font_face .= '<option value="' . esc_attr( $key ) . '" ' . selected( $typography_stored['face'], $key, false ) . '>' . esc_html( $face ) . '</option>';
				}
				$font_face .= '</select>
				
				';
				
				

			}
			
			


			
			

			// Font Styles
			if ( $typography_options['styles'] ) {
				$font_style = '<select class="of-typography of-typography-style" name="'.$option_name.'['.$value['id'].'][style]" id="'. $value['id'].'_style">';
				$styles = $typography_options['styles'];
				foreach ( $styles as $key => $style ) {
					$font_style .= '<option value="' . esc_attr( $key ) . '" ' . selected( $typography_stored['style'], $key, false ) . '>'. $style .'</option>';
				}
				$font_style .= '</select>';
			}

			// Font Color
			if ( $typography_options['color'] ) {
				$default_color = '';
				if ( isset( $value['std']['color'] ) ) {
					if ( $val !=  $value['std']['color'] )
						$default_color = ' data-default-color="' .$value['std']['color'] . '" ';
				}
				$font_color = '<input name="' . esc_attr( $option_name . '[' . $value['id'] . '][color]' ) . '" id="' . esc_attr( $value['id'] . '_color' ) . '" class="of-color of-typography-color  type="text" value="' . esc_attr( $typography_stored['color'] ) . '"' . $default_color .' />
			
				
				
				';
			}
	
			// Allow modification/injection of typography fields
			$typography_fields = compact( 'font_size', 'font_face', 'font_style', 'font_color' );
			$typography_fields = apply_filters( 'of_typography_fields', $typography_fields, $typography_stored, $option_name, $value );
			$output .= implode( '', $typography_fields );
			
			break;
			
			
			
			// Smart		
			
	case 'smart':
	$smart = $val;

$output .= '<div style="width:700px;" class="smartpost"> <div style="float:left; width:140px; margin-right:10px;"><strong>Имя формы</strong>  <br><input id="' . esc_attr( $value['id'] .'_formname' ) . '" class="of-input" name="' . esc_attr( $option_name . '[' . $value['id'] . '][formname]' ) . '" type="text" value="' . esc_attr( $smart['formname']) . '" style="width:140px;"/></div>';
			
 $output .= ' <div style="float:left; width:140px;margin-right:10px;"><strong>Код формы</strong><br><input id="' . esc_attr( $value['id'].'_sendsayformkod') . '" class="of-input"  name="' . esc_attr( $option_name . '[' . $value['id'] . '][sendsayformkod]' ) . '" type="text" value="' . esc_attr( $smart['sendsayformkod']) . '"  style="width:140px;" /></div>';
			
 $output .= '<div style="float:left; width:140px; margin-right:10px;"><strong>ID формы</strong> <br><input id="' . esc_attr( $value['id'].'_sendsayformid' ) . '" class="of-input" name="' . esc_attr( $option_name . '[' . $value['id'] . '][sendsayformid]' ) . '" type="text" value="' . esc_attr( $smart['sendsayformid']) . '" style="width:140px;" /></div>';
 
$output .= '<div style="float:left; width:140px;"><strong>ID Поля Имя</strong> <br><input id="' . esc_attr( $value['id'].'_idname' ) . '" class="of-input" name="' . esc_attr( $option_name . '[' . $value['id'] . '][idname]' ) . '" type="text" value="' . esc_attr( $smart['idname']) . '" style="width:140px;" /></div> 
 
 </div>';
			
break;


// sendpulse		
			
	case 'sendpulse':
	$smart = $val;

$output .= '<div style="width:700px;" class="smartpost"> <div style="float:left; width:340px; margin-right:10px;"><strong>ID формы</strong>  <br><input id="' . esc_attr( $value['id'] .'_idform' ) . '" class="of-input" name="' . esc_attr( $option_name . '[' . $value['id'] . '][idform]' ) . '" type="text" value="' . esc_attr( $smart['idform']) . '" style="width:340px; margin-bottom:20px"/></div>';
			
 $output .= ' <div style="float:left; width:340px;margin-right:10px;"><strong>Hash формы</strong><br><input id="' . esc_attr( $value['id'].'_hashform') . '" class="of-input"  name="' . esc_attr( $option_name . '[' . $value['id'] . '][hashform]' ) . '" type="text" value="' . esc_attr( $smart['hashform']) . '"  style="width:340px;margin-bottom:20px" /></div>';
			
 $output .= '<div style="float:left; width:340px; margin-right:10px;"><strong>ID поля Имя (если вы его используете)</strong> <br><input id="' . esc_attr( $value['id'].'_idscript' ) . '" class="of-input" name="' . esc_attr( $option_name . '[' . $value['id'] . '][idscript]' ) . '" type="text" value="' . esc_attr( $smart['idscript']) . '" style="width:340px;" /></div>';
 
$output .= '<div style="float:left; width:340px;"><strong>ID скрипта</strong> <br><input id="' . esc_attr( $value['id'].'_sendpulseidscript' ) . '" class="of-input" name="' . esc_attr( $option_name . '[' . $value['id'] . '][sendpulseidscript]' ) . '" type="text" value="' . esc_attr( $smart['sendpulseidscript']) . '" style="width:340px;" /></div> ';
 
$output .= '<div style="float:left; margin-top:20px; font-size:16px"><a target="_blank" class="fancybox" href="https://vimeo.com/314717673" data-fancybox-type="iframe"> Видеоинструкция по подключению формы SendPulse</a></div> 

</div>';
			
break;



	// Justclick		
			
	case 'just':
	$just = $val;
	
	

$output .= '<div style="width:500px;" class="justpost"> <div style="float:left; width:140px; margin-right:10px;">Логин <br><input id="' . esc_attr( $value['id'] .'_login' ) . '" class="of-input" name="' . esc_attr( $option_name . '[' . $value['id'] . '][login]' ) . '" type="text" value="' . esc_attr( $just['login']) . '" style="width:140px;"/></div>';
			
 $output .= ' <div style="float:left; width:140px;margin-right:10px;">Маркер<br><input id="' . esc_attr( $value['id'].'_marker') . '" class="of-input"  name="' . esc_attr( $option_name . '[' . $value['id'] . '][marker]' ) . '" type="text" value="' . esc_attr( $just['marker']) . '"  style="width:140px;" /></div>';
			
 $output .= '<div style="float:left; width:140px;">Группа <br><input id="' . esc_attr( $value['id'].'_group' ) . '" class="of-input" name="' . esc_attr( $option_name . '[' . $value['id'] . '][group]' ) . '" type="text" value="' . esc_attr( $just['group']) . '" style="width:140px;" /></div><div style="clear:both"></div>';
  
  
   $output .= '<div style="width:440px;margin:10px 0">URL ПОСЛЕ АКТИВАЦИИ <br><input id="' . esc_attr( $value['id'].'_linktwo' ) . '" class="of-input" name="' . esc_attr( $option_name . '[' . $value['id'] . '][linktwo]' ) . '" type="text" value="' . esc_attr( $just['linktwo']) . '" style="width:440px;" /></div></div>';
			
break;	


	// Getresponse		
			
	case 'getresponse':
	$just = $val;
	

$old_form = of_get_option('getresp_form');
if ($old_form) 
{ if ($old_form['old'] == 1) 
{$checked = ' checked="checked"';}
else { $checked = ''; }
}



	
	$output .= '<div style="width:500px;" class="getresponsepost"> <div style="float:left; width:340px; margin-right:10px;"><input id="' . esc_attr( $value['id'].'_old' ) . '" class="checkbox of-input" type="checkbox" name="' . esc_attr( $option_name . '[' . $value['id'] . '][old]' ) . '" '. $checked .' />';
			$output .= '<label class="explain" for="' . esc_attr( $value['id'].'_old' ) . '">Отметьте галочкой, если у вас новая форма</label></div> <div style="clear:both; margin-top:20px;"></div>';

	
$output .= '<div style="width:340px; margin-right:10px;padding-top:20px;">ID Формы (если форма старая), Токен кампании (если форма новая) <br><input id="' . esc_attr( $value['id'] .'_formid' ) . '" class="of-input" name="' . esc_attr( $option_name . '[' . $value['id'] . '][formid]' ) . '" type="text" value="' . esc_attr( $just['formid']) . '" style="width:140px;"/></div>';

$output .= '<div style="width:340px; margin-right:10px;margin-top:20px;">Ссылка на страницу Спасибо (по-желанию)<br><input id="' . esc_attr( $value['id'] .'_thankyouurl' ) . '" class="of-input" name="' . esc_attr( $option_name . '[' . $value['id'] . '][thankyouurl]' ) . '" type="text" value="' . esc_attr( $just['thankyouurl']) . '" style="width:340px;"/></div>


</div>';



			break;	
			
			
			
			
	// Getrespons360	
			
	case 'getresponse360':
	$just = $val;
	





	
	$output .= '<div style="width:500px;" class="getresponsepost360"> <div style="float:left; width:340px; margin-right:10px;">
	
	Домен, который регистрировали в GetResponse360 <br><input id="' . esc_attr( $value['id'] .'_getresponse360link' ) . '" class="of-input" name="' . esc_attr( $option_name . '[' . $value['id'] . '][getresponse360link]' ) . '" type="text" value="' . esc_attr( $just['getresponse360link']) . '" style="width:140px;"/>
	
	</div>';

	
$output .= '<div style="width:340px; margin-right:10px;padding-top:20px;">Токен кампании <br><input id="' . esc_attr( $value['id'] .'_formid360' ) . '" class="of-input" name="' . esc_attr( $option_name . '[' . $value['id'] . '][formid360]' ) . '" type="text" value="' . esc_attr( $just['formid360']) . '" style="width:140px;"/></div>';

$output .= '<div style="width:340px; margin-right:10px;margin-top:20px;">Ссылка на страницу Спасибо (по-желанию)<br><input id="' . esc_attr( $value['id'] .'_thankyou360' ) . '" class="of-input" name="' . esc_attr( $option_name . '[' . $value['id'] . '][thankyou360]' ) . '" type="text" value="' . esc_attr( $just['thankyou360']) . '" style="width:340px;"/></div>


</div>';



			break;				
			
			
			
// MailChimp		
			
	case 'mailchimp':
	$just = $val;
	
	

$output .= '<div style="width:500px;" class="mailchimppost"> <div style="float:left; width:140px; margin-right:10px;">Логин <br><input id="' . esc_attr( $value['id'] .'_login_mailchimp' ) . '" class="of-input" name="' . esc_attr( $option_name . '[' . $value['id'] . '][login_mailchimp]' ) . '" type="text" value="' . esc_attr( $just['login_mailchimp']) . '" style="width:140px;"/></div>';
			
 $output .= ' <div style="float:left; width:140px;margin-right:10px;">ID профиля<br><input id="' . esc_attr( $value['id'].'_marker_mailchimp') . '" class="of-input"  name="' . esc_attr( $option_name . '[' . $value['id'] . '][marker_mailchimp]' ) . '" type="text" value="' . esc_attr( $just['marker_mailchimp']) . '"  style="width:140px;" /></div>';
			
 $output .= '<div style="float:left; width:140px;">ID списка <br><input id="' . esc_attr( $value['id'].'_group_mailchimp' ) . '" class="of-input" name="' . esc_attr( $option_name . '[' . $value['id'] . '][group_mailchimp]' ) . '" type="text" value="' . esc_attr( $just['group_mailchimp']) . '" style="width:140px;" /></div><div style="clear:both"></div> </div>';
			
break;	




// UniSender		
			
	case 'unisender':
	$just = $val;
	
	

$output .= '<div style="width:500px;" class="unisenderpost"> <div style="float:left; width:280px; margin-right:10px;">Hash Формы <br><input id="' . esc_attr( $value['id'] .'_unisenderhash' ) . '" class="of-input" name="' . esc_attr( $option_name . '[' . $value['id'] . '][unisenderhash]' ) . '" type="text" value="' . esc_attr( $just['unisenderhash']) . '" style="width:280px;"/></div>';
			
 $output .= ' <div style="float:left; width:140px;margin-right:10px;">ID Списка<br><input id="' . esc_attr( $value['id'].'_unisenderid') . '" class="of-input"  name="' . esc_attr( $option_name . '[' . $value['id'] . '][unisenderid]' ) . '" type="text" value="' . esc_attr( $just['unisenderid']) . '"  style="width:140px;" /></div></div>';
			
			
break;	

// autoweboffice		
			
	case 'autoweboffice':
	$autoweboffice = $val;
	
$output .= '<div style="width:500px;" class="autowebofficepost"> <div style="float:left; width:280px; margin-right:10px;">Идентификатор магазина <br><input id="' . esc_attr( $value['id'] .'_loginautoweboffice' ) . '" class="of-input" name="' . esc_attr( $option_name . '[' . $value['id'] . '][loginautoweboffice]' ) . '" type="text" value="' . esc_attr( $autoweboffice['loginautoweboffice']) . '" style="width:280px;"/></div>';	

$output .= '<div style="float:left; width:280px; margin-right:10px;">ID магазина <br><input id="' . esc_attr( $value['id'] .'_idautoweboffice' ) . '" class="of-input" name="' . esc_attr( $option_name . '[' . $value['id'] . '][idautoweboffice]' ) . '" type="text" value="' . esc_attr( $autoweboffice['idautoweboffice']) . '" style="width:280px;"/></div>';


$output .= ' <div style="float:left; width:280px; margin-right:10px;">ID рассылки <br><input id="' . esc_attr( $value['id'] .'_idautowebofficepassylki' ) . '" class="of-input" name="' . esc_attr( $option_name . '[' . $value['id'] . '][idautowebofficepassylki]' ) . '" type="text" value="' . esc_attr( $autoweboffice['idautowebofficepassylki']) . '" style="width:280px;"/></div></div>';
			
			
			

			
break;	


// mailerlite		
			
	case 'mailerlite':
	$mailerlite = $val;
	
	

$output .= '<div><div style="width:100%; padding-bottom:30px;" class="mailerlitepost"> <div style="float:left; width:200px; margin-right:10px;">Номер формы <br><input id="' . esc_attr( $value['id'] .'_idformmailerlite' ) . '" class="of-input" name="' . esc_attr( $option_name . '[' . $value['id'] . '][idformmailerlite]' ) . '" type="text" value="' . esc_attr( $mailerlite['idformmailerlite']) . '" style="width:200px;"/></div>';

$output .= '<div style="float:left; width:200px; margin-right:10px;">Код страницы <br><input id="' . esc_attr( $value['id'] .'_idlandingmailerlite' ) . '" class="of-input" name="' . esc_attr( $option_name . '[' . $value['id'] . '][idlandingmailerlite]' ) . '" type="text" value="' . esc_attr( $mailerlite['idlandingmailerlite']) . '" style="width:200px;"/></div>';
			
 $output .= ' <div style="float:left; width:250px;margin-right:10px;">Hash Статистики<br><input id="' . esc_attr( $value['id'].'_idstatistic') . '" class="of-input"  name="' . esc_attr( $option_name . '[' . $value['id'] . '][idstatistic]' ) . '" type="text" value="' . esc_attr( $mailerlite['idstatistic']) . '"  style="width:250px;" /></div></div>';
 
 
 $output .= '<div style="width:400px; margin-right:10px; margin-top:20px;">Адрес страницы "Спасибо за подписку" (с http:// ) <br><input id="' . esc_attr( $value['id'] .'_thankyoumailerlite' ) . '" class="of-input" name="' . esc_attr( $option_name . '[' . $value['id'] . '][thankyoumailerlite]' ) . '" type="text" value="' . esc_attr( $mailerlite['thankyoumailerlite']) . '" style="width:400px;"/></div></div>';

			
			
break;	


		
			
			
			// onebutton		
			
	case 'onebutton':
	$just = $val;

$output .= '<div style="width:500px;" class="onebuttonpost"> <div style="float:left; width:140px; margin-right:10px;">Адрес страницы: <br><input id="' . esc_attr( $value['id'] .'_oneid' ) . '" class="of-input" name="' . esc_attr( $option_name . '[' . $value['id'] . '][oneid]' ) . '" type="text" value="' . esc_attr( $just['oneid']) . '" style="width:300px;"/></div></div>';
			break;			
	
	
	
	
	// Background
		case 'background':

			$background = $val;

			// Background Color
			$default_color = '';
			if ( isset( $value['std']['color'] ) ) {
				if ( $val !=  $value['std']['color'] )
					$default_color = ' data-default-color="' .$value['std']['color'] . '" ';
			}
			$output .= '<input name="' . esc_attr( $option_name . '[' . $value['id'] . '][color]' ) . '" id="' . esc_attr( $value['id'] . '_color' ) . '" class="of-color of-background-color"  type="text" value="' . esc_attr( $background['color'] ) . '"' . $default_color .' />';

			// Background Image
			if (!isset($background['image'])) {
				$background['image'] = '';
			}
			
			$output .= optionsframework_uploader( $value['id'], $background['image'], null, esc_attr( $option_name . '[' . $value['id'] . '][image]' ) );
			
			$class = 'of-background-properties';
			if ( '' == $background['image'] ) {
				$class .= ' hide';
			}
			$output .= '<div class="' . esc_attr( $class ) . '">';

			// Background Repeat
			$output .= '<select class="of-background of-background-repeat" name="' . esc_attr( $option_name . '[' . $value['id'] . '][repeat]'  ) . '" id="' . esc_attr( $value['id'] . '_repeat' ) . '">';
			$repeats = of_recognized_background_repeat();

			foreach ($repeats as $key => $repeat) {
				$output .= '<option value="' . esc_attr( $key ) . '" ' . selected( $background['repeat'], $key, false ) . '>'. esc_html( $repeat ) . '</option>';
			}
			$output .= '</select>';

			// Background Position
			$output .= '<select class="of-background of-background-position" name="' . esc_attr( $option_name . '[' . $value['id'] . '][position]' ) . '" id="' . esc_attr( $value['id'] . '_position' ) . '">';
			$positions = of_recognized_background_position();

			foreach ($positions as $key=>$position) {
				$output .= '<option value="' . esc_attr( $key ) . '" ' . selected( $background['position'], $key, false ) . '>'. esc_html( $position ) . '</option>';
			}
			$output .= '</select>';

			// Background Attachment
			$output .= '<select class="of-background of-background-attachment" name="' . esc_attr( $option_name . '[' . $value['id'] . '][attachment]' ) . '" id="' . esc_attr( $value['id'] . '_attachment' ) . '">';
			$attachments = of_recognized_background_attachment();

			foreach ($attachments as $key => $attachment) {
				$output .= '<option value="' . esc_attr( $key ) . '" ' . selected( $background['attachment'], $key, false ) . '>' . esc_html( $attachment ) . '</option>';
			}
			$output .= '</select>';
			$output .= '</div>';

			break;
			
		// Editor
		case 'editor':
		
		
				if ( ! function_exists( 'wpex_mce_buttons' ) ) {
	function wpex_mce_buttons( $buttons ) {
		array_unshift( $buttons, 'fontselect' ); // Add Font Select
		array_unshift( $buttons, 'fontsizeselect' ); // Add Font Size Select
		return $buttons;
	}
}
add_filter( 'mce_buttons_2', 'wpex_mce_buttons' );
		
		// Customize mce editor font sizes
if ( ! function_exists( 'wpex_mce_text_sizes' ) ) {
	function wpex_mce_text_sizes( $initArray ){
		$initArray['fontsize_formats'] = "9px 10px 12px 13px 14px 16px 18px 21px 24px 28px 32px 36px 38px 40px 42px 44px 46px 48px 50px 52px 54px 56px 58px 60px";
		return $initArray;
	}
}
add_filter( 'tiny_mce_before_init', 'wpex_mce_text_sizes' );

// Add custom Fonts to the Fonts list
if ( ! function_exists( 'wpex_mce_google_fonts_array' ) ) {
	function wpex_mce_google_fonts_array( $initArray ) {
	    $initArray['font_formats'] = 'Arial=arial,helvetica,sans-serif;Verdana=verdana,geneva;Helvetica=helvetica;Tahoma=tahoma,arial,helvetica,sans-serif;Lucida Console=Lucida Console, Monaco, monospace;Open Sans=Open Sans;Open Sans Condensed=Open Sans Condensed;PT Sans Narrow=PT Sans Narrow;Trebuchet=Trebuchet;Georgia=georgia;Times New Roman=times;Palatino=palatino;Comic Sans MS=Comic Sans MS, cursive;Courier New=Courier New, monospace;Impact=Impact, Charcoal, sans-serif;Marck Script=Marck Script;Neucha=Neucha;Poiret One=Poiret One;Lobster=Lobster;Comfortaa=Comfortaa;Didact Gothic=Didact Gothic;Roboto=Roboto;Willamette SF=Willamette SF;Montserrat=Montserrat;Oswald=Oswald';
	    
	     
            return $initArray;
	}
}
add_filter( 'tiny_mce_before_init', 'wpex_mce_google_fonts_array' );
		
		
		
			$output .= '<div class="explain">' . wp_kses( $explain_value, $allowedtags) . '</div>'."\n";
			echo $output;
			$textarea_name = esc_attr( $option_name . '[' . $value['id'] . ']' );
			$default_editor_settings = array(
				'textarea_name' => $textarea_name,
				'media_buttons' => true,
				'textarea_rows' => 5,
				'tinymce' => array( 'toolbar1' => 'bold,italic,alignleft,aligncenter,alignright, underline,alignjustify,forecolor,removeformat,undo,redo',
'toolbar2' => 'fontsizeselect,formatselect,fontselect')
			);
			$editor_settings = array();
			if ( isset( $value['settings'] ) ) {
				$editor_settings = $value['settings'];
			}
			$editor_settings = array_merge($editor_settings, $default_editor_settings);
			wp_editor( $val, $value['id'], $editor_settings );
			$output = '';
			break;

		// Info
		case "info":
			$id = '';
			$class = 'section';
			if ( isset( $value['id'] ) ) {
				$id = 'id="' . esc_attr( $value['id'] ) . '" ';
			}
			if ( isset( $value['type'] ) ) {
				$class .= ' section-' . $value['type'];
			}
			if ( isset( $value['class'] ) ) {
				$class .= ' ' . $value['class'];
			}

			$output .= '<div ' . $id . 'class="' . esc_attr( $class ) . '">' . "\n";
			if ( isset($value['name']) ) {
				$output .= '<h4 class="heading">' . esc_html( $value['name'] ) . '</h4>' . "\n";
			}
			if ( $value['desc'] ) {
				$output .= apply_filters('of_sanitize_info', $value['desc'] ) . "\n";
			}
			$output .= ' </div>' . "\n";
			break;
			
			
// devider
		case 'devider':
		
		
		$id = '';
			$class = 'section';
			if ( isset( $value['id'] ) ) {
				$id = 'id="' . esc_attr( $value['id'] ) . '" ';
			}
			if ( isset( $value['type'] ) ) {
				$class .= ' section-' . $value['type'];
			}
			if ( isset( $value['class'] ) ) {
				$class .= ' ' . $value['class'];
			}

			$output .= '<div ' . $id . 'class="' . esc_attr( $class ) . '">' . "\n";
			if ( isset($value['name']) ) {
				$output .= '<h4 class="heading">' . esc_html( $value['name'] ) . '</h4>' . "\n";
			}
			
			if ( isset( $value['desc'] ) ) {
				$output .= apply_filters('of_sanitize_info', $value['desc'] ) . "\n";
				}
			
			
			$output .= '</div>' . "\n";
		
			break;
			
			
			
			// subdesc
		case 'subdesc':
		
		
		$id = '';
			$class = 'section';
			if ( isset( $value['id'] ) ) {
				$id = 'id="' . esc_attr( $value['id'] ) . '" ';
			}
			if ( isset( $value['type'] ) ) {
				$class .= ' section-' . $value['type'];
			}
			if ( isset( $value['class'] ) ) {
				$class .= ' ' . $value['class'];
			}

			$output .= '<div ' . $id . 'class="' . esc_attr( $class ) . '">' . "\n";
			if ( isset($value['name']) ) {
				$output .= '<h4 class="heading">' . esc_html( $value['name'] ) . '</h4>' . "\n";
			}
			
			if ( isset( $value['desc'] ) ) {
				$output .= apply_filters('of_sanitize_info', $value['desc'] ) . "\n";
				}
			
			
			$output .= '</div>' . "\n";
		
			break;

		
					
			

		// Heading for Navigation
		case "heading":
			$counter++;
			if ($counter >= 2) {
				$output .= '</div>'."\n";
			}
			$class = '';
			$class = ! empty( $value['id'] ) ? $value['id'] : $value['name'];
			$class = preg_replace('/[^a-zA-Z0-9._\-]/', '', strtolower($class) );
			$output .= '<div id="options-group-' . $counter . '" class="group ' . $class . '">';
			$output .= '<h3>' . esc_html( $value['name'] ) . '</h3>' . "\n";
			break;
		}

		if ( ( $value['type'] != "heading" ) && ( $value['type'] != "info" ) && ( $value['type'] != "devider" ) && ( $value['type'] != "subdesc" )) {
			$output .= '</div>';
			if ( ( $value['type'] != "checkbox" ) && ( $value['type'] != "editor" ) ) {
				$output .= '<div class="explain">' . wp_kses( $explain_value, $allowedtags) . '</div>'."\n";
			}
			$output .= '</div></div>'."\n";
		}

		echo $output;
	}
	echo '</div>';
}