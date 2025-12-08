<style>
tbody {
	color:#000;
	border-bottom:solid 1px #777675;
	border-top:solid 1px #777675;
	font-size:10pt;
	padding:5px;
	}
</style>
<div class="main-content" style="background-color:#EEEEEE;">
	<div class="panel panel-default col-md-12" style="background-color:#EEEEEE;">
		<div class="panel-heading">
			<h3 class="panel-title"># Rekap Tagihan Faks Pusat & Akomodasi Tamu</h3>
			<div class="panel-options">
							
			</div>
		</div>

		<div class="panel-body">
			<ul class="nav nav-tabs nav-tabs-justified">
				<li class="active">
					<a href="#akomodasi" data-toggle="tab">
						<span class="visible-xs"><i class="fa-user"></i></span>
						<span class="hidden-xs">Akomodasi Tamu Hotel</span>
					</a>
				</li>
				<li>
					<a href="#faks" data-toggle="tab">
						<span class="visible-xs"><i class="fa-home"></i></span>
						<span class="hidden-xs">Rekap Tagihan Faks Pusat</span>
					</a>
				</li>
				<li>
					<a href="#export" data-toggle="tab">
						<span class="visible-xs"><i class="fa-user"></i></span>
						<span class="hidden-xs">Export Excel</span>
					</a>
				</li>
			</ul>
			
			<div class="tab-content">
				
				<div class="tab-pane active" id="akomodasi">
				
					<button class="btn btn-sm btn-success" style="background-color:#72A230;" onclick="add_person()"><i class="glyphicon glyphicon-plus"></i> Tambah Tamu</button>
					<button class="btn btn-sm btn-white" onclick="reload_table()"><i class="glyphicon glyphicon-refresh"></i> Reload</button>
					
				
					
					<table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th class="th" id="th">No SKPD</th>
								<th class="th" id="th">Tgl SKPD</th>
								<th class="th" id="th">Nama</th>
								<th class="th" id="th">Gol</th>
								<th class="th" id="th">Tujuan</th>
								<th class="th" id="th">Durasi</th>
								<th class="th" id="th">Hotel</th>
								<th class="th" id="th">Options</th>
							</tr>
						</thead>
						<tbody>
						</tbody>
					</table>
					
					
<script src="<?php echo base_url('xenon/js/jquery-2.1.4.min.js')?>"></script>

