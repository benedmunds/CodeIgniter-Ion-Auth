<h1><?php echo lang('users_heading');?></h1>
<p><?php echo lang('users_subheading');?></p>

<div id="infoMessage"><?php echo $message;?></div>

<table cellpadding=0 cellspacing=10>
	<tr>
		<th><?php echo lang('users_fname_th');?></th>
		<th><?php echo lang('users_lname_th');?></th>
		<th><?php echo lang('users_email_th');?></th>
		<th><?php echo lang('users_groups_th');?></th>
		<th><?php echo lang('users_status_th');?></th>
		<th colspan="3"><?php echo lang('users_action_th');?></th>
	</tr>
	<?php foreach ($users as $user):?>
		<tr>
			<td><?php echo $user->first_name;?></td>
			<td><?php echo $user->last_name;?></td>
			<td><?php echo $user->email;?></td>
			<td>
				<?php foreach ($user->groups as $group):?>
					<?php echo anchor("auth/edit_group/".$group->id, $group->name) ;?><br />
                <?php endforeach?>
			</td>
			<td><?php echo ($user->active) ? anchor("auth/deactivate/".$user->id, lang('users_active_link')) : anchor("auth/activate/". $user->id, lang('users_inactive_link'));?></td>
			<td><?php echo anchor("auth/edit_user/".$user->id, 'Edit') ;?></td>
			<td><?php echo anchor("auth/delete_user/".$user->id, 'Delete') ;?></td>
			<td><?php echo anchor("auth/deactivate_user/".$user->id, 'Deactivate') ;?></td>
		</tr>
	<?php endforeach;?>
</table>

<p><?php echo anchor('auth/create_user', lang('users_create_link'))?>