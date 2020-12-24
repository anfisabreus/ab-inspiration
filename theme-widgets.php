<?php

$license 	= get_option( 'edd_inspiration_theme_license_key' );
$status 	= get_option( 'edd_inspiration_theme_license_key_status' );
if ($status !== false && $status == 'valid' ) {



 add_action( 'load-widgets.php', 'color_picker_load', 100 );
 function color_picker_load() { 
        wp_enqueue_style( 'wp-color-picker' );        
	    wp_enqueue_script( 'wp-color-picker' ); 
	    wp_dequeue_script('wppage-stats-script-admin'); 
}

// ================================ Информация автора в шапке ============================
class header_widget_only extends WP_Widget {
    
    
    function __construct() {
    parent::__construct(
        'header_widget_only', // Base ID
        __( '0 - AB - Виджет в шапке', 'inspiration' ),
        array( 'description' => __( 'На выбор 3 блока: Информация об авторе, Баннер, Социальные кнопки', 'inspiration' ), )
    );
}
    function widget($args, $instance) {
        extract( $args );
        global $wpdb, $woocommerce;
        $widget_header = $instance['widget_header'];
        $header_name = $instance['header_name'];
        $header_tel = $instance['header_tel'];
	    $header_skype = $instance['header_skype'];
	    $header_email = $instance['header_email'];
	    $header_gravatar = $instance['header_gravatar'];
	    $header_gravatar_width = $instance['header_gravatar_width'];
        $header_color = $instance['header_color'];
        $header_padding = $instance['header_padding'];
        $banner_link = $instance['banner_link'];
        $banner_image = $instance['banner_image'];
        $banner_size = $instance['banner_size'];
        $twitter_id = $instance['twitter_id'];
        $facebook_page = $instance['facebook_page'];
	    $youtube = $instance['youtube'];
	    $vkontakte = $instance['vkontakte'];
	    $ok = $instance['ok'];
	    $instagram = $instance['instagram'];
	    $linkedin = $instance['linkedin'];
        $flwidth = $instance['flwidth'];
        $form = $instance['form'];
$icon_color = $instance['icon_color'];
$icon_color_hover = $instance['icon_color_hover'];
$nativecolor = $instance['nativecolor'];
$telegram = $instance['telegram'];
$wechat = $instance['wechat'];
$whatsapp = $instance['whatsapp'];
$email = $instance['email'];
$viber = $instance['viber'];
$bordercolor = $instance['bordercolor'];
$icon_color_text = $instance['icon_color_text'];
$icon_color_hover_text = $instance['icon_color_hover_text'];



        ?>
<?php $heihgt_gr = of_get_option('header_height') - 20 ?>
<style>#header #branding li.widget.woocommerce.widget_product_search .input-group {width:300px; position:relative; top:<?php echo $header_padding + 20;?>px; padding-left:40px; padding-right:40px;}</style>
<div style="padding:0px 20px 0px 0px; float:right">
<div id="hd-widget-area" style="height:<?php echo $heihgt_gr;?>px; margin-top:0px; margin-bottom:0px">
<?php if (($widget_header) == 'authorprofile')  { ?> <?php if (($header_gravatar) ==!'')  { ?><div id="ggg" style="height:<?php echo $header_gravatar_width;?>px;display:table-cell;float:right; z-index:4; position:relative; top:<?php echo $header_padding;?>px; left:0; ">
<table><tr><td style="vertical-align:middle; padding-right:15px; text-align:right; border:none !important">
<div style="color:<?php echo $header_color;?>; font-size:14px;">
<span style="font-weight:normal; font-size:14px; font-weight:bold;"><?php if (isset($header_name)) {  echo $header_name; } ?></span><br>
<div><?php if (isset($header_email))  { echo $header_email;} ?></div>
<div><?php if (isset($header_tel))  { echo $header_tel;} ?></div>
<div style="width:114x; float:right;"> 

<?php if (($header_skype) ==!'')  {?>
<i class="fa fa-skype" style=""></i>&nbsp; <a href="skype:<?php echo $header_skype; ?>?call" style="text-decoration:none">
<span style="color: <?php echo $header_color; ?>"> <?php _e( 'Позвонить', 'inspiration' ); ?> </span></a><?php ;} else {} ?>

</div></div></td>
<td style="vertical-align:middle; border:none !important"><div style="text-align:right;"> <?php if (isset($header_gravatar)) { echo get_avatar( $header_gravatar, $header_gravatar_width );} ?></div></td></tr></table><?php ;} else {?><div id="ggg" style="display:table-cell;float:right; z-index:4; position:relative; top:<?php echo $header_padding;?>px; left:0; ">
<div style="padding-right:0px; text-align:right;">
<div class="header-name" style="color:<?php echo $header_color;?>; font-size:14px;">
<span style="font-weight:normal; font-size:14px; font-weight:bold;"><?php if (isset($header_name)) 
{  echo $header_name; } ?></span><br>
<div class="header-email"><?php if (isset($header_email))  { echo $header_email;} ?></div>
<div class="header-tel"><?php if (isset($header_tel))  { echo $header_tel;} ?></div>
<div style="width:114x; float:right;"class="header-skype">
<?php if (($header_skype) ==!'')  {?>
<i class="fa fa-skype" style=""></i>&nbsp; <a href="skype:<?php echo $header_skype; ?>?call" style="text-decoration:none">
<span style="color: <?php echo $header_color; ?>"> <?php _e( 'Позвонить', 'inspiration' ); ?> </span></a><?php ;} else {} ?></div>
</div></div><?php ;} ?></div> <?php } ?>



<?php if (($widget_header) == 'banner')  { ?><div id="ggg" style="height:<?php echo $banner_size;?>px;display:table-cell;float:right;z-index:4; position:relative; top:<?php echo $header_padding;?>px; left:0;">
<a href="<?php echo $banner_link; ?>" target="_blank" rel="nofollow"><img src="<?php echo $banner_image; ?>" alt=""></a>
</div><?php } ?>


<?php if (($widget_header) == 'search')  { ?><div id="ggg" style="margin-right: -20px;display:table-cell;float:right;z-index:4; position:relative; top:<?php echo $header_padding;?>px; left:0;">

<form method="get" class="form-search" action="<?php echo home_url( '/' ); ?>" style="width:300px;">
     <div class="input-group">
				<input type="text" class="form-control search-query input1" name="s" placeholder="<?php esc_attr_e('Поиск по блогу &hellip;', 'inspiration'); ?>" />
				<span class="input-group-btn">
					<button type="submit" class="btn btn-default" name="submit" id="searchsubmit" value="<?php esc_attr_e('Поиск', 'inspiration'); ?>"><i class="fa fa-search"></i></button>
				</span>
			</div>

</form>


</div><?php } ?>

		

		
	<?php if($bordercolor == 1) { } ?>

<?php if (($widget_header) == 'social')  { ?>
<div id="ggg" style="height:<?php echo $flwidth;?>px;display:table-cell;float:right;z-index:4; position:relative; top:<?php echo $header_padding;?>px; left:0;">
<style scoped>.socialiconstyletop i {color: <?php echo $icon_color_text;?>;} a:hover .socialiconstyletop i {color: <?php echo $icon_color_hover_text;?>;}  .socialiconstyletop{width:<?php echo $flwidth ;?>px; height:<?php echo $flwidth ;?>px; border-radius:<?php echo $form ;?>px; display: inline-block;margin:0px 3px 5px 0px;}


	
	



	
	<?php if($nativecolor == 1) { 
	
	if($bordercolor == 1) { ?>.socialiconstyletop {border: 1px solid <?php echo $icon_color ;?>; background:transparent}  .socialiconstyletop:hover { background:<?php echo $icon_color_hover; ?>;  } <?php } else { ?>
.socialiconstyletop {background:<?php echo $icon_color ;?>} .socialiconstyletop:hover {background:<?php echo $icon_color_hover; ?>; } <?php } } ?>



 <?php if($nativecolor == 0) { ?>
.socialiconstyletop i, a:hover .socialiconstyletop i{color:#fff} .socialiconstyletop.fb{background:#4A6EA9; }.socialiconstyletop.tw{background:#2CBDE2; }.socialiconstyletop.vk{background:#597CA4; }.socialiconstyletop.ok{background:#F48420; }.socialiconstyletop.gp{background:#DD4B38; }.socialiconstyletop.yt{background:#E14E42; }.socialiconstyletop.inst{background:#517FA4; } .socialiconstyletop.linkedin{background:#2C8DBA;}.socialiconstyletop.telegram{background:#1C94D1; }.socialiconstyletop.wechat{background:#00CE00; } .socialiconstyletop.whatsapp{background:#2EC550; }.socialiconstyletop.email{background:#0D73DA; }.socialiconstyletop.viber{background:#85419E; }


<?php } else {} ?></style>
<div style="text-align:center; padding-top:5px;">
<?php if ($facebook_page) {?> <a itemprop="url" rel="nofollow" href="<?php echo $facebook_page?>" target="_blank" class="linkicon"><div class="socialiconstyletop fb"><i style="line-height:<?php echo $flwidth;?>px;" class="fa fa-facebook <?php  if($flwidth == "30") { ?> fa-lg <?php } elseif ( $flwidth == "36") { ?> fa-lg <?php }  elseif ( $flwidth == "42") { ?> fa-2x <?php } elseif ( $flwidth == "52") { ?> fa-3x <?php } else { ?> fa-4x <?php } ?> "></i><span style="display:none"><?php _e( 'Следить на Facebook', 'inspiration' ); ?></span></div></a><?php }?> 

<?php if ($telegram) {?> <a itemprop="url" rel="nofollow" href="https://telegram.im/@<?php echo $telegram?>" target="_blank"><div class="socialiconstyletop telegram"><i style="line-height:<?php echo $flwidth;?>px;" class="fa fa-telegram <?php  if($flwidth == "30") { ?> fa-lg <?php } elseif ( $flwidth == "36") { ?> fa-lg <?php }  elseif ( $flwidth == "42") { ?> fa-2x <?php } elseif ( $flwidth == "52") { ?> fa-3x <?php } else { ?> fa-4x <?php } ?>"></i><span style="display:none"><?php _e( 'Присоединяйтесь в Телеграм', 'inspiration' ); ?></span></div></a><?php }?> 

<?php if ($twitter_id) { ?><a itemprop="url" rel="nofollow" href="<?php echo $twitter_id?>" target="_blank"><div class="socialiconstyletop tw"><i style="line-height:<?php echo $flwidth;?>px; " class="fa fa-twitter <?php  if($flwidth == "30") { ?> fa-lg <?php } elseif ( $flwidth == "36") { ?> fa-lg <?php }  elseif ( $flwidth == "42") { ?> fa-2x <?php } elseif ( $flwidth == "52") { ?> fa-3x <?php } else { ?> fa-4x <?php } ?> "></i><span style="display:none"><?php _e( 'Следить на Twitter', 'inspiration' ); ?></span></div></a><?php }?>


<?php if ($vkontakte) {?><a itemprop="url" rel="nofollow" href="<?php echo $vkontakte ?>" target="_blank"><div class="socialiconstyletop vk"><i style="line-height:<?php echo $flwidth;?>px;" class="fa fa-vk <?php  if($flwidth == "30") { ?> fa-lg <?php } elseif ( $flwidth == "36") { ?> fa-lg <?php }  elseif ( $flwidth == "42") { ?> fa-2x <?php } elseif ( $flwidth == "52") { ?> fa-3x <?php } else { ?> fa-4x <?php } ?> "></i><span style="display:none"><?php _e( 'Следить в Vkontakte', 'inspiration' ); ?></span></div></a><?php }?> 


<?php if ($ok) {?><a itemprop="url" rel="nofollow" href="<?php echo $ok ?>" target="_blank"><div class="socialiconstyletop ok"><i style="line-height:<?php echo $flwidth;?>px;" class="fa fa-odnoklassniki <?php  if($flwidth == "30") { ?> fa-lg <?php } elseif ( $flwidth == "36") { ?> fa-lg <?php }  elseif ( $flwidth == "42") { ?> fa-2x <?php } elseif ( $flwidth == "52") { ?> fa-3x <?php } else { ?> fa-4x <?php } ?>"></i><span style="display:none"><?php _e( 'Следить на Одноклассниках', 'inspiration' ); ?></span></div></a><?php }?> 


<?php if ($youtube) {?><a itemprop="url" rel="nofollow" href="<?php echo $youtube ?>" target="_blank"><div class="socialiconstyletop yt"><i style="line-height:<?php echo $flwidth;?>px;" class="fa fa-youtube <?php  if($flwidth == "30") { ?> fa-lg <?php } elseif ( $flwidth == "36") { ?> fa-lg <?php }  elseif ( $flwidth == "42") { ?> fa-2x <?php } elseif ( $flwidth == "52") { ?> fa-3x <?php } else { ?> fa-4x <?php } ?>"></i><span style="display:none"><?php _e( 'Подписаться на Youtube', 'inspiration' ); ?></span></div></a><?php }?> 


<?php if ($instagram) {?><a itemprop="url" rel="nofollow" href="<?php echo $instagram ?>" target="_blank"><div class="socialiconstyletop inst"><i style="line-height:<?php echo $flwidth;?>px;" class="fa fa-instagram <?php  if($flwidth == "30") { ?> fa-lg <?php } elseif ( $flwidth == "36") { ?> fa-lg <?php }  elseif ( $flwidth == "42") { ?> fa-2x <?php } elseif ( $flwidth == "52") { ?> fa-3x <?php } else { ?> fa-4x <?php } ?>"></i><span style="display:none"><?php _e( 'Следить в Instagram', 'inspiration' ); ?> </span></div></a><?php }?> 


<?php if ($whatsapp) {?><a itemprop="url" rel="nofollow" href="https://api.whatsapp.com/send?phone=<?php echo $whatsapp ?>" target="_blank"><div class="socialiconstyletop whatsapp"><i style="line-height:<?php echo $flwidth;?>px;" class="fa fa-whatsapp <?php  if($flwidth == "30") { ?> fa-lg <?php } elseif ( $flwidth == "36") { ?> fa-lg <?php }  elseif ( $flwidth == "42") { ?> fa-2x <?php } elseif ( $flwidth == "52") { ?> fa-3x <?php } else { ?> fa-4x <?php } ?>"></i><span style="display:none"><?php _e( 'Войти в контакт по WhatsApp', 'inspiration' ); ?></span></div></a><?php }?> 

<?php if ($viber) {?><a itemprop="url" rel="nofollow" href="viber://add?number=<?php echo $viber ?>" target="_blank"><div class="socialiconstyletop viber"><i style=" font-size: <?php  if($flwidth == "30") { ?> 15px; <?php } elseif ( $flwidth == "36") { ?> 15px; <?php }   else { ?> 22px; <?php } ?> line-height:<?php echo $flwidth;?>px;" class="fa fa-viber <?php  if($flwidth == "30") { ?> fa-lg <?php } elseif ( $flwidth == "36") { ?> fa-lg <?php }  elseif ( $flwidth == "42") { ?> fa-2x <?php } elseif ( $flwidth == "52") { ?> fa-3x <?php } else { ?> fa-4x <?php } ?>"></i><span style="display:none"><?php _e( 'Войти в контакт по Viber', 'inspiration' ); ?></span></div></a><?php }?> 

<?php if ($wechat) {?><a itemprop="url" rel="nofollow" href="<?php echo $wechat ?>" target="_blank" class="fancybox"><div class="socialiconstyletop wechat"><i style="line-height:<?php echo $flwidth;?>px;" class="fa fa-wechat <?php  if($flwidth == "30") { ?> fa-lg <?php } elseif ( $flwidth == "36") { ?> fa-lg <?php }  elseif ( $flwidth == "42") { ?> fa-2x <?php } elseif ( $flwidth == "52") { ?> fa-3x <?php } else { ?> fa-4x <?php } ?>"></i><span style="display:none"><?php _e( 'Войти в контакт по WeChat', 'inspiration' ); ?></span></div></a><?php }?> 

<?php if ($email) {?><a itemprop="url" rel="nofollow" href="mailto:<?php echo $email ?>" target="_blank"><div class="socialiconstyletop email"><i style="line-height:<?php echo $flwidth;?>px;" class="fa fa-envelope<?php  if($flwidth == "30") { ?> fa-lg <?php } elseif ( $flwidth == "36") { ?> fa-lg <?php }  elseif ( $flwidth == "42") { ?> fa-2x <?php } elseif ( $flwidth == "52") { ?> fa-3x <?php } else { ?> fa-4x <?php } ?>"></i><span style="display:none"><?php _e( 'Войти в контакт по Email', 'inspiration' ); ?></span></div></a><?php }?> 


<?php if ($linkedin) { ?><a itemprop="url" rel="nofollow" href="<?php echo $linkedin ?>" target="_blank"><div class="socialiconstyletop linkedin"><i style="line-height:<?php echo $flwidth;?>px;" class="fa fa-linkedin <?php  if($flwidth == "30") { ?> fa-lg <?php } elseif ( $flwidth == "36") { ?> fa-lg <?php }  elseif ( $flwidth == "42") { ?> fa-2x <?php } elseif ( $flwidth == "52") { ?> fa-3x <?php } else { ?> fa-4x <?php } ?>"></i><span style="display:none"><?php _e( 'Подписаться на Linkedin', 'inspiration' ); ?></span></div></a><?php } ?> </div></div>

<?php } ?>

</div></div>  <?php }

    function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['widget_header'] = strip_tags($new_instance['widget_header']);
        $instance['header_name'] = strip_tags($new_instance['header_name']);
        $instance['header_tel'] = strip_tags($new_instance['header_tel']);
		$instance['header_skype'] = strip_tags($new_instance['header_skype']);
		$instance['header_email'] = strip_tags($new_instance['header_email']);
		$instance['header_gravatar'] = strip_tags($new_instance['header_gravatar']);
		$instance['header_gravatar_width'] = strip_tags($new_instance['header_gravatar_width']);
        $instance['header_color'] = strip_tags($new_instance['header_color']);
        $instance['header_padding'] = strip_tags($new_instance['header_padding']);
        $instance['banner_link'] = $new_instance['banner_link'];
        $instance['banner_image'] = $new_instance['banner_image'];
        $instance['banner_size'] = $new_instance['banner_size'];
        $instance['twitter_id'] = strip_tags($new_instance['twitter_id']);
        $instance['facebook_page'] = strip_tags($new_instance['facebook_page']);
		$instance['youtube'] = strip_tags($new_instance['youtube']);
		$instance['vkontakte'] = strip_tags($new_instance['vkontakte']);
		$instance['ok'] = strip_tags($new_instance['ok']);
		$instance['instagram'] = strip_tags($new_instance['instagram']);
        $instance['flwidth'] = strip_tags($new_instance['flwidth']);
        $instance['form'] = strip_tags($new_instance['form']);
        $instance['icon_color'] = strip_tags($new_instance['icon_color']);
        $instance['linkedin'] = strip_tags($new_instance['linkedin']);
        $instance['telegram'] = strip_tags($new_instance['telegram']);
         $instance['nativecolor'] = $new_instance['nativecolor'];
         
         $instance['viber'] = $new_instance['viber'];
         $instance['email'] = $new_instance['email'];
         $instance['whatsapp'] = $new_instance['whatsapp'];
         $instance['wechat'] = $new_instance['wechat'];
         
         $instance['bordercolor'] = $new_instance['bordercolor'];
         $instance['icon_color_text'] = $new_instance['icon_color_text'];
         $instance['icon_color_hover_text'] = $new_instance['icon_color_hover_text'];
         
        

         
         
         
         $instance['icon_color_hover'] = strip_tags($new_instance['icon_color_hover']);
        return $instance; }
   function form($instance) {
        $current_user = wp_get_current_user();
        $defaults = array(
						'header_name' => $current_user->display_name,
						'header_tel' => '',
						'header_skype' => '',
						'header_email' => $current_user->user_email,
						'header_gravatar' => $current_user->user_email,
						'header_gravatar_width' => 75,
						'header_color' => '#000000',
						'header_padding' => '20',
						'widget_header' => 'authorprofile',
						'banner_image' => '',
						'banner_link' => '',
						'banner_size' => '60',
						'nativecolor' => 0,
						 'icon_color' => '#32acb2',
						 'icon_color_hover' => '#ff4b46',
						 'flwidth' => '52',
						 'form' => '5',
						 'bordercolor' => 0,
						 'icon_color_text' => '#ffffff',
						 'icon_color_hover_text' => '#ffffff',
						 
						);
						
						 $twitter_id = isset( $instance['twitter_id'] ) ? $instance['twitter_id'] :'';
        $facebook_page = isset( $instance['facebook_page'] ) ? esc_attr($instance['facebook_page']) :'';
	    $youtube = isset( $instance['youtube'] ) ? esc_attr($instance['youtube']) :'';
	    $vkontakte = isset( $instance['vkontakte'] ) ? esc_attr($instance['vkontakte']) :'';
        $ok = isset( $instance['ok'] ) ? esc_attr($instance['ok']) :'';
        $instagram = isset( $instance['instagram'] ) ? esc_attr($instance['instagram']) :'';
        $linkedin = isset( $instance['linkedin'] ) ? esc_attr($instance['linkedin']) :'';
        $telegram = isset( $instance['telegram'] ) ? esc_attr($instance['telegram']) :'';
        $wechat = isset( $instance['wechat'] ) ? esc_attr($instance['wechat']) :'';
        $whatsapp = isset( $instance['whatsapp'] ) ? esc_attr($instance['whatsapp']) :'';
        $email = isset( $instance['email'] ) ? esc_attr($instance['email']) :'';
        $viber = isset( $instance['viber'] ) ? esc_attr($instance['viber']) :'';
        
        
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>
 <script type="text/javascript">
    jQuery(document).ready(function($){
        $(".widget_choose").change(function(){
            $( "select option:selected").each(function(){
                if($(this).attr("value")=="authorprofile"){
                    $(".box").hide();
                    $(".author_profile").show();
                }
                if($(this).attr("value")=="banner"){
                    $(".box").hide();
                    $(".banner").show();
                }
                
                if($(this).attr("value")=="search"){
                    $(".box").hide();
                    $(".search").show();
                }
                
                if($(this).attr("value")=="social"){
                    $(".box").hide();
                    $(".social").show();
                }
                
                if($(this).attr("value")=="nowidget"){
                    $(".box").hide();
                   
                }
                
            });
        }).change();
    });
</script>
<div>
<p>
			<label for="<?php echo $this->get_field_id( 'widget_header' ); ?>"><?php _e( 'Выберите виджет:', 'inspiration' ); ?></label>
			<select name="<?php echo $this->get_field_name( 'widget_header' ); ?>" class="widefat widget_choose" id="<?php echo $this->get_field_id( 'widget_header' ); ?>">
				<option value="authorprofile" <?php selected( $instance['widget_header'], 'authorprofile' ); ?>><?php _e( 'Профиль автора', 'inspiration' ); ?></option>
				<option value="banner"<?php selected( $instance['widget_header'], 'banner' ); ?>><?php _e( 'Баннер', 'inspiration' ); ?></option>   
				
				<option value="search"<?php selected( $instance['widget_header'], 'search' ); ?>><?php _e( 'Поиск', 'inspiration' ); ?></option>   
				<option value="social"<?php selected( $instance['widget_header'], 'social' ); ?>><?php _e( 'Социальные кнопки', 'inspiration' ); ?></option>   
			</select>
		</p>
		</div>
	    <div class="author_profile box"  style="display: none;">
        <p>
          <label for="<?php echo $this->get_field_id('header_name'); ?>"><?php _e('Имя Фамилия:', 'inspiration'); ?></label>
          <input class="widefat" id="<?php echo $this->get_field_id('header_name'); ?>" name="<?php echo $this->get_field_name('header_name'); ?>" type="text" value="<?php echo $instance['header_name']; ?>" />
        </p>
        <p>
          <label for="<?php echo $this->get_field_id('header_email'); ?>"><?php _e('Email для связи:', 'inspiration'); ?></label>
          <input class="widefat" id="<?php echo $this->get_field_id('header_email'); ?>" name="<?php echo $this->get_field_name('header_email'); ?>" type="text" value="<?php echo $instance['header_email']; ?>" />
         </p>	
         <p>
          <label for="<?php echo $this->get_field_id('header_tel'); ?>"><?php _e('Телефон:', 'inspiration'); ?></label>
          <input class="widefat" id="<?php echo $this->get_field_id('header_tel'); ?>" name="<?php echo $this->get_field_name('header_tel'); ?>" type="text" value="<?php echo $instance['header_tel']; ?>" />
        </p>
        <p>
          <label for="<?php echo $this->get_field_id('header_skype'); ?>"><?php _e('Skype:', 'inspiration'); ?></label>
          <input class="widefat" id="<?php echo $this->get_field_id('header_skype'); ?>" name="<?php echo $this->get_field_name('header_skype'); ?>" type="text" value="<?php echo $instance['header_skype']; ?>" />
        </p>
         <p>
          <label for="<?php echo $this->get_field_id('header_gravatar'); ?>"><?php _e('Email Граватара:', 'inspiration'); ?></label>
          <input class="widefat" id="<?php echo $this->get_field_id('header_gravatar'); ?>" name="<?php echo $this->get_field_name('header_gravatar'); ?>" type="text" value="<?php echo $instance['header_gravatar']; ?>" />
        </p>
         <p>
	       <label for="<?php echo $this->get_field_id( 'header_gravatar_width' ); ?>"><?php _e( 'Размер граватара:', 'inspiration' ); ?>
	       <input class="widefat" id="<?php echo $this->get_field_id( 'header_gravatar_width' ); ?>" name="<?php echo $this->get_field_name( 'header_gravatar_width' ); ?>" type="text" value="<?php echo $instance['header_gravatar_width']; ?>" />
	       </label>
       </p>
       
       <script type='text/javascript'>
	jQuery(document).ready(function($) {
		$('.my-color-picker').wpColorPicker();
	});
</script>
 <p>
 <label for="<?php echo $this->get_field_id('header_color'); ?>"><?php _e('Цвет:', 'inspiration'); ?></label>
          <input class="my-color-picker" id="<?php echo $this->get_field_id('header_color'); ?>" name="<?php echo $this->get_field_name('header_color'); ?>" type="text" value="<?php echo $instance['header_color']; ?>" />
   </p>
   </div>
	 <div class="banner box" style="display: none;">
	  <p>
			<label for="<?php echo $this->get_field_id( 'banner_size' ); ?>"><?php _e( 'Размер баннера:', 'inspiration' ); ?></label>
			<select name="<?php echo $this->get_field_name( 'banner_size' ); ?>" class="widefat widget_choose" id="<?php echo $this->get_field_id( 'widget_header' ); ?>">
				<option value="60" <?php selected( $instance['banner_size'], '60' ); ?>><?php _e( 'Баннер на 468/60', 'inspiration' ); ?></option>
				<option value="90"<?php selected( $instance['banner_size'], '90' ); ?>><?php _e( 'Баннер на 720/90', 'inspiration' ); ?></option>   
			 </select>
		</p>
		 <p>
          <label for="<?php echo $this->get_field_id('banner_image'); ?>"><?php _e('Ссылка на баннер:', 'inspiration'); ?></label>
          <input class="widefat" id="<?php echo $this->get_field_id('banner_image'); ?>" name="<?php echo $this->get_field_name('banner_image'); ?>" type="text" value="<?php echo $instance['banner_image']; ?>" />
        </p>
        
        <p>
          <label for="<?php echo $this->get_field_id('banner_link'); ?>"><?php _e('Партнерская ссылка:', 'inspiration'); ?></label>
          <input class="widefat" id="<?php echo $this->get_field_id('banner_link'); ?>" name="<?php echo $this->get_field_name('banner_link'); ?>" type="text" value="<?php echo $instance['banner_link']; ?>" />
        </p>
	   </div>
	   
	   
	   
	   
	   <div class="search box" style="display: none;">
	  <p> Данный виджет не имеет настроек </p>
	   </div>
	   
	   
	   
	   
	   
	   
	   <div class="social box" style="display: none;">
	  
	  
	  
	           <p>
          <label for="<?php echo $this->get_field_id('twitter_id'); ?>"><?php _e('Ссылка на Твиттер аккаунт:', 'inspiration'); ?></label>
          <input class="widefat" id="<?php echo $this->get_field_id('twitter_id'); ?>" name="<?php echo $this->get_field_name('twitter_id'); ?>" type="text" value="<?php echo $twitter_id; ?>" />
        </p>
      
         <p>
          <label for="<?php echo $this->get_field_id('facebook_page'); ?>"><?php _e('Ссылка на Facebook аккаунт:', 'inspiration'); ?></label>
          <input class="widefat" id="<?php echo $this->get_field_id('facebook_page'); ?>" name="<?php echo $this->get_field_name('facebook_page'); ?>" type="text" value="<?php echo $facebook_page; ?>" />
        </p>
        
        <p>
          <label for="<?php echo $this->get_field_id('telegram'); ?>"><?php _e('Логин аккаунта в Телеграм:', 'inspiration'); ?></label>
          <input class="widefat" id="<?php echo $this->get_field_id('telegram'); ?>" name="<?php echo $this->get_field_name('telegram'); ?>" type="text" value="<?php echo $telegram; ?>" />
        </p>
		
	  <p>
          <label for="<?php echo $this->get_field_id('vkontakte'); ?>"><?php _e('Ссылка на аккаунт Vkontakte:', 'inspiration'); ?></label>
          <input class="widefat" id="<?php echo $this->get_field_id('vkontakte'); ?>" name="<?php echo $this->get_field_name('vkontakte'); ?>" type="text" value="<?php echo $vkontakte; ?>" />
        </p>
        
         <p>
          <label for="<?php echo $this->get_field_id('ok'); ?>"><?php _e('Ссылка на аккаунт Odnoklassniki:', 'inspiration'); ?></label>
          <input class="widefat" id="<?php echo $this->get_field_id('ok'); ?>" name="<?php echo $this->get_field_name('ok'); ?>" type="text" value="<?php echo $ok; ?>" />
        </p>
        
        <p>
          <label for="<?php echo $this->get_field_id('youtube'); ?>"><?php _e('Ссылка на канал Youtube:', 'inspiration'); ?></label>
          <input class="widefat" id="<?php echo $this->get_field_id('youtube'); ?>" name="<?php echo $this->get_field_name('youtube'); ?>" type="text" value="<?php echo $youtube; ?>" />
        </p>	
        
         <p>
          <label for="<?php echo $this->get_field_id('instagram'); ?>"><?php _e('Ссылка на аккаунт Instagram:', 'inspiration'); ?></label>
          <input class="widefat" id="<?php echo $this->get_field_id('instagram'); ?>" name="<?php echo $this->get_field_name('instagram'); ?>" type="text" value="<?php echo $instagram; ?>" />
        </p>
       
        
        <p>
          <label for="<?php echo $this->get_field_id('whatsapp'); ?>"><?php _e('WhatsApp:', 'inspiration'); ?></label>
          <input class="widefat" id="<?php echo $this->get_field_id('whatsapp'); ?>" name="<?php echo $this->get_field_name('whatsapp'); ?>" type="text" value="<?php echo $whatsapp; ?>" />
        </p>
        
        
           <p>
          <label for="<?php echo $this->get_field_id('viber'); ?>"><?php _e('Viber:', 'inspiration'); ?></label>
          <input class="widefat" id="<?php echo $this->get_field_id('viber'); ?>" name="<?php echo $this->get_field_name('viber'); ?>" type="text" value="<?php echo $viber; ?>" />
        </p>
        
          <p>
          <label for="<?php echo $this->get_field_id('email'); ?>"><?php _e('Email адрес:', 'inspiration'); ?></label>
          <input class="widefat" id="<?php echo $this->get_field_id('email'); ?>" name="<?php echo $this->get_field_name('email'); ?>" type="text" value="<?php echo $email; ?>" />
        </p>
        
         <p>
          <label for="<?php echo $this->get_field_id('wechat'); ?>"><?php _e('Ссылка на изображение QR WeChat :', 'inspiration'); ?></label>
          <input class="widefat" id="<?php echo $this->get_field_id('wechat'); ?>" name="<?php echo $this->get_field_name('wechat'); ?>" type="text" value="<?php echo $wechat; ?>" />
        </p>
        

        
        
        
        <p>
          <label for="<?php echo $this->get_field_id('linkedin'); ?>"><?php _e('Ссылка на ленту Linkedin:', 'inspiration'); ?></label>
          <input class="widefat" id="<?php echo $this->get_field_id('linkedin'); ?>" name="<?php echo $this->get_field_name('linkedin'); ?>" type="text" value="<?php echo $linkedin; ?>" />
        </p>
        
        
        	

<p>
			<label for="<?php echo $this->get_field_id( 'flwidth' ); ?>"><?php _e( 'Размер кнопок:', 'inspiration' ); ?></label>
			<select name="<?php echo $this->get_field_name( 'flwidth' ); ?>" class="widefat" id="<?php echo $this->get_field_id( 'flwidth' ); ?>">
				<option value="30"<?php selected( $instance['flwidth'], '30' ); ?>>30</option>
				<option value="36"<?php selected( $instance['flwidth'], '36' ); ?>>36</option>
				<option value="42"<?php selected( $instance['flwidth'], '42' ); ?>>42</option>
                <option value="52"<?php selected( $instance['flwidth'], '52' ); ?>>52</option> 
                   <option value="64"<?php selected( $instance['flwidth'], '64' ); ?>>64</option>    				
			</select>
		</p>
		
		
		<p>
			<label for="<?php echo $this->get_field_id( 'form' ); ?>"><?php _e( 'Форма кнопок:', 'inspiration' ); ?></label>
			<select name="<?php echo $this->get_field_name( 'form' ); ?>" class="widefat" id="<?php echo $this->get_field_id( 'form' ); ?>">
				<option value="0"<?php selected( $instance['form'], '0' ); ?>><?php _e( 'Квадратные', 'inspiration' ); ?></option>
				<option value="5"<?php selected( $instance['form'], '5' ); ?>><?php _e( 'С загруглениями', 'inspiration' ); ?></option>
				<option value="50"<?php selected( $instance['form'], '50' ); ?>><?php _e( 'Круглые', 'inspiration' ); ?></option>
                  				
			</select>
		</p>
		
		<p>
		
		 <input id="<?php echo $this->get_field_id('nativecolor'); ?>" name="<?php echo $this->get_field_name('nativecolor'); ?>" type="checkbox" value="1" <?php checked( '1', $instance['nativecolor']); ?>/>
          <label for="<?php echo $this->get_field_id('nativecolor'); ?>"><?php _e('Использовать один цвет для иконок?', 'inspiration'); ?></label> 
		

		</p>
		
		<p>
		
		 <input id="<?php echo $this->get_field_id('bordercolor'); ?>" name="<?php echo $this->get_field_name('bordercolor'); ?>" type="checkbox" value="1" <?php checked( '1', $instance['bordercolor']); ?>/>
          <label for="<?php echo $this->get_field_id('bordercolor'); ?>"><?php _e('Вместо фона использовать границу?', 'inspiration'); ?></label> 
		

		</p>
		
		
		
		 <script type='text/javascript'>
	jQuery(document).ready(function($) {
		$('.my-color-picker3').wpColorPicker();
	});
</script>  
		<p>
 <label for="<?php echo $this->get_field_id('icon_color'); ?>"><?php _e('Цвет кнопок:', 'inspiration'); ?></label><br>
          <input class="my-color-picker3" id="<?php echo $this->get_field_id('icon_color'); ?>" name="<?php echo $this->get_field_name('icon_color'); ?>" type="text" value="<?php echo $instance['icon_color']; ?>" />
   </p>
   
    <script type='text/javascript'>
	jQuery(document).ready(function($) {
		$('.my-color-pickertext1').wpColorPicker();
	});
</script>  
		<p>
 <label for="<?php echo $this->get_field_id('icon_color_text'); ?>"><?php _e('Цвет иконок кнопок:', 'inspiration'); ?></label><br>
          <input class="my-color-pickertext1" id="<?php echo $this->get_field_id('icon_color_text'); ?>" name="<?php echo $this->get_field_name('icon_color_text'); ?>" type="text" value="<?php echo $instance['icon_color_text']; ?>" />
   </p>
   
    <script type='text/javascript'>
	jQuery(document).ready(function($) {
		$('.my-color-picker4').wpColorPicker();
	});
</script>  
		<p>
 <label for="<?php echo $this->get_field_id('icon_color_hover'); ?>"><?php _e('Цвет кнопок при наведении мышки:', 'inspiration'); ?></label><br>
          <input class="my-color-picker4" id="<?php echo $this->get_field_id('icon_color_hover'); ?>" name="<?php echo $this->get_field_name('icon_color_hover'); ?>" type="text" value="<?php echo $instance['icon_color_hover']; ?>" />
   </p>
   
   <script type='text/javascript'>
	jQuery(document).ready(function($) {
		$('.my-color-pickertext2').wpColorPicker();
	});
</script>  
		<p>
 <label for="<?php echo $this->get_field_id('icon_color_hover_text'); ?>"><?php _e('Цвет иконок кнопок наведении мышки:', 'inspiration'); ?></label><br>
          <input class="my-color-pickertext2" id="<?php echo $this->get_field_id('icon_color_hover_text'); ?>" name="<?php echo $this->get_field_name('icon_color_hover_text'); ?>" type="text" value="<?php echo $instance['icon_color_hover_text']; ?>" />
   </p>
	  
	   </div>
	   
	   
	   
	   

        
            <p>
			<label for="<?php echo $this->get_field_id( 'header_padding' ); ?>"><?php _e( 'Отступ сверху:', 'inspiration' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('header_padding'); ?>" name="<?php echo $this->get_field_name('header_padding'); ?>" type="text" value="<?php echo $instance['header_padding']; ?>" />
		</p>
        
       
		
		
        <?php
    }
    
   
 
} 


add_action( 'widgets_init', function(){
     register_widget( 'header_widget_only' );
});


/*----------About author--------------------------------------------------------

About author

-----------------------------------------------------------------------------------*/

class Widget_BlogAuthorInfo extends WP_Widget {

	
	function __construct() {
		$widget_ops = array('classname' => 'widget_blogauthorinfo', 'description' => __('Виджет приветствие автора блога', 'inspiration'));
		$control_ops = array('width' => 400, 'height' => 350, 'id_base' => 'blogauthorinfo');
		parent::__construct('blogauthorinfo', __('1 - AB - Приветствие автора', 'inspiration'), $widget_ops, $widget_ops);
	}
	



	function widget( $args, $instance ) {  
		
		$html = '';
		
		extract( $args, EXTR_SKIP );
		
		/* Our variables from the widget settings. */
		$title = apply_filters('widget_title', $instance['title'], $instance, $this->id_base );
		
		$bio = $instance['bio'];
		$custom_email = $instance['custom_email'];
		$avatar_size = $instance['avatar_size']; if ( ! $avatar_size ) { $avatar_size = 48; }
		$avatar_align = $instance['avatar_align']; if ( ! $avatar_align ) { $avatar_align = 'left'; }
      $avatar_shape = $instance['avatar_shape']; if ( ! $avatar_shape ) { $avatar_shape = 'square'; }
      
		$read_more_text = $instance['read_more_text'];
		$read_more_url = $instance['read_more_url'];
		$page = $instance['page'];
		$audio = $instance['audio'];
		$audioautoplay = $instance['audioautoplay'];
		$autorvideo = $instance['autorvideo'];
		$embedvideoformat = $instance['embedvideoformat'];
		$autorvideoimage = $instance['autorvideoimage'];
		$email = $instance['email'];
		$skype = $instance['skype'];
		$tel = $instance['tel'];
		
		
		/* Determine whether or not to display the widget, depending on the "page" setting. */
		$display_widget = false;
		
		if ( ( $page == 'home' && ( is_home() || is_front_page() ) ) || ( $page == 'single' && is_singular() ) || $page == 'all' ) {
			$display_widget = true;
		} // End IF Statement
		
		if ( $display_widget == true ) { 
		
			/* Before widget (defined by themes). */
			echo $before_widget;
	
			/* Display the widget title if one was input (before and after defined by themes). */
			if ( $title ) {
			
				echo $before_title . $title . $after_title;
			
			} // End IF Statement
			
			/* Widget content. */
			
			// Add actions for plugins/themes to hook onto.
			do_action( 'widget_blogauthorinfo_top' );
			
			$html = '<div class="textwidget">';
			
			/* Optionally display the Gravatar. */
			if ( $custom_email != '' && is_email( $custom_email ) ) {
				$html .=  '<div class="'.  $avatar_align.' '.  $avatar_shape.'" style="padding-top:5px;">' . get_avatar( $custom_email, $avatar_size ) . '</div>' . "\n";
			}
			
			/* Optionally display the bio. */
			if ( $bio != '' ) {
				$html .= '<div style="font-size:16px; color:#333 !important; line-height:20px;">' . $bio . '</div>' . "\n";
			}

				if ( $read_more_url != '' ) {
				$html .= '<div style="padding-top:10px;font-size:16px; padding-bottom:10px;"><a href="' . $read_more_url . '">' . $read_more_text . '</a></div>' . "\n";
			}
			
			
			/* Optionally display the audio. */
			 if ($audioautoplay == '1')   $audiovolume = "autoplay"; else $audiovolume = "";
			
			
			if ( $audio != '' ) {
			
		$html .= '<div style="margin-top:10px; margin-bottom:10px;"><audio controls '.  $audiovolume .'><source src="'. $audio .'" type="audio/mpeg"></audio></div>' . "\n"; }	
			
if ( $embedvideoformat == 'flv' ) {
		$videoWidgetFolder = get_bloginfo('ab_template_directory').'/inc/player/';
		$html .= '<div style="margin-bottom:10px;" ><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" id="mediaplayer1" name="mediaplayer1" width="300" height="169"><param name="movie" value="'.  $videoWidgetFolder .'/player.swf"><param name="allowfullscreen" value="true"><param name="allowscriptaccess" value="always"><param name="bgcolor" value="#000000"><param name="wmode" value="opaque"><param name="flashvars" value="file='.  $autorvideo .'&image='.  $autorvideoimage .'"><script type="text/javascript" src="'.  $videoWidgetFolder .'/jwplayer.js"></script><embed id="mediaplayer1" name="mediaplayer2" src="'.  $videoWidgetFolder .'/player.swf" width="300" height="169" allowfullscreen="true" allowscriptaccess="always" bgcolor="#000000" wmode="opaque" flashvars="file='.  $autorvideo .'&image='.  $autorvideoimage .'" /></object></div>'. "\n";
		
		}
			
			elseif ( $embedvideoformat == 'youtube' ) {
			$html .= '<div style="margin-bottom:10px;" ><iframe width="300" height="169" src="//www.youtube.com/embed/'.  $autorvideo .'?rel=0" allowfullscreen></iframe></div>
			
			
		'. "\n"; }
				elseif ( $embedvideoformat == 'no' ) {$html .= ''. "\n";}
		
					
			
			
			
			
		if ( $email != '' ) {
				$html .= '<div style="font-size:14px;"> <strong> '. __( 'Email: ', 'inspiration' ).' </strong> ' . $email  . '</div>' . "\n";
			}	
			if ( $skype != '' ) {
				$html .= '<div style="font-size:14px;"> <strong> '. __( 'Skype:', 'inspiration' ).' </strong>  ' . $skype  . '</div>' . "\n";
			}
			
			if ( $tel != '' ) {
				$html .= '<div style="font-size:14px;"> <strong> '. __( 'Тел:', 'inspiration' ).' </strong>  ' . $tel  . '</div>' . "\n";
			}	
			$html .= '<div class="fix"></div></div>' . "\n";
			
			
			
echo $html;
			
			
			
			// Add actions for plugins/themes to hook onto.
			do_action( 'widget_blogauthorinfo_bottom' );
	
			/* After widget (defined by themes). */
			echo $after_widget;
		
		} // End IF Statement

	} // End widget()

	/*----------------------------------------
	  update()
	  ----------------------------------------
	  
	  * Function to update the settings from
	  * the form() function.
	  
	  * Params:
	  * - Array $new_instance
	  * - Array $old_instance
	----------------------------------------*/
	
	function update ( $new_instance, $old_instance ) {
		
		$instance = $old_instance;

		/* Strip tags for title and name to remove HTML (important for text inputs). */
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['bio'] = wp_kses_post( $new_instance['bio'] );
		$instance['custom_email'] = esc_attr( $new_instance['custom_email'] );
		$instance['avatar_size'] = esc_attr( $new_instance['avatar_size'] );
        $instance['avatar_shape'] = esc_attr( $new_instance['avatar_shape'] );
      
		$instance['avatar_align'] = esc_attr( $new_instance['avatar_align'] );
		$instance['read_more_text'] = esc_attr( $new_instance['read_more_text'] );
		$instance['read_more_url'] = esc_attr( $new_instance['read_more_url'] );
		$instance['page'] = esc_attr( $new_instance['page'] );
		$instance['audio'] = esc_attr( $new_instance['audio'] );

		$instance['audioautoplay'] = esc_attr( $new_instance['audioautoplay'] );
		$instance['autorvideo'] = esc_attr( $new_instance['autorvideo'] );
		$instance['embedvideoformat'] = esc_attr( $new_instance['embedvideoformat'] );
		$instance['autorvideoimage'] = esc_attr( $new_instance['autorvideoimage'] );
		
		$instance['email'] = esc_attr( $new_instance['email'] );
		$instance['skype'] = esc_attr( $new_instance['skype'] );
		$instance['tel'] = esc_attr( $new_instance['tel'] );

	
		return $instance;
		
   } // End update()
	
	/*----------------------------------------
	  form()
	  ----------------------------------------
	  
	  * The form on the widget control in the
	  * widget administration area.
	  
	  * Make use of the get_field_id() and 
	  * get_field_name() function when creating
	  * your form elements. This handles the confusing stuff.
	  
	  * Params:
	  * - Array $instance
	----------------------------------------*/

   function form( $instance ) {        
   
		/* Set up some default widget settings. */
		$defaults = array(
						'title' => __( 'Добро пожаловать!', 'inspiration' ), 
						'bio' => '', 
						'custom_email' => '', 
						'avatar_size' => 67, 
						'avatar_align' => 'left',
                        'avatar_shape' => 'square',
						'read_more_text' => __( 'Узнать больше', 'inspiration' ), 
						'read_more_url' => '', 
						'page' => 'all',
						'audio' => '',
						'audioheight' => 20,
						'audioautoplay' => 0,
						'embedvideoformat' => 'no',
						'autorvideoimage' => '',
						'email' => '',
						'skype' => '',
						'tel' => ''
						
					
						
					);
		
		 $instance = wp_parse_args( (array) $instance, $defaults );
		
				
        $autorvideo = isset( $instance['autorvideo'] ) ? esc_attr($instance['autorvideo']) :'';
     
      
?>

	
	
	
		<!-- Widget Title: Text Input -->
		
			<p>
		   <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Заголовок:', 'inspiration' ); ?></label>
		   
		   
		   <input type="text" name="<?php echo $this->get_field_name( 'title' ); ?>"  value="<?php echo $instance['title']; ?>" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>"  />
		</p>
		
	
		
<div style="background:#e9e9e9; padding:5px; border-left:3px solid #ddd; border-top:1px solid #ddd; border-right:1px solid #ddd; border-bottom:1px solid #ddd; width:390px; color: #000; margin: 20px 0 20px 0">
<p style="font-size:16px; font-weight:bold"><?php _e( 'Настройки изображение и текста', 'inspiration' ); ?></p>
<div class="splCont">
  
  
  
  
  	<p>
		   <label for="<?php echo $this->get_field_id( 'bio' ); ?>"><?php _e( 'Текст приветствие:', 'inspiration' ); ?></label>
			<textarea name="<?php echo $this->get_field_name( 'bio' ); ?>" class="widefat" style="height:100px;" id="<?php echo $this->get_field_id( 'bio' ); ?>"><?php echo $instance['bio']; ?></textarea>
		</p>


<p>
		   <label for="<?php echo $this->get_field_id( 'custom_email' ); ?>"><?php _e( '<a href="//ru.gravatar.com/">Граватар</a> email:', 'inspiration' ); ?></label>
		   <input type="text" name="<?php echo $this->get_field_name( 'custom_email' ); ?>"  value="<?php esc_attr_e( $instance['custom_email'] ); ?>" class="widefat" id="<?php echo $this->get_field_id( 'custom_email' ); ?>" />
		</p>
		<!-- Widget Avatar Size: Text Input -->
		<p>
		   <label for="<?php echo $this->get_field_id( 'avatar_size' ); ?>"><?php _e( 'Размер фото:', 'inspiration' ); ?></label>
		   <input type="text" name="<?php echo $this->get_field_name( 'avatar_size' ); ?>"  value="<?php echo $instance['avatar_size']; ?>" class="widefat" id="<?php echo $this->get_field_id( 'avatar_size' ); ?>" />
		</p>
		<!-- Widget Avatar Align: Select Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'avatar_align' ); ?>"><?php _e( 'Расположение фото:', 'inspiration' ); ?></label>
			<select name="<?php echo $this->get_field_name( 'avatar_align' ); ?>" class="widefat" id="<?php echo $this->get_field_id( 'avatar_align' ); ?>">
				<option value="left"<?php selected( $instance['avatar_align'], 'left' ); ?>><?php _e( 'Слева', 'inspiration' ); ?></option>
				<option value="right"<?php selected( $instance['avatar_align'], 'right' ); ?>><?php _e( 'Справа', 'inspiration' ); ?></option> 
              <option value="center"<?php selected( $instance['avatar_align'], 'center' ); ?>><?php _e( 'По-центру', 'inspiration' ); ?></option> 
				       
			</select>
		</p>
  
  
  <p>
			<label for="<?php echo $this->get_field_id( 'avatar_shape' ); ?>"><?php _e( 'Форма фото:', 'inspiration' ); ?></label>
			<select name="<?php echo $this->get_field_name( 'avatar_shape' ); ?>" class="widefat" id="<?php echo $this->get_field_id( 'avatar_shape' ); ?>">
				<option value="square"<?php selected( $instance['avatar_shape'], 'square' ); ?>><?php _e( 'Квадратное', 'inspiration' ); ?></option>
				<option value="semiround"<?php selected( $instance['avatar_shape'], 'semiround' ); ?>><?php _e( 'С загруглениями', 'inspiration' ); ?></option> 
              <option value="round"<?php selected( $instance['avatar_shape'], 'round' ); ?>><?php _e( 'Круглое', 'inspiration' ); ?></option> 
				       
			</select>
		</p>
		
		
				<p>
		   <label for="<?php echo $this->get_field_id( 'read_more_text' ); ?>"><?php _e( 'Читать далее (по желанию):', 'inspiration' ); ?></label>
		   <input type="text" name="<?php echo $this->get_field_name( 'read_more_text' ); ?>"  value="<?php echo $instance['read_more_text']; ?>" class="widefat" id="<?php echo $this->get_field_id( 'read_more_text' ); ?>" />
		</p>
		
		<p>
		   <label for="<?php echo $this->get_field_id( 'read_more_url' ); ?>"><?php _e( 'Ссылка на страницу об авторе (по желанию):', 'inspiration' ); ?></label>
		   <input type="text" name="<?php echo $this->get_field_name( 'read_more_url' ); ?>"  value="<?php echo $instance['read_more_url']; ?>" class="widefat" id="<?php echo $this->get_field_id( 'read_more_url' ); ?>" />
		</p>

</div>


</div>
		
		
		<div style="background:#e9e9e9; padding:5px; border-left:3px solid #ddd; border-top:1px solid #ddd; border-right:1px solid #ddd; border-bottom:1px solid #ddd; width:390px; color: #000; margin: 20px 0 20px 0">
<p style="font-size:16px; font-weight:bold"><?php _e( 'Настройки аудио приветствия', 'inspiration' ); ?></p>
<div class="splCont">

  
	<p>
		   <label for="<?php echo $this->get_field_id( 'audio' ); ?>"><?php _e( 'Ссылка на аудиофайл:', 'inspiration' ); ?></label>
		   
		   
		   <input type="text" name="<?php echo $this->get_field_name( 'audio' ); ?>"  value="<?php esc_attr_e( $instance['audio'] ); ?>" class="widefat" id="<?php echo $this->get_field_id( 'audio' ); ?>" />
		</p>
		
		
		
		
		
			
		       
		       
		       	<p>
			<label for="<?php echo $this->get_field_id( 'audioautoplay' ); ?>"><?php _e( 'Авто проигрывание:', 'inspiration' ); ?></label>
			<select name="<?php echo $this->get_field_name( 'audioautoplay' ); ?>" class="widefat" id="<?php echo $this->get_field_id( 'audioautoplay' ); ?>">
				
				<option value="0"<?php selected( $instance['audioautoplay'], '0' ); ?>><?php _e( 'Нет', 'inspiration' ); ?></option>
				<option value="1"<?php selected( $instance['audioautoplay'], '1' ); ?>><?php _e( 'Да', 'inspiration' ); ?></option>            
			</select>
		</p>	 
		
		    	 
		      
		      
		        		
		 
</div>


</div>

		<div style="background:#e9e9e9; padding:5px; border-left:3px solid #ddd; border-top:1px solid #ddd; border-right:1px solid #ddd; border-bottom:1px solid #ddd; width:390px; color: #000; margin: 20px 0 20px 0">
<p style="font-size:16px; font-weight:bold"><?php _e( 'Настройки видео приветствия', 'inspiration' ); ?></p>
<div>
  


<p>
			<label for="<?php echo $this->get_field_id( 'embedvideoformat' ); ?>"><?php _e( 'Ресурс, где размещено видео:', 'inspiration' ); ?></label>
			<select name="<?php echo $this->get_field_name( 'embedvideoformat' ); ?>" class="widefat" id="<?php echo $this->get_field_id( 'embedvideoformat' ); ?>">
				
				<option value="no"<?php selected( $instance['embedvideoformat'], 'no' ); ?>><?php _e( 'Нет', 'inspiration' ); ?></option>  
				
				
				<option value="flv"<?php selected( $instance['embedvideoformat'], 'flv' ); ?>><?php _e( 'FLV', 'inspiration' ); ?></option>
				<option value="youtube"<?php selected( $instance['embedvideoformat'], 'youtube' ); ?>><?php _e( 'YouTube', 'inspiration' ); ?></option>    
				
				
				        
			</select>
		</p>
		



		<p>
		   <label for="<?php echo $this->get_field_id( 'autorvideo' ); ?>"><?php _e( 'ID видео:', 'inspiration' ); ?>
  </label><br>
		   <span> <strong>flv</strong> - <?php _e( 'полный путь к файлу flv или mp4', 'inspiration' ); ?>. <br>Например: <span style='color:#ff0000'>http://VashBlog.Ru/video/NazvanieVideo.mp4</span></span><br>
		   <span> <strong>YouTube</strong> - <?php _e( 'ID видео размещенного на Youtube', 'inspiration' ); ?>. <br><?php _e( 'Например', 'inspiration' ); ?>: http://www.youtube.com/watch?v=<span style='color:#ff0000'>zORv8wwiad</span></span>
		   
		   <input type="text" name="<?php echo $this->get_field_name( 'autorvideo' ); ?>"  value="<?php esc_attr_e( $instance['autorvideo'] ); ?>" class="widefat" id="<?php echo $this->get_field_id( 'autorvideo' ); ?>" />
		</p>
		
		
		
			      	<p>
		   <label for="<?php echo $this->get_field_id( 'autorvideoimage' ); ?>"><?php _e( 'Ссылка на изображение для видео FLV:', 'inspiration' ); ?></label>
		   
		   
		   <input type="text" name="<?php echo $this->get_field_name( 'autorvideoimage' ); ?>"  value="<?php esc_attr_e( $instance['autorvideoimage'] ); ?>" class="widefat" id="<?php echo $this->get_field_id( 'autorvideoimage' ); ?>" />
		</p>
		
	
		

</div>


</div>
		
			<div style="background:#e9e9e9; padding:5px; border-left:3px solid #ddd; border-top:1px solid #ddd; border-right:1px solid #ddd; border-bottom:1px solid #ddd; width:390px; color: #000; margin: 20px 0 20px 0">
<p style="font-size:16px; font-weight:bold"><?php _e( 'Настройки контактов', 'inspiration' ); ?></p>
<div>	
		

		<p>
			<label for="<?php echo $this->get_field_id( 'email' ); ?>"><?php _e( ' Email: ', 'inspiration' ); ?></label>
		
		
		   <input type="text" name="<?php echo $this->get_field_name( 'email' ); ?>"  value="<?php esc_attr_e( $instance['email'] ); ?>" class="widefat" id="<?php echo $this->get_field_id( 'email' ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'skype' ); ?>"><?php _e( 'Skype:', 'inspiration' ); ?></label>
		
		   <input type="text" name="<?php echo $this->get_field_name( 'skype' ); ?>"  value="<?php esc_attr_e( $instance['skype'] ); ?>" class="widefat" id="<?php echo $this->get_field_id( 'skype' ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'tel' ); ?>"><?php _e( 'Телефон:', 'inspiration' ); ?></label>
		
		   <input type="text" name="<?php echo $this->get_field_name( 'tel' ); ?>"  value="<?php esc_attr_e( $instance['tel'] ); ?>" class="widefat" id="<?php echo $this->get_field_id( 'tel' ); ?>" />
		</p>
	
		
		
		
		
		<!-- Widget Page: Select Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'page' ); ?>"><?php _e( 'На каких страницах показывать:', 'inspiration' ); ?></label>
			<select name="<?php echo $this->get_field_name( 'page' ); ?>" class="widefat" id="<?php echo $this->get_field_id( 'page' ); ?>">
				<option value="all"<?php selected( $instance['page'], 'all' ); ?>><?php _e( 'На всех', 'inspiration' ); ?></option>
				<option value="home"<?php selected( $instance['page'], 'home' ); ?>><?php _e( 'Только на главной', 'inspiration' ); ?></option>            
				<option value="single"<?php selected( $instance['page'], 'single' ); ?>><?php _e( 'Только в статьях', 'inspiration' ); ?></option>            
			</select>
		</p>

	</div>


</div>
		
		
		<?php
	} // End form()
	
} // End Class

add_action( 'widgets_init', function(){
     register_widget( 'Widget_BlogAuthorInfo' );
});



// =============================== Sidebar Subscription From JustClick======================================



class subform_widget extends WP_Widget {
	
	
	public function __construct() {
		$widget_ops = array( 
			'description' => __( 'Виджет формы подписки. Стиль оформляется в настройках шаблона', 'inspiration' ),
		);
		parent::__construct( 'subform_widget',  __( '2 - AB - Форма подписки', 'inspiration' ), $widget_ops );
	}
	


    public function widget($args, $instance) {
        extract( $args );
        $formname 	= $instance['formname'];
$sendsayformkod = $instance['sendsayformkod'];
$sendsayformid = $instance['sendsayformid'];
$idname = $instance['idname'];
$chooseform = $instance['chooseform'];
$formid = $instance['formid'];
$old_form = $instance['old_form'];
$onebuttonlink = $instance['onebuttonlink'];
$loginjustclick = $instance['loginjustclick'];
$markerjustclik = $instance['markerjustclik'];
$groupjustclick = $instance['groupjustclick'];
$loginmailchimp = $instance['loginmailchimp'];
$idprofilemailchimp = $instance['idprofilemailchimp'];
$listidmailchimp = $instance['listidmailchimp'];
$loginunisender = $instance['loginunisender'];
$hashunisender = $instance['hashunisender'];
$justclickurl2 = $instance['justclickurl2'];
$page = $instance['page'];
$thankyou_url = $instance['thankyou_url'];
$idautoweboffice = $instance['idautoweboffice'];
$idautowebofficepassylki = $instance['idautowebofficepassylki'];
$loginautoweboffice = $instance['loginautoweboffice'];



$idformmailerlite = $instance['idformmailerlite'];
$idlandingmailerlite = $instance['idlandingmailerlite'];
$idstatistic = $instance['idstatistic'];
$thankyoumailerlite = $instance['thankyoumailerlite'];		
$get360url = $instance['get360url'];	
$formid360 = $instance['formid360'];	
$thankyou_url360 = $instance['thankyou_url360'];

$hashsendpulse = $instance['hashsendpulse'];	
$sendpulseformid = $instance['sendpulseformid'];	
$idnamefield = $instance['idnamefield'];		
$scriptid = $instance['scriptid'];

	

	/* Determine whether or not to display the widget, depending on the "page" setting. */
		$display_widget = false;
		
		if ( ( $page == 'home' && ( is_home() || is_front_page() ) ) || ( $page == 'single' && is_singular() ) || $page == 'all' ) {
			$display_widget = true;
		} // End IF Statement
if ( $display_widget == true ) { 
if ($chooseform == 'smart')  { ?> 
<div id="form-background" class="roundedcorners"><div class="form-heading"><?php echo of_get_option('form_text', 'no entry'); ?> </div>
<div><?php if (of_get_option('form_uploader') !== ""){?><img src="<?php echo of_get_option('form_uploader', 'no entry' ); ?>" style="text-align: center; width:275px; padding-bottom:15px;" width="275" alt=""><?php ;}?></div>
<div style="width:auto;text-align: center; padding-top: 0px; padding-left:0px;">

<script type="text/javascript">
var PS_ErrPref = 'Поля не заполнены или заполнены неверно: \n'; 
</script>
<script type="text/javascript" src="https://sendsay.ru/account/js/formCheck.js"></script>

<form id="sendsay_form" style="margin: 0pt; padding: 0pt;" name="form_<?php echo $formname;?>" target="_blank" action="https://sendsay.ru/form/<?php echo $sendsayformkod;?>/<?php echo $sendsayformid;?>" method="post" onsubmit="javascript:if(typeof sendsay_check_form === 'function'){ return sendsay_check_form(this); }" accept-charset="utf-8">

<div style="padding-bottom: 5px;" id="<?php echo $idname;?>" class="subpro_clear sendsayFieldItem"><input size="27" class="input1" style="width: 275px; font-family: arial; font-size: 14px; color: #424242; height: 40px; background: none repeat scroll 0% 0% rgb(255, 255, 255); border: 1px solid rgb(204, 204, 204); box-shadow:none; <?php if (of_get_option('border_button_round') == 0 ) { ?>border-radius: 0px;  <?php } else  { ?> border-radius: 3px;<?php }  ?> padding-left: 10px; margin-left: 0px; <?php if (of_get_option('name_field') == '0') {echo 'display:none';} else {'';} ?>" data-type="free" name="<?php echo $idname;?>"   placeholder="<?php echo of_get_option('name_field_text', '') ; ?>" type="text"></div>
<div style="padding-bottom: 5px;" id="_member_email"  class="subpro_clear sendsayFieldItem"><input size="27" class="input1" style="width: 275px;  font-family: arial; font-size: 14px; color: #424242; height: 40px; background: none repeat scroll 0% 0% rgb(255, 255, 255); border: 1px solid rgb(204, 204, 204); box-shadow:none; <?php if (of_get_option('border_button_round') == 0 ) { ?>border-radius: 0px;  <?php } else  { ?> border-radius: 3px;<?php }  ?> padding-left: 10px; margin-left: 0px;" data-type="email" name="_member_email" placeholder="<?php echo of_get_option('email_field_text', '') ; ?>" type="text"></div>
<div id="sendsayFormSubmitBox"><input name="bt_save" value="<?php echo of_get_option('button_text', ''); ?>" class="form-button"  <?php if (of_get_option('custom_button') == '0') { ?> style="background-color:transparent; text-shadow: 1px 1px 0px #000;width:280px; height:45px;border:none;"<?php } else {}?> onmouseover="this.className='form-button btnhov'" onmouseout="this.className='form-button'" type="submit" ></div>

<?php if (of_get_option('obrabotka_dannyh_text', '') != '') { ?>
<div class="garantiya"><a class="fancybox" href="#inline" title="Согласие на обработку персональных данных"><?php echo of_get_option('form_garant', '') ; ?></a></div>
<?php echo konf_personal(); ?>
<?php } else { ?> <div class="garantiya"><?php echo of_get_option('form_garant', '') ; ?></div> <?php } ?>



</form></div></div>
<?php }

if ($chooseform == 'get')  { ?> 
<div id="form-background" class="roundedcorners"><div class="form-heading"><?php echo of_get_option('form_text', 'no entry'); ?> </div>
<div><?php if (of_get_option('form_uploader') !== ""){?><img src="<?php echo of_get_option('form_uploader', 'no entry' ); ?>" style="text-align: center; width:275px; padding-bottom:15px;" width="275" alt=""><?php ;}?></div>
<div style="width:auto;text-align: center; padding-top: 0px; padding-left:0px;">
<form accept-charset="utf-8" target="_blank" action="<?php if ($old_form == 1) { ?> https://app.getresponse.com/add_subscriber.html <?php } if ($old_form == 0)  { ?> https://app.getresponse.com/add_contact_webform.html <?php } ?>" method="post">
<div style="padding-bottom: 5px;"><input size="27" class="input1" style="width: 275px; font-family: arial; font-size: 14px; color: #424242; height: 40px; background: none repeat scroll 0% 0% rgb(255, 255, 255); border: 1px solid rgb(204, 204, 204); box-shadow:none; <?php if (of_get_option('border_button_round') == 0 ) { ?>border-radius: 0px;  <?php } else  { ?> border-radius: 3px;<?php }  ?> padding-left: 10px; margin-left: 0px; <?php if (of_get_option('name_field') == '0') {echo 'display:none';} else {'';} ?>" name="name"  placeholder="<?php echo of_get_option('name_field_text', '') ; ?>" type="text"></div>
<div style="padding-bottom: 5px;"><input size="27" class="input1" style="width: 275px;  font-family: arial; font-size: 14px; color: #424242; height: 40px; background: none repeat scroll 0% 0% rgb(255, 255, 255); border: 1px solid rgb(204, 204, 204); box-shadow:none; <?php if (of_get_option('border_button_round') == 0 ) { ?>border-radius: 0px;  <?php } else  { ?> border-radius: 3px;<?php }  ?> padding-left: 10px; margin-left: 0px;" name="email"  placeholder="<?php echo of_get_option('email_field_text', '') ; ?>" type="text">
</div><div>
<input name="submit" value="<?php echo of_get_option('button_text', ''); ?>" class="form-button" <?php if (of_get_option('custom_button') == '0') { ?> style="background-color:transparent; text-shadow: 1px 1px 0px #000;width:234px; height:45px;border:none;"<?php } else {} ?>onmouseover="this.className='form-button btnhov'" onmouseout="this.className='form-button'" type="submit" >

<?php if ($old_form == 1) { ?> <input type="hidden" name="campaign_token" value="<?php echo $formid;?>" /> <input type="hidden" name="start_day" value="0" /><input type="hidden" name="thankyou_url" value="<?php  echo $thankyou_url;?>"/> <?php } if ($old_form == 0)  { ?> <input type="hidden" name="webform_id" value="<?php echo $formid;?>" /> <?php } ?>
</div>
<?php if (of_get_option('obrabotka_dannyh_text', '') != '') { ?>
<div class="garantiya"><a class="fancybox" href="#inline" title="Согласие на обработку персональных данных"><?php echo of_get_option('form_garant', '') ; ?></a></div>
<?php echo konf_personal(); ?>
<?php } else { ?> <div class="garantiya"><?php echo of_get_option('form_garant', '') ; ?></div> <?php } ?>
</form></div></div>	
<?php 
}



if ($chooseform == 'get360')  { ?>   


<div id="form-background" class="roundedcorners">

<div class="form-heading"><?php echo of_get_option('form_text', 'no entry'); ?> </div>
<div><?php if (of_get_option('form_uploader') !== ""){?><img src="<?php echo of_get_option('form_uploader', 'no entry' ); ?>" style="text-align: center; width:275px; padding-bottom:15px;" width="275" alt=""><?php ;}?></div>
<div style="width:auto;text-align: center; padding-top: 0px; padding-left:0px;">
<form accept-charset="utf-8" target="_blank" action="//www.email.<?php echo $get360url;?>/add_subscriber.html" method="post">


<div style="padding-bottom: 5px;"><input size="27" class="input1" style="width: 275px; font-family: arial; font-size: 14px; color: #424242; height: 40px; background: none repeat scroll 0% 0% rgb(255, 255, 255); border: 1px solid rgb(204, 204, 204); box-shadow:none; <?php if (of_get_option('border_button_round') == 0 ) { ?>border-radius: 0px;  <?php } else  { ?> border-radius: 3px;<?php }  ?> padding-left: 10px; margin-left: 0px; <?php if (of_get_option('name_field') == '0') {echo 'display:none';} else {'';} ?>" name="name"  placeholder="<?php echo of_get_option('name_field_text', '') ; ?>" type="text"></div>
<div style="padding-bottom: 5px;"><input size="27" class="input1" style="width: 275px;  font-family: arial; font-size: 14px; color: #424242; height: 40px; background: none repeat scroll 0% 0% rgb(255, 255, 255); border: 1px solid rgb(204, 204, 204); box-shadow:none; <?php if (of_get_option('border_button_round') == 0 ) { ?>border-radius: 0px;  <?php } else  { ?> border-radius: 3px;<?php }  ?> padding-left: 10px; margin-left: 0px;" name="email"  placeholder="<?php echo of_get_option('email_field_text', '') ; ?>" type="text">
</div>





<input type="hidden" name="campaign_token" value="<?php echo $formid360;?>" /> <input type="hidden" name="start_day" value="0" /><input type="hidden" name="thankyou_url" value="<?php  echo $thankyou_url360;?>"/> 

<div>
<input name="submit" value="<?php echo of_get_option('button_text', ''); ?>" class="form-button" <?php if (of_get_option('custom_button') == '0') { ?> style="background-color:transparent; text-shadow: 1px 1px 0px #000;width:234px; height:45px;border:none;"<?php } else {}?>  onmouseover="this.className='form-button btnhov'" onmouseout="this.className='form-button'" type="submit" >


</div>
<?php if (of_get_option('obrabotka_dannyh_text', '') != '') { ?>
<div class="garantiya"><a class="fancybox" href="#inline" title="Согласие на обработку персональных данных"><?php echo of_get_option('form_garant', '') ; ?></a></div>
<?php echo konf_personal(); ?>
<?php } else { ?> <div class="garantiya"><?php echo of_get_option('form_garant', '') ; ?></div> <?php } ?>


</form>

</div>

</div>

	
<?php 
}





if ($chooseform == 'just')  { ?> 
<div id="form-background" class="roundedcorners">
<div class="form-heading"><?php echo of_get_option('form_text', 'no entry'); ?> </div><div><?php if (of_get_option('form_uploader') !== ""){?>
<img src="<?php echo of_get_option('form_uploader', 'no entry' ); ?>" style="text-align: center; width:275px; padding-bottom:15px;" width="275" alt=""><?php ;}?></div>
<div style="width:auto;text-align: center; padding-top: 0px; padding-left:0px;">
<form method="POST" action="//<?php echo $loginjustclick;?>.justclick.ru/subscribe/process">
	    
	    <input type="hidden" name="rid[0]" value="<?php echo $groupjustclick;?>">
	    <input type="hidden" name="tag" value="<?php echo $markerjustclik;?>">
	    <input type="hidden" name="orderData[tag]" value="">
	    
	    
	   <div style="padding-bottom: 5px;"><input size="27" class="input1" style="width: 275px;  font-family: arial; font-size: 14px; color: #424242; height: 40px; background: none repeat scroll 0% 0% rgb(255, 255, 255); border: 1px solid rgb(204, 204, 204); box-shadow:none; <?php if (of_get_option('border_button_round') == 0 ) { ?>border-radius: 0px;  <?php } else  { ?> border-radius: 3px;<?php }  ?> padding-left: 10px; margin-left: 0px; <?php if (of_get_option('name_field') == '0') {echo 'display:none';} else {'';} ?>" name="lead_name"  placeholder="<?php echo of_get_option('name_field_text', '') ; ?>" type="text"></div>
	                        
	   <div style="padding-bottom: 5px;"><input size="27" class="input1" style="width: 275px; font-family: arial; font-size: 14px; color: #424242; height: 40px; background: none repeat scroll 0% 0% rgb(255, 255, 255); border: 1px solid rgb(204, 204, 204); box-shadow:none; <?php if (of_get_option('border_button_round') == 0 ) { ?>border-radius: 0px;  <?php } else  { ?> border-radius: 3px;<?php }  ?> padding-left: 10px; margin-left: 0px;" name="lead_email"  placeholder="<?php echo of_get_option('email_field_text', '') ; ?>" type="text"></div>
	
 <button type="submit" class="sp-button form-button" <?php if (of_get_option('custom_button') == '0') { ?> style="background-color:transparent; text-shadow: 1px 1px 0px #000;width:234px; height:45px;border:none;"<?php } else {} ?>  onmouseover="this.className='form-button btnhov'" onmouseout="this.className='form-button'" > <?php echo of_get_option('button_text', ''); ?> </button>
 
 <?php if (of_get_option('obrabotka_dannyh_text', '') != '') { ?>
<div class="garantiya"><a class="fancybox" href="#inline" title="Согласие на обработку персональных данных"><?php echo of_get_option('form_garant', '') ; ?></a></div>
<?php echo konf_personal(); ?>
<?php } else { ?> <div class="garantiya"><?php echo of_get_option('form_garant', '') ; ?></div> <?php } ?>
	
	<input name="doneurl2" type="hidden" value="<?php echo $justclickurl2;?>" /></form>
<script type="text/javascript" src="//<?php echo $loginjustclick;?>.justclick.ru/constructor/editor/scripts/common-forms.js"></script></div></div>	
<?php }




if ($chooseform == 'mailchimp')  { ?> 
<div id="form-background" class="roundedcorners">
<div class="form-heading"><?php echo of_get_option('form_text', 'no entry'); ?> </div><div><?php if (of_get_option('form_uploader') !== ""){?>
<img src="<?php echo of_get_option('form_uploader', 'no entry' ); ?>" style="text-align: center; width:275px; padding-bottom:15px;" width="275" alt=""><?php ;}?></div>
<div style="width:auto;text-align: center; padding-top: 0px; padding-left:0px;">
<form action="//<?php echo $loginmailchimp;?>.list-manage.com/subscribe/post?u=<?php echo $idprofilemailchimp;?>&amp;id=<?php echo $listidmailchimp;?>" method="post"  name="mc-embedded-subscribe-form" target="_blank" style="width:278px; margin: 0 auto;" novalidate>
<div style="padding-bottom: 5px;"><input size="27" class="input1" style="width: 275px;  font-family: arial; font-size: 14px; color: #424242; height: 40px; background: none repeat scroll 0% 0% rgb(255, 255, 255); border: 1px solid rgb(204, 204, 204); box-shadow:none; <?php if (of_get_option('border_button_round') == 0 ) { ?>border-radius: 0px;  <?php } else  { ?> border-radius: 3px;<?php }  ?> padding-left: 10px; margin-left: 0px; <?php if (of_get_option('name_field') == '0') {echo 'display:none';} else {'';} ?>" name="FNAME"  placeholder="<?php echo of_get_option('name_field_text', '') ; ?>" type="text">
</div>
<div style="padding-bottom: 5px;"><input size="27" class="input1" style="width: 275px; font-family: arial; font-size: 14px; color: #424242; height: 40px; background: none repeat scroll 0% 0% rgb(255, 255, 255); border: 1px solid rgb(204, 204, 204); box-shadow:none; <?php if (of_get_option('border_button_round') == 0 ) { ?>border-radius: 0px;  <?php } else  { ?> border-radius: 3px;<?php }  ?> padding-left: 10px; margin-left: 0px;" value="" name="EMAIL"  placeholder="<?php echo of_get_option('email_field_text', '') ; ?>" type="email"></div>
<div id="mce-responses" class="clear">
		<div class="response" id="mce-error-response" style="display:none"></div>
		<div class="response" id="mce-success-response" style="display:none"></div>
	</div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
	
    <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_<?php echo $idprofilemailchimp;?>_<?php echo $listidmailchimp;?>" tabindex="-1" value=""></div>
	
<div><input name="subscribe" value="<?php echo of_get_option('button_text', ''); ?>" class="form-button" <?php if (of_get_option('custom_button') == '0') { ?> style="background-color:transparent; text-shadow: 1px 1px 0px #000;width:234px; height:45px;border:none;"<?php } else {}?>  onmouseover="this.className='form-button btnhov'" onmouseout="this.className='form-button'" type="submit" ></div>
<?php if (of_get_option('obrabotka_dannyh_text', '') != '') { ?>
<div class="garantiya"><a class="fancybox" href="#inline" title="Согласие на обработку персональных данных"><?php echo of_get_option('form_garant', '') ; ?></a></div>
<?php echo konf_personal(); ?>
<?php } else { ?> <div class="garantiya"><?php echo of_get_option('form_garant', '') ; ?></div> <?php } ?>	
</form>
</div></div>	
<?php }




if ($chooseform == 'unisender')  { ?> 
<div id="form-background" class="roundedcorners">
<div class="form-heading"><?php echo of_get_option('form_text', 'no entry'); ?> </div><div><?php if (of_get_option('form_uploader') !== ""){?>
<img src="<?php echo of_get_option('form_uploader', 'no entry' ); ?>" style="text-align: center; width:275px; padding-bottom:15px;" width="275" alt=""><?php ;}?></div>
<div style="width:auto;text-align: center; padding-top: 0px; padding-left:0px;">
<form method="POST" action="https://cp.unisender.com/ru/subscribe?hash=<?php echo $hashunisender;?>" name="subscribtion_form" target="_blank" style="width:278px; margin: 0 auto;">
<div style="padding-bottom: 5px;"><input size="27" class="input1" style="width: 275px;  font-family: arial; font-size: 14px; color: #424242; height: 40px; background: none repeat scroll 0% 0% rgb(255, 255, 255); border: 1px solid rgb(204, 204, 204); box-shadow:none; <?php if (of_get_option('border_button_round') == 0 ) { ?>border-radius: 0px;  <?php } else  { ?> border-radius: 3px;<?php }  ?> padding-left: 10px; margin-left: 0px; <?php if (of_get_option('name_field') == '0') {echo 'display:none';} else {'';} ?>" name="name"  placeholder="<?php echo of_get_option('name_field_text', '') ; ?>" type="text">
</div>
<div style="padding-bottom: 5px;"><input size="27" class="input1" style="width: 275px; font-family: arial; font-size: 14px; color: #424242; height: 40px; background: none repeat scroll 0% 0% rgb(255, 255, 255); border: 1px solid rgb(204, 204, 204); box-shadow:none; <?php if (of_get_option('border_button_round') == 0 ) { ?>border-radius: 0px;  <?php } else  { ?> border-radius: 3px;<?php }  ?> padding-left: 10px; margin-left: 0px;" value="" name="email"  placeholder="<?php echo of_get_option('email_field_text', '') ; ?>" type="email"></div>

	
<div><input value="<?php echo of_get_option('button_text', ''); ?>" class="form-button" <?php if (of_get_option('custom_button') == '0') { ?> style="background-color:transparent; text-shadow: 1px 1px 0px #000;width:234px; height:45px;border:none;"<?php } else {}?>  onmouseover="this.className='form-button btnhov'" onmouseout="this.className='form-button'" type="submit" ></div>
<?php if (of_get_option('obrabotka_dannyh_text', '') != '') { ?>
<div class="garantiya"><a class="fancybox" href="#inline" title="Согласие на обработку персональных данных"><?php echo of_get_option('form_garant', '') ; ?></a></div>
<?php echo konf_personal(); ?>
<?php } else { ?> <div class="garantiya"><?php echo of_get_option('form_garant', '') ; ?></div> <?php } ?>
	 <input type="hidden" name="charset" value="UTF-8">
    <input type="hidden" name="default_list_id" value="<?php echo $loginunisender;?>">
    <input type="hidden" name="overwrite" value="2">
    <input type="hidden" name="is_v5" value="1">
</form>
</div></div><?php }





if ($chooseform == 'sendpulse')  { ?> 
<div id="form-background" class="roundedcorners">
<div class="form-heading"><?php echo of_get_option('form_text', 'no entry'); ?> </div><div><?php if (of_get_option('form_uploader') !== ""){?>
<img src="<?php echo of_get_option('form_uploader', 'no entry' ); ?>" style="text-align: center; width:275px; padding-bottom:15px;" width="275" alt=""><?php ;}?></div>
<div style="width:auto;text-align: center; padding-top: 0px; padding-left:0px;">



<div id="sp-form-<?php echo $sendpulseformid;?>" sp-id="<?php echo $sendpulseformid;?>" sp-hash="<?php echo $hashsendpulse;?>" sp-lang="ru" class="sp-form sp-form-regular sp-form-embed" sp-show-options="" style="width:278px; margin: 0 auto; padding:0px !important"> 

<div class="sp-message"> <div></div> </div> 

<form novalidate="" class="sp-element-container ui-sortable ui-droppable ">
<div style="padding-bottom: 5px;"><input type="text" sp-type="input" name="sform[<?php echo $idnamefield;?>]"   size="27" class="sp-form-control input1" style="width: 275px;  font-family: arial; font-size: 14px; color: #424242; height: 40px !important; background: none repeat scroll 0% 0% rgb(255, 255, 255); border: 1px solid rgb(204, 204, 204); box-shadow:none; <?php if (of_get_option('border_button_round') == 0 ) { ?>border-radius: 0px;  <?php } else  { ?> border-radius: 3px;<?php }  ?> padding-left: 10px; margin-left: 0px; <?php if (of_get_option('name_field') == '0') {echo 'display:none';} else {'';} ?>" value=""  placeholder="<?php echo of_get_option('name_field_text', '') ; ?>"> </div>


<div style="padding-bottom: 5px;"> <input type="email" sp-type="email" name="sform[email]"  required="required" size="27" class="sp-form-control input1" style="width: 275px; font-family: arial; font-size: 14px; color: #424242; height: 40px !important; background: none repeat scroll 0% 0% rgb(255, 255, 255); border: 1px solid rgb(204, 204, 204); box-shadow:none; <?php if (of_get_option('border_button_round') == 0 ) { ?>border-radius: 0px;  <?php } else  { ?> border-radius: 3px;<?php }  ?> padding-left: 10px; margin-left: 0px;" value=""  placeholder="<?php echo of_get_option('email_field_text', '') ; ?>"> </div>
 
  <button class="sp-button form-button" <?php if (of_get_option('custom_button') == '0') { ?> style="background-color:transparent; text-shadow: 1px 1px 0px #000;width:234px; height:45px  !important;border:none;"<?php } else {}?>  onmouseover="this.className='form-button btnhov'" onmouseout="this.className='form-button'" > <?php echo of_get_option('button_text', ''); ?> </button></form></div>  

<?php if (of_get_option('obrabotka_dannyh_text', '') != '') { ?>
<div class="garantiya"><a class="fancybox" href="#inline" title="Согласие на обработку персональных данных"><?php echo of_get_option('form_garant', '') ; ?></a></div>
<?php echo konf_personal(); ?>
<?php } else { ?> <div class="garantiya"><?php echo of_get_option('form_garant', '') ; ?></div> <?php } ?>

<script type="text/javascript" src="//static-login.sendpulse.com/apps/fc3/build/default-handler.js?<?php echo $scriptid;?>"></script>

</div></div><?php }




if ($chooseform == 'autoweboffice')  { ?> 
<script type="text/javascript" src="https://autoweboffice.ru/js/jquery.mask.js"></script>
<script type="text/javascript">$(function() {$("body").on("submit", ".form_newsletter", function() { var message = "Укажите значения всех обязательных для заполнения полей!"; });});</script> 
<div id="form-background" class="roundedcorners">
<div class="form-heading"><?php echo of_get_option('form_text', 'no entry'); ?> </div><div><?php if (of_get_option('form_uploader') !== ""){?>
<img src="<?php echo of_get_option('form_uploader', 'no entry' ); ?>" style="text-align: center; width:275px; padding-bottom:15px;" width="275" alt=""><?php ;}?></div>
<div style="width:auto;text-align: center; padding-top: 0px; padding-left:0px;">
<form action="https://<?php echo $loginautoweboffice;?>.autoweboffice.ru/?r=personal/newsletter/sub/add&amp;id=<?php echo $idautoweboffice;?>&amp;lg=ru" method="post" enctype="application/x-www-form-urlencoded" accept-charset="UTF-8" target="_blank" style="width:278px; margin: 0 auto;">




<div style="padding-bottom: 5px;"><input size="27" class="input1" style="width: 275px;  font-family: arial; font-size: 14px; color: #424242; height: 40px; background: none repeat scroll 0% 0% rgb(255, 255, 255); border: 1px solid rgb(204, 204, 204); box-shadow:none; <?php if (of_get_option('border_button_round') == 0 ) { ?>border-radius: 0px;  <?php } else  { ?> border-radius: 3px;<?php }  ?> padding-left: 10px; margin-left: 0px; <?php if (of_get_option('name_field') == '0') {echo 'display:none';} else {'';} ?>" name="Contact[name]"  placeholder="<?php echo of_get_option('name_field_text', '') ; ?>" type="text">
</div>



<div style="padding-bottom: 5px;"><input size="27" class="input1" style="width: 275px; font-family: arial; font-size: 14px; color: #424242; height: 40px; background: none repeat scroll 0% 0% rgb(255, 255, 255); border: 1px solid rgb(204, 204, 204); box-shadow:none; <?php if (of_get_option('border_button_round') == 0 ) { ?>border-radius: 0px;  <?php } else  { ?> border-radius: 3px;<?php }  ?> padding-left: 10px; margin-left: 0px;" value="" name="Contact[email]"  placeholder="<?php echo of_get_option('email_field_text', '') ; ?>" type="email"></div>

	
<div><input value="<?php echo of_get_option('button_text', ''); ?>" class="form-button" <?php if (of_get_option('custom_button') == '0') { ?> style="background-color:transparent; text-shadow: 1px 1px 0px #000;width:234px; height:45px;border:none;"<?php } else {}?>  onmouseover="this.className='form-button btnhov'" onmouseout="this.className='form-button'" type="submit" ></div>
<?php if (of_get_option('obrabotka_dannyh_text', '') != '') { ?>
<div class="garantiya"><a class="fancybox" href="#inline" title="Согласие на обработку персональных данных"><?php echo of_get_option('form_garant', '') ; ?></a></div>
<?php echo konf_personal(); ?>
<?php } else { ?> <div class="garantiya"><?php echo of_get_option('form_garant', '') ; ?></div> <?php } ?>


<input type="hidden" value="<?php echo $idautowebofficepassylki;?>" name="Contact[id_newsletter]">
<input type="hidden" value="0" name="Contact[id_advertising_channel_page]">

</form>
</div></div><?php }





if ($chooseform == 'mailerlite')  { ?> 
<div id="form-background" class="roundedcorners">
<div class="form-heading"><?php echo of_get_option('form_text', 'no entry'); ?> </div><div><?php if (of_get_option('form_uploader') !== ""){?>
<img src="<?php echo of_get_option('form_uploader', 'no entry' ); ?>" style="text-align: center; width:275px; padding-bottom:15px;" width="275" alt=""><?php ;}?></div>
<div style="width:auto;text-align: center; padding-top: 0px; padding-left:0px;">
<form action="//app.mailerlite.com/webforms/submit/<?php echo $idlandingmailerlite;?>" data-id="<?php echo $idformmailerlite;?>" data-code="<?php echo $idlandingmailerlite;?>" method="POST" target="_blank" style="width:278px; margin: 0 auto;">

<div style="padding-bottom: 5px;"><input size="27" class="input1" style="width: 275px;  font-family: arial; font-size: 14px; color: #424242; height: 40px; background: none repeat scroll 0% 0% rgb(255, 255, 255); border: 1px solid rgb(204, 204, 204); box-shadow:none; <?php if (of_get_option('border_button_round') == 0 ) { ?>border-radius: 0px;  <?php } else  { ?> border-radius: 3px;<?php }  ?> padding-left: 10px; margin-left: 0px; <?php if (of_get_option('name_field') == '0') {echo 'display:none';} else {'';} ?>" name="fields[name]"  placeholder="<?php echo of_get_option('name_field_text', '') ; ?>" type="text">
</div>
<div style="padding-bottom: 5px;"><input size="27" class="input1" style="width: 275px; font-family: arial; font-size: 14px; color: #424242; height: 40px; background: none repeat scroll 0% 0% rgb(255, 255, 255); border: 1px solid rgb(204, 204, 204); box-shadow:none; <?php if (of_get_option('border_button_round') == 0 ) { ?>border-radius: 0px;  <?php } else  { ?> border-radius: 3px;<?php }  ?> padding-left: 10px; margin-left: 0px;" value="" name="fields[email]"  placeholder="<?php echo of_get_option('email_field_text', '') ; ?>" type="email"></div>

	
<div>
<input type="hidden" name="ml-submit" value="1" />
 <button type="submit" class="form-button" <?php if (of_get_option('custom_button') == '0') { ?> style="background-color:transparent; text-shadow: 1px 1px 0px #000;width:234px; height:45px;border:none;"<?php } else {}?>  onmouseover="this.className='form-button btnhov'" onmouseout="this.className='form-button'"  >
                    <?php echo of_get_option('button_text', ''); ?>
                </button>

</div>
<?php if (of_get_option('obrabotka_dannyh_text', '') != '') { ?>
<div class="garantiya"><a class="fancybox" href="#inline" title="Согласие на обработку персональных данных"><?php echo of_get_option('form_garant', '') ; ?></a></div>
<?php echo konf_personal(); ?>
<?php } else { ?> <div class="garantiya"><?php echo of_get_option('form_garant', '') ; ?></div> <?php } ?>	

 
</form>
<script>
            function ml_webform_success() {
                try {
                    window.top.location.href = '<?php echo $thankyoumailerlite;?>';
                } catch (e) {
                    window.location.href = '<?php echo $thankyoumailerlite;?>';
                }
            };
        </script>   


<script type="text/javascript" src="//static.mailerlite.com/js/w/webforms.min.js?<?php echo $idstatistic;?>"></script>
</div></div><?php }


     


if ($chooseform == 'onebutton')  { ?> 
<div id="form-background" class="roundedcorners">
<div class="form-heading"><?php echo of_get_option('form_text', 'no entry'); ?> </div><div><?php if (of_get_option('form_uploader') !== ""){?>
<img src="<?php echo of_get_option('form_uploader', 'no entry' ); ?>" style="text-align: center; width:275px; padding-bottom:15px;" width="275" alt=""><?php ;}?></div>
<div style="width:auto;text-align: center; padding-top: 0px; padding-left:0px;width: 270px; margin: 0 auto; margin-bottom:20px;">

<a href="<?php echo $onebuttonlink;?>" target="_blank" style="text-decoration:none;"><div class="form-button" style="display:table-cell; vertical-align:middle;" onmouseover="this.className='form-button btnhov'" onmouseout="this.className='form-button'"><?php echo of_get_option('button_text', ''); ?></div></a>

</div></div>	
<?php }
 }
 }

    public function update($new_instance, $old_instance) {
		$instance = $old_instance;
$instance['formname'] = strip_tags($new_instance['formname']);
$instance['sendsayformkod'] = strip_tags($new_instance['sendsayformkod']);
$instance['sendsayformid'] = strip_tags($new_instance['sendsayformid']);
$instance['idname'] = strip_tags($new_instance['idname']);

$instance['loginjustclick'] = strip_tags($new_instance['loginjustclick']);
$instance['markerjustclik'] = strip_tags($new_instance['markerjustclik']);
$instance['groupjustclick'] = strip_tags($new_instance['groupjustclick']);
$instance['chooseform'] = esc_attr($new_instance['chooseform']);
$instance['formid'] = strip_tags($new_instance['formid']);
$instance['old_form'] = strip_tags($new_instance['old_form']);
$instance['thankyou_url'] = strip_tags($new_instance['thankyou_url']);


$instance['loginmailchimp'] = strip_tags($new_instance['loginmailchimp']);
$instance['idprofilemailchimp'] = strip_tags($new_instance['idprofilemailchimp']);
$instance['listidmailchimp'] = strip_tags($new_instance['listidmailchimp']);

$instance['hashunisender'] = strip_tags($new_instance['hashunisender']);
$instance['loginunisender'] = strip_tags($new_instance['loginunisender']);
$instance['idautoweboffice'] = strip_tags($new_instance['idautoweboffice']);
$instance['idautowebofficepassylki'] = strip_tags($new_instance['idautowebofficepassylki']);
$instance['loginautoweboffice'] = strip_tags($new_instance['loginautoweboffice']);


$instance['onebuttonlink'] = strip_tags($new_instance['onebuttonlink']);

$instance['page'] = esc_attr( $new_instance['page'] );
$instance['justclickurl2'] = strip_tags($new_instance['justclickurl2']);

$instance['idformmailerlite'] = strip_tags($new_instance['idformmailerlite']);
$instance['idlandingmailerlite'] = strip_tags($new_instance['idlandingmailerlite']);
$instance['idstatistic'] = strip_tags($new_instance['idstatistic']);
$instance['thankyoumailerlite'] = strip_tags($new_instance['thankyoumailerlite']);

$instance['get360url'] = strip_tags($new_instance['get360url']);
$instance['formid360'] = strip_tags($new_instance['formid360']);
$instance['thankyou_url360'] = strip_tags($new_instance['thankyou_url360']);


$instance['hashsendpulse'] = strip_tags($new_instance['hashsendpulse']);
$instance['sendpulseformid'] = strip_tags($new_instance['sendpulseformid']);
$instance['idnamefield'] = strip_tags($new_instance['idnamefield']);
$instance['scriptid'] = strip_tags($new_instance['scriptid']);



        return $instance;
    }

    public function form($instance) {
    
    $defaults = array(
						 'page' => 'all',
						  'chooseform' => 'smart'
						 );
						  $instance = wp_parse_args( (array) $instance, $defaults );
 
 $formname	= isset( $instance['formname'] ) ? esc_attr($instance['formname']) :'';
 $sendsayformkod	= isset( $instance['sendsayformkod'] ) ? esc_attr($instance['sendsayformkod']) :'';
 $sendsayformid	= isset( $instance['sendsayformid'] ) ? esc_attr($instance['sendsayformid']) :'';
 $idname	= isset( $instance['idname'] ) ? esc_attr($instance['idname']) :'';
 
 $loginjustclick = isset( $instance['loginjustclick'] ) ? esc_attr($instance['loginjustclick']) :'';
 $markerjustclik = isset( $instance['markerjustclik'] ) ? esc_attr($instance['markerjustclik']) :'';
 $groupjustclick = isset( $instance['groupjustclick'] ) ? esc_attr($instance['groupjustclick']) :'';
 $formid = isset( $instance['formid'] ) ? esc_attr($instance['formid']) :'';
 $old_form = isset( $instance['old_form'] ) ? esc_attr($instance['old_form']) :'';
 $thankyou_url = isset( $instance['thankyou_url'] ) ? esc_attr($instance['thankyou_url']) :'';
 
  $loginmailchimp = isset( $instance['loginmailchimp'] ) ? esc_attr($instance['loginmailchimp']) :'';
 $idprofilemailchimp = isset( $instance['idprofilemailchimp'] ) ? esc_attr($instance['idprofilemailchimp']) :'';
 $listidmailchimp = isset( $instance['listidmailchimp'] ) ? esc_attr($instance['listidmailchimp']) :'';
 
  $hashunisender = isset( $instance['hashunisender'] ) ? esc_attr($instance['hashunisender']) :'';
  $loginunisender = isset( $instance['loginunisender'] ) ? esc_attr($instance['loginunisender']) :'';
  $idautoweboffice = isset( $instance['idautoweboffice'] ) ? esc_attr($instance['idautoweboffice']) :'';
  $idautowebofficepassylki = isset( $instance['idautowebofficepassylki'] ) ? esc_attr($instance['idautowebofficepassylki']) :'';
  $loginautoweboffice = isset( $instance['loginautoweboffice'] ) ? esc_attr($instance['loginautoweboffice']) :'';
  
   $idformmailerlite = isset( $instance['idformmailerlite'] ) ? esc_attr($instance['idformmailerlite']) :'';
   $idlandingmailerlite = isset( $instance['idlandingmailerlite'] ) ? esc_attr($instance['idlandingmailerlite']) :'';
     $idstatistic = isset( $instance['idstatistic'] ) ? esc_attr($instance['idstatistic']) :'';
     $thankyoumailerlite = isset( $instance['thankyoumailerlite'] ) ? esc_attr($instance['thankyoumailerlite']) :'';
     
     $get360url = isset( $instance['get360url'] ) ? esc_attr($instance['get360url']) :'';
     $formid360 = isset( $instance['formid360'] ) ? esc_attr($instance['formid360']) :'';
     $thankyou_url360 = isset( $instance['thankyou_url360'] ) ? esc_attr($instance['thankyou_url360']) :'';
     
 $onebuttonlink = isset( $instance['onebuttonlink'] ) ? esc_attr($instance['onebuttonlink']) :'';
$justclickurl2 = isset( $instance['justclickurl2'] ) ? esc_attr($instance['justclickurl2']) :'';

$hashsendpulse = isset( $instance['hashsendpulse'] ) ? esc_attr($instance['hashsendpulse']) :'';
$sendpulseformid = isset( $instance['sendpulseformid'] ) ? esc_attr($instance['sendpulseformid']) :'';
$idnamefield = isset( $instance['idnamefield'] ) ? esc_attr($instance['idnamefield']) :'';
$scriptid = isset( $instance['scriptid'] ) ? esc_attr($instance['scriptid']) :'';

  ?>
  
  
  
  <script type="text/javascript">
    jQuery(document).ready(function($){
        $(".responder_choose").change(function(){
            $( "select option:selected").each(function(){
                if($(this).attr("value")=="smart"){
                    $(".hideresponder").hide();
                    $(".smartwidget").show();
                }
                if($(this).attr("value")=="just"){
                    $(".hideresponder").hide();
                    $(".justwidget").show();
                }
                
                if($(this).attr("value")=="get"){
                    $(".hideresponder").hide();
                    $(".getwidget").show();
                   
                }
                
                if($(this).attr("value")=="get360"){
                    $(".hideresponder").hide();
                    $(".get360widget").show();
                   
                }
                
                if($(this).attr("value")=="mailchimp"){
                    $(".hideresponder").hide();
                    $(".mailchimpwidget").show();
                   
                }
                
                 if($(this).attr("value")=="unisender"){
                    $(".hideresponder").hide();
                    $(".unisenderwidget").show();
                   
                }
                
                
                if($(this).attr("value")=="sendpulse"){
                    $(".hideresponder").hide();
                    $(".sendpulsewidget").show();
                   
                }
                
                
                
                
                  if($(this).attr("value")=="autoweboffice"){
                    $(".hideresponder").hide();
                    $(".autowebofficewidget").show();
                   
                }
                
                 if($(this).attr("value")=="mailerlite"){
                    $(".hideresponder").hide();
                    $(".mailerlitewidget").show();
                   
                }
                
                
                
                
                if($(this).attr("value")=="onebutton"){
                    $(".hideresponder").hide();
                    $(".onebuttonwidget").show();
                   
                }
                
            });
        }).change();
    });
</script>
 



 
 
  <div>
	   	   
	   	   <p>
			<label for="<?php echo $this->get_field_id( 'chooseform' ); ?>"><?php _e( 'Выберите сервис:', 'inspiration' ); ?></label>
			<select name="<?php echo $this->get_field_name( 'chooseform' ); ?>" class="widefat responder_choose" id="<?php echo $this->get_field_id( 'chooseform' ); ?>">
				<option value="smart" <?php selected( $instance['chooseform'], 'smart' ); ?>><?php _e( 'Sendsay', 'inspiration' ); ?></option>
				<option value="just"<?php selected( $instance['chooseform'], 'just' ); ?>><?php _e( 'Justcklick', 'inspiration' ); ?></option>   
				<option value="get"<?php selected( $instance['chooseform'], 'get' ); ?>><?php _e( 'Getresponse', 'inspiration' ); ?></option>
				
				<option value="get360"<?php selected( $instance['chooseform'], 'get360' ); ?>><?php _e( 'Getresponse360', 'inspiration' ); ?></option>
				
				<option value="mailchimp"<?php selected( $instance['chooseform'], 'mailchimp' ); ?>><?php _e( 'MailChimp', 'inspiration' ); ?></option>
				
				<option value="unisender"<?php selected( $instance['chooseform'], 'unisender' ); ?>><?php _e( 'UniSender', 'inspiration' ); ?></option>
				<option value="sendpulse"<?php selected( $instance['chooseform'], 'sendpulse' ); ?>><?php _e( 'Sendpulse', 'inspiration' ); ?></option>
				
				
				<option value="autoweboffice"<?php selected( $instance['chooseform'], 'autoweboffice' ); ?>><?php _e( 'АвтоВебОфис', 'inspiration' ); ?></option>
				<option value="mailerlite"<?php selected( $instance['chooseform'], 'mailerlite' ); ?>><?php _e( 'Mailer Lite', 'inspiration' ); ?></option>
				
				
				
				
				
				<option value="onebutton"<?php selected( $instance['chooseform'], 'onebutton' ); ?>><?php _e( 'Одна кнопка', 'inspiration' ); ?></option>
				       
			</select>
		</p>
		
	   	   </div>
  
  

      <div class="smartwidget hideresponder"  style="display: none;">    
         
         		
         		
         		<p>
          <label for="<?php echo $this->get_field_id('formname'); ?>"><?php _e('<strong>Имя формы</strong> (найдите в коде формы тег form и в аттрибуте name скопируйте цифорвое значение. В примере ниже выделено красным: <span><</span>form id="sendsay_form" name="form_<span style="color:#ff0000">887</span>"', 'inspiration'); ?></label>
          <input class="widefat" id="<?php echo $this->get_field_id('formname'); ?>" name="<?php echo $this->get_field_name('formname'); ?>" type="text" value="<?php echo $formname; ?>" />
        </p>


<p>
          <label for="<?php echo $this->get_field_id('sendsayformkod'); ?>"><?php _e('<strong>Код формы</strong> В ссылке аттрибута <strong>action</strong> скопировать код. Выделен красным ниже: action=" https://sendsay.ru/form/<span style="color:#ff0000">x_1477846400414456</span>/3', 'inspiration'); ?></label>
          <input class="widefat" id="<?php echo $this->get_field_id('sendsayformkod'); ?>" name="<?php echo $this->get_field_name('sendsayformkod'); ?>" type="text" value="<?php echo $sendsayformkod; ?>" />
        </p>

<p>
          <label for="<?php echo $this->get_field_id('sendsayformid'); ?>"><?php _e('<strong>ID формы</strong>', 'inspiration'); ?></label>
          <input class="widefat" id="<?php echo $this->get_field_id('sendsayformid'); ?>" name="<?php echo $this->get_field_name('sendsayformid'); ?>" type="text" value="<?php echo $sendsayformid; ?>" />
        </p>
        
        
        <p>
          <label for="<?php echo $this->get_field_id('idname'); ?>"><?php _e('<strong>Поле Имя</strong> (Код в форме)', 'inspiration'); ?></label>
          <input class="widefat" id="<?php echo $this->get_field_id('idname'); ?>" name="<?php echo $this->get_field_name('idname'); ?>" type="text" value="<?php echo $idname; ?>" />
        </p>
        
      </div>
          <div class="getwidget hideresponder"  style="display: none;">  
        
        <p>
          <input id="<?php echo $this->get_field_id('old_form'); ?>" name="<?php echo $this->get_field_name('old_form'); ?>" type="checkbox" value="1" <?php checked( '1', $instance['old_form']); ?>/>
          <label for="<?php echo $this->get_field_id('old_form'); ?>"><?php _e('Поставьте галочку, если вы используете Новую форму?', 'inspiration'); ?></label> 
        </p>
         		<p>
          <label for="<?php echo $this->get_field_id('formid'); ?>"><?php _e('ID Формы (если форма старая), Токен кампании (если форма новая) ', 'inspiration'); ?></label>
          <input class="widefat" id="<?php echo $this->get_field_id('formid'); ?>" name="<?php echo $this->get_field_name('formid'); ?>" type="text" value="<?php echo $formid; ?>" />
        </p>
            
            <p>
          <label for="<?php echo $this->get_field_id('thankyou_url'); ?>"><?php _e('Ссылка на страницу Спасибо (по желанию) ', 'inspiration'); ?></label>
          <input class="widefat" id="<?php echo $this->get_field_id('thankyou_url'); ?>" name="<?php echo $this->get_field_name('thankyou_url'); ?>" type="text" value="<?php echo $thankyou_url; ?>" />
        </p>
          </div>
        
        
               <div class="get360widget hideresponder"  style="display: none;"> 
               
               
                
               
               <p>
          <label for="<?php echo $this->get_field_id('get360url'); ?>"><?php _e('Домен, который регистрировали в GetResponse360', 'inspiration'); ?></label>
          <input class="widefat" id="<?php echo $this->get_field_id('get360url'); ?>" name="<?php echo $this->get_field_name('get360url'); ?>" type="text" value="<?php echo $get360url; ?>" />
        </p>
        
        
        
         		<p>
          <label for="<?php echo $this->get_field_id('formid360'); ?>"><?php _e('Токен кампании', 'inspiration'); ?></label>
          <input class="widefat" id="<?php echo $this->get_field_id('formid360'); ?>" name="<?php echo $this->get_field_name('formid360'); ?>" type="text" value="<?php echo $formid360; ?>" />
        </p>
        
        
        
        
        
          
        <p>
          <label for="<?php echo $this->get_field_id('thankyou_url360'); ?>"><?php _e('Ссылка на страницу Спасибо (по-желанию)', 'inspiration'); ?></label>
          <input class="widefat" id="<?php echo $this->get_field_id('thankyou_url360'); ?>" name="<?php echo $this->get_field_name('thankyou_url360'); ?>" type="text" value="<?php echo $thankyou_url360; ?>" />
        </p>
          </div>
         		
    <div class="justwidget hideresponder"  style="display: none;">  
        
        <p>
          <label for="<?php echo $this->get_field_id('loginjustclick'); ?>"><?php _e('Логин JustClick', 'inspiration'); ?></label>
          <input class="widefat" id="<?php echo $this->get_field_id('loginjustclick'); ?>" name="<?php echo $this->get_field_name('loginjustclick'); ?>" type="text" value="<?php echo $loginjustclick; ?>" />
        </p>
        
        <p>
          <label for="<?php echo $this->get_field_id('markerjustclik'); ?>"><?php _e('Маркер JustClick', 'inspiration'); ?></label>
          <input class="widefat" id="<?php echo $this->get_field_id('markerjustclik'); ?>" name="<?php echo $this->get_field_name('markerjustclik'); ?>" type="text" value="<?php echo $markerjustclik; ?>" />
        </p>
        
        <p>
          <label for="<?php echo $this->get_field_id('groupjustclick'); ?>"><?php _e('Группа JustCLick', 'inspiration'); ?></label>
          <input class="widefat" id="<?php echo $this->get_field_id('groupjustclick'); ?>" name="<?php echo $this->get_field_name('groupjustclick'); ?>" type="text" value="<?php echo $groupjustclick; ?>" />
        </p>


  <p>
          <label for="<?php echo $this->get_field_id('justclickurl2'); ?>"><?php _e('URL ПОСЛЕ АКТИВАЦИИ:', 'inspiration'); ?></label>
          <input class="widefat" id="<?php echo $this->get_field_id('justclickurl2'); ?>" name="<?php echo $this->get_field_name('justclickurl2'); ?>" type="text" value="<?php echo $justclickurl2; ?>" />
        </p>
    </div>
    
    
        <div class="mailchimpwidget hideresponder"  style="display: none;">  
        
        <p>
          <label for="<?php echo $this->get_field_id('loginmailchimp'); ?>"><?php _e('Логин MailChimp', 'inspiration'); ?></label>
          <input class="widefat" id="<?php echo $this->get_field_id('loginmailchimp'); ?>" name="<?php echo $this->get_field_name('loginmailchimp'); ?>" type="text" value="<?php echo $loginmailchimp; ?>" />
        </p>
        
        <p>
          <label for="<?php echo $this->get_field_id('idprofilemailchimp'); ?>"><?php _e('Id профиля в MailChimp', 'inspiration'); ?></label>
          <input class="widefat" id="<?php echo $this->get_field_id('idprofilemailchimp'); ?>" name="<?php echo $this->get_field_name('idprofilemailchimp'); ?>" type="text" value="<?php echo $idprofilemailchimp; ?>" />
        </p>
        
        <p>
          <label for="<?php echo $this->get_field_id('listidmailchimp'); ?>"><?php _e('ID Списка', 'inspiration'); ?></label>
          <input class="widefat" id="<?php echo $this->get_field_id('listidmailchimp'); ?>" name="<?php echo $this->get_field_name('listidmailchimp'); ?>" type="text" value="<?php echo $listidmailchimp; ?>" />
        </p>

 
    </div>
    
    
 
     <div class="unisenderwidget hideresponder"  style="display: none;">  
        
      
        
        <p>
          <label for="<?php echo $this->get_field_id('hashunisender'); ?>"><?php _e('Hash формы', 'inspiration'); ?></label>
          <input class="widefat" id="<?php echo $this->get_field_id('hashunisender'); ?>" name="<?php echo $this->get_field_name('hashunisender'); ?>" type="text" value="<?php echo $hashunisender; ?>" />
        </p>
        
          <p>
          <label for="<?php echo $this->get_field_id('loginunisender'); ?>"><?php _e('ID списка', 'inspiration'); ?></label>
          <input class="widefat" id="<?php echo $this->get_field_id('loginmailchimp'); ?>" name="<?php echo $this->get_field_name('loginunisender'); ?>" type="text" value="<?php echo $loginunisender; ?>" />
        </p>
        
       

 
    </div>
    
    
    
      <div class="sendpulsewidget hideresponder"  style="display: none;">  
        <p style="font-size:16px"><a target="_blank" class="fancybox" href="https://vimeo.com/314717673" data-fancybox-type="iframe"> Видеоинструкция </a></p>
        
         <p>
          <label for="<?php echo $this->get_field_id('sendpulseformid'); ?>"><?php _e('ID формы', 'inspiration'); ?></label>
          <input class="widefat" id="<?php echo $this->get_field_id('sendpulseformid'); ?>" name="<?php echo $this->get_field_name('sendpulseformid'); ?>" type="text" value="<?php echo $sendpulseformid; ?>" />
        </p>
        
      
       <p>
          <label for="<?php echo $this->get_field_id('hashsendpulse'); ?>"><?php _e('Hash формы', 'inspiration'); ?></label>
          <input class="widefat" id="<?php echo $this->get_field_id('hashsendpulse'); ?>" name="<?php echo $this->get_field_name('hashsendpulse'); ?>" type="text" value="<?php echo $hashsendpulse; ?>" />
        </p>
        

        
         <p>
          <label for="<?php echo $this->get_field_id('idnamefield'); ?>"><?php _e('ID поля Имя (если вы его используете)', 'inspiration'); ?></label>
          <input class="widefat" id="<?php echo $this->get_field_id('idnamefield'); ?>" name="<?php echo $this->get_field_name('idnamefield'); ?>" type="text" value="<?php echo $idnamefield; ?>" />
        </p>
        
         <p>
          <label for="<?php echo $this->get_field_id('scriptid'); ?>"><?php _e('ID скрипта', 'inspiration'); ?></label>
          <input class="widefat" id="<?php echo $this->get_field_id('scriptid'); ?>" name="<?php echo $this->get_field_name('scriptid'); ?>" type="text" value="<?php echo $scriptid; ?>" />
        </p>
        
        
       

 
    </div>
    
   
    
    
    
    
    
     <div class="autowebofficewidget hideresponder"  style="display: none;">  
        
      
      
      
      <p>
          <label for="<?php echo $this->get_field_id('loginautoweboffice'); ?>"><?php _e('Логин магазина', 'inspiration'); ?></label>
          <input class="widefat" id="<?php echo $this->get_field_id('loginautoweboffice'); ?>" name="<?php echo $this->get_field_name('loginautoweboffice'); ?>" type="text" value="<?php echo $loginautoweboffice; ?>" />
        </p>
        
        <p>
          <label for="<?php echo $this->get_field_id('idautoweboffice'); ?>"><?php _e('ID магазина', 'inspiration'); ?></label>
          <input class="widefat" id="<?php echo $this->get_field_id('idautoweboffice'); ?>" name="<?php echo $this->get_field_name('idautoweboffice'); ?>" type="text" value="<?php echo $idautoweboffice; ?>" />
        </p>
        
        
         <p>
          <label for="<?php echo $this->get_field_id('idautowebofficepassylki'); ?>"><?php _e('ID рассылки', 'inspiration'); ?></label>
          <input class="widefat" id="<?php echo $this->get_field_id('idautowebofficepassylki'); ?>" name="<?php echo $this->get_field_name('idautowebofficepassylki'); ?>" type="text" value="<?php echo $idautowebofficepassylki; ?>" />
        </p>
        
        
        
        
        
       

 
    </div>
    
    
        
     <div class="mailerlitewidget hideresponder"  style="display: none;">  
        
      
        
        <p>
          <label for="<?php echo $this->get_field_id('idformmailerlite'); ?>"><?php _e('Номер формы', 'inspiration'); ?></label>
          <input class="widefat" id="<?php echo $this->get_field_id('idformmailerlite'); ?>" name="<?php echo $this->get_field_name('idformmailerlite'); ?>" type="text" value="<?php echo $idformmailerlite; ?>" />
        </p>
        
         <p>
          <label for="<?php echo $this->get_field_id('idlandingmailerlite'); ?>"><?php _e('Код страницы', 'inspiration'); ?></label>
          <input class="widefat" id="<?php echo $this->get_field_id('idlandingmailerlite'); ?>" name="<?php echo $this->get_field_name('idlandingmailerlite'); ?>" type="text" value="<?php echo $idlandingmailerlite; ?>" />
        </p>
        
         
        
         <p>
          <label for="<?php echo $this->get_field_id('idstatistic'); ?>"><?php _e('Hash Статистики', 'inspiration'); ?></label>
          <input class="widefat" id="<?php echo $this->get_field_id('idstatistic'); ?>" name="<?php echo $this->get_field_name('idstatistic'); ?>" type="text" value="<?php echo $idstatistic; ?>" />
        </p>
        
         <p>
          <label for="<?php echo $this->get_field_id('thankyoumailerlite'); ?>"><?php _e('Адрес страницы "Спасибо за подписку" (с http:// )', 'inspiration'); ?></label>
          <input class="widefat" id="<?php echo $this->get_field_id('thankyoumailerlite'); ?>" name="<?php echo $this->get_field_name('thankyoumailerlite'); ?>" type="text" value="<?php echo $thankyoumailerlite; ?>" />
        </p>
        
            
	

       

 
    </div>
    
    

  
   
    
      <div class="onebuttonwidget hideresponder"  style="display: none;">  
        
        
         		<p>
          <label for="<?php echo $this->get_field_id('onebuttonlink'); ?>"><?php _e('Ссылка', 'inspiration'); ?></label>
          <input class="widefat" id="<?php echo $this->get_field_id('onebuttonlink'); ?>" name="<?php echo $this->get_field_name('onebuttonlink'); ?>" type="text" value="<?php echo $onebuttonlink; ?>" />
        </p>
          </div>
        
        <p>
			<label for="<?php echo $this->get_field_id( 'page' ); ?>"><?php _e( 'На каких страницах показывать:', 'inspiration' ); ?></label>
			<select name="<?php echo $this->get_field_name( 'page' ); ?>" class="widefat" id="<?php echo $this->get_field_id( 'page' ); ?>">
				<option value="all"<?php selected( $instance['page'], 'all' ); ?>><?php _e( 'На всех', 'inspiration' ); ?></option>
				<option value="home"<?php selected( $instance['page'], 'home' ); ?>><?php _e( 'Только на главной', 'inspiration' ); ?></option>            
				<option value="single"<?php selected( $instance['page'], 'single' ); ?>><?php _e( 'Только в статьях', 'inspiration' ); ?></option>            
			</select>
		</p>
       
        


        <?php
    }
 
 
} 
add_action( 'widgets_init', function(){
     register_widget( 'subform_widget' );
});



// ================================ follow me ============================
class follow_widget extends WP_Widget {
   function __construct() {
    parent::__construct(
        'follow_widget', // Base ID
        __( '3 - AB - Следуй за мной', 'inspiration' ),
        array( 'description' => __( 'Кнопки социальных сетей', 'inspiration' ), )
    );
}

    function widget($args, $instance) {
        extract( $args );
        global $wpdb;
 
        $title = apply_filters('widget_title', $instance['title']);
        $twitter_id = $instance['twitter_id'];
        $facebook_page = $instance['facebook_page'];
	    $youtube = $instance['youtube'];
	    $vkontakte = $instance['vkontakte'];
	    $ok = $instance['ok'];
	    $instagram = $instance['instagram'];
        $flwidth = $instance['flwidth'];
        $form_buttons = $instance['form_buttons'];
$icon_color = $instance['icon_color'];
$icon_color_hover = $instance['icon_color_hover'];
$nativecolor = $instance['nativecolor'];
$linkedin = $instance['linkedin'];
$telegram = $instance['telegram'];
$wechat = $instance['wechat'];
$whatsapp = $instance['whatsapp'];
$email = $instance['email'];
$viber = $instance['viber'];
$bordercolor = $instance['bordercolor'];
$icon_color_text = $instance['icon_color_text'];
$icon_color_hover_text = $instance['icon_color_hover_text'];	

        ?>

<?php echo $before_widget; ?>
<?php if ( $title ) echo $before_title . $title . $after_title; ?>
<div class="textwidget"><div style="text-align:center; padding-top:5px;">

<style scoped>.socialiconstyle i {color: <?php echo $icon_color_text;?>;} a:hover .socialiconstyle i {color: <?php echo $icon_color_hover_text;?>;} .socialiconstyle{width:<?php echo $flwidth ;?>px; height:<?php echo $flwidth ;?>px; border-radius:<?php echo $form_buttons ;?>px; display: inline-block;margin:0px 3px 5px 0px;}

<?php if($nativecolor == 1) { 
if($bordercolor == 1) { ?>.socialiconstyle {border: 1px solid <?php echo $icon_color ;?>; background:transparent}  .socialiconstyle:hover { background:<?php echo $icon_color_hover; ?>;border: 1px solid <?php echo $icon_color_hover; ?>;  } <?php } else { ?>
.socialiconstyle {background:<?php echo $icon_color ;?>} .socialiconstyle:hover {background:<?php echo $icon_color_hover; ?>;border:1px solid<?php echo $icon_color_hover; ?> } <?php } } ?>

<?php if($nativecolor == 0) { ?>.socialiconstyle i, a:hover .socialiconstyle i{color:#fff}.socialiconstyle.fb{background:#4A6EA9; }.socialiconstyle.tw{background:#2CBDE2; }.socialiconstyle.vk{background:#597CA4; }.socialiconstyle.ok{background:#F48420; }.socialiconstyle.gp{background:#DD4B38; }.socialiconstyle.yt{background:#E14E42; }.socialiconstyle.inst{background:#517FA4; }.socialiconstyle.linkedin{background:#2C8DBA; }.socialiconstyle.telegram{background:#1C94D1; }.socialiconstyle.wechat{background:#00CE00; } .socialiconstyle.whatsapp{background:#2EC550; }.socialiconstyle.email{background:#0D73DA; }.socialiconstyle.viber{background:#85419E; }<?php } else {} ?></style>

<?php if ($facebook_page) {?> <a itemprop="url" rel="nofollow" href="<?php echo $facebook_page?>" target="_blank" class="linkicon"><div class="socialiconstyle fb"><i style="line-height:<?php echo $flwidth;?>px;" class="fa fa-facebook <?php   if ( $flwidth == "35") { ?> fa-lg <?php }  elseif ( $flwidth == "40") { ?> fa-2x <?php } elseif ( $flwidth == "50") { ?> fa-3x <?php } else { ?> fa-4x <?php } ?>"></i><span style="display:none"><?php _e( 'Следить на Facebook', 'inspiration' ); ?></span></div></a><?php }?> 

<?php if ($telegram) {?> <a itemprop="url" rel="nofollow" href="https://telegram.im/@<?php echo $telegram?>" target="_blank"><div class="socialiconstyle telegram"><i style="line-height:<?php echo $flwidth;?>px;" class="fa fa-telegram <?php   if ( $flwidth == "35") { ?> fa-lg <?php }  elseif ( $flwidth == "40") { ?> fa-2x <?php } elseif ( $flwidth == "50") { ?> fa-3x <?php } else { ?> fa-4x <?php } ?>"></i><span style="display:none"><?php _e( 'Присоединяйтесь в Телеграм', 'inspiration' ); ?></span></div></a><?php }?> 



<?php if ($twitter_id) { ?><a itemprop="url" rel="nofollow" href="<?php echo $twitter_id?>" target="_blank"><div class="socialiconstyle tw"><i style="line-height:<?php echo $flwidth;?>px; " class="fa fa-twitter <?php   if ( $flwidth == "35") { ?> fa-lg <?php }  elseif ( $flwidth == "40") { ?> fa-2x <?php } elseif ( $flwidth == "50") { ?> fa-3x <?php } else { ?> fa-4x <?php } ?>"></i><span style="display:none"><?php _e( 'Следить на Twitter', 'inspiration' ); ?></span></div></a><?php }?>


<?php if ($vkontakte) {?><a itemprop="url" rel="nofollow" href="<?php echo $vkontakte ?>" target="_blank"><div class="socialiconstyle vk"><i style="line-height:<?php echo $flwidth;?>px;" class="fa fa-vk <?php   if ( $flwidth == "35") { ?> fa-lg <?php }  elseif ( $flwidth == "40") { ?> fa-2x <?php } elseif ( $flwidth == "50") { ?> fa-3x <?php } else { ?> fa-4x <?php } ?>"></i><span style="display:none"><?php _e( 'Следить на Vkontakte', 'inspiration' ); ?></span></div></a><?php }?> 


<?php if ($ok) {?><a itemprop="url" rel="nofollow" href="<?php echo $ok ?>" target="_blank"><div class="socialiconstyle ok"><i style="line-height:<?php echo $flwidth;?>px;" class="fa fa-odnoklassniki <?php   if ( $flwidth == "35") { ?> fa-lg <?php }  elseif ( $flwidth == "40") { ?> fa-2x <?php } elseif ( $flwidth == "50") { ?> fa-3x <?php } else { ?> fa-4x <?php } ?>"></i><span style="display:none"><?php _e( 'Следить на Одноклассниках', 'inspiration' ); ?></span></div></a><?php }?> 


<?php if ($youtube) {?><a itemprop="url" rel="nofollow" href="<?php echo $youtube ?>" target="_blank"><div class="socialiconstyle yt"><i style="line-height:<?php echo $flwidth;?>px;" class="fa fa-youtube<?php   if ( $flwidth == "35") { ?> fa-lg <?php }  elseif ( $flwidth == "40") { ?> fa-2x <?php } elseif ( $flwidth == "50") { ?> fa-3x <?php } else { ?> fa-4x <?php } ?>"></i><span style="display:none"><?php _e( 'Подписаться на Youtube', 'inspiration' ); ?></span></div></a><?php }?> 


<?php if ($instagram) {?><a itemprop="url" rel="nofollow" href="<?php echo $instagram ?>" target="_blank"><div class="socialiconstyle inst"><i style="line-height:<?php echo $flwidth;?>px;" class="fa fa-instagram <?php   if ( $flwidth == "35") { ?> fa-lg <?php }  elseif ( $flwidth == "40") { ?> fa-2x <?php } elseif ( $flwidth == "50") { ?> fa-3x <?php } else { ?> fa-4x <?php } ?>"></i><span style="display:none"><?php _e( 'Следить в Instagram', 'inspiration' ); ?>  </span></div></a><?php }?> 

<?php if ($whatsapp) {?><a itemprop="url" rel="nofollow" href="https://api.whatsapp.com/send?phone=<?php echo $whatsapp ?>" target="_blank"><div class="socialiconstyle whatsapp"><i style="line-height:<?php echo $flwidth;?>px;" class="fa fa-whatsapp <?php   if ( $flwidth == "35") { ?> fa-lg <?php }  elseif ( $flwidth == "40") { ?> fa-2x <?php } elseif ( $flwidth == "50") { ?> fa-3x <?php } else { ?> fa-4x <?php } ?>"></i><span style="display:none"><?php _e( 'Войти в контакт по WhatsApp', 'inspiration' ); ?></span></div></a><?php }?> 

<?php if ($viber) {?><a itemprop="url" rel="nofollow" href="viber://add?number=<?php echo $viber ?>" target="_blank"><div class="socialiconstyle viber"><i style="font-size: <?php  if($flwidth == "35") { ?> 15px; <?php } elseif ( $flwidth == "40") { ?> 15px; <?php }   else { ?> 22px; <?php } ?>
line-height:<?php echo $flwidth;?>px;" class="fa fa-viber <?php   if ( $flwidth == "35") { ?> fa-lg <?php }  elseif ( $flwidth == "40") { ?> fa-2x <?php } elseif ( $flwidth == "50") { ?> fa-3x <?php } else { ?> fa-4x <?php } ?>"></i><span style="display:none"><?php _e( 'Войти в контакт по Viber', 'inspiration' ); ?></span></div></a><?php }?> 

<?php if ($wechat) {?><a itemprop="url" rel="nofollow" href="<?php echo $wechat ?>" target="_blank" class="fancybox"><div class="socialiconstyle wechat"><i style="line-height:<?php echo $flwidth;?>px;" class="fa fa-wechat <?php   if ( $flwidth == "35") { ?> fa-lg <?php }  elseif ( $flwidth == "40") { ?> fa-2x <?php } elseif ( $flwidth == "50") { ?> fa-3x <?php } else { ?> fa-4x <?php } ?>"></i><span style="display:none"><?php _e( 'Войти в контакт по WeChat', 'inspiration' ); ?></span></div></a><?php }?> 

<?php if ($email) {?><a itemprop="url" rel="nofollow" href="mailto:<?php echo $email ?>" target="_blank"><div class="socialiconstyle email"><i style="line-height:<?php echo $flwidth;?>px;" class="fa fa-envelope <?php   if ( $flwidth == "35") { ?> fa-lg <?php }  elseif ( $flwidth == "40") { ?> fa-2x <?php } elseif ( $flwidth == "50") { ?> fa-3x <?php } else { ?> fa-4x <?php } ?>"></i><span style="display:none"><?php _e( 'Войти в контакт по Email', 'inspiration' ); ?></span></div></a><?php }?> 



<?php if ($linkedin) {?><a itemprop="url" rel="nofollow" href="<?php echo $linkedin ?>" target="_blank"><div class="socialiconstyle linkedin"><i style="line-height:<?php echo $flwidth;?>px;" class="fa fa-linkedin <?php   if ( $flwidth == "35") { ?> fa-lg <?php }  elseif ( $flwidth == "40") { ?> fa-2x <?php } elseif ( $flwidth == "50") { ?> fa-3x <?php } else { ?> fa-4x <?php } ?>"></i><span style="display:none"><?php _e( 'Подписаться на Linkedin', 'inspiration' ); ?></span></div></a><?php }?> </div></div>
<div style="clear:both;"></div>




             <?php echo $after_widget; ?>
        <?php
    }
 
    /** @see WP_Widget::update */
    function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['twitter_id'] = strip_tags($new_instance['twitter_id']);
        $instance['facebook_page'] = strip_tags($new_instance['facebook_page']);
		$instance['youtube'] = strip_tags($new_instance['youtube']);
		$instance['vkontakte'] = strip_tags($new_instance['vkontakte']);
		$instance['ok'] = strip_tags($new_instance['ok']);
		$instance['instagram'] = strip_tags($new_instance['instagram']);
        $instance['flwidth'] = strip_tags($new_instance['flwidth']);
        $instance['form_buttons'] = strip_tags($new_instance['form_buttons']);
        $instance['icon_color'] = strip_tags($new_instance['icon_color']);
        $instance['nativecolor'] = $new_instance['nativecolor'];
        $instance['icon_color_hover'] = strip_tags($new_instance['icon_color_hover']);
        $instance['linkedin'] = strip_tags($new_instance['linkedin']);
         $instance['telegram'] = strip_tags($new_instance['telegram']);
         $instance['viber'] = $new_instance['viber'];
         $instance['email'] = $new_instance['email'];
         $instance['whatsapp'] = $new_instance['whatsapp'];
         $instance['wechat'] = $new_instance['wechat'];
         $instance['bordercolor'] = $new_instance['bordercolor'];
         $instance['icon_color_text'] = $new_instance['icon_color_text'];
         $instance['icon_color_hover_text'] = $new_instance['icon_color_hover_text'];
      
        return $instance;
    }
 
    /** @see WP_Widget::form */
    function form($instance) {  

        $defaults = array(
						'title' => __( 'Следуй за мной', 'inspiration' ),
						'nativecolor' => 0,
						 'icon_color' => '#32acb2',
						 'icon_color_hover' => '#ff4b46',
						 'flwidth' => '50',
						 'form_buttons' => '5',
						 'bordercolor' => 0,
						 'icon_color_text' => '#ffffff',
						 'icon_color_hover_text' => '#ffffff',
						
						
						); 
        $twitter_id = isset( $instance['twitter_id'] ) ? $instance['twitter_id'] :'';
        $facebook_page = isset( $instance['facebook_page'] ) ? esc_attr($instance['facebook_page']) :'';
	    $youtube = isset( $instance['youtube'] ) ? esc_attr($instance['youtube']) :'';
	    $vkontakte = isset( $instance['vkontakte'] ) ? esc_attr($instance['vkontakte']) :'';
        $ok = isset( $instance['ok'] ) ? esc_attr($instance['ok']) :'';
        $instagram = isset( $instance['instagram'] ) ? esc_attr($instance['instagram']) :'';
        $linkedin = isset( $instance['linkedin'] ) ? esc_attr($instance['linkedin']) :'';
        $telegram = isset( $instance['telegram'] ) ? esc_attr($instance['telegram']) :'';
        $wechat = isset( $instance['wechat'] ) ? esc_attr($instance['wechat']) :'';
        $whatsapp = isset( $instance['whatsapp'] ) ? esc_attr($instance['whatsapp']) :'';
        $email = isset( $instance['email'] ) ? esc_attr($instance['email']) :'';
        $viber = isset( $instance['viber'] ) ? esc_attr($instance['viber']) :'';
	    
        
         $instance = wp_parse_args( (array) $instance, $defaults );
	   ?>
        <p>
          <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Заголовок:', 'inspiration'); ?></label>
          <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $instance['title']; ?>" />
        </p>
         <p>
          <label for="<?php echo $this->get_field_id('twitter_id'); ?>"><?php _e('Ссылка на Твиттер аккаунт:', 'inspiration'); ?></label>
          <input class="widefat" id="<?php echo $this->get_field_id('twitter_id'); ?>" name="<?php echo $this->get_field_name('twitter_id'); ?>" type="text" value="<?php echo $twitter_id; ?>" />
        </p>
      
         <p>
          <label for="<?php echo $this->get_field_id('facebook_page'); ?>"><?php _e('Ссылка на Facebook аккаунт:', 'inspiration'); ?></label>
          <input class="widefat" id="<?php echo $this->get_field_id('facebook_page'); ?>" name="<?php echo $this->get_field_name('facebook_page'); ?>" type="text" value="<?php echo $facebook_page; ?>" />
        </p>
        
          <p>
          <label for="<?php echo $this->get_field_id('telegram'); ?>"><?php _e('Логин аккаунта в Телеграм:', 'inspiration'); ?></label>
          <input class="widefat" id="<?php echo $this->get_field_id('telegram'); ?>" name="<?php echo $this->get_field_name('telegram'); ?>" type="text" value="<?php echo $telegram; ?>" />
        </p>
        
        
		
	  <p>
          <label for="<?php echo $this->get_field_id('vkontakte'); ?>"><?php _e('Ссылка на аккаунт Vkontakte:', 'inspiration'); ?></label>
          <input class="widefat" id="<?php echo $this->get_field_id('vkontakte'); ?>" name="<?php echo $this->get_field_name('vkontakte'); ?>" type="text" value="<?php echo $vkontakte; ?>" />
        </p>
        
         <p>
          <label for="<?php echo $this->get_field_id('ok'); ?>"><?php _e('Ссылка на аккаунт Odnoklassniki:', 'inspiration'); ?></label>
          <input class="widefat" id="<?php echo $this->get_field_id('ok'); ?>" name="<?php echo $this->get_field_name('ok'); ?>" type="text" value="<?php echo $ok; ?>" />
        </p>
        
        <p>
          <label for="<?php echo $this->get_field_id('youtube'); ?>"><?php _e('Ссылка на канал Youtube:', 'inspiration'); ?></label>
          <input class="widefat" id="<?php echo $this->get_field_id('youtube'); ?>" name="<?php echo $this->get_field_name('youtube'); ?>" type="text" value="<?php echo $youtube; ?>" />
        </p>	
        
         <p>
          <label for="<?php echo $this->get_field_id('instagram'); ?>"><?php _e('Ссылка на аккаунт Instagram:', 'inspiration'); ?></label>
          <input class="widefat" id="<?php echo $this->get_field_id('instagram'); ?>" name="<?php echo $this->get_field_name('instagram'); ?>" type="text" value="<?php echo $instagram; ?>" />
        </p>
        
        
        
              <p>
          <label for="<?php echo $this->get_field_id('whatsapp'); ?>"><?php _e('WhatsApp:', 'inspiration'); ?></label>
          <input class="widefat" id="<?php echo $this->get_field_id('whatsapp'); ?>" name="<?php echo $this->get_field_name('whatsapp'); ?>" type="text" value="<?php echo $whatsapp; ?>" />
        </p>
        
        
           <p>
          <label for="<?php echo $this->get_field_id('viber'); ?>"><?php _e('Viber:', 'inspiration'); ?></label>
          <input class="widefat" id="<?php echo $this->get_field_id('viber'); ?>" name="<?php echo $this->get_field_name('viber'); ?>" type="text" value="<?php echo $viber; ?>" />
        </p>
        
          <p>
          <label for="<?php echo $this->get_field_id('email'); ?>"><?php _e('Email адрес:', 'inspiration'); ?></label>
          <input class="widefat" id="<?php echo $this->get_field_id('email'); ?>" name="<?php echo $this->get_field_name('email'); ?>" type="text" value="<?php echo $email; ?>" />
        </p>
        
         <p>
          <label for="<?php echo $this->get_field_id('wechat'); ?>"><?php _e('Ссылка на изображение QR WeChat :', 'inspiration'); ?></label>
          <input class="widefat" id="<?php echo $this->get_field_id('wechat'); ?>" name="<?php echo $this->get_field_name('wechat'); ?>" type="text" value="<?php echo $wechat; ?>" />
        </p>
        
         <p>
          <label for="<?php echo $this->get_field_id('linkedin'); ?>"><?php _e('Ссылка на ленту Linkedin:', 'inspiration'); ?></label>
          <input class="widefat" id="<?php echo $this->get_field_id('linkedin'); ?>" name="<?php echo $this->get_field_name('linkedin'); ?>" type="text" value="<?php echo $linkedin; ?>" />
        </p>
        
        
        
        
        	

<p>
			<label for="<?php echo $this->get_field_id( 'flwidth' ); ?>"><?php _e( 'Размер кнопок:', 'inspiration' ); ?></label>
			<select name="<?php echo $this->get_field_name( 'flwidth' ); ?>" class="widefat" id="<?php echo $this->get_field_id( 'flwidth' ); ?>">
				<option value="35"<?php selected( $instance['flwidth'], '35' ); ?>><?php _e( '35', 'inspiration' ); ?></option>
				<option value="40"<?php selected( $instance['flwidth'], '40' ); ?>><?php _e( '40', 'inspiration' ); ?></option>
				<option value="50"<?php selected( $instance['flwidth'], '50' ); ?>><?php _e( '50', 'inspiration' ); ?></option>
                <option value="64"<?php selected( $instance['flwidth'], '64' ); ?>><?php _e( '64', 'inspiration' ); ?></option> 
                   				
			</select>
		</p>
		
		
		<p>
			<label for="<?php echo $this->get_field_id( 'form_buttons' ); ?>"><?php _e( 'Форма кнопок:', 'inspiration' ); ?></label>
			<select name="<?php echo $this->get_field_name( 'form_buttons' ); ?>" class="widefat" id="<?php echo $this->get_field_id( 'form_buttons' ); ?>">
				<option value="0"<?php selected( $instance['form_buttons'], '0' ); ?>><?php _e( 'Квадратные', 'inspiration' ); ?></option>
				<option value="5"<?php selected( $instance['form_buttons'], '5' ); ?>><?php _e( 'С загруглениями', 'inspiration' ); ?></option>
				<option value="50"<?php selected( $instance['form_buttons'], '50' ); ?>><?php _e( 'Круглые', 'inspiration' ); ?></option>
                  				
			</select>
		</p>
		
		<p>
		
		 <input id="<?php echo $this->get_field_id('nativecolor'); ?>" name="<?php echo $this->get_field_name('nativecolor'); ?>" type="checkbox" value="1" <?php checked( '1', $instance['nativecolor']); ?>/>
          <label for="<?php echo $this->get_field_id('nativecolor'); ?>"><?php _e('Использовать один цвет для иконок?', 'inspiration'); ?></label> 
		

		</p>
		
		
		<p>
		
		 <input id="<?php echo $this->get_field_id('bordercolor'); ?>" name="<?php echo $this->get_field_name('bordercolor'); ?>" type="checkbox" value="1" <?php checked( '1', $instance['bordercolor']); ?>/>
          <label for="<?php echo $this->get_field_id('bordercolor'); ?>"><?php _e('Вместо фона использовать границу?', 'inspiration'); ?></label> 
		

		</p>
		
		
		 <script type='text/javascript'>
	jQuery(document).ready(function($) {
		$('.my-color-picker1').wpColorPicker();
	});
</script>  
		<p>
 <label for="<?php echo $this->get_field_id('icon_color'); ?>"><?php _e('Цвет кнопок/границы:', 'inspiration'); ?></label><br>
          <input class="my-color-picker1" id="<?php echo $this->get_field_id('icon_color'); ?>" name="<?php echo $this->get_field_name('icon_color'); ?>" type="text" value="<?php echo $instance['icon_color']; ?>" />
   </p>
   <script type='text/javascript'>
	jQuery(document).ready(function($) {
		$('.my-color-pickertext1').wpColorPicker();
	});
</script>  
		<p>
 <label for="<?php echo $this->get_field_id('icon_color_text'); ?>"><?php _e('Цвет иконок кнопок:', 'inspiration'); ?></label><br>
          <input class="my-color-pickertext1" id="<?php echo $this->get_field_id('icon_color_text'); ?>" name="<?php echo $this->get_field_name('icon_color_text'); ?>" type="text" value="<?php echo $instance['icon_color_text']; ?>" />
   </p>

   
    <script type='text/javascript'>
	jQuery(document).ready(function($) {
		$('.my-color-picker2').wpColorPicker();
	});
</script>  
		<p>
 <label for="<?php echo $this->get_field_id('icon_color_hover'); ?>"><?php _e('Цвет кнопок при наведении мышки:', 'inspiration'); ?></label><br>
          <input class="my-color-picker2" id="<?php echo $this->get_field_id('icon_color_hover'); ?>" name="<?php echo $this->get_field_name('icon_color_hover'); ?>" type="text" value="<?php echo $instance['icon_color_hover']; ?>" />
   </p>
   
    <script type='text/javascript'>
	jQuery(document).ready(function($) {
		$('.my-color-pickertext2').wpColorPicker();
	});
</script>  
		<p>
 <label for="<?php echo $this->get_field_id('icon_color_hover_text'); ?>"><?php _e('Цвет иконок кнопок наведении мышки:', 'inspiration'); ?></label><br>
          <input class="my-color-pickertext2" id="<?php echo $this->get_field_id('icon_color_hover_text'); ?>" name="<?php echo $this->get_field_name('icon_color_hover_text'); ?>" type="text" value="<?php echo $instance['icon_color_hover_text']; ?>" />
   </p>

		
		
        <?php
    }
 
} 

add_action( 'widgets_init', function(){
     register_widget( 'follow_widget' );
});

// ================== Facebook Like Box =============================

/**
 * Facebook Like Box
 */

class facebook_widget extends WP_Widget {
 

 function __construct() {
    parent::__construct(
        'facebook_widget', // Base ID
        __( '4 - AB - Facebook Like Box', 'inspiration' ),
        array( 'description' => __( 'Блок Фейсбук Фан старницы', 'inspiration' ), )
    );
}

 
    /** @see WP_Widget::widget -- do not rename this */
    function widget($args, $instance) {
        extract( $args );
$title = apply_filters('widget_title', $instance['title']);
$fblink	= $instance['fblink'];
$faces = $instance['faces']; if ( ! $faces ) { $faces = 'true'; }
$fbstream = $instance['fbstream']; if ( ! $fbstream ) { $fbstream = 'true'; }
$fbheader = $instance['fbheader']; if ( ! $fbheader ) { $fbheader = 'true'; }
$fbheight = $instance['fbheight']; if ( ! $fbheight ) { $fbheight = 'true'; }


        ?>
<?php echo $before_widget; ?>
<?php if ( $title ) echo $before_title . $title . $after_title;?>
<div class="textwidget">

<?php if ($fbstream == 'true') $timeline = 'timeline'; else $timeline = 'timeline, events, messages'; ?>


<div class="fb-page" data-href="<?php echo $fblink; ?>" data-width="690" data-height="<?php echo $fbheight; ?>" data-tabs="<?php echo $timeline; ?>" data-small-header="true" data-adapt-container-width="true" data-hide-cover="<?php echo $fbheader; ?>" data-show-facepile="<?php echo $faces; ?>"></div>
</div>
<div style="clear:both;"></div>


              <?php echo $after_widget; ?>

               

        <?php
    }
 
    /** @see WP_Widget::update -- do not rename this */
    function update($new_instance, $old_instance) {
		$instance = $old_instance;
$instance['title'] = strip_tags($new_instance['title']);
$instance['fblink'] = strip_tags($new_instance['fblink']);
$instance['faces'] = strip_tags($new_instance['faces']);
$instance['fbstream'] = strip_tags($new_instance['fbstream']);
$instance['fbheader'] = strip_tags($new_instance['fbheader']);
$instance['fbheight'] = strip_tags($new_instance['fbheight']);

        return $instance;
    }
 
    /** @see WP_Widget::form -- do not rename this */
    function form($instance) {
    
     $defaults = array(
						'title' => __( 'Присоединяйтесь!', 'inspiration' ),
						'faces' => 'true', 
						'fbstream' => 'false', 
						'fbheader' => 'false', 
						'fbheight' => '300'
						
						
						); 
 $fblink	= esc_attr($instance['fblink']);
 $instance = wp_parse_args( (array) $instance, $defaults );
        ?>
       
<p>
          <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Заголовок:', 'inspiration'); ?></label>
          <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $instance['title']; ?>" />
        </p>
		
		<p>
          <label for="<?php echo $this->get_field_id('fblink'); ?>"><?php _e('Ссылка на фан страницу Facebook:', 'inspiration'); ?></label>
          <input class="widefat" id="<?php echo $this->get_field_id('fblink'); ?>" name="<?php echo $this->get_field_name('fblink'); ?>" type="text" value="<?php echo $fblink; ?>" />
        </p>
<p>
			<label for="<?php echo $this->get_field_id( 'faces' ); ?>"><?php _e( 'Лица поклонников:', 'inspiration' ); ?></label>
			<select name="<?php echo $this->get_field_name( 'faces' ); ?>" class="widefat" id="<?php echo $this->get_field_id( 'faces' ); ?>">
				<option value="true"<?php selected( $instance['faces'], 'true' ); ?>><?php _e( 'Да', 'inspiration' ); ?></option>
				<option value="false"<?php selected( $instance['faces'], 'false' ); ?>><?php _e( 'Нет', 'inspiration' ); ?></option>            
			</select>
		</p>
		
	<p>
			<label for="<?php echo $this->get_field_id( 'fbstream' ); ?>"><?php _e( 'Показывать ленту или вкладки:', 'inspiration' ); ?></label>
			<select name="<?php echo $this->get_field_name( 'fbstream' ); ?>" class="widefat" id="<?php echo $this->get_field_id( 'fbstream' ); ?>">
				<option value="true"<?php selected( $instance['fbstream'], 'true' ); ?>><?php _e( 'Только ленту', 'inspiration' ); ?></option>
				<option value="false"<?php selected( $instance['fbstream'], 'false' ); ?>><?php _e( 'Вкладки', 'inspiration' ); ?></option>            
			</select>
		</p>	
		
	

		
		<p>
			<label for="<?php echo $this->get_field_id( 'fbheader' ); ?>"><?php _e( 'Скрыть фон в шапке:', 'inspiration' ); ?></label>
			<select name="<?php echo $this->get_field_name( 'fbheader' ); ?>" class="widefat" id="<?php echo $this->get_field_id( 'fbheader' ); ?>">
				<option value="true"<?php selected( $instance['fbheader'], 'true' ); ?>><?php _e( 'Да', 'inspiration' ); ?></option>
				<option value="false"<?php selected( $instance['fbheader'], 'false' ); ?>><?php _e( 'Нет', 'inspiration' ); ?></option>            
			</select>
		</p>
		
		
	
		
		
		

<p>
          <label for="<?php echo $this->get_field_id('fbheight'); ?>"><?php _e('Высота блока (укажите минимум 300):', 'inspiration'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('fbheight'); ?>" name="<?php echo $this->get_field_name('fbheight'); ?>" type="text" value="<?php echo $instance['fbheight']; ?>" />
        </p>	
        <?php
    }
 
 
} 

add_action( 'widgets_init', function(){
     register_widget( 'facebook_widget' );
});


// =============================== Группа вконтакте 



class vkontakte_widget extends WP_Widget {
 function __construct() {
    parent::__construct(
        'vkontakte_widget', // Base ID
        __( '5 - AB - Группа В Контакте', 'inspiration' ),
        array( 'description' => __( 'Блок Группы в Вконтакте', 'inspiration' ), )
    );
}

    function widget($args, $instance) {
        extract( $args );
		$title = apply_filters('widget_title', $instance['title']);
        $vkid = $instance['vkid'];
        $vkheight = $instance['vkheight'];
        $vkcolor1 = $instance['vkcolor1'];
        $vkcolor2 = $instance['vkcolor2'];
        $vkcolor3 = $instance['vkcolor3'];
        $vkmode = $instance['vkmode'];


 ?>

		
     <?php echo $before_widget; ?>
                  <?php if ( $title )
                        echo $before_title . $title . $after_title; ?>         
<!-- VK Widget -->


<div style="padding-top:5px;">
<div id="vk_groups"></div></div>

 <?php  if ( of_get_option('simple_settings') == '1')  { ?> 

<script type="text/javascript">
VK.Widgets.Group("vk_groups", {redesign: 1, mode: <?php echo $vkmode; ?>, width: "auto", height: "400", color1: '<?php echo $vkcolor1; ?>', color2: '<?php echo $vkcolor2; ?>', color3: '#333'}, <?php echo $vkid; ?>);
</script>

<?php } else { ?> <script type="text/javascript">
VK.Widgets.Group("vk_groups", {redesign: 1, mode: <?php echo $vkmode; ?>, width: "auto", height: "400", color1: '<?php echo $vkcolor1; ?>', color2: '<?php echo $vkcolor2; ?>', color3: '<?php echo $vkcolor3; ?>'}, <?php echo $vkid; ?>);
</script>
 <?php } ?>

         <?php echo $after_widget; ?>      

        <?php
    }
 
    /** @see WP_Widget::update -- do not rename this */
    function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['vkid'] = strip_tags($new_instance['vkid']);
		$instance['vkheight'] = esc_attr($new_instance['vkheight']);
		
		$instance['vkcolor1'] = esc_attr($new_instance['vkcolor1']);
		$instance['vkcolor2'] = esc_attr($new_instance['vkcolor2']);
		$instance['vkcolor3'] = esc_attr($new_instance['vkcolor3']);
		$instance['vkmode'] = esc_attr($new_instance['vkmode']);
		

        return $instance;
    }
 
    /** @see WP_Widget::form -- do not rename this */
    function form($instance) {
    
    
    
       $defaults = array(
						'title' => __( 'Группа Вконтакте', 'inspiration' ),
					    'vkheight' => '300',
					    'vkcolor1' => '#ffffff',
					    'vkcolor2' => '#000000',
					    'vkcolor3' => '#5E81A8',
					    'vkmode' => 3
					    		

						
					);
    

 $vkid = isset( $instance['vkid'] ) ? esc_attr($instance['vkid']) : '';
$instance = wp_parse_args( (array) $instance, $defaults );
 
         ?>
         		  <p>
          <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Заголовок:', 'inspiration'); ?></label>
          <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $instance['title']; ?>" />
        </p>

 <p>
          <label for="<?php echo $this->get_field_id('vkid'); ?>"><?php _e('ID Группы В Контакте:', 'inspiration'); ?></label>
          <input class="widefat" id="<?php echo $this->get_field_id('vkid'); ?>" name="<?php echo $this->get_field_name('vkid'); ?>" type="text" value="<?php echo $vkid ?>" />
        </p>
        
         <p>
          <label for="<?php echo $this->get_field_id('vkheight'); ?>"><?php _e('Высота блока ВКонтакте:', 'inspiration'); ?></label>
          
          <input class="widefat" id="<?php echo $this->get_field_id('vkheight'); ?>" name="<?php echo $this->get_field_name('vkheight'); ?>" type="text" value="<?php echo $instance['vkheight']; ?>" />
        </p>
        
        
         <script type='text/javascript'>
	jQuery(document).ready(function($) {
		$('.my-color-picker5').wpColorPicker();
	});
</script>  
		<p>
 <label for="<?php echo $this->get_field_id('vkcolor1'); ?>"><?php _e('Цвет фона:', 'inspiration'); ?></label><br>
          <input class="my-color-picker5" id="<?php echo $this->get_field_id('vkcolor1'); ?>" name="<?php echo $this->get_field_name('vkcolor1'); ?>" type="text" value="<?php echo $instance['vkcolor1']; ?>" />
   </p>
   
    <script type='text/javascript'>
	jQuery(document).ready(function($) {
		$('.my-color-picker5').wpColorPicker();
	});
</script>  
		<p>
 <label for="<?php echo $this->get_field_id('vkcolor2'); ?>"><?php _e('Цвет текста:', 'inspiration'); ?></label><br>
          <input class="my-color-picker5" id="<?php echo $this->get_field_id('vkcolor2'); ?>" name="<?php echo $this->get_field_name('vkcolor2'); ?>" type="text" value="<?php echo $instance['vkcolor2']; ?>" />
   </p>
   
    <script type='text/javascript'>
	jQuery(document).ready(function($) {
		$('.my-color-picker6').wpColorPicker();
	});
</script>  
		<p>
 <label for="<?php echo $this->get_field_id('vkcolor3'); ?>"><?php _e('Цвет кнопок:', 'inspiration'); ?></label><br>
          <input class="my-color-picker6" id="<?php echo $this->get_field_id('vkcolor3'); ?>" name="<?php echo $this->get_field_name('vkcolor3'); ?>" type="text" value="<?php echo $instance['vkcolor3']; ?>" />
   </p>
        
        
        <p>
			<label for="<?php echo $this->get_field_id( 'vkmode' ); ?>"><?php _e( 'Вид:', 'inspiration' ); ?></label>
			<select name="<?php echo $this->get_field_name( 'vkmode' ); ?>" class="widefat" id="<?php echo $this->get_field_id( 'vkmode' ); ?>">
				<option value="3"<?php selected( $instance['vkmode'], '3' ); ?>><?php _e( 'Участники', 'inspiration' ); ?></option>
				<option value="4"<?php selected( $instance['vkmode'], '4' ); ?>><?php _e( 'Новости', 'inspiration' ); ?></option>  
				<option value="1"<?php selected( $instance['vkmode'], '1' ); ?>><?php _e( 'Только название', 'inspiration' ); ?></option>            
			</select>
		</p>


		
        <?php
    }
 } 
add_action( 'widgets_init', function(){
     register_widget( 'vkontakte_widget' );
});


// =============================== Группа в одноклассники 


class odnoklassniki_widget extends WP_Widget {
 
 
   function __construct() {
    parent::__construct(
        'odnoklassniki_widget', // Base ID
        __( '6 - AB - Группа в Одноклассниках', 'inspiration' ),
        array( 'description' => __( 'Блок Группы в Одноклассниках', 'inspiration' ), )
    );
}

    function widget($args, $instance) {
        extract( $args );
		$title = apply_filters('widget_title', $instance['title']);
			
 ?>

		
     <?php echo $before_widget; ?>
                  <?php if ( $title )
                        echo $before_title . $title . $after_title; ?>         
<div style="padding:2px; margin-left:10px; padding-top:5px;"><div id="ok_group_widget"></div></div>

<?php echo $after_widget; ?>      

        <?php
    }
 
    /** @see WP_Widget::update -- do not rename this */
    function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		
		return $instance;
    }

/** @see WP_Widget::form -- do not rename this */
    function form($instance) {
    
    
    
       $defaults = array(
						'title' => __( 'Группа в Одноклассниках', 'inspiration' ), 
					);
					$ok_group = isset( $instance['ok_group'] ) ? esc_attr($instance['ok_group']) : '';
    
 $instance = wp_parse_args( (array) $instance, $defaults );
	
         ?>
         		  <p>
          <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Заголовок:', 'inspiration'); ?></label>
          <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $instance['title']; ?>" />
        </p>
        <p><?php _e('Для отображения блока "Группа в Одноклассниках" необходимо вставить "ID Группы в Одноклассниках" в Настройках Шаблона в разделе "Вставки"', 'inspiration'); ?></p>
        
         
       <?php
    }
 
} 
add_action( 'widgets_init', function(){
     register_widget( 'odnoklassniki_widget' );
});



// =============================== Twitter widget ======================================


/**
 * Text widget class
 *
 * @since 2.8.0
 */
class twitter_widget extends WP_Widget {

	function __construct() {
		$widget_twitter_ops = array('classname' => 'twitter_widget', 'description' => __('Виджет для вставки кода Twitter ленты', 'inspiration'));
		$control_tiwtter_ops = array('width' => 400, 'height' => 350);
		parent::__construct('twittertext', __('8 - AB - Twitter Лента', 'inspiration'), $widget_twitter_ops, $control_tiwtter_ops);
	}

	function widget( $args, $instance ) {
		extract($args);
		$twitter_title = apply_filters( 'widget_title', empty( $instance['twittertitle'] ) ? '' : $instance['twittertitle'], $instance, $this->id_base );
		
		echo $before_widget;
		if ( !empty( $twitter_title ) ) { echo $before_title . $twitter_title . $after_title; } ?>
			<div class="textwidget" style="padding-top:5px;"><a class="twitter-timeline" data-width="100%" data-height="400" data-theme="light" href="https://twitter.com/<?php echo of_get_option('twitter');?>"></a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script></div>
		<?php
		echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['twittertitle'] = strip_tags($new_instance['twittertitle']);
		
		
		return $instance;
	}

	function form( $instance ) {
	   $defaults = array(
						'twittertitle' => __( 'Лента Твитер', 'inspiration' ) );
	
		
		$instance = wp_parse_args( (array) $instance, $defaults );
?>
		<p><label for="<?php echo $this->get_field_id('twittertitle'); ?>"><?php _e('Заголовок:', 'inspiration'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('twittertitle'); ?>" name="<?php echo $this->get_field_name('twittertitle'); ?>" type="text" value="<?php echo $instance['twittertitle']; ?>" /></p>
<p><?php _e('Для отображения виджета "Твиттер лент" необходимо вставить "ID Twitter" в Настройках Шаблона в разделе "Вставки"', 'inspiration'); ?></p>
		
		
<?php
	}
}

add_action( 'widgets_init', function(){
     register_widget( 'twitter_widget' );
});

// =============================== YouTube подписка 


/**
 * Подписка на Youtube
 */
class youtube_widget extends WP_Widget {
 
   function __construct() {
    parent::__construct(
        'youtube_widget', // Base ID
        __( '9 - AB - Подписка на канал YouTube', 'inspiration' ),
        array( 'description' => __( 'Блок Подписка на Youtube', 'inspiration' ), )
    );
}

    function widget($args, $instance) {
        extract( $args );
		$title = apply_filters('widget_title', $instance['title']);
        $youtubeid = $instance['youtubeid'];

 ?>

		
     <?php echo $before_widget; ?>
                  <?php if ( $title )
                        echo $before_title . $title . $after_title; ?>  
                        
                        
 <div style="text-align:left; margin-bottom:0px !important; padding-bottom:0px !important; padding-top:5px;height: 80px;">                       
<script src="https://apis.google.com/js/platform.js"></script>
<div class="g-ytsubscribe" data-channelid="<?php echo $youtubeid; ?>" data-layout="full" data-count="default"></div>                 
                        
</div>

<?php echo $after_widget; ?>      

        <?php
    }
 
    /** @see WP_Widget::update -- do not rename this */
    function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['youtubeid'] = strip_tags($new_instance['youtubeid']);
		
        return $instance;
    }
 
    /** @see WP_Widget::form -- do not rename this */
    function form($instance) {
    $defaults = array(
						'title' => __( 'Подписка на YouTube', 'inspiration' ),
						
						); 
  $youtubeid = isset( $instance['youtubeid'] ) ? esc_attr($instance['youtubeid']) : '';
  $instance = wp_parse_args( (array) $instance, $defaults );
 
         ?>
         		  <p>
          <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Заголовок:', 'inspiration'); ?></label>
          <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $instance['title']; ?>" />
        </p>

 <p>
          <label for="<?php echo $this->get_field_id('youtubeid'); ?>"><?php _e('ID Youtube:', 'inspiration'); ?></label>
          <input class="widefat" id="<?php echo $this->get_field_id('youtubeid'); ?>" name="<?php echo $this->get_field_name('youtubeid'); ?>" type="text" value="<?php echo $youtubeid ?>" />
        </p>

		
        <?php
    }
 
} 
add_action( 'widgets_init', function(){
     register_widget( 'youtube_widget' );
});


// Свежие записи с миниатюрой



class pippin_recent_posts extends WP_Widget {


   function __construct() {
    parent::__construct(
        'pippin_recent_posts', // Base ID
        __( '11 - AB - Свежие записи с миниатюрами', 'inspiration' ),
        array( 'description' => __( 'Свежие записи с миниатюрами', 'inspiration' ), )
    );
}

    function widget($args, $instance) {	
        extract( $args );
		global $posttypes;
        $title 			= apply_filters('widget_title', $instance['title']);
        $cat 			= apply_filters('widget_title', $instance['cat']);
        $number 		= apply_filters('widget_title', $instance['number']);
        $offset 		= apply_filters('widget_title', $instance['offset']);
        $thumbnail_size = apply_filters('widget_title', $instance['thumbnail_size']);
        $thumbnail 		= $instance['thumbnail'];
        $recentexcerpt		= $instance['recentexcerpt'];
        $recenttitle		= $instance['recenttitle'];
        $readmorerecpostlink		= $instance['readmorerecpostlink'];
        $readmorerecpost		= $instance['readmorerecpost'];



      
        ?>
              <?php echo $before_widget; ?>
                  <?php if ( $title )
                        echo $before_title . $title . $after_title; ?>
									



<div class="recent-posts">

							<?php
								global $post;
								$tmp_post = $post;
								
								// get the category IDs and place them in an array
								
								$args = 'numberposts=' . $number . '&offset=' . $offset . '&post_type=' . @$posttype . '&cat=' . $cat;
								$myposts = get_posts( $args );
								foreach( $myposts as $post ) : setup_postdata($post); ?>



<?php if(!empty($thumbnail_size)) { $size = $thumbnail_size + 8;  } ?> 



<div class="recent-post-item">

	<?php if($thumbnail == true) { ?>

<div style="float:left; padding-bottom:2px;"><a href="<?php the_permalink(); ?>" ><?php the_post_thumbnail(array($thumbnail_size));?></a></div><?php } ?><div class="recentpost-title">
<?php if($recenttitle == true) {?>  <a href="<?php the_permalink(); ?>" style="font-size:18px;"><?php  $wq=mb_substr($post->post_title, 0, 60) ;echo $wq.'...'; ?></a><?php } ?></div><?php if($recentexcerpt == true) {   ?> <div class="respostanons"><?php my_excerpt('short'); ?> </div><?php  } ?><div class="read-more-link"><?php if($readmorerecpostlink == true) {?> <a href="<?php the_permalink(); ?>"><?php echo $readmorerecpost; ?></a> <?php } ?></div></div>
<div style="clear:both; border-bottom:1px solid #eaeaea; height:1px; margin:10px 0px"></div><?php endforeach; ?><?php $post = $tmp_post; ?></div>


              <?php echo $after_widget; ?>
        <?php
    }

    /** @see WP_Widget::update */
    function update($new_instance, $old_instance) {		
		global $posttypes;
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['cat'] = strip_tags($new_instance['cat']);
		$instance['number'] = strip_tags($new_instance['number']);
		$instance['offset'] = strip_tags($new_instance['offset']);
		$instance['thumbnail_size'] = strip_tags($new_instance['thumbnail_size']);
		$instance['thumbnail'] = $new_instance['thumbnail'];
        $instance['recentexcerpt'] = $new_instance['recentexcerpt'];
        $instance['recenttitle'] = $new_instance['recenttitle'];
        $instance['readmorerecpostlink'] = $new_instance['readmorerecpostlink'];
        $instance['readmorerecpost'] = $new_instance['readmorerecpost'];
        return $instance;
    }

    /** @see WP_Widget::form */
    function form($instance) {	

		$defaults = array(
						'title' => __( 'Свежие записи', 'inspiration' ),
						
						'number' => '5',
						'thumbnail_size' => '60',
						'thumbnail' => '1',
						'recentexcerpt' => '1',
						'recenttitle' =>  '1',
						'readmorerecpostlink' => '1',
						'readmorerecpost' => 'Читать далее'
				);
			$instance = wp_parse_args( (array) $instance, $defaults );
       		

	
        
        $posttypes = get_post_types('', 'objects');
        $cat = esc_attr($instance['cat']);
       
        $offset = esc_attr($instance['offset']);
      


       ?>
         <p>
          <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Заголовок:', 'inspiration'); ?></label> 
          <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $instance['title']; ?>" />
        </p>

<p>


<input id="<?php echo $this->get_field_id('recenttitle'); ?>" name="<?php echo $this->get_field_name('recenttitle'); ?>" type="checkbox" value="1" <?php checked( '1', $instance['recenttitle'] ); ?>/>
          <label for="<?php echo $this->get_field_id('recenttitle'); ?>"><?php _e('Показывать заголовок статьи?', 'inspiration'); ?></label> <br>


          <input id="<?php echo $this->get_field_id('recentexcerpt'); ?>" name="<?php echo $this->get_field_name('recentexcerpt'); ?>" type="checkbox" value="1" <?php checked( '1', $instance['recentexcerpt']); ?>/>
          <label for="<?php echo $this->get_field_id('recentexcerpt'); ?>"><?php _e('Показывать анонс статьи?', 'inspiration'); ?></label><br> 

       <input id="<?php echo $this->get_field_id('readmorerecpostlink'); ?>" name="<?php echo $this->get_field_name('readmorerecpostlink'); ?>" type="checkbox" value="1" <?php checked( '1', $instance['readmorerecpostlink']); ?>/>
          <label for="<?php echo $this->get_field_id('readmorerecpostlink'); ?>"><?php _e('Ссылка: Читать далее', 'inspiration'); ?></label> <br>

 <label for="<?php echo $this->get_field_id('readmorerecpost'); ?>"><?php _e('Текст ссылки: Читать далее:', 'inspiration'); ?></label> 
          <input class="widefat" id="<?php echo $this->get_field_id('readmorerecpost'); ?>" name="<?php echo $this->get_field_name('readmorerecpost'); ?>" type="text" value="<?php echo $instance['readmorerecpost']; ?>" />
        </p>



		<p>
          <label for="<?php echo $this->get_field_id('cat'); ?>"><?php _e('ID Рубрик, разделенные запятой', 'inspiration'); ?></label> 
          <input class="widefat" id="<?php echo $this->get_field_id('cat'); ?>" name="<?php echo $this->get_field_name('cat'); ?>" type="text" value="<?php echo $cat; ?>" />
        </p>
		<p>
          <label for="<?php echo $this->get_field_id('number'); ?>"><?php _e('Количество записей:', 'inspiration'); ?></label> 
          <input class="widefat" id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $instance['number']; ?>" />
        </p>
		<p>
          <label for="<?php echo $this->get_field_id('number'); ?>"><?php _e('Смещение (количество постов пропустить):', 'inspiration'); ?></label> 
          <input class="widefat" id="<?php echo $this->get_field_id('offset'); ?>" name="<?php echo $this->get_field_name('offset'); ?>" type="text" value="<?php echo $offset; ?>" />
        </p>
		<p>
          <input id="<?php echo $this->get_field_id('thumbnail'); ?>" name="<?php echo $this->get_field_name('thumbnail'); ?>" type="checkbox" value="1" <?php checked( '1', $instance['thumbnail']); ?>/>
          <label for="<?php echo $this->get_field_id('thumbnail'); ?>"><?php _e('Показывать миниатюру записи?', 'inspiration'); ?></label> 
        </p>
		<p>
          <label for="<?php echo $this->get_field_id('thumbnail_size'); ?>"><?php _e('Размер миниатюры, например <em>60</em> = 60px x 60px', 'inspiration'); ?></label> 
          <input class="widefat" id="<?php echo $this->get_field_id('thumbnail_size'); ?>" name="<?php echo $this->get_field_name('thumbnail_size'); ?>" type="text" value="<?php echo $instance['thumbnail_size']; ?>" />
        </p>
		
        <?php 
    }


} // class utopian_recent_posts
add_action( 'widgets_init', function(){
     register_widget( 'pippin_recent_posts' );
});
// =============================== Top commentators

class topcom_widget extends WP_Widget {
   function __construct() {
    parent::__construct(
        'topcom_widget', // Base ID
        __( '12 - AB - Топ комментаторы', 'inspiration' ),
        array( 'description' => __( 'Вывод самых активных читателей', 'inspiration' ), )
    );
}

    function widget($args, $instance) {
        extract( $args );
    $title = apply_filters('widget_title', $instance['title'], $instance, $this->id_base );
    $tclength = $instance['tclength']; if ( ! $tclength ) { $tclength = 20; }
    $tcperiod = $instance['tcperiod'];
		// start list period setup
		if($tcperiod == "h") {
			$tcperiod = "DATE_FORMAT(comment_date, '%Y-%m-%d %H') = DATE_FORMAT(CURDATE(), '%Y-%m-%d %H')";
		} elseif($tcperiod == "d") {
			$tcperiod = "DATE_FORMAT(comment_date, '%Y-%m-%d') = DATE_FORMAT(CURDATE(), '%Y-%m-%d')";
		} elseif($tcperiod == "w") {
			$tcperiod = "DATE_FORMAT(comment_date, '%Y-%v') = DATE_FORMAT(CURDATE(), '%Y-%v')";
		} elseif($tcperiod == "m") {
			$tcperiod = "DATE_FORMAT(comment_date, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m')";
		} elseif($tcperiod == "y") {
			$tcperiod = "DATE_FORMAT(comment_date, '%Y') = DATE_FORMAT(CURDATE(), '%Y')";
		} elseif($tcperiod == "a") {
			$tcperiod = "1=1";
		} elseif(is_numeric($tcperiod)) {
			$tcperiod = "comment_date >= CURDATE() - INTERVAL $tcperiod DAY";
		// check if a range of date is entered, then generate the appropriate SQL statement
		} elseif(strpos($tcperiod, 'and') !== false) {
			$tcperiod = "comment_date BETWEEN $tcperiod";
		} else {
			$tcperiod = "comment_date >= CURDATE() - INTERVAL 30 DAY";
		} // end list period setup
	$tcperiod = ' AND ' . $tcperiod;
    $tccomment = $instance['tccomment'];		
    $tccol = $instance['tccol']; // количество колонок
    $tccount = $instance['tccount']; if ( ! $tccount ) { $tccount = 9; }
	 if($tccol == "1") {
			$tcavatar = "40";
		}  elseif($tccol == "4") {
			$tcavatar = "50";
		}
    
    
    
    

// start email filter prep
		if($instance['tcemail'] != "") {
			$tcemail = trim($instance['tcemail']);
			$tcemail = explode(",", $tcemail);
			for($i=0; $i<count($tcemail); $i++) {
			     $new_emails .= " AND comment_author_email NOT LIKE '%" . trim($tcemail[$i]) . "%'";
			}
			$tcemail = $new_emails;
		} // end url filter prep
?>

		
     <?php echo $before_widget; ?>
                  <?php if ( $title )
                        echo $before_title . $title . $after_title; ?>         

<?php


global $wpdb;

$results = $wpdb->get_results("
SELECT
COUNT(comment_author_email) AS comments_count, comment_author_email, comment_author, comment_author_url
FROM $wpdb->comments
      WHERE comment_type != 'pingback'
      AND comment_author != ''
      AND comment_approved = '1'
      $tcperiod
      $tcemail
GROUP BY
comment_author_email
ORDER BY
comments_count DESC, comment_author");
 
$results = array_slice($results,0,$tccount);
$output = "<div class='textwidget'><div class='tccol".  $tccol ."'><table style='width:100%'><tr style='text-align:center'>";
$i = 0;
foreach($results as $result){
if ($i>=$tccol) {
$output .= "</tr><tr style='align:center'>";
$i = 0;
}
$i++;
$output .= "<td style='border:none'><div class='avatar-comment'><div class='avatar-top'><a target='_blank' 
rel='nofollow' href='".$result->comment_author_url."'>".get_avatar($result->comment_author_email, $tcavatar, "//www.gravatar.com/avatar/ad516503a11cd5ca435acc9bb6523536")."</a></div>";
if ($tclength and $tclength<mb_strlen($result->comment_author)) 
$result->comment_author = trim(mb_substr($result->comment_author, 0, $tclength)).'.';
if ($result->comment_author_url)
$output .= "<div class='topname'></div><a target='_blank' rel='nofollow' href='".$result->comment_author_url."'>".$result->comment_author."</a>"; else $output .= '<div class="topname"></div>'.$result->comment_author;
if($tccomment == 0)
if ($tccol == 4) {$output .= '<span>' . $result->comments_count . '</span>';} 
else {$output .= '<span>(' . $result->comments_count . ')</span>';}         
$output .= "<div style='clear:both;'></div></div></td>"; }
if ($i<=$tccol) $output .= "</tr>";
$output .= "</table></div></div>";
echo $output;
?>






         <?php echo $after_widget; ?>      

        <?php
    }
 
    /** @see WP_Widget::update -- do not rename this */
    function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['tclength'] = esc_attr($new_instance['tclength']);
		if( $new_instance['tcperiodnum'] != '' ) {
      $instance['tcperiod'] = $new_instance['tcperiodnum'];
    } else {
		  $instance['tcperiod'] = $new_instance['tcperiod'];
		}
        $instance['tccomment'] = $new_instance['tccomment'];
        $instance['tccount'] = esc_attr( $new_instance['tccount'] );
		$instance['tccol'] = strip_tags($new_instance['tccol']);
		$instance['tcavatar'] = strip_tags($new_instance['tcavatar']);
		$instance['tcemail'] = $new_instance['tcemail'];
        return $instance;
    }
 
    /** @see WP_Widget::form -- do not rename this */
    function form($instance) {
    $current_user = wp_get_current_user();
    $defaults = array(
						'title' => __( 'Топ комментаторы', 'inspiration' ), 
						'tcperiod' => 'a', 
						 
						'tccount' => 9, 
						'tclength' => 20, 
						'tcemail' => $current_user->user_email,
						'tccol' => 4,
						'tccomment' => '0'

						
					
						
					);
			

       		$instance = wp_parse_args( (array) $instance, $defaults );
     
         ?>
         		 <p>
		   <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Заголовок:', 'inspiration' ); ?></label>
		   
		   
		   <input type="text" name="<?php echo $this->get_field_name( 'title' ); ?>"  value="<?php echo $instance['title']; ?>" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>"  />
		</p>        
       
       
          <p>
		   <label for="<?php echo $this->get_field_id( 'tclength' ); ?>"><?php _e( 'Количество знаков в имени:', 'inspiration' ); ?></label>
		   <input type="text" name="<?php echo $this->get_field_name( 'tclength' ); ?>"  value="<?php echo $instance['tclength']; ?>" class="widefat" id="<?php echo $this->get_field_id( 'tclength' ); ?>" />
		</p>
        
       
<p>
		<label for="<?php echo $this->get_field_id( 'tcperiod' ); ?>"><?php _e( 'За какой период:', 'inspiration' ); ?></label> 
		<select class="widefat" id="<?php echo $this->get_field_id( 'tcperiod' ); ?>" name="<?php echo $this->get_field_name( 'tcperiod' ); ?>">
		<option value="h"<?php if ( 'h' == $instance['tcperiod'] ) echo 'selected="selected"'; ?>><?php _e( 'Час', 'inspiration' ); ?></option>
		<option value="d"<?php if ( 'd' == $instance['tcperiod'] ) echo 'selected="selected"'; ?>><?php _e( 'День', 'inspiration' ); ?></option>
		<option value="w"<?php if ( 'w' == $instance['tcperiod'] ) echo 'selected="selected"'; ?>><?php _e( 'Неделя', 'inspiration' ); ?></option>
		<option value="m"<?php if ( 'm' == $instance['tcperiod'] ) echo 'selected="selected"'; ?>><?php _e( 'Месяц', 'inspiration' ); ?></option>
		<option value="y"<?php if ( 'y' == $instance['tcperiod'] ) echo 'selected="selected"'; ?>><?php _e( 'Год', 'inspiration' ); ?></option>
		<option value="a"<?php if ( 'a' == $instance['tcperiod'] ) echo 'selected="selected"'; ?>><?php _e( 'Показывать всех', 'inspiration' ); ?></option>
		</select>
		<br /><?php _e( 'Или укажите количество дней или период от и до:', 'inspiration' ); ?> <input style="width: 100%;" id="<?php echo $this->get_field_id( 'tcperiodnum' ); ?>" name="<?php echo $this->get_field_name( 'tcperiodnum' ); ?>" type="text" value="<?php
  	if( (int)$instance['tcperiod'] || (strpos($instance['$tcperiod'], 'and') !== false) )
   		 	echo $instance['tcperiod'];
  	?>" /><br /><small><?php _e( 'Пример:', 'inspiration' ); ?> <strong>100</strong> <?php _e( 'количество дней или', 'inspiration' ); ?> <strong>20130517 and 20130531</strong> <?php _e( 'за диапазон времени', 'inspiration' ); ?> </small></p>
		</p>

		<p>
		<label for="<?php echo $this->get_field_id( 'tccomment' ); ?>"><?php _e( 'Показывать количество комментариев?', 'inspiration' ); ?></label> 
		<select id="<?php echo $this->get_field_id( 'tccomment' ); ?>" class="widefat" name="<?php echo $this->get_field_name( 'tccomment' ); ?>">
		<option value="0"<?php if ( '0' == $instance['tccomment'] ) echo 'selected="selected"'; ?>><?php _e( 'Да', 'inspiration' ); ?></option>
		<option value="1"<?php if ( '1' == $instance['tccomment'] ) echo 'selected="selected"'; ?>><?php _e( 'Нет', 'inspiration' ); ?></option>
		</select>
		</p>	
        
        
       <p>
		   <label for="<?php echo $this->get_field_id( 'tccount' ); ?>"><?php _e( 'Количество комментаторов:', 'inspiration' ); ?></label>
		   <input type="text" name="<?php echo $this->get_field_name( 'tccount' ); ?>"  value="<?php echo $instance['tccount']; ?>" class="widefat" id="<?php echo $this->get_field_id( 'tccount' ); ?>" />
		</p>
  
        
        
        
        
        <p>
			<label for="<?php echo $this->get_field_id( 'tccol' ); ?>"><?php _e( 'Размер кнопок:', 'inspiration' ); ?></label>
			<select name="<?php echo $this->get_field_name( 'tccol' ); ?>" class="widefat" id="<?php echo $this->get_field_id( 'tccol' ); ?>">
				<option value="1"<?php selected( $instance['tccol'], '1' ); ?>><?php _e( 'Cписок', 'inspiration' ); ?></option>
				
                <option value="4"<?php selected( $instance['tccol'], '4' ); ?>><?php _e( 'Колонки', 'inspiration' ); ?></option>   		
                 				
			</select>
		</p>
        
        
        	
 

        
        
    
         <p>
		<label for="<?php echo $this->get_field_id( 'tcemail' ); ?>"><?php _e( 'Исключить комментаторов по емаил:', 'inspiration' ); ?></label>
		<input id="<?php echo $this->get_field_id( 'tcemail' ); ?>" name="<?php echo $this->get_field_name( 'tcemail' ); ?>" value="<?php echo $instance['tcemail']; ?>" style="width: 100%;" type="text" />
		<br /><small><?php _e( 'Укажите через запятую (,) email пользователей, которые не должны отображаться в Топ комментаторы, например Ваш email', 'inspiration' ); ?></small>
    </p>


		
        <?php
    }
 
} 

add_action( 'widgets_init', function(){
     register_widget( 'topcom_widget' );
});




// =============================== Recent Comments


class recent_com extends WP_Widget {
 
 
  function __construct() {
    parent::__construct(
        'recent_com', // Base ID
        __( '13 - AB - Свежие коммментарии', 'inspiration' ),
        array( 'description' => __( 'Вывод свежих комментариев с аватарами комментаторов', 'inspiration' ), )
    );
}



   function widget($args, $instance) {
       extract( $args );
       $title = apply_filters('widget_title', $instance['title'], $instance, $this->id_base );
       $number = $instance['number']; if ($number == '') $number = 5;
       
	   
       ?>

		<?php echo $before_widget; ?>
 		

        
 <?php if ( $title )
                        echo $before_title . $title . $after_title; ?>   
           

	           
				<ul class="recent_comment">
					
<?php

		$args = array('status'=>'approve', 'number'=> $number, 'post_type'=> 'post');
 	$comments = get_comments($args); ?>

	<?php foreach ($comments as $comment) { ?>
		<li>
			<?php echo get_avatar( $comment, '35' ); ?>
			<a href="<?php echo get_permalink($comment->ID); ?>#comment-<?php echo $comment->comment_ID; ?>" title="on <?php echo $comment->post_title; ?>"> <?php echo strip_tags($comment->comment_author); ?>: <?php echo wp_html_excerpt( $comment->comment_content, 55 ); ?>... </a>
		</li>
					
	<?php  } ?>		
					
                    
                </ul>
	       
				
            

        

        <?php echo $after_widget; ?>
         <?php
   }

   /*----------------------------------------
	  update()
	  ----------------------------------------
	
	* Function to update the settings from
	* the form() function.
	
	* Params:
	* - Array $new_instance
	* - Array $old_instance
	----------------------------------------*/
	
	function update( $new_instance, $old_instance ) {
		
		$instance = $old_instance;
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['number'] = intval( $new_instance['number'] );
		
				
		return $instance;
		
	} // End update()

   /*----------------------------------------
	 form()
	 ----------------------------------------
	  
	  * The form on the widget control in the
	  * widget administration area.
	  
	  * Make use of the get_field_id() and 
	  * get_field_name() function when creating
	  * your form elements. This handles the confusing stuff.
	  
	  * Params:
	  * - Array $instance
	----------------------------------------*/

   function form( $instance ) { 
   
       
		/* Set up some default widget settings. */
		$defaults = array(
						'number' => 5,
						'title' => __( 'Свежие комментарии', 'inspiration' )
											);
		
		$instance = wp_parse_args( (array) $instance, $defaults );
?>

<p>
		   <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Заголовок:', 'inspiration' ); ?></label>
		   
		   
		   <input type="text" name="<?php echo $this->get_field_name( 'title' ); ?>"  value="<?php echo $instance['title']; ?>" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>"  />
		</p>
       <p>
	       <label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e( 'Количество комментариев:', 'inspiration' ); ?>
	       <input class="widefat" id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" type="text" value="<?php echo $instance['number']; ?>" />
	       </label>
       </p>
    

<?php
	} // End form()
	
} // End Class

/*----------------------------------------
  Register the widget on `widgets_init`.
  ----------------------------------------
  
  * Registers this widget.
----------------------------------------*/





add_action( 'widgets_init', function(){
     register_widget( 'recent_com' );
});



// ==================== Ad 125x125 widget ========================

class AB_Ad125Widget extends WP_Widget {

function __construct() {
    parent::__construct(
        'AB_Ad125Widget', // Base ID
        __( '14 - AB - Рекомендую', 'inspiration' ),
        array( 'description' => __( 'Виджет для добавления баннеров 125x125.', 'inspiration' ), )
    );
}

	function widget($args, $instance) {  
		 
		$number = $instance['number']; if ($number == 0) $number = 1;
		if ($number == 0) $number = 1;
		$img_url = array();
		$dest_url = array();
		
		$numbers = range(1,$number); 
		$counter = 0;

		
		if (of_get_option('ad_rotate') == "1") {
			shuffle($numbers);
		}
		?>
<li class="widget-container"><div>
<div class="widget-title"> <?php echo of_get_option('image_header', ''); ?><span class="fold">&nbsp;</span></div>
<div class="textwidget">
<div style="text-align:center; width:100%; margin:0 auto;">
<?php
foreach ($numbers as $number) {	
$counter++;
$img_url[$counter] = of_get_option('ad_image_'.$number);
$dest_url[$counter] = of_get_option('ad_url_'.$number); ?>	
<div class="block-125"> <a rel="nofollow" href="<?php echo "$dest_url[$counter]"; ?>" target="_blank">
<img src="<?php echo "$img_url[$counter]"; ?>"  alt="<?php _e( 'Рекомендую', 'inspiration' ); ?>"  height="125" width="125" style="height:125px; width:125px;"></a></div><?php } ?></div><div style="clear:both;"></div></div></div></li>

		<?php

	}

	function update($new_instance, $old_instance) {                
		return $new_instance;
	}

	function form($instance) {   
	
	$defaults = array(
						'number' => '4'
						
						); 
     
		 $instance = wp_parse_args( (array) $instance, $defaults );
			
		?>
        <p>
            <label for="<?php echo $this->get_field_id('number'); ?>"><?php _e('Количество баннеров (1-4):','inspiration'); ?></label>
            <input type="text" name="<?php echo $this->get_field_name('number'); ?>" value="<?php echo $instance['number']; ?>" class="widefat" id="<?php echo $this->get_field_id('number'); ?>" />
        </p>
        <?php
	}
} 

register_widget('AB_Ad125Widget');


// =============================== Управление ======================================


/**
 * Управление
 */
class upravlenie extends WP_Widget {
 
  function __construct() {
    parent::__construct(
        'upravlenie', // Base ID
        __( '16 - AB - Управление', 'inspiration' ),
        array( 'description' => __( 'Виджет со ссылкой на вход в админку', 'inspiration' ), )
    );
}

 
    /** @see WP_Widget::widget -- do not rename this */
    function widget($args, $instance) {
        extract( $args );
		$title = apply_filters('widget_title', $instance['title']);

 ?>

		
     <?php echo $before_widget; ?>
                  <?php if ( $title )
                        echo $before_title . $title . $after_title; ?>         

					<ul>
			<?php wp_register();?>
			<li><?php wp_loginout(); ?></li>
			
			
			<?php wp_meta(); ?>
			</ul>		
						

         <?php echo $after_widget; ?>      

        <?php
    }
 
    /** @see WP_Widget::update -- do not rename this */
    function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);


        return $instance;
    }
 
    /** @see WP_Widget::form -- do not rename this */
    function form($instance) {
    
    
$defaults = array(
						'title' => __( 'Управление', 'inspiration' ),
						
						); 
        
       
        $instance = wp_parse_args( (array) $instance, $defaults );


        ?>
         		  <p>
          <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Заголовок:', 'inspiration'); ?></label>
          <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $instance['title']; ?>" />
        </p>
		
        <?php
    }
 
 
} 
add_action( 'widgets_init', function(){
     register_widget( 'upravlenie' );
});


