<?php 
if (get_locale() == 'ru_RU') 
{
//Russian date
function ab_the_russian_time($tdate = '') {
	if ( substr_count($tdate , '---') > 0 ) return str_replace('---', '', $tdate);

	$treplace = array (
	"Январь" => "января",
	"Февраль" => "февраля",
	"Март" => "марта",
	"Апрель" => "апреля",
	"Май" => "мая",
	"Июнь" => "июня",
	"Июль" => "июля",
	"Август" => "августа",
	"Сентябрь" => "сентября",
	"Октябрь" => "октября",
	"Ноябрь" => "ноября",
	"Декабрь" => "декабря",
	
	"January" => "января",
	"February" => "февраля",
	"March" => "марта",
	"April" => "апреля",
	"May" => "мая",
	"June" => "июня",
	"July" => "июля",
	"August" => "августа",
	"September" => "сентября",
	"October" => "октября",
	"November" => "ноября",
	"December" => "декабря",	
	
	"Sunday" => "воскресенье",
	"Monday" => "понедельник",
	"Tuesday" => "вторник",
	"Wednesday" => "среда",
	"Thursday" => "четверг",
	"Friday" => "пятница",
	"Saturday" => "суббота",
	
	"Sun" => "воскресенье",
	"Mon" => "понедельник",
	"Tue" => "вторник",
	"Wed" => "среда",
	"Thu" => "четверг",
	"Fri" => "пятница",
	"Sat" => "суббота",
	
	"th" => "",
	"st" => "",
	"nd" => "",
	"rd" => ""

	);
   	return strtr($tdate, $treplace);
}

add_filter('the_time', 'ab_the_russian_time');
add_filter('get_comment_date', 'ab_the_russian_time');
add_filter('the_modified_time', 'ab_the_russian_time');
add_filter('the_date', 'ab_the_russian_time');
add_filter('get_the_date', 'ab_the_russian_time');
add_filter('get_the_time', 'ab_the_russian_time');

}

//Russian Comments
function ab_russify_comments_number($zero = false, $one = false, $more = false, $deprecated = '') {
	global $id;
	$number = get_comments_number($id);
	
	if ($number == 0) {
		$output = __('Комментариев нет', 'inspiration');
	} elseif ($number == 1) {
		$output = __('Один комментарий', 'inspiration');
	} elseif (($number > 20) && (($number % 10) == 1)) {
		$output = str_replace('%', $number, __('% комментарий', 'inspiration'));
	} elseif ((($number >= 2) && ($number <= 4)) || ((($number % 10) >= 2) && (($number % 10) <= 4)) && ($number > 20)) {
		$output = str_replace('%', $number,  __('% комментария', 'inspiration'));
	} else {
		$output = str_replace('%', $number, __('% комментариев', 'inspiration'));
	}
	echo apply_filters('russify_comments_number', $output, $number);
}

add_filter('comments_number', 'ab_russify_comments_number');
	
//rustolat

$gost = array(
   "Є"=>"EH","І"=>"I","і"=>"i","№"=>"#","є"=>"eh",
   "А"=>"A","Б"=>"B","В"=>"V","Г"=>"G","Д"=>"D",
   "Е"=>"E","Ё"=>"JO","Ж"=>"ZH",
   "З"=>"Z","И"=>"I","Й"=>"JJ","К"=>"K","Л"=>"L",
   "М"=>"M","Н"=>"N","О"=>"O","П"=>"P","Р"=>"R",
   "С"=>"S","Т"=>"T","У"=>"U","Ф"=>"F","Х"=>"KH",
   "Ц"=>"C","Ч"=>"CH","Ш"=>"SH","Щ"=>"SHH","Ъ"=>"'",
   "Ы"=>"Y","Ь"=>"","Э"=>"EH","Ю"=>"YU","Я"=>"YA",
   "а"=>"a","б"=>"b","в"=>"v","г"=>"g","д"=>"d",
   "е"=>"e","ё"=>"jo","ж"=>"zh",
   "з"=>"z","и"=>"i","й"=>"jj","к"=>"k","л"=>"l",
   "м"=>"m","н"=>"n","о"=>"o","п"=>"p","р"=>"r",
   "с"=>"s","т"=>"t","у"=>"u","ф"=>"f","х"=>"kh",
   "ц"=>"c","ч"=>"ch","ш"=>"sh","щ"=>"shh","ъ"=>"",
   "ы"=>"y","ь"=>"","э"=>"eh","ю"=>"yu","я"=>"ya","«"=>"","»"=>"","—"=>"-"
  );

$iso = array(
   "Є"=>"YE","І"=>"I","Ѓ"=>"G","і"=>"i","№"=>"#","є"=>"ye","ѓ"=>"g",
   "А"=>"A","Б"=>"B","В"=>"V","Г"=>"G","Д"=>"D",
   "Е"=>"E","Ё"=>"YO","Ж"=>"ZH",
   "З"=>"Z","И"=>"I","Й"=>"J","К"=>"K","Л"=>"L",
   "М"=>"M","Н"=>"N","О"=>"O","П"=>"P","Р"=>"R",
   "С"=>"S","Т"=>"T","У"=>"U","Ф"=>"F","Х"=>"X",
   "Ц"=>"C","Ч"=>"CH","Ш"=>"SH","Щ"=>"SHH","Ъ"=>"'",
   "Ы"=>"Y","Ь"=>"","Э"=>"E","Ю"=>"YU","Я"=>"YA",
   "а"=>"a","б"=>"b","в"=>"v","г"=>"g","д"=>"d",
   "е"=>"e","ё"=>"yo","ж"=>"zh",
   "з"=>"z","и"=>"i","й"=>"j","к"=>"k","л"=>"l",
   "м"=>"m","н"=>"n","о"=>"o","п"=>"p","р"=>"r",
   "с"=>"s","т"=>"t","у"=>"u","ф"=>"f","х"=>"x",
   "ц"=>"c","ч"=>"ch","ш"=>"sh","щ"=>"shh","ъ"=>"",
   "ы"=>"y","ь"=>"","э"=>"e","ю"=>"yu","я"=>"ya","«"=>"","»"=>"","—"=>"-"
  );
 
function ab_sanitize_title_with_translit($title) {
	global $gost, $iso;
	$ab_rtl_standard = get_option('ab_rtl_standard');
	switch ($ab_rtl_standard) {
		case 'off':
		    return $title;		
		case 'gost':
		    return strtr($title, $gost);
		default: 
		    return strtr($title, $iso);
	}
}

function ab_rtl_options_page() {
?>
<div class="wrap">
	<h2>Настройки RusToLat</h2>
	<p>Вы можете выбрать стандарт, по которому будет производится транслитерация заголовков.</p>
	<?php
	if($_POST['ab_rtl_standard']) {
		// set the post formatting options
		update_option('ab_rtl_standard', $_POST['ab_rtl_standard']);
		echo '<div class="updated"><p>Настройки обновлены.</p></div>';
	}
	?>

	<form method="post">
	<fieldset class="options">
		<legend>Производить транслитерацию в стандарте:</legend>
		<?php
		$ab_rtl_standard = get_option('ab_rtl_standard');
		?>
			<select name="ab_rtl_standard">
				<option value="off"<?php if($ab_rtl_standard == 'off'){ echo(' selected="selected"'); } ?>>Отключена</option>
				<option value="gost"<?php if($ab_rtl_standard == 'gost'){ echo(' selected="selected"'); } ?>>ГОСТ 16876-71</option>
        <option value="iso"<?php if($ab_rtl_standard == 'iso' OR $ab_rtl_standard == ''){ echo(' selected="selected"'); } ?>>ISO 9-95</option>        								
			</select>

			<input type="submit" value="Изменить стандарт" />

	</fieldset>
	</form>
</div>
<?php
}

function ab_rtl_add_menu() {
		add_options_page('RusToLat', 'RusToLat', __FILE__, 'ab_rtl_options_page');
}

add_action('admin_menu', 'ab_rtl_add_menu');
add_action('sanitize_title', 'ab_sanitize_title_with_translit', 0);




//auto more



function ab_auto_more(&$aquery) {

 if (is_admin() || is_singular() || is_feed() || is_404()) return @$aposts;
 if (of_get_option('auto_more_switch') == '1')  return @$aposts; 

 $aoffset =   of_get_option('auto_more_kolvo', '');   

 $abreakpoints = array ("<p" => 0, "</p>" => 4, "<br" => 0, "\x0D\x0A\x0D\x0A" => 0, "\x0A\x0A" => 0,
      "<table" => 0, "</table" => 8, "<ul" => 0, "</ul>" => 5, "<h" => 0 , "</h" => 5 );

 $aposts = $aquery->posts;
 for ($ai=0;$ai<count($aposts);$ai++) {
	if ($aposts[$ai]->post_excerpt) {
		$aposts[$ai]->post_content = $aposts[$ai]->post_excerpt."\n<!--more-->";
	}
	elseif ((strpos($aposts[$ai]->post_content, '<!--more') === false)
	 and (strpos($aposts[$ai]->post_content, '<!--nomore') === false))  {

	      $ap = mb_strlen($aposts[$ai]->post_content) ;
	      if ($ap > $aoffset) {
	      	foreach ($abreakpoints as $abrp => $ao2) {
				if ($ap1 = mb_strpos(mb_strtolower($aposts[$ai]->post_content),$abrp,$aoffset)) {
					if ($ap > $ap1 + $ao2) $ap = $ap1 + $ao2;
				}
			}
			if ($ap < mb_strlen($aposts[$ai]->post_content)) {
				$aposts[$ai]->post_content = force_balance_tags(mb_substr($aposts[$ai]->post_content,0,$ap))."\n<!--more-->";
				}
         }     
         }
  }
  return $aposts;
}

add_action('loop_start', 'ab_auto_more');

// Похожие записи с миниатюрами по меткам

 
function related_posts_thumbnails_tags( $post = '' )
{
$tag_post = $post;
global $post;
$tags = wp_get_post_tags( $post->ID );
if ( $tags ) {
$tag_ids = array();
foreach( $tags as $individual_tag ) $tag_ids[] = $individual_tag->term_id;
$args = array(
'tag__in' => $tag_ids,
'post__not_in' => array($post->ID),
'posts_per_page' => 3, // Number of related posts that will be shown.
'caller_get_posts' => 1,
'orderby' => 'rand' // Randomize the posts
);
$my_query = new WP_Query( $args );
if( $my_query->have_posts() ) {

echo '<div id="related_posts" class="clear"><div style="font-weight:500;font-size:20px;padding-bottom: 10px;padding-top: 10px;">'. __( 'Похожие записи:', 'inspiration' ) .' </div><ul>';

while( $my_query->have_posts() ) {
$my_query->the_post(); ?>

<li><div class="relatedthumb">

<?php if( has_post_thumbnail( $post_id )) { $feat_image_url = wp_get_attachment_url( get_post_thumbnail_id() );  ?>
 <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>"><div class="related_image" style="background-image: url(<?php echo $feat_image_url; ?> ); background-size:cover; background-position:center">
</div></a><?php } ?>
 

 <div class="related_content">
 <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>" style="font-size:16px; color:#000;"><?php the_title(); ?></a>
 </div>
</li>
<?php  }
echo '</ul></div>';
}
}
$post = $tag_post;
wp_reset_query(); 
}



