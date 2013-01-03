<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>

	<style type="text/css">

	::selection{ background-color: #E13300; color: white; }
	::moz-selection{ background-color: #E13300; color: white; }
	::webkit-selection{ background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body{
		margin: 0 15px 0 15px;
	}
	
	p.footer{
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}
	
	#container{
		margin: 10px;
		border: 1px solid #D0D0D0;
		-webkit-box-shadow: 0 0 8px #D0D0D0;
	}
	
	#infoMessage{
		font-size: 13px;
		font-weight: bold;
		color: blue;
		padding-left: 15px;
	}
	</style>
</head>
<body>

<div id="container">
	<h1>Welcome to Contact Engine Ion Auth!</h1>

	<div id="infoMessage"><?php if(!empty($message)) { echo $message; } ?></div>
	
	<div id="body">
		<p>Contact Engine Ion Auth is a driver for the Ion Auth library. It allows to authenticate against a Contact Engine service</p>

		<p>Examples:</p>
		<ul>
			<li><a href="<?php echo site_url(); ?>/auth">Login form</a> to authenticate a user on Contact Engine</li>
			<li><a href="<?php echo site_url(); ?>/auth/create_user">Create a new user</a> in Contact Engine</li>
			<li><a href="<?php echo site_url(); ?>/auth/logout">Logout</a></li>
			<li><a href="<?php echo site_url(); ?>/auth/list_registered_users">Lists Contact Engin Ion Auth registered users</a></li>
		</ul>
	</div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
</div>

</body>
</html>