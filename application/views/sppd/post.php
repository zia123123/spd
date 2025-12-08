
<script type="text/javascript">
$(document).ready(function(){
	loadjabatan1();
	loadjabatan2(); 
});
</script>
<script type="text/javascript">
function loadjabatan1()
{
     var nama_pegawai=$("#pemberi_tgs").val();   
      $.ajax({
	url:"<?php echo base_url();?>sppd/tampilkan_jab1",
	data:"nama_pegawai=" + nama_pegawai ,
	success: function(html)
	{
			document.getElementById("jab_pemberi_tgs").value=html;
           // $("#jab_pemberi_tgs").html(html);
             //var jab_pemberi_tgs=$("#jab_pemberi_tgs").val();
	}
	});
}
function loadjabatan2()
{
     var nama_pegawai=$("#pemohon_tgs").val();   
      $.ajax({
	url:"<?php echo base_url();?>sppd/tampilkan_jab1",
	data:"nama_pegawai=" + nama_pegawai ,
	success: function(html)
	{
			document.getElementById("jab_pemohon_tgs").value=html;
           // $("#jab_pemohon_tgs").html(html);
           //  var jab_pemberi_tgs=$("#jab_pemohon_tgs").val();
	}
	});
}
</script>
<script>
$(document).ready(function(){
  $("#pemberi_tgs").change(function(){
     
        loadjabatan1();
  });
   $("#pemohon_tgs").change(function(){
     
        loadjabatan2();
  });
});
</script> 
<div class="main-content">
	<div class="row">
		<div class="col-sm-10">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title"># Buat SPPD</h3>
					<div class="panel-options">
						
					</div>
				</div>
				<div class="panel-body">
					<form action="<?php echo site_url('sppd/post');?>" role="form" method="post" class="form-horizontal" role="form">
						<div class="form-group">
							<label class="col-sm-3 control-label" for="field-1">No / Tgl Fax (Khusus Pusat)</label>
							<div class="col-sm-4">
								<input type="text" name="no_fax" class="form-control" value="<?php echo set_value('no_fax'); ?>" placeholder="Khusus No Fax Pusat .." />
							</div>
							<div class="col-sm-4">
								<input type="text" name="tgl_fax" class="form-control datepicker" placeholder="Khusus Tanggal Fax Pusat" value="<?php echo set_value('tgl_fax'); ?>" data-format="dd-mm-yyyy">
							</div>
						</div>
						<div class="form-group-separator"></div>
						<div class="form-group">
							<label class="col-sm-3 control-label" for="field-1">Dasar SPPD</label>
							<div class="col-sm-8">
								<?php echo textarea('dasar', 'dasar', 'col-sm-02', 4, set_value('dasar','Bersama ini mohon agar nama/nama-nama berikut ini diperintahkan melaksanakan Perjalanan Dinas dengan rincian sebagai berikut :'),'');?>
								<?php echo form_error('dasar', '<label class="text-danger">', '</label>'); ?>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label">Pemberi Tugas (Jabatan)</label>
							<div class="col-sm-4">
								<?php echo buatcombofilter('pemberi_tgs', 'tb_pegawai', '', 'nama_pegawai', 'nama_pegawai', array('sts_pejabat'=>'1') , array('id'=>'pemberi_tgs','data-placeholder'=>'Pilih Pemberi Tugas'))?>
							</div>
							<div class="col-sm-4">
								<input type="text" name="jab_pemberi_tgs" id="jab_pemberi_tgs" class="form-control"/>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-3 control-label">Pemohon Tugas (Jabatan)</label>
							<div class="col-sm-4">
								<?php echo buatcombofilter('pemohon_tgs', 'tb_pegawai', '', 'nama_pegawai', 'nama_pegawai', array('sts_pejabat'=>'1') , array('id'=>'pemohon_tgs','data-placeholder'=>'Pilih Pemohon Tugas'))?>
							</div>
							<div class="col-sm-4">
								<input type="text" name="jab_pemohon_tgs" id="jab_pemohon_tgs" class="form-control"/>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label" for="field-1">Ketua Pelaksana </label>
							<div class="col-sm-4">
								<script type="text/javascript">
									jQuery(document).ready(function($)
									{
										$("#s2example-1").select2({
											placeholder: 'Pilih Ketua Pelaksana...',
											allowClear: true
										}).on('select2-open', function()
										{
											// Adding Custom Scrollbar
											$(this).data('select2').results.addClass('overflow-hidden').perfectScrollbar();
										});
										$("#pemberi_tgs").select2({
											placeholder: 'Pilih Ketua Pelaksana...',
											allowClear: true
										}).on('select2-open', function()
										{
											// Adding Custom Scrollbar
											$(this).data('select2').results.addClass('overflow-hidden').perfectScrollbar();
										});
										$("#pemohon_tgs").select2({
											placeholder: 'Pilih Ketua Pelaksana...',
											allowClear: true
										}).on('select2-open', function()
										{
											// Adding Custom Scrollbar
											$(this).data('select2').results.addClass('overflow-hidden').perfectScrollbar();
										});
										
										$("#form-control").select2({
											placeholder: 'Pilih Pelaksana...',
											
										}).on('select2-open', function()
										{
											// Adding Custom Scrollbar
											$(this).data('select2').results.addClass('overflow-hidden').perfectScrollbar();
										});
										
										$("#form-control1").select2({
											placeholder: 'Pilih Pelaksana...',
											
										}).on('select2-open', function()
										{
											// Adding Custom Scrollbar
											$(this).data('select2').results.addClass('overflow-hidden').perfectScrollbar();
										});
									});
								</script>
								<?php echo buatcombofilter('ketua_plk', 'tb_pegawai', '', 'nama_pegawai', 'noreg', '' , array('class'=>'form-control', 'id'=>'s2example-1', 'data-placeholder'=>'Pilih Ketua Pelaksana'))?>
								<?php echo form_error('ketua_plk', '<label class="text-danger">', '</label>'); ?>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label" for="field-1">Pelaksana Tugas</label>
							<div class="col-sm-4">
									
								
								<script>
								 $(document).ready(function(){
								 var cnt = 2;
								 $("#anc_add").click(function(){
								 $('#tbl1 tr').last().after('<tr><td><select name="plk_tgs[]" id="form-control'+cnt+'" class="form-control">'+
								 '<option value="" selected>Pilih Pelaksana Tugas</option><?php foreach ($pegawai as $row){ ?><option value="<?php echo $row->noreg; ?>">'+
								 '<?php echo str_replace("'","",$row->nama_pegawai); ?></option><?php } ?></select><br/><br/></td></tr>');
								 
								 $("#form-control"+cnt).select2({
									placeholder: 'Pilih Pelaksana...',
									
								}).on('select2-open', function()
								{
									// Adding Custom Scrollbar
									$(this).data('select2').results.addClass('overflow-hidden').perfectScrollbar();
								});
								cnt++;
								 });
								
								$("#anc_rem").click(function(){
								if($('#tbl1 tr').size()>1){
								 $('#tbl1 tr:last-child').remove();
								 }else{
								 alert('Cant remove first select');
								 }
								 });

								});
								 </script>
								
								
								<a href="javascript:void(0);" class="btn btn-sm btn-white" id="anc_add" title="Tambah Pelaksana Tugas"><i class="fa fa-plus"></i> Tambah</a>
								<a href='javascript:void(0);' class="btn btn-sm btn-white" id='anc_rem'><i class="fa fa-times"></i> Hapus</a>

								<table id="tbl1" border="0">
									<tr>
										<td>
											<select name="plk_tgs[]" id="form-control1" class="form-control" style="width:300px;">
												<option value="" selected>Pilih Pelaksana Tugas</option>
												<?php foreach ($pegawai as $row){?>
													<option value="<?php echo $row->noreg;?>"><?php echo $row->nama_pegawai;?></option>
												<?php } ?>
											</select><br/><br/>
										</td>
									</tr>
								</table>
								
								<?php if (isset($message)) echo '<label class="text-danger" style="font-size:10pt">'.$message.'</label>'; ?>
							</div>
							
						</div>
						
						<div class="form-group-separator"></div>
						<div class="form-group">
							<label class="col-sm-3 control-label">Dari</label>
							<div class="col-sm-4">
								<!--
								<select name="tmpt_keberangkatan" class="form-control">
									<option value="semarang">Semarang</option>
								</select>
								-->
								<input type="text" name="tmpt_keberangkatan" class="form-control" value="Bandung"/>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label">Angkutan</label>
							<div class="col-sm-4">
								<input type="text" name="angkutan" class="form-control" value="Kendaraan Dinas"/>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label">Tujuan</label>
							<div class="col-sm-8">
								<input name="tmpt_tujuan" type="text" placeholder="Tujuan.." value="<?php echo set_value('tmpt_tujuan'); ?>" class="form-control"/>								
								<?php echo form_error('tmpt_tujuan', '<label class="text-danger">', '</label>'); ?>
							</div>
						</div>
						<div class="form-group-separator"></div>
						<div class="form-group">
							<label class="control-label col-md-3">Tanggal Tugas</label>
							<div class="col-md-4">
								<input type="text" name="tgl_tugas" placeholder="Tanggal Tugas.." value="<?php echo set_value('tgl_tugas'); ?>"id="field-1" class="form-control daterange" />
								<?php echo form_error('tgl_tugas', '<label class="text-danger">', '</label>'); ?>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">Tugas </label>
							<div class="col-md-8">
								<?php echo inputan('text', 'tugas','','Tugas ..', 0, set_value('tugas'),'');?>
								<?php echo form_error('tugas', '<label class="text-danger">', '</label>'); ?>
							</div>
						</div>
						<div class="form-group-separator"></div>
						<div class="form-group">
							<label class="control-label col-md-3">Keterangan </label>
							<div class="col-md-8">
								<?php echo textarea('ket', '', '', 2, set_value('ket'), '');?>
							</div>
						</div>
						<div class="form-group-separator"></div>
						<div class="form-group">
							<label class="control-label col-md-3">Tanggal SPPD </label>
							<div class="col-md-4">
								<input type="text" name="tgl_sppd" class="form-control datepicker" placeholder="DD-MM-YYYY" value="<?php echo set_value('tgl_sppd'); ?>" data-format="dd-mm-yyyy">
							</div>
						</div>
						<div class="form-group-separator"></div>
						<div class="form-group">
							<label class="col-sm-3 control-label">Jenis Plafond</label>
							<div class="col-sm-4">
								<select name="jenis_plafond" class="form-control">
									<option value="plafond">Plafond (By. Manajemen)</option>
									<option value="non_plafond">Non Plafond (By. Pusat)</option>
									<option value="bop_pengadaan">BOP Pengadaan</option>
									<option value="lainlain">Lain-lain (By. BOP SPI/Monitoring Kualitas/Bantuan Pangan/Mgt.Komersial)</option>
								</select>
							</div>
						</div>
						<div class="form-group-separator"></div>
						<div class="form-group">
							<label class="col-sm-3 control-label">&nbsp;</label>
							<div class="col-md-6">
								<input type="submit" name="submit" class="btn btn-success" value="Simpan"/>
								<?php echo anchor($this->uri->segment(1),'Kembali',array('class'=>'btn btn-white'));?>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
