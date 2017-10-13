<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="container">
    <div class="table-responsive">

        <!-- Create Button -->
        <button type="button" class="btn btn-default navbar-btn"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Create New Email</button>

        <!-- Data Table -->
        <table class="table table-striped">
            <!-- Header Row -->
            <tr>
                <td>ID</td>
                <td>Subject</td>
                <td>Template</td>
                <td>Date Created</td>
                <td>Batches Sent</td>
                <td>Batches Error</td>
                <td>Action</td>
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
                <?php } else { ?>
                    <tr>
                <?php } ?>
                    <td><?php echo $obj['auto_email_id']; ?>                     </td>
                    <td><?php echo $obj['subject']; ?>                           </td>
                    <td><?php echo $obj['view']; ?>                              </td>
                    <td><?php echo $obj['datetime']; ?>                          </td>
                    <td><?php echo $obj['batches_sent'].'/'.$obj['batches']; ?>  </td>
                    <td><?php echo $obj['batches_error'].'/'.$obj['batches']; ?> </td>
                    <td>
                        <div class="btn-group-xs" role="group" aria-label="...">
                            <a href="<?php echo site_url('auto-email/queue/'.$obj['auto_email_id'].'/1'); ?>" class="btn btn-default" role="button" data-toggle="tooltip" data-placement="top" title="View Queue for Email <?php echo $obj['auto_email_id']; ?>"><span class="glyphicon glyphicon-list" aria-hidden="true"></span></a>
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

