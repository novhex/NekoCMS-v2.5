<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="http://localhost/f/css/bootstrap.min.css">
	<title> Welcome to CodeIgniter </title>
</head>
<body>
<h1>Welcome to CodeIgniter</h1>
<?php echo 'Currrent Version: '.CI_VERSION; ?>
<table>
<?php foreach($list as $data):?>
<?php echo '<tr>'; ?>
<?php echo '<td>'.$data->book_name.'<td>'; ?>
<?php echo '</tr>'; ?>
<?php endforeach; ?>
</table>
<?php echo $page_links; ?>
</body>
</html>