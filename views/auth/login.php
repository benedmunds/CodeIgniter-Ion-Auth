<h1>Login</h1>
<p>Please login with your email/username and password below.</p>
	
<div id="infoMessage"><?php echo $message;?></div>
<?php if(isset($identity) && isset($password)): ?>
<?php echo form_open("auth/login");?>
  	
  <p>
    <label for="identity">Email/Username:</label>
    <?php echo form_input($identity);?>
  </p>

  <p>
    <label for="password">Password:</label>
    <?php echo form_input($password);?>
  </p>

  <p>
    <label for="remember">Remember Me:</label>
    <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?>
  </p>
    
    
  <p><?php echo form_submit('submit', 'Login');?></p>
    
<?php echo form_close();?>
<?php endif; ?>

<p><a href="forgot_password">Forgot your password?</a></p>
<?php
	$this->load->helper('url');
	echo anchor('auth/login_provider/Google','Login With Google.').'<br />';
	
	echo anchor('auth/login_provider/Twitter','Login With Twitter.').'<br />';
	
	echo anchor('auth/login_provider/Facebook','Login With Facebook.').'<br />';
	
	echo anchor('auth/login_provider/LinkedIn','Login With LinkedIn.').'<br />';
?>
