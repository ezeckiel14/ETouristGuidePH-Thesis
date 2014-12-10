<?php include "./designIncludes/userNav.php"; ?>
<script type="text/javascript" src="jscripts/mapScripts/mapScript.js"></script>	
<div id="searchConsole">
	<form>
	<p>Time Available: <input type="text" size="2" placeholder="0" id="time"/> Hr</p>
	<p>Budget Available: Php <input type="text" size="10" placeholder="0.00" id="budget"/></p>
	<p>Mode of Transportation: <input type="radio" 
								name="transpo" checked="1" 
								value="onFoot" 
								id="onFoot">On-foot
							   <input type="radio" 
							   name="transpo" 
							   value="onVehicle" 
							   id="onVehicle">On-vehicle
	</p>
	<input type="button" value="Calculate" name="calculate" onclick="calculateDistance();">
	<input type="button" value="Save Query Data" name="save">
	</form>
	
	<div id="myLatLng"></div>
	<div id="distanceCovered"></div>
</div>

<div id="map-canvas"></div>