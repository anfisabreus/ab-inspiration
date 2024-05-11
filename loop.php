<?php if (!have_posts()): ?>
    <div class="entry-box">
        <div id="post-0" class="post error404 not-found">
            <div class="entry-title entry-title-single"><?php _e('Ничего не найдено', 'inspiration'); ?></div>
            <div class="entry-content">
                <div class="post-font">
                    <p><?php _e('Извините, но по Вашему запросу ничего не найдено. Воспользуйтесь формой поиска, чтобы найти то, что Вы ищите.', 'inspiration'); ?>
                    </p>
                    <?php get_search_form(); ?>
                </div>
            </div><!-- .entry-content -->
        </div><!-- #post-0 -->
    </div>
<?php endif; ?>
<?php while (have_posts()):
    the_post(); ?>
    <?php if (in_category(_x('gallery', 'gallery category slug', 'inspiration'))): ?>
        <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <?php if (of_get_option('utilities') == '1') {
                echo inspiration_posted_in();
            } ?>
            <h2 class="entry-title"><a href="<?php the_permalink(); ?>"
                    title="<?php printf(esc_attr__('%s', 'inspiration'), the_title_attribute('echo=0')); ?>"
                    rel="bookmark"><?php the_title(); ?></a></h2>
            <div class="entry-content">
                <?php if (post_password_required()): ?>
                    <a href="<?php the_permalink() ?>"><?php if (of_get_option('thumbnail') == '1') {
                          echo the_post_thumbnail(of_get_option('thumb_size'), array("class" => "alignleft post_thumbnail", "itemprop" => "image"));
                      } ?></a>
                    <div class="post-font" itemprop="description">
                        <?php the_content(); ?>
                    </div><?php else: ?>
                    <div class="gallery-thumb"><?php
                    $images = get_children(array('post_parent' => $post->ID, 'post_type' => 'attachment', 'post_mime_type' => 'image', 'orderby' => 'menu_order', 'order' => 'ASC', 'numberposts' => 999));
                    $total_images = count($images);
                    $image = array_shift($images);
                    $image_img_tag = wp_get_attachment_image($image->ID, 'thumbnail'); ?>
                        <a class="size-thumbnail" href="<?php the_permalink(); ?>"><?php echo $image_img_tag; ?></a>
                    </div><!-- .gallery-thumb -->
                    <p><em><?php printf(__('Эта галерея содержит <a %1$s>%2$s фотографии</a>.', 'inspiration'), 'href="' . get_permalink() . '" title="' . sprintf(esc_attr__('%s', 'inspiration'), the_title_attribute('echo=0')) . '" rel="bookmark"',
                        $total_images); ?></em></p>
                    <?php the_excerpt(); ?>         <?php endif; ?>
            </div><!-- .entry-content -->
            <div class="entry-utility">
                <a href="<?php echo get_term_link(_x('gallery', 'gallery category slug', 'inspiration'), 'category'); ?>"
                    title="<?php esc_attr_e('Посмотреть записи в категории Галерея', 'inspiration'); ?>"><?php _e('Еще галереи', 'inspiration'); ?></a>
                <span class="meta-sep">|</span>
                <span
                    class="comments-link"><?php comments_popup_link(__('Оставить комментарий', 'inspiration'), __('1 комментарий', 'inspiration'), __('% комментариев', 'inspiration')); ?></span>
                <?php edit_post_link(__('Изменить', 'inspiration'), '<span class="meta-sep">|</span> <span class="edit-link">', '</span>'); ?>
            </div><!-- .entry-utility -->
        </div><!-- #post-## -->

    <?php else: ?>
        <article class="entry-box">
            <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>



                <?php if (is_archive() || is_search()): ?>


                    <?php do_action('ab_title_action_category'); ?>



                <?php else: ?>

                    <?php do_action('ab_title_action'); ?>

                    <?php wp_link_pages(array('before' => '<div class="page-link">' . __('Страницы:', 'inspiration'), 'after' => '</div>')); ?>


                <?php endif; ?>
            </div>
            <div style="clear:both;"></div>
        </article>
        <div class="entry-between-border"></div>
        <?php comments_template('', true); ?>
    <?php endif; ?>
<?php endwhile; ?>
<?php if ($wp_query->max_num_pages > 1): ?>
    <div id="nav-below" class="pagenavi" style="margin-top:10px;">
        <?php pagenavi(); ?>
    </div>
<?php endif; ?>