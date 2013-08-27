<<<<<<< HEAD
<h1>Forgot Password</h1>
<p>Please enter your <?php echo $identity_human;?> so we can send you an email to reset your password.</p>
=======
<h1><?php echo lang('forgot_password_heading');?></h1>
<p><?php echo sprintf(lang('forgot_password_subheading'), $identity_label);?></p>
>>>>>>> origin/2

<div id="infoMessage"><?php echo $message;?></div>

<?php echo form_open("auth/forgot_password");?>

<<<<<<< HEAD
      <p><?php echo $identity_human;?>:<br />
      <?php echo form_input($identity);?>
=======
      <p>
      	<label for="email"><?php echo sprintf(lang('forgot_password_email_label'), $identity_label);?></label> <br />
      	<?php echo form_input($email);?>
>>>>>>> origin/2
      </p>

      <p><?php echo form_submit('submit', lang('forgot_password_submit_btn'));?></p>

<?php echo form_close();?>