//Encapsulate the map in a self executing anonymous function to avoid cluttering the global-namespace with its variables
(function(){
//Setting up Google Maps with HTML5 geolocation to automatically locate the users current location
//If an error on geolocation occured. Output an error message on the on the div
function geoError(positionError){
	document.getElementById('map-canvas').innerHTML += "Error: " + positionError.message;
};
//A function where upon succesful capturing of geolocation the map will then be initialized setting the latitude and longitude the values acquired by geolocation API
function showMap(position) {
	//Get the id where the map will show using the getElementById DOM
	var mapDiv = document.getElementById('map-canvas');
	//initialize map latlng
	var latlng = new google.maps.LatLng(position.coords.latitude,position.coords.longitude);
	//set option object of the map. This will determine the zoom value, type of map to use, and the center of the map
	var mapOptions ={
		center: latlng,
		zoom: 18,
		mapTypeId: google.maps.MapTypeId.ROADMAP,
		scaleControl: true,
	//	noClear: true,
	// 	navigationControl: true,
	//	disableDefaultUI: true,
	//	mapTypeControl: true,
	};
	//initialize the map by putting the google maps object on the map-canvas div
	var map = new google.maps.Map(mapDiv, mapOptions);
	//adding markers on the map
	var marker = new google.maps.Marker({
		position:latlng,
		map: map,
		title:'Your Current Position'
	});
	//add infoWindow to the marker
	var infowindow = new google.maps.InfoWindow({
		content:'You are currently here.'
	});
	//show the info window
	infowindow.open(map,marker);
	//Print Latitude and Longitude on the myLatLng div
	var myLatLng = document.getElementById('myLatLng');
	myLatLng.innerHTML = "<p><u>Your current position: </u></br> Latitude: " + position.coords.latitude + " </br> longitude: " + position.coords.longitude + "</p>"; 
};
//A function for setting up geolocation
function captureMyLocation(){
	if(navigator.geolocation){
		var positionOptions = {
			enableHighAccuracy: true,
			timeout: 10*1000, //timeout to stop after 10 sec
			maximumAge:0			
		};
	//if geolocation object navigator.geolocation returns true, run the navigator.geolocation.getCurrentPosition object
	//following with the paratameters (success,fail,options). Upon successful execution of geolocation
	//the map will then be initialized using the captured latitude and longitude of the geolocation as its
	//latlng value
	navigator.geolocation.getCurrentPosition(showMap,geoError,positionOptions);
	}else{
		//if browser doesn't support geolocation or has a version that doesn't support geolocation API then output the following values
		document.getElementById('map-canvas').innerHTML += "Your browser doesn't support the Geolocation API";
	}	
};
//Start the map after the page has loaded.
window.onload = captureMyLocation(),printLoc();
})();

//Function for calculateDistance();
function calculateDistance(){
	var time = document.getElementById('time');
	var speed = parseFloat(29);
}
