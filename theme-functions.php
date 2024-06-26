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

global $post, $post_id;


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
		if ((strlen($content) > 0) && ('<' != $content[0])) 
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

<form action="https://sendsay.ru/form/<?php if ($smart) { echo ($smart['sendsayformkod']); } ?>/<?php if ($smart) { echo ($smart['sendsayformid']); } ?>/" method="post">

<input type="text" name="<?php if ($smart) { echo ($smart['idname']); } ?>" value="" class="input1 inputformbutton" placeholder="<?php echo of_get_option('name_field_text_bottom', '') ; ?>" style="<?php if (of_get_option('name_field_bottom') == '0') { echo 'display:none'; } else { ''; } ?>"/>

<input name="_member_email" class="input1 inputformbutton" placeholder="<?php echo of_get_option('email_field_text_bottom', '') ; ?>">

<input type="submit" value="<?php echo of_get_option('text_form_bottom'); ?>" class="buttonpostform" />

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

<div class="sp-form-outer sp-force-hide"><div id="sp-form-<?php if ($sendpulse) { echo ($sendpulse['idform']); } ?>" sp-id="<?php if ($sendpulse) { echo ($sendpulse['idform']); } ?>" sp-hash="<?php if ($sendpulse) { echo ($sendpulse['hashform']); } ?>" sp-lang="ru" class="sp-form sp-form-regular sp-form-embed" sp-show-options="%7B%22satellite%22%3Afalse%2C%22maDomain%22%3A%22login.sendpulse.com%22%2C%22formsDomain%22%3A%22forms.sendpulse.com%22%2C%22condition%22%3A%22onEnter%22%2C%22scrollTo%22%3A25%2C%22delay%22%3A10%2C%22repeat%22%3A3%2C%22background%22%3A%22rgba(0%2C%200%2C%200%2C%200.5)%22%2C%22position%22%3A%22bottom-right%22%2C%22animation%22%3A%22%22%2C%22hideOnMobile%22%3Afalse%2C%22urlFilter%22%3Afalse%2C%22urlFilterConditions%22%3A%5B%7B%22force%22%3A%22hide%22%2C%22clause%22%3A%22contains%22%2C%22token%22%3A%22%22%7D%5D%2C%22analytics%22%3A%7B%22ga%22%3A%7B%22eventLabel%22%3Anull%2C%22send%22%3Afalse%7D%2C%22ym%22%3A%7B%22counterId%22%3Anull%2C%22eventLabel%22%3Anull%2C%22targetId%22%3Anull%2C%22send%22%3Afalse%7D%7D%2C%22utmEnable%22%3Afalse%7D" style="<?php if (of_get_option('form_uploader_transparent') == 1) { echo 'width:100%;'; } else { 'width:258px;'; } ?> margin: 0 auto;"><div class="sp-form-fields-wrapper"><div class="sp-message"><div></div></div>

	
	<form novalidate="" class="sp-element-container sp-lg sp-field-nolabel">
	

<div class="sp-field " sp-id="sp-82f0ae98-aad7-4924-9140-7f589e56ca3f" style="<?php if (of_get_option('name_field_bottom') == '0') { echo 'display:none'; } else { ''; } ?>"><label class="sp-control-label" style="display:none"><span >Имя</span></label>
<input type="text" sp-type="name" name="sform[<?php if ($sendpulse) { echo ($sendpulse['idscript']); } ?>]" class="sp-form-control input1 inputformbutton" placeholder="<?php echo of_get_option('name_field_text_bottom', '') ; ?>"   sp-tips="%7B%7D"></div>
	
	
<div class="sp-field " sp-id="sp-0c6367fa-a7a5-46b0-89e5-e73da17829b7"><label class="sp-control-label" style="display:none"><span >Email</span><strong >*</strong></label>
<input type="email" sp-type="email" name="sform[email]" class="sp-form-control input1 inputformbutton" placeholder="<?php echo of_get_option('email_field_text_bottom', '') ; ?>" sp-tips="%7B%22required%22%3A%22%D0%9E%D0%B1%D1%8F%D0%B7%D0%B0%D1%82%D0%B5%D0%BB%D1%8C%D0%BD%D0%BE%D0%B5%20%D0%BF%D0%BE%D0%BB%D0%B5%22%2C%22wrong%22%3A%22%D0%9D%D0%B5%D0%B2%D0%B5%D1%80%D0%BD%D1%8B%D0%B9%20email-%D0%B0%D0%B4%D1%80%D0%B5%D1%81%22%7D" required="required"></div>
	
<div class="sp-field sp-button-container sp-lg" sp-id="sp-aa549a02-1f77-41ef-9f4f-11c9a76e2a4a">
<button id="sp-aa549a02-1f77-41ef-9f4f-11c9a76e2a4a" class="sp-button buttonpostform"> <?php echo of_get_option('text_form_bottom'); ?> </button></div></form>
	
	
	<div class="sp-link-wrapper sp-brandname__left"></div></div></div>
	
	
	</div> 
 

