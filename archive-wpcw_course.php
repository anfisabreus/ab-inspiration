<?php
/**
 * The template for displaying Archive pages.
 *
 * @package WordPress
 * @subpackage Inspiration
 * @since Inspiration 1.0
 */

get_header(); ?>
<?php echo ab_inspiration_header(); ?>

<div id="container-full" class="one-full-common one-column  container wp-courseware-calogue">
	<div id="content" role="main" class="row">

		<?php
		global $ab_wpcourseware;
		$values = $ab_wpcourseware['id_courses'] ?? '';

		$abc = '';
		foreach ((array) $values as $k => $value) {
			if ($k)
				$abc .= ', ';
			$abc .= $value;
		}

		$arr = explode(',', $abc);

		$args = array(
			'posts_per_page' => 60,
			'post_type' => 'wpcw_course',
			'key' => 'views',
			'orderby' => 'meta_value_num',
			'order' => 'ASC',
			'post_status' => 'publish',
			'post__not_in' => $arr
		);

		$query = new WP_Query($args);
		if ($query->have_posts()) {
			while ($query->have_posts()) {
				$query->the_post(); ?>

				<div style="padding-bottom:20px !important; display:grid; grid-row-gap: 0px;"
					class="entry-box <?php if (isset($ab_wpcourseware['checkbox_example'])) { ?>course-horisontal<?php } else { ?>col-lg-4<?php } ?>">
					<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<div class="post-font course-catalogue">
							<div class="entry-content">
								<?php
								if (function_exists('abwpwoo_headline_link') && isset($ab_wpcourseware['id_courses_courses_pages']) && isset($ab_wpcourseware['id_courses_pages'])) {
									$array1 = $ab_wpcourseware['id_courses_courses_pages'];
									$array2 = $ab_wpcourseware['id_courses_pages'];
									$array = array_combine($array1, $array2);
									$key = get_the_ID();
									$value = $array[$key] ?? '';

									if (!$course->can_user_access(get_current_user_id())) { ?>
										<a href="<?php if ($value !== '') {
											echo get_site_url() . '/?p=' . $value;
										} else {
											the_permalink();
										} ?>"
											title="<?php printf(esc_attr__(' %s', 'inspiration'), the_title_attribute('echo=0')); ?>"
											rel="bookmark">
											<div style="background:url('<?php if (has_post_thumbnail()): ?><?php the_post_thumbnail_url(); ?><?php endif; ?>') no-repeat center center; padding-top: 67%;
	background-size: cover;"> </div>
										</a>
										<h2 class="entry-title" itemprop="name headline">
											<a href="<?php if ($value !== '') {
												echo get_site_url() . '/?p=' . $value;
											} else {
												the_permalink();
											} ?>"
												title="<?php printf(esc_attr__(' %s', 'inspiration'), the_title_attribute('echo=0')); ?>"
												rel="bookmark">
												<?php the_title(); ?>
											</a>
										</h2>
									<?php } else { ?>
										<a href="<?php the_permalink(); ?>"
											title="<?php printf(esc_attr__(' %s', 'inspiration'), the_title_attribute('echo=0')); ?>"
											rel="bookmark">
											<div style="background:url('<?php if (has_post_thumbnail()): ?><?php the_post_thumbnail_url(); ?><?php endif; ?>') no-repeat center center; padding-top: 67%;
	background-size: cover;"> </div>
										</a>
										<h2 class="entry-title" itemprop="name headline">
											<a href="<?php the_permalink(); ?>"
												title="<?php printf(esc_attr__(' %s', 'inspiration'), the_title_attribute('echo=0')); ?>"
												rel="bookmark">
												<?php the_title(); ?>
											</a>
										</h2>
									<?php }

								} else { ?>
									<a href="<?php the_permalink(); ?>"
										title="<?php printf(esc_attr__(' %s', 'inspiration'), the_title_attribute('echo=0')); ?>"
										rel="bookmark">
										<div style="background:url('<?php if (has_post_thumbnail()): ?><?php the_post_thumbnail_url(); ?><?php endif; ?>') no-repeat center center; padding-top: 67%;
	background-size: cover;"> </div>
									</a>
									<h2 class="entry-title" itemprop="name headline">
										<a href="<?php the_permalink(); ?>"
											title="<?php printf(esc_attr__(' %s', 'inspiration'), the_title_attribute('echo=0')); ?>"
											rel="bookmark">
											<?php the_title(); ?>
										</a>
									</h2>
								<?php } ?>

								<?php if (isset($ab_wpcourseware['checkbox_example'])) {
								} else { ?>
									<div style="clear:both;"></div> <?php } ?>
								<?php if (isset($ab_wpcourseware['checkbox_example'])) { ?>
									<div class="desc-course" itemprop="description"><?php the_excerpt(); ?></div><?php } else { ?>
									<div class="desc-course" itemprop="description"><?php the_excerpt(); ?></div><?php } ?>
								<?php if (isset($ab_wpcourseware['checkbox_example'])) {
								} else { ?>
									<div style="clear:both;"></div> <?php } ?>

							</div>

							<?php
							if ($course->can_user_access(get_current_user_id())) { ?>
								<div class="progress_under_course">
									<?php $fe = new WPCW_UnitFrontend($post);
									echo do_shortcode(' [wpcourse_progress_bar course="' . $course->get_course_id() . '"]'); ?>
									<a href="<?php echo the_permalink(); ?> " title="<?php echo the_permalink(); ?>" rel="bookmark"
										class="more-link open-course"><?php _e('Открыть курс', 'inspiration'); ?>
									</a>
								</div>
							<?php }

							$payments_type = $course->get_payments_type();

							if (!$course->can_user_access(get_current_user_id())) {

								if ($payments_type !== 'free') {

									if (function_exists('abwpwoo_price_wpcourseware_woocommerce') && isset($ab_wpcourseware['id_courses_courses']) && isset($ab_wpcourseware['id_courses_product'])) {
										$array1 = $ab_wpcourseware['id_courses_courses'];
										$array2 = $ab_wpcourseware['id_courses_product'];
										$array = array_combine($array1, $array2);
										$key = get_the_ID();
										$value1 = $array[$key];

										?>

										<div style="margin-left:15px;">
											<?php echo do_shortcode(' [tag_for_short_code_price id="' . $value1 . '"]'); ?> </div>

									<?php }
								}
							} else {
								echo '';
							} ?>

							<?php if (isset($ab_wpcourseware['checkbox_example'])) { ?>
								<div style="float:right; font-size:20px; margin-right:20px; font-weight:normal; width:100%;">
								<?php } else { ?>
									<div style="margin-right:15px; display: flex;
	 justify-content: space-between;
	 flex-direction: row-reverse;
	 align-items: end;"> <?php } ?>

									<?php

									$payments_type = $course->get_payments_type();
									if (!$course->can_user_access(get_current_user_id())) { ?> <a
											href="<?php if ($value !== '') {
												echo get_site_url() . '/?p=' . $value;
											} else {
												the_permalink();
											} ?>"
											title="<?php echo the_permalink(); ?>" rel="bookmark"
											class="open-course"><?php _e('Подробнее', 'inspiration'); ?>
										</a>
										<?php

										if ($payments_type !== 'free') {

											if (function_exists('abwpwoo_price_wpcourseware_woocommerce') && isset($ab_wpcourseware['id_courses_courses']) && isset($ab_wpcourseware['id_courses_product'])) {
												$array1 = $ab_wpcourseware['id_courses_courses'];
												$array2 = $ab_wpcourseware['id_courses_product'];
												$array = array_combine($array1, $array2);
												$key = get_the_ID();
												$value = $array[$key];

												?>
												<div class="price-for-course"> <?php
												echo do_shortcode('[add_to_cart id="' . $value . '" show_price = "false"]'); ?> </div> <?php } else {
												echo $course->get_payments_price() . ' ' . wpcw_get_currency_symbol() . ' ' . $course->get_enrollment_button();
											}

										} else {
											echo $course->get_enrollment_button();
										}
									} ?>
								</div>
							</div>
						</div><!-- .entry-content -->
					</div><!-- #post-## -->
				<?php }
		} ?>
		</div><!-- #content -->
	</div><!-- #container -->
	<?php echo ab_inspiration_footer(); ?>
	<?php get_footer(); ?>