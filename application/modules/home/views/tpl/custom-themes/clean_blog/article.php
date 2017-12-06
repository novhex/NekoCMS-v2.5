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
<div class="container" style="margin-top: 70px;">
<div class="row">
	<div class="col-md-12">
		<div class="col-md-12">
                <?php
                    if($this->session->flashdata('comment_submitted')!=''){
                        echo "<div class='alert alert-info'>".$this->session->flashdata('comment_submitted')."</div>";
                    }
                ?>
        </div>
	
	<?php foreach($post as $index): ?>
		<h1 style="text-align: center; margin-top: 50px; font-size: 20px;" ><?php echo $index['title']; ?></h1>
		<hr>

		<strong><?php echo "<i class='fa fa-user'></i>  Posted by: ".$this->pageslib->getAuthorFullName($index['posted_by']); ?></strong>
		<br>
		<strong><?php echo "<i class='fa fa-calendar'></i> Posted on: ".date('F j,  Y',strtotime($index['date_posted']));?></strong>

		<div id="shareIconsCountInside" style="text-align: center;"></div>

<div id="article_full" style="margin-top: 25px;">
	<?php
     echo $index['content'];
      ?>

</div>
	<?php endforeach; ?>
	</div>
	
<div class="container">
            <div class="row">
                    <div class="col-md-12">
                         <h3> Comments: </h3>
<hr>
<div id="disqus_thread"></div>
<script>

/**
*  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
*  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
/*

*/

var disqus_config = function () {
this.page.url = "<?php echo base_url(uri_string()); ?>";  // Replace PAGE_URL with your page's canonical URL variable
this.page.identifier = "<?php echo base_url(uri_string()); ?>"; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
};

(function() { // DON'T EDIT BELOW THIS LINE
var d = document, s = d.createElement('script');
s.src = '//http-www-heyitsnovi-com.disqus.com/embed.js';
s.setAttribute('data-timestamp', +new Date());
(d.head || d.body).appendChild(s);
})();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
<script id="dsq-count-scr" src="//http-www-heyitsnovi-com.disqus.com/count.js" async></script>  
                      
                    </div>
            </div>
         
        </div>

	</div>

</div>
 
    <script type="text/javascript">

    $(document).ready(function(){

         //var newsID = $("#news_id").val();
         //$(set_base_url("<?php //echo base_url(); ?>"));
         //$(loadComments(newsID));

    });
    </script>