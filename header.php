<?php /**
 * @package WordPress
 * @subpackage Inspiration
 * @since Inspiration 1.0
 */ ?>
<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?> prefix="fb: http://www.facebook.com/2008/fbml">
<!--<![endif]-->
<head>
<meta name=viewport content="user-scalable=0, initial-scale=1.0">
<meta charset="<?php bloginfo( 'charset' ); ?>">
<title><?php bloginfo('name'); ?> | <?php is_home() ? bloginfo('description') : wp_title('&laquo;', true, 'right'); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" >
<link rel="EditURI" type="application/rsd+xml" title="RSD" href="<?php bloginfo('url'); ?>/xmlrpc.php?rsd" />
<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
<link rel="alternate" type="application/atom+xml" title="Atom 1.0" href="<?php bloginfo('atom_url'); ?>" />

<?php echo of_get_option('metatag', '' ); ?>
<?php if (is_home() ||  is_page_template('enterpage.php')) { ?><meta property="og:title" content="<?php echo of_get_option('blog_title'); ?>">
<meta property="og:type" content="website">	
<meta property="og:url" content="<?php bloginfo('url') ?>">
<meta property="og:image" content="<?php echo of_get_option('facebook_image'); ?>">
<meta property="og:description" content="<?php bloginfo('description') ?>"> 
<meta name="twitter:image" content="<?php echo of_get_option('facebook_image'); ?>">
<meta name="twitter:site" content="@<?php echo of_get_option('twitter');?>">
<meta name="twitter:creator" content="@<?php echo of_get_option('twitter');?>">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="<?php the_title(); ?>">
<meta name="twitter:description" content="<?php while(have_posts()):the_post(); $out_excerpt = str_replace(array("\r\n", "\r", "\n", "'" ,"\""), "", get_the_excerpt()); echo apply_filters('new_length', $out_excerpt); endwhile; ?>">
<?php } else {?>
<meta property="og:title" content="<?php the_title(); ?>">
<meta property="og:type" content="article">
<meta property="og:url" content="<?php the_permalink() ?>">
<meta property="og:description" content="<?php while(have_posts()):the_post(); $out_excerpt = str_replace(array("\r\n", "\r", "\n", "'" ,"\""), "", get_the_excerpt()); echo apply_filters('new_length', $out_excerpt); endwhile; ?>" />
<meta property="og:site_name" content="<?php bloginfo('name') ?>">
<meta property="fb:app_id" content="<?php echo of_get_option('facebook_app');?>"/>
<meta name="twitter:site" content="@<?php echo of_get_option('twitter');?>">
<meta name="twitter:creator" content="@<?php echo of_get_option('twitter');?>">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="<?php the_title(); ?>">
<meta name="twitter:description" content="<?php while (have_posts()):the_post(); $out_excerpt = str_replace(array("\r\n", "\r", "\n", "'" ,"\""), "", get_the_excerpt()); echo apply_filters('new_length', $out_excerpt); endwhile; ?>">
<?php if(!has_post_thumbnail( $post->ID )) { $default_image=of_get_option('facebook_image'); echo '<meta name="thumbnail" content="' . $default_image . '" /><meta name="twitter:image:src" content="' . $default_image . '"><meta property="og:image" content="' . $default_image . '">'; } else { $thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); echo '<meta name="thumbnail" content="' . esc_attr( $thumbnail_src[0] ) . '" /><meta name="twitter:image:src" content="' . esc_attr( $thumbnail_src[0] ) . '"><meta property="og:image" content="' . esc_attr( $thumbnail_src[0] ) . '">'; } echo "\n"; ?><?php } ?>
<meta name="twitter:image:width" content="435">
<meta name="twitter:image:height" content="375">

<?php wp_head(); ?>
<?php if (of_get_option('vk_app') !== '' && !is_page_template('enterpage.php')  ) { ?>
<script type="text/javascript" src="//vk.com/js/api/openapi.js?146"></script><?php } ?>

<?php if (is_page_template('testimonials-page.php'))  { ?>
<script defer="defer" src='https://www.google.com/recaptcha/api.js'></script><?php } ?>

<?php if (of_get_option('fbpixel') !== '') { ?>
<script>
!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
document,'script','https://connect.facebook.net/en_US/fbevents.js');

