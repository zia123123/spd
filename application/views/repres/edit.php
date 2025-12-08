<div class="main-content">
	<div class="row">
		<div class="col-sm-6">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Edit</h3>
					<div class="panel-options">
					</div>
				</div>
				<div class="panel-body">
					<form action="<?php echo site_url('repres/edit');?>" role="form" method="post" class="form-horizontal" role="form">
						<div class="form-group">
							<label class="col-sm-4 control-label" for="field-1">Uang Representatif</label>
							<div class="col-sm-4">
								<input type="text" name="u_repres" class="form-control" value="<?php echo set_value('u_repres', $r['u_repres'])?>" data-mask="decimal" placeholder="Rp..." />
								<?php echo "<input type='hidden' name='id_repres' value='$r[id_repres]'>"; ?>
								<?php echo form_error('u_repres', '<label class="text-danger">', '</label>'); ?>
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