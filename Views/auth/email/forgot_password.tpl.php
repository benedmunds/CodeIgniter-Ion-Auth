<html>
<body>
	<h1><?php echo sprintf(lang('Auth.email_forgot_password_heading'), $identity);?></h1>
	<p><?php echo sprintf(lang('Auth.email_forgot_password_subheading'), anchor('auth/reset_password/'. $forgotten_password_code, lang('Auth.email_forgot_password_link')));?></p>
</body>
</html>