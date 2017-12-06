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

<div class="container" style="margin-top: 70px;">
	<div class="row">
		<div class="col-md-9">

         
				<?php if ($this->session->flashdata('error')): ?>
					<?php echo "<div class='alert alert-danger'><a class='close' data-dismiss='alert'>×</a><strong>Error: </strong>".$this->session->flashdata('error')."</div>"; ?>
				<?php endif; ?>
<!-- SEARCH ARTICLES -->
	<?php if ($latest_articles): ?>
        <?php if ($this->input->get('q')): ?>
            We have found <?php echo count($latest_articles); ?> Articles with keyword '<strong><?php echo $this->input->get('q'); ?></strong>'. <br/><br/>
        <?php endif; ?>
	<?php endif; ?>
<!-- END Search -->	
		
    <?php foreach($latest_articles as $index): ?>

    <h2 style="text-align: left;"><a href="<?php echo base_url('article').'/'.$index['slug']; ?>"><?php echo $index['title']; ?></a></h2>
    <hr>
    <strong><?php echo "<i class='fa fa-user'></i>  Posted by: ".$this->pageslib->getAuthorFullName($index['posted_by']); ?></strong>
    <br>
    <strong><?php echo "<i class='fa fa-calendar'></i> Posted on: ".date('F j,  Y',strtotime($index['date_posted']));?></strong>

    <?php
     
    $content = strip_tags($index['content']);

    if (strlen($content) > 250) {

      $stringCut = substr($content, 0, 500);
      $string_to_replace=".....";
        $content= substr($stringCut, 0, strrpos($stringCut, ' '))."  ".$string_to_replace;
        echo "<p style='text-align: justify;'>".$content." <br><a style='margin-top:10px;' href='".base_url('article').'/'.$index['slug']."' class='btn btn-primary btn-sm'><i class='fa fa-info-circle'></i> Read More </a></p>";
     }

    ?>


<?php endforeach; ?>

		</div>

<div class="col-md-3">

<div class="panel panel-success"  style="margin-top:70px;">
    <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-search"></i> Search Post</h3>
    </div>

    <div class="panel-body">
        
        <form accept-charset="utf-8" method="GET" action="<?php echo site_url('home'); ?>">
            
               <input required="" class="form-control" placeholder="Enter Keyword(s)" name="q" type="text"/>
            
          </form>

    </div>
</div>


    <div class="panel panel-success">
     
     <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-clock-o"></i> Recent Posts</h3>
       </div>
         <div class="panel-body">
            <?php foreach($latest_posts as $post): ?>
                <p>
                    <strong><?php echo $post['title']; ?></strong>
                    <?php
                        $content = strip_tags($post['content']);
                            if (strlen($content) > 30) {
                            $stringCut = substr($content, 0, 30);
                            $string_to_replace="....";
                            $content= substr($stringCut, 0, strrpos($stringCut, ' '))."  ".$string_to_replace;
                            echo "<p style='text-align: justify;'>".$content." <br><a href='".base_url('article').'/'.$post['slug']."' class=''><i class='fa fa-info-circle'></i> Read More </a></p>";
                        }
                    ?>
                </p>
            <?php endforeach; ?>
         </div>
    </div>


        <div class="panel panel-success">

            <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-thumbs-o-up"></i> Social Links  </h3>
            </div>
                 <div class="panel-body">
                    <ul style="list-style: none;">
                        <li><a style="color:#3b5998;" href="https://www.facebook.com/novhz.emo94"><i class="fa fa-facebook-square fa-2x"></i> @Kel Novi </a></li>
                        <li><a style="color:#000000;" href="https://github.com/novhex/NekoCMS-v2"><i class="fa fa-github fa-2x"></i> @novhex</a></li>
                        <li><a style="color:#337ab7;" href="https://twitter.com/novhz94/"><i class="fa fa-twitter fa-2x"></i> @novhz94</a></li>
                    </ul>
                 </div>
         </div>

            <div class="panel panel-success" style="margin-top:20px;">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-refresh"></i> Get Updates via Newsletter </h3>
            </div>

                <div class="panel-body">
                    <form action="<?php echo base_url('home/subscribe'); ?>" method="post" accept-charset="utf-8">
                    <input  required="" type="text" name="email" value="<?php echo set_value('email');?>" class="form-control" placeholder="Your Email address">
                    <button type="submit" class="btn btn-primary" style="margin-top:10px;"><i class="fa fa-envelope"></i> Subscribe</button>
                    </form>
                </div>
            </div>

                </div>
            </div>
        </div>
	</div>
</div>	