<h1><?php echo lang('edit_permission_heading');?></h1>
<p><?php echo lang('edit_permission_subheading');?></p>

<div id="infoMessage"><?php echo $message;?></div>

<?php echo form_open(current_url());?>

      <p>
            <?php echo lang('edit_permission_name_label', 'permission_name');?> <br />
            <?php echo form_input($permission_name);?>
      </p>

      <p>
            <?php echo lang('edit_permission_desc_label', 'description');?> <br />
            <?php echo form_input($permission_description);?>
      </p>

      <p><?php echo form_submit('submit', lang('edit_permission_submit_btn'));?></p>

<?php echo form_close();?>