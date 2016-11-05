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

  <p class="copyright text-muted">&copy;<?php echo $footer;?> 2015 - <?php echo date("Y"); ?></p>
					
<!-- developed by NekoCMS !-->
    <script type="text/javascript" src="<?php echo $js_files['nekocms'];?>"></script>
    <script type="text/javascript" src="<?php echo $js_files['neko'];?>"></script>

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
