<html>
<body>
	<h1><?php echo sprintf(lang('IonAuth.emailRegistrationAttempt_heading'), esc($identity)); ?></h1>
	<p><?php echo sprintf(lang('IonAuth.emailRegistrationAttempt_subheading'), esc($siteTitle)); ?></p>
	<p><?php echo sprintf(lang('IonAuth.emailRegistrationAttempt_forgotPassword'), '<a href="' . esc($forgotPasswordUrl, 'attr') . '">' . esc($forgotPasswordUrl) . '</a>'); ?></p>
	<p><?php echo sprintf(lang('IonAuth.emailRegistrationAttempt_adminContact'), '<a href="mailto:' . esc($adminEmail, 'attr') . '">' . esc($adminEmail) . '</a>'); ?></p>
	<p><?php echo lang('IonAuth.emailRegistrationAttempt_ignore'); ?></p>
</body>
</html>