// =============================== Bunner width 300 widget ======================================
class banner_widget extends WP_Widget {

	function __construct() {
		$widget_twitter_ops = array('classname' => 'banner_widget', 'description' => __('Здесь вы можете вставить код баннера на всю ширину виджета', 'inspiration'));
		$control_tiwtter_ops = array('width' => 400, 'height' => 350);
		parent::__construct('bannertext', __('15 - AB - Баннер на всю ширину', 'inspiration'), $widget_twitter_ops, $control_tiwtter_ops);
	}

	function widget( $args, $instance ) {
		extract($args);
		$twitter_title = apply_filters( 'banner_title', empty( $instance['bannertitle'] ) ? '' : $instance['bannertitle'], $instance, $this->id_base );
		$bannertext = apply_filters( 'banner_text', empty( $instance['bannertext'] ) ? '' : $instance['bannertext'], $instance );
		echo $before_widget;
		if ( !empty( $twitter_title ) ) { echo $before_title . $twitter_title . $after_title; } ?>
			<div class="textwidget full" style="text-align:center; padding-top:5px;"><?php echo  $bannertext; ?></div>
		<?php
		echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['bannertitle'] = strip_tags($new_instance['bannertitle']);
		if ( current_user_can('unfiltered_html') )
			$instance['bannertext'] =  $new_instance['bannertext'];
		else
			$instance['bannertext'] = stripslashes( wp_filter_post_kses( addslashes($new_instance['bannertext']) ) ); // wp_filter_post_kses() expects slashed
		
		return $instance;
	}

