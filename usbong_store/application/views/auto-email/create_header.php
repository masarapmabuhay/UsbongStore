<?php
defined('BASEPATH') OR exit('No direct script access allowed');
echo link_tag('assets/css/auto-email/create.css');
?>
<div class="container">

    <nav class="navbar-static-top categories-navbar step_row">
        <div class="container-fluid">
            <ul class="nav navbar-nav">
                <li>
                    <a href="<?php echo site_url('auto-email/create/template/1'); ?>">
                        Choose Template
                        <?php if ($this->session->has_userdata('auto_email-create-auto_email_template_id')) { ?>
                            <span class="glyphicon glyphicon-ok header_check" aria-hidden="true"></span>
                        <?php } ?>
                    </a>
                </li>
                <li>
                    <a href="<?php echo site_url('auto-email/create/data'); ?>">
                        Set Data
                        <?php if ($this->session->has_userdata('auto_email-create-auto_email_model')) { ?>
                            <span class="glyphicon glyphicon-ok header_check" aria-hidden="true"></span>
                        <?php } ?>
                    </a>
                </li>
                <li>
                    <a href="<?php echo site_url('auto-email/create/products/1'); ?>">
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
                    <a href="<?php echo site_url('auto-email/create/save'); ?>">
                        <span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> SAVE
                    </a>
                </li>
            </ul>
        </div>
    </nav>

</div>