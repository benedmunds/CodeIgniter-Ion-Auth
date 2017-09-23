<h1><?php echo lang('login_heading');?></h1>
<p><?php echo lang('login_subheading');?></p>

<div id="infoMessage"><?php echo $message;?></div>
<?php
if(!isset($identity) || !isset($password)):
	$identity = array(
		'name' => 'identity',
		'id' => 'identity',
		'type' => 'text',
		'value' => '',
	);
	$password = array(
		'name' => 'password',
		'id' => 'password',
		'type' => 'password',
	);
endif;
?>
<?php echo form_open("auth/login");?>

  <p>
    <?php echo lang('login_identity_label', 'identity');?>
    <?php echo form_input($identity);?>
  </p>

  <p>
    <?php echo lang('login_password_label', 'password');?>
    <?php echo form_input($password);?>
  </p>

  <p>
    <?php echo lang('login_remember_label', 'remember');?>
    <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?>
  </p>


  <p><?php echo form_submit('submit', lang('login_submit_btn'));?></p>

<?php echo form_close();?>

<<<<<<< HEAD
<p><a href="forgot_password">Forgot your password?</a></p>
<?php
	$this->load->helper('url');
	echo anchor('auth/login_provider/Google','Login With Google.').'<br />';
	
	echo anchor('auth/login_provider/Twitter','Login With Twitter.').'<br />';
	
	echo anchor('auth/login_provider/Facebook','Login With Facebook.').'<br />';
	
	echo anchor('auth/login_provider/LinkedIn','Login With LinkedIn.').'<br />';
?>
=======
<p><a href="forgot_password"><?php echo lang('login_forgot_password');?></a></p>
>>>>>>> 2
