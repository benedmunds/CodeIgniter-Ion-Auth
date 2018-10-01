<html>
<body>
	<h1><?php echo sprintf(lang('Auth.email_activate_heading'), $identity);?></h1>
	<p><?php echo sprintf(lang('Auth.email_activate_subheading'), anchor('auth/activate/'. $id .'/'. $activation, lang('Auth.email_activate_link')));?></p>
</body>
</html>