<script src="<?php echo base_url('xenon/js/jquery.dataTables.min.js')?>"></script>
					
					<script type="text/javascript">

					var save_method; //for save method string
					var table;

					$(document).ready(function() {

						//datatables
						table = $('#table').DataTable({ 

							"processing": true, //Feature control the processing indicator.
							"serverSide": true, //Feature control DataTables' server-side processing mode.
							"order": [], //Initial no order.

							// Load data for the table's content from an Ajax source
							"ajax": {
								"url": "<?php echo site_url('laporan/ajax_list')?>",
								"type": "POST"
							},

							//Set column definition initialisation properties.
							"columnDefs": [
							{ 
								"targets": [ -1 ], //last column
								"orderable": false, //set not orderable
							},
							],

						});

						//datepicker
						$('.datepicker').datepicker({
							autoclose: true,
							format: "dd-mm-yyyy",
							todayHighlight: true,
							orientation: "top auto",
							todayBtn: true,
							todayHighlight: true,  
						});

						//set input/textarea/select event when change value, remove class error and remove text help block 
						$("input").change(function(){
							$(this).parent().parent().removeClass('has-error');
							$(this).next().empty();
						});
						$("textarea").change(function(){
							$(this).parent().parent().removeClass('has-error');
							$(this).next().empty();
						});
						$("select").change(function(){
							$(this).parent().parent().removeClass('has-error');
							$(this).next().empty();
						});

					});



					function add_person()
					{
						save_method = 'add';
						$('#form')[0].reset(); // reset form on modals
						$('.form-group').removeClass('has-error'); // clear error class
						$('.help-block').empty(); // clear error string
						$('#modal_form').modal('show'); // show bootstrap modal
						$('.modal-title').text('Add Person'); // Set Title to Bootstrap modal title
					}

					function edit_person(id)
					{
						save_method = 'update';
						$('#form')[0].reset(); // reset form on modals
						$('.form-group').removeClass('has-error'); // clear error class
						$('.help-block').empty(); // clear error string

						//Ajax Load data from ajax
						$.ajax({
							url : "<?php echo site_url('laporan/ajax_edit/')?>/" + id,
							type: "GET",
							dataType: "JSON",
							success: function(data)
							{

								$('[name="id_akomodasi"]').val(data.id_akomodasi);
								$('[name="no_skpd"]').val(data.no_skpd);
								$('[name="tgl_skpd"]').datepicker('update',data.tgl_skpd);
								$('[name="nama"]').val(data.nama);
								$('[name="gol"]').val(data.gol);
								$('[name="tujuan"]').val(data.gol);
								$('[name="durasi"]').val(data.durasi);
								$('[name="hotel"]').val(data.hotel);
								$('#modal_form').modal('show'); // show bootstrap modal when complete loaded
								$('.modal-title').text('Edit Tamu'); // Set title to Bootstrap modal title

							},
							error: function (jqXHR, textStatus, errorThrown)
							{
								alert('Error get data from ajax');
							}
						});
					}

					function reload_table()
					{
						table.ajax.reload(null,false); //reload datatable ajax 
					}

					function save()
					{
						$('#btnSave').text('Simpan...'); //change button text
						$('#btnSave').attr('disabled',true); //set button disable 
						var url;

						if(save_method == 'add') {
							url = "<?php echo site_url('laporan/ajax_add')?>";
						} else {
							url = "<?php echo site_url('laporan/ajax_update')?>";
						}

						// ajax adding data to database
						$.ajax({
							url : url,
							type: "POST",
							data: $('#form').serialize(),
							dataType: "JSON",
							success: function(data)
							{

								if(data.status) //if success close modal and reload ajax table
								{
									$('#modal_form').modal('hide');
									reload_table();
								}
								else
								{
									for (var i = 0; i < data.inputerror.length; i++) 
									{
										$('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
										$('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
									}
								}
								$('#btnSave').text('save'); //change button text
								$('#btnSave').attr('disabled',false); //set button enable 


							},
							error: function (jqXHR, textStatus, errorThrown)
							{
								alert('Error adding / update data');
								$('#btnSave').text('save'); //change button text
								$('#btnSave').attr('disabled',false); //set button enable 

							}
						});
					}

					function delete_person(id)
					{
						if(confirm('Are you sure delete this data?'))
						{
							// ajax delete data to database
							$.ajax({
								url : "<?php echo site_url('laporan/ajax_delete')?>/"+id,
								type: "POST",
								dataType: "JSON",
								success: function(data)
								{
									//if success reload ajax table
									$('#modal_form').modal('hide');
									reload_table();
								},
								error: function (jqXHR, textStatus, errorThrown)
								{
									alert('Error deleting data');
								}
							});

						}
					}

					</script>

					<!-- Bootstrap modal -->
					<div class="modal fade" id="modal_form" role="dialog">
						<div class="modal-dialog" style="height:400px;margin-top:75px;" >
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<h3 class="panel-title">Tambah Tamu</h3>
								</div>
								<div class="modal-body form">
									<form action="#" id="form" class="form-horizontal" role="form">
										<input type="hidden" value="" name="id_akomodasi"/> 
										<div class="form-body">
											<div class="form-group">
												<label class="control-label col-md-3">No SKPD</label>
												<div class="col-md-5">
													<input name="no_skpd" placeholder="No SKPD.." class="form-control" type="text">
													<span class="help-block"></span>
												</div>
											</div>
											<div class="form-group">
												<label class="control-label col-md-3">Tgl SKPD</label>											
												<div class="col-md-5">
													<input type="text" name="tgl_skpd" class="form-control datepicker" data-format="dd-mm-yyyy" autocomplete="off" value="" placeholder="DD-MM-YYYY">
													<span class="help-block"></span>
												</div>
											</div>
											<div class="form-group">
												<label class="control-label col-md-3">Nama</label>
												<div class="col-md-5">
													<input name="nama" placeholder="Nama Tamu.." class="form-control" type="text">
													<span class="help-block"></span>
												</div>
											</div>
											<div class="form-group">
												<label class="control-label col-md-3">Gol / Durasi</label>
												<div class="col-md-2">
													<input name="gol" placeholder="GOL" class="form-control" type="text">
													<span class="help-block"></span>
												</div>
												<div class="col-md-3">
													<input name="durasi" data-mask="decimal" placeholder="Durasi.." class="form-control" type="text">
													<span class="help-block"></span>
												</div>
											</div>
											<div class="form-group">
												<label class="control-label col-md-3">Tujuan</label>
												<div class="col-md-5">
													<input name="tujuan" placeholder="Tujuan.." value="Semarang" class="form-control" type="text">
													<span class="help-block"></span>
												</div>
											</div>
											<div class="form-group">
												<label class="control-label col-md-3">Biaya Hotel</label>
												<div class="col-md-5">
													<input name="hotel" placeholder="Rp.." class="form-control" type="text">
													<span class="help-block"></span>
												</div>
											</div>
										</div>
									</form>
								</div>
								<div class="modal-footer">
									<button type="button" id="btnSave" onclick="save()" class="btn btn-success">Simpan</button>
									<button type="button" class="btn btn-white" data-dismiss="modal">Batal</button>
								</div>
							</div><!-- /.modal-content -->
						</div><!-- /.modal-dialog -->
					</div><!-- /.modal -->		
				</div>
				
				<div class="tab-pane" id="faks">
					<script type="text/javascript">
					jQuery(document).ready(function($)
					{
						$("#example-2").dataTable({
							aLengthMenu: [
								[50, 100, 125, 150, -1], [50, 100, 125, 150, "All"]
							]
						});
					});
					</script>
					<div class="form-group" style="overflow-x: scroll;">
					<table id="example-2" class="table table-striped table-bordered" style="table-layout:fixed;white-space:nowrap;" cellspacing="0" >
						<thead>
							<tr>
								<th class="th" id="th" width="25px">No</th>
								<th class="th" id="th" width="250px">Uraian &#8195;&#8195;&#8195;&#8195;&#8195;&#8195;&#8195;&#8195;&#8195;&#8195;&#8195;</th>
								<th class="th" id="th" width="150px">Nama</th>
								<th class="th" id="th" width="50px">GOL</th>
								<th class="th" id="th" width="250px">Tujuan</th>
								<th class="th" id="th" width="50px">Hari</th>
								<th class="th" id="th" width="100px">Hotel&#8195;&#8195;&#8195;</th>
								<th class="th" id="th" width="150px">Tiket (Lumpsum)</th>
								<th class="th" id="th" width="100px">Taxi&#8195;&#8195;&#8195;</th>
								<th class="th" id="th" width="100px">Uang Harian</th>
								<th class="th" id="th" width="100px">BBM</th>
								<th class="th" id="th" width="100px">Repres&#8195;&#8195;</th>
								<th class="th" id="th" width="100px">Jumlah&#8195;&#8195;&#8195;&#8195;</th>
								<th class="th" id="th" width="50px">PPH</th>
								<th class="th" id="th" width="100px">Potongan&#8195;</th>
								<th class="th" id="th" width="150px">Tiket Perusahaan</th>
								<th class="th" id="th" width="150px">Total&#8195;&#8195;&#8195;&#8195;</th>
								<th class="th" id="th" width="150px">Jumlah diterima</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$i=1;
							foreach ($record1 as $r)
							{
							$tgl_fax= date("Y-m-d", strtotime($r->tgl_fax));
							$tgl_skpd= date("Y-m-d", strtotime($r->tgl_skpd));
							$tiket_brgkt = $r->uang_pesawat_b+$r->uang_kereta_b+$r->uang_travel_b;
							$tiket_pulang = $r->uang_pesawat_p+$r->uang_kereta_p+$r->uang_travel_p;
							?>
							<tr>
								<td class="td"><?php echo $i; ?></td>
								<td class="td">
									<?php echo $r->no_fax."<br/>".tgl_indo($tgl_fax)."<br/>"; ?>
									<?php echo "SKPD No. ".str_pad($r->no_skpd,4, "0", STR_PAD_LEFT).$r->attr_skpd."<br/>".tgl_indo($tgl_skpd); ?>
								</td>
								<td class="td"><?php echo $r->nama_pelaksana; ?></td>
								<td class="td"><?php echo romawi($r->gol); ?></td>
								<td class="td">
									<?php echo $r->tmpt_tujuan; ?>
								</td>							
								<td class="td"><?php echo $r->durasi_tgs; ?> Hari</td>
								<td class="td"><?php echo "Rp. ".number_format($r->uang_hotel, 0,'','.');?></td>
								<td class="td"><?php echo "Rp. ".number_format($tiket_brgkt, 0,'','.');?></td>
								<td class="td"><?php echo "Rp. ".number_format($r->uang_taxi, 0,'','.');?></td>
								<td class="td"><?php echo "Rp. ".number_format($r->uang_harian, 0,'','.');?></td>
								<td class="td"><?php echo "Rp. ".number_format($r->jml_bbm, 0,'','.');?></td>
								<td class="td"><?php echo "Rp. ".number_format($r->uang_repres, 0,'','.');?></td>
								<td class="td"><?php echo "Rp. ".number_format($r->jumlah, 0,'','.');?></td>
								<td class="td"><?php echo $r->pph;?>&#37;</td>
								<td class="td"><?php echo "Rp. ".number_format($r->potongan, 0,'','.');?></td>
								<td class="td"><?php echo "Rp. ".number_format($tiket_pulang, 0,'','.');?></td>
								<td class="td"><?php echo "Rp. ".number_format($r->total, 0,'','.');?></td>
								<td class="td"><?php echo "Rp. ".number_format($r->jumlah_diterima, 0,'','.');?></td>
							</tr>
							<?php $i++;}?>
						</tbody>
					</table>
					</div>
				</div>
				
				<div class="tab-pane" id="export">
					<div class="panel-body">
						<form action="<?php echo site_url('export_xls');?>" method="post">
						<label><b>Export Rekapitulasi Tagihan Pusat dan Akomodasi Hotel</b></label><br/><br/>
						<table border="0">
						<tr>
							<td width="50px"><label>Dari : </label></td>
							<td width="170px"><input class="form-control datepicker" data-format="dd-mm-yyyy" type="text" name="from" autocomplete="off" placeholder="DD/MM/YYYY" value="" style="width:150px;" required/></td>
							<td width="40px"><label>Ke : </label></td>
							<td width="170px"><input class="form-control datepicker" data-format="dd-mm-yyyy" type="text" name="to" autocomplete="off" placeholder="DD/MM/YYYY" value="" style="width:150px;" required/></td>
							<td width="170px"><input class="btn btn-blue btn-sm" type="submit" value="Export Excel" style="margin-top:10px;" name="export_excel"/></td>
						</tr>
						</table>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>