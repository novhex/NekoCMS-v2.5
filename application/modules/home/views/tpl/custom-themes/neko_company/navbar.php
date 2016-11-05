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


    <nav class="navbar navbar-default custom-header">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button><a class="navbar-brand navbar-link" href="<?php echo base_url();?>">Neko  <span>CMS </span> </a></div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                
            <ul class="nav navbar-nav navbar-right">
            
<!---  FETCH NAVLINKS AND SUB-CATEGORIES !-->

            <?php foreach($pages as $page){?>

              <li class="dropdown">
                <a style="font-size: 12px; font-weight: bold;" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $page['page_name'];?> <span class="caret"></span></a>
                <ul class="dropdown-menu">

                <?php foreach($this->pageslib->_getCategories($page['pageID']) as $c): 
                  if($c['category_name']!==''){
                ?>

                  <li><a href="<?php echo base_url('category').'/'.$c['category_slug'];?>"> <?php echo $c['category_name'];?></a></li>

                <?php } endforeach;?>

                </ul>
              </li>
          <?php } ?>
          
            </ul>

<!--- END FETCH NAVLINKS AND SUB-CATEGORIES !-->
            </div>
        </div>
    </nav>