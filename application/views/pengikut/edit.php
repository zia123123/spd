<div class="main-content">
	<div class="row">
		<div class="col-sm-6">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Edit Pengikut</h3>
					<div class="panel-options">
					</div>
				</div>
				<div class="panel-body">
					<form action="<?php echo site_url('pengikut/edit');?>" role="form" method="post" class="form-horizontal" role="form">
						<div class="form-group">
							<label class="col-sm-3 control-label" for="field-1">Nama Pengikut</label>
							<div class="col-sm-7">
								<input type="text" name="nama_pengikut" class="form-control" value="<?php echo set_value('nama_pengikut', $r['nama_pegawai'])?>" placeholder="Nama Pengikut..." />
								<?php echo "<input type='hidden' name='id_pengikut' value='$r[id_pegawai]'>"; ?>
								<?php echo form_error('nama_pengikut', '<label class="text-danger">', '</label>'); ?>
							</div>
						</div>
						<div class="form-group-separator"></div>
						<div class="form-group">
							<label class="col-sm-3 control-label">Golongan / Jenjang</label>
							<div class="col-sm-2">
								<?php echo editcombo('golongan','tb_gol','','gol','gol','','',set_value('golongan', $r['golongan'])); ?>
								<?php echo form_error('golongan', '<label class="text-danger">', '</label>'); ?>
							</div>
							<div class="col-sm-2">
								<?php echo editcombo('jenjang','tb_golongan','','jenjang','jenjang','','',set_value('jenjang', $r['jenjang'])); ?>
							</div>

						</div>
						<div class="form-group-separator"></div>
						<div class="form-group">
							<label class="col-sm-3 control-label" for="field-1">Instansi</label>
							<div class="col-sm-7">
								<input type="text" name="instansi" class="form-control" value="<?php echo set_value('instansi', $r['jabatan'])?>" placeholder="Instansi..." />
								<?php echo form_error('instansi', '<label class="text-danger">', '</label>'); ?>
							</div>
						</div>
						<div class="form-group-separator"></div>
						<div class="form-group">
							<label class="col-sm-3 control-label">Unit Kerja / Pajak</label>
							<div class="col-sm-3">
								<?php echo editcombo('unitkerja','tb_unitkerja','','unitkerja','unitkerja','','',$r['unitkerja']); ?>
							</div>
							<div class="col-sm-4">
								<input type="text" name="pajak" class="form-control" value="<?php echo set_value('pajak', $r['pajak'])?>" data-mask="decimal" maxlength="2" placeholder="Pajak (%)..." />
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