<h1><?php echo lang('deactivate_heading');?></h1>
<p><?php echo sprintf(lang('deactivate_subheading'), $user->username);?></p>

<<<<<<< HEAD
	<div class="pageTitle">Deactivate User</div>
    <div class="pageTitleBorder"></div>
	<p>Are you sure you want to deactivate the user '<?php echo $user['username']; ?>'</p>
	
    <?php echo form_open("auth/deactivate/".$user['id']);?>
    	
      <p>
      	<label for="confirm">Yes:</label>
		<input type="radio" name="confirm" value="yes" checked="checked" />
      	<label for="confirm">No:</label>
		<input type="radio" name="confirm" value="no" />
      </p>
      
      <?php echo form_hidden($csrf); ?>
      <?php echo form_hidden(array('id'=>$user['id'])); ?>
      
      <p><?php echo form_submit('submit', 'Submit');?></p>
=======
<?php echo form_open("auth/deactivate/".$user->id);?>
>>>>>>> origin/2

  <p>
  	<?php echo lang('deactivate_confirm_y_label', 'confirm');?>
    <input type="radio" name="confirm" value="yes" checked="checked" />
    <?php echo lang('deactivate_confirm_n_label', 'confirm');?>
    <input type="radio" name="confirm" value="no" />
  </p>

  <?php echo form_hidden($csrf); ?>
  <?php echo form_hidden(array('id'=>$user->id)); ?>

  <p><?php echo form_submit('submit', lang('deactivate_submit_btn'));?></p>

<?php echo form_close();?>
