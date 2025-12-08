<div class="main-content">
	<div class="row">
		<div class="col-sm-6">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Edit Lokasi</h3>
					<div class="panel-options">
					</div>
				</div>
				<div class="panel-body">
					<form action="<?php echo site_url('lokasi/edit');?>" role="form" method="post" class="form-horizontal" role="form">
						<div class="form-group">
							<label class="col-sm-3 control-label" for="field-1">Nama Lokasi</label>
							<div class="col-sm-7">
								<input type="text" name="nama_tempat" class="form-control" value="<?php echo set_value('nama_tempat', $r['nama_tempat'])?>" placeholder="Nama Lokasi..." />
								<?php echo "<input type='hidden' name='id_tempat' value='$r[id_tempat]'>"; ?>
								<?php echo form_error('nama_tempat', '<label class="text-danger">', '</label>'); ?>
							</div>
						</div>
						<div class="form-group-separator"></div>
						<div class="form-group">
							<label class="col-sm-3 control-label" for="field-1">Wilayah</label>
							<div class="col-sm-7">
								<input type="text" name="wilayah" class="form-control" value="<?php echo set_value('wilayah', $r['wilayah'])?>" placeholder="Wilayah..." />
								<?php echo form_error('wilayah', '<label class="text-danger">', '</label>'); ?>
							</div>
						</div>
						<div class="form-group-separator"></div>
						<div class="form-group">
							<label class="col-sm-3 control-label" for="field-1">Titik Koordinat</label>
							<div class="col-sm-7">
								<input type="text" name="titik_koordinat" class="form-control" value="<?php echo set_value('titik_koordinat', $r['latlng'])?>" placeholder="Titik Koordinat..." />
								<?php echo form_error('titik_koordinat', '<label class="text-danger">', '</label>'); ?>
							</div>
						</div>
						<div class="form-group-separator"></div>
						<div class="form-group">
							<label class="col-sm-3 control-label" for="field-1">Alamat</label>
							<div class="col-sm-7">
								<input type="text" name="alamat" class="form-control" value="<?php echo set_value('alamat', $r['alamat'])?>" placeholder="Alamat..." />
								<?php echo form_error('alamat', '<label class="text-danger">', '</label>'); ?>
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