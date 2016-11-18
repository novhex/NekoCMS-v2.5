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

    <!-- Footer -->

    <footer>
        
        <div class="row">
            <div class="col-md-4 col-sm-6 footer-navigation">
                <h3><a href="<?php echo base_url('/');?>">Neko<span>CMS </span></a></h3>
                
                <p class="company-name">Neko Software Foundation © <?php echo date('Y'); ?> </p>
            </div>
            <div class="col-md-4 col-sm-6 footer-contacts">
                <div><span class="fa fa-map-marker footer-contacts-icon"> </span>
                    <p><span class="new-line-span">Loon</span> Bohol, Philippines</p>
                </div>
                <div><span class="fa fa-phone footer-contacts-icon"></span>
                    <p class="footer-center-info email text-left"> +1 555 123456</p>
                </div>
                <div><span class="fa fa-globe footer-contacts-icon"></span>
                    <p> <a href="" target="_blank">support@company.com</a></p>
                </div>
            </div>
            <div class="clearfix visible-sm-block"></div>
            <div class="col-md-4 footer-about">
                <h4>About  <?php echo $site_title; ?></h4>
                <p> 
                <?php echo $footer; ?>
                </p>
                <div class="social-links social-icons"><a href="#"><span class="fa fa-facebook"></span></a><a href="#"><span class="fa fa-twitter"></span></a><a href="#"><span class="fa fa-linkedin"></span></a><a href="#"><span class="fa fa-github"></span></a></div>
            </div>
        </div>
    </footer>


<!-- developed by NekoCMS !-->
    <script type="text/javascript" src="<?php echo $js_files['nekocms'];?>"></script>

    <script>
var newsID = $("#news_id").val();
 $(loadComments(newsID));

function loadComments(news_id){

    

    $.ajax({

        url:"<?php echo base_url('home/loadcomments');?>",

        data: 'newsID='+news_id,

        type: 'POST',

        success:function(response){

            $("#comments").html(response);

        }

    });

}</script>
	
	</body>
</html>