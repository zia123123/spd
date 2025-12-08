<div class="main-content">
	<div class="row">
		<div class="col-sm-6">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Add Unit Kerja</h3>
					<div class="panel-options">
					</div>
				</div>
				<div class="panel-body">
					<form action="<?php echo site_url('unitkerja/post');?>" role="form" method="post" class="form-horizontal" role="form">
						<div class="form-group">
							<label class="col-sm-3 control-label" for="field-1">Unit Kerja</label>
							<div class="col-sm-7">
								<input type="text" name="unitkerja" class="form-control" value="<?php echo set_value('unitkerja'); ?>" placeholder="Unit Kerja..." />
								<?php echo form_error('unitkerja', '<label class="text-danger">', '</label>'); ?>
							</div>
						</div>
						<div class="form-group-separator"></div>
						<div class="form-group">
							<label class="col-sm-3 control-label">Alamat</label>
							<div class="col-sm-7">
								<input type="text" name="alamat" class="form-control" value="<?php echo set_value('alamat'); ?>" placeholder="Alamat..." />
								<?php echo form_error('alamat', '<label class="text-danger">', '</label>'); ?>
							</div>
						</div>
						<div class="form-group-separator"></div>
						<div class="form-group">
							<label class="col-sm-3 control-label">Jenis Unit Kerja</label>
							<div class="col-sm-7">
								<select name="sts" class="form-control" required>
									<option value="1">PERUM BULOG</option>
									<option value="2">NON PERUM BULOG</option>
								</select>
								<?php echo form_error('sts', '<label class="text-danger">', '</label>'); ?>
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