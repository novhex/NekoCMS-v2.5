<?php
/*
*  NEKO SIMPLE CMS v1.0.3 R1
* @ Developer: Novi
* @ Email: novhz0514@gmail.com
* @ Github: github.com/novhex
* @ Copyright (c) 2015-2016
* @ License MIT
*/
?>
<div class="container" style="margin-top: 70px;">
	<div class="row">
		<div class="col-md-8">
                <?php
                    if($this->session->flashdata('form_submission_success')!=''){
                        echo "<p style='color:green;'>".$this->session->flashdata('form_submission_success')."</p>";
                    }
                    if($this->session->flashdata('form_submission_error')!=''){
						echo "<p style='color:green;'>".$this->session->flashdata('form_submission_success')."</p>";
                    }
                ?>
                           
                <div class="panel panel-default">
                    <div class="panel-heading">
                    <i class="fa fa-phone"></i>
                        Contact Us
                    </div>
                    <div class="panel-body">
					<form action="<?php echo base_url('home/contactus');?>" accept-charset="utf-8" id="contact-form" class="contact-form cf-style-1 inner-top-xs" method="post" >
                            <label>Your Name*</label>
                            <label><?php echo form_error('name'); ?></label>
								<input class="form-control" name="name" value="<?php echo set_value('name');?>" />
							 
                            <label>Your Email*</label>
                            <label><?php echo form_error('email'); ?></label>
                                <input class="form-control" name="email"  value="<?php echo set_value('email');?>" />
							
                         
                            <label>Your Message</label>
								<textarea rows="8" class="form-control" name="message" placeholder="You Message here..." required><?php echo set_value('message');?></textarea>
                       
                            <button type="submit" style="margin-top:20px;" class="btn btn-primary">Send Message</button>
                    </form><!-- /.contact-form -->
					</div>
                </div>
        </div>
		
		<div class="col-md-4">

			<div class="panel panel-default">
                <div class="panel-heading">
					<h3 class="panel-title"><i class="fa fa-envelope"></i> Get Updates</h3>
				</div>
					<div class="panel-body">
						<form action="<?php echo base_url('home/subscribe'); ?>" method="post" accept-charset="utf-8">
							<input type="text" required="" name="email" value="<?php echo set_value('email');?>" class="form-control" placeholder="Email">
							<button type="submit" class="btn btn-primary" style="margin-top:10px;">Subscribe to our newsletter</button>
						</form>
					</div>
			</div>	
        </div>
    </div>
</div>