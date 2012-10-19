<html>
<body>
	<h3>ToolJar password reset</h3>
	<p>Hello,</p>	
	<p>
		We received a password reset request for the account <?php echo $identity;?>. 
		If you didn't make the request, please ignore this email
	</p>
	<p>Please click this link to <?php echo anchor('manage/reset_password/'. $forgotten_password_code, 'Reset Your Password');?>.</p>
</body>
</html>