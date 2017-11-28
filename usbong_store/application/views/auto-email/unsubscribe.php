<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <h1>
                Unsubscribe From Emails
            </h1>
            <p>
                Hi <?php echo isset($customer->customer_first_name) ? $customer->customer_first_name : 'Valued Member';?>,
            </p>
            <p>
                We will miss you very much.
            </p>
            <p>
                We hope that you will change your mind.
            </p>
            <p>
                Would you really like to unsubscribe?
            </p>
            <form class="form-inline" method="post" action="<?php echo site_url('auto-email/administer/unsubscribe/'.$encrypted_customer_id);?>">
                <input type="hidden" class="form-control" name="encrypted_customer_id" id="encrypted_customer_id" value="<?php echo $encrypted_customer_id;?>">
                <button type="submit" name="submit_button" class="btn btn-default">Unsubscribe</button>
            </form>
        </div>
    </div>
</div>
