
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
					<h3 class="panel-title"># Edit SPPD</h3>
					<div class="panel-options">
					</div>
				</div>
				<div class="panel-body">
					<form action="<?php echo site_url('sppd/edit');?>" role="form" method="post" class="form-horizontal" role="form">
					<?php echo "<input type='hidden' name='id_sppd' value='$r[id_sppd]'>"; ?>
						<div class="form-group">
							<label class="col-sm-3 control-label" for="field-1">No / Tgl Fax (Khusus Pusat)</label>
							<div class="col-sm-4">
								<input type="text" name="no_fax" class="form-control" value="<?php echo set_value('no_fax',$r['no_fax']); ?>" placeholder="Khusus No Fax Pusat .." />
							</div>
							<div class="col-sm-4">
								<input type="text" name="tgl_fax" class="form-control datepicker" placeholder="Khusus Tanggal Fax Pusat" value="<?php echo set_value('tgl_fax',$r['tgl_fax']); ?>" data-format="dd-mm-yyyy">
							</div>
						</div>
						<div class="form-group-separator"></div>
						<div class="form-group">
							<label class="col-sm-3 control-label" for="field-1">Dasar SPPD</label>
							<div class="col-sm-8">
								<?php echo textarea('dasar', 'dasar', 'col-sm-02', 4, set_value('dasar',$r['dasar_sppd']),'');?>
								<?php echo form_error('dasar', '<label class="text-danger">', '</label>'); ?>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label">Pemberi Tugas (Jabatan)</label>
							<div class="col-sm-4">
								<?php echo editcombo('pemberi_tgs', 'tb_pegawai', '', 'nama_pegawai', 'nama_pegawai', array('sts_pejabat'=>'1') , array('id'=>'pemberi_tgs'),$r['pemberi_tgs'])?>
							</div>
							<div class="col-sm-4">
								<input type="text" name="jab_pemberi_tgs" id="jab_pemberi_tgs" class="form-control" value="<?php echo $r['jab_pemberi_tgs'];?>"/>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-3 control-label">Pemohon Tugas (Jabatan)</label>
							<div class="col-sm-4">
								<?php echo editcombo('pemohon_tgs', 'tb_pegawai', '', 'nama_pegawai', 'nama_pegawai', array('sts_pejabat'=>'1') , array('id'=>'pemohon_tgs'),$r['pemohon_tgs'])?>
							</div>
							<div class="col-sm-4">
								<input type="text" name="jab_pemohon_tgs" id="jab_pemohon_tgs" class="form-control" value="<?php echo $r['jab_pemohon_tgs'];?>"/>
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
										
									});
								</script>
								<?php echo editcombofilter('ketua_plk', 'tb_pegawai', '', 'nama_pegawai', 'noreg', '' , array('class'=>'form-control', 'id'=>'s2example-1', 'data-placeholder'=>'Pilih Ketua Pelaksana', 'required'=>'required'), $ketua_plk['noreg'])?>
								<?php echo form_error('ketua_plk', '<label class="text-danger">', '</label>'); ?>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label" for="field-1">&nbsp;</label>
							<div class="col-sm-4">
								<table  class="table" id="tbPlk">
								<tr class="tr-header">
									<th style="color:#000;">Pelaksana Tugas</th>
									<th>
										<a href="javascript:void(0);" class="btn btn-xs default" id="addPlk" title="Tambah Pelaksana Tugas"><i class="fa fa-plus"></i></a>
									</th>
								<?php 
									if($plk_selected!=NULL){
										foreach ($plk_selected as $row){
									?>
									<tr>
										<td>
											<select name="plk_tgs[]" class="form-control">
												<option value="" selected>Pilih Pelaksana Tugas</option>
												<?php foreach($pegawai as $peg)	{ ?>
												<option value="<?php echo $peg->noreg;?>" <?php if ($peg->noreg==$row->noreg) echo "selected";?>><?php echo $peg->nama_pegawai;?></option>
												<?php } ?>
											</select>
										</td>
										<td>
											<a href='javascript:void(0);' class="btn btn-xs red" id='rmvPlk'><i class="fa fa-times"></i></a>
										</td>
									</tr>
									<?php 
										}
									} else {
									?>
									<tr>
										<td>
											<select name="plk_tgs[]" class="form-control">
												<option value="" selected>Pilih Pelaksana Tugas</option>
												<?php foreach ($pegawai as $row){?>
													<option value="<?php echo $row->noreg;?>"><?php echo $row->nama_pegawai;?></option>
												<?php } ?>
											</select>
										</td>
										<td>
											<a href='javascript:void(0);' class="btn btn-xs red" id='remove'>x</a>
										</td>
									</tr>
									<?php
									}	
									?>
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
									<option value="<?php echo $r['tmpt_keberangkatan'];?>"><?php echo ucwords($r['tmpt_keberangkatan']);?></option>
								</select>
								-->
								<input type="text" name="tmpt_keberangkatan" class="form-control" value="<?php echo $r['tmpt_keberangkatan'];?>"/>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label">Angkutan</label>
							<div class="col-sm-4">
								<input type="text" name="angkutan" class="form-control" value="<?php echo $r['angkutan'];?>"/>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label">Tujuan</label>
							<div class="col-sm-8">
								<input name="tmpt_tujuan" type="text" value="<?php echo set_value('tmpt_tujuan',$r['tmpt_tujuan']); ?>" class="form-control"/>								
								<?php echo form_error('tmpt_tujuan', '<label class="text-danger">', '</label>'); ?>
							</div>
						</div>
						<div class="form-group-separator"></div>
						<div class="form-group">
							<label class="control-label col-md-3">Tanggal</label>
							<div class="col-md-4">
								<input type="text" name="tgl_tugas" value="<?php echo set_value('tgl_tugas',$r['tgl_keberangkatan']." - ".$r['tgl_kepulangan']); ?>"id="field-1" class="form-control daterange" />
								<?php echo form_error('tgl_tugas', '<label class="text-danger">', '</label>'); ?>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">Tugas</label>
							<div class="col-md-8">
								<?php echo inputan('text', 'tugas','','Tugas ..', 0, set_value('tugas',$r['tugas']),'');?>
								<?php echo form_error('tugas', '<label class="text-danger">', '</label>'); ?>
							</div>
						</div>
						<div class="form-group-separator"></div>
						<div class="form-group">
							<label class="control-label col-md-3">Keterangan </label>
							<div class="col-md-8">
								<?php echo textarea('ket', '', '', 2, set_value('ket',$r['ket']), '');?>
							</div>
						</div>
						<div class="form-group-separator"></div>
						<div class="form-group">
							<label class="control-label col-md-3">Tanggal SPPD </label>
							<div class="col-md-4">
								<input type="text" name="tgl_sppd" class="form-control datepicker" value="<?php echo set_value('tgl_sppd',substr($r['tgl_sppd'],0,10)); ?>" data-format="dd-mm-yyyy" required>
							</div>
						</div>
						<div class="form-group-separator"></div>
						<div class="form-group">
							<label class="col-sm-3 control-label">Jenis Plafond</label>
							<div class="col-sm-4">
								<select name="jenis_plafond" class="form-control">
									<option value="plafond" <?php if($r['jenis_plafond']=='plafond') echo "selected";;?>>Plafond (By. Manajemen)</option>
									<option value="non_plafond" <?php if($r['jenis_plafond']=='non_plafond') echo "selected";;?>>Non Plafond (By. Pusat)</option>
									<option value="lainlain" <?php if($r['jenis_plafond']=='lainlain') echo "selected";;?>>Lain-lain (By. BOP SPI/Monitoring Kualitas/Bantuan Pangan/Mgt.Komersial)</option>
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
<script>
$(function(){
    $('#addPlk').on('click', function() {
              var data = $("#tbPlk tr:eq(1)").clone(true).appendTo("#tbPlk");
              data.find("input").val('');
     });
     $(document).on('click', '#rmvPlk', function() {
         var trIndex = $(this).closest("tr").index();
            if(trIndex>1) {
             $(this).closest("tr").remove();
           } else {
             alert("Sorry!! Can't remove first row!");
           }
      });
	 $('#addLokasi').on('click', function() {
              var data = $("#tbLokasi tr:eq(1)").clone(true).appendTo("#tbLokasi");
              data.find("input").val('');
     });
    $(document).on('click', '#rmvLokasi', function() {
         var trIndex = $(this).closest("tr").index();
            if(trIndex>1) {
             $(this).closest("tr").remove();
           } else {
             alert("Sorry!! Can't remove first row!");
           }
    });
});      
</script>