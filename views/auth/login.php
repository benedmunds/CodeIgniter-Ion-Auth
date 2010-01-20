<div class='mainInfo'>

	<div class="pageTitle">Login</div>
    <div class="pageTitleBorder"></div>
	<p>Please login with your email address and password below.</p>
	
	<div id="infoMessage"><?php echo $this->session->flashdata('message');?></div>
	
    <?php echo form_open("auth/login");?>
      <p>Email:</p>
      <?php echo form_input($email);?>
      
      <p>Password:</p>
      <?php echo form_input($password);?>
      
      
      <p><?php echo form_submit('submit', 'Login');?></p>

      
    <?php echo form_close();?>

</div>
