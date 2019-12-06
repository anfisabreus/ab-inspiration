</div></div>
<?php 
global $sub_form_footer;
if ($sub_form_footer['ab_show_widget'] == '0' ) { ?> 
<div class="footer-form">
<?php if (function_exists('ab_sub_form_footer'))  ab_sub_form_footer();  ?>
</div>
<?php } ?>
<div class="footer-widget-box">
<?php get_sidebar('footer'); ?>
</div>
<?php if ($sub_form_footer['ab_show_widget'] == '1' ) { ?> 
<div class="footer-form">
<?php if (function_exists('ab_sub_form_footer'))  ab_sub_form_footer();  ?>
</div>
<?php } ?>
<div id="footer" role="contentinfo">
<div class="footer">
<div class="footer-mid">
<div style="clear:both;"></div>
<div style="text-align:right;margin-right:10px;vertical-align:top;"><a href="#" class="scrollupinsight"></a></div>
<div id="footermenu">
<?php if ( has_nav_menu( 'footer' ) ) { wp_nav_menu( array( 'container_class' => 'menu-footer', 'theme_location' => 'footer') ); } ?></div>
<div class="copyright"><a href="<?php echo home_url( '/' ) ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a> &copy; <?php echo date_i18n('Y', time()); ?> &nbsp;·&nbsp; <?php _e( 'Все права защищены', 'inspiration' ); ?> &nbsp;·&nbsp;
<span style="padding-top:10px;font-size:14px;"><?php _e( 'Создан на ', 'inspiration' ); ?> <a href="<?php echo of_get_option('promotion', ''); ?>" target="_blank" rel="nofollow"><?php _e( 'AB-Inspiration ', 'inspiration' ); ?></a></span>
</div>
</div>
<div class="custom-footer-text"><?php echo of_get_option('footer_text'); ?></div>
</div>
</div>
</div>
<script type="text/javascript" src="<?php bloginfo('url'); ?>/wp-content/themes/ab-inspiration/inc/js/jquery-all.js"> </script>
<?php wp_footer(); ?>
<?php global $ab_catalog;?>
<?php if (function_exists('catalog_css_style')) { ?>
<script type="text/javascript"> $(document).ready( function() {
$('#grid-container').cubeportfolio({ filters: '#filters-container', defaultFilter: '*', animationType: '<?php echo $ab_catalog['anymation_type']; ?>', gapHorizontal: 20, gapVertical: 20, gridAdjustment: 'responsive', mediaQueries: [{ width: 800, cols: <?php echo $ab_catalog['porfolio_cols']; ?> }, { width: 320, cols: 1 }], caption: '<?php echo $ab_catalog['caption_type']; ?>', displayType: 'default', displayTypeSpeed: 400, }); $(".showloadimg").show(); });</script>
<?php } ?>
<?php if (is_singular('catalog'))  { global $homepage; ?>
<?php if ('1' == get_post_meta(get_the_ID(), 'dbt_slides', true))  { ?><script> (function($) { $(window).load(function(){ $('.flexslider').flexslider({ animation: "slide", controlNav: "thumbnails", pauseOnHover: true, start: function(slider){ $('body').removeClass('loading'); } }); }); })(jQuery);	</script><?php } 
elseif ('2' == get_post_meta(get_the_ID(), 'dbt_slides', true))  { ?><script> $(window).load(function() { $('#carousel').flexslider({ animation: "slide", controlNav: false, animationLoop: false, slideshow: false, itemWidth: 110, itemMargin: 5, asNavFor: '#slider' });
$('#slider').flexslider({ animation: "slide", controlNav: false, animationLoop: false, slideshow: false, sync: "#carousel" }); });</script>	
<?php } elseif ('3' == get_post_meta(get_the_ID(), 'dbt_slides', true))  { ?><script> (function($) { $(window).load(function() { $('.flexslider').flexslider({ animation: "slide", smoothHeight: true, pauseOnHover: true, }); });  })(jQuery); </script>	<?php } else {'';} }?>
<?php if (is_page_template('template-homepage.php'))  { ?><script>  $('#otzyvy-magasin').cubeportfolio({ layoutMode: 'slider', drag: false, auto: true, autoTimeout: 3000, autoPauseOnHover: true, showNavigation: true, showPagination: false, rewindNav: true, scrollByPage: false, gridAdjustment: 'responsive', mediaQueries: [{ width: 1680, cols: 1}, { width: 1350, cols: 1 }, { width: 800, cols: 1 }, { width: 460, cols: 1 }, { width: 320, cols: 1 }], caption: '', displayType: 'default', }); </script> <?php } ?>
<?php if (is_page_template('enterpage.php') || is_singular('catalog'))  { global $homepage; ?><script>  $('#grid-container3').cubeportfolio({layoutMode: 'slider', drag: false, auto: true, autoTimeout: 5000, autoPauseOnHover: true, showNavigation: false, showPagination: true, rewindNav: true, scrollByPage: false, gridAdjustment: 'responsive', mediaQueries: [{ width: 1680, cols: 5 }, { width: 1350, cols: 4 }, { width: 800, cols: 3 }, { width: 460, cols: 2 }, { width: 320, cols: 1 }], gapHorizontal: 30, gapVertical: 30, caption: '', displayType: 'default', });
(function($, window, document, undefined) { 'use strict'; $('#grid-container2').cubeportfolio({ layoutMode: 'slider', drag: false, auto: true, autoTimeout: 5000, autoPauseOnHover: true, showNavigation: true, showPagination: false, rewindNav: false, scrollByPage: false, gridAdjustment: 'responsive', mediaQueries: [{ width: 1680, cols: 6  }, { width: 1350, cols: 5 }, { width: 800, cols: 4 }, { width: 480, cols: 2 }, { width: 320, cols: 1 }], gapHorizontal: 0, gapVertical: 25,  caption: '<?php echo $ab_catalog['caption_type']; ?>', displayType: 'lazyLoading',  displayTypeSpeed: 100, }); })(jQuery, window, document); </script>
<?php } ?>
<?php if (of_get_option('google_analytics') == !''){?>
<script>(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)})(window,document,'script','//www.google-analytics.com/analytics.js','ga'); ga('create', '<?php echo of_get_option('google_analytics');?>', 'auto'); ga('send', 'pageview');</script>
<?php }?>