fbq('init', '<?php echo of_get_option('fbpixel'); ?>');
fbq('track', "PageView");
<?php $custom = get_post_custom($post->ID);
if($custom['ViewContent'][0] == 1 ): ?> fbq('track', 'ViewContent'); <?php endif; ?>
<?php $custom = get_post_custom($post->ID);
if($custom['Search'][0] == 1 ): ?> fbq('track', 'Search');<?php endif; ?>
<?php $custom = get_post_custom($post->ID);
if($custom['AddToCart'][0] == 1 ): ?> fbq('track', 'AddToCart'); <?php endif; ?>
<?php $custom = get_post_custom($post->ID);
if($custom['AddToWishlist'][0] == 1 ): ?> fbq('track', 'AddToWishlist'); <?php endif; ?>
<?php $custom = get_post_custom($post->ID);
if($custom['InitiateCheckout'][0] == 1 ): ?>  fbq('track', 'InitiateCheckout'); <?php endif; ?>
<?php $custom = get_post_custom($post->ID);
if($custom['AddPaymentInfo'][0] == 1 ): ?>  fbq('track', 'AddPaymentInfo'); <?php endif; ?>
<?php $custom = get_post_custom($post->ID);
if($custom['Purchase'][0] == 1 ): ?> fbq('track', 'Purchase'); <?php endif; ?>
<?php $custom = get_post_custom($post->ID);
if($custom['Lead'][0] == 1 ): ?>  fbq('track', 'Lead'); <?php endif; ?>
<?php $custom = get_post_custom($post->ID);
if($custom['CompleteRegistration'][0] == 1 ): ?> fbq('track', 'CompleteRegistration'); <?php endif; ?>

</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=<?php echo of_get_option('fbpixel'); ?>&ev=PageView&noscript=1"></noscript>

<?php } ?>

</head>
<body <?php body_class(); ?> id="body" itemscope="" itemtype="http://schema.org/Blog">
<meta itemprop="description" content="<?php bloginfo('description') ?>">
<?php if (is_page_template('enterpage.php')) { homepage_background(); } ?>
<?php if (of_get_option('facebook_app') !== '') {?>
<div id="fb-root"></div> 
<script>
if (screen && screen.width > 514) {
  document.write('<script>(function(d, s, id) {var js, fjs = d.getElementsByTagName(s)[0];if (d.getElementById(id)) {return;}js = d.createElement(s); js.id = id;js.async=true; js.src = "//connect.facebook.net/<?php if (get_locale() == 'ru_RU') {?>ru_RU<?php } else {?>en_US<?php }?>/sdk.js#xfbml=1&version=v2.12&appId=<?php echo of_get_option('facebook_app');?>&autoLogAppEvents=1";fjs.parentNode.insertBefore(js, fjs);}(document, \'script\', \'facebook-jssdk\'));<\/script>');
}
</script><?php } ?>
<div id="wrapper" class="hfeed">
<?php if (of_get_option('menu_position') == '1' && of_get_option('menu_show') == '1') { ?>
<div id="access" style="vertical-align:bottom"> <?php wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'primary' ) ); ?> </div> <?php ;} ?>
<div id="header" itemscope="" itemtype="http://schema.org/WPHeader">

<?php if (of_get_option('headermenu') == '1' && of_get_option('headermenu') == '1') {?>
<div id="headermenu"><div class="headermenu-ul"><div class="headermenu-bgg"><div class="headermenu-inside"><div style="width:1000px; display: table-cell; text-align:right; vertical-align:middle"><?php if ( has_nav_menu( 'headermenu' ) ){ wp_nav_menu( array( 'container_id' => 'headercssmenu', 'theme_location' => 'headermenu') ); } ?></div></div></div></div></div>
<?php } ?>
<div id="masthead"><div id="branding">


<!-- A grey horizontal navbar that becomes vertical on small screens -->
<nav class="navbar navbar-expand-md navbar-dark">
	
  <div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
   <?php if ( has_nav_menu( 'mobile' ) ){ wp_nav_menu( array( 'theme_location' => 'mobile', 'depth'  => 0, 'menu_class' => 'navbar-nav', 'walker'  => new Bootstrap_Walker_Nav_Menu()) ); } ?>
</div>

<!-- Use any element to open the sidenav -->
<span onclick="openNav()"><span class="navbar-toggler-icon" style="float:left;margin-left:20px; margin-right: 20px;"></span></span>	


	
	
	<div class="mobile-logo">
		
  <!-- Brand -->
  <?php if (of_get_option('logo_yes_mobile') == '1') { echo '<a href="'. home_url( '/' ).'" class="mobile-image-link"><img src="'. of_get_option('logo_image_mobile', 'no entry' ).' "  class="mobile-image-logo" alt=""></a>';} else { ?> 
<h2 id="site-title" style="width:70%;    margin: 0 auto; position:relative; z-index:4;"><a href="<?php echo home_url( '/' ); ?>"><?php bloginfo( 'name' ); ?></a></h2>
<?php if (of_get_option('header_mobile_desc') == '1') { ?>
<div id="site-description" style="margin-top:0px;margin-left:4px; position:relative;z-index:4;width:70%;margin: 0 auto; text-align:center"> <?php bloginfo( 'description' ); ?></div><?php } ?><?php } ?> 
	</div>
 
 <?php if ( is_plugin_active( 'woocommerce/woocommerce.php' ) ) { ?>
<div style="margin-left: 10px;"><a class="cart-contents" href="<?php echo wc_get_cart_url(); ?>" title="">
							
								
<span class="count"><?php echo wp_kses_data( sprintf( _n( '%d', '%d', WC()->cart->get_cart_contents_count(), 'storefront' ), WC()->cart->get_cart_contents_count() ) ); ?></span>

</a>
</div>
 <?php  } ?>


