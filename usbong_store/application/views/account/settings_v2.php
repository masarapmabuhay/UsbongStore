<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// init form errors
$validation_errors = '';
if ($this->session->flashdata('errors')) {
    $validation_errors = $this->session->flashdata('errors');
}

// init flash data
$data = [];
if ($this->session->flashdata('data')) {
        $data = $this->session->flashdata('data');
}
?>

<div class="container">
    <!-- Header Row -->
    <div class="row">
        <h2 class="header visible-xs text-center">Account Settings</h2>
        <h2 class="header hidden-xs">Account Settings</h2>
    </div><!-- Header Row -->

    <!-- Content Row -->
    <div class="row">
        <!-- Left Side Bar -->
        <div class="col-xs-12 col-sm-5 col-md-4 col-lg-3">
            <div class="col-xs-12 Account-settings">
                <?php  if ($customer_information_result->is_admin == 1) { ?>
                    <div class="row Account-settings-subject-header">Summary</div>
                    <div class="row Account-settings-subject-content"><a class="Account-settings-subject-content-link" href="<?php echo site_url('account/ordersummaryadmin/')?>">Order Summary (Admin)</a></div>
                    <div class="row Account-settings-subject-content"><a class="Account-settings-subject-content-link" href="<?php echo site_url('account/carthistoryadmin/')?>">Cart History (Admin)</a></div>
                    <div class="row Account-settings-subject-content"><a class="Account-settings-subject-content-link" href="<?php echo site_url('account/requestsummaryadmin/')?>">Requests (Admin)</a></div>
                    <div class="row Account-settings-subject-content"><a class="Account-settings-subject-content-link" href="<?php echo site_url('account/sellsummaryadmin/')?>">Sell (Admin)</a></div>
                    <div class="row Account-settings-subject-content"><a class="Account-settings-subject-content-link" href="<?php echo site_url('account/searchhistoryadmin/')?>">Search (Admin)</a></div>
                    <div class="row Account-settings-subject-content"><a class="Account-settings-subject-content-link" href="<?php echo site_url('account/customersummaryadmin/')?>">Customer List (Admin)</a></div>
                    <div class="row Account-settings-subject-content"><a class="Account-settings-subject-content-link" href="<?php echo site_url('contact/contactcasesummaryadmin/')?>">Case Summary (Admin)</a></div>
                    <div class="row Account-settings-subject-header">Settings</div>
                    <div class="row Account-settings-subject-content"><a class="Account-settings-subject-content-link" href="<?php echo site_url('account/settings/')?>">Update Information</a></div>
                    <div class="row Account-settings-subject-content"><a class="Account-settings-subject-content-link" href="<?php echo site_url('account/updatepassword/')?>">Update Password</a></div>
                <?php  } else { ?>
                    <div class="row Account-settings-subject-header">Orders</div>
                    <div class="row Account-settings-subject-content"><a class="Account-settings-subject-content-link" href="<?php echo site_url('account/ordersummary/')?>">Order Summary</a></div>
                    <div class="row Account-settings-subject-header">Settings</div>
                    <div class="row Account-settings-subject-content"><a class="Account-settings-subject-content-link" href="<?php echo site_url('account/settings/')?>">Update Information</a></div>
                    <div class="row Account-settings-subject-content"><a class="Account-settings-subject-content-link" href="<?php echo site_url('account/updatepassword/')?>">Update Password</a></div>
                <?php  } ?>
            </div>
        </div><!-- Left Side Bar -->

        <!-- Form Container -->
        <div class="col-xs-12 col-sm-7 col-md-offset-1 col-md-6 col-lg-offset-2 col-lg-6">
            <!-- Spacer -->
            <div class="visible-xs">
                <br>
                <br>
            </div>
            <!-- Form -->
            <div class="Customer-information">
                <!-- Form Header -->
                <div class="Customer-information-text-in-checkout">
                    <b class="visible-xs text-center">Customer Information</b>
                    <b class="hidden-xs">Customer Information</b>
                </div>
                <!-- Form Body -->
                <div class="fields">
                    <form method="post" action="<?php echo site_url('account/save')?>">
                        <!-- Email Address -->
                        <div class="Checkout-div">
                            <?php if (strpos($validation_errors, "The Email Address field must contain a valid email address.") !== false) { ?>
                                <div class="Register-error">Email Address is not a valid email.</div>
                            <?php } ?>
                            <?php
                                // prepare default
                                if (isset($data['emailAddressParam'])) {
                                    $temp_data = $data['emailAddressParam'];
                                } elseif (isset($customer_information_result->customer_email_address)) {
                                    $temp_data = $customer_information_result->customer_email_address;
                                } else {
                                    $temp_data = '';
                                }
                            ?>
                            <input type="text" class="Checkout-input" placeholder="" name="emailAddressParam" value="<?php echo $temp_data; ?>" required>
                            <span class="floating-label">Email Address</span>
                        </div>
                        <!-- First Name -->
                        <div class="Checkout-div">
                            <?php
                                // prepare default
                                if (isset($data['firstNameParam'])) {
                                    $temp_data = $data['firstNameParam'];
                                } elseif (isset($customer_information_result->customer_first_name)) {
                                    $temp_data = $customer_information_result->customer_first_name;
                                } else {
                                    $temp_data = '';
                                }
                            ?>
                            <input type="text" class="Checkout-input" placeholder="" name="firstNameParam" value="<?php echo $temp_data; ?>" required>
                            <span class="floating-label">First Name</span>
                        </div>
                        <!-- Last Name -->
                        <div class="Checkout-div">
                            <?php
                                // prepare default
                                if (isset($data['lastNameParam'])) {
                                    $temp_data = $data['lastNameParam'];
                                } elseif (isset($customer_information_result->customer_last_name)) {
                                    $temp_data = $customer_information_result->customer_last_name;
                                } else {
                                    $temp_data = '';
                                }
                            ?>
                            <input type="text" class="Checkout-input" placeholder="" name="lastNameParam" value="<?php echo $temp_data; ?>" required>
                            <span class="floating-label">Last Name</span>
                        </div>
                        <!-- Contact Number -->
                        <div class="Checkout-div">
                            <?php if (strpos($validation_errors, "The Contact Number field must contain only numbers.") !== false) { ?>
                                <div class="Register-error">Contact Number must contain only numbers.</div>
                            <?php } ?>
                            <?php
                                // prepare default
                                if (isset($data['contactNumberParam'])) {
                                    $temp_data = $data['contactNumberParam'];
                                } elseif (isset($customer_information_result->customer_contact_number)) {
                                    $temp_data = $customer_information_result->customer_contact_number;
                                } else {
                                    $temp_data = '';
                                }
                            ?>
                            <input type="tel" class="Checkout-input" placeholder="" name="contactNumberParam" value="<?php echo $temp_data; ?>" required>
                            <span class="floating-label">Contact Number</span>
                        </div>
                        <!-- Meet Up Checkbox -->
                        <?php
                            if ((!isset($data['shippingAddressParam'])) && (!isset($customer_information_result->customer_shipping_address))) {
                                echo '<label class="Checkbox-label-shippingToMOSC"><input type="checkbox" id="shippingToMOSCId" value="0" onClick="clickShipToMOSCFunction(this.value)">&ensp;Meetup at Marikina Orthopedic Specialty Clinic</label>';
                            } else {
                                if (isset($data['shippingAddressParam']) && ($data['shippingAddressParam'] == "2 E. Rodriguez Ave. Sto. Niño")) {
                                    echo '<label class="Checkbox-label-shippingToMOSC"><input type="checkbox" id="shippingToMOSCId" value="1" onClick="clickShipToMOSCFunction(this.value)" checked>&ensp;Meetup at Marikina Orthopedic Specialty Clinic</label>';
                                } elseif (isset($customer_information_result->customer_shipping_address) && ($customer_information_result->customer_shipping_address == "2 E. Rodriguez Ave. Sto. Niño")) {
                                    echo '<label class="Checkbox-label-shippingToMOSC"><input type="checkbox" id="shippingToMOSCId" value="1" onClick="clickShipToMOSCFunction(this.value)" checked>&ensp;Meetup at Marikina Orthopedic Specialty Clinic</label>';
                                } else {
                                    echo '<label class="Checkbox-label-shippingToMOSC"><input type="checkbox" id="shippingToMOSCId" value="0" onClick="clickShipToMOSCFunction(this.value)">&ensp;Meetup at Marikina Orthopedic Specialty Clinic</label>';
                                }
                            }
                        ?>
                        <!-- Shipping Address -->
                        <div class="Checkout-div">
                            <?php
                                // prepare default
                                if (isset($data['shippingAddressParam'])) {
                                    $temp_data = $data['shippingAddressParam'];
                                } elseif (isset($customer_information_result->customer_shipping_address)) {
                                    $temp_data = $customer_information_result->customer_shipping_address;
                                } else {
                                    $temp_data = '';
                                }
                            ?>
                            <input type="text" class="Checkout-input" placeholder="" id="shippingAddressId" name="shippingAddressParam" value="<?php echo $temp_data; ?>" required>
                            <span class="floating-label">Shipping Address</span>
                        </div>
                        <!-- City -->
                        <div class="Checkout-div">
                            <?php
                                // prepare default
                                if (isset($data['cityParam'])) {
                                    $temp_data = $data['cityParam'];
                                } elseif (isset($customer_information_result->customer_city)) {
                                    $temp_data = $customer_information_result->customer_city;
                                } else {
                                    $temp_data = '';
                                }
                            ?>
                            <input type="text" class="Checkout-input" placeholder="" id="cityId" name="cityParam" value="<?php echo $temp_data; ?>" required>
                            <span class="floating-label">City</span>
                        </div>
                        <!-- Country -->
                        <div class="Checkout-div">
                            <?php
                                // prepare default
                                if (isset($data['countryParam'])) {
                                    $temp_data = $data['countryParam'];
                                } elseif (isset($customer_information_result->customer_country)) {
                                    $temp_data = $customer_information_result->customer_country;
                                } else {
                                    $temp_data = '';
                                }
                            ?>
                            <input type="text" class="Checkout-input" placeholder="" id="countryId" name="countryParam" value="<?php echo $temp_data; ?>" required>
                            <span class="floating-label">Country</span>
                        </div>
                        <!-- Postal Code -->
                        <div class="Checkout-div">
                            <?php if (strpos($validation_errors, "The Postal Code field must contain only numbers.") !== false) { ?>
                                <div class="Register-error">The Postal Code field must contain only numbers.</div>
                            <?php } ?>
                            <?php
                                // prepare default
                                if (isset($data['postalCodeParam'])) {
                                    $temp_data = $data['postalCodeParam'];
                                } elseif (isset($customer_information_result->customer_postal_code)) {
                                    $temp_data = $customer_information_result->customer_postal_code;
                                } else {
                                    $temp_data = '';
                                }
                            ?>
                            <input type="text" class="Checkout-input" placeholder="" id="postalCodeId" name="postalCodeParam" value="<?php echo $temp_data; ?>" required>
                            <span class="floating-label">Postal Code</span>
                        </div>
                        <!-- Mode of Payment -->
                        <label class="Checkout-input-mode-of-payment">-Mode of Payment-</label>
                        <?php
                            // prepare default
                            if (isset($data['modeOfPaymentParam'])) {
                                $temp_data = $data['modeOfPaymentParam'];
                            } elseif (isset($customer_information_result->mode_of_payment_id)) {
                                $temp_data = $customer_information_result->mode_of_payment_id;
                            } else {
                                $temp_data = 0;
                            }
                        ?>
                        <div class="radio Checkout-input-mode-of-payment">
                            <label><input type="radio" id="modeOfPaymentBankDepositId" name="modeOfPaymentParam" value="0" <?php echo ($temp_data == 0) ? 'checked': ''; ?> >Bank Deposit (<a href="https://www.bdo.com.ph/send-money" target="_blank"><a href="https://www.bdo.com.ph/send-money" target="_blank"><b>BDO</b></a></a>/<a href="https://www.bpiexpressonline.com/p/0/6/online-banking" target="_blank"><b>BPI</b></a>)</label>
                        </div>
                        <div class="radio Checkout-input-mode-of-payment">
                            <label><input type="radio" id="modeOfPaymentPaypalId" name="modeOfPaymentParam" value="1" <?php echo ($temp_data == 1) ? 'checked': ''; ?> >Paypal</label>
                        </div>
                        <div class="radio Checkout-input-mode-of-payment">
                            <label><input type="radio" id="modeOfPaymentMeetupAtMOSCId" name="modeOfPaymentParam" value="2" <?php echo ($temp_data != 0 AND $temp_data != 1) ? 'checked': ''; ?> >Cash upon Meetup at MOSC</label>
                        </div>
                        <!-- Save Button -->
                        <?php
                            // reset the session values to null
                            $this->session->set_flashdata('errors', null);
                            $this->session->set_flashdata('data', null);
                        ?>
                        <br>
                        <button type="submit" class="Button-login">
                            Save
                        </button>
                    </form>
                </div><!--<div class="fields">-->
            </div><!--<div class="Customer-information">-->
        </div><!-- Form  -->
    </div><!-- Content Row -->

</div><!--<div class="container">-->