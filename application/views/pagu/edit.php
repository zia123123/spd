<div class="main-content">
	<div class="row">
		<div class="col-sm-6">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Edit PAGU</h3>
					<div class="panel-options">
					</div>
				</div>
				<div class="panel-body">
					<form action="<?php echo site_url('pagu/edit');?>" role="form" method="post" class="form-horizontal" role="form">
						<div class="form-group">
							<label class="col-sm-3 control-label">Bulan</label>
							<div class="col-sm-7">
								<select name="bln" class="form-control" required>
									<option value="1" <?php if($r['bln']=='01'){echo "selected";}?>>JANUARI</option>
									<option value="2" <?php if($r['bln']=='02'){echo "selected";}?>>FEBRUARI</option>
									<option value="3" <?php if($r['bln']=='03'){echo "selected";}?>>MARET</option>
									<option value="4" <?php if($r['bln']=='04'){echo "selected";}?>>APRIL</option>
									<option value="5" <?php if($r['bln']=='05'){echo "selected";}?>>MEI</option>
									<option value="6" <?php if($r['bln']=='06'){echo "selected";}?>>JUNI</option>
									<option value="7" <?php if($r['bln']=='07'){echo "selected";}?>>JULI</option>
									<option value="8" <?php if($r['bln']=='08'){echo "selected";}?>>AGUSTUS</option>
									<option value="9" <?php if($r['bln']=='09'){echo "selected";}?>>SEPTEMBER</option>
									<option value="10" <?php if($r['bln']=='10'){echo "selected";}?>>OKTOBER</option>
									<option value="11" <?php if($r['bln']=='11'){echo "selected";}?>>NOVEMBER</option>
									<option value="12" <?php if($r['bln']=='12'){echo "selected";}?>>DESEMBER</option>
									
								</select>
								<?php echo form_error('bln', '<label class="text-danger">', '</label>'); ?>
								<?php echo "<input type='hidden' name='id_pagu' value='$r[id_pagu]'>"; ?>
							</div>
						</div>
						<div class="form-group-separator"></div>
						<div class="form-group">
							<label class="col-sm-3 control-label">Tahun</label>
							<div class="col-sm-7">
								<input type="text" name="tahun" class="form-control" value="<?php echo set_value('tahun', $r['tahun'])?>" placeholder="Tahun..." />
								<?php echo form_error('tahun', '<label class="text-danger">', '</label>'); ?>
							</div>
						</div>
						<div class="form-group-separator"></div>
						<div class="form-group">
							<label class="col-sm-3 control-label">PAGU (Rp.)</label>
							<div class="col-sm-7">
								<input type="text" name="pagu" class="form-control" value="<?php echo set_value('pagu', $r['pagu'])?>" placeholder="PAGU..." />
								<?php echo form_error('pagu', '<label class="text-danger">', '</label>'); ?>
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