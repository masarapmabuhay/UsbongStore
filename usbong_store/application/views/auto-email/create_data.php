<?php
defined('BASEPATH') OR exit('No direct script access allowed');
echo link_tag('assets/css/auto-email/create_data.css');

// urls
if ($page['mode'] == 'edit') {
    $post_url = site_url('auto-email/'.$page['mode'].'/data/'.$page['auto_email_id']);
} else {
    $post_url = site_url('auto-email/'.$page['mode'].'/data');
}

// access session data
$session_object =  $this->session->userdata('auto_email-create-auto_email_model');
?>

<!-- Import Cropit -->
<script src="<?php echo base_url().'assets/js/cropit/jquery.cropit.js'?>"></script>

<!-- Instantiate Cropit -->
<script type="text/javascript">
    $(document).ready(function() {
        <?php
            for ($data_index = 1; $data_index <= 5; $data_index++) {
                if ($auto_email_template['data_0'.$data_index.'_type'] == 'image') {
        ?>
                    $(function() {
                        // init coprit
                        $('#data_0<?php echo $data_index; ?>_image_editor').cropit({
                            allowDragNDrop: false, // this feature is only available for jquery 2 (we're using 3)
                            width: 600,
                            height: 390,
                            exportZoom: 1,
                            minZoom: 'fit',
                            maxZoom: 1.5,
                            freeMove: false,
                            imageBackground: true,
                            imageBackgroundBorderWidth: 20,
                        });

                        // make sure cropit data from last failed submission is recalled
                        <?php
                            $js_image_data = isset($session_object['data_0'.$data_index]) ? $session_object['data_0'.$data_index] : set_value('data_0'.$data_index);
                        ?>
                        <?php if (!empty($js_image_data) AND (substr($js_image_data, 0, 10) != 'auto-email')) {  ?>
                            $('#data_0<?php echo $data_index; ?>').val('<?php echo $js_image_data;?>');
                            $('#data_0<?php echo $data_index; ?>_image_editor').cropit('imageSrc', '<?php echo $js_image_data;?>');
                        <?php } elseif ($page['mode'] == 'edit') { ?>
                            $('#data_0<?php echo $data_index; ?>_image_editor').cropit('imageSrc', '<?php echo base_url('assets/images/'.$js_image_data); ?>');
                        <?php } ?>

                        // set image data on form submission
                        $('form').submit(function() {
                            // get data from cropit
                            var imageData = $('#data_0<?php echo $data_index; ?>_image_editor').cropit('export', {
                                type: 'image/jpeg',
                                quality: .8,
                                originalSize: false
                            });
                            // store data to image form input
                            $('#data_0<?php echo $data_index; ?>').val(imageData);
                        });
                    });
        <?php
                }
            }
        ?>
    });
</script>


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

        <form method="post" action="<?php echo $post_url;?>">
            <?php
                // carry over from last erroneous submission
                $default_subject = isset($session_object['subject']) ? $session_object['subject'] : set_value('subject');
            ?>
            <div class="form-group">
                <label for="subject">Email Subject</label>
                <input type="text" class="form-control" name="subject" placeholder="An Attention Grabbing Headline" value="<?php echo $default_subject;?>">
            </div>
            <?php for ($data_index = 1; $data_index <= 5; $data_index++) { ?>
                <?php
                    // carry over from last erroneous submission
                    $default_data = isset($session_object['data_0'.$data_index]) ? $session_object['data_0'.$data_index] : set_value('data_0'.$data_index);
                ?>
                <?php if ($auto_email_template['data_0'.$data_index.'_used'] == 1) { ?>
                    <div class="form-group">
                        <label for="data_0<?php echo $data_index;?>"><?php echo $auto_email_template['data_0'.$data_index.'_attribute'];?></label>
                        <?php if ($auto_email_template['data_0'.$data_index.'_type'] == 'textarea') { ?>
                            <textarea name="data_0<?php echo $data_index;?>" class="form-control" rows="3"><?php echo $default_data;?></textarea>
                        <?php } elseif ($auto_email_template['data_0'.$data_index.'_type'] == 'image') { ?>
                            <!-- Cropped image is stored here -->
                            <textarea type="hidden" name="data_0<?php echo $data_index;?>" id="data_0<?php echo $data_index;?>" class="hidden-textarea"></textarea>
                            <div class="image-editor" id="data_0<?php echo $data_index;?>_image_editor">
                                <input type="file" class="cropit-image-input">
                                <div class="cropit-preview center-block"></div>
                                <div id="image_help_block" class="text-center"><?php echo form_error('image');?></div>
                                <div class="zoom-slider text-center">
                                    <span class="glyphicon glyphicon-zoom-out" aria-hidden="true"></span>
                                    <input type="range" class="cropit-image-zoom-input">
                                    <span class="glyphicon glyphicon-zoom-in" aria-hidden="true"></span>
                                </div>
                            </div>
                        <?php } else { ?>
                            <input type="<?php echo $auto_email_template['data_0'.$data_index.'_type'];?>" name="data_0<?php echo $data_index;?>" class="form-control" rows="3" value="<?php echo $default_data;?>">
                        <?php } ?>
                    </div>
                <?php } ?>
            <?php } ?>
            <button name="submit_button" type="submit" class="btn btn-success">Next <span aria-hidden="true">&rarr;</span></button>
        </form>
    <?php } ?>

</div>