<?php if (of_get_option('yandex_analytics') == !''){?>
<script type="text/javascript">(function (d, w, c) { (w[c] = w[c] || []).push(function() { try { w.yaCounter<?php echo of_get_option('yandex_analytics');?> = new Ya.Metrika({id:<?php echo of_get_option('yandex_analytics');?>, webvisor:true, clickmap:true, trackLinks:true, accurateTrackBounce:true}); } catch(e) { } }); var n = d.getElementsByTagName("script")[0], s = d.createElement("script"), f = function () { n.parentNode.insertBefore(s, n); }; s.type = "text/javascript"; s.async = true; s.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//mc.yandex.ru/metrika/watch.js"; if (w.opera == "[object Opera]") { d.addEventListener("DOMContentLoaded", f, false); } else { f(); } })(document, window, "yandex_metrika_callbacks");</script><noscript><div><img src="//mc.yandex.ru/watch/<?php echo of_get_option('yandex_analytics');?>" style="position:absolute; left:-9999px;" alt=""></div></noscript>
<?php }?>
<?php if (of_get_option('ok_ip') !== '')
{?> <script>
!function (d, id, did, st) {
  var js = d.createElement("script");
  js.src = "https://connect.ok.ru/connect.js";
  js.onload = js.onreadystatechange = function () {
  if (!this.readyState || this.readyState == "loaded" || this.readyState == "complete") {
    if (!this.executed) {
      this.executed = true;
      setTimeout(function () {onOkConnectReady()}, 0);
    }
  }}
  d.documentElement.appendChild(js);
}(document);
function onOkConnectReady() {
   OK.CONNECT.insertShareWidget("ok_shareWidget1","<?php the_permalink()?>","{width:75,height:65,st:\'rounded\',sz:20,ck:1,vt:\'1\'}");
   OK.CONNECT.insertShareWidget("ok_shareWidget2","<?php the_permalink()?>","{width:190,height:30,st:'rounded',sz:20,ck:2}");
   OK.CONNECT.insertGroupWidget("ok_group_widget","<?php echo of_get_option('ok_ip');  ?>","{width:300,height:335}");
}
</script>
<?php } ?>
<?php if (is_singular()) {
if (of_get_option('comments_tabber') !== '3' && of_get_option('vk_app') !== '')  { ?>
<script type="text/javascript">VK.init({apiId: <?php echo of_get_option('vk_app');?>, onlyWidgets: true});</script>
<script type="text/javascript">VK.Widgets.Comments("vk_comments", {limit: 20, width: "auto", attach: "*"});</script>
<?php } } ?>
<?php if ($homepage['hp_text_animation'] == 1) { ?>
<script>  $('.katalog-buttons, .firstpost, .secondpost, .heading-title1,.heading-title2,.heading-title3,.heading-title4, .heading-title5, .heading-title6, .post-font1 ol li, .post-font2 ol li,.post-font3 ol li,.post-font1 ul li, .post-font2 ul li,.post-font3 ul li,.entry-title1, .entry-title2, .entry-title3, .entry-title4,.entry-title6, .homepage-image1,  .homepage-image2, .homepage-image3, .post-font1, .post-font2, .post-font3, .readmore1, .readmore2, .readmore3,.readmore4,.readmore5,.readmore6,  .testimonials-animation, .katalog-enterpage, .cbp-l-grid-projects-title, .cbp-l-grid-projects-desc, .homepage-icon1, .homepage-icon2, .homepage-icon3').waypoint(function(){ $(this).addClass('fadeInUp animated'); }, { offset: '100%' });</script><?php } ?><?php 
$license 	= get_option( 'edd_scroll_license_key' );
$status 	= get_option( 'edd_scroll_license_status' );
if ($status !== false && $status == 'valid' ) {  
global $ab_scroll_to_top; ?>
<script type="text/javascript"> 
$(document).ready(function(){ 
$('.scrollup').each(function(){ 
$(this).replaceWith( '<br><a href="#" class="scrollup" style="color:<?php echo $ab_scroll_to_top['ab_scroll_text_color'];?> !important; "><?php echo $ab_scroll_to_top['ab_scroll_custom_text'];?></a>' ); }); $(window).scroll(function(){ if ($(this).scrollTop() > 100) { $('.scrollup').fadeIn(); } else { $('.scrollup').fadeOut(); } }); $('.scrollup').click(function(){ $("html, body").animate({ scrollTop: 0 }, 600); return false; }); }); </script>
<?php } ?>
<script type="text/javascript"> 
	$(document).ready(function() { 
		var starting_position = $('#header').outerHeight( true ) 
		$(window).scroll(function() { 
			var yPos = ( $(window).scrollTop() ); 
			if( yPos > starting_position && window.innerWidth > 500 ) { 
				$("#floatmenu").fadeIn(300); 
				} 
				else { 
					$("#floatmenu").fadeOut(300); 
					} 
					}); 
					}); 
					</script>
<script> $(function() { $( "#tabs" ).tabs(); }); </script>
<script type="text/javascript"> $(document).ready(function(){ $('.scrollupinsight').each(function(){ $(this).replaceWith( '<br><a href="#" class="scrollupinsight" style=" "></a>' ); }); $(window).scroll(function(){ if ($(this).scrollTop() > 100) { $('.scrollupinsight').fadeIn(); } else { $('.scrollupinsight').fadeOut(); } }); $('.scrollupinsight').click(function(){ $("html, body").animate({ scrollTop: 0 }, 800); return false; }); }); </script>
<script type="text/javascript">$(document).ready(function() {
	
$('.gallery').each(function(i){
    var newID=$(this).attr('id');
    $(this).find( "a" ).attr("rel",newID);
    $(this).find( "a" ).attr('class', 'fancybox');
    });
    
$('.wp-block-gallery').each(function(i){  	
	$('.wp-block-gallery').attr('id', 'group') + i;	
	var newID=$(this).attr('id') + i;
	 $(this).attr("id",newID);	 
	  $(this).find( "a" ).attr("rel",newID);
      $(this).find( "a" ).attr("class",'fancybox');
    });

$("a.group").fancybox({'nextEffect'	:	'fade','prevEffect'	:	'fade','overlayOpacity' :  0.8,'overlayColor' : '#000000','arrows' : true,'openEffect'	: 'elastic','closeEffect'	: 'elastic',});});</script>
<script type="text/javascript"> $(document).ready(function() { $(".fancybox").fancybox({ helpers: { title: { type: 'over' } }, beforeShow: function () { this.title = $(this.element).find("img").attr("alt"); }, iframe: { preload: false }, margin: [20, 60, 20, 60]});});</script>
<script type="text/javascript"> $(document).ready(function() {
$('a[rel^="attachment"]').attr('class', 'fancybox');
$('a[rel^="fancybox"]').attr('class', 'fancybox');
$('.wp-block-image a').attr('class', 'fancybox');

	
	});</script>
<script type="text/javascript"> $(document).ready(function() { $('.woocommerce ul.products li.product a').wrap('<div class="img-wrap"></div>');
});</script>
<script type="text/javascript">  jQuery('.woocommerce ul.products li.product a img').wrap('<div class="img-wrap-image"></div>');</script>

<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "100%";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}
</script>

<script>
jQuery('.dropdown-toggle').on('click', function (e) {
  $(this).next().toggle();
});
jQuery('.dropdown-menu.keep-open').on('click', function (e) {
  e.stopPropagation();
});

if(1) {
  $('body').attr('tabindex', '0');
}
else {
  alertify.confirm().set({'reverseButtons': true});
  alertify.prompt().set({'reverseButtons': true});
} </script>

</body>
</html>