// Похожие записи с миниатюрами по рубрикам


function related_posts_thumbnails_tags_one( $post = '' )
{

$orig_post = $post;

global $post;

$categories = get_the_category( $post->ID );
if ( $categories ) {
$category_ids = array();
foreach( $categories as $individual_category ) $category_ids[] = $individual_category->term_id;
$args = array(
'category__in' => $category_ids,
'post__not_in' => array($post->ID),
'posts_per_page' => 3, // Number of related posts that will be displayed.
'ignore_sticky_posts' => 1,
'orderby' => 'rand' // Randomize the posts
);
$my_query = new WP_Query( $args );
if( $my_query->have_posts() ) {
echo '<div id="related_posts" class="clear"><div style="font-weight:500;font-size:20px;padding-bottom: 10px;padding-top: 10px;"> '. __( 'Похожие записи:', 'inspiration' ) .' </div><ul>';
while( $my_query->have_posts() ) {
$my_query->the_post(); ?>
<li><div class="relatedthumb">
<?php if( has_post_thumbnail( $post_id )) { $feat_image_url = wp_get_attachment_url( get_post_thumbnail_id() );  ?>
 <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>"><div class="related_image" style="background-image: url(<?php echo $feat_image_url; ?> ); background-size:cover; background-position:center">
</div></a><?php } ?>
 

 <div class="related_content">
 <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>" style="font-size:16px; color:#000;"><?php the_title(); ?></a>
 </div>
</li>

<?php }
 echo '</ul></div>';
} }
$post = $orig_post;
wp_reset_query();
}






// Постраничная навигация

function round_num($num, $to_nearest) {
     return floor($num/$to_nearest)*$to_nearest;
}
 
/* Function that performs a Boxed Style Numbered Pagination (also called Page Navigation).
   Function is largely based on Version 2.4 of the WP-PageNavi plugin */
function pagenavi($before = '', $after = '') {
    global $wpdb, $wp_query;
    $pagenavi_options = array();
    $pagenavi_options['current_text'] = '%PAGE_NUMBER%';
    $pagenavi_options['page_text'] = '%PAGE_NUMBER%';
    $pagenavi_options['first_text'] = ('Первая страница');
    $pagenavi_options['last_text'] = ('Последняя страница');
    $pagenavi_options['next_text'] =  __('Следующая &raquo;', 'inspiration');
    $pagenavi_options['prev_text'] = __('&laquo; Предыдущая', 'inspiration');
    $pagenavi_options['dotright_text'] = '...';
    $pagenavi_options['dotleft_text'] = '...';
    $pagenavi_options['num_pages'] = 3; //continuous block of page numbers
    $pagenavi_options['always_show'] = 0;
    $pagenavi_options['num_larger_page_numbers'] = 0;
    $pagenavi_options['larger_page_numbers_multiple'] = 5;
 
    //If NOT a single Post is being displayed
    /*http://codex.wordpress.org/Function_Reference/is_single)*/
    if (!is_single()) {
        $request = $wp_query->request;
        //intval — Get the integer value of a variable
        /*http://php.net/manual/en/function.intval.php*/
        $posts_per_page = intval(get_query_var('posts_per_page'));
        //Retrieve variable in the WP_Query class.
        /*http://codex.wordpress.org/Function_Reference/get_query_var*/
        $paged = intval(get_query_var('paged'));
        $numposts = $wp_query->found_posts;
        $max_page = $wp_query->max_num_pages;
 
        //empty — Determine whether a variable is empty
        /*http://php.net/manual/en/function.empty.php*/
        if(empty($paged) || $paged == 0) {
            $paged = 1;
        }
 
        $pages_to_show = intval($pagenavi_options['num_pages']);
        $larger_page_to_show = intval($pagenavi_options['num_larger_page_numbers']);
        $larger_page_multiple = intval($pagenavi_options['larger_page_numbers_multiple']);
        $pages_to_show_minus_1 = $pages_to_show - 1;
        $half_page_start = floor($pages_to_show_minus_1/2);
        //ceil — Round fractions up (http://us2.php.net/manual/en/function.ceil.php)
        $half_page_end = ceil($pages_to_show_minus_1/2);
        $start_page = $paged - $half_page_start;
 
        if($start_page <= 0) {
            $start_page = 1;
        }
 
        $end_page = $paged + $half_page_end;
        if(($end_page - $start_page) != $pages_to_show_minus_1) {
            $end_page = $start_page + $pages_to_show_minus_1;
        }
        if($end_page > $max_page) {
            $start_page = $max_page - $pages_to_show_minus_1;
            $end_page = $max_page;
        }
        if($start_page <= 0) {
            $start_page = 1;
        }
 
        $larger_per_page = $larger_page_to_show*$larger_page_multiple;
        //round_num() custom function - Rounds To The Nearest Value.
        $larger_start_page_start = (round_num($start_page, 10) + $larger_page_multiple) - $larger_per_page;
        $larger_start_page_end = round_num($start_page, 10) + $larger_page_multiple;
        $larger_end_page_start = round_num($end_page, 10) + $larger_page_multiple;
        $larger_end_page_end = round_num($end_page, 10) + ($larger_per_page);
 
        if($larger_start_page_end - $larger_page_multiple == $start_page) {
            $larger_start_page_start = $larger_start_page_start - $larger_page_multiple;
            $larger_start_page_end = $larger_start_page_end - $larger_page_multiple;
        }
        if($larger_start_page_start <= 0) {
            $larger_start_page_start = $larger_page_multiple;
        }
        if($larger_start_page_end > $max_page) {
            $larger_start_page_end = $max_page;
        }
        if($larger_end_page_end > $max_page) {
            $larger_end_page_end = $max_page;
        }
        if($max_page > 1 || intval($pagenavi_options['always_show']) == 1) {
            /*http://php.net/manual/en/function.str-replace.php */
            /*number_format_i18n(): Converts integer number to format based on locale (wp-includes/functions.php*/
         
            echo $before.'<div class="pagenavi">'."\n";
 
            if(!empty($pages_text)) {
                echo '';
            }
            //Displays a link to the previous post which exists in chronological order from the current post.
            /*http://codex.wordpress.org/Function_Reference/previous_post_link*/
            previous_posts_link($pagenavi_options['prev_text']);
 
            if ($start_page >= 2 && $pages_to_show < $max_page) {
                $first_page_text = str_replace("%TOTAL_PAGES%", number_format_i18n($max_page), $pagenavi_options['first_text']);
                //esc_url(): Encodes < > & " ' (less than, greater than, ampersand, double quote, single quote).
                /*http://codex.wordpress.org/Data_Validation*/
                //get_pagenum_link():(wp-includes/link-template.php)-Retrieve get links for page numbers.
                echo '<a href="'.esc_url(get_pagenum_link()).'" class="first" title="'.$first_page_text.'">1</a>';
                if(!empty($pagenavi_options['dotleft_text'])) {
                    echo '<span class="expand">'.$pagenavi_options['dotleft_text'].'</span>';
                }
            }
 
            if($larger_page_to_show > 0 && $larger_start_page_start > 0 && $larger_start_page_end <= $max_page) {
                for($i = $larger_start_page_start; $i < $larger_start_page_end; $i+=$larger_page_multiple) {
                    $page_text = str_replace("%PAGE_NUMBER%", number_format_i18n($i), $pagenavi_options['page_text']);
                    echo '<a href="'.esc_url(get_pagenum_link($i)).'" class="single_page" title="'.$page_text.'">'.$page_text.'</a>';
                }
            }
 
            for($i = $start_page; $i  <= $end_page; $i++) {
                if($i == $paged) {
                    $current_page_text = str_replace("%PAGE_NUMBER%", number_format_i18n($i), $pagenavi_options['current_text']);
                    echo '<span class="current">'.$current_page_text.'</span>';
                } else {
                    $page_text = str_replace("%PAGE_NUMBER%", number_format_i18n($i), $pagenavi_options['page_text']);
                    echo '<a href="'.esc_url(get_pagenum_link($i)).'" class="single_page" title="'.$page_text.'">'.$page_text.'</a>';
                }
            }
 
            if ($end_page < $max_page) {
                if(!empty($pagenavi_options['dotright_text'])) {
                    echo '<span class="expand">'.$pagenavi_options['dotright_text'].'</span>';
                }
                $last_page_text = str_replace("%TOTAL_PAGES%", number_format_i18n($max_page), $pagenavi_options['last_text']);
                echo '<a href="'.esc_url(get_pagenum_link($max_page)).'" class="last" title="'.$last_page_text.'">'.$max_page.'</a>';
            }
            next_posts_link($pagenavi_options['next_text'], $max_page);
 
            if($larger_page_to_show > 0 && $larger_end_page_start < $max_page) {
                for($i = $larger_end_page_start; $i <= $larger_end_page_end; $i+=$larger_page_multiple) {
                    $page_text = str_replace("%PAGE_NUMBER%", number_format_i18n($i), $pagenavi_options['page_text']);
                    echo '<a href="'.esc_url(get_pagenum_link($i)).'" class="single_page" title="'.$page_text.'">'.$page_text.'</a>';
                }
            }
            echo '</div>'.$after."\n";
        }
    }
}

add_action('admin_init','optionscheck_change_santiziation', 100);

function optionscheck_change_santiziation() {
remove_filter( 'of_sanitize_textarea', 'of_sanitize_textarea' );
add_filter( 'of_sanitize_textarea', 'of_sanitize_textarea_custom' );

}

