<h1><?php echo lang('delete_user_heading');?></h1>
<p><?php echo sprintf(lang('delete_user_subheading'), $user->username);?></p>

<?php echo form_open("auth/delete_user/".$user->id);?>

  <p>
  	<?php echo lang('delete_user_confirm_y_label', 'confirm');?>
    <input type="radio" name="confirm" value="yes" checked="checked" />
    <?php echo lang('delete_user_confirm_n_label', 'confirm');?>
    <input type="radio" name="confirm" value="no" />
  </p>

  <?php echo form_hidden($csrf); ?>
  <?php echo form_hidden(array('id'=>$user->id)); ?>

  <p><?php echo form_submit('submit', lang('delete_user_submit_btn'));?></p>

<?php echo form_close();?>