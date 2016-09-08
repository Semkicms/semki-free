<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Bootstrap 101 Template</title>

        <!-- Bootstrap -->
        <link href="<?php echo base_url();?>bootstrap/css/bootstrap.css" rel="stylesheet">
        <!-- font-awesome -->
        <link rel="stylesheet" href="<?php echo base_url();?>font-awesome/css/font-awesome.min.css">
        <style>
            .container {
                margin-top: 8%;
            }
        </style>

    </head>
    <body>

        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-4 col-md-offset-4">

                    <h1><?php echo lang('forgot_password_heading');?></h1>
                    <p><?php echo sprintf(lang('forgot_password_subheading'), $identity_label);?></p>
                    
                    <div id="infoMessage"><?php echo $message;?></div>
                    
                    <?php echo form_open("auth/forgot_password");?>
                    
                          <p>
                          	<label for="identity"><?php echo (($type=='email') ? sprintf(lang('forgot_password_email_label'), $identity_label) : sprintf(lang('forgot_password_identity_label'), $identity_label));?></label> <br />
                          	<?php echo form_input($identity,'',"class='form-control'");?>
                          </p>
                    
                          <p><?php echo form_submit('submit', lang('forgot_password_submit_btn'),"class='btn btn-primary'");?></p>
                    
                    <?php echo form_close();?>
                    
                </div>
            </div>
        </div>

        <script src="<?php echo base_url();?>bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>