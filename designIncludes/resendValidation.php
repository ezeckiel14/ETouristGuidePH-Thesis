<div class="userPane">
	<h3>Resend Email Validation Link</h3>
	<hr>
	<p>Input your email to re-send the link to validate your email.</p>
	
	<?php
	
	if(isset($_POST['submit'])){
		include "./designIncludes/phpLogicIncludes/resendValidationScript.php";
	}
	?>	
	<form method="POST">
	<p>Email: <input type="text" size="16" name="email"/></p>
	<input type="submit" value="Re-send Email Validation Link" name="submit"/> <a href="index.php">Return to Log-in</a>
	</form>
</div>