<?php if (of_get_option('obrabotka_dannyh_text', '') != '') { ?>
<div class="garantiya"><a class="fancybox" href="#inline" title="Согласие на обработку персональных данных" style="font-weight:normal"><?php echo of_get_option('form_garant', '') ; ?></a></div>
<?php echo konf_personal(); ?>
<?php } else { ?> <div class="garantiya"><?php echo of_get_option('form_garant', '') ; ?></div> <?php } ?>

	
<script type="text/javascript" async="async" src="//web.webformscr.com/apps/fc3/build/default-handler.js?<?php if ($sendpulse) { echo ($sendpulse['sendpulseidscript']); } ?>"></script> 







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



if ( ! function_exists( 'ab_inspiration_comment_form' ) ) :
	/**
	 * Documentation for function.
	 */
	function ab_inspiration_comment_form( $order ) {
		if ( true === $order || strtolower( $order ) === strtolower( get_option( 'comment_order', 'asc' ) ) ) {

			comment_form(
				array(
					
					'logged_in_as' => null,
					'title_reply'  => "",
				)
			);
		}
	}
endif;

// Comment form: Remove URL, add placeholder to Name and Email fields
function chaplin_child_filter_comment_form( $fields ) {

	// Remove the URL field
	unset( $fields['url'] );

	// Get variables used in the field array
	$req      	= get_option( 'require_name_email' );
	$html_req 	= ( $req ? " required='required'" : '' );
	$html5    	= current_theme_supports( 'html5', 'comment-form' );
	$commenter	= wp_get_current_commenter();

	// Modify the author field
	$fields['author'] = '<p class="comment-form-author" style="margin-right:10px">' . '<label class="screen-reader-text" for="author">' . __( 'Имя' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' . '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" maxlength="245"' . $html_req . ' placeholder=" ' . __( 'Имя' ) . ( $req ? ' *' : '' ) . '" /></p>';

	// Modify the email field
	$fields['email'] = '<p class="comment-form-email" style="margin-right:10px"><label class="screen-reader-text" for="email">' . __( 'Email' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' . '<input id="email" name="email" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="30" maxlength="100" aria-describedby="email-notes"' . $html_req . ' placeholder=" ' . __( 'Email' ) . ( $req ? ' *' : '' ) . '" /></p>';
	
	
	// Modify the website field
	$fields['url'] = '<p class="comment-form-url"><label class="screen-reader-text" for="url">' . __( 'Вебсайт' )  . '</label> ' . '<input id="url" name="url" ' . ( $html5 ? 'type="url"' : 'type="text"' ) . ' value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" maxlength="100" placeholder=" ' . __( 'Вебсайт' ) . '" /></p>';
	
	

    
    return $fields;
}
add_filter( 'comment_form_default_fields', 'chaplin_child_filter_comment_form' );

// Comment form: Add placeholder to comment field 
function chaplin_child_filter_comment_form_defaults( $defaults ) {

	$defaults['comment_field'] = '<p class="comment-form-comment"><label class="screen-reader-text" for="comment">' . _x( 'Comment', 'noun' ) . '</label> <textarea id="comment" name="comment" cols="45" rows="4" maxlength="65525" required="required" placeholder="' . _x( 'Comment', 'noun' ) . '"></textarea></p>';
    
    return $defaults;
}
add_filter( 'comment_form_defaults', 'chaplin_child_filter_comment_form_defaults' );


add_filter( 'comment_form_default_fields', 'wc_comment_form_hide_cookies' );
function wc_comment_form_hide_cookies( $fields ) {
	unset( $fields['cookies'] );
	return $fields;
}

function comments_post() {
 if (of_get_option('comments_tabber') == '1' && comments_open()) { ?>
<div class="leavecomment" style="margin-top:4px"><?php _e( 'Оставьте свой комментарий:', 'inspiration' ); ?></div>


  
<ul class="nav nav-pills mb-3 commentstabs" id="pills-comments" role="tablist">
  <li class="nav-item commentab" role="presentation">
  
 <?php if (of_get_option('comments_blog') == '1') { ?>   <a class="nav-link active commentlink" id="pills-blog-tab" data-bs-toggle="pill" data-bs-target="#pills-blog" type="button" role="tab" aria-controls="pills-blog" aria-selected="true"><?php echo __('на Блоге', 'inspiration'); ?></a> <?php } ?> 
   <?php if (of_get_option('comments_blog') == '2') { ?>   <a class="nav-link commentlink" id="pills-kontakt-tab" data-bs-toggle="pill" data-bs-target="#pills-kontakt" type="button" role="tab" aria-controls="pills-kontakt" aria-selected="false"><?php echo __('в Вконтакте', 'inspiration'); ?></a><?php } ?> 
    <?php if (of_get_option('comments_blog') == '3') { ?>  <a class="nav-link commentlink" id="pills-facebook-tab" data-bs-toggle="pill" data-bs-target="#pills-facebook" type="button" role="tab" aria-controls="pills-facebook" aria-selected="false"><?php echo __('в Фейсбук', 'inspiration'); ?></a><?php } ?> 
    
    
    
  </li>
  <li class="nav-item commentab" role="presentation">
   <?php if (of_get_option('comments_vk') == '1') { ?>   <a class="nav-link active commentlink" id="pills-blog-tab" data-bs-toggle="pill" data-bs-target="#pills-blog" type="button" role="tab" aria-controls="pills-blog" aria-selected="true"><?php echo __('на Блоге', 'inspiration'); ?></a> <?php } ?> 
   <?php if (of_get_option('comments_vk') == '2') { ?>   <a class="nav-link commentlink" id="pills-kontakt-tab" data-bs-toggle="pill" data-bs-target="#pills-kontakt" type="button" role="tab" aria-controls="pills-kontakt" aria-selected="false"><?php echo __('в Вконтакте', 'inspiration'); ?></a><?php } ?> 
    <?php if (of_get_option('comments_vk') == '3') { ?>  <a class="nav-link commentlink" id="pills-facebook-tab" data-bs-toggle="pill" data-bs-target="#pills-facebook" type="button" role="tab" aria-controls="pills-facebook" aria-selected="false"><?php echo __('в Фейсбук', 'inspiration'); ?></a><?php } ?> 
  </li>
  <li class="nav-item commentab" role="presentation">
   <?php if (of_get_option('comments_fb') == '1') { ?>   <a class="nav-link active commentlink" id="pills-blog-tab" data-bs-toggle="pill" data-bs-target="#pills-blog" type="button" role="tab" aria-controls="pills-blog" aria-selected="true"><?php echo __('на Блоге', 'inspiration'); ?></a> <?php } ?> 
   <?php if (of_get_option('comments_fb') == '2') { ?>   <a class="nav-link commentlink" id="pills-kontakt-tab" data-bs-toggle="pill" data-bs-target="#pills-kontakt" type="button" role="tab" aria-controls="pills-kontakt" aria-selected="false"><?php echo __('в Вконтакте', 'inspiration'); ?></a><?php } ?> 
    <?php if (of_get_option('comments_fb') == '3') { ?>  <a class="nav-link commentlink" id="pills-facebook-tab" data-bs-toggle="pill" data-bs-target="#pills-facebook" type="button" role="tab" aria-controls="pills-facebook" aria-selected="false"><?php echo __('в Фейсбук', 'inspiration'); ?></a><?php } ?> 
  </li>
</ul>
<div class="tab-content" id="pills-tabContent">
  
  <div class="tab-pane fade show active" id="pills-blog" role="tabpanel" aria-labelledby="pills-blog-tab"><?php if (of_get_option('smiles') == '1') { echo  qipsmiles_insert('ru');}  else {  } ?>
  <?php echo comments_template('', true); ?> 
  <?php if (of_get_option('obrabotka_dannyh_text', '') != '') { ?>
<div class="garantiya-bottom-commets"><a class="fancybox" href="#inline" title="<?php _e( 'Согласие на обработку персональных данных', 'inspiration' ); ?> " ref="nofollow"><?php _e( 'Нажимая на кнопку "Отправить комментарий", я соглашаюсь с политикой обработки персональных данных', 'inspiration' ); ?></a></div>
<?php echo konf_personal(); ?>
<?php }  ?></div>

  <div class="tab-pane fade" id="pills-kontakt" role="tabpanel" aria-labelledby="pills-kontakt-tab"><div id="vk_comments"></div></div>
  
  <div class="tab-pane fade" id="pills-facebook" role="tabpanel" aria-labelledby="pills-facebook-tab"><div class="fb-comments" data-href="<?php echo get_the_permalink(); ?>'" data-num-posts="20" data-width="100%"></div></div>
  
</div>




<?php } ?>

<?php if (of_get_option('comments_tabber') == '2' && comments_open()) { ?>
 	
	<div class="">
<?php if (of_get_option('comments_blog') == '1') { ?>  <div class="leavecomment" style="margin-top:4px"><?php _e( 'Оставьте свой комментарий:', 'inspiration' ); ?></div><br> <?php if (of_get_option('smiles') == '1') { echo  qipsmiles_insert('ru');}  else {  } ?><?php echo comments_template('', true); ?> <?php if (of_get_option('obrabotka_dannyh_text', '') != '') { ?>
<div class="garantiya-bottom-commets"><a class="fancybox" href="#inline" title="<?php _e( 'Согласие на обработку персональных данных', 'inspiration' ); ?> " ref="nofollow"><?php _e( 'Нажимая на кнопку "Отправить комментарий", я соглашаюсь с политикой обработки персональных данных', 'inspiration' ); ?></a></div>
<?php echo konf_personal(); ?>
<?php }  ?><?php }
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


<?php  if (of_get_option('comments_tabber') == '3' && comments_open()) {  ?>
<div class="leavecomment"><?php _e( 'Оставьте свой комментарий:', 'inspiration' ); ?></div><br> <div  style="clear:both"><?php if (of_get_option('smiles') == '1') { echo  qipsmiles_insert('ru');}  else {  } ?></div><?php

comments_template('', true); 

 if (of_get_option('obrabotka_dannyh_text', '') != '') { ?>
<div class="garantiya-bottom-commets"><a class="fancybox" href="#inline" title="<?php _e( 'Согласие на обработку персональных данных', 'inspiration' ); ?> " ref="nofollow"><?php _e( 'Нажимая на кнопку "Отправить комментарий", я соглашаюсь с политикой обработки персональных данных', 'inspiration' ); ?></a></div>
<?php echo konf_personal(); ?>
<?php } 



} 

}





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
add_action( 'admin_enqueue_scripts', 'list_shortcodes_mce_css' );

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
	
if ( is_plugin_active( 'woocommerce/woocommerce.php' ) ) {	
	
	
    if ( $user && is_object( $user ) && is_a( $user, 'WP_User' ) ) {
        if ( $user->has_cap( 'administrator' ) ) {
            $url = admin_url();
        } else  {
            $url = get_permalink( get_option('woocommerce_myaccount_page_id') ) .'/courses';
        }
    }
	else { if ( $user && is_object( $user ) && is_a( $user, 'WP_User' ) ) {
        if ( $user->has_cap( 'administrator' ) ) {
            $url = admin_url();
        } else  {
            $url = '';
        }
    }}
	
}
    return $url;
}
 
add_filter( 'login_redirect', 'wpdocs_my_login_redirect', 100, 3 );
}


// ==============================================================
// Switch off Theme My Login notifications because WP Approve User manages it
add_filter( 'tml_send_new_user_notification', '__return_false' );
add_filter( 'tml_send_new_user_admin_notification', '__return_false' );
// ============================================================== 
// 
add_action( 'register_new_user',      'wp_send_new_user_notifications' );
add_action( 'edit_user_created_user', 'wp_send_new_user_notifications' );



// Change WooCommerce "Related products" text

add_filter('gettext', 'change_rp_text', 20, 3);
add_filter('gettext', 'change_rp_text', 20, 3);

function change_rp_text($translated, $text, $domain)
{
	global $ab_woocommerce;
     if ($text === 'Related products' && $domain === 'woocommerce') {
         $translated = $ab_woocommerce['related_product_text'];
     }
     return $translated;
}

function ab_inspiration_content_image_sizes_attr( $sizes, $size ) {
	$width = $size[0];

	if ( 740 <= $width ) {
		$sizes = '(max-width: 706px) 89vw, (max-width: 767px) 82vw, 740px';
	}

	if ( is_active_sidebar( 'sidebar-1' ) || is_archive() || is_search() || is_home() || is_page() ) {
		if ( ! ( is_page() && 'one-column' === get_theme_mod( 'page_options' ) ) && 767 <= $width ) {
			 $sizes = '(min-width: 1600px) 1600px, (min-width: 1200px) 1200px, (min-width: 800) 800px';
		}
	}

	return $sizes;
}
add_filter( 'wp_calculate_image_sizes', 'ab_inspiration_content_image_sizes_attr', 10, 2 );

// вставки начальных и завершающих тегов в файлы шаблона

function ab_inspiration_header() { ?>
<?php if (of_get_option('facebook_app') !== '') {?>
<div id="fb-root"></div> 
<script>
if (screen && screen.width > 514) {
  document.write('<script>(function(d, s, id) {var js, fjs = d.getElementsByTagName(s)[0];if (d.getElementById(id)) {return;}js = d.createElement(s); js.id = id;js.async=true; js.src = "//connect.facebook.net/<?php if (get_locale() == 'ru_RU') {?>ru_RU<?php } else {?>en_US<?php }?>/sdk.js#xfbml=1&version=v2.12&appId=<?php echo of_get_option('facebook_app');?>&autoLogAppEvents=1";fjs.parentNode.insertBefore(js, fjs);}(document, \'script\', \'facebook-jssdk\'));<\/script>');
}
</script><?php } ?>
	<div id="content-main"><div id="main">
<?php }

function ab_inspiration_footer() { ?>
	</div></div>
<?php }
	

// вставки скриптов в footer 

function ab_inspiration_footer_scripts() { ?>

	
<script type="text/javascript" src="<?php bloginfo('url'); ?>/wp-content/themes/ab-inspiration/inc/js/jquery-all.js"> </script>	
<?php $image_set = get_option( 'image_default_link_type' );
?> 
<?php if ( !is_page()) { ?>
<script> 
  jQuery( 'a[href$=".gif"], a[href$=".jpg"], a[href$=".png"]' ).addClass( 'fancybox' );
 </script>
 <?php } ?>
	

<?php global $ab_catalog;?>
<?php if (function_exists('catalog_css_style')) { ?>
<script type="text/javascript"> jQuery(document).ready( function() {
jQuery('#grid-container').cubeportfolio({ filters: '#filters-container', defaultFilter: '*', animationType: '<?php echo $ab_catalog['anymation_type']; ?>', gapHorizontal: 20, gapVertical: 20, gridAdjustment: 'responsive', mediaQueries: [{ width: 800, cols: <?php echo $ab_catalog['porfolio_cols']; ?> }, { width: 320, cols: 1 }], caption: '<?php echo $ab_catalog['caption_type']; ?>', displayType: 'default', displayTypeSpeed: 400, }); jQuery(".showloadimg").show(); });</script>
<?php } ?>
<?php if (is_singular('catalog'))  { global $homepage; ?>
<?php if ('1' == get_post_meta(get_the_ID(), 'dbt_slides', true))  { ?><script> (function($) { $(window).load(function(){ $('.flexslider').flexslider({ animation: "slide", controlNav: "thumbnails", pauseOnHover: true, start: function(slider){ $('body').removeClass('loading'); } }); }); })(jQuery);	</script><?php } 
elseif ('2' == get_post_meta(get_the_ID(), 'dbt_slides', true))  { ?><script> $(window).load(function() { jQuery('#carousel').flexslider({ animation: "slide", controlNav: false, animationLoop: false, slideshow: false, itemWidth: 110, itemMargin: 5, asNavFor: '#slider' });
jQuery('#slider').flexslider({ animation: "slide", controlNav: false, animationLoop: false, slideshow: false, sync: "#carousel" }); });</script>	
<?php } elseif ('3' == get_post_meta(get_the_ID(), 'dbt_slides', true))  { ?><script> (function($) { $(window).load(function() { $('.flexslider').flexslider({ animation: "slide", smoothHeight: true, pauseOnHover: true, }); });  })(jQuery); </script>	<?php } else {'';} }?>
<?php if (is_page_template('template-homepage.php'))  { ?><script>  jQuery('#otzyvy-magasin').cubeportfolio({ layoutMode: 'slider', drag: false, auto: true, autoTimeout: 3000, autoPauseOnHover: true, showNavigation: true, showPagination: false, rewindNav: true, scrollByPage: false, gridAdjustment: 'responsive', mediaQueries: [{ width: 1680, cols: 1}, { width: 1350, cols: 1 }, { width: 800, cols: 1 }, { width: 460, cols: 1 }, { width: 320, cols: 1 }], caption: '', displayType: 'default', }); </script> <?php } ?>
<?php if (is_page_template('enterpage.php') || is_singular('catalog'))  { global $homepage; ?><script>  jQuery('#grid-container3').cubeportfolio({layoutMode: 'slider', drag: false, auto: true, autoTimeout: 5000, autoPauseOnHover: true, showNavigation: false, showPagination: true, rewindNav: true, scrollByPage: false, gridAdjustment: 'responsive', mediaQueries: [{ width: 1680, cols: 5 }, { width: 1350, cols: 4 }, { width: 800, cols: 3 }, { width: 460, cols: 2 }, { width: 320, cols: 1 }], gapHorizontal: 30, gapVertical: 30, caption: '', displayType: 'default', });
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
      setTimeout(function () { onOkConnectReady()}, 0);
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
global $homepage;
if (of_get_option('comments_tabber') !== '3' && of_get_option('vk_app') !== '')  { ?>
<script type="text/javascript">VK.init({apiId: <?php echo of_get_option('vk_app');?>, onlyWidgets: true});</script>
<script type="text/javascript">VK.Widgets.Comments("vk_comments", {limit: 20, width: "auto", attach: "*"});</script>
<?php } } ?>
<?php global $homepage; 
	
	if(isset($homepage['hp_text_animation'])){
	
	if ($homepage['hp_text_animation'] == 1) {  ?>
<script>  jQuery('.katalog-buttons, .firstpost, .secondpost, .heading-title1,.heading-title2,.heading-title3,.heading-title4, .heading-title5, .heading-title6, .post-font1 ol li, .post-font2 ol li,.post-font3 ol li,.post-font1 ul li, .post-font2 ul li,.post-font3 ul li,.entry-title1, .entry-title2, .entry-title3, .entry-title4,.entry-title6, .homepage-image1,  .homepage-image2, .homepage-image3, .post-font1, .post-font2, .post-font3, .readmore1, .readmore2, .readmore3,.readmore4,.readmore5,.readmore6,  .testimonials-animation, .katalog-enterpage, .cbp-l-grid-projects-title, .cbp-l-grid-projects-desc, .homepage-icon1, .homepage-icon2, .homepage-icon3').waypoint(function(){ jQuery(this).addClass('fadeInUp animated'); }, { offset: '100%' });</script><?php } } ?><?php 
$license 	= get_option( 'edd_scroll_license_key' );
$status 	= get_option( 'edd_scroll_license_status' );
if ($status !== false && $status == 'valid' ) {  
global $ab_scroll_to_top; ?>
<script type="text/javascript"> 
jQuery(document).ready(function(){ 
jQuery('.scrollup').each(function(){ 
jQuery(this).replaceWith( '<br><a href="#" class="scrollup" style="color:<?php echo $ab_scroll_to_top['ab_scroll_text_color'];?> !important; "><?php echo $ab_scroll_to_top['ab_scroll_custom_text'];?></a>' ); }); jQuery(window).scroll(function(){ if (jQuery(this).scrollTop() > 100) { jQuery('.scrollup').fadeIn(); } else { jQuery('.scrollup').fadeOut(); } }); jQuery('.scrollup').click(function(){ jQuery("html, body").animate({ scrollTop: 0 }, 600); return false; }); }); </script>
<?php } ?>
<script type="text/javascript"> 
	jQuery(document).ready(function() { 
		var starting_position = jQuery('#header').outerHeight( true ) 
		jQuery(window).scroll(function() { 
			var yPos = ( jQuery(window).scrollTop() ); 
			if( yPos > starting_position && window.innerWidth > 500 ) { 
				jQuery("#floatmenu").fadeIn(300); 
				} 
				else { 
					jQuery("#floatmenu").fadeOut(300); 
					} 
					}); 
					}); 
					</script>
<script> jQuery(function() { jQuery( "#tabs" ).tabs(); }); </script>
<script type="text/javascript"> jQuery(document).ready(function(){ jQuery('.scrollupinsight').each(function(){ jQuery(this).replaceWith( '<br><a href="#" class="scrollupinsight" style=" "></a>' ); }); jQuery(window).scroll(function(){ if (jQuery(this).scrollTop() > 100) { jQuery('.scrollupinsight').fadeIn(); } else { jQuery('.scrollupinsight').fadeOut(); } }); jQuery('.scrollupinsight').click(function(){ jQuery("html, body").animate({ scrollTop: 0 }, 800); return false; }); }); </script>
<script type="text/javascript">jQuery(document).ready(function() {
	
jQuery('.gallery').each(function(i){
    var newID=$(this).attr('id');
    jQuery(this).find( "a" ).attr("rel",newID);
    jQuery(this).find( "a" ).attr('class', 'fancybox');
    });
    
jQuery('.wp-block-gallery').each(function(i){  	
	jQuery('.wp-block-gallery').attr('id', 'group') + i;	
	var newID=$(this).attr('id') + i;
	 jQuery(this).attr("id",newID);	 
	  jQuery(this).find( "a" ).attr("rel",newID);
      jQuery(this).find( "a" ).attr("class",'fancybox');
    });

jQuery("a.group").fancybox({'nextEffect'	:	'fade','prevEffect'	:	'fade','overlayOpacity' :  0.8,'overlayColor' : '#000000','arrows' : true,'openEffect'	: 'elastic','closeEffect'	: 'elastic',});});</script>
<script type="text/javascript"> jQuery(document).ready(function() { jQuery(".fancybox").fancybox({ helpers: { title: { type: 'over' } }, beforeShow: function () { this.title = jQuery(this.element).find("img").attr("alt"); }, iframe: { preload: false }, margin: [20, 60, 20, 60]});});</script>
<script type="text/javascript"> jQuery(document).ready(function() {
jQuery('a[rel^="attachment"]').attr('class', 'fancybox');
jQuery('a[rel^="fancybox"]').attr('class', 'fancybox');
jQuery('.wp-block-image a').attr('class', 'fancybox');

	
	});</script>

<script type="text/javascript"> jQuery(document).ready(function() { jQuery('.woocommerce ul.products li.product a').wrap('<div class="img-wrap"></div>');
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
  jQuery(this).next().toggle();
});
jQuery('.dropdown-menu.keep-open').on('click', function (e) {
  e.stopPropagation();
});

if(1) {
  jQuery('body').attr('tabindex', '0');
}
else {
  alertify.confirm().set({'reverseButtons': true});
  alertify.prompt().set({'reverseButtons': true});
} </script>



<script>
jQuery(document).ready(function() {
  // Get an array of all element heights
  var elementHeights = jQuery('.woocommerce-LoopProduct-link').map(function() {
    return jQuery(this).height();
  }).get();

  // Math.max takes a variable number of arguments
  // `apply` is equivalent to passing each height as an argument
  var maxHeight = Math.max.apply(null, elementHeights);

  // Set each height to the max height
  jQuery('.woocommerce-LoopProduct-link').height(maxHeight);
});
</script>


<script>
jQuery(document).ready(function() {
  // Get an array of all element heights
  var elementHeights = jQuery('.woocommerce-loop-product__title').map(function() {
    return jQuery(this).height();
  }).get();

  // Math.max takes a variable number of arguments
  // `apply` is equivalent to passing each height as an argument
  var maxHeight = Math.max.apply(null, elementHeights);

  // Set each height to the max height
  jQuery('.woocommerce-loop-product__title').height(maxHeight);
});
</script>


<?php
		
	}

add_action('wp_footer','ab_inspiration_footer_scripts', 100);


// вставки скриптов в header 

function ab_inspiration_header_scripts() { 
global $post;
echo of_get_option('metatag', '' ); ?>
<?php if (is_home() ||  is_page_template('enterpage.php')) { ?>
<meta property="og:title" content="<?php echo of_get_option('blog_title'); ?>">
<meta property="og:type" content="website">	
<meta property="og:url" content="<?php bloginfo('url') ?>">
<meta property="og:image" content="<?php echo of_get_option('facebook_image'); ?>">
<meta property="og:description" content="<?php bloginfo('description') ?>"> 
<meta name="twitter:image" content="<?php echo of_get_option('facebook_image'); ?>">
<meta name="twitter:site" content="@<?php echo of_get_option('twitter');?>">
<meta name="twitter:creator" content="@<?php echo of_get_option('twitter');?>">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="<?php the_title(); ?>">
<meta name="twitter:description" content="<?php while(have_posts()):the_post(); $out_excerpt = str_replace(array("\r\n", "\r", "\n", "'" ,"\""), "", get_the_excerpt()); echo apply_filters('new_length', $out_excerpt); endwhile; ?>">
<?php } else {?>
<meta property="og:title" content="<?php the_title(); ?>">
<meta property="og:type" content="article">
<meta property="og:url" content="<?php the_permalink() ?>">
<meta property="og:description" content="<?php while(have_posts()):the_post(); $out_excerpt = str_replace(array("\r\n", "\r", "\n", "'" ,"\""), "", get_the_excerpt()); echo apply_filters('new_length', $out_excerpt); endwhile; ?>" />
<meta property="og:site_name" content="<?php bloginfo('name') ?>">
<meta property="fb:app_id" content="<?php echo of_get_option('facebook_app');?>"/>
<meta name="twitter:site" content="@<?php echo of_get_option('twitter');?>">
<meta name="twitter:creator" content="@<?php echo of_get_option('twitter');?>">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="<?php the_title(); ?>">
<meta name="twitter:description" content="<?php while (have_posts()):the_post(); $out_excerpt = str_replace(array("\r\n", "\r", "\n", "'" ,"\""), "", get_the_excerpt()); echo apply_filters('new_length', $out_excerpt); endwhile; ?>">
<?php if(!has_post_thumbnail( $post->ID )) { $default_image=of_get_option('facebook_image'); echo '<meta name="thumbnail" content="' . $default_image . '" /><meta name="twitter:image:src" content="' . $default_image . '"><meta property="og:image" content="' . $default_image . '">'; } else { $thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); echo '<meta name="thumbnail" content="' . esc_attr( $thumbnail_src[0] ) . '" /><meta name="twitter:image:src" content="' . esc_attr( $thumbnail_src[0] ) . '"><meta property="og:image" content="' . esc_attr( $thumbnail_src[0] ) . '">'; } echo "\n"; ?><?php } ?>
<meta name="twitter:image:width" content="435">
<meta name="twitter:image:height" content="375">

<?php if (of_get_option('vk_app') !== '' && !is_page_template('enterpage.php')  ) { ?>
<script type="text/javascript" src="//vk.com/js/api/openapi.js?169"></script><?php } ?>

<?php if (is_page_template('testimonials-page.php'))  { ?>
<script defer="defer" src='https://www.google.com/recaptcha/api.js'></script><?php } ?>

<?php if (of_get_option('fbpixel') !== '') { ?>

<!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window,document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
 fbq('init', '<?php echo of_get_option('fbpixel'); ?>'); 
fbq('track', 'PageView');
<?php $custom = get_post_custom($post->ID);
if($custom['ViewContent'][0] == 1 ): ?> fbq('track', 'ViewContent'); <?php endif; ?>
<?php $custom = get_post_custom($post->ID);
if($custom['Search'][0] == 1 ): ?> fbq('track', 'Search');<?php endif; ?>
<?php $custom = get_post_custom($post->ID);
if($custom['AddToCart'][0] == 1 ): ?> fbq('track', 'AddToCart'); <?php endif; ?>
<?php $custom = get_post_custom($post->ID);
if($custom['AddToWishlist'][0] == 1 ): ?> fbq('track', 'AddToWishlist'); <?php endif; ?>
<?php $custom = get_post_custom($post->ID);
if($custom['InitiateCheckout'][0] == 1 ): ?>  fbq('track', 'InitiateCheckout'); <?php endif; ?>
<?php $custom = get_post_custom($post->ID);
if($custom['AddPaymentInfo'][0] == 1 ): ?>  fbq('track', 'AddPaymentInfo'); <?php endif; ?>
<?php $custom = get_post_custom($post->ID);
if($custom['Purchase'][0] == 1 ): ?> fbq('track', 'Purchase'); <?php endif; ?>
<?php $custom = get_post_custom($post->ID);
if($custom['Lead'][0] == 1 ): ?>  fbq('track', 'Lead'); <?php endif; ?>
<?php $custom = get_post_custom($post->ID);
if($custom['CompleteRegistration'][0] == 1 ): ?> fbq('track', 'CompleteRegistration'); <?php endif; ?>

</script>
<noscript>
 <img height="1" width="1" 
src="https://www.facebook.com/tr?id=<?php echo of_get_option('fbpixel'); ?>&ev=PageView
&noscript=1"/>
</noscript>
<!-- End Facebook Pixel Code -->

<?php } }
	add_action('wp_head','ab_inspiration_header_scripts', 100);
	
	
	
	add_action( 'after_setup_theme', 'my_remove_parent_theme_stuff', 0 );

