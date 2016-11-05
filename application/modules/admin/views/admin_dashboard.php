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
                                    <div class="title"><i class="fa fa-dashboard"></i> Your Dashboard </div>
                                </div>
                                <div class="pull-right card-action">
                                </div>
                            </div>
                            <div class="card-body">

                                    <div class="col-sm-6">
                                          <div class="panel panel-info">
                                          <div class="panel-heading"><i class="fa fa-pencil"></i> Article Posted</div>
                                          
                                          <div class="panel-body">
                                                <p style="text-align:center; font-size:40px; font-weight:bold;">
                                                      <?php echo $total_article; ?>
                                                </p>
                                          </div>

                                          </div>
                                    </div>

                                    <div class="col-sm-6">
                                          <div class="panel panel-success">
                                          <div class="panel-heading"><i class="fa fa-envelope"></i> Newsletter Subscribers</div>
                                          
                                          <div class="panel-body">
                                                <p style="text-align:center; font-size:40px; font-weight:bold;">
                                                      <?php echo $subscribed_users; ?>
                                                </p>
                                          </div>

                                          </div>
                                    </div>

                                    <div class="col-sm-6">
                                     <div class="panel panel-warning">
                                      <div class="panel-heading"><i class="fa fa-server"></i> Server Info</div>
                                      <div class="panel-body">
                                          <p><?php echo "PHP Version: ". phpversion(); ?></p>
                                          <p><?php echo "Server: ".$_SERVER['SERVER_SOFTWARE']; ?></p>
                                          <p><?php echo "System Date & Time : ".date('Y-m-d h:i:sa');?></p>
                                      </div>
                                    </div>
                                    </div>

                                    <div class="col-sm-6">
                                          <div class="panel panel-danger">
                                            <div class="panel-heading"><i class="fa fa-fire"></i> CodeIgniter Details</div>
                                            <div class="panel-body">
                                                  <p>Current CI Version: <?php echo "<span id='ci-ver'>".CI_VERSION."</span>"; ?></p>
                                                  <p id="ci-ver-status">Version Check Status: Not Checked.</p>
                                                  <p>
                                                  <a id="btn_check_civersion" style="margin-bottom:-10px;" class="btn btn-info btn-block btn-sm"><i class="fa fa-globe"></i> Check for Updates</a>
                                                  </p>
                                                  
                                            </div>
                                          </div>
                                    </div>

                            <div class="col-sm-6">
                                    <div class="panel panel-primary">
                                          <div class="panel-heading"><i class="fa fa-area-chart"></i> Visitor Traffic Source</div>
                                          
                                          <div class="panel-body" style="float: left;">

                                                <canvas id="stats_canvas" style="width: 100%; "></canvas>

                                          </div>

                                          </div>
                            </div>
                            <div class="col-sm-6">
                              <div class="panel panel-primary">
                                <div class="panel-heading"><i class="fa fa-history"></i> Page Views </div>
                                <div class="panel-body"></div>
                              </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


 