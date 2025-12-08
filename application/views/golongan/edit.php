<div class="main-content">
	<div class="row">
		<div class="col-sm-8">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Edit Golongan</h3>
					<div class="panel-options">
					</div>
				</div>
				<div class="panel-body">
					<form action="<?php echo site_url('golongan/edit');?>" role="form" method="post" class="form-horizontal" role="form">
						<div class="form-group">
							<label class="col-sm-3 control-label" for="field-1">Golongan</label>
							<div class="col-sm-4">
								<input type="text" name="gol" class="form-control" readonly value="<?php echo $r['gol']; ?>" data-mask="decimal" placeholder="Golongan" />
								<?php if (isset($msg)) echo '<label class="text-danger">'.$msg.'</label>'; ?>
							</div>
						</div>
						<div class="form-group-separator"></div>
						<div class="form-group">
							<label class="col-sm-3 control-label">Nama Golongan / Klasifikasi</label>
							<div class="col-sm-5">
								<input type="text" name="nama_gol" class="form-control" value="<?php echo set_value('nama_gol', $r['nama_gol'])?>" placeholder="Nama Golongan..." />
								<?php echo "<input type='hidden' name='id_gol' value='$r[id_gol]'>"; ?>
								<?php echo form_error('nama_gol', '<label class="text-danger">', '</label>'); ?>
							</div>
							<div class="col-sm-3">
								<select name="klasifikasi" class="form-control">
									<option value="I" <?php if($r['klasifikasi']=='I'){echo "selected";}?>>I</option>
									<option value="II" <?php if($r['klasifikasi']=='II'){echo "selected";}?>>II</option>
									<option value="III" <?php if($r['klasifikasi']=='III'){echo "selected";}?>>III</option>
									<option value="IV" <?php if($r['klasifikasi']=='IV'){echo "selected";}?>>IV</option>
								</select>
								<?php echo form_error('klasifikasi', '<label class="text-danger">', '</label>'); ?>
							</div>
						</div>
						<div class="form-group-separator"></div>
						<div class="form-group">
							<label class="col-sm-3 control-label" for="field-1">Biaya</label>
							<div class="col-sm-4">
								<input type="text" name="dalam_kota" class="form-control" value="<?php echo set_value('dalam_kota', $r['dalam_kota'])?>" data-mask="decimal" placeholder="Dalam Kota..." />
								<?php echo form_error('dalam_kota', '<label class="text-danger">', '</label>'); ?>
							</div>
							<div class="col-sm-4">
								<input type="text" name="raskin" class="form-control" value="<?php echo set_value('raskin', $r['raskin'])?>" data-mask="decimal" placeholder="Raskin..." />
								<?php echo form_error('raskin', '<label class="text-danger">', '</label>'); ?>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label" for="field-1">&nbsp;</label>
							<div class="col-sm-4">
								<input type="text" name="management_reg" class="form-control" value="<?php echo set_value('management_reg', $r['management_reg'])?>" data-mask="decimal" placeholder="Management..." />
								<?php echo form_error('management_reg', '<label class="text-danger">', '</label>'); ?>
							</div>
							<div class="col-sm-4">
								<input type="text" name="management_diklat" class="form-control" value="<?php echo set_value('management_diklat', $r['management_diklat'])?>" data-mask="decimal" placeholder="Diklat..." />
								<?php echo form_error('management_diklat', '<label class="text-danger">', '</label>'); ?>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label" for="field-1">&nbsp;</label>
							<div class="col-sm-4">
								<input type="text" name="spi" class="form-control" value="<?php echo set_value('spi', $r['spi'])?>" data-mask="decimal" placeholder="SPI..." />
								<?php echo form_error('spi', '<label class="text-danger">', '</label>'); ?>
							</div>
						</div>
						<div class="form-group-separator"></div>
						<div class="form-group">
							<label class="col-sm-3 control-label" for="field-1">Uang Hotel & Taxi</label>
							<div class="col-sm-4">
								<input type="text" name="u_hotel" class="form-control" value="<?php echo set_value('u_hotel', $r['u_hotel'])?>" data-mask="decimal" placeholder="Uang Hotel..." />
								<?php echo form_error('u_hotel', '<label class="text-danger">', '</label>'); ?>
							</div>
							<div class="col-sm-4">
								<input type="text" name="u_taxi" class="form-control" value="<?php echo set_value('u_taxi', $r['u_taxi'])?>" data-mask="decimal" placeholder="Uang Taxi..." />
								<?php echo form_error('u_taxi', '<label class="text-danger">', '</label>'); ?>
							</div>
						</div>
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