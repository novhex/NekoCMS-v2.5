
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

$userData=$this->session->all_userdata();
?>
  <div class="container-fluid" style="margin-top: 90px;">
            <div class="side-body">
                <div class="row">
			               <div class="col-md-12">
						                <div class="card">
                            <div class="card-header">
                                <div class="card-title">
                                    <div class="title"><i class="fa fa-cog"></i> Settings</div>
                                </div>
                                <div class="pull-right card-action">
                                </div>
                            </div>
                            <div class="card-body">

                            <ul class="nav nav-tabs">
                              <li class="active"><a data-toggle="tab" href="#main">Main Settings</a></li>
                              <li><a data-toggle="tab" href="#menu1">Menu 1</a></li>
                              <li><a data-toggle="tab" href="#menu2">Menu 2</a></li>
                            </ul>

                            <div class="tab-content">
                              <div id="main" class="tab-pane fade in active">

                          <div class="row">
                       <?php
                               if(validation_errors()){
                                  echo validation_errors();
                               }
                               if($this->session->flashdata('changes1')!=''){


                                echo "<div class='alert alert-success'><a class='close' data-dismiss='alert'>×</a><strong>Info: </strong>".$this->session->flashdata('changes1')."</div>";

                               }

                        ?>
                          <form id='defaultForm' method='POST' class='form-horizontal' action="<?php echo base_url('admin/site-settings');?>"  accept-charset="utf-8">

                                <button type='submit'  name='btn_publish' class='btn btn-success btn-sm pull-right'><i class="fa fa-save"></i> &nbsp; Save </button>

                                   <div class='form-group'>
                                       <div class='col-lg-12'>
                                           <p><span class='fa fa-info-circle'></span>&nbsp; Site Name *</p>
                                           
                                           <input value='<?php echo $site_title; ?>'  id='txt_site_title' type='text' class='form-control' name='txt_site_title' placeholder='Site Title'/>
                                         
                                       </div>
                                   </div>

                                   <div class='form-group'>
                                                   <div class='col-lg-12'>
                                                       <p><span class='fa fa-user'></span>&nbsp; Site Owner *</p>
                                                       
                                                       <input value='<?php echo $site_owner; ?>' id='txt_site_owner' type='text' class='form-control' name='txt_site_owner' placeholder='Site Owner'/>
                                                     
                                                   </div>
                                   </div>

                                  <div class='form-group'>
                                                   <div class='col-lg-12'>
                                                       <p><span class='fa fa-envelope'></span>&nbsp; Site Admin Email *</p>
                                                       
                                                       <input value='<?php echo $site_email; ?>' id='txt_site_email' type='email' class='form-control' name='txt_site_email' placeholder='Site Email'/>
                                                  
                                                   </div>
                                  </div>

                                   <div class='form-group'>
                                       <div class='col-lg-4'>
                                           <p><span class='fa fa-list'></span>&nbsp; Site Description *</p>
                                            
                                               <textarea style='width:1178px; height:200px;' rows="10" cols="50" style="" name="site_meta" placeholder="Add some description of your site" class="form-control"><?php echo $site_meta; ?></textarea>
                                            
                                       </div>
                                   </div>

                                  <div class='form-group'>
                                       <div class='col-lg-4'>
                                           <p><span class='glyphicon glyphicon-eye-open'></span>&nbsp; Site Meta Keywords (keywords must be separeted by comma) *</p>
                                            
                                               <textarea style='width:1178px; height:200px;' rows="10" cols="50"  style="" name="site_metakw" placeholder="Add some meta keywords of your site" class="form-control"><?php echo $site_metakw;?></textarea>
                                            
                                       </div>
                                   </div>
                          
                                  <div class='form-group'>
                                       <div class='col-lg-4'>
                                           <p><span class='fa fa-reorder'></span>&nbsp;Footer Content *</p>
                                            
                                               <textarea style='width:1178px; height:200px;' rows="10" cols="50"  style="" name="site_footer" placeholder="Add some footer of your site" class="form-control"><?php echo $footer;?></textarea>
                                            
                                       </div>
                                   </div>

    
                           </form>
                          </div>

                              </div>
                              <div id="menu1" class="tab-pane fade">
                                <h3>Menu 1</h3>
                                <p>Some content in menu 1.</p>
                              </div>
                              <div id="menu2" class="tab-pane fade">
                                <h3>Menu 2</h3>
                                <p>Some content in menu 2.</p>
                              </div>
                            </div>
		           </div>
          </div>
	   </div>

            </div><!-- /.col-->
        </div><!-- /.row -->
    </div><!--/.main-->