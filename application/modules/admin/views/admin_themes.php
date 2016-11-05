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

<?php

$files =glob(APPPATH.'modules/home/views/tpl/custom-themes/*');


?>
  <div class="container-fluid" style="margin-top: 50px;">
            <div class="side-body">
                <div class="page-title">
                    <span class="title"></span>
                    <div class="description"></div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">
                                    <div class="title"><i class="fa fa-puzzle-piece"></i> Front End Themes</div>
                                </div>
                                <div class="pull-right card-action">
                                   
                                </div>
                            </div>
                            <div class="card-body">
                                
                               	<div class="table-responsive">
                               	<table id="tbl_themes" cellpadding="" class="table table-condensed table-hover table-stripped">
                               		<thead>
                               			<tr>
	                               			<th> # </th>
	                               			<th> Package Name </th>
	                               			<th> Options </th>
                               			</tr>
                               		</thead>
                               		<tbody>
                               			<?php $i=1; foreach($files as $file){ ?>

                               			<?php $packages= explode("/", $file); ?>
                               			
                               				<tr>
                               				<td><?php echo $i++; ?></td>
                               				<td><?php echo end($packages); ?>
                               				<td>
                               					<a class="btn btn-primary btn-sm activate_theme" data-themepackage="<?php echo 'custom-themes/'.end($packages).'/'; ?>"><i class="fa fa-check-square"></i>  Activate</a>
                                        <a class="btn btn-primary btn-sm deactivate_theme" data-themepackage="<?php  echo 'custom-themes/'.end($packages).'/'; ?>"><i class="fa fa-ban"></i> Deactivate</a>
                               				
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
    </div>
 