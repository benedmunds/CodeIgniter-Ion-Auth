<h1><?php echo $title;?></h1>
<p>Please enter the users information below.</p>

<div id="infoMessage"><?php echo $message;?></div>

<?php echo form_open("user/create_user");?>

      <p>
            Username: <br />
            <?php echo form_input($username);?>
      </p>

      <p>
            First Name: <br />
            <?php echo form_input($first_name);?>
      </p>

      <p>
            Last Name: <br />
            <?php echo form_input($last_name);?>
      </p>

      <p>
            Email: <br />
            <?php echo form_input($email);?>
      </p>

      <p>
            Group(s): <br />
            <?php echo form_multiselect($groups['name'], $groups['options'], $groups['selected'], $groups['extra']);?>
      </p>

      <p>
            Company Name: <br />
            <?php echo form_input($company);?>
      </p>

      <p>
            Phone: <br />
            <?php echo form_input($phone1);?>-<?php echo form_input($phone2);?>-<?php echo form_input($phone3);?>
      </p>

      <p>
            Password: <br />
            <?php echo form_input($password);?> (at least <?php echo $min_password_length;?> characters long)
      </p>

      <p>
            Confirm Password: <br />
            <?php echo form_input($password_confirm);?>
      </p>


      <p><?php echo form_submit('submit', 'Create User');?></p>

<?php echo form_close();?>