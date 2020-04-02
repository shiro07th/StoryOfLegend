
if(navigator.geolocation)
{
	navigator.geolocation.getCurrentPosition(function(position){
		var latitude = position.coords.latitude;
		var longitude = position.coords.longitude;
		document.getElementById("latitude").value = latitude;
		document.getElementById("longitude").value = longitude;
	});
}
else
{
	alert("Navigator doesn't support geolocalisation");
}



function StockValue(){
	
	if(typeof sessionStorage !='undefined'){
		
		sessionStorage.setItem('keylatitude', document.getElementById("latitude").value);
		sessionStorage.setItem('keylongitude', document.getElementById("longitude").value);
	}
	else{
		alert("sessionStorage not supported");
	}
	if(typeof localStorage !='undefined'){
		localStorage.setItem('keyfirstname', document.getElementById("firstname").value);
		localStorage.setItem('keylastname', document.getElementById("lastname").value);
	}
	else
	{
		alert("localStorage not supported");
	}
	return true;
}
window.onload = function(){
	if (sessionStorage.getItem('keylatitude')!= null && sessionStorage.getItem('keylatitude')!= "")
	{
		document.getElementById("displaylatitude").innerHTML ="Latitude : "+ sessionStorage.getItem('keylatitude');
	}
	if (sessionStorage.getItem('keylongitude')!= null && sessionStorage.getItem('keylongitude')!= "")
	{
		document.getElementById("displaylongitude").innerHTML ="Longitude :"+ sessionStorage.getItem('keylongitude');
	}

		document.getElementById("displayfirstname").innerHTML = localStorage.getItem('keyfirstname');


		document.getElementById("displaylastname").innerHTML = localStorage.getItem('keylastname');

}