<div class='mainInfo'>

	<h1>Edit User</h1>
	<p>Please enter the users information below.</p>
	
	<div id="infoMessage"><?php echo $message;?></div>
	
    <?php echo form_open("admin/edit_user/".$this->uri->segment(3));?>
      <p>First Name:<br />
      <?php echo form_input($firstName);?>
      </p>
      
      <p>Last Name:<br />
      <?php echo form_input($lastName);?>
      </p>
      
      <p>Company Name:<br />
      <?php echo form_input($company);?>
      </p>
      
      <p>Email:<br />
      <?php echo form_input($email);?>
      </p>
      
      <p>Phone:<br />
      <?php echo form_input($phone1);?>-<?php echo form_input($phone2);?>-<?php echo form_input($phone3);?>
      </p>
      
      <p>
      	<input type=checkbox name="reset_password"> <label for="reset_password">Reset Password</label>
      </p>
      
      <?php echo form_input($user_id);?>
      <p><?php echo form_submit('submit', 'Submit');?></p>

      
    <?php echo form_close();?>

</div>
