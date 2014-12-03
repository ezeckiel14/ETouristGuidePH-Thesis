<div class="userPane">
	<h3>Change Password</h3>
	<hr>
	<p>Input your Current Password and you new desired Password to change them.</p>
	
	<?php
	
	if(isset($_POST['submit'])){
		include "./designIncludes/phpLogicIncludes/changePassScript.php";
	}
	?>	
	<form method="POST">
	<p>Current Password: &numsp;<input type="password" size="12" name="oldPassword"/></p>
	<p>New Password:&numsp;<input type="password" size="12" name="newPassword"/></p>
	<p>Confirm Password &numsp;<input type="password" size="12" name="confirmPassword"</p>
	<p><input type="submit" value="Change Password" name="submit"/></p>
	</form>
</div>
