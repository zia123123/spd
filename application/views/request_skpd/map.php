<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Google Map in jQuery dialog box</title>

<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"  type="text/javascript"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.14/jquery-ui.min.js"  type="text/javascript"></script>

<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.14/themes/ui-darkness/jquery-ui.css" />
<style>
    .gBubble
    {
        color:black;
        font-family:Tahoma, Geneva, sans-serif;
        font-size:12px;    
    }
</style>

<!--<p>Jumlah Jarak: <input type="text" name="total" style="width:100px" value="" id="total"/> Km</p> -->
	

<script>

var infowindow = null;
var directionsDisplay;
var directionsService = new google.maps.DirectionsService();
var oldDirections = [];
var currentDirections = null;

var map2;
var coords = new Object();
var markersArray = [];
coords.lat = -6.9935097814125085;
coords.lng = 110.41833758354187;
    
    $(document).ready(function() 
    {
        
        $( "#map_container" ).dialog({
            autoOpen:false,
            width: 555,
            height: 400,
            resizeStop: function(event, ui) {google.maps.event.trigger(map2, 'resize')  },
            open: function(event, ui) {google.maps.event.trigger(map2, 'resize'); }      
        });  

        $( "#showMap" ).click(function() {           
            $( "#map_container" ).dialog( "open" );
            map2.setCenter(new google.maps.LatLng(coords.lat, coords.lng), 10);
            return false;
        });    
        $(  "input:submit,input:button, a, button", "#controls" ).button();
        initialize();
        plotPoint(coords.lat,coords.lng,'Mall of America','<span class="gBubble"><b>Mall of America</b><br>60 East Brodway<br>Bloomington, MN 55425</span>');
		google.maps.event.addDomListener(window, 'load', initialize);
    });
	    function plotPoint(srcLat,srcLon,title,popUpContent,markerIcon)
    {
            var myLatlng = new google.maps.LatLng(srcLat, srcLon);            
            var marker = new google.maps.Marker({
                  position: myLatlng, 
                  map: map2, 
                  title:title,
                  icon: markerIcon
              });
              markersArray.push(marker);
            var infowindow = new google.maps.InfoWindow({
                content: popUpContent
            });
              google.maps.event.addListener(marker, 'click', function() {
              infowindow.open(map2,marker);
            });                                          
    }
    function initialize() {
		// Baris berikut digunakan untuk mengisi marker atau tanda titik di peta
		var sites = [
			<?php
				foreach($data_tempat as $tmpt){
				//while ($data=mysql_fetch_array($datas)) {
					?>
					["<?php echo $tmpt->nama_tempat;?>", <?php echo $tmpt->latlng; ?> ,1, "<h4><?php echo $tmpt->nama_tempat;?></h4><p><?php echo $tmpt->wilayah;?></p>"],
					<?php
				}
			?>
		];
		var centerMap = new google.maps.LatLng(-6.9935097814125085,110.41833758354187);  // mengatur pusat peta
	   
		var myOptions = {
			zoom: 10, // level zoom peta
			center: centerMap,  // setting pusat peta ke centerMap
			mapTypeId: google.maps.MapTypeId.ROADMAP //menentukan tipe peta
		}

		var map = new google.maps.Map(document.getElementById("map_canvas"), myOptions); //menempatkan peta pada div dengan ID map_canvas di html

		directionsDisplay = new google.maps.DirectionsRenderer({
			'map': map,
			'preserveViewport': true,
			'draggable': true
		});
		//directionsDisplay.setPanel(document.getElementById("directions_panel"));
		
		google.maps.event.addListener(directionsDisplay, 'directions_changed',
		  function() {
			if (currentDirections) {
			  oldDirections.push(currentDirections);
			}
			//currentDirections = directionsDisplay.getDirections();
			computeTotalDistance(directionsDisplay.getDirections());
		  });
		
		setMarkers(map, sites); // memanggil fungsi setMarker untuk menandai titik di peta.
		setAction(map);  //tambahan dari tutorial 2 untuk memanggil fungsi setAction(map);
		infowindow = new google.maps.InfoWindow({
				content: "loading..."
			});
		 calcRoute();
		var bikeLayer = new google.maps.BicyclingLayer();
		bikeLayer.setMap(map);  //memnunculkan peta	   
	}

	function calcRoute() {
		
		var start = new google.maps.LatLng(-6.9935097814125085,110.41833758354187);
		var end = new google.maps.LatLng(-6.993051873629735,110.40813446044922);
		var request = {
			origin:start,
			destination:end,
			travelMode: google.maps.TravelMode.DRIVING,
			avoidHighways: false,
			avoidTolls: false
		};
		directionsService.route(request, function(response, status) {
			if (status == google.maps.DirectionsStatus.OK) {
				directionsDisplay.setDirections(response);
				distanceInput.value = response.routes[0].legs[0].distance.value / 1000; 
			}
		});
		
	}
		
	function computeTotalDistance(result) {
		var total = 0;
		var myroute = result.routes[0];
		for (var i = 0; i < myroute.legs.length; i++) {
			total += myroute.legs[i].distance.value;
		}
		total = total / 1000;
		document.getElementById('total').value = Math.round(total);
	}

	function setMarkers(map, markers) {
		//berikut merupakan perulangan untuk membaca masing masing titik yang telah kita definisikan di sites[];
		for (var i = 0; i < markers.length; i++) {
			var sites = markers[i];
			var siteLatLng = new google.maps.LatLng(sites[1], sites[2]);
			var marker = new google.maps.Marker({
				position: siteLatLng,
				map: map,
				title: sites[0],
				zIndex: sites[3],
				html: sites[4]
			});

			var contentString = "Some content";
			// berikut merupakan fungsi untuk mengatur agar keterangan marker muncuk ketika mouse diarahkan ke marker (mouse over)
			google.maps.event.addListener(marker, "mouseover", function () {
			   
				infowindow.setContent(this.html);
				infowindow.open(map, this);
			});
		}
	}

	function setAction(map){		
		google.maps.event.addListener(map, "rightclick", function(event) {

		if(confirm("Tandai Titik Ini? (klik pada tanda yang muncul untuk melihat pilihan)")){
			var lat = event.latLng.lat();
			var lng = event.latLng.lng();
			var form = '<h4>Tambah Data</h4><form id="formtambahdata" method="post" action="simpan.php"><br><input type="text" id="nama" placeholder="nama tempat" name="nama"><br><textarea id="keterangan" name="keterangan" placeholder="Isi Keterangan tempat"></textarea><br><input type="text" id="latlng" name="latlng" value="'+lat+','+lng+'"><br><input type="submit" value="Simpan"></form>';
			
			var siteLatLng = new google.maps.LatLng(lat, lng);
			var marker = new google.maps.Marker({
					position: siteLatLng,
					map: map,
					title: "add data",
					zIndex: 100,
					html: form

				});
			google.maps.event.addListener(marker, "mouseover", function () {				   
				infowindow.setContent(this.html);
				infowindow.open(map, this);
			});
		}
	   
		});
	}
	
	

</script>
</head>

<body>
 <div id="map_container" title="Location Map">    
        <div id="map_canvas" style="width:100%;height:100%;"></div>
    </div>
    
    <div id="controls">
        <input type="button" name="showMap" value="Show Map" id="showMap" />
    </div>  
</body>
</html>