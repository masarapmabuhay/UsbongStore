<?php
defined('BASEPATH') OR exit('No direct script access allowed');
echo link_tag('assets/css/manage/breadcrumbs.css');
?>
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

    <div class="table-responsive">
        <!-- Data Table -->
        <table class="table table-striped">
            <!-- Header Row -->
            <tr>
                <td>ID</td>
                <td>Name</td>
                <td>Type</td>
                <td>Price</td>
                <td>Quantity</td>
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
                    <td><?php echo $obj['product_id']; ?>        </td>
                    <td><?php echo $obj['name']; ?>              </td>
                    <td><?php echo $obj['product_type_name']; ?> </td>
                    <td><?php echo $obj['price']; ?>             </td>
                    <td><?php echo $obj['quantity_in_stock'];?>  </td>
                    <td><?php echo $obj['show']; ?>              </td>
                    <td>
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
                        <a href="<?php echo site_url('manage/index/'.$page['prev_page']);?>">
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
                        <a href="<?php echo site_url('manage/index/'.$page['next_page']);?>">
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
