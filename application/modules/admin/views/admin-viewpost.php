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
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">
                                    <div class="title"><i class="fa fa-thumb-tack"></i> Blog Post</div>
                                </div>
                                <div class="pull-right card-action">
                                </div>
                            </div>
                            <div class="card-body">
                            <?php //echo " <center>".$this->pagination->create_links()."</center>"; ?>

                            <?php if($this->session->flashdata('saveblog_ok')!=''){?>
                                  <div class="alert alert-success"><?php echo $this->session->flashdata('saveblog_ok'); ?></div>
                            <?php }?>
                            
                            <?php if($this->session->flashdata('updateblog_ok')!=''){?>
                                  <div class="alert alert-success"><?php echo $this->session->flashdata('updateblog_ok'); ?></div>
                            <?php }

                            ?>
                            <table id='tbl_posts'>
                            <thead>
                              <tr>
                                  <th>#</th>
                                  <th>Post Title</th>
                                  <th> Is Published</th>
                                  <th> Date Crated</th>
                                  <th> Category </th>
                                  <th>URL</th>
                                  <th> Author </th>
                                  <th>Options</th>
                              </tr>
                            </thead>
                            <tbody>

                            <?php  $i=1; foreach($user_posts as $userposts){ 
                              
                              unset($userposts['content']);?>
                              <tr>
                                  <td><?php echo $i++; ?></td>
                                  <td><label class="label label-success"><?php echo $userposts['title']; ?></label></td>
                                  <td><?php echo $userposts['is_visible'] == 1 ? "<i style='color:green;' class='fa fa-check'></i>" : "<i style='color:red;' class='fa fa-ban'></i>"; ?></td>
                                  <td><?php echo date('F  j, Y h:i:s a',strtotime($userposts['date_posted'])); ?></td>
                                  <td><?php echo $userposts['category_name']; ?></td>
                                  <td><a href="<?php echo base_url('article').'/'.$userposts['slug']; ?>"><i class='fa fa-search'></i> View Post</a></td>
                                  <td><?php echo $this->adminlib->getAuthorFullName($userposts['posted_by']); ?></td>
                                  <td>
                                  <a  title="Edit this post" href="<?php echo base_url('admin/edit-blog').'/'.$userposts['slug'];?>" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                                  <a  title="Delete this Post" class="btn btn-sm btn-primary delete_post" data-postid="<?php echo $userposts['postID'];?>"><i class="fa fa-trash"></i></a>
                                  <a title="Move posts to other category" class="btn btn-primary btn-sm move_post" data-postslug="<?php echo $userposts['slug'];?>"><i class="fa fa-mail-forward"></i></a>
                                  </td>
                              </tr>
                            <?php }?>
                            </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


