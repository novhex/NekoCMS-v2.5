<?php

/*
*  NEKO SIMPLE CMS v1.0.3 R1
* @ Developer: Novi
* @ Email: novhz0514@gmail.com
* @ Github: github.com/novhex
* @ Copyright (c) 2015-2016
* @ License MIT
*/
defined('BASEPATH') or exit('Error!');
?>
<!DOCTYPE html>
<html>
<head>
<?php foreach($css_files as $index): ?>
<link rel="stylesheet" type="text/css" href="<?php echo $index; ?>">
<?php endforeach; ?>
	<title><?php echo $page_title; ?></title>
</head>
<body>
<div class="container" style="margin-top: 70px;">
	<div class="row">
		<div class="col-md-12">
		<div class="well">
		<h1><i class="fa fa-ban"></i> Access Denied</h1>
	<?php
	if($this->session->flashdata('forbidden_access')!=''){
		echo $this->session->flashdata('forbidden_access');
		echo "<br><span>Return to <a href='".base_url('admin/dashboard/')."'>dashboard</a></span>";
	}else{
		redirect(base_url('admin/dashboard'));
	}?>
	</div>
		</div>
	</div>
</div>

	</body>
</html>