function my_remove_parent_theme_stuff() {
 remove_action( 'woocommerce_after_shop_loop_item_title', 
               'woocommerce_template_loop_price', 10 );


add_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_price', 5 );

}



// 1. Show plus minus buttons
  
add_action( 'woocommerce_after_quantity_input_field', 'bbloomer_display_quantity_plus' );
  
function bbloomer_display_quantity_plus() {
   echo '<div class="quantity-button plus" style="width: 1.875rem;height: 1.875rem;    display: inline-flex;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    -webkit-box-pack: center;justify-content: center;"><i class="lni lni-plus lni-sm" style="border-radius:50%; background:#eceef4; padding:6px; cursor: pointer;"></i></div>';
}
  
add_action( 'woocommerce_before_quantity_input_field', 'bbloomer_display_quantity_minus' );
  
function bbloomer_display_quantity_minus() {
   echo '<div class="quantity-button minus" style="width: 1.875rem;height: 1.875rem;    display: inline-flex;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    -webkit-box-pack: center;justify-content: center;"><i class="lni lni-minus lni-sm" style="border-radius:50%; background:#eceef4; padding:6px; cursor: pointer;"></i></div>';
}
  
// -------------
// 2. Trigger update quantity script
if( is_plugin_active( 'woocommerce/woocommerce.php' ) ) {
add_action( 'wp_footer', 'bbloomer_add_cart_quantity_plus_minus' );


  
function bbloomer_add_cart_quantity_plus_minus() {
 
   if ( ! is_product() && ! is_cart() && ! is_page() ) return;
   
   ?>
		<script type="text/javascript">
						
			jQuery(document).ready(function($) {   
					
				var forms = jQuery('.woocommerce-cart-form, form.cart');
						forms.find('.quantity.hidden').prev( '.quantity-button' ).hide();
						forms.find('.quantity.hidden').next( '.quantity-button' ).hide();

				$(document).on( 'click', 'form.cart .quantity-button, .quantity-button.minus, .woocommerce-cart-form .quantity-button, .quantity-button.minus', function() {

					var $this = $(this);					

					// Get current quantity values
					var qty = $this.closest( '.quantity' ).find( '.qty' );
					var val = ( qty.val() == '' ) ? 0 : parseFloat(qty.val());
					var max = parseFloat(qty.attr( 'max' ));
					var min = parseFloat(qty.attr( 'min' ));
					var step = parseFloat(qty.attr( 'step' ));

					// Change the value if plus or minus
					if ( $this.is( '.plus' ) ) {
						if ( max && ( max <= val ) ) {
							qty.val( max ).change();
						} 
						else {
							qty.val( val + step ).change();
						}
					} 
					else {
						if ( min && ( min >= val ) ) {
							qty.val( min ).change();
						} 
						else if ( val >= 1 ) {
							qty.val( val - step ).change();
						}
					}							
				});          
			});
			
			function quantity_step_btn() {
    var timeoutPlus;
    jQuery('.quantity .plus').one().on('click', function() {
        var inputt = jQuery(this).prev('input.qty');
        var val = parseInt(inputt.val());
        var step = inputt.attr('step');
        step = 'undefined' !== typeof(step) ? parseInt(step) : 1;
        inputt.val( val + step ).change();

        if( timeoutPlus != undefined ) {
            clearTimeout(timeoutPlus)
        }
        timeoutPlus = setTimeout(function(){
            jQuery('[name="update_cart"]').trigger('click');
        }, 1000);
    });

    var timeoutMinus;
    jQuery('.quantity .minus').one().on('click', function() {
          var inputt = jQuery(this).next('input.qty');
        var val = parseInt(inputt.val());
        var step = inputt.attr('step');
        step = 'undefined' !== typeof(step) ? parseInt(step) : 1;
        if (val > 1) {
            inputt.val( val - step ).change();
        }

        if( timeoutMinus != undefined ) {
            clearTimeout(timeoutMinus)
        }
        timeoutMinus = setTimeout(function(){
            jQuery('[name="update_cart"]').trigger('click');
        }, 1000);
    });

    var timeoutInput;
    jQuery('div.woocommerce').on('change', '.qty', function(){
        if( timeoutInput != undefined ) {
            clearTimeout(timeoutInput)
        }
        timeoutInput = setTimeout(function(){
            jQuery('[name="update_cart"]').trigger('click');
        }, 1000);
    });
}

jQuery( document ).on( 'updated_cart_totals', function() {
    
    quantity_step_btn();
});

						
		</script>
   <?php

    
 }
 }



