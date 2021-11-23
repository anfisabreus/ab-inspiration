<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

// Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if ( post_password_required() ) { ?>
		<p class="nocomments"><?php _e( 'Этот пост защищен паролем. Чтобы посмотреть комментарии, введите пароль ниже', 'inspiration' ); ?></p>

	<?php
		return;
	}
?>

<!-- You can start editing here. -->

<?php if ( have_comments()) : ?>


<?php if (of_get_option('comments_tabber') == '2') { ?>
<div style="font-size:18px; padding-top:0px; float:left; padding-right:10px;"><?php _e( 'Комментарии на блоге', 'inspiration' ); ?></div>
<?php }?>

<?php if (of_get_option('comments_tabber') == '3') { ?>
<div style="font-size:18px; padding-top:0px; float:left; padding-right:10px;"><?php _e( 'Комментарии на Блог', 'inspiration' ); ?></div>
<?php }?>

<div class="comments-title" style="float:right;"><?php comments_number( __( 'Комментариев нет', 'inspiration' ),  __( '1 комментарий', 'inspiration' ), __( '% комментариев', 'inspiration' ) );?> </div>
<div style="clear:both"></div>



	<ol class="commentlist" itemscope="" itemtype="http://schema.org/UserComments">
	 

	<?php wp_list_comments( array(
			'reply_text' => __( 'Ответить', 'inspiration' ),
			'callback' => 'inspiration_comment'
		)); ?>
	
	
	</ol>

	<div class="navigation">
		<div class="alignleftcom"><?php previous_comments_link() ?></div>
		<div class="alignrightcom"><?php next_comments_link() ?></div>
	</div>
 <?php else : // this is displayed if there are no comments so far ?>

	<?php if ('open' == $post->comment_status) : ?>
		<!-- If comments are open, but there are no comments. -->

	 <?php else : // comments are closed ?>
		<!-- If comments are closed. -->
		

	<?php endif; ?>
<?php endif; ?>


<?php ab_inspiration_comment_form( true ); ?>
