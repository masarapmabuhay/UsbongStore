<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// init errors
$validation_errors="";
if ($this->session->flashdata('errors')) {
    $validation_errors = $this->session->flashdata('errors');
}

// init data
$data=[];
if ($this->session->flashdata('data')) {
    $data = $this->session->flashdata('data');
}
?>

<!-- Javascripts -->
<script type="text/javascript">
    $(document).ready(function() {
        //------------------//
        // Layout Functions
        //------------------//

        function forgot_password(event) {
                // prevent redirect
                event.preventDefault();
                $('#sign-in-form').attr('action', '<?php echo site_url('account/forgotpassword')?>');
                $('#sign-in-form').submit();
        }

        //------------------//
        // Bind Events
        //------------------//

        $(document).on('click', '[class="forgotPassword-text"]', forgot_password);
    });
</script>

<!-- Flash Interface Success Div: forgot_password -->
<?php if ($this->session->flashdata('forgot_password_success')) { ?>
        <div class="alert alert-success">
                <span><?php echo $this->session->flashdata('forgot_password_success'); ?></span>
        </div>
<?php } ?>
<!-- Flash Interface Warning Div: forgot_password -->
<?php if ($this->session->flashdata('forgot_password_error')) { ?>
        <div class="alert alert-warning">
                <span><?php echo $this->session->flashdata('forgot_password_error'); ?></span>
        </div>
<?php } ?>

<div class="container">
    <div class="col-xs-12 col-sm-offset-3 col-sm-6 col-md-offset-4 col-md-4 login-and-create">
            <!-- Header -->
            <div class="login-text">
                <b>Sign In</b>
            </div>
            <div class="register-text">
                <a href = "<?php echo site_url('account/create/')?>">
                    <b class="visible-xs">Register</b>
                    <b class="hidden-xs">Create New Account</b>
                </a>
            </div>

            <!-- Form -->
            <div class="fields">
                <form id="sign-in-form" method="post" action="<?php echo site_url('')?>">
                    <!-- Email Address -->
                    <?php
                        if (isset($data['does_email_exist'])) {
                    ?>
                        <div class="Register-error hidden-xs">Please check to make sure that your email address is correct or sign up for a new account with the "Create New Account" link above.</div>
                        <div class="Register-error visible-xs">Please check to make sure that your email address is correct or sign up for a new account with the "Register" link above.</div>
                    <?php } ?>
                    <input type="text" class="Login-input" placeholder="Email Address" name="emailAddressParam" value="<?php echo (isset($data['emailAddressParam'])) ? $data['emailAddressParam'] : ''; ?>" required>
                    <!-- Password -->
                    <input type="password" class="Login-input" placeholder="Password" name="passwordParam" required>
                    <!-- Clear Session Data -->
                    <?php
                        $this->session->set_flashdata('errors', null);
                        $this->session->set_flashdata('data', null);
                    ?>
                    <!-- Buttons -->
                    <button type="submit" class="Button-login">
                        Sign in
                    </button>
                    <div class="forgotPassword-div"><a class="forgotPassword-text" href = "<?php echo site_url('contact/')?>"><b>Forgot password</b></a></div>
                </form>
            </div><!--<div class="fields">-->
        </div><!--<div class="login-and-create">-->
</div><!--<div class="container">-->