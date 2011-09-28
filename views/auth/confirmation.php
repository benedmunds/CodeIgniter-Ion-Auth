<div class='mainInfo'>

	<div class="pageTitle">Confirmation</div>
    <div class="pageTitleBorder"></div>

	<div id="infoMessage"><?php echo $message;?></div>
	<?php
		if ($message == "Password Successfully Changed"){
			echo "Check your email for the updated password.";
		}
		elseif ($message == "Password Reset Email Sent"){
			echo "Check your email for the reset link.";
		}
	?>

</div>
