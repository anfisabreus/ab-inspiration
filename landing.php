<?php
/**
 * Template Name:  Целевая страница
 * @package WordPress
 * @subpackage Inspiration
 * @since Inspiration 1.0
 */
 
 __( 'Целевая страница', 'inspiration' );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta name=viewport content="width=device-width, maximum-scale=1.0">
<meta charset="<?php bloginfo( 'charset' ); ?>">
<title><?php bloginfo('name'); ?> | <?php is_home() ? bloginfo('description') : wp_title(''); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" >
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('stylesheet_url'); ?>">
<style><?php if (of_get_option('blog_template') == "right-side") {?>
#container { float: left; } #content { padding-top:0px; margin-bottom: 36px;} #primary, #secondary {float: left; overflow: hidden; width: 360px; } .widget-container {margin: 0px 0px 20px 10px;} #form-background {margin-left:10px !important;} #content {margin-left: 0px;} .one-column #content {margin: 0 auto; width: 1000px; }<?php }  else {?>
#container {float: right; margin-right:0px;} #content {padding-top:0px; margin-bottom: 36px;} #primary, #secondary {float: right; overflow: hidden; width: 360px;} .widget-container {margin: 0px 10px 20px 0px;} #form-background {margin-left:1px !important;} #content {margin-left: 0px;} .one-column #content {margin: 0 auto; width: 1000px;}<?php } ?></style><?php if (function_exists('header_css_style'))  header_css_style();  ?>

<link rel="shortcut icon" href="<?php echo of_get_option('favicon');?>">


<?php echo of_get_option('metatag', '' ); ?>
<?php if ( is_singular() && get_option( 'thread_comments' ) )
wp_enqueue_script( 'comment-reply' );
?>
<meta property="og:title" content="<?php the_title(); ?>">
<meta property="og:type" content="article">
<meta property="og:url" content="<?php the_permalink() ?>">
<meta property="og:description" content="<?php while(have_posts()):the_post(); $out_excerpt = str_replace(array("\r\n", "\r", "\n", "'" ,"\""), "", get_the_excerpt()); echo apply_filters('new_length', $out_excerpt); endwhile; ?>" />
<meta property="og:site_name" content="<?php bloginfo('name') ?>">
<meta property="fb:app_id" content="<?php echo of_get_option('facebook_app');?>"/>
<meta property="og:locale" content="ru_RU">
<meta name="twitter:site" content="@<?php echo of_get_option('twitter');?>">
<meta name="twitter:creator" content="@<?php echo of_get_option('twitter');?>">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="<?php the_title(); ?>">
<meta name="twitter:description" content="<?php while (have_posts()):the_post(); $out_excerpt = str_replace(array("\r\n", "\r", "\n", "'" ,"\""), "", get_the_excerpt()); echo apply_filters('new_length', $out_excerpt); endwhile; ?>">
<?php if(!has_post_thumbnail( $post->ID )) { $default_image=of_get_option('facebook_image'); echo '<meta name="thumbnail" content="' . $default_image . '" /><meta name="twitter:image:src" content="' . $default_image . '"><meta property="og:image" content="' . $default_image . '">'; } else { $thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); echo '<meta name="thumbnail" content="' . esc_attr( $thumbnail_src[0] ) . '" /><meta name="twitter:image:src" content="' . esc_attr( $thumbnail_src[0] ) . '"><meta property="og:image" content="' . esc_attr( $thumbnail_src[0] ) . '">'; } echo "\n";  

wp_head(); ?>

<?php if (of_get_option('vk_app') !== '') {?>
<script>
if (screen && screen.width > 514) {
  document.write('<script type="text/javascript" src="//vk.com/js/api/openapi.js?169"><\/script>');
}
</script><?php } ?>

</head>
<body  class="body">

<?php if (of_get_option('facebook_app') !== '') {?>
<div id="fb-root"></div> 
<script>
if (screen && screen.width > 514) {
  document.write('<script>(function(d, s, id) {var js, fjs = d.getElementsByTagName(s)[0];if (d.getElementById(id)) {return;}js = d.createElement(s); js.id = id;js.async=true; js.src = "//connect.facebook.net/ru_RU/all.js#xfbml=1&appId=<?php echo of_get_option('facebook_app');?>";fjs.parentNode.insertBefore(js, fjs);}(document, \'script\', \'facebook-jssdk\'));<\/script>');
}
</script><?php } ?>
<div id="wrapper" class="hfeed">
<div id="main">
<div id="container-full" class="one-column">
<div id="content" role="main">
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
<div class="entry-box" style="margin-top:15px !important"><div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<div class="entry-content">
<div class="post-font">


