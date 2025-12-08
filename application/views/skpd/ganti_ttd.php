<style>
	#s2example-2 select{
		line-height:50px;
	}
</style>
<div class="main-content">
	<div class="row">
		<div class="col-sm-6">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Edit TTD</h3>
					<div class="panel-options">
					</div>
				</div>
				<div class="panel-body">
					<form action="<?php echo site_url('skpd/ganti_ttd');?>" role="form" method="post" class="form-horizontal" role="form">
						<div class="form-group">
							<label class="col-sm-4 control-label" for="field-1">TTD Kabid Minku</label>
							<div class="col-sm-4">
								<script type="text/javascript">
									jQuery(document).ready(function($)
									{
										$("#s2example-1").select2({
											placeholder: 'Pilih Pemeriksa...',
											allowClear: true
										}).on('select2-open', function()
										{
											// Adding Custom Scrollbar
											$(this).data('select2').results.addClass('overflow-hidden').perfectScrollbar();
										});
										
									});
								</script>
								<?php echo editcombofilter('pemeriksa_1', 'tb_pegawai', '', 'nama_pegawai', 'nama_pegawai', '' , array('class'=>'form-control', 'id'=>'s2example-1', 'required'=>'required'), ucwords(strtolower($ttd['pemeriksa_1'])))?>	
								<?php echo "<input type='hidden' name='id_pejabat_ttd' value='$ttd[id_pejabat_ttd]'>"; ?>
							</div>
						</div>
						<div class="form-group-separator"></div>
						<div class="form-group">
							<label class="col-sm-4 control-label" for="field-1">TTD Kasi Keuangan</label>
							<div class="col-sm-4">
								<script type="text/javascript">
									jQuery(document).ready(function($)
									{
										$("#s2example-2").select2({
											placeholder: 'Pilih Pemeriksa...',
											allowClear: true
										}).on('select2-open', function()
										{
											// Adding Custom Scrollbar
											$(this).data('select2').results.addClass('overflow-hidden').perfectScrollbar();
										});
										
									});
								</script>
								<?php echo editcombofilter('pemeriksa_2', 'tb_pegawai', '', 'nama_pegawai', 'nama_pegawai', '' , array('class'=>'form-control', 'id'=>'s2example-2', 'required'=>'required'), ucwords(strtolower($ttd['pemeriksa_2'])))?>								
							</div>
						</div>
						<div class="form-group-separator"></div>
						<div class="form-group">
							<label class="col-sm-4 control-label" for="field-1">TTD Kasi Sekumhum</label>
							<div class="col-sm-4">
								<script type="text/javascript">
									jQuery(document).ready(function($)
									{
										$("#s2example-3").select2({
											placeholder: 'Pilih Pemeriksa...',
											allowClear: true
										}).on('select2-open', function()
										{
											// Adding Custom Scrollbar
											$(this).data('select2').results.addClass('overflow-hidden').perfectScrollbar();
										});
										
									});
								</script>
								<?php echo editcombofilter('pemeriksa_3', 'tb_pegawai', '', 'nama_pegawai', 'nama_pegawai', '' , array('class'=>'form-control', 'id'=>'s2example-3', 'required'=>'required'), ucwords(strtolower($ttd['pemeriksa_3'])))?>								
							</div>
						</div>
						<div class="form-group-separator"></div>
						<div class="form-group">
							<label class="col-sm-4 control-label" for="field-1">TTD Kasi Akuntansi</label>
							<div class="col-sm-4">
								<script type="text/javascript">
									jQuery(document).ready(function($)
									{
										$("#s2example-4").select2({
											placeholder: 'Pilih Pemeriksa...',
											allowClear: true
										}).on('select2-open', function()
										{
											// Adding Custom Scrollbar
											$(this).data('select2').results.addClass('overflow-hidden').perfectScrollbar();
										});
										
									});
								</script>
								<?php echo editcombofilter('pemeriksa_4', 'tb_pegawai', '', 'nama_pegawai', 'nama_pegawai', '' , array('class'=>'form-control', 'id'=>'s2example-4', 'required'=>'required'), ucwords(strtolower($ttd['pemeriksa_4'])))?>								
							</div>
						</div>
						<div class="form-group-separator"></div>
						<div class="form-group">
							<label class="col-sm-4 control-label">&nbsp;</label>
							<div class="col-md-4">
								<input type="submit" name="submit" class="btn btn-success" value="Update"/>
								<?php echo anchor($this->uri->segment(1),'Kembali',array('class'=>'btn btn-white'));?>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>