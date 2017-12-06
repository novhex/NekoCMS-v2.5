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
    <div class="col-md-9">
        <div class="col-md-9">
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

        <div class="social_media_btns" style="text-align: center;">
            <p style="text-align: center;"> SHARE POST : </p>
            <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo base_url('article').'/'.$index['slug'];?>"><i class="fa fa-facebook-square fa-2x" style="color:#3b5998;"></i></a>
            <a href="https://twitter.com/home?status=<?php echo base_url('article').'/'.$index['slug'];?>"><i class="fa fa-twitter fa-2x" style="color:#337ab7;"></i></a>
            <a href="https://plus.google.com/share?url=<?php echo base_url('article').'/'.$index['slug'];?>"><i class="fa fa-google-plus-square fa-2x" style="color:red;"></i></a>
        </div>

<div id="article_full" style="margin-top: 25px;">
    <?php
     echo $index['content'];
      ?>

</div>
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
                    <h3 class="panel-title"><i class="fa fa-thumbs-o-up"></i>My Social Links </h3>
            </div>
                 <div class="panel-body">
                    <ul style="list-style: none;">
                        <li><a style="color:#3b5998;" href="https://www.facebook.com/novhz.emo94"><i class="fa fa-facebook-square fa-2x"></i> Novi </a></li>
                        <li><a style="color:#000000;" href="https://github.com/novhex/NekoCMS-v2"><i class="fa fa-github fa-2x"></i> Novhex </a></li>
                        <li><a style="color:#337ab7;" href="https://twitter.com/novhz94/"><i class="fa fa-twitter fa-2x"></i> Novhz94 </a></li>
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

</div>
    
<div class="container">
     <div class="row">
            <div class="col-md-12">
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

 
