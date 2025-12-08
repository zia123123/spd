<div class="main-content">
	<div class="row">
		<div class="col-sm-6">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Ganti Password</h3>
					<div class="panel-options">
					</div>
				</div>
				<div class="panel-body">
					<form action="<?php echo site_url('users/change_pass');?>" role="form" method="post" class="form-horizontal" role="form">
						<div class="form-group">
							<label class="col-sm-4 control-label" for="field-1">Password Sekarang</label>
							<div class="col-sm-7">
								<input type="password" name="current_pass" class="form-control"/>
								<?php echo form_error('current_pass', '<label class="text-danger">', '</label>'); ?>
							</div>
						</div>
						<div class="form-group-separator"></div>
						<div class="form-group">
							<label class="col-sm-4 control-label">Password Baru</label>
							<div class="col-sm-7">
								<input type="password" name="new_pass" class="form-control"/>
								<?php echo form_error('new_pass', '<label class="text-danger">', '</label>'); ?>
							</div>
						</div>
						<div class="form-group-separator"></div>
						<div class="form-group">
							<label class="col-sm-4 control-label">Ulangi Password Baru</label>
							<div class="col-sm-7">
								<input type="password" name="confirm_pass" class="form-control"/>
								<?php echo form_error('confirm_pass', '<label class="text-danger">', '</label>'); ?>
							</div>
						</div>
						<div class="form-group-separator"></div>
						<div class="form-group">
							<label class="col-sm-4 control-label">&nbsp;</label>
							<div class="col-md-6">
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