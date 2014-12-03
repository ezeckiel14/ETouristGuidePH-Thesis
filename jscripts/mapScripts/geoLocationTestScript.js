function getPos(){
	if (navigator.geolocation){
		navigator.geolocation.getCurrentPosition(function myPos(position){
			var pos = position.coords.longitude + "," + position.coords.latitude;
			document.write(pos);
		});
	}else
	document.write('geolocation not supported');
}

getPos();
