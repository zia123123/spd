<div class="main-content">
	<div class="row">
		<div class="col-sm-6">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Add Akomodasi Tamu</h3>
					<div class="panel-options">
						
					</div>
				</div>
				<div class="panel-body">
					<form action="<?php echo site_url('laporan/post');?>" role="form" method="post" class="form-horizontal" role="form">
						<div class="form-group">
							<label class="col-sm-3 control-label" for="field-1">No SKPD</label>
							<div class="col-sm-3">
								<input type="text" name="no_skpd" class="form-control" value="<?php echo set_value('no_skpd'); ?>" placeholder="No SKPD..." />
								<?php echo form_error('no_skpd', '<label class="text-danger">', '</label>'); ?>
							</div>
							<div class="col-sm-4">
								<input type="text" name="tgl_skpd" class="form-control datepicker" data-format="dd-mm-yyyy" value="<?php echo set_value('tgl_skpd'); ?>" placeholder="Tgl SKPD...">
								<?php echo form_error('tgl_skpd', '<label class="text-danger">', '</label>'); ?>
							</div>
						</div>
						<div class="form-group-separator"></div>
						<div class="form-group">
							<label class="col-sm-3 control-label" for="field-1">Nama</label>
							<div class="col-sm-7">
								<input type="text" name="nama" class="form-control" value="<?php echo set_value('nama'); ?>" placeholder="Nama..." />
								<?php echo form_error('nama', '<label class="text-danger">', '</label>'); ?>
							</div>
						</div>
						<div class="form-group-separator"></div>
						<div class="form-group">
							<label class="col-sm-3 control-label">Golongan / Durasi</label>
							<div class="col-sm-2">
								<input type="text" name="gol" class="form-control" value="<?php echo set_value('gol'); ?>" placeholder="GOL..." />
								<?php echo form_error('gol', '<label class="text-danger">', '</label>'); ?>
							</div>
							<div class="col-sm-5">
								<input type="text" name="durasi" class="form-control" value="<?php echo set_value('durasi'); ?>" placeholder="Durasi (hari)..." />
								<?php echo form_error('durasi', '<label class="text-danger">', '</label>'); ?>
							</div>
						</div>
						<div class="form-group-separator"></div>
						<div class="form-group">
							<label class="col-sm-3 control-label">Tujuan</label>
							<div class="col-sm-7">
								<input type="text" name="tujuan" class="form-control" value="<?php echo set_value('tujuan','Semarang'); ?>" placeholder="Tujuan..." />
								<?php echo form_error('tujuan', '<label class="text-danger">', '</label>'); ?>
							</div>
						</div>
						<div class="form-group-separator"></div>
						<div class="form-group">
							<label class="col-sm-3 control-label">Biaya Hotel</label>
							<div class="col-sm-7">
								<input type="text" name="hotel" class="form-control" value="<?php echo set_value('hotel'); ?>" placeholder="Biaya Hotel (Rp)..." />
								<?php echo form_error('hotel', '<label class="text-danger">', '</label>'); ?>
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