<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// urls
if ($page['mode'] == 'edit') {
    $post_url = site_url('auto-email/'.$page['mode'].'/save/'.$page['auto_email_id']);
} else {
    $post_url = site_url('auto-email/'.$page['mode'].'/save');
}
?>
<div class="container">
    <?php if ($this->session->flashdata('auto_email-create_save-error')) { ?>
        <!-- Error Div for Falsh Data: used this when pre-req is not yet set -->
        <div class="error-row alert alert-warning">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            <strong>Warning!</strong> <?php echo $this->session->flashdata('auto_email-create_save-error'); ?>
        </div>
    <?php } else { ?>
        <!-- Warning Div for Falsh Data: used this when save fails -->
        <?php if ($this->session->flashdata('auto_email-create_save-warning')) { ?>
            <div class="error-row alert alert-warning">
                <a href="#" class="close" data-dismiss="alert">&times;</a>
                <strong>Warning!</strong> <?php echo $this->session->flashdata('auto_email-create_save-warning'); ?>
            </div>
        <?php } ?>

        <!-- Summary Data -->
        <dl class="dl-horizontal">
            <!-- Subject -->
            <dt>Email Subject:</dt>
            <dd><?php echo $auto_email_model['subject']; ?></dd>

            <!-- Data -->
            <?php if ($auto_email_template_model['data_01_used'] == 1) { ?>
                <dt><?php echo $auto_email_template_model['data_01_attribute']; ?>:</dt>
                <dd><?php echo $auto_email_model['data_01']; ?></dd>
            <?php } ?>
            <?php if ($auto_email_template_model['data_02_used'] == 1) { ?>
                <dt><?php echo $auto_email_template_model['data_02_attribute']; ?>:</dt>
                <dd><?php echo $auto_email_model['data_02']; ?></dd>
            <?php } ?>
            <?php if ($auto_email_template_model['data_03_used'] == 1) { ?>
                <dt><?php echo $auto_email_template_model['data_03_attribute']; ?>:</dt>
                <dd><?php echo $auto_email_model['data_03']; ?></dd>
            <?php } ?>
            <?php if ($auto_email_template_model['data_04_used'] == 1) { ?>
                <dt><?php echo $auto_email_template_model['data_04_attribute']; ?>:</dt>
                <dd><?php echo $auto_email_model['data_04']; ?></dd>
            <?php } ?>
            <?php if ($auto_email_template_model['data_05_used'] == 1) { ?>
                <dt><?php echo $auto_email_template_model['data_05_attribute']; ?>:</dt>
                <dd><?php echo $auto_email_model['data_05']; ?></dd>
            <?php } ?>

            <!-- Products -->
            <dt>Products:</dt>
            <dd>
                <?php foreach ($auto_email_product_models as $product_id => $name) { ?>
                    <?php echo $name.'<br/>';?>
                <?php } ?>
            </dd>

            <!-- Save Button -->
            <dt></dt>
            <dd class="auto_email_save_container">
                <form method="post" action="<?php echo $post_url;?>">
                    <button name="submit_button" type="submit" class="btn btn-success">Save</button>
                </form>
            </dd>
        </dl>
    <?php } ?>
</div>