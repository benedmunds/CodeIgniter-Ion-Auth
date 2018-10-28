<html>
<body>
	<h1><?php echo sprintf(lang('IonAuth.emailActivate_heading'), $identity);?></h1>
	<p>
		<?php
		echo sprintf(lang('IonAuth.emailActivate_subheading'),
						  anchor('auth/activate/' . $id . '/' . $activation, lang('IonAuth.emailActivate_link')));
		?>
	</p>
</body>
</html>