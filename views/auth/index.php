<h1><?php echo lang('index_heading');?></h1>
<p><?php echo lang('index_subheading');?></p>

<div id="infoMessage"><?php echo $message;?></div>

<p>The forms and interactions below are provided for demonstration purposes. You can use these as a starting point for your own application.</p>

<ul>
	<li><?php echo anchor('auth/users', lang('users_title'))?></li>
	<li><?php echo anchor('auth/groups', lang('groups_title'))?></li>
	<li><?php echo anchor('auth/logout', lang('logout_title'))?></li>
</ul>

<p>There are also front end interactions which you can use when logged out.</p>

<ul>
	<li><?php echo anchor('auth/register', lang('register_title'))?></li>
</ul>