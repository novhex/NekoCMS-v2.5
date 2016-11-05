<?php
defined('BASEPATH') or exit('Error!');
/*
*  NEKO SIMPLE CMS v1.0.3 R1
* @ Developer: Novi
* @ Email: novhz0514@gmail.com
* @ Github: github.com/novhex
* @ Copyright (c) 2015-2016
* @ License MIT
*/
?>
<?php 
echo validation_errors(); 
	if($this->session->flashdata('success')!=''){
		echo "<div class='alert alert-success'>".$this->session->flashdata('success')."</div>";
	}
?>
  <div class="container-fluid" style="margin-top: 90px;">
            <div class="side-body">
               
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">
                                    <div class="title"><i class="fa fa-newspaper-o"></i> Send Newsletter </div>
                                </div>
                                <div class="pull-right card-action">
                                </div>
                            </div>
                            <div class="card-body">
                            <?php echo $this->session->flashdata('send_subscription_error'); ?>
<form method="post" action="<?php echo site_url('admin/admin/send'); ?>" enctype="multipart/form-data">

<label>Subject</label>
<input type="text" name="subject" id="subject" class="form-control">
<label>Message</label>
<textarea name="content" id="content" class="form-control"></textarea>
<button type="submit" id="btn_news" name="btn_newsletter" class="btn btn-primary btn-sm"><i class="fa fa-envelope"></i> Send</button>

</form>

 </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>