	function form( $instance ) {
	   $defaults = array(
						'bannertitle' => __( 'Баннер', 'inspiration', 'inspiration' ) );
	
		$bannertext = esc_textarea($instance['bannertext']);
		$instance = wp_parse_args( (array) $instance, $defaults );
?>
		<p><label for="<?php echo $this->get_field_id('bannertitle'); ?>"><?php _e('Заголовок:', 'inspiration'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('bannertitle'); ?>" name="<?php echo $this->get_field_name('bannertitle'); ?>" type="text" value="<?php echo $instance['bannertitle']; ?>" /></p>

		
		<?php _e( 'Максимальная ширина баннера 300px', 'inspiration' ); ?>
		<textarea class="widefat" rows="16" cols="20" id="<?php echo $this->get_field_id('bannertext'); ?>" name="<?php echo $this->get_field_name('bannertext'); ?>"><?php echo $bannertext; ?></textarea>

		
<?php
	}
}

add_action( 'widgets_init', function(){
     register_widget( 'banner_widget' );
});
// =============================== РУБРИКИ


class ab_categories extends WP_Widget {

function __construct() {
    parent::__construct(
        'ab_categories', // Base ID
        __( '18 - AB - Рубрики', 'inspiration' ), // Name
        array( 'description' => __( 'Список рубрик', 'inspiration' ), )
    );
}

