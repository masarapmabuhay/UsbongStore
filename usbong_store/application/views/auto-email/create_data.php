<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="container">

    <?php if ($this->session->flashdata('auto_email-create_data-error')) { ?>
        <!-- Error Div for Falsh Data: used this when pre-req is not yet set -->
        <div class="error-row alert alert-warning">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            <strong>Warning!</strong> <?php echo $this->session->flashdata('auto_email-create_data-error'); ?>
        </div>
    <?php } else { ?>

        <!-- Warning Div for Submit Button: used when form validation fails -->
        <?php $validation_errors = validation_errors('<span>', '</span>'); ?>
        <?php if (!empty($validation_errors)) { ?>
            <div class="error-row alert alert-warning">
                <a href="#" class="close" data-dismiss="alert">&times;</a>
                <strong>Warning!</strong> <?php echo $validation_errors; ?>
            </div>
        <?php } ?>

        <form method="post" action="<?php echo site_url('auto-email/create/data');?>">
            <?php
                // check if session field exists
                $session_object =  $this->session->userdata('auto_email-create-auto_email_model');
                // carry over from last erroneous submission
                $default_subject = isset($session_object['subject']) ? $session_object['subject'] : set_value('subject');
                $default_data_01 = isset($session_object['data_01']) ? $session_object['data_01'] : set_value('data_01');
                $default_data_02 = isset($session_object['data_02']) ? $session_object['data_02'] : set_value('data_02');
                $default_data_03 = isset($session_object['data_03']) ? $session_object['data_04'] : set_value('data_03');
                $default_data_04 = isset($session_object['data_04']) ? $session_object['data_04'] : set_value('data_04');
                $default_data_05 = isset($session_object['data_05']) ? $session_object['data_05'] : set_value('data_05');
            ?>
            <div class="form-group">
                <label for="subject">Email Subject</label>
                <input type="text" class="form-control" name="subject" placeholder="An Attention Grabbing Headline" value="<?php echo $default_subject;?>">
            </div>
            <?php if ($auto_email_template['data_01_used'] == 1) { ?>
                <div class="form-group">
                    <label for="data_01"><?php echo $auto_email_template['data_01_attribute'];?></label>
                    <input type="text" name="data_01" class="form-control" rows="3" value="<?php echo $default_data_01;?>"></input>
                </div>
            <?php } ?>
            <?php if ($auto_email_template['data_02_used'] == 1) { ?>
                <div class="form-group">
                    <label for="data_02"><?php echo $auto_email_template['data_02_attribute'];?></label>
                    <input type="text" name="data_02" class="form-control" rows="3" value="<?php echo $default_data_02;?>"></input>
                </div>
            <?php } ?>
            <?php if ($auto_email_template['data_03_used'] == 1) { ?>
                <div class="form-group">
                    <label for="data_03"><?php echo $auto_email_template['data_03_attribute'];?></label>
                    <input type="text" name="data_03" class="form-control" rows="3" value="<?php echo $default_data_03;?>"></input>
                </div>
            <?php } ?>
            <?php if ($auto_email_template['data_04_used'] == 1) { ?>
                <div class="form-group">
                    <label for="data_04"><?php echo $auto_email_template['data_04_attribute'];?></label>
                    <input type="text" name="data_04" class="form-control" rows="3" value="<?php echo $default_data_04;?>"></input>
                </div>
            <?php } ?>
            <?php if ($auto_email_template['data_05_used'] == 1) { ?>
                <div class="form-group">
                    <label for="data_05"><?php echo $auto_email_template['data_05_attribute'];?></label>
                    <input type="text" name="data_05" class="form-control" rows="3" value="<?php echo $default_data_05;?>"></input>
                </div>
            <?php } ?>
            <button name="submit_button" type="submit" class="btn btn-success">Next <span aria-hidden="true">&rarr;</span></button>
        </form>
    <?php } ?>

</div>