<?php 
/**
 * The template for displaying Archive pages.
 *
 * @package WordPress
 * @subpackage Inspiration
 * @since Inspiration 1.0
 */


get_header(); ?>

<style>  .post-font {font-size:16px !important;}.entry-box{  margin: 0px 25px 25px 0; overflow:hidden; padding:0px !important;}.entry-box:nth-child(3n+3) {margin: 0px 0px 25px 0;} .entry-box:first-child, .entry-box {padding-top:0px !important;text-align: left;} .entry-box {text-align: left;}#wrapper .entry-box h2 { padding-top:20px !important;line-height: 20px !important;}

	.desc-course,  .entry-title, .progress_under_course	 {padding-left:15px; padding-right:15px}
	.ld_course_grid_price
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
.course-horisontal  .entry-box img {padding-top: 15px;}
.course-horisontal  .progress_under_course{float:right; width:100%;}
.course-horisontal, .course-horisontal.entry-box:first-child {width:100%; padding:15px !important; }
.entry-box.course-horisontal  {padding-top:0px}
.course-horisontal  .wpcw_progress_wrap  {line-height:0px}
.add_to_cart_inline{border:none !important}
.course-horisontal  .woocommerce-Price-amount.amount {margin-right: 10px; !important}
.course-horisontal img {width:30%; float:left;padding-bottom: 0px;padding-top: 0px;margin-right: 30px;}
.entry-box.course-horisontal { margin-right:0px;}
.product.woocommerce.add_to_cart_inline, .fe_btn.fe_btn_completion.btn_completion {float:right} 
.course-horisontal  .entry-content, .course-horisontal  .entry-summary {clear:none;  float:left; width:100% !important}
#wrapper .entry-box.course-horisontal h2 {padding-top:0px !important}
.course-horisontal .entry-content .post-font > *, .course-horisontal .entry-summary .post-font > * {margin: 0px 0;}

.course-horisontal .fe_btn.fe_btn_completion.btn_completion {margin-top:6px; float:right; }
.course-horisontal .product.woocommerce.add_to_cart_inline  {margin-bottom:0px; margin-top:1px; float:right; padding:0px !important  } 


.entry-box.course-horisontal h2, .course-horisontal .entry-content, .course-horisontal .progress_under_course {padding-left: 0px;}

.woocommerce-Price-currencySymbol {font-size:18px}

  #wrapper .entry-box h2 a:link{font-size:20px !important; line-height:1.3 }
 @media (min-width: 992px) {
.col-lg-4 {
    max-width: 31.8%;
  }}
  @media (max-width: 640px) {

     .course-horisontal, .course-horisontal.entry-box:first-child{      margin: 15px !important; }.entry-box:last-child {margin: 15px;}
	  #wrapper #content .course-horisontal.entry-box {border-bottom:1px solid #ccc !important}
	  .course-horisontal  .progress_under_course {width:100%}
	  .course-horisontal  .course-horisontal img {padding-bottom: 15px;}
  }
	
	
  


</style>


		<div id="container-full" class="one-full-common one-column  container">

			<div id="content" role="main" class="row">



<?php
global $ab_wpcourseware;

