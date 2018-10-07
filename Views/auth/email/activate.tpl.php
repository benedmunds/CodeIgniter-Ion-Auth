<html>
<body>
	<h1><?php echo sprintf(lang('Auth.emailActivate_heading'), $identity);?></h1>
	<p><?php echo sprintf(lang('Auth.emailActivate_subheading'), anchor('auth/activate/'. $id .'/'. $activation, lang('Auth.emailActivate_link')));?></p>
</body>
</html>