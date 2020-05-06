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


<?php if ('open' == $post->comment_status) : ?>

<div id="respond">

<?php if (of_get_option('comments_tabber') == '3') { ?> <div class="comments-title"><?php comment_form_title( __( 'Оставьте ваш комментарий или вопрос', 'inspiration' ), __( 'Оставьте ваш комментарий к %s', 'inspiration' ) ); ?></div> <?php } ?>

<div class="cancel-comment-reply">
	<small><?php cancel_comment_reply_link(); ?></small>
</div>

<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
<p><?php _e( 'Вы должны', 'inspiration' ); ?> <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>"><?php _e( 'войти,', 'inspiration' ); ?>  </a> <?php _e( 'чтобы оставлять комментарии.', 'inspiration' ); ?></p>
<?php else : ?>

<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform" class="comment-form">

<?php if ( $user_ID ) : ?>

<p><?php _e( 'Вы вошли как', 'inspiration' ); ?> <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="<?php _e( 'Выйти из аккаунта', 'inspiration' ); ?>"><?php _e( 'Выйти', 'inspiration' ); ?> &raquo;</a></p>

<?php else : ?>

<p><input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> />
<label for="author"><small><?php _e( 'Имя', 'inspiration' ); ?> <?php if ($req) echo __( '(обязательно)', 'inspiration' ); ?></small></label></p>

<p><input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> />
<label for="email"><small><?php _e( 'Email (не будет опубликован)', 'inspiration' ); ?> <?php if ($req) echo __( '(обязательно)', 'inspiration' ); ?></small></label></p>

<p><input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" />
<label for="url"><small><?php _e( 'Вебсайт', 'inspiration' ); ?></small></label></p>

<?php endif; ?>

<!--<p><small><strong>XHTML:</strong> Вы можете использовать эти теги: <code><?php echo allowed_tags(); ?></code></small></p>-->
<?php if (of_get_option('smiles') == '1') { echo  qipsmiles_insert('ru');}  else {  } ?>
<div>


<textarea name="comment" id="comment" rows="4" tabindex="4" style="width:100%;"></textarea></div>

<p><input name="submit" type="submit" id="submit" tabindex="5" value="<?php _e( 'Отправить комментарий', 'inspiration' ); ?>" />
<?php comment_id_fields(); ?>
</p>
<?php do_action('comment_form', $post->ID); ?>

</form>

<?php if (of_get_option('obrabotka_dannyh_text', '') != '') { ?>
<div class="garantiya-bottom-commets"><a class="fancybox" href="#inline" title="Согласие на обработку персональных данных" ref="nofollow"><?php _e( 'Нажимая на кнопку "Отправить комментарий", я соглашаюсь с политикой обработки персональных данных', 'inspiration' ); ?></a></div>
<?php echo konf_personal(); ?>
<?php }  ?>

<?php endif; // If registration required and not logged in ?>
</div>

<?php endif; // if you delete this the sky will fall on your head ?>