<div class="main-content">
	<div class="row">
		<div class="col-sm-6">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Edit User</h3>
					<div class="panel-options">
					</div>
				</div>
				<div class="panel-body">
					<form action="<?php echo site_url('users/edit');?>" role="form" method="post" class="form-horizontal" role="form">
						<div class="form-group">
							<label class="col-sm-3 control-label" for="field-1">Username</label>
							<div class="col-sm-7">
								<input type="text" name="username" class="form-control" value="<?php echo set_value('username', $r['username'])?>" placeholder="Username..." />
								<?php echo "<input type='hidden' name='id' value='$r[id_users]'>"; ?>
								<?php echo form_error('username', '<label class="text-danger">', '</label>'); ?>
							</div>
						</div>
						<div class="form-group-separator"></div>
						<div class="form-group">
							<label class="col-sm-3 control-label" for="field-1">Password</label>
							<div class="col-sm-7">
								<input type="password" name="password" class="form-control" value="" placeholder="Password..." />
								<?php echo form_error('password', '<label class="text-danger">', '</label>'); ?>
							</div>
						</div>
						<div class="form-group-separator"></div>
						<div class="form-group">
							<label class="col-sm-3 control-label">Hak Akses</label>
							<div class="col-sm-7">
								<select name="level" class="form-control" >
									<?php if ($r['level'] == "1"){ ?>
										<option value="1" selected>Admin</option>
										<option value="2">User</option>
									<?php } else { ?>
										<option value="1">Admin</option>
										<option value="2" selected>User</option>
									<?php } ?>
								</select>
								<?php echo form_error('level', '<label class="text-danger">', '</label>'); ?>
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