<h1><?php echo $title;?></h1>
<p>Please enter the users information below.</p>

<div id="infoMessage"><?php echo $message;?></div>

<?php echo form_open(current_url());?>

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
            Password: (if changing password)<br />
            <?php echo form_input($password);?> (at least <?php echo $min_password_length;?> characters long)
      </p>

      <p>
            Confirm Password: (if changing password)<br />
            <?php echo form_input($password_confirm);?>
      </p>


      <?php if (!$readonly): ?>

	      <?php echo form_hidden('id', $user->id);?>
	      <?php echo form_hidden($csrf); ?>

	      <p><?php echo form_submit('submit', 'Save User');?></p>

      <?php else: ?>
          <p><?php echo anchor('user/update/'.$user->id,'Edit User');?></p>
      <?php endif;?>

<?php echo form_close();?>