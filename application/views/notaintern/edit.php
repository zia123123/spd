
<script type="text/javascript">
$(document).ready(function(){
	loadjabatan1();
	loadjabatan2(); 
});
</script>
<script type="text/javascript">
function loadjabatan1()
{
     var nama_pegawai=$("#kepada_nama").val();   
      $.ajax({
	url:"<?php echo base_url();?>notaintern/tampilkan_jab1",
	data:"nama_pegawai=" + nama_pegawai ,
	success: function(html)
	{
			document.getElementById("kepada_jab").value=html;
           // $("#jab_pemberi_tgs").html(html);
             //var jab_pemberi_tgs=$("#jab_pemberi_tgs").val();
	}
	});
}
function loadjabatan2()
{
     var nama_pegawai=$("#dari_nama").val();   
      $.ajax({
	url:"<?php echo base_url();?>notaintern/tampilkan_jab1",
	data:"nama_pegawai=" + nama_pegawai ,
	success: function(html)
	{
			document.getElementById("dari_jab").value=html;
           // $("#jab_pemohon_tgs").html(html);
           //  var jab_pemberi_tgs=$("#jab_pemohon_tgs").val();
	}
	});
}
</script>
<script>
$(document).ready(function(){
  $("#kepada_nama").change(function(){
     
        loadjabatan1();
  });
   $("#dari_nama").change(function(){
     
        loadjabatan2();
  });
});
</script> 
<div class="main-content">
	<div class="row">
		<div class="col-sm-10">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title"># Buat Nota Intern</h3>
					<div class="panel-options">
						
					</div>
				</div>
				<div class="panel-body">
					<form action="<?php echo site_url('notaintern/edit');?>" role="form" method="post" class="form-horizontal" role="form">
					<?php echo "<input type='hidden' name='id_ni' value='$r[id_ni]'>"; ?>
						<div class="form-group">
							<label class="col-sm-3 control-label" for="field-1">Nomor/Tgl Nota Intern</label>
							<div class="col-sm-1">
								<input type="text" name="no_ni" class="form-control" value="<?php echo $r['no_ni']; ?>" />
							</div>
							<div class="col-sm-3">
								<input type="text" name="kode_ni" class="form-control" value="<?php echo $r['kode_ni'] ?>" />
							</div>
							<div class="col-sm-4">
								<input type="text" name="tgl_ni" class="form-control datepicker" value="<?php echo $r['tgl_ni']; ?>" data-format="dd-mm-yyyy">
							</div>
						</div>
						<div class="form-group-separator"></div>
						<div class="form-group">
							<label class="col-sm-3 control-label">Kepada</label>
							<div class="col-sm-4">
								<?php echo editcombo('kepada_nama', 'tb_pegawai', '', 'nama_pegawai', 'nama_pegawai','' , array('id'=>'kepada_nama','class'=>'form-control', 'data-placeholder'=>'Pilih Pejabat'),$r['kepada_nama'])?>
	
							</div>
							<div class="col-sm-4">
								<input type="text" name="kepada_jab" id="kepada_jab" class="form-control" value="<?php echo $r['kepada_jab'];?>"/>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-3 control-label">Dari</label>
							<div class="col-sm-4">
								<?php echo editcombo('dari_nama', 'tb_pegawai', '', 'nama_pegawai', 'nama_pegawai', '' , array('id'=>'dari_nama','class'=>'form-control', 'data-placeholder'=>'Pilih Pejabat'),$r['dari_nama'])?>
							</div>
							<div class="col-sm-4">
								<input type="text" name="dari_jab" id="dari_jab" class="form-control" value="<?php echo $r['dari_jab'];?>"/>
							</div>
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
										$("#dari_nama").select2({
											placeholder: 'Pilih Ketua Pelaksana...',
											allowClear: true
										}).on('select2-open', function()
										{
											// Adding Custom Scrollbar
											$(this).data('select2').results.addClass('overflow-hidden').perfectScrollbar();
										});
										$("#kepada_nama").select2({
											placeholder: 'Pilih Kepada...',
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
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label">Perihal</label>
							<div class="col-sm-8">
								<input name="perihal" type="text" required placeholder="Perihal.." value="<?php echo $r['perihal']; ?>" class="form-control"/>								
								<?php echo form_error('perihal', '<label class="text-danger">', '</label>'); ?>
							</div>
						</div>
						<div class="form-group-separator"></div>
						<div class="form-group">
							<label class="col-sm-3 control-label" for="field-1">Dasar NI</label>
							<div class="col-sm-8">
								<?php echo textarea('dasar_ni', 'dasar_ni', 'col-sm-02', 2, set_value('dasar_ni',$r['dasar_ni']),'');?>
								<?php echo form_error('dasar_ni', '<label class="text-danger">', '</label>'); ?>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label" for="field-1">Isi NI</label>
							<div class="col-sm-8">
								<?php echo textarea('isi_ni', 'isi_ni', 'col-sm-02', 4, set_value('isi_ni',$r['isi_ni']),'');?>
								<?php echo form_error('isi_ni', '<label class="text-danger">', '</label>'); ?>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-3 control-label">Nominal</label>
							<div class="col-sm-4">
								<input type="text" required name="nominal" data-mask="fdecimal" data-dec="," data-rad="." value="<?php echo $r['nominal']; ?>" class="form-control"/>
								<?php echo form_error('nominal', '<label class="text-danger">', '</label>'); ?>
							</div>
						</div>
						
						<div class="form-group">
							<label class="control-label col-md-3">Penutup </label>
							<div class="col-md-8">
								<?php echo textarea('closing', '', '', 2, set_value('closing',$r['closing']), '');?>
							</div>
						</div>
						<div class="form-group-separator"></div>
						<div class="form-group">
							<label class="col-sm-3 control-label">Jenis NI</label>
							<div class="col-sm-4">
								<select name="jenis_ni" class="form-control">
									<option value="Biaya Langsung" <?php if($r['jenis_ni']=='Biaya Langsung') echo "selected";;?>>Biaya Langsung</option>
									<option value="Uang Muka" <?php if($r['jenis_ni']=='Uang Muka') echo "selected";;?>>Uang Muka</option>
									<option value="Pertaja" <?php if($r['jenis_ni']=='Pertaja') echo "selected";;?>>Pertaja</option>
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
<script src="<?php echo base_url();?>xenon/tinymce/tinymce.min.js"></script>
  <script>
    tinymce.init({ selector:'#default', });
  </script>
  <script type="text/javascript">
    tinymce.init({
        selector: '#isi_ni',
        height: 400,
        forced_root_block : "",
        force_br_newlines : true,
        force_p_newlines : false,
        plugins: [
          'autolink lists link image charmap print preview hr anchor pagebreak',
          'searchreplace wordcount visualblocks visualchars code fullscreen',
          'insertdatetime media nonbreaking save table contextmenu directionality',
          'emoticons template paste textcolor colorpicker textpattern imagetools codesample toc'
        ],
        toolbar1: 'undo redo | insert | styleselect table | bold italic | hr alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media ',
        toolbar2: 'print preview | forecolor backcolor emoticons | fontselect | fontsizeselect | codesample code fullscreen',
        templates: [
          { title: 'Test template 1', content: '' },
          { title: 'Test template 2', content: '' }
        ],
        content_css: [
          '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
          '//www.tinymce.com/css/codepen.min.css'
        ],
      });

        tinymce.init({
        selector: '#custom2',
        height: 400,
        file_browser_callback_types: 'file image media',
        file_picker_types: 'file image media',
        forced_root_block : "",
        force_br_newlines : true,
        force_p_newlines : false,
        plugins: [
          'autolink lists link image charmap print preview hr anchor pagebreak',
          'searchreplace wordcount visualblocks visualchars code fullscreen',
          'insertdatetime media nonbreaking save table contextmenu directionality',
          'emoticons template paste textcolor colorpicker textpattern imagetools codesample toc'
        ],
        toolbar1: 'undo redo | insert | styleselect table | bold italic | hr alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media ',
        toolbar2: 'print preview | forecolor backcolor emoticons | fontselect | fontsizeselect | codesample code fullscreen',
        templates: [
          { title: 'Test template 1', content: '' },
          { title: 'Test template 2', content: '' }
        ],
        content_css: [
          '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
          '//www.tinymce.com/css/codepen.min.css'
        ],

        images_upload_url: 'uploadtiny.php',
        images_upload_handler: function (blobInfo, success, failure) {
          var xhr, formData;
        
          xhr = new XMLHttpRequest();
          xhr.withCredentials = false;
          xhr.open('POST', 'uploadtiny.php');
        
          xhr.onload = function() {
              var json;
          
              if (xhr.status != 200) {
                  failure('HTTP Error: ' + xhr.status);
                  return;
              }
          
              json = JSON.parse(xhr.responseText);
          
              if (!json || typeof json.location != 'string') {
                  failure('Invalid JSON: ' + xhr.responseText);
                  return;
              }
          
              success(json.location);
          };
        
          formData = new FormData();
          formData.append('file', blobInfo.blob(), blobInfo.filename());
          xhr.send(formData);
      },
      });
  </script>