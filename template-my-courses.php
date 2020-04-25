<?php
/**
 * Template Name: Шаблон страницы "Мои курсы"
 * @package WordPress
 * @subpackage Inspiration
 * @since Inspiration 1.0
 */
 
  __( 'Шаблон страницы "Мои курсы"', 'inspiration' );


get_header(); ?>


<style>  
	

	
	
	
	 .entry-box{  margin: 0px 40px 40px 0;}.entry-box:last-child {margin: 0px 40px 40px 0;} .entry-box h2 { padding-top:30px;}.ld_course_grid_price
{background:#5cb85c;
    box-shadow: 0 1px rgba(0,0,0,0.2);
    -moz-box-shadow: 0 1px rgba(0,0,0,0.2);
    -webkit-box-shadow: 0 1px rgba(0,0,0,0.2);
    color: #fff;
    text-shadow: 0 1px rgba(0,0,0,0.3);
    position: absolute;
    font-size: 14px;
    left: -8px;
    top: 10px;
    padding: 3px 10px;
    z-index: 2;
    font-weight: bold;}
    
    .ld_course_grid_price:before {
    border: 4px solid transparent;
    border-top: 4px solid #348c34;
    border-right: 4px solid #348c34;
    content: "";
    position: absolute;
    left: 0;
    bottom: -8px;
}
.entry-title {padding-left:10px}
  .entry-box h2{font-size:24px !important }
 @media (min-width: 992px) {
.col-lg-4 {
    max-width: 29.8%;
  }}
  @media (max-width: 640px) {

    .entry-box{  margin:15px;}.entry-box:last-child {margin: 15px;}
    .wpcw_progress {height:5px; width:100%}
    .page-template-template-my-courses .wpcw_course img {float: left; width: 80px;margin-right: 20px;}
	.page-template-template-my-courses #wrapper  h3.entry-title  a { font-size: 20px !important ; text-align:left;padding-left:0px}
	.page-template-template-my-courses #wrapper  h3.entry-title {padding-left:0px}
	.page-template-template-my-courses .entry-box:first-child, .page-template-template-my-courses .entry-box {text-align:left !important}
	.page-template-template-my-courses  #wrapper #content .entry-box {padding:0px; width:100%}
	.wpcw_progress_percent {margin-left:0px; font-size:14px;color:#666}
	.image-course {width:70px; height: 70px;float:left; margin-right:20px}
	#wrapper .wpcw_course h3.entry-title a {
    font-size: 16px !important;
    letter-spacing: 0px !important;
		color: #000 !important; line-height: 1.2 !important;}
	.page-template-template-my-courses #wrapper h3.entry-title {
    padding-left: 0px;
    line-height: 0 !important;
		margin-top:0px; margin-bottom:5px
}
  }
  


</style>


		<div id="container-full" class="one-full-common one-column  container">

			<div id="content" role="main" class="row">
				
   
 
<?php 
global $ab_wpcourseware, $course;
$values =  $ab_wpcourseware['id_courses'] ;
$abc = '';
foreach($values as $k=>$value){
        if($k) $abc .=', ';
        $abc .= $value;
	
    }
 
$arr = explode(',', $abc);

$args = array(
 'posts_per_page'      => 60, 
 'post_type'     => 'wpcw_course', 
 'key' => 'views',
 'orderby' => 'meta_value_num', 
 'order'    => 'ASC',
 'post_status' => 'publish',
 'post__not_in' => $arr
);			
$query = new WP_Query( $args );
if ( $query->have_posts() ) { while ( $query->have_posts() ) { $query->the_post(); ?>

<div class="entry-box  col-lg-4">				

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	
	
 <?php 
	
if ( $course->can_user_access( get_current_user_id() ) ) { ?>

<div class="image-course"><img src="<?php if ( has_post_thumbnail() ) : ?><?php the_post_thumbnail_url(); ?><?php endif; ?>"> </div>

<div style="width:70%; float: left;">
<h3 class="entry-title" itemprop="name headline"><a href="<?php echo the_permalink();  ?>" title="<?php printf( esc_attr__( ' %s', 'inspiration' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h3>



<div class="progress_under_course">
		<?php echo do_shortcode( '[wpcourse_progress courses="' . $course->get_course_id() . '" show_title="false" user_progress="true" ]'); ?>
	
</div>
</div>


<?php } else { echo "Чтобы увидеть свои курсы, вы должны войти"; } ?>



					
</div><!-- #post-## -->
</div>
				
<?php } } ?>


			</div><!-- #content --> 
		</div><!-- #container -->
<?php get_footer(); ?>