<h1><?php echo $title;?></h1>
<p>Below is a list of the users.</p>

<div id="infoMessage"><?php echo $message;?></div>

<table cellpadding=0 cellspacing=10>
	<tr>
		<th>Actions</th>
		<th>First Name</th>
		<th>Last Name</th>
		<th>Email</th>
		<th>Groups</th>
		<th>Status</th>
	</tr>
	<?php foreach ($users as $user):?>
		<tr>
			<td><?php echo anchor("user/read/$user->id", 'View'), ' ', anchor("user/update/$user->id", 'Update'), ' ', anchor("user/delete/$user->id", 'Delete'); ?>
			<td><?php echo $user->first_name;?></td>
			<td><?php echo $user->last_name;?></td>
			<td><?php echo $user->email;?></td>
			<td>
				<?php foreach ($user->groups as $group):?>
					<?php echo $group->name;?><br />
                <?php endforeach?>
			</td>
			<td><?php echo ($user->active) ? anchor("user/deactivate/".$user->id, 'Active') : anchor("user/activate/". $user->id, 'Inactive');?></td>
		</tr>
	<?php endforeach;?>
</table>

<p><a href="<?php echo site_url('user/create');?>">Create a new user</a></p>