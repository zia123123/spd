<div class="main-content">
	<div class="row">
		<div class="col-sm-6">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Edit Setting</h3>
					<div class="panel-options">
					</div>
				</div>
				<div class="panel-body">
					<form action="<?php echo site_url('setting/edit');?>" role="form" method="post" class="form-horizontal" role="form">
						<div class="form-group">
							<label class="col-sm-4 control-label" for="field-1">BBM Per Hari (Liter)</label>
							<div class="col-sm-4">
								<input type="text" name="harian_bbm" class="form-control" value="<?php echo set_value('harian_bbm', $r['harian_bbm'])?>" placeholder="Liter..." />
								<?php echo "<input type='hidden' name='id_setting' value='$r[id_setting]'>"; ?>
								<?php echo form_error('harian_bbm', '<label class="text-danger">', '</label>'); ?>
							</div>
						</div>
						<div class="form-group-separator"></div>
						<div class="form-group">
							<label class="col-sm-4 control-label" for="field-1">Jumlah Liter BBM per 1 KM</label>
							<div class="col-sm-4">
								<input type="text" name="perkalian_bbm" class="form-control" value="<?php echo set_value('perkalian_bbm', $r['perkalian_bbm'])?>" placeholder="Liter..." />
								<?php echo form_error('perkalian_bbm', '<label class="text-danger">', '</label>'); ?>
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