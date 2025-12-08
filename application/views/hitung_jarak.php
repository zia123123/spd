<style>
.center {
	text-align:center;
}
.table {
	font-size:8pt;
	table-layout: fixed;
	collapse:collapse;
	white-space: nowrap;
}
.table th {
	background-color:#1A60AF;
	
}
.table .thead {
	color:#fff;
	vertical-align:middle;	
	font-size:10pt;
	font-weight:bold;
	border-bottom:solid 2px #183B63;
}
.table .tdskpd {
	font-size:10pt;
	border-bottom:solid 1px #BFBFBF;
	vertical-align:middle;	
}
.form-control{
	font-size:10pt;
	height:35px;	
}
#map_canvas {
  width:100%;
  height:470px;
}
.form-control select{
	line-height:50px;
	width:20px;
}
</style>

<div class="col-sm-12">
	
		<br/>
		<form action="<?php //echo site_url('request_skpd/approve');?>" class="form-horizontal" method="post">
		
		<div class="col-sm-12">
			<div align="center" style="width:100%;">
				<div>
				
					<div id="map_canvas" class=""></div>
					<p>
					<table align="left" border="0" >
					<tr>
						<td>
							<input type="text" name="total" style="width:120px;font-size:20pt;color:#D80000;font-weight:bold;border:dotted 2px #000;" data-mask="decimal" class="form-control" id="total" />
						</td>
						<td>&nbsp;</td>
						<td>
							<input type="text" name="liter_harian" style="width:120px;font-size:20pt;color:#000;font-weight:bold;border:dotted 2px #000;" class="form-control" value="10" id="liter_harian" />
						</td>
						<td>&nbsp;</td>
						<td>
							<input type="text" name="per_liter" style="width:120px;font-size:20pt;color:#000;font-weight:bold;border:dotted 2px #000;" data-mask="decimal" class="form-control" value="6550" id="per_liter" />
						</td>
						<td>&nbsp;</td>
						<td>
							<button type="button" onclick="calculate()" class="form-control btn btn-success" style="margin-top:10px;" id="hitungjarak">Hitung &nbsp;<i class="fa fa-map-marker"></i></button>
						</td>
						<td width="800px">&nbsp;</td>
						<td width="100px">Jumlah BBM : </td>
						<td>
							<input type="text" name="hasil" style="width:220px;font-size:20pt;color:#000;font-weight:bold;border-bottom:solid 2px #000;" data-mask="fdecimal" data-dec="," data-rad="." class="form-control" readonly class="form-control" id="hasil" />
						</td>
					</tr>
					<tr>
						<td> <b>Jumlah Jarak (Km)</b> </td>
						<td>&nbsp;</td>
						<td> <b>BBM Harian (Liter)</b> </td>
						<td>&nbsp;</td>
						<td> <b>Harga/Liter (Rp)</b> </td>
						<td>&nbsp;</td>
					</tr>
					</table>
					
						
					</p>
									
					
				</div>
				
			</div>
		<div style="margin-top:50px">
			<b>Rumus : </b>((Jumlah Jarak x 0,2) + (BBM Harian)) x Harga/liter
		</div>	
		</div>
		
</div>
<script>
calculate = function()
{
    var total = document.getElementById('total').value;
    var per_liter = document.getElementById('per_liter').value; 
	var liter_harian = document.getElementById('liter_harian').value;
	var per_liter = document.getElementById('per_liter').value;
    document.getElementById('hasil').value = ((parseInt(total)*0.2)+parseInt(liter_harian))*parseInt(per_liter);
     
 }
</script>
<script type="text/javascript">
function showInput() {
    var message_entered =  document.getElementById("total").value;
    document.getElementById('jumlah_km').value = message_entered;
}

</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAXOoTXeFY2TF928N7ENB1Hsqwz5n-A_y4&callback=initMap">
</script>
<script type="text/javascript">
var infowindow = null;
var map;      
var directionsDisplay;  
var directionsService = new google.maps.DirectionsService();
var oldDirections = [];
var currentDirections = null;

var myCenter=new google.maps.LatLng(-6.938533, 107.662655);
var marker=new google.maps.Marker({
    position:myCenter
});

function initialize() {
	
	var sites = [
		<?php
			foreach($data_tempat as $tmpt){
				?>
				["<?php echo $tmpt->nama_tempat;?>", <?php echo $tmpt->latlng ?> ,1, "<h4><?php echo $tmpt->nama_tempat;?></h4><p><?php echo $tmpt->wilayah;?></p>"],
				<?php
			}
		?>
	];
	var mapProp = {
	  center:myCenter,
	  zoom: 9,
	  scrollwheel: true,
	  mapTypeId:google.maps.MapTypeId.ROADMAP
	};
  
  map=new google.maps.Map(document.getElementById("map_canvas"),mapProp);
  marker.setMap(map);
   
  directionsDisplay = new google.maps.DirectionsRenderer({
		'map': map,
		'preserveViewport': true,
		'draggable': true
	});
	
  google.maps.event.addListener(directionsDisplay, 'directions_changed',
  function() {
	if (currentDirections) {
	  oldDirections.push(currentDirections);
	}
	//currentDirections = directionsDisplay.getDirections();
	computeTotalDistance(directionsDisplay.getDirections());
  });
  //google.maps.event.addListener(marker, 'click', function() {
   setMarkers(map, sites); // memanggil fungsi setMarker untuk menandai titik di peta.
   //setAction(map);
   infowindow = new google.maps.InfoWindow({
				content: "loading..."
			});
  //  infowindow.setContent(contentString);
  //  infowindow.open(map, sites);
     calcRoute();  
	 
  //}); 
};

function calcRoute() {
		
	var start = new google.maps.LatLng(-6.938533, 107.662655);
	var end = new google.maps.LatLng(-6.902822, 107.536819);
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
			var image= '<?php echo base_url()?>xenon/images/bulog_small.png';
			var marker = new google.maps.Marker({
				position: siteLatLng,
				map: map,
				title: sites[0],
				zIndex: sites[3],
				html: sites[4],
				icon:image
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
			var form = '<h4>Tambah Data</h4><form id="formtambahdata" method="post" action=""><br><input type="text" id="nama" placeholder="nama tempat" name="nama"><br><textarea id="keterangan" name="keterangan" placeholder="Isi Keterangan tempat"></textarea><br><input type="text" id="latlng" name="latlng" value="'+lat+','+lng+'"><br><input type="submit" value="Simpan"></form>';
			
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
google.maps.event.addDomListener(window, 'load', initialize);

google.maps.event.addDomListener(window, "resize", resizingMap());

$('#myMapModal').on('show.bs.modal', function() {
   //Must wait until the render of the modal appear, thats why we use the resizeMap and NOT resizingMap!! ;-)
   resizeMap();
})

function resizeMap() {
   if(typeof map =="undefined") return;
   setTimeout( function(){resizingMap();} , 400);
}

function resizingMap() {
   if(typeof map =="undefined") return;
   var center = map.getCenter();
   google.maps.event.trigger(map, "resize");
   map.setCenter(center); 
}
</script>