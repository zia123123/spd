<div class="main-content">
	<div class="row">
		<div class="col-md-12">
			<div class="alert alert-white">
				<button type="button" class="close" data-dismiss="alert">
					<span aria-hidden="true">&times;</span>
					<span class="sr-only">Close</span>
				</button>
				
				<h4>Dashboard Aplikasi SEKUMHUM CERIA <br/>
				<strong>PERUM BULOG KANWIL JAWA BARAT</strong></h4>
			</div>
			<div class="panel-body">
				
				<div class="col-md-5">
					<h4>SPD BY PLAFOND</h4>
					<table id="example-1" class="table table-striped table-hover" cellspacing="0" width="50%">
						<thead>
							<tr>
								<th class="th" id="th">NO</th>
								<th class="th" id="th">PERIODE</th>
								<th class="th" id="th">PAGU RKAP</th>
								<th class="th" id="th">REALISASI</th>
								<th class="th" id="th">SISA</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$i=1;
							$jml_pagu=0;
							$jml_real=0;
							$jml_sisa=0;
							foreach ($record as $r)
							{
							?>
							<tr>
								<td class="td"><?php echo $i;?></td>
								<td class="td"><?php echo strtoupper($r->bulan." ".$r->tahun);?></td>
								<td class="td"><?php echo number_format($r->pagu, 0,'','.');?></td>
								<td class="td"><?php echo number_format($r->realisasi, 0,'','.');?></td>
								<?php
									$selisih = $r->pagu-$r->realisasi;
									$jml_pagu += $r->pagu;
									$jml_real += $r->realisasi;
									$jml_sisa += $selisih;
								?>
								<?php
								if ($selisih < 0) {
								?>
									<td class="td" style="color:red"><?php echo number_format($selisih, 0,'','.');?></td>
								<?php
								} else {
								?>
								<td class="td" style=""><?php echo number_format($selisih, 0,'','.');?></td>								
								<?php
								}
								?>
							</tr>
							<?php $i++;}?>
							<tr>
								<td class="td" style="font-weight:bold"></td>
								<td class="td" style="font-weight:bold">TOTAL</td>
								<td class="td" style="font-weight:bold"><?php echo number_format($jml_pagu, 0,'','.');?></td>
								<td class="td" style="font-weight:bold"><?php echo number_format($jml_real, 0,'','.');?></td>
								<td class="td" style="font-weight:bold"><?php echo number_format($jml_sisa, 0,'','.');?></td>
							</tr>
						</tbody>
					</table>
					<form role="form" class="form-inline" action="<?php echo site_url('dashboard');?>" method="POST">
					<table border="0" width="100%">
					<tr>
						<td>
							<div class="form-group">
								<input type="hidden" name="tglnow" value="<?php echo $now; ?>"/>
								<input type="submit" name="submit" class="btn btn-secondary btn-single" value="Refresh"/>
							</div>
						</td>
						<td align="right"><label><i>Data Update : <?php echo $update_time; ?></i></label></td>
					</tr>
					</table>
					
					
				</form>
				</div>
				<div class="col-md-3">
					<h4>SPD BY NON PLAFOND</h4>
					<table id="example-1" class="table table-striped table-hover" cellspacing="0" width="50%">
						<thead>
							<tr>
								<th class="th" id="th">NO</th>
								<th class="th" id="th">PERIODE</th>
								<th class="th" id="th">REALISASI</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$i=1;
							$jml_real=0;
							foreach ($real_non_plafond as $r)
							{
							?>
							<tr>
								<td class="td"><?php echo $i;?></td>
								<td class="td"><?php echo strtoupper($r->bulan." ".$r->tahun);?></td>
								<td class="td"><?php echo number_format($r->realisasi, 0,'','.');?></td>
								<?php
									$jml_real += $r->realisasi;
								?>
							</tr>
							<?php $i++;}?>
							<tr>
								<td class="td" style="font-weight:bold"></td>
								<td class="td" style="font-weight:bold">TOTAL</td>
								<td class="td" style="font-weight:bold"><?php echo number_format($jml_real, 0,'','.');?></td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="col-md-3">
					<h4>SPD BY LAIN-LAIN</h4>
					<table id="example-1" class="table table-striped table-hover" cellspacing="0" width="50%">
						<thead>
							<tr>
								<th class="th" id="th">NO</th>
								<th class="th" id="th">PERIODE</th>
								<th class="th" id="th">REALISASI</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$i=1;
							$jml_real=0;
							foreach ($real_lainlain as $r)
							{
							?>
							<tr>
								<td class="td"><?php echo $i;?></td>
								<td class="td"><?php echo strtoupper($r->bulan." ".$r->tahun);?></td>
								<td class="td"><?php echo number_format($r->realisasi, 0,'','.');?></td>
								<?php
									$jml_real += $r->realisasi;
								?>
							</tr>
							<?php $i++;}?>
							<tr>
								<td class="td" style="font-weight:bold"></td>
								<td class="td" style="font-weight:bold">TOTAL</td>
								<td class="td" style="font-weight:bold"><?php echo number_format($jml_real, 0,'','.');?></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		
	</div>
</div>