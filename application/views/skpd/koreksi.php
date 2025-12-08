
<script src="<?php echo base_url()?>uadmin/js/jquery.min.js"></script>
<script src="<?php echo base_url()?>uadmin/js/vendor/bootstrap.min.js"></script>
<script>
	
</script>

<style>
#map_canvas {
  width:100%;
  height:500px;
}
.bold {
	font-weight:bold;
}
</style>
<div class="page-content">
<div class="container">
<div class="row">
				<div class="col-md-12">
					<!-- BEGIN VALIDATION STATES-->
					<div class="portlet light">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-cogs font-green-sharp"></i>
								<span class="caption-subject font-green-sharp bold uppercase">Koreksi NO SKPD [
								<?php
									$no_skpd = str_pad($skpd['no_skpd'],4, "0", STR_PAD_LEFT)."".$skpd['attr_skpd'];
									echo "".$no_skpd." ]";
								?></span>
							</div>
							<div class="tools">
								<a href="javascript:;" class="collapse">
								</a>
							</div>
						</div>
						<div class="portlet-body form">
							<!-- BEGIN FORM-->
							<form action="<?php echo site_url('skpd/approve_koreksi');?>" id="form_sample_3" class="form-horizontal" method="post">
							<?php 
								echo "<input type='hidden' name='id_sppd' value='$id'>"; 
							?>
								<div class="form-body">
									<div class="alert alert-danger display-hide">
										<button class="close" data-close="alert"></button>
										You have some form errors. Please check below.
									</div>
									<div class="alert alert-success display-hide">
										<button class="close" data-close="alert"></button>
										Your form validation is successful!
									</div>
									<div class="row static-info">
										<div class="col-md-2 name">
											 
										</div>
										<div class="col-md-8 value">
										<table class="table table-bordered">
										<tbody>
										<tr>
											<td width="205px">Pemberi Tugas</td>
											<td width="25px"> : </td>
											<td>
												<?php echo $data_sppd['pemberi_tgs']." [ "; ?>
												<?php echo $data_sppd['jab_pemberi_tgs']." ]"; ?>
											</td>
										</tr>
										<tr>
											<td>Pemohon Tugas</td>
											<td> : </td>
											<td>
												<?php echo $data_sppd['pemohon_tgs']." [ "; ?>
												<?php echo $data_sppd['jab_pemohon_tgs']." ]"; ?>
											</td>
										</tr>
										</tbody>
										</table>
										
										<table class="table table-bordered">
										<tbody>
										<tr>
											<td colspan="7">Pelaksana Tugas</td>
										</tr>
										<?php
										$i=1;
										foreach ($pelaksana as $r)
										{
										?>
										
										<tr>
											<td>
												<?php echo $i;?>
												<?php echo "<input type='hidden' name='id_pelaksana' value='$r->id_pelaksana'>"; ?>
											</td>
											<td><?php echo $r->nama_pelaksana;?></td>
											<?php if (substr($r->noreg,0,4) == '1111' or substr($r->noreg,0,4) == '2222') { ?>
											<td>-</td>
											<td align="center">-</td>
											<?php } else { ?>
											<td><?php echo $r->noreg;?></td>
											<td align="center"><?php echo romawi($r->gol);?></td>
											<?php } ?>
											<td><?php echo $r->jabatan;?></td>
											<td><?php echo $r->unit_kerja;?></td>
											<td>
												<?php 
													if ($r->status_pelaksana == 1) {
														//echo "Ketua Pelaksana";
														echo '<span class="btn default btn-xs red">Ketua Pelaksana</span>';
													} elseif ($r->status_pelaksana == 0) {
														echo '<span class="btn default btn-xs default">Pelaksana</span>';
													}
												?>
											</td>
										</tr>
										<?php $i++;}?>
										</tbody>
										</table>
										
										<table class="table table-bordered">
										<tbody>
										<tr>
											<td width="205px">Dari</td>
											<td width="25px"> : </td>
											<td>
												<?php echo ucwords(strtolower($data_sppd['tmpt_keberangkatan'])); ?>
											</td>
										</tr>
										<tr>
											<td>Tujuan</td>
											<td> : </td>
											<td>
												<?php
												if(isset($lokasi)){
												foreach($lokasi as $row){
													echo $row->tempat_tujuan."<br/> ";
													}
												}
												?>
											</td>
										</tr>
										<tr>
											<td>Tugas</td>
											<td> : </td>
											<td>
												<?php echo ucwords($data_sppd['tugas']); ?>
											</td>
										</tr>
										<tr>
											<td>Durasi</td>
											<td> : </td>
											<td>
												<?php echo $data_sppd['durasi_tgs']; ?> Hari
												<input type="hidden" name="durasi" value="<?php echo $data_sppd['durasi_tgs']; ?>"/>	
											</td>
										</tr>
										</tbody>
										</table>
										</div>
									</div>
									<div class="row static-info">
											<div class="col-md-2 name">
												 
											</div>
											<div class="col-md-2 name">
												 Dasar SKPD
											</div>
											<div class="col-md-6 value">
												<?php echo textarea('dasar', 'dasar', '', 2, $skpd['dasar'],'required');?>
											</div>
										</div>
										<div class="row static-info">
											<div class="col-md-2 name">
												 
											</div>
											<div class="col-md-2 name">
												 Perlengkapan
											</div>
											<div class="col-md-6 value">
												<?php echo inputan('text', 'perlengkapan','','Perlengkapan', 3, $skpd['perlengkapan'],'');?>
											</div>
										</div>
										<div class="row static-info">
											<div class="col-md-2 name">
												 
											</div>
											<div class="col-md-2 name">
												 Jenis Biaya
											</div>
											<div class="col-md-6 value">
												<select name="jenis_biaya" id="jenis_biaya" onchange="funcModa()" class="form-control" required="required">
													<option value="">- Pilih Jenis Biaya -</option>
													<option value="darat_hotel">DARAT &#43; HOTEL</option>
													<option value="darat_non_hotel">DARAT NON HOTEL</option>
													<option value="monev_ada">MONEV ADA</option>
													<option value="monev_kualitas">MONEV KUALITAS</option>
													<option value="monev_raskin">MONEV RASKIN</option>
													<option value="verik_raskin">VERIK RASKIN</option>
													<option value="dalam_kota">DALAM KOTA</option>
													<option value="spi">SPI</option>
													<option value="pswt_krywn_hotel">PESAWAT KARYAWAN &#43 HOTEL</option>
													<option value="pswt_krywn_non_hotel">PESAWAT KARYAWAN NON HOTEL</option>
													<option value="pswt_ka_waka_hotel">PESAWAT KA &#38; WAKA &#43 HOTEL</option>
													<option value="pswt_ka_waka_non_hotel">PESAWAT KA &#38; WAKA NON HOTEL</option>
												</select>
											</div>
										</div>
										<div class="row static-info">
											<div class="col-md-2 name">
												 
											</div>
											<div class="col-md-2 name">
												 Moda Angkutan
											</div>
											<div class="col-md-6 value">
												<select name="moda_angkutan" id="moda_angkutan" disabled onchange="funcModa()" class="form-control" required="required">
													<option value="">- Pilih Moda Angkutan -</option>
													<option value="kendaraan dinas" id="kendaraan_dinas">KENDARAAN DINAS</option>
													<option value="pesawat terbang" id="pesawat_terbang">PESAWAT TERBANG</option>
													<option value="kereta api" id="kereta_api">KERETA API</option>
													<option value="travel" id="travel">TRAVEL</option>
												</select> 
											</div>
										</div>
										
										<div class="form-group" id="tiket" style="display:none;">
											<div class="col-md-2 name">
												 
											</div>
											<div class="col-md-2 name">
												Uang Tiket
											</div>
											<div class="col-md-2">
												<input type="text" id="upesawat_b" name="upesawat_b" style="display:block;" class="form-control" value="" placeholder="Pesawat (Rp...)"/>
												<input type="text" id="ukereta_b" name="ukereta_b" style="display:block;" class="form-control" value="" placeholder="Kereta-Api (Rp...)"/>
												<input type="text" id="utravel_b" name="utravel_b" style="display:block;" class="form-control" value="" placeholder="Travel (Rp...)"/>
											</div>
											<div class="col-md-2">
												<input type="text" id="upesawat_p" name="upesawat_p" style="display:block;" class="form-control"  value="" placeholder="Pesawat (Rp...)"/>
												<input type="text" id="ukereta_p" name="ukereta_p" style="display:block;" class="form-control" value="" placeholder="Kereta-Api (Rp...)"/>
												<input type="text" id="utravel_p" name="utravel_p" style="display:block;" class="form-control" value="" placeholder="Travel (Rp...)"/>
											</div>
										</div>
										<div class="row static-info">
											<div class="col-md-2 name">
												 
											</div>
											<div class="col-md-2 name">
												 Jenis BBM
											</div>
											<div class="col-md-6 value">
												<select name="jenis_bbm" id="jenis_bbm" disabled class="form-control" required>
													<option value="">- Pilih Jenis BBM -</option>
													<?php foreach ($bbm as $jenisbbm) { ?>
														<option value="<?php echo $jenisbbm->jenis_bbm; ?>"><?php echo strtoupper($jenisbbm->jenis_bbm); ?></option>
													<?php } ?>
												</select>
											</div>
										</div>
										<div class="row static-info">
											<div class="col-md-2 name">
												 
											</div>
											<div class="col-md-2 name">
												 Jumlah Jarak (Km)
											</div>
											<div class="col-md-2 value">
												<input type="text" id="jumlah_km" name="jumlah_km" value="0" class="form-control"  style="width:150px;" readonly />
											</div>
											<div class="col-md-2 value">
												<button type="button" class="btn blue" id="hitungjarak" data-toggle="modal" data-target="#myMapModal">Hitung Jarak &nbsp;<i class="fa fa-map-marker"></i></button>  &nbsp;&nbsp;&nbsp;&nbsp;
											</div>
										</div>
										<div class="row static-info">
											<div class="col-md-2 name">
												 
											</div>
											<div class="col-md-2 name">
												Keterangan lain
											</div>
											<div class="col-md-6 value">
												<?php echo textarea('ket_lain', 'ket_lain', '', 2, $skpd['ket_lain'], '');?>
											</div>
										</div>
								</div>
								<div class="form-actions">
									<div class="row">
										<div class="col-md-offset-4 col-md-9">
											<input type="submit" name="submit" class="btn green" onclick="return confirm('Anda yakin akan menyetujui SKPD?')" value="Koreksi"/>
											<?php echo anchor($this->uri->segment(1),'Kembali',array('class'=>'btn btn-default'));?>
										</div>
									</div>
								</div>
							
							<!-- END FORM-->
							<div class="modal fade" align="center" id="myMapModal" >
							
								<div class="modal-content" align="center" style="width:95%;">
									
									<div class="modal-body">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
										<div id="map_canvas" class=""></div>
										<p>
										<table align="left" border="0" width="100%">
										<tr>
											<td width="125px" height="30px"> Lokasi Tujuan </td>
											<td width="25px">:</td>
											<td colspan="2">
												<b>
													<?php foreach ($lokasi as $lok) { 
													echo $lok->tempat_tujuan.", ";
													} ?>
												</b>
											</td>
										</tr>
										<tr>
											<td width="125px"> Jumlah Jarak (Km) </td>
											<td width="25px">:</td>
											<td width="180px">
												<input type="text" name="total" style="width:150px;" class="form-control" value="" id="total" readonly />
											</td>
											<td>
												<button type="button" onclick="showInput();" data-dismiss="modal" class="btn blue" id="hitungjarak"><i class="fa fa-save"></i> &nbsp;Simpan Jarak </button>  &nbsp;&nbsp;&nbsp;&nbsp;
											</td>
										</tr>
										</table>
										<br/><br/><br/>
											
										</p> 
									</div>
								</div>
							
							</div>
						</div>
					</div>
					<!-- END VALIDATION STATES-->
				</div>
			</div>
			</div>
			</div>
<script>
function funcModa() {
    
	var jenisbiaya = document.getElementById("jenis_biaya").value;
	var angkutan = document.getElementById("moda_angkutan").value;
	var jenisbbm = document.getElementById("jenis_bbm").value;
	
	if (jenisbiaya == "") {
		document.getElementById("moda_angkutan").disabled = true;
		document.getElementById("moda_angkutan").value = "";
		document.getElementById("jenis_bbm").disabled = true;
		document.getElementById("jenis_bbm").value = "";
		document.getElementById("tiket").style.display = "none";
		document.getElementById("upesawat_b").value = "";
		document.getElementById("upesawat_b").style.display = "none";
		document.getElementById("ukereta_b").value = "";
		document.getElementById("ukereta_b").style.display = "none";
		document.getElementById("utravel_b").value = "";
		document.getElementById("utravel_b").style.display = "none";
		document.getElementById("upesawat_p").value = "";
		document.getElementById("upesawat_p").style.display = "none";
		document.getElementById("ukereta_p").value = "";
		document.getElementById("ukereta_p").style.display = "none";
		document.getElementById("utravel_p").value = "";
		document.getElementById("utravel_p").style.display = "none";
		document.getElementById("pesawat_terbang").disabled = false;
		document.getElementById("kereta_api").disabled = false;
		document.getElementById("jumlah_km").value = "0";
		document.getElementById("hitungjarak").disabled = true;
	} else if (jenisbiaya == "darat_hotel" || jenisbiaya == "darat_non_hotel" || jenisbiaya == "monev_ada" || jenisbiaya == "monev_kualitas" || jenisbiaya == "monev_raskin" || jenisbiaya == "verik_raskin" || jenisbiaya == "spi"){
		document.getElementById("moda_angkutan").disabled = false;
		document.getElementById("jenis_bbm").disabled = true;
		document.getElementById("jenis_bbm").value = "";
		document.getElementById("tiket").style.display = "none";
		document.getElementById("upesawat_b").value = "";
		document.getElementById("upesawat_b").style.display = "none";
		document.getElementById("ukereta_b").value = "";
		document.getElementById("ukereta_b").style.display = "none";
		document.getElementById("utravel_b").value = "";
		document.getElementById("utravel_b").style.display = "none";
		document.getElementById("upesawat_p").value = "";
		document.getElementById("upesawat_p").style.display = "none";
		document.getElementById("ukereta_p").value = "";
		document.getElementById("ukereta_p").style.display = "none";
		document.getElementById("utravel_p").value = "";
		document.getElementById("utravel_p").style.display = "none";
		document.getElementById("pesawat_terbang").disabled = true;
		document.getElementById("kereta_api").disabled = false;
		document.getElementById("kendaraan_dinas").disabled = false;
		document.getElementById("travel").disabled = false;
		document.getElementById("jumlah_km").value = "0";
		document.getElementById("hitungjarak").disabled = true;
	} else if (jenisbiaya == "dalam_kota") {
		document.getElementById("moda_angkutan").disabled = false;
		document.getElementById("jenis_bbm").disabled = true;
		document.getElementById("tiket").style.display = "none";
		document.getElementById("upesawat_b").value = "";
		document.getElementById("upesawat_b").style.display = "none";
		document.getElementById("ukereta_b").value = "";
		document.getElementById("ukereta_b").style.display = "none";
		document.getElementById("utravel_b").value = "";
		document.getElementById("utravel_b").style.display = "none";
		document.getElementById("upesawat_p").value = "";
		document.getElementById("upesawat_p").style.display = "none";
		document.getElementById("ukereta_p").value = "";
		document.getElementById("ukereta_p").style.display = "none";
		document.getElementById("utravel_p").value = "";
		document.getElementById("utravel_p").style.display = "none";
		document.getElementById("pesawat_terbang").disabled = true;
		document.getElementById("kereta_api").disabled = true;
		document.getElementById("jumlah_km").value = "0";
		document.getElementById("hitungjarak").disabled = true;
	} else if (jenisbiaya == "pswt_krywn_hotel" || jenisbiaya == "pswt_krywn_non_hotel" || jenisbiaya == "pswt_ka_waka_hotel" || jenisbiaya == "pswt_ka_waka_non_hotel"){
		document.getElementById("moda_angkutan").disabled = false;
		document.getElementById("jenis_bbm").disabled = true;
		document.getElementById("jenis_bbm").value = "";
		
		document.getElementById("pesawat_terbang").disabled = false;
		document.getElementById("kereta_api").disabled = true;
		document.getElementById("kendaraan_dinas").disabled = true;
		document.getElementById("travel").disabled = true;
		document.getElementById("jumlah_km").value = "0";
		document.getElementById("hitungjarak").disabled = true;
	}
	if (angkutan == ""){
		document.getElementById("jenis_bbm").disabled = true;
		document.getElementById("hitungjarak").disabled = true;
		document.getElementById("tiket").style.display = "none";
		document.getElementById("upesawat_b").value = "";
		document.getElementById("upesawat_b").style.display = "none";
		document.getElementById("ukereta_b").value = "";
		document.getElementById("ukereta_b").style.display = "none";
		document.getElementById("utravel_b").value = "";
		document.getElementById("utravel_b").style.display = "none";
		document.getElementById("upesawat_p").value = "";
		document.getElementById("upesawat_p").style.display = "none";
		document.getElementById("ukereta_p").value = "";
		document.getElementById("ukereta_p").style.display = "none";
		document.getElementById("utravel_p").value = "";
		document.getElementById("utravel_p").style.display = "none";
	} else if (angkutan == "kendaraan dinas"){
		document.getElementById("jenis_bbm").disabled = false;
		document.getElementById("hitungjarak").disabled = false;
		document.getElementById("tiket").style.display = "none";
		document.getElementById("upesawat_b").value = "";
		document.getElementById("upesawat_b").style.display = "none";
		document.getElementById("ukereta_b").value = "";
		document.getElementById("ukereta_b").style.display = "none";
		document.getElementById("utravel_b").value = "";
		document.getElementById("utravel_b").style.display = "none";
		document.getElementById("upesawat_p").value = "";
		document.getElementById("upesawat_p").style.display = "none";
		document.getElementById("ukereta_p").value = "";
		document.getElementById("ukereta_p").style.display = "none";
		document.getElementById("utravel_p").value = "";
		document.getElementById("utravel_p").style.display = "none";
	} else if (angkutan == "kereta api"){
		document.getElementById("jenis_bbm").disabled = true;
		document.getElementById("hitungjarak").disabled = true;
		document.getElementById("tiket").style.display = "block";
		document.getElementById("upesawat_b").value = "";
		document.getElementById("upesawat_b").style.display = "none";
		document.getElementById("ukereta_b").value = "";
		document.getElementById("ukereta_b").style.display = "block";
		document.getElementById("utravel_b").value = "";
		document.getElementById("utravel_b").style.display = "none";
		document.getElementById("upesawat_p").value = "";
		document.getElementById("upesawat_p").style.display = "none";
		document.getElementById("ukereta_p").value = "";
		document.getElementById("ukereta_p").style.display = "block";
		document.getElementById("utravel_p").value = "";
		document.getElementById("utravel_p").style.display = "none";
	} else if (angkutan == "travel"){
		document.getElementById("jenis_bbm").disabled = true;
		document.getElementById("hitungjarak").disabled = true;
		document.getElementById("tiket").style.display = "block";
		document.getElementById("upesawat_b").value = "";
		document.getElementById("upesawat_b").style.display = "none";
		document.getElementById("ukereta_b").value = "";
		document.getElementById("ukereta_b").style.display = "none";
		document.getElementById("utravel_b").value = "";
		document.getElementById("utravel_b").style.display = "block";
		document.getElementById("upesawat_p").value = "";
		document.getElementById("upesawat_p").style.display = "none";
		document.getElementById("ukereta_p").value = "";
		document.getElementById("ukereta_p").style.display = "none";
		document.getElementById("utravel_p").value = "";
		document.getElementById("utravel_p").style.display = "block";
	} else if (angkutan == "pesawat terbang"){
		document.getElementById("jenis_bbm").disabled = true;
		document.getElementById("hitungjarak").disabled = true;
		document.getElementById("tiket").style.display = "block";
		document.getElementById("upesawat_b").value = "";
		document.getElementById("upesawat_b").style.display = "block";
		document.getElementById("ukereta_b").value = "";
		document.getElementById("ukereta_b").style.display = "none";
		document.getElementById("utravel_b").value = "";
		document.getElementById("utravel_b").style.display = "none";
		document.getElementById("upesawat_p").value = "";
		document.getElementById("upesawat_p").style.display = "block";
		document.getElementById("ukereta_p").value = "";
		document.getElementById("ukereta_p").style.display = "none";
		document.getElementById("utravel_p").value = "";
		document.getElementById("utravel_p").style.display = "none";
	}
   
}
</script>
<script type="text/javascript">
function showInput() {
    var message_entered =  document.getElementById("total").value;
    document.getElementById('jumlah_km').value = message_entered;
}

</script>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript">
var infowindow = null;
var map;      
var directionsDisplay;  
var directionsService = new google.maps.DirectionsService();
var oldDirections = [];
var currentDirections = null;

var myCenter=new google.maps.LatLng(-6.9935097814125085,110.41833758354187);
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
		
	var start = new google.maps.LatLng(-6.9935097814125085,110.41833758354187);
	var end = new google.maps.LatLng(-7.153446665654537,110.0810394063592);
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
			var image= '<?php echo base_url()?>assets/admin/images/bulog_small.png';
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
</form>