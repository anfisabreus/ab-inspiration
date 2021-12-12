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

<div id="content-main"><div id="main">

<style>  .post-font {font-size:16px !important;}.entry-box{  margin: 0px 25px 25px 0; overflow:hidden; padding:0px !important;} .entry-box:nth-child(3n+3) {margin: 0px 0px 25px 0;} .entry-box:first-child, .entry-box {padding-top:0px !important;text-align: left;} .entry-box {text-align: left;}#wrapper .entry-box h2 {line-height: 20px !important;}.one-column #content {width:100%}
#content-main {background:transparent !important}
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
.one-column .entry-box {padding-left:0px!important; padding-right:0px !important}
.course-horisontal  .entry-box img {padding-top: 15px;}
.course-horisontal  .progress_under_course{float:right; width:100%;}
.course-horisontal, .course-horisontal.entry-box:first-child {width:100%; padding:15px !important; }
.entry-box.course-horisontal  {padding-top:0px}
.course-horisontal  .wpcw_progress_wrap  {line-height:0px}
.add_to_cart_inline{border:none !important}
.course-horisontal  .woocommerce-Price-amount.amount {margin-right: 10px; !important}
.course-horisontal img {width:30%; float:left;padding-bottom: 0px;padding-top: 0px;margin-right: 30px;}
.entry-box.course-horisontal { margin-right:0px;}
.fe_btn.fe_btn_completion.btn_completion {float:left} 
.wpcw-button.wpcw-button-primary, .fe_btn.fe_btn_completion.btn_completion {
    padding: 8px 10px; margin-left:15px
}
#content a.wpcw-button.wpcw-button-primary, a.fe_btn.fe_btn_completion.btn_completion {font-size:16px !important}
.course-horisontal  .entry-content, .course-horisontal  .entry-summary {clear:none;  float:left; width:100% !important}
#wrapper .entry-box.course-horisontal h2 {padding-top:0px !important}
.course-horisontal .entry-content .post-font > *, .course-horisontal .entry-summary .post-font > * {margin: 0px 0;}

.course-horisontal .fe_btn.fe_btn_completion.btn_completion {margin-top:6px; float:right; }
.course-horisontal .product.woocommerce.add_to_cart_inline  {margin-bottom:0px; margin-top:1px; float:right; padding:0px !important  } 

.single-course_unit ins span.woocommerce-Price-amount.amount, .page-template-template-kurs-catalog ins span.woocommerce-Price-amount.amount, .post-type-archive-wpcw_course ins span.woocommerce-Price-amount.amount, .wpcw_course-template-template-single-course ins span.woocommerce-Price-amount.amount, ins span.woocommerce-Price-amount.amount {
    font-weight: bold !important;font-size: 18px;
    
}
.single-course_unit .woocommerce-Price-amount.amount, .page-template-template-kurs-catalog .woocommerce-Price-amount.amount, .post-type-archive-wpcw_course .woocommerce-Price-amount.amount, .wpcw_course-template-template-single-course .woocommerce-Price-amount.amount, .woocommerce-Price-amount.amount {
    margin-right: 10px;
}


.page-template-template-kurs-catalog span.woocommerce-Price-amount.amount, .post-type-archive-wpcw_course span.woocommerce-Price-amount.amount, .wpcw_course-template-template-single-course span.woocommerce-Price-amount.amount {font-size:18px; font-weight:normal; }
.single-course_unit del, .page-template-template-kurs-catalog del .woocommerce-Price-amount.amount, .post-type-archive-wpcw_course del .woocommerce-Price-amount.amount, .wpcw_course-template-template-single-course del .woocommerce-Price-amount.amount, del .woocommerce-Price-amount.amount{font-size: 18px; color:rgba(0,0,0,0.3); font-weight:normal;}
.single-course_unit ins, .page-template-template-kurs-catalog ins, .post-type-archive-wpcw_course ins, .wpcw_course-template-template-single-course ins, .wpcw_course-template-template-single-course ins .woocommerce-Price-amount.amount, #content ins  {font-size: 20px !important;text-decoration:none}

.page-template-template-kurs-catalog .product.woocommerce.add_to_cart_inline, .post-type-archive-wpcw_course .product.woocommerce.add_to_cart_inline, .wpcw_course-template-template-single-course .product.woocommerce.add_to_cart_inline, .product.woocommerce.add_to_cart_inline  {text-align:left; margin-left:0px; padding:0 !important}.product.woocommerce.add_to_cart_inline  {margin-bottom:0px !important}
.single-course_unit #content .product.woocommerce.add_to_cart_inline a.button, .page-template-template-kurs-catalog #content .product.woocommerce.add_to_cart_inline a.button, .post-type-archive-wpcw_course #content .product.woocommerce.add_to_cart_inline a.button, .wpcw_course-template-template-single-course #content .product.woocommerce.add_to_cart_inline a.button, #content .product.woocommerce.add_to_cart_inline a.button {padding: 9px 10px;
height: 34px;font-size: 16px !important;}

