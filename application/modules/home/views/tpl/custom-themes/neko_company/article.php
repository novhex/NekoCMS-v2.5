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
<?php foreach($categ_post as $index): ?>
                <div class="well">
                        <div class="social_media_btns" style="text-align: center;">
            <p style="text-align: center; font-weight: bold;"> SHARE POST  </p>
            <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo base_url('article').'/'.$index['slug'];?>?ref=fbs"><i class="fa fa-facebook-square fa-2x" style="color:#3b5998;"></i></a>
            <a href="https://twitter.com/home?status=<?php echo base_url('article').'/'.$index['slug'];?>?ref=tws"><i class="fa fa-twitter fa-2x" style="color:#337ab7;"></i></a>
            <a href="https://plus.google.com/share?url=<?php echo base_url('article').'/'.$index['slug'];?>?ref=gps"><i class="fa fa-google-plus-square fa-2x" style="color:red;"></i></a>
        </div>

                    <h1><?php echo $index['title']; ?></h1>
                    <strong><?php echo "<i class='fa fa-user'></i>  Posted by: ".$this->pageslib->getAuthorFullName($index['posted_by']); ?></strong>
                     <div><?php echo  $index['tags'] !='' ? "<i class='fa fa-tags'></i> Tags: ".$index['tags'] : ''; ?></div>
                    <strong><?php echo "<i class='fa fa-calendar'></i> Posted on: ".date('F j,  Y',strtotime($index['date_posted']));?></strong>
                    
                    <div id="full-content">
                    <br>
                        <?php echo $index['content']; ?>
                    </div>

                </div>
<?php endforeach; ?>

<!-- END CATEGORY FETCH ARTICLES !-->

            </div>

            <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-search"></i> Search </h3></div>
                    <div class="panel-body">
                    <form accept-charset="utf-8" method="GET" action="<?php echo site_url('home'); ?>">
                        <input type="search" class="form-control" name="q" placeholder="Type keywords here" />
                        <button class="btn btn-default" type="submit" style="margin-top: 5px;">Go </button>
                     </form>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-history"></i> Recent Post </h3></div>
                    <div class="panel-body">
                    <!--  FETCH LATEST POSTS !-->
                    <?php foreach($latest_posts as $post): ?>
                            <p>
                                <strong style="color: blue;"><a href="<?php echo base_url('article').'/'.$post['slug']; ?>" class=''><i class='fa fa-thumb-tack'></i> <?php echo $post['title']; ?></a></strong>
                                <small></small>
                            </p>
                        <?php endforeach; ?>
                    <!-- END FETCH LATEST POSTS !-->
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-comment"></i> Recent Comments</h3></div>
                    <div class="panel-body">
                    <!-- FETCH LATEST COMMENTS !-->
                          <?php foreach($latest_comments as $com): ?>
                            <p>
                               <?php echo $com['name']; ?> on   <strong><a href="<?php  echo base_url('article').'/'.$com['slug'];?>"><?php echo $com['title']; ?></a></strong> <br/>
                            </p>
                        <?php endforeach; ?>
                        <!-- END FETCH LATEST COMMENTS !-->
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-calendar"></i> Archives</h3>
                    </div>
                    <div class="panel-body">
                        <?php foreach($archives as $archives_posts){
                            echo "<li style='list-style-type: none;'><a href='".base_url('archives/').$archives_posts->YEAR."-".$archives_posts->MONTH."'>".date('F Y ',strtotime($archives_posts->YEAR."-".$archives_posts->MONTH))."($archives_posts->TOTAL)" ."</a></li>";
                        }?>
                    </div>
            </div>

            </div>
            
            
          </div>
        </div>


    <script type="text/javascript">

    $(document).ready(function(){

         var newsID = $("#news_id").val();
         $(set_base_url("<?php echo base_url(); ?>"));
         $(loadComments(newsID));

    });
    </script>