function of_sanitize_textarea_custom($input) {
global $allowedposttags;
$of_custom_allowedposttags["embed"] = array(
"src" => array(),
"type" => array(),
"allowfullscreen" => array(),
"allowscriptaccess" => array(),
"height" => array(),
"width" => array()
);
$of_custom_allowedposttags["noscript"] = array();
$of_custom_allowedposttags["script"] = array(
"src" => array(),
"type" => array(),
"onclick" => array(),
"style" => array()
);

$of_custom_allowedposttags["meta"] = array(
"name" => array(),
"content" => array()
);

$of_custom_allowedposttags["table"] = array(
);

$of_custom_allowedposttags["tr"] = array(
);

$of_custom_allowedposttags["td"] = array(
);

$of_custom_allowedposttags["form"] = array(
"name" => array(),
"target" => array(),
"action" => array(),
"method" => array(),
"onsubmit" => array()
);
$of_custom_allowedposttags["input"] = array(
"name" => array(),
"type" => array(),
"value" => array()

);
$of_custom_allowedposttags["img"] = array(
"src" => array(),
"style" => array(),
"alt" => array(),
"title" => array(),
"onclick" => array()
);

$of_custom_allowedposttags["a"] = array(
"target" => array()

);


$of_custom_allowedposttags = array_merge($of_custom_allowedposttags, $allowedposttags);
$output = wp_kses( $input, $of_custom_allowedposttags);
return $output;
}


function of_sanitize_desc_custom ($input) {
global $allowedposttags;
$of_desc_allowedposttags["target"] = array(
"_blank" => array()
);

$of_desc_allowedposttags = array_merge($of_desc_allowedposttags, $allowedposttags);
$output = wp_kses( $input, $of_desc_allowedposttags);
return $output;
}

//Смайлы в конце статьи

if( stristr($_SERVER['REQUEST_URI'], 'inc/qipsmiles/qips-js.php') ) {
	global $qips_conf;	
	include(dirname(__FILE__). '/inc/qipsmiles/qips-js.php');
	die(); exit;
}	

function qips_insert() {	
	global $qips_conf, $smiles_array, $main_smiles_array;	
	// Directories
	$qips_conf['dir_srv_smiles'] 		= dirname(__FILE__). '/inc/qipsmiles/smiles';
	$qips_conf['dir_www_smiles'] 		= get_option('siteurl'). '/wp-content/themes/ab-inspiration/inc/qipsmiles/smiles';
	$qips_conf['dir_www_plugin'] 		= get_option('siteurl'). '/wp-content/themes/ab-inspiration/inc/qipsmiles';
	
	include(dirname(__FILE__). '/inc/qipsmiles/qips-functions.php');		
	
	if(@include (dirname(__FILE__).'/inc/qipsmiles/smiles/package.php')) {
		define('SMILES_INCLUDED_INSERT', true);
	}
	else {
		define('SMILES_INCLUDED_INSERT', false);
	}
	
	if(SMILES_INCLUDED_INSERT) {
		add_filter('the_content', 'qips_replace_smiles_insert'); 
		add_filter('comment_text', 'qips_replace_smiles_insert'); 
	}
	elseif(!SMILES_INCLUDED_INSERT) {
		header('Location: '. $_SERVER['REQUEST_URI']);			
	}
	//add_action('wp_footer', 'qips_javascript');
}

function qips_replace_smiles_insert($text)	{
	global $qips_conf, $smiles_array, $main_smiles_array;
	$smile_insert = "";
	foreach ($smiles_array as $title => $imgsrc) {
		$smiles_S[] = '/(\s|^)'.preg_quote($title, '/').'(\s|$)/';
		$smiles_masked = htmlspecialchars(trim($title), ENT_QUOTES);
		$smiles_R[] = ' <img src="'. $qips_conf['dir_www_smiles']. '/'. $imgsrc. '"  alt="'. $smiles_masked. '" title="'. $smiles_masked. '"> ';
	}
	foreach ($main_smiles_array as $title => $imgsrc) {
		$smiles_S[] = '/(\s|^)'.preg_quote($title, '/').'(\s|$)/';
		$smiles_masked = htmlspecialchars(trim($title), ENT_QUOTES);
		$smiles_R[] = ' <img src="'. $qips_conf['dir_www_smiles']. '/'. $imgsrc. '"  alt="'. $smiles_masked. '" title="'. $smiles_masked. '"> ';
	}

	$textarr = preg_split("/(<.*>)/U", $text, -1, PREG_SPLIT_DELIM_CAPTURE); 
	$stop = count($textarr);
	for ($i = 0; $i < $stop; $i++) {
		$content = $textarr[$i];
		if ((strlen($content) > 0) && ('<' != $content{0})) 
		{ 
			$content = preg_replace($smiles_S, $smiles_R, $content);
		}
		
		$smile_insert .= $content;
	}
	return $smile_insert;
}

function qipsmiles_insert($lang = 'en') {
	global $qips_conf, $qips_options, $wpsmiliestrans, $smiles_array, $main_smiles_array;		
	
	$qips_conf['more'] 		= $lang == 'ru' ? __('Еще смайлы', 'inspiration') : 'More smiles';
	
	echo '<div id="qips_smiles">'. "\r\n";	
	echo qips_build_smile_images_insert($main_smiles_array);
	echo '<small><a style="text-decoration: none; border-bottom: 1px dashed; top: -5px; position: relative; margin-left: 3px;" href="javascript:void(0);" id="qips_button_smiles" title="'.$qips_conf['more'].'">'.$qips_conf['more'].'</a></small>';
	echo "</div>\r\n";	

	$qips_display = !SMILES_INCLUDED_INSERT ? 'block' : 'none';
	echo '<div id="qips_smiles_toggle_wrapper" style="display: '. $qips_display. ';">'. "\r\n";
	
	if(!SMILES_INCLUDED_INSERT) {
		echo '<p style="padding: 5px; background: yellow; color: red;"><strong>Error:</strong> Could not load <em><strong>package</strong></em>. Does it exist in <em><strong>'. str_replace('//'. $_SERVER['HTTP_HOST'], '', $qips_conf['dir_www_smiles']). '/</strong></em> ?</p>';
	}
	else {		
		echo qips_build_smile_images_insert($smiles_array);
	}
	echo "</div>\r\n";	
	qips_javascript_insert();
}

add_action('init', 'qips_insert');



remove_action( 'wp_head', 'wp_no_robots' );

function abinspiration_noindex_links() {
	global $post;
	if (is_paged() || is_search() || $post->post_type == 'testimonial') {
	
echo "<meta name='robots' content='noindex,follow' />\n"; }	
}
add_action( 'wp_head', 'abinspiration_noindex_links' ); 


function abinspiration_replytocom_robots() {
echo "<meta name='robots' content='noindex,nofollow' />\n";
}
if ( isset( $_GET['replytocom'] ) )
add_action( 'wp_head', 'abinspiration_replytocom_robots' );


function abinspiration_image_rss($content) { 
global $post; 
if ( has_post_thumbnail( $post->ID ) ) { 
$content = '' . get_the_post_thumbnail( $post->ID, 'full', array( 'style' => 'float:left; margin:0 10px 10px 0;' ) ) . '' . $content; 
}
return $content; 
} 
add_filter('the_excerpt_rss', 'abinspiration_image_rss');



foreach ( array( 'pre_term_description' ) as $filter ) {
    remove_filter( $filter, 'wp_filter_kses' );
}
 
foreach ( array( 'term_description' ) as $filter ) {
    remove_filter( $filter, 'wp_kses_data' );
}


/**
 * Social Likes top
 */
	function social_likes()
	{ 
	    
	    $counter = ( of_get_option('share_counters') == '1')   ? 'yes' : 'no';

	 

        ?>
        
       

	    <div style="padding-top:15px; <?php echo $alignment; ?><?php if ( of_get_option('share_skin') == '2') { ?> margin-bottom:0px; <?php } ?>" class="social-likes" data-url="<?php the_permalink(); ?>" data-title="<?php the_title(); ?>">
	    	<?php	    	
	    	
if ( of_get_option('show_share_buttons') ['facebook'] == '1' ) { echo '<div data-service="facebook" title="'. __( 'Поделиться в Facebook', 'inspiration' ) .'">'. of_get_option('text_facebook') .' </div>'; }
if ( of_get_option('show_share_buttons') ['twitter'] == '1' ) { echo '<div data-service="twitter" title="'. __( 'Поделиться в Twitter', 'inspiration' ) .'"  data-via="'. of_get_option('twitter').'">'. of_get_option('text_twitter') .'</div>'; }

if ( of_get_option('show_share_buttons') ['telegram'] == '1' ) { echo '<div data-service="telegram" title="'. __( 'Поделиться в Telegram', 'inspiration' ) .'">'. of_get_option('text_telegram') .'</div>'; }
if ( of_get_option('show_share_buttons') ['vk'] == '1' ) { echo '<div data-service="vkontakte" title="'. __( 'Поделиться в Vkontakte', 'inspiration' ) .'">'. of_get_option('text_vkontakte') .'</div>'; }

if ( of_get_option('show_share_buttons') ['ok'] == '1' ) { echo '<div data-service="odnoklassniki" title="'. __( 'Поделиться в Odnoklassniki', 'inspiration' ) .'">'. of_get_option('text_odnoklassniki') .'</div>'; }

if ( of_get_option('show_share_buttons') ['pinterest'] == '1' ) { echo '<div data-service="pinterest" data-media="' . get_the_post_thumbnail_url( $post->ID, 'thumbnail' ) . '" title="'. __( 'Поделиться в Pinterest', 'inspiration' ) .'">'. of_get_option('text_pinterest') .'</div>'; }
if ( of_get_option('show_share_buttons') ['linkedin'] == '1' ) { echo '<div data-service="linkedin" title="'. __( 'Поделиться в Linkedin', 'inspiration' ) .'">'. of_get_option('text_linkedin') .'</div>'; }



 ?></div>
<?php } 

