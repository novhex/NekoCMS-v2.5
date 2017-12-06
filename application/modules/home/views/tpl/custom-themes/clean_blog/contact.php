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
		<div class="col-md-12">
                <?php
                    if($this->session->flashdata('form_submission_success')!=''){
                        echo "<p style='color:green;'>".$this->session->flashdata('form_submission_success')."</p>";
                    }
                    if($this->session->flashdata('form_submission_error')!=''){
						echo "<p style='color:green;'>".$this->session->flashdata('form_submission_success')."</p>";
                    }
                ?>

                <h1 style="text-align:center;">Contact Form</h1>
                           
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        Contact Us
                    </div>
                    <div class="panel-body">
					<form action="<?php echo base_url('home/contactus');?>" accept-charset="utf-8" id="contact-form" class="contact-form cf-style-1 inner-top-xs" method="post" >
                            <label>Your Name*</label>
								<input class="form-control" name="name">
							<label><?php echo form_error('name'); ?></label>
                            <label>Your Email*</label>
                                <input class="form-control" name="email">
							<label><?php echo form_error('email'); ?></label>
                         
                            <label>Your Message</label>
								<textarea rows="8" class="form-control" name="message" placeholder="You Message here..." required></textarea>
<div class="g-recaptcha" data-sitekey="6LdG0A4UAAAAAOZkuUnQVd8HbA1pbo7zcn-3d1qY" style="margin-top:10px;"></div>

                       
                            <button type="submit" style="margin-top:20px;" class="btn btn-primary">Send Message</button>
                    </form><!-- /.contact-form -->
					</div>
                </div>
        </div>
		

    </div>
</div>