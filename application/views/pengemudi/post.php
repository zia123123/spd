<div class="main-content">
	<div class="row">
		<div class="col-sm-6">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Add Pengemudi</h3>
					<div class="panel-options">
					</div>
				</div>
				<div class="panel-body">
					<form action="<?php echo site_url('pengemudi/post');?>" role="form" method="post" class="form-horizontal" role="form">
						<div class="form-group">
							<label class="col-sm-3 control-label" for="field-1">Nama Pengemudi</label>
							<div class="col-sm-7">
								<input type="text" name="nama_pengemudi" class="form-control" value="<?php echo set_value('nama_pengemudi'); ?>" placeholder="Nama Pengemudi..." />
								<?php echo form_error('nama_pengemudi', '<label class="text-danger">', '</label>'); ?>
							</div>
						</div>
						<div class="form-group-separator"></div>
						<div class="form-group">
							<label class="col-sm-3 control-label" for="field-1">Jabatan</label>
							<div class="col-sm-7">
								<input type="text" name="jabatan" class="form-control" value="<?php echo set_value('jabatan','Pengemudi'); ?>" placeholder="Jabatan..." />
								<?php echo form_error('jabatan', '<label class="text-danger">', '</label>'); ?>
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