/**
 * Social Likes bottom
 */
	function social_likes_bottom()
	{ 
	    
	    $counter = ( of_get_option('share_counters_bottom') == '1')   ? 'yes' : 'no';

	
	    

        ?>
<div class="buttonsinvite">
<div class="heading"><?php echo of_get_option('header_button'); ?></div>
<div style="clear:both;"></div>
<div class="buttonsinvitestyle">

	    <div style="<?php echo $alignment; ?><?php if ( of_get_option('share_skin') == '2') { ?> margin-bottom:0px; <?php } ?>" class="social-likes" data-url="<?php the_permalink(); ?>" data-title="<?php the_title(); ?>">
	    	<?php	    	
	    	
if ( of_get_option('show_share_buttons_bottom') ['facebook'] == '1' ) { echo '<div data-service="facebook" title="'. __( 'Поделиться в Facebook', 'inspiration' ) .'">'. of_get_option('text_facebook_bottom') .' </div>'; }
if ( of_get_option('show_share_buttons_bottom') ['twitter'] == '1' ) { echo '<div data-service="twitter" title="'. __( 'Поделиться в Twitter', 'inspiration' ) .'" data-via="'. of_get_option('twitter').'">'. of_get_option('text_twitter') .'</div>'; }

if ( of_get_option('show_share_buttons_bottom') ['telegram'] == '1' ) { echo '<div data-service="telegram" title="'. __( 'Поделиться в Telegram', 'inspiration' ) .'">'. of_get_option('text_telegram_bottom') .'</div>'; }

if ( of_get_option('show_share_buttons_bottom') ['vk'] == '1' ) { echo '<div data-service="vkontakte" title="'. __( 'Поделиться в Vkontakte', 'inspiration' ) .'">'. of_get_option('text_vkontakte_bottom') .'</div>'; }


if ( of_get_option('show_share_buttons_bottom') ['ok'] == '1' ) { echo '<div data-service="odnoklassniki" title="'. __( 'Поделиться в Odnoklassniki', 'inspiration' ) .'">'. of_get_option('text_odnoklassniki_bottom') .'</div>'; }

if ( of_get_option('show_share_buttons_bottom') ['pinterest'] == '1' ) { echo '<div data-service="pinterest" title="'. __( 'Поделиться в Pinterest', 'inspiration' ) .'">'. of_get_option('text_pinterest_bottom') .'</div>'; }
if ( of_get_option('show_share_buttons_bottom') ['linkedin'] == '1' ) { echo '<div data-service="linkedin" title="'. __( 'Поделиться в Linkedin', 'inspiration' ) .'">'. of_get_option('text_linkedin_bottom') .'</div>'; }
 ?></div></div>
 
<div style="clear:both"></div>
</div>
<?php } 


/**
 * Попап согласие на обработку данных
 */
 
 function konf_personal()
	{ ?>
	
<div id="inline" style="display:none; overflow: auto;" class="obrabotka">
<div style="font-size:26px; text-align:center; padding-top:10px;"> <?php _e('Согласие на обработку персональных данных', 'inspiration'); ?> </div> <br>
<div style="padding:0px 30px; font-size:15px;">
<?php echo of_get_option('obrabotka_dannyh_text', '') ; ?><br>
</div></div>


		
		<?php }
		




/**
 * Post From Bottom
 */
 

