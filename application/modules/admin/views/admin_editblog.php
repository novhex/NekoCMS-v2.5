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

?>



  <div class="container-fluid" style="margin-top: 90px;">
            <div class="side-body">
               
                <div class="row">
                    <div class="col-sm-9">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">
                                    <div class="title"><i class="fa fa-thumb-tack"></i> New Blog </div>
                                </div>
                                <div class="pull-right card-action">
                                </div>
                            </div>
                            <div class="card-body">
                            <?php echo validation_errors(); ?>

                            <form action="" method="POST" accept-charset="utf-8">


                            <?php foreach($blog as $index): ?>

                              <input type="hidden" name="is_visible" value="1" id="is_visible" />

                                <div class="form-group">
                                            <label for="title">Blog title: </label>
                                            <input type="text" name="title" id="title" class="form-control" style="height: 40px;font-size: 20px; font-weight: bold;"  value="<?php echo $index['title']; ?>" />
                                </div>

                                  <div class="form-group">
                                     <label><input type="checkbox" name="is_visible_trigger" id="is_visible_trigger" value="1" checked="true"/>&nbsp; Publish blog after saving</label>
                                  </div>
                                
                                 <div class="form-group">
                                            <label for="content">Your content:</label>
                                            <textarea name="content" id="content"><?php echo $index['content'];?></textarea>
                                </div>
                            
                           
                            
                            
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">
                                    <div class="title"><i class="fa fa-cog"></i> Post options </div>
                                </div>
                                <div class="pull-right card-action">
                                </div>
                            </div>
                            <div class="card-body">
                            
                            <div class="form-group">
                                <label><input type="checkbox" name="is_visible_trigger" id="is_visible_trigger" checked="true"/>&nbsp; Publish blog after saving</label>
                            </div>



                                <div class="form-group">
                                    <label>Tags</label>
                                <ul id="myTags"></ul>
                                <input type="text" style="display: none;" id="single_field_node" value="<?php  echo $index['tags']; ?>" name="post_tags_hidden_field"/>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-success btn-lg btn-block"><i class="fa fa-save"></i> Update Blog</button>
                                </div>

                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                            </div>
                        </form>
                         <?php endforeach; ?>

                    </div>
                </div>
            </div>
        </div>
    </div>

 

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

 