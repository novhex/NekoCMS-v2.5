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

<title><?php echo $site_title; ?> &ndash; <?php echo $article_title; ?></title>

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

 
    <!-- CSS Libs -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('custom_css/flatly_bootstrap.css');?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('flatv2/lib/css/font-awesome.min.css');?>">

   
     

    <!-- CSS App -->


    <script type="text/javascript" src="<?php echo base_url('flatv2/lib/js/jquery.min.js');?>"></script>
    <script type="text/javascript" src="<?php echo base_url('flatv2/lib/js/bootstrap.min.js'); ?>"></script>
    
		
</head>
<body>

