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
<div id="container-full" class="one-full-common one-column  container wp-courseware-calogue">
    <div id="content" role="main" class="row">
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
                            if (function_exists('abwpwoo_price_wpcourseware_woocommerce') && isset($ab_wpcourseware['id_courses_courses']) && isset($ab_wpcourseware['id_courses_product']) ) { 
                            $array1 = $ab_wpcourseware['id_courses_courses'];
                            $array2 = $ab_wpcourseware['id_courses_product'];
                            $array = array_combine($array1, $array2);
                            $key =  $course->get_course_post_id();
                            $value = $array[$key];	
                            echo do_shortcode('[add_to_cart id="'.$value.'" show_price="false"]');  
                            }
                            else { 
                                echo $course->get_payments_price() .' '. wpcw_get_currency_symbol() .' '. $course->get_enrollment_button(); 
                            } 
                        }  
                        else { 
                            echo $course->get_enrollment_button(); 
                        } ?> 
                    </div> 
                    <?php }                                
                    else { ?>

                    <!-- платные курсы -->
        
                    <div class="entry-content">
                        <a href=" <?php if ($value !== '') { echo get_site_url().'/?p='. $value; } else { echo $course->get_permalink(); } ?> ">
                            <?php echo $course->get_thumbnail_image(); ?>
                        </a>
                        <h2 class="entry-title" itemprop="name headline">
                            <a href="<?php if ($value !== '') { echo get_site_url().'/?p='. $value; } else { echo $course->get_permalink(); } ?>">
                                <?php echo $course->get_course_title();  ?>
                            </a>
                        </h2>
                        <div class="desc-course" itemprop="description">
                            <?php echo wpautop( get_the_excerpt( $course->course_post_id ) ); ?>
                        </div>
                    </div>	
                    <?php 
                    $payments_type = $course->get_payments_type();	
                    if ( !$course->can_user_access( get_current_user_id() ) ) { 	
                        if ( $payments_type !== 'free') {
                            if (function_exists('abwpwoo_price_wpcourseware_woocommerce') && isset($ab_wpcourseware['id_courses_courses']) && isset($ab_wpcourseware['id_courses_product']) ) { 
                            $array1 = $ab_wpcourseware['id_courses_courses'];
                            $array2 = $ab_wpcourseware['id_courses_product'];
                            $array = array_combine($array1, $array2);
                            $key =  $course->get_course_post_id();
                            $value1 = $array[$key];	
                            echo $value1; ?>
                            <?php } 
                        } 
                    } 
                    else { echo ''; } ?>

                    <div style="margin-right:15px;display:grid; grid-template-columns:2fr 1fr; ">               
                    <?php $payments_type = $course->get_payments_type();	 
                    if ( $payments_type !== 'free') {
                        if (function_exists('abwpwoo_price_wpcourseware_woocommerce') && isset($ab_wpcourseware['id_courses_courses']) && isset($ab_wpcourseware['id_courses_product']) ) { 	
                        $array1 = $ab_wpcourseware['id_courses_courses'];
                        $array2 = $ab_wpcourseware['id_courses_product'];
                        $array = array_combine($array1, $array2);
                        $key =  $course->get_course_post_id();
                        $value1 = $array[$key];	?> 
                        
                        <div style="margin-left:15px; align-self: end;">
                            <?php echo do_shortcode(' [tag_for_short_code_price id="'.$value1.'"]'); ?> <span class="price-for-course"> <?php echo do_shortcode('[add_to_cart id="'. $value1 .'" show_price="false"]'); ?> </span>
                        </div> 
                        <?php }
                        else { 
                            echo $course->get_payments_price() .' '. wpcw_get_currency_symbol() .' '. $course->get_enrollment_button(); 
                        } 
                    }  
                    else { 
                        echo $course->get_enrollment_button(); 
                    } ?>

                        <div style="align-self: end;">
                            <a href="<?php if ($value !== '') { echo get_site_url().'/?p='. $value; } else { echo $course->get_permalink(); } ?>"  style="margin-top: 0px; margin-bottom: 0px;padding: 0px; float:right; margin-left: 15px;
                        background: #ffffff !important;
                        color: #000000 !important;
                        -webkit-transition: all 0.5s;
                        transition: all 0.5s;
                        font-size: 16px !important;
                        padding: 4px 10px;
                        text-decoration: none; border:1px solid #000">
                            <?php _e( 'Подробнее', 'inspiration' ); ?>
                            </a>
                        </div> 
                    </div>
                    <?php
                    } 	
                } 	 
                if ( $course->can_user_access( get_current_user_id() ) ) { 
                    if ($value1 == '0') { ?>
                    <div class="entry-content">
                        <a href=" <?php echo $course->get_permalink();  ?>">
                            <?php echo $course->get_thumbnail_image(); ?>
                        </a>
                        <h2 class="entry-title" itemprop="name headline">
                            <a href="<?php echo $course->get_permalink();  ?>">
                            <?php echo $course->get_course_title();  ?>
                            </a>
                        </h2> 	
                    </div>
                    <div class="desc-course" itemprop="description"> 
                        <?php echo wpautop( get_the_excerpt( $course->course_post_id ) ); ?>
                    </div>
                    <div class="progress_under_course">
                        <?php echo do_shortcode( ' [wpcourse_progress_bar course="' . $course->get_course_id() . '"]' ); ?>
                        <a href="<?php echo $course->get_permalink();  ?>" class="more-link" style="margin-top: 0px;float: right; margin-bottom: 20px;padding: 5px 10px;">
                            <?php _e( 'Открыть курс', 'inspiration' ); ?>
                        </a>
                        <div style="clear:both"> </div>
                    </div>
                    <?php }

                    else { ?>
                    <a href=" <?php  echo $course->get_permalink();  ?>">
                        <?php echo $course->get_thumbnail_image(); ?>
                    </a>
                    <h2 class="entry-title" itemprop="name headline">
                        <a href="<?php  echo $course->get_permalink();  ?>">
                        <?php echo $course->get_course_title();  ?>
                        </a>
                    </h2>
                    <div class="desc-course" itemprop="description"> 
                        <?php echo wpautop( get_the_excerpt( $course->course_post_id ) ); ?>
                    </div>
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
                    text-decoration: none; border:1px solid #000">
                        <?php _e( 'Открыть курс', 'inspiration' ); ?>
                    </a>
                    </div>
                    <?php  
                    } 
                }
	        } ?>
            </div>
        </div>
        <?php } ?>
	</div><!-- #content --> 
</div><!-- #container -->
</div></div>

