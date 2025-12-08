<div class="main-content">
	<div class="row">
		<div class="col-sm-6">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Add Pengikut</h3>
					<div class="panel-options">
					</div>
				</div>
				<div class="panel-body">
					<form action="<?php echo site_url('pengikut/post');?>" role="form" method="post" class="form-horizontal" role="form">
						<div class="form-group">
							<label class="col-sm-3 control-label" for="field-1">Nama Pengikut</label>
							<div class="col-sm-7">
								<input type="text" name="nama_pengikut" class="form-control" value="<?php echo set_value('nama_pengikut'); ?>" placeholder="Nama Pengikut..." />
								<?php echo form_error('nama_pengikut', '<label class="text-danger">', '</label>'); ?>
							</div>
						</div>
						<div class="form-group-separator"></div>
						<div class="form-group">
							<label class="col-sm-3 control-label">Golongan / Jenjang</label>
							<div class="col-sm-8">
								<div class="col-sm-4">
									<?php echo buatcombo('golongan','tb_gol','','gol','gol','gol != "0"',''); ?>
									<?php echo form_error('golongan', '<label class="text-danger">', '</label>'); ?>
								</div>
								
								<div class="col-sm-6">
									<?php echo buatcombo('jenjang','tb_golongan','','jenjang','jenjang','jenjang != "0"',''); ?>
									<?php echo form_error('jenjang', '<label class="text-danger">', '</label>'); ?>
								</div>
							</div>
						</div>
						<div class="form-group-separator"></div>
						<div class="form-group">
							<label class="col-sm-3 control-label" for="field-1">Instansi</label>
							<div class="col-sm-7">
								<input type="text" name="instansi" class="form-control" value="<?php echo set_value('instansi'); ?>" placeholder="Instansi..." />
								<?php echo form_error('instansi', '<label class="text-danger">', '</label>'); ?>
							</div>
						</div>
						<div class="form-group-separator"></div>
						<div class="form-group">
							<label class="col-sm-3 control-label">Unit Kerja / Pajak</label>
							<div class="col-sm-3">
								<?php echo buatcombo('unitkerja','tb_unitkerja','','unitkerja','unitkerja','',''); ?>
							</div>
							<div class="col-sm-4">
								<input type="text" name="pajak" class="form-control" value="<?php echo set_value('pajak'); ?>" data-mask="decimal" maxlength="2" placeholder="Pajak (%)..." />
								<?php echo form_error('pajak', '<label class="text-danger">', '</label>'); ?>
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