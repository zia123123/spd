<link rel="stylesheet" href="<?php echo base_url()?>assets/select2/select2.min.css">
<script src="<?php echo base_url()?>assets/select2/jQuery-2.1.4.min.js"></script>
<script src="<?php echo base_url()?>assets/select2/select2.full.min.js"></script>

<p> </p>
<div class="push">
    <ol class="breadcrumb">
        <li><i class='fa fa-home'></i> <a href="javascript:void(0)">Home</a></li>
        <li><?php echo anchor($this->uri->segment(1),$title);?></li>
        <li class="active">Buat SPPD</li>
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
echo $this->session->flashdata('pesan');
echo form_open_multipart($this->uri->segment(1).'/post');
if($this->session->userdata('level')==1)
{
    $param="";
}
else
{
   // $param=array('prodi_id'=>$this->session->userdata('keterangan'));
}
?>
<div class="row">
	<div class="col-md-12 clearfix">
	<ul id="example-tabs" class="nav nav-tabs" data-toggle="tabs">
		
	</ul>

<div class="tab-content">
<div class="tab-pane active" id="biodata">
	<table class="table">
		<tr class="default">
			<th colspan="2">Buat SPPD</th>
		</tr>
		<tr>
			<td>Pemberi Tugas (Jabatan)</td>
			<td>
				<div class="col-sm-5">
					<?php echo buatcombo('pemberi_tgs', 'tb_pegawai', '', 'nama_pegawai', 'nama_pegawai', array('sts_pejabat'=>'1') , array('id'=>'pemberi_tgs'))?>
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
					<?php echo buatcombo('pemohon_tgs', 'tb_pegawai', '', 'nama_pegawai', 'nama_pegawai', array('sts_pejabat'=>'1') , array('id'=>'pemohon_tgs'))?>
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
					<?php echo buatcombofilter('ketua_plk', 'tb_pegawai', '', 'nama_pegawai', 'noreg', '' , array('class'=>'select2', 'data-placeholder'=>'Pilih Pelaksana'))?>
				</div>
			</td>
		</tr>
		<tr>
			<td>Pelaksana Tugas</td>
			<td>
				<div class="col-sm-5">
				 
					<?php echo buatmultiplecombo('plk_tgs[]','tb_pegawai','','nama_pegawai','noreg','',array('class'=>'select2','multiple'=>'multiple','data-placeholder'=>'Pilih Pelaksana')); ?>
				</div>
			</td>
		</tr>
		<tr>
			<td>Dari / Tujuan</td>
			<td>
				<div class="col-md-3">
					<?php echo form_dropdown('tmpt_keberangkatan',array('semarang'=>'Semarang'),'',"class='SlectBox'");?>
				</div>
				<div class="col-md-3" style="margin-left:100px">
					<?php echo buatmultiplecombo('tmpt_tujuan[]','tb_tempat','','nama_tempat','nama_tempat','',array('class'=>'select2','multiple'=>'multiple','data-placeholder'=>'Pilih Tujuan')); ?>
				</div>
			</td>
		</tr>
		<tr>
			<td>Tugas</td>
			<td>
				<?php echo inputan('text', 'tgl_tugas','col-sm-5','Tanggal Tugas ..', 0, '',array('id'=>'reservation'));?>
				<?php echo inputan('text', 'tugas','col-sm-4','Tugas ..', 3, '','');?>
			</td>
		</tr>
		
		<tr>
			<td>Keterangan</td>
			<td> 
				<div class="col-sm-5">
				<?php echo textarea('ket', '', 'col-sm-02', 2, '');?>
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
</div>    
</form>
