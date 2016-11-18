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


    <div class="container" style="margin-top: 75px;">
        <div class="row">
            <div class="col-md-9">




<!-- FETCH ALL  CATEGORY POSTS / ARTICLES !-->

    <?php show_category_posts($categ_posts); ?>

<!-- END CATEGORY FETCH ARTICLES !-->


            </div>

            <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-search"></i> Search </h3></div>
                    <div class="panel-body">
                    <form accept-charset="utf-8" method="GET" action="<?php echo site_url('home'); ?>">
                        <input required type="search" class="form-control" name="q" placeholder="Type keywords here" />
                        <button class="btn btn-default" type="submit" style="margin-top: 5px;">Go </button>
                     </form>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-history"></i> Recent Post </h3></div>
                    <div class="panel-body">
                    <!--  FETCH LATEST POSTS !-->
                    <?php  latest_posts($latest_posts); ?>
					<!-- END FETCH LATEST POSTS !-->
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-comment"></i> Recent Comments</h3></div>
                    <div class="panel-body">
                    <!-- FETCH LATEST COMMENTS !-->
                          <?php  get_latest_comments($latest_comments); ?>
						<!-- END FETCH LATEST COMMENTS !-->
                    </div>
                </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-calendar"></i> Archives</h3>
                </div>
                <div class="panel-body">
                    <?php  get_post_archives($archives); ?>
                </div>
            </div>

            </div>
            
            
          </div>
        </div>


