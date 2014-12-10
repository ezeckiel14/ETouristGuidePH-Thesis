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
		content:'You are currently somewhere .'
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
window.onload = captureMyLocation();
})();

//Function for calculateDistance();
function calculateDistance(){
	//Assign the value of the form in a variable
	//Get time
	var time = document.getElementById('time');
	//Get budget
	var budget = document.getElementById('budget');
	//Get mode of transpo
	var transpo = document.getElementsByName('transpo');
	//loop through the radio buttons to select whic is selected
	var myTranspo;
	for(i = 0; i < transpo.length; i++){
		myTranspo = transpo[i];
		
		if(myTranspo.checked){
			var modeTranspo = myTranspo.value;
			alert(modeTranspo);
		}
	}
	var speed = parseFloat(29); //assuming that the speed of the vehicle is 29kph and assuming that the selected radio is on-vehicle
	//var.domElement Value gets the value of the form id)
	if(!parseFloat(time.value)){
		window.alert('Available time should be in numerical values');
	}else if(!parseFloat(budget.value)){
		window.alert('Available budget should be in numerical values');
	}else{
		var distanceCovered = document.getElementById('distanceCovered');
		var distance = time.value*speed;//According to physics the formula of Speed = Distance / Time, swapping distance with speed will give us Distance = Speed * Time
		distanceCovered.innerHTML = "The distance computed for the given time and mode of transportation is: </br>" + distance + " Km";
		}
	
};