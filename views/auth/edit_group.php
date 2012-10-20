<h1>Edit Group</h1>
<p>Please enter the group information below.</p>

<div id="infoMessage"><?php echo $message;?></div>

<?php echo form_open(current_url());?>

      <p>
            Group Name: <br />
            <?php echo form_input($group_name);?>
      </p>

      <p>
            Group Description: <br />
            <?php echo form_input($group_description);?>
      </p>

      <p><?php echo form_submit('submit', 'Save Group');?></p>

<?php echo form_close();?>