<?php
defined('BASEPATH') OR exit('No direct script access allowed');
echo link_tag('assets/css/manage/breadcrumbs.css');
echo link_tag('assets/css/manage/product_form.css');
?>

<!-- Import Cropit -->
<script src="<?php echo base_url().'assets/js/cropit/jquery.cropit.js'?>"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $(function() {
            // init coprit
            $('.image-editor').cropit({
                allowDragNDrop: false, // this feature is only available for jquery 2 (we're using 3)
                width: 264,
                height: 352,
                exportZoom: 1,
                minZoom: 'fill',
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
                $('.image-editor').cropit('imageSrc', '<?php echo create_image_url($product_model['name'], $product_model['product_type_name']);?>');
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
          <li><a href="<?php echo site_url('manage/index');?>">Manage</a></li>
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
            'name'              => [ 'label' => 'Name'],
            'merchant_id'       => [
                'label' => 'Merchant',
                'options' => []
            ],
            'product_type_id'   => [
                'label' => 'Product Type',
                'options' => []
            ],
            'quantity_in_stock' => [ 'label' => 'Quantity in Stock'],
            'price'             => [ 'label' => 'Price'],
            'show'              => [
                'label' => 'Show',
                'options' => [
                    '1' => 'Yes',
                    '0' => 'No',
                ]
            ],
            'previous_price'    => [ 'label' => 'Previous Price'],
            'language'          => [
                'label' => 'Language',
                'placeholder' => 'English, Filipino, English/Filipino'
            ],
            'author'            => [ 'label' => 'Author'],
            'supplier'          => [ 'label' => 'Supplier'],
            'description'       => [
                'label' => 'Description',
                'options' => [
                    NULL                => 'n/a',
                    'New'               => 'New',
                    'Used - Very Good'  => 'Used - Very Good',
                    'Used - Good'       => 'Used - Good',
                    'Used - Acceptable' => 'Used - Acceptable',
                ]
            ],
            'format'            => [
                'label' => 'Format',
                'options' => [
                    NULL        => 'n/a',
                    'Paperback' => 'Paperback',
                    'Hardcover' => 'Hardcover',
                ]
            ],
            'translator'        => [ 'label' => 'Translator'],
            'product_overview'  => [ 'label' => 'Product Overview'],
            'pages'             => [ 'label' => 'Pages'],
            'external_url'      => [ 'label' => 'External URL'],
        ];

        foreach($merchant_model as $key => $obj) {
            $form_data['merchant_id']['options'][$obj['merchant_id']] = $obj['merchant_name'];
        }

        foreach($product_type_model as $key => $obj) {
            $form_data['product_type_id']['options'][$obj['product_type_id']] = $obj['product_type_name'];
        }
    ?>

    <!-- Error Div for Falsh Data: used when database save fails -->
    <?php if ($this->session->flashdata('manage-add-error')) { ?>
        <div class="error-row alert alert-danger">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            <strong>Error!</strong> <?php echo $this->session->flashdata('manage-add-error'); ?>
        </div>
    <?php } ?>

    <!-- Form -->
    <?php
        if ($mode == 'edit') {
            echo form_open('manage/edit/'.$product_model['product_id']);
        } else {
            echo form_open('manage/add');
        }
    ?>
        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingOne">
                <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Pick an Image
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
                                <span class="glyphicon glyphicon-zoom-in" aria-hidden="true"></span>
                                <input type="range" class="cropit-image-zoom-input">
                                <span class="glyphicon glyphicon-zoom-out" aria-hidden="true"></span>
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
                <div id="collapseTwo" class="panel-collapse collapse <?php if (form_error('merchant_id') != '' OR form_error('product_type_id') != '' OR form_error('name') != '' OR form_error('quantity_in_stock') != '' OR form_error('price') != '' OR form_error('show') != '') { echo 'in'; } ?>" role="tabpanel" aria-labelledby="headingTwo">
                    <div class="panel-body">
                        <?php
                            foreach ($form_data as $input_key => $obj) {
                                $error = form_error($input_key);
                                $value = set_value($input_key);
                                // use previously saved data from database if available
                                if (empty($value) AND $mode == 'edit') {
                                    $value = $product_model[$input_key];
                                }
                        ?>
                            <?php
                                if (in_array($input_key, ['merchant_id', 'product_type_id', 'name', 'quantity_in_stock', 'price', 'show'])) {
                            ?>
                                <div class="form-group <?php echo (isset($error) AND !empty($error)) ? 'has-error has-feedback': ''; ?>">
                                    <label class="control-label" for="<?php echo $input_key; ?>"><?php echo $obj['label']; ?></label>
                                    <?php if ($input_key == 'product_overview') { ?>
                                        <textarea rows='5' class="form-control" name="<?php echo $input_key; ?>" id="<?php echo $input_key; ?>" aria-describedby="<?php echo $input_key.'_help_block'; ?>"><?php if (!empty($value)) {echo $value;}?></textarea>
                                    <?php } elseif (in_array($input_key, ['merchant_id', 'product_type_id', 'language', 'description', 'format', 'show'])) { ?>
                                        <select class="form-control" name="<?php echo $input_key; ?>" id="<?php echo $input_key; ?>" aria-describedby="<?php echo $input_key.'_help_block'; ?>">
                                            <?php foreach ($obj['options'] as $option_value => $option_label) { ?>
                                                <option value="<?php echo $option_value; ?>" <?php echo ($value == $option_value) ? 'selected' : ''; ?>><?php echo $option_label;?></option>
                                            <?php } ?>
                                        </select>
                                    <?php } else { ?>
                                        <input type="text" class="form-control" name="<?php echo $input_key; ?>" id="<?php echo $input_key; ?>" value="<?php echo $value;?>" aria-describedby="<?php echo $input_key.'_help_block'; ?>">
                                    <?php } ?>
                                    <span id="<?php echo $input_key.'_help_block'; ?>" class="help-block"><?php echo $error;?></span>
                                </div>
                            <?php
                                }
                            ?>
                        <?php
                            }
                        ?>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingThree">
                <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Advanced Options
                    </a>
                </h4>
                </div>
                <div id="collapseThree" class="panel-collapse collapse <?php if (form_error('previous_price') != '' OR form_error('language') != '' OR form_error('author') != '' OR form_error('supplier') != '' OR form_error('description') != '' OR form_error('format') != '' OR form_error('translator') != '' OR form_error('product_overview') != '' OR form_error('pages') != '' OR form_error('external_url') != '') { echo 'in'; } ?>" role="tabpanel" aria-labelledby="headingThree">
                    <div class="panel-body">
                        <?php
                            foreach ($form_data as $input_key => $obj) {
                                $error = form_error($input_key);
                                $value = set_value($input_key);
                                // use previously saved data from database if available
                                if (empty($value) AND $mode == 'edit') {
                                    $value = $product_model[$input_key];
                                }
                        ?>
                            <?php
                                if (!in_array($input_key, ['merchant_id', 'product_type_id', 'name', 'quantity_in_stock', 'price', 'show'])) {
                            ?>
                                <div class="form-group <?php echo (isset($error) AND !empty($error)) ? 'has-error has-feedback': ''; ?>">
                                    <label class="control-label" for="<?php echo $input_key; ?>"><?php echo $obj['label']; ?></label>
                                    <?php if ($input_key == 'product_overview') { ?>
                                        <textarea rows='5' class="form-control" name="<?php echo $input_key; ?>" id="<?php echo $input_key; ?>" aria-describedby="<?php echo $input_key.'_help_block'; ?>"><?php if (!empty($value)) {echo $value;}?></textarea>
                                    <?php } elseif (in_array($input_key, ['merchant_id', 'product_type_id', 'description', 'format'])) { ?>
                                        <select class="form-control" name="<?php echo $input_key; ?>" id="<?php echo $input_key; ?>" aria-describedby="<?php echo $input_key.'_help_block'; ?>">
                                            <?php foreach ($obj['options'] as $option_value => $option_label) { ?>
                                                <option value="<?php echo $option_value; ?>" <?php echo ($value == $option_value) ? 'selected' : ''; ?>><?php echo $option_label;?></option>
                                            <?php } ?>
                                        </select>
                                    <?php } else { ?>
                                        <input type="text" class="form-control" name="<?php echo $input_key; ?>" id="<?php echo $input_key; ?>" value="<?php echo $value;?>" aria-describedby="<?php echo $input_key.'_help_block'; ?>" <?php echo (isset($obj['placeholder'])) ? 'placeholder="'.$obj['placeholder'].'"': ''; ?> >
                                    <?php } ?>
                                    <span id="<?php echo $input_key.'_help_block'; ?>" class="help-block"><?php echo $error;?></span>
                                </div>
                            <?php
                                }
                            ?>
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
