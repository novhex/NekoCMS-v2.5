<?php
/*
*  NEKO SIMPLE CMS v1.0.3
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
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo $site_title; ?> - <?php echo $article_title; ?></title>
<meta name="robots" content="all">


    
    <meta name="keywords" content="<?php echo $site_keywords; ?>">
    <meta name="description" content="<?php echo $site_desc;?>">
    <meta name="author" content="<?php echo $site_owner; ?>">
    <meta name="title" content="<?php echo $site_title; ?> - <?php echo $article_title; ?>" />


    <meta property="og:type" content="article" />
    <meta property="og:title" content="<?php echo $article_title; ?>" />
    <meta property="og:url" content="<?php echo base_url(uri_string()); ?>" />
    <meta property="og:description" ccontent="<?php echo $site_desc;?>" />

    <meta property="og:site_name" content="<?php echo $site_title; ?>" />
    <meta property="article:publisher" content="<?php echo base_url(''); ?>" />


    <link rel="canonical" href="<?php echo base_url(uri_string()); ?>" />
	



    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:300,400' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900' rel='stylesheet' type='text/css'>
    <!-- CSS Libs -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('flatv2/lib/css/bootstrap.min.css');?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('flatv2/lib/css/font-awesome.min.css');?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('flatv2/lib/css/animate.min.css');?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('flatv2/lib/css/bootstrap-switch.min.css');?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('flatv2/lib/css/checkbox3.min.css');?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('flatv2/lib/css/jquery.dataTables.min.css');?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('flatv2/lib/css/dataTables.bootstrap.css');?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('flatv2/lib/css/select2.min.css');?>">
    <!-- CSS App -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('flatv2/css/style.css');?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('flatv2/css/themes/flat-blue.css');?>">

    <script type="text/javascript" src="<?php echo base_url('flatv2/lib/js/jquery.min.js');?>"></script>
    <script type="text/javascript" src="<?php echo base_url('flatv2/lib/js/bootstrap.min.js'); ?>"></script>
    
        
</head>
<body class="flat-blue">
