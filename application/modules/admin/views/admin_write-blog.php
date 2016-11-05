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
                            <input type="hidden" name="is_visible" value="1" id="is_visible" />
                                <div class="form-group">
                                            <label for="title">Blog title: </label>
                                            <input type="text" name="title" id="title" class="form-control" style="height: 40px;font-size: 20px; font-weight: bold;"  value="<?php echo set_value('title'); ?>" />
                                </div>



                                 <div class="form-group">
                                            <label for="content">Your content:</label>
                                            <textarea name="content" id="content"><?php echo set_value('content');?></textarea>
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
                             <label for="blog_categ">Blog category: </label>
                                <br>
                                  <select style="overflow: hidden;" name="blog_categ" id="blog_categ" class="form-control">
                                <option value="">Select Category</option>
                                <?php foreach($categories as $c): ?>
                                <option value="<?php echo $c['categ_ID'];?>"><?php echo $c['category_name'];?></option>
                            <?php endforeach;?>
                            </select>
                            </div>



                                <div class="form-group">
                                    <label>Tags</label>
                                <ul id="myTags"></ul>
                                <input type="text" style="display: none;" id="single_field_node" value="<?php echo set_value('post_tags_hidden_field');?>" name="post_tags_hidden_field"/>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-success btn-lg btn-block"><i class="fa fa-save"></i> Save Blog</button>
                                </div>

                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

