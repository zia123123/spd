<div class="main-content">
	<div class="row">
		<div class="col-sm-6">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Edit BBM</h3>
					<div class="panel-options">
					</div>
				</div>
				<div class="panel-body">
					<form action="<?php echo site_url('bahanbakar/edit');?>" role="form" method="post" class="form-horizontal" role="form">
						<div class="form-group">
							<label class="col-sm-3 control-label" for="field-1">Jenis BBM</label>
							<div class="col-sm-7">
								<input type="text" name="jenis_bbm" class="form-control" value="<?php echo set_value('jenis_bbm', $r['jenis_bbm'])?>" placeholder="Jenis BBM..." />
								<?php echo "<input type='hidden' name='id_bbm' value='$r[id_bbm]'>"; ?>
								<?php echo form_error('jenis_bbm', '<label class="text-danger">', '</label>'); ?>
							</div>
						</div>
						<div class="form-group-separator"></div>
						<div class="form-group">
							<label class="col-sm-3 control-label">Harga Per Liter</label>
							<div class="col-sm-7">
								<input type="text" name="perliter" class="form-control" value="<?php echo set_value('perliter', $r['perliter'])?>" data-mask="decimal" maxlength="15" placeholder="Liter (Rp)..." />
								<?php echo form_error('perliter', '<label class="text-danger">', '</label>'); ?>
							</div>
						</div>
						<div class="form-group-separator"></div>
						<div class="form-group">
							<label class="col-sm-3 control-label">&nbsp;</label>
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