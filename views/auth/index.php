<h1><?php echo lang('index_user_heading');?></h1>
<p><?php echo lang('index_user_subheading');?></p>

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
            <td><?php echo htmlspecialchars($user->first_name,ENT_QUOTES,'UTF-8');?></td>
            <td><?php echo htmlspecialchars($user->last_name,ENT_QUOTES,'UTF-8');?></td>
            <td><?php echo htmlspecialchars($user->email,ENT_QUOTES,'UTF-8');?></td>
			<td>
				<?php foreach ($user->groups as $group):?>
					<?php echo htmlspecialchars($group->name,ENT_QUOTES,'UTF-8') ;?><br />
                <?php endforeach?>
			</td>
			<td><?php echo ($user->active) ? anchor("auth/deactivate/".$user->id, lang('index_active_link')) : anchor("auth/activate/". $user->id, lang('index_inactive_link'));?></td>
			<td><?php echo anchor("auth/edit_user/".$user->id, 'Edit') ;?></td>
		</tr>
	<?php endforeach;?>
</table>

<hr>

<h1><?php echo lang('index_group_heading');?></h1>
<p><?php echo lang('index_group_subheading');?></p>

<table cellpadding=0 cellspacing=15>
        <tr>
                <th><?php echo lang('index_group_name_th');?></th>
                <th><?php echo lang('index_group_desc_th');?></th>
                <th><?php echo lang('index_group_permissions_th');?></th>
                <th><?php echo lang('index_action_th');?></th>
        </tr>
        <?php foreach ($groups as $group):?>
                <tr>
                        <td><?php echo htmlspecialchars($group->name,ENT_QUOTES,'UTF-8');?></td>
                        <td><?php echo htmlspecialchars($group->description,ENT_QUOTES,'UTF-8');?></td>
                        <td>
                            <?php foreach ($group->permissions as $permission):?>
                                <?php echo anchor("auth/edit_permission/".$permission->id, htmlspecialchars($permission->description,ENT_QUOTES,'UTF-8')) ;?><br />
                            <?php endforeach?>
                        </td>
                        <td><?php echo anchor("auth/edit_group/".$group->id, 'Edit') ;?></td>
                </tr>
        <?php endforeach;?>
</table>

<hr>

<p><?php echo anchor('auth/create_user', lang('index_create_user_link'))?> | <?php echo anchor('auth/create_group', lang('index_create_group_link'))?> | <?php echo anchor('auth/create_permission', lang('index_create_permission_link'))?></p>
