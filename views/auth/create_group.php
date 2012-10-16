<h1>Create Group</h1>
<p>Please enter the group information below.</p>

<div id="infoMessage"><?php echo $message;?></div>

<?php echo form_open("auth/create_group");?>

      <p>
            Group Name: <br />
            <?php echo form_input($group_name);?>
      </p>

      <p>
            Description: <br />
            <?php echo form_input($description);?>
      </p>

      <p><?php echo form_submit('submit', 'Create Group');?></p>

<?php echo form_close();?>