.page-template-template-kurs-catalog .price-for-course span.woocommerce-Price-amount.amount, .post-type-archive-wpcw_course .price-for-course span.woocommerce-Price-amount.amount, .wpcw_course-template-template-single-course .price-for-course span.woocommerce-Price-amount.amount, .price-for-course span.woocommerce-Price-amount.amount {display:none}

.entry-box.course-horisontal h2, .course-horisontal .entry-content, .course-horisontal .progress_under_course {padding-left: 0px;}

.woocommerce-Price-currencySymbol {font-size:18px}

.wpcw-shortcode-courses {display:flex}


#content .entry-box h2{line-height:0!important; margin-top:20px !important }
  #content .entry-box h2 a:link{font-size:20px !important; font-weight: 600 !important;}
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


?>
	
	<?php
	/** @var \WPCW\Models\Course $course */
	foreach ( $courses as $course ) { ?>
	<div style="padding-bottom:20px !important; display:grid; grid-row-gap: 0px;" class="entry-box col-lg-4">

<div class="post-font" style="height: 100%;display: grid; grid-row-gap: 0px;">
<?php
			global $ab_wpcourseware;
	if (function_exists('abwpwoo_headline_link') && isset($ab_wpcourseware['id_courses_courses_pages']) && isset($ab_wpcourseware['id_courses_pages'])) {
$array1 = $ab_wpcourseware['id_courses_courses_pages'];
$array2 = $ab_wpcourseware['id_courses_pages'];
$array = array_combine($array1, $array2);
$key =  $course->get_course_post_id();
$value = $array[$key];	


	
 if ( !$course->can_user_access( get_current_user_id() ) ) { 

 if ($value == '0') { ?>
 <div class="entry-content">
<a href=" <?php echo $course->get_permalink();  ?>"><?php echo $course->get_thumbnail_image(); ?></a>
<h2 class="entry-title" itemprop="name headline"><a href="<?php $course->get_permalink();   ?>"><?php echo $course->get_course_title();  ?></a></h2> 
		
</div>
	<div style="margin-right:15px; align-self: end;">
<a href="<?php echo $course->get_permalink(); ?>"  style="margin-top: 0px; margin-bottom: 0px;padding: 0px; float:right; margin-left: 15px;
    background: #ffffff !important;
    color: #000000 !important;
    -webkit-transition: all 0.5s;
    transition: all 0.5s;
    font-size: 16px !important;
    padding: 4px 10px;
    text-decoration: none; border:1px solid #000"><?php _e( 'Подробнее', 'inspiration' ); ?>
	</a>
	
<?php
	
	if ( $payments_type !== 'free') {

	if (function_exists('abwpwoo_price_wpcourseware_woocommerce') && isset($ab_wpcourseware['id_courses_courses']) && isset($ab_wpcourseware['id_courses_product']) ) 
{ 
$array1 = $ab_wpcourseware['id_courses_courses'];
$array2 = $ab_wpcourseware['id_courses_product'];
$array = array_combine($array1, $array2);
$key =  $course->get_course_post_id();
$value = $array[$key];	
echo do_shortcode('[add_to_cart id="'.$value.'" show_price="false"]');  }
else { echo $course->get_payments_price() .' '. wpcw_get_currency_symbol() .' '. $course->get_enrollment_button(); } 

}  else { echo $course->get_enrollment_button(); }
?> </div> <?php 	
	
 } 
	
	else { ?>
	
	<!-- платные курсы -->
	
<div class="entry-content">

<a href=" <?php if ($value !== '') { echo get_site_url().'/?p='. $value; } else { echo $course->get_permalink(); } ?> "><?php echo $course->get_thumbnail_image(); ?></a>
<h2 class="entry-title" itemprop="name headline"><a href="<?php if ($value !== '') { echo get_site_url().'/?p='. $value; } else { echo $course->get_permalink(); } ?>"><?php echo $course->get_course_title();  ?></a></h2>
 <div class="desc-course" itemprop="description"> <?php echo wpautop( get_the_excerpt( $course->course_post_id ) ); ?></div>
 </div>
	

<?php 
		$payments_type = $course->get_payments_type();	
		
	if ( !$course->can_user_access( get_current_user_id() ) ) { 	
		
		
		if ( $payments_type !== 'free') {

if (function_exists('abwpwoo_price_wpcourseware_woocommerce') && isset($ab_wpcourseware['id_courses_courses']) && isset($ab_wpcourseware['id_courses_product']) ) 
{ 
$array1 = $ab_wpcourseware['id_courses_courses'];
$array2 = $ab_wpcourseware['id_courses_product'];
$array = array_combine($array1, $array2);
$key =  $course->get_course_post_id();
$value1 = $array[$key];	

?>
 


<?php } } } else { echo ''; } ?>


<div style="margin-right:15px;display:grid; grid-template-columns:2fr 1fr; ">
	
	


	
	
<?php	$payments_type = $course->get_payments_type();	 if ( $payments_type !== 'free') {

	if (function_exists('abwpwoo_price_wpcourseware_woocommerce') && isset($ab_wpcourseware['id_courses_courses']) && isset($ab_wpcourseware['id_courses_product']) ) 
{ 
	
$array1 = $ab_wpcourseware['id_courses_courses'];
$array2 = $ab_wpcourseware['id_courses_product'];
$array = array_combine($array1, $array2);
$key =  $course->get_course_post_id();
$value1 = $array[$key];	

?> <div style="margin-left:15px; align-self: end;"><?php echo do_shortcode(' [tag_for_short_code_price id="'.$value1.'"]'); ?> <span class="price-for-course"> <?php echo do_shortcode('[add_to_cart id="'. $value1 .'" show_price="false"]'); ?> </span></div> <?php  }
else { echo $course->get_payments_price() .' '. wpcw_get_currency_symbol() .' '. $course->get_enrollment_button(); } 

}  else { echo $course->get_enrollment_button(); }
?><div style="align-self: end;"><a href="<?php if ($value !== '') { echo get_site_url().'/?p='. $value; } else { echo $course->get_permalink(); } ?>"  style="margin-top: 0px; margin-bottom: 0px;padding: 0px; float:right; margin-left: 15px;
    background: #ffffff !important;
    color: #000000 !important;
    -webkit-transition: all 0.5s;
    transition: all 0.5s;
    font-size: 16px !important;
    padding: 4px 10px;
    text-decoration: none; border:1px solid #000"><?php _e( 'Подробнее', 'inspiration' ); ?>
	</a></div> </div>




<?php
 } 
	
  } 
	 
 if ( $course->can_user_access( get_current_user_id() ) ) {    if ($value1 == '0') { ?>
<div class="entry-content">
<a href=" <?php echo $course->get_permalink();  ?>"><?php echo $course->get_thumbnail_image(); ?></a>
<h2 class="entry-title" itemprop="name headline"><a href="<?php echo $course->get_permalink();  ?>"><?php echo $course->get_course_title();  ?></a></h2> 	
</div><div class="desc-course" itemprop="description"> <?php echo wpautop( get_the_excerpt( $course->course_post_id ) ); ?></div>

<div class="progress_under_course">
		<?php


	echo do_shortcode( ' [wpcourse_progress_bar course="' . $course->get_course_id() . '"]' ); ?>
	<a href="<?php echo $course->get_permalink();  ?>" class="more-link" style="margin-top: 0px;float: right; margin-bottom: 20px;padding: 5px 10px;"><?php _e( 'Открыть курс', 'inspiration' ); ?>
	</a><div style="clear:both"> </div>
</div>







<?php } 
	
	else { ?>


<a href=" <?php  echo $course->get_permalink();  ?>"><?php echo $course->get_thumbnail_image(); ?></a>
<h2 class="entry-title" itemprop="name headline"><a href="<?php  echo $course->get_permalink();  ?>"><?php echo $course->get_course_title();  ?></a></h2>
 <div class="desc-course" itemprop="description"> <?php echo wpautop( get_the_excerpt( $course->course_post_id ) ); ?></div>
<div class="progress_under_course">
		<?php


	echo do_shortcode( ' [wpcourse_progress_bar course="' . $course->get_course_id() . '"]' ); ?>
	<a href="<?php echo $course->get_permalink();  ?>" class="more-link" style="margin-top: 0px; margin-bottom: 0px;padding: 0px; float:right; margin-left: 15px;
    background: #ffffff !important;
    color: #000000 !important;
    -webkit-transition: all 0.5s;
    transition: all 0.5s;
    font-size: 16px !important;
    padding: 4px 10px;
    text-decoration: none; border:1px solid #000"><?php _e( 'Открыть курс', 'inspiration' ); ?>
	</a>
</div>

<?php  } 
	 
	 }
	 
	 }  ?>
			
</div></div>
	<?php }  ?>
	
	
			</div><!-- #content --> 
		</div><!-- #container -->
		</div></div>

