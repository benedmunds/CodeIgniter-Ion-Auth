<html>
<body>
	<h1><?php echo sprintf(lang('email_activate_heading'), $identity);?></h1>
	<p><?php echo sprintf(lang('email_activate_subheading'), anchor('auth/activate/'. $id .'/'. $activation, lang('email_activate_link')));?></p>
	<?php if($password == null): ?>
		<p><?php echo sprintf(lang('email_temp_password_a')); ?></p>
		<p><h4><strong><?=$password; ?></strong></h4></p>
		<p><?php echo sprintf(lang('email_temp_password_b')); ?></p>
	<?php endif; ?>
</body>
</html>