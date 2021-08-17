<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package WordPress
 * @package WordPress
 * @subpackage Inspiration
 * @since Inspiration 1.0
 */

get_header(); ?>
<?php echo ab_inspiration_header(); ?>
	<div id="container">
		<div id="content" role="main">
	<div class="entry-box">			<div id="post-0" class="post error404 not-found">
				<h1 class="entry-title entry-title-single"><?php _e( 'Страница не найдена', 'inspiration' ); ?></h1>
				<div class="entry-content">

<div><img src="<?php echo get_bloginfo('template_url');?>/images/error404.png" align="left" width="230" style="margin-right:10px;"></div>
<strong><?php _e( 'Это могло произойти по следующим причинам:', 'inspiration' ); ?></strong><br />
- <?php _e( 'страница была удалена или переименована,', 'inspiration' ); ?><br />
- <?php _e( 'страница никогда не существовала,', 'inspiration' ); ?><br />
- <?php _e( 'у Вас была неправильная ссылка.', 'inspiration' ); ?> <br /><br />

<b><?php _e( 'Что делать в этом случае?', 'inspiration' ); ?></b><br />
- <?php _e( 'перейдите на', 'inspiration' ); ?> <a href="<?php echo get_settings('home'); ?>"><?php _e( 'Главную страницу', 'inspiration' ); ?></a><br />
- <?php _e( 'воспользуйтесь Поиском,', 'inspiration' ); ?><br />
- <?php _e( 'сообщите нам о битой ссылке. ', 'inspiration' ); ?>
<br>

<?php _e( 'Успехов Вам!', 'inspiration' ); ?><br><br><br>
	
					
				</div><!-- .entry-content -->
			</div><!-- #post-0 -->
		</div><!-- #content --> </div>
	</div><!-- #container -->
	<script type="text/javascript">
		// focus on search field after it has loaded

		document.getElementById('s') && document.getElementById('s').focus();

	</script>
<?php get_sidebar(); ?>
<?php echo ab_inspiration_footer(); ?>
<?php get_footer(); ?>