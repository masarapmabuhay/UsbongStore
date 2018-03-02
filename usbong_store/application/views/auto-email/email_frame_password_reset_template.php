<?php
    // NOTES:
    // (1) This email template uses emailframe
    //     - Base Template: https://github.com/g13nn/Email-Framework/blob/master/grids/fluid/fluid-grid-master.html
    //     - Doc: http://emailframe.work/
    // (2) To debug the grid, please uncomment the line below
    //     - /*table td { border:1px solid cyan; }*/

    // logo fields
    $logo['logo_title'] = 'Usbong';
    $logo['logo_image'] = base_url('assets/images/usbongLogo.png');
    $logo['logo_url']   = site_url();
    // footer fields
    $footer['contact']     = site_url('contact');
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
    // css: email body
    $inline_message_style = 'font-size: 1.5em;';
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

    <title>Password Reset Link from Usbong</title>

    <style type="text/css">
        /* Outlines the grid, remove when sending */
        /* table td { border:1px solid cyan; } */
        /* CLIENT-SPECIFIC STYLES */
        body, table, td, a { -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; }
        table, td { mso-table-lspace: 0pt; mso-table-rspace: 0pt; }
        img { -ms-interpolation-mode: bicubic; }
        /* RESET STYLES */
        img { border: 0; outline: none; text-decoration: none; }
        table { border-collapse: collapse !important; }
        body { font-family: arial, sans-serif; margin: 0 !important; padding: 0 !important; width: 100% !important; }
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
        Hi <?php echo $customer_first_name.', We received a request to reset the password associated with this e-mail address. If you made this request, please click the link below to reset your password using our secure server:';?>
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
                                <td align="left" valign="top" style="padding:10px; <?php echo $inline_message_style;?>">
                                    Hi <?php echo $customer_first_name.',';?>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>

            <!-- Message: 1 Col x 1 Row Grid -->
            <table width="640" cellspacing="0" cellpadding="0" border="0" align="center" style="max-width:640px; width:100%;" bgcolor="#FFFFFF">
                <tr>
                    <td align="center" valign="top" style="padding:10px;">
                        <table width="600" cellspacing="0" cellpadding="0" border="0" align="center" style="max-width:600px; width:100%;">
                            <tr>
                                <td align="left" valign="top" style="padding:10px; <?php echo $inline_message_style;?>">
                                    <p>
                                        We received a request to reset the password associated with this e-mail address. If you made this request, please click the link below to reset your password using our secure server:
                                    </p>
                                    <p>
                                        <a href="<?php echo $link;?>"><?php echo $link;?></a>
                                    </p>
                                    <p>
                                        If clicking the link above doesn't work, please copy and paste the link into your browser's address window, or retype it there.
                                    </p>
                                    <p>
                                        If you did not send us this request, you can safely ignore this email. Rest assured your customer account is safe.
                                    </p>
                                    <p>
                                        The Usbong Support Team
                                    </p>
                                </td>
                            </tr>
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