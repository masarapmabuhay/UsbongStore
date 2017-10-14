<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="container">

    <div class="table-responsive">

        <!-- Data Table -->
        <table class="table table-striped">
            <!-- Header Row -->
            <tr>
                <td>ID</td>
                <td>Name</td>
                <td>Description</td>
                <td>Action</td>
            </tr>
            <!-- Data Rows -->
            <?php foreach ($auto_email_template as $key => $obj) { ?>
                <tr>
                    <td><?php echo $obj['auto_email_template_id']; ?> </td>
                    <td><?php echo $obj['view']; ?>                   </td>
                    <td><?php echo $obj['description']; ?>            </td>
                    <td style="min-width: 100px">
                        <div class="btn-group-xs" role="group" aria-label="...">
                            <a href="<?php echo base_url('assets/images/auto-email/'.$obj['image']); ?>" style="display:inline-block;" class="btn btn-default" role="button" data-toggle="tooltip" data-placement="top" title="View Mobile Screen Shot of Template"><span class="glyphicon glyphicon-zoom-in" aria-hidden="true"></span></a>
                            <form class="auto_email_inline_form" method="post" action="<?php echo site_url('auto-email/create/template/'.$page['current_page'])?>">
                                <input type="hidden" name="auto_email_template_id" value="<?php echo $obj['auto_email_template_id'];?>">
                                <?php
                                    if (
                                        $this->session->has_userdata('auto_email-create-auto_email_template_id') AND
                                        $this->session->userdata('auto_email-create-auto_email_template_id') == $obj['auto_email_template_id']
                                    ) {
                                ?>
                                    <button data-toggle="tooltip" data-placement="left" title="Selected" name="submit_button" type="submit" class="btn btn-success btn-xs" disabled="disabled"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></button>
                                <?php } else { ?>
                                    <button data-toggle="tooltip" data-placement="left" title="Select this Template" name="submit_button" type="submit" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></button>
                                <?php } ?>
                            </form>
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
                        <a href="<?php echo site_url('auto-email/create/template/'.$page['prev_page']);?>">
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
                        <a href="<?php echo site_url('auto-email/create/template/'.$page['next_page']);?>">
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

