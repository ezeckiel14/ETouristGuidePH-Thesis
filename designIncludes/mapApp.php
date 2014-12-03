<?php include "./designIncludes/userNav.php"; ?>

<div id="searchConsole">
	<form method="GET">
	<p>Time Available: <input type="text" size="2"/> Hr</p>
	<p>Budget Available: Php <input type="text" size="5"/></p>
	<p>Mode of Transportation: <input type="radio" name="transpo" checked="1" value="onFoot">On-foot
							   <input type="radio" name="transpo" value="onVehicle">On-vehicle
	</p>
	<input type="submit" value="Calculate" name="calculate">
	<input type="submit" value="Save Query Data" name="save">
	</form>
</div>

<div id="map-canvas">
	
</div>
