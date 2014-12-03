<?php include "./designIncludes/openingHTMLTag.php"; ?>

<div id="MainContent">
	
	<div id="header">
		<?php include "./designIncludes/header.php"; ?>
	</div>
	
	<div id="content">
		<?php 
		if (!isset($_SESSION['username'])){
		 include "./designIncludes/loginPanel.php";
		}else{
			include"./designIncludes/mapApp.php";
		}?>
	</div>
	
	<div id="footer">
		<?php include "./designIncludes/footer.php"; ?>
	</div>
	
</div>

<?php include "./designIncludes/closingHTMLTag.php"; ?>
