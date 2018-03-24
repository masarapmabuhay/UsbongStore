<?php
defined('BASEPATH') OR exit('No direct script access allowed');
echo link_tag('assets/css/manage/breadcrumbs.css');
echo link_tag('assets/css/manage/merchant_form.css');
?>

<!-- Import Cropit -->
<script src="<?php echo base_url().'assets/js/cropit/jquery.cropit.js'?>"></script>
<!-- Import ckeditor -->
<script src="https://cdn.ckeditor.com/ckeditor5/1.0.0-alpha.2/classic/ckeditor.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $(function() {
            // init cropit
            $('.image-editor').cropit({
                allowDragNDrop: false, // this feature is only available for jquery 2 (we're using 3)
                width: 161,
                height: 161,
                exportZoom: 1,
                minZoom: 'fit', //'fill'
                maxZoom: 1.5,
                freeMove: false,
                imageBackground: true,
                imageBackgroundBorderWidth: 20,
            });

            // make sure cropit data from last failed submission is recalled
            <?php $image = set_value('image'); ?>
            <?php if (!empty($image)) {  ?>
                $('#image').val('<?php echo $image;?>');
                $('.image-editor').cropit('imageSrc', '<?php echo $image;?>');
            <?php } elseif ($mode == 'edit') { ?>
                $('.image-editor').cropit('imageSrc', '<?php echo create_merchant_image_url($merchant_model['merchant_name']);?>');
            <?php } ?>

            // set image data on form submission
            $('form').submit(function() {
                // get data from cropit
                var imageData = $('.image-editor').cropit('export', {
                    type: 'image/jpeg',
                    quality: .8,
                    originalSize: false
                });
                // store data to image form input
                $('#image').val(imageData);
            });

            // init ckeditor
            ClassicEditor.create(
                document.querySelector('textarea[name="merchant_motto"]')
            ).catch(
              error => {
                  console.error( error );
              }
            );
        });
    });
</script>

<!-- Render Form -->
<div class="container">
    <!-- Header -->
    <div class="row">
      <div class="col-xs-6 breadcrumb-wrapper">
        <!-- Bread Crumbs -->
        <ol class="breadcrumb text-left">
          <li><a href="<?php echo site_url();?>">Usbong Store</a></li>
          <li><a href="<?php echo site_url('manage/merchants');?>">Manage Merchants</a></li>
          <?php if ($mode == 'edit') { ?>
            <li class="active">Edit</li>
          <?php } else { ?>
            <li class="active">Add</li>
          <?php } ?>
        </ol>
      </div>
    </div>

    <!-- Prepare Form Data -->
    <?php
        $form_data = [
            'merchant_name'             => [ 'label' => 'Merchant Name'],
            'merchant_motto'            => [ 'label' => 'Merchant Motto'],
            'merchant_motto_font_color' => [
                'label' => 'Merchant Motto Font Color',
                'placeholder' => '#0F0F0F'
            ],
        ];
    ?>

    <!-- Error Div for Falsh Data: used when database save fails -->
    <?php if ($this->session->flashdata('manage-merchant-add-error')) { ?>
        <div class="error-row alert alert-danger">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            <strong>Error!</strong> <?php echo $this->session->flashdata('manage-merchant-add-error'); ?>
        </div>
    <?php } ?>

    <!-- Form -->
    <?php
        if ($mode == 'edit') {
            echo form_open('manage/merchants/edit/'.$merchant_model['merchant_id']);
        } else {
            echo form_open('manage/merchants/add');
        }
    ?>
        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingOne">
                <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Pick an Image (jpg)
                    </a>
                </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse <?php if (validation_errors() == '' OR form_error('image') != '') { echo 'in'; } else {echo '';} ?>" role="tabpanel" aria-labelledby="headingOne">
                    <div class="panel-body">
                        <!-- Cropped image is stored here -->
                        <textarea type="hidden" name="image" id="image"></textarea>
                        <div class="image-editor">
                            <input type="file" class="cropit-image-input">
                            <div class="cropit-preview center-block"></div>
                            <div id="image_help_block" class="text-center"><?php echo form_error('image');?></div>
                            <div class="zoom-slider text-center">
                                <span class="glyphicon glyphicon-zoom-out" aria-hidden="true"></span>
                                <input type="range" class="cropit-image-zoom-input">
                                <span class="glyphicon glyphicon-zoom-in" aria-hidden="true"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingTwo">
                <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Basic Information
                    </a>
                </h4>
                </div>
                <div id="collapseTwo" class="panel-collapse collapse <?php if (form_error('merchant_name') != '' OR form_error('merchant_motto') != '' OR form_error('merchant_motto_font_color') != '') { echo 'in'; } ?>" role="tabpanel" aria-labelledby="headingTwo">
                    <div class="panel-body">
                        <?php
                            foreach ($form_data as $input_key => $obj) {
                                $error = form_error($input_key);
                                $value = set_value($input_key);
                                // use previously saved data from database if available
                                if (empty($value) AND $mode == 'edit') {
                                    $value = $merchant_model[$input_key];
                                }
                        ?>
                            <div class="form-group <?php echo (isset($error) AND !empty($error)) ? 'has-error has-feedback': ''; ?>">
                                <label class="control-label" for="<?php echo $input_key; ?>"><?php echo $obj['label']; ?></label>
                                <?php if ($input_key == 'merchant_motto') { ?>
                                    <textarea rows='5' class="form-control" name="<?php echo $input_key; ?>" id="<?php echo $input_key; ?>" aria-describedby="<?php echo $input_key.'_help_block'; ?>"><?php if (!empty($value)) {echo $value;}?></textarea>
                                <?php } else { ?>
                                    <input type="text" class="form-control" name="<?php echo $input_key; ?>" id="<?php echo $input_key; ?>" value="<?php echo $value;?>" aria-describedby="<?php echo $input_key.'_help_block'; ?>" <?php echo (isset($obj['placeholder'])) ? 'placeholder="'.$obj['placeholder'].'"': ''; ?> >
                                <?php } ?>
                                <span id="<?php echo $input_key.'_help_block'; ?>" class="help-block"><?php echo $error;?></span>
                            </div>
                        <?php
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>

        <div><input type="submit" value="Submit" /></div>
    </form>

</div>
