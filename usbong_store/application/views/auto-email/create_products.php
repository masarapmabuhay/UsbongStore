<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="container">
    <?php if ($this->session->flashdata('auto_email-create_products-error')) { ?>
        <!-- Error Div for Falsh Data: used this when pre-req is not yet set -->
        <div class="error-row alert alert-warning">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            <strong>Warning!</strong> <?php echo $this->session->flashdata('auto_email-create_products-error'); ?>
        </div>
    <?php } else { ?>

        <!-- Warning Div for Falsh Data: used this when capacity is full -->
        <?php if ($this->session->flashdata('auto_email-create_products-warning')) { ?>
            <div class="error-row alert alert-warning">
                <a href="#" class="close" data-dismiss="alert">&times;</a>
                <strong>Warning!</strong> <?php echo $this->session->flashdata('auto_email-create_products-warning'); ?>
            </div>
        <?php } ?>

        <!-- Search Button -->
        <div class="form_row row center-block">
            <?php
                $default_name = $page['name_filter'];
            ?>
            <form class="form-inline" method="get" action="<?php echo site_url('auto-email/create/products/'.$page['current_page'])?>">
                <div class="form-group">
                    <input type="text" class="form-control" name="name_filter" placeholder="Name" value="<?php echo $default_name;?>">
                </div>
                <button name="search_button" type="submit" class="btn btn-success" value="1"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Search</button>
            </form>
        </div>

        <!-- Data Table -->
        <div class="table-responsive">
            <table class="table table-striped">
                <!-- Header Row -->
                <tr>
                    <td>ID</td>
                    <td>Name</td>
                    <td>Price</td>
                    <td>Select (<?php echo $product_count; ?>/<?php echo $auto_email_template['product_capacity']; ?>)</td>
                </tr>
                <!-- Data Rows -->
                <?php foreach ($auto_email_product as $key => $obj) { ?>
                    <tr>
                        <td><?php echo $obj['product_id']; ?> </td>
                        <td><?php echo $obj['name']; ?>       </td>
                        <td><?php echo $obj['price']; ?></td>
                        <td style="min-width: 100px">
                            <div class="btn-group-xs" role="group" aria-label="...">
                                <form class="auto_email_inline_form" method="post" action="<?php echo site_url('auto-email/create/products/'.$page['current_page'].'?name_filter='.$page['name_filter'])?>">
                                    <input type="hidden" name="product_id" value="<?php echo $obj['product_id'];?>">
                                    <input type="hidden" name="name"       value="<?php echo $obj['name'];?>">
                                    <?php
                                        if (
                                            $this->session->has_userdata('auto_email-create-auto_email_product_models') AND
                                            in_array($obj['product_id'], array_keys($this->session->userdata('auto_email-create-auto_email_product_models')))
                                        ) {
                                    ?>
                                        <button data-toggle="tooltip" data-placement="left" title="Remove" name="remove_button" type="submit" class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                                    <?php } else { ?>
                                        <button data-toggle="tooltip" data-placement="left" title="Select" name="submit_button" type="submit" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></button>
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
                            <a href="<?php echo site_url('auto-email/create/products/'.$page['prev_page'].'?name_filter='.$page['name_filter']);?>">
                                <span aria-hidden="true">&larr;</span> Back
                            </a>
                        </li>
                    <?php } else { ?>
                        <li class="previous disabled">
                            <a>
                                <span aria-hidden="true">&larr;</span> Back
                            </a>
                        </li>
                    <?php } ?>
                    <!-- Newer -->
                    <?php if (isset($page['next_page'])) { ?>
                        <li class="next">
                            <a href="<?php echo site_url('auto-email/create/products/'.$page['next_page'].'?name_filter='.$page['name_filter']);?>">
                                Next <span aria-hidden="true">&rarr;</span>
                            </a>
                        </li>
                    <?php } else { ?>
                        <li class="next disabled">
                            <a>
                                Next <span aria-hidden="true">&rarr;</span>
                            </a>
                        </li>
                    <?php }  ?>
                </ul>
            </nav>
        </div>
    <?php } ?>
</div>