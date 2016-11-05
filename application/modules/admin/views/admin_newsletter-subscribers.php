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
                                    <div class="title"><i class="fa fa-newspaper-o"></i> NewsLetter Subscribers</div>
                                </div>
                                <div class="pull-right card-action">
                                </div>
                            </div>
                            <div class="card-body">
                           
                            <table id='tbl_newslettersubscribers'>
                            <thead>
                              <tr>
                                  <th>#</th>
                                  <th>Email</th>
                                  <th>Date Subscribed</th>
                                  <th>Options</th>
                          
                              </tr>
                            </thead>
                            <tbody>
                            <?php
                            $i = 1;
                            foreach($subscribers as $index):
                            ?>

                            <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $index['email']; ?></td>
                            <td><?php echo date('F j , Y h:i:s a',strtotime($index['date_subscribed'])); ?></td>
                            <td>
                              <a data-subscriberid="<?php echo $index['id']; ?>" class="sitesubscriber btn btn-primary"><i class="fa fa-trash"></i> Delete Subscriber</a>
                            </td>
                            </tr>
                            <?php endforeach; ?>

                            </tbody>

                            </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

