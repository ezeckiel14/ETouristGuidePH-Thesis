<?php
$i = date("Y");
for ($i; $i>1900;$i--){
	echo "<option value = \" " .$i. "\">".$i."</option>";
}
?>