<h1><?php echo lang('delete_group_heading');?></h1>
<p><?php echo sprintf(lang('delete_group_subheading'), $group->description);?></p>

<?php echo form_open("auth/delete_group/".$group->id);?>

  <p>
  	<?php echo lang('delete_group_confirm_y_label', 'confirm');?>
    <input type="radio" name="confirm" value="yes" checked="checked" />
    <?php echo lang('delete_group_confirm_n_label', 'confirm');?>
    <input type="radio" name="confirm" value="no" />
  </p>

  <?php echo form_hidden($csrf); ?>
  <?php echo form_hidden(array('id'=>$group->id)); ?>

  <p><?php echo form_submit('submit', lang('delete_group_submit_btn'));?></p>

<?php echo form_close();?>