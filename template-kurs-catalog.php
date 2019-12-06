<?php
/**
 * Template Name: Шаблон для страницы каталога курсов
 * @package WordPress
 * @subpackage Inspiration
 * @since Inspiration 1.0
 */

  __( 'Шаблон для страницы каталога курсов', 'inspiration' );


get_header(); ?>


<style>  
.post-font {font-size:16px !important;}.entry-box{  margin: 0px 25px 25px 0; overflow:hidden; padding:0px !important;}.entry-box:nth-child(3n+3) {margin: 0px 0px 25px 0;}
.entry-box:first-child, .entry-box {padding-top:0px !important;text-align: center;}
.entry-box {text-align: center;}
#wrapper .entry-box h2 { padding-top:20px !important;line-height: 20px !important;}
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
.woocommerce-Price-currencySymbol {font-size:18px}
.entry-box h2, .entry-content, .progress_under_course { padding-right:30px; padding-left:30px}
  #wrapper .entry-box h2 a:link{font-size:20px !important; line-height:1.3 }
 @media (min-width: 992px) {
.col-lg-4 {
    max-width: 31.8%;
  }}
  @media (max-width: 640px) {

    .entry-box{  margin:15px;}.entry-box:last-child {margin: 15px;}
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

<div class="entry-box col-lg-4">

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

<div>


<div class="post-font">

<?php if (function_exists('abwpwoo_headline_link') && isset($ab_wpcourseware['id_courses_courses_pages']) && isset($ab_wpcourseware['id_courses_pages'])) {
$array1 = $ab_wpcourseware['id_courses_courses_pages'];
$array2 = $ab_wpcourseware['id_courses_pages'];
$array = array_combine($array1, $array2);
$key =  get_the_ID();
$value = $array[$key];


 if ( !$course->can_user_access( get_current_user_id() ) ) { ?>
<a href="<?php if ($value !== '') { echo get_site_url().'/?p='. $value; } else { the_permalink()  ; } ?>" title="<?php printf( esc_attr__( ' %s', 'inspiration' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><img src="<?php if ( has_post_thumbnail() ) : ?><?php the_post_thumbnail_url(); ?><?php endif; ?>"></a>

<h2 class="entry-title" itemprop="name headline"><a href="<?php if ($value !== '') { echo get_site_url().'/?p='. $value; } else { the_permalink()  ; } ?>" title="<?php printf( esc_attr__( ' %s', 'inspiration' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2> <?php } else { ?>

<a href="<?php the_permalink();  ?>" title="<?php printf( esc_attr__( ' %s', 'inspiration' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><img src="<?php if ( has_post_thumbnail() ) : ?><?php the_post_thumbnail_url(); ?><?php endif; ?>"></a>

<h2 class="entry-title" itemprop="name headline"><a href="<?php the_permalink();  ?>" title="<?php printf( esc_attr__( ' %s', 'inspiration' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>




<?php  }



} else { ?> <a href="<?php the_permalink();  ?>" title="<?php printf( esc_attr__( ' %s', 'inspiration' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><img src="<?php if ( has_post_thumbnail() ) : ?><?php the_post_thumbnail_url(); ?><?php endif; ?>"></a>

<h2 class="entry-title" itemprop="name headline"><a href="<?php the_permalink();  ?>" title="<?php printf( esc_attr__( ' %s', 'inspiration' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2> <?php } ?>

<div class="entry-content"><div style="clear:both"></div>
<div class="post-font" itemprop="description"><?php the_excerpt(); ?></div>
<div style="clear:both;"></div></div>
</div>


	 <?php

	if ( $course->can_user_access( get_current_user_id() ) ) { ?>

	<div class="progress_under_course">
		<?php
	$fe = new WPCW_UnitFrontend( $post );

	echo do_shortcode( ' [wpcourse_progress_bar course="' . $course->get_course_id() . '"]' );


	?>

</div>
	<?php } ?>


	<br>

	<div style="float:right; font-size:20px; margin-right:20px; font-weight:normal">
<?php







$payments_type = $course->get_payments_type();
if ( $payments_type !== 'free') {
if ( ! $course->can_user_access( get_current_user_id() ) ) {



if (function_exists('abwpwoo_price_wpcourseware_woocommerce') && isset($ab_wpcourseware['id_courses_courses']) && isset($ab_wpcourseware['id_courses_product']) )
{
$array1 = $ab_wpcourseware['id_courses_courses'];
$array2 = $ab_wpcourseware['id_courses_product'];
$array = array_combine($array1, $array2);
$key =  get_the_ID();
$value = $array[$key];

echo do_shortcode('[add_to_cart id="'.$value.'"]');  }
else { echo $course->get_payments_price() .' '. wpcw_get_currency_symbol() .' '. $course->get_enrollment_button(); }

} } else { echo $course->get_enrollment_button(); }  ?></div>




</div><!-- .entry-content -->

</div><!-- #post-## -->
</div>

<?php } } ?>

			</div><!-- #content -->
		</div><!-- #container -->
<?php get_footer(); ?>
