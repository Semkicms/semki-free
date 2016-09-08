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
            label 
            {
                display: block;
            }
            label[for="remember"]
            {
                display: inline-block;
                float: left;
                margin-right: 4px;
            }
        </style>

    </head>
    <body>

        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-4 col-md-offset-4">
                    <h1><?php echo lang('login_heading');?></h1>
                    <p><?php echo lang('login_subheading');?></p>
                    
                    <div id="infoMessage"><?php echo $message;?></div>
                    
                    <?php echo form_open("auth/login");?>
                    
                      <p>
                        <?php echo lang('login_identity_label', 'identity');?>
                        <?php echo form_input($identity,'',"class='form-control'");?>
                      </p>
                    
                      <p>
                        <?php echo lang('login_password_label', 'password');?>
                        <?php echo form_input($password,'',"class='form-control'");?>
                      </p>
                    
                      <p>
                        <?php echo lang('login_remember_label', 'remember');?>
                        <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?>
                      </p>
                    
                    
                      <p><?php echo form_submit('submit', lang('login_submit_btn'),"class='btn btn-primary'");?></p>
                    
                    <?php echo form_close();?>
                    
                    <p><a href="forgot_password"><?php echo lang('login_forgot_password');?></a></p>
                                        
                </div>
            </div>
        </div>


        <script src="<?php echo base_url();?>bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>