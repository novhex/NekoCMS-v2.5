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
    <?php show_post($post); ?>

<!-- END CATEGORY FETCH ARTICLES !-->

<h2> Comments </h2>

<div id="comments"></div>


                    <div class="well">

            
                            <h4><i class="fa fa-comment"></i> Your comment </h4>
                        <form action="" method="POST" accept-charset="utf-8">
                            <input type="hidden" name="news_id" id="news_id" value="<?php echo $post[0]['postID']; ?>" />
                            <label><?php echo form_error('name'); ?></label>
                            <input type="text" name="name" class="form-control" placeholder="Enter Your Name" value="<?php echo set_value('name');?>" />
                            <label><?php echo form_error('email_add'); ?></label>
                            <input type="text" name="email" placeholder="Email Address" class="form-control" value="<?php echo set_value('email'); ?>"/>
                            <label><?php echo form_error('comment');?></label>
                            <textarea class="form-control" placeholder="Your comment (500 characters only)" name="comment"><?php echo set_value('comment'); ?></textarea>
                            
                            <br>
                            
                            <button class="btn btn-default"><i class="fa fa-plus"></i> Submit Comment</button>
                        </form>
                    </div>

            </div>

            <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-search"></i> Search </h3></div>
                    <div class="panel-body">
                    <form accept-charset="utf-8" method="GET" action="<?php echo site_url('home'); ?>">
                        <input  required type="search" class="form-control" name="q" placeholder="Type keywords here" />
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
                          <?php get_latest_comments($latest_comments); ?>
                        <!-- END FETCH LATEST COMMENTS !-->
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-calendar"></i> Archives</h3>
                    </div>
                    <div class="panel-body">
                        <?php get_post_archives($archives); ?>
                    </div>
            </div>

            </div>
            
            
          </div>
        </div>


    <script type="text/javascript">

    $(document).ready(function(){

         var newsID = $("#news_id").val();
         $(set_base_url("<?php echo base_url(); ?>"));
         
        $(loadComments(newsID))


         $("#thread-comments").html("No comments to show");

    });
    </script>