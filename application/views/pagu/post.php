<div class="main-content">
	<div class="row">
		<div class="col-sm-6">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Tambah PAGU</h3>
					<div class="panel-options">
					</div>
				</div>
				<div class="panel-body">
					<form action="<?php echo site_url('pagu/post');?>" role="form" method="post" class="form-horizontal" role="form">
						<div class="form-group">
							<label class="col-sm-3 control-label">Bulan</label>
							<div class="col-sm-7">
								<select name="bln" class="form-control" required>
									<option value="1">JANUARI</option>
									<option value="2">FEBRUARI</option>
									<option value="3">MARET</option>
									<option value="4">APRIL</option>
									<option value="5">MEI</option>
									<option value="6">JUNI</option>
									<option value="7">JULI</option>
									<option value="8">AGUSTUS</option>
									<option value="9">SEPTEMBER</option>
									<option value="10">OKTOBER</option>
									<option value="11">NOVEMBER</option>
									<option value="12">DESEMBER</option>
								</select>
								<?php echo form_error('sts', '<label class="text-danger">', '</label>'); ?>
							</div>
						</div>
						<div class="form-group-separator"></div>
						<div class="form-group">
							<label class="col-sm-3 control-label">Tahun</label>
							<div class="col-sm-7">
								<input type="text" name="tahun" class="form-control" value="<?php echo set_value('tahun'); ?>" placeholder="" />
								<?php echo form_error('tahun', '<label class="text-danger">', '</label>'); ?>
							</div>
						</div>
						<div class="form-group-separator"></div>
						<div class="form-group">
							<label class="col-sm-3 control-label">PAGU (Rp.)</label>
							<div class="col-sm-7">
								<input type="text" name="pagu" class="form-control" value="<?php echo set_value('pagu'); ?>" placeholder="" />
								<?php echo form_error('pagu', '<label class="text-danger">', '</label>'); ?>
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