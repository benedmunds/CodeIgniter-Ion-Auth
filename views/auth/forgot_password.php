<h1>Forgot Password</h1>
<p>Please enter your <?php echo $identity_label; ?> so we can send you an email to reset your password.</p>

<div id="infoMessage"><?php echo $message;?></div>

<?php echo form_open("auth/forgot_password");?>

      <p>
      	<?php echo $identity_label; ?>: <br />
      	<?php echo form_input($email);?>
      </p>

      <p><?php echo form_submit('submit', 'Submit');?></p>

<?php echo form_close();?>