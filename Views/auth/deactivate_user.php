<h1><?php echo lang('Auth.deactivate_heading');?></h1>
<p><?php echo sprintf(lang('Auth.deactivate_subheading'), $user->username);?></p>

<?php echo form_open('auth/deactivate/' . $user->id);?>

  <p>
  	<?php echo form_label(lang('Auth.deactivate_confirm_y_label'), 'confirm');?>
    <input type="radio" name="confirm" value="yes" checked="checked" />
    <?php echo form_label(lang('Auth.deactivate_confirm_n_label'), 'confirm');?>
    <input type="radio" name="confirm" value="no" />
  </p>

  <?php echo form_hidden('id', $user->id); ?>

  <p><?php echo form_submit('submit', lang('Auth.deactivate_submit_btn'));?></p>

<?php echo form_close();?>