function form_post_bottom()
	{ 
		$imageurl =  get_bloginfo('url') .'/wp-content/themes/ab-inspiration/images/';
		
	?>

<!-- Форма подписки SendSay -->

<?php if (of_get_option('form_choose') == 'smartform') { ?><div style="clear:both;"></div>
<div id="subs">
<div class="subs-image" style="<?php if (of_get_option('form_uploader_transparent') == 1) { echo 'height:1px'; } ?>">
<img src="<?php echo of_get_option('form_uploader_post'); ?>" style="vertical-align:middle;  max-height:300px;<?php if (of_get_option('form_uploader_transparent') == 1) { echo 'width:300px; visibility:hidden;'; } else { echo  'max-width:300px;'; }; ?> border:none !important; -webkit-border-radius: 0px !important; -moz-border-radius: 0px !important; border-radius: 0px !important; box-shadow: none!important;-moz-box-shadow: none;-webkit-box-shadow:none !important;" alt="">
</div>
<div class="subs-form">
<div class="headerformpost"><?php echo of_get_option('form_post_header', ''); ?></div>
<div class="form-post-bottom">
<?php $smart = of_get_option('smart_form'); ?>
<script type="text/javascript">
var PS_ErrPref = 'Поля не заполнены или заполнены неверно: \n'; 
</script>
<script type="text/javascript" src="https://sendsay.ru/account/js/formCheck.js"></script>
<form id="sendsay_form" name="form_<?php if ($smart) { echo ($smart['formname']); } ?>" target="_blank" action="https://sendsay.ru/form/<?php if ($smart) { echo ($smart['sendsayformkod']); } ?>/<?php if ($smart) { echo ($smart['sendsayformid']); } ?>" method="post" style="<?php if (of_get_option('form_uploader_transparent') == 1) { echo 'width:100%;'; } else { 'width:258px;'; } ?> margin: 0 auto;" onsubmit="javascript:if(typeof sendsay_check_form === 'function'){ return sendsay_check_form(this); }" accept-charset="utf-8">

<div id="<?php if ($smart) { echo ($smart['idname']); } ?>" class="subpro_clear sendsayFieldItem" style="display: inline;"><input type="text" name="<?php if ($smart) { echo ($smart['idname']); } ?>"  class="input1 inputformbutton" placeholder="<?php echo of_get_option('name_field_text_bottom', '') ; ?>" style="<?php if (of_get_option('name_field_bottom') == '0') { echo 'display:none'; } else { ''; } ?>"></div>
<div id="_member_email"  class="subpro_clear sendsayFieldItem"  style="display: inline;"><input type="text" data-type="email" name="_member_email"  class="input1 inputformbutton" placeholder="<?php echo of_get_option('email_field_text_bottom', '') ; ?>"></div>
<div id="sendsayFormSubmitBox"  style="display: inline;"><input name="bt_save" type="submit" value="<?php echo of_get_option('text_form_bottom'); ?>" class="buttonpostform" /></div>

<?php if (of_get_option('obrabotka_dannyh_text', '') != '') { ?>
<div class="garantiya-bottom"><a class="fancybox" href="#inline" title="Согласие на обработку персональных данных"><?php echo of_get_option('form_garant_bottom', '') ; ?></a></div>
<?php echo konf_personal(); ?>
<?php } else { ?> <div class="garantiya-bottom"><?php echo of_get_option('form_garant_bottom', '') ; ?></div> <?php } ?>


</form></div></div><div style="clear:both"></div></div><?php }  ?>

<!-- Форма подписки JustClick -->

<?php if (of_get_option('form_choose') == 'justform') { ?><div style="clear:both;"></div>
<div id="subs">
<div class="subs-image" style="<?php if (of_get_option('form_uploader_transparent') == 1) { echo 'height:1px'; } ?>">
<img src="<?php echo of_get_option('form_uploader_post'); ?>" style="vertical-align:middle;  max-height:300px;<?php if (of_get_option('form_uploader_transparent') == 1) { echo 'width:300px; visibility:hidden;'; } else { echo  'max-width:300px;'; }; ?> border:none !important; -webkit-border-radius: 0px !important; -moz-border-radius: 0px !important; border-radius: 0px !important; box-shadow: none!important;-moz-box-shadow: none;-webkit-box-shadow:none !important;" alt=""></div>
<div class="subs-form">
<div class="headerformpost"><?php echo of_get_option('form_post_header', ''); ?></div>
<div class="form-post-bottom">
<?php $just = of_get_option('just_form'); ?>
<form method="POST" action="//<?php if ($just) { echo ($just['login']); } ?>.justclick.ru/subscribe/process" style="<?php if (of_get_option('form_uploader_transparent') == 1) { echo 'width:100%;'; } else { 'width:258px;'; } ?> margin: 0 auto;"  target="_blank">
	    
	    <input type="hidden" name="rid[0]" value="<?php if ($just) { echo ($just['group']); } ?>">
	    <input type="hidden" name="tag" value="<?php if ($just) { echo ($just['marker']); } ?>">
	    <input type="hidden" name="orderData[tag]" value="">
	    
	    
	  <input name="lead_name" type="text" class="input1 inputformbutton" placeholder="<?php echo of_get_option('name_field_text_bottom', '') ; ?>" style="<?php if (of_get_option('name_field_bottom') == '0') { echo 'display:none'; } else { ''; } ?>"/>
<input name="lead_email" type="text" class="input1 inputformbutton" placeholder="<?php echo of_get_option('email_field_text_bottom', '') ; ?>"/>


 <div class="sp-form"><button type="submit" class="sp-button buttonpostform"> <?php echo of_get_option('text_form_bottom'); ?> </button></div>
 
 
 <?php if (of_get_option('obrabotka_dannyh_text', '') != '') { ?>
<div class="garantiya-bottom"><a class="fancybox" href="#inline" title="Согласие на обработку персональных данных"><?php echo of_get_option('form_garant_bottom', '') ; ?></a></div>
<?php echo konf_personal(); ?>
<?php } else { ?> <div class="garantiya-bottom"><?php echo of_get_option('form_garant_bottom', '') ; ?></div> <?php } ?>
	
	<input name="doneurl2" type="hidden" value="<?php if ($just) { echo ($just['linktwo']); } ?>" /></form>
<script type="text/javascript" src="//<?php if ($just) { echo ($just['login']); } ?>.justclick.ru/constructor/editor/scripts/common-forms.js"></script></div></div><div style="clear:both"></div></div><?php }  ?>
<!-- Форма подписки Getresponse -->

<?php if (of_get_option('form_choose') == 'getresponseform') { ?><div style="clear:both;"></div>
<div id="subs">
<div class="subs-image" style="<?php if (of_get_option('form_uploader_transparent') == 1) { echo 'height:1px'; } ?>">
<img src="<?php echo of_get_option('form_uploader_post'); ?>" style="vertical-align:middle;  max-height:300px;<?php if (of_get_option('form_uploader_transparent') == 1) { echo 'width:300px; visibility:hidden;'; } else { echo  'max-width:300px;'; }; ?> border:none !important; -webkit-border-radius: 0px !important; -moz-border-radius: 0px !important; border-radius: 0px !important; box-shadow: none!important;-moz-box-shadow: none;-webkit-box-shadow:none !important;" alt=""></div>
<div class="subs-form">
<div class="headerformpost"><?php echo of_get_option('form_post_header', ''); ?></div>
<div class="form-post-bottom">
<form accept-charset="utf-8" target="_blank" action="<?php $getresponse = of_get_option('getresp_form');
if ($getresponse) 
{ if ($getresponse['old'] == 1) 
{ echo "https://app.getresponse.com/add_subscriber.html"; }
else {  echo "https://app.getresponse.com/add_contact_webform.html"; }
}
?>"    method="post" style="<?php if (of_get_option('form_uploader_transparent') == 1) { echo 'width:100%;'; } else { 'width:258px;'; } ?>margin: 0 auto;">
<?php $getresponse = of_get_option('getresp_form'); ?>
<input type="text" name="name" class="input1 inputformbutton" placeholder="<?php echo of_get_option('name_field_text_bottom', '') ; ?>" style="<?php if (of_get_option('name_field_bottom') == '0') { echo 'display:none'; } else { ''; } ?>">
<input type="text" name="email" class="input1 inputformbutton" placeholder="<?php echo of_get_option('email_field_text_bottom', '') ; ?>">
<input name="submit" type="submit" value="<?php echo of_get_option('text_form_bottom'); ?>" class="buttonpostform">

<?php if (of_get_option('obrabotka_dannyh_text', '') != '') { ?>
<div class="garantiya-bottom"><a class="fancybox" href="#inline" title="Согласие на обработку персональных данных"><?php echo of_get_option('form_garant_bottom', '') ; ?></a></div>
<?php echo konf_personal(); ?>
<?php } else { ?> <div class="garantiya-bottom"><?php echo of_get_option('form_garant_bottom', '') ; ?></div> <?php } ?>

<?php if ($getresponse) 
{ if ($getresponse['old'] == 1) 
{ ?> <input type="hidden" name="campaign_token" value="<?php if ($getresponse) { echo ($getresponse['formid']); } ?>" /> <input type="hidden" name="start_day" value="0" />
	<input type="hidden" name="thankyou_url" value="<?php if ($getresponse) { echo ($getresponse['thankyouurl']); } ?>"/>
<?php }
else {  ?> <input type="hidden" name="webform_id" value="<?php if ($getresponse) { echo ($getresponse['formid']); } ?>" /> <?php  } }
?>

</form></div></div><div style="clear:both"></div></div><?php } ?>




<!-- Форма подписки Getresponse360 -->

<?php if (of_get_option('form_choose') == 'getresponseform360') { ?><div style="clear:both;"></div>
<div id="subs">
<div class="subs-image" style="<?php if (of_get_option('form_uploader_transparent') == 1) { echo 'height:1px'; } ?>">
<img src="<?php echo of_get_option('form_uploader_post'); ?>" style="vertical-align:middle;  max-height:300px;<?php if (of_get_option('form_uploader_transparent') == 1) { echo 'width:300px; visibility:hidden;'; } else { echo  'max-width:300px;'; }; ?> border:none !important; -webkit-border-radius: 0px !important; -moz-border-radius: 0px !important; border-radius: 0px !important; box-shadow: none!important;-moz-box-shadow: none;-webkit-box-shadow:none !important;" alt=""></div>
<div class="subs-form">
<div class="headerformpost"><?php echo of_get_option('form_post_header', ''); ?></div>
<div class="form-post-bottom">
<?php $getresponse = of_get_option('getresp360_form'); ?>
<form accept-charset="utf-8" target="_blank" action="//www.email.<?php if ($getresponse) { echo ($getresponse['getresponse360link']); } ?>/add_subscriber.html"    method="post" style="<?php if (of_get_option('form_uploader_transparent') == 1) { echo 'width:100%;'; } else { 'width:258px;'; } ?>margin: 0 auto;">

<input type="text" name="name" class="input1 inputformbutton" placeholder="<?php echo of_get_option('name_field_text_bottom', '') ; ?>" style="<?php if (of_get_option('name_field_bottom') == '0') { echo 'display:none'; } else { ''; } ?>">
<input type="text" name="email" class="input1 inputformbutton" placeholder="<?php echo of_get_option('email_field_text_bottom', '') ; ?>" >
<input name="submit" type="submit" value="<?php echo of_get_option('text_form_bottom'); ?>" class="buttonpostform">

<?php if (of_get_option('obrabotka_dannyh_text', '') != '') { ?>
<div class="garantiya-bottom"><a class="fancybox" href="#inline" title="Согласие на обработку персональных данных"><?php echo of_get_option('form_garant_bottom', '') ; ?></a></div>
<?php echo konf_personal(); ?>
<?php } else { ?> <div class="garantiya-bottom"><?php echo of_get_option('form_garant_bottom', '') ; ?></div> <?php } ?>

      <input type="hidden" name="campaign_token" value="<?php if ($getresponse) { echo ($getresponse['formid360']); } ?> " /> <input type="hidden" name="start_day" value="0" />
	<input type="hidden" name="thankyou_url" value="<?php if ($getresponse) { echo ($getresponse['thankyou360']); } ?>"/>


</form></div></div><div style="clear:both"></div></div><?php } ?>




<!-- Форма подписки SendPulse -->

<?php if (of_get_option('form_choose') == 'sendpulseform') { ?><div style="clear:both;"></div>
<div id="subs">
<div class="subs-image" style="<?php if (of_get_option('form_uploader_transparent') == 1) { echo 'height:1px'; } ?>">
<img src="<?php echo of_get_option('form_uploader_post'); ?>" style="vertical-align:middle;  max-height:300px;<?php if (of_get_option('form_uploader_transparent') == 1) { echo 'width:300px; visibility:hidden;'; } else { echo  'max-width:300px;'; }; ?> border:none !important; -webkit-border-radius: 0px !important; -moz-border-radius: 0px !important; border-radius: 0px !important; box-shadow: none!important;-moz-box-shadow: none;-webkit-box-shadow:none !important;" alt=""></div>
<div class="subs-form">
<div class="headerformpost"><?php echo of_get_option('form_post_header', ''); ?></div>
<div class="form-post-bottom">

<?php $sendpulse = of_get_option('sendpulse_form'); ?>

<div id="sp-form-<?php if ($sendpulse) { echo ($sendpulse['idform']); } ?>" sp-id="<?php if ($sendpulse) { echo ($sendpulse['idform']); } ?>" sp-hash="<?php if ($sendpulse) { echo ($sendpulse['hashform']); } ?>" sp-lang="ru" class="sp-form sp-form-regular sp-form-embed" sp-show-options="" style="padding:0px !important;<?php if (of_get_option('form_uploader_transparent') == 1) { echo 'width:100%;'; } else { 'width:258px;'; } ?>  margin: 0 auto;"> 

<div class="sp-message"> <div></div> </div> 
<form novalidate="" class="sp-element-container ui-sortable ui-droppable ">

<input type="text" sp-type="input" name="sform[<?php if ($sendpulse) { echo ($sendpulse['idscript']); } ?>]"   size="27" class="sp-form-control input1 inputformbutton" placeholder="<?php echo of_get_option('name_field_text_bottom', '') ; ?>"  style="<?php if (of_get_option('name_field_bottom') == '0') { echo 'display:none'; } else { ''; } ?>">


<input type="email" sp-type="email" name="sform[email]"  required="required" size="27" class="sp-form-control input1 inputformbutton" placeholder="<?php echo of_get_option('email_field_text_bottom', '') ; ?>">
 
<div><button class="sp-button buttonpostform"> <?php echo of_get_option('text_form_bottom'); ?> </button></div></form> </div> 
 

<?php if (of_get_option('obrabotka_dannyh_text', '') != '') { ?>
<div class="garantiya"><a class="fancybox" href="#inline" title="Согласие на обработку персональных данных" style="font-weight:normal"><?php echo of_get_option('form_garant', '') ; ?></a></div>
<?php echo konf_personal(); ?>
<?php } else { ?> <div class="garantiya"><?php echo of_get_option('form_garant', '') ; ?></div> <?php } ?>

<script type="text/javascript" src="//static-login.sendpulse.com/apps/fc3/build/default-handler.js?<?php if ($sendpulse) { echo ($sendpulse['sendpulseidscript']); } ?>"></script>






</div></div><div style="clear:both"></div></div><?php } ?>



<!-- MailChimp -->

<?php if (of_get_option('form_choose') == 'mailchimpform') { ?><div style="clear:both;"></div>
<div id="subs">
<div class="subs-image" style="<?php if (of_get_option('form_uploader_transparent') == 1) { echo 'height:1px'; } ?>">
<img src="<?php echo of_get_option('form_uploader_post'); ?>" style="vertical-align:middle;  max-height:300px;<?php if (of_get_option('form_uploader_transparent') == 1) { echo 'width:300px; visibility:hidden;'; } else { echo  'max-width:300px;'; }; ?> border:none !important; -webkit-border-radius: 0px !important; -moz-border-radius: 0px !important; border-radius: 0px !important; box-shadow: none!important;-moz-box-shadow: none;-webkit-box-shadow:none !important;" alt=""></div>
<div class="subs-form">
<div class="headerformpost"><?php echo of_get_option('form_post_header', ''); ?></div>
<div class="form-post-bottom">
<?php $mailchimp = of_get_option('mailchimp_form'); ?>




<form action="//<?php if ($mailchimp) { echo ($mailchimp['login_mailchimp']); } ?>.list-manage.com/subscribe/post?u=<?php if ($mailchimp) { echo ($mailchimp['marker_mailchimp']); } ?>&amp;id=<?php if ($mailchimp) { echo ($mailchimp['group_mailchimp']); } ?>" method="post"  name="mc-embedded-subscribe-form" target="_blank" style="<?php if (of_get_option('form_uploader_transparent') == 1) { echo 'width:100%;'; } else { 'width:258px;'; } ?> margin: 0 auto;" novalidate>
    

	<input type="text" value="" name="FNAME" class="input1 inputformbutton" placeholder="<?php echo of_get_option('name_field_text_bottom', '') ; ?>" style="<?php if (of_get_option('name_field_bottom') == '0') { echo 'display:none'; } else { ''; } ?>">

	<input type="email" value="" name="EMAIL" class="input1 inputformbutton" placeholder="<?php echo of_get_option('email_field_text_bottom', '') ; ?>">
<input type="submit" value="<?php echo of_get_option('text_form_bottom'); ?>" class="buttonpostform" name="subscribe" >
	<div id="mce-responses" class="clear">
		<div class="response" id="mce-error-response" style="display:none"></div>
		<div class="response" id="mce-success-response" style="display:none"></div>
	</div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
    <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_<?php if ($mailchimp) { echo ($mailchimp['marker_mailchimp']); } ?>_<?php if ($mailchimp) { echo ($mailchimp['group_mailchimp']); } ?>" tabindex="-1" value=""></div>
    
    
    <?php if (of_get_option('obrabotka_dannyh_text', '') != '') { ?>
<div class="garantiya-bottom"><a class="fancybox" href="#inline" title="Согласие на обработку персональных данных"><?php echo of_get_option('form_garant_bottom', '') ; ?></a></div>
<?php echo konf_personal(); ?>
<?php } else { ?> <div class="garantiya-bottom"><?php echo of_get_option('form_garant_bottom', '') ; ?></div> <?php } ?>

</form>

</div></div><div style="clear:both"></div></div><?php }  ?>





<!-- UniSender -->

<?php if (of_get_option('form_choose') == 'unisenderform') { ?><div style="clear:both;"></div>
<div id="subs">
<div class="subs-image" style="<?php if (of_get_option('form_uploader_transparent') == 1) { echo 'height:1px'; } ?>">
<img src="<?php echo of_get_option('form_uploader_post'); ?>" style="vertical-align:middle;  max-height:300px;<?php if (of_get_option('form_uploader_transparent') == 1) { echo 'width:300px; visibility:hidden;'; } else { echo  'max-width:300px;'; }; ?> border:none !important; -webkit-border-radius: 0px !important; -moz-border-radius: 0px !important; border-radius: 0px !important; box-shadow: none!important;-moz-box-shadow: none;-webkit-box-shadow:none !important;" alt=""></div>
<div class="subs-form">
<div class="headerformpost"><?php echo of_get_option('form_post_header', ''); ?></div>
<div class="form-post-bottom">
<?php $unisender = of_get_option('unisender_form'); ?>
<form method="POST" action="https://cp.unisender.com/ru/subscribe?hash=<?php if ($unisender) { echo ($unisender['unisenderhash']); } ?>" 
name="subscribtion_form" target="_blank" style="<?php if (of_get_option('form_uploader_transparent') == 1) { echo 'width:100%;'; } else { 'width:258px;'; } ?> margin: 0 auto;">
    

	<input type="text" value="" name="name" class="input1 inputformbutton" placeholder="<?php echo of_get_option('name_field_text_bottom', '') ; ?>" style="<?php if (of_get_option('name_field_bottom') == '0') { echo 'display:none'; } else { ''; } ?>">

	<input type="email" value="" name="email" class="input1 inputformbutton" placeholder="<?php echo of_get_option('email_field_text_bottom', '') ; ?>">


    <input type="submit" value="<?php echo of_get_option('text_form_bottom'); ?>" class="buttonpostform">
    
     <input type="hidden" name="charset" value="UTF-8">
    <input type="hidden" name="default_list_id" value="<?php if ($unisender) { echo ($unisender['unisenderid']); } ?>">
    <input type="hidden" name="overwrite" value="2">
    <input type="hidden" name="is_v5" value="1">
    
    <?php if (of_get_option('obrabotka_dannyh_text', '') != '') { ?>
<div class="garantiya-bottom"><a class="fancybox" href="#inline" title="Согласие на обработку персональных данных"><?php echo of_get_option('form_garant_bottom', '') ; ?></a></div>
<?php echo konf_personal(); ?>
<?php } else { ?> <div class="garantiya-bottom"><?php echo of_get_option('form_garant_bottom', '') ; ?></div> <?php } ?>

</form>

</div></div><div style="clear:both"></div></div><?php }  ?>





<!-- AutoWebOffice -->

<?php if (of_get_option('form_choose') == 'autowebofficeform') { ?><div style="clear:both;"></div>

<script type="text/javascript" src="https://autoweboffice.ru/js/jquery.mask.js"></script>
<script type="text/javascript">$(function() {$("body").on("submit", ".form_newsletter", function() {var message = "Укажите значения всех обязательных для заполнения полей!"; }); });</script> 


<div id="subs">
<div class="subs-image" style="<?php if (of_get_option('form_uploader_transparent') == 1) { echo 'height:1px'; } ?>">
<img src="<?php echo of_get_option('form_uploader_post'); ?>" style="vertical-align:middle;  max-height:300px;<?php if (of_get_option('form_uploader_transparent') == 1) { echo 'width:300px; visibility:hidden;'; } else { echo  'max-width:300px;'; }; ?> border:none !important; -webkit-border-radius: 0px !important; -moz-border-radius: 0px !important; border-radius: 0px !important; box-shadow: none!important;-moz-box-shadow: none;-webkit-box-shadow:none !important;" alt=""></div>
<div class="subs-form">
<div class="headerformpost"><?php echo of_get_option('form_post_header', ''); ?></div>
<div class="form-post-bottom">
<?php $autoweboffice = of_get_option('autoweboffice_form'); ?>

<form action="https://<?php if ($autoweboffice) { echo ($autoweboffice['loginautoweboffice']); } ?>.autoweboffice.ru/?r=personal/newsletter/sub/add&amp;id=<?php if ($autoweboffice) { echo ($autoweboffice['idautoweboffice']); } ?>&amp;lg=ru" method="post" enctype="application/x-www-form-urlencoded" accept-charset="UTF-8" target="_blank"  style="<?php if (of_get_option('form_uploader_transparent') == 1) { echo 'width:100%;'; } else { 'width:258px;'; } ?> margin: 0 auto;">
    

	<input type="text" value="" name="Contact[name]" class="input1 inputformbutton" placeholder="<?php echo of_get_option('name_field_text_bottom', '') ; ?>" style="<?php if (of_get_option('name_field_bottom') == '0') { echo 'display:none'; } else { ''; } ?>">

	<input type="email" value="" name="Contact[email]" class="input1 inputformbutton" placeholder="<?php echo of_get_option('email_field_text_bottom', '') ; ?>">

<input type="submit" value="<?php echo of_get_option('text_form_bottom'); ?>" class="buttonpostform">
    
<input type="hidden" value="<?php if ($autoweboffice) { echo ($autoweboffice['idautowebofficepassylki']); } ?>" name="Contact[id_newsletter]">
<input type="hidden" value="0" name="Contact[id_advertising_channel_page]">

<?php if (of_get_option('obrabotka_dannyh_text', '') != '') { ?>
<div class="garantiya-bottom"><a class="fancybox" href="#inline" title="Согласие на обработку персональных данных"><?php echo of_get_option('form_garant_bottom', '') ; ?></a></div>
<?php echo konf_personal(); ?>
<?php } else { ?> <div class="garantiya-bottom"><?php echo of_get_option('form_garant_bottom', '') ; ?></div> <?php } ?>
</form>

</div></div><div style="clear:both"></div></div><?php }  ?>



<!-- mailerlite -->

<?php if (of_get_option('form_choose') == 'mailerliteform') { ?><div style="clear:both;"></div>
<div id="subs">
<div class="subs-image" style="<?php if (of_get_option('form_uploader_transparent') == 1) { echo 'height:1px'; } ?>">
<img src="<?php echo of_get_option('form_uploader_post'); ?>" style="vertical-align:middle;  max-height:300px;<?php if (of_get_option('form_uploader_transparent') == 1) { echo 'width:300px; visibility:hidden;'; } else { echo  'max-width:300px;'; }; ?> border:none !important; -webkit-border-radius: 0px !important; -moz-border-radius: 0px !important; border-radius: 0px !important; box-shadow: none!important;-moz-box-shadow: none;-webkit-box-shadow:none !important;" alt=""></div>
<div class="subs-form">
<div class="headerformpost"><?php echo of_get_option('form_post_header', ''); ?></div>
<div class="form-post-bottom">
<?php $mailerlite = of_get_option('mailerlite_form'); ?>

<form action="//app.mailerlite.com/webforms/submit/<?php if ($mailerlite) { echo ($mailerlite['idlandingmailerlite']); } ?>" data-id="<?php if ($mailerlite) { echo ($mailerlite['idformmailerlite']); } ?>" data-code="<?php if ($mailerlite) { echo ($mailerlite['idlandingmailerlite']); } ?>" method="POST" target="_blank" style="<?php if (of_get_option('form_uploader_transparent') == 1) { echo 'width:100%;'; } else { 'width:258px;'; } ?> margin: 0 auto;">
    

<input type="text" value="" name="fields[name]" class="input1 inputformbutton" placeholder="<?php echo of_get_option('name_field_text_bottom', '') ; ?>" style="<?php if (of_get_option('name_field_bottom') == '0') { echo 'display:none'; } else { ''; } ?>">

	<input type="email" value="" name="fields[email]" class="input1 inputformbutton" placeholder="<?php echo of_get_option('email_field_text_bottom', '') ; ?>">
<input type="hidden" name="ml-submit" value="1" />


<input type="submit" value="<?php echo of_get_option('text_form_bottom'); ?>" class="buttonpostform">

<?php if (of_get_option('obrabotka_dannyh_text', '') != '') { ?>
<div class="garantiya-bottom"><a class="fancybox" href="#inline" title="Согласие на обработку персональных данных"><?php echo of_get_option('form_garant_bottom', '') ; ?></a></div>
<?php echo konf_personal(); ?>
<?php } else { ?> <div class="garantiya-bottom"><?php echo of_get_option('form_garant_bottom', '') ; ?></div> <?php } ?>
    
</form>

<script>
            function ml_webform_success() {
                try {
                    window.top.location.href = '<?php if ($mailerlite) { echo ($mailerlite['thankyoumailerlite']); } ?>';
                } catch (e) {
                    window.location.href = '<?php if ($mailerlite) { echo ($mailerlite['thankyoumailerlite']); } ?>';
                }
            };
        </script>   

<script type="text/javascript" src="//static.mailerlite.com/js/w/webforms.min.js?<?php if ($mailerlite) { echo ($mailerlite['idstatistic']); } ?>"></script>

</div></div><div style="clear:both"></div></div><?php }  ?>





<!-- Одна кнопка -->

<?php if (of_get_option('form_choose') == 'onebuttonform') { ?><div style="clear:both;"></div>
<div id="subs">
<div class="subs-image" style="<?php if (of_get_option('form_uploader_transparent') == 1) { echo 'height:1px'; } ?>">
<img src="<?php echo of_get_option('form_uploader_post'); ?>" style="vertical-align:middle;  max-height:300px;<?php if (of_get_option('form_uploader_transparent') == 1) { echo 'width:300px; visibility:hidden;'; } else { echo  'max-width:300px;'; }; ?> border:none !important; -webkit-border-radius: 0px !important; -moz-border-radius: 0px !important; border-radius: 0px !important; box-shadow: none!important;-moz-box-shadow: none;-webkit-box-shadow:none !important;" alt=""></div>
<div class="subs-form">
<div class="headerformpost"><?php echo of_get_option('form_post_header', ''); ?></div>
<div class="form-post-bottom">

<?php $onebutton = of_get_option('onebutton_form'); ?>
<div style="color: buttontext;
    padding: none;background:transparent;
    border: none;"><a href="<?php if ($onebutton) { echo ($onebutton['oneid']); } ?>" target="_blank" style="text-decoration:none;"><div class="buttonpostform" style="padding:10px;width:257px; height:50px; display:table-cell; vertical-align:middle;"><?php echo of_get_option('text_form_bottom'); ?></div></a></div>
</div></div><div style="clear:both"></div></div>

<?php }
}

