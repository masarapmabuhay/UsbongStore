<?php
defined('BASEPATH') OR exit('No direct script access allowed');
echo link_tag('assets/css/manage/breadcrumbs.css');
echo link_tag('assets/css/manage/search_form.css');
?>

<script type="text/javascript">
    $(document).ready(function() {
        // refreshes page with get param quantity_order_filter set
        function sort(event) {
            // prevent anchor redirect
            event.preventDefault();

            // check if event target is the anchor or the span
            // let's use the anchor
            var anchor = $(event.target);
            if (anchor.prop('tagName') == 'SPAN') {
                anchor = $(event.target).parent();
            }

            // extract data
            var get_obj = {
                name_filter    : $('[name="name_filter"]').val(),
                author_filter  : $('[name="author_filter"]').val(),
                quantity_order : anchor.attr('data_quantity_order'),
                search         : $('[name="search"]').val(),
            };

            var url = '<?php echo site_url('manage/index/'.$page['page']); ?>?' + $.param(get_obj);
            window.location.href = url;
        }

        // bind event
        $(document).on('click', '#sort_anchor', sort);
    });
</script>

<div class="container">
    <!-- Header -->
    <div class="row">
      <div class="col-xs-6 breadcrumb-wrapper">
        <!-- Bread Crumbs -->
        <ol class="breadcrumb text-left">
          <li><a href="<?php echo site_url();?>">Usbong Store</a></li>
          <li class="active">Manage</li>
        </ol>
      </div>
      <div class="col-xs-6">
        <!-- Add Button -->
        <a href="<?php echo site_url('manage/add'); ?>" class="btn btn-success navbar-btn pull-right" role="button" data-toggle="tooltip" data-placement="top" title="Add Product"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add Product</a>
      </div>
    </div>

    <!-- Search Button -->
    <div class="search_form_row row center-block">
        <?php
            $search_url             = site_url('manage/index/'.$page['page']);
            $default_name           = $page['filters']['name'];
            $default_author         = $page['filters']['author'];
            $default_quantity_order = $page['options']['quantity_order'];
            $default_search         = $page['options']['search'];
        ?>
        <form class="form-inline" method="get" action="<?php echo $search_url; ?>">
            <div class="form-group">
                <input type="hidden" class="form-control" name="quantity_order" value="<?php echo $default_quantity_order;?>">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="name_filter" placeholder="Name" value="<?php echo $default_name;?>">
            </div>
            <div class="form-group">
                <select name="search" class="form-control">
                    <option value="and" <?php echo ($default_search == 'and') ? 'selected' : ''; ?> >AND</option>
                    <option value="or"  <?php echo ($default_search == 'or' ) ? 'selected' : ''; ?> >OR</option>
                </select>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="author_filter" placeholder="Author" value="<?php echo $default_author;?>">
            </div>
            <button type="submit" class="btn btn-success" value="1"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Search</button>
        </form>
    </div>

    <div class="table-responsive">
        <!-- Data Table -->
        <table class="table table-striped">
            <!-- Header Row -->
            <tr>
                <td>ID</td>
                <td>Name</td>
                <td>Author</td>
                <td>Type</td>
                <td>Price</td>
                <td>Quantity
                  <?php
                      $data_quantity_order      = NULL;
                      $data_quantity_order_icon = NULL;
                      if (
                          isset($default_quantity_order) AND
                          $default_quantity_order == 'ASC'
                      ) {
                          $data_quantity_order      = 'DESC';
                          $data_quantity_order_icon = 'glyphicon glyphicon-sort';
                      } else {
                          $data_quantity_order      = 'ASC';
                          $data_quantity_order_icon = 'glyphicon glyphicon-sort';
                      }
                  ?>
                  <a id="sort_anchor" href="#" data_quantity_order="<?php echo $data_quantity_order;?>">
                      <span id="sort_icon" class="<?php echo $data_quantity_order_icon;?>" aria-hidden="true"></span>
                  </a>
                </td>
                <td>On Display</td>
                <td>Action</td>
            </tr>
            <!-- Data Rows -->
            <?php foreach ($products as $key => $obj) { ?>
                <?php if ($obj['quantity_in_stock'] < 1) { ?>
                    <tr class="danger">
                <?php } elseif (
                    $obj['show'] != 1
                ) { ?>
                    <tr class="warning">
                <?php } else { ?>
                    <tr>
                <?php } ?>
                    <td class="col-xs-1"><?php echo $obj['product_id']; ?>                           </td>
                    <td class="col-xs-3"><?php echo $obj['name']; ?>                                 </td>
                    <td class="col-xs-2"><?php echo isset($obj['author']) ? $obj['author'] : '--'; ?></td>
                    <td class="col-xs-1"><?php echo $obj['product_type_name']; ?>                    </td>
                    <td class="col-xs-1"><?php echo $obj['price']; ?>                                </td>
                    <td class="col-xs-1"><?php echo $obj['quantity_in_stock'];?>                     </td>
                    <td class="col-xs-1"><?php echo $obj['show']; ?>                                 </td>
                    <td class="col-xs-2">
                        <div class="btn-group-xs" role="group" aria-label="...">
                            <a href="<?php echo create_product_url($obj['product_id'], $obj['name'], $obj['author']); ?>" target="_blank" class="btn btn-default" role="button" data-toggle="tooltip" data-placement="top" title="Preview"><span class="glyphicon glyphicon-file" aria-hidden="true"></span></a>
                            <a href="<?php echo site_url('manage/edit/'.$obj['product_id']); ?>" class="btn btn-default" role="button" data-toggle="tooltip" data-placement="top" title="Edit"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
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
                        <a href="<?php echo site_url('manage/index/'.$page['prev_page']).'?name_filter='.$default_name.'&author_filter='.$default_author.'&quantity_order='.$default_quantity_order;?>">
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
                        <a href="<?php echo site_url('manage/index/'.$page['next_page']).'?name_filter='.$default_name.'&author_filter='.$default_author.'&quantity_order='.$default_quantity_order;?>">
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
