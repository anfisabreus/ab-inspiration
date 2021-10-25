<?php
/**
 * Display Courses.
 *
 * This template can be overridden by copying it to yourtheme/wp-courseware/courses.php.
 *
 * @package WPCW
 * @subpackage Templates
 * @version 4.3.0
 */

// Exit if accessed directly

	defined( 'ABSPATH' ) || exit;
?>

<style>  .post-font {font-size:16px !important;}.entry-box{ float:left;  margin: 0px 25px 25px 0; overflow:hidden; padding:0px !important;}.entry-box:nth-child(3n+1) {margin: 0px 0px 25px 0;} .entry-box:first-child, .entry-box {padding-top:0px !important;text-align: left;} .entry-box {text-align: left;}.entry-box h2 { padding-top:20px !important;line-height: 20px !important;}

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
 .entry-box.course-horisontal h2 {padding-top:0px !important}
.course-horisontal .entry-content .post-font > *, .course-horisontal .entry-summary .post-font > * {margin: 0px 0;}

.course-horisontal .fe_btn.fe_btn_completion.btn_completion {margin-top:6px; float:right; }
.course-horisontal .product.woocommerce.add_to_cart_inline  {margin-bottom:0px; margin-top:1px; float:right; padding:0px !important  } 


.entry-box.course-horisontal h2, .course-horisontal .entry-content, .course-horisontal .progress_under_course {padding-left: 0px;}

.woocommerce-Price-currencySymbol {font-size:18px}

.entry-box h2 a:link{font-size:20px !important; line-height:1.3 }
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

	
<?php


?>
	
	<?php
	/** @var \WPCW\Models\Course $course */
	foreach ( $courses as $course ) { ?>
	<div style="padding-bottom:20px !important" class="entry-box col-lg-4">

<div class="post-font">
		<div class="entry-content"><?php
			global $ab_wpcourseware;
	if (function_exists('abwpwoo_headline_link') && isset($ab_wpcourseware['id_courses_courses_pages']) && isset($ab_wpcourseware['id_courses_pages'])) {
$array1 = $ab_wpcourseware['id_courses_courses_pages'];
$array2 = $ab_wpcourseware['id_courses_pages'];
$array = array_combine($array1, $array2);
$key =  $course->get_course_post_id();
$value = $array[$key];	


	
 if ( !$course->can_user_access( get_current_user_id() ) ) { 

 if ($value == '0') { ?>
<a href=" <?php echo $course->get_permalink();  ?>"><?php echo $course->get_thumbnail_image(); ?></a>
<h2 class="entry-title" itemprop="name headline"><a href="<?php $course->get_permalink();   ?>"><?php echo $course->get_course_title();  ?></a></h2> 

<a href="<?php echo $course->get_permalink(); ?>"  style="margin-top: 0px; margin-bottom: 0px;padding: 0px; float:right; margin-left:20px"><?php _e( 'Подробнее...', 'inspiration' ); ?>
	</a>
	
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

}  else { echo $course->get_enrollment_button(); }
	
	
 } 
	
	else { ?>


<a href=" <?php echo get_site_url().'/?p='. $value;  ?>"><?php echo $course->get_thumbnail_image(); ?></a>
<h2 class="entry-title" itemprop="name headline"><a href="<?php echo get_site_url().'/?p='. $value;   ?>"><?php echo $course->get_course_title();  ?></a></h2>

<a href="<?php echo get_site_url().'/?p='. $value;  ?>"  style="margin-top: 0px; margin-bottom: 0px;padding: 0px; float:right; margin-left:20px"><?php _e( 'Подробнее...', 'inspiration' ); ?>
	</a>
	<div style="clear:both"> </div>
	
<?php	$payments_type = $course->get_payments_type();	 if ( $payments_type !== 'free') {

	if (function_exists('abwpwoo_price_wpcourseware_woocommerce') && isset($ab_wpcourseware['id_courses_courses']) && isset($ab_wpcourseware['id_courses_product']) ) 
{ 
$array1 = $ab_wpcourseware['id_courses_courses'];
$array2 = $ab_wpcourseware['id_courses_product'];
$array = array_combine($array1, $array2);
$key =  get_the_ID();
$value = $array[$key];	
echo do_shortcode('[add_to_cart id="'.$value.'"]');  }
else { echo $course->get_payments_price() .' '. wpcw_get_currency_symbol() .' '. $course->get_enrollment_button(); } 

}  else { echo $course->get_enrollment_button(); }

 } 
	
  } 
	 
 if ( $course->can_user_access( get_current_user_id() ) ) {    if ($value == '0') { ?>
<a href=" <?php echo $course->get_permalink();  ?>"><?php echo $course->get_thumbnail_image(); ?></a>
<h2 class="entry-title" itemprop="name headline"><a href="<?php echo $course->get_permalink();  ?>"><?php echo $course->get_course_title();  ?></a></h2> 	


<div class="progress_under_course">
		<?php


	echo do_shortcode( ' [wpcourse_progress_bar course="' . $course->get_course_id() . '"]' ); ?>
	<a href="<?php echo $course->get_permalink();  ?>" class="more-link" style="margin-top: 0px;float: right; margin-bottom: 20px;padding: 5px 10px;"><?php _e( 'Открыть курс', 'inspiration' ); ?>
	</a><div style="clear:both"> </div>
</div>







<?php } 
	
	else { ?>


<a href=" <?php echo get_site_url().'/?p='. $value;  ?>"><?php echo $course->get_thumbnail_image(); ?></a>
<h2 class="entry-title" itemprop="name headline"><a href="<?php echo get_site_url().'/?p='. $value;   ?>"><?php echo $course->get_course_title();  ?></a></h2>
<div class="progress_under_course">
		<?php


	echo do_shortcode( ' [wpcourse_progress_bar course="' . $course->get_course_id() . '"]' ); ?>
	<a href="<?php echo $course->get_permalink();  ?>" class="more-link" style="margin-top: 0px;float: right; margin-bottom: 20px;padding: 5px 10px;"><?php _e( 'Открыть курс', 'inspiration' ); ?>
	</a>
</div>

<?php  } 
	 
	 }
	 
	 }  ?>
			
</div></div></div>
	<?php }  ?>
