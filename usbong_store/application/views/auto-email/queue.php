<?php
defined('BASEPATH') OR exit('No direct script access allowed');
echo link_tag('assets/css/auto-email/queue.css');
echo link_tag('assets/css/auto-email/breadcrumbs.css');
?>
<div class="container">

    <!-- Warning Div for Create Button: used when form validation fails -->
    <?php $validation_errors = validation_errors('<span>', '</span>'); ?>
    <?php if (!empty($validation_errors)) { ?>
        <div class="error-row alert alert-warning">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            <strong>Warning!</strong> <?php echo $validation_errors; ?>
        </div>
    <?php } ?>

    <!-- Error Div for Falsh Data: used when database save fails -->
    <?php if ($this->session->flashdata('auto_email_queue_error')) { ?>
        <div class="error-row alert alert-danger">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            <strong>Error!</strong> <?php echo $this->session->flashdata('auto_email_queue_error'); ?>
        </div>
    <?php } ?>

    <!-- Create Button -->
    <div class="form-row row center-block">
        <?php
            // carry over from last erroneous submission
            $default_start_customer_id = set_value('start_customer_id');
            $default_end_customer_id   = set_value('end_customer_id');
            $default_datetime          = set_value('datetime');
            // if none exists, use defaults
            $default_start_customer_id = $default_start_customer_id != '' ? $default_start_customer_id : 1;
            $default_end_customer_id   = $default_end_customer_id   != '' ? $default_end_customer_id   : 30;
            $default_datetime          = $default_datetime          != '' ? $default_datetime          : date('Y-m-d H:i:s');
        ?>
        <form class="form-inline" method="post" action="<?php echo site_url('auto-email/queue/'.$page['auto_email_id'].'/'.$page['current_page'])?>">
            <input type="hidden" name="auto_email_id" value="<?php echo $page['auto_email_id']; ?>">
            <div class="form-group">
                <label for="start_customer_id">Start Customer ID</label>
                <input type="number" class="form-control" name="start_customer_id" placeholder="1" value="<?php echo $default_start_customer_id;?>">
            </div>
            <div class="form-group">
                <label for="end_customer_id">End Customer ID</label>
                <input type="number" class="form-control" name="end_customer_id" placeholder="30" value="<?php echo $default_end_customer_id;?>">
            </div>
            <div class="form-group">
                <label for="datetime">Target Kick</label>
                <input type="datetime" class="form-control" name="start_datetime" value="<?php echo $default_datetime;?>" placeholder="<?php echo date('Y-m-d H:i:s'); ?>">
            </div>
            <button name="create_button" type="submit" class="btn btn-success"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Create New Batch</button>
        </form>
    </div>

    <!-- Header -->
    <div class="row">
      <div class="col-xs-12">
        <!-- Bread Crumbs -->
        <ol class="breadcrumb text-left">
          <li><a href="<?php echo site_url();?>">Usbong Store</a></li>
          <li><a href="<?php echo site_url('auto-email');?>">Auto Email</a></li>
          <li class="active">Queue</li>
        </ol>
      </div>
    </div>

    <div class="table-responsive">
        <!-- Data Table -->
        <table class="table table-striped">
            <!-- Header Row -->
            <tr>
                <td>ID</td>
                <td>Customers</td>
                <td>Target Kick</td>
                <td>Status</td>
                <td>Error</td>
                <td>Action</td>
            </tr>
            <!-- Data Rows -->
            <?php foreach ($auto_email as $key => $obj) { ?>
                <?php if ($obj['status'] == 'ERROR') { ?>
                    <tr class="danger">
                <?php } elseif ($obj['status'] == 'DONE') { ?>
                    <tr class="success">
                <?php } elseif ($obj['status'] == 'PAUSED') { ?>
                    <tr class="warning">
                <?php } else { ?>
                    <tr>
                <?php } ?>
                    <td><?php echo $obj['auto_email_schedule_id'];                           ?></td>
                    <td><?php echo $obj['start_customer_id'].' to '.$obj['end_customer_id']; ?></td>
                    <td><?php echo $obj['start_datetime']; ?>                              </td>
                    <td>
                        <?php
                            if ($obj['status'] == 'ERROR') {
                                echo 'Halted at Customer ID '.$obj['customer_id'];
                            } elseif ($obj['status'] == 'DONE') {
                                echo $obj['status'];
                            } elseif ($obj['status'] == 'PAUSED') {
                                echo $obj['status'];
                            } elseif ($obj['status'] == 'ACTIVE') {
                                echo $obj['status'];
                            } else {
                                echo $obj['customers_sent'].'/'.($obj['end_customer_id'] + 1 - $obj['start_customer_id']);
                            }
                        ?>
                    </td>
                    <td>
                        <?php
                            if ($obj['status'] == 'ERROR') {
                                echo $obj['error'];
                            } else {
                                echo '--';
                            }
                        ?>
                    </td>
                    <td>
                        <div class="btn-group-xs" role="group" aria-label="...">
                            <!--queue to pause-->
                            <?php if ($obj['status'] == 'QUEUED') { ?>
                                <form method="post" action="<?php echo site_url('auto-email/queue/'.$page['auto_email_id'].'/'.$page['current_page'])?>">
                                    <input type="hidden" name="status"                 value="PAUSED">
                                    <input type="hidden" name="auto_email_schedule_id" value="<?php echo $obj['auto_email_schedule_id'];?>">
                                    <button name="status_button" type="submit" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-pause" aria-hidden="true"></span></button>
                                </form>
                            <?php } ?>
                            <!--pause or error to queued-->
                            <?php if ($obj['status'] == 'ERROR' OR $obj['status'] == 'PAUSED') { ?>
                                <form method="post" action="<?php echo site_url('auto-email/queue/'.$page['auto_email_id'].'/'.$page['current_page'])?>">
                                    <input type="hidden" name="status"                 value="QUEUED">
                                    <input type="hidden" name="auto_email_schedule_id" value="<?php echo $obj['auto_email_schedule_id'];?>">
                                    <button name="status_button" type="submit" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-play" aria-hidden="true"></span></button>
                                </form>
                            <?php } ?>
                        </div>
                    </td>
                </tr>
            <?php } ?>
        </table>

        <!-- Page Navigation -->
        <nav aria-label="...">
            <ul class="pager">
                <!--  Newer -->
                <?php if (isset($page['prev_page'])) { ?>
                    <li class="previous">
                        <a href="<?php echo site_url('auto-email/queue/'.$page['auto_email_id'].'/'.$page['prev_page']);?>">
                            <span aria-hidden="true">&larr;</span> Newer
                        </a>
                    </li>
                <?php } else { ?>
                    <li class="previous disabled">
                        <a>
                            <span aria-hidden="true">&larr;</span> Newer
                        </a>
                    </li>
                <?php } ?>
                <!-- Older -->
                <?php if (isset($page['next_page'])) { ?>
                    <li class="next">
                        <a href="<?php echo site_url('auto-email/queue/'.$page['auto_email_id'].'/'.$page['prev_page']);?>">
                            Older <span aria-hidden="true">&rarr;</span>
                        </a>
                    </li>
                <?php } else { ?>
                    <li class="next disabled">
                        <a>
                            Older <span aria-hidden="true">&rarr;</span>
                        </a>
                    </li>
                <?php }  ?>
            </ul>
        </nav>


    </div>
</div>
