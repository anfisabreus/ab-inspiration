<?php
/**
 * Unit Template Name: Страница с заданием без боковой колонки
 * Template Post Type: course_unit
 * @package WordPress
 * @subpackage Inspiration
 * @since Inspiration 1.0
 */
 __( 'Страница с заданием без боковой колонки', 'inspiration' );
get_header(); ?>
<?php echo ab_inspiration_header(); ?>
<style>

	.wpcw_fe_unit_progress.wpcw_fe_unit_progress_complete .wpcw_checkmark {display:block !important;font-family: "FontAwesome"; content: "\f058"; float:right; font-size:30px;  font-weight:normal; height:20px; width:20px}
.wpcw_fe_unit_progress.wpcw_fe_unit_progress_incomplete:after {font-family: "FontAwesome"; font-weight: 900; content: "\f111"; float:right; font-size:25px; color:#d8d8d8; font-weight:normal}
 .wpcw_widget_progress #wpcw_fe_course {background:#fff} .single-course_unit #primary {float:left;}.single-course_unit #container{float:right !important; width:100%}.single-course_unit #content{width:100%} .single-course_unit #primary {float:left}
#container, #content, .entry-box {width:100%} .content-unit {width:100%; float:right} .single-course_unit #respond {margin-top:60px;} 
@media only screen and (max-width: 1024px) {
  #primary {display:none}
.navbar-6 {display:block; width:100%}
	.navbar.navbar-6 button, .navbar.navbar-6 button:hover {background:transparent !important}
	#body {background:#fff !important}	
.content-unit {width:100%; float:none}
	
.single-unit .navbar-toggler-icon {
  background-image: url("data:image/svg+xml;charset=utf8,%3Csvg viewBox='0 0 32 32' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='rgb(61, 61, 61)' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 8h24M4 16h24M4 24h24'/%3E%3C/svg%3E"); font-size:14px;
}

.single-unit.navbar-toggler {
  border:none;
} 


#container {width:100% !important}


	.navbar .widget.wpcw_course_progress {margin-top:10px}
	.navbar-6 {padding:0px; text-align:left;
}
	
.entry-title.entry-title-single {padding-top:20px}
	
}
	.navbar-toggler:focus {box-shadow: 0 0 0 0;}
	.wpcw_course_progress {max-height: 300px;overflow: scroll; scroll-behavior: smooth;border: 1px solid #eaeaea;}
	.bg-light {
    background-color: transparent!important;
}
	.wpcw_widget_progress {
    padding: 0px;
}
@media only screen and (max-width: 690px) {
	.wpcw_course_progress {max-height: 300px;overflow: scroll; scroll-behavior: smooth;border: 1px solid #eaeaea;}
	.collapse.show {margin:20px}
.navbar.navbar-6 button {	 margin-left:20px }
	.mobile-second-menu {}
	.wpcw_fe_toggle {display:none}
	 }

	.navbar {display: block;}
</style>



<div id="container-full" class="one-column">
<div id="content" role="main" >
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>


<div class="mobile-second-menu">
		
		
		
<nav class="navbar navbar-light bg-light">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span> &nbsp; <span style="color: #000 !important;
    font-size: 20px;">Содержание курса </span>
    </button>
  </div>
</nav>
		
<div class="collapse" id="navbarToggleExternalContent">
<?php the_widget('\\WPCW\\Widgets\\Widget_Course_Progress'); ?>
</div>


<div class="entry-box" itemscope itemtype="http://schema.org/BlogPosting">
<div class="content-unit" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>



<h1 class="entry-title entry-title-single" itemprop="headline"><?php the_title(); ?></h1>

<div class="entry-content">

<div class="post-font" itemprop="articleBody">

<?php the_content(); ?>

</div>
  
    <?php if ( is_user_logged_in() ) { ?>
   <div style="clear:both; padding-top:40px;"><?php comments_template('', true); ?></div> 
   <?php } ?>


</div><!-- .entry-content -->
	
	
 
	
	</div><!-- #post-## -->	
	
	
	
<div style="clear:both;">
	
	
	
	</div>
	


</div> <!-- entry-box --></div><!-- #content -->
<?php endwhile; // end of the loop. ?></div><!-- #container -->	

	
<?php echo ab_inspiration_footer(); ?>

<?php get_footer(); ?>