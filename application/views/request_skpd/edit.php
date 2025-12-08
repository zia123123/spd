<link rel="stylesheet" href="<?php echo base_url()?>assets/select2/select2.min.css">
<script src="<?php echo base_url()?>assets/select2/jQuery-2.1.4.min.js"></script>
<script src="<?php echo base_url()?>assets/select2/select2.full.min.js"></script>

<p> </p>
<div class="push">
    <ol class="breadcrumb">
        <li><i class='fa fa-home'></i> <a href="javascript:void(0)">Home</a></li>
        <li><?php echo anchor($this->uri->segment(1),$title);?></li>
        <li class="active">Edit SPPD</li>
    </ol>
</div>
<script src="<?php echo base_url()?>assets/js/jquery.min.js"> </script>
<script>
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
            $("#jab_pemberi_tgs").html(html);
             var jab_pemberi_tgs=$("#jab_pemberi_tgs").val();
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
            $("#jab_pemohon_tgs").html(html);
             var jab_pemberi_tgs=$("#jab_pemohon_tgs").val();
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
<script>
$(function () {
	$(".select2").select2();
});
</script>
<?php
echo form_open($this->uri->segment(1).'/edit');
echo "<input type='hidden' name='id_sppd' value='$r[id_sppd]'>";
$class="class='form-control'";
?>
<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Edit SPPD</h3>
	</div>
	<div class="panel-body">
		<table class="table">
		<tr>
			<td>Pemberi Tugas (Jabatan)</td>
			<td>
				<div class="col-sm-5">
					<?php echo editcombo('pemberi_tgs', 'tb_pegawai', '', 'nama_pegawai', 'nama_pegawai', array('sts_pejabat'=>'1') , array('id'=>'pemberi_tgs'),$r['pemberi_tgs'])?>
				</div>
				<div class="col-sm-5">
					<?php echo combodumy('jab_pemberi_tgs', 'jab_pemberi_tgs')?>
				</div>
			</td>
		</tr>
		<tr>
			<td>Pemohon Tugas (Jabatan)</td>
			<td>
				<div class="col-sm-5">
					<?php echo editcombo('pemohon_tgs', 'tb_pegawai', '', 'nama_pegawai', 'nama_pegawai', array('sts_pejabat'=>'1') , array('id'=>'pemohon_tgs'),$r['pemohon_tgs'])?>
				</div>
				<div class="col-sm-5">
					<?php echo combodumy('jab_pemohon_tgs', 'jab_pemohon_tgs')?>
				</div>
			</td>
		</tr>
		<tr>
			<td>Ketua Pelaksana</td>
			<td>
				<div class="col-sm-5">
					<?php echo editcombofilter('ketua_plk', 'tb_pegawai', '', 'nama_pegawai', 'noreg', '' , array('class'=>'select2'), $ketua_plk['noreg'])?>
				</div>
			</td>
		</tr>
		<tr>
			<td>Pelaksana Tugas</td>
			<td>
				<div class="col-sm-5">
					<select name="plk_tgs[]" class="select2" multiple="multiple" style="width: 500px;">
						<?php
							$selectnoreg = explode(',',$pelaksana['noreg']);
							foreach($pegawai as $peg){
						?>
							<option value="<?php echo $peg->noreg; ?>" <?php if(in_array($peg->noreg,$selectnoreg)) echo ' selected="selected"';?>><?php echo $peg->nama_pegawai; ?></option>
						<?php		
							}
						?>
					</select>
				</div>
			</td>
		</tr>
		<tr>
			<td>Dari / Tujuan</td>
			<td>
				<div class="col-md-3">
					<?php echo form_dropdown('tmpt_keberangkatan',array('semarang'=>'Semarang'),$r['tmpt_keberangkatan'],"class='SlectBox'");?>
				</div>
				<div class="col-md-3" style="margin-left:100px">
					<select name="tmpt_tujuan[]" class="select2" multiple="multiple" style="width: 500px;">
						<?php
							$selectlokasi = explode(',',$lokasi['tempat_tujuan']);
							foreach($tempat as $tmpt){
						?>
							<option value="<?php echo $tmpt->nama_tempat; ?>" <?php if(in_array($tmpt->nama_tempat,$selectlokasi)) echo ' selected="selected"';?>><?php echo $tmpt->nama_tempat; ?></option>
						<?php		
							}
						?>
					</select>
				</div>
			</td>
		</tr>
		<tr>
			<td>Tugas</td>
			<td>
				<?php echo inputan('text', 'tgl_tugas','col-sm-5','Tanggal Tugas ..', 0, $r['tgl_keberangkatan']." - ".$r['tgl_kepulangan'],array('id'=>'reservation'));?>
				<?php echo inputan('text', 'tugas','col-sm-4','Tugas ..', 3, $r['tugas'],'');?>
			</td>
		</tr>
		
		<tr>
			<td>Keterangan</td>
			<td> 
				<div class="col-sm-5">
				<?php echo textarea('ket', '', 'col-sm-02', 2, $r['ket']);?>
				</div>
			</td>
		</tr>
		<tr>
			<td></td>
			<td> 
				<div class="col-sm-3">
					<input type="submit" name="submit" value="Simpan" class="btn btn-danger  btn-sm" />
					<?php echo anchor($this->uri->segment(1),'Kembali',array('class'=>'btn btn-danger btn-sm'));?>
				</div>
			</td>
		</tr>
	</table>
	</div>
</div>
</form>