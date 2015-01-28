<h1><?php echo lang('create_permission_heading');?></h1>
<p><?php echo lang('create_permission_subheading');?></p>

<div id="infoMessage"><?php echo $message;?></div>

<?php echo form_open("auth/create_permission");?>

      <p>
            <?php echo lang('create_permission_name_label', 'permission_name');?> <br />
            <?php echo form_input($permission_name);?>
      </p>

      <p>
            <?php echo lang('create_permission_desc_label', 'description');?> <br />
            <?php echo form_input($description);?>
      </p>

      <p><?php echo form_submit('submit', lang('create_permission_submit_btn'));?></p>

<?php echo form_close();?>