    /** @see WP_Widget::widget */
    function widget($args, $instance) {	
        extract( $args );
		global $posttypes;
        $title 			= apply_filters('widget_title', $instance['title']);
       
        $count 		= $instance['count'];
        $hierarchical 		= $instance['hierarchical'];
        $linkcolor 		= $instance['linkcolor'];?>
              <?php echo $before_widget; ?>
                  <?php if ( $title )
                        echo $before_title . $title . $after_title; ?>
	<style> li.widget_ab_categories ul li a:link, li.widget_ab_categories ul li a:visited { <?php if ($linkcolor == 0) { ?>  color:#333 !important; <?php } else {'';} ?>}</style>								
 <ul style="margin-top:10px;">
 
    <?php
      // Get the category list, and tweak the output of the markup.
      $pattern = '#<li([^>]*)><a([^>]*)>(.*?)<\/a>\s*\(([0-9]*)\)\s*<\/li>#i';  // removed ( and )
      $replacement = '<li$1><a$2><span class="cat-name">$3</span><span class="cat-count">$4</span></a>'; // give cat name and count a span, wrap it all in a link

      $subject = wp_list_categories( 'echo=0&orderby=name&exclude=&title_li=&show_count='.$count.'&hierarchical='.$hierarchical.'' );    
      echo preg_replace( $pattern, $replacement, $subject );
    ?>
    </ul>




              <?php echo $after_widget; ?>
        <?php
    }

    /** @see WP_Widget::update */
    function update($new_instance, $old_instance) {		
		global $posttypes;
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);

		$instance['count'] = $new_instance['count'];
		$instance['hierarchical'] = $new_instance['hierarchical'];
		$instance['linkcolor'] = $new_instance['linkcolor'];

        return $instance;
    }

    /** @see WP_Widget::form */
    function form($instance) {	

		$defaults = array(
						'title' => __( 'Рубрики', 'inspiration' ),

						'count' => '1',
						'hierarchical' => '1',
						'linkcolor' => '0',

				);
			$instance = wp_parse_args( (array) $instance, $defaults );

      


       ?>
         <p>
          <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Заголовок:', 'inspiration'); ?></label> 
          <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $instance['title']; ?>" />
        </p>

		<p>
          <input id="<?php echo $this->get_field_id('count'); ?>" name="<?php echo $this->get_field_name('count'); ?>" type="checkbox" value="1" <?php checked( '1', $instance['count']); ?>/>
          <label for="<?php echo $this->get_field_id('count'); ?>"><?php _e('Показывать количество статей в рубрике?', 'inspiration'); ?></label> 
        </p>
        
        <p>
          <input id="<?php echo $this->get_field_id('hierarchical'); ?>" name="<?php echo $this->get_field_name('hierarchical'); ?>" type="checkbox" value="1" <?php checked( '1', $instance['hierarchical']); ?>/>
          <label for="<?php echo $this->get_field_id('hierarchical'); ?>"><?php _e('Соблюдать иерархию рубрик?', 'inspiration'); ?></label> 
        </p>
        
        
		
		<p>
		<label for="<?php echo $this->get_field_id( 'linkcolor' ); ?>"><?php _e( 'Цвет рубрик:', 'inspiration' ); ?></label>
			<select name="<?php echo $this->get_field_name( 'linkcolor' ); ?>" class="widefat" id="<?php echo $this->get_field_id( 'linkcolor' ); ?>">
				<option value="0"<?php selected( $instance['linkcolor'], '0' ); ?>><?php _e( 'Черный, при наведении как ссылки', 'inspiration' ); ?></option>
                <option value="1"<?php selected( $instance['linkcolor'], '1' ); ?>><?php _e( 'Под цвет ссылок', 'inspiration' ); ?></option>   				
			</select>
		</p>

		
        <?php 
    }


} // class utopian_recent_posts
// register Recent Posts widget

add_action( 'widgets_init', function(){
     register_widget( 'ab_categories' );
});





// ===============================Теллеграм подписка 


/**
 * Подписка на Youtube
 */
class telegram_widget extends WP_Widget {
 