</nav>

<div class="head-style" style="<?php if (of_get_option('logo_center') == 1 ) { ?>text-align:center; <?php } ?>">

<div class="head-height" style="<?php if (of_get_option('logo_center') == 0 ) { ?> float:left; position:relative;<?php }  ?>">


<?php if (of_get_option('logo_yes') == '1') { ?> <a href="<?php echo home_url( '/' );?>"><img src="<?php echo of_get_option('logo_image', 'no entry' );?> " class="headerimagemobile" style="padding-top:<?php echo of_get_option('logo_image_top');?>px; padding-left:<?php echo of_get_option('logo_image_left', 'no entry');?>px; position:relative; z-index:4" alt="<?php echo get_bloginfo( 'name' );?>" title="<?php echo get_bloginfo( 'name' );?>"></a> <?php  if (!is_home() && !is_front_page()) { } else { ?> <h1 class="image-logo-h1"><?php echo get_bloginfo( 'name' ); ?></h1> <?php } } 

else { ?> 
<div class="logo-head">
<?php if (!is_home() && !is_front_page()) { ?>
<div id="site-title" style="padding-top:<?php echo of_get_option('logo_top');?>px; margin-left:<?php if (of_get_option('logo_center') == 0 ) { echo of_get_option('logo_left');?>px; <?php } else { ?>  0px;<?php } ?>position:relative; z-index:4"><a href="<?php echo home_url( '/' ); ?>"><?php bloginfo( 'name' ); ?></a></div>
<?php } else { ?> 
<h1 id="site-title" style="padding-top:<?php echo of_get_option('logo_top');?>px;margin-left:<?php if (of_get_option('logo_center') == 0 ) {  echo of_get_option('logo_left');?>px; <?php } else { ?>  0px;<?php } ?> position:relative; z-index:4"><a href="<?php echo home_url( '/' ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
<?php } ?>
<div id="site-description" style="padding-top:<?php echo of_get_option('desk_text_top');?>px;margin-left:<?php if (of_get_option('logo_center') == 0 ) {  echo of_get_option('desk_text_left');?>px;<?php } else { ?> margin-left: 0px;<?php } ?> position:relative; z-index:4"> <?php bloginfo( 'description' ); ?></div></div><?php } ?></div>

<?php get_sidebar('header'); ?></div>
</div></div></div>

<?php if (of_get_option('menu_position') == '0' && of_get_option('menu_show') == '1') { ?><div id="access" style="vertical-align:bottom"><?php wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'primary' ) );   ?></div><?php ;}?>

<div style="clear:both"></div>


<?php if (of_get_option('floatmenu') == '1') {  ?><div id="floatmenu" style="display:none"><div class="floatmenu-ul"><div class="floatmenu-bgg"><div class="floatmenu-inside"><div class="floatmenu-inside-two"><?php if (of_get_option('floatlogo') !== '') { ?> <div style="display:table-cell; vertical-align: middle;"><a href="<?php echo of_get_option('floatlogo_link');?>" class="link-bunner"><img src="<?php echo of_get_option('floatlogo');?>" style="padding:0px;"></a></div><?php } ?><?php if ( has_nav_menu( 'floatmenu' ) ) { wp_nav_menu(array('container_id' => 'cssmenu', 'theme_location' => 'floatmenu', 'walker' => new CSS_Menu_Maker_Walker()) ); } ?></div></div></div></div></div><?php } ?>

<?php global $sub_slides; if ($sub_slides['slide_first'] == '1') { if (function_exists('ab_sub_form'))  ab_sub_form();  if (function_exists('ab_sub_slides'))  ab_sub_slides(); } else  { if (function_exists('ab_sub_slides'))  ab_sub_slides();  if (function_exists('ab_sub_form'))  ab_sub_form();  } ?>

<?php if (of_get_option('menu_position') == '2' && of_get_option('menu_show') == '1') { ?>
<div id="access" style="vertical-align:bottom"> <?php wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'primary' ) ); ?> </div> <?php ;} ?>