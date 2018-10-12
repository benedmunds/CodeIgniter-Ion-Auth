<html>
<body>
	<h1><?=sprintf(lang('IonAuth.emailForgotPassword_heading'), $identity)?></h1>
	<p>
		<?=sprintf(lang('IonAuth.emailForgotPassword_subheading'), anchor('auth/reset_password/' . $forgottenPasswordCode, lang('IonAuth.emailForgotPassword_link')))?>
	</p>
</body>
</html>
