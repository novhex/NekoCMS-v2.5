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
		<div class="col-md-12">
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
        <strong><?php echo "<i class='fa fa-user'></i>  Posted by: ".$this->pageslib->getAuthorFullName($index['posted_by']); ?></strong>
        <br>
        <strong><?php echo "<i class='fa fa-calendar'></i> Posted on: ".date('F j,  Y',strtotime($index['date_posted']));?></strong>

        <?php
         
        $content = strip_tags($index['content']);

        if (strlen($content) > 250) {

          $stringCut = substr($content, 0, 500);
          $string_to_replace=".....";
            $content= substr($stringCut, 0, strrpos($stringCut, ' '))."  ".$string_to_replace;
            echo "<p style='text-align: justify;'>".$content." <br><a href='".base_url('article').'/'.$index['slug']."' class='btn btn-primary btn-sm'><i class='fa fa-info-circle'></i> Read More </a></p>";
         }
        ?>

    
    <?php endforeach; ?>

		</div>


		</div>

	</div>
