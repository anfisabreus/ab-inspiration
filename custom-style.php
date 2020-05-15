<?php 
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

//
// set up cache folder
// -------------------
$upload_dir = wp_upload_dir();
$cache_name = 'some-folder';
$cache_dir  = trailingslashit( $upload_dir['basedir'] ) . $cache_name;
$cache_url  = trailingslashit( $upload_dir['baseurl'] ) . $cache_name;


defined( 'PREFIX_CACHE_DIR' ) or define( 'PREFIX_CACHE_DIR', $cache_dir );
defined( 'PREFIX_CACHE_URL' ) or define( 'PREFIX_CACHE_URL', $cache_url );

//
// Enqueue custom styles
// ---------------------
function prefix_wp_enqueue_styles() {

    // Check and create cachedir
    if( ! is_dir( PREFIX_CACHE_DIR ) ) {

        if( ! function_exists( 'WP_Filesystem' ) ) {
        require_once( ABSPATH . 'wp-admin/includes/file.php' );
        }

      WP_Filesystem();

      global $wp_filesystem;

        $wp_filesystem->mkdir( PREFIX_CACHE_DIR );

    }

    // 1. checking is cache folder writable
    // 2. if user in customizer passed custom.css for avoid conflicts
    if( is_writable( PREFIX_CACHE_DIR ) && ! isset( $_POST['wp_customize'] ) ) {

    $has_cached = get_option( 'prefix-has-cached-new' );

    if( ! $has_cached ) {
      prefix_cache_css_file();
    }

    // check for multisite
    global $blog_id;
    $is_multisite = ( is_multisite() ) ? '-'. $blog_id : '';

    wp_enqueue_style( 'prefix-cs-custom', PREFIX_CACHE_URL .'/custom-style'. $is_multisite .'.css', array(), null );

  } else {

    // echo generated css directly if cache folder is not writable and in customizer
    add_action( 'wp_head', function(){  $css .= '<style>'. prefix_generate_css() .'</style>'; }, 99 );

  }

}
add_action( 'wp_enqueue_scripts', 'prefix_wp_enqueue_styles', 12 );

//
// Generate cache css file
// -----------------------
function prefix_cache_css_file() {

  if( is_multisite() ) {
    global $blog_id;
    $css_file = PREFIX_CACHE_DIR . '/custom-style-'. $blog_id .'.css';
  } else {
    $css_file = PREFIX_CACHE_DIR . '/custom-style.css';
  }

  $css  = "/**\n";
  $css .= " * Do not touch this file! This file created by PHP\n";
  $css .= " * Last modifiyed time: ". date( 'M d Y, H:i' ) ."\n";

  $css .= " */\n\n\n";
  $css .= prefix_generate_css();
  

    if( ! function_exists( 'WP_Filesystem' ) ) {
        require_once( ABSPATH . 'wp-admin/includes/file.php' );
    }

  WP_Filesystem();

  global $wp_filesystem;

  if ( ! $wp_filesystem->put_contents( $css_file, $css, 0644 ) ) {
    update_option( 'prefix-has-cached-new', false );
  } else {
    update_option( 'prefix-has-cached-new', true );
  }

}




//
// Generate cache css
// -----------------------
function prefix_generate_css() {

global $sub_form, $homepage, $ab_woocommerce, $ab_catalog, $post;
$ab_catalog = get_option('ab_catalog');
$color = of_get_option('headermenu_bg_line');
$colorhover = of_get_option('headermenu_background');
$colordd = of_get_option('headermenu_bg');
$rgbaul = hex2rgba($color, of_get_option('headermenu_opaque'));
$rgba = hex2rgba($colorhover, of_get_option('headermenu_opaque'));
$rgbauldd = hex2rgba($colordd, of_get_option('headermenu_opaque'));
$cm = of_get_option('floatmenu_bg_line');
$ch = of_get_option('floatmenu_background');
$cd = of_get_option('floatmenu_bg');
$rgbm = hex2rgba($cm, of_get_option('floatmenu_opaque'));
$rgbh = hex2rgba($ch, of_get_option('floatmenu_opaque'));
$rgbd = hex2rgba($cd, of_get_option('floatmenu_opaque'));
$colorone = hex2rgba(of_get_option('color_one'), 0.1);




$imageurl =  get_bloginfo('url') .'/wp-content/themes/ab-inspiration/images/';
$incurl =  get_bloginfo('url') .'/wp-content/themes/ab-inspiration/';
$menucurve = of_get_option('menu_curve') - 1;
$blogcurve = of_get_option('blog_curve') - 1;
$headercurve = of_get_option('blog_curve') - 2;
$heightheademenu = of_get_option('headermenu_height') - 1;


$color_one = of_get_option('color_one');
$color_one_rgbaul = hex2rgba($color_one, '0.5');


	
$css  = '';

if (of_get_option('simple_settings') == '1') { 
if (of_get_option('headings_fonts_headers') == 'Open Sans') { $css .= '@import url(//fonts.googleapis.com/css?family=Open+Sans&subset=cyrillic);';} 
if (of_get_option('headings_fonts_headers') == 'Open Sans Condensed') { $css .= '@import url(//fonts.googleapis.com/css?family=Open+Sans|Open+Sans+Condensed:300&subset=cyrillic);';} 
if (of_get_option('headings_fonts_headers') == 'Roboto'  || of_get_option('headings_fonts_text') == 'Roboto')  { $css .= '@import url(//fonts.googleapis.com/css?family=Roboto:300&subset=cyrillic);';} 
if (of_get_option('headings_fonts_headers') == 'PT Sans Narrow') { $css .= '@import url(//fonts.googleapis.com/css?family=PT+Sans+Narrow&subset=cyrillic);';} 
if (of_get_option('headings_fonts_headers') == 'Marck Script') { $css .= '@import url(//fonts.googleapis.com/css?family=Marck+Script&subset=cyrillic);';} 
if (of_get_option('headings_fonts_headers') == 'Poiret One') { $css .= '@import url(//fonts.googleapis.com/css?family=Poiret+One&subset=cyrillic);';} 
if (of_get_option('headings_fonts_headers') == 'Neucha') { $css .= '@import url(//fonts.googleapis.com/css?family=Neucha&subset=cyrillic);';} 
if (of_get_option('headings_fonts_headers') == 'Lobster') { $css .= '@import url(//fonts.googleapis.com/css?family=Lobster&subset=cyrillic);';} 
if (of_get_option('headings_fonts_headers') == 'Comfortaa') { $css .= '@import url(//fonts.googleapis.com/css?family=Comfortaa&subset=cyrillic);';} 
if (of_get_option('headings_fonts_headers') == 'Didact Gothic') { $css .= '@import url(//fonts.googleapis.com/css?family=Didact+Gothic&subset=cyrillic);';} 

if (of_get_option('headings_fonts_headers') == 'Avenir Next Cyr') { $css .= '



@font-face {
	font-family: "Avenir Next Cyr";
	src: url("'.$incurl.'inc/fonts/AvenirNextCyr-Medium.eot");
	src: local("'.$incurl.'inc/fonts/Avenir Next Cyr Medium"), local("AvenirNextCyr-Medium"),
		url("'.$incurl.'inc/fonts/AvenirNextCyr-Medium.eot?#iefix") format("embedded-opentype"),
		url("'.$incurl.'inc/fonts/AvenirNextCyr-Medium.woff") format("woff"),
		url("'.$incurl.'inc/fonts/AvenirNextCyr-Medium.ttf") format("truetype");
	font-weight: 500;
	font-style: normal;
}

@font-face {
	font-family: "Avenir Next Cyr";
	src: url("'.$incurl.'inc/fonts/AvenirNextCyr-Regular.eot");
	src: local("'.$incurl.'inc/fonts/Avenir Next Cyr Regular"), local("AvenirNextCyr-Regular"),
		url("'.$incurl.'inc/fonts/AvenirNextCyr-Regular.eot?#iefix") format("embedded-opentype"),
		url("'.$incurl.'fonts/AvenirNextCyr-Regular.woff") format("woff"),
		url("'.$incurl.'inc/fonts/AvenirNextCyr-Regular.ttf") format("truetype");
	font-weight: normal;
	font-style: normal;
}

@font-face {
	font-family: "Avenir Next Cyr";
	src: url("'.$incurl.'inc/fonts/AvenirNextCyr-Italic.eot");
	src: local("'.$incurl.'inc/fonts/Avenir Next Cyr Italic"), local("AvenirNextCyr-Italic"),
		url("'.$incurl.'inc/fonts/AvenirNextCyr-Italic.eot?#iefix") format("embedded-opentype"),
		url("'.$incurl.'inc/fonts/AvenirNextCyr-Italic.woff") format("woff"),
		url("'.$incurl.'inc/fonts/AvenirNextCyr-Italic.ttf") format("truetype");
	font-weight: normal;
	font-style: italic;
}


@font-face {
	font-family: "Avenir Next Cyr";
	src: url("'.$incurl.'inc/fonts/AvenirNextCyr-MediumItalic.eot");
	src: local("'.$incurl.'inc/fonts/Avenir Next Cyr Medium Italic"), local("AvenirNextCyr-MediumItalic"),
		url("'.$incurl.'inc/fonts/AvenirNextCyr-MediumItalic.eot?#iefix") format("embedded-opentype"),
		url("'.$incurl.'inc/fonts/AvenirNextCyr-MediumItalic.woff") format("woff"),
		url("'.$incurl.'inc/fonts/AvenirNextCyr-MediumItalic.ttf") format("truetype");
	font-weight: 500;
	font-style: italic;
}

';} 
}


if (of_get_option('fonts_use') == '0') { $css .= '
@import url(//fonts.googleapis.com/css?family=Open+Sans&subset=cyrillic);
@import url(//fonts.googleapis.com/css?family=Open+Sans|Open+Sans+Condensed:300&subset=cyrillic);
@import url(//fonts.googleapis.com/css?family=Roboto:300,400&subset=cyrillic);
@import url(//fonts.googleapis.com/css?family=PT+Sans+Narrow&subset=cyrillic);
@import url(//fonts.googleapis.com/css?family=Marck+Script&subset=cyrillic);
@import url(//fonts.googleapis.com/css?family=Poiret+One&subset=cyrillic);
@import url(//fonts.googleapis.com/css?family=Neucha&subset=cyrillic);
@import url(//fonts.googleapis.com/css?family=Lobster&subset=cyrillic);
@import url(//fonts.googleapis.com/css?family=Comfortaa&subset=cyrillic);
@import url(//fonts.googleapis.com/css?family=Didact+Gothic&subset=cyrillic);';} 

else {  $css .= $css .= ''; }



$css .= '@font-face {font-family: "Willamette SF"; font-display: auto; 
src: url("'.$incurl.'inc/fonts/ofont.ru_WillametteSF.ttf"), url("'.$incurl.'inc/fonts/ofont.ru_WillametteSF.woff"), url("'.$incurl.'inc/fonts/ofont.ru_WillametteSF.svg");}';

if (of_get_option('blog_template') == "right-side") { $css .=  '
#container { float: left !important; } #content { padding-top:0px; margin-bottom: 0px; margin-left: 0px;} #primary, .widget-testimonial {float: right; overflow: hidden; width: 370px; } .widget-container {margin: 0px 0px 20px 0px;} #form-background {margin-left:0px !important; padding:40px !important; margin-bottom:20px !important}'; }  

else { $css .= '
#container {float: right !important; margin-right:0px;} #content {padding-top:0px; margin-bottom: 36px; margin-left: 0px; float:left !important} #primary, .widget-testimonial {float: left !important; overflow: hidden; width: 370px;} .widget-container {margin: 0px 10px 20px 0px;} #form-background {margin-left:1px !important; padding:40px !important; margin-bottom:40px !important}'; }

if (is_page_template( 'template-single-no-sidebar.php' ))  { $css .=  '



 #content .entry-box {border:none !important}.author-info .author-description {width:70%; float:left; } .author-info .author-avatar {float:left !important; margin-right: 30px !important; }#content .entry-box .image-bg {width: 100%; padding-top:50%;
    background-size: cover; margin-bottom:30px !important; background-repeat:no-repeat;} .leavecomment {margin-top:20px}.post-content, #content .entry-content, #content .tabberlive {width:730px; margin:0 auto;}.cat-meta, .entry-title.entry-title-single {text-align:center}.date-comments{    margin: 0 auto; display:table}.entry-title.entry-title-single {font-size:38px !important; margin-bottom: 20px !important;} div.date-comments, #content .post div.meta-comment a:link, #content div.entry-box .post .entry-utility a, #content  .entry-utility a:link, #content  .entry-utility a:visited, .meta-comment {color:#999 !important; font-size:16px !important;} .post-font {font-size:20px !important; padding-top:20px;}.social-buttons-no-widget {display:table; margin:0 auto;} @media only screen and (max-width: 690px) { .author-info .author-description {width:100%; float:none !important; text-align:center;} .author-info .author-avatar {text-align:center; float:none !important; margin-right: 0px !important; } #container, #container.single-no-sidebar, #container.single-no-sidebar #content {width:100% !important}.post-content, #content .entry-content, #content .tabberlive {width:90%}.entry-box .image-bg {width:100%} .entry-title.entry-title-single {font-size:30px !important; margin-bottom: 20px !important;} div.date-comments, .social-buttons-no-widget {display:none} .cat-meta {margin-top: 20px;}}

' ; }

$css .= 'body, input, textarea, .page-title span, .pingback a.url, .cbp-l-grid-projects-desc, .cbp-l-grid-blog-desc p {font-family: '. of_get_option('fonts_blog').'; font-size:16px; color:#000;} #body { -webkit-font-smoothing: antialiased !important;';  $background = of_get_option('body_background'); 
if ($background) 
{ if ($background['image']) { $css .= 'background:url('.$background['image']. ') '.$background['repeat']. ' '.$background['position']. ' '.$background['attachment']. ' '.$background['color']. ';';} elseif ($background['color'] == !''){ 
$css .= 'background:'.$background['color']. ';'; } else { $css .= '';} } else { $css .= ''; }; 
$css .= ' background-size:'. of_get_option('body_background_size').' }';
$css .= '#header{'; $background = of_get_option('header_background_around'); 
if ($background) { if ($background['image']) {
$css .= 'background:url('.$background['image']. ') '.$background['repeat']. ' '.$background['position']. ' '.$background['attachment']. ' '.$background['color']. ' !important;'; } elseif ($background['color'] == !'')  { $css .= 'background:'.$background['color']. '!important;'; } else {$css .= '';} } else { $css .= 'no entry'; }; 
$css .= '-webkit-border-top-left-radius: '. of_get_option('blog_curve').'px; -webkit-border-top-right-radius: '. of_get_option('blog_curve').'px; -moz-border-radius-topleft: '. of_get_option('blog_curve').'px; -moz-border-radius-topright: '. of_get_option('blog_curve').'px; border-top-left-radius: '. of_get_option('blog_curve').'px; border-top-right-radius: '. of_get_option('blog_curve').'px;' ;
if (of_get_option('header_width') == '1') { $css .= 'width: 100%;';} else { $css .= 'width: 1200px;';} $css .= 'margin:0 auto; background-size:'. of_get_option('background_header_size').'!important;}
h1, .woocommerce h1 {font-size:'. of_get_option('heading1').'}h2, .woocommerce h2{font-size:'. of_get_option('heading2').'}h3, .woocommerce h3{font-size:'. of_get_option('heading3').'}h4, .woocommerce h4{font-size:'. of_get_option('heading4').'}h5, .woocommerce h5{font-size:'. of_get_option('heading5').'}h6, .woocommerce h6{font-size:'. of_get_option('heading6').'}
#masthead {padding-top:'. of_get_option('padding_top_header').'px !important; }
#branding {width: 1200px;';
$background = of_get_option('header_background'); if ($background) { if ($background['image']) { $css .= 'background:url('.$background['image']. ') '.$background['repeat']. ' '.$background['position']. ' '.$background['attachment']. ' '.$background['color']. ';'; } elseif ($background['color'] == !'') { $css .= 'background:'.$background['color']. '!important;'; } else {$css .= '';}} else { $css .= 'no entry'; }; $css .= 'height:'. of_get_option('header_height').'px !important; -webkit-border-radius: '. of_get_option('header_curve').'px; -moz-border-radius: '. of_get_option('header_curve').'px; border-radius: '. of_get_option('header_curve').'px; background-size:'. of_get_option('background_size').' }
img.post_thumbnail.thumb-size {'; 
if (of_get_option('thumb_size') == 'large') { $css .= 'margin-bottom:15px; clear:left;';  } $css .= '}
div.head-height, div.head-style {height:'. of_get_option('header_height').'px !important;}
#site-title, #site-description {line-height:20px !important;}
h1#site-title {margin:0px;}
#site-title {'; $typography = of_get_option('logo_typography'); if ($typography) { if ( $typography['color'] !== '') { $css .= 'color:'. $typography['color'];} else { $css .= 'color:#000';}  $css .= ';
font: '. $typography['style'] .' '. $typography['size'] .' '.  $typography['face'].';';} $css .= 'text-transform: '. of_get_option('logo_transform').';}
#site-title a {	text-decoration: none;'; $typography = of_get_option('logo_typography'); if ($typography) {  if ( $typography['color'] !== '') { $css .= 'color:'. $typography['color'];} else { $css .= 'color:#000';}  $css .= ';font-size: '. $typography['size'] .' !important; font-family: '.  $typography['face'].'; font-weight: '. $typography['style'] .' !important; }';} $css .= '

#site-title a:hover {
text-decoration: none; ';if ( of_get_option('logo_hover') !== '') { $css .= 'color:'. of_get_option('logo_hover').';';} else { $css .= 'color:#000;';} $css .= '}
';if ( of_get_option('desc_yes') == "1") { $css .= ' #site-description {display:none}';} else { $css .= '

#site-description {letter-spacing:'. of_get_option('letter_spacing').'px; text-transform:'. of_get_option('desc_transform').';'; 
$typography = of_get_option('desc_typography'); if ($typography) { if ( $typography['color'] !== '') { $css .= 'color:'. $typography['color'];} else { $css .= 'color:#000';}  $css .= ';font: '. $typography['style'] .' '. $typography['size'] .' '.  $typography['face'].';}';} } $css .= '
#wrapper { '; $background = of_get_option('blog_background'); if ($background) { if ($background['image']) {
$css .= 'background:url('.$background['image']. ') '.$background['repeat']. ' '.$background['position']. ' '.$background['attachment']. ' '.$background['color']. ';'; } elseif ($background['color'] == !'')  { $css .= 'background:'.$background['color']. ';'; }  else {$css .= '';}} else { $css .= 'no entry'; }; $css .= 'margin-bottom:0px;'; if (of_get_option('wrapper_width') == '1') { $css .= 'width: 100% !important;';} if (of_get_option('wrapper_width') == '0') { $css .= 'width: 1200px;';}  $css .= '
background-size: '. of_get_option('wrapper_background_size').'!important;}

#access {z-index:5;'; if (of_get_option('menu_gradient') == '1') { $css .= 'background: url('.$imageurl.'gradient-menutop.png) top left repeat-x '. of_get_option('menu_color') .';';} elseif (of_get_option('menu_gradient') == '2'){ $css .= 'background: url('.$imageurl.'gradient-menubottom.png) bottom left repeat-x '. of_get_option('menu_color') .';';} elseif (of_get_option('menu_color') == !'') { $css .= 'background: '. of_get_option('menu_color').';';} $css .= 'margin-top:'. of_get_option('padding_top_menu').'px !important; margin-bottom:'. of_get_option('padding_bottom_menu').'px !important;'; if (of_get_option('menu_position') == '0') { $css .= 'border-radius: '. of_get_option('menu_curve').'px; -moz-border-radius: '. of_get_option('menu_curve').'px; -webkit-border-radius: '. of_get_option('menu_curve').'px;';} if (of_get_option('menu_position') == '1' && of_get_option('menu_width') == '2') { $css .= 'border-radius: '. of_get_option('menu_curve').'px; -moz-border-radius: '. of_get_option('menu_curve').'px; -webkit-border-radius: '. of_get_option('menu_curve').'px;';} 
if (of_get_option('menu_border') == '1') { $css .= 'border:1px solid '; if ( of_get_option('menu_dev_color') !== '') { $css .= of_get_option('menu_dev_color');} else { $css .= 'transparent';} $css .= ';';} $css .= 'display: block; margin: 0 auto;'; if (of_get_option('menu_width') == '1') { $css .= 'width: 100%;';} if (of_get_option('menu_width') == '2') { $css .= 'width: 1200px;';} if (of_get_option('menu_width') == '1' & of_get_option('menu_position') == '1') { $css .= '-webkit-border-top-left-radius: '. $blogcurve.'px; -webkit-border-top-right-radius: '. $blogcurve .'px; -moz-border-radius-topleft: '. $blogcurve .'px; -moz-border-radius-topright: '. $blogcurve .'px; border-top-left-radius: '. $blogcurve .'px; border-top-right-radius: '. $blogcurve .'px;';} if (of_get_option('menu_width') == '1' && of_get_option('wrapper_width') == '1') { $css .= 'border-radius: 0px; -moz-border-radius: 0px; -webkit-border-radius: 0px;';} if (of_get_option('menu_shadow_border') == '1') { $css .= ' -webkit-box-shadow: 0px 5px 6px -5px rgba(0, 0, 0, 0.6); -moz-box-shadow:    0px 5px 6px -5px rgba(0, 0, 0, 0.6); box-shadow: 0px 5px 6px -5px rgba(0, 0, 0, 0.6);';} $css .= 'position:relative;}
#access .menu-header, div.menu {position:relative;display: block;'; if (of_get_option('menu_width') == '1' || of_get_option('menu_width') == '2') { $css .= 'width: 1200px !important;margin:0 auto !important;';} if (of_get_option('menu_width') == '2') { $css .= 'border-radius: '. of_get_option('menu_curve').'px; -moz-border-radius: '. of_get_option('menu_curve').'px; -webkit-border-radius: '. of_get_option('menu_curve').'px;';} $css .= 'height:'. of_get_option('menu_height').'px;}
#access .menu-header ul, div.menu ul {list-style: none;}
#access div.menu ul {margin-left: 0px !important; margin-bottom:0px}
#access .menu-header, div.menu {'; if (of_get_option('menu_position_horizontal') == '1') { $css .= 'display: table;
width: auto !important;} #access .menu-header ul, div.menu ul {width:auto} ';}
$css .= '}
.myaccount{float:right !important}

#access .menu-header ul, div.menu ul {'; if (of_get_option('menu_position_horizontal') == '1') { $css .= '';} elseif (of_get_option('menu_position_horizontal') == '2') { $css .= 'display: table;float: right;';} else { $css .= 'display: table;float: left;  width:auto';}
$css .= '}
#access .menu-header li, div.menu li {position:relative; float: left; cursor: pointer; -webkit-transition: all 0.5s; -moz-transition: all 0.5s; -ms-transition: all 0.5s; -o-transition: all 0.5s; transition: all 0.5s;}
#access ul li:hover {'; if (of_get_option('menu_gradient') == '1'){ $css .= 'background: url('.$imageurl.'gradient-menutop.png) top left repeat-x '. of_get_option('menu_hover') .';';}  elseif (of_get_option('menu_gradient') == '2'){ $css .= 'background: url('.$imageurl.'gradient-menubottom.png) top left repeat-x '.of_get_option('menu_hover').';';} elseif (of_get_option('menu_hover') == !'') { $css .= 'background: '. of_get_option('menu_hover').';';} $css .= '}
#access  ul > li.current-menu-item {'; if (of_get_option('menu_gradient') == '1'){ $css .= 'background: url('.$imageurl.'gradient-menutop.png) top left repeat-x '.of_get_option('menu_hover').';';} elseif (of_get_option('menu_gradient') == '2'){ $css .= '
background: url('.$imageurl.'gradient-menubottom.png) top left repeat-x '.of_get_option('menu_hover').';';} elseif (of_get_option('menu_hover') == !'') { $css .= 'background: '. of_get_option('menu_hover').';';} $css .= '}
#access  li.current-menu-item a {
';if ( of_get_option('menu_text_hover') !== '') { $css .= 'color:'. of_get_option('menu_text_hover').'!important;';} else { $css .= 'color:#000!important;';} $css .= '}
#access ul li:first-child:hover, #access  ul > li.current-menu-item:first-child {'; if (of_get_option('wrapper_width') == '0' && of_get_option('menu_width') == '1' || of_get_option('menu_width') == '2' && of_get_option('menu_position') == '1') { $css .= '-moz-border-radius-topleft:'. $blogcurve.'px; -webkit-border-top-left-radius:'. $blogcurve.'px; border-top-left-radius:'. $blogcurve.'px; ';} elseif (of_get_option('menu_width') == '1' && of_get_option('wrapper_width') == '1'){ $css .= 'border-radius: 0px !important; -moz-border-radius: 0px !important; -webkit-border-radius: 0px !important;';} else {$css .= '-webkit-border-top-left-radius: '. $menucurve.'px; -webkit-border-bottom-left-radius: '. $menucurve.'px; -moz-border-radius-topleft: '. $menucurve.'px; -moz-border-radius-bottomleft: '. $menucurve.'px; border-top-left-radius: '. $menucurve.'px; border-bottom-left-radius: '. $menucurve.'px;';} $css .= '}
#access ul li ul li:first-child:hover {border-radius: 0px 0px 0px; -moz-border-radius: 0px 0px 0px; -webkit-border-radius: 0px 0px 0px;}
#access li a, #access li.cart-in-menu.current-menu-item a {text-decoration: none;'; $typography = of_get_option('menu_typography'); if ($typography) { if ( $typography['color'] !== '') { $css .= 'color:'. $typography['color'];} else { $css .= 'color:#000';}  $css .= '!important;
font: '. $typography['style'] .' '. $typography['size'] .' '.  $typography['face'].';';} $css .= 'text-transform: '. of_get_option('transform').'; vertical-align: middle; display: table-cell; height: '. of_get_option('menu_height').'px; padding: 0 15px;'; if (of_get_option('menu_devider') == '1') { $css .= 'border-right:1px solid '; if ( of_get_option('menu_dev_color') !== '') { $css .= of_get_option('menu_dev_color');} else { $css .= 'transparent';} $css .= ';';} $css .= '}
#access ul li ul li a {'; if (of_get_option('menu_devider') == '1') { $css .= 'border-right:none;';} $css .= '}
#access a:hover {';if ( of_get_option('menu_text_hover') !== '') { $css .= 'color:'. of_get_option('menu_text_hover').' !important;';} else { $css .= 'color:#000 !important;';} $css .= '}
#access ul ul li {'; if (of_get_option('menu_gradient') == '1'){ $css .= 'background: url('.$imageurl.'gradient-menutop.png) top left repeat-x '.of_get_option('menu_dropdown_color').';';} elseif (of_get_option('menu_gradient') == '2'){ $css .= 'background: url('.$imageurl.'gradient-menubottom.png) top left repeat-x '.of_get_option('menu_dropdown_color').';';} elseif (of_get_option('menu_dropdown_color') == !'') { $css .= 'background: '.  of_get_option('menu_dropdown_color').';';} $css .= '}
#access ul ul {display: none !important; position: absolute !important; top: '. of_get_option('menu_height').'px; left: 0; float: left; z-index: 5; margin:0px!important; width:100%;min-width:auto;'; if (of_get_option('menu_border') == '1'){ $css .= 'border:1px solid '; if ( of_get_option('menu_dev_color') !== '') { $css .= of_get_option('menu_dev_color');} else { $css .= 'transparent';} $css .= '; left: -1px;';} $css .= '}
#access ul li ul li:hover { ';if ( of_get_option('menu_text_hover') !== '') { $css .= 'color:'. of_get_option('menu_text_hover').';';} else { $css .= 'color:#000;';} $css .= '}
#access ul li:hover > ul {display: block !important; opacity: 1; visibility: visible;}
#access ul li ul li ul {border-top:none;}
#access ul li ul li {'; if (of_get_option('menu_border') == '0'){ $css .= 'border-right:none !important;';} $css .= 'border-left:none !important;}
#access ul li ul li {width:350px; border:none;}
 #access ul li ul li a {padding:10px 50px 10px 10px;}
#access ul ul ul {left: 100%; top: 0;}
#access li ul li a {height:'. of_get_option('sub_menu_height').'px; padding:0 5px;}
.fusion-portfolio #filters-container .cbp-filter-item-active{border:1px solid '; if ( of_get_option('button_color') !== '') { $css .= of_get_option('button_color');} else { $css .= 'transparent';} $css .= ' !important;}

#headercssmenu .cart-contents .count, .menu-header .cart-contents .count, .navbar .cart-contents .count {';if ( of_get_option('button_color') !== '') { $css .= 'background-color:'. of_get_option('button_color').';';} else { $css .= 'background-color:transparent;';} $css .= '}
.fusion-portfolio #filters-container .cbp-filter-item-active{color:#fff !important;}
.fusion-portfolio #filters-container .cbp-filter-item:hover{
'; if ( of_get_option('button_color') !== '') { $css .= 'color:'. of_get_option('button_color').';';} else { $css .= 'color:#000;';} $css .= '}
 #content .wpcw-course-enrollment-button a.fe_btn_completion:link {border:none}
#content div.post-font a.more-link {margin-bottom:0px !important}
.wpcw-button.wpcw-button-primary {border:none}
.button-form, #submit, .submit, a.comment-reply-link, a.more-link,   .pagenavi span.current, .archiv-title, #searchsubmit, .fusion-portfolio #filters-container .cbp-filter-item-active, .katalog-link, #content ul.tabbernav li.tabberactive a, .related-katalog .cbp-nav-next, .related-katalog .cbp-nav-prev,.woocommerce #respond input#submit, #content .woocommerce a.button, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, input.button, .buton-unit, #content .wpcw_fe_quiz_submit_data input.fe_btn_completion, #content .wpcw-course-enrollment-button a.fe_btn_completion:link, .wpcw-button.wpcw-button-primary { '; if ( of_get_option('button_color') !== '') { $css .= 'background:'. of_get_option('button_color').' !important;';} else { $css .= 'background:transparent !important;';} 
if ( of_get_option('button_color_text') !== '') { $css .= 'color:'. of_get_option('button_color_text').' !important;';} else { $css .= 'color:#000 !important;';} $css .= '-webkit-transition: all 0.5s;transition: all 0.5s;}
#headercssmenu ul li.cart-in-menu .count, .navbar .count  {'; if ( of_get_option('button_color_text') !== '') { $css .= 'color:'. of_get_option('button_color_text').';';} else { $css .= 'color:#000;';} $css .= '}
#content ul.tabbernav li.tabberactive a, .author-tabs, .woocommerce div.product .woocommerce-tabs ul.tabs li.active {border:1px solid '; if ( of_get_option('button_color') !== '') { $css .= of_get_option('button_color');} else { $css .= 'transparent';} $css .= '!important;}
.cbp-l-caption-buttonLeft,  .cbp-m-caption-buttonLeft,  .cbp-s-caption-buttonLeft, #content ul.tabbernav li.tabberactive a:hover, .woocommerce div.product .woocommerce-tabs ul.tabs li.active a:hover, .scrollupinsight
{'; if ( of_get_option('button_color') !== '') { $css .= 'background-color:'. of_get_option('button_color').' !important;';} else { $css .= 'background-color:transparent !important;';} 
if ( of_get_option('button_color_text') !== '') { $css .= 'color:'. of_get_option('button_color_text').' !important;';} else { $css .= 'color:#000 !important;';} $css .= '}
.cbp-l-caption-buttonLeft:hover, .cbp-m-caption-buttonLeft:hover, .cbp-s-caption-buttonLeft:hover, div.post-font a.more-link:hover, .search-button:hover, .submit:hover, a.comment-reply-link:hover, #submit:hover, .submit:hover, .button-form:hover, #content div.post-font a.more-link:hover, .pagenavi a:hover, .pagenavi span.current:hover,#searchsubmit:hover, #content .woocommerce a.button:hover, .woocommerce a.button:hover,  #content .woocommerce button.button:hover,  #content .woocommerce input.button:hover, .buton-unit:hover, .scrollupinsight:hover, #content .wpcw_fe_quiz_submit_data input.fe_btn_completion:hover, #content .wpcw-course-enrollment-button a.fe_btn_completion:hover, .wpcw-button.wpcw-button-primary:hover{ '; if ( of_get_option('button_color_hover') !== '') { $css .= 'background-color:'. of_get_option('button_color_hover').' !important;';} else { $css .= 'background-color:transparent !important;';} 
if ( of_get_option('button_color_text_hover') !== '') { $css .= 'color:'. of_get_option('button_color_text_hover').' !important;';} else { $css .= 'color:#000 !important;';} $css .= '}
#access ul.menu li.menu-item-has-children > a:after {font-family: FontAwesome;content: "\f0d7"; text-align:right;margin-left:5px;}
#access  ul.menu li ul li.menu-item-has-children > a:after {font-family: FontAwesome;content: "\f0da"; text-align:right;margin-left:5px;position:absolute;right:10px}
#access  ul.menu li ul li.menu-item-has-children {border-top:none;}
ul.tabbernav li a {border:1px solid #eee}
ul.tabbernav li a:hover {border:1px solid #eee; background:#fff; '; if ( of_get_option('button_color') !== '') { $css .= 'color:'. of_get_option('button_color').' !important;';} else { $css .= 'color:#000 !important;';} $css .= '}
.sp-form .sp-button.buttonpostform {border:none}
a.more-link,ul.tabbernav li a:hover,  #content  ul.tabbernav li.tabberactive a,  #content  ul.tabbernav li.tabberactive a:hover, #submit, #submit:visited, .submit, .submit:visited, .button, .button:visited, a.comment-reply-link, .pagenavi a, .pagenavi a:link, .pagenavi a:visited, .pagenavi .current, .pagenavi .on, .pagenavi span.pages, .insta-button, .pagenavi span.current, .archiv-title, .woocommerce #respond input#submit, #content .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce div.product .woocommerce-tabs ul.tabs li, input.button, .wpcw_fe_quiz_submit_data input.fe_btn, a.fe_btn, #footer a.scrollupinsight, ul.tabbernav li a, .sp-form .sp-button.buttonpostform, button.buttonpostform, .buttonpostform, #content div.post-font a.more-link,a.more-link, #content a.wpcw-button.wpcw-button-primary {font-family:'. of_get_option('fonts_blog').'; font-size:18px !important; '; if ( of_get_option('buttons_shape') == '3px'){ $css .= 'border-radius: 3px !important; -moz-border-radius: 3px !important;-webkit-border-radius: 3px !important;';} elseif ( of_get_option('buttons_shape') == '50px') {$css .= 'border-radius: 50px !important; -moz-border-radius: 50px !important;-webkit-border-radius: 50px !important;';} else {$css .= 'border-radius: 0px !important; -moz-border-radius: 0px !important;-webkit-border-radius: 0px !important;';}  $css .= '}
div.readmore4, div.readmore5, div.readmore6, div.tagcloud a, .cbp-l-filters-alignLeft .cbp-filter-item, .form-control, .btn, .cbp-m-caption-buttonLeft, .cbp-l-caption-buttonLeft, .cbp-s-caption-buttonLeft, .cbp-s-caption-buttonRight, .cbp-m-caption-buttonRight, .cbp-l-caption-buttonRight, .cbp-nav-prev, .cbp-nav-next,.social-likes__widget,#searchsubmit, #searchsubmit:visited
{'; if ( of_get_option('buttons_shape') == '3px'){ $css .= 'border-radius: 3px; -moz-border-radius: 3px;-webkit-border-radius: 3px;';} else {$css .= 'border-radius: 0px !important; -moz-border-radius: 0px !important;-webkit-border-radius: 0px !important;';}  $css .= '}
.search-button,  .pagenavi .current, .pagenavi .on,  a.archiv-title, .blog-post-tags ul.blog-tags a:hover { '; if ( of_get_option('button_color_text') !== '') { $css .= 'color:'. of_get_option('button_color_text').' !important;';} else { $css .= 'color:#000 !important;';}  if ( of_get_option('button_color') !== '') { $css .= 'background:'. of_get_option('button_color').' !important;';} else { $css .= 'background:transparent !important;';} $css .= '}
#subs input[type=submit], #subs input[type=submit]:visited, div.buttonpostform, button.buttonpostform, .sp-form .sp-button.buttonpostform { '; if ( of_get_option('post_bg_button') !== '') { $css .= 'background-color:'. of_get_option('post_bg_button').' !important;';} else { $css .= 'background-color:transparent !important;';} $css .= 'background-size:cover }
.custom-read-more {clear: both;margin:0 auto; padding: 0 20px}
#subs input[type=submit]:hover, div.buttonpostform:hover, button.buttonpostform:hover, .sp-form .sp-button.buttonpostform:hover {'; if ( of_get_option('post_bg_button_hover') !== '') { $css .= 'background:'. of_get_option('post_bg_button_hover').' !important;';} else { $css .= 'background:transparent !important;';} $css .= '}

 .sp-form .sp-button.buttonpostform:hover, .sp-form .sp-button.buttonpostform, button.buttonpostform:hover  {top:2px; border:none;}
#content-main {position:relative; z-index:2;'; 
if ( of_get_option('main_width') == '1'){ $css .= 'width:100%;';}  else {$css .= 'width:1200px;';}
$css .= 'margin:0 auto;'; $background = of_get_option('main_bg'); if ($background) { if ($background['image']) { $css .= 'background:url('.$background['image']. ') '.$background['repeat']. ' '.$background['position']. ' '.$background['attachment']. ' '.$background['color']. ';';} elseif ($background['color'] == !'') { $css .= 'background:'.$background['color']. ';';} else {$css .= '';}} else { $css .= 'no entry';}; 


 if ( of_get_option('main_border') == '1px') { $css .= 'border:'. of_get_option('main_border', 'no entry' ).' solid '; if ( of_get_option('main_border_color') !== '') { $css .= of_get_option('main_border_color') .';';} else { $css .= 'transparent;';}} else {$css .= '';} $css .= '  -moz-border-radius:'. of_get_option('main_curve', 'no entry' ).'px; -webkit-border-radius:'. of_get_option('main_curve', 'no entry' ).'px;  border-radius:'.of_get_option('main_curve', 'no entry' ).'px; margin-top: '. of_get_option('margin_top_main', 'no entry' ).'px; margin-bottom: '. of_get_option('margin_bottom_main', 'no entry' ).'px;}
#footer {position: relative; z-index: 2;'; $background = of_get_option('footer_background'); if ($background) { if ($background['image']) {
$css .= 'background:url('.$background['image']. ') '.$background['repeat']. ' '.$background['position']. ' '.$background['attachment']. ' '.$background['color']. ';';} elseif ($background['color'] == !'') { $css .= 'background:'.$background['color']. ';';} else {$css .= '';}} else { $css .= 'no entry';}; 
if ( of_get_option('footer_color') !== '') { $css .= 'color:'. of_get_option('footer_color').' !important;';} else { $css .= 'color:#000 !important;';} $css .= '
margin:0 auto;'; if (of_get_option('footer_width') == '1200px') { $css .= 'width:1200px;';} else {$css .= 'width:100%;';} 
if (of_get_option('footer_width') == '100%' && of_get_option('wrapper_width') == '0') { $css .= '-webkit-border-bottom-left-radius: '. $blogcurve.'px; -webkit-border-bottom-right-radius: '. $blogcurve .'px; -moz-border-radius-bottomleft: '. $blogcurve .'px; -moz-border-radius-bottomright: '. $blogcurve .'px; border-bottom-left-radius: '. $blogcurve .'px; border-bottom-right-radius: '. $blogcurve .'px;';} $css .= '}
.footer {width:1200px !important; margin:0 auto; font-size:14px;} 
.footer-mid {width:960px !important;text-align:center; margin:0 auto !important;}
.footer-form {position: relative; z-index: 2;}
.footer-widget-box {position: relative; z-index: 2;'; if (of_get_option('footer_width') == '1200px') { $css .= 'width:1200px;';}  else {$css .= 'width:100%;';}  $background = of_get_option('footer_widget_bg'); if ($background) { if ($background['image']) {
$css .= 'background:url('.$background['image']. ') '.$background['repeat']. ' '.$background['position']. ' '.$background['attachment']. ' '.$background['color']. ';';} elseif ($background['color'] == !'') { $css .= 'background:'.$background['color']. ';';} else {$css .= '';}} else { $css .= 'no entry';}; $css .= ' margin:0 auto;}
#footer a {'; if ( of_get_option('footer_color') !== '') { $css .= 'color:'. of_get_option('footer_color').' !important;';} else { $css .= 'color:#000 !important;';} $css .= '}
#footer-widget-area div.widget-title{'; $typography = of_get_option('footer_widget_typography'); 
if ($typography) { if ( $typography['color'] !== '') { $css .= 'color:'. $typography['color'];} else { $css .= 'color:#000';}  $css .= ' !important;
font: '. $typography['style'] .' '. $typography['size'] .' '.  $typography['face'].';';} $css .= 'text-transform: '. of_get_option('footer_transform_widget').';'; 
if ( of_get_option('footer_widget_header_bg') !== '') { $css .= 'background:'. of_get_option('footer_widget_header_bg');} else { $css .= 'background:transparent';} $css .= '}

'; if (of_get_option('wrapper_width') == '0') { $css .= '#footer-widget-area {width:1160px;} #footer-widget-area ul li.widget {'; if (of_get_option('widget_number') == '3') { $css .= 'width:33.2%;';} else {$css .= 'width:23.8%;';} $css .= '} ';} else { $css .= '#footer-widget-area {
'; if (of_get_option('footer_width') == '1200px') { $css .= 'width:1160px;';} else { $css .= 'width:1200px;';} $css .= '} #footer-widget-area ul li.widget {'; if (of_get_option('widget_number') == '3') { $css .= 'width:31.8%;';} else { $css .= 'width:23.6%;';} $css .= '} ';} $css .='

'; if (of_get_option('widget_number') == '3') { $css .= '#footer-widget-area ul li.widget:nth-child(3n) {margin-right:0px}';} else { $css .= '#footer-widget-area ul li.widget:nth-child(4n) {margin-right:0px !important}';} $css .= '
#footer-widget-area ul li.widget:first-child {margin-left:0px !important}

#footer-widget-area { padding-left:0px; padding-bottom:5px;  margin:0 auto;}
#footer-widget-area ul {margin-bottom:15px;}
#footer-widget-area ul.xoxo {    display: flex;justify-content: space-between;width: 100%;}

#footer-widget-area ul li.widget {-moz-border-radius:'. of_get_option('footer_widget_curve', 'no entry' ).'px; -webkit-border-radius:'. of_get_option('footer_widget_curve', 'no entry' ).'px; border-radius:'. of_get_option('footer_widget_curve', 'no entry' ).'px; 
float:left;'; if (of_get_option('footer_width') == '1200px') { $css .= 'margin:0px 10px 3px 10px;';} else {$css .= 'margin:0px 14px 0px 7px;';} $css .= 'margin-bottom:0px;margin-top:20px;'; $background = of_get_option('footer_widget_background'); if ($background) { if ($background['image']) {
$css .= 'background:url('.$background['image']. ') '.$background['repeat']. ' '.$background['position']. ' '.$background['attachment']. ' '.$background['color']. ';';} elseif ($background['color'] == !'') { $css .= 'background:'.$background['color']. ';';} else {$css .= '';}} else { $css .= 'no entry';}; $css .= 'padding:20px !important; }
#footer-widget-area  a:link, #footer-widget-area  a:visited {text-decoration: none; '; if ( of_get_option('widget_footer_color') !== '') { $css .= 'color:'. of_get_option('widget_footer_color').'!important;';} else { $css .= 'color:#000 !important;';} $css .= '}
#footer-widget-area  a:active, #footer-widget-area  a:hover, #footer-widget-area ul li.widget a:hover {background:none;text-decoration: underline; '; if ( of_get_option('widget_footer_color') !== '') { $css .= 'color:'. of_get_option('widget_footer_color').'!important;';} else { $css .= 'color:#000!important;';} $css .= '}
div.widget-container {float:right}

li.widget-container, div.widget-container, .single-course_unit #primary.widget-area ul li {border-radius: '. of_get_option('widget_curve', 'no entry' ).'px;    border:'. of_get_option('widget_border', 'no entry' ).' solid 
'; if ( of_get_option('widget_border_color') !== '') { $css .= of_get_option('widget_border_color');} else { $css .= 'transparent';} $css .= '!important; '; $background = of_get_option('widget_background'); if ($background) {if ($background['image']) { $css .= 'background:url('.$background['image']. ') '.$background['repeat']. ' '.$background['position']. ' '.$background['attachment']. ' '.$background['color']. ';';} elseif ($background['color'] == !'') { $css .= 'background:'.$background['color']. ';';} else {$css .= '';} } else { $css .= 'no entry';}; 
$css .= '} .widget-area a:link, .widget-area a:visited {text-decoration: none; } #footer-widget-area  a:link, #footer-widget-area  a:visited, #footer-widget-area{'; if ( of_get_option('widget_footer_color') !== '') { $css .= 'color:'. of_get_option('widget_footer_color').'!important;';} else { $css .= 'color:#000!important;';} $css .= '}
.shop-widget {float:left !important;}
.leavecomment {float:left;}
.recent_comment li {font-weight:bold}
.recent_comment li a:link { color: #333; font-weight:normal}
.widget-area a:active, .widget-area a:hover {text-decoration: underline; }
.entry-box, .entry-box.ab-inspiration-woocommerce-entry, .entry-box.ab-inspiration-woocommerce-entry-home {-moz-border-radius:'. of_get_option('post_curve', 'no entry' ).'px; -webkit-border-radius:'. of_get_option('post_curve', 'no entry' ).'px; border-radius:'.of_get_option('post_curve', 'no entry' ).'px; border:'. of_get_option('post_border', 'no entry' ).' solid '; if ( of_get_option('post_border_color') !== '') { $css .= of_get_option('post_border_color');} else { $css .= 'transparent';} $css .= '; '; $background = of_get_option('post_background'); if ($background) {if ($background['image']) { $css .= 'background:url('.$background['image']. ') '.$background['repeat']. ' '.$background['position']. ' '.$background['attachment']. ' '.$background['color']. ';';} elseif ($background['color'] == !'') { $css .= 'background:'.$background['color']. ';';} else {$css .= '';} } else { $css .= 'no entry';}; 
$css .= '}'; 


if (of_get_option('post_width') == '2') 
{ $css .= '#main {max-width:1200px !important;} #primary {width:32% !important}#form-background{width:100% !important; margin-bottom:30px !important; }.entry-box {padding:30px;}li.widget-container, div.widget-container {margin-bottom:30px; padding:30px; } .one-column #content {width:1200px;} #container {width:66.4% !important;} #container.one-column {width:100% !important;} #content {width:100%;}.pagenavi {padding-bottom:40px}';} 

else { $css .= '#main {max-width:1200px; padding:20px !important}.one-column #content {width:100%;}#container {width:66.4% !important;} #container.one-column {width:100% !important;} #content {width:100%;}.shop-widget {width:32% !important !important;}#container.single-no-sidebar,#container.single-no-sidebar #content {width:100%}';}



if (of_get_option('widget_border') == 'none') { $css .= '.widget-container:first-child {padding-top:0px !important;} ';}
if (of_get_option('post_border') == 'none') { $css .= '.entry-box:first-child {padding-top:0px !important;}.entry-box {padding-left:0px !important; padding-bottom:0px !important;} .one-column .entry-box {padding-left:5px; padding-right:5px;} .entry-box.ab-inspiration-woocommerce-entry {padding-right:3px; padding-left:0px;}  ';}
$css .= '.woocommerce ul.products li.product, .woocommerce-page ul.products li.product, .woocommerce ul.products li.last, .woocommerce-page ul.products li.last, .woocommerce #content div.product div.images img, .woocommerce div.product div.images img, .woocommerce-page #content div.product div.images img, .woocommerce-page div.product div.images img, .woocommerce-Tabs-panel.woocommerce-Tabs-panel--description.panel.entry-content .contet-tab, .woocommerce div.product .woocommerce-tabs ul.tabs li {'; if ( of_get_option('post_border_color') !== '') { $css .= 'border-color:'. of_get_option('post_border_color').'!important;';} else { $css .= 'border-color:transparent!important;';} $css .= '}
.widget-title {'; if (of_get_option('widget_header_bg') == '') { $css .= 'padding:5px 0px 25px 0px !important;';} else { $css .= 'padding: 5px 5px 5px 10px;';}  if (of_get_option('widget_header_align') == 'center') { $css .= 'text-align:center;';} else { $css .= 'text-align:left;';} $css .= '}
#container.single-no-sidebar {float:none !important; margin: 0 auto;}  

#main {padding-top:'.of_get_option('padding_top_main').'px; padding-bottom:'.of_get_option('padding_bottom_main').'px;}

.widget-area .recentpost-title a:link, .widget-area .recentpost-title a:visited {color: #333 !important;}
div.recent-posts img {margin-right:15px !important;}
.post-font, .portfolio {font-size:'. of_get_option('post_font_size').'px !important;}
.woocommerce-product-rating, .woocommerce-Tabs-panel, .comment_container .comment-text div.description {font-size:16px !important;}
.list1 ul,.list2 ul,.list3 ul,.list4 ul,.list5 ul,.list6 ul,.list7 ul,.list8 ul,.list9 ul,.list10 ul,.list11 ul ,.list12 ul ,.list13 ul ,.list14 ul ,.list15 ul ,.list16 ul ,.list17 ul  {list-style:none !important;  list-style-position: outside !important; font-size:'. of_get_option('post_font_size').'px}
.widget-container .list1 ul, .widget-container .list2 ul, .widget-container .list3 ul, .widget-container .list4 ul, .widget-container .list5 ul, .widget-container .list6 ul, .widget-container .list7 ul, .widget-container .list8 ul, .widget-container .list9 ul, .widget-container .list10 ul, .widget-container .list11 ul, .widget-container .list12 ul, .widget-container .list13 ul, .widget-container .list14 ul, .widget-container .list15 ul, .widget-container .list16 ul, .widget-container .list17 ul {margin-left:0px !important}
.list1  ul li:before {font-family: FontAwesome; content: "\f00c"; vertical-align:middle}
.list2  ul li:before {font-family: FontAwesome; content: "\f14a";margin-right:10px;vertical-align:middle}
.list3  ul li:before {font-family: FontAwesome; content: "\f046";margin-right:10px;vertical-align:middle}
.list4  ul li:before {font-family: FontAwesome; content: "\f058";margin-right:10px;vertical-align:middle}
.list5  ul li:before {font-family: FontAwesome; content: "\f05d";margin-right:10px;vertical-align:middle}
.list6  ul li:before {font-family: FontAwesome; content: "\f111";margin-right:10px;vertical-align:middle}
.list7  ul li:before {font-family: FontAwesome; content: "\f10c";margin-right:10px;vertical-align:middle}
.list8  ul li:before {font-family: FontAwesome; content: "\f0c8";margin-right:10px;vertical-align:middle}
.list9  ul li:before {font-family: FontAwesome; content: "\f096";margin-right:10px;vertical-align:middle}
.list10  ul li:before {font-family: FontAwesome; content: "\f067";margin-right:10px;vertical-align:middle}
.list11  ul li:before {font-family: FontAwesome; content: "\f055";margin-right:10px;vertical-align:middle}
.list12  ul li:before {font-family: FontAwesome; content: "\f0fe";margin-right:10px;vertical-align:middle}
.list13  ul li:before {font-family: FontAwesome; content: "\f196";margin-right:10px;vertical-align:middle}
.list14  ul li:before {font-family: FontAwesome; content: "\f068";margin-right:10px;vertical-align:middle}
.list15  ul li:before {font-family: FontAwesome; content: "\f056";margin-right:10px;vertical-align:middle}
.list16  ul li:before {font-family: FontAwesome; content: "\f146";margin-right:10px;vertical-align:middle}
.list17  ul li:before {font-family: FontAwesome; content: "\f147";margin-right:10px;vertical-align:middle}
.colornormal ul li:before {'; if ( of_get_option('bullets_color') !== '') { $css .= 'color:'. of_get_option('bullets_color').';';} else { $css .= 'color:#000;';} $css .= '}
.colorplus ul li:before {'; if ( of_get_option('bullets_color2') !== '') { $css .= 'color:'. of_get_option('bullets_color2').';';} else { $css .= 'color:#000;';} $css .= '}
.colorminus ul li:before {'; if ( of_get_option('bullets_color3') !== '') { $css .= 'color:'. of_get_option('bullets_color3').';';} else { $css .= 'color:#000;';} $css .= '}
.colorneutral ul li:before {'; if ( of_get_option('bullets_color4') !== '') { $css .= 'color:'. of_get_option('bullets_color4').';';} else { $css .= 'color:#000;';} $css .= '}
.sizesmall ul li:before {font-size:'. of_get_option('post_font_size').'px}
.sizemiddle ul li:before {font-size:20px;}
.sizebig ul li:before {font-size:30px;}
#primary li.widget_product_categories ul.product-categories li a:link, #primary li.widget_product_categories ul.product-categories li a:visited {color:#333 !important}
li.widget_ab_categories ul, #primary li.widget_product_categories ul.product-categories, #primary li.widget_product_categories ul.product-categories li ul  {list-style:none;margin-left:0px !important;}
li.widget_ab_categories ul li a:hover, #primary li.widget_product_categories ul.product-categories li a:hover {text-decoration:none;}
li.widget_ab_categories ul li a { display: block;padding:6px 10px;margin:0px;font-size:16px;}
#primary li.widget_product_categories ul.product-categories li a {padding:6px 0px;margin:0px;font-size:16px;}
#primary li.widget_product_categories ul.product-categories li span {float:right}
#primary li.widget_product_categories ul.product-categories li, .woocommerce ul.cart_list li, div.woocommerce ul.product_list_widget li.mini_cart_item {padding:10px 0px}.woocommerce ul.cart_list li a, .woocommerce ul.product_list_widget li a {padding-top:10px !important}
#related_posts li {width:31.7%;}.related_image {width:100%; padding-top:80% !important}
ul.cart_list.product_list_widget  {margin-left:0px !important}
li.widget_ab_categories ul li:last-child, #primary li.widget_product_categories ul.product-categories li:last-child {border-bottom:none !important;}
li.widget_ab_categories ul li ul, #primary li.widget_product_categories ul.product-categories li ul {padding-left:20px !important;}
li.widget_ab_categories ul li ul li a, #primary li.widget_product_categories ul.product-categories li ul li a {font-size:14px !important;}
li.widget_ab_categories ul li ul li a:before, #primary li.widget_product_categories ul.product-categories li ul li a:before {font-family: FontAwesome;content: "\f105";padding-right:10px;}
#tabs ul li:before {content: "";padding-right:0px;}
.tagcloud a:before {font-family: FontAwesome;content: "\f02b"; padding-right:5px;font-size:10px;}
.tagssingle a {margin: 2px 10px 2px 0px !important;}
.tagcloud a { color:#777!important;display: inline-block;margin: 2px 0px;padding: 3px 5px;background-color: #F9F9F9;border: 1px solid #eaeaea;font-size: 13px !important; text-decoration:none}
.tagcloud a:hover {'; if ( of_get_option('button_color') !== '') { $css .= 'background:'. of_get_option('button_color').'!important;';} else { $css .= 'background:transparent!important;';} if ( of_get_option('button_color_text') !== '') { $css .= 'color:'. of_get_option('button_color_text').'!important;';} else { $css .= 'color:#000!important;';} $css .= 'text-decoration:none}
.tagcloud {margin-top:10px;}
.commentlist li {'; if ( of_get_option('comment_color') !== '') { $css .= 'background-color:'. of_get_option('comment_color').'!important;';} else { $css .= 'background-color:transparent !important;';} $css .= '}
li.bypostauthor { 
'; if ( of_get_option('author_comment_color') !== '') { $css .= 'background-color:'. of_get_option('author_comment_color').'!important;';} else { $css .= 'background-color:transparent !important;';} $css .= '}
.post-font h1, .post-font h2, .post-font h3, .post-font h4, .post-font h5, .post-font h6, h1.katalog-title {font-family:'. of_get_option('fonts_headers').'; 
'; if ( of_get_option('post_headings') !== '') { $css .= 'color:'. of_get_option('post_headings').'!important;';} else { $css .= 'color:#000 !important;';} $css .= '}
.tccol4 span{'; if ( of_get_option('button_color_text') !== '') { $css .= 'color:'. of_get_option('button_color_text').'!important;';} else { $css .= 'color:#000!important;';} if ( of_get_option('button_color') !== '') { $css .= 'background-color:'. of_get_option('button_color').';';} else { $css .= 'background-color:transparent;';} $css .= '}
.widget-title {line-height:1.1 !important; padding:5px 5px 5px 10px; text-transform: '. of_get_option('transform_widget', 'no entry' ).'; ';
if ( of_get_option('widget_header_bg' ) !== '') { $css .= 'background:'. of_get_option('widget_header_bg' ).';';} else { $css .= 'background:transparent;';} 
$typography = of_get_option('widget_typography'); if ($typography) { if ( $typography['color'] !== '') { $css .= 'color:'. $typography['color'];} else { $css .= 'color:#000';}  $css .= ';font: '. $typography['style'] .' '. $typography['size'] .' '.  $typography['face'].';';} $css .= '}
.post a:visited {'; if ( of_get_option('linksvisited_colorpicker') !== '') { $css .= 'color:'. of_get_option('linksvisited_colorpicker').';';} else { $css .= 'color:#000;';} $css .= '}
a:focus {outline:none;}
#grid-container2 .cbp-l-grid-projects-title div.entry-title a:visited { '; $typography = of_get_option('post_typography'); if ($typography) { if ( $typography['color'] !== '') { $css .= 'color:'. $typography['color'];} else { $css .= 'color:#000';}  $css .= ';font: '. $typography['style'] .' '. $typography['size'] .' '.  $typography['face'].';';} $css .= '}
#grid-container2 .cbp-l-grid-projects-title div.entry-title a:link {'; $typography = of_get_option('post_typography'); 
if ($typography) { if ( $typography['color'] !== '') { $css .= 'color:'. $typography['color'];} else { $css .= 'color:#000';}  $css .= ' !important;font-style: '. $typography['style'] .' !important; font-weight: '; if ($homepage['heading_text_strong6'] ==  1)  {$css .=   '500 !important';} else {$css .=   'normal !important';} $css .=  ';font-size: '. $homepage['hp_header_size6'] .'px !important;'; } $css .= '}
.entry-title, h1.entry-title, .wpcw-course-title {'; $typography = of_get_option('post_typography'); if ($typography) { if ( $typography['color'] !== '') { $css .= 'color:'. $typography['color'];} else { $css .= 'color:#000';}  $css .= ';font: '. $typography['style'] .' '. $typography['size'] .' '.  $typography['face'].' !important; margin-top:0px !important;}';}
$css .= '
#content div.post h2.entry-title a:link, #content div.post h2.entry-title a:visited, h3.wpcw-course-title a:link, h3.wpcw-course-title a:visited, .col-lg-4 h2.entry-title a:visited, .col-lg-4 h2.entry-title a:link  {text-decoration: none;'; $typography = of_get_option('post_typography'); if ($typography) {if ( $typography['color'] !== '') { $css .= 'color:'. $typography['color'];} else { $css .= 'color:#000';}  $css .= ' !important;
font: '. $typography['style'] .' '. $typography['size'] .' '.  $typography['face'].';}';} $css .= '#content div.post h2.entry-title a:active, #content div.post h2.entry-title a:hover, h3.wpcw-course-title a:active, h3.wpcw-course-title a:hover, .col-lg-4 h2.entry-title a:hover{'; if ( of_get_option('title_hover') !== '') { $css .= 'color:'. of_get_option('title_hover').'!important;';} else { $css .= 'color:#000!important;';} $css .= '}
h1.entry-title-single { '; if ( of_get_option('title_single') !== '') { $css .= 'color:'. of_get_option('title_single').';';} else { $css .= 'color:#000;';} $css .= '}
.entry-title6 {margin-bottom:0px !important}

.entry-content a:link, .entry-content a:visited, .commentlist a:link, .commentlist a:visited,.woocommerce div.product .stock,.widget-area a:link, .widget-area a:visited {'; if ( of_get_option('linkslink_colorpicker') !== '') { $css .= 'color:'. of_get_option('linkslink_colorpicker').';';} else { $css .= 'color:#000;';} $css .= '}

.post a:hover, .post a:visited:hover, .comment-meta a:active, .comment-meta a:hover,.reply a:hover, a.comment-edit-link:hover,a:active, a:hover,.navigation a:active, .navigation a:hover,#tabs.homepageitemstabs ul.homepageitemstabsul li.homepageitemstabsli a:hover, #tabs.homepageitemstabs ul.homepageitemstabsul li.homepageitemstabsli a:after,#tabs.homepageitemstabs ul.homepageitemstabsul li.homepageitemstabsli.ui-tabs-active a,.widget-area a:active, .widget-area a:hover, li.widget_ab_categories ul li a:hover, #primary li.widget_product_categories ul.product-categories li a:hover {
'; if ( of_get_option('linkshover_colorpicker') !== '') { $css .= 'color:'. of_get_option('linkshover_colorpicker').';';} else { $css .= 'color:#000;';} $css .= '}
div.buttonsinvite div.heading {'. of_get_option('share_header_align').';'; $typography = of_get_option('header_button_post_style'); if ($typography) { if ( $typography['color'] !== '') { $css .= 'color:'. $typography['color'];} else { $css .= 'color:#000';}  $css .= ' !important;	font: '. $typography['style'] .' '. $typography['size'] .' '.  $typography['face'].';';} $css .= 'padding-bottom:5px; padding-top:5px;}
.buttonsinvitestyle {margin-bottom:15px;margin-top:15px; '; if (of_get_option('share_header_align') == 'text-align:center') { $css .= 'text-align:center';} else {$css .= 'float:left !important';}  $css .= '}
div.buttonsinvite {'; if ( of_get_option('post_form_colorpicker') !== '') { $css .= 'background-color:'. of_get_option('button_color').';';} else { $css .= 'background-color:transparent;';} $css .= '}
.headerformpost {'; $typography = of_get_option('header_form_post_style'); if ($typography) { if ( $typography['color'] !== '') { $css .= 'color:'. $typography['color'];} else { $css .= 'color:#000';}  $css .= '!important;	font: '. $typography['style'] .' '. $typography['size'] .' '.  $typography['face'].';';} $css .= '}
#footer {-moz-border-bottom-right-radius:'. of_get_option('blog_curve').'px; -webkit-border-bottom-right-radius:'. of_get_option('blog_curve' ).'px; -moz-border-bottom-left-radius:'. of_get_option('blog_curve').'px; -webkit-border-bottom-left-radius:'. of_get_option('blog_curve' ).'px; border-bottom-left-radius:'. of_get_option('blog_curve' ).'px; border-bottom-right-radius:'. of_get_option('blog_curve' ).'px; }
#wrapper {-moz-border-radius:'. of_get_option('blog_curve').'px; -webkit-border-radius:'. of_get_option('blog_curve' ).'px; border-radius:'. of_get_option('blog_curve' ).'px; ';

 if ( of_get_option('blog_border') == '1px') { 
$css .= 'border:'. of_get_option('blog_border').' solid '; if ( of_get_option('blog_border_color') !== '') { $css .= of_get_option('blog_border_color');} else { $css .= 'transparent';}} else {$css .= '';} $css .= '; margin-top:'. of_get_option('padding_top_blog').'px; box-shadow:'. of_get_option('blog_shadow').'; -moz-box-shadow: '. of_get_option('blog_shadow').'; -webkit-box-shadow: '. of_get_option('blog_shadow').';'; if (of_get_option('wrapper_width') == '1'){ $css .= '-moz-border-radius:0px; -webkit-border-radius:0px; border-radius:0px; ';} $css .= '}
.author-info {text-align:left !important;} .author-description {width:70%}
#subs{ padding:20px;width:100%; text-align:center; margin-bottom:15px; margin-top:10px;  background: url('. of_get_option('postform_background').') no-repeat '. of_get_option('post_form_colorpicker', 'no entry').';'; if (of_get_option('postform_border') == '1') { $css .= 'border: 1px solid '; if ( of_get_option('postform_border_color') !== '') { $css .= of_get_option('postform_border_color');} else { $css .= 'transparent';} $css .= '!important;';} $css .= 'border-radius: '. of_get_option('postform_curve').'px; -moz-border-radius: '. of_get_option('postform_curve').'px; -webkit-border-radius: '. of_get_option('postform_curve').'px; background-size:contain !important;}


.author-info{ padding:20px;width:100%; text-align:center; margin-bottom:15px; margin-top:10px;  '; if (of_get_option('postform_border') == '1') { $css .= 'border: 1px solid '; if ( of_get_option('postform_border_color') !== '') { $css .= of_get_option('postform_border_color');} else { $css .= 'transparent';} $css .= '!important;';} $css .= 'border-radius: '. of_get_option('postform_curve').'px; -moz-border-radius: '. of_get_option('postform_curve').'px; -webkit-border-radius: '. of_get_option('postform_curve').'px; background-size:contain !important;}
div.buttonsinvite {'; if (of_get_option('share_border') == '1') { $css .= 'border: 1px solid '; if ( of_get_option('share_border_color') !== '') { $css .= of_get_option('share_border_color');} else { $css .= 'transparent';} $css .= '; padding:0 10px;';} else { $css .= 'border: none; padding:0;';} $css .= 'border-radius: '. of_get_option('share_curve').'px; -moz-border-radius: '. of_get_option('share_curve').'px; -webkit-border-radius: '. of_get_option('share_curve').'px; '; if ( of_get_option('share_bg') !== '') { $css .= 'background-color:'. of_get_option('share_bg').';';} else { $css .= 'background-color:transparent;';} $css .= '}
input.form-button-popup {background-image: url('.of_get_option('popup_button', '' ).') !important; }
input.btnhovpop {background-image: url('.of_get_option('popup_button', '' ).')!important;}
.expop_style {background-image: url('.of_get_option('popup_bg', '' ).');}
#form-background {position:relative; z-index: 2;'; if (of_get_option('widgetform_background') !== '') { $css .= 'background-image: url('.of_get_option('widgetform_background').'); background-position: '.of_get_option('form_widget_bg_pos').'; background-size:contain;background-repeat: no-repeat; '; if ( of_get_option('form_colorpicker') !== '') { $css .= 'background-color:'. of_get_option('form_colorpicker').';';} else { $css .= 'background-color:transparent;';} ;} else {if ( of_get_option('form_colorpicker') !== '') { $css .= 'background:'. of_get_option('form_colorpicker').';';} else { $css .= 'background:transparent;';} $css .= '
background: -moz-linear-gradient(top,c'; if ( of_get_option('form_colorpicker') !== '') { $css .=  of_get_option('form_colorpicker');} else { $css .= '#ffffff';} $css .= ' 0%, '; if ( of_get_option('form_colorpicker_bottom') !== '') { $css .=  of_get_option('form_colorpicker_bottom');} else { $css .= '#ffffff';} $css .= '); 
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,'; if ( of_get_option('form_colorpicker') !== '') { $css .=  of_get_option('form_colorpicker');} else { $css .= '#ffffff';} $css .= '), color-stop(100%, '; if ( of_get_option('form_colorpicker_bottom') !== '') { $css .=  of_get_option('form_colorpicker_bottom');} else { $css .= '#ffffff';} $css .= ')); 
background: -webkit-linear-gradient(top,  '; if ( of_get_option('form_colorpicker') !== '') { $css .=  of_get_option('form_colorpicker');} else { $css .= '#ffffff';} $css .= ' 0%,'; if ( of_get_option('form_colorpicker_bottom') !== '') { $css .=  of_get_option('form_colorpicker_bottom');} else { $css .= '#ffffff';} $css .= ' 100%); 
background: -o-linear-gradient(top,  '; if ( of_get_option('form_colorpicker') !== '') { $css .=  of_get_option('form_colorpicker');} else { $css .= '#ffffff';} $css .= ' 0%,'; if ( of_get_option('form_colorpicker_bottom') !== '') { $css .=  of_get_option('form_colorpicker_bottom');} else { $css .= '#ffffff';} $css .= ' 100%); 
background: -ms-linear-gradient(top,  '; if ( of_get_option('form_colorpicker') !== '') { $css .=  of_get_option('form_colorpicker');} else { $css .= '#ffffff';} $css .= ' 0%,'; if ( of_get_option('form_colorpicker_bottom') !== '') { $css .=  of_get_option('form_colorpicker_bottom');} else { $css .= '#ffffff';} $css .= ' 100%); 
background: linear-gradient(to bottom,  '; if ( of_get_option('form_colorpicker') !== '') { $css .=  of_get_option('form_colorpicker');} else { $css .= '#ffffff';} $css .= ' 0%,'; if ( of_get_option('form_colorpicker_bottom') !== '') { $css .=  of_get_option('form_colorpicker_bottom');} else { $css .= '#ffffff';} $css .= ' 100%);'; } if (of_get_option('widget_form_border') == '1') { $css .= 'border:1px solid '; if ( of_get_option('form_colorpicker_border') !== '') { $css .= of_get_option('form_colorpicker_border');} else { $css .= 'transparent';} $css .= ';';} $css .= 'margin:0 auto; text-align:center; padding:5px 0px 10px 0px; margin-bottom:10px; margin-top:0px; '; if (of_get_option('widget_form_shadow') == '1') { $css .= '-moz-box-shadow: 0 0 5px #eee; -webkit-box-shadow: 0 0 5px#eee; box-shadow: 0 0 5px #eee;';} else { $css .= '';} $css .= '-moz-border-radius:'.of_get_option('widget_curve', 'no entry' ).'px; -webkit-border-radius:'.of_get_option('widget_curve', 'no entry' ).'px; border-radius:'.of_get_option('widget_curve', 'no entry' ).'px; width:370px;}
.form-heading { '; $typography = of_get_option('form_typography'); if ($typography) { if ( $typography['color'] !== '') { $css .= 'color:'. $typography['color'];} else { $css .= 'color:#000';}  $css .= ';font: '. $typography['style'] .' '. $typography['size'] .' '.  $typography['face'].';';} $css .= 'text-transform:'. of_get_option('form_widget_transform').'; padding:10px 0px 10px 0px; width:275px; line-height:27px; margin:0 auto; margin-top:'.of_get_option('margin_heading_form', 'no entry' ).'px;}
.form-heading p, .headerformpost p {margin-bottom:10px;}
button.form-button, input.form-button, div.form-button {'; if (of_get_option('border_button') == '1' &&  of_get_option('custom_button') == '1') { $css .= 'border:1px solid '; if ( of_get_option('border_button_color') !== '') { $css .= of_get_option('border_button_color');} else { $css .= 'transparent';} $css .= ';';} else { $css .= 'border:none;';} $css .= ''; if (of_get_option('shadow_inner_button') == '1' &&  of_get_option('custom_button') == '1') { $css .= 'background: url('.$imageurl.'button-gradient.png) '.of_get_option('button_color_custom', 'no entry').' bottom left repeat-x !important; ';} if (of_get_option('shadow_inner_button') == '0' &&  of_get_option('custom_button') == '1') {if ( of_get_option('button_color_custom') !== '') { $css .= 'background:'. of_get_option('button_color_custom').'!important;';} else { $css .= 'background:transparent!important;';};} $css .= ''; if (of_get_option('shadow_outer_button') == '1' &&  of_get_option('custom_button') == '1') { $css .= 'box-shadow: 0px 1px 3px #000 !important;';} else { $css .= '';} if (of_get_option('custom_button') == '1') { $css .= 'height:'.of_get_option('custon_button_height', 'no entry').'px !important; width:274px !important; border-radius: '.of_get_option('border_button_round').'px !important; -moz-border-radius: '.of_get_option('border_button_round').'px !important; -webkit-border-radius: '.of_get_option('border_button_round').'px !important;  box-sizing: border-box !important; vertical-align:top; text-align:center;';} else { $css .= '';}  if (of_get_option('custom_button') == '0') { $css .= 'background-image: url('. of_get_option('form_button', 'no entry').') ;  
background-position: center top;';} $css .= ''; $typography = of_get_option('button_text_typography'); if ($typography) { $css .= 'text-align:center;'; 
if ( $typography['color'] !== '') { $css .= 'color:'. $typography['color'];} else { $css .= 'color:#000';}  $css .= ';font: '. $typography['style'] .' '. $typography['size'] .' '.  $typography['face'].' !important;';}
$menuheaderheight = of_get_option('header_height') - of_get_option('headermenu_height'); $css .= '}


#headermenu {display:table; height:'.  $menuheaderheight.'px;position: absolute; '; 

if (of_get_option('header_width') == '1' && of_get_option('wrapper_width') == '1') { $css .= 'width: 100%;';} 

if (of_get_option('header_width') == '1' && of_get_option('wrapper_width') == '0') { $css .= 'width: 1200px;';} 

if (of_get_option('header_width') == '2')  { $css .= 'width: 1200px;';} $css .= ' margin:0 auto;}

'; if (of_get_option('wrapper_width') == '0') { $css .= '#header {position:relative} #content-main, .sub-form-top, .sub-form-top .bg, #branding,#headermenu, .footer-widget-box, #footer, #access, #header, #sub-form-top-admin #slides  {width:100% !important}';}
$css .= '


#headercssmenu {'; if (of_get_option('headermenualign') == 'center') { $css .= 'margin: 0 auto;';} elseif (of_get_option('headermenualign') == 'left') { $css .= 'float:left;width: 100%;';} else { $css .= 'float:right;';} $css .= ' display: table;}

#headercssmenu ul {';if (of_get_option('headermenualign') == 'left') { $css .= 'width: 100%;';} $css .= ' }

.headermenu-inside {width:1200px;display:table !important;margin:0 auto !important;}';
 
$menuheightplus = of_get_option('headermenu_height') + of_get_option('headermenu_margin_top', 'no entry' ) + of_get_option('headermenu_margin_bottom', 'no entry' );

$css .= ' .headermenu-ul{display: table-cell; vertical-align:'.of_get_option('headermenupos').'; height:'. of_get_option('headermenu_height').'px !important}
.headermenu-bgg {height: '. $menuheightplus .'px; position:absolute;width:100%;'; if ( of_get_option('headermenu_bg_line') !== '') { $css .= 'background:'. $rgbaul .';';} else { $css .= 'background:transparent;';} $css .= 'border-top: '. of_get_option('headermenu_border_top').'px '.of_get_option('headermenu_border_top_style').'  
'; if ( of_get_option('headermenu_border_top_color') !== '') { $css .= of_get_option('headermenu_border_top_color');} else { $css .= 'transparent';} $css .= '; border-bottom: '. of_get_option('headermenu_border_bottom').'px '.of_get_option('headermenu_border_bottom_style').'  '; if ( of_get_option('headermenu_border_bottom_color') !== '') { $css .= of_get_option('headermenu_border_bottom_color');} else { $css .= 'transparent';} $css .= ';}
.headermenu-bg{position:absolute;width:100%}
.headermenu-ul ul {white-space: nowrap; list-style: none;text-align: left;margin-bottom:0px !important;margin-left:0px !important; height: '.of_get_option('headermenu_height').'px}
#headercssmenu > ul > li > a {border-radius:'.  of_get_option('headermenu_curve', 'no entry' ) .'px;
text-transform:'.  of_get_option('headermenu_transform', 'no entry' ) .' !important;
'; $typography = of_get_option('headermenu_typography'); if ($typography) { $css .= 'text-align:center; ';	if ( $typography['color'] !== '') { $css .= 'color:'. $typography['color'];} else { $css .= 'color:#000';}  $css .= '!important;font: '. $typography['style'] .' '. $typography['size'] .' '.  $typography['face'].';'; } $css .= 'line-height: '.$heightheademenu.'px;}
#headercssmenu ul ul {min-width: 275px; margin-top:-'.  of_get_option('headermenu_margin_bottom', 'no entry' ) .'px; }
#headercssmenu ul ul a {white-space: normal; '; if ( of_get_option('headermenu_text_hover_dd') !== '') { $css .= 'color:'. of_get_option('headermenu_text_hover_dd').' !important;';} else { $css .= 'color:#000 !important;';}  
$css .= 'text-transform:'.  of_get_option('headermenu_transform', 'no entry' ) .' !important;line-height: 150%;padding: 10px;text-align:left;margin:0px;}
#headercssmenu ul ul li:hover > a, #headercssmenu ul ul li:last-child:hover > a {'; if ( of_get_option('headermenu_background') !== '') { $css .= 'background:'. $rgba .'!important;';} else { $css .= 'background:transparent!important;';}$css .= '}
#headercssmenu ul ul li:hover > a {';  if ( of_get_option('headermenu_text_hover') !== '') { $css .= 'color:'. of_get_option('headermenu_text_hover').'!important;';} else { $css .= 'color:#000!important;';} $css .= '}
#headercssmenu ul ul a, #headercssmenu ul ul li:last-child > a {
'; if ( of_get_option('headermenu_bg') !== '') { $css .= 'background:'. $colordd .';';} else { $css .= 'background:transparent;';} $css .= '-moz-background-clip: padding;-webkit-background-clip: padding-box;background-clip: padding-box;}
#headercssmenu ul li a.cart-contents:hover {'; $typography = of_get_option('headermenu_typography'); if ($typography) { if ( $typography['color'] !== '') { $css .= 'color:'. $typography['color'];} else { $css .= 'color:#000';};}  $css .= ';}
#headercssmenu ul ul li:last-child:hover > a {-moz-background-clip: padding;-webkit-background-clip: padding-box;background-clip: padding-box;}'; if (of_get_option('headermenu_bg_or_border') == '1') { $css .= ' #headercssmenu ul li:hover > a,#headercssmenu ul li.active > a, #headercssmenu ul li.current > a {'; if ( of_get_option('headermenu_background') !== '') { $css .= 'background:'. $colorhover.'!important;';} else { $css .= 'background:transparent!important;';}  if ( of_get_option('headermenu_text_hover') !== '') { $css .= 'color:'. of_get_option('headermenu_text_hover').' !important;';} else { $css .= 'color:#000 !important;';} $css .= '-webkit-transition: all 0.5s;-moz-transition: all 0.5s; -ms-transition: all 0.5s;-o-transition: all 0.5s;transition: all 0.5s;}';} else { $css .= '#headercssmenu ul li a:after {content: ""; display: block;height: 2px;width: 0;background: transparent;transition: width .5s ease, background-color .5s ease;}
	
	

#headercssmenu ul li a:hover:after, #headercssmenu ul li.current > a:after, #headercssmenu ul li.active > a:after {width: 100%; '; if ( of_get_option('headermenu_background') !== '') { $css .= 'background:'. $colorhover.';';} else { $css .= 'background:transparent;';} $css .= '}
#headercssmenu ul li.current > a:after, #headercssmenu ul li.active > a:after {height: 3px;}';} 
$css .= ' #headercssmenu a {margin:'.  of_get_option('headermenu_margin_top', 'no entry' ) .'px 3px '.  of_get_option('headermenu_margin_bottom', 'no entry' ) .'px 0px; padding: 0 20px;text-transform:'.  of_get_option('headermenu_transform', 'no entry' ) .' !important;'; $typography = of_get_option('headermenu_typography'); if ($typography) { $css .= 'text-align:center; ';if ( $typography['color'] !== '') { $css .= 'color:'. $typography['color'];} else { $css .= 'color:#000';}  $css .= '; font: '. $typography['style'] .' '. $typography['size'] .' '.  $typography['face'].';'; } $css .= '}
#headercssmenu li:hover > ul{-moz-animation: fadeIn .3s ease-in ;-webkit-animation: fadeIn .3s ease-in ;animation:fadeIn  .3s ease-in ;-webkit-animation-duration: 0.3s;}
#floatmenu {display:table; height:'. of_get_option('floatmenu_height').'px;position: fixed; top:0; width:100%; z-index:501; margin:0 auto;}
.floatmenu-inside{width:1060px; display:table;margin:0 auto !important;}
.floatmenu-bgg {position:absolute;'; if (of_get_option('wrapper_width') == '1') { $css .= 'width: 100% !important;';} if (of_get_option('wrapper_width') == '0') { $css .= 'width: 1200px;';} if ( of_get_option('floatmenu_bg_line') !== '') { $css .= 'background:'. $rgbm.'!important;';} else { $css .= 'background:transparent!important;';} $css .= 'height:'. of_get_option('floatmenu_height').'px !important; '; if (of_get_option('floatmenu_shadow_border') == '1'){ $css .= '-webkit-box-shadow: 0px 5px 6px -5px rgba(0, 0, 0, 0.6); -moz-box-shadow:    0px 5px 6px -5px rgba(0, 0, 0, 0.6); box-shadow: 0px 5px 6px -5px rgba(0, 0, 0, 0.6);';} $css .= '}
.floatmenu-ul{display: table-cell; position:relative; vertical-align:top; height:'. of_get_option('floatmenu_height').'px !important}
.floatmenu-ul ul {list-style: none;text-align: left;margin-bottom:0px !important;margin-left:0px !important; height: '.of_get_option('floatmenu_height').'px}
#cssmenu > ul > li > a {text-transform:'.  of_get_option('floatmenu_transform', 'no entry' ) .' !important;
'; $typography = of_get_option('floatmenu_typography'); if ($typography) { $css .= 'text-align:center; 
';if ( $typography['color'] !== '') { $css .= 'color:'. $typography['color'];} else { $css .= 'color:#000';}  $css .= ';font: '. $typography['style'] .' '. $typography['size'] .' '.  $typography['face'].';'; } $css .= 'line-height:70px;line-height: '.of_get_option('floatmenu_height').'px;}
#cssmenu ul ul {min-width: 190px;}
#cssmenu ul ul a {'; if ( of_get_option('floatmenu_bg') !== '') { $css .= 'background:'. $rgbd.'!important;';} else { $css .= 'background:transparent!important;';} $css .= 'text-transform:'.  of_get_option('floatmenu_transform', 'no entry' ) .' !important;line-height: 150%;padding: 16px 20px;text-align:left;}
#cssmenu ul ul li:hover > a, #cssmenu ul li:hover > a,#cssmenu ul li.active > a {'; if ( of_get_option('floatmenu_background') !== '') { $css .= 'background:'. $rgbh.';';} else { $css .= 'background:transparent;';} if ( of_get_option('floatmenu_text_hover') !== '') { $css .= 'color:'. of_get_option('floatmenu_text_hover').';';} else { $css .= 'color:#000;';} $css .= '}
#cssmenu ul ul li:last-child > a {-moz-background-clip: padding;-webkit-background-clip: padding-box;background-clip: padding-box;}
#cssmenu ul ul li:last-child:hover > a {-moz-background-clip: padding;-webkit-background-clip: padding-box;background-clip: padding-box;}
#cssmenu ul li:hover > a,#cssmenu ul li.active > a {-webkit-transition: all 0.5s;-moz-transition: all 0.5s; -ms-transition: all 0.5s;-o-transition: all 0.5s;transition: all 0.5s;}
#cssmenu a {'; if (of_get_option('floatmenu_bg_line') == '') { if ( of_get_option('floatmenu_bg_line') !== '') { $css .= 'background:'. $rgbm.'!important;';} else { $css .= 'background:transparent!important;';}; } $css .= '
padding: 0 15px;text-transform:'.  of_get_option('floatmenu_transform', 'no entry' ) .' !important;'; $typography = of_get_option('floatmenu_typography'); if ($typography) { $css .= 'text-align:center; 
'; if ( $typography['color'] !== '') { $css .= 'color:'. $typography['color'];} else { $css .= 'color:#000';}  $css .= ';font: '. $typography['style'] .' '. $typography['size'] .' '.  $typography['face'].';'; } $css .= '}
button.btnhov, input.btnhov, div.btnhov{'; if (of_get_option('border_button') == '1' &&  of_get_option('custom_button') == '1') { $css .= '
border:1px solid '; if ( of_get_option('border_button_color_hover') !== '') { $css .= of_get_option('border_button_color_hover');} else { $css .= 'transparent';} $css .= ';';} else { $css .= 'border:none;';} $css .= ''; if (of_get_option('shadow_inner_button') == '1' &&  of_get_option('custom_button') == '1') { $css .= 'background: url('.$imageurl.'button-gradient.png) '.of_get_option('button_color_custom_hover', 'no entry').' bottom left repeat-x !important;';} if (of_get_option('shadow_inner_button') == '0' &&  of_get_option('custom_button') == '1') { $css .= 'background: '.of_get_option('button_color_custom_hover', 'no entry').' !important;';} $css .= ''; if (of_get_option('shadow_outer_button') == '1' &&  of_get_option('custom_button') == '1') { $css .= 'box-shadow: 0px 1px 3px #000;';} else { $css .= '';} if (of_get_option('custom_button') == '1') { $css .= 'height:'.of_get_option('custon_button_height', 'no entry').'px; width:274px; border-radius: '.of_get_option('border_button_round').'px; -moz-border-radius: '.of_get_option('border_button_round').'px; -webkit-border-radius: '.of_get_option('border_button_round').'px; box-sizing: border-box !important; vertical-align:top;
text-align:center;';} else { $css .= '';} if (of_get_option('custom_button') == '0') { $css .= 'background-image: url('. of_get_option('form_button').'); background-position: center 94px;';} $css .= ''; $typography = of_get_option('button_text_typography'); if ($typography) { if ( $typography['color'] !== '') { $css .= 'color:'. $typography['color'];} else { $css .= 'color:#000';}  $css .= ';font: '. $typography['style'] .' '. $typography['size'] .' '.  $typography['face'].';';} $css .= '}
.garantiya, .garantiya a:link,  .garantiya a:visited {'; if ( of_get_option('garantiya_typography') !== '') { $css .= 'color:'. of_get_option('garantiya_typography').'!important;';} else { $css .= 'color:#000!important;';} $css .= 'padding-bottom:5px; margin-top:10px; font-size:11px;}
.garantiya-bottom, .garantiya-bottom a:link,  .garantiya-bottom a:visited {'; if ( of_get_option('garantiya_typography_bottom') !== '') { $css .= 'color:'. of_get_option('garantiya_typography_bottom').'!important;';} else { $css .= 'color:#000!important;';} $css .= 'padding-bottom:5px; margin-top:5px; font-size:11px; text-decoration:none; font-weight:normal;}
.garantiya-bottom-commets a:link,  .garantiya-bottom-commets a:visited { color:#777; font-size:12px;}
.garantiya-bottom a:hover {text-decoration:underline;}
.alignnone, .alignleft, .alignright, .block-125, img.post_thumbnail, .avatar, .related_image, .related_image img, .aligncenter, div.recent-posts img, .homepage-image1, .homepage-image2, .homepage-image3, .homepage-image5, dl.gallery-item, .katalog-enterpage, .ab-instagram ul.thumbnails li  {'.  of_get_option('image_style', 'no entry' ) .'}
#content .gallery .gallery-item {margin:5px}
.alignnone:hover, .alignleft:hover, .alignright:hover, .box-style:hover, img.post_thumbnail:hover, .avatar:hover, #related_posts img:hover, .aligncenter:hover, .homepage-image1, .homepage-image2, .homepage-image3 {opacity:0.92;}
.inputformbutton, .sp-form input.inputformbutton, .sp-form input[type=text].inputformbutton, .sp-form input[type=email].inputformbutton{border-radius: 3px  !important;';  
if (of_get_option('form_uploader_transparent') == 1) { 
	$css .= 'width:170px;';} else { $css .= 'width:257px; margin-bottom:5px!important; ';} 
	$css .= '  font-size: 16px !important; color: #424242;   margin-bottom:5px;margin-top:3px;border:1px solid #ccc; box-shadow:none; background:#ffffff; padding-left:10px;height:38px; font-weight:normal !important;}

.sendsayFieldItem { margin-bottom:5px!important;}

.buttonpostform, .sp-form .sp-button.buttonpostform, button.buttonpostform {';  
 

if (of_get_option('form_uploader_transparent') == 1) {  $css .= 'width:auto;height:38px; position:relative; top:2px;';} else { $css .= 'width:258px; height:45px;';} 


$typography = of_get_option('button_text_postform'); if ($typography) { $css .= 'text-align:center; ';if ( $typography['color'] !== '') { $css .= 'color:'. $typography['color'];} else { $css .= 'color:#000';}  $css .= '!important; font: '. $typography['style'] .' '. $typography['size'] .' '.  $typography['face'].' !important;';} $css .= 'margin-right:0px;}'; if (of_get_option('thumb_size') == 'large') { $css .= 'img.post_thumbnail {margin:20px 0px 0px !important; clear:both !important; float:none !important;}' ;}  $css .= ' 
.homepage-image1, .homepage-image2, .homepage-image3, .homepage-image5 {opacity:1 !important; position:relative; z-index:2;}
img.catalog-thumb{margin: 0 30px 0 0!important;clear: left !important;float: left !important;}
.bread-arrow, .cat-meta{color:#777}
.archive-meta p {font-size:'. of_get_option('post_font_size').'px; padding:20px;}
.testimonials-between-border{width:100%;}
#testimonials-float {width:100%;}
.widget-testimonial {float:left}
.testimonial-container {width:690px;}
.form-post-bottom {margin-top:20px; '; if (of_get_option('form_uploader_transparent') == '1' || of_get_option('form_uploader_transparent') == '0') { $css .= 'padding-left:0px !important;'; }  else { $css .= 'padding-left:10px !important;';} $css .= '}
.subs-form {padding-bottom:10px;'; if (of_get_option('form_uploader_transparent') == '0') { $css .= 'float:none; width:49%;'; } elseif (of_get_option('form_uploader_transparent') == '2') { $css .= 'float:right; width:49%;'; } else { $css .= 'margin: 0 auto; width: 98%; display: table;';} $css .= '}
.subs-image  {float:left; width:49%}
.video-size {width:'. round($sub_form['videow']).'px; height:'. round($sub_form['videoh']).'px;}
.header-text-mobile {display:none}
#videobgyoutube {position: absolute;top: 0;left: 0;width: 100%;height: 100%;}
.obrabotka  {width:800px; height:300px;}
.video-container { position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; float:none; margin-bottom:20px;}
.video-container iframe, .video-container object, .video-container embed, .video-container video, .sub-form-top .video iframe, .sub-form-footer .video iframe, .sub-form-top .video object, .sub-form-footer .video object, .sub-form-top .video embed, .sub-form-footer .video embed, .sub-form-top .video video, .sub-form-footer .video video { position: absolute; top: 0; left: 0; width: 100%; height: 100%; }
.cbp-l-filters-alignLeft .cbp-filter-item
{font-family:'. of_get_option('fonts_blog').' !important; padding:10px 18px;}
.cbp-l-filters-alignLeft {margin-left: 5px;}
body, .entry-box, div  {line-height:1.4 !important}
h1, h2, h3, h4, h5,  #content h1, #content h2, #content h3, #content h4, #content h5, #content h6, .widget-title, h2.entry-title a:link, h2.entry-title a:visited, h1.entry-title a:link, h1.entry-title a:visited, #site-title a, h3.wpcw-course-title a:link, h3.wpcw-course-title a:visited {line-height:1.1 !important}
.sub-form-top div.description, .sub-form-top div.description p, .sub-form-top div.ab-header, .sub-form-top div.ab-header p, .sub-form-top div.header-form, .sub-form-top div.header-form p, .sub-form-top .garantia, .sub-form-top div.list ul, .sub-form-top div.list ul li,
.sub-form-footer div.description, .sub-form-footer div.description p, .sub-form-footer div.ab-header, .sub-form-footer div.ab-header p, .sub-form-footer div.header-form, .sub-form-footer div.header-form p, .sub-form-footer .garantia, .sub-form-footer div.list ul, .sub-form-footer div.list ul li, .recentpost-title {line-height:1.1 !important} 
.entry-content div.woocommerce-shipping-fields h3  label {font-size:24px !important; font-weight:normal !important}
#footer a.scrollupinsight {'; if ( of_get_option('button_color_text') !== '') { $css .= 'color:'. of_get_option('button_color_text').'!important;';} else { $css .= 'color:#000!important;';} $css .= '}
.scrollupinsight {width:60px; height:60px; border-radius:0%; position:fixed; bottom:50px;right:40px; display:none;z-index:9999!important;}
.wpcw_fe_navigation_box a.fe_btn_navigation_prev:before, .wpcw_fe_navigation_box a.fe_btn_navigation_next:before {white-space: nowrap;}

.scrollupinsight:before {font-family: FontAwesome;font-size: 54px; font-weight:bold; content: "\f106";position: absolute;top: 45%;left: 50%;line-height: 1;-webkit-transform: translate(-50%,-50%); -ms-transform: translate(-50%,-50%);transform: translate(-50%,-50%);transition: 0.4s ease all;}
.entry-between-border:last-child {border-bottom:none !important}';
if ( of_get_option('post_border') == 'none'){ $css .= '.testimonials-between-border, .entry-between-border{padding:20px 0; border-bottom: 1px solid rgba(0,0,0,0.06) !important;} .entry-box {padding: 30px; margin-bottom:0px }'; } else { if (of_get_option('post_width') == '2') {$css .= '.testimonials-between-border, .entry-between-border{ border-bottom: none !important; padding:15px 0} ';} else {$css .= '.testimonials-between-border, .entry-between-border{ border-bottom: none !important; padding:10px 0} '; }}


  
  
/********** Начало стиля Каталог **********/ 

if (function_exists('edd_catalog_plugin_updater')) {
  
 $css .= ' .cbp-l-caption-buttonLeft.buy,  .cbp-s-caption-buttonLeft.buy,  .cbp-m-caption-buttonLeft.buy, .cbp-l-caption-buttonRight {'; if ( $ab_catalog['katalog_button_color'] !== '') { $css .= 'background-color:'. $ab_catalog['katalog_button_color'] .'!important;';} else { $css .= 'background-color:transparent!important;';} if ( $ab_catalog['katalog_button_text_color'] !== '') { $css .= 'color:'. $ab_catalog['katalog_button_text_color'] .'!important;';} else { $css .= 'color:#000!important;';} $css .= '}
a.cbp-l-caption-buttonRight {text-decoration:none;}
.cbp-l-caption-buttonLeft:hover.buy,.cbp-s-caption-buttonLeft:hover.buy,.cbp-m-caption-buttonLeft:hover.buy,  .cbp-l-caption-buttonRight:hover
{'; if ( $ab_catalog['katalog_button_color_hover'] !== '') { $css .= 'background-color:'. $ab_catalog['katalog_button_color_hover'] .'!important;';} else { $css .= 'background-color:transparent!important;';} $css .= '}
.fusion-portfolio.wrapper-portfolio.cbp-1-col .cbp-l-grid-blog .cbp-caption-one {margin-bottom: 20px;float:left;width:'. $ab_catalog['image_size'].' !important;}
.fusion-portfolio.wrapper-portfolio.cbp-1-col .cbp-l-grid-blog .cbp-caption .cbp-caption-defaultWrap img
{width:auto !important;height:auto !important;min-width: '. $ab_catalog['image_size'].' !important;max-width: '. $ab_catalog['image_size'].' !important;}
.fusion-portfolio.wrapper-portfolio.cbp-1-col .cbp-l-grid-blog .cbp-item-wrapper .post-font{float:right;width:'; if ($ab_catalog['image_size'] == '20%') { $css .= '80%;';} elseif ( $ab_catalog['image_size'] == '30%' ) { $css .= '70%;'; } else { $css .= '50%;'; } $css .= 'padding:0 5px 0 40px}
.catalog-single .gallery {display:none !important}
.cbp-caption-one{margin-bottom: 20px;float: left;}
.catalogborder { border-bottom:1px solid #eaeaea;}
'; if ($ab_catalog['image_shape'] == 2) { $css .= ' .heightimage { height: 0px; padding-top:67% !important} '; } else { $css .= ' .heightimage { height: 0px; padding-top:120% !important} '; } $css .= '
.flexslider{border:none;-webkit-border-radius: 0px;-moz-border-radius: 0px;border-radius: 0px;-webkit-box-shadow: none;-moz-box-shadow: none;-o-box-shadow: none;box-shadow: none;margin-bottom:5px;}
.flexslider ul{margin:0 auto !important;}
div.flexslider ul li{padding:0 !important;}
div.flexslider ul.slides li:before{font-family: FontAwesome !important;content: "" !important;display:none}
.flex-control-thumbs li {margin-right: 6px !important; margin-bottom: 6px !important;padding: 0px;
'; if (get_post_meta(get_the_ID(), 'dbt_galerywidth', true) == '100%') { $css .= ' width: 10%; '; } else {$css .= 'width: 18%;';} $css .= ' }
.flex-control-thumbs li div  {border: 4px solid #ffffff;opacity: 0.7 !important;cursor: pointer;}
.flex-control-thumbs li div:hover {opacity: 1 !important;border: 4px solid #bebebe;-webkit-transition: all 1s ease;-moz-transition: all 1s ease;-ms-transition: all 1s ease;-o-transition: all 1s ease;transition: all 1s ease;}
.flex-control-thumbs li div.flex-active {opacity: 1 !important;cursor: default;border: 4px solid #bebebe;}
'; if (get_post_meta(get_the_ID(), 'dbt_galerywidth', true) == '100%') { if (get_post_meta(get_the_ID(), 'dbt_slides', true) == '1') { $css .= ' .slider-background{background: #fafafa; padding-top:20px; padding-bottom:0px;   margin:0 auto; margin-bottom:20px; }.flexslider {margin-right: 30px !important; margin-bottom: 10px; padding:0px 70px 0px 70px; background: #FAFAFA}
'; } elseif (get_post_meta(get_the_ID(), 'dbt_slides', true) == '2') { $css .= '.slider-background{margin:0 auto; background: #fafafa; padding-top:20px; padding-bottom:20px; margin-bottom:20px;}.flexslider {margin-right: 30px !important; margin-bottom: 0px !important;padding:0px 70px 0px 70px; background: #FAFAFA}
'; } elseif  (get_post_meta(get_the_ID(), 'dbt_slides', true) == '3') { $css .= 'ol.flex-control-nav.flex-control-paging
{width:821px} .slider-background{margin:0 auto; background: #fafafa; padding-top:20px; padding-bottom:40px; margin-bottom:20px;}.flexslider {margin-right: 30px !important; margin-bottom: 10px; padding:0px 70px 0px 70px; background: #FAFAFA}'; } else { $css .= ''; } $css .= '}
.entry-content {width:960px !important; margin: 0 auto;}.catalog-single { padding:10px;} .flexslider {width:960px; margin:0px auto 20px auto;} '; } else { $css .= '.flexslider {width:500px; margin-right:30px; float:left;} '; } $css .= '
.video-katalog{text-align:center; float:left;  margin-right: 30px !important; margin-bottom: 10px; }
#carousel {margin-top:10px;}
#carousel li {display: block; opacity: .7; cursor: pointer;}
#carousel li:hover {opacity: 1;-webkit-transition: all 1s ease;-moz-transition: all 1s ease;-ms-transition: all 1s ease;-o-transition: all 1s ease;transition: all 1s ease;}
#carousel li.flex-active-slide  {opacity: 1 !important; cursor: default;}
.flex-control-thumbs li:last-child {margin-right: 0px  !important;}
.cbp-s-caption-buttonLeft, .cbp-s-caption-buttonRight{margin:0 4px 0 0;}
.cbp-l-grid-projects-desc{white-space: normal; height: 97px;}
.cbp-l-grid-projects-title{margin-top:0px;}
.button-show {display:none; }
.fusion-portfolio.wrapper-portfolio.cbp-1-col .cbp-l-grid-blog .cbp-item-wrapper .post-font h2.entry-title a:link, .fusion-portfolio.wrapper-portfolio.cbp-2-col .cbp-l-grid-blog .cbp-item-wrapper .post-font h2.entry-title a:link, .fusion-portfolio.wrapper-portfolio.cbp-3-col .cbp-l-grid-blog .cbp-item-wrapper .post-font h2.entry-title a:link, .fusion-portfolio.wrapper-portfolio.cbp-4-col .cbp-l-grid-blog .cbp-item-wrapper .post-font h2.entry-title a:link, portfolio.wrapper-portfolio.cbp-5-col .cbp-l-grid-blog .cbp-item-wrapper .post-font h2.entry-title a:link, h2.entry-title a:visited, .cbp-item-wrapper .entry-title a:link, #content .cbp-item  h2.entry-title a:link, h2.entry-title a:visited
{font-size: '. $ab_catalog['headingsize'].'px !important; font-weight: '. $ab_catalog['headingstyle'].' !important;}
.cbp-l-grid-agency-title, .cbp-l-grid-work-title, .cbp-l-grid-blog-title, .cbp-l-grid-projects-title, .cbp-l-grid-masonry-projects-title { '; if ($ab_catalog['itemsheadingline'] == 0) { $css .= ' white-space:nowrap; '; } $css .= ' overflow:hidden;text-overflow:ellipsis;}
.cbp-l-grid-blog-desc { '; if ($ab_catalog['itemsdesc'] == 1) { $css .= ' display:none; '; } $css .= ' }';

}
/********** КОнец стиля Каталог **********/ 
/********** Начало Входной страницы **********/ 

if (function_exists('edd_homepage_plugin_updater')) {


global $homepage;
$homepage = get_option('ab_homepage');
$imageurl =  get_bloginfo('url') .'/wp-content/plugins/ab-homepage/images/';
$number_level = array( '1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6');
$css .= '


.page-template-enterpage #wrapper{z-index: 2;position: relative;} .page-template-enterpage #content-main { '; if ($homepage['homepage_width'] ==  '1200px') { $css .=  'width:100%!important; max-width:1200px !important; '; } else { $css .=  '  width:100%!important; max-width:100% !important; '; } $css .=  '-moz-border-radius:'. $homepage['homepage_border_round'] .'px !important; -webkit-border-radius:'. $homepage['homepage_border_round'] .'px !important; border-radius:'. $homepage['homepage_border_round'] .'px !important;
'; if ($homepage['homepage_border'] == 1) { $css .=  ' border:1px solid '. $homepage['homepage_border_color'] .'!important;
'; } else { $css .=  ' border:none !important; '; } $css .=  ' overflow:hidden;margin-top: '. $homepage['margin_top'] .'px !important; margin-bottom: '. $homepage['margin_bottom'] .'px !important;} .page-template-enterpage #main {padding:0px 0px 0px 0px !important;'; if ($homepage['homepage_width'] ==  '1200px') { $css .=  'width:1200px!important; max-width:1200px !important; '; } else { $css .=  'width:100%!important; max-width:100% !important; '; } $css .=  ' margin: 0 auto !important;
}
.katalog-font{font-size: '. $homepage['hp_desc_size6'].'px !important;}

.post-text{font-size: '. $homepage['hp_desc_size5'].'px !important; line-height: 1.4;}
.otzyvy-name{'; if ( $homepage['heading_text_color4'] !== '') { $css .= 'color:'. $homepage['heading_text_color4'] .';';} else { $css .= 'color:#000;';} $css .= 'font-family: '. of_get_option('fonts_blog').';font-size: '. $homepage['hp_header_size4'].'px;text-align: '. $homepage['hp_header_align4'].';font-weight:'; if ($homepage['heading_text_strong4'] ==  1)  {$css .=  'bold';} else { $css .=  'normal';} $css .= ';font-style:'; if ($homepage['heading_text_italic4'] ==  1)  {$css .=  'italic';} else {$css .=  'normal';} $css .= ';}
.otzyvy-text{font-family: '. of_get_option('fonts_blog').';line-height: 130%;font-size: '. $homepage['hp_desc_size4'].'px;text-align: '. $homepage['hp_desc_align4'].';font-weight:'; if ($homepage['otzyv_text_strong'.$num] ==  1)  {$css .=  'bold';} else {$css .=  'normal';} $css .= ';font-style:'; if ($homepage['otzyv_text_italic'.$num] ==  1)  {$css .=  'italic';} else {$css .=  'normal';} $css .= '; color:#333;}
.homepage-image3 {border-radius:'. $homepage['hp_image_otzyvy3'].' !important;  background-size: 100%; background-repeat:no-repeat; background-position:center center;}
.homepage-image1 {border-radius:'. $homepage['hp_image_otzyvy1'].' !important;margin:0px;  background-size: 100%; background-repeat:no-repeat; background-position:center center;}
.homepage-image2 {border-radius:'.$homepage['hp_image_otzyvy2'].' !important;  background-size: 100%; background-repeat:no-repeat; background-position:center center;}
.uroven, .custom-read-more{'; if ($homepage['homepage_width'] ==  '1200px') {$css .=  'width:1140px;';} else {$css .= 'width:1200px; ';} $css .= 'margin:0 auto;}

.readmore4,.readmore5,.readmore6 {font-size:18px}

.homepage-icon1 span:before {font-size:'. $homepage['hp_icon_width1'] .'; color: '. $homepage['hp_icon_color1'] .'; }
.homepage-icon2 span:before {font-size:'. $homepage['hp_icon_width2'] .'; color: '. $homepage['hp_icon_color2'] .'; }
.homepage-icon3 span:before {font-size:'. $homepage['hp_icon_width3'] .'; color: '. $homepage['hp_icon_color3'] .'; }
.block_home4, .block_home5, .block_home6 {'; if ($homepage['homepage_width'] ==  '1200px') {$css .=  'width:1140px!important;';} else {$css .= 'width:1200px!important; ';} $css .= ' padding:10px 20px 0px 20px !important;}

.secondpost:last-child{margin-bottom:20px}
.firstpost .entry-title5 { margin-top:15px;}
.secondpost .entry-title5 { margin-top:0px;}
.homepage-image1{'; if ($homepage['hp_image_width1'] == '100%') { $css .=  'margin-bottom:20px !important;'; } $css .= 'width: '. $homepage['hp_image_width1'].';height:'. $homepage['hp_image_height1'].'px;
'; if ($homepage['hp_image_pos1'] == 1) { $css .= '
float: left; margin-right: 7% !important;
'; } elseif ($homepage['hp_image_pos1'] == 3) { $css .= '
float: right; margin-left: 7% !important;
';} else { $css .=   'margin:0 auto !important; clear:left; margin-bottom:20px !important;';} $css .= '}
'; if ($homepage['hp_image_style1'] == 0) { $css .=  '.homepage-image1 { border:none !important; box-shadow:none!important;     background-color:transparent !important; border-radius:0!important; padding:none !important; }'; } $css .= ' 
.homepage-image2
{'; if ($homepage['hp_image_width2'] == '100%') { $css .=  'margin-bottom:20px !important;'; } $css .= 'width: '. $homepage['hp_image_width2'].';
height:'. $homepage['hp_image_height2'].'px;
'; if ($homepage['hp_image_pos2'] == 1) {$css .= 'float: left; margin-right: 7% !important;
'; } elseif ($homepage['hp_image_pos2'] == 3) {$css .= 'float: right; margin-left: 7% !important;
'; } else {$css .=   'margin:0 auto !important; clear:left; margin-bottom:20px !important;';} $css .= '}
';if ($homepage['hp_image_style2'] == 0) { $css .=  '.homepage-image2 { border:none !important; box-shadow:none!important;     background-color:transparent !important; border-radius:0!important; padding:none !important; }'; } $css .= '
.homepage-image3{'; if ($homepage['hp_image_width3'] == '100%') { $css .=  'margin-bottom:20px !important;'; } $css .= '
width: '. $homepage['hp_image_width3'].';
height:'. $homepage['hp_image_height3'].'px;
'; if ($homepage['hp_image_pos3'] == 1) {$css .= '
float: left; margin-right: 7% !important;
'; } elseif ($homepage['hp_image_pos3'] == 3) {$css .= '
float: right; margin-left: 7% !important;
'; } else {$css .= 'margin:0 auto !important; clear:left; margin-bottom:20px !important;';} $css .= '}
'; if ($homepage['hp_image_style3'] == 0) { $css .=  '.homepage-image3 { border:none !important; box-shadow:none!important;     background-color:transparent !important; border-radius:0!important; padding:none !important; }
'; }  
$css .= '	.post-font1{'; if ( $homepage['desc_text_color1'] !== '') { $css .= 'color:'. $homepage['desc_text_color1'] .';';} else { $css .= 'color:#000;';} $css .= 'text-align: '. $homepage['hp_desc_align1'].';}
.post-font2{'; if ( $homepage['desc_text_color2'] !== '') { $css .= 'color:'. $homepage['desc_text_color2'] .';';} else { $css .= 'color:#000;';} $css .= 'text-align: '. $homepage['hp_desc_align2'].';}
.post-font3{'; if ( $homepage['desc_text_color3'] !== '') { $css .= 'color:'. $homepage['desc_text_color3'] .';';} else { $css .= 'color:#000;';} $css .= 'text-align: '. $homepage['hp_desc_align3'].';}
h3.entry-title1{text-align: '. $homepage['hp_header_align1'].';}
h3.entry-title2{text-align: '. $homepage['hp_header_align2'].';}
h2.entry-title3{text-align: '. $homepage['hp_header_align3'].';}
h3.entry-title4{text-align: '. $homepage['hp_header_align4'].';}
.entry-title1 a:link, .entry-title1 a:visited {'; if ( $homepage['heading_text_color1'] !== '') { $css .= 'color:'. $homepage['heading_text_color1'] .'!important;';} else { $css .= 'color:#000!important;';} $css .= '}
.entry-title2 a:link, .entry-title2 a:visited {'; if ( $homepage['heading_text_color2'] !== '') { $css .= 'color:'. $homepage['heading_text_color2'] .'!important;';} else { $css .= 'color:#000!important;';} $css .= '}
.entry-title3 a:link, .entry-title3 a:visited {'; if ( $homepage['heading_text_color3'] !== '') { $css .= 'color:'. $homepage['heading_text_color3'] .'!important;';} else { $css .= 'color:#000!important;';} $css .= '}
.entry-title4 a:link, .entry-title4 a:visited {'; if ( $homepage['heading_text_color4'] !== '') { $css .= 'color:'. $homepage['heading_text_color4'] .'!important;';} else { $css .= 'color:#000!important;';} $css .= '}
div.readmore1:hover {'; if ( $homepage['hp_readmore_text_color_hover1'] !== '') { $css .= 'color:'. $homepage['hp_readmore_text_color_hover1'] .'!important;';} else { $css .= 'color:#000!important;';} $css .= '}
div.readmore2:hover {'; if ( $homepage['hp_readmore_text_color_hover2'] !== '') { $css .= 'color:'. $homepage['hp_readmore_text_color_hover2'] .'!important;';} else { $css .= 'color:#000!important;';} $css .= '}
div.readmore3:hover {'; if ( $homepage['hp_readmore_text_color_hover3'] !== '') { $css .= 'color:'. $homepage['hp_readmore_text_color_hover3'] .'!important;';} else { $css .= 'color:#000!important;';} $css .= '}
'; if ( $homepage['hp_readmore_align1'] == 'left') { $css .= 'div.readmore1 {float:left}';} elseif ( $homepage['hp_readmore_align1'] == 'right') { $css .= 'div.readmore1 {float:right;}';} else { $css .= 'div.readmore1 { float:none; } a.more-link1 {display:table; margin:0 auto}'; } $css .= '
div.readmore1 {
border-radius: '.$homepage['ab_border_button_round1'].' !important;-moz-border-radius: '. $homepage['ab_border_button_round1'].'!important;-webkit-border-radius: '. $homepage['ab_border_button_round1'].'!important;}
'; if ( $homepage['hp_readmore_align2'] == 'left') { $css .= 'div.readmore2 {float:left}';} elseif ( $homepage['hp_readmore_align2'] == 'right') { $css .= 'div.readmore2 {float:right;}';} else { $css .= 'div.readmore2 { float:none; } a.more-link2 {display:table; margin:0 auto}'; } $css .= '
div.readmore2 {border-radius: '.$homepage['ab_border_button_round2'].' !important;-moz-border-radius: '. $homepage['ab_border_button_round2'].'!important;-webkit-border-radius: '. $homepage['ab_border_button_round2'].'!important;}
'; if ( $homepage['hp_readmore_align3'] == 'left') { $css .= 'div.readmore3 {float:left}';} elseif ( $homepage['hp_readmore_align3'] == 'right') { $css .= 'div.readmore3 {float:right;}';} else { $css .= 'div.readmore3 { float:none; } a.more-link3 {display:table; margin:0 auto}'; } $css .= '
div.readmore3 {border-radius: '.$homepage['ab_border_button_round3'].' !important;-moz-border-radius: '. $homepage['ab_border_button_round3'].'!important;-webkit-border-radius: '. $homepage['ab_border_button_round3'].'!important;}
.homepage-icon1 i {'; if ( $homepage['hp_icon_color1'] !== '') { $css .= 'color:'. $homepage['hp_icon_color1'] .'!important;';} else { $css .= 'color:#000!important;';} $css .= '}
.homepage-icon2 i {'; if ( $homepage['hp_icon_color2'] !== '') { $css .= 'color:'. $homepage['hp_icon_color2'] .'!important;';} else { $css .= 'color:#000!important;';} $css .= '}
.homepage-icon3 i {'; if ( $homepage['hp_icon_color3'] !== '') { $css .= 'color:'. $homepage['hp_icon_color3'] .'!important;';} else { $css .= 'color:#000!important;';} $css .= '}
a.more-link1 {font-size: '. $homepage['hp_readmore_size1'].'px;}
a.more-link2 {font-size: '. $homepage['hp_readmore_size2'].'px;}
a.more-link3 {font-size: '. $homepage['hp_readmore_size3'].'px;}';
foreach ( $number_level as $lnum => $num  ) { $css .= ' .block_home'. $num.'{float:left;'; if($homepage['hp_show_header'. $num] == 0 && $homepage['hp_show_desc'. $num] == 0 && $homepage['hp_show_image'. $num] == 0) { $css .= '
padding:20px 20px 0px 20px; '; } else { $css .=  'padding:10px 20px 20px 20px;'; } $css .= '
width:'; if ($homepage['hp_layout'.$num] == 1) { $css .=  '100%';} elseif ($homepage['hp_layout'.$num] == 2) { $css .=  '50%';} else { $css .=  '33.2%';} $css .= '; }
.post-font'. $num.'{line-height: 130%;font-size: '. $homepage['hp_desc_size'.$num].'px;}
h3.entry-title'. $num.'{font-family:'. $homepage['heading_text_font'].' !important;font-size: '. $homepage['hp_header_size'.$num].'px;font-weight:'; if ($homepage['heading_text_strong'.$num] ==  1)  {$css .=  'bold';} else {$css .=  'normal';} $css .= ';
font-style:'; if ($homepage['heading_text_italic'.$num] ==  1)  {$css .=  'italic';} else {$css .=  'normal';} $css .= '; 
line-height:1;}
.entry-title'. $num.' a:link, .entry-title'.$num.' a:visited{text-decoration:none;}
.heading-title'. $num.'{width: 1030px; margin:0 auto;}
.heading-title'. $num.' img{border:none !important; box-shadow:none; background:none}
.homepage-icon'.$num.'{ '; if ($homepage['hp_icon_pos'.$num] == 1) { $css .= 'float: left; margin-right: 20px !important;
'; } elseif ($homepage['hp_icon_pos'.$num] == 3) {$css .= 'float: right; margin-left: 40px !important;
'; } elseif ($homepage['hp_icon_pos'.$num] == 2) {$css .=   'text-align:center; margin-bottom:20px;';} 
elseif ($homepage['hp_icon_pos'.$num] == 4) {$css .=   'text-align:left; margin-bottom:20px;';}
else {$css .=   'text-align:right; margin-bottom:20px;';} $css .= ' }
a.more-link'. $num.' {
'; if ( $homepage['hp_readmore_text_color'.$num] !== '') { $css .= 'color:'. $homepage['hp_readmore_text_color'.$num] .'!important;';} else { $css .= 'color:#000!important;';} $css .= 'text-decoration: none;font-family:'. $homepage['heading_bottom_font'].'; }
div.readmore'. $num.':hover {
'; if ( $homepage['hp_readmore_color'.$num] !== '') { $css .= 'background:'. $homepage['hp_readmore_color'.$num] .'!important;';} else { $css .= 'background:transparent!important;';} $css .= 'clear:both }
div.readmore'. $num.' { clear:both;'; if ($homepage['hp_readmore_style'.$num] == 1) { $css .= 'border: '. $homepage['ab_border_button'.$num].' solid 
'; if ( $homepage['hp_readmore_color'.$num] !== '') { $css .= $homepage['hp_readmore_color'.$num].';';} else { $css .= 'transparent;';} $css .= '; ';  }  else { $css .= 'background: url('. $imageurl.'/bg-for-button.png) '. $homepage['hp_readmore_color'.$num].'!important;'; }  



if ($homepage['hp_show_readmore_custom'.$num] == 0) { $css .= '  margin-top: 40px;display: inline-block; padding: 10px 20px 10px 20px; '; } else { $css .= 'text-align:  center; width:'. $homepage['hp_readmore_one_width'.$num].'px; padding: 10px 20px 10px 20px;
'; if ($homepage['hp_readmore_one_align'.$num] == 'left') {$css .=  'float:left  !important;';} elseif ($homepage['hp_readmore_one_align'.$num] == 'right') {$css .=  'float:right  !important;';} else { $css .=  'float:none !important;margin:0 auto; margin-bottom:20px;';} } $css .= ' } '; } 




$css .= '
.vhodnoaya1{width:100%; background: url('. $homepage['custom_bg1'].') '. $homepage['hp_repeat_bg1'].' '. $homepage['hp_repeat_position1'].' '. $homepage['hp_fon_color1'].'; padding-top:20px; padding-bottom:20px; clear:both; display:table}
.vhodnoaya2{width:100%; background: url('. $homepage['custom_bg2'].') '. $homepage['hp_repeat_bg2'].' '. $homepage['hp_repeat_position2'].' '. $homepage['hp_fon_color2'].'; padding-top:20px; padding-bottom:20px;clear:both; display:table}
.vhodnoaya3{width:100%; background: url('. $homepage['custom_bg3'].') '. $homepage['hp_repeat_bg3'].' '. $homepage['hp_repeat_position3'].' '. $homepage['hp_fon_color3'].'; padding-top:20px; padding-bottom:20px;clear:both; display:table}
.vhodnoaya4{width:100%; background: url('. $homepage['custom_bg4'].') '. $homepage['hp_repeat_bg4'].' '. $homepage['hp_repeat_position4'].' '. $homepage['hp_fon_color4'].'; padding-top:20px; padding-bottom:20px;clear:both; display:table}
.vhodnoaya5{width:100%; background: url('.$homepage['custom_bg5'].') '. $homepage['hp_repeat_bg5'].' '. $homepage['hp_repeat_position5'].' '. $homepage['hp_fon_color5'].'; padding-top:20px; padding-bottom:20px;clear:both; display:table}
.vhodnoaya6{width:100%; background: url('. $homepage['custom_bg6'].') '. $homepage['hp_repeat_bg6'].' '. $homepage['hp_repeat_position6'].' '. $homepage['hp_fon_color6'].'; padding-top:20px; padding-bottom:20px;clear:both; display:table}
.vhodnoaya1 table, .vhodnoaya2 table, .vhodnoaya3 table, .vhodnoaya4 table, .vhodnoaya5 table, .vhodnoaya6 table{width:1200px; margin:0 auto;}
.vhodnoaya1 ul li:before{content:"\ '. of_get_option('bullets_styles').'";font-family: FontAwesome;margin-right:10px;'; if ( $homepage['hp_readmore_color1'] !== '') { $css .= 'color:'. $homepage['hp_readmore_color1'] .';';} else { $css .= 'color:#000;';} $css .= '}
.vhodnoaya2 ul li:before {content:"\ '. of_get_option('bullets_styles').'";font-family: FontAwesome;margin-right:10px;'; if ( $homepage['hp_readmore_color2'] !== '') { $css .= 'color:'. $homepage['hp_readmore_color2'] .';';} else { $css .= 'color:#000;';} $css .= '}
.vhodnoaya3 ul li:before{content:"\ '. of_get_option('bullets_styles').'";font-family: FontAwesome;margin-right:10px;'; if ( $homepage['hp_readmore_color3'] !== '') { $css .= 'color:'. $homepage['hp_readmore_color3'] .';';} else { $css .= 'color:#000;';} $css .= '}
.vhodnoaya1 ul li, .vhodnoaya2 ul li, .vhodnoaya3 ul li, .vhodnoaya4 ul li, .vhodnoaya5 ul li, .vhodnoaya6 ul li{margin-bottom:5px;}
.vhodnoaya1 ul, .vhodnoaya2 ul, .vhodnoaya3 ul, .vhodnoaya4 ul, .vhodnoaya5 ul, .vhodnoaya6 ul
{list-style: none !important;margin:0 0 0 10px !important}
.vhodnoaya4{padding-bottom:30px;}
.otzyvy-image{opacity:0.2;}
.otzyvy-image:hover, .flex-active-slide{opacity:0.9;}
.vhodnoaya4 .flexslider p {padding:0 20px;}
.vhodnoaya4 .flexslider {margin: 0 0 13px;background: transparent;border: 0;-webkit-border-radius: 0;-moz-border-radius: 0;border-radius: 0;-webkit-box-shadow: none;-moz-box-shadow: none;-o-box-shadow: none;box-shadow: none;}
img.post_thumbnail.image-otzyv.wp-post-image{border-radius:'. $homepage['hp_image_otzyvy'].'  !important;margin:0 !important;float:none !important;border:2px solid '; if ( $homepage['hp_image_otzyvy_color'] !== '') { $css .= $homepage['hp_image_otzyvy_color'].'!important;';} else { $css .= 'transparent!important;';} $css .= '}
.heading-title4{margin-bottom:30px;margin-top:0px;}
h3.entry-title6, .entry-title6 a:link, .entry-title6 a:visited{'; $typography = of_get_option('post_typography'); 
if ($typography) { if ( $typography['color'] !== '') { $css .= 'color:'. $typography['color'];} else { $css .= 'color:#000';}  $css .= '!important;font-style: '. $typography['style'] .'; font-size: '. $homepage['hp_header_size6'] .'px; font-family: '.  $homepage['heading_text_font'] .' !important; '; } $css .= '}
.entry-title6 a:hover{'; if ( of_get_option('title_hover') !== '') { $css .= 'color:'. of_get_option('title_hover').'!important;';} else { $css .= 'color:#000!important;';} $css .= '}
div.entry-title5, .entry-title5 a:link, .entry-title5 a:visited{ line-height:1.1;'; $typography = of_get_option('post_typography'); if ($typography) { if ( $typography['color'] !== '') { $css .= 'color:'. $typography['color'];} else { $css .= 'color:#000';}  $css .= '!important;font-size:'. $homepage['hp_header_size5'] .'px; font-family: '.  $homepage['heading_text_font'] .' !important; '; } $css .= 'font-weight: '; if ($homepage['heading_text_strong5'] ==  1)  {$css .=  'bold';} else {$css .=  'normal';} $css .= '; font-style:'; if ($homepage['heading_text_italic5'] ==  1)  {$css .=  'italic';} else {$css .= 'normal';} $css .= '}
.block_home6 h2.entry-title a:link {'; $typography = of_get_option('post_typography'); if ($typography) { if ( $typography['color'] !== '') { $css .= 'color:'. $typography['color'];} else { $css .= 'color:#000';}  $css .= '!important; font-style: '. $typography['style'] .' !important; font-size: '. $homepage['hp_header_size6'] .'px !important;'; } $css .=  '}
.entry-title5 a:hover{'; if ( of_get_option('title_hover') !== '') { $css .= 'color:'. of_get_option('title_hover').'!important;';} else { $css .= 'color:#000!important;';} $css .= '}
.cbp-nav-next, .cbp-nav-prev {background: url('. $imageurl.'/bg-for-button.png) '. $homepage['hp_readmore_color6'].'!important;}
#grid-container2 h2.entry-title a:link {font-size: '. $homepage['hp_header_size6'].'px !important; font-weight: '; if ($homepage['heading_text_strong6'] ==  1)  {$css .=   'bold';} else {$css .=   'normal !important';} $css .=  ';font-style:';if ($homepage['heading_text_italic6'] ==  1)  { $css .= 'italic';} else {$css .=   'normal';} $css .=  '} ';  
$bgimage = of_get_option('homepage_body_background');
if ( of_get_option('homepage_videomp4') !== '0' || $bgimage['image'] !== '')  { $css .= '.page-template-enterpage #wrapper, .page-template-enterpage #wrapper .sub-form-top, .page-template-enterpage #wrapper #header, .page-template-enterpage #wrapper #branding {background:transparent !important}'; } 
}

/********** конец входной страницы **********/ 
/********** Начало WPFORM **********/ 


if (function_exists('edd_form_plugin_updater')) {
global $sub_form, $sub_slides;
$sub_form = get_option('ab_sub_form');
$imageurl =  get_bloginfo('url') .'/wp-content/plugins/wpform/images/';
$playerurl =  get_bloginfo('url') .'/wp-content/plugins/wpform/player/'; 
$widthminus = $sub_form['form_width'] - 2; 


$sub_slides = get_option('ab_sub_slides');
$imageurl =  get_bloginfo('url') .'/wp-content/plugins/wpform/images/';
$height_block = $sub_slides['form_height'] - $sub_slides['margin_block_top'] - $sub_slides['margin_block_bottom'];

$css .= '.sub-form-top {
width:'. $sub_form['form_width'] .';
height:'. $sub_form['form_height'] .'px; 
margin:0 auto; 
margin-top: '. $sub_form['ab_form_padding_top'].'px;
margin-bottom: '. $sub_form['ab_form_padding_bottom'].'px;
position:relative;
border: '; if ($sub_form['border_color'] == '') { $css .=  ' transparent';} else { $css .=  '1px '. $sub_form['ab_style_border'].' '.$sub_form['border_color']; } $css .= ';border-radius:'. $sub_form['ab_border_round'].'px;-moz-border-radius: '. $sub_form['ab_border_round'].'px;-webkit-border-radius: '. $sub_form['ab_border_round'].'px;}


'; if ($sub_form['ab_style_border'] !== 'none') { $css .=  '.sub-form-top .bg, .sub-form-top .pattern {height:100% !important} ';} $css .=  '

.sub-form-top .bg{border-radius:'. $sub_form['ab_border_round'].'px;-moz-border-radius: '. $sub_form['ab_border_round'].'px;-webkit-border-radius: '. $sub_form['ab_border_round'].'px;'; if ($sub_form['form_width'] == '100%') { $css .= ' width: 100%; '; } else { $css .= 'width:'; if ($sub_form['border_color'] == !'') { $css .=  $widthminus.'px'; } else { $css .= $sub_form['form_width']; } $css .= '; '; } $css .= 'height:'. $sub_form['form_height'].'px;margin:0 auto;position:absolute;z-index:'; if ($sub_form['bg_color_over'] == 0) { $css .= ' 1 ';  } else { $css .= ' 2 '; } $css .= ';opacity: '. $sub_form['ab_bg_opaque'].';
'; if ($sub_form['ab_gradient'] == '0') { if ( $sub_form['bg_color_sec'] !== '') { $css .= 'background-color:'. $sub_form['bg_color_sec'].';';} else { $css .= 'background-color:transparent;';} $css .= 'background-image: -moz-linear-gradient(top,  '; if ( $sub_form['bg_color_sec'] !== '') { $css .=  $sub_form['bg_color_sec'];} else { $css .= 'transparent';} $css .= '0%, '; if ( $sub_form['bg_color'] !== '') { $css .=  $sub_form['bg_color'];} else { $css .= 'transparent';} $css .= ' 100%);
background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0%,'; if ( $sub_form['bg_color_sec'] !== '') { $css .=  $sub_form['bg_color_sec'];} else { $css .= 'transparent';} $css .= '), color-stop(100%,'; if ( $sub_form['bg_color'] !== '') { $css .=  $sub_form['bg_color'];} else { $css .= 'transparent';} $css .= '));background-image: -webkit-linear-gradient(top,  '; if ( $sub_form['bg_color_sec'] !== '') { $css .=  $sub_form['bg_color_sec'];} else { $css .= 'transparent';} $css .= ' 0%,'; if ( $sub_form['bg_color'] !== '') { $css .=  $sub_form['bg_color'];} else { $css .= 'transparent';} $css .= ' 100%); 
background-image: -o-linear-gradient(top,  '; if ( $sub_form['bg_color_sec'] !== '') { $css .=  $sub_form['bg_color_sec'];} else { $css .= 'transparent';} $css .= ' 0%,'; if ( $sub_form['bg_color'] !== '') { $css .=  $sub_form['bg_color'];} else { $css .= 'transparent';} $css .= ' 100%); 
background-image: -ms-linear-gradient(top,  '; if ( $sub_form['bg_color_sec'] !== '') { $css .=  $sub_form['bg_color_sec'];} else { $css .= 'transparent';} $css .= ' 0%,'; if ( $sub_form['bg_color'] !== '') { $css .=  $sub_form['bg_color'];} else { $css .= 'transparent';} $css .= ' 100%); 
background-image: linear-gradient(to bottom,  '; if ( $sub_form['bg_color_sec'] !== '') { $css .=  $sub_form['bg_color_sec'];} else { $css .= 'transparent';} $css .= ' 0%,'; if ( $sub_form['bg_color'] !== '') { $css .=  $sub_form['bg_color'];} else { $css .= 'transparent';} $css .= ' 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='; if ( $sub_form['bg_color_sec'] !== '') { $css .=  $sub_form['bg_color_sec'];} else { $css .= 'transparent';} $css .= ', endColorstr='. $sub_form['bg_color'].',GradientType=0 ); ';} if ($sub_form['ab_gradient'] == '1') { $css .= '
'; if ( $sub_form['bg_color'] !== '') { $css .= 'background-color:'. $sub_form['bg_color'].';';} else { $css .= 'background-color:transparent;';} $css .= '	
background-image: radial-gradient(circle, '; if ( $sub_form['bg_color'] !== '') { $css .=  $sub_form['bg_color'];} else { $css .= 'transparent';} $css .= ', '; if ( $sub_form['bg_color_sec'] !== '') { $css .=  $sub_form['bg_color_sec'];} else { $css .= 'transparent';} $css .= '); 
background-image: -o-radial-gradient(circle, '; if ( $sub_form['bg_color'] !== '') { $css .=  $sub_form['bg_color'];} else { $css .= 'transparent';} $css .= ', '; if ( $sub_form['bg_color_sec'] !== '') { $css .=  $sub_form['bg_color_sec'];} else { $css .= 'transparent';} $css .= ');
background-image: -ms-radial-gradient(circle, '; if ( $sub_form['bg_color'] !== '') { $css .=  $sub_form['bg_color'];} else { $css .= 'transparent';} $css .= ', '; if ( $sub_form['bg_color_sec'] !== '') { $css .=  $sub_form['bg_color_sec'];} else { $css .= 'transparent';} $css .= ');
background-image: -moz-radial-gradient(circle, '; if ( $sub_form['bg_color'] !== '') { $css .=  $sub_form['bg_color'];} else { $css .= 'transparent';} $css .= ', '; if ( $sub_form['bg_color_sec'] !== '') { $css .=  $sub_form['bg_color_sec'];} else { $css .= 'transparent';} $css .= ');
background-image: -webkit-radial-gradient(circle, '; if ( $sub_form['bg_color'] !== '') { $css .=  $sub_form['bg_color'];} else { $css .= 'transparent';} $css .= ', '; if ( $sub_form['bg_color_sec'] !== '') { $css .=  $sub_form['bg_color_sec'];} else { $css .= 'transparent';} $css .= ');
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='; if ( $sub_form['bg_color'] !== '') { $css .=  $sub_form['bg_color'];} else { $css .= 'transparent';} $css .= ', endColorstr='; if ( $sub_form['bg_color_sec'] !== '') { $css .=  $sub_form['bg_color_sec'];} else { $css .= 'transparent';} $css .= ',GradientType=0 ); ' ;}
if ($sub_form['ab_gradient'] == '2') { $css .= '
'; if ( $sub_form['bg_color'] !== '') { $css .= 'background-color:'. $sub_form['bg_color'].';';} else { $css .= 'background-color:transparent;';} $css .= '	
background-image: radial-gradient(ellipse at bottom, '; if ( $sub_form['bg_color'] !== '') { $css .=  $sub_form['bg_color'];} else { $css .= 'transparent';} $css .= ', '; if ( $sub_form['bg_color_sec'] !== '') { $css .=  $sub_form['bg_color_sec'];} else { $css .= 'transparent';} $css .= ');
background-image: -o-radial-gradient(center bottom, ellipse cover, '; if ( $sub_form['bg_color'] !== '') { $css .=  $sub_form['bg_color'];} else { $css .= 'transparent';} $css .= ', '; if ( $sub_form['bg_color_sec'] !== '') { $css .=  $sub_form['bg_color_sec'];} else { $css .= 'transparent';} $css .= ');
background-image: -ms-radial-gradient(center bottom, ellipse cover, '; if ( $sub_form['bg_color'] !== '') { $css .=  $sub_form['bg_color'];} else { $css .= 'transparent';} $css .= ', '; if ( $sub_form['bg_color_sec'] !== '') { $css .=  $sub_form['bg_color_sec'];} else { $css .= 'transparent';} $css .= ');
background-image: -moz-radial-gradient(center bottom, ellipse cover, '; if ( $sub_form['bg_color'] !== '') { $css .=  $sub_form['bg_color'];} else { $css .= 'transparent';} $css .= ', '; if ( $sub_form['bg_color_sec'] !== '') { $css .=  $sub_form['bg_color_sec'];} else { $css .= 'transparent';} $css .= ');
background-image: -webkit-radial-gradient(center bottom, ellipse cover, '; if ( $sub_form['bg_color'] !== '') { $css .=  $sub_form['bg_color'];} else { $css .= 'transparent';} $css .= ', '; if ( $sub_form['bg_color_sec'] !== '') { $css .=  $sub_form['bg_color_sec'];} else { $css .= 'transparent';} $css .= ');
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='; if ( $sub_form['bg_color'] !== '') { $css .=  $sub_form['bg_color'];} else { $css .= 'transparent';} $css .= ', endColorstr='; if ( $sub_form['bg_color_sec'] !== '') { $css .=  $sub_form['bg_color_sec'];} else { $css .= 'transparent';} $css .= ',GradientType=0 ); ' ;} $css .= ' }
.sub-form-top .pattern{margin:0 auto;'; if ($sub_form['form_width'] == '100%') { $css .= ' width: 100%; '; } else { $css .= 'width:'; if ($sub_form['border_color'] == !'') { $css .=   $widthminus.'px'; } else { $css .=  $sub_form['form_width']; } $css .= '; '; } $css .= 'height:'. $sub_form['form_height'].'px;'; if ($sub_form['ab_sub_form_fon_choose'] == 0){ $css .= ' opacity: '. $sub_form['ab_bg_opaque_image'].';' ;} $css .= 'background:url('. $sub_form['custom_bg'].') '. $sub_form['repeat_bg'].' '. $sub_form['repeat_position'].'; background-size: '. $sub_form['background_size'].';border-radius:'. $sub_form['ab_border_round'].'px;-moz-border-radius: '. $sub_form['ab_border_round'].'px;-webkit-border-radius: '. $sub_form['ab_border_round'].'px;position:absolute;
z-index:1; }
.sub-form-top .ab-bg-custom{ z-index:2;position:absolute;'. $sub_form['fonw'].''. $sub_form['fonp'].'border-radius: '. ($sub_form['ab_flow_bg_round']).'px;-moz-border-radius: '. ($sub_form['ab_flow_bg_round']).'px;
-webkit-border-radius: '. ($sub_form['ab_flow_bg_round']).'px;'; if ( $sub_form['ab_bg_custom'] !== '') { $css .= 'background:'. $sub_form['ab_bg_custom'] .';';} else { $css .= 'background-color:transparent;';} $css .= 'opacity: '. $sub_form['ab_flow_bg_opaque'].'; }
.sub-form-top .ab-header { z-index:2;position:absolute;'.$sub_form['headerw'].''. $sub_form['headerp'].' } 
.sub-form-top div.ab-header, .sub-form-top div.ab-header p{padding:0px; margin:0px; margin-bottom:15px; 
text-shadow:'; if ($sub_form['ab_text_shadow'] == 1){ $css .= '#222 0px 1px 2px';} else { $css .= 'none';} $css .= ';font-size: '. $sub_form['ab_text_size'].'px ; font-family:'. $sub_form['ab_text_font'].';'; if ( $sub_form['header_color'] !== '') { $css .= 'color:'. $sub_form['header_color'] .';';} else { $css .= 'color:#000;';} $css .= 'line-height: 1; }
.sub-form-top .description { z-index:2;position:absolute;'. $sub_form['descw'].''. $sub_form['descp'].'}
.sub-form-top div.description, .sub-form-top div.description p{'; if ( $sub_form['ab_desc_color'] !== '') { $css .= 'color:'. $sub_form['ab_desc_color'] .';';} else { $css .= 'color:#000;';} $css .= 'text-shadow:'; if ($sub_form['ab_desc_shadow'] == 1){ $css .= '#222 0px 1px 2px';} else { $css .= 'none';} $css .= ';font-size:  '. $sub_form['ab_desc_size'].'px;font-family:'. $sub_form['ab_desc_font'].'; line-height: 1;padding:0px; margin:0px; margin-bottom:15px; }
.sub-form-top .image{width: 100%;position:absolute;'. $sub_form['imagew'].' '. $sub_form['imagep'].'z-index:4;}
.sub-form-top .video{z-index:2;position:absolute;'. $sub_form['videop'] .';width:'. round($sub_form['videow']).'px;height:'. round($sub_form['videoh']).'px;'; if ($sub_form['ab_border_video'] == '1') { $css .= 'border:1px solid '. $sub_form['border_video_color'].'; ' ;}  if ($sub_form['ab_border_video_shadow'] == '1') { $css .= ' -webkit-box-shadow: 0 8px 8px -6px #000;-moz-box-shadow: 0 8px 8px -6px #000;box-shadow: 0 8px 8px -6px #000; ';} $css .= ' }
.sub-form-top div.list ul{z-index:2;list-style:none; margin-left:0px !important;margin-top:0px !important;margin-bottom:0px !important;position:absolute;'. $sub_form['listw'].''. $sub_form['listp'].'}
.sub-form-top div.list ul li{text-shadow:'; if ($sub_form['ab_bullet_shadow'] == 1){ $css .= ' #222 0px 1px 2px';} else { $css .= 'none';} $css .= ';font: '. $sub_form['ab_bullet_style'].' '. $sub_form['ab_bullet_size'].'px '. $sub_form['ab_bullet_font'].';'; if ( $sub_form['bullet_color'] !== '') { $css .= 'color:'. $sub_form['bullet_color'] .';';} else { $css .= 'color:#000;';} $css .= '
margin-bottom:2px;padding-top:5px;padding-bottom:5px;}'; if ($sub_form['ab_bullet_icon'] == 0) { $css .= '.sub-form-top div.list ul li.bullets_icons:before
{ content:"";padding-left:1.5em;background: url('. $imageurl .'bullets/'. $sub_form['ab_bul'] .'.png) no-repeat left;background-size: contain;}';} if ($sub_form['ab_bullet_icon'] == 1) { $css .= '.sub-form-top div.list ul li.bullets_icons:before{padding-right:0.5em;font-family: FontAwesome; color: '. $sub_form['ab_bullet_icon_color'].'} ';} $css .= '.sub-form-top .devider{background:url('. $imageurl.'divider.png) no-repeat; width:20px; height: 210px; float:left; margin-top:15px;}.sub-form-top .form{z-index:4;position:absolute;'. $sub_form['formw'].' '. $sub_form['formp'].'}
.sub-form-top .header-form{z-index:2;position:absolute;'. $sub_form['headerformw'].''. $sub_form['headerformp'].'}
.sub-form-top div.header-form, .sub-form-top div.header-form p{'; if ( $sub_form['header_form_color'] !== '') { $css .= 'color:'. $sub_form['header_form_color'] .';';} else { $css .= 'color:#000;';} $css .= 'text-shadow:'; if ($sub_form['ab_text_form_shadow'] == 1){ $css .= '#222 0px 1px 2px';} else { $css .= 'none';} $css .= ';font-size:  '. $sub_form['ab_text_form_size'].'px;font-family:'. $sub_form['ab_text_form_font'].'; line-height: 1.3;padding:0px; margin:0px; margin-bottom:15px; }
.sub-form-top .input-form{font: '. $sub_form['ab_field_text_style'].' '.$sub_form['ab_field_text_size'].'px '. $sub_form['ab_field_text_font'].' !important; margin-bottom:7px !important; margin-left: 0px !important; padding: 0px 0px 0px 10px !important;'; if ( $sub_form['field_text_color'] !== '') { $css .= 'color:'. $sub_form['field_text_color'] .';';} else { $css .= 'color:#000 !important;';} $css .= 'height:'. $sub_form['input_size_height'].'px !important;
width:'. $sub_form['input_size'].'px !important;-webkit-box-sizing: border-box !important;box-sizing: border-box !important; '; if ($sub_form['delete_style'] == 1) { $css .= ' border:none !important;background:transparent !important;'; } else { $css .= 'border: '.$sub_form['ab_border_form'].' solid '. $sub_form['border_fiels_color'].' !important;border-radius: '. $sub_form['ab_border_form_round'].' !important;-moz-border-radius: '. $sub_form['ab_border_form_round'].' !important;-webkit-border-radius: '. $sub_form['ab_border_form_round'].' !important;'; if ($sub_form['ab_border_form_shadow'] == 1){ $css .= 'box-shadow: 0px 1px 3px #666 !important;';} else { $css .= 'box-shadow: none !important;' ;} 
if ($sub_form['ab_border_form_shadow_inside'] == 1) { $css .= 'background: '. $sub_form['bg_fiels_color'] .' url('. $imageurl .'bgr-fields2.png) repeat-x top;'; } elseif ($sub_form['bg_fiels_color'] == '') { $css .= ' background:transparent; '; } else { $css .= 'background: '. $sub_form['bg_fiels_color'].';' ;}  ;} $css .= ' -webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box; }
.sub-form-top input.ab-form-button-top, .sub-form-top .sp-button.ab-form-button-top { border: '. $sub_form['ab_border_button'].' solid 
'; if ( $sub_form['border_button_color'] !== '') { $css .=  $sub_form['border_button_color'] .';';} else { $css .= 'transparent;';} $css .= 'height:'. $sub_form['input_size_button_height'].'px !important;width:'. $sub_form['input_size_button'].'px;text-shadow:'; if ($sub_form['ab_button_text_shadow'] == 1){ $css .=  ' #222 0px 1px 2px';} else {$css .=   'none';} $css .= ';font: '. $sub_form['ab_button_text_style'].' '. $sub_form['ab_button_text_size'].'px '. $sub_form['ab_button_text_font'].';'; if ( $sub_form['button_text_color'] !== '') { $css .= 'color:'. $sub_form['button_text_color'] .';';} else { $css .= 'color:#000;';} $css .= '-webkit-box-sizing: border-box !important;box-sizing: border-box !important;vertical-align:top;text-align:center; '; if ($sub_form['delete_style'] == 0){  if ($sub_form['ab_border_button_shadow_inside'] == 1){ $css .= 'background: url('. $imageurl.'buttons/button-gradient.png) '. $sub_form['bottom_color'].' bottom left repeat-x !important;  
';} else { if ( $sub_form['bottom_color'] !== '') { $css .= 'background:'. $sub_form['bottom_color'] .';';} else { $css .= 'background-color:transparent;';};}  if ($sub_form['bottom_color'] == ''){ $css .= ' background: transparent;'; } $css .= '
'; if ($sub_form['ab_border_button_shadow'] == 1){ $css .= ' 
box-shadow: 0px 1px 3px #000;';} else { $css .= 'box-shadow: none;';}$css .= 'border-radius: '. $sub_form['ab_border_button_round'].';-moz-border-radius: '. $sub_form['ab_border_button_round'].';-webkit-border-radius: '. $sub_form['ab_border_button_round'].';' ;} else { $css .=  'background:transparent;';} $css .= '}
.sub-form-top div.ab-form-button-top-admin{border: '. $sub_form['ab_border_button'].' solid '; if ( $sub_form['border_button_color'] !== '') { $css .=  $sub_form['border_button_color'] .';';} else { $css .= 'transparent;';} $css .= ';height:'. $sub_form['input_size_button_height'].'px;width:'. $sub_form['input_size_button'] .'px;text-shadow:'; if ($sub_form['ab_button_text_shadow'] == 1){ $css .=  ' #222 0px 1px 2px';} else {$css .=   'none';} $css .= ';font: '. $sub_form['ab_button_text_style'].' '. $sub_form['ab_button_text_size'].'px '. $sub_form['ab_button_text_font'].';'; if ( $sub_form['button_text_color'] !== '') { $css .= 'color:'. $sub_form['button_text_color'] .';';} else { $css .= 'color:#000;';} $css .= '-webkit-box-sizing: border-box !important;box-sizing: border-box !important;text-align:center; '; if ($sub_form['delete_style'] == 0){ if ($sub_form['ab_border_button_shadow_inside'] == 1){ $css .= 'background: url('. $imageurl.'buttons/button-gradient.png) '. $sub_form['bottom_color'].' bottom left repeat-x !important;';} else { if ( $sub_form['bottom_color'] !== '') { $css .= 'background:'. $sub_form['bottom_color'] .';';} else { $css .= 'background-color:transparent;';};} if ($sub_form['bottom_color'] == ''){ $css .= 'background: transparent;'; }  if ($sub_form['ab_border_button_shadow'] == 1){ $css .= 'box-shadow: 0px 1px 3px #000;
';} else { $css .= 'box-shadow: none;';} $css .= ' border-radius: '. $sub_form['ab_border_button_round'].';-moz-border-radius: '. $sub_form['ab_border_button_round'].';-webkit-border-radius: '. $sub_form['ab_border_button_round'].';-webkit-box-sizing: border-box !important;box-sizing: border-box !important;text-align:center;' ;} else { $css .=  'background:transparent;';} $css .= '}
.sub-form-top div.ab-btnhov-top-admin{'; if ($sub_form['delete_style'] == 0){  if ($sub_form['ab_border_button_shadow_hover'] == 1){ $css .= 'box-shadow: 0px 1px 3px #000;';} else { $css .= 'box-shadow: none;';} if ($sub_form['ab_border_button_shadow_inside'] == 1){ $css .= 'background: url('. $imageurl.'buttons/but-top.png) '. $sub_form['bottom_color_hover'].' bottom left repeat-x !important;';} else { if ( $sub_form['bottom_color_hover'] !== '') { $css .= 'background:'. $sub_form['bottom_color_hover'] .';';} else { $css .= 'background-color:transparent;';};} if ( $sub_form['button_text_color_hover'] !== '') { $css .= 'color:'. $sub_form['button_text_color_hover'] .';';} else { $css .= 'color:#000;';} $css .= 'border: '. $sub_form['ab_border_button'].' solid '; if ( $sub_form['border_button_color_hover'] !== '') { $css .=  $sub_form['border_button_color_hover'] .';';} else { $css .= 'transparent;';};} else { $css .='background:transparent;';} $css .= '}
.sub-form-top input.ab-btnhov-top,  .sub-form-top .sp-button.ab-form-button-top:hover {'; if ($sub_form['delete_style'] == 0){ if ($sub_form['ab_border_button_shadow_hover'] == 1){ $css .= 'box-shadow: 0px 1px 3px #000;
';} else { $css .= 'box-shadow: none;';} if ($sub_form['ab_border_button_shadow_inside'] == 1){ $css .= 'background: url('. $imageurl.'buttons/but-top.png) '. $sub_form['bottom_color_hover'].' bottom left repeat-x !important;';} else { if ( $sub_form['bottom_color_hover'] !== '') { $css .= 'background:'. $sub_form['bottom_color_hover'] .';';} else { $css .= 'background-color:transparent;';} ;} if ( $sub_form['button_text_color_hover'] !== '') { $css .= 'color:'. $sub_form['button_text_color_hover'] .';';} else { $css .= 'color:#000;';} $css .= 'border: '. $sub_form['ab_border_button'].' solid '; if ( $sub_form['border_button_color_hover'] !== '') { $css .=  $sub_form['border_button_color_hover'] .';';} else { $css .= 'transparent;';};} else { $css .='background:transparent;';} $css .= '}
.button-align{float:'. $sub_form['button_align'].';}
.sub-form-top .garantia {z-index:2;background: url('. $imageurl.'garantia.png) no-repeat left top;font: '. $sub_form['ab_text_garantia_style'].' '.$sub_form['ab_text_garantia_size'].'px '. $sub_form['ab_text_garantia_font'].';'; if ( $sub_form['ab_text_garantia_color'] !== '') { $css .= 'color:'. $sub_form['ab_text_garantia_color'] .';';} else { $css .= 'color:#000;';} $css .= 'padding-left:20px;position:absolute; '. $sub_form['garantiaw'].' '. $sub_form['garantiap'].'}
.sub-form-top .garantia a {'; if ( $sub_form['ab_text_garantia_color'] !== '') { $css .= 'color:'. $sub_form['ab_text_garantia_color'] .';';} else { $css .= 'color:#000;';} $css .= '}
.sub-form-top .slide-fon {width:'. $sub_form['form_width'].' !important; height:'. $sub_form['form_height'].'px;}
.sub-form-top .form-inside {margin:0 auto !important; width:1200px; height:'.$sub_form['form_height'].'px;  position:relative !important; }
.sub-form-top input::-webkit-input-placeholder{'; if ( $sub_form['field_text_color'] !== '') { $css .= 'color:'. $sub_form['field_text_color'] .'!important;';} else { $css .= 'color:#000!important;';} $css .= '}
.sub-form-top input::-moz-placeholder{'; if ( $sub_form['field_text_color'] !== '') { $css .= 'color:'. $sub_form['field_text_color'] .'!important;';} else { $css .= 'color:#000!important;';} $css .= ';}
.sub-form-top input::-moz-placeholder{'; if ( $sub_form['field_text_color'] !== '') { $css .= 'color:'. $sub_form['field_text_color'] .'!important;';} else { $css .= 'color:#000!important;';} $css .= '}
.sub-form-top input::-ms-input-placeholder{'; if ( $sub_form['field_text_color'] !== '') { $css .= 'color:'. $sub_form['field_text_color'] .'!important;';} else { $css .= 'color:#000!important;';} $css .= '}
.form form {padding-top: 0px !important;}
.sub-form-top #slides {width:'. $sub_form['form_width'].';margin:0 auto;position:relative;}


';
/********** Конец WPFORM **********/ 

/********** Начало стиля слайдов **********/ 



$css .= '#sub-form-top-admin{width:100%;margin-left:10px; padding:'. $sub_slides['ab_form_padding_top'].'px 0 '. $sub_slides['ab_form_padding_bottom'].'px 0;margin:'. $sub_slides['ab_form_margin_top'].'px auto '. $sub_slides['ab_form_margin_bottom'].'px auto;'; if ($sub_slides['bg_slide_image'] !== '') { $css .= 'background:url('. $sub_slides['bg_slide_image'].') '. $sub_slides['slide_repeat_bg'].' '. $sub_slides['slide_repeat_position'].' '. $sub_slides['fixed_position'].';';} if ( $sub_slides['fon_slide_color'] !== '') { $css .= 'background-color:'. $sub_slides['fon_slide_color'] .';';} else { $css .= 'background-color:transparent;';} $css .= 'position:relative;z-index:2;}
#sub-form-top-admin .ab-form-button-top-admin div{padding:10px 20px;text-shadow:'; if ($sub_slides['ab_button_text_shadow'] == 1){ $css .= '#222 0px 1px 2px';} else {$css .= 'none';} $css .= ';font: '. $sub_slides['ab_button_text_style'].' '. $sub_slides['ab_button_text_size'].'px '. $sub_slides['ab_button_text_font'].';'; if ( $sub_slides['button_text_color'] !== '') { $css .= 'color:'. $sub_slides['button_text_color'];} else { $css .= 'color:#000';}  $css .= ';-webkit-box-sizing: border-box !important;box-sizing: border-box !important;vertical-align:middle;text-align:center;'; if ( $sub_slides['bottom_color'] !== '') { $css .= 'background:'. $sub_slides['bottom_color'] .';';} else { $css .= 'background:transparent;';} $css .= 'border-radius: '. $sub_slides['ab_border_button_round'].';-moz-border-radius: '. $sub_slides['ab_border_button_round'].';-webkit-border-radius: '. $sub_slides['ab_border_button_round'].';border: '. $sub_slides['ab_border_button'].' solid '; if ( $sub_slides['border_button_color'] !== '') { $css .= $sub_slides['border_button_color'];} else { $css .= 'transparent;';} $css .= '}
#sub-form-top-admin .ab-form-button-top-admin div:hover{'; if ( $sub_slides['bottom_color_hover'] !== '') { $css .= 'background:'.$sub_slides['bottom_color_hover'] .';';} else { $css .= 'background:transparent;';} $css .= ' border: '. $sub_slides['ab_border_button'].' solid '; if ( $sub_slides['border_button_color_hover'] !== '') { $css .= $sub_slides['border_button_color_hover'];} else { $css .= 'transparent';} $css .= ';'; if ( $sub_slides['button_text_color_hover'] !== '') { $css .= 'color:'. $sub_slides['button_text_color_hover'];} else { $css .= 'color:#000';}  $css .= ';}
#slides .cycle-pager span.cycle-pager-active a:link { '; if ( $sub_slides['bottom_color'] !== '') { $css .= 'color:'. $sub_slides['bottom_color'];} else { $css .= 'color:#000';}  $css .= '!important;}
#slides .cycle-pager span a:link { color: rgba(0,0,0,0.4) !important;}
#slides .cycle-pager span a:hover {'; if ( $sub_slides['bottom_color'] !== '') { $css .= 'color:'. $sub_slides['bottom_color'];} else { $css .= 'color:#000';} $css .= '!important; opacity:0.3}
.button-slide{vertical-align:middle; display:table-cell;}
#slides .cycle-slideshow {height:'. $sub_slides['form_height'].'px; width:'. $sub_slides['form_width'].';margin:0 auto;}
#sub-form-top-admin #slides{width:'. $sub_slides['form_width'].';margin:0 auto;position:relative;}
#slides div.cycle-caption {height:'. $height_block.'px;'; if ($sub_slides['slide_position'] == 'center') { $css .= 'width:100%;';} else {$css .= 'width:1200px;';} 

$css .= 'top:0;z-index:3;opacity:1;position: absolute;margin-left: auto;margin-right: auto;left: 0;right: 0;display: table;margin-top: '. $sub_slides['margin_block_top'].'px;margin-top: '. $sub_slides['margin_block_bottom'].'px;}
#slides .caption1{ font-family: '. $sub_slides['slide_text_font1'].';font-weight:'; if ($sub_slides['slide_text_strong1'] ==  1)  {$css .= 'bold';} else {$css .= 'normal';} $css .= ';font-style:'; if ($sub_slides['slide_text_italic1'] ==  1)  {$css .= 'italic';} else {$css .= 'normal';} $css .= '; '; if ($sub_slides['slide_text_shadow1'] ==  1)  { $css .= 'text-shadow:#222 0px 1px 2px';} else {$css .= '';}  if ( $sub_slides['slide_text_color1'] !== '') { $css .= 'color:'. $sub_slides['slide_text_color1'];} else { $css .= 'color:#000';}  $css .= ';font-size:'. $sub_slides['slide_text_size1'].'px !important;} 
#slides .caption2{ font-family: '. $sub_slides['slide_text_font2'].';font-weight:'; if ($sub_slides['slide_text_strong2'] ==  1)  {$css .= 'bold';} else {$css .= 'normal';} $css .= ';font-style:'; if ($sub_slides['slide_text_italic2'] ==  1)  {$css .= 'italic';} else {$css .= 'normal';} $css .= '; '; if ($sub_slides['slide_text_shadow2'] ==  1)  {$css .= 'text-shadow:#222 0px 1px 2px';} else {$css .= '';} if ( $sub_slides['slide_text_color2'] !== '') { $css .= 'color:'. $sub_slides['slide_text_color2'];} else { $css .= 'color:#000';}  $css .= ';font-size:'. $sub_slides['slide_text_size2'].'px !important;} 
#slides .caption3{ font-family: '. $sub_slides['slide_text_font3'].';font-weight:'; if ($sub_slides['slide_text_strong3'] ==  1)  {$css .= 'bold';} else {$css .= 'normal';} $css .= ';font-style:'; if ($sub_slides['slide_text_italic3'] ==  1)  {$css .= 'italic';} else {$css .= 'normal';} $css .= '; 
'; if ($sub_slides['slide_text_shadow3'] ==  1)  {$css .= 'text-shadow:#222 0px 1px 2px';} else {$css .= '';} if ( $sub_slides['slide_text_color3'] !== '') { $css .= 'color:'. $sub_slides['slide_text_color3'];} else { $css .= 'color:#000';}  $css .= ';font-size:'. $sub_slides['slide_text_size3'].'px !important;}
#slides .caption4{'; if ($sub_slides['slide_position'] == 'center')  { $css .= 'text-align:center;';} else { $css .= ' float: left;'; } $css .= '}
#slides .caption_bg{height:100%;display: table-cell;vertical-align: middle; padding:0px;margin:0px;'; if ($sub_slides['slide_position'] == 'center')  { $css .= 'text-align:center;';} $css .= '}
#slides .caption_bg1{'; if ($sub_slides['slide_position'] == 'center')  { $css .= 'width:1060px; margin:0 auto  !important; padding:0px !important; ';} else { $css .= 'width:'. $sub_slides['width_block'].'px !important; '; } $css .= '
padding:25px;'; if ($sub_slides['slide_position'] == 'center')  { $css .= 'text-align:center;';} elseif ($sub_slides['slide_position'] == 'left')  { $css .= 'float:left;';} else  { $css .= ' float: right;'; } if ( $sub_slides['slide_style'] == 'tileSlide' ) { $css .= '-moz-animation: '.  $sub_slides['slide_alimation'].' 1s ease-in-out  1.3s backwards;-webkit-animation: '.  $sub_slides['slide_alimation'].' 1s ease-in-out 1.3s backwards;animation: '.  $sub_slides['slide_alimation'].' 1s ease-in-out 1.3s backwards;'; } else { $css .= '
-moz-animation: '.  $sub_slides['slide_alimation'].' 1s ease-in-out  0.8s backwards;-webkit-animation: '.  $sub_slides['slide_alimation'].' 1s ease-in-out 0.8s backwards;animation: '.  $sub_slides['slide_alimation'].' 1s ease-in-out 0.8s backwards;'; } $css .= 'margin:0px;}'; if ($sub_slides['slide_position'] == 'center')  { $css .= '#slides .caption1{-moz-animation: fadeIn 1s ease-in-out  0.3s backwards;-webkit-animation: fadeIn 1s ease-in-out 0.3s backwards;animation: fadeIn 1s ease-in-out 0.3s backwards; animation-delay: 0.5s;}
#slides .caption2{-moz-animation: fadeInRight 1s ease-in-out  0.3s backwards;-webkit-animation: fadeInLeft 1s ease-in-out 0.3s backwards;animation: fadeInRight 1s ease-in-out 0.3s backwards;animation-delay: 1s;}
#slides .caption3{-moz-animation: fadeInLeft 0.5s ease-in-out  0.3s backwards;-webkit-animation: fadeInLeft 0.5s ease-in-out 0.3s backwards;animation: fadeInLeft 0.5s ease-in-out 0.3s backwards;animation-delay: 1.5s;}
#slides .caption4{-moz-animation: fadeIn 0.5s ease-in-out  0.3s backwards;-webkit-animation: fadeIn 0.5s ease-in-out 1.3s backwards;animation: fadeIn 0.5s ease-in-out 0.3s backwards; animation-delay: 2s;}'; } $css .= '
#slides .cycle-pager {width:1060px; margin:0 auto;'; if ($sub_slides['slide_position'] == 'left') {$css .= 'text-align: right; ';} else { $css .= 'text-align: left;';} $css .= '}
#slides .opaque_bg{ '; 

if ($sub_slides['slide_position'] == 'center') { $css .= 'width: 
100% !important; '; } 

if ($sub_slides['slide_bg_text']== 1) { 
	if ( $sub_slides['slide_bg_color'] !== '') { 
		$css .= 'background:'. $sub_slides['slide_bg_color'] .';';} 
		else { 
			$css .= 'background:transparent;';} 
			$css .= 'opacity:'. $sub_slides['slide_bg_opacity'].';'; } 
			 $css .= '; '; 



if ($sub_slides['slide_position'] == 'left') { $css .= 'width: '. $sub_slides['width_block'].'px;left:0; -webkit-border-top-left-radius: '.  $sub_slides['ab_border_round'].'px;-webkit-border-bottom-left-radius: '.  $sub_slides['ab_border_round'].'px;-moz-border-radius-topleft: '.  $sub_slides['ab_border_round'].'px;-moz-border-radius-bottomleft: '.  $sub_slides['ab_border_round'].'px;border-top-left-radius: '.  $sub_slides['ab_border_round'].'px;border-bottom-left-radius: '.  $sub_slides['ab_border_round'].'px;';} else { $css .= 'width: '. $sub_slides['width_block'].'px;right:0;-webkit-border-top-right-radius: '.  $sub_slides['ab_border_round'].'px;-webkit-border-bottom-right-radius: '.  $sub_slides['ab_border_round'].'px;-moz-border-radius-topright: '.  $sub_slides['ab_border_round'].'px;-moz-border-radius-bottomright: '.  $sub_slides['ab_border_round'].'px;border-top-right-radius: '.  $sub_slides['ab_border_round'].'px;border-bottom-right-radius: '.  $sub_slides['ab_border_round'].'px;';} $css .= ';position: absolute;height: 100%;margin: 0 !important;padding: 0 !important;z-index: -1;}';
} else {'';}
/********** Конец стиля слайдов **********/ 



/********** Начало WPFORM footer **********/ 

if (function_exists('edd_form_footer_plugin_updater')) {
global $sub_form_footer;
$sub_form_footer = get_option('ab_sub_form_footer');
$imageurl =  get_bloginfo('url') .'/wp-content/plugins/wpform/images/';
$playerurl =  get_bloginfo('url') .'/wp-content/plugins/wpform/player/'; 
$widthminus = $sub_form_footer['form_width'] - 2; 

$css .= '.sub-form-footer {
width:'. $sub_form_footer['form_width'] .';
height:'. $sub_form_footer['form_height'] .'px; 
margin:0 auto; 
margin-top: '. $sub_form_footer['ab_form_padding_top'].'px;
margin-bottom: '. $sub_form_footer['ab_form_padding_bottom'].'px;
position:relative;
border: '; if ($sub_form_footer['border_color'] == '') { $css .=  ' transparent';} else { $css .=  '1px '. $sub_form_footer['ab_style_border'].' '.$sub_form_footer['border_color']; } $css .= ';border-radius:'. $sub_form_footer['ab_border_round'].'px;-moz-border-radius: '. $sub_form_footer['ab_border_round'].'px;-webkit-border-radius: '. $sub_form_footer['ab_border_round'].'px;}
.sub-form-footer .bg{border-radius:'. $sub_form_footer['ab_border_round'].'px;-moz-border-radius: '. $sub_form_footer['ab_border_round'].'px;-webkit-border-radius: '. $sub_form_footer['ab_border_round'].'px;'; if ($sub_form_footer['form_width'] == '100%') { $css .= ' width: 100%; '; } else { $css .= 'width:'; if ($sub_form_footer['border_color'] == !'') { $css .=  $widthminus.'px'; } else { $css .= $sub_form_footer['form_width']; } $css .= '; '; } $css .= 'height:'. $sub_form_footer['form_height'].'px;margin:0 auto;position:absolute;z-index:'; if ($sub_form_footer['bg_color_over'] == 0) { $css .= ' 1 ';  } else { $css .= ' 2 '; } $css .= ';opacity: '. $sub_form_footer['ab_bg_opaque'].';
'; if ($sub_form_footer['ab_gradient'] == '0') { if ( $sub_form_footer['bg_color_sec'] !== '') { $css .= 'background-color:'. $sub_form_footer['bg_color_sec'].';';} else { $css .= 'background-color:transparent;';} $css .= 'background-image: -moz-linear-gradient(top,  '; if ( $sub_form_footer['bg_color_sec'] !== '') { $css .=  $sub_form_footer['bg_color_sec'];} else { $css .= 'transparent';} $css .= '0%, '; if ( $sub_form_footer['bg_color'] !== '') { $css .=  $sub_form_footer['bg_color'];} else { $css .= 'transparent';} $css .= ' 100%);
background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0%,'; if ( $sub_form_footer['bg_color_sec'] !== '') { $css .=  $sub_form_footer['bg_color_sec'];} else { $css .= 'transparent';} $css .= '), color-stop(100%,'; if ( $sub_form_footer['bg_color'] !== '') { $css .=  $sub_form_footer['bg_color'];} else { $css .= 'transparent';} $css .= '));background-image: -webkit-linear-gradient(top,  '; if ( $sub_form_footer['bg_color_sec'] !== '') { $css .=  $sub_form_footer['bg_color_sec'];} else { $css .= 'transparent';} $css .= ' 0%,'; if ( $sub_form_footer['bg_color'] !== '') { $css .=  $sub_form_footer['bg_color'];} else { $css .= 'transparent';} $css .= ' 100%); 
background-image: -o-linear-gradient(top,  '; if ( $sub_form_footer['bg_color_sec'] !== '') { $css .=  $sub_form_footer['bg_color_sec'];} else { $css .= 'transparent';} $css .= ' 0%,'; if ( $sub_form_footer['bg_color'] !== '') { $css .=  $sub_form_footer['bg_color'];} else { $css .= 'transparent';} $css .= ' 100%); 
background-image: -ms-linear-gradient(top,  '; if ( $sub_form_footer['bg_color_sec'] !== '') { $css .=  $sub_form_footer['bg_color_sec'];} else { $css .= 'transparent';} $css .= ' 0%,'; if ( $sub_form_footer['bg_color'] !== '') { $css .=  $sub_form_footer['bg_color'];} else { $css .= 'transparent';} $css .= ' 100%); 
background-image: linear-gradient(to bottom,  '; if ( $sub_form_footer['bg_color_sec'] !== '') { $css .=  $sub_form_footer['bg_color_sec'];} else { $css .= 'transparent';} $css .= ' 0%,'; if ( $sub_form_footer['bg_color'] !== '') { $css .=  $sub_form_footer['bg_color'];} else { $css .= 'transparent';} $css .= ' 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='; if ( $sub_form_footer['bg_color_sec'] !== '') { $css .=  $sub_form_footer['bg_color_sec'];} else { $css .= 'transparent';} $css .= ', endColorstr='. $sub_form_footer['bg_color'].',GradientType=0 ); ';} if ($sub_form_footer['ab_gradient'] == '1') { $css .= '
'; if ( $sub_form_footer['bg_color'] !== '') { $css .= 'background-color:'. $sub_form_footer['bg_color'].';';} else { $css .= 'background-color:transparent;';} $css .= '	
background-image: radial-gradient(circle, '; if ( $sub_form_footer['bg_color'] !== '') { $css .=  $sub_form_footer['bg_color'];} else { $css .= 'transparent';} $css .= ', '; if ( $sub_form_footer['bg_color_sec'] !== '') { $css .=  $sub_form_footer['bg_color_sec'];} else { $css .= 'transparent';} $css .= '); 
background-image: -o-radial-gradient(circle, '; if ( $sub_form_footer['bg_color'] !== '') { $css .=  $sub_form_footer['bg_color'];} else { $css .= 'transparent';} $css .= ', '; if ( $sub_form_footer['bg_color_sec'] !== '') { $css .=  $sub_form_footer['bg_color_sec'];} else { $css .= 'transparent';} $css .= ');
background-image: -ms-radial-gradient(circle, '; if ( $sub_form_footer['bg_color'] !== '') { $css .=  $sub_form_footer['bg_color'];} else { $css .= 'transparent';} $css .= ', '; if ( $sub_form_footer['bg_color_sec'] !== '') { $css .=  $sub_form_footer['bg_color_sec'];} else { $css .= 'transparent';} $css .= ');
background-image: -moz-radial-gradient(circle, '; if ( $sub_form_footer['bg_color'] !== '') { $css .=  $sub_form_footer['bg_color'];} else { $css .= 'transparent';} $css .= ', '; if ( $sub_form_footer['bg_color_sec'] !== '') { $css .=  $sub_form_footer['bg_color_sec'];} else { $css .= 'transparent';} $css .= ');
background-image: -webkit-radial-gradient(circle, '; if ( $sub_form_footer['bg_color'] !== '') { $css .=  $sub_form_footer['bg_color'];} else { $css .= 'transparent';} $css .= ', '; if ( $sub_form_footer['bg_color_sec'] !== '') { $css .=  $sub_form_footer['bg_color_sec'];} else { $css .= 'transparent';} $css .= ');
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='; if ( $sub_form_footer['bg_color'] !== '') { $css .=  $sub_form_footer['bg_color'];} else { $css .= 'transparent';} $css .= ', endColorstr='; if ( $sub_form_footer['bg_color_sec'] !== '') { $css .=  $sub_form_footer['bg_color_sec'];} else { $css .= 'transparent';} $css .= ',GradientType=0 ); ' ;}
if ($sub_form_footer['ab_gradient'] == '2') { $css .= '
'; if ( $sub_form_footer['bg_color'] !== '') { $css .= 'background-color:'. $sub_form_footer['bg_color'].';';} else { $css .= 'background-color:transparent;';} $css .= '	
background-image: radial-gradient(ellipse at bottom, '; if ( $sub_form_footer['bg_color'] !== '') { $css .=  $sub_form_footer['bg_color'];} else { $css .= 'transparent';} $css .= ', '; if ( $sub_form_footer['bg_color_sec'] !== '') { $css .=  $sub_form_footer['bg_color_sec'];} else { $css .= 'transparent';} $css .= ');
background-image: -o-radial-gradient(center bottom, ellipse cover, '; if ( $sub_form_footer['bg_color'] !== '') { $css .=  $sub_form_footer['bg_color'];} else { $css .= 'transparent';} $css .= ', '; if ( $sub_form_footer['bg_color_sec'] !== '') { $css .=  $sub_form_footer['bg_color_sec'];} else { $css .= 'transparent';} $css .= ');
background-image: -ms-radial-gradient(center bottom, ellipse cover, '; if ( $sub_form_footer['bg_color'] !== '') { $css .=  $sub_form_footer['bg_color'];} else { $css .= 'transparent';} $css .= ', '; if ( $sub_form_footer['bg_color_sec'] !== '') { $css .=  $sub_form_footer['bg_color_sec'];} else { $css .= 'transparent';} $css .= ');
background-image: -moz-radial-gradient(center bottom, ellipse cover, '; if ( $sub_form_footer['bg_color'] !== '') { $css .=  $sub_form_footer['bg_color'];} else { $css .= 'transparent';} $css .= ', '; if ( $sub_form_footer['bg_color_sec'] !== '') { $css .=  $sub_form_footer['bg_color_sec'];} else { $css .= 'transparent';} $css .= ');
background-image: -webkit-radial-gradient(center bottom, ellipse cover, '; if ( $sub_form_footer['bg_color'] !== '') { $css .=  $sub_form_footer['bg_color'];} else { $css .= 'transparent';} $css .= ', '; if ( $sub_form_footer['bg_color_sec'] !== '') { $css .=  $sub_form_footer['bg_color_sec'];} else { $css .= 'transparent';} $css .= ');
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='; if ( $sub_form_footer['bg_color'] !== '') { $css .=  $sub_form_footer['bg_color'];} else { $css .= 'transparent';} $css .= ', endColorstr='; if ( $sub_form_footer['bg_color_sec'] !== '') { $css .=  $sub_form_footer['bg_color_sec'];} else { $css .= 'transparent';} $css .= ',GradientType=0 ); ' ;} $css .= ' }
.sub-form-footer .pattern{margin:0 auto;'; if ($sub_form_footer['form_width'] == '100%') { $css .= ' width: 100%; '; } else { $css .= 'width:'; if ($sub_form_footer['border_color'] == !'') { $css .=   $widthminus.'px'; } else { $css .=  $sub_form_footer['form_width']; } $css .= '; '; } $css .= 'height:'. $sub_form_footer['form_height'].'px;'; if ($sub_form_footer['ab_sub_form_fon_choose'] == 0){ $css .= ' opacity: '. $sub_form_footer['ab_bg_opaque_image'].';' ;} $css .= 'background:url('. $sub_form_footer['custom_bg'].') '. $sub_form_footer['repeat_bg'].' '. $sub_form_footer['repeat_position'].'; background-size: '. $sub_form_footer['background_size'].';border-radius:'. $sub_form_footer['ab_border_round'].'px;-moz-border-radius: '. $sub_form_footer['ab_border_round'].'px;-webkit-border-radius: '. $sub_form_footer['ab_border_round'].'px;position:absolute;
z-index:1; }
.sub-form-footer .ab-bg-custom{ z-index:1;position:absolute;'. $sub_form_footer['fonw'].''. $sub_form_footer['fonp'].'border-radius: '. ($sub_form_footer['ab_flow_bg_round']).'px;-moz-border-radius: '. ($sub_form_footer['ab_flow_bg_round']).'px;
-webkit-border-radius: '. ($sub_form_footer['ab_flow_bg_round']).'px;'; if ( $sub_form_footer['ab_bg_custom'] !== '') { $css .= 'background:'. $sub_form_footer['ab_bg_custom'] .';';} else { $css .= 'background-color:transparent;';} $css .= 'opacity: '. $sub_form_footer['ab_flow_bg_opaque'].'; }
.sub-form-footer .ab-header { z-index:2;position:absolute;'.$sub_form_footer['headerw'].''. $sub_form_footer['headerp'].' } 
.sub-form-footer div.ab-header, .sub-form-footer div.ab-header p{padding:0px; margin:0px; margin-bottom:15px; 
text-shadow:'; if ($sub_form_footer['ab_text_shadow'] == 1){ $css .= '#222 0px 1px 2px';} else { $css .= 'none';} $css .= ';font-size: '. $sub_form_footer['ab_text_size'].'px ; font-family:'. $sub_form_footer['ab_text_font'].';'; if ( $sub_form_footer['header_color'] !== '') { $css .= 'color:'. $sub_form_footer['header_color'] .';';} else { $css .= 'color:#000;';} $css .= 'line-height: 1; }
.sub-form-footer .description { z-index:2;position:absolute;'. $sub_form_footer['descw'].''. $sub_form_footer['descp'].'}
.sub-form-footer div.description, .sub-form-footer div.description p{'; if ( $sub_form_footer['ab_desc_color'] !== '') { $css .= 'color:'. $sub_form_footer['ab_desc_color'] .';';} else { $css .= 'color:#000;';} $css .= 'text-shadow:'; if ($sub_form_footer['ab_desc_shadow'] == 1){ $css .= '#222 0px 1px 2px';} else { $css .= 'none';} $css .= ';font-size:  '. $sub_form_footer['ab_desc_size'].'px;font-family:'. $sub_form_footer['ab_desc_font'].'; line-height: 1;padding:0px; margin:0px; margin-bottom:15px; }
.sub-form-footer .image{width: 100%;position:absolute;'. $sub_form_footer['imagew'].' '. $sub_form_footer['imagep'].'z-index:4;}
.sub-form-footer .video{z-index:2;position:absolute;'. $sub_form_footer['videop'] .';width:'. round($sub_form_footer['videow']).'px;height:'. round($sub_form_footer['videoh']).'px;'; if ($sub_form_footer['ab_border_video'] == '1') { $css .= 'border:1px solid '. $sub_form_footer['border_video_color'].'; ' ;}  if ($sub_form_footer['ab_border_video_shadow'] == '1') { $css .= ' -webkit-box-shadow: 0 8px 8px -6px #000;-moz-box-shadow: 0 8px 8px -6px #000;box-shadow: 0 8px 8px -6px #000; ';} $css .= ' }
.sub-form-footer div.list ul{z-index:2;list-style:none; margin-left:0px !important;margin-top:0px !important;margin-bottom:0px !important;position:absolute;'. $sub_form_footer['listw'].''. $sub_form_footer['listp'].'}
.sub-form-footer div.list ul li{text-shadow:'; if ($sub_form_footer['ab_bullet_shadow'] == 1){ $css .= ' #222 0px 1px 2px';} else { $css .= 'none';} $css .= ';font: '. $sub_form_footer['ab_bullet_style'].' '. $sub_form_footer['ab_bullet_size'].'px '. $sub_form_footer['ab_bullet_font'].';'; if ( $sub_form_footer['bullet_color'] !== '') { $css .= 'color:'. $sub_form_footer['bullet_color'] .';';} else { $css .= 'color:#000;';} $css .= '
margin-bottom:2px;padding-top:5px;padding-bottom:5px;}'; if ($sub_form_footer['ab_bullet_icon'] == 0) { $css .= '.sub-form-footer div.list ul li.bullets_icons:before
{ content:"";padding-left:1.5em;background: url('. $imageurl .'bullets/'. $sub_form_footer['ab_bul'] .'.png) no-repeat left;background-size: contain;}';} if ($sub_form_footer['ab_bullet_icon'] == 1) { $css .= '.sub-form-footer div.list ul li.bullets_icons:before{padding-right:0.5em;font-family: FontAwesome; color: '. $sub_form_footer['ab_bullet_icon_color'].'} ';} $css .= '.sub-form-footer .devider{background:url('. $imageurl.'divider.png) no-repeat; width:20px; height: 210px; float:left; margin-top:15px;}.sub-form-footer .form{z-index:4;position:absolute;'. $sub_form_footer['formw'].' '. $sub_form_footer['formp'].'}
.sub-form-footer .header-form{z-index:2;position:absolute;'. $sub_form_footer['headerformw'].''. $sub_form_footer['headerformp'].'}
.sub-form-footer div.header-form, .sub-form-footer div.header-form p{'; if ( $sub_form_footer['header_form_color'] !== '') { $css .= 'color:'. $sub_form_footer['header_form_color'] .';';} else { $css .= 'color:#000;';} $css .= 'text-shadow:'; if ($sub_form_footer['ab_text_form_shadow'] == 1){ $css .= '#222 0px 1px 2px';} else { $css .= 'none';} $css .= ';font-size:  '. $sub_form_footer['ab_text_form_size'].'px;font-family:'. $sub_form_footer['ab_text_form_font'].'; line-height: 1.3;padding:0px; margin:0px; margin-bottom:15px; }
.sub-form-footer .input-form, .sp-form input[type=text], .sp-form input[type=email]{font: '. $sub_form_footer['ab_field_text_style'].' '.$sub_form_footer['ab_field_text_size'].'px '. $sub_form_footer['ab_field_text_font'].'; margin-bottom:7px !important; margin-left: 0px; padding: 0px 0px 0px 10px;'; if ( $sub_form_footer['field_text_color'] !== '') { $css .= 'color:'. $sub_form_footer['field_text_color'] .';';} else { $css .= 'color:#000;';} $css .= 'height:'. $sub_form_footer['input_size_height'].'px !important;
width:'. $sub_form_footer['input_size'].'px;-webkit-box-sizing: border-box !important;box-sizing: border-box !important; '; if ($sub_form_footer['delete_style'] == 1) { $css .= ' border:none;background:transparent;'; } else { $css .= 'border: '.$sub_form_footer['ab_border_form'].' solid '. $sub_form_footer['border_fiels_color'].';border-radius: '. $sub_form_footer['ab_border_form_round'].';-moz-border-radius: '. $sub_form_footer['ab_border_form_round'].';-webkit-border-radius: '. $sub_form_footer['ab_border_form_round'].';'; if ($sub_form_footer['ab_border_form_shadow'] == 1){ $css .= 'box-shadow: 0px 1px 3px #666;';} else { $css .= 'box-shadow: none;' ;} 
if ($sub_form_footer['ab_border_form_shadow_inside'] == 1) { $css .= 'background: '. $sub_form_footer['bg_fiels_color'] .' url('. $imageurl .'bgr-fields2.png) repeat-x top;'; } elseif ($sub_form_footer['bg_fiels_color'] == '') { $css .= ' background:transparent; '; } else { $css .= 'background: '. $sub_form_footer['bg_fiels_color'].';' ;}  ;} $css .= ' -webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box; }
.sub-form-footer input.ab-form-button-top, .sub-form-footer .sp-button.ab-form-button-top{ border: '. $sub_form_footer['ab_border_button'].' solid 
'; if ( $sub_form_footer['border_button_color'] !== '') { $css .=  $sub_form_footer['border_button_color'] .';';} else { $css .= 'transparent;';} $css .= 'height:'. $sub_form_footer['input_size_button_height'].'px;width:'. $sub_form_footer['input_size_button'].'px;text-shadow:'; if ($sub_form_footer['ab_button_text_shadow'] == 1){ $css .=  ' #222 0px 1px 2px';} else {$css .=   'none';} $css .= ';font: '. $sub_form_footer['ab_button_text_style'].' '. $sub_form_footer['ab_button_text_size'].'px '. $sub_form_footer['ab_button_text_font'].';'; if ( $sub_form_footer['button_text_color'] !== '') { $css .= 'color:'. $sub_form_footer['button_text_color'] .';';} else { $css .= 'color:#000;';} $css .= '-webkit-box-sizing: border-box !important;box-sizing: border-box !important;vertical-align:top;text-align:center; '; if ($sub_form_footer['delete_style'] == 0){  if ($sub_form_footer['ab_border_button_shadow_inside'] == 1){ $css .= 'background: url('. $imageurl.'buttons/button-gradient.png) '. $sub_form_footer['bottom_color'].' bottom left repeat-x !important;  
';} else { if ( $sub_form_footer['bottom_color'] !== '') { $css .= 'background:'. $sub_form_footer['bottom_color'] .';';} else { $css .= 'background-color:transparent;';};}  if ($sub_form_footer['bottom_color'] == ''){ $css .= ' background: transparent;'; } $css .= '
'; if ($sub_form_footer['ab_border_button_shadow'] == 1){ $css .= ' 
box-shadow: 0px 1px 3px #000;';} else { $css .= 'box-shadow: none;';}$css .= 'border-radius: '. $sub_form_footer['ab_border_button_round'].';-moz-border-radius: '. $sub_form_footer['ab_border_button_round'].';-webkit-border-radius: '. $sub_form_footer['ab_border_button_round'].';' ;} else { $css .=  'background:transparent;';} $css .= '}
.sub-form-footer div.ab-form-button-top-admin{border: '. $sub_form_footer['ab_border_button'].' solid '; if ( $sub_form_footer['border_button_color'] !== '') { $css .=  $sub_form_footer['border_button_color'] .';';} else { $css .= 'transparent;';} $css .= ';height:'. $sub_form_footer['input_size_button_height'].'px;width:'. $sub_form_footer['input_size_button'] .'px;text-shadow:'; if ($sub_form_footer['ab_button_text_shadow'] == 1){ $css .=  ' #222 0px 1px 2px';} else {$css .=   'none';} $css .= ';font: '. $sub_form_footer['ab_button_text_style'].' '. $sub_form_footer['ab_button_text_size'].'px '. $sub_form_footer['ab_button_text_font'].';'; if ( $sub_form_footer['button_text_color'] !== '') { $css .= 'color:'. $sub_form_footer['button_text_color'] .';';} else { $css .= 'color:#000;';} $css .= '-webkit-box-sizing: border-box !important;box-sizing: border-box !important;text-align:center; '; if ($sub_form_footer['delete_style'] == 0){ if ($sub_form_footer['ab_border_button_shadow_inside'] == 1){ $css .= 'background: url('. $imageurl.'buttons/button-gradient.png) '. $sub_form_footer['bottom_color'].' bottom left repeat-x !important;';} else { if ( $sub_form_footer['bottom_color'] !== '') { $css .= 'background:'. $sub_form_footer['bottom_color'] .';';} else { $css .= 'background-color:transparent;';};} if ($sub_form_footer['bottom_color'] == ''){ $css .= 'background: transparent;'; }  if ($sub_form_footer['ab_border_button_shadow'] == 1){ $css .= 'box-shadow: 0px 1px 3px #000;
';} else { $css .= 'box-shadow: none;';} $css .= ' border-radius: '. $sub_form_footer['ab_border_button_round'].';-moz-border-radius: '. $sub_form_footer['ab_border_button_round'].';-webkit-border-radius: '. $sub_form_footer['ab_border_button_round'].';-webkit-box-sizing: border-box !important;box-sizing: border-box !important;text-align:center;' ;} else { $css .=  'background:transparent;';} $css .= '}
.sub-form-footer div.ab-btnhov-top-admin{'; if ($sub_form_footer['delete_style'] == 0){  if ($sub_form_footer['ab_border_button_shadow_hover'] == 1){ $css .= 'box-shadow: 0px 1px 3px #000;';} else { $css .= 'box-shadow: none;';} if ($sub_form_footer['ab_border_button_shadow_inside'] == 1){ $css .= 'background: url('. $imageurl.'buttons/but-top.png) '. $sub_form_footer['bottom_color_hover'].' bottom left repeat-x !important;';} else { if ( $sub_form_footer['bottom_color_hover'] !== '') { $css .= 'background:'. $sub_form_footer['bottom_color_hover'] .';';} else { $css .= 'background-color:transparent;';};} if ( $sub_form_footer['button_text_color_hover'] !== '') { $css .= 'color:'. $sub_form_footer['button_text_color_hover'] .';';} else { $css .= 'color:#000;';} $css .= 'border: '. $sub_form_footer['ab_border_button'].' solid '; if ( $sub_form_footer['border_button_color_hover'] !== '') { $css .=  $sub_form_footer['border_button_color_hover'] .';';} else { $css .= 'transparent;';};} else { $css .='background:transparent;';} $css .= '}
.sub-form-footer input.ab-btnhov-top, .sub-form-top .sp-button.ab-form-button-top:hover{'; if ($sub_form_footer['delete_style'] == 0){ if ($sub_form_footer['ab_border_button_shadow_hover'] == 1){ $css .= 'box-shadow: 0px 1px 3px #000;
';} else { $css .= 'box-shadow: none;';} if ($sub_form_footer['ab_border_button_shadow_inside'] == 1){ $css .= 'background: url('. $imageurl.'buttons/but-top.png) '. $sub_form_footer['bottom_color_hover'].' bottom left repeat-x !important;';} else { if ( $sub_form_footer['bottom_color_hover'] !== '') { $css .= 'background:'. $sub_form_footer['bottom_color_hover'] .';';} else { $css .= 'background-color:transparent;';} ;} if ( $sub_form_footer['button_text_color_hover'] !== '') { $css .= 'color:'. $sub_form_footer['button_text_color_hover'] .';';} else { $css .= 'color:#000;';} $css .= 'border: '. $sub_form_footer['ab_border_button'].' solid '; if ( $sub_form_footer['border_button_color_hover'] !== '') { $css .=  $sub_form_footer['border_button_color_hover'] .';';} else { $css .= 'transparent;';};} else { $css .='background:transparent;';} $css .= '}
.sub-form-footer .button-align{float:'. $sub_form_footer['button_align'].';}
.sub-form-footer .garantia {z-index:2;background: url('. $imageurl.'garantia.png) no-repeat left top;font: '. $sub_form_footer['ab_text_garantia_style'].' '.$sub_form_footer['ab_text_garantia_size'].'px '. $sub_form_footer['ab_text_garantia_font'].';'; if ( $sub_form_footer['ab_text_garantia_color'] !== '') { $css .= 'color:'. $sub_form_footer['ab_text_garantia_color'] .';';} else { $css .= 'color:#000;';} $css .= 'padding-left:20px;position:absolute; '. $sub_form_footer['garantiaw'].' '. $sub_form_footer['garantiap'].'}
.sub-form-footer .garantia a {'; if ( $sub_form_footer['ab_text_garantia_color'] !== '') { $css .= 'color:'. $sub_form_footer['ab_text_garantia_color'] .';';} else { $css .= 'color:#000;';} $css .= '}
.sub-form-footer .slide-fon {width:'. $sub_form_footer['form_width'].' !important; height:'. $sub_form_footer['form_height'].'px;}
.sub-form-footer .form-inside {margin:0 auto !important; width:1200px; height:'.$sub_form_footer['form_height'].'px;  position:relative !important; }
.sub-form-footer input::-webkit-input-placeholder{'; if ( $sub_form_footer['field_text_color'] !== '') { $css .= 'color:'. $sub_form_footer['field_text_color'] .'!important;';} else { $css .= 'color:#000!important;';} $css .= '}
.sub-form-footer input::-moz-placeholder{'; if ( $sub_form_footer['field_text_color'] !== '') { $css .= 'color:'. $sub_form_footer['field_text_color'] .'!important;';} else { $css .= 'color:#000!important;';} $css .= ';}
.sub-form-footer input::-moz-placeholder{'; if ( $sub_form_footer['field_text_color'] !== '') { $css .= 'color:'. $sub_form_footer['field_text_color'] .'!important;';} else { $css .= 'color:#000!important;';} $css .= '}
.sub-form-footer input::-ms-input-placeholder{'; if ( $sub_form_footer['field_text_color'] !== '') { $css .= 'color:'. $sub_form_footer['field_text_color'] .'!important;';} else { $css .= 'color:#000!important;';} $css .= '}
.form form {padding-top: 0px !important;}';


/********** Конец WPFORM footer **********/ 

}


/********** Начало стиля магазина **********/ 


if (function_exists('edd_woocommerce_plugin_updater')) {

global $ab_woocommerce, $post;
$color = $ab_woocommerce['bg_text_cat'];
$rgbaul = hex2rgba($color, $ab_woocommerce['bg_text_cat_opacily']);
$ab_woocommerce = get_option('ab_woocommerce');
$css .= '#customer_details .col-1, #customer_details .col-2 {max-width:100%}
#access ul > li.cart-in-menu.current-menu-item {float: right;}
.img-wrap h3, h2.woocommerce-loop-product__title {font-weight:normal !important;}
.woocommerce #reviews #comments ol.commentlist li .comment-text {padding-top:0px !important}
.woocommerce #reviews #comments ol.commentlist li img.avatar {margin:0px !important; border-radius:50%}
.woocommerce-Reviews .thread-even, .woocommerce-Reviews li.comment:last-child {border:none!important;}
.woocommerce ul.products li.product h3, .cart_totals.calculated_shipping h2, .woocommerce-billing-fields h3, h3#order_review_heading, .woocommerce-shipping-fields h3, h2.woocommerce-loop-product__title {font-family: '. of_get_option('fonts_blog').' !important}
.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .wpcw-button.wpcw-button-primary {font-weight:normal !important;}
.woocommerce .widget_price_filter .ui-slider-horizontal {    height: .3em;}
.woocommerce .widget_price_filter .ui-slider .ui-slider-handle {width: .5em}
.woocommerce div.product .product_title {margin-bottom:20px !important;}.woocommerce .woocommerce-tabs.wc-tabs-wrapper h2, .related.products h2, .up-sells.upsells.products h2{margin-top:30px !important; margin-bottom:20px !important;}
.woocommerce .products .star-rating {position: absolute;top: 13px;left: 7px;
}
.woocommerce div.product form.cart {margin-top:30px}.woocommerce ul.products h2.woocommerce-loop-product__title {margin-top:0px!important;; margin-bottom:0px!important;}
.woocommerce ul.cart_list li a, .woocommerce ul.product_list_widget li a {font-weight:normal !important;}
.widget_price_filter .price_slider_wrapper .ui-widget-content {background: rgba(0,0,0,.1) !important;border-radius: 1em;}
.woocommerce .widget_price_filter .ui-slider .ui-slider-range, .woocommerce .widget_price_filter .ui-slider .ui-slider-handle {
'; if ( of_get_option('button_color') !== '') { $css .= 'background:'. of_get_option('button_color').'!important;';} else { $css .= 'background:transparent!important;';} $css .= '}
.woocommerce .woocommerce-info {color: #333!important; '; if ( of_get_option('button_color') !== '') { $css .= 'border-top-color:'. of_get_option('button_color').'!important;';} else { $css .= 'border-top-color:transparent!important;';} $css .= '}
.woocommerce .woocommerce-info:before {'; if ( of_get_option('button_color') !== '') { $css .= 'color:'. of_get_option('button_color').';';} else { $css .= 'color:#000;';} $css .= '}
.woocommerce .woocommerce-info a {color: #333!important; '; if ( of_get_option('button_color') !== '') { $css .= 'border-top-color:'. of_get_option('button_color').'!important;';} else { $css .= 'border-top-color:transparent!important;';} $css .= '}
.woocommerce #content table.cart td.actions .input-text, .woocommerce table.cart td.actions .input-text, .woocommerce-page #content table.cart td.actions .input-text, .woocommerce-page table.cart td.actions .input-text {width: 150px;height: 41px;}
h1.product_title.entry-title {'; if ( of_get_option('title_single') !== '') { $css .= 'color:'. of_get_option('title_single').';';} else { $css .= 'color:#000;';} $css .= '}
#content .woocommerce div.product .woocommerce-tabs ul.tabs li.active a {'; if ( of_get_option('button_color') !== '') { $css .= 'background:'. of_get_option('button_color').'!important;';} else { $css .= 'background:transparent!important;';} if ( of_get_option('button_color_text') !== '') { $css .= 'color:'. of_get_option('button_color_text').' !important;';} else { $css .= 'color:#000 !important;';} $css .= 'font-weight:normal; }
#tabs.homepageitemstabs ul.homepageitemstabsul li.homepageitemstabsli {background:#fff!important; }
#tabs.homepageitemstabs ul.homepageitemstabsul li.homepageitemstabsli a {color:#333 !important; }
#tabs.homepageitemstabs ul.homepageitemstabsul li.homepageitemstabsli.ui-tabs-active {'; if ( of_get_option('button_color') !== '') { $css .= 'background:'. of_get_option('button_color').'!important;';} else { $css .= 'background:transparent!important;';} $css .= '}
#tabs.homepageitemstabs ul.homepageitemstabsul li.homepageitemstabsli.ui-tabs-active a { '; if ( of_get_option('button_color_text') !== '') { $css .= 'color:'. of_get_option('button_color_text').'!important;';} else { $css .= 'color:#000!important;';} $css .= '}
#content.ab-inspiration-woocommerce-content, .ab-inspiration-woocommerce-entry {width:100% !important}
#container.ab-inspiration-woocommerce-container{ width: '; if ( $ab_woocommerce['sidebar'] == '1') { $css .= '65% !important'; } else { $css .= '100% !important'; } $css .= '; }
.shop-widget{'; if ( $ab_woocommerce['sidebar'] == '1') { $css .= 'width:32% !important; float:left;'; } else { ''; } $css .= '}
.woocommerce .woocommerce-error {'; if ( of_get_option('bullets_color3') !== '') { $css .= 'border-top-color:'. of_get_option('bullets_color3').';';} else { $css .= 'border-top-color:transparent;';} $css .= '}
.woocommerce .woocommerce-error:before{
'; if ( of_get_option('bullets_color3') !== '') { $css .= 'color:'. of_get_option('bullets_color3').';';} else { $css .= 'color:#000;';} $css .= '}
.woocommerce .woocommerce-message {'; if ( of_get_option('bullets_color2') !== '') { $css .= 'border-top-color:'. of_get_option('bullets_color2').';';} else { $css .= 'border-top-color:transparent;';} $css .= '}
.woocommerce .woocommerce-message:before{'; if ( of_get_option('bullets_color2') !== '') { $css .= 'color:'. of_get_option('bullets_color2').';';} else { $css .= 'color:#000;';} $css .= '}
.woocommerce .woocommerce-info {'; if ( of_get_option('bullets_color') !== '') { $css .= 'border-top-color:'. of_get_option('bullets_color').'!important;';} else { $css .= 'border-top-color:transparent!important;';} $css .= '}
.woocommerce .woocommerce-info:before{'; if ( of_get_option('bullets_color') !== '') { $css .= 'color:'. of_get_option('bullets_color').';';} else { $css .= 'color:#000;';} $css .= '}
.product-tabs {width:68%; float:right}
.woocommerce .post-font ul.products li.product, .woocommerce-page .post-font ul.products li.product {margin-bottom:2.5em !important}
.woocommerce ul.products li.product h3, h2.woocommerce-loop-product__title {font-size:1.1em !important; padding-left: 20px !important; padding-right:20px !important;}
tr.cart_item td.product-price, tr.cart_item td.product-subtotal, tr.cart_item td.product-total, tr.cart-subtotal td, tr.order-total td {min-width:100px; padding:0px !important; text-align: center;}
tr.cart_item td.product-name {font-size:14px}
table.shop_table tr.cart_item td {padding-top: 20px !important; padding-bottom: 20px !important}
table.shop_table tr.cart-subtotal td {padding-top: 10px !important; padding-bottom: 10px !important; border-top:none !important}
table.shop_table tr.order-total td,  table.shop_table tr.order-total th, table.shop_table tr.cart-subtotal th  {padding-top: 10px !important; padding-bottom: 10px !important;}
th.product-total,  th.product-subtotal, th.product-price {text-align: center;}
form.woocommerce-checkout input {padding:5px 10px;}
.select2-container .select2-choice {padding:7px 10px 6px  10px; border-radius:0px;}
form.woocommerce-checkout textarea {padding:10px;}
#container-full.woocommerce .entry-content.post-font  {padding-top: 0px; }'; 
if ($ab_woocommerce['bg_level2'] !=='') { $css .= ' .home-level2 {  background:'. $ab_woocommerce['bg_level2'].'}'; } 
if ($ab_woocommerce['bg_level3'] !=='') { $css .= ' .home-level3 {background:'. $ab_woocommerce['bg_level3'].'}'; } 
$css .= ' .homepage-image2-img:before {content: ""; position: absolute; width:100%;height: 100%;top: 0;left: 0;z-index: -1;opacity: 0;-webkit-transition: .3s;transition: .3s;  }
.homepage-image2-img:before:hover {background: -moz-linear-gradient(top,rgba(141,198,63,1),rgba(141,198,63,0.1) 0%,rgba(141,198,63,0.1) 100%);background: -webkit-linear-gradient(top,rgba(141,198,63,0.1) 0%,rgba(141,198,63,1)100%);background: linear-gradient(to bottom, rgba(141,198,63,0.1) 0%,rgba(141,198,63,1)100%);filter: progid:DXImageTransform.Microsoft.gradient( startColorstr="#1abadf25", endColorstr="#badf25",GradientType=0 );}
.abinspiration-product-ads, .abinspiration-product-categories, .abinspiration-recent-section, .abinspiration-on-sale-section, .abinspiration-best-selling-section, .abinspiration-popular-section, .abinspiration-featured-section, .abinspiration-product-form, .abinspiration-posts{max-width:1200px; margin:0 auto} 
.homepageitemstabs {width:1060px; display:table; padding:0px; margin:0 auto}
#otzyvy-magasin {margin: 30px 0;}
.cbp-l-grid-slider-testimonials-body {max-width:1060px}
.home-level2 .abinspiration-product-categories {'; if ($ab_woocommerce['padding'] == '1') { $css .= 'padding:25px;'; } else { $css .= ' padding:0px;'; } $css .= '} 
.home-level2{padding:'. $ab_woocommerce['padding_top1'].'px 0 '. $ab_woocommerce['padding_bottom1'].'px  0;}
.home-level3{margin:'. $ab_woocommerce['padding_top3'].'px 0 '. $ab_woocommerce['padding_bottom3'].'px  0;}
.home-level3 .abinspiration-product-ads {display:table; padding:'; if  ($ab_woocommerce['padding_level3'] == '1') { $css .= '25px';} else { $css .= '0px 0px';} $css .= ';}
.home-level-featured
{margin:'. $ab_woocommerce['padding_top_featured'].'px 0 '. $ab_woocommerce['padding_bottom_featured'].'px  0;
'; if ($ab_woocommerce['custom_bg1'] !== '') { $css .= ' background: url('. $ab_woocommerce['custom_bg1'].') '. $ab_woocommerce['hp_repeat_bg1'].' '. $ab_woocommerce['hp_repeat_position1'].'; '; }  if ( $ab_woocommerce['hp_fon_color1'] !== '') { $css .= 'background-color:'. $ab_woocommerce['hp_fon_color1'] .'; ';} else { $css .= 'background-color:transparent;';} $css .= 'background-size:'. $ab_woocommerce['background_size'].'}
.home-level5{padding:'. $ab_woocommerce['padding_top5'].'px 0 '. $ab_woocommerce['padding_bottom5'].'px  0;
'; if ($ab_woocommerce['custom_bg6'] !== '') { $css .= 'background: url('. $ab_woocommerce['custom_bg5'].') '. $ab_woocommerce['hp_repeat_bg5'].' '. $ab_woocommerce['hp_repeat_position5'].' ; '; } 
if ( $ab_woocommerce['bg_level5'] !== '') { $css .= 'background-color:'. $ab_woocommerce['bg_level5'].';';} else { $css .= 'background-color:transparent;';} $css .= '
background-size:'. $ab_woocommerce['background_size5'].'}
.abinspiration-testimonials-section {display:table; '; if  ($ab_woocommerce['padding_level_testimonials'] == '1') { $css .= 'width:1110px;';} else { $css .= 'padding:0px 0px; width:1150px;';} $css .= ';  margin:0 auto}
.abinspiration-featured-section {display:table; padding:'; if  ($ab_woocommerce['padding_level_featured'] == '1') { $css .= '25px';} else { $css .= '0px 0px';} $css .= ';}
.abinspiration-posts {width:100%;display:table; padding:'; if  ($ab_woocommerce['padding_level_posts'] == '1') { $css .= '25px';} else { $css .= '0px 0px';} $css .= ';}
.woocommerce ul.products {margin-bottom:0px !important}
.woocommerce ul.products li.product, .woocommerce-page ul.products li.product, .woocommerce ul.products li.last, .woocommerce-page ul.products li.last {padding:0px; text-align:center; background:#fff; border:none !important}
.woocommerce ul.products li.product:hover, .woocommerce-page ul.products li.product:hover,.post-homepage-shop:hover {padding:0px; }
.woocommerce ul.products li.product .img-wrap .star-rating{margin:0px 20px;}
 .woocommerce ul.products li.product,  .woocommerce ul.products li.product:hover {padding-bottom:20px;}
.woocommerce ul.products li.product .img-wrap .add_to_cart_button, .woocommerce ul.products li.product .img-wrap .product_type_grouped, .woocommerce ul.products li.product .img-wrap .ajax_add_to_cart   {margin-bottom:20px;}
.woocommerce ul.products li.product .img-wrap h3, h2.woocommerce-loop-product__title {font-size:'. $ab_woocommerce['font_size_items'].'px !important;margin:0px !important;}
.woocommerce ul.products li.product .img-wrap .star-rating {margin:0px auto 10px auto}
.woocommerce ul.products li.product .price del {display:inline;}
.woocommerce div.img-wrap h3, h2.woocommerce-loop-product__title {position:relative;z-index:3; cursor: pointer;}
.home-level3 .abinspiration-product-ads a.ads-homepage  {margin-top:30px;display:table !important;'; 
if ( $ab_woocommerce['shop_button_homepage_ads'] !== '') { $css .= 'background:'. $ab_woocommerce['shop_button_homepage_ads'].';';} else { $css .= 'background:transparent;';} 
if ( $ab_woocommerce['shop_button_homepage_text_ads'] !== '') { $css .= 'color:'. $ab_woocommerce['shop_button_homepage_text_ads'].';';} else { $css .= 'color:#000;';} $css .= 'padding:20px 20px; font-size:18px; text-transform:uppercase;  -webkit-transition: all 0.5s; transition: all 0.5s; text-decoration:none}
.home-level3 .abinspiration-product-ads a.ads-homepage:hover { 
'; 
if ( $ab_woocommerce['shop_button_homepage_hover_ads'] !== '') { $css .= 'background:'. $ab_woocommerce['shop_button_homepage_hover_ads'].';';} else { $css .= 'background:transparent;';} 
if ( $ab_woocommerce['shop_button_homepage_text_hover_ads'] !== '') { $css .= 'color:'. $ab_woocommerce['shop_button_homepage_text_hover_ads'].';';} else { $css .= 'color:#000;';} $css .= '
 -webkit-transition: all 1s;transition: all 1s;}
.home-level3 .abinspiration-product-ads a.ads-homepage { '; if  ($ab_woocommerce['button_align'] == '1') { $css .= 'float:left';} elseif ($ab_woocommerce['button_align'] == '2') { $css .= 'float:right';}  else { $css .= 'margin:0 auto';} $css .= ' }    
.woocommerce ul.products li.product h3, h2.woocommerce-loop-product__title {'; if ( of_get_option('post_headings') !== '') { $css .= 'color:'. of_get_option('post_headings').'!important;';} else { $css .= 'color:#000!important;';} $css .= '}
.home-level6 .abinspiration-product-form form {text-align:right;}  
.home-level6 .abinspiration-product-form input.show-form-button, .home-level6 .abinspiration-product-form div.show-form-button, .home-level6 .abinspiration-product-form button.show-form-button  {'; 
if ( $ab_woocommerce['shop_button_homepage_form'] !== '') { $css .= 'background:'. $ab_woocommerce['shop_button_homepage_form'].';';} else { $css .= 'background:transparent;';} 
if ( $ab_woocommerce['shop_button_homepage_text_form'] !== '') { $css .= 'color:'. $ab_woocommerce['shop_button_homepage_text_form'].';';} else { $css .= 'color:#000;';} $css .= 'padding: 13px 20px;font-size: 18px;text-transform: uppercase;-webkit-transition: all 0.5s;transition: all 0.5s;text-decoration: none; margin-left:2px;border:none;box-sizing: border-box !important;font-size:18px !important;'; if ($ab_woocommerce['ab_sub_form_smart'] == '3'){ $css .= 'width: 100%;'; } else { $css .= 'width:225px;'; } $css .= '}

.home-level6 .abinspiration-product-form button.show-form-button {padding:18px 20px; margin-left:5px;}
.shopform-title {line-height:0}
.home-level6 .abinspiration-product-form input.show-form-button:hover, .home-level6 .abinspiration-product-form button.show-form-button:hover { '; 
if ( $ab_woocommerce['shop_button_homepage_hover_form'] !== '') { $css .= 'background:'. $ab_woocommerce['shop_button_homepage_hover_form'].';';} else { $css .= 'background:transparent;';} 
if ( $ab_woocommerce['shop_button_homepage_text_hover_form'] !== '') { $css .= 'color:'. $ab_woocommerce['shop_button_homepage_text_hover_form'].';';} else { $css .= 'color:#000;';} $css .= '-webkit-transition: all 1s; transition: all 1s;}    
.home-level6 .abinspiration-product-form input.shop-form-input {font-size:18px !important;height:55px; border:1px solid #eaeaea; width:318px; padding:20px 10px;}
.home-level6{margin:'.$ab_woocommerce['padding_top6'].'px 0 '. $ab_woocommerce['padding_bottom6'].'px  0;
'; if ($ab_woocommerce['custom_bg6'] !== '') { $css .= 'background: url('. $ab_woocommerce['custom_bg6'].') '. $ab_woocommerce['hp_repeat_bg6'].' '.$ab_woocommerce['hp_repeat_position6'].'; '; } 
if ( $ab_woocommerce['bg_level6'] !== '') { $css .= 'background-color:'. $ab_woocommerce['bg_level6'].';';} else { $css .= 'background-color:transparent;';} 
$css .= 'border-top:5px solid '. $ab_woocommerce['border_top_form'].';}
.home-level6 .abinspiration-product-form {padding:25px 25px; margin:0 auto; max-width:1060px; display:table;}
#content .home-level6 p {margin-bottom:0px !important; line-height:1.2 !important}'; if ($ab_woocommerce['cat_layout'] == '1') { $css .= '
.home-level2 .woocommerce.columns-3 ul.products li.product-category.product.first{float:left; width:55.8% !important; background:#fff; margin-right:30px;}
.home-level2 .woocommerce.columns-3 ul.products li.product-category.product.first div.category-bg{height:630px;}
.home-level2 .woocommerce.columns-3 ul.products li.product-category.product.last, .home-level2 .woocommerce.columns-3 ul.products li.product-category.product {background:#fff; padding:0px;  margin-right:0px; margin-bottom:0px; display:block;width:41.2%; height:300px; border:none !important; box-shadow:none; margin-bottom: 0px !important;  float:right }
.home-level2 .woocommerce.columns-3 ul.products li.product-category.product.last  div.category-bg, .home-level2 .woocommerce.columns-3 ul.products li.product-category.product  div.category-bg{height:300px;}
.home-level2 .woocommerce.columns-3 ul.products li.product-category.product.last {    margin-top: 30px !important;}
.home-level2 .woocommerce.columns-3 ul.products li.product-category.product.last div.category-bg{margin-top:0px;}'; } else { $css .= '
.home-level2 .woocommerce.columns-3 ul.products li.product-category.product.first, .home-level2 .woocommerce.columns-3 ul.products li.product-category.product.last, .home-level2 .woocommerce.columns-3 ul.products li.product-category.product {background:#fff; padding:0px;  margin-right:0px; margin-bottom:0px; display:block;width:31.4% !important; height:300px !important;border:none !important; box-shadow:none; margin-bottom: 0px !important;  float:left; margin-right:30px; }
.home-level2 .woocommerce.columns-3 ul.products li.product-category.product.first div.category-bg, .home-level2 .woocommerce.columns-3 ul.products li.product-category.product.last div.category-bg, .home-level2 .woocommerce.columns-3 ul.products li.product-category.product div.category-bg {padding-top:300px !important;}
.home-level2 .woocommerce.columns-3 ul.products li.product-category.product.last div.category-bg {margin-right:0px;margin-top:0px;}
'; } $css .= '
.home-level2 .woocommerce.columns-3 ul.products li.product-category.product.last img, .home-level2 .woocommerce.columns-3 ul.products li.product-category.product img, .home-level2 .woocommerce.columns-3 ul.products li.product-category.product.first img {margin-bottom:0px !important;  margin-right:0px;}
#content .home-level2 .woocommerce.columns-3 ul.products li.product-category.product.first img {max-width:800px !important}'; if ($ab_woocommerce['cat_layout'] == '1') { 
$css .= '.home-level2 .cat-title-homepage {z-index:3;text-align:left; position:absolute; top:30px; font-family:'. $ab_woocommerce['category_headline_font'].'; font-size:'. $ab_woocommerce['category_headline_size'].'px !important;  padding:0px  '. $ab_woocommerce['image_border'].'; left:1px; '; 
if ( $ab_woocommerce['category_headline_color'] !== '') { $css .= 'color:'. $ab_woocommerce['category_headline_color'].';';} else { $css .= 'color:#000;';} 
 $css .= 'height: 70%; width:100%;font-weight:'; if ($ab_woocommerce['category_headline_strong'] ==  1)  {$css .= 'bold';} else {$css .= 'normal';} $css .= ';font-style:'; if ($ab_woocommerce['category_headline_italic'] ==  1)  {$css .= 'italic';} else {$css .= 'normal';}$css .= ';}
.home-level2 .cat-title-homepage span.cat-title-bg {display:table; '; 
if ( $ab_woocommerce['bg_text_cat'] !== '') { $css .= 'background:'. $rgbaul .';';} else { $css .= 'background:transparent;';} $css .= 'padding:5px 20px;-webkit-transition: all 1s;transition: all 1s;}
.home-level2 .shop_cat_desc {display:table; margin-top:5px; text-align:left; font-family:'. $ab_woocommerce['category_desc_font'].'; font-size:'. $ab_woocommerce['category_desc_size'].'px !important; '; if ( $ab_woocommerce['category_desc_color'] !== '') { $css .= 'color:'. $ab_woocommerce['category_desc_color'].';';} else { $css .= 'color:#000;';} $css .= 'font-weight:'; if ($ab_woocommerce['category_desc_strong'] ==  1)  {$css .= 'bold';} else {$css .= 'normal';}$css .= ';font-style:'; if ($ab_woocommerce['category_desc_italic'] ==  1)  {$css .= 'italic;';} else {$css .= 'normal;';} if ( $ab_woocommerce['bg_text_cat'] !== '') { $css .= 'background:'. $rgbaul .';';} else { $css .= 'background:transparent;';} $css .= 'padding:5px 20px;}'; } else { $css .= '
.home-level2 .cat-title-homepage {z-index:3;text-align:center; padding:20px 0; position:absolute; bottom:0px; font-family:'.$ab_woocommerce['category_headline_font'].'; font-size:'. $ab_woocommerce['category_headline_size'].'px !important;  padding:0px  '.$ab_woocommerce['image_border'].'; left:0px; color: '. $ab_woocommerce['category_headline_color'].';width:100%; display:grid; font-weight:'; if ($ab_woocommerce['category_headline_strong'] ==  1)  {$css .= 'bold';} else {$css .= 'normal';} $css .= ';font-style:'; if ($ab_woocommerce['category_headline_italic'] ==  1)  {$css .= 'italic';} else {$css .= 'normal';} $css .= ';}
.home-level2 .cat-title-homepage span.cat-title-bg {display:table; '; 
if ( $ab_woocommerce['bg_text_cat'] !== '') { $css .= 'background:'. $rgbaul.';';} else { $css .= 'background:transparent;';} $css .= '
padding:10px 0px;-webkit-transition: all 1s;transition: all 1s;}
.home-level2 .shop_cat_desc {display:table; margin-top:5px; text-align:left; font-family:'. $ab_woocommerce['category_desc_font'].'; font-size:'.$ab_woocommerce['category_desc_size'].'px !important;'; if ( $ab_woocommerce['category_desc_color'] !== '') { $css .= 'color:'. $ab_woocommerce['category_desc_color'] .';';} else { $css .= 'color:#000;';} $css .= 'font-weight:'; if ($ab_woocommerce['category_desc_strong'] ==  1)  {$css .= 'bold;';} else {$css .= 'normal;';} $css .= 'font-style:'; if ($ab_woocommerce['category_desc_italic'] ==  1)  {$css .= 'italic;';} else {$css .= 'normal;';} if ( $ab_woocommerce['bg_text_cat'] !== '') { $css .= 'background:'. $rgbaul.';';} else { $css .= 'background:transparent;';} $css .= 'padding:5px 20px;}'; } 
$css .= '.home-level2 .tm_banners_grid_widget_banner_link {position: relative;overflow: hidden;display: block;}
.home-level2 .tm_banners_grid_widget_banner_link:before {content:"";position: absolute;opacity: 0;-webkit-transition: all 3s;transition: all 3s;width:100%;height:100%;display:block;}
.home-level2 .tm_banners_grid_widget_banner_link:hover:before {top: 0px; opacity: '. $ab_woocommerce['border_opacity'].';
'; if  ($ab_woocommerce['border_static'] == '2') { $css .= ' border:'. $ab_woocommerce['image_border'].' solid '. $ab_woocommerce['image_border_color']; }  $css .= ' ;-webkit-transition:  1s all ease;transition:  1s all ease;}
.home-level2 .tm_banners_grid_widget_banner_link:before {top: 0px; opacity: '. $ab_woocommerce['border_opacity'].';
 '; if  ($ab_woocommerce['border_static'] == '1') { $css .= ' border: '. $ab_woocommerce['image_border'].' solid '. $ab_woocommerce['image_border_color']; }  $css .= ';z-index:1}
 .home-level2 .tm_banners_grid_widget_banner_link:before {top: 0px; opacity: '. $ab_woocommerce['border_opacity'].';
'; if  ($ab_woocommerce['border_static'] == '0') { $css .= ' border:0px';}  $css .= ';z-index:1}
 #content .home-level2 .woocommerce.columns-3 ul.products li.product-category.product .img-wrap:before {content: "";position: absolute;top: 0;right: 0;left: 0;bottom: 0;opacity:0;-webkit-transition:  1s all ease;transition:  1s all ease;z-index: 1;}
#content .home-level2 .woocommerce.columns-3 ul.products li.product-category.product .img-wrap:hover:before {top: 0px; opacity: '. $ab_woocommerce['bg_cat_opacity'].';'; if  ($ab_woocommerce['bg_static'] == '2') { $css .= 'background: linear-gradient(to right,'. $ab_woocommerce['image_bg_color_hoverone'].','. $ab_woocommerce['image_bg_color_hover'].'); opacity: '. $ab_woocommerce['bg_cat_opacity'].'; '; } else { $css .= 'background:transparent';} $css .= ';}
#content .home-level2 .woocommerce.columns-3 ul.products li.product-category.product .img-wrap:before{ top: 0px; '; if  ($ab_woocommerce['bg_static'] == '1') { $css .= 'background: linear-gradient(to right,'. $ab_woocommerce['image_bg_color_hoverone'].','. $ab_woocommerce['image_bg_color_hover'].');  opacity:'.$ab_woocommerce['bg_cat_opacity'].';'; } else { $css .= 'background:transparent';} $css .= '; z-index:1;}
#content .home-level2 .woocommerce.columns-3 ul.products li.product-category.product .img-wrap:before { top: 0px; '; if  ($ab_woocommerce['bg_static'] == '0') { $css .= 'background: transparent; z-index:1; '; } $css .= '} 
.home-level2 .woocommerce.columns-3 ul.products li.product-category.product.last .button-homepage, .home-level2 .woocommerce.columns-3 ul.products li.product-category.product .button-homepage {display:none}
.home-level2 .woocommerce.columns-3 ul.products li.product-category.product.first .button-homepage {display:block; position:absolute; bottom:30px; left:30px; padding:20px; font-size:20px; text-transform:uppercase;  -webkit-transition: all 0.5s; transition: all 0.5s; z-index:3}
.cbp-item.testimonials-animation  .avatar {margin:0px; padding:0px;}
.cbp-item.testimonials-animation img.avatar-comment-homepage {border-radius:50%; position: relative; top:-50px; z-index:999; padding:0px !important; border: '. $ab_woocommerce['otzyvy_border'].' solid '; if ( $ab_woocommerce['otzyvy_border_color'] !== '') { $css .=  $ab_woocommerce['otzyvy_border_color'] .'!important;';} else { $css .= 'transparent !important;';} $css .= ' }
 .shop-otzyv-home {text-align:center; margin-top:10px;  margin-bottom:10px;}
 .shop-otzyv-image:before{font-size: 60px;font-weight: 700;width: 100%;text-align: center;position: absolute;top: 55px;left: 0;content: "\201C";font-family: "Times New Roman", Georgia, Serif;z-index: 11;height: 50px;}
.shop-otzyv-image  {clear:both; width:105px; margin:0 auto; overflow: visible;}
.home-level5 .cbp-item-wrapper {overflow: visible; margin-top: 50px; border: '. $ab_woocommerce['otzyvy_border'].' solid '; if ( $ab_woocommerce['otzyvy_border_color'] !== '') { $css .=  $ab_woocommerce['otzyvy_border_color'] .';';} else { $css .= 'transparent;';} $css .= '; background:#fff;}
  
.star-rating span:before {content: "\f005\f005\f005\f005\f005"; top: 0;position: absolute;left: 0;}
.star-rating span:before, .woocommerce p.stars a {';if ( $ab_woocommerce['rating_color'] !== '') { $css .= 'color:'. $ab_woocommerce['rating_color'].'!important;';} else { $css .= 'color:#000!important;';} $css .= '} 
.woocommerce span.onsale, span.onsale, span.onsale:after { font-weight:normal;'; if ( $ab_woocommerce['rating_color'] !== '') { $css .= 'background-color:'. $ab_woocommerce['rating_color'].'!important;';} else { $css .= 'background-color:transparent!important;';} $css .= '}
.cbp-slider-edge .cbp-nav-next, .cbp-slider-edge .cbp-nav-prev {top:0px;}
.cbp-slider-edge .cbp-nav-prev {left:0px}.cbp-slider-edge .cbp-nav-next {right:0px}
ul.wc_payment_methods,td.product-price .f, td.product-subtotal .woocommerce-Price-amount, .woocommerce-info, .woocommerce-page #content div.product div.summary, div.description, .woocommerce-MyAccount-navigation, .woocommerce-MyAccount-content, .shop_table.woocommerce-checkout-review-order-table {font-size:16px}
#customer_details input, #customer_details textarea, #customer_details select, .country_select, .select2-chosen {font-size:16px}
.storefront-featured-products.homepageitemstabs {margin-top:20px;border:1px solid #eaeaea; padding:0px }
.storefront-featured-products.homepageitemstabs .section-title {color:#fff;background: #000000; margin:0px; padding:10px 20px}
.storefront-featured-products.homepageitemstabs  ul.products { margin:20px}   
.woocommerce-Tabs-panel.woocommerce-Tabs-panel--description.panel.entry-content .contet-tab {border:none !important; padding:0px !important}
.woocommerce-Tabs-panel.woocommerce-Tabs-panel--description.panel.entry-content .contet-tab, .woocommerce ul.products li.product, .woocommerce-page ul.products li.product, .woocommerce ul.products li.last, .woocommerce-page ul.products li.last, .woocommerce span.onsale, span.onsale, .woocommerce #reviews #comments ol.commentlist li, .woocommerce .quantity .qty, .woocommerce #content div.product div.images img, .woocommerce div.product div.images img, .woocommerce-page #content div.product div.images img, .woocommerce-page div.product div.images img, a.ads-homepage, div.button-homepage, .home-level2 .cat-title-homepage span.cat-title-bg, .home-level2 .shop_cat_desc, div.show-form-button, input.show-form-button,.shop-form-input, button.show-form-button {'; if ( of_get_option('buttons_shape') == '3px'){ $css .= 'border-radius: 3px; -moz-border-radius: 3px;-webkit-border-radius: 3px;';} else { $css .= 'border-radius: 0px; -moz-border-radius: 0px;-webkit-border-radius: 0px;'; } $css .= ' }
.abinspiration-product-ads-img {display:table-cell; vertical-align:middle; width:45%}
.abinspiration-product-ads-text { width:55%;display:table-cell; vertical-align:middle; padding-left:30px; }
.abinspiration-product-form-img { '; if ($ab_woocommerce['ab_sub_form_smart'] == '3'){ $css .= ' width:60%;'; } else { $css .= '  width:43%;'; } $css .= '     display: table-cell;vertical-align: middle !important; }
.abinspiration-product-form-input{width:100%; padding-left:25px;display: table-cell;vertical-align: middle !important;}
.woocommerce a.button, .wpcw-button.wpcw-button-primary {padding:12px 30px} 
.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt {padding: 13px 30px;margin-left: 0px;}
.woocommerce-cart .wc-proceed-to-checkout a.checkout-button {padding:20px;}
.woocommerce .widget_shopping_cart .cart_list li, .woocommerce.widget_shopping_cart .cart_list li {padding-left:0px;}  .woocommerce.widget_recently_viewed_products .product_list_widget, .woocommerce.widget_products .product_list_widget, .woocommerce.widget_top_rated_products .product_list_widget {margin-left: 0 !important;}
.woocommerce .widget_shopping_cart ul.cart_list li.mini_cart_item a.remove {    position: absolute;top: 0; left:90%;right: 0 !important; padding-top:0px;}
.woocommerce a.remove:hover  {background:transparent; color:red !important; text-decoration:none}
    .woocommerce ul.cart_list li img, .woocommerce ul.product_list_widget li img, .woocommerce-page ul.cart_list li img, .woocommerce-page ul.product_list_widget li img {float:left; margin-right:20px;}
div.widget_shopping_cart_content p.buttons a.button {width:100%}
.woocommerce ul.cart_list li img, .woocommerce ul.product_list_widget li img {width:50px;}
.woocommerce ul.cart_list li a:link, .woocommerce ul.product_list_widget li a:link, .woocommerce ul.cart_list li a:visited, .woocommerce ul.product_list_widget li a:visited, .woocommerce ul.cart_list li span {color:#333 !important; font-size:16px}
.woocommerce ul.cart_list li a:link {font-size:12px}
.woocommerce tr th {color: #333 !important;font-size: 16px !important;font-weight: bold;line-height: 18px;padding: 9px 24px;background: #eaeaea;width: 50px !important;border: 1px solid #ccc;text-align:left !important}
.woocommerce tr td{border:1px solid #eaeaea !important}
.woocommerce ul#shipping_method label {font-size: 16px !important; font-weight:normal}
.woocommerce-Price-currencySymbol .fa {display:inline}
 #content .woocommerce div.product .woocommerce-tabs ul.tabs li a, span.color-link.color_and_text_link a {color:#333 !important;}   
#content .woocommerce a.woocommerce-LoopProduct-link, #content .woocommerce .woocommerce-breadcrumb a, #content .woocommerce .woocommerce-breadcrumb {color:#777  !important; font-size:15px} 
.rcorners {border-radius:0px; margin:0px;}
 .woocommerce ul.product_list_widget li {padding-bottom:10px !important; border-bottom:1px solid #eaeaea}
.otzyv-tovar-magazin { clear:right; text-align:center; margin-bottom:10px;color: #141414;font-size: 18px;line-height: 30px;font-style: italic; padding:0 60px;}
.entry-box.ab-inspiration-woocommerce-entry .woocommerce ul.products li.product-category.product h3 {font-size:16px !important; padding-bottom:20px;}
mark {background:#fff}
.woocommerce div.product form.cart table tr td {border:none !important; padding-left:0px !important; }
.woocommerce div.product form.cart table.group_table tr td.label label {font-weight:normal !important;}
#content .woocommerce div.product form.cart table.variations  tr td.label label {padding-top:0px !important;}
#content tr td.label { font-weight:normal !important; vertical-align:middle !important}
#content tr td.price { padding-left:20px !important; vertical-align:middle !important}
.woocommerce div.product form.cart table {margin-bottom:10px !important}
.stock.available-on-backorder, .stock.out-of-stock {font-weight:normal}
#content .woocommerce table.shop_table td {font-weight:normal !important}
.entry-content label {font-size:14px !important}
span.woocommerce-Price-amount.amount {font-weight:bold !important}
.woocommerce ul.products li.product .img-wrap .yith-wcqv-button {margin-top:10px; margin-bottom:0px}
#content .woocommerce .single .hentry, .page .hentry {margin-bottom:0px !important}
.woocommerce .quantity .qty, .woocommerce  .quantity .qty, .woocommerce table.shop_table tr.cart_item td.product-quantity  div.quantity{width:100px; height: 45px;border:1px solid #eaeaea;}
.woocommerce div.product form.cart div.quantity, .woocommerce table.shop_table tr.cart_item td.product-quantity  div.quantity {margin-right:10px;}
.woocommerce .product  div.quantity .tm-qty-plus:before,  .woocommerce table.shop_table tr.cart_item td.product-quantity  div.quantity .tm-qty-plus:before{position: absolute;top: 15px;font-family: "FontAwesome";font-size: 11px;transition: .3s all ease;}
.woocommerce .product  div.quantity .tm-qty-plus:before,  .woocommerce table.shop_table tr.cart_item td.product-quantity  div.quantity .tm-qty-plus:before {content: "\f067";right: 10px;}
.woocommerce .product  div.quantity .tm-qty-minus, .woocommerce table.shop_table tr.cart_item td.product-quantity  div.quantity .tm-qty-minus {    width: 30px; height: 100%; border-right:1px solid #eaeaea;position: absolute; }
.woocommerce .product  div.quantity .tm-qty-minus:hover,  .woocommerce .product  div.quantity .tm-qty-plus:hover, .woocommerce table.shop_table tr.cart_item td.product-quantity  div.quantity .tm-qty-minus:hover, .woocommerce table.shop_table tr.cart_item td.product-quantity  div.quantity .tm-qty-plus:hover{ background: #eaeaea;}
.woocommerce .product  div.quantity .tm-qty-plus, .woocommerce table.shop_table tr.cart_item td.product-quantity  div.quantity .tm-qty-plus {    width: 30px; height: 100%; border-left:1px solid #eaeaea;position: absolute; right:0;top:0}
.woocommerce .product  div.quantity .tm-qty-minus:before, .woocommerce table.shop_table tr.cart_item td.product-quantity  div.quantity .tm-qty-minus:before {position: absolute;top: 15px;font-family: "FontAwesome";font-size: 11px;transition: .3s all ease;}
.woocommerce .product  div.quantity .tm-qty-minus:before, .woocommerce table.shop_table tr.cart_item td.product-quantity  div.quantity .tm-qty-minus:before {content: "\f068";left: 10px;}
 #content .quantity input {font-size:16px}
.woocommerce-review-link {display:none}
.qty {font-size:20px;}
.woocommerce .quantity {position:relative}
.entry-content label[for=payment_method_kassa]  {width:80%}
.woocommerce form .form-row textarea {height: 5em;}
.woocommerce-variation-price  {margin-bottom:20px}
.woocommerce-variation-price span {font-size:30px; margin-bottom:20px}
.woocommerce-variation-price ins {text-decoration:none !important}
table.group_table td.label {display:table-cell}
.shopswatchinput {display:table;text-align:center; margin:0 auto; margin-bottom:10px}
.shopswatchinput .img-wrap{display:table-cell;}
.wcvashopswatchlabel.wcvaround, .wcvaswatchinput {width:20px !important; height:20px !important}
.woocommerce div.product form.cart table.group_table td.label {text-align: left !important;white-space: normal;}
.woocommerce-Price-amount.amount{white-space: nowrap;}
.woocommerce .related.products h2, .woocommerce .cross-sells h2, .woocommerce .cart_totals h2  {font-size:22px !important}
mark {padding:0px}
.woocommerce .widget_price_filter .price_slider_amount .button   {padding:6px 10px 7px 10px}
.radio input[type="radio"], .radio-inline input[type="radio"], .checkbox input[type="checkbox"], .checkbox-inline input[type="checkbox"] {position: relative; margin-left:0px}
.woocommerce ul.products li.product .img-wrap-image{border: 1px solid  #eaeaea;}'; if ($ab_woocommerce['show_cat_title'] == '1') { $css .= '.home-level2 .cat-title-homepage {display:none;}'; }  if ($ab_woocommerce['show_cat_desc'] == '1'){ $css .= '.home-level2 .shop_cat_desc { display:none !important;}'; } 
}
/********** КОнец стиля магазина **********/ 



/********** Начало стиля мобильной версии **********/ 
$css .= '
@media only screen and (min-width: 1200px) {.navbar.navbar-expand-md.navbar-dark {display:none;}   .page-template-template-catalogv .container, .one-full-common.one-column.container {
    max-width: 1200px;padding-right:0px; padding-left:0px}
   
    }

@media only screen and (max-width: 1200px) {
 #videobgyoutube {display:none} 
 .floatmenu-bgg, .floatmenu-inside, .floatmenu-inside div,  #wrapper, #header, #footer, #access, #content-main, .sub-form-top, .sub-form-top .bg, #branding, #main, body, #wrapper, #access, #access .menu-header, div.menu, .sub-form-top, .sub-form-footer, #content-main, .footer, #footer, #headermenu, #testimonial-form input[type="text"], .one-column #content {width:100% !important; max-width: 100% !important;}
 
  #content-main {padding:0px;}
  #content-main, #main, .page-template-enterpage #wrapper, .page-template-enterpage #wrapper .sub-form-top, .page-template-enterpage #wrapper #header, .page-template-enterpage #wrapper #branding, .page-template-enterpage #content-main, .page-template-enterpage #main, .sub-form-top .bg, .sub-form-top .pattern, .form-inside, .footer {width:100% !important}
  .footer-mid, .custom-footer-text, #footermenu {width:90% !important}
  #primary {width:34% !important}
  li.widget-container, div.widget-container, .single-course_unit #primary.widget-area ul li {margin-bottom:20px}
#header, #wrapper,.headermenu-inside {width:100%}.navbar {display:none}


	.uroven, .custom-read-more, .vhodnoaya1 .heading-title1,.vhodnoaya2 .heading-title2,.vhodnoaya3 .heading-title3, .vhodnoaya4 .heading-title4,.vhodnoaya5 .heading-title5, .vhodnoaya6 .heading-title6, .block_home4, .block_home5, .block_home6{width:100% !important} 
	.navbar-nav {display:block}
	.navbar-expand-md {flex-flow: wrap;}
	.firstpost .homepage-image5 {width:100% !important}
	.secondpost .homepage-image5 {width:30% !important}
	
	#container {width:64% !important}

      
  }
  

@media only screen and (max-width: 1024px) {#footer-widget-area, #wrapper, #header, #footer, #access, #content-main, .sub-form-top, .sub-form-top .bg, #branding, #main, body, #wrapper, #access, #access .menu-header, div.menu, .sub-form-top, .sub-form-footer, #content-main, .footer, #footer, #headermenu, #testimonial-form input[type="text"] {width:100% !important; max-width: 100% !important;}
#headermenu {display: none !important;}
#site-title, #site-description, #site-title a {margin-bottom: 0px !important;}
.navbar-expand-md .navbar-toggler {display:block;}
.navbar {min-height:0; background:transparent !imporant}
.navbar-dark {background:transparent}
.navbar-header, .navbar-dark {border:none;}
.navbar-toggler {'; $typography = of_get_option('logo_typography_mobile'); $colortoggle = $typography['color']; $colorone = hex2rgba($colortoggle, 1); if ($typography) { $css .= 'opacity: 0.5;'; } if ( $typography['color'] !== '') { $css .= 'border-color: '.$typography['color'].'; '; } else { $css .= 'border-color:transparent!important; color:#000;'; } $css .= '}
.navbar-toggler-icon {width:1.2em; height:1.2em;

background:url("data:image/svg+xml;charset=utf8,%3Csvg viewBox=\'0 0 30 30\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cpath stroke=\''.  $colorone .'\' stroke-width=\'2\' stroke-linecap=\'round\' stroke-miterlimit=\'10\' d=\'M4 8h24M4 16h24M4 24h24\'/%3E%3C/svg%3E") !important;}


.navbar-dark .navbar-toggler  {'; $typography = of_get_option('logo_typography_mobile'); $colortoggle = $typography['color']; $colorone = hex2rgba($colortoggle, 1); if ($typography) { $css .= ''; if ( $typography['color'] !== '') { $css .= 'border-color:transparent; color:'. $typography['color'].'!important;';} else { $css .= 'border-color:transparent!important; color:#000;';} $css .= '}
.custom-toggler .navbar-toggler-icon {
  background-image: url("data:image/svg+xml;charset=utf8,%3Csvg viewBox=\'0 0 32 32\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cpath stroke=\''.  $colorone .'\' stroke-width=\'2\' stroke-linecap=\'round\' stroke-miterlimit=\'10\' d=\'M4 8h24M4 16h24M4 24h24\'/%3E%3C/svg%3E") !important;}
.navbar-nav {margin-top:10px; margin-left:0px !important;  padding: 20px 40px;}
 ul.navbar-nav li:hover {background: #3d3d3d; padding-left:10px !important}
ul.navbar-nav li a {color:#fff; font-size:18px; margin-left:0px;}
ul.navbar-nav li {padding:5px 0px;    border-bottom: 1px solid rgba(255,255,255,.1);}
ul.navbar-nav li ul.dropdown-menu  {margin-left:20px; border:none; padding:5px 0px}
ul.navbar-nav li ul.dropdown-menu li:last-child{border-bottom:none !important}
.navbar-nav .dropdown-menu {'; if ( $typography['color'] !== '') { $css .= 'color:'. $typography['color'];} else { $css .= 'color:#000';}  $css .= ';font-size:16px; background:transparent !important}';} $css .= '
.navbar-dark .navbar-toggle .icon-bar:hover {'; if ( of_get_option('menu_text_hover') !== '') { $css .= 'color:'. of_get_option('menu_text_hover');} else { $css .= 'color:#000';}  $css .= '!important;}
.navbar-dark .navbar-toggle:hover,.navbar-dark .navbar-toggle:focus {background:transparent; }

div.head-style {display:none}
.navbar-toggle .icon-bar {display: block;width: 42px;height: 5px;border-radius: 1px;}
.navbar {padding:10px 0 10px 0}
.navbar.navbar-expand-md.navbar-dark {  display : flex;align-items : center;justify-content: center;width:100%} 
.collapse, .navbar-expand-md .navbar-collapse {display:none !important}
.collapse.show {display:block  !important}
#branding {'; $background = of_get_option('header_background_around_mobile'); if ($background) { if ($background['image']) {
$css .= 'background:url('.$background['image']. ') '.$background['repeat']. ' '.$background['position']. ' '.$background['attachment']. ' '.$background['color']. ' !important;';} elseif ($background['color'] == !'') { $css .= 'background:'.$background['color']. ' !important;';} else {$css .= '';}} else {$css .= 'no entry';};  if (of_get_option('menu_border_mobile') == '1'){ $css .= 'border-bottom:1px solid '. of_get_option('menu_dev_color_mobile').'; ';};  if (of_get_option('menu_shadow_border_mobile') == '1') { $css .= ' -webkit-box-shadow: 0px 5px 6px -5px rgba(0, 0, 0, 0.6); -moz-box-shadow:    0px 5px 6px -5px rgba(0, 0, 0, 0.6); box-shadow: 0px 5px 6px -5px rgba(0, 0, 0, 0.6);';} $css .= ' }

.logo-mobile {float:left; max-width:80%; padding:15px 0px 10px 15px}
.container > .navbar-header, .container-fluid > .navbar-header, .container > .navbar-collapse, .container-fluid > .navbar-collapse{margin-right:0px !important;margin-left:0px  !important;}
.navbar {margin-bottom:10px !important;}
 #content-main {width: 100%;padding: 40px 40px;}
 #container,  #primary, .widget-testimonial, #form-background, .form-heading {width: 100% !important}
 #primary, .widget-testimonial {margin-top:40px;}
 
.sitemap ul li, .post-font, .portfolio, .archive-meta p,.sizesmall ul li:before, .list1 ul,.list2 ul,.list3 ul,.list4 ul,.list5 ul,.list6 ul,.list7 ul,.list8 ul,.list9 ul,.list10 ul,.list11 ul ,.list12 ul ,.list13 ul ,.list14 ul ,.list15 ul ,.list16 ul ,.list17 ul, .comment_container .comment-text div.description {font-size:18px !important}
h2.entry-title a:link, h2.entry-title a:visited, .entry-title, h1.entry-title {font-size: 24px !important}
.widget-title {font-size:20px !important; font-weight:normal  !important; text-transform:none  !important}

#site-title a {'; $typography = of_get_option('logo_typography_mobile'); if ($typography) { $css .= 'text-align:center; ';if ( $typography['color'] !== '') { $css .= 'color:'. $typography['color'];} else { $css .= 'color:#000';}  $css .= ';font-size: '. $typography['size'] .' !important; font-family: '.  $typography['face'].'; font-weight: '. $typography['style'] .' !important; '; } $css .= '} #site-title{ text-transform:'. of_get_option('logo_transform_mobile') .' !important}
#site-title a:hover {'; $typography = of_get_option('logo_typography_mobile'); if ($typography) { $css .= 'text-align:center; ';if ( $typography['color'] !== '') { $css .= 'color:'. $typography['color'];} else { $css .= 'color:#000';}  $css .= ';font: '. $typography['style'] .' '. $typography['size'] .' '.  $typography['face'].' !important; line-height:1.1 !important'; } $css .= '}
#site-description {'; $typography = of_get_option('desc_typography_mobile'); if ($typography) { $css .= 'text-align:left; ';if ( $typography['color'] !== '') { $css .= 'color:'. $typography['color'];} else { $css .= 'color:#000';}  $css .= ';font: '. $typography['style'] .' '. $typography['size'] .' '.  $typography['face'].' !important;'; } $css .= ' text-transform:'. of_get_option('desc_transform_mobile') .' !important}
#site-title, #site-description {margin-bottom:10px;}
#site-title, #site-description {margin:0px 0px;}
#site-title {margin-bottom:10px;}

}
  
  
  
@media only screen and (max-width: 940px) { 
#primary, .widget-testimonial {width:100% !important}
#wrapper, #container, #container.single-no-sidebar,#container.single-no-sidebar #content, #main, .one-column #content, .post-content, #content .entry-content, #content .tabberlive {width:100% !important}
#primary, .widget-testimonial {width:100%; padding-top:40px;}


.navbar-expand-md .navbar-toggler {display:block;}
.navbar {min-height:0;}
.navbar-dark {background:transparent}
.navbar-header, .navbar-dark {border:none;}

.navbar-dark .navbar-toggler,  .navbar a.cart-contents:before  {'; $typography = of_get_option('logo_typography_mobile'); $colortoggle = $typography['color']; $colorone = hex2rgba($colortoggle, 1); if ($typography) { $css .= ''; if ( $typography['color'] !== '') { $css .= 'border-color:transparent; color:'. $typography['color'].'!important;';} else { $css .= 'border-color:transparent!important; color:#000;';} $css .= '}
.custom-toggler .navbar-toggler-icon {
  background-image: url("data:image/svg+xml;charset=utf8,%3Csvg viewBox=\'0 0 32 32\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cpath stroke=\''.  $colorone .'\' stroke-width=\'2\' stroke-linecap=\'round\' stroke-miterlimit=\'10\' d=\'M4 8h24M4 16h24M4 24h24\'/%3E%3C/svg%3E") !important;}
.navbar-nav {margin-top:10px; margin-left:0px !important;  padding: 20px 40px;}
 ul.navbar-nav li:hover {background: #3d3d3d; padding-left:10px !important}
ul.navbar-nav li a {color:#fff; font-size:18px; margin-left:0px;}
ul.navbar-nav li {padding:5px 0px;}
ul.navbar-nav li ul.dropdown-menu  {margin-left:20px; border:none; padding:5px 0px}
.navbar-nav .dropdown-menu {'; if ( $typography['color'] !== '') { $css .= 'color:'. $typography['color'];} else { $css .= 'color:#000';}  $css .= ';font-size:16px; background:transparent !important}';} $css .= '
.navbar-dark .navbar-toggle .icon-bar:hover {'; if ( of_get_option('menu_text_hover') !== '') { $css .= 'color:'. of_get_option('menu_text_hover');} else { $css .= 'color:#000';}  $css .= '!important;}
.navbar-dark .navbar-toggle:hover,.navbar-dark .navbar-toggle:focus {background:transparent; }

div.head-style {display:none}
.navbar-toggle .icon-bar {display: block;width: 42px;height: 5px;border-radius: 1px;}
#wrapper, #header, #content-main, #main, #branding, div.head-height, div.head-style    {width: 100% !important; height: auto !important;} /*заголовок и тело эластичными*/
#branding {'; $background = of_get_option('header_background_around_mobile'); if ($background) { if ($background['image']) {
$css .= 'background:url('.$background['image']. ') '.$background['repeat']. ' '.$background['position']. ' '.$background['attachment']. ' '.$background['color']. ' !important;';} elseif ($background['color'] == !'') { $css .= 'background:'.$background['color']. ' !important;';} else {$css .= '';}} else {$css .= 'no entry';};  if (of_get_option('menu_border_mobile') == '1'){ $css .= 'border-bottom:1px solid '. of_get_option('menu_dev_color_mobile').'; ';};  if (of_get_option('menu_shadow_border_mobile') == '1') { $css .= ' -webkit-box-shadow: 0px 5px 6px -5px rgba(0, 0, 0, 0.6); -moz-box-shadow:    0px 5px 6px -5px rgba(0, 0, 0, 0.6); box-shadow: 0px 5px 6px -5px rgba(0, 0, 0, 0.6);';} $css .= ' }
#branding{width: 100% !important;}
#access, #access .menu-header, div.menu, .header .navbar-collapse.collapse,#headermenu,  #hd-widget-area {display:none !important}
.logo-mobile {float:left; max-width:80%; padding:15px 0px 10px 15px}
.container > .navbar-header, .container-fluid > .navbar-header, .container > .navbar-collapse, .container-fluid > .navbar-collapse{margin-right:0px !important;margin-left:0px  !important;}
.navbar {margin-bottom:0px;}
.navbar-expand-md .navbar-nav .dropdown-menu {position:relative;background:transparent}
.navbar-expand-md .navbar-nav .dropdown-menu:hover {background:transparent}
}

@media only screen and (max-width: 768px) {
.woocommerce ul.products[class*=columns-] li.product, .woocommerce-page ul.products[class*=columns-] li.product {width:100%}
}


@media only screen and (max-width: 690px) {
	.home-level3 .abinspiration-product-ads a.ads-homepage {margin-bottom:20px; margin-top:0px}
.vhodnoaya5 {display:block}
.entry-between-border, .custom-read-more{width:100%;}
.obrabotka {width:300px; height:150px;}
.woocommerce-tabs.wc-tabs-wrapper {padding:0px; border: 1px solid #eaeaea !important}
.woocommerce #tab-description > h2, .woocommerce #tab-additional_information > h2, .woocommerce #reviews #comments h2, .woocommerce-Tabs-panel h3#reply-title {display:none}
.leavecomment {float:none;}
.woocommerce-Tabs-panel.woocommerce-Tabs-panel--description.panel.entry-content .contet-tab {border:none !important; padding:0px !important}
.woocommerce-Tabs-panel  {padding:20px !important; margin-bottom:0px !important}
.woocommerce table.shop_attributes {margin-bottom:0px !important}
.woocommerce div.product .woocommerce-tabs ul.tabs li {border:none !important;border-bottom:1px solid #eaeaea !important}
.woocommerce div.product .woocommerce-tabs ul.tabs{padding-left:0}
.woocommerce div.product .woocommerce-tabs ul.tabs li{margin:0 !important}
.woocommerce button.button.alt {padding:16px 20px}
.woocommerce #reviews #comments ol.commentlist li img.avatar {    margin:0px; margin-bottom: 10px;float: left; position:relative}
 .woocommerce #respond input#submit {width:100%; height:40px}
.woocommerce #reviews #comments ol.commentlist li {padding:0px}
.woocommerce #reviews #comments ol.commentlist .thread-even, .woocommerce #reviews #comments ol.commentlist li.comment:last-child {border:none !important}
.woocommerce .star-rating {margin-left:20px;}
.woocommerce #reviews #comments ol.commentlist li .comment-text {margin:0px; padding:0px}
.home-level2 .shop_cat_desc {display:none}
#homepage {background:none !important;width:100% !important}
#homepage div {z-index:0 !important}
.videoform-mobile {display:none}
figure {width:100% !important}
.date-comments, .logo-head {display:none;}

#content img, #content .attachment img, img.thumb-size {max-width: 100% !important; height: auto !important;} /*делаем изображения эластичными*/
#wrapper {margin:0px;}
#content-main {padding:0px;} #header {'; if (of_get_option('menu_shadow_border_mobile') == '1') { $css .= 'margin-bottom:10px;';} $css .= '}

#wrapper, #header, #content-main, #main, #branding, div.head-height, div.head-style,.home-level2 .woocommerce.columns-3 ul.products li.product-category.product.first, .home-level2 .woocommerce.columns-3 ul.products li.product-category.product.last, .home-level2 .woocommerce.columns-3 ul.products li.product-category.product    {width: 100% !important; height: auto !important;} /*заголовок и тело эластичными*/
#branding {'; $background = of_get_option('header_background_around_mobile'); if ($background) { if ($background['image']) {
$css .= 'background:url('.$background['image']. ') '.$background['repeat']. ' '.$background['position']. ' '.$background['attachment']. ' '.$background['color']. ' !important;';} elseif ($background['color'] == !'') { $css .= 'background:'.$background['color']. ' !important;';} else {$css .= '';}} else {$css .= 'no entry';};  if (of_get_option('menu_border_mobile') == '1'){ $css .= 'border-bottom:1px solid '. of_get_option('menu_dev_color_mobile').'; ';};  if (of_get_option('menu_shadow_border_mobile') == '1') { $css .= ' -webkit-box-shadow: 0px 5px 6px -5px rgba(0, 0, 0, 0.6); -moz-box-shadow:    0px 5px 6px -5px rgba(0, 0, 0, 0.6); box-shadow: 0px 5px 6px -5px rgba(0, 0, 0, 0.6);';} $css .= ' }
#branding, #content, #footer, .footer, .footer-mid, #footermenu, .copyright, .footer-widget-box, #footer-widget-area{width: 100% !important;}
#access, #access .menu-header, div.menu, .header .navbar-collapse.collapse,#headermenu,  #hd-widget-area, .sub-form-top .image, .sub-form-footer .image, .footer-widget-box, .commentsvk, .commentsfb {display:none !important}
'; if (of_get_option('widget_mobile_show') == '1') { $css .= '#primary, .widget-testimonial {width:100%} .widget-container {margin-left:0px}'; } else { $css .= '#primary {display:none}';} $css .= '#main{padding:0px !important; }.container {padding-right:0px !important; padding-left:0px !important}
.sub-form-top {height:100%}
.sub-form-top input.ab-form-button-top, .sub-form-top .sp-button.ab-form-button-top {padding:15px;}
#container {width: 100%; float: left;} /*адаптивная ширина для контента и позиционируем по левому краю*/
#wrapper #content .entry-box, #content article.entry-box {padding:25px; border:none !important; }
.author-avatar {float:none !important ; text-align:center  !important; margin:0px !important}
.author-description {text-align:center; float:none; width:100%}
li.widget-container, div.widget-container, .single-course_unit #primary.widget-area ul li {border:none !important; padding:25px}
ul.tabbernav li a {width: 100%;max-width: 100%; display: block;height: 40px;}ul.tabbernav li {margin-bottom: 10px;list-style: none;display: block;width: 100% !important;height: 40px;}

.entry-between-border {border-top:1px solid rgba(0,0,0,.1)}
.testimonials-between-border, .entry-between-border {
    padding: 0;
    border-bottom: none !important;
}
.subs-form, .buttonsinvite, .subs-image {float:left; width:99%}
.headerformpost {padding:0 10px;}c.logo-mobile {float:left; max-width:80%; padding:15px 0px 10px 15px}
.container > .navbar-header, .container-fluid > .navbar-header, .container > .navbar-collapse, .container-fluid > .navbar-collapse{margin-right:0px !important;margin-left:0px  !important;}
.navbar {margin-bottom:0px;}
.menu-footer {display:none}
#searchsubmit, #searchsubmit:visited {font-size: 18px !important;}
#site-title a {'; $typography = of_get_option('logo_typography_mobile'); if ($typography) { $css .= 'text-align:center; ';if ( $typography['color'] !== '') { $css .= 'color:'. $typography['color'];} else { $css .= 'color:#000';}  $css .= ';font-size: '. $typography['size'] .' !important; font-family: '.  $typography['face'].'; font-weight: '. $typography['style'] .' !important; '; } $css .= '} #site-title{ text-transform:'. of_get_option('logo_transform_mobile') .' !important}
#site-title a:hover {'; $typography = of_get_option('logo_typography_mobile'); if ($typography) { $css .= 'text-align:center; ';if ( $typography['color'] !== '') { $css .= 'color:'. $typography['color'];} else { $css .= 'color:#000';}  $css .= ';font: '. $typography['style'] .' '. $typography['size'] .' '.  $typography['face'].' !important; line-height:1.1 !important'; } $css .= '}
#site-description {'; $typography = of_get_option('desc_typography_mobile'); if ($typography) { $css .= 'text-align:left; ';if ( $typography['color'] !== '') { $css .= 'color:'. $typography['color'];} else { $css .= 'color:#000';}  $css .= ';font: '. $typography['style'] .' '. $typography['size'] .' '.  $typography['face'].' !important;'; } $css .= ' text-transform:'. of_get_option('desc_transform_mobile') .' !important}
#site-title, #site-description {margin-bottom:10px;}
#site-title, #site-description {margin:0px 0px;}
#site-title {margin-bottom:10px;}
.related_image, .related_content a, #related_posts img {width:31.7% !important}
#related_posts li {margin:0px !important; width:31.7%;}
.related_content {height: 50px;overflow: hidden;padding: 5px;}
#contact-page ol.forms label {float:none}
#contact-page ol.forms input.txt, #contact-page ol.forms textarea, #testimonial-form input[type="text"], #testimonial-form textarea, .testimonials-between-border, .testimonial-container, #testimonials-float {width:100%}
#contact-page ol.forms li.inline input, #contact-page ol.forms li.buttons .submit {margin-left:0px;}
.widget-testimonial {padding:20px 10px !important; float:none; margin:0px}
.single-catalog img.thumb-size {margin-bottom:20px;}
h2.entry-title a:link, h2.entry-title a:visited, #content h1, #content h2, #content h3, #content h4, #content h5, #content h6,.heading-title2, .heading-title1, .heading-title3, .heading-title4, .heading-title5, .heading-title6, div.secondpost h2.entry-title a:link,.ab-header {line-height:1.1 !important;}
h2.entry-title a:link, h2.entry-title a:visited, .entry-title, h1.entry-title {font-size:24px !important}
ul.tabbernav
{clear:both;padding-top:10px;;padding-bottom:10px}
.comments-title {display:none}
h1, h1.entry-title1,  h1.entry-title2,  h1.entry-title3,  h1.entry-title4,  h1.entry-title5,  h1.entry-title6, .woocommerce h1 {font-size:30px} 
h2, h2.entry-title1, h2.entry-title2,  h2.entry-title3,  h2.entry-title4,  h2.entry-title5,  h2.entry-title6, .woocommerce h2 {font-size:26px} 
h3, h3.entry-title1, h3.entry-title2,  h3.entry-title3,  h3.entry-title4,  h3.entry-title5,  h3.entry-title6,  .woocommerce h3 {font-size:22px} 
h4, h4.entry-title1, h4.entry-title2,  h4.entry-title3,  h4.entry-title4,  h4.entry-title5,  h4.entry-title6, .woocommerce h4 {font-size:20px} 
h5, h5.entry-title1, h5.entry-title2,  h5.entry-title3,  h5.entry-title4,  h5.entry-title5,  h5.entry-title6, .woocommerce h5 {font-size:18px} 
h6, h6.entry-title1, h6.entry-title2,  h6.entry-title3,  h6.entry-title4,  h6.entry-title5,  h6.entry-title6, .woocommerce h6 {font-size:16px}
.heading-title1 p, .heading-title2 p, .heading-title3 p, .heading-title4 p, .heading-title5 p, .heading-title6 p
{margin-bottom:0px!important; }
.sub-form-top {'; if ($sub_form['ab_gradient'] == '0') { if ( $sub_form['bg_color_sec'] !== '') { $css .= 'background-color:'. $sub_form['bg_color_sec'].';';} else { $css .= 'background-color:transparent;';} $css .= '
background-image: -moz-linear-gradient(top,  '; if ( $sub_form['bg_color_sec'] !== '') { $css .=  $sub_form['bg_color_sec'];} else { $css .= 'transparent';} $css .= '0%, '; if ( $sub_form['bg_color'] !== '') { $css .=  $sub_form['bg_color'];} else { $css .= 'transparent';} $css .= ' 100%);
background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0%,'; if ( $sub_form['bg_color_sec'] !== '') { $css .=  $sub_form['bg_color_sec'];} else { $css .= 'transparent';} $css .= '), color-stop(100%,'; if ( $sub_form['bg_color'] !== '') { $css .=  $sub_form['bg_color'];} else { $css .= 'transparent';} $css .= '));   	     
background-image: -webkit-linear-gradient(top,  '; if ( $sub_form['bg_color_sec'] !== '') { $css .=  $sub_form['bg_color_sec'];} else { $css .= 'transparent';} $css .= ' 0%,'; if ( $sub_form['bg_color'] !== '') { $css .=  $sub_form['bg_color'];} else { $css .= 'transparent';} $css .= ' 100%); 
background-image: -o-linear-gradient(top,  '; if ( $sub_form['bg_color_sec'] !== '') { $css .=  $sub_form['bg_color_sec'];} else { $css .= 'transparent';} $css .= ' 0%,'; if ( $sub_form['bg_color'] !== '') { $css .=  $sub_form['bg_color'];} else { $css .= 'transparent';} $css .= ' 100%); 
background-image: -ms-linear-gradient(top,  '; if ( $sub_form['bg_color_sec'] !== '') { $css .=  $sub_form['bg_color_sec'];} else { $css .= 'transparent';} $css .= ' 0%,'; if ( $sub_form['bg_color'] !== '') { $css .=  $sub_form['bg_color'];} else { $css .= 'transparent';} $css .= ' 100%); 
background-image: linear-gradient(to bottom,  '; if ( $sub_form['bg_color_sec'] !== '') { $css .=  $sub_form['bg_color_sec'];} else { $css .= 'transparent';} $css .= ' 0%,'; if ( $sub_form['bg_color'] !== '') { $css .=  $sub_form['bg_color'];} else { $css .= 'transparent';} $css .= ' 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='; if ( $sub_form['bg_color_sec'] !== '') { $css .=  $sub_form['bg_color_sec'];} else { $css .= 'transparent';} $css .= ', endColorstr='. $sub_form['bg_color'].',GradientType=0 ); ';} if ($sub_form['ab_gradient'] == '1') { $css .= '
'; if ( $sub_form['bg_color'] !== '') { $css .= 'background-color:'. $sub_form['bg_color'].';';} else { $css .= 'background-color:transparent;';} $css .= '	
background-image: radial-gradient(circle, '; if ( $sub_form['bg_color'] !== '') { $css .=  $sub_form['bg_color'];} else { $css .= 'transparent';} $css .= ', '; if ( $sub_form['bg_color_sec'] !== '') { $css .=  $sub_form['bg_color_sec'];} else { $css .= 'transparent';} $css .= '); 
background-image: -o-radial-gradient(circle, '; if ( $sub_form['bg_color'] !== '') { $css .=  $sub_form['bg_color'];} else { $css .= 'transparent';} $css .= ', '; if ( $sub_form['bg_color_sec'] !== '') { $css .=  $sub_form['bg_color_sec'];} else { $css .= 'transparent';} $css .= ');
background-image: -ms-radial-gradient(circle, '; if ( $sub_form['bg_color'] !== '') { $css .=  $sub_form['bg_color'];} else { $css .= 'transparent';} $css .= ', '; if ( $sub_form['bg_color_sec'] !== '') { $css .=  $sub_form['bg_color_sec'];} else { $css .= 'transparent';} $css .= ');
background-image: -moz-radial-gradient(circle, '; if ( $sub_form['bg_color'] !== '') { $css .=  $sub_form['bg_color'];} else { $css .= 'transparent';} $css .= ', '; if ( $sub_form['bg_color_sec'] !== '') { $css .=  $sub_form['bg_color_sec'];} else { $css .= 'transparent';} $css .= ');
background-image: -webkit-radial-gradient(circle, '; if ( $sub_form['bg_color'] !== '') { $css .=  $sub_form['bg_color'];} else { $css .= 'transparent';} $css .= ', '; if ( $sub_form['bg_color_sec'] !== '') { $css .=  $sub_form['bg_color_sec'];} else { $css .= 'transparent';} $css .= ');
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='; if ( $sub_form['bg_color'] !== '') { $css .=  $sub_form['bg_color'];} else { $css .= 'transparent';} $css .= ', endColorstr='; if ( $sub_form['bg_color_sec'] !== '') { $css .=  $sub_form['bg_color_sec'];} else { $css .= 'transparent';} $css .= ',GradientType=0 ); ' ;}
if ($sub_form['ab_gradient'] == '2') { $css .= '
'; if ( $sub_form['bg_color'] !== '') { $css .= 'background-color:'. $sub_form['bg_color'].';';} else { $css .= 'background-color:transparent;';} $css .= '	
background-image: radial-gradient(ellipse at bottom, '; if ( $sub_form['bg_color'] !== '') { $css .=  $sub_form['bg_color'];} else { $css .= 'transparent';} $css .= ', '; if ( $sub_form['bg_color_sec'] !== '') { $css .=  $sub_form['bg_color_sec'];} else { $css .= 'transparent';} $css .= ');
background-image: -o-radial-gradient(center bottom, ellipse cover, '; if ( $sub_form['bg_color'] !== '') { $css .=  $sub_form['bg_color'];} else { $css .= 'transparent';} $css .= ', '; if ( $sub_form['bg_color_sec'] !== '') { $css .=  $sub_form['bg_color_sec'];} else { $css .= 'transparent';} $css .= ');
background-image: -ms-radial-gradient(center bottom, ellipse cover, '; if ( $sub_form['bg_color'] !== '') { $css .=  $sub_form['bg_color'];} else { $css .= 'transparent';} $css .= ', '; if ( $sub_form['bg_color_sec'] !== '') { $css .=  $sub_form['bg_color_sec'];} else { $css .= 'transparent';} $css .= ');
background-image: -moz-radial-gradient(center bottom, ellipse cover, '; if ( $sub_form['bg_color'] !== '') { $css .=  $sub_form['bg_color'];} else { $css .= 'transparent';} $css .= ', '; if ( $sub_form['bg_color_sec'] !== '') { $css .=  $sub_form['bg_color_sec'];} else { $css .= 'transparent';} $css .= ');
background-image: -webkit-radial-gradient(center bottom, ellipse cover, '; if ( $sub_form['bg_color'] !== '') { $css .=  $sub_form['bg_color'];} else { $css .= 'transparent';} $css .= ', '; if ( $sub_form['bg_color_sec'] !== '') { $css .=  $sub_form['bg_color_sec'];} else { $css .= 'transparent';} $css .= ');
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='; if ( $sub_form['bg_color'] !== '') { $css .=  $sub_form['bg_color'];} else { $css .= 'transparent';} $css .= ', endColorstr='; if ( $sub_form['bg_color_sec'] !== '') { $css .=  $sub_form['bg_color_sec'];} else { $css .= 'transparent';} $css .= ',GradientType=0 ); ' ;} 
$css .= '}
.sub-form-footer {'; if ($sub_form_footer['ab_gradient'] == '0') { if ( $sub_form_footer['bg_color_sec'] !== '') { $css .= 'background-color:'. $sub_form_footer['bg_color_sec'].';';} else { $css .= 'background-color:transparent;';} $css .= '
background-image: -moz-linear-gradient(top,  '; if ( $sub_form_footer['bg_color_sec'] !== '') { $css .=  $sub_form_footer['bg_color_sec'];} else { $css .= 'transparent';} $css .= '0%, '; if ( $sub_form_footer['bg_color'] !== '') { $css .=  $sub_form_footer['bg_color'];} else { $css .= 'transparent';} $css .= ' 100%);
background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0%,'; if ( $sub_form_footer['bg_color_sec'] !== '') { $css .=  $sub_form_footer['bg_color_sec'];} else { $css .= 'transparent';} $css .= '), color-stop(100%,'; if ( $sub_form_footer['bg_color'] !== '') { $css .=  $sub_form_footer['bg_color'];} else { $css .= 'transparent';} $css .= '));   	     
background-image: -webkit-linear-gradient(top,  '; if ( $sub_form_footer['bg_color_sec'] !== '') { $css .=  $sub_form_footer['bg_color_sec'];} else { $css .= 'transparent';} $css .= ' 0%,'; if ( $sub_form_footer['bg_color'] !== '') { $css .=  $sub_form_footer['bg_color'];} else { $css .= 'transparent';} $css .= ' 100%); 
background-image: -o-linear-gradient(top,  '; if ( $sub_form_footer['bg_color_sec'] !== '') { $css .=  $sub_form_footer['bg_color_sec'];} else { $css .= 'transparent';} $css .= ' 0%,'; if ( $sub_form_footer['bg_color'] !== '') { $css .=  $sub_form_footer['bg_color'];} else { $css .= 'transparent';} $css .= ' 100%); 
background-image: -ms-linear-gradient(top,  '; if ( $sub_form_footer['bg_color_sec'] !== '') { $css .=  $sub_form_footer['bg_color_sec'];} else { $css .= 'transparent';} $css .= ' 0%,'; if ( $sub_form_footer['bg_color'] !== '') { $css .=  $sub_form_footer['bg_color'];} else { $css .= 'transparent';} $css .= ' 100%); 
background-image: linear-gradient(to bottom,  '; if ( $sub_form_footer['bg_color_sec'] !== '') { $css .=  $sub_form_footer['bg_color_sec'];} else { $css .= 'transparent';} $css .= ' 0%,'; if ( $sub_form_footer['bg_color'] !== '') { $css .=  $sub_form_footer['bg_color'];} else { $css .= 'transparent';} $css .= ' 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='; if ( $sub_form_footer['bg_color_sec'] !== '') { $css .=  $sub_form_footer['bg_color_sec'];} else { $css .= 'transparent';} $css .= ', endColorstr='. $sub_form_footer['bg_color'].',GradientType=0 ); ';} if ($sub_form_footer['ab_gradient'] == '1') { $css .= '
'; if ( $sub_form_footer['bg_color'] !== '') { $css .= 'background-color:'. $sub_form_footer['bg_color'].';';} else { $css .= 'background-color:transparent;';} $css .= '	
background-image: radial-gradient(circle, '; if ( $sub_form_footer['bg_color'] !== '') { $css .=  $sub_form_footer['bg_color'];} else { $css .= 'transparent';} $css .= ', '; if ( $sub_form_footer['bg_color_sec'] !== '') { $css .=  $sub_form_footer['bg_color_sec'];} else { $css .= 'transparent';} $css .= '); 
background-image: -o-radial-gradient(circle, '; if ( $sub_form_footer['bg_color'] !== '') { $css .=  $sub_form_footer['bg_color'];} else { $css .= 'transparent';} $css .= ', '; if ( $sub_form_footer['bg_color_sec'] !== '') { $css .=  $sub_form_footer['bg_color_sec'];} else { $css .= 'transparent';} $css .= ');
background-image: -ms-radial-gradient(circle, '; if ( $sub_form_footer['bg_color'] !== '') { $css .=  $sub_form_footer['bg_color'];} else { $css .= 'transparent';} $css .= ', '; if ( $sub_form_footer['bg_color_sec'] !== '') { $css .=  $sub_form_footer['bg_color_sec'];} else { $css .= 'transparent';} $css .= ');
background-image: -moz-radial-gradient(circle, '; if ( $sub_form_footer['bg_color'] !== '') { $css .=  $sub_form_footer['bg_color'];} else { $css .= 'transparent';} $css .= ', '; if ( $sub_form_footer['bg_color_sec'] !== '') { $css .=  $sub_form_footer['bg_color_sec'];} else { $css .= 'transparent';} $css .= ');
background-image: -webkit-radial-gradient(circle, '; if ( $sub_form_footer['bg_color'] !== '') { $css .=  $sub_form_footer['bg_color'];} else { $css .= 'transparent';} $css .= ', '; if ( $sub_form_footer['bg_color_sec'] !== '') { $css .=  $sub_form_footer['bg_color_sec'];} else { $css .= 'transparent';} $css .= ');
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='; if ( $sub_form_footer['bg_color'] !== '') { $css .=  $sub_form_footer['bg_color'];} else { $css .= 'transparent';} $css .= ', endColorstr='; if ( $sub_form_footer['bg_color_sec'] !== '') { $css .=  $sub_form_footer['bg_color_sec'];} else { $css .= 'transparent';} $css .= ',GradientType=0 ); ' ;}
if ($sub_form_footer['ab_gradient'] == '2') { $css .= '
'; if ( $sub_form_footer['bg_color'] !== '') { $css .= 'background-color:'. $sub_form_footer['bg_color'].';';} else { $css .= 'background-color:transparent;';} $css .= '	
background-image: radial-gradient(ellipse at bottom, '; if ( $sub_form_footer['bg_color'] !== '') { $css .=  $sub_form_footer['bg_color'];} else { $css .= 'transparent';} $css .= ', '; if ( $sub_form_footer['bg_color_sec'] !== '') { $css .=  $sub_form_footer['bg_color_sec'];} else { $css .= 'transparent';} $css .= ');
background-image: -o-radial-gradient(center bottom, ellipse cover, '; if ( $sub_form_footer['bg_color'] !== '') { $css .=  $sub_form_footer['bg_color'];} else { $css .= 'transparent';} $css .= ', '; if ( $sub_form_footer['bg_color_sec'] !== '') { $css .=  $sub_form_footer['bg_color_sec'];} else { $css .= 'transparent';} $css .= ');
background-image: -ms-radial-gradient(center bottom, ellipse cover, '; if ( $sub_form_footer['bg_color'] !== '') { $css .=  $sub_form_footer['bg_color'];} else { $css .= 'transparent';} $css .= ', '; if ( $sub_form_footer['bg_color_sec'] !== '') { $css .=  $sub_form_footer['bg_color_sec'];} else { $css .= 'transparent';} $css .= ');
background-image: -moz-radial-gradient(center bottom, ellipse cover, '; if ( $sub_form_footer['bg_color'] !== '') { $css .=  $sub_form_footer['bg_color'];} else { $css .= 'transparent';} $css .= ', '; if ( $sub_form_footer['bg_color_sec'] !== '') { $css .=  $sub_form_footer['bg_color_sec'];} else { $css .= 'transparent';} $css .= ');
background-image: -webkit-radial-gradient(center bottom, ellipse cover, '; if ( $sub_form_footer['bg_color'] !== '') { $css .=  $sub_form_footer['bg_color'];} else { $css .= 'transparent';} $css .= ', '; if ( $sub_form_footer['bg_color_sec'] !== '') { $css .=  $sub_form_footer['bg_color_sec'];} else { $css .= 'transparent';} $css .= ');
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='; if ( $sub_form_footer['bg_color'] !== '') { $css .=  $sub_form_footer['bg_color'];} else { $css .= 'transparent';} $css .= ', endColorstr='; if ( $sub_form_footer['bg_color_sec'] !== '') { $css .=  $sub_form_footer['bg_color_sec'];} else { $css .= 'transparent';} $css .= ',GradientType=0 ); ' ;} 
$css .= '}
.sub-form-top, .sub-form-footer, .sub-form-top .bg, .sub-form-footer .bg, .sub-form-top .pattern, .sub-form-footer .pattern {width:100%;border-radius:0px;-moz-border-radius: 0px;-webkit-border-radius: 0px;}
.sub-form-top .input-form, .sub-form-footer .input-form, #slides .cycle-pager {width:100% !important;}
.sub-form-top .bg,.sub-form-footer .bg{border-radius:0px;-moz-border-radius: 0px;-webkit-border-radius: 0px;}
.sub-form-top .form-inside,.sub-form-footer .form-inside {width:100%;padding:30px;}
.sub-form-top .bg, .sub-form-top .form-inside,  .sub-form-footer .bg, .sub-form-footer .form-inside,.sub-form-footer,.sub-form-top {height: auto !important}
 .custom_read_more {width:90%;clear: both;float:right;}
.sub-form-top .pattern, .sub-form-footer .pattern  {height: 100% !important; background:url('. $sub_form['custom_bg'].') '. $sub_form['repeat_bg'].' '. $sub_form['repeat_position'].'; background-size:cover;}
.sub-form-top .ab-bg-custom, .sub-form-footer .ab-bg-custom {position: absolute !important;left: 0px !important;top: 0px !important;width: 100% !important;margin-bottom: 20px !important;height: 100% !important;margin-left: 0px !important;margin-top: 0px !important;}
.headerimagemobile {display:none}
.header-text-mobile {display:block  !important}
.sub-form-top .button-align, .sub-form-footer .button-align {float:none}
.sub-form-top input.ab-form-button-top, .ab-form-button-top-admin, .sub-form-footer input.ab-form-button-top, .ab-form-button-top-admin, .sub-form-top .sp-button.ab-form-button-top, .sub-form-footer .sp-button.ab-form-button-top {white-space: normal; width:100% !important;font-size: 6vw !important;height:100% !important;}
.sub-form-top .header-form, .sub-form-top .form, .sub-form-top .ab-header, .sub-form-top .ab-header p,  .sub-form-top .garantia, .sub-form-top .garantia p, .sub-form-top div.list ul, .sub-form-top .description, .sub-form-top .description p, .sub-form-top .header-form p,.sub-form-footer .header-form, .sub-form-footer .form, .sub-form-footer .ab-header, .sub-form-footer .ab-header p,  .sub-form-footer .garantia, .sub-form-footer .garantia p, .sub-form-footer div.list ul, .sub-form-footer .description, .sub-form-footer .description p, .sub-form-footer .header-form p, .sub-form-footer .video {position:relative !important; width: 100% !important; left:0px !important; text-align:center !important;height:auto !important;top:auto !important; padding-top: 10px !important; clear:both !important}
.sub-form-top div.list ul, .sub-form-footer div.list ul {text-align:left !important;}
.sub-form-top .video, .sub-form-footer .video {position: relative;padding-bottom: 48%; /* 16:9 */padding-top: 15px;height: 100%;width: 100% !important; top:0px;margin-top:20px;left:0px;}
.sub-form-top .video iframe, .sub-form-footer .video iframe {width:100%}
.sub-form-top .video-size,.sub-form-footer .video-size  {position: absolute;top: 0;left: 0;width: 100%!important;height: 100%!important;}
.head-height {float:none !important;text-align:center;padding:20px;}
#sub-form-top-admin, #slides, #slides .cycle-slideshow, #slides .caption_bg, #slides div.cycle-caption, #slides .caption_bg1, #slides .opaque_bg
{width:100% !important}
.sub-form-top .garantia, .sub-form-footer .garantia {background:none; text-align:left !important; padding-left:0px}
#wrapper .vhodnoaya1, #wrapper .vhodnoaya2, #wrapper .vhodnoaya3, #wrapper .vhodnoaya4, #wrapper .vhodnoaya5, #wrapper .vhodnoaya6, #wrapper .block_home1, #wrapper .block_home2, #wrapper .block_home3, #wrapper .block_home4, #wrapper .block_home5, #wrapper .block_home6, #wrapper .block_home7, #wrapper .vhodnoaya1 ul, #wrapper .vhodnoaya2 ul, #wrapper .vhodnoaya3 ul, #wrapper .vhodnoaya4 ul, #wrapper .vhodnoaya5 ul, #wrapper .vhodnoaya6 ul, #wrapper .vhodnoaya7 ul
{width:100% !important; padding:10px 0 !important; margin:0 !important}
.firstpost,   .secondpost {width:100% !important; float:none;margin:0 !important;  padding:20px 0px!important; }
.heading-title1 img, .heading-title2 img, .heading-title3 img, .heading-title4 img, .heading-title5 img, .heading-title6 img
{width:100%; height:100%}
.homepage-image5 {display: block;padding-top: 63.3%;width:100% !important; margin:0 !important;height:0 !important;background-size: 100%;}
div.readmore1, div.readmore2, div.readmore3, div.readmore4, div.readmore5, div.readmore6 {text-align:center;width:auto !important;font-size: 20px;float:right !important;clear: both;}
div.readmore4 {margin-top: 60px;margin-right:0px !important}
div.readmorecustom {width:auto !important;text-align:center;float:right;margin-right: 20px;padding: 7px 20px !important;}
.secondpost .entry-title {padding-top:20px !important;clear:both}
div.post-font1 div,div.post-font2 div,div.post-font3 div,div.post-font4 div,div.post-font5 div,div.post-font6 div {width:100% !important;}
div.post-font4 div.otzyv-photo {float:left !important; width:90px !important; margin-right:10px !important;}div.post-font4 div.otzyvy-text {margin-top:10px !important;}
.uroven, .heading-title1, .heading-title2, .heading-title3, .heading-title4, .heading-title5, .heading-title6, div.heading-title1 p, div.heading-title2 p, div.heading-title3 p, div.heading-title4 p, .div.heading-title5 p, div.post-font1 p, div.post-font2 p, div.post-font3 p
{width:90% !important;}
.heading-title4
{margin-bottom:0px; margin: 0 auto;} div.heading-title4 p {width:100% !important}
.cbp-l-grid-slider-testimonials-body
{padding:0px}
#content .gallery .gallery-item {max-width: 46% !important; height: auto !important;width: 46% !important;} 
.homepage-image1, .homepage-image2, .homepage-image3 { '; if ( $homepage['hp_image_otzyvy3'] == '50%' ) { $css .= 'float: none; margin-bottom:20px;' ;} else { $css .= 'width: 100%;' ;} $css .= 'max-height: 430px;background-size: contain;background-repeat: no-repeat;background-position: center center;}
.firstpost div.homepage-image5 {margin-bottom:10px !important;}
.cbp-nav-pagination {width:100%; text-align:left} ';  
if ($sub_form['ab_head_form_insert_mobile'] == 0) { $css .= '.sub-form-top .ab-header {display:none}' ;}
if ($sub_form['ab_desc_form_insert_mobile'] == 0) { $css .= '.sub-form-top .description {display:none}' ;}
if ($sub_form['ab_list_form_insert_mobile'] == 0) { $css .= '.sub-form-top .list {display:none}' ;}
if ($sub_form['ab_form_header_form_insert_mobile'] == 0) { $css .= '.sub-form-top .header-form {display:none}' ;}
if ($sub_form['ab_video_form_insert_mobile'] == 0) { $css .= '.sub-form-top .video {display:none}' ;}
if ($sub_form['ab_form_form_insert_mobile'] == 0) { $css .= '.sub-form-top .form {display:none}' ;}
if ($sub_form['ab_garantia_form_insert_mobile'] == 0) { $css .= '.sub-form-top .garantia {display:none}' ;}
if ($sub_form['ab_pattern_form_insert_mobile'] == 0) { $css .= '.sub-form-top .pattern {display:none}' ;}
if ($sub_form['ab_bgcustom_form_insert_mobile'] == 0) { $css .= '.sub-form-top .ab-bg-custom {display:none}' ;}



if ($sub_form_footer['ab_head_form_insert_mobile'] == 0) { $css .= '.sub-form-footer .ab-header {display:none}' ;}
if ($sub_form_footer['ab_desc_form_insert_mobile'] == 0) { $css .= '.sub-form-footer .description {display:none}' ;}
if ($sub_form_footer['ab_list_form_insert_mobile'] == 0) { $css .= '.sub-form-footer .list {display:none}' ;}
if ($sub_form_footer['ab_form_header_form_insert_mobile'] == 0) { $css .= '.sub-form-footer .header-form {display:none}' ;}
if ($sub_form_footer['ab_video_form_insert_mobile'] == 0) { $css .= '.sub-form-footer .video {display:none}' ;}
if ($sub_form_footer['ab_form_form_insert_mobile'] == 0) { $css .= '.sub-form-footer .form {display:none}' ;}
if ($sub_form_footer['ab_garantia_form_insert_mobile'] == 0) { $css .= '.sub-form-footer .garantia {display:none}' ;}
if ($sub_form_footer['ab_pattern_form_insert_mobile'] == 0) { $css .= '.sub-form-footer .pattern {display:none}' ;}
if ($sub_form_footer['ab_bgcustom_form_insert_mobile'] == 0) { $css .= '.sub-form-footer .ab-bg-custom {display:none}' ;}





$css .= ' .video-catalog {width:100% !important}
.home-level1,.home-level2,.home-level3,.home-level4,.home-level5, .homepageitemstabs, .post-homepage-shop, li.product-category, #content .woocommerce div.product .woocommerce-tabs ul.tabs li.active a, #tabs.homepageitemstabs ul.homepageitemstabsul li.homepageitemstabsli.ui-tabs-active a , #tabs.homepageitemstabs ul.homepageitemstabsul li.homepageitemstabsli a:hover, #tabs.homepageitemstabs ul.homepageitemstabsul li.homepageitemstabsli a:after, .woocommerce div.product .woocommerce-tabs ul.tabs li  {width:100% !important}
.post-homepage-shop {margin-bottom:10px;}
.entry-box.ab-inspiration-woocommerce-entry {padding:20px; border:none; border: none !important}
 .woocommerce div.product .woocommerce-tabs ul.tabs li a  {font-size:1.2em}
table.shop_table tr.cart_item td, #add_payment_method .cart-collaterals .cart_totals table td, #add_payment_method .cart-collaterals .cart_totals table th, .woocommerce-cart .cart-collaterals .cart_totals table td, .woocommerce-cart .cart-collaterals .cart_totals table th, .woocommerce-checkout .cart-collaterals .cart_totals table td, .woocommerce-checkout .cart-collaterals .cart_totals table th {padding:20px !important}
.woocommerce #content table.cart td.actions .coupon .button.alt, .woocommerce #content table.cart td.actions .coupon .input-text+.button, .woocommerce table.cart td.actions .coupon .button.alt, .woocommerce table.cart td.actions .coupon .input-text+.button, .woocommerce-page #content table.cart td.actions .coupon .button.alt, .woocommerce-page #content table.cart td.actions .coupon .input-text+.button, .woocommerce-page table.cart td.actions .coupon .button.alt, .woocommerce-page table.cart td.actions .coupon .input-text+.button{font-size: .6em !important;padding-left: 0px;padding-right: 0px;}
#customer_details {width:100%}.one-column .entry-box {padding-left:20px; padding-right:20px}
#order_review_heading, #order_review {width:100%}
#tabs.homepageitemstabs {clear:both; padding-top:30px;}
#tabs.homepageitemstabs ul.homepageitemstabsul {text-align:left;  width:100%; display:inline}
#tabs.homepageitemstabs ul.homepageitemstabsul li.homepageitemstabsli {width:47%;margin-right:5px;float:left; font-size:16px; height:45px; padding:0px}
#tabs.homepageitemstabs ul.homepageitemstabsul li.homepageitemstabsli a:active:after {content: " \2022";font-size: 1.3em;line-height: 1;opacity: 0.5;vertical-align: middle;margin-left: 0.5em; margin-right: 0.5em;  }
#tabs.homepageitemstabs ul.homepageitemstabsul li.homepageitemstabsli:last-child a:after {content: none;}
#tabs.homepageitemstabs ul.homepageitemstabsul li.homepageitemstabsli a {text-decoration:none !important; font-weight:normal; color:#333; padding:10px 5px; display:block;}
.woocommerce ul.products li.product, .woocommerce-page ul.products li.product, .woocommerce-page[class*=columns-] ul.products li.product, .woocommerce[class*=columns-] ul.products li.product, .related.products ul.products li, .up-sells.upsells.products ul.products li {margin-right:10px !important;}
.woocommerce ul.products li.product:nth-child(2n), .woocommerce-page ul.products li.product:nth-child(2n) {margin-right: 0px  !important;}
.woocommerce div.related.products  ul.products li.product, .woocommerce div.up-sells.upsells.products ul.products li.product  {margin-bottom:20px;}
.product-tabs {width:100%;}
.woocommerce ul.products li.product:nth-child(2n), .woocommerce-page ul.products li.product:nth-child(2n), .woocommerce-page[class*=columns-] ul.products li.product:nth-child(2n), .woocommerce[class*=columns-] ul.products li.product:nth-child(2n){float:left}
.abinspiration-product-ads-img, .abinspiration-product-ads-text {width:100%; display:block; padding-left:0px}.abinspiration-product-ads-text {padding:0 20px;}
.abinspiration-product-ads-img {margin-bottom:30px;}
.home-level6 .abinspiration-product-form {width:100%; display:block}
.abinspiration-product-form-img {  width:100%;display: block;}
.home-level6 .abinspiration-product-form input.show-form-button, .home-level6 .abinspiration-product-form div.show-form-button, .home-level6 .abinspiration-product-form input.shop-form-input, .home-level6 .abinspiration-product-form button.show-form-button, .home-level6 .button-align, .home-level6  .button-align .sp-form .sp-button, .home-level6  .button-align .sp-form .sp-form-control {width:100%; margin-left:0px; margin-top:5px;}
.abinspiration-product-form-input{padding-left:0px;display: block;}
.abinspiration-testimonials-section {width:100%} 
.abinspiration-product-form-input {margin-top:20px;}
#sub-form-top-admin {display:none}


	.firstpost .homepage-image5 {width:100% !important}
	.secondpost .homepage-image5 {width:100% !important}
	.pagenavi {float:none; text-align:center}
	 .pagenavi a, .pagenavi a:link, .pagenavi a:visited, .pagenavi .current, .pagenavi .on, .pagenavi span.pages, .insta-button, .pagenavi span.current
{font-size: 14px;}
	
	
	
}

@media only screen and (max-width: 684px) {
.related_image, .related_content a, #related_posts img {width:100% !important}
#related_posts li {margin:0px !important; width:31.7%;}
}

@media only screen and (max-width: 600px) {
#container.ab-inspiration-woocommerce-container {width:100% !important}
.related.products ul.products li, .up-sells.upsells.products ul.products li {width:100% !important}
}


@media only screen and (max-width: 380px) {
#content .gallery .gallery-item {max-width: 46% !important; height: auto !important;width: 46% !important} 
.logo-mobile {max-width:60% !important;}
#related_posts li {margin:0px !important; width:100%;}
}

@media only screen and (max-width: 370px) {
.related_image, .related_content a, #related_posts img {width:100% !important}
#subs form {width: 98% !important;}
#subs input {width: 100% !important;}
input.buttonpostform, button.sp-form .sp-button.buttonpostform, button.buttonpostform {font-size: 5.9vw !important}
}
@media only screen and (max-width: 350px) {
.related_image, .related_content a, #related_posts img {width:100% !important}}
@media only screen and (max-width: 320px) {
.related_image, .related_content a, #related_posts img {width:100% !important}}

@media only screen and (max-width: 300px) {
.related_image, .related_content a, #related_posts img {width:100% !important}
.logo-mobile {max-width:70% !important;}}
@media only screen and (max-width: 270px) {
.logo-mobile {max-width:70% !important;}
#content .gallery .gallery-item {max-width: 100% !important; height: auto !important;width: 100% !important;} }

';


/********** Конец стиля мобильной версии **********/ 





/********** Change these values **********/ 

$originalColour = of_get_option('color_one'); 
$lightPercent = 3; 
$lightestPercent = 75; 
$darkPercentone = -50; 

$colorbordermenu = of_get_option('color_two'); 
$lightPercenttwo = 3; 
$darkPercenttwo = -70; 
$darkPercent = -35; 


/*****************************************/ 

function colourCreator($colour, $per) 
{  
    $colour = substr( $colour, 1 ); // Removes first character of hex string (#) 
    $rgb = ''; // Empty variable 
    $per = $per/100*255; // Creates a percentage to work with. Change the middle figure to control colour temperature
     
    if  ($per < 0 ) // Check to see if the percentage is a negative number 
    { 
        // DARKER 
        $per =  abs($per); // Turns Neg Number to Pos Number 
        for ($x=0;$x<3;$x++) 
        { 
            $c = hexdec(substr($colour,(2*$x),2)) - $per; 
            $c = ($c < 0) ? 0 : dechex($c); 
            $rgb .= (strlen($c) < 2) ? '0'.$c : $c; 
        }   
    }  
    else 
    { 
        // LIGHTER         
        for ($x=0;$x<3;$x++) 
        {             
            $c = hexdec(substr($colour,(2*$x),2)) + $per; 
            $c = ($c > 255) ? 'ff' : dechex($c); 
            $rgb .= (strlen($c) < 2) ? '0'.$c : $c; 
        }    
    } 
    return '#'.$rgb; 
} 

// var = colourCreator (hexColour, percentage) 

$lightColour = colourCreator($originalColour, $lightPercent);  
$lightestPercentBorder = colourCreator($originalColour, $lightestPercent);
$lightColourOneDark = colourCreator($originalColour, $darkPercentone); 
$lightColourtwo = colourCreator($colorbordermenu, $lightPercenttwo);  
$lightColourtwoDark = colourCreator($originalColour, $darkPercenttwo); 
$lightColouroneHeading = colourCreator($colorbordermenu, $darkPercent);
 


function mix($color_1 = array(0, 0, 0), $color_2 = array(0, 0, 0), $weight = 0.5)
{
	$f = function($x) use ($weight) { return $weight * $x; };
	$g = function($x) use ($weight) { return (1 - $weight) * $x; };
	$h = function($x, $y) { return round($x + $y); };
	return array_map($h, array_map($f, $color_1), array_map($g, $color_2));
}
function tint($color, $weight = 0.16)
{
	$t = $color;
	if(is_string($color)) $t = abhex2rgb($color);
	$u = mix($t, array(255, 255, 255), $weight);
	if(is_string($color)) return rgb2hex($u);
	return $u;
}

function tone($color, $weight = 0.1)
{
	$t = $color;
	if(is_string($color)) $t = abhex2rgb($color);
	$u = mix($t, array(128, 128, 128), $weight);
	if(is_string($color)) return rgb2hex($u);
	return $u;
}
function shade($color, $weight = 0.08)
{
	$t = $color;
	if(is_string($color)) $t = abhex2rgb($color);
	$u = mix($t, array(0, 0, 0), $weight);
	if(is_string($color)) return rgb2hex($u);
	return $u;
}
function abhex2rgb($hex = "#000000")
{
	$f = function($x) { return hexdec($x); };
	return array_map($f, str_split(str_replace("#", "", $hex), 2));
}
function rgb2hex($rgb = array(0, 0, 0))
{
	$f = function($x) { return str_pad(dechex($x), 2, "0", STR_PAD_LEFT); };
	return "#" . implode("", array_map($f, $rgb));
}

function shadeone($color, $weight = 0.01)
{
	$t = $color;
	if(is_string($color)) $t = abhex2rgb($color);
	$u = mix($t, array(0, 0, 0), $weight);
	if(is_string($color)) return rgb2hex($u);
	return $u;
}

function tintone($color, $weight = 0.01)
{
	$t = $color;
	if(is_string($color)) $t = abhex2rgb($color);
	$u = mix($t, array(255, 255, 255), $weight);
	if(is_string($color)) return rgb2hex($u);
	return $u;
}


function shadetwo($color, $weight = 0.01)
{
	$t = $color;
	if(is_string($color)) $t = abhex2rgb($color);
	$u = mix($t, array(0, 0, 0), $weight);
	if(is_string($color)) return rgb2hex($u);
	return $u;
}


function tinttwo($color, $weight = 0.01)
{
	$t = $color;
	if(is_string($color)) $t = abhex2rgb($color);
	$u = mix($t, array(255, 255, 255), $weight);
	if(is_string($color)) return rgb2hex($u);
	return $u;
}

function shadetwobg($color, $weight = 0.08)
{
	$t = $color;
	if(is_string($color)) $t = abhex2rgb($color);
	$u = mix($t, array(0, 0, 0), $weight);
	if(is_string($color)) return rgb2hex($u);
	return $u;
}

function shadetwobglight($color, $weight = 0.72)
{
	$t = $color;
	if(is_string($color)) $t = abhex2rgb($color);
	$u = mix($t, array(0, 0, 0), $weight);
	if(is_string($color)) return rgb2hex($u);
	return $u;
}

function shadelink($color, $weight = 0.9)
{
	$t = $color;
	if(is_string($color)) $t = abhex2rgb($color);
	$u = mix($t, array(0, 0, 0), $weight);
	if(is_string($color)) return rgb2hex($u);
	return $u;
}

function shadefooter($color, $weight = 0.16)
{
	$t = $color;
	if(is_string($color)) $t = abhex2rgb($color);
	$u = mix($t, array(0, 0, 0), $weight);
	if(is_string($color)) return rgb2hex($u);
	return $u;
}

function tintfooter($color, $weight = 0.02)
{
	$t = $color;
	if(is_string($color)) $t = abhex2rgb($color);
	$u = mix($t, array(255, 255, 255), $weight);
	if(is_string($color)) return rgb2hex($u);
	return $u;
}

function tintlighthovericon($color, $weight = 0.1)
{
	$t = $color;
	if(is_string($color)) $t = abhex2rgb($color);
	$u = mix($t, array(255, 255, 255), $weight);
	if(is_string($color)) return rgb2hex($u);
	return $u;
}
  
  
  function shadesubs($color, $weight = 0.6)
{
	$t = $color;
	if(is_string($color)) $t = abhex2rgb($color);
	$u = mix($t, array(0, 0, 0), $weight);
	if(is_string($color)) return rgb2hex($u);
	return $u;
}

  function shadesubsbutton($color, $weight = 0.9)
{
	$t = $color;
	if(is_string($color)) $t = abhex2rgb($color);
	$u = mix($t, array(0, 0, 0), $weight);
	if(is_string($color)) return rgb2hex($u);
	return $u;
}
  

  
  function tintsubs($color, $weight = 0.09)
{
	$t = $color;
	if(is_string($color)) $t = abhex2rgb($color);
	$u = mix($t, array(255, 255, 255), $weight);
	if(is_string($color)) return rgb2hex($u);
	return $u;
}
  
function tonesubs($color, $weight = 0.1)
{
	$t = $color;
	if(is_string($color)) $t = abhex2rgb($color);
	$u = mix($t, array(128, 128, 128), $weight);
	if(is_string($color)) return rgb2hex($u);
	return $u;
}
  
      function tintterms($color, $weight = 0.7)
{
	$t = $color;
	if(is_string($color)) $t = abhex2rgb($color);
	$u = mix($t, array(255, 255, 255), $weight);
	if(is_string($color)) return rgb2hex($u);
	return $u;
}

if (of_get_option('simple_settings') == '1') { $css .= ' 

#subs, .woocommerce tr th,#form-background,.vhodnoaya2, .vhodnoaya4, .author-info
{'; if ( of_get_option('color_one') !== '') 
{ $css .= 'background-color: '. tintsubs(tonesubs(''.of_get_option('color_one')).'') .'  !important;';} 
else { $css .= 'background:transparent!important;';} 
$css .= '} 

#content div.post-font a.more-link:hover,#wrapper #content a.more-link:hover,  .tml-button:hover, #subs input[type=submit]:hover, #subs input[type=submit]:visited  {background-color: '. shadelink(''.of_get_option('color_two').'') .'  !important; text-decoration:none}

#access ul li:hover, #access  ul > li.current-menu-item  {background:'. shadelink(''.of_get_option('color_one').'') .' }
 

#content .garantiya-bottom-commets a:link, #content .garantiya-bottom-commets a:hover, #content .garantiya-bottom-commets a:visited, .widget-area .garantiya a:link, .widget-area .garantiya a:hover, .widget-area .garantiya a:visited, #content .post .garantiya-bottom a:link, #content .post .garantiya-bottom a:hover, #content .post .garantiya-bottom a:visited {'; if ( of_get_option('color_one') !== '') 
{ $css .= 'color: '. tintterms(tonesubs(''.of_get_option('color_one')).'') .'  !important;';} 
else { $css .= 'color:ccc!important;';} 
$css .= '}
		
button.form-button, input.form-button, div.form-button, #subs input[type="submit"], #subs input[type="submit"]:visited, div.buttonpostform, button.buttonpostform, .sp-form .sp-button.buttonpostform  {'; if ( of_get_option('buttons_shape') == '3px'){ $css .= 'border-radius: 3px; -moz-border-radius: 3px;-webkit-border-radius: 3px;';} elseif ( of_get_option('buttons_shape') == '50px') {$css .= 'border-radius: 50px; -moz-border-radius: 50px;-webkit-border-radius: 50px;';} else {$css .= 'border-radius: 0px; -moz-border-radius: 0px;-webkit-border-radius: 0px;';}  $css .= '}	
.sp-form .sp-button.buttonpostform:hover, button.buttonpostform:hover {position:relative; top:2px;}	
		
.home-level6 {border-top: 5px solid rgba(0,0,0,.4) !important; border-bottom: 2px solid  rgba(0,0,0,.4) !important;}
.home-level6 {border-color: rgba(0,0,0,.4)}
div.buttonsinvite {background:#fff !important;}
.home-level6 .abinspiration-product-form input.show-form-button, .home-level6 .abinspiration-product-form button.show-form-button {background:  rgba(0,0,0,.4) !important; }
.home-level6 .abinspiration-product-form input.show-form-button:hover, .home-level6 .abinspiration-product-form  button.show-form-button:hover {background:  rgba(0,0,0,.6) !important;cursor: pointer;}
.show-form-button:hover {background:  rgba(0,0,0,.6) !important; }

'; if ( of_get_option('post_border') == '1px'){ $css .= '

.woocommerce div.product .woocommerce-tabs ul.tabs li, #content .entry-box, #content article.entry-box, .entry-box.ab-inspiration-woocommerce-entry, .entry-box.ab-inspiration-woocommerce-entry-home,   ul.tabbernav li a, .entry-content div.woocommerce-shipping-fields h3  label, .woocommerce .quantity .qty, #form-background,#subs, .author-info {border:1px solid  rgba(0,0,0,0.06)  !important}.single-course_unit .entry-box {padding:30px !important; }';} else { $css .= '#content .entry-box, #content article.entry-box{padding-top:0px}';}  

if ( of_get_option('widget_border') == '1px'){ $css .= 'li.widget-container,div.widget-container, .single-course_unit #primary.widget-area ul li{border:1px solid  rgba(0,0,0,0.06)  !important} ';} else { $css .= 'li.widget-container,div.widget-container, .single-course_unit #primary.widget-area ul li{padding:0px !important} .single-course_unit .entry-box {padding-left:30px !important; padding-right: 0px; }';} 


if ($ab_woocommerce['show_border_product'] == '1') { $css .= ' .woocommerce ul.products li.product, .woocommerce-page ul.products li.product, .woocommerce ul.products li.last, .woocommerce-page ul.products li.last, .woocommerce #content div.product div.images img, .woocommerce div.product div.images img, .woocommerce-page #content div.product div.images img, .woocommerce-page div.product div.images img {border:1px solid  rgba(0,0,0,0.06)  !important} .woocommerce ul.products li.product .img-wrap-image {border:none !important} ';} else { $css .= ' .woocommerce ul.products li.product, .woocommerce-page ul.products li.product, .woocommerce ul.products li.last, .woocommerce-page ul.products li.last, .woocommerce #content div.product div.images img, .woocommerce div.product div.images img, .woocommerce-page #content div.product div.images img, .woocommerce-page div.product div.images img {border:none !important} .woocommerce ul.products li.product .img-wrap-image {border:1px solid  rgba(0,0,0,0.06)  !important}';}






$css .= ' }
 .social-likes .shop:hover {border:none}

.social-likes .shop.social-likes__widget_facebook, .social-likes .shop.social-likes__widget_twitter,.social-likes .shop.social-likes__widget_plusone,  .social-likes .shop.social-likes__widget_vkontakte, .social-likes .shop.social-likes__widget_odnoklassniki, .social-likes .shop.social-likes__widget_telegram, .social-likes .shop.social-likes__widget_pinterest {background:#fff !important; color: #babbbc}
.social-likes .shop {border:1px solid #babbbc;}
.social-likes__widget_notext .social-likes__icon { margin: .44em;}

.single-product div.product p.price {margin-top: 30px;margin-bottom: 30px !important;}.single-product div.product p.price {font-size: 1.6em;}body .woocommerce-product-rating{ font-size: 20px !important;}

.post-font3, .otzyvy-text, .otzyvy-name {color: #333}
.cbp-item-wrapper {background:transparent;}
div.entry-title5, .entry-title5 a:link, .entry-title5 a:visited, h3.entry-title2, .entry-title2 a:link, .entry-title2 a:visited, #grid-container2 h2.entry-title a:link {font-weight:normal !important}

#access li a {border-right:1px solid rgba(0,0,0,0.06)!important;}
#wrapper #access li.cart-in-menu a {border-right:1px solid rgba(0,0,0,0.06)  !important;border-left:1px solid rgba(0,0,0,0.06) !important; padding:0 25px !important}
#access li:first-child a, #access li a.cart-contents {border-left:1px solid rgba(0,0,0,0.06) !important}

#content .woocommerce table.shop_table td.product-remove a.remove {color:red!important}

.related-katalog .cbp-nav-prev, .related-katalog .cbp-nav-next, .block_home6 .cbp-nav-next, .block_home6 .cbp-nav-prev {background:transparent !important}
.related-katalog .cbp-nav-prev:after, .related-katalog .cbp-nav-next:after, .block_home6 .cbp-nav-next:after, .block_home6 .cbp-nav-prev:after { color: #333; font-size:30px; }

.heading-title2 strong, .heading-title1 strong, .heading-title3 strong, .heading-title4 strong, .heading-title5 strong, .heading-title6 strong {font-weight: normal;} 

.widget-title {background:transparent; padding-left:0px;}
#footer {border-top: 2px solid  rgba(0,0,0,.05) !important;}
.cbp-item-wrapper, .katalog-enterpage {border:none !important}
ul.product_list_widget .product-title {color:#333 !important}
#content .woocommerce-MyAccount-navigation ul li a {color:#333 !important}

#site-title a,.entry-title, h1.entry-title,#content div.post h2.entry-title a:link, #content div.post h2.entry-title a:visited,
#footer-widget-area div.widget-title,.post-font h1, .post-font h2, .post-font h3, .post-font h4, .post-font h5, .post-font h6,h1.katalog-title,.widget-title,.woocommerce ul.products li.product h3, .cart_totals.calculated_shipping h2, .woocommerce-billing-fields h3, h3#order_review_heading, .woocommerce-shipping-fields h3, #slides .caption1, .home-level2 .cat-title-homepage, .shop-otzyv-home, .entry-box.ab-inspiration-woocommerce-entry .woocommerce ul.products li.product-category.product h3, .woocommerce h2, .woocommerce #reviews h3,#wrapper h3, #content h1, #content h2, #content h3, #content h4, #content h5, #content h6, .buttonsinvite div.heading, .headerformpost, .form-heading, #content h3 a, #content h1 a, #content h2 a, #content h3 a, #content h4 a, #content h5 a, label.ship-to-different-address-checkbox, .entry-title3 a:link, .entry-title3 a:visited, h3.entry-title1, .heading-title2 p, .heading-title2 span, .heading-title5 p, .heading-title5 span, .heading-title1 p, .heading-title1 span, .heading-title3 p, .heading-title3 span,.heading-title4 p, .heading-title4 span,.heading-title6 p, .heading-title6 span, h3.wpcw-course-title {font-weight:normal !important}

#access .sub-menu li a {border:none !important}

.homepage-icon1 i {position:relative; z-index:2}

.social-likes .shop.social-likes__widget_facebook:hover, .social-likes .shop.social-likes__widget_twitter:hover,.social-likes .shop.social-likes__widget_plusone:hover,  .social-likes .shop.social-likes__widget_vkontakte:hover, .social-likes .shop.social-likes__widget_odnoklassniki:hover, .social-likes .shop.social-likes__widget_telegram:hover, .social-likes .shop.social-likes__widget_pinterest:hover {color:#fff}

.woocommerce-info:before, .woocommerce_info:before, .noreviews:before,  .nocomments:before, #content .woocommerce .woocommerce-info::before  {content: "\f05a"; font-family:FontAwesome}


#footer, .footer-widget-box, #footer-widget-area ul li.widget, #footer-widget-area div.widget-title, .home-level6, #headercssmenu ul li.current > a,#headercssmenu ul li a:hover:after,#headercssmenu ul li.current > a:after, #headercssmenu ul li.active > a:after,#access,button.form-button, input.form-button, div.form-button, div.buttonpostform, button.buttonpostform,.sp-form .sp-button.buttonpostform, .home-level2 .woocommerce.columns-3 ul.products li.product-category.product.first .button-homepage:hover, #sub-form-top-admin .ab-form-button-top-admin div:hover,  .sp-button.ab-form-button-top:hover, .scrollupinsight, #content .woocommerce div.product .woocommerce-tabs ul.tabs li.active a,  #content .woocommerce div.product .woocommerce-tabs ul.tabs li.active a:hover,.cbp-l-caption-buttonLeft,  .cbp-m-caption-buttonLeft,  .cbp-s-caption-buttonLeft, .search-button, .submit, #content a.comment-reply-link,#submit, .button-form,  .pagenavi span.current, #content .woocommerce a.button:hover, #content .woocommerce button.button:hover,#primary .woocommerce button.button:hover, #content .woocommerce input.button:hover, #searchsubmit:hover, #footer a.scrollupinsight, .vhodnoaya1, .entry-title1 a:link, .entry-title1 a:visited,   input.button,  #content .woocommerce div.product .woocommerce-tabs ul.tabs li.active a,  div.readmore3:hover, div.readmore2, div.readmore5:hover, div.readmore4,  div.readmore6,  #content .cbp-l-caption-buttonLeft.buy:hover, .cbp-s-caption-buttonLeft, div.post-font  a.cbp-s-caption-buttonLeft:link, div.post-font  a.cbp-s-caption-buttonLeft:visited,  div.post-font  a.cbp-m-caption-buttonLeft:link, div.post-font  a.cbp-m-caption-buttonLeft:visited,div.post-font  a.cbp-l-caption-buttonLeft:link, div.post-font  a.cbp-l-caption-buttonLeft:visited,#content .cbp-s-caption-buttonLeft.buy:hover,  #content .cbp-m-caption-buttonLeft.buy:hover, #content .cbp-l-caption-buttonRight:hover, #content a.cbp-s-caption-buttonLeft, #content .cbp-s-caption-buttonLeft:hover, .cbp-s-caption-buttonLeft.buy:hover, div.post-font  a.cbp-s-caption-buttonLeft.buy.button-show-buy:hover, div.post-font  a.cbp-m-caption-buttonLeft.buy.button-show-buy:hover, div.post-font  a.cbp-l-caption-buttonLeft.buy.button-show-buy:hover, .buton-unit, .wp-block-button__link,#content a.fe_btn_completion:hover, #content a.wpcw-button.wpcw-button-primary:hover, #content button.wpcw-input-button:hover, #content button.wpcw-checkout-payment-button:hover, #content button.button:hover, #content ul.tabbernav li.tabberactive a,  #content .wpcw-student-account .wpcw-student-account-navigation ul li.is-active a, #content  .wpcw-student-account .wpcw-student-account-navigation ul li:hover, #content  .wpcw-student-account .wpcw-student-account-navigation ul li a:hover, #content .wpcw_fe_quiz_submit_data input.fe_btn_completion, #content ul.tabbernav li a:hover, #content ul.tabbernav li.tabberactive a:hover, .woocommerce-MyAccount-navigation ul li, .wpcw-button.wpcw-button-primary:hover {
'; if ( of_get_option('color_one') !== '') { $css .= 'background-color:'. of_get_option('color_one').'!important;';} else { $css .= 'background-color:transparent!important;';} $css .= '}

.woocommerce .woocommerce-info:before {'; if ( of_get_option('color_one') !== '') { $css .= 'color:'. of_get_option('color_one').'!important;';} else { $css .= 'color:#000!important;';} $css .= '}

.woocommerce .woocommerce-info {'; if ( of_get_option('color_one') !== '') { $css .= 'border-top-color:'. of_get_option('color_one').'!important;';} else { $css .= 'border-top-color:transparent!important;';} $css .= '}

.woocommerce div.product .woocommerce-tabs ul.tabs li.active, img.post_thumbnail.image-otzyv.wp-post-image, #sub-form-top-admin .ab-form-button-top-admin div:hover, .sub-form-top input.ab-btnhov-top, .sub-form-top .sp-button.ab-form-button-top:hover,.sub-form-footer .sp-button.ab-form-button-top:hover, #content ul.tabbernav li.tabberactive a, #content ul.tabbernav li.tabberactive a:hover{'; if ( of_get_option('color_one') !== '') { $css .= 'border-color:'. of_get_option('color_one').'!important;';} else { $css .= 'border-color:transparent!important;';} $css .= '}




.cbp-item.testimonials-animation img.avatar-comment-homepage, #content .woocommerce-MyAccount-navigation ul li  {'; if ( of_get_option('color_one') !== '') { $css .= 'border-color:'. tint(''.of_get_option('color_one').'') .'!important;';} else { $css .= 'border-color:transparent!important;';} $css .= '}

#content .woocommerce-MyAccount-navigation ul li {'; if ( of_get_option('color_one') !== '') { $css .= 'border-bottom:1px solid '. tint(''.of_get_option('color_one').'') .'!important;';} else { $css .= 'border-color:transparent!important;';} $css .= '}


.widget-area a:link, .widget-area a:visited, div.post-font a:link, div.post-font a:visited,#content .post a:link,#content a:link, #content a:visited{'; if ( of_get_option('color_one') !== '') { $css .= 'color:'. shadesubs(''. of_get_option('color_one').'') .'!important;';} else { $css .= 'color:#000!important;';} $css .= '}

.home-level6 .abinspiration-product-form input.show-form-button, .home-level6 .abinspiration-product-form div.show-form-button, .home-level6 .abinspiration-product-form button.show-form-button {'; if ( of_get_option('color_one') !== '') { $css .= 'color:'. tintone(''.of_get_option('color_one').'') .'!important;';} else { $css .= 'color:#000!important;';} $css .= '}

.search-button, .submit, #content a.comment-reply-link,#submit, .button-form,  .pagenavi span.current,#content .woocommerce a.button:hover, #content .woocommerce button.button:hover,#primary .woocommerce button.button:hover, #content .woocommerce input.button:hover, #searchsubmit:hover, #footer a.scrollupinsight, .vhodnoaya1, .entry-title1 a:link, .entry-title1 a:visited, .post-font1, .homepage-icon1, input.button, #access li.current-menu-item a, #content .woocommerce div.product .woocommerce-tabs ul.tabs li.active a,div.readmore1,div.readmore3:hover, div.readmore2, div.readmore5:hover, div.readmore4,  div.readmore6,  #content .cbp-l-caption-buttonLeft.buy:hover, .cbp-s-caption-buttonLeft, div.post-font  a.cbp-s-caption-buttonLeft:link, div.post-font  a.cbp-s-caption-buttonLeft:visited,  div.post-font  a.cbp-m-caption-buttonLeft:link, div.post-font  a.cbp-m-caption-buttonLeft:visited,div.post-font  a.cbp-l-caption-buttonLeft:link, div.post-font  a.cbp-l-caption-buttonLeft:visited,#content .cbp-s-caption-buttonLeft.buy:hover,  #content .cbp-m-caption-buttonLeft.buy:hover, #content .cbp-l-caption-buttonRight:hover, #content a.cbp-s-caption-buttonLeft, #content .cbp-s-caption-buttonLeft:hover, .cbp-s-caption-buttonLeft.buy:hover, div.post-font  a.cbp-s-caption-buttonLeft.buy.button-show-buy:hover, div.post-font  a.cbp-m-caption-buttonLeft.buy.button-show-buy:hover, div.post-font  a.cbp-l-caption-buttonLeft.buy.button-show-buy:hover, .buton-unit,a.more-link1, #footer a, .copyright,.home-level6 .shopform-title p, .home-level6 .shopform-title span, #content .home-level6 .garantiya a:link, #content .home-level6 .garantiya a:visited, #sub-form-top-admin .ab-form-button-top-admin div:hover, .sub-form-top input.ab-btnhov-top, .sub-form-top .sp-button.ab-form-button-top:hover,.sub-form-footer .sp-button.ab-form-button-top:hover, button.form-button, input.form-button, div.form-button,#access li a, #access li a:hover, #footer-widget-area  a:link, #footer-widget-area  a:visited, #footer-widget-area, #footer-widget-area div.widget-title, #footer-widget-area  a:active, #footer-widget-area  a:hover, #footer-widget-area ul li.widget a:hover,#content a.fe_btn_completion:hover, #content a.wpcw-button.wpcw-button-primary:hover, #content button.wpcw-input-button:hover, #content button.wpcw-checkout-payment-button:hover, #content button.button:hover, .sub-form-top div.ab-btnhov-top, #content .wpcw-student-account .wpcw-student-account-navigation ul li.is-active a, #content .wpcw-student-account .wpcw-student-account-navigation ul li:hover, #content .wpcw-student-account .wpcw-student-account-navigation ul li a:hover,  #content .wpcw_fe_quiz_submit_data input.fe_btn_completion, #content ul.tabbernav li.tabberactive a, #content ul.tabbernav li a:hover, #content ul.tabbernav li.tabberactive a:hover,   #content .woocommerce-MyAccount-navigation ul li a, .wpcw-button.wpcw-button-primary:hover {
'; if ( of_get_option('color_one') !== '') { if (of_get_option('color_one_text') == '1') { $css .= 'color:'. shadeone(''.of_get_option('color_one').'') .' !important';} else {$css .= 'color:'. tintone(''.of_get_option('color_one').'') .' !important';} } else { $css .= 'color:#000!important;';}  $css .= '}
#content .wpcw-student-account .wpcw-student-account-navigation ul li a {color:#000 !important;}

#headercssmenu ul li:hover > a,#headercssmenu ul li.active > a, #headercssmenu ul li.current > a {'; if (of_get_option('headermenu_bg_or_border') == '1') { if ( of_get_option('color_one') !== '') { 
if (of_get_option('color_one_text') == '1') { $css .= 'color:'. shadeone(''.of_get_option('color_one').'') .' !important;  ';} else {$css .= 'color:'. tintone(''.of_get_option('color_one').'') .' !important; ';} } else {$css .= 'color:#000!important; background:transparent';} } $css .= '} 

#headercssmenu ul li:hover > a,#headercssmenu ul li.active > a, #headercssmenu ul li.current > a {'; if (of_get_option('headermenu_bg_or_border') == '1') { $css .= 'background: '. of_get_option('color_one').' !important; ';} $css .= '}



div.readmore1:hover {'; if ( of_get_option('color_one') !== '') { $css .= 'color:'. tintone(''.of_get_option('color_one').'').'!important;';} else { $css .= 'color:#000!important;';} if ( of_get_option('color_one') !== '') { $css .= 'background:'. shadefooter(''.of_get_option('color_one').'').'!important;';} else { $css .= 'background:transparent!important;';} $css .= 'border: 2px solid '. shadefooter(''.of_get_option('color_one').'') .' !important}


div.readmore1 {'; if (of_get_option('color_one_text') == '1') { $css .= ' background: transparent !important; border: 2px solid '. shadeone(''.of_get_option('color_one').'') .' !important';} else {$css .= 'background: transparent !important;  border: 2px solid '. tintone(''.of_get_option('color_one').'') .' !important';}  $css .= '}



div.readmore3, div.readmore2:hover, div.readmore5, div.readmore4:hover, div.readmore6:hover, #content .cbp-l-caption-buttonLeft.buy, #content  .cbp-s-caption-buttonLeft.buy, #content a.cbp-s-caption-buttonLeft:hover,  #content  .cbp-m-caption-buttonLeft.buy, #content a.cbp-l-caption-buttonRight,#content .pagenavi a:hover,.pagenavi span.current, .cbp-s-caption-buttonLeft.buy, div.post-font  a.cbp-s-caption-buttonLeft:hover, div.post-font  a.cbp-s-caption-buttonLeft.buy:link, div.post-font  a.cbp-s-caption-buttonLeft.buy:visited,  div.post-font  a.cbp-m-caption-buttonLeft:hover, div.post-font  a.cbp-m-caption-buttonLeft.buy:link, div.post-font  a.cbp-m-caption-buttonLeft.buy:visited,  div.post-font  a.cbp-l-caption-buttonLeft:hover, div.post-font  a.cbp-l-caption-buttonLeft.buy:link, div.post-font  a.cbp-l-caption-buttonLeft.buy:visited, .buton-unit:hover, .wp-block-button__link:hover, #content a.fe_btn_completion, #content a.wpcw-button.wpcw-button-primary, #content button.wpcw-input-button, #content button.wpcw-checkout-payment-button, #content button.button, #submit:hover, a.scrollupinsight:hover,  #searchsubmit,  #content .wpcw_fe_quiz_submit_data input.fe_btn_completion:hover, #content div.post-font a.more-link,#wrapper #content a.more-link, .tml-button, #content .woocommerce-MyAccount-navigation ul a:hover {

'; if ( of_get_option('color_two') !== '') { if (of_get_option('color_two_text') == '1') { $css .= 'background: '.of_get_option('color_two').' !important; ';} else {$css .= 'background: '.of_get_option('color_two') .' !important;  ';} } else {$css .= 'background:transparent!important;';}  $css .= '}

#content a.fe_btn_completion, #content a.wpcw-button.wpcw-button-primary, #content button.wpcw-input-button, #content button.wpcw-checkout-payment-button, #content button.button {border:none;}
.sub-form-top input.ab-form-button-top {'; if ( of_get_option('buttons_shape') == '3px'){ $css .= 'border-radius: 3px !important; -moz-border-radius: 3px !important;-webkit-border-radius: 3px !important;';} elseif ( of_get_option('buttons_shape') == '50px') {$css .= 'border-radius: 50px !important; -moz-border-radius: 50px !important;-webkit-border-radius: 50px !important;';} else {$css .= 'border-radius: 0px !important; -moz-border-radius: 0px !important;-webkit-border-radius: 0px !important;';}  $css .= '
}

.sub-form-top .input-form {'; if ( of_get_option('buttons_shape') == '3px'){ $css .= 'border-radius: 3px !important; -moz-border-radius: 3px !important;-webkit-border-radius: 3px !important;';} elseif ( of_get_option('buttons_shape') == '50px') {$css .= 'border-radius: 3px !important; -moz-border-radius: 3px !important;-webkit-border-radius: 3px !important;';} else {$css .= 'border-radius: 0px !important; -moz-border-radius: 0px !important;-webkit-border-radius: 0px !important;';}  $css .= '}

#sub-form-top-admin .ab-form-button-top-admin div, .sub-form-top input.ab-form-button-top, .sub-form-top .sp-button.ab-form-button-top, .sub-form-footer .sp-button.ab-form-button-top, div.readmore3, div.readmore2:hover, div.readmore5, div.readmore4:hover, div.readmore6:hover, #content .cbp-l-caption-buttonLeft.buy, #content  .cbp-s-caption-buttonLeft.buy, #content a.cbp-s-caption-buttonLeft:hover,  #content  .cbp-m-caption-buttonLeft.buy, #content a.cbp-l-caption-buttonRight,#content .pagenavi a:hover,.pagenavi span.current, .cbp-s-caption-buttonLeft.buy, div.post-font  a.cbp-s-caption-buttonLeft:hover, div.post-font  a.cbp-s-caption-buttonLeft.buy:link, div.post-font  a.cbp-s-caption-buttonLeft.buy:visited,  div.post-font  a.cbp-m-caption-buttonLeft:hover, div.post-font  a.cbp-m-caption-buttonLeft.buy:link, div.post-font  a.cbp-m-caption-buttonLeft.buy:visited,  div.post-font  a.cbp-l-caption-buttonLeft:hover, div.post-font  a.cbp-l-caption-buttonLeft.buy:link, div.post-font  a.cbp-l-caption-buttonLeft.buy:visited, .buton-unit:hover,  button.btnhov, input.btnhov, div.btnhov, #subs input[type=submit], .cbp-s-caption-buttonLeft:hover, input.button:hover, button.btnhov, input.btnhov, div.btnhov, .button-form:hover,   #submit:hover,   .submit:hover,   #content a.comment-reply-link:hover,  .pagenavi span.current:hover,   .archiv-title,   .fusion-portfolio #filters-container .cbp-filter-item-active, .katalog-link,  .related-katalog .cbp-nav-next, .woocommerce #respond input#submit,    #content .woocommerce a.button, .woocommerce button.button,.woocommerce input.button,#searchsubmit, #footer a.scrollupinsight:hover,#content .fusion-portfolio #filters-container .cbp-filter-item-active,#access  li.current-menu-item a, .menu-header .cart-contents .count, #headercssmenu a.cart-contents .count, .navbar a.cart-contents .count, #content a.wp-block-button__link,#content a.fe_btn_completion,#content a.wpcw-button.wpcw-button-primary,  #content button.wpcw-input-button, #content button.wpcw-checkout-payment-button, #content button.button,  #content .wpcw_fe_quiz_submit_data input.fe_btn_completion:hover, #content div.post-font a.more-link, #wrapper #content a.more-link, .tml-button,.navbar.navbar-6 button span, .wpcw-button.wpcw-button-primary{

'; if ( of_get_option('color_two') !== '') { if (of_get_option('color_two_text') == '1') { $css .= 'color:'. shadeone(''.of_get_option('color_two').'') .' !important; ';} else {$css .= 'color:'. tintone(''.of_get_option('color_two').'') .' !important; ';}} else { $css .= 'color:#000!important;';} $css .= '}
.cbp-l-caption-buttonLeft:hover, .cbp-m-caption-buttonLeft:hover, .cbp-s-caption-buttonLeft:hover,.tccol4 span,
button.btnhov, input.btnhov, div.btnhov, #subs input[type=submit], div.buttonpostform:hover, .sp-form .sp-button.buttonpostform:hover, button.buttonpostform:hover, .scrollupinsight:hover,    .pagenavi a:hover,input.button:hover, #access ul ul li,button.button,
.search-button:hover,  .pagenavi .current, .pagenavi .on,  a.archiv-title, .blog-post-tags ul.blog-tags a:hover,.tagcloud a:hover,
.woocommerce .widget_price_filter .ui-slider .ui-slider-range, .woocommerce .widget_price_filter .ui-slider .ui-slider-handle, .home-level2 .woocommerce.columns-3 ul.products li.product-category.product.first .button-homepage, #sub-form-top-admin .ab-form-button-top-admin div, .sub-form-top input.ab-form-button-top, .sub-form-top .sp-button.ab-form-button-top, .sub-form-footer .sp-button.ab-form-button-top,  .menu-header .cart-contents .count, #headercssmenu a.cart-contents .count, .navbar a.cart-contents .count,  .noreviews:before,  .nocomments:before, #content .woocommerce a.button,  .navbar.navbar-6 button, .fusion-portfolio #filters-container .cbp-filter-item-active, .woocommerce-MyAccount-navigation ul li:hover, .woocommerce-MyAccount-navigation ul li.is-active, .wpcw-button.wpcw-button-primary {

'; if ( of_get_option('color_two') !== '') { $css .= 'background-color:'. of_get_option('color_two').'!important;';} else { $css .= 'background-color:transparent!important;';} $css .= '}

.sub-form-top .ab-form-button-top.ab-btnhov-top, .sub-form-top .sp-button.ab-form-button-top:hover, .sub-form-footer .sp-button.ab-form-button-top:hover, .navbar.navbar-6 button:hover {'; if ( of_get_option('color_two') !== '') { $css .= 'background-color:'. shadesubsbutton(of_get_option('color_two')).'!important;';} else { $css .= 'background-color:transparent!important;';} $css .= '}

#access ul li:hover {background: rgba(0,0,0,0.05)!important;}

#footer-widget-area  a:active, #footer-widget-area  a:hover,.widget-area a:active, .widget-area a:hover,li.widget_ab_categories ul li a:hover, #primary li.widget_product_categories ul.product-categories li a:hover,#content .post  a:hover,#content .post a:visited:hover,.comment-meta a:active, .comment-meta a:hover,.reply a:hover, a.comment-edit-link:hover,#content .post a:active, #content .post a:hover,.navigation a:active, .navigation a:hover,.fusion-portfolio #filters-container .cbp-filter-item:hover, ul.tabbernav li a:hover, #slides .cycle-pager span.cycle-pager-active a:link{
'; if ( of_get_option('color_one') !== '') { $css .= 'text-decoration:underline; color:'. shadesubs(tonesubs(''. of_get_option('color_one')) .'') .'!important;';} else { $css .= 'color:#000!important;';} $css .= '}

#site-title a:hover {'; if ( of_get_option('color_two') !== '') { $css .= 'color:'. of_get_option('color_two')  .'!important;';} else { $css .= 'color:#000!important;';} $css .= '}

#site-title a, #site-title,  .entry-title, h1.entry-title, #content div.post h2.entry-title a:link, #content div.post h2.entry-title a:visited, .post-font h1, .post-font h2, .post-font h3, .post-font h4, .post-font h5, .post-font h6, h1.katalog-title, .widget-title, .woocommerce ul.products li.product h3, .cart_totals.calculated_shipping h2, .woocommerce-billing-fields h3, h3#order_review_heading, .woocommerce-shipping-fields h3, .entry-title, h1.entry-title, div.related_posts div, div.buttonsinvite div.heading, .woocommerce h2, .woocommerce #reviews,#content h1, #content h2, #content h3, #content h4, #content h5, #content h6, .buttonsinvite div.heading, .headerformpost, .form-heading, #content h3 a:link, #content h1 a:link, #content h2.entry-title a:link, #content h2.entry-title a:visited, #content h3 a:link, #content h4 a:link, #content h5 a:link, #content .woocommerce div.product form.cart table tr td.label a:link, #content .woocommerce div.product form.cart table tr td.label a:visited, .stock.available-on-backorder, .stock.out-of-stock,  .entry-content div.woocommerce-shipping-fields h3  label, p.stock.in-stock, #content .woocommerce div.product form.cart table.variations  tr td.label label, .widget-area .recentpost-title a:link, .widget-area .recentpost-title a:visited, .entry-title3 a:link, .entry-title3 a:visited,  .heading-title2 p, .heading-title2 span, .heading-title5 p, .heading-title5 span, .heading-title1 p, .heading-title1 span, .heading-title3 p, .heading-title3 span,.heading-title4 p, .heading-title4 span,.heading-title6 p, .heading-title6 span, .entry-title2 a:link, .entry-title2 a:visited, div.entry-title5, .entry-title5 a:link, .entry-title5 a:visited, #grid-container2 h2.entry-title a:link, #grid-container2 h2.entry-title a:visited, #grid-container .post-font .cbp-l-grid-projects-title div.entry-title a:link, #grid-container .post-font .cbp-l-grid-projects-title h2.entry-title a:visited, h3.wpcw-course-title, .wpcw_fe_course_title {'; if ( of_get_option('color_two') !== '') { $css .= 'color:'. shadesubs(tonesubs(''. of_get_option('color_two')) .'') .'!important;';} else { $css .= 'color:#000!important;';} $css .= '}

.fusion-portfolio #filters-container .cbp-filter-item-active, 
.author-tabs,.fusion-portfolio #filters-container .cbp-filter-item-active,.author-tabs,  #sub-form-top-admin .ab-form-button-top-admin div, .sub-form-top input.ab-form-button-top, .sub-form-top .sp-button.ab-form-button-top, .sub-form-footer .sp-button.ab-form-button-top, .home-level2 .tm_banners_grid_widget_banner_link:hover:before, .home-level2 .tm_banners_grid_widget_banner_link:before, .social-likes .shop:hover{
'; if ( of_get_option('color_two') !== '') { $css .= 'border-color:'.  of_get_option('color_two') .'!important;';} else { $css .= 'border-color:transparent!important;';} $css .= '}

#content .woocommerce-MyAccount-navigation ul, #content .woocommerce-MyAccount-navigation ul {border-bottom:1px solid 
'; if ( of_get_option('color_two') !== '') { $css .= of_get_option('color_two') .'!important;';} else { $css .= 'transparent!important;';} $css .= '}

#content .woocommerce .woocommerce-info { 
'; if ( of_get_option('color_two') !== '') { $css .= 'border-top-color:'.  of_get_option('color_two') .'!important;';} else { $css .= 'border-top-color:transparent!important;';} $css .= '}


.home-level3, .social-likes .shop.social-likes__widget_facebook:hover, .social-likes .shop.social-likes__widget_twitter:hover,.social-likes .shop.social-likes__widget_plusone:hover,  .social-likes .shop.social-likes__widget_vkontakte:hover, .social-likes .shop.social-likes__widget_odnoklassniki:hover, .social-likes .shop.social-likes__widget_telegram:hover, .social-likes .shop.social-likes__widget_pinterest:hover  {'; if ( of_get_option('color_tree') !== '') { $css .= 'background:'. of_get_option('color_tree').'!important;';} else { $css .= 'background:transparent!important;';} $css .= '}
 .social-likes .shop .social-likes__button:hover  {content: "\f05a";'; if ( of_get_option('color_tree') !== '') { $css .= 'color:'. of_get_option('color_tree').'!important;';} else { $css .= 'color:#000!important;';} $css .= '}
#content .home-level3 .abinspiration-product-ads a.ads-homepage{background:rgba(0,0,0,0.4) !important;'; if ( of_get_option('color_tree') !== '') { $css .= 'color:'. tintone(''.of_get_option('color_tree') .'').'!important;';} else { $css .= 'color:#000!important;';} $css .= '}
#content .home-level3 .abinspiration-product-ads a.ads-homepage:hover {background:rgba(0,0,0,0.6) !important; cursor: pointer;}
.star-rating span:before{
'; if ( of_get_option('color_tree') !== '') { $css .= 'color:'. of_get_option('color_tree').'!important;';} else { $css .= 'color:#000!important;';} $css .= '} 
span.onsale:after, .woocommerce span.onsale, span.onsale {'; if ( of_get_option('color_tree') !== '') { $css .= 'background:'. of_get_option('color_tree').'!important;';} else { $css .= 'background:transparent!important;';} $css .= '}


#site-title a,.entry-title, h1.entry-title,#content div.post h2.entry-title a:link, #content div.post h2.entry-title a:visited,
#footer-widget-area div.widget-title,.post-font h1, .post-font h2, .post-font h3, .post-font h4, .post-font h5, .post-font h6,h1.katalog-title,.widget-title,.woocommerce ul.products li.product h3, .cart_totals.calculated_shipping h2, .woocommerce-billing-fields h3, h3#order_review_heading, .woocommerce-shipping-fields h3, #slides .caption1, .home-level2 .cat-title-homepage, .shop-otzyv-home, .entry-box.ab-inspiration-woocommerce-entry .woocommerce ul.products li.product-category.product h3, .woocommerce h2, .woocommerce #reviews h3,#content h1, #content h2, #content h3, #content h4, #content h5, #content h6, .buttonsinvite div.heading, .headerformpost, .form-heading, #content h3 a, #content h1 a, #content h2 a, #content h3 a, #content h4 a, #content h5 a, label.ship-to-different-address-checkbox, .entry-title3 a:link, .entry-title3 a:visited, h3.entry-title1, .heading-title2 p, .heading-title2 span, .heading-title5 p, .heading-title5 span, .heading-title1 p, .heading-title1 span, .heading-title3 p, .heading-title3 span,.heading-title4 p, .heading-title4 span,.heading-title6 p, .heading-title6 span, #grid-container .post-font .cbp-l-grid-projects-title div.entry-title a:link, #grid-container .post-font .cbp-l-grid-projects-title h2.entry-title a:visited, h3.wpcw-course-title a:link, h3.wpcw-course-title a:visited, .sub-form-top div.ab-header, .sub-form-top div.ab-header p, .wpcw_fe_course_title {'; if ( of_get_option('headings_fonts_headers') == 'Avenir Next Cyr') { $css .= 'font-family:Avenir Next Cyr !important;font-weight: 500 !important;';} else { $css .= 'font-family:'. of_get_option('headings_fonts_headers').' !important;font-weight: 400 !important;';} $css .= '} 

#cssmenu > ul > li > a,#cssmenu > ul > li > a,#cssmenu a,#access li a,.cbp-l-filters-alignLeft .cbp-filter-item,body, input, textarea, .page-title span, .pingback a.url, .cbp-l-grid-projects-desc, .cbp-l-grid-blog-desc p,a.more-link,ul.tabbernav li a:hover,  #content  ul.tabbernav li.tabberactive a,  #content  ul.tabbernav li.tabberactive a:hover, #submit, #submit:visited, .submit, .submit:visited, .button, .button:visited, a.comment-reply-link, .pagenavi a, .pagenavi a:link, .pagenavi a:visited, .pagenavi .current, .pagenavi .on, .pagenavi span.pages, .insta-button, .pagenavi span.current, .archiv-title, .woocommerce #respond input#submit, #content .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce div.product .woocommerce-tabs ul.tabs li, #site-description,   .woocommerce ul.cart_list li a:link, .woocommerce ul.product_list_widget li a:link, .woocommerce ul.cart_list li a:visited, .woocommerce ul.product_list_widget li a:visited, .woocommerce ul.cart_list li span,.woocommerce span.onsale, span.onsale, #slides .caption2, #slides .caption3, #sub-form-top-admin .ab-form-button-top-admin div, .sub-form-top input.ab-form-button-top, .sub-form-top .sp-button.ab-form-button-top, .sub-form-footer .sp-button.ab-form-button-top, .home-level2 .shop_cat_desc, #content .home-level3 .abinspiration-product-ads a.ads-homepage, .otzyv-tovar-magazin, .reviewer, div.entry-content.post-font .home-level-posts, #content .woocommerce div.product form.cart table tr td.label a:link, #content .woocommerce div.product form.cart table tr td.label a:visited, .post-font3, h3.entry-title2, div.entry-title5, .entry-title5 a:link, .entry-title5 a:visited, .otzyvy-text, .otzyvy-name, #grid-container2 h2.entry-title a:link, input.button,  #content .wpcw_fe_quiz_submit_data input.fe_btn_completion, a.more-link1,a.more-link2,a.more-link3,a.more-link4,a.more-link5,a.more-link6 , .sub-form-top div.list ul li, .sub-form-top div.description, .sub-form-top div.description p, .sub-form-top div.header-form, .sub-form-top div.header-form p, .sub-form-top .input-form, .sub-form-top .garantia a, .sub-form-top div.header-form p, .wpcw-button.wpcw-button-primary {'; if ( of_get_option('headings_fonts_text') == 'Avenir Next Cyr') { $css .= 'font-family:Avenir Next Cyr !important;font-weight: 400 !important;';} else { $css .= 'font-family:'. of_get_option('headings_fonts_headers').' !important;font-weight: 300 !important;';} $css .= '}

#headercssmenu > ul > li > a,#headercssmenu a  {'; if ( of_get_option('headings_fonts_text') == 'Avenir Next Cyr') { $css .= 'font-family:Avenir Next Cyr !important;font-weight: 500 !important; letter-spacing:2px';} else { $css .= 'font-family:'. of_get_option('headings_fonts_headers').' !important;font-weight: 400 !important;';} $css .= '}

body #footer-widget-area div.widget-title {margin-left:0px !important}
#access .sub-menu ul  {border:1px solid '. $lightColourtwo .' !important}
#access .sub-menu li  {border-bottom:1px solid '. $lightColourtwo .' !important}
#access ul li ul li:hover, .menu ul li ul li:hover{background:'. $lightColourtwo .' !important}';  





if (of_get_option('layout') == '1') { $css .= '#wrapper {width: 100% !important; margin:0 auto;}  #branding, #footer-widget-box {width: 1200px !important;} ';
	
if (of_get_option('menu_position_horizontal') == '1') { $css .= '#access .menu-header, div.menu  {width: auto !important;}' ;} else { $css .= '#access .menu-header, div.menu  {width: 1200px !important;}'; } $css .= '#content-main {'; 
if ( of_get_option('main_width') == '1'){ $css .= 'width:100% !important;';}  else { $css .= 'width:1200px  !important;';}
$css .= '}'; } else { $css .= '#header {position:relative} #wrapper { width: 1200px !important;} #content-main, .sub-form-top, .sub-form-top .bg, #branding, #headermenu, .footer-widget-box, #footer  {width: 100% !important;} #floatmenu { width:1200px !important} #content-main {border:none !important;} #access li:first-child a {border-left:none !important}
	
@media only screen and (max-width: 690px) {
#wrapper {width: 100% !important}
.abinspiration-testimonials-section {width:100%}
.woocommerce ul.products li.product, .woocommerce-page ul.products li.product, .woocommerce-page[class*=columns-] ul.products li.product, .woocommerce[class*=columns-] ul.products li.product, #primary, .widget-testimonial, #headermenu, .footer-widget-box, #footer, #floatmenu {width:100% !important}
.woocommerce ul.products li.product .img-wrap h3 {font-size:1em}
}'; } 
if (of_get_option('menu_width') == '2' ) { $css .= '#access li:first-child a {border-left:none !important} '; }

}
return $css;
}
//
// Reseting cache for regenerate
// -----------------------
function prefix_reset_cache_ell() {
    update_option( 'prefix-has-cached-new', false );
}
// update your classes/framework.class.php because this filter i added now.
add_action( 'optionsframework_option_name', 'prefix_reset_cache_ell' );
add_action( 'catalog_option_name', 'prefix_reset_cache_ell' );
add_action( 'enterpage_option_name', 'prefix_reset_cache_ell' );
add_action( 'wpform_option_name', 'prefix_reset_cache_ell' );
add_action( 'wpform_footer_option_name', 'prefix_reset_cache_ell' );
add_action( 'wpform_slider', 'prefix_reset_cache_ell' );
add_action( 'woocommerce_option_name', 'prefix_reset_cache_ell' );

// add_action( 'customize_save_after', 'prefix_reset_cache_new' ); // for customizer
// add_action( 'save_post', 'prefix_reset_cache_new' ); // for metabox pages/posts