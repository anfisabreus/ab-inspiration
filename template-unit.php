<?php

/**
 * Unit Template Name: Страница с заданием
 * Template Post Type: course_unit
 * @package WordPress
 * @subpackage Inspiration
 * @since Inspiration 1.0
 */
__('Страница с заданием', 'inspiration');
get_header(); ?>
<?php echo ab_inspiration_header(); ?>

<style>
.tabbernav,
#qips_smiles {
  display: none;
}

textarea#comment {
  height: 100px;
}

.navbar-6 {
  display: none;
}

.wpcw_fe_unit_progress.wpcw_fe_unit_progress_complete .wpcw_checkmark {
  display: block !important;
  font-family: "FontAwesome";
  content: "\f058";
  float: right;
  font-size: 30px;
  font-weight: normal;
  height: 15px;
  width: 15px;
}

.wpcw_fe_unit_progress.wpcw_fe_unit_progress_incomplete:after {
  font-family: "FontAwesome";
  font-weight: 900;
  content: "\f1db";
  float: right;
  font-size: 18px;
  color: #d8d8d8;
  font-weight: normal;
}

.wpcw_widget_progress #wpcw_fe_course {
  background: #fff;
}

.single-course_unit #primary {
  float: left;
}

.single-course_unit #container {
  float: right !important;
  width: 100%;
}

.single-course_unit #content {
  width: 100%;
}

.single-course_unit #primary {
  float: left;
}

#container,
#content,
.entry-box {
  width: 100%;
}

.content-unit {
  width: 100%;
  float: right;
}

.single-course_unit #respond {
  margin-top: 60px;
}
.closewidget, #menu-course {display: none}

@media only screen and (max-width: 1024px) {
  .lni.lni-close:before {
    float: right;
  }

  .widget-area {
    display: none;
  }

  #content-main {
    position: unset;
  }
  .show-links {
    display: block;
    position: absolute;
    left: 0;
    top: 0;
    bottom: 0;
    height: 100%;
  }
  .show-links,
  .widget-area ul {
    height: 100vh !important;
    max-height: 100vh !important;
    background: #fff;
  }
  #primary {
    padding-top: 0;
    width: 95% !important;
    z-index: 4;
    box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.2);
  }

  .navbar-6 {
    display: block;
    width: 100%;
  }

  .navbar.navbar-6 button,
  .navbar.navbar-6 button:hover {
    background: transparent !important;
  }

  #body {
    background: #fff !important;
  }

  .content-unit {
    width: 100%;
    float: none;
  }

  .wpcw_widget_progress {
    padding: 0;
  }

  #container {
    width: 100% !important;
  }

  .navbar .widget.wpcw_course_progress {
    margin-top: 10px;
  }

  .navbar-6 {
    padding: 0px;
    text-align: left;
  }

  .entry-title.entry-title-single {
    padding-top: 20px;
  }
}

.mobile-second-menu .navbar {
  display: none;
}

@media only screen and (max-width: 767px) {
  .closewidget, #menu-course {display: block}
  .wpcw_course_progress {
    overflow: scroll;
    scroll-behavior: smooth;
    border: 1px solid #eaeaea;
	  height: 70%
  }
  #primary {
    margin-top: 0px;
	
  }

  .collapse.show {
    margin: 0px;
  }

  .navbar.navbar-6 button {
    margin-left: 20px;
  }

  .mobile-second-menu .navbar {
    display: flex;
  }
  .closewidget {
    width: 100%;
    padding: 25px 25px 0 0 !important;
    margin: 0 !important;
  }
  #menu-course {
    text-align: center;
    padding-bottom: 15px
  }
  .entry-title.entry-title-single {padding-top: 0px}
  .post-font {font-size: 16px !important}
  .show-links {
    -webkit-animation: show-links 0.5s cubic-bezier(0.25, 0.46, 0.45, 0.94) both;
    animation: show-links 0.5s cubic-bezier(0.25, 0.46, 0.45, 0.94) both;
  }
  @-webkit-keyframes show-links {
    0% {
      -webkit-transform: translateX(-1000px);
      transform: translateX(-1000px);
      opacity: 0;
    }
    100% {
      -webkit-transform: translateX(0);
      transform: translateX(0);
      opacity: 1;
    }
  }
  @keyframes show-links {
    0% {
      -webkit-transform: translateX(-1000px);
      transform: translateX(-1000px);
      opacity: 0;
    }
    100% {
      -webkit-transform: translateX(0);
      transform: translateX(0);
      opacity: 1;
    }
  }

  .show-links-down {
    -webkit-animation: show-links-down 0.6s ease-in both;
    animation: show-links-down 0.6s ease-in both;
  }

  @-webkit-keyframes show-links-down {
    0% {
      -webkit-transform: translateX(0) rotate(0deg);
      transform: translateX(0) rotate(0deg);
      opacity: 1;
    }
    100% {
      -webkit-transform: translateX(-1000px) rotate(-540deg);
      transform: translateX(-1000px) rotate(-540deg);
      opacity: 0;
    }
  }
  @keyframes show-links-down {
    0% {
      -webkit-transform: translateX(0) rotate(0deg);
      transform: translateX(0) rotate(0deg);
      opacity: 1;
    }
    100% {
      -webkit-transform: translateX(-1000px) rotate(-540deg);
      transform: translateX(-1000px) rotate(-540deg);
      opacity: 0;
    }
  }
  .overlay {
    position: absolute;
    height: 100vh;
    width: 100vw;
    background: rgba(0, 0, 0, 0.4);
	  
  }
  .single-course_unit #primary.widget-area ul li {
    padding: 15px;
    margin-bottom: 0px;
  }
  .entry-content fieldset {margin-bottom: 10px}
  .wpcw_fe_quiz_q_single {    margin-bottom: 0px;}
  .wpcw_ques_sorting_ul .wpcw_que_sorting_list {font-size: 15px; text-align: left}

  a.fe_btn.fe_btn_navigation.fe_btn_navigation_prev, a.fe_btn.fe_btn_navigation.fe_btn_navigation_next {float:none; }
  .wpcw_fe_navigation_box {display: flex;justify-content: space-around; gap: 10px}
}
</style>



