<?php
defined('BASEPATH') OR exit('No direct script access allowed');
echo link_tag('assets/css/manage/breadcrumbs.css');
echo link_tag('assets/css/manage/search_form.css');
?>

<div class="container">
    <!-- Header -->
    <div class="row">
      <div class="col-xs-6 breadcrumb-wrapper">
        <!-- Bread Crumbs -->
        <ol class="breadcrumb text-left">
          <li><a href="<?php echo site_url();?>">Usbong Store</a></li>
          <li class="active">Manage Merchants</li>
        </ol>
      </div>
      <div class="col-xs-6">
        <!-- Add Button -->
        <a href="<?php echo site_url('manage/merchants/add'); ?>" class="btn btn-success navbar-btn pull-right" role="button" data-toggle="tooltip" data-placement="top" title="Add Merchant"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add Merchant</a>
      </div>
    </div>

    <!-- Search Button -->
    <div class="search_form_row row center-block">
        <?php
            $search_url             = site_url('manage/merchants/'.$page['page']);
            $default_merchant_name  = $page['filters']['merchant_name'];
            $default_merchant_motto = $page['filters']['merchant_motto'];
            $default_search         = $page['options']['search'];
        ?>
        <form class="form-inline" method="get" action="<?php echo $search_url; ?>">
            <div class="form-group">
                <input type="text" class="form-control" name="merchant_name_filter" placeholder="Merchant" value="<?php echo $default_merchant_name;?>">
            </div>
            <div class="form-group">
                <select name="search" class="form-control">
                    <option value="and" <?php echo ($default_search == 'and') ? 'selected' : ''; ?> >AND</option>
                    <option value="or"  <?php echo ($default_search == 'or' ) ? 'selected' : ''; ?> >OR</option>
                </select>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="merchant_motto_filter" placeholder="Motto" value="<?php echo $default_merchant_motto;?>">
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
                <td>Merchant Name</td>
                <td>Merchant Motto</td>
                <td>Action</td>
            </tr>
            <!-- Data Rows -->
            <?php foreach ($merchants as $key => $obj) { ?>
                <tr>
                    <td class="col-xs-2"><?php echo $obj['merchant_id'];    ?></td>
                    <td class="col-xs-4"><?php echo $obj['merchant_name'];  ?></td>
                    <td class="col-xs-3"><?php echo $obj['merchant_motto']; ?></td>
                    <td class="col-xs-3">
                        <div class="btn-group-xs" role="group" aria-label="...">
                            <a href="<?php echo site_url('manage/merchants/edit/'.$obj['merchant_id']); ?>" class="btn btn-default" role="button" data-toggle="tooltip" data-placement="top" title="Edit"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
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
                        <a href="<?php echo site_url('manage/merchants/'.$page['prev_page']).'?merchant_name_filter='.$default_merchant_name.'&merchant_motto_filter='.$default_merchant_motto;?>">
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
                        <a href="<?php echo site_url('manage/merchants/'.$page['next_page']).'?merchant_name_filter='.$default_merchant_name.'&merchant_motto_filter='.$default_merchant_motto;?>">
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