<?php $custom = get_post_custom($post->ID);
if($custom['post_button_top'][0] == 0): ?>  
<?php if (of_get_option('share_display') ['3'] == '1' ) { echo social_likes(); }  ?>
<?php endif; ?>

<?php the_content(); ?>
</div>
<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Страницы:', 'inspiration' ), 'after' => '</div>' ) ); ?>

<?php $custom = get_post_custom(get_the_ID(),'post_share_bottom', true);
if($custom['post_share_bottom'][0] == 0 ) : ?>
<div style="clear:both"></div>
<?php if (of_get_option('share_display_bottom') ['3'] == '1' ) { echo social_likes_bottom(); } ?>
<div style="clear:both"></div>
<?php endif; ?>

<?php edit_post_link( __( 'Изменить', 'inspiration' ), '<span class="edit-link">', '</span>' ); ?>
</div><!-- .entry-content -->
</div><!-- #post-## -->
<?php comments_post(); ?>
<?php endwhile; ?>
</div><!-- #content --> </div>
</div><!-- #container -->
</div><!-- #main -->
<div id="landing-menu">
<div class="landing-menu-ul">
<?php
if ( has_nav_menu( 'footerlanding' ) ) {
    // User has assigned menu to this location;
    // output it
    wp_nav_menu( array( 'container_class' => 'menu-footerlanding', 'theme_location' => 'footerlanding') );
}

?>
</div>
</div>
</div><!-- #wrapper -->
<script type="text/javascript" src="<?php bloginfo('url'); ?>/wp-content/themes/ab-inspiration/inc/js/jquery-all.js"> </script>
<?php wp_footer(); ?>


<script type="text/javascript">$(document).ready(function() {$( "div.gallery" ).find( "a" ).attr("rel","fancybox");$("a[href$='.jpg'], a[href$='.jpeg'], a[href$='.gif'], a[href$='.png'], a.group").fancybox({'nextEffect'	:	'fade','prevEffect'	:	'fade','overlayOpacity' :  0.8,'overlayColor' : '#000000','arrows' : true,'openEffect'	: 'elastic','closeEffect'	: 'elastic',});});</script>



<script type="text/javascript"> $(document).ready(function() { $(".fancybox").fancybox({
    helpers: {
        title: {
            type: 'under'
        }
    },
    beforeShow: function () {
         this.title = $(this.element).find("img").attr("alt");
    },
    iframe: {
        preload: false
    },
    // Increase left/right margin for iframe content
    margin: [20, 60, 20, 60]
});


});</script>

<script type="text/javascript"> $(document).ready(function() { $('a[rel^="attachment"]').attr('class', 'fancybox');
$('a[rel^="fancybox"]').attr('class', 'fancybox');
});</script>




<?php if (is_singular() && of_get_option('comments_tabber') == true && of_get_option('vk_app') !== '') { ?>
<script type="text/javascript">VK.init({apiId: <?php echo of_get_option('vk_app');?>, onlyWidgets: true});</script>
<script type="text/javascript">VK.Widgets.Comments("vk_comments", {limit: 20, width: "auto", attach: "*"});</script>
<?php } ?>
<?php if (of_get_option('google_analytics') == !''){?>
<script>(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)})(window,document,'script','//www.google-analytics.com/analytics.js','ga'); ga('create', '<?php echo of_get_option('google_analytics');?>', 'auto'); ga('send', 'pageview');</script>
<?php }?>
<?php if (of_get_option('yandex_analytics') == !''){?>
<script type="text/javascript">(function (d, w, c) { (w[c] = w[c] || []).push(function() { try { w.yaCounter<?php echo of_get_option('yandex_analytics');?> = new Ya.Metrika({id:<?php echo of_get_option('yandex_analytics');?>, webvisor:true, clickmap:true, trackLinks:true, accurateTrackBounce:true}); } catch(e) { } }); var n = d.getElementsByTagName("script")[0], s = d.createElement("script"), f = function () { n.parentNode.insertBefore(s, n); }; s.type = "text/javascript"; s.async = true; s.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//mc.yandex.ru/metrika/watch.js"; if (w.opera == "[object Opera]") { d.addEventListener("DOMContentLoaded", f, false); } else { f(); } })(document, window, "yandex_metrika_callbacks");</script><noscript><div><img src="//mc.yandex.ru/watch/<?php echo of_get_option('yandex_analytics');?>" style="position:absolute; left:-9999px;" alt=""></div></noscript>
<?php }?>
</body>
</html>