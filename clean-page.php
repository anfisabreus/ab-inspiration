<?php
/**
 * Template Name: Чистая страница
 * @package WordPress
 * @subpackage Inspiration
 * @since Inspiration 1.0
 */
 __( 'Чистая страница', 'inspiration' );
 ?><!DOCTYPE html>
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

</head>
<body  class="body">

<div id="wrapper" class="hfeed" style="border:none !important; background:transparent !important">
<div id="main" style="border:none !important; background:transparent !important">
<div id="container-full" class="one-column" style="border:none !important; background:transparent !important">
<div id="content" role="main" style="border:none !important; background:transparent !important">
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
<div class="entry-box" style="margin-top:15px !important; padding: 0px 0px !important;border:none !important; background:transparent !important"><div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<div class="entry-content" style="border:none !important; background:transparent !important">
<div class="post-font" style="border:none !important; background:transparent !important">



<?php the_content(); ?>
</div>
<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Страницы:', 'inspiration' ), 'after' => '</div>' ) ); ?>


<?php edit_post_link( __( 'Изменить', 'inspiration' ), '<span class="edit-link">', '</span>' ); ?>
</div><!-- .entry-content -->
</div><!-- #post-## -->
<?php comments_post(); ?>
<?php endwhile; ?>
</div><!-- #content --> </div>
</div><!-- #container -->
</div><!-- #main -->

</div><!-- #wrapper -->

<?php wp_footer(); ?>


<?php if (of_get_option('google_analytics') == !''){?>
<script>(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)})(window,document,'script','//www.google-analytics.com/analytics.js','ga'); ga('create', '<?php echo of_get_option('google_analytics');?>', 'auto'); ga('send', 'pageview');</script>
<?php }?>
<?php if (of_get_option('yandex_analytics') == !''){?>
<script type="text/javascript">(function (d, w, c) { (w[c] = w[c] || []).push(function() { try { w.yaCounter<?php echo of_get_option('yandex_analytics');?> = new Ya.Metrika({id:<?php echo of_get_option('yandex_analytics');?>, webvisor:true, clickmap:true, trackLinks:true, accurateTrackBounce:true}); } catch(e) { } }); var n = d.getElementsByTagName("script")[0], s = d.createElement("script"), f = function () { n.parentNode.insertBefore(s, n); }; s.type = "text/javascript"; s.async = true; s.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//mc.yandex.ru/metrika/watch.js"; if (w.opera == "[object Opera]") { d.addEventListener("DOMContentLoaded", f, false); } else { f(); } })(document, window, "yandex_metrika_callbacks");</script><noscript><div><img src="//mc.yandex.ru/watch/<?php echo of_get_option('yandex_analytics');?>" style="position:absolute; left:-9999px;" alt=""></div></noscript>
<?php }?>
</body>
</html>