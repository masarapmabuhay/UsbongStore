<?php
defined('BASEPATH') OR exit('No direct script access allowed');
echo link_tag('assets/css/auto-email/create_products.css');
?>

<script type="text/javascript">

    $(document).ready(function() {

        //------------------//
        // Layout Functions
        //------------------//

        function show_warning(warning) {
            $('#warning_msg').text(warning);
            $('#warning_msg_div').removeClass('hidden');
        }

        function refresh_selections(product_list) {
            var product_ids = [];
            $.each(product_list, function(key, object) {
                // update image src and alt
                var index = key + 1;
                var img_src = $('#selections_row div.selection:nth-child(' + index + ') a img').attr('src');
                if (img_src != object.layout_image) {
                    $('#selections_row div.selection:nth-child(' + index + ') a img').attr('src', object.layout_image);
                }

                var img_alt = $('#selections_row div.selection:nth-child(' + index + ') a img').attr('alt');
                if (img_alt != object.name) {
                    $('#selections_row div.selection:nth-child(' + index + ') a img').attr('alt', object.name);
                }

                // reconstruct remove button: delete remove div
                if ($('#selections_row div.selection:nth-child(' + index + ') div.thumbnail_remove').length) {
                    $('#selections_row div.selection:nth-child(' + index + ') div.thumbnail_remove').remove();
                }
                // reconstruct remove button: create new remove div
                if (object.product_id != "0") {
                    $('#selections_row div.selection:nth-child(' + index + ')').append(
                        '<div class="text-right thumbnail_remove">' +
                        '    <button data-toggle="tooltip" data-placement="left" data-product-id="' + object.product_id + '" title="Remove" name="remove_button" type="submit" class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>' +
                        '</div>'
                    );

                    // store product_id
                    product_ids.push(object.product_id);
                }
            });

            // reflect status to Data Table
            $('[name="submit_button"]').each(function(index) {
                if (
                    jQuery.inArray($(this).attr('data-product-id'), product_ids) > -1
                ) {
                    $(this).attr("disabled", "disabled");
                } else {
                    $(this).removeAttr("disabled", "disabled");
                }
            });
        }

        //------------------//
        // Post Functions
        //------------------//

        function remove_selection(event) {
            // prevent post submit
            event.preventDefault();

            // check if event target is the button or the span
            // let's use the button
            var button = $(event.target);
            if (button.prop('tagName') == 'SPAN') {
              button = $(event.target).parent();
            }

            // init view
            $('#warning_msg_div').addClass('hidden');
            // disable remove button
            button.attr("disabled", "disabled");

            // do ajax instead
            jQuery.ajax({
                type: "POST",
                url: "<?php echo site_url('auto-email/administer/ajax_create_products_remove'); ?>",
                dataType: 'json',
                timeout: 5000,
                data: {
                    product_id: button.attr('data-product-id')
                },
                success: function(response) {
                    if (response.success == false) {
                        show_warning(response.error);
                        button.removeAttr("disabled");
                    } else {
                        refresh_selections(response.product_list);
                    }
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    show_warning('Please check your internet connection.');
                    button.removeAttr("disabled");
                },
                complete: function(XMLHttpRequest, textStatus) {
                    // do nothing
                },
            });
        }

        function add_selection(event) {
            // prevent post submit
            event.preventDefault();

            // check if event target is the button or the span
            // let's use the button
            var button = $(event.target);
            if (button.prop('tagName') == 'SPAN') {
              button = $(event.target).parent();
            }

            // init view
            $('#warning_msg_div').addClass('hidden');
            button.attr("disabled", "disabled");

            // do ajax instead
            jQuery.ajax({
                type: "POST",
                url: "<?php echo site_url('auto-email/administer/ajax_create_products_add'); ?>",
                dataType: 'json',
                timeout: 5000,
                data: {
                    product_id        : button.siblings('[name="product_id"]').val(),
                    name              : button.siblings('[name="name"]').val()
                },
                success: function(response) {
                    if (response.success == false) {
                        show_warning(response.error);
                        button.removeAttr("disabled");
                    } else {
                        refresh_selections(response.product_list);
                        if (response.redirect_url !== null) {
                            window.location.replace(response.redirect_url);
                        }
                    }
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    show_warning('Please check your internet connection.');
                    button.removeAttr("disabled");
                },
                complete: function(XMLHttpRequest, textStatus) {
                    // do nothing
                },
            });
        }

        //------------------//
        // Bind Events
        //------------------//

        $(document).on('click', '[name="remove_button"]', remove_selection);

        $(document).on('click', '[name="submit_button"]', add_selection);

    });
</script>


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
            <div id="warning_msg_div" class="error-row alert alert-warning">
        <?php } else { ?>
            <div id="warning_msg_div" class="error-row alert alert-warning hidden">
        <?php } ?>
            <strong>Warning!</strong> <span id="warning_msg"><?php echo $this->session->flashdata('auto_email-create_products-warning'); ?></span>
        </div>

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

        <!-- Selections -->
        <div id="selections_row" class="row">
            <?php for ($elem = 1; $elem <= $auto_email_template['product_capacity']; $elem++) { ?>
                <div class="col-xs-6 col-sm-2 col-md-1 selection">
                    <div class="text-left thumbnail_id">
                        <?php echo $elem.'/'.$auto_email_template['product_capacity'];?>
                    </div>
                    <a class="thumbnail">
                        <?php if (isset($auto_email_chosen_products[$elem - 1])) { ?>
                            <img src="<?php echo create_image_url($auto_email_chosen_products[$elem - 1]['name'], $auto_email_chosen_products[$elem - 1]['product_type_name']); ?>" alt="<?php echo $auto_email_chosen_products[$elem - 1]['name']; ?>">
                        <?php } else { ?>
                            <img src="<?php echo base_url('/assets/images/auto-email/blank_image.png'); ?>" alt="Blank">
                        <?php } ?>
                    </a>
                    <?php if (isset($auto_email_chosen_products[$elem - 1])) { ?>
                        <div class="text-right thumbnail_remove">
                            <button data-toggle="tooltip" data-placement="left" data-product-id="<?php echo $auto_email_chosen_products[$elem - 1]['product_id'];?>" title="Remove" name="remove_button" type="submit" class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                        </div>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>

        <!-- Data Table -->
        <div class="table-responsive">
            <table class="table table-striped">
                <!-- Header Row -->
                <tr>
                    <td>ID</td>
                    <td>Name</td>
                    <td>Price</td>
                    <td>Select</td>
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
                                        <button data-toggle="tooltip" data-placement="left" data-product-id="<?php echo $obj['product_id'];?>" title="Select" name="submit_button" type="submit" class="btn btn-success btn-xs" disabled="disabled">
                                          <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                                        </button>
                                    <?php } else { ?>
                                        <button data-toggle="tooltip" data-placement="left" data-product-id="<?php echo $obj['product_id'];?>" title="Select" name="submit_button" type="submit" class="btn btn-success btn-xs">
                                          <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                                        </button>
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