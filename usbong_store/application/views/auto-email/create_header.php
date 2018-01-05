<?php
defined('BASEPATH') OR exit('No direct script access allowed');
echo link_tag('assets/css/auto-email/create.css');
echo link_tag('assets/css/auto-email/breadcrumbs.css');

// urls
if (isset($mode) AND $mode == 'edit') {
    $template_url = site_url('auto-email/'.$mode.'/template/'.$auto_email_id.'/1');
    $data_url     = site_url('auto-email/'.$mode.'/data/'.$auto_email_id);
    $products_url = site_url('auto-email/'.$mode.'/products/'.$auto_email_id.'/1');
    $save_url     = site_url('auto-email/'.$mode.'/save/'.$auto_email_id);
    $breadcrumb   = 'Edit Email '.$auto_email_id;
} else {
    $template_url = site_url('auto-email/create/template/1');
    $data_url     = site_url('auto-email/create/data');
    $products_url = site_url('auto-email/create/products/1');
    $save_url     = site_url('auto-email/create/save');
    $breadcrumb   = 'Create';
}

?>
<div class="container">

    <nav class="navbar-static-top categories-navbar step_row">
        <div class="container-fluid">
            <ul class="nav navbar-nav">
                <li>
                    <a href="<?php echo $template_url; ?>">
                        Choose Template
                        <?php if ($this->session->has_userdata('auto_email-create-auto_email_template_id')) { ?>
                            <span class="glyphicon glyphicon-ok header_check" aria-hidden="true"></span>
                        <?php } ?>
                    </a>
                </li>
                <li>
                    <a href="<?php echo $data_url; ?>">
                        Set Data
                        <?php if ($this->session->has_userdata('auto_email-create-auto_email_model')) { ?>
                            <span class="glyphicon glyphicon-ok header_check" aria-hidden="true"></span>
                        <?php } ?>
                    </a>
                </li>
                <li>
                    <a href="<?php echo $products_url; ?>">
                        Pick Products
                        <?php
                            if (
                                $this->session->has_userdata('auto_email-create-auto_email_product_models'           ) AND
                                $this->session->has_userdata('auto_email-create-auto_email_template-product_capacity') AND
                                count(
                                    $this->session->userdata('auto_email-create-auto_email_product_models')
                                ) >= $this->session->userdata('auto_email-create-auto_email_template-product_capacity')
                            ) {
                        ?>
                            <span class="glyphicon glyphicon-ok header_check" aria-hidden="true"></span>
                        <?php } ?>
                    </a>
                </li>
                <li>
                    <a href="<?php echo $save_url; ?>">
                        <span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> SAVE
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Bread Crumbs -->
    <div class="row">
      <ol class="breadcrumb text-left">
        <li><a href="<?php echo site_url();?>">Usbong Store</a></li>
        <li><a href="<?php echo site_url('auto-email');?>">Auto Email</a></li>
        <li class="active"><?php echo $breadcrumb;?></li>
      </ol>
    </div>

</div>