add_action('wp_footer','ab_inspiration_footer_scripts', 100);


function short_code_woo_comm_desc( $atts ) {
$atts = shortcode_atts( array(
    'id' => null
), $atts, 'tag_for_short_code_price' );

if ( empty( $atts[ 'id' ] ) ) {
    return '';
}

$product = wc_get_product( $atts['id'] );

if ( ! $product ) {
    return '';
}

       return $product->get_price_html();
    }

    add_shortcode( 'tag_for_short_code_price', 'short_code_woo_comm_desc' );


add_filter( 'woocommerce_add_to_cart_sold_individually_found_in_cart', 'handsome_bearded_guy_maybe_redirect_to_cart' );

function handsome_bearded_guy_maybe_redirect_to_cart( $found_in_cart ) {
 if ( $found_in_cart ) {
  wp_safe_redirect( wc_get_page_permalink( 'cart' ) );
  exit;
 }
 return $found_in_cart;
}
   
   
add_filter( 'woocommerce_sale_flash', 'add_percentage_to_sale_badge', 20, 3 );
function add_percentage_to_sale_badge( $html, $post, $product ) {
    if( $product->is_type('variable')){
        $percentages = array();

        // Get all variation prices
        $prices = $product->get_variation_prices();

        // Loop through variation prices
        foreach( $prices['price'] as $key => $price ){
            // Only on sale variations
            if( $prices['regular_price'][$key] !== $price ){
                // Calculate and set in the array the percentage for each variation on sale
                $percentages[] = round(100 - ($prices['sale_price'][$key] / $prices['regular_price'][$key] * 100));
            }
        }
        $percentage = max($percentages) . '%';
    } else {
        $regular_price = (float) $product->get_regular_price();
        $sale_price    = (float) $product->get_sale_price();

        $percentage    = round(100 - ($sale_price / $regular_price * 100)) . '%';
    }
    return '<span class="onsale">' . '-' . $percentage . '</span>';
}   
