<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    // Init errors
    $validation_errors = "";
    if ($this->session->flashdata('errors')) {
        $validation_errors = $this->session->flashdata('errors');
    }

    // Init form data
    $data=[];
    if ($this->session->flashdata('data')) {
        $data = $this->session->flashdata('data');
    }
?>

<div class="container">
    <div class="col-xs-12 col-sm-offset-3 col-sm-6 col-md-offset-3 col-md-6 login-and-create">
            <!-- Header -->
            <div class="register-text-in-create">
                <b class="visible-xs">Register</b>
                <b class="hidden-xs">Create New Account</b>
            </div>
            <div class="login-text-in-create">
                <a href="<?php echo site_url('account/login/')?>">
                    <b>Sign In</b>
                </a>
            </div>
            <!-- Form -->
            <div class="fields">
                <form method="post" action="<?php echo site_url('b/literature_and_fiction')?>">
                    <!-- First Name -->
                    <input type="text" class="Register-input" placeholder="First Name" name="firstNameParam" value="<?php echo (isset($data['firstNameParam'])) ? $data['firstNameParam'] : ''; ?>" required>
                    <!-- Last Name -->
                    <input type="text" class="Register-input" placeholder="Last Name" name="lastNameParam" value="<?php echo (isset($data['lastNameParam'])) ? $data['lastNameParam'] : ''; ?>" required>
                    <!-- Email Address -->
                    <?php if (strpos($validation_errors, "The Email Address field must contain a valid email address.") !== false) { ?>
                        <div class="Register-error">Email Address is not a valid email.</div>
                    <?php } ?>
                    <input type="text" class="Register-input" placeholder="Email Address" name="emailAddressParam" value="<?php echo (isset($data['emailAddressParam'])) ? $data['emailAddressParam'] : ''; ?>" required>
                    <!-- Confirm Email Address -->
                    <?php if (strpos($validation_errors, "The Confirm Email Address field does not match the Email Address field.") !== false) { ?>
                        <div class="Register-error">Confirm Email does not match Email Address.</div>
                    <?php } ?>
                    <input type="text" class="Register-input" placeholder="Confirm Email Address" name="confirmEmailAddressParam" value="<?php echo (isset($data['confirmEmailAddressParam'])) ? $data['confirmEmailAddressParam'] : ''; ?>" required>
                    <!-- Password -->
                    <input type="password" class="Register-input" placeholder="Password" name="passwordParam" value="<?php echo (isset($data['passwordParam'])) ? $data['passwordParam'] : ''; ?>" required>
                    <!-- Confirm Password -->
                    <?php if (strpos($validation_errors, "The Password Confirmation field does not match the Password field.") !== false) { ?>
                        <div class="Register-error">Confirm Password does not match Password.</div>
                    <?php } ?>
                    <input type="password" class="Register-input" placeholder="Confirm Password" name="confirmPasswordParam" value="<?php echo (isset($data['confirmPasswordParam'])) ? $data['confirmPasswordParam'] : ''; ?>" required>
                    <!-- Clear Session Data -->
                    <?php
                        $this->session->set_flashdata('errors', null);
                        $this->session->set_flashdata('data', null);
                    ?>
                    <button type="submit" class="Button-login">
                        Register
                    </button>
                </form>
            </div><!--<div class="fields">-->
        </div><!--<div class="login-and-create">-->
</div><!--<div class="container">-->