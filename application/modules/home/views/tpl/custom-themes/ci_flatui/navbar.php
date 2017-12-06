<?php
/*
*  NEKO SIMPLE CMS v1.0.3
* @ Developer: Novi
* @ Email: novhz0514@gmail.com
* @ Github: github.com/novhex
* @ Copyright (c) 2015-2016
* @ License MIT
*/
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<style type="text/css">
body {
  
  padding-top: 50px;
}

.blog-footer {
  padding: 40px 0;
  color: #999;
  text-align: center;
  background-color: #f9f9f9;
  border-top: 1px solid #e5e5e5;
}

.blog-footer p:last-child {
  margin-bottom: 0;
}

.blog-container{
   
  margin-bottom: 80px;
}

#controls{
  margin-bottom: 10px;
}

.jumbotron{

   background : url('http://kelnovi.app/flatv2/img/thumbnails/picjumbo.com_IMG_3241.jpg') center 30% no-repeat;;
   background-size: cover;
   position: relative;
   width:auto;
   height: 630px;
}

.jumbotron p{

  color: white;
}

</style>
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo base_url();?>"> <img src="<?php echo base_url('custom_css/logomysite.png');?>" style="margin-top:-10px;"> </a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
          <?php foreach($pages as $page){?>
            <li class="dropdown">
              <a style="font-size: 12px; font-weight: bold;" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $page['page_name'];?> <span class="caret"></span></a>
              <ul class="dropdown-menu">

              <?php foreach($this->pageslib->_getCategories($page['pageID']) as $c): 
                if($c['category_name']!==''){
              ?>

                <li><a href="<?php echo base_url('category').'/'.$c['category_slug'];?>"><i class="fa fa-pencil"></i> <?php echo $c['category_name'];?></a></li>

              <?php } endforeach;?>

              </ul>
            </li>


          <?php } ?>

          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
    <section class="jumbotron">
      <div class="container">
        <h1 class="text-center">  Kel Novi </h1>
        
        <p class="text-center">
          &middot; Eat  &middot; Sleep &middot; Code
       </p>
        
      </div>
    </section>