function comments_post() {
 if (of_get_option('comments_tabber') == '1' && comments_open()) { ?>
<div class="leavecomment"><?php _e( 'Оставьте свой комментарий:', 'inspiration' ); ?></div>
<div class="tabber" style="margin-top:20px;">
<div class="tabbertab">
<?php if (of_get_option('comments_blog') == '1') { echo ' <span>'. __('на Блоге', 'inspiration') .'</span>'. comments_template('', true); }
	if (of_get_option('comments_blog') == '2') { echo ' <span>'. __('в Вконтакте', 'inspiration') .'</span><div id="vk_comments"></div>'; }
	if (of_get_option('comments_blog') == '3') { echo ' <span>'. __('в Фейсбук', 'inspiration') .'</span><div class="fb-comments" data-href="'. get_the_permalink() .'" data-num-posts="20" data-width="100%"></div> '; } ?>
</div>
<div class="tabbertab">
	<?php if (of_get_option('comments_vk') == '1') { echo ' <span>'. __('на Блоге', 'inspiration') .'</span>'. comments_template('', true); }
	if (of_get_option('comments_vk') == '2') { echo ' <span>'. __('в Вконтакте', 'inspiration') .'</span><div id="vk_comments"></div> '; }
	if (of_get_option('comments_vk') == '3') { echo ' <span>'. __('в Фейсбук', 'inspiration') .'</span><div class="fb-comments" data-href="'. get_the_permalink() .'" data-num-posts="20" data-width="100%"></div> '; } ?>
</div>
<div class="tabbertab">
	<?php if (of_get_option('comments_fb') == '1') { echo ' <span>'. __('на Блоге', 'inspiration') .'</span>'. comments_template('', true); }
	if (of_get_option('comments_fb') == '2') { echo ' <span>'. __('в Вконтакте', 'inspiration') .'</span><div id="vk_comments"></div> '; }
	if (of_get_option('comments_fb') == '3') { echo ' <span>'. __('в Фейсбук', 'inspiration') .'</span><div class="fb-comments" data-href="'. get_the_permalink() .'" data-num-posts="20" data-width="100%"></div> '; } ?>
</div>
</div>

<?php } ?>

<?php if (of_get_option('comments_tabber') == '2' && comments_open()) { ?>
 	
	<div class="">
<?php if (of_get_option('comments_blog') == '1') { echo ''. comments_template('', true); }
	if (of_get_option('comments_blog') == '2') { echo ' <div  style="clear:both; font-size:18px;margin:20px 0">'. __('Комментарии в Вконтакте', 'inspiration') .'</div><div id="vk_comments"></div>'; }
	if (of_get_option('comments_blog') == '3') { echo ' <div  style="clear:both; font-size:18px;margin:20px 0">'.__('Комментарии в Фейсбук', 'inspiration').'</div><div class="fb-comments" data-href="'. get_the_permalink() .'" data-num-posts="20" data-width="100%"></div> '; } ?>
</div>
<div class="">
	<?php if (of_get_option('comments_vk') == '1') { echo ''. comments_template('', true); }
	if (of_get_option('comments_vk') == '2') { echo ' <div  style="clear:both; font-size:18px;margin:20px 0">'.__('Комментарии в Вконтакте', 'inspiration').'</div><div id="vk_comments"></div> '; }
	if (of_get_option('comments_vk') == '3') { echo ' <div  style="clear:both; font-size:18px;margin:20px 0">'.__('Комментарии в Фейсбук', 'inspiration').'</div><div class="fb-comments" data-href="'. get_the_permalink() .'" data-num-posts="20" data-width="100%"></div> '; } ?>
</div>
<div class="">
	<?php if (of_get_option('comments_fb') == '1') { echo ''. comments_template('', true); }
	if (of_get_option('comments_fb') == '2') { echo ' <div  style="clear:both; font-size:18px;margin:20px 0">'.__('Комментарии в Вконтакте', 'inspiration').'</div><div id="vk_comments"></div> '; }
	if (of_get_option('comments_fb') == '3') { echo ' <div  style="clear:both; font-size:18px;margin:20px 0">'.__('Комментарии в Фейсбук', 'inspiration').'</div><div class="fb-comments" data-href="'. get_the_permalink() .'" data-num-posts="20" data-width="100%"></div> '; } ?>
</div>

	
<?php }; ?>

<div style="clear:both;"></div>


<?php  if (of_get_option('comments_tabber') == '3') { 


comments_template('', true); } }





