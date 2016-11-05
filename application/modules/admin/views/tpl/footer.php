<?php

/*
*  NEKO SIMPLE CMS v1.0.3 R1
* @ Developer: Novi
* @ Email: novhz0514@gmail.com
* @ Github: github.com/novhex
* @ Copyright (c) 2015-2016
* @ License MIT
*/


defined('BASEPATH') or exit('Error!');

?>		<script type="text/javascript" src="<?php echo base_url('flatv2/lib/js/jquery.min.js');?>"></script>
	      <script type="text/javascript" src="<?php echo base_url('flatv2/lib/js/bootstrap.min.js'); ?>"></script>
            <script type="text/javascript" src="<?php echo base_url('flatv2/lib/js/Chart.min.js');?>"></script>
            <script type="text/javascript" src="<?php echo base_url('flatv2/lib/js/bootstrap-switch.min.js');?>"></script>
            <script type="text/javascript" src="<?php echo base_url('flatv2/lib/js/jquery.matchHeight-min.js');?>"></script>
            <script type="text/javascript" src="<?php echo base_url('flatv2/lib/js/jquery.dataTables.min.js');?>"></script>
            <script type="text/javascript" src="<?php echo base_url('flatv2/lib/js/dataTables.bootstrap.min.js');?>"></script>
            <script type="text/javascript" src="<?php echo base_url('flatv2/lib/js/select2.full.min.js');?>"></script>
            <script type="text/javascript" src="<?php echo base_url('flatv2/lib/js/ace/ace.js');?>"></script>
            <script type="text/javascript" src="<?php echo base_url('flatv2/lib/js/ace/mode-html.js');?>"></script>
            <script type="text/javascript" src="<?php echo base_url('flatv2/lib/js/ace/theme-github.js');?>"></script>
            <!-- Javascript -->
            
            <script type="text/javascript" src="<?php echo base_url('assets/js/bootbox.js'); ?>"></script>  
            <script type="text/javascript" src="<?php echo base_url('flatv2/js/app.js');?>"></script>
            <script type="text/javascript" src="<?php echo base_url('flatv2/js/index.js');?>"></script>
            <script type="text/javascript" src="<?php echo base_url('assets/js/jquery-ui.min.js');?>"></script>
            <script type="text/javascript" src="<?php echo base_url('assets/js/tag-it.js');?>"></script>
            <script type="text/javascript" src="<?php echo base_url('assets/js/nekocms.js'); ?>"></script>

            <!-- Initialize Base URL DO NOT REMOVE or else your ajax requests will not work!-->
            <script type="text/javascript">
                set_base_url("<?php echo base_url(); ?>");
            </script>
            <script type="text/javascript">
                         $('#myTags').tagit({
                
                singleField: true,
                singleFieldNode: $('#single_field_node')
            });
            </script>

            <?php
            $current_uri_segment = $this->uri->segment(2);

            if($current_uri_segment=='write-blog'){?>
            

             <script type="text/javascript" src="<?php echo base_url('assets/js/tinymce.min.js');?>"></script>

             <script type="text/javascript">
                tinymce.init({
              selector: "textarea",
              height: 300,
              plugins: [
                "advlist autolink autosave link image lists charmap print preview hr anchor pagebreak spellchecker",
                "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                "table contextmenu directionality emoticons template textcolor paste textcolor colorpicker textpattern"
              ],

              toolbar1: "newdocument fullpage | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | styleselect formatselect fontselect fontsizeselect",
              toolbar2: "cut copy paste | searchreplace | bullist numlist | outdent indent blockquote | undo redo | link unlink anchor image media code | insertdatetime preview | forecolor backcolor",
              toolbar3: "table | hr removeformat | subscript superscript | charmap emoticons | print fullscreen | ltr rtl | spellchecker | visualchars visualblocks nonbreaking template pagebreak restoredraft",

              menubar: false,
              toolbar_items_size: 'small',

              style_formats: [{
                title: 'Bold text',
                inline: 'b'
              }, {
                title: 'Red text',
                inline: 'span',
                styles: {
                  color: '#ff0000'
                }
              }, {
                title: 'Red header',
                block: 'h1',
                styles: {
                  color: '#ff0000'
                }
              }, {
                title: 'Example 1',
                inline: 'span',
                classes: 'example1'
              }, {
                title: 'Example 2',
                inline: 'span',
                classes: 'example2'
              }, {
                title: 'Table styles'
              }, {
                title: 'Table row 1',
                selector: 'tr',
                classes: 'tablerow1'
              }],

              templates: [{
                title: 'Test template 1',
                content: 'Test 1'
              }, {
                title: 'Test template 2',
                content: 'Test 2'
              }],
              content_css: [
                '//fast.fonts.net/cssapi/e6dc9b99-64fe-4292-ad98-6974f93cd2a2.css',
                '//www.tinymce.com/css/codepen.min.css'
              ]
            });
              </script>


              <script type="text/javascript">
        
        $(document).on('click','#is_visible_trigger',function(){
            //console.log($(this).is(':checked'));
            var is_visible_state = $(this).is(':checked');

              if(is_visible_state ===true ){
                $('#is_visible').val("1");
              }else{
                $('#is_visible').val("0");
              }

          });
        </script>
            <?php }
              if($current_uri_segment=='parent-pages'){
            ?>
              <script type="text/javascript">
                
                $('#tbl_pages').DataTable();

                $(document).on('click','.deleteparentpage',function(){
                  var page_id  = this.dataset.pageid;

                    bootbox.confirm('Are you sure you want to delete this parent page?',function(x){
                      
                      if(x==true){
                        $.ajax({
                          url: "<?php echo base_url('admin/admin_ajax/remove_parent_page'); ?>",
                          method: "POST",
                          data: "parent_page_id="+page_id,
                          succes:function(response){
                            console.log(response);
                          }
                        });
                      }

                    });
                });

              </script>

    <?php
      //is there any parent page added? then we will update our sitemap.xml
       if($this->session->flashdata('addpagecategory_ok')!=''){?>
              <script type="text/javascript">
                $.ajax({
                  url: "<?php echo base_url('home/writesmap'); ?>";
                  data: "sitemap_update=yes",
                  type: "POST",
                  success:function(response){
                    console.log(response);
                  }
                });
                  
              </script>
     <?php }?>


            <?php } if($current_uri_segment=='user-list'){?>
                <script type="text/javascript">
                  $('#tbl_users').DataTable();
                </script>


            <?php } if($current_uri_segment=='categories'){?>
                  <script type="text/javascript">
                    $('#tbl_categories').DataTable();

                    $(document).on('click','.movecategory',function(){
                       var category_id = this.dataset.categid;

                       $.ajax({
                          url: "<?php echo base_url('admin/admin_ajax/show_movecategory_box'); ?>",
                          data: "categ_id="+category_id,
                          type: "POST",
                          success:function(response){
                            popUp = bootbox.dialog({
                              message: ' ',
                              title: 'Move category to new parent page',
                              size: 'small',
                              onEscape:function(){

                              }

                            });
                             popUp.contents().find('.bootbox-body').html(response);
                          }
                       });

                    });

                  </script>

      <?php
      //is there any parent page category added? then we will update our sitemap.xml
       if($this->session->flashdata('addcategory_ok')!=''){?>
              <script type="text/javascript">
                $.ajax({
                  url: "<?php echo base_url('home/writesmap'); ?>";
                  data: "sitemap_update=yes",
                  type: "POST",
                  success:function(response){
                    console.log(response);
                  }
                });
                  
              </script>
     <?php }?>
     
            <?php }?>


            <?php if($current_uri_segment=='blog-post'){ ?>

<script type="text/javascript">

                  $('#tbl_posts').DataTable();
                  
                  $(document).on('click','.move_post',function(){
                      
                      $.ajax({
                        url: "<?php echo base_url('admin/admin_ajax/show_movepost_category_box');?>",
                        type: "POST",
                        data: "slug="+this.dataset.postslug,
                        success:function(response){
                          popUp = bootbox.dialog({
                            message: ' ',
                            title: 'Move post to other category',
                            size: 'small',
                            onEscape:function(){

                            }
                          });
                          popUp.contents().find('.bootbox-body').html(response);
                        }

                      });
                  });

                  $(document).on('click','.delete_post',function(){

                    var postID = this.dataset.postid;

                    bootbox.confirm("Are you sure you want to delete this post?",function(x){
                      if(x==true){

                      $.ajax({
                          url: "<?php echo base_url('admin/admin_ajax/deletepost');?>",
                          data: "post_id="+postID,
                          type: "POST",
                          success:function(response){

                              if(response==1){
                                window.location = "<?php echo base_url('admin/blog-post');?>";
                              }
                              if(response=='not-authorized'){
                                bootbox.alert('Unable to delete this post.');
                              }
                          }
                      });

                    }

                    });


                  });

</script>

  <?php
  //is there any blog posted? then we will update our sitemap.xml
   if($this->session->flashdata('saveblog_ok')!=''){?>
          <script type="text/javascript">
            $.ajax({
              url: "<?php echo base_url('home/writesmap'); ?>",
              data: "sitemap_update=yes",
              type: "POST",
              success:function(response){
                console.log(response);
              }
            });
              
          </script>
 <?php }?>

            <?php } if($current_uri_segment=='frontend-themes'){?>
                <script type="text/javascript">
                  $('#tbl_themes').DataTable();

                  $(document).on('click','.activate_theme',function(){
                      var theme_name = this.dataset.themepackage;

                      bootbox.confirm('Activate this theme?',function(x){
                        if(x==true){
                          $.ajax({
                              url: "<?php echo base_url('admin/admin_ajax/activate_theme'); ?>",
                              data: "theme="+theme_name,
                              type: "POST",
                              success:function(response){
                                if(response==1){
                                  window.location = "<?php echo base_url('admin/frontend-themes'); ?>";
                                }
                              }
                          });
                        }
                      });
                  });

                  $(document).on('click','.deactivate_theme',function(){

                        var theme_name = this.dataset.themepackage;
                        
                      bootbox.confirm('Deactivate this theme?',function(x){
                          if(x==true){
                          $.ajax({
                              url: "<?php echo base_url('admin/admin_ajax/deactivate_theme'); ?>",
                              data: "theme="+theme_name,
                              type: "POST",
                              success:function(response){
                                if(response==1){
                                  window.location = "<?php echo base_url('admin/frontend-themes'); ?>";
                                }
                              }
                          });
                          }
                      });
                  });
                </script>

            
			
			<?php } if($current_uri_segment=='comments'){?>
			 <script type="text/javascript">
			  $("#tbl_users_comments").DataTable();
    
        
           

            $(document).on('click','.approvecomment',function(){
                    var id=this.dataset.commentid;

                    bootbox.confirm("Are you sure you want to approve this comment?",function(x){
                            if(x==true){
                                 $(ajax_comment_action(1,id));
                            }
                    });

            });

           $(document).on('click','.disapprovecomment',function(){
                    var id=this.dataset.commentid;

                    bootbox.confirm("Are you sure you want to disapprove this comment?",function(x){
                            if(x==true){
                                 $(ajax_comment_action(0,id));
                            }
                    });

            });


          $(document).on('click','.viewcomment',function(){
                var id = this.dataset.commentid;

                       popup = bootbox.dialog({
                        title: 'Comment',
                        message: "<center><img src='"+"<?php echo base_url('images/loader.gif'); ?>"+"'></center>",
                        size: 'large',
                        onEscape: function(){
                    }

                    });

                $.ajax({
                    url: "<?php echo base_url('admin/viewcomment'); ?>",
                    data: "comment_id="+id,
                    type: "POST",
                    success:function(response){
                        popup.contents().find('.bootbox-body').html(response);
                    }
                });

          });
        
         $(document).on('click','.deletecomment',function(){
                    var id=this.dataset.commentid;

                    bootbox.confirm("Are you sure you want to delete this comment?",function(x){
                            if(x==true){
                                $(ajax_comment_action(2,id));
                            }
                    });

            });


         function ajax_comment_action(action,comment_id){
                $.ajax({
                    url: "<?php echo base_url('admin/commentaction'); ?>",
                    data: "comment_action="+action+"&comment_id="+comment_id,
                    type: "POST",
                    success:function(response){
                        if(response==1){
                           window.location = "<?php echo base_url('admin/comments'); ?>";
                        }
                    }   
                });
         }

  
    </script>
	
	<?php } if($current_uri_segment=='inbox'){?>
	
		<script type="text/javascript">
			$("#msgTable").DataTable();
			
			
		$(document).on('click','.deletemsg',function(){
			var msgid =this.dataset.id;
				bootbox.confirm('Are you sure you want to delete this message',function(x){
					if(x==true){
						window.location="<?php echo base_url('admin/deletemessage');?>"+"/"+msgid;
					}
				});
			});
		
		</script>

	<?php }?>
	

