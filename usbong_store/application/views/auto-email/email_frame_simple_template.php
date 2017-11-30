<?php
    // NOTES:
    // (1) This email template uses emailframe
    //     - Base Template: https://github.com/g13nn/Email-Framework/blob/master/grids/fluid/fluid-grid-master.html
    //     - Doc: http://emailframe.work/
    // (2) To debug the grid, please uncomment the line below
    //     - /*table td { border:1px solid cyan; }*/
    // text control fields
    $max_char_product = 32;
    $max_char_author  = 29;
    // logo fields
    $logo['logo_title'] = 'Usbong';
    $logo['logo_image'] = base_url('assets/images/usbongLogo.png');
    $logo['logo_url']   = site_url();
    // footer fields
    $footer['contact']     = site_url('contact');
    $footer['unsubscribe'] = site_url(
        'auto-email/administer/unsubscribe/'.
        rawurlencode(
            // change / to ~:
            // - / is not url friendly
            // - ~ is excluded from the encryption char set
            preg_replace(
                '/\//',
                '~',
                $this->encryption->encrypt(
                    $customer['customer_id']
                )
            )
        )
    );
    // header elements
    $header['apps'] = [
        0 => [
            'name'  => 'Dahon',
            'image' => base_url('assets/images/banner_icons/dahon.png'),
            'url'   => 'https://play.google.com/store/apps/details?id=usbong.android.fi&hl=en',
        ],
        1 => [
            'name'  => 'Pagtsing',
            'image' => base_url('assets/images/banner_icons/pagtsing.png'),
            'url'   => 'https://play.google.com/store/apps/details?id=usbong.android.pagtsing',
        ],
        2 => [
            'name'  => 'JuanT',
            'image' => base_url('assets/images/banner_icons/juanT.png'),
            'url'   => 'https://play.google.com/store/apps/details?id=usbong.android.juant',
        ],
        3 => [
            'name'  => 'Pinya',
            'image' => base_url('assets/images/banner_icons/pinya.png'),
            'url'   => 'https://play.google.com/store/apps/details?id=usbong.android.pinya',
        ],
        4 => [
            'name'  => 'When You Dont Know',
            'image' => base_url('assets/images/banner_icons/whenyoudontknow.png'),
            'url'   => 'https://play.google.com/store/apps/details?id=usbong.android.when_you_dont_know',
        ],
    ];
    // footer elements
    $footer['social'] = [
        0 => [
            'name'   => 'Facebook',
            'image'  => 'http://www.usbong.ph/_/rsrc/1410651067443/home/facebookLogoVerySmall.png',
            'url'    => 'https://www.facebook.com/TheUsbongProject',
            'width'  => '32px',
            'height' => '32px',
        ],
        1 => [
            'name'   => 'Twitter',
            'image'  => 'http://www.usbong.ph/_/rsrc/1410651037345/home/twitterLogoVerySmall.png',
            'url'    => 'http://twitter.com/UsbongPh',
            'width'  => '32px',
            'height' => '32px',
        ],
        2 => [
            'name'   => 'LinkedIn',
            'image'  => 'http://www.usbong.ph/_/rsrc/1466241721168/home/In-2CRev-34px-TM.png',
            'url'    => 'https://www.linkedin.com/company/usbong-social-systems-inc.-usbong-',
            'width'  => '45px',
            'height' => '32px',
        ],
    ];
    // css: logo
    $inline_logo_horizontal_bar_style = 'background-color: #1a0d00;';
    // css: product headline
    $inline_product_headline_style            = 'font-size: 1.5em; color: #222222;';
    $inline_product_headline_store_name_style = 'font-size: 1em; color: #222222; font-weight: bold; text-decoration: none;';
    // css: product
    $inline_product_style = 'font-size: 1.1em; color: #222222; font-weight: bold; text-decoration:none;';
    $inline_author_style  = 'font-size: 1.1em; color: #5c534b; text-decoration:none;';
    $inline_button_style  = 'padding: 5px 5px 5px 5px; text-align: center; background-color: #ffe400; color: #222222; border: 0px solid; border-radius: 4px; font-weight: bold;';
    $inline_anchor_style  = 'color:#222222; text-decoration:none;';
    $inline_price_style  = 'font-size: 1.1em; color:#b88a1b; text-decoration:none;';
    $inline_link_style    = 'color:#222222; text-decoration:underline;';
    // css: social
    $inline_social_text_style = 'color: #5c534b; font-size: 1.5em;';
    // css: footer
    $inline_footer_horizontal_bar_style    = 'background-color: #77b043;';
    $inline_footer_horizontal_style        = 'background-color: #52493f; color: #ffffff;';
    $inline_footer_horizontal_anchor_style = 'color: #ffc90e; text-decoration: underline;';
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title><?php echo $email->subject;?></title>

    <style type="text/css">
        /* Outlines the grid, remove when sending */
        /*table td { border:1px solid cyan; }*/
        /* CLIENT-SPECIFIC STYLES */
        body, table, td, a { -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; }
        table, td { mso-table-lspace: 0pt; mso-table-rspace: 0pt; }
        img { -ms-interpolation-mode: bicubic; }
        /* RESET STYLES */
        img { border: 0; outline: none; text-decoration: none; }
        table { border-collapse: collapse !important; }
        body { margin: 0 !important; padding: 0 !important; width: 100% !important; }
        /* iOS BLUE LINKS */
        a[x-apple-data-detectors] {
            color: inherit !important;
            text-decoration: none !important;
            font-size: inherit !important;
            font-family: inherit !important;
            font-weight: inherit !important;
            line-height: inherit !important;
        }
        /* ANDROID CENTER FIX */
        div[style*="margin: 16px 0;"] { margin: 0 !important; }
    </style>
