<div class="page-content">
<div class="container">
<div class="row margin-top-10">
				<div class="col-md-5">
					<div class="profile-content">
						<div class="row">
						<?php 
if($eror){
    //echo '<div id="eror_div">';
    //echo validation_errors();
   // echo '</div>';
}
?>
							<div class="col-md-12">
								<div class="portlet light">
									<div class="portlet-title tabbable-line">
										<div class="caption caption-md">
											<i class="icon-globe theme-font hide"></i>
											<span class="caption-subject font-blue-madison bold uppercase">Akun</span>
										</div>
										<ul class="nav nav-tabs">
											<li class="active">
												<a href="#tab_1_1" data-toggle="tab">Ganti Password</a>
											</li>
										</ul>
									</div>
									<div class="portlet-body">
										<div class="tab-content">
											<div class="tab-pane active" id="tab_1_1">
												<?php// echo validation_errors(); ?>
												<?php echo form_open('users/change_pass');?>
													<div class="form-group">
														<label class="control-label">Password Sekarang</label>
														<input type="password" name="current_pass" class="form-control"/>
														<?php echo form_error('current_pass'); ?>
													</div>
													<div class="form-group">
														<label class="control-label">Password Baru</label>
														<input type="password" name="new_pass" class="form-control"/>
													</div>
													<div class="form-group">
														<label class="control-label">Ulangi Password Baru</label>
														<input type="password" name="confirm_pass" class="form-control"/>
													</div>
													<div class="margin-top-10">
														<input type="submit" name="submit" value="Ganti Password" class="btn green-haze">
														<?php echo anchor('dashboard','Kembali',array('class'=>'btn btn-default'));?>
													</div>
												</form>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- END PROFILE CONTENT -->
				</div>
			</div>
			</div>
			</div>