   function __construct() {
    parent::__construct(
        'telegram_widget', // Base ID
        __( '19 - AB - Подписка на Телеграм', 'inspiration' ),
        array( 'description' => __( 'Блок Подписка на Телеграм', 'inspiration' ), )
    );
}

    function widget($args, $instance) {
        extract( $args );
		$title = apply_filters('widget_title', $instance['title']);
        $telegram = $instance['telegram'];

 ?>

		
     <?php echo $before_widget; ?>
                  <?php if ( $title )
                        echo $before_title . $title . $after_title; ?>  
                        
                        
 <div style="text-align:left; margin-bottom:0px !important; padding-bottom:0px !important; padding-top:5px;height: 80px;">                       
<script type="text/javascript">(function() {var script=document.createElement("script");script.type="text/javascript";script.async =true;script.src="https://telegram.im/widget-button/index.php?id=@<?php echo $telegram; ?>";document.getElementsByTagName("head")[0].appendChild(script);})();</script>
<a href="https://telegram.im/@<?php echo $telegram; ?>" target="_blank" class="telegramim_button telegramim_shadow telegram-style" style="font-size:30px;width:100%;color:#FFFFFF !important;background:#2CA5E0; border-radius:50px;" title="присоединяйтесь к телеграм"><i></i> Telegram</a>
</div>
<?php echo $after_widget; ?>      

        <?php
    }
 
    /** @see WP_Widget::update -- do not rename this */
    function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['telegram'] = strip_tags($new_instance['telegram']);
		
        return $instance;
    }
 
    /** @see WP_Widget::form -- do not rename this */
    function form($instance) {
    $defaults = array(
						'title' => __( 'Подписка на Телеграм', 'inspiration' ),
						
						); 
  $telegram = isset( $instance['telegram'] ) ? esc_attr($instance['telegram']) : '';
  $instance = wp_parse_args( (array) $instance, $defaults );
 
         ?>
         		  <p>
          <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Заголовок:', 'inspiration'); ?></label>
          <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $instance['title']; ?>" />
        </p>

 <p>
          <label for="<?php echo $this->get_field_id('telegram'); ?>"><?php _e('ID Телеграм:', 'inspiration'); ?></label>
          <input class="widefat" id="<?php echo $this->get_field_id('telegram'); ?>" name="<?php echo $this->get_field_name('telegram'); ?>" type="text" value="<?php echo $telegram; ?>" />
        </p>

		
        <?php
    }
 
} 
add_action( 'widgets_init', function(){
     register_widget( 'telegram_widget' );
});
}