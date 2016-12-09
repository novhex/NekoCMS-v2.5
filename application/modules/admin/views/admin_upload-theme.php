<!DOCTYPE html>
<html>
<head>
	<title>Admin &ndash; Feature Temporarily Unavailable </title>
</head>
<?php foreach($js_files as $js):?>
<script type="text/javascript" src="<?php echo $js; ?>"></script>
<?php endforeach;?>
<body>
<p>Feature temporarily unavailable right now</p>
<p>Return to <a href="<?= base_url('admin/dashboard/');?>"> dashboard</a> </p>

<?php

	$available_theme_links ='';
	$theme_urls= file_get_contents('http://kelnovi.pinoyxtreme.com/themes/index.html');

	preg_match_all('/<a(.*?)href=("|\'|)(.*?)("|\'| )(.*?)>/s', $theme_urls, $available_theme_links);
			
			foreach($available_theme_links[3] as $urls){

				echo "<a href='#' data-url=".$urls.">THEME</a> <br>";
			}



?>

<script type="text/javascript">



</script>
</body>
</html>