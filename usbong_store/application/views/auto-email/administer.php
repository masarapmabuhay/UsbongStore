<?php
defined('BASEPATH') OR exit('No direct script access allowed');
echo link_tag('assets/css/auto-email/breadcrumbs.css');
echo link_tag('assets/css/auto-email/administer.css');
?>
<div class="container">
    <!-- Header -->
    <div class="row">
      <div class="col-xs-6 breadcrumb-wrapper">
        <!-- Bread Crumbs -->
        <ol class="breadcrumb text-left">
          <li><a href="<?php echo site_url();?>">Usbong Store</a></li>
          <li class="active">Auto Email</li>
        </ol>
      </div>
      <div class="col-xs-6">
        <!-- Create Button -->
        <a href="<?php echo site_url('auto-email/create/template/1'); ?>" class="btn btn-success navbar-btn pull-right" role="button" data-toggle="tooltip" data-placement="top" title="Create New Email"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Create New Email</a>
      </div>
    </div>

    <?php if (isset($auto_email_schedule)) { ?>
      <div class="row well_container">
        <div class="well">
          <dl class="dl-horizontal">
            <dt>Auto Email ID:</dt>
            <dd><?php echo $auto_email_schedule->auto_email_id; ?></dd>
            <dt>Subject:</dt>
            <dd><?php echo $auto_email_schedule->subject; ?></dd>
            <dt>Queue ID:</dt>
            <dd><?php echo $auto_email_schedule->auto_email_schedule_id; ?></dd>
            <dt>Target Kick Time:</dt>
            <dd><?php echo $auto_email_schedule->start_datetime; ?></dd>
            <dt>Customers:</dt>
            <dd><?php echo $auto_email_schedule->start_customer_id.' to '.$auto_email_schedule->end_customer_id; ?></dd>
          </dl>
          <div class="row well_button">
            <div class="btn-group pull-right" role="group" aria-label="...">
                <a href="<?php echo site_url('auto-email/administer/index/'.$page['page']); ?>">
                  <button class="btn btn-default btn" data-toggle="tooltip" data-placement="top" title="Refresh Page"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span></button>
                </a>
                <!--preview button-->
                <form class="well_container_form" method="get" action="<?php echo site_url('auto-email/administer/preview/'.$auto_email_schedule->auto_email_id);?>" target="_blank">
                    <button class="btn btn-default btn" data-toggle="tooltip" data-placement="top" title="Preview Email"><span class="glyphicon glyphicon-file" aria-hidden="true"></span></button>
                </form>
                <!--send button-->
                <form class="well_container_form" method="post" action="<?php echo site_url('auto-email/administer/index/'.$page['page']);?>">
                    <input type="hidden" name="auto_email_schedule_id" value="<?php echo $auto_email_schedule->auto_email_schedule_id;?>">
                    <button name="kick_button" type="submit" class="btn btn-success btn"  data-toggle="tooltip" data-placement="top" title="Send Email"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span></button>
                </form>
            </div>
          </div>
        </div>
      </div>
    <?php } else { ?>
      <div class="row well_container">
        <div class="well">
          <div class="col-xs-12">
            There is nothing that needs to be kicked right now.
          </div>
          <div class="row well_button">
            <div class="btn-group pull-right" role="group" aria-label="...">
                <a href="<?php echo site_url('auto-email/administer/index/'.$page['page']); ?>">
                  <button class="btn btn-default btn" data-toggle="tooltip" data-placement="top" title="Refresh Page"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span></button>
                </a>
            </div>
          </div>
        </div>
      </div>
    <?php } ?>

    <div class="table-responsive">
        <!-- Data Table -->
        <table class="table table-striped">
            <!-- Header Row -->
            <tr>
                <td>ID</td>
                <td>Subject</td>
                <td>Template</td>
                <td>Date Created</td>
                <td>Batches Active</td>
                <td>Batches Sent</td>
                <td>Batches Paused</td>
                <td>Batches Error</td>
                <td class="action-td">Action</td>
            </tr>
            <!-- Data Rows -->
            <?php foreach ($auto_email as $key => $obj) { ?>
                <?php if ($obj['batches_error'] != 0) { ?>
                    <tr class="danger">
                <?php } elseif (
                    $obj['batches_sent'] == $obj['batches'] AND
                    $obj['batches_sent'] != 0
                ) { ?>
                    <tr class="success">
                <?php } elseif (
                    $obj['batches_paused'] > 0 OR $obj['batches_active'] > 0
                ) { ?>
                    <tr class="warning">
                <?php } else { ?>
                    <tr>
                <?php } ?>
                    <td><?php echo $obj['auto_email_id']; ?>                     </td>
                    <td><?php echo $obj['subject']; ?>                           </td>
                    <td><?php echo $obj['view']; ?>                              </td>
                    <td><?php echo $obj['datetime']; ?>                          </td>
                    <td><?php echo $obj['batches_active'].'/'.$obj['batches'];?> </td>
                    <td><?php echo $obj['batches_sent'].'/'.$obj['batches']; ?>  </td>
                    <td><?php echo $obj['batches_paused'].'/'.$obj['batches'];?> </td>
                    <td><?php echo $obj['batches_error'].'/'.$obj['batches']; ?> </td>
                    <td class="action-td">
                        <div class="btn-group-xs" role="group" aria-label="...">
                            <a href="<?php echo site_url('auto-email/preview/'.$obj['auto_email_id']); ?>" target="_blank" class="btn btn-default" role="button" data-toggle="tooltip" data-placement="top" title="Preview"><span class="glyphicon glyphicon-file" aria-hidden="true"></span></a>
                            <a href="<?php echo site_url('auto-email/edit/template/'.$obj['auto_email_id'].'/1'); ?>" class="btn btn-default" role="button" data-toggle="tooltip" data-placement="top" title="Edit Email"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                            <a href="<?php echo site_url('auto-email/queue/'.$obj['auto_email_id'].'/1'); ?>" class="btn btn-default" role="button" data-toggle="tooltip" data-placement="top" title="View Queue"><span class="glyphicon glyphicon-list" aria-hidden="true"></span></a>
                        </div>
                    </td>
                </tr>
            <?php } ?>
        </table>

        <!-- Page Navigation -->
        <nav aria-label="...">
            <ul class="pager">
                <!--  Older -->
                <?php if (isset($page['prev_page'])) { ?>
                    <li class="previous">
                        <a href="<?php echo site_url('auto-email/administer/'.$page['prev_page']);?>">
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
                <!-- Newer -->
                <?php if (isset($page['next_page'])) { ?>
                    <li class="next">
                        <a href="<?php echo site_url('auto-email/administer/'.$page['next_page']);?>">
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
