<h1><?php echo lang('groups_heading');?></h1>
<p><?php echo lang('groups_subheading');?></p>

<div id="infoMessage"><?php echo $message;?></div>

<table cellpadding=0 cellspacing=10>
	<tr>
		<th><?php echo lang('groups_name_th');?></th>
		<th><?php echo lang('groups_desc_th');?></th>
		<th colspan="2"><?php echo lang('groups_action_th');?></th>
	</tr>
	<?php foreach ($groups as $group):?>
		<tr>
			<td><?php echo $group->name;?></td>
			<td><?php echo $group->description;?></td>
			<td><?php echo anchor("auth/edit_group/".$group->id, 'Edit') ;?></td>
			<td><?php echo anchor("auth/delete_group/".$group->id, 'Delete') ;?></td>
		</tr>
	<?php endforeach;?>
</table>

<p><?php echo anchor('auth/create_group', lang('groups_create_link'))?>