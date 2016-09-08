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
            .container 
            {
                margin-top: 8%;
            }
        </style>
    </head>
    <body>
    
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1><?php echo lang('index_heading');?></h1>
                <p><?php echo lang('index_subheading');?></p>
                
                <div id="infoMessage"><?php echo $message;?></div>
                
                <table cellpadding=0 cellspacing=10  class="table">
                	<tr>
                		<th><?php echo lang('index_fname_th');?></th>
                		<th><?php echo lang('index_lname_th');?></th>
                		<th><?php echo lang('index_email_th');?></th>
                		<th><?php echo lang('index_groups_th');?></th>
                		<th><?php echo lang('index_status_th');?></th>
                		<th><?php echo lang('index_action_th');?></th>
                	</tr>
                	<?php foreach ($users as $user):?>
                		<tr>
                            <td><?php echo htmlspecialchars($user->first_name,ENT_QUOTES,'UTF-8');?></td>
                            <td><?php echo htmlspecialchars($user->last_name,ENT_QUOTES,'UTF-8');?></td>
                            <td><?php echo htmlspecialchars($user->email,ENT_QUOTES,'UTF-8');?></td>
                			<td>
                				<?php foreach ($user->groups as $group):?>
                					<?php echo anchor("auth/edit_group/".$group->id, htmlspecialchars($group->name,ENT_QUOTES,'UTF-8')) ;?><br />
                                <?php endforeach?>
                			</td>
                			<td><?php echo ($user->active) ? anchor("auth/deactivate/".$user->id, lang('index_active_link')) : anchor("auth/activate/". $user->id, lang('index_inactive_link'));?></td>
                			<td><?php echo anchor("auth/edit_user/".$user->id, 'Edit') ;?></td>
                		</tr>
                	<?php endforeach;?>
                </table>
                
                <p><?php echo anchor('auth/create_user', lang('index_create_user_link'))?> | <?php echo anchor('auth/create_group', lang('index_create_group_link'))?></p>
            </div>
        </div>
    </div>
        
    <script src="<?php echo base_url();?>bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>