<?php
global $post, $course;

$parentData = WPCW_units_getAssociatedParentData($post->ID);
$courseDetails = WPCW_courses_getCourseDetails($parentData->parent_course_id);
$key = $parentData->parent_course_id;
$key2 = wpcw_course_get_post_id($key);

if (!is_user_logged_in()) {

  if (function_exists('abwpwoo_price_wpcourseware_woocommerce')) {
    $array1 = $ab_wpcourseware['id_courses_courses'];
    $array2 = $ab_wpcourseware['id_courses_product'];
    $array = array_combine($array1, $array2);

    $value = $array[$key2];

    echo '<div style="padding: 20px 20px 30px; margin-bottom:30px;border:1px solid #eaeaea; clear:both; background:#FFFACD;">' . do_shortcode('[add_to_cart id="' . $value . '"]') . '<div style="clear: right; padding-top: 10px;padding-left: 20px;display: table;"> ' . __('или', 'inspiration') . ' <a href="' . get_permalink(wc_get_page_id('myaccount')) . '">' . __('Войти в личный кабинет', 'inspiration') . '</a></div></div>';
  } else {
    echo  '<div style="padding: 20px 20px 30px; margin-bottom:30px;border:1px solid #eaeaea; clear:both; background:#FFFACD;"><p class="button-on-unit">' . do_shortcode('[wpcourse_enroll courses="' . $key . '"]') . '</p><div style="clear: right; padding-top: 10px;padding-left: 20px;display: table;"> ' . __('или', 'inspiration') . ' <a href="' . get_permalink(wpcw_get_page_id('account')) . '">' . __('Войти в личный кабинет', 'inspiration') . '</a></div></div>';
  }
}     ?>

<div id="container">
  <div id="content" role="main">
    <?php if (have_posts()) while (have_posts()) : the_post(); ?>

     
      <div id="menu-course"><i class="lni lni-menu" style="font-size: 28px"> </i></div>

      <div class="entry-box" itemscope itemtype="http://schema.org/BlogPosting">
        <div class="content-unit" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
          <h1 class="entry-title entry-title-single" itemprop="headline"><?php the_title(); ?></h1>
          <div class="entry-content">
            <div class="post-font" itemprop="articleBody">
              <?php the_content(); ?>
              <?php if (!is_user_logged_in()) { ?></div>
          </div>
        </div> <?php } ?>
      </div>
      <?php if (is_user_logged_in()) { ?>
      <div style="clear:both; padding-top:40px;"><?php comments_template('', true); ?></div>
      <?php } ?>
  </div><!-- .entry-content -->
</div><!-- .content-unit -->
<div style="clear:both;"></div>
</div> <!-- .entry-box -->

<?php endwhile; // end of the loop. 
?></div> <!-- #content -->
</div><!-- #container -->

<?php get_sidebar('kurs'); ?>

<script>
	const sidebarToggle = document.querySelector("#menu-course");
  const sidebarMobile = document.querySelector(".widget-area");
  const overlay = document.createElement("div");
  const closeBtn = document.createElement("div");
  const icon = document.createElement("i");

  closeBtn.className = "closewidget lni lni-close";
  closeBtn.appendChild(icon);
  document.querySelector(".widget-area").prepend(closeBtn);
  document.querySelector("#wrapper").prepend(overlay);

  sidebarToggle.addEventListener("click", function () {
    sidebarMobile.classList.remove("show-links-down");
    sidebarMobile.classList.add("show-links");
    overlay.classList.add("overlay");
	  body.style.overflow = "hidden";
  });

  closeBtn.addEventListener("click", function () {
    sidebarMobile.classList.remove("show-links");
    overlay.classList.remove("overlay");
    sidebarMobile.classList.add("show-links-down");
	  body.style.overflow = "auto";
  }); 
</script>

<?php echo ab_inspiration_footer(); ?>

<?php get_footer(); ?>