<?php if($current_uri_segment=='dashboard'){?>
<script type="text/javascript" src="<?php echo base_url('assets/js/chart.min.js');?>"></script>
  <script type="text/javascript">
       

        var lineChart = {

          <?php echo $this->htmlfivegraphs->setLineGraphLabels(array('"Twitter"','"Facebook"','"Google+"','"Somwhere in Web"')); ?> ,
          
          <?php echo $this->htmlfivegraphs->setLineGraphDataSets(
            array(
              $this->htmlfivegraphs->get_total_views('tws'),
              $this->htmlfivegraphs->get_total_views('fbs'),
              $this->htmlfivegraphs->get_total_views('gps'),
              $this->htmlfivegraphs->get_total_views('web'))
            );
          ?>
        }
  
  </script>

  <script type="text/javascript">
    
     
            new Chart(document.getElementById("stats_canvas").getContext("2d")).Line(lineChart, {
                responsive: true,
                tooltipFillColor: "rgba(51, 51, 51, 0.55)"
            });

  </script>
      <script type="text/javascript">
          $(document).on('click','#btn_check_civersion',function(){
            
            $(this).attr('disabled',true);
             $(this).html("<i class='fa fa-spinner fa-spin'></i> Checking Updates ...");

            $.ajax({
              url: "<?php echo base_url('admin/admin_ajax/check_ci_version');?>",
              type: "POST",
              success:function(response){
                if(response==$('#ci-ver').html()){
                  $("#ci-ver-status").css('color','green');
                  $("#ci-ver-status").html("Version Check Status: Running on latest CI version.");
                }else{
                   $("#ci-ver-status").css('color','red');
                  $("#ci-ver-status").html("Version Check Status: Please update your CI version.");
                }
                $("#btn_check_civersion").html("<i class='fa fa-globe'></i> Check for Updates");
                $('#btn_check_civersion').attr('disabled',false);
              }

            });

          });
    </script>
  <?php }?>


<?php if($current_uri_segment=='newsletter-subscribers'){?>
      <script type="text/javascript">
        $("#tbl_newslettersubscribers").DataTable();
        $(document).on('click','.sitesubscriber',function(){
          
          var subscriberId = this.dataset.subscriberid;

          bootbox.confirm("Delete this subscriber?",function(x){
            if(x==true){
              $.ajax({
                url: "<?php echo base_url('admin/admin_ajax/delete_newslettersubscriber'); ?>",
                type: "POST",
                data: "sid="+subscriberId,
                success:function(response){
                  if(response==1){
                    window.location="<?php echo base_url('admin/newsletter-subscribers');?>"
                  }
                  
                }

              });
            }
          });
        });
    </script>
  <?php }?>

  <?php if($current_uri_segment=='edit-blog'){?>
      <script type="text/javascript">
        
        $(document).on('click','#is_visible_trigger',function(){
            //console.log($(this).is(':checked'));
            var is_visible_state = $(this).is(':checked');

              if(is_visible_state ===true ){
                $('#is_visible').val("1");
              }else{
                $('#is_visible').val("0");
              }

          });
    </script>
  <?php }?>

	</body>
</html>
