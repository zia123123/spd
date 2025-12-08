<style>
h4 { color:#000; }
</style>
<div class="main-content">
<div class="col-md-12">
					<div class="panel panel-default">
						<div class="panel-heading">
							<div class="panel-title">Isi BBM</div>
						</div>
						<div class="panel-body">
							<?php if ($this->session->flashdata('msg')) echo '<label class="text-danger" style="font-size:10pt">'.$this->session->flashdata('msg').'</label>'; ?>
							<div class="row">
								<form action="<?php echo site_url('skpd/update_bbm');?>" class="form-horizontal" method="post">
								<?php echo "<input type='hidden' name='id_sppd' value='$id'>"; ?>
								<?php
								$i=1;
								foreach ($pelaksana as $r)
								{
									echo "<input type='hidden' name='id_pelaksana' value='$r->id_pelaksana'>"; 
								}
								foreach ($data_skpd as $r)
								{
									echo "<input type='hidden' name='id_skpd' value='$r->id_skpd'>"; 
									echo "<input type='hidden' name='no_skpd' value='$r->no_skpd'>"; 
									echo "<input type='hidden' name='tgl_skpd' value='$r->tgl_skpd'>"; 
								}
								foreach ($bbm as $r)
								{
									$jumlah_bbm = $r->uang_bbm;
									$jenis_biaya = $r->jenis_biaya;
									$sts_tagihan = $r->sts_tagihan;
								}
								if($cek_bbm->num_rows()>0){
									$uang_bbm = $jumlah_bbm;
								} else {
									$uang_bbm = 0;
								}
								?>
								
								<div class="col-md-12">
									<div class="row">
										<div class="col-sm-4">
											<h4>Jumlah BBM</h4>
											<blockquote>
												<p>
													<input type="text" style="color:#000;" name="uang_bbm" value="<?php echo $uang_bbm;?>" class="form-control" autofocus=""/>
												</p>
												<p>
													<?php
														if (!isset($jenis_biaya)){
															$jenis_biaya = "";
														}
														?>
													<select name="jenis_biaya" class="form-control">
														
														<option value="PSO" <?php if ($jenis_biaya == "PSO"){echo "selected";}?>>PSO</option>
														<option value="RASKIN" <?php if ($jenis_biaya == "RASKIN"){echo "selected";}?>>RASKIN</option>
														<option value="NON_PSO" <?php if ($jenis_biaya == "NON_PSO"){echo "selected";}?>>NON_PSO</option>
													</select>
													<input type="hidden" name="sts_tagihan" value="0" class="form-control" />
												</p>
												
												<p>
													<input type="submit" name="submit" class="btn btn-success" value="Update"/>
													<?php echo anchor($this->uri->segment(1),'Kembali',array('class'=>'btn btn-white'));?>
												</p>
											</blockquote>
										</div>
									</div>
								</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				</div>