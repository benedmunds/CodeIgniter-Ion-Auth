<style>
    * {
        font-family: sans-serif;
    }
    table {
        border-collapse: collapse;
        font-size: 12px;
    }
    
    td, th {
        border: 1px solid silver;
        padding: 5px 12px;
    }
    
    th {
        background-color: #555;
        color: silver;
    }
</style>


<h1><?php echo lang('index_heading');?></h1>
<p><?php echo lang('index_subheading');?></p>

<div id="infoMessage"><?php echo $message;?></div>

<table cellpadding=0 cellspacing=10>
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
            <td><?php echo htmlspecialchars($user->{$columns['users']['first_name']},ENT_QUOTES,'UTF-8');?></td>
            <td><?php echo htmlspecialchars($user->{$columns['users']['last_name']},ENT_QUOTES,'UTF-8');?></td>
            <td><?php echo htmlspecialchars($user->{$columns['users']['email']},ENT_QUOTES,'UTF-8');?></td>
			<td>
				<?php foreach ($user->groups as $group):?>
					<?php echo anchor("auth/edit_group/".$group->{$columns['groups']['id']}, htmlspecialchars($group->{$columns['groups']['name']},ENT_QUOTES,'UTF-8')) ;?><br />
                <?php endforeach?>
			</td>
			<td><?php echo ($user->{$columns['users']['active']}) ? anchor("auth/deactivate/".$user->{$columns['users']['id']}, lang('index_active_link')) : anchor("auth/activate/". $user->{$columns['users']['id']}, lang('index_inactive_link'));?></td>
			<td><?php echo anchor("auth/edit_user/".$user->{$columns['users']['id']}, 'Edit') ;?></td>
		</tr>
	<?php endforeach;?>
</table>

<p><?php echo anchor('auth/create_user', lang('index_create_user_link'))?> | <?php echo anchor('auth/create_group', lang('index_create_group_link'))?></p>
<p><?php echo anchor('auth/logout', 'Logout')?>