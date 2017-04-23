<html lang="en">
<head>
<meta content="text/html;charset=utf-8" http-equiv="Content-Type">
<meta content="utf-8" http-equiv="encoding">
      <script type="text/javascript"
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCc5_z2Zruh01mevWGVavrIZ6D5N5Q_lqc&sensor=false&libraries=geometry">
    </script>
	<style type="text/css">
	body{
	     background-color:#6d6062;
	   }
	   #div1{
	      border:1px solid;
		  width: 150px;
		  height:680px;
		  background-color: #f2caa2;
		  padding-left:30px;
		  border:5px solid;
		  
	   }
	   input[type=submit] {
    width: 10em;  height: 2em;
}
</style>
<script>
 var map;
 
function initialize(){
	
        geocoder = new google.maps.Geocoder();
 
 
        var myOptions = {
          center: new google.maps.LatLng(22.546,88.354),
          zoom: 19,
		  scaleControl: true,
		  //disableDefaultUI:true;
          mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        map = new google.maps.Map(document.getElementById("ramesh"),
            myOptions);
}   
function drawLine(lag,lat)
{
 //alert(lag);
  //console.log(lag);
  //console.log(lat);
    var latlong = new google.maps.LatLng(lag,lat);
	map.setCenter(new google.maps.LatLng(lag,lat));
	var content="location";
	var infowindow = new google.maps.InfoWindow({
      content: content
	  });
	 
	   //var image = 'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png';
         // var beachMarker = new google.maps.Marker({
         // position:latlong,
         // map: map,
          //icon:image
       // });
		var flightPath = new google.maps.Circle({
          center: new google.maps.LatLng(lag,lat),
		  radius:0.5,
          geodesic: true,
          strokeColor: '#FF0000',
          strokeOpacity: 1.0,
          strokeWeight: 1
        });

        flightPath.setMap(map);
		
	google.maps.event.addListener(flightPath, 'click', function() {
    infowindow.open(map,beachMarker);
	
	})
	
  

}
</script>
</head>
<body onLoad="initialize()" >
<form action ="" method="post">
<div style="position:absolute" id="div1">
<input type="radio" name="TrailType" onload =" setColor(this.value)" value="red"><font color="red">Red <br>
<input type="radio" name="TrailType" onload ="setColor(this.value)" value="green"><font color="green">Green<br>
Start:<input type="text" name ="start" size="9"><br>
<br>
<br>
End: <input type="text" name="end" size="9">
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<input type="submit" value="Route" name="Route" id="search" >
</div>
</form>
<div id="ramesh" style="width: 87%; height:680px; float:right; border: 2px solid #dddddd;"></div>
<?php
$con=mysqli_connect('localhost','root','','database');
if(isset($_POST['Route'])){
	global $con;
	$query  = "SELECT  * FROM userdata12";
	$run = mysqli_query($con,$query);
	if($run)
	{
		
		while($data=mysqli_fetch_array($run))
		{
			 $lag=$data[0];
			 $lat=$data[1];
			
			echo "<script type='text/javascript'>setTimeout(\"drawLine($lag,$lat);\",5000)</script>";
		}
	}
}
?>
</body>
</html>