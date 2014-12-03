<div class="userPane">
	<h3>Login</h3>
	<hr>
	<p>This web-app requires users to register as a member. </br> Please fill in your username and password.</p>
	
	<?php
	
	#creating the database for the web-app
	    include "./designIncludes/phpLogicIncludes/databaseCreate.php";
	#creating the database tables for the web-app
		include "./designIncludes/phpLogicIncludes/databaseTableCreate.php";
	#php code for login validation
	if(isset($_POST['login'])){
		include "./designIncludes/phpLogicIncludes/validateLogIn.php";
	}
	?>	
	<form method="POST">
	<p>Username: <input type="text" size="16" name="username"/></p>
	<p>Password:&numsp;<input type="password" size="16" name="password"/></p>
	<input type="submit" value="Log-in" name="login"/>
	</form>
	
	<p><a href="register.php">Register</a> | <a href="forgotPassword.php">Forgot Password?</a> | <a href="#"> About Us</a></p>
</div>