</head>
<body style="margin:0; padding:0; background-color:#FFFFFF;">
    <!-- Subject Line: Hidden Text -->
    <div style="display:none;font-size:1px;color:#333333;line-height:1px;max-height:0px;max-width:0px;opacity:0;overflow:hidden;">
        Hi <?php echo $customer['customer_first_name'].', '.$email->data_01;?>
    </div>

    <!-- Email Content -->
    <center>
        <div style="background-color:#F2F2F2; max-width: 640px; margin: auto;">
            <!--[if mso]>
            <table role="presentation" width="640" cellspacing="0" cellpadding="0" border="0" align="center">
            <tr>
            <td>
            <![endif]-->

            <!--Logo Table: 2 Col x 2 Rows-->
            <table width="640" cellspacing="0" cellpadding="0" border="0" align="center" style="max-width:640px; width:100%;" bgcolor="#FFFFFF">
                <!-- Row 1 -->
                <tr>
                    <td align="center" valign="top" style="padding:10px;">
                        <table width="600" cellspacing="0" cellpadding="0" border="0" align="center" style="max-width:600px; width:100%;">
                            <tr>
                                <td width="120" align="left" valign="middle">
                                    <a href="<?php echo $logo['logo_url'];?>" target="_blank">
                                        <img src="<?php echo $logo['logo_image'];?>" style="margin:0; padding:0; border:none; display:block;" border="0" alt="<?php echo $logo['logo_title'];?>" />
                                    </a>
                                </td>
                                <td width="480" align="center" valign="top">
                                    <!--App Table: 5 Col x 1 Rows-->
                                    <table width="480" cellspacing="0" cellpadding="0" border="0" align="center" style="max-width:480px; width:100%;" bgcolor="#FFFFFF">
                                        <tr>
                                            <td align="center" valign="top">
                                                <table width="480" cellspacing="0" cellpadding="0" border="0" align="center" style="max-width:480px; width:100%;">
                                                    <tr>
                                                        <?php for ($x = 0; $x <= 4; $x++) { ?>
                                                            <td width="96" align="center" valign="top">
                                                                <a href="<?php echo $header['apps'][$x]['url'];?>" target="_blank">
                                                                    <img width="40px" height="40px" src="<?php echo $header['apps'][$x]['image'];?>" style="margin:0; padding:0; border:none; display:block;" border="0" alt="<?php echo $header['apps'][$x]['name'];?>" />
                                                                </a>
                                                            </td>
                                                        <?php } ?>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <!-- Row 2: horizontal bar -->
                <tr style="<?php echo $inline_logo_horizontal_bar_style; ?> ;padding:5px;">
                </tr>
            </table>

            <!-- Greeting Table: 1 Col x 2 Row Grid -->
            <table width="640" cellspacing="0" cellpadding="0" border="0" align="center" style="max-width:640px; width:100%;" bgcolor="#FFFFFF">
                <tr>
                    <td align="center" valign="top">
                        <table width="600" cellspacing="0" cellpadding="0" border="0" align="center" style="max-width:600px; width:100%;">
                            <tr>
                                <td align="left" valign="top" style="padding:10px;font-size: 1.5em;color: #222222;">
                                    Hi <?php echo $customer['customer_first_name'].',';?>
                                </td>
                            </tr>
