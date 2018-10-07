<html>
<body>
	<h1><?php echo sprintf(lang('Auth.emailForgotPassword_heading'), $identity);?></h1>
	<p><?php echo sprintf(lang('Auth.emailForgotPassword_subheading'), anchor('auth/reset_password/'. $forgotten_password_code, lang('Auth.emailForgotPassword_link')));?></p>
</body>
</html>