// shortcode for list

add_shortcode( 'list', 'list_shortcode' );

function list_shortcode( $atts, $content = null ) {
   extract( shortcode_atts( array(
      'class' => '',
      ), $atts ) );
 
   return '<div class="' . esc_attr($class) . '">' . $content . '</div>';
}


function list_add_mce_button() {
	// check user permissions
	if ( !current_user_can( 'edit_posts' ) && !current_user_can( 'edit_pages' ) ) {
		return;
	}
	// check if WYSIWYG is enabled
	if ( 'true' == get_user_option( 'rich_editing' ) ) {
		add_filter( 'mce_external_plugins', 'list_add_tinymce_plugin' );
		add_filter( 'mce_buttons', 'list_register_mce_button' );
	}
}
add_action('admin_head', 'list_add_mce_button');

// Declare script for new button
function list_add_tinymce_plugin( $plugin_array ) {
	$plugin_array['list_mce_button'] = get_template_directory_uri() . '/inc/js/list-mce-button.js';
	return $plugin_array;
}

// Register new button in the editor
function list_register_mce_button( $buttons ) {
	array_push( $buttons, 'list_mce_button' );
	return $buttons;
}

function list_shortcodes_mce_css() {
	wp_enqueue_script('list_js', get_template_directory_uri() . '/inc/js/list-mce-button.js');

}
add_action( 'admin_enqueue_scripts', 'list_shortcodes_mce_css', 20 );