<!--
                            <tr>
                                <td align="left" valign="top" style="padding:10px;">
                                    <?php echo $email->data_01;?>
                                </td>
                            </tr>
-->
                        </table>
                    </td>
                </tr>
            </table>

            <!-- Product Headline Table: 1 Col x 1 Row Grid -->
            <table width="640" cellspacing="0" cellpadding="0" border="0" align="center" style="max-width:640px; width:100%;" bgcolor="#FFFFFF">
                <tr>
                    <td align="center" valign="top" style="padding:10px;">
                        <table width="600" cellspacing="0" cellpadding="0" border="0" align="center" style="max-width:600px; width:100%;">
                            <tr>
                                <td align="center" valign="top" style="padding:10px; <?php echo $inline_product_headline_style; ?>">
                                    The <a href="<?php echo site_url();?>" target="_blank" style="<?php echo $inline_product_headline_store_name_style; ?>">Usbong Store</a> has new recommendations for you.
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>

            <!-- Product Table: 3 Col x 9 Row Grid -->
            <table width="640" cellspacing="0" cellpadding="0" border="0" align="center" style="max-width:640px; width:100%;" bgcolor="#FFFFFF">
                <tr>
                    <td align="center" valign="top">
                        <table width="600" cellspacing="0" cellpadding="0" border="0" align="center" style="max-width:600px; width:100%;">
                            <?php for ($w = 0; $w <= 2; $w++) { ?>
                                <!-- Image -->
                                <tr>
                                    <?php for ($x = ($w * 3); $x <= (3*$w + 2); $x++) { ?>
                                        <td width="200" align="center" valign="top" style="padding:10px 10px 0px 10px;">
                                            <a href="<?php echo $products[$x]['product_url'];?>" title="<?php echo $products[$x]['name'];?>">
                                                <img src="<?php echo $products[$x]['image_url'];?>" width="100" height="" style="margin:0; padding:0; border:none; display:block;" border="0" alt="<?php echo $products[$x]['name'];?>" />
                                            </a>
                                        </td>
                                    <?php } ?>
                                </tr>
                                <!-- Title and Optional Author -->
                                <tr>
                                    <?php for ($x = ($w * 3); $x <= (3*$w + 2); $x++) { ?>
                                        <td width="200" align="center" valign="top" style="padding:10px;">
                                            <!-- Title -->
                                            <a href="<?php echo $products[$x]['product_url'];?>" title="<?php echo $products[$x]['name'];?>" style="<?php echo $inline_product_style; ?>">
                                                <?php if (strlen($products[$x]['name']) > $max_char_product) { ?>
                                                    <span style="<?php echo $inline_product_style; ?>">
                                                        <?php echo trim(substr($products[$x]['name'], 0, $max_char_product));?>...
                                                    </span>
                                                <?php } else { ?>
                                                    <span style="<?php echo $inline_product_style; ?>">
                                                        <?php echo $products[$x]['name']; ?>
                                                    </span>
                                                <?php } ?>
                                            </a>
                                            <!-- Optional Author -->
                                            <?php if (!empty($products[$x]['author'])) { ?>
                                                <br />
                        <br />
                                                <a href="<?php echo $products[$x]['product_url'];?>" title="<?php echo $products[$x]['name'];?>" style="<?php echo $inline_author_style; ?>">
                                                    <?php if (strlen($products[$x]['author']) > $max_char_author) { ?>
                                                        <span style="$inline_author_style">
                                                            by <?php echo trim(substr($products[$x]['author'], 0, $max_char_author)); ?>...
                                                        </span>
                                                    <?php } else { ?>
                                                        <span style="$inline_author_style">
                                                            by <?php echo $products[$x]['author']; ?>
                                                        </span>
                                                    <?php } ?>
                                                </a>
                                            <?php } ?>
                        <br />
                        <br />
                         <!-- Price -->
                                            <a href="<?php echo $products[$x]['product_url'];?>" title="<?php echo $products[$x]['name'];?>" style="<?php echo $inline_product_style; ?>">
                                                
                                                    <span style="<?php echo $inline_price_style; ?>">
                                                        <?php echo '&#8369;'.number_format($products[$x]['price'], 0 ,'.', ','); ?>
                                                    </span>
                                            </a>
                        
                                        </td>
                                    <?php } ?>
                                </tr>
                                <!-- Add to Cart -->
<!--
                                <tr>
                                    <?php for ($x = ($w * 3); $x <= (3*$w + 2); $x++) { ?>
                                        <td width="200" align="center" valign="top" style="padding:10px 10px 20px 10px;">
                                            <table border="0" cellpadding="0" cellspacing="0" summary="" align="center" width="70%">
                                                <tr>
                                                    <td style="<?php echo $inline_button_style;?>">
                                                        <a href="<?php echo $products[$x]['product_url'];?>" title="<?php echo $products[$x]['name'];?>" style="<?php echo $inline_anchor_style;?>">
                                                            <div>
                                                                <?php echo 'Add to Cart';?>
                                                            </div>
                                                        </a>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    <?php } ?>
                                </tr>
-->
                            <?php } ?>
                        </table>
                    </td>
                </tr>
            </table>

            <!-- Social Table: 2 Col x 1 Row Grid -->
            <table width="640" cellspacing="0" cellpadding="0" border="0" align="center" style="max-width:640px; width:100%;" bgcolor="#FFFFFF">
                <tr>
                    <td align="center" valign="top" style="padding:10px;">
                        <table width="600" cellspacing="0" cellpadding="0" border="0" align="center" style="max-width:600px; width:100%;">
                            <tr>
                                <!-- Col 1 -->
                                <td width="300" align="center" valign="middle" style="padding:10px; <?php echo $inline_social_text_style; ?>">
                                    CONNECT WITH US ON SOCIAL MEDIA
                                </td>
                                <!-- Col 2 -->
                                <td width="300" align="center" valign="top" style="padding:10px;">
                                    <!-- Social Inner Table: 3 Col x 1 Row Grid -->
                                    <table width="300" cellspacing="0" cellpadding="0" border="0" align="center" style="max-width:300px; width:100%;" bgcolor="#FFFFFF">
                                        <tr>
                                            <td align="center" valign="top" style="padding:10px;">
                                                <table width="300" cellspacing="0" cellpadding="0" border="0" align="center" style="max-width:300px; width:100%;">
                                                    <tr>
                                                        <?php for ($x = 0; $x <= 2; $x++) { ?>
                                                            <td width="100" align="center" valign="top" style="padding:10px;">
                                                                <a href="<?php echo $footer['social'][$x]['url'];?>" target="_blank">
                                                                    <img width="<?php echo $footer['social'][$x]['width'];?>" height="<?php echo $footer['social'][$x]['height'];?>" src="<?php echo $footer['social'][$x]['image'];?>" style="margin:0; padding:0; border:none; display:block;" border="0" alt="<?php echo $footer['social'][$x]['name'];?>" />
                                                                </a>
                                                            </td>
                                                        <?php } ?>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>

            <!-- Footer Horizontal Space Table: 1 Col x 2 Row Grid -->
            <table width="640" cellspacing="0" cellpadding="0" border="0" align="center" style="max-width:640px; width:100%;" bgcolor="#FFFFFF">
                <!-- Divier Row -->
                <tr style="<?php echo $inline_footer_horizontal_bar_style; ?>">
                    <td align="center" valign="top" style="padding:5px;">
                        &nbsp;
                    </td>
                </tr>
                <!-- Footer Links -->
                <tr style="<?php echo $inline_footer_horizontal_style; ?>">
                    <td align="center" valign="top" style="padding:10px;">
                        <div style="padding: 5px;">
                            <a href="<?php echo $footer['contact'];?>" target="_blank" style="<?php echo $inline_footer_horizontal_anchor_style;?>">
                                Contact Us</a>
&nbsp;ATTN: Customer Service
                        </div>
                        <div style="padding: 5px;">
                            <a href="<?php echo $footer['unsubscribe'];?>" target="_blank" rel="nofollow" style="<?php echo $inline_footer_horizontal_anchor_style;?>">
                                Unsubscribe
                            </a>
                        </div>
                        <div style="padding: 5px;">
                            Copyright &copy; 2011~<?php echo date('Y', time());?>. Usbong Social Systems, Inc.
                        </div>
                    </td>
                </tr>
            </table>

        <!--[if mso]>
        </td>
        </tr>
        </table>
        <![endif]-->
        </div>

    </center>
</body>
</html>