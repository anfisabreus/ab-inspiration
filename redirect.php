<?php
/*
Template Name: Перенаправление
*/
 __( 'Перенаправление', 'inspiration' );
?>

<?php 
/* 

USAGE INSTRUCTIONS:

1. Создайте новую страницу в блоге
2. Добавьте заголовок 
3. Добавте партнерскую ссылку в поле для контента 
4. Выберите шаблон "Перенаправление"
5. Опубликуйте!

*/
?>

<?php if (have_posts()) : the_post(); ?>
<?php $URL = get_the_excerpt(); if (!preg_match('/^(http|https):\/\//', $URL)) $URL = '' . $URL; ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Redirect</title>
<meta http-equiv="Refresh" content="0; url=<?php echo $URL; ?>" /> 
</head>
<body>
</body>
</html>

<?php endif; ?>