function ab_title() { ?>
<h2 class="entry-title" itemprop="name headline"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( ' %s', 'inspiration' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
<?php }
add_action( 'ab_title_action', 'ab_title', 10 );

function ab_utilities() { if (of_get_option('utilities') == '1') { echo inspiration_posted_in(); } }
add_action( 'ab_title_action', 'ab_utilities', 20 );

function ab_solial() { ?>
<?php if (of_get_option('share_display') ['1'] == '1') { echo social_likes(); } ?> <?php } 
add_action( 'ab_title_action', 'ab_solial', 30 );


function ab_before_content() { ?> <div class="entry-content"><div style="clear:both"></div> <?php }
add_action( 'ab_title_action', 'ab_before_content', 40 );

function ab_image() { ?>
<div itemprop="image" itemscope itemtype="https://schema.org/ImageObject">
<?php if (of_get_option('thumbnail') == '1') { echo the_post_thumbnail(of_get_option('thumb_size'), array("class" => "alignleft post_thumbnail", "itemprop" => "url")); } ?>
 <meta itemprop="width" content="640">
<meta itemprop="height" content="400">
</div>
<?php }
add_action( 'ab_title_action', 'ab_image', 50 );

function ab_content() { ?> <div class="post-font"  itemprop="description"><?php the_content(__('Читать далее &#187;', 'inspiration')); ?></div>
<div style="clear:both;"></div> <?php }
add_action( 'ab_title_action', 'ab_content', 60 );


function ab_after_content() { ?> <div style="clear:both;"></div></div> <?php }
add_action( 'ab_title_action', 'ab_after_content', 70 );




function ab_archive_category_before() { 
  if ( is_archive() ) {
  ?>
<div class="archiv-title">
<?php if ( is_day() ) : ?>
<?php printf( __( 'Архив: <span>%s</span>', 'inspiration' ), get_the_date() ); ?>
<?php elseif ( is_month() ) : ?>
<?php printf( __( 'Архив месяца: <span>%s</span>', 'inspiration' ), get_the_date('F Y') ); ?>
<?php elseif ( is_year() ) : ?>
<?php printf( __( 'Архив года: <span>%s</span>', 'inspiration' ), get_the_date('Y') ); ?>
<?php else : ?>
<?php _e( 'Архив блога', 'inspiration' ); ?>
<?php endif; ?>
</div><div style="clear:both !important; width:100%"></div><?php
} else {} }


function ab_cagory_category_before() { 
  if ( is_category() ) {
  ?>
<div class="archiv-title"><?php
					printf( __( 'Рубрика: %s', 'inspiration' ), '<span>' . single_cat_title( '', false ) . '</span>' );
				?></div><div style="clear:both !important; width:100%"></div>
  
  <?php
} else {} }


function ab_title_category() { ?>
<h2 class="entry-title" itemprop="name headline"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( ' %s', 'inspiration' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
<?php }
add_action( 'ab_title_action_category', 'ab_title_category', 10 );

function ab_utilities_category() { if (of_get_option('utilities') == '1') { echo inspiration_posted_in(); } }
add_action( 'ab_title_action_category', 'ab_utilities_category', 20 );

function ab_solial_category() { ?>
<?php if (of_get_option('share_display') ['4'] == '1' ) { echo social_likes(); }  ?> <?php } 
add_action( 'ab_title_action_category', 'ab_solial_category', 30 );


function ab_before_content_category() { ?> <div class="entry-content"><div style="clear:both"></div> <?php }
add_action( 'ab_title_action_category', 'ab_before_content_category', 40 );


function ab_image_category() { ?>
<a href="<?php the_permalink()?>"><?php if (of_get_option('thumbnail') == '1') { echo the_post_thumbnail(of_get_option('thumb_size'), array("class" => "alignleft post_thumbnail", "itemprop" => "image")); } ?></a>
<?php }
add_action( 'ab_title_action_category', 'ab_image_category', 50 );

function ab_content_category() { ?><div class="post-font" itemprop="description"><?php the_content(__('Читать далее &#187;', 'inspiration')); ?></div> <?php }
add_action( 'ab_title_action_category', 'ab_content_category', 60 );

function ab_after_content_category() { ?> <div style="clear:both;"></div></div> <?php }
add_action( 'ab_title_action_category', 'ab_after_content_category', 70 );







function kama_breadcrumbs() {

	/* === ОПЦИИ === */
	$text['home']     = __('Главная', 'inspiration'); // текст ссылки "Главная"
	$text['category'] = '%s'; // текст для страницы рубрики
	$text['search']   = 'Результаты поиска по запросу "%s"'; // текст для страницы с результатами поиска
	$text['tag']      = 'Записи с тегом "%s"'; // текст для страницы тега
	$text['author']   = 'Статьи автора %s'; // текст для страницы автора
	$text['404']      = 'Ошибка 404'; // текст для страницы 404
	$text['page']     = 'Страница %s'; // текст 'Страница N'
	$text['cpage']    = 'Страница комментариев %s'; // текст 'Страница комментариев N'

	$wrap_before    = '<div class="breadcrumbs" itemscope itemtype="http://schema.org/BreadcrumbList">'; // открывающий тег обертки
	$wrap_after     = '</div><!-- .breadcrumbs -->'; // закрывающий тег обертки
	$sep            = '<span class="breadcrumbs__separator"> › </span>'; // разделитель между "крошками"
	$before         = '<span class="breadcrumbs__current">'; // тег перед текущей "крошкой"
	$after          = '</span>'; // тег после текущей "крошки"

	$show_on_home   = 0; // 1 - показывать "хлебные крошки" на главной странице, 0 - не показывать
	$show_home_link = 1; // 1 - показывать ссылку "Главная", 0 - не показывать
	$show_current   = 0; // 1 - показывать название текущей страницы, 0 - не показывать
	$show_last_sep  = 0; // 1 - показывать последний разделитель, когда название текущей страницы не отображается, 0 - не показывать
	/* === КОНЕЦ ОПЦИЙ === */

	global $post;
	$home_url       = home_url('/');
	$link           = '<span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">';
	$link          .= '<a class="breadcrumbs__link" href="%1$s" itemprop="item"><span itemprop="name">%2$s</span></a>';
	$link          .= '<meta itemprop="position" content="%3$s" />';
	$link          .= '</span>';
	$parent_id      = ( $post ) ? $post->post_parent : '';
	$home_link      = sprintf( $link, $home_url, $text['home'], 1 );

	if ( is_home() || is_front_page() ) {

		if ( $show_on_home ) echo $wrap_before . $home_link . $wrap_after;

	} else {

		$position = 0;

		echo $wrap_before;

		if ( $show_home_link ) {
			$position += 1;
			echo $home_link;
		}

		if ( is_category() ) {
			$parents = get_ancestors( get_query_var('cat'), 'category' );
			foreach ( array_reverse( $parents ) as $cat ) {
				$position += 1;
				if ( $position > 1 ) echo $sep;
				echo sprintf( $link, get_category_link( $cat ), get_cat_name( $cat ), $position );
			}
			if ( get_query_var( 'paged' ) ) {
				$position += 1;
				$cat = get_query_var('cat');
				echo $sep . sprintf( $link, get_category_link( $cat ), get_cat_name( $cat ), $position );
				echo $sep . $before . sprintf( $text['page'], get_query_var( 'paged' ) ) . $after;
			} else {
				if ( $show_current ) {
					if ( $position >= 1 ) echo $sep;
					echo $before . sprintf( $text['category'], single_cat_title( '', false ) ) . $after;
				} elseif ( $show_last_sep ) echo $sep;
			}

		} elseif ( is_search() ) {
			if ( get_query_var( 'paged' ) ) {
				$position += 1;
				if ( $show_home_link ) echo $sep;
				echo sprintf( $link, $home_url . '?s=' . get_search_query(), sprintf( $text['search'], get_search_query() ), $position );
				echo $sep . $before . sprintf( $text['page'], get_query_var( 'paged' ) ) . $after;
			} else {
				if ( $show_current ) {
					if ( $position >= 1 ) echo $sep;
					echo $before . sprintf( $text['search'], get_search_query() ) . $after;
				} elseif ( $show_last_sep ) echo $sep;
			}

		} elseif ( is_year() ) {
			if ( $show_home_link && $show_current ) echo $sep;
			if ( $show_current ) echo $before . get_the_time('Y') . $after;
			elseif ( $show_home_link && $show_last_sep ) echo $sep;

		} elseif ( is_month() ) {
			if ( $show_home_link ) echo $sep;
			$position += 1;
			echo sprintf( $link, get_year_link( get_the_time('Y') ), get_the_time('Y'), $position );
			if ( $show_current ) echo $sep . $before . get_the_time('F') . $after;
			elseif ( $show_last_sep ) echo $sep;

		} elseif ( is_day() ) {
			if ( $show_home_link ) echo $sep;
			$position += 1;
			echo sprintf( $link, get_year_link( get_the_time('Y') ), get_the_time('Y'), $position ) . $sep;
			$position += 1;
			echo sprintf( $link, get_month_link( get_the_time('Y'), get_the_time('m') ), get_the_time('F'), $position );
			if ( $show_current ) echo $sep . $before . get_the_time('d') . $after;
			elseif ( $show_last_sep ) echo $sep;

		} elseif ( is_single() && ! is_attachment() ) {
			if ( get_post_type() != 'post' ) {
				$position += 1;
				$post_type = get_post_type_object( get_post_type() );
				if ( $position > 1 ) echo $sep;
				echo sprintf( $link, get_post_type_archive_link( $post_type->name ), $post_type->labels->name, $position );
				if ( $show_current ) echo $sep . $before . get_the_title() . $after;
				elseif ( $show_last_sep ) echo $sep;
			} else {
				$cat = get_the_category(); $catID = $cat[0]->cat_ID;
				$parents = get_ancestors( $catID, 'category' );
				$parents = array_reverse( $parents );
				$parents[] = $catID;
				foreach ( $parents as $cat ) {
					$position += 1;
					if ( $position > 1 ) echo $sep;
					echo sprintf( $link, get_category_link( $cat ), get_cat_name( $cat ), $position );
				}
				if ( get_query_var( 'cpage' ) ) {
					$position += 1;
					echo $sep . sprintf( $link, get_permalink(), get_the_title(), $position );
					echo $sep . $before . sprintf( $text['cpage'], get_query_var( 'cpage' ) ) . $after;
				} else {
					if ( $show_current ) echo $sep . $before . get_the_title() . $after;
					elseif ( $show_last_sep ) echo $sep;
				}
			}

		} elseif ( is_post_type_archive() ) {
			$post_type = get_post_type_object( get_post_type() );
			if ( get_query_var( 'paged' ) ) {
				$position += 1;
				if ( $position > 1 ) echo $sep;
				echo sprintf( $link, get_post_type_archive_link( $post_type->name ), $post_type->label, $position );
				echo $sep . $before . sprintf( $text['page'], get_query_var( 'paged' ) ) . $after;
			} else {
				if ( $show_home_link && $show_current ) echo $sep;
				if ( $show_current ) echo $before . $post_type->label . $after;
				elseif ( $show_home_link && $show_last_sep ) echo $sep;
			}

		} elseif ( is_attachment() ) {
			$parent = get_post( $parent_id );
			$cat = get_the_category( $parent->ID ); $catID = $cat[0]->cat_ID;
			$parents = get_ancestors( $catID, 'category' );
			$parents = array_reverse( $parents );
			$parents[] = $catID;
			foreach ( $parents as $cat ) {
				$position += 1;
				if ( $position > 1 ) echo $sep;
				echo sprintf( $link, get_category_link( $cat ), get_cat_name( $cat ), $position );
			}
			$position += 1;
			echo $sep . sprintf( $link, get_permalink( $parent ), $parent->post_title, $position );
			if ( $show_current ) echo $sep . $before . get_the_title() . $after;
			elseif ( $show_last_sep ) echo $sep;

		} elseif ( is_page() && ! $parent_id ) {
			if ( $show_home_link && $show_current ) echo $sep;
			if ( $show_current ) echo $before . get_the_title() . $after;
			elseif ( $show_home_link && $show_last_sep ) echo $sep;

		} elseif ( is_page() && $parent_id ) {
			$parents = get_post_ancestors( get_the_ID() );
			foreach ( array_reverse( $parents ) as $pageID ) {
				$position += 1;
				if ( $position > 1 ) echo $sep;
				echo sprintf( $link, get_page_link( $pageID ), get_the_title( $pageID ), $position );
			}
			if ( $show_current ) echo $sep . $before . get_the_title() . $after;
			elseif ( $show_last_sep ) echo $sep;

		} elseif ( is_tag() ) {
			if ( get_query_var( 'paged' ) ) {
				$position += 1;
				$tagID = get_query_var( 'tag_id' );
				echo $sep . sprintf( $link, get_tag_link( $tagID ), single_tag_title( '', false ), $position );
				echo $sep . $before . sprintf( $text['page'], get_query_var( 'paged' ) ) . $after;
			} else {
				if ( $show_home_link && $show_current ) echo $sep;
				if ( $show_current ) echo $before . sprintf( $text['tag'], single_tag_title( '', false ) ) . $after;
				elseif ( $show_home_link && $show_last_sep ) echo $sep;
			}

		} elseif ( is_author() ) {
			$author = get_userdata( get_query_var( 'author' ) );
			if ( get_query_var( 'paged' ) ) {
				$position += 1;
				echo $sep . sprintf( $link, get_author_posts_url( $author->ID ), sprintf( $text['author'], $author->display_name ), $position );
				echo $sep . $before . sprintf( $text['page'], get_query_var( 'paged' ) ) . $after;
			} else {
				if ( $show_home_link && $show_current ) echo $sep;
				if ( $show_current ) echo $before . sprintf( $text['author'], $author->display_name ) . $after;
				elseif ( $show_home_link && $show_last_sep ) echo $sep;
			}

		} elseif ( is_404() ) {
			if ( $show_home_link && $show_current ) echo $sep;
			if ( $show_current ) echo $before . $text['404'] . $after;
			elseif ( $show_last_sep ) echo $sep;

		} elseif ( has_post_format() && ! is_singular() ) {
			if ( $show_home_link && $show_current ) echo $sep;
			echo get_post_format_string( get_post_format() );
		}

		echo $wrap_after;

	}
}




function image_set() {
$image_set = get_option( 'image_default_link_type' );
?> <script> 
  jQuery( 'a[href$=".gif"], a[href$=".jpg"], a[href$=".png"]' ).addClass( 'fancybox' );
 </script><?php  
	
}

  add_action('wp_footer', 'image_set');
  
  function cc_mime_types($mimes) {
 $mimes['svg'] = 'image/svg+xml';
 return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');


add_action('after_setup_theme', 'remove_admin_bar');
 
function remove_admin_bar() {
if (!current_user_can('administrator') && !is_admin()) {
  show_admin_bar(false);
}
}


function wpcodex_add_excerpt_support_for_post() {
    add_post_type_support( 'wpcw_course', 'excerpt' );
}
add_action( 'init', 'wpcodex_add_excerpt_support_for_post' );




include_once ABSPATH . 'wp-admin/includes/plugin.php';
if ( is_plugin_active( 'wp-courseware/wp-courseware.php' ) ) {
function wpdocs_my_login_redirect( $url, $request, $user ) {
    if ( $user && is_object( $user ) && is_a( $user, 'WP_User' ) ) {
        if ( $user->has_cap( 'administrator' ) ) {
            $url = admin_url();
        } else {
            $url = get_permalink( get_option('woocommerce_myaccount_page_id') ) .'/courses';
        }
    }
    return $url;
}
 
add_filter( 'login_redirect', 'wpdocs_my_login_redirect', 100, 3 );
}


