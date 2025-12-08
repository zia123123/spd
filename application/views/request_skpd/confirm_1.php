<style>
h4 { color:#000; }
</style>
<div class="main-content">
<div class="col-md-12">
					<div class="panel panel-default">
						<div class="panel-heading">
							<div class="panel-title">Konfirmasi #1</div>
						</div>
						<div class="panel-body">
							<?php if ($this->session->flashdata('msg')) echo '<label class="text-danger" style="font-size:10pt">'.$this->session->flashdata('msg').'</label>'; ?>
							<div class="row">
								<form action="<?php echo site_url('request_skpd/input_pelaksana_temp');?>" class="form-horizontal" method="post">
								<?php echo "<input type='hidden' name='id_sppd' value='$id'>"; ?>
								<?php
								$i=1;
								foreach ($pelaksana as $r)
								{
									echo "<input type='hidden' name='id_pelaksana' value='$r->id_pelaksana'>"; 
								}
								?>
								<input type="hidden" name="durasi" value="<?php echo $data_sppd['durasi_tgs']; ?>"/>	
								<div class="col-md-12">
									<div class="row">
										<div class="col-sm-4">
											<h4>Jenis Biaya</h4>
											<blockquote>
												<p>
													<select name="jenis_biaya" id="jenis_biaya" onchange="funcModa()" class="form-control" >
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
												</p>
											</blockquote>
											
										</div>
										<div class="col-sm-4">
											
											<h4>Moda Angkutan</h4>
											
											<blockquote>
												<p>
													<select name="moda_angkutan" id="moda_angkutan" class="form-control">
														<option value="">- Pilih Moda Angkutan -</option>
														<option value="kendaraan dinas" id="kendaraan_dinas">KENDARAAN DINAS</option>
														<option value="kereta api" id="kereta_api">KERETA API</option>
														<option value="travel" id="travel">TRAVEL</option>
														<option value="pesawat udara" id="pesawat_udara">PESAWAT UDARA</option>
														<option value="Pesawat/Kereta/Travel" id="pesawat_kereta_travel">PESAWAT / KERETA API / TRAVEL</option>
													</select> 
												</p>
											</blockquote>
									
										</div>
										<div class="col-sm-4">
											<h4>&nbsp;</h4>
											<blockquote>
											<p>
												<div class="col-sm-4">
													<input type="submit" name="submit" class="btn btn-success" value="Konfirmasi"/>
												</div>
												<div class="col-sm-2">
													<?php echo anchor($this->uri->segment(1),'Kembali',array('class'=>'btn btn-white'));?>
												</div>
											</p>
											</blockquote>											
										</div>
									</div>
								</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				</div>
<script>
function funcModa() {
    
	var jenisbiaya = document.getElementById("jenis_biaya").value;
	
	if (jenisbiaya == "") {
		document.getElementById("moda_angkutan").value = "";
		document.getElementById("kendaraan_dinas").disabled = false;
		document.getElementById("kereta_api").disabled = false;
		document.getElementById("travel").disabled = false;
		document.getElementById("pesawat_udara").disabled = false;
		document.getElementById("pesawat_kereta_travel").disabled = false;
	} else if (jenisbiaya == "dalam_kota") {
		document.getElementById("moda_angkutan").value = "";
		document.getElementById("kendaraan_dinas").disabled = false;
		document.getElementById("kereta_api").disabled = true;
		document.getElementById("travel").disabled = true;
		document.getElementById("pesawat_udara").disabled = true;
		document.getElementById("pesawat_kereta_travel").disabled = true;
	} else if (jenisbiaya == "pswt_krywn_hotel" || jenisbiaya == "pswt_krywn_non_hotel" || jenisbiaya == "pswt_ka_waka_hotel" || jenisbiaya == "pswt_ka_waka_non_hotel"){
		document.getElementById("moda_angkutan").value = "";
		document.getElementById("kendaraan_dinas").disabled = true;
		document.getElementById("kereta_api").disabled = true;
		document.getElementById("travel").disabled = true;
		document.getElementById("pesawat_udara").disabled = false;
		document.getElementById("pesawat_kereta_travel").disabled = false;
	} else {
		document.getElementById("moda_angkutan").value = "";
		document.getElementById("kendaraan_dinas").disabled = false;
		document.getElementById("kereta_api").disabled = false;
		document.getElementById("travel").disabled = false;
		document.getElementById("pesawat_udara").disabled = false;
		document.getElementById("pesawat_kereta_travel").disabled = false;
	}
}
</script>