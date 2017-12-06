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
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <ul class="list-inline text-center">
                        <li>
                            <a href="https://twitter.com/novhz94" target="_blank">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.facebook.com/novhz.emo94" target="_blank">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="https://github.com/novhex" target="_blank">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-github fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                    </ul>
					
                    <p class="copyright text-muted">&copy;<?php echo $footer;?> 2015 - <?php echo date("Y"); ?></p>
					
					<center><p><a href="<?php echo base_url('contact-us');?>">Contact Me</a></p></center>
                </div>
            </div>
        </div>
    </footer>


<!-- developed by NekoCMS !-->
<script type="text/javascript" src="<?php echo $js_files['nekocms'];?>"></script>

 <script src="http://cdn.rawgit.com/tabalinas/jssocials/v1.4.0/dist/jssocials.min.js"></script>

 <script type="text/javascript">
     $("#shareIconsCountInside").jsSocials({
    url: "<?php echo base_url(uri_string()); ?>",
    text: "<?php echo isset($index['title']) ? $index['title']  : ''; ?>",
    showLabel: false,
    shareIn: "popup",
    showCount: "inside",
    shares: ["twitter", "facebook", "googleplus", "linkedin", "pinterest", "stumbleupon", "whatsapp"]
});
 </script>
	</body>
</html>