$values =  $ab_wpcourseware['id_courses'] ;
$abc = '';
foreach((array) $values as $k=>$value) {
        if ($k) $abc .=', ';
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

<div style="padding-bottom:20px !important" class="entry-box <?php if($ab_wpcourseware[checkbox_example] == true) { ?>course-horisontal<?php } else { ?>col-lg-4<?php } ?>">

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>




<div class="post-font">

<?php if (function_exists('abwpwoo_headline_link') && isset($ab_wpcourseware['id_courses_courses_pages']) && isset($ab_wpcourseware['id_courses_pages'])) {
$array1 = $ab_wpcourseware['id_courses_courses_pages'];
$array2 = $ab_wpcourseware['id_courses_pages'];
$array = array_combine($array1, $array2);
$key =  get_the_ID();
$value = $array[$key];

?>
	
<div class="entry-content">

<?php if ( !$course->can_user_access( get_current_user_id() ) ) { ?>
<a href="<?php if ($value !== '') { echo get_site_url().'/?p='. $value; } else { the_permalink()  ; } ?>" title="<?php printf( esc_attr__( ' %s', 'inspiration' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><img src="<?php if ( has_post_thumbnail() ) : ?><?php the_post_thumbnail_url(); ?><?php endif; ?>"></a>

<h2 class="entry-title" itemprop="name headline"><a href="<?php if ($value !== '') { echo get_site_url().'/?p='. $value; } else { the_permalink()  ; } ?>" title="<?php printf( esc_attr__( ' %s', 'inspiration' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2> <?php } else { ?> 

<a href="<?php the_permalink();  ?>" title="<?php printf( esc_attr__( ' %s', 'inspiration' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><img src="<?php if ( has_post_thumbnail() ) : ?><?php the_post_thumbnail_url(); ?><?php endif; ?>"></a>

<h2 class="entry-title" itemprop="name headline"><a href="<?php the_permalink();  ?>" title="<?php printf( esc_attr__( ' %s', 'inspiration' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>

<?php }  


} else { ?> <a href="<?php the_permalink();  ?>" title="<?php printf( esc_attr__( ' %s', 'inspiration' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><img src="<?php if ( has_post_thumbnail() ) : ?><?php the_post_thumbnail_url(); ?><?php endif; ?>"></a>

<h2 class="entry-title" itemprop="name headline"><a href="<?php the_permalink();  ?>" title="<?php printf( esc_attr__( ' %s', 'inspiration' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2> <?php } ?>
	
<?php if($ab_wpcourseware[checkbox_example] == true) {  } else { ?> <div style="clear:both;"></div> <?php } ?>
<?php if($ab_wpcourseware[checkbox_example] == true) { ?> <div class="desc-course" itemprop="description"><?php the_excerpt(); ?></div><?php } else { ?> <div class="desc-course" itemprop="description"><?php the_excerpt(); ?></div><?php } ?>
<?php if($ab_wpcourseware[checkbox_example] == true) {  } else { ?> <div style="clear:both;"></div> <?php } ?>

</div> 



	 <?php 
	
	if ( $course->can_user_access( get_current_user_id() ) ) { ?>
	
	<div class="progress_under_course">
		<?php
	$fe = new WPCW_UnitFrontend( $post );

	echo do_shortcode( ' [wpcourse_progress_bar course="' . $course->get_course_id() . '"]' ); ?>
	<a href="<?php echo the_permalink(); ?> " title="<?php echo the_permalink(); ?>" rel="bookmark" class="more-link" style="margin-top: 0px;float: right; margin-bottom: 20px;padding: 5px 10px;"><?php _e( 'Открыть курс', 'inspiration' ); ?>
	</a>
</div>
	<?php } ?>
	
	

	
	<?php if($ab_wpcourseware[checkbox_example] == true) { ?> <div style="float:right; font-size:20px; margin-right:20px; font-weight:normal; width:100%;"> <?php } else { ?> <div style="font-size:20px; margin-right:20px; font-weight:normal;"> <?php } ?>
	
	
<?php 
															  
															  
														  
															  
															  
															  
															 
$payments_type = $course->get_payments_type();	
if ( ! $course->can_user_access( get_current_user_id() ) ) { ?> <a href="<?php if ($value !== '') { echo get_site_url().'/?p='. $value; } else { the_permalink()  ; } ?> " title="<?php echo the_permalink(); ?>" rel="bookmark"  style="margin-top: 0px; margin-bottom: 0px;padding: 0px; float:right; margin-left:20px"><?php _e( 'Подробнее...', 'inspiration' ); ?>
	</a><div style="clear:both"> </div>
 <?php

if ( $payments_type !== 'free') {

	if (function_exists('abwpwoo_price_wpcourseware_woocommerce') && isset($ab_wpcourseware['id_courses_courses']) && isset($ab_wpcourseware['id_courses_product']) ) 
{ 
$array1 = $ab_wpcourseware['id_courses_courses'];
$array2 = $ab_wpcourseware['id_courses_product'];
$array = array_combine($array1, $array2);
$key =  get_the_ID();
$value = $array[$key];	
echo do_shortcode('[add_to_cart id="'.$value.'"]');  }
else { echo $course->get_payments_price() .' '. wpcw_get_currency_symbol() .' '. $course->get_enrollment_button(); } 

}  else { echo $course->get_enrollment_button(); } }  ?></div>	
</div>

	



	

</div><!-- .entry-content -->
					
</div><!-- #post-## -->

				
<?php } } ?>




			</div><!-- #content --> 
		</div><!-- #container -->
<?php get_footer(); ?>