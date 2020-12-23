<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 * 
 */
function optionsframework_option_name() {



	// This gets the theme name from the stylesheet (lowercase and without spaces)
	$themename = get_theme_data(STYLESHEETPATH . '/style.css');
	$themename = $themename['Name'];
	$themename = preg_replace("/\W/", "", strtolower($themename) );
	
	$optionsframework_settings = get_option('optionsframework');
	$optionsframework_settings['id'] = $themename;
	update_option('optionsframework', $optionsframework_settings);
	
	// echo $themename;
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the "id" fields, make sure to use all lowercase and no spaces.
 *  
 */
 

function optionsframework_options() {
	
	
	
	// Test data
	$test_array = array("one" => "One","two" => "Two","three" => "Three","four" => "Four","five" => "Five");
	
	// Multicheck Array
	$multicheck_array = array("one" => "French Toast", "two" => "Pancake", "three" => "Omelette", "four" => "Crepe", "five" => "Waffle");
	
	// Multicheck Defaults
	$multicheck_defaults = array("one" => "1","five" => "1");
	
	// Background Defaults
	
$background_defaults = array('color' => '', 'image' => '', 'repeat' => 'repeat','position' => 'top center','attachment'=>'scroll');

$curve_array = array("0" => "0px","1" => "1px","2" => "2px","3" => "3px","4" => "4px","5" => "5px","6" => "6px","7" => "7px","8" => "8px","9" => "9px","10" => "10px","11" => "11px","12" => "12px","13" => "13px","14" => "14px","15" => "15px","16" => "16px");

$margin_array = array("0px" => "0px","1px" => "1px","2px" => "2px","3px" => "3px","4px" => "4px","5px" => "5px","6px" => "6px","7px" => "7px","9px" => "9px","10px" => "10px","11px" => "11px","12px" => "12px","13px" => "13px","14px" => "14px","15px" => "15px", "16px" => "16px", "17px" => "17px", "18px" => "18px", "19px" => "19px", "20px" => "20px");

$fonts_text_size = array("10px" => "10px","12px" => "12px","14px" => "14px", "16px" => "16px", "18px" => "18px", "20px" => "20px", "22px" => "22px", "24px" => "24px", "26px" => "26px", "28px" => "28px", "30px" => "30px", "32px" => "32px", "34px" => "34px", "36px" => "36px", "38px" => "38px", "40px" => "40px");

$post_border = array("1px" => __('Да', 'inspiration'), "none" => __('Нет', 'inspiration'));
$videofon = array("0" => "Нет", "1" => "mp4","2" => "Youtube");
$background = array('color' => '', 'image' => '', 'repeat' => 'repeat','position' => 'top center','attachment'=>'scroll');
$transform_array = array('none' => __('Нет', 'inspiration'), 'capitalize' => __('С Большой Буквы', 'inspiration'), 'lowercase' => __('маленькие', 'inspiration'),'uppercase' => __('ЗАГЛАВНЫЕ', 'inspiration'));

$decoration_array = array('none' => __('Нет', 'inspiration'), 'underline' => __('Подчеркивать', 'inspiration'));

$align_array = array ('float:left' => __('Слева', 'inspiration'), 'margin:0 auto' => __('По-середине', 'inspiration'), 'float:right' => __('Справа', 'inspiration'));

$valign_array = array ('padding-top:0px' => __('Наверху', 'inspiration'), 'padding-top:50px' => __('По-центру', 'inspiration'), 'padding-top:80px' => __('Внизу', 'inspiration'));
$widget_form_shadow = array('1' => __('Да', 'inspiration'), '0' => __('Нет', 'inspiration'));
$menu_position = array('1' => __('Над шапкой блога', 'inspiration'), '0' => __('Под шапкой блога', 'inspiration'), '2' => __('Под формой подписки/слайдами (WPForm)', 'inspiration'));
$wrapper_width = array('1' => __('На всю ширину экрана - 100%', 'inspiration'), '0' => __('Ширина - 1200px', 'inspiration'));
$formpost_position = array('0' => __('Слева', 'inspiration'), '1' => __('По-центру', 'inspiration'), '2' => __('Справа', 'inspiration'));
$videobg_opaque = array( '0' => __('Без затемнения', 'inspiration'), '0.6' => __('Очень сильное затемнение', 'inspiration'), '0.5' => __('Сильное затемнение', 'inspiration'), '0.4' => __('Среднее затемнение', 'inspiration'), '0.3' => __('Легкое затемнение', 'inspiration'), '0.2' => __('Очень легкое затемнение', 'inspiration') );
$menu_width = array('2' => __('Ширина до границы контента - 1200px', 'inspiration'), '1' => __('Ширина до границ блога - 100%', 'inspiration'));
$footer_width = array ('1200px' => __('Ширина до границы контента - 1200px', 'inspiration'), '100%' => __('Ширина до границ блога - 100%', 'inspiration'));
$header_width = array('2' => __('Ширина до границы контента - 1200px', 'inspiration'), '1' => __('Ширина до границ блога - 100%', 'inspiration'));
$main_width = array('0' => __('Ширина - 1200px', 'inspiration'), '1' => __('Ширина до границ блога - 100%', 'inspiration'));
$fonts_blog = array (	'arial'     => 'Arial',
		'verdana'   => 'Verdana, Geneva',
		'helvetica' => 'Helvetica',
		'tahoma'    => 'Tahoma, Geneva',
		'Open Sans'    => 'Open Sans',
		'Roboto'    => 'Roboto',
		'georgia'   => 'Georgia',
		'times'     => 'Times New Roman',
		'palatino'  => 'Palatino',
		'Avenir Next Cyr'  => 'Avenir Next Cyr');
		
$fonts__text_headers = array ( 'arial' => 'Arial',
		'verdana'   => 'Verdana, Geneva',
		'helvetica' => 'Helvetica',
		'tahoma'    => 'Tahoma, Geneva',
		'\'Lucida Console\', Monaco, monospace' => 'Lucida Console',
		'Open Sans'    => 'Open Sans',
		'Open Sans Condensed'  => 'Open Sans Condensed',
		'PT Sans Narrow'  => 'PT Sans Narrow',	
		'Trebuchet' => 'Trebuchet',
		'georgia'   => 'Georgia',
		'times'     => 'Times New Roman',
		'palatino'  => 'Palatino',
		'\'Comic Sans MS\', cursive' => 'Comic Sans MS',
		'\'Courier New\', monospace' => 'Courier New',
		'Impact, Charcoal, sans-serif' => 'Impact', 
		'Marck Script'  => 'Marck Script',
		'Neucha'  => 'Neucha',
		'Poiret One'  => 'Poiret One',
		'Lobster'  => 'Lobster',
		'Comfortaa'  => 'Comfortaa',
		'Didact Gothic'  => 'Didact Gothic',
		'Roboto'  => 'Roboto',
		'Willamette SF'  => 'Willamette SF',
		
		'Avenir Next Cyr'  => 'Avenir Next Cyr'
		
		
		);


$gradient_menu = array('0' => __('Нет', 'inspiration'), '1' => __('сверху вниз', 'inspiration'), '2' => __('снизу вверх', 'inspiration'));		
$post_font_size = array('14' => '14px', '16' => '16px', '18' => '18px', '20' => '20px', '22' => '22px');
$form_choose = array('smartform' => 'SendSay', 'justform' => 'Justclick' , 'getresponseform' => 'Getresponse','getresponseform360' => 'Getresponse360', 'mailchimpform' => 'MailChimp', 'unisenderform' => 'UniSender','sendpulseform' => 'SendPulse', 'autowebofficeform' => 'Auto Web Office', 'mailerliteform' => 'Mailer Lite', 'onebuttonform' => __('Просто кнопка', 'inspiration'));

$thumb_size = array('thumbnail' => __('Маленькая (150/150)', 'inspiration'), 'medium' => __('Средняя (300)', 'inspiration'), 'large' => __('Большая (100%)', 'inspiration'));
	
$position_title = array('text-align:left' => __('Слева', 'inspiration'), 'text-align:center' => __('По-центру', 'inspiration'), 'text-align:right;' => __('Справа', 'inspiration'));

$border_height = array('1' => '1px', '2' => '2px', '3' => '3px', '4' => '4px', '5' => '5px', '6' => '5px');
$border_style = array('solid' => __('Сплошная', 'inspiration'), 'dashed' => __('Черточки', 'inspiration'), 'dotted' => __('Точки', 'inspiration'));
	
$comments_choose1 = array('1' => __('на Блоге', 'inspiration'), '2' => __('в Вконтакте', 'inspiration'), '3' => __('в Фейсбук', 'inspiration'));
$comments_choose2 = array('1' => __('на Блоге', 'inspiration'), '2' => __('в Вконтакте', 'inspiration'), '3' => __('в Фейсбук', 'inspiration'));
$comments_choose3 = array('1' => __('на Блоге', 'inspiration'), '2' => __('в Вконтакте', 'inspiration'), '3' => __('в Фейсбук', 'inspiration'));	

$comments_tabber = 	array('1' => __('Комментарии 3 в 1 Вкладки', 'inspiration'), '2' => __('Комментарии 3 в 1 Подряд', 'inspiration'), '3' => __('Только комментарии на блоге', 'inspiration'));

$background_size = 	array('cover' => __('Фон покрывает все поле', 'inspiration'), 'contain' => __('Фон покрывает поле сохраняя пропорции изображения', 'inspiration'), 'initial' => __('Исходный размер изображения', 'inspiration') );

$headermenupos = array('top' => __('Сверху', 'inspiration'), 'middle' => __('По-середине', 'inspiration'), 'bottom' => __('Внизу', 'inspiration'));

$headermenualign = array('left' => __('Слева', 'inspiration'), 'center' => __('По-центру', 'inspiration'), 'right' => __('Справа', 'inspiration'));

$header_bg_opaque = array('1' => __('Нет', 'inspiration'), '0.8' => __('20% прозрачности', 'inspiration'), '0.6' => __('40% прозрачности', 'inspiration'), '0.4' => __('60% прозрачности', 'inspiration'), '0.2' => __('80% прозрачности', 'inspiration'));	
	
$background_widget_form = 	array('top left' => __('Сверху Слева', 'inspiration'), 'top center' => __('Сверху По Центру', 'inspiration'), 'top right' => __('Сверху Справа', 'inspiration'), 'center left' => __('Посередине Слева', 'inspiration'), 'center center' => __('Посередине По Центру', 'inspiration'), 'center right' => __('Посередине Справа', 'inspiration'), 'bottom left' => __('Внизу Слева', 'inspiration'), 'bottom center' => __('Внизу По Центру', 'inspiration'), 'bottom right' => __('Внизу Справа', 'inspiration'));

$thumb_align	= 	array('alignleft' => __('Слева', 'inspiration'), 'alignright' => __('Справа', 'inspiration'), 'thumb_katalog' => __('По-центру', 'inspiration'));


$share_skin = array('1' => __('Классический', 'inspiration'), '2' => __('Плоский', 'inspiration'), '3' => __('Бирман', 'inspiration'));

$share_counters = array('1' => __('Показывать счетчик', 'inspiration'), '2' => __('С нулем', 'inspiration'));

$share_counters_defaults = array(
		'1' => '1'
	);

$show_buttons = array("facebook" => __('Facebook', 'inspiration'),"twitter" => __('Twitter', 'inspiration'),"vk" => __('Vkontakte', 'inspiration'),"telegram" => __('Telegram', 'inspiration'),"ok" => __('Odnoklassniki', 'inspiration'),"pinterest" => __('Pinterest', 'inspiration'),"linkedin" => __('LinkedIn', 'inspiration'));

$show_buttons_defaults = array(
		'facebook' => '1',
		'twitter' => '1',
		'telegram' => '1',
		'pinterest' => '0',
		'linkedin' => '0',
		'vk' => '1',
		'ok' => '1'
	);

$share_display = array('1' => __('Блог/Главная', 'inspiration'), '2' => __('Статьи', 'inspiration'), '3' => __('Страницы', 'inspiration'), '4' => __('Архивы/Рубрики', 'inspiration'));
$share_display_defaults = array(
		'1' => '1',
		'2' => '1'
	);
$share_pos = array('1' => __('Статьи'), '2' => __('Страницы', 'inspiration'));


$share_pos_defaults = array(
		'1' => '1',
		'2' => '0'
	);
	
$widget_number  = array('3' => __('3 виджета'), '4' => __('4 виджета', 'inspiration'));

$menu_position_horizontal = array('0' => __('Слева'), '1' => __('По-центру', 'inspiration'), '2' => __('Справа', 'inspiration'));
$utilities = array('1' => __('Да'), '2' => __('Нет', 'inspiration'));

$buttons_shape	= array('0px' => __('Без закругления', 'inspiration'), '3px' => __('С загруглением', 'inspiration'), '50px' => __('Круглые', 'inspiration'));
 
$headermenu_bg_or_border = array('1' => __('Фон', 'inspiration'), '2' => __('Граница', 'inspiration'));

$layout  = array('1' => __('На всю ширину экрана'), '2' => __('С границей по центру', 'inspiration'));

$post_width = array('1' => __('1060px'), '2' => __('1200px'));

$menu_style  = array('1' => __('Классический'), '2' => __('Категории магазина'));

$color_two_text  = array('1' => __('Темный'), '2' => __('Светлый'));
$button_border_only  = array('1' => __('С фоном'), '2' => __('Граница'));

$related_posts = array('categories' => __('Рубрики'), 'tags' => __('Метки'));
$blog_layout = array('classic' => __('Классический блог'), 'grid' => __('Блоки 3 в ряд'),  'post_only' => __('Записи без боковой колонки'));
  
  $widget_header_align = array('left' => __('Слева', 'inspiration'), 'center' => __('По-центру', 'inspiration'));
	
	// Pull all the categories into an array
	$options_categories = array();  
	$options_categories_obj = get_categories();
	foreach ($options_categories_obj as $category) {
    	$options_categories[$category->cat_ID] = $category->cat_name;
	}
	
	// Pull all the pages into an array
	$options_pages = array();  
	$options_pages_obj = get_pages('sort_column=post_parent,menu_order');
	$options_pages[''] = 'Select a page:';
	foreach ($options_pages_obj as $page) {
    	$options_pages[$page->ID] = $page->post_title;
	}
		
	// If using image radio buttons, define a directory path
	$imagepath =  get_bloginfo('stylesheet_directory') . '/images/';
	
	$categories = get_categories('hide_empty=0&orderby=name');
$wp_cats = array();
foreach ($categories as $category_list ) {
       $wp_cats[$category_list->cat_ID] = $category_list->cat_name;
}
array_unshift($wp_cats, "Выберите рубрику");
		
	$options = array();
	

$options[] = array( "name" => "Лицензия",
"type" => "heading");

$options[] = array( "name" => "",
"desc" => "
<strong><em>Пожалуйста, прочтите внимательно нижеследующее лицензионное сообщение</em></strong>

Настоящее Лицензионное соглашение (далее — Договор) является предложением (публичной офертой) и содержит порядок и все существенные условия использования Вами (далее – Пользователь или Лицензиат) программы для ЭВМ — Шаблон-конструктор AB-Inspiration (AB-Inspiration)  (далее Программа)  для сайтов на WordPress.

В соответствии с настоящим соглашением Анфиса Бреус Григорьевна (далее – Правообладатель или Лицензиар) – обладатель исключительных имущественных авторских прав на программу для ЭВМ Шаблон-конструкторAB-Inspiration (AB-Inspiration), включая Руководство пользователя к ней в печатном и/или электронном виде, обязуется предоставить Пользователю (напрямую либо через третьих лиц) неисключительное право на использование Программы, ограниченное правом инсталляции и запуска Программы в соответствии с установленными настоящим Соглашением (договором) правилами и условиями (простая неисключительная лицензия).

<h2>Порядок акцепта оферты (Лицензионного соглашения)</h2>
Настоящая оферта (лицензионное соглашение/договор) считается акцептованной Пользователем в случае соблюдения одного из двух следующих условий:

<div style=\"padding-left:20px;\"> 
<p>1. Факт оформления заказа, оплаты или получения Пользователем от Правообладателя или уполномоченных третьих лиц неисключительных прав на использование Программы на основании (на условиях) настоящего договора (соглашения) означает безоговорочное согласие Пользователя с условиями настоящего соглашения.</p>
<p> 2. Установка Пользователем Программы на свой сайт WordPress и нажатие на кнопку «Активировать» означает безоговорочное согласие Пользователя с условиями настоящего соглашения.</p></div>

<h2>Порядок передачи и стоимость прав</h2>
В соответствии с настоящим Лицензионным соглашением Пользователь обязан с момента акцепта оферты получить от Правообладателя (напрямую или от уполномоченных третьих лиц) неисключительные права на использование Программы. Моментом передачи прав Пользователю считается момент оплаты  Правообладателю фиксированного вознаграждения, указанного на сайте Правообладателя <a href=\"https://ab-inspiration.com\">https://ab-inspiration.com</a>. В случае отказа Пользователя от получения прав (неполучение прав в указанный срок) настоящее Лицензионное соглашение считается не вступившим в силу.

<h2>Пользователь имеет право</h2>
<div style=\"padding-left:20px;\"> 
<p> 1. Использовать программу в течение неограниченного времени, а также без функциональных ограничений.</p>

<p> 2. В течение одного года с момента покупки лицензии пользоваться бесплатными обновлениями программы, а также технической поддержкой.**Пользователи, оплатившие программу до 15 января 2019 года имеют право на пожизненное  бесплатное обновление программы, а также техническую поддержку</p></div>

<h2>Прочие условия</h2>
Незарегистрированная shareware-форма Программы может распространяться свободно (кроме случаев, оговоренных ниже) лишь в том виде, в котором она поставляется, т.е. без всяких изменений.

Ни одна компания или частное лицо не должны брать плату за распространение Программы без письменного согласия обладателя авторских прав.

<strong>Программа распространяется по принципу «как есть». При этом не предусматривается никаких гарантий, явных или подразумеваемых. Вы используете ее на свой собственный риск. Ни автор, ни его уполномоченные агенты не несут ответственности за потери данных, повреждения, потери прибыли или любые другие виды потерь, связанные с использованием (правильным или неправильным) этой программы.</strong>

Вы не можете использовать, копировать, эмулировать, клонировать, сдавать в аренду, давать напрокат, продавать, дарить, изменять, менять название, декомпилировать, дизассемблировать, передавать лицензированную программу или ее часть иначе, чем это описано в данной лицензии. Любое подобное неавторизованное использование приводит к немедленному и автоматическому прекращению действия этой лицензии и может повлечь за собой уголовное и/или гражданское преследование.

Регистрационные ключи Программы не должны распространяться за пределы области, контролируемой лицом или лицами, купившими оригинальную лицензию, без письменного разрешения обладателя авторских прав.

Если Вы не согласны с условиями данной лицензии, то должны удалить файлы Программы со своих устройств хранения информации и отказаться от дальнейшего использования Программы.

Если Программа попала к Вам по ошибке, и Вы хотите ее использовать на законных основаниях, пожалуйста, для ее покупки, перейдите на официальный сайт <a href=\"https://ab-inspiration.com\">https://ab-inspiration.com</a>.
",
"type" => "info");


 $options[] = array( "name" => __('Простая настройка', 'inspiration'),
"type" => "heading");


$options[] = array(
			"desc" => __('Использовать простую настройку', 'inspiration'),
			"id" => "simple_settings",
			"std" => "0",
"type" => "checkbox");






$options[] = array( "name" => __('Первый цвет', 'inspiration'),
"id" => "color_one",
"std" => "#ff581f",
"class" => "clearform",
"type" => "color");

$options[] = array("name" => __('Цвет текста на первом цвете', 'inspiration'),
"id" => "color_one_text",
"std" => "2",
"type" => "radio",
"class" => "radio clarno",
"options" => $color_two_text);

$options[] = array( "name" => __('Второй цвет', 'inspiration'),
"id" => "color_two",
"std" => "#5777e9",
"class" => "clearform",
"type" => "color");

$options[] = array("name" => __('Цвет текста на втором цвете', 'inspiration'),
"id" => "color_two_text",
"std" => "2",
"type" => "radio",
"class" => "radio clarno",
"options" => $color_two_text);


$options[] = array( "name" => __('Дополнительный цвет', 'inspiration'),
"id" => "color_tree",
"std" => "#5777e9",
"class" => "clearform",
"type" => "color");

$options[] = array("name" => __('Цвет текста на дополнительном цвете', 'inspiration'),
"id" => "color_three_text",
"std" => "2",
"type" => "radio",
"class" => "radio clarno",
"options" => $color_two_text);



$options[] = array("name" => __('Ширина', 'inspiration'),
"id" => "layout",
"std" => "2",
"type" => "radio",
"class" => "radio",
"options" => $layout);


$options[] = array("name" => __('Шрифт заголовков', 'inspiration'),
"id" => "headings_fonts_headers",
"std" => "georgia",
"type" => "select",
"class" => "mini", //mini, tiny, small
"options" => $fonts__text_headers);

$options[] = array("name" => __('Шрифт текста и меню', 'inspiration'),
"id" => "headings_fonts_text",
"std" => "arial",
"type" => "select",
"class" => "mini", //mini, tiny, small
"options" => $fonts_blog);		

 /* $options[] = array("name" => __('Стиль основного меню', 'inspiration'),
"id" => "menu_style",
"std" => "0",
"type" => "select",
"class" => "mini", //mini, tiny, small
"options" => $menu_style); */


$options[] = array( "name" => __('Стиль блога', 'inspiration'),
"type" => "heading");



$options[] = array("name" => __('Нестандартные шрифты', 'inspiration'),
"class" => "sub-heading",
"type" => "devider");

$options[] = array(
			"desc" => __('Отключить нестандартные шрифты', 'inspiration'),
			"id" => "fonts_use",
			"std" => "0",
"type" => "checkbox");



$options[] = array("name" => __('Размер', 'inspiration'),
"class" => "sub-heading",
"type" => "devider");


$options[] = array("name" => __('Ширина блога', 'inspiration'),
"id" => "wrapper_width",
"std" => "1",
"type" => "radio",
"class" => "radio",
"options" => $wrapper_width);


$options[] = array("name" => __('Отступ', 'inspiration'),
"class" => "sub-heading",
"type" => "devider");

$options[] = array(
"desc" => __('По умолчанию отступ сверху до шапки <strong>10px</strong>. Если Вы хотите чтобы шапка была без пробела, поставьте <strong>0</strong>', 'inspiration'),
"id" => "padding_top_blog",
"std" => "0",
"class" => "mini",
"type" => "text");

$options[] = array("name" => __('Фон для главной', 'inspiration'),
"class" => "sub-heading",
"type" => "devider");

$options[] = array( "name" => __('Фон для главной вокруг блога', 'inspiration'),
"id" => "homepage_body_background",
"std" => array('color' => '', 'image' => '', 'repeat' => 'repeat-x','position' => 'top center','attachment'=>'scroll'),
"type" => "background");


$options[] = array( "name" => __('Размер фона на главной', 'inspiration'),
"id" => "homepage_background_size",
"std" => "initial",
"type" => "select",
"class" => "mini", //mini, tiny, small
"options" => $background_size);

$options[] = array( "name" => __('Видеофон для главной страницы', 'inspiration'),
"id" => "homepage_videomp4",
"std" => "0",
"type" => "select",
"class" => "mini", //mini, tiny, small
"options" => $videofon);

$options[] = array( "name" => __('Видеофон на главной mp4', 'inspiration'),
"desc" => __('Если вы отметили опцию "mp4", загрузите здесь видео в формате mp4', 'inspiration'),
"id" => "homepage_videofon_mp4",
"std" => "",
"type" => "upload");

$options[] = array( "name" =>  __('Видеофон на главной webm', 'inspiration'),
"desc" =>  __('Если вы отметили опцию "mp4", загрузите видео в формате webm', 'inspiration'),
"id" => "homepage_videofon_webm",
"std" => "",
"type" => "upload");

$options[] = array( "name" => "ID видео Youtube",
"desc" => __('Если вы отметили опцию "Youtube", вставьте здесь ID видео с Youtube', 'inspiration'),
"id" => "homepage_videofon_youtube",
"std" => "XXJp5sdWVxI",
"class" => "mini",
"type" => "text");

$options[] = array( "name" => __('Затемнение фона', 'inspiration'),
"id" => "homepage_fon_opacity",
"std" => "0",
"type" => "select",
"class" => "mini", //mini, tiny, small
"options" => $videobg_opaque);

$options[] = array( "name" => __('Цветовой фильтр для затемнения фона', 'inspiration'),
"id" => "homepage_fon_opacity_color",
"std" => "#000000",
"type" => "color");

$options[] = array("name" => __('Фон вокруг блога', 'inspiration'),
"class" => "sub-heading",
"type" => "devider");

$options[] = array( "name" => __('Фон вокруг блога. Фон может быть либо картинкой либо просто цветом, либо то и другой', 'inspiration'),
"id" => "body_background",
"std" => array('color' => '#f7f9f9', 'image' => '', 'repeat' => 'repeat-x','position' => 'top center','attachment'=>'scroll'),
"type" => "background");

$options[] = array( "name" => __('Размер фона вокруг блога', 'inspiration'),
"id" => "body_background_size",
"std" => "initial",
"type" => "select",
"class" => "mini", //mini, tiny, small
"options" => $background_size);

$options[] = array("name" => __('Фон внутри блога', 'inspiration'),
"class" => "sub-heading",
"type" => "devider");

$options[] = array( "name" => __('Фон внутри блога', 'inspiration'),
"desc" => __('Здесь можно изменить фон внутри статей.', 'inspiration'),
"id" => "blog_background",
"std" => array('color' => '#ffffff', 'image' => '', 'repeat' => 'repeat-x','position' => 'top center','attachment'=>'scroll'),
"type" => "background");

$options[] = array( "name" => __('Размер фона внутри блога', 'inspiration'),
"id" => "wrapper_background_size",
"std" => "initial",
"type" => "select",
"class" => "mini", //mini, tiny, small
"options" => $background_size);


$options[] = array("name" => __('Граница', 'inspiration'),
"class" => "sub-heading",
"type" => "devider");

$options[] = array("name" => __('Отображать границу блога?', 'inspiration'),
"id" => "blog_border",
"std" => "none",
"type" => "radio",
"class" => "radio",
"options" => $post_border);

$options[] = array( "name" => __('Цвет границы блога', 'inspiration'),
"id" => "blog_border_color",
"std" => "#ffffff",
"type" => "color");

$options[] = array( "name" => __('Закругления углов границы блога', 'inspiration'),
"id" => "blog_curve",
"std" => "0",
"type" => "select",
"class" => "mini", //mini, tiny, small
"options" => $curve_array);


$options[] = array( "name" => __('Тень вокруг блога', 'inspiration'),
"id" => "blog_shadow",
"std" => "0px 0px 0px #888",
"type" => "images",
"options" => array(
'7px 10px 7px #888' => $imagepath . 'shadow-right.png',
'-7px 10px 7px #888' => $imagepath . 'shadow-left.png',
'0px 0px 8px rgba(0, 0, 0, 0.5);' => $imagepath . 'round-shadow.png',
'0px 0px 0px #888' => $imagepath . 'no-shadow.png'
)
);	
	
$options[] = array( "name" => __('Стиль шапки', 'inspiration'),
						"type" => "heading");
						
$options[] = array("name" => __('Размер', 'inspiration'),

"class" => "sub-heading",
"type" => "devider");
	
$options[] = array( "name" => __('Высота шапки (header)', 'inspiration'),
"desc" => __('Высота шапки. Здесь Вы можете указать высоту шапки в пикселях. По умолчанию высота 120px', 'inspiration'),
"id" => "header_height",
"std" => "120",
"class" => "mini",
"type" => "text");	


$options[] = array("name" => __('Ширина шапки (внешней шапки)', 'inspiration'),
"id" => "header_width",
"std" => "2",
"type" => "radio",
"class" => "radio",
"options" => $header_width);					
						
$options[] = array("name" => __('Отступ', 'inspiration'),
"class" => "sub-heading",
"type" => "devider");
	
$options[] = array(  "name" => __('От границы блога до фона шапки', 'inspiration'),
"desc" => __('По умолчанию отступ сверху до шапки <strong>10px</strong>. Если Вы хотите чтобы шапка была без пробела, поставьте <strong>0</strong>', 'inspiration'),
"id" => "padding_top_header",
"std" => "0",
"class" => "mini",
"type" => "text");

$options[] = array("name" => __('Фон', 'inspiration'),
"class" => "sub-heading",
"type" => "devider");


$options[] = array( "name" => __('Фон снаружи (фон будет отображаться до границ блога/или на всю ширина (если вы выбрали блог на всю ширину))', 'inspiration'),

"id" => "header_background_around",
"std" => array('color' => '#ffffff', 'image' => '', 'repeat' => 'no-repeat','position' => 'top center','attachment'=>'scroll'),
"type" => "background");

$options[] = array( "name" => __('Размер фона (картинки) в шапке', 'inspiration'),
"id" => "background_header_size",
"std" => "initial",
"type" => "select",
"class" => "mini", //mini, tiny, small
"options" => $background_size);

$options[] = array( "name" => __('Фон внутри шапки (этот фон будет отображаться на 1060px до границ статей и виджетов)', 'inspiration'),

"id" => "header_background",
"std" => array('color' => '#ffffff', 'image' => '', 'repeat' => 'no-repeat','position' => 'top center','attachment'=>'scroll'),
"type" => "background");

$options[] = array( "name" => __('Размер фона (картинки) в шапке', 'inspiration'),
"id" => "background_size",
"std" => "initial",
"type" => "select",
"class" => "mini", //mini, tiny, small
"options" => $background_size);


$options[] = array("name" => __('Граница', 'inspiration'),
"class" => "sub-heading",
"type" => "devider");


$options[] = array( "name" => __('Закругления границы шапки', 'inspiration'),
"desc" => __('Закругления границы шапки в px.', 'inspiration'),
"id" => "header_curve",
"std" => "0",
"type" => "select",
"class" => "mini", //mini, tiny, small
"options" => $curve_array);



$options[] = array("name" => __('Расположение заголовка', 'inspiration'),
"class" => "sub-heading",
"type" => "devider");


$options[] = array(
			"desc" => __('Разместить заголовок и описание по-центру шапки', 'inspiration'),
			"id" => "logo_center",
			"std" => "0",
"type" => "checkbox");

	
$options[] = array("name" => __('Изображение', 'inspiration'),
"class" => "sub-heading",
"type" => "devider");

$options[] = array("name" => __('Настройка логотипа (название и описание блога) в виде изображения', 'inspiration'),
"class" => "subdesc",
"type" => "subdesc");


$options[] = array(
			"desc" => __('Отметьте галочкой если хотите загрузить логотип в виде изображения.', 'inspiration'),
			"id" => "logo_yes",
			"std" => "0",
"type" => "checkbox");

$options[] = array( "name" => __('Загрузите заранее созданное изображение логотипа', 'inspiration'),

"id" => "logo_image",
"std" => "",
"type" => "upload");







$options[] = array( "name" => __('Отступ сверху', 'inspiration'),
"id" => "logo_image_top",
"std" => "26",
"class" => "mini colorlinks",
"type" => "text");

$options[] = array( "name" => __('Отступ cлева', 'inspiration'),
"id" => "logo_image_left",
"std" => "10",
"class" => "mini",
"type" => "text");


$options[] = array("name" => __('Текст', 'inspiration'),
"class" => "sub-heading",
"type" => "devider");
$options[] = array("name" => __('Настройка заголовка блога в виде текста', 'inspiration'),
"class" => "subdesc",
"type" => "subdesc");


$options[] = array( "name" => __('Стиль шрифта заголовка блога', 'inspiration'),
"id" => "logo_typography",
"class" => "typestyle colorlinks",
"std" => array('size' => '37px','face' => 'arial','style' => 'normal', 'color' => '#000000'),
"type" => "typography");

$options[] = array( "name" => __('При наведении мышки', 'inspiration'),
"id" => "logo_hover",
"std" => "#333333",
"class" => "colorlinks", 
"type" => "color");

$options[] = array( "name" => __('Трансформация букв', 'inspiration'),
"id" => "logo_transform",
"std" => "capitalize",
"type" => "select",
"class" => "mini", //mini, tiny, small
"options" => $transform_array);

$options[] = array( "name" => __('Отступ сверху', 'inspiration'),
"id" => "logo_top",
"std" => "26",
"class" => "mini colorlinks",
"type" => "text");

$options[] = array( "name" => __('Отступ cлева', 'inspiration'),
"id" => "logo_left",
"std" => "12",
"class" => "mini",
"type" => "text");


$options[] = array("name" => __('Настройка описания блога в виде текста', 'inspiration'),
"class" => "subdesc",
"type" => "subdesc");

$options[] = array(
			"desc" => __('Отметьте галочкой, если хотите исключить описание из заголовка', 'inspiration'),
			"id" => "desc_yes",
			"std" => "0",
"type" => "checkbox");

$options[] = array( "name" => __('Стиль шрифта описания блога', 'inspiration'),
"id" => "desc_typography",
"class" => "typestyle colorlinks",
"std" => array('size' => '12px','face' => 'arial','style' => 'normal', 'color' => '#000000'),
"type" => "typography");

$options[] = array( "name" => __('Трансформация букв', 'inspiration'),
"id" => "desc_transform",
"std" => "uppercase",
"type" => "select",
"class" => "mini colorlinks", //mini, tiny, small
"options" => $transform_array);

$options[] = array( "name" => __('Расстояние между буквами', 'inspiration'),
"id" => "letter_spacing",
"std" => "2",
"class" => "mini",
"type" => "text");



$options[] = array( "name" => __('Отступ сверху', 'inspiration'),
"id" => "desk_text_top",
"std" => "0",
"class" => "mini colorlinks",
"type" => "text");

$options[] = array( "name" => __('Отступ cлева', 'inspiration'),
"id" => "desk_text_left",
"std" => "15",
"class" => "mini",
"type" => "text");

$options[] = array( "name" => __('Стиль шапки в мобильной версии', 'inspiration'),
						"type" => "heading");

$options[] = array("name" => __('Настройка шапки в мобильной версии', 'inspiration'),
"class" => "sub-heading",
"type" => "devider");

$options[] = array( "name" => __('Фон', 'inspiration'),

"id" => "header_background_around_mobile",
"std" => array('color' => '#0399cd', 'image' => '', 'repeat' => 'no-repeat','position' => 'top center','attachment'=>'scroll'),
"type" => "background");

$options[] = array("name" => __('Граница', 'inspiration'),
"class" => "sub-heading",
"type" => "devider");

$options[] = array(
"desc" => __('Отображать границу под шапкой', 'inspiration'),
"id" => "menu_border_mobile",
"std" => "0",
"type" => "checkbox");	


$options[] = array( "name" => __('Цвет границы', 'inspiration'),
"id" => "menu_dev_color_mobile",
"std" => "#0399cd",
"type" => "color");

$options[] = array("name" => __('Тень', 'inspiration'),
"class" => "sub-heading",
"type" => "devider");

$options[] = array(
"desc" => __('Отображать тень в нижней границе шапки', 'inspiration'),
"id" => "menu_shadow_border_mobile",
"std" => "0",
"type" => "checkbox");	


$options[] = array("name" => __('Изображение', 'inspiration'),
"class" => "sub-heading",
"type" => "devider");

$options[] = array("name" => __('Настройка логотипа (название и описание блога) в виде изображения', 'inspiration'),
"class" => "subdesc",
"type" => "subdesc");


$options[] = array(
			"desc" => __('Отметьте галочкой если хотите загрузить логотип в виде изображения.', 'inspiration'),
			"id" => "logo_yes_mobile",
			"std" => "0",
"type" => "checkbox");

$options[] = array( "name" => __('Загрузите заранее созданное изображение логотипа', 'inspiration'),

"id" => "logo_image_mobile",
"std" => "",
"type" => "upload");

$options[] = array("name" => __('Текст', 'inspiration'),
"class" => "sub-heading",
"type" => "devider");

$options[] = array( "name" => __('Стиль шрифта заголовка блога', 'inspiration'),
"id" => "logo_typography_mobile",
"class" => "typestyle colorlinks",
"std" => array('size' => '37px','face' => 'arial','style' => 'normal', 'color' => '#ffffff'),
"type" => "typography");


$options[] = array( "name" => __('Трансформация букв', 'inspiration'),
"id" => "logo_transform_mobile",
"std" => "capitalize",
"type" => "select",
"class" => "mini", //mini, tiny, small
"options" => $transform_array);


$options[] = array(
"desc" => __('Отображать описание в шапке', 'inspiration'),
"id" => "header_mobile_desc",
"std" => "0",
"type" => "checkbox");

$options[] = array( "name" => __('Стиль шрифта описания блога', 'inspiration'),
"id" => "desc_typography_mobile",
"class" => "typestyle colorlinks",
"std" => array('size' => '12px','face' => 'arial','style' => 'normal', 'color' => '#ffffff'),
"type" => "typography");

$options[] = array( "name" => __('Трансформация букв', 'inspiration'),
"id" => "desc_transform_mobile",
"std" => "uppercase",
"type" => "select",
"class" => "mini ", //mini, tiny, small
"options" => $transform_array);


$options[] = array( "name" => __('Стиль меню в шапке', 'inspiration'),
"type" => "heading");

$options[] = array(
"desc" => __('Отображать меню в шапке?', 'inspiration'),
"id" => "headermenu",
"std" => "1",
"type" => "checkbox");

$options[] = array(
"desc" => __('Здесь Вы можете включить отображение меню в шапке и настроить внешний вид. Чтобы создать пункты меню в шапке перейдите в раздел "Дизайн" - "Меню" - создайте меню', 'inspiration'),
"type" => "info");


$options[] = array("name" => __('Расположение', 'inspiration'),
"class" => "sub-heading",
"type" => "devider");

	
$options[] = array( "name" => __('Расположение меню по вертикали', 'inspiration'),
"id" => "headermenupos",
"std" => "middle",
"type" => "select",
"class" => "mini", //mini, tiny, small
"options" => $headermenupos);

$options[] = array( "name" => __('Расположение пунктов меню по горизонтали', 'inspiration'),
"id" => "headermenualign",
"std" => "right",
"type" => "select",
"class" => "mini", //mini, tiny, small
"options" => $headermenualign);

$options[] = array("name" => __('Размер', 'inspiration'),

"class" => "sub-heading",
"type" => "devider");

$options[] = array( "name" => __('Высота меню', 'inspiration'),
"id" => "headermenu_height",
"std" => "30",
"class" => "mini",
"type" => "text");


$options[] = array("name" => __('Отступы пунктов меню', 'inspiration'),

"class" => "sub-heading",
"type" => "devider");


$options[] = array( "name" => __('Отступ сверху', 'inspiration'),
"id" => "headermenu_margin_top",
"std" => "0",
"class" => "mini",
"type" => "text");

$options[] = array( "name" => __('Отступ снизу', 'inspiration'),
"id" => "headermenu_margin_bottom",
"std" => "0",
"class" => "mini",
"type" => "text");


$options[] = array("name" => __('Фон', 'inspiration'),
"class" => "sub-heading",
"type" => "devider");


$options[] = array( "name" => __('Основной фон', 'inspiration'),
"id" => "headermenu_bg_line",
"std" => "#ffffff",
"class" => "clearform",
"type" => "color");


$options[] = array( "name" => __('При наведении мышки', 'inspiration'),
"id" => "headermenu_background",
"std" => "#0399cd",
"class" => "clearform",
"type" => "color");

$options[] = array( "name" => __('Выпадающее', 'inspiration'),
"id" => "headermenu_bg",
"std" => "#0399cd",
"type" => "color");

$options[] = array( "name" => __('Закругления углов меню при наведении мышкой и активное меню', 'inspiration'),
"id" => "headermenu_curve",
"std" => "0",
"type" => "select",
"class" => "mini", //mini, tiny, small
"options" => $curve_array);


$options[] = array( "name" => __('При наведении мышки отображать фон или нижнюю границу?', 'inspiration'),
"id" => "headermenu_bg_or_border",
"std" => "2",
"type" => "select",
"class" => "mini", //mini, tiny, small
"options" => $headermenu_bg_or_border);


$options[] = array( "name" => __('Прозрачность фона', 'inspiration'),
"id" => "headermenu_opaque",
"std" => "1",
"type" => "select",
"class" => "mini", //mini, tiny, small
"options" => $header_bg_opaque);


$options[] = array("name" => __('Граница сверху', 'inspiration'),

"class" => "sub-heading",
"type" => "devider");


$options[] = array( "name" => __('Граница сверху', 'inspiration'),
"desc" => __('Укажите толщину границы (1,2,3 итд). Если 0, граница отображаться не будет', 'inspiration'),
"id" => "headermenu_border_top",
"std" => "0",
"class" => "mini",
"type" => "text");

$options[] = array( "name" => __('Цвет границы сверху', 'inspiration'),
"id" => "headermenu_border_top_color",
"std" => "#0399cd",
"class" => "clearform2",
"type" => "color");


$options[] = array( "name" => __('Стиль границы сверху', 'inspiration'),
"id" => "headermenu_border_top_style",
"std" => "solid",
"type" => "select",
"class" => "mini", //mini, tiny, small
"options" => $border_style);

$options[] = array("name" => __('Граница снизу', 'inspiration'),

"class" => "sub-heading",
"type" => "devider");


$options[] = array( "name" => __('Граница снизу', 'inspiration'),
"desc" => __('Укажите толщину границы (1,2,3 итд). Если 0, граница отображаться не будет', 'inspiration'),
"id" => "headermenu_border_bottom",
"std" => "0",
"class" => "mini",
"type" => "text");

$options[] = array( "name" => __('Цвет границы сверху', 'inspiration'),
"id" => "headermenu_border_bottom_color",
"std" => "#0399cd",
"class" => "clearform2",
"type" => "color");


$options[] = array( "name" => __('Стиль границы снизу', 'inspiration'),
"id" => "headermenu_border_bottom_style",
"std" => "solid",
"type" => "select",
"class" => "mini", //mini, tiny, small
"options" => $border_style);



$options[] = array("name" => __('Текст', 'inspiration'),
"class" => "sub-heading",
"type" => "devider");

$options[] = array( "name" => __('Стиль', 'inspiration'),
"id" => "headermenu_typography",
"class" => "typestyle clearform",
"std" => array('size' => '16px','face' => 'arial','style' => 'normal', 'color' => '#000000'),
"type" => "typography");



$options[] = array( "name" => __('При наведении мышки', 'inspiration'),
"id" => "headermenu_text_hover",
"std" => "#000000",
"class" => "clearform",
"type" => "color");

$options[] = array( "name" => __('Выпадающее меню', 'inspiration'),
"id" => "headermenu_text_hover_dd",
"std" => "#ffffff",
"class" => "clearform2",
"type" => "color");

$options[] = array( "name" => __('Трансформация', 'inspiration'),
"id" => "headermenu_transform",
"std" => "none",
"type" => "select",
"class" => "mini", //mini, tiny, small
"options" => $transform_array);

$options[] = array( "name" => __('Стиль основного меню', 'inspiration'),
"type" => "heading");

$options[] = array(
"desc" => __('Отображать основное меню?', 'inspiration'),
"id" => "menu_show",
"std" => "1",
"type" => "checkbox");


$options[] = array("name" => __('Расположение по горизонтали', 'inspiration'),
"class" => "sub-heading",
"type" => "devider");

$options[] = array("name" => __('Расположение меню по горизонтали', 'inspiration'),
"id" => "menu_position_horizontal",
"std" => "0",
"type" => "radio",
"class" => "radio",
"options" => $menu_position_horizontal);



$options[] = array("name" => __('Расположение', 'inspiration'),
"class" => "sub-heading",
"type" => "devider");

$options[] = array("name" => __('Расположение меню (под шапкой/над шапкой)', 'inspiration'),
"id" => "menu_position",
"std" => "0",
"type" => "radio",
"class" => "radio",
"options" => $menu_position);

$options[] = array("name" => __('Размер', 'inspiration'),

"class" => "sub-heading",
"type" => "devider");

$options[] = array( "name" => __('Высота меню', 'inspiration'),
"id" => "menu_height",
"std" => "56",
"class" => "mini",
"type" => "text");


$options[] = array( "name" => __('Высота выпадающего меню', 'inspiration'),
"id" => "sub_menu_height",
"std" => "30",
"class" => "mini",
"type" => "text");


$options[] = array("name" => __('Ширина меню', 'inspiration'),
"id" => "menu_width",
"std" => "1",
"type" => "radio",
"class" => "radio",
"options" => $menu_width);

$options[] = array("name" => __('Отступы', 'inspiration'),
"class" => "sub-heading",
"type" => "devider");

$options[] = array( "name" => __('Отступ сверху', 'inspiration'),
"desc" => "Отступ меню сверху. По умолчанию 0px",
"id" => "padding_top_menu",
"std" => "0",
"class" => "mini",
"type" => "text");

$options[] = array( "name" => __('Отступ снизу', 'inspiration'),
"desc" => "Отступ меню снизу. По умолчанию 0px",
"id" => "padding_bottom_menu",
"std" => "0",
"class" => "mini",
"type" => "text");

$options[] = array("name" => __('Фон', 'inspiration'),
"class" => "sub-heading",
"type" => "devider");
						
$options[] = array( "name" => __('Фон меню', 'inspiration'),
"id" => "menu_color",
"std" => "#0399cd",
"class" => "clearform",
"type" => "color");


$options[] = array( "name" => __('Фон выпадающего меню', 'inspiration'),
"id" => "menu_dropdown_color",
"std" => "#0399cd",
"class" => "clearform",
"type" => "color");


$options[] = array( "name" => __('Фон при наведении мышки', 'inspiration'),
"desc" => __('Укажите желаемый фоновый цвет меню и цвет при наведении мышки на меню', 'inspiration'),
"id" => "menu_hover",
"std" => "#ffcb03",
"class" => "clearform2",
"type" => "color");

$options[] = array( "name" => __('Градиент фона меню - легкий переход от темного к светлому', 'inspiration'),
"id" => "menu_gradient",
"std" => "0",
"type" => "select",
"class" => "mini", //mini, tiny, small
"options" => $gradient_menu);

$options[] = array("name" => __('Граница', 'inspiration'),
"class" => "sub-heading",
"type" => "devider");

$options[] = array(
"desc" => __('Отображать границу вокруг меню', 'inspiration'),
"id" => "menu_border",
"std" => "0",
"type" => "checkbox");	


$options[] = array(
"desc" => __('Отображать разделитель', 'inspiration'),
"id" => "menu_devider",
"std" => "0",
"type" => "checkbox");	

$options[] = array( "name" => __('Цвет разделителя и границы', 'inspiration'),
"id" => "menu_dev_color",
"std" => "#f4f7fb",
"type" => "color");

$options[] = array( "name" => __('Закругления углов меню', 'inspiration'),
"id" => "menu_curve",
"std" => "0",
"type" => "select",
"class" => "mini", //mini, tiny, small
"options" => $curve_array);


$options[] = array("name" => __('Тень', 'inspiration'),
"class" => "sub-heading",
"type" => "devider");

$options[] = array(
"desc" => __('Отображать тень от меню', 'inspiration'),
"id" => "menu_shadow_border",
"std" => "0",
"type" => "checkbox");	

$options[] = array("name" => __('Текст', 'inspiration'),
"class" => "sub-heading",
"type" => "devider");


$options[] = array( "name" => __('Стиль шрифта меню', 'inspiration'),
"desc" => __('Укажите желаемый стиль шрифта текста в меню', 'inspiration'),
"id" => "menu_typography",
"class" => "typestyle clearform",
"std" => array('size' => '18px','face' => 'arial','style' => 'normal', 'color' => '#ffffff'),
"type" => "typography");



$options[] = array( "name" => __('Трансформация букв', 'inspiration'),
"id" => "transform",
"std" => "none",
"type" => "select",
"class" => "mini clearform2", //mini, tiny, small
"options" => $transform_array);

$options[] = array( "name" => __('При наведении мышки', 'inspiration'),
"desc" => __('Укажите, как цвет текста в меню будет меняться при наведении мышки', 'inspiration'),
"id" => "menu_text_hover",
"std" => "#ffffff",

"type" => "color");


$options[] = array( "name" => __('Стиль плавающего меню', 'inspiration'),
"type" => "heading");

$options[] = array(
"desc" => __('Отображать плавающее меню?', 'inspiration'),
"id" => "floatmenu",
"std" => "0",
"type" => "checkbox");

$options[] = array(
"desc" => __('Здесь Вы можете включить отображение плавающего меню и настроить внешний вид. Чтобы создать пункты плавающего меню перейдите в раздел "Дизайн" - "Меню" - создайте меню', 'inspiration'),
"type" => "info");

$options[] = array("name" => __('Размер', 'inspiration'),

"class" => "sub-heading",
"type" => "devider");

$options[] = array( "name" => __('Высота меню', 'inspiration'),
"id" => "floatmenu_height",
"std" => "70",
"class" => "mini",
"type" => "text");

$options[] = array("name" => __('Фон', 'inspiration'),
"class" => "sub-heading",
"type" => "devider");


$options[] = array( "name" => __('Основной фон', 'inspiration'),
"id" => "floatmenu_bg_line",
"std" => "#ffffff",
"class" => "clearform",
"type" => "color");


$options[] = array( "name" => __('При наведении мышки', 'inspiration'),
"id" => "floatmenu_background",
"std" => "#0399cd",
"class" => "clearform",
"type" => "color");

$options[] = array( "name" => __('Выпадающее', 'inspiration'),
"id" => "floatmenu_bg",
"std" => "#0399cd",
"type" => "color");



$options[] = array( "name" => __('Прозрачность фона', 'inspiration'),
"id" => "floatmenu_opaque",
"std" => "1",
"type" => "select",
"class" => "mini", //mini, tiny, small
"options" => $header_bg_opaque);

$options[] = array("name" => __('Тень', 'inspiration'),
"class" => "sub-heading",
"type" => "devider");


$options[] = array(
"desc" => __('Отображать тень под меню', 'inspiration'),
"id" => "floatmenu_shadow_border",
"std" => "1",
"type" => "checkbox");	



$options[] = array("name" => __('Текст', 'inspiration'),
"class" => "sub-heading",
"type" => "devider");

$options[] = array( "name" => __('Стиль', 'inspiration'),
"id" => "floatmenu_typography",
"class" => "typestyle clearform",
"std" => array('size' => '18px','face' => 'arial','style' => 'normal', 'color' => '#000000'),
"type" => "typography");



$options[] = array( "name" => __('Цвет при нведении мышки', 'inspiration'),
"id" => "floatmenu_text_hover",
"std" => "#ffffff",
"class" => "clearform2",
"type" => "color");

$options[] = array( "name" => __('Трансформация', 'inspiration'),
"id" => "floatmenu_transform",
"std" => "none",
"type" => "select",
"class" => "mini", //mini, tiny, small
"options" => $transform_array);


$options[] = array("name" => __('Лого или баннер', 'inspiration'),
"class" => "sub-heading",
"type" => "devider");

$options[] = array( "name" => __('Загрузите логотип или баннер', 'inspiration'),
"desc" => __('Баннер или лого будет отображаться слева на плавающем меню', 'inspiration'),
"id" => "floatlogo",
"std" => "",
"type" => "upload");

$options[] = array( "name" => __('Ссылка лого или баннера', 'inspiration'),
"id" => "floatlogo_link",
"std" => "",
"type" => "text");


$options[] = array( "name" => __('Стиль контента', 'inspiration'),
"type" => "heading");

$options[] = array(
"desc" => __('Здесь Вы можете задать стиль вокруг статей и виджетов', 'inspiration'),
"type" => "info");

$options[] = array("name" => __('Ширина', 'inspiration'),
"class" => "sub-heading",
"type" => "devider");

$options[] = array("name" => __('Ширина общего поля вокруг статей и виджетов', 'inspiration'),
"id" => "main_width",
"std" => "0",
"type" => "radio",
"class" => "radio",
"options" => $main_width);

$options[] = array("name" => __('Отступы внешние', 'inspiration'),
"class" => "sub-heading",
"type" => "devider");

$options[] = array( "name" => __('Отступ сверху', 'inspiration'),
"desc" => __('Отступ основной области сверху. По умолчанию 0px', 'inspiration'),
"id" => "margin_top_main",
"std" => "40",
"class" => "mini",
"type" => "text");

$options[] = array( "name" => __('Отступ снизу', 'inspiration'),
"desc" => __('Отступ основной области снизу. По умолчанию 0px', 'inspiration'),
"id" => "margin_bottom_main",
"std" => "40",
"class" => "mini",
"type" => "text");


$options[] = array("name" => __('Отступы внутренние', 'inspiration'),
"class" => "sub-heading",
"type" => "devider");

$options[] = array( "name" => __('Отступ внутренний сверху', 'inspiration'),
"desc" => __('Отступ основной области сверху. По умолчанию 0px', 'inspiration'),
"id" => "padding_top_main",
"std" => "0",
"class" => "mini",
"type" => "text");

$options[] = array( "name" => __('Отступ внутренний снизу', 'inspiration'),
"desc" => __('Отступ основной области снизу. По умолчанию 0px', 'inspiration'),
"id" => "padding_bottom_main",
"std" => "0",
"class" => "mini",
"type" => "text");


$options[] = array("name" => __('Фон', 'inspiration'),
"class" => "sub-heading",
"type" => "devider");

$options[] = array( "name" => __('Фон вокруг статей и виджетов', 'inspiration'),
"id" => "main_bg",
"std" => array('color' => '#ffffff', 'image' => '', 'repeat' => 'repeat-x','position' => 'top center','attachment'=>'scroll'),
"type" => "background");

$options[] = array("name" => __('Граница вокруг статей и виджетов', 'inspiration'),
"class" => "sub-heading",
"type" => "devider");

$options[] = array( "name" => __('Отображать границу вокруг статей и виджетов?', 'inspiration'),
"id" => "main_border",
"std" => "none",
"type" => "radio",
"class" => "radio",
"options" => $post_border);

$options[] = array( "name" => __('Цвет границы статей и виджетов', 'inspiration'),
"id" => "main_border_color",
"std" => "",
"type" => "color");


$options[] = array( "name" => __('Закругления углов статей и виджетов', 'inspiration'),
"id" => "main_curve",
"std" => "0",
"type" => "select",
"class" => "mini", //mini, tiny, small
"options" => $curve_array);

$options[] = array("name" => __('Текст', 'inspiration'),
"class" => "sub-heading",
"type" => "devider");

$options[] = array( "name" => __('Шрифт текста на всем блоге', 'inspiration'),
"desc" => __('Кроме: Заголовок блога, описание блога, меню, заголовки статей, заголовки виджетов, заголовоки формы подписки в виджете и под статьей, текст в блоке "поделиться в конце статьи"', 'inspiration'),
"id" => "fonts_blog",
"std" => "arial",
"type" => "select",
"class" => "mini", //mini, tiny, small
"options" => $fonts_blog);	



$options[] = array( "name" => __('Стиль статьи', 'inspiration'),
"type" => "heading");


$options[] = array("name" => __('Ширина', 'inspiration'),
"class" => "sub-heading",
"type" => "devider");

$options[] = array("name" => __('Ширина контентной части (статьи и виджеты)', 'inspiration'),
"id" => "post_width",
"std" => "1",
"type" => "radio",
"class" => "radio",
"options" => $post_width);




		
$options[] = array("name" => __('Фон', 'inspiration'),
"class" => "sub-heading",
"type" => "devider");


$options[] = array( "name" => __('Фон внутри статей', 'inspiration'),
"desc" => __('Здесь можно изменить фон внутри статей.', 'inspiration'),
"id" => "post_background",
"std" => array('color' => '#ffffff', 'image' => '', 'repeat' => 'repeat-x','position' => 'top center','attachment'=>'scroll'),
"type" => "background");


$options[] = array("name" => __('Граница', 'inspiration'),
"class" => "sub-heading",
"type" => "devider");

$options[] = array( "name" => __('Отображать границу вокруг статей?', 'inspiration'),
"id" => "post_border",
"std" => "1px",
"type" => "radio",
"class" => "radio",
"options" => $post_border);

$options[] = array( "name" => __('Цвет границы статей', 'inspiration'),
"id" => "post_border_color",
"std" => "#f7f9f9",
"type" => "color");


$options[] = array( "name" => __('Закругления углов статей', 'inspiration'),
"id" => "post_curve",
"std" => "0",
"type" => "select",
"class" => "mini", //mini, tiny, small
"options" => $curve_array);

$options[] = array("name" => __('Дата, Автор, Комментарии', 'inspiration'),
"class" => "sub-heading",
"type" => "devider");


$options[] = array( "name" => __('Отображать информацию под заголовком статьи (дата, автор, комментарии)?', 'inspiration'),
"id" => "utilities",
"std" => "1",
"type" => "radio",
"class" => "radio",
"options" => $utilities);
	
	$options[] = array("name" => __('Блок Об авторе', 'inspiration'),
"class" => "sub-heading",
"type" => "devider");
	
	$options[] = array( "name" => __('Отображать блок Об авторе в конце статьи?', 'inspiration'),
"id" => "author",
"std" => "2",
"type" => "radio",
"class" => "radio",
"options" => $utilities);

$options[] = array("name" => __('Метки в конце статьи', 'inspiration'),
"class" => "sub-heading",
"type" => "devider");


$options[] = array( "name" => __('Отображать метки в конце статьи?', 'inspiration'),
"id" => "tags",
"std" => "2",
"type" => "radio",
"class" => "radio",
"options" => $utilities);


$options[] = array("name" => __('Текст', 'inspiration'),
"class" => "sub-heading",
"type" => "devider");

							
$options[] = array( "name" => __('Размер шрифта текста в статьях и на страницах', 'inspiration'),
"id" => "post_font_size",
"std" => "16",
"type" => "select",
"options" => $post_font_size);



$options[] = array("name" => __('Заголовки статей и страниц', 'inspiration'),
"class" => "sub-heading",
"type" => "devider");

$options[] = array( "name" => __('Стиль заголовков статей', 'inspiration'),
"id" => "post_typography",
"class" => "typestyle colorlinks",
"std" => array('size' => '28px','face' => 'arial','style' => 'normal', 'color' => '#000000'),
"type" => "typography");


$options[] = array( "name" => __('При наведении мышки', 'inspiration'),
"id" => "title_hover",
"std" => "#0399cd",
 
"type" => "color");

$options[] = array( "name" => __('Цвет заголовка на внутренней странице', 'inspiration'),
"id" => "title_single",
"std" => "#000000",
"type" => "color");

$options[] = array("name" => __('Шрифт и размер заголовков в тексте статей', 'inspiration'),
"class" => "sub-heading",
"type" => "devider");


$options[] = array("name" => __('Шрифт заголовков в тексте статей', 'inspiration'),
"class" => "subdesc",
"type" => "subdesc");

$options[] = array(
"id" => "fonts_headers",
"std" => "arial",
"type" => "select",
"class" => "mini", //mini, tiny, small
"options" => $fonts__text_headers);	

$options[] = array("name" => __('Размер заголовков в тексте статей', 'inspiration'),
"class" => "subdesc",
"type" => "subdesc");

$options[] = array( "name" => "H1",
"id" => "heading1",
"std" => "36px",
"type" => "select",
"class" => "colorlinks", //mini, tiny, small
"options" => $fonts_text_size);	
$options[] = array( "name" => "H2",
"id" => "heading2",
"std" => "30px",
"type" => "select",
"class" => "colorlinks", //mini, tiny, small
"options" => $fonts_text_size);	
$options[] = array( "name" => "H3",
"id" => "heading3",
"std" => "24px",
"type" => "select",
"class" => "colorlinks", //mini, tiny, small
"options" => $fonts_text_size);	
$options[] = array( "name" => "H4",
"id" => "heading4",
"std" => "18px",
"type" => "select",
"class" => "colorlinks", //mini, tiny, small
"options" => $fonts_text_size);	
$options[] = array( "name" => "H5",
"id" => "heading5",
"std" => "14px",
"type" => "select",
"class" => "colorlinks", //mini, tiny, small
"options" => $fonts_text_size);	
$options[] = array( "name" => "H6",
"id" => "heading6",
"std" => "10px",
"type" => "select",
"class" => "", //mini, tiny, small
"options" => $fonts_text_size);	

$options[] = array( "name" => __('Цвет заголовков в статьях', 'inspiration'),
"id" => "post_headings",
"std" => "#000000",
"type" => "color");


$options[] = array("name" => __('Ссылки', 'inspiration'),
"class" => "sub-heading",
"type" => "devider");

$options[] = array( "name" => __('Цвет ссылок', 'inspiration'),
"id" => "linkslink_colorpicker",
"class" => "colorlinks",
"std" => "#0399cd",
"type" => "color");

$options[] = array( "name" => __('При наведении мышки', 'inspiration'),
"id" => "linkshover_colorpicker",
"class" => "colorlinks",
"std" => "#ffcb03",
"type" => "color");

$options[] = array( "name" => __('Посещенная ссылка', 'inspiration'),
"id" => "linksvisited_colorpicker",
"std" => "#0399cd",
"type" => "color");

$options[] = array("name" => __('Кнопки', 'inspiration'),
"class" => "sub-heading",
"type" => "devider");


$options[] = array( "name" => __('Цвет кнопок', 'inspiration'),
"id" => "button_color",
"std" => "#ffcb03",
"class" => "colorlinks",
"type" => "color");

$options[] = array( "name" => __('Цвет при наведении мышки', 'inspiration'),
"id" => "button_color_hover",
"std" => "#0399cd",
"type" => "color");

$options[] = array( "name" => __('Цвет текста на кнопках', 'inspiration'),
"id" => "button_color_text",
"std" => "#ffffff",
"type" => "color");

$options[] = array( "name" => __('Цвет текста на кнопках при наведении мышки', 'inspiration'),
"id" => "button_color_text_hover",
"std" => "#ffffff",
"type" => "color");

$options[] = array( "name" => __('Форма кнопок', 'inspiration'),
"id" => "buttons_shape",
"std" => "0px",
"type" => "select",
"class" => "mini", //mini, tiny, small
"options" => $buttons_shape);	


$options[] = array("name" => __('Списки', 'inspiration'),
"class" => "sub-heading",
"type" => "devider");

$options[] = array( "name" => __('Обычный', 'inspiration'),
"id" => "bullets_color",
"std" => "#0399cd",
"type" => "color",
"class" => "colorlinks");

$options[] = array( "name" => __('Положительный', 'inspiration'),
"id" => "bullets_color2",
"std" => "#ffcb03",
"type" => "color",
"class" => "colorlinks");

$options[] = array( "name" => __('Отрицательный', 'inspiration'),
"id" => "bullets_color3",
"std" => "#ff0000",
"type" => "color",
"class" => "colorlinks");

$options[] = array( "name" => __('Нейтральный', 'inspiration'),
"id" => "bullets_color4",
"std" => "#333333",
"type" => "color");


$options[] = array("name" => __('Комментарии', 'inspiration'),
"class" => "sub-heading",
"type" => "devider");

$options[] = array( "name" => __('Фон комментариев', 'inspiration'),
"id" => "comment_color",
"std" => "#ffffff",
"class" => "colorlinks",
"type" => "color");


$options[] = array( "name" => __('Фон комментариев автора', 'inspiration'),
"id" => "author_comment_color",
"std" => "#ffffff",
"type" => "color");


$options[] = array( "name" => __('Стиль виджетов', 'inspiration'),
"type" => "heading");

$options[] = array(	"name" => __('Отображать боковую колонку в мобильной верссии?', 'inspiration'),
"desc" => __('Поставьте галочку, если хотите, чтобы в мобильной версии отображались виджеты под контентом.', 'inspiration'),
"id" => "widget_mobile_show",
"std" => "false",
"type" => "checkbox");



$options[] = array("name" => __('Расположение', 'inspiration'),
"class" => "sub-heading",
"type" => "devider");

$options[] = array("name" => __('Расположение боковой колонки (слева или справа)', 'inspiration'),
"id" => "blog_template",
"std" => "right-side",
"type" => "images",
"options" => array(
'right-side' => $imagepath . 'cs.gif',
'left-side' => $imagepath . 'sc.gif',

)
);

$options[] = array("name" => __('Фон', 'inspiration'),
"class" => "sub-heading",
"type" => "devider");





$options[] = array( "name" => __('Фон внутри виджета', 'inspiration'),
"id" => "widget_background",
"std" => array('color' => '#ffffff', 'image' => '', 'repeat' => 'repeat-x','position' => 'top center','attachment'=>'scroll'),
"type" => "background");

$options[] = array("name" => __('Граница', 'inspiration'),
"class" => "sub-heading",
"type" => "devider");

$options[] = array( "name" => __('Отображать границу вокруг виджетов?', 'inspiration'),
"id" => "widget_border",
"std" => "1px",
"type" => "radio",
"class" => "radio",
"options" => $post_border);

$options[] = array( "name" => __('Цвет границы виджетов', 'inspiration'),
"id" => "widget_border_color",
"std" => "#f7f9f9",
"type" => "color");

$options[] = array( "name" => __('Закругления углов виджетов', 'inspiration'),
"id" => "widget_curve",
"std" => "0",
"type" => "select",
"class" => "mini", //mini, tiny, small
"options" => $curve_array);

$options[] = array("name" => __('Заголовки', 'inspiration'),
"class" => "sub-heading",
"type" => "devider");

$options[] = array( "name" => __('Стиль заголовков виджетов', 'inspiration'),
"id" => "widget_typography",
"class" => "typestyle colorlinks",
"std" => array('size' => '22px','face' => 'arial','style' => 'normal', 'color' => '#000000'),
"type" => "typography");

$options[] = array( "name" => __('Трансформация букв', 'inspiration'),
"id" => "transform_widget",
"std" => "none",
"type" => "select",
"class" => "mini colorlinks", //mini, tiny, small
"options" => $transform_array);
  
$options[] = array( "name" => __('Расположение заголовка', 'inspiration'),
"id" => "widget_header_align",
"std" => "left",
"type" => "select",
"class" => "mini colorlinks", //mini, tiny, small
"options" => $widget_header_align);

$options[] = array( "name" => __('Цвет фона заголовка виджетов', 'inspiration'),
"id" => "widget_header_bg",
"std" => "",
"type" => "color");

$options[] = array( "name" => __('Стиль виджетов в футер', 'inspiration'),
"type" => "heading");

$options[] = array(	"name" => __('Отображать виджеты в футере в мобильной верссии?', 'inspiration'),
"desc" => __('Поставьте галочку, если хотите, чтобы в мобильной версии отображались виджеты в футер.', 'inspiration'),
"id" => "widget_footer_mobile_show",
"std" => "false",
"type" => "checkbox");



$options[] = array("name" => __('Количество в ряд', 'inspiration'),
"class" => "sub-heading",
"type" => "devider");

$options[] = array( "name" => __('3 или 4 виджета в ряд в футер?', 'inspiration'),
"id" => "widget_number",
"std" => "3",
"type" => "radio",
"class" => "radio",
"options" => $widget_number);


$options[] = array("name" => __('Фон', 'inspiration'),
"class" => "sub-heading",
"type" => "devider");

$options[] = array( "name" => __('Фон вокруг виджетов в футер', 'inspiration'),
"id" => "footer_widget_bg",
"std" => array('color' => '#f7f9f9', 'image' => '', 'repeat' => 'repeat-x','position' => 'top center','attachment'=>'scroll'),
"type" => "background");

$options[] = array( "name" => __('Фон внутри виджета', 'inspiration'),
"id" => "footer_widget_background",
"std" => array('color' => '', 'image' => '', 'repeat' => 'repeat-x','position' => 'top center','attachment'=>'scroll'),
"type" => "background");

$options[] = array("name" => __('Граница', 'inspiration'),
"class" => "sub-heading",
"type" => "devider");

$options[] = array( "name" => __('Закругления углов виджетов', 'inspiration'),
"id" => "footer_widget_curve",
"std" => "0",
"type" => "select",
"class" => "mini", //mini, tiny, small
"options" => $curve_array);

$options[] = array("name" => __('Заголовки', 'inspiration'),
"class" => "sub-heading",
"type" => "devider");

$options[] = array( "name" => __('Стиль заголовков виджетов', 'inspiration'),
"id" => "footer_widget_typography",
"class" => "typestyle colorlinks",
"std" => array('size' => '26px','face' => 'arial','style' => 'normal', 'color' => '#000000'),
"type" => "typography");

$options[] = array( "name" => __('Трансформация букв', 'inspiration'),
"id" => "footer_transform_widget",
"std" => "none",
"type" => "select",
"class" => "mini colorlinks", //mini, tiny, small
"options" => $transform_array);

$options[] = array( "name" => __('Цвет фона заголовка виджетов', 'inspiration'),
"id" => "footer_widget_header_bg",
"std" => "",
"type" => "color");


$options[] = array("name" => __('Текст', 'inspiration'),
"class" => "sub-heading",
"type" => "devider");


$options[] = array( "name" => __('Цвет текста и ссылок в виджетах', 'inspiration'),
"id" => "widget_footer_color",
"std" => "#000000",
"type" => "color");


$options[] = array( "name" => __('Стиль футер', 'inspiration'),
"type" => "heading");

$options[] = array("name" => __('Размер', 'inspiration'),
"class" => "sub-heading",
"type" => "devider");

$options[] = array("name" => __('Ширина нижней части', 'inspiration'),
"id" => "footer_width",
"std" => "100%",
"type" => "radio",
"class" => "radio",
"options" => $footer_width);

$options[] = array("name" => __('Фон', 'inspiration'),
"class" => "sub-heading",
"type" => "devider");

$options[] = array(
"name" => __('Фон нижней части блога footer', 'inspiration'),
"id" => "footer_background",
"std" => array('color' => '#0399cd', 'image' => '', 'repeat' => 'repeat','position' => 'top center','attachment'=>'scroll'),
"type" => "background");
						
$options[] = array("name" => __('Текст', 'inspiration'),
"class" => "sub-heading",
"type" => "devider");


$options[] = array( "name" => __('Цвет текста в footer', 'inspiration'),
"id" => "footer_color",
"std" => "#ffffff",
"type" => "color");

$options[] = array( "name" => __('Произвольный текст в нижней части блога', 'inspiration'),
"desc" => __('Здесь Вы можете написать свой текст. Он отобразиться в самом низу блога слева. В поле Вы можете использовать HTML теги', 'inspiration'),
"id" => "footer_text",
"std" => "",
"type" => "textarea"); 



$options[] = array( "name" => __('Копирайт', 'inspiration'),
"desc" => __('Здесь Вы можете написать свой текст копирайта. Можно использовать HTML. По умолчанию Заголовок сайта © 2020 · Все права защищены', 'inspiration'),
"id" => "footer_text_copyright",
"std" => "",
"type" => "textarea"); 



$options[] = array( "name" => __('Настройки статей', 'inspiration'),
"type" => "heading");
$options[] = array("name" => __('Макет страниц со статьями', 'inspiration'),
"class" => "sub-heading",
"type" => "devider");	
	
	$options[] = array("name" => __('Макет страниц со статьями', 'inspiration'),
"desc" => __('Выберите макет. Так будут отобржаться статьи на странице Блог и архивы', 'inspiration'),
"id" => "blog_layout",
"std" => "classic",
"type" => "radio",
"class" => "radio",
"options" => $blog_layout);

$options[] = array("name" => __('Настройка миниатюры', 'inspiration'),
"class" => "sub-heading",
"type" => "devider");

$options[] = array(	"name" => __('Отображать миниатюра в записях?', 'inspiration'),
"desc" => __('Поставьте галочку, если хотите, чтобы в статьях отображалась миниатюра записи.', 'inspiration'),
"id" => "thumbnail",
"std" => "true",
"type" => "checkbox");


$options[] = array("name" => __('Размер миниатюры (Рекомендуемый размер миниатюры 800*450))', 'inspiration'),
"desc" => __('Зайдите в раздел "Настройка" = "Медиафайлы" = укажите размеры в полях: "Размер миниатюры" = 150 на 150, "Средний размер" - 300 на 300', 'inspiration'),
"id" => "thumb_size",
"std" => "large",
"type" => "radio",
"class" => "radio",
"options" => $thumb_size);



$options[] = array("name" => __('Настройка стиля изображений', 'inspiration'),
"class" => "sub-heading",
"type" => "devider");

$options[] = array( "name" => __('Выберите из предложенных вариантов стиль изображений на блоге', 'inspiration'),
"id" => "image_style",
"std" => "border:1px solid #eaeaea !important; padding:3px;background-color: #fff;margin: 2px;",
"type" => "images",
"options" => array('border:none; margin:2px;' => $imagepath . 'nb.gif',
'border:4px solid #eaeaea;padding:0px; -webkit-border-radius: 3px; -moz-border-radius: 3px; border-radius: 3px; margin: 2px;' => $imagepath . 'bth.gif',
'border:1px solid #eaeaea !important; padding:3px;background-color: #fff;margin: 2px;' => $imagepath . 'bp.gif',
'border:1px solid #eaeaea !important; background-color:#fff; padding:3px; -webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px; box-shadow: 0 0 5px#eee;-moz-box-shadow: 0 0 5px#eee; -webkit-box-shadow:0 0 5px#eee;margin: 2px;' => $imagepath . 'bps.gif',
'border:1px solid #fff; box-shadow: 1px 3px 3px #888;-moz-box-shadow: 1px 3px 3px #888;-webkit-box-shadow:1px 3px 3px #888; margin:2px;' => $imagepath . 'bs1.gif',
' -webkit-border-radius: 7px; -moz-border-radius: 7px; border-radius: 7px; box-shadow: 2px 3px 3px #999;-moz-box-shadow: 2px 3px 3px #999;-webkit-box-shadow:2px 3px 3px #999; margin:2px;' => $imagepath . 'bs.gif' ));

$options[] = array("name" => __('Настройка отображения статей на главной странице', 'inspiration'),
"class" => "sub-heading",
"type" => "devider");

$options[] = array(	"name" => __('Полный текст статей на главной странице', 'inspiration'),
"desc" => __('Поставьте галочку, если хотите, чтобы на главной странице отображался весь текст статей вместо анонса', 'inspiration'),
"id" => "auto_more_switch",
"std" => "",
"type" => "checkbox");

$options[] = array( "name" => __('Кол-во знаков в анонсе статьи', 'inspiration'),
"desc" => __('Если Вы хотите, чтобы отображался анонс статьи, здесь Вы можете указать количество знаков в анонсе. По умолчанию 500 знаков.', 'inspiration'),
"id" => "auto_more_kolvo",
"std" => "500",
"class" => "mini",
"type" => "text");



$options[] = array("name" => __('Похожие записи', 'inspiration'),
"class" => "sub-heading",
"type" => "devider");

$options[] = array("name" => __('Метки или рубрики', 'inspiration'),
"desc" => __('Выберите, что будет отображаться в блоке Похожие записи', 'inspiration'),
"id" => "related_posts",
"std" => "categories",
"type" => "radio",
"class" => "radio",
"options" => $related_posts);

$options[] = array("name" => __('Комментарии соц сетей (3 в одном)', 'inspiration'),
"class" => "sub-heading",
"type" => "devider");

$options[] = array( "name" => __('Выберите, как будут отображаться комментарии 3 в одном', 'inspiration'),
"id" => "comments_tabber",
"std" => "1",
"type" => "select",
"class" => "mini", //mini, tiny, small
"options" => $comments_tabber);                        
                    
$options[] = array( "name" => __('Первая вкладка комментариев', 'inspiration'),
"id" => "comments_blog",
"std" => "1",
"type" => "select",
"class" => "mini colorlinks", //mini, tiny, small
"options" => $comments_choose1);                 
                    
$options[] = array( "name" => __('Вторая вкладка комментариев', 'inspiration'),
"id" => "comments_vk",
"std" => "2",
"type" => "select",
"class" => "mini colorlinks", //mini, tiny, small
"options" => $comments_choose3);    
 
 $options[] = array( "name" => __('Третья вкладка комментариев', 'inspiration'),
"id" => "comments_fb",
"std" => "3",
"type" => "select",
"class" => "mini", //mini, tiny, small
"options" => $comments_choose3);                     
                    
$options[] = array("name" => __('Смайлы в комментариях', 'inspiration'),
"class" => "sub-heading",
"type" => "devider");
                    
$options[] = array(
"desc" => __('Поставьте галочку, если хотите, чтобы в комментариях отображалась смайлики.', 'inspiration'),
"id" => "smiles",
"std" => "true",
"type" => "checkbox");

$options[] = array( "name" => __('Вставки', 'inspiration'),
"type" => "heading");
						

$options[] = array( "name" => __('Фавикон', 'inspiration'),
"desc" => __(' <strong>Размер картинки фавикона 16х16 пикселей в формате ico или gif</strong>. Создать фавикон: <a href="http://pr-cy.ru/favicon/" target="_blank">http://pr-cy.ru/favicon/</a>', 'inspiration'),
"id" => "favicon",
"std" => "",
"type" => "upload");

$options[] = array( "name" => __('Изображение в соц. сети по умолчанию', 'inspiration'),
"desc" => __('Загрузите изображение, которое будет уходить в фейсбук и другие социальные сети, если не указана миниатюра записи', 'inspiration'),
"id" => "facebook_image",
"std" => "",
"type" => "upload");

$options[] = array( "name" => __('Ключевая фраза блога', 'inspiration'),
"desc" => __('Эта фраза необходима для мета-тега заголовка на главной странице. На внутренних страницах будет использоваться заголовок статьи', 'inspiration'),
"id" => "blog_title",
"std" => "",
"type" => "text");

  $options[] = array("name" => __('Социальные сети', 'inspiration'),
"class" => "sub-heading",
"type" => "devider");

$options[] = array( "name" => __('ID Twitter', 'inspiration'),
"desc" => __('Регистрация в Twitter: <a href="https://twitter.com">https://twitter.com</a>', 'inspiration'),
"id" => "twitter",
"std" => "",
"class" => "mini",
"type" => "text");

$options[] = array( "name" => __('APP ID (ID приложения Facebook).', 'inspiration'),
"desc" => __('Получить ID приложения Facebook: <a href="https://developers.facebook.com" target="_blank">https://developers.facebook.com</a>', 'inspiration'),
"id" => "facebook_app",
"std" => "",
"class" => "mini",
"type" => "text");

$options[] = array( "name" => __('ID Пикселя Facebook ', 'inspiration'),
"desc" => __('Для платной рекламы в Facebook', 'inspiration'),
"id" => "fbpixel",
"std" => "",
"class" => "mini",
"type" => "text");



$options[] = array( "name" => __('APP ID Vkontakte', 'inspiration'),
"desc" => __('Получить ID приложения Vkontakte: <a href="https://vk.com/dev" target="_blank">https://vk.com/dev</a>', 'inspiration'),
"id" => "vk_app",
"std" => "",
"class" => "mini",
"type" => "text");


$options[] = array( "name" => __('ID Группы в Одноклассниках', 'inspiration'),
"desc" => __('Получить ID группы в Одноклассниках: <a href="https://ok.ru/" target="_blank">https://ok.ru/</a>', 'inspiration'),
"id" => "ok_ip",
"std" => "",
"class" => "mini",
"type" => "text");

  $options[] = array("name" => __('Вставки в Head (вебмастер)', 'inspiration'),
"class" => "sub-heading",
"type" => "devider");


	$options[] = array( "name" => __('Вставка мета тегов и других скриптов в head', 'inspiration'),
						"desc" => __('Webmaster Tools: <a href="https://goo.gle/searchconsole" target="_blank">https://goo.gle/searchconsole</a><br><br>
						Яндекс Вебмастер: <a href="https://webmaster.yandex.ru/" target="_blank">https://webmaster.yandex.ru/</a>', 'inspiration'),
						"id" => "metatag",
						"std" => "",
						"type" => "textarea"); 
						
						  $options[] = array("name" => __('Счетчики Google и Yandex', 'inspiration'),
"class" => "sub-heading",
"type" => "devider");
						
						$options[] = array( "name" => __('ID кода статистики посещаемости Google Analytics', 'inspiration'),
						"desc" => __('Google Analytics: <a href="https://analytics.google.com" target="_blank">https://analytics.google.com</a>', 'inspiration'),
						"id" => "google_analytics",
						"std" => "",
						"class" => "mini",
						"type" => "text"); 
						

	$options[] = array( "name" => __('ID кода статистики посещаемости в Yandex Метрика', 'inspiration'),
						"desc" => __('Yandex Метрика: <a href="https://metrika.yandex.ru" target="_blank">https://metrika.yandex.ru</a>', 'inspiration'),
						"id" => "yandex_analytics",
						"std" => "",
						"class" => "mini",
						"type" => "text"); 
						
						  $options[] = array("name" => __('Партнерская ссылка', 'inspiration'),
"class" => "sub-heading",
"type" => "devider");
						
	$options[] = array( "name" => __('Партнерская ссылка AB-Inspiration', 'inspiration'),
						"desc" => __(' <a href="https://wpab.ru/newpartner">Регистрация в партнерской программе</a> ', 'inspiration'),
						"id" => "promotion",
						"std" => "http://anfisabreus.ru",
						"class" => "mini",
                        "type" => "text");
                        
                        
                        $options[] = array("name" => __('Капча для формы отзывов', 'inspiration'),
"class" => "sub-heading",
"type" => "devider");


$options[] = array(
"desc" => __('Использовать капчу? (поставьте галочку, если хотите, чтобы под формой отзывов была капча.)', 'inspiration'),
"id" => "recaptcha_use",
"std" => "0",
"type" => "checkbox");	
                        
                        $options[] = array( "name" => __('Ключ для капчи', 'inspiration'),
						"desc" => __('Использовать капчу боковой колонке в форме отзывов? Требуется <a href="https://ab-inspiration.com/downloads/testimonials/">плагин
"Отзывы"</a>. Получить ключ: <a href="https://www.google.com/recaptcha" target="_blank">https://www.google.com/recaptcha</a>', 'inspiration'),
						"id" => "recaptcha",
						"std" => "",
						"class" => "",
						"type" => "text"); 
						
 $options[] = array("name" => __('Политика обработки персональных данных', 'inspiration'),
"class" => "sub-heading",
"type" => "devider");
						
						
						
$options[] = array( "name" => __('Политика обработки персональных данных', 'inspiration'),
"desc" => __('Данный текст будет отображаться во всплывающем окне при клике на ссылку под формой подписки в боковой колонке, в конце статьи и в
форме <a href="https://ab-inspiration.com/downloads/live-form-slider/">плагина "Живая форма + Слайдер" </a> .', 'inspiration'),
"id" => "obrabotka_dannyh_text",
"std" => "Настоящим я даю согласие на обработку моих персональных данных Владельцем сайта, в том числе на совершение Владельцем сайта действий, предусмотренных п. 3 ст. 3 Федерального закона от 27.07.2006 года № 152-ФЗ «О персональных данных», любыми способами, для целей заключения и исполнения договоров между мной и Владельцем сайта.",
"type" => "textarea"); 						
						
						
						
					
$options[] = array( "name" => __('Форма в виджете', 'inspiration'),
"type" => "heading");

$options[] = array("name" => __('Настройка полей формы', 'inspiration'),
"class" => "sub-heading",
"type" => "devider");
$options[] = array(
"desc" => __('Отображать поле Имя?', 'inspiration'),
"id" => "name_field",
"std" => "1",
"type" => "checkbox");

$options[] = array( "name" => __('Текст в поле имени', 'inspiration'),
"id" => "name_field_text",
"std" => __('Ваше имя...', 'inspiration'),
"type" => "text");

$options[] = array( "name" => __('Текст в поле email', 'inspiration'),
"id" => "email_field_text",
"std" => "Ваш email..",
"type" => "text");

$options[] = array("name" => __('Настройка стиля заголовка в форме подписки в боковой колонке', 'inspiration'),
"class" => "sub-heading",
"type" => "devider");

$options[] = array( "name" => __('Воспользуйтесь редактором для создания заголовка', 'inspiration'),
"id" => "form_text",
"std" => __('Текст заголовка для формы подписки', 'inspiration'),
"type" => "editor");				
						
$options[] = array( "name" => __('Общий стиль шрифта заголовка', 'inspiration'),
"id" => "form_typography",
"std" => array('size' => '28px','face' => 'arial','style' => 'normal', 'color' => '#000000'),
"type" => "typography");

$options[] = array( "name" => __('Трансформация букв', 'inspiration'),
"id" => "form_widget_transform",
"std" => "capitalize",
"type" => "select",
"class" => "mini", //mini, tiny, small
"options" => $transform_array);

$options[] = array("name" => __('Политика обработки персональных данных в форме подписки в боковой колонке', 'inspiration'),
"class" => "sub-heading",
"type" => "devider");

$options[] = array( "name" => __('Текст ссылки на политику обработки персональных данных', 'inspiration'),
"desc" => __('Согласно закону № 152-ФЗ «О персональных данных» необходимо ознакомить подписчика с политикой конфиденциальности и обработки персональных данных. Сам текст политики необходимо прописать в поле "Политика обработки персональных данных" в разделе Вставки', 'inspiration'),
"id" => "form_garant",
"std" => __('Нажимая на кнопку, я соглашаюсь с политикой обработки персональных данных', 'inspiration'),
"type" => "text");

$options[] = array( "name" => __('Цвет шрифта текста политики', 'inspiration'),
"desc" => __('Цвет шрифта текста гарантии.', 'inspiration'),
"id" => "garantiya_typography",
"std" => "#535353",
"type" => "color");

$options[] = array("name" => __('Изображение для формы', 'inspiration'),
"class" => "sub-heading",
"type" => "devider");

$options[] = array( "name" => __('Здесь можно загрузить картинку для формы подписки.', 'inspiration'),
"id" => "form_uploader",
"std" => $imagepath . 'formimage.png',
"type" => "upload");

$options[] = array("name" => __('Настройка фона формы подписки', 'inspiration'),
"class" => "sub-heading",
"type" => "devider");

$options[] = array( "name" => __('Отсуп формы от заголовка и картинки', 'inspiration'), 
"id" => "margin_heading_form",
"std" => "0",
"class" => "mini",
"type" => "text");



$options[] = array( "name" => __('Цвет фона формы подписки вверху', 'inspiration'),
"desc" => __('Цвет фона формы подписки.', 'inspiration'),
"id" => "form_colorpicker",
"std" => "#f7f9f9",
"type" => "color");

$options[] = array( "name" => __('Цвет фона формы подписки внизу', 'inspiration'),
"desc" => __('Цвет фона формы подписки.', 'inspiration'),
"id" => "form_colorpicker_bottom",
"std" => "#f7f9f9",
"type" => "color");

$options[] = array( "name" => __('Фон в виде изображения (максимальная ширина: 320px). Если вы используете изображение как фон, "Цвет фона формы подписки внизу" отображаться не будет', 'inspiration'),
"id" => "widgetform_background",
"std" => '',
"type" => "upload");

$options[] = array( "name" => __('Расположение фона', 'inspiration'),
"id" => "form_widget_bg_pos",
"std" => "top center",
"type" => "select",
"class" => "mini", //mini, tiny, small
"options" => $background_widget_form);



$options[] = array("name" => __('Настройка границы формы подписки', 'inspiration'),
"class" => "sub-heading",
"type" => "devider");

$options[] = array(
"desc" => __('Отображать границу вокруг формы', 'inspiration'),
"id" => "widget_form_border",
"std" => "1",
"type" => "checkbox");	

$options[] = array( "name" => __('Цвет границы формы подписки', 'inspiration'),
"desc" => __('Цвет фона формы подписки.', 'inspiration'),
"id" => "form_colorpicker_border",
"std" => "#e5e5e5",
"type" => "color");

$options[] = array( "name" => __('Отображать тень вокруг формы?', 'inspiration'),
"id" => "widget_form_shadow",
"std" => "0",
"type" => "radio",
"class" => "radio",
"options" => $widget_form_shadow);

$options[] = array("name" => __('Настройка кнопки формы подписки', 'inspiration'),
"class" => "sub-heading",
"type" => "devider");

$options[] = array( "name" => __('Выбор кнопки подписки.', 'inspiration'),
"id" => "form_button",
"std" => $imagepath . 'blue-button.png',
"class" => "buttonsidebar",
"type" => "images",
"options" => array(
$imagepath . 'blue-button.png' => $imagepath . 'blue-button-prev.png',
$imagepath . 'dark-blue-button.png' => $imagepath . 'dark-blue-button-prev.png',
$imagepath . 'dark-green-button.png' => $imagepath . 'dark-green-button-prev.png',
$imagepath . 'dark-orange-button.png' => $imagepath . 'dark-orange-button-prev.png',
$imagepath . 'dark-red-button.png' => $imagepath . 'dark-red-button-prev.png',
$imagepath . 'green-button.png' => $imagepath . 'green-button-prev.png',
$imagepath . 'orange-button.png' => $imagepath . 'orange-button-prev.png',
$imagepath . 'red-button.png' => $imagepath . 'red-button-prev.png'
)
);

$options[] = array("name" => __('Создать свой стиль кнопки', 'inspiration'),
"class" => "sub-heading",
"type" => "devider");

$options[] = array(
"desc" => __('Поставьте галочку, если хотите создать свою кнопку', 'inspiration'),
"id" => "custom_button",
"std" => "1",
"type" => "checkbox");	

$options[] = array( "name" => __('Цвет кнопки', 'inspiration'),
"id" => "button_color_custom",
"std" => "#ffcb03",
"class" => "colorlinks", 
"type" => "color");

$options[] = array( "name" => __('При наведении мышкой', 'inspiration'),
"id" => "button_color_custom_hover",
"std" => "#0399cd",
"type" => "color");

$options[] = array( "name" => __('Тень внутри/вокруг кнопки?', 'inspiration'),
"desc" => __('Отображать тень внутри кнопки?', 'inspiration'),
"id" => "shadow_inner_button",
"std" => "0",
"type" => "checkbox");	

$options[] = array(
"desc" => __('Отображать тень вокруг кнопки?', 'inspiration'),
"id" => "shadow_outer_button",
"std" => "0",
"type" => "checkbox");	

$options[] = array( "name" => __('Граница вокруг кнопки?', 'inspiration'),
"desc" => __('Отображать границу?', 'inspiration'),
"id" => "border_button",
"std" => "0",
"type" => "checkbox");

$options[] = array( "name" => __('Цвет границы', 'inspiration'),
"id" => "border_button_color",
"std" => "#ffcb03",
"class" => "colorlinks", 
"type" => "color");

$options[] = array( "name" => __('При наведении мышкой', 'inspiration'),
"id" => "border_button_color_hover",
"std" => "#0399cd",
"type" => "color");

$options[] = array( "name" => __('Высота кнопки', 'inspiration'), 
"id" => "custon_button_height",
"std" => "50",
"class" => "mini",
"type" => "text");

$options[] = array("name" => __('Текст на кнопке', 'inspiration'),
"class" => "sub-heading",
"type" => "devider");

$options[] = array( "name" => __('Текст на кнопке', 'inspiration'),
"desc" => __('Текст на кнопке', 'inspiration'),
"id" => "button_text",
"std" => __('ПОЛУЧИТЬ ДОСТУП!', 'inspiration'),
"type" => "text");

$options[] = array( "name" => __('Стиль текста на кнопке', 'inspiration'),
"id" => "button_text_typography",
"class" => "typestyle",
"std" => array('size' => '22px','face' => 'arial','style' => 'normal', 'color' => '#ffffff'),
"type" => "typography");

$options[] = array( "name" => __('Кнопки "Поделиться" в начале текста', 'inspiration'),
"type" => "heading");


$options[] = array("name" => __('Внешний вид кнопок', 'inspiration'),
"class" => "sub-heading",
"type" => "devider");

$options[] = array("name" => __('Стиль', 'inspiration'),
"id" => "share_skin",
"std" => "2",
"type" => "radio",
"class" => "radio divider",
"options" => $share_skin);


$options[] = array(
		'name' => __( 'Отметьте, какие кнопки отображать', 'inspiration' ),
		'id' => 'show_share_buttons',
		'std' => $show_buttons_defaults,
		'type' => 'multicheck',
		"class" => "multicheck",
		'options' => $show_buttons
	);
	
$options[] = array("name" => __('Текст на кнопоках', 'inspiration'),
"class" => "sub-heading",
"type" => "devider");

$options[] = array( "name" => __('Facebook', 'inspiration'),
"id" => "text_facebook",
"std" => "Facebook",
"class" => "mini colorlinks",
"type" => "text");


$options[] = array( "name" => __('Twitter', 'inspiration'),
"id" => "text_twitter",
"std" => "Twitter",
"class" => "mini colorlinks",
"type" => "text");

$options[] = array( "name" => __('Telegram', 'inspiration'),
"id" => "text_telegram",
"std" => "Telegram",
"class" => "mini colorlinks",
"type" => "text");

$options[] = array( "name" => __('Vkontakte', 'inspiration'),
"id" => "text_vkontakte",
"std" => "VK",
"class" => "mini colorlinks",
"type" => "text");
$options[] = array( "name" => __('Odnoklassniki', 'inspiration'),
"id" => "text_odnoklassniki",
"std" => "OK",
"class" => "mini colorlinks",
"type" => "text");


$options[] = array( "name" => __('Pinterest', 'inspiration'),
"id" => "text_pinterest",
"std" => "Pinterest",
"class" => "mini colorlinks",
"type" => "text");

$options[] = array( "name" => __('Linkedin', 'inspiration'),
"id" => "text_linkedin",
"std" => "Linkedin",
"class" => "mini marginzerobottom",
"type" => "text");

	
$options[] = array("name" => __('Где отображать кнопки?', 'inspiration'),
"class" => "sub-heading",
"type" => "devider");

$options[] = array(

		
		'id' => 'share_display',
		'std' => $share_display_defaults, // These items get checked by default
		'type' => 'multicheck',
		"class" => "multicheck divider",
		'options' => $share_display
	);


$options[] = array( "name" => __('Кнопки "Поделиться" в конце статьи', 'inspiration'),
"type" => "heading");



$options[] = array("name" => __('Внешний вид кнопок', 'inspiration'),
"class" => "sub-heading",
"type" => "devider");


$options[] = array(
		'name' => __( 'Отметьте, какие кнопки отображать', 'inspiration' ),
		'id' => 'show_share_buttons_bottom',
		'std' => $show_buttons_defaults,
		'type' => 'multicheck',
		"class" => "multicheck",
		'options' => $show_buttons
	);
	
$options[] = array("name" => __('Текст на кнопоках', 'inspiration'),
"class" => "sub-heading",
"type" => "devider");

$options[] = array( "name" => __('Facebook', 'inspiration'),
"id" => "text_facebook_bottom",
"std" => "Facebook",
"class" => "mini colorlinks",
"type" => "text");



$options[] = array( "name" => __('Twitter', 'inspiration'),
"id" => "text_twitter_bottom",
"std" => "Twitter",
"class" => "mini colorlinks",
"type" => "text");


$options[] = array( "name" => __('Telegram', 'inspiration'),
"id" => "text_telegram_bottom",
"std" => "Telegram",
"class" => "mini colorlinks",
"type" => "text");

$options[] = array( "name" => __('Vkontakte', 'inspiration'),
"id" => "text_vkontakte_bottom",
"std" => "VK",
"class" => "mini colorlinks",
"type" => "text");



$options[] = array( "name" => __('Odnoklassniki', 'inspiration'),
"id" => "text_odnoklassniki_bottom",
"std" => "OK",
"class" => "mini colorlinks",
"type" => "text");


$options[] = array( "name" => __('Pinterest', 'inspiration'),
"id" => "text_pinterest_bottom",
"std" => "Pinterest",
"class" => "mini colorlinks",
"type" => "text");

$options[] = array( "name" => __('Linkedin', 'inspiration'),
"id" => "text_linkedin_bottom",
"std" => "Linkedin",
"class" => "mini marginzerobottom",
"type" => "text");
	
$options[] = array("name" => __('Где отображать кнопки?', 'inspiration'),
"class" => "sub-heading",
"type" => "devider");

$options[] = array(

		
		'id' => 'share_display_bottom',
		'std' => $share_display_defaults, // These items get checked by default
		'type' => 'multicheck',
		"class" => "multicheck divider",
		'options' => $share_display
	);

$options[] = array("name" => __('Стиль блока', 'inspiration'),
"class" => "sub-heading",
"type" => "devider");

$options[] = array( "name" => __('Фон блока', 'inspiration'),
"id" => "share_bg",
"std" => "#ffffff",
"type" => "color");

$options[] = array("name" => __('Граница', 'inspiration'),
"class" => "sub-heading",
"type" => "devider");

$options[] = array("desc" => __('Отображать границу вокруг блока "Поделиться"?', 'inspiration'),
"id" => "share_border",
"std" => "0",
"type" => "checkbox");

$options[] = array( "name" => __('Цвет границы', 'inspiration'),
"id" => "share_border_color",
"std" => "#ffffff",
"class" => "colorlinks", 
"type" => "color");

$options[] = array( "name" => __('Закругления углов', 'inspiration'),
"id" => "share_curve",
"std" => "0",
"type" => "select",
"class" => "mini", //mini, tiny, small
"options" => $curve_array);

$options[] = array("name" => __('Текст', 'inspiration'),
"class" => "sub-heading",
"type" => "devider");
$options[] = array( "name" => __('Текст заголовка для кнопок "ПОДЕЛИТЬСЯ" в конце статьи', 'inspiration'),
"desc" => __('Здесь Вы можете указать свой заголовок', 'inspiration'),
"id" => "header_button",
"std" => __('Интересная статья? Поделитесь ею пожалуйста с другими:', 'inspiration'),
"type" => "text");

$options[] = array( "name" => __('Стиль шрифта заголовка для кнопок "ПОДЕЛИТЬСЯ"', 'inspiration'),
"desc" => __('Стиль шрифта заголовка для кнопок "ПОДЕЛИТЬСЯ"', 'inspiration'),
"id" => "header_button_post_style",
"std" => array('size' => '18px','face' => 'arial','style' => 'normal', 'color' => '#000000'),
"type" => "typography");

$options[] = array( "name" => __('Расположение заголовка', 'inspiration'),
"id" => "share_header_align",
"std" => "text-align:left",
"type" => "select",
"class" => "mini", //mini, tiny, small
"options" => $position_title);

$options[] = array( "name" => __('Форма в конце статьи', 'inspiration'),
"type" => "heading");
						
$options[] = array("name" => __('Форма подписки в конце статьи', 'inspiration'),
"class" => "sub-heading",
"type" => "devider");

$options[] = array(
"desc" => __('Поставьте галочку, если хотите, чтобы форма подписки отображалась в конце каждой статьи', 'inspiration'),
"id" => "form_bottom_embed",
"std" => "true",
"type" => "checkbox");

$options[] = array("name" => __('Рассыльщик писем', 'inspiration'),
"class" => "sub-heading",
"type" => "devider");
						
$options[] = array( "name" => __('Выберите сервис рассыльщика писем, которым Вы пользуетесь', 'inspiration'),
"id" => "form_choose",
"std" => "smartform",
"type" => "select",
"class" => "mini", //mini, tiny, small
"options" => $form_choose);
                    
$options[] = array(
"id" => "smart_form",
"std" => "",
"type" => "smart");    
                    
 $options[] = array(
"id" => "just_form",
"std" => "",
"type" => "just"); 

 $options[] = array(
"id" => "getresp_form",
"std" => "",
"type" => "getresponse"); 


 $options[] = array(
"id" => "getresp360_form",
"std" => "",
"type" => "getresponse360"); 

 $options[] = array(
"id" => "sendpulse_form",
"std" => "",
"type" => "sendpulse"); 


 $options[] = array(
"id" => "mailchimp_form",
"std" => "",
"type" => "mailchimp"); 

 $options[] = array(
"id" => "unisender_form",
"std" => "",
"type" => "unisender"); 

 $options[] = array(
"id" => "autoweboffice_form",
"std" => "",
"type" => "autoweboffice"); 

 $options[] = array(
"id" => "mailerlite_form",
"std" => "",
"type" => "mailerlite"); 

$options[] = array(
"id" => "onebutton_form",
"std" => "",
"class" => "mini",
"type" => "onebutton"); 



$options[] = array("name" => __('Настройка полей формы', 'inspiration'),
"class" => "sub-heading",
"type" => "devider");
$options[] = array(
"desc" => __('Отображать поле Имя?', 'inspiration'),
"id" => "name_field_bottom",
"std" => "1",
"type" => "checkbox");

$options[] = array( "name" => __('Текст в поле имени', 'inspiration'),
"id" => "name_field_text_bottom",
"std" => __('Ваше имя...', 'inspiration'),
"type" => "text");

$options[] = array( "name" => __('Текст в поле email', 'inspiration'),
"id" => "email_field_text_bottom",
"std" => __('Ваш email...', 'inspiration'),
"type" => "text");

$options[] = array("name" => __('Фон', 'inspiration'),
"class" => "sub-heading",
"type" => "devider");

$options[] = array( "name" => __('Цвет фона блоке "Форма подписки"', 'inspiration'),
"id" => "post_form_colorpicker",
"std" => "#f7f9f9",
"type" => "color");

$options[] = array( "name" => __('Фон в виде картинки (ширина: 587px, высота: 210px)', 'inspiration'),
"id" => "postform_background",
"std" => '',
"type" => "upload");

$options[] = array("name" => __('Граница', 'inspiration'),
"class" => "sub-heading",
"type" => "devider");

$options[] = array("desc" => __('Отображать границу вокруг блока "Форма подписки?"', 'inspiration'),
"id" => "postform_border",
"std" => "1",
"type" => "checkbox");

$options[] = array( "name" => __('Цвет границы', 'inspiration'),
"id" => "postform_border_color",
"std" => "#f7f9f9",
"class" => "colorlinks", 
"type" => "color");

$options[] = array( "name" => __('Закругления углов', 'inspiration'),
"id" => "postform_curve",
"std" => "0",
"type" => "select",
"class" => "mini", //mini, tiny, small
"options" => $curve_array);

$options[] = array("name" => __('Текст', 'inspiration'),
"class" => "sub-heading",
"type" => "devider");

$options[] = array( "name" => __('Воспользуйтесь редактором для создания заголовка', 'inspiration'),
"id" => "form_post_header",
"std" => __('Текст заголовка для формы подписки', 'inspiration'),
"type" => "editor");	

$options[] = array( "name" => __('Общий стиль шрифта заголовка', 'inspiration'),
"id" => "header_form_post_style",
"std" => array('size' => '18px', 'face' => 'arial','style' => 'normal', 'color' => '#000000'),
"type" => "typography");

$options[] = array("name" => __('Политика обработки персональных данных в форме подписки в боковой колонке', 'inspiration'),
"class" => "sub-heading",
"type" => "devider");

$options[] = array( "name" => __('Текст ссылки на политику обработки персональных данных', 'inspiration'),
"desc" => __('Согласно закону № 152-ФЗ «О персональных данных» необходимо ознакомить подписчика с политикой конфиденциальности и обработки персональных данных. Сам текст политики необходимо прописать в поле "Политика обработки персональных данных" в разделе Вставки', 'inspiration'),
"id" => "form_garant_bottom",
"std" => __('Нажимая на кнопку, я соглашаюсь с политикой обработки персональных данных', 'inspiration'),
"type" => "text");


$options[] = array( "name" => __('Цвет шрифта текста политики', 'inspiration'),
"desc" => __('Цвет шрифта текста гарантии.', 'inspiration'),
"id" => "garantiya_typography_bottom",
"std" => "#535353",
"type" => "color");

$options[] = array("name" => __('Изображение', 'inspiration'),
"class" => "sub-heading",
"type" => "devider");

$options[] = array( "name" => __('Здесь можно загрузить картинку для формы подписки.', 'inspiration'),
"id" => "form_uploader_post",
"std" => $imagepath . 'formimage.png',
"type" => "upload");


$options[] = array("name" => __('Где располагается форма если нет картинки?', 'inspiration'),
"id" => "form_uploader_transparent",
"std" => "2",
"type" => "radio",
"class" => "radio",
"options" => $formpost_position);
					
$options[] = array("name" => __('Кнопка', 'inspiration'),
"class" => "sub-heading",
"type" => "devider");
					
$options[] = array( "name" => __('Текст на кнопке', 'inspiration'),
"desc" => __('Текст на кнопке', 'inspiration'),
"id" => "text_form_bottom",
"std" => __('Получить доступ!', 'inspiration'),
"type" => "text");

$options[] = array( "name" => __('Стиль текста на кнопке', 'inspiration'),
"id" => "button_text_postform",
"class" => "typestyle",
"std" => array('size' => '24px','face' => 'arial','style' => 'normal', 'color' => '#ffffff'),
"type" => "typography");

$options[] = array(
"name" => __('Цвет фона кнопки', 'inspiration'),
"id" => "post_bg_button",
"std" => "#ffcb03",
"type" => "color",
"class" => "colorlinks");

$options[] = array(
"name" => __('Цвет фона кнопки по наведении мышки', 'inspiration'),
"id" => "post_bg_button_hover",
"std" => "#0399cd",
"type" => "color");





$options[] = array( "name" => __('Баннеры', 'inspiration'),
"type" => "heading");

$options[] = array("name" => __('Заголовок виджета с Баннерами', 'inspiration'),
"class" => "sub-heading",
"type" => "devider");

$options[] = array(
"name" => __('По умолчанию заголовок - Рекомендую', 'inspiration'),
"id" => "image_header",
"std" => "Рекомендую",
"type" => "text");

$options[] = array("name" => __('Менять местами баннеры?', 'inspiration'),
"class" => "sub-heading",
"type" => "devider");

$options[] = array(
"desc" => __('Отметьте галочкой если хотите чтобы баннеры менялись местами.', 'inspiration'),
"id" => "ad_rotate",
"std" => "1",
"type" => "checkbox");

$options[] = array("name" => __('Баннер №1', 'inspiration'),
"class" => "sub-heading",
"type" => "devider");

$options[] = array( "name" => __('Ссылка на изображение для Баннера #1', 'inspiration'),
"desc" => __('По умолчанию здесь установлен баннер <strong>"МЛМ-Блог за час"</strong> - Вы можете указать ссылку на другой баннер.', 'inspiration'),
"id" => "ad_image_1",
"std" => $imagepath . 'wptraining.png',
"type" => "text");
$options[] = array( "name" => __('Партнерская ссылка для Баннера #1', 'inspiration'),
"id" => "ad_url_1",
"std" => "",
"type" => "text");

$options[] = array("name" => __('Баннер №2', 'inspiration'),
"class" => "sub-heading",
"type" => "devider");

$options[] = array( "name" => __('Ссылка на изображение Баннер #2', 'inspiration'),
"desc" => __('Здесь укажите ссылку на баннер (картинку). Баннер должет быть размером 125px*125px.', 'inspiration'),
"id" => "ad_image_2",
"std" => $imagepath . 'blog-sam.png',
"type" => "text");
$options[] = array( "name" => __('Партнерская ссылка для Баннера #2', 'inspiration'),
"id" => "ad_url_2",
"std" => "",
"type" => "text");

$options[] = array("name" => __('Баннер №3', 'inspiration'),
"class" => "sub-heading",
"type" => "devider");

$options[] = array( "name" => __('Ссылка на изображение для Баннера #3', 'inspiration'),
"desc" => __('Здесь укажите ссылку на баннер (картинку). Баннер должет быть размером 125px*125px.', 'inspiration'),
"id" => "ad_image_3",
"std" => $imagepath . 'zaglushka.png',
"type" => "text");
$options[] = array( "name" => __('Партнерская ссылка для Баннера #3', 'inspiration'),
"id" => "ad_url_3",
"std" => "",
"type" => "text");

$options[] = array("name" => __('Баннер №4', 'inspiration'),
"class" => "sub-heading",
"type" => "devider");

$options[] = array( "name" => __('Ссылка на изображение для Баннера #4', 'inspiration'),
"desc" => __('Здесь укажите ссылку на баннер (картинку). Баннер должет быть размером 125px*125px.', 'inspiration'),
"id" => "ad_image_4",
"std" => $imagepath . 'zaglushka.png',
"type" => "text");

$options[] = array( "name" => __('Партнерская ссылка для Баннера #4', 'inspiration'),
"id" => "ad_url_4",
"std" => "",
"type" => "text");

if ( is_plugin_active( 'ab-expop/ab-expop.php' ) ) {

$options[] = array( "name" => __('Попап', 'inspiration'),
"type" => "heading");
						


$options[] = array( "name" => __('Фоновый цвет попап окна', 'inspiration'),
"id" => "popup_bg",
"std" => $imagepath . 'blue.png',
"type" => "select",
"class" => "mini colorlinks", //mini, tiny, small
"options" => array(
$imagepath . 'expop/red.png' => __('Красный', 'inspiration'),
$imagepath . 'expop/blue.png' => __('Синий', 'inspiration'),
$imagepath . 'expop/green.png' => __('Зеленый', 'inspiration'),
$imagepath . 'expop/grey.png' => __('Серый', 'inspiration'),
$imagepath . 'expop/pink.png' => __('Розовый', 'inspiration'),
$imagepath . 'expop/teal.png' => __('Бирюзовый', 'inspiration'),
$imagepath . 'expop/purple.png' => __('Фиолетовый', 'inspiration'),
)
);

$options[] = array( "name" => __('Кнопка подписки', 'inspiration'),
"id" => "popup_button",
"std" => $imagepath . 'blue-button.png',
"type" => "select",
"class" => "mini", //mini, tiny, small
"options" => array(
$imagepath . 'dark-blue-button.png' => __('Темно-синяя', 'inspiration'),
$imagepath . 'blue-button.png' => __('Синяя', 'inspiration'),
$imagepath . 'dark-green-button.png' => __('Темно-зеленая', 'inspiration'),
$imagepath . 'green-button.png' => __('Зеленая', 'inspiration'),
$imagepath . 'dark-orange-button.png' => __('Темно-оранжевая', 'inspiration'),
$imagepath . 'orange-button.png' => __('Оранжевая', 'inspiration'),
$imagepath . 'dark-red-button.png' => __('Темно-красная', 'inspiration'),
$imagepath . 'red-button.png' => __('Красная', 'inspiration')
)
);
}


	return $options;
	
	
}