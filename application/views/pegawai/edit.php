00<div class="main-content">
	<div class="row">
		<div class="col-sm-8">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Edit Pegawai</h3>
					<div class="panel-options">
					</div>
				</div>
				<div class="panel-body">
					<form action="<?php echo site_url('pegawai/edit');?>" role="form" method="post" class="form-horizontal" role="form">
						<div class="form-group">
							<label class="col-sm-3 control-label" for="field-1">Nama Pegawai</label>
							<div class="col-sm-7">
								<?php echo "<input type='hidden' name='id_pegawai' value='$r[id_pegawai]'>"; ?>
								<input type="text" name="nama_pegawai" class="form-control" value="<?php echo set_value('nama_pegawai', $r['nama_pegawai'])?>" placeholder="Nama Pegawai..." />
								<?php echo form_error('nama_pegawai', '<label class="text-danger">', '</label>'); ?>
							</div>
						</div>
						<div class="form-group-separator"></div>
						<div class="form-group">
							<label class="col-sm-3 control-label" for="field-1">Noreg / NIP</label>
							<div class="col-sm-3">
								<input type="text" name="noreg" class="form-control" value="<?php echo set_value('noreg', $r['noreg'])?>"  maxlength="7" placeholder="Noreg..." />
								<?php echo form_error('noreg', '<label class="text-danger">', '</label>'); ?>
								<?php if (isset($msg_noreg)) echo '<label class="text-danger">'.$msg_noreg.'</label>'; ?>
							</div>
							<div class="col-sm-4">
								<input type="text" name="nip" class="form-control" value="<?php echo set_value('nip', $r['nip'])?>" maxlength="9" placeholder="NIP..." />
								<?php echo form_error('nip', '<label class="text-danger">', '</label>'); ?>
								<?php if (isset($msg_nip)) echo '<label class="text-danger">'.$msg_nip.'</label>'; ?>
							</div>
						</div>
						<div class="form-group-separator"></div>
						<div class="form-group">
							<label class="col-sm-3 control-label">Golongan / Jabatan / Jenjang</label>
							<div class="col-sm-2">
								<?php echo editcombo('golongan','tb_gol','','gol','gol','','',set_value('golongan', $r['golongan'])); ?>
							</div>
							<div class="col-sm-3">
								<?php echo inputan('text', 'jabatan','','Jabatan ..', 0, set_value('jabatan', $r['jabatan']),'');?>
								<?php echo form_error('jabatan', '<label class="text-danger">', '</label>'); ?>
							</div>
							<div class="col-sm-2">
								<?php echo editcombo('jenjang','tb_golongan','','jenjang','jenjang','','',set_value('jenjang', $r['jenjang'])); ?>
							</div>
						</div>
						
						<div class="form-group-separator"></div>
						<div class="form-group">
							<label class="col-sm-3 control-label">Unit Kerja / Pajak</label>
							<div class="col-sm-3">
								<?php echo editcombo('unitkerja','tb_unitkerja','','unitkerja','unitkerja','','',$r['unitkerja']); ?>
							</div>
							<div class="col-sm-4">
								<input type="text" name="pajak" class="form-control" value="<?php echo set_value('pajak', $r['pajak']); ?>" data-mask="decimal" maxlength="2" placeholder="Pajak (%)..." />
								<?php echo form_error('pajak', '<label class="text-danger">', '</label>'); ?>
							</div>
						</div>
						<div class="form-group-separator"></div>
						<div class="form-group">
							<label class="col-sm-3 control-label">&nbsp;</label>
							<div class="col-sm-7">
								<label>
									<?php if ($r['sts_pejabat'] == 1) { ?>
									<input type="checkbox" value="1" name="sts_pejabat" class="cbr cbr-white" checked>
									<?php } else { ?>
									<input type="checkbox" value="1" name="sts_pejabat" class="cbr cbr-white">
									<?php } ?>
									<i>Pejabat Pemberi / Pemohon Tugas</i>
								</label>
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