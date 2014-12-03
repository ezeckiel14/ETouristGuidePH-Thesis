<div class="userPane">
	<h3>Forgot Password</h3>
	<hr>
	<p>Input your username and e-mail to generate a new password for your account.</p>
	
	<?php
	
	if(isset($_POST['forgot'])){
		include "./designIncludes/phpLogicIncludes/forgotPassScript.php";
	}
	?>	
	<form method="POST">
	<p>Username: <input type="text" size="16" name="username"/></p>
	<p>E-mail Address:&numsp;<input type="text" size="16" name="email"/></p>
	<input type="submit" value="Forgot Password" name="forgot"/> <a href="index.php">Return to Log-in</a>
	</form>
</div>
