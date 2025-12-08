<style>
tbody {
	color:#000;
	border-bottom:solid 1px #777675;
	border-top:solid 1px #777675;
	font-size:10pt;
	padding:5px;
	}
</style>
<div class="main-content" style="">
	<div class="panel panel-default col-md-12" style="">
		<div class="panel-heading">
			<h3 class="panel-title"># Cetak Rekap SKPD</h3>
			<div class="panel-options">
							
			</div>
		</div>
		
		<div class="panel-body">
			
			<form role="form" class="form-inline" action="<?php echo site_url('rekap_skpd');?>" method="POST">
				<div class="form-group">
					<label>Tanggal SKPD : </label>
				</div>
				
				<div class="form-group">
					<input type="text" class="form-control datepicker" data-format="dd-mm-yyyy" size="25" name="from" value="<?php echo $dari; ?>" placeholder="DD-MM-YYYY" required/>
				</div>
				
				<div class="form-group">
					s/d
				</div>
				
				<div class="form-group">
					<input type="text" class="form-control datepicker" data-format="dd-mm-yyyy" size="25" name="to" value="<?php echo $sampai; ?>" placeholder="DD-MM-YYYY" required/>
				</div>
				<div class="form-group">
					<select name="jenis_plafond" class="form-control"> 
						<option value="plafond" <?php if($jenis_plafond=='plafond') echo "selected";;?>>Plafond (By. Manajemen)</option>
						<option value="non_plafond" <?php if($jenis_plafond=='non_plafond') echo "selected";;?>>Non Plafond (By. Pusat)</option>
						<option value="lainlain" <?php if($jenis_plafond=='lainlain') echo "selected";;?>>Lain-lain (By. BOP SPI/Monitoring Kualitas)</option>
					</select>
				</div>
				<div class="form-group">
					<input type="hidden" name="from_old" value="<?php echo $dari; ?>"/>
					<input type="hidden" name="to_old" value="<?php echo $sampai; ?>"/>
					<input type="submit" name="submit" class="btn btn-secondary btn-single" value="Cari"/>
				</div>
				
				<?php
				if(isset($_POST['submit']))
				{
					if(count($cari)>0)
					{
				?>
					<div class="form-group">
						<input class="btn btn-blue btn-sm" type="submit" name="export_excel" value="Export Excel" style="margin-top:10px;" name="export_excel"/>
					</div>
				<?php
					}
				}
				?>
			</form>
			<br/>
			<mark><label>Total :<b><?php echo $count; ?> SPD </b></label></mark>
			<mark><label>Total Biaya SPD : <b>Rp.<?php echo number_format($total_biaya_spd, 0,'','.') ?> </b></label></mark>
			<?php
			if(isset($_POST['submit']))
			{
				if(count($cari)>0)
				{
			?>
					<div class="panel-body">
					
					
					<table id="example-1" class="table table-striped table-hover" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th class="th" id="th">Options</th>
								<th class="th" id="th">No / Tgl SKPD</th>
								<th class="th" id="th">Nama Pelaksana&#8195;&#8195;</th>
								<th class="th" id="th">Kegiatan / Tujuan</th>
								
								<th class="th" id="th">Berangkat / Pulang</th>
								<th class="th" id="th">Keterangan</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$i=1;
							foreach ($cari as $r)
							{
							?>
							<tr>
								<td class="td" align="left">
									<a href="<?php echo base_url().'skpd/cetak_skpd/'.$r->id_sppd.'/'.trim(substr($r->tgl_sppd,0,10));?>" data-toggle="tooltip" title="Cetak SKPD" class="btn btn-xs btn-white" target="_blank"><i class="fa fa-print"></i></a>
									<a href="<?php echo base_url().'skpd/cetak_rekap_biaya/'.$r->id_sppd.'/'.trim(substr($r->tgl_sppd,0,10)).'/'.trim($r->jenis_biaya);?>" data-toggle="tooltip" title="Cetak Rekap Biaya" class="btn btn-xs btn-white" target="_blank"><i class="fa fa-money"></i></a>
								</td>
								<td class="td" align="left">
									<span style="font-weight:bold;"><?php echo "No : ".str_pad($r->no_skpd,3, "0", STR_PAD_LEFT); ?><br/></span>
									<b><?php echo "Tgl : ".tgl_indo(date("Y-m-d", strtotime(trim(substr($r->tgl_skpd,0,10))))); ?></b><br/>
									<b><?php echo "By : ".$r->jenis_plafond; ?></b>
								</td>
								<td class="td">
									<?php echo str_replace(","," <br/> ",$r->nama_plk); ?>
									
								</td>
								<td class="td">
									<i class="fa fa-caret-right"></i>
									<?php 
									//strlen($r->tugas) >= 55
									if (count(explode(" ", $r->tugas)) >= 5) {
										echo implode(" ",array_slice(explode(" ",$r->tugas),0,5))."...";
									} else {
										echo $r->tugas; 
									}
									
									?>
									<br/>
									<i class="fa fa-caret-right"></i>
									<?php echo $r->tmpt_tujuan; ?><br/>
									<i class="fa fa-caret-right"></i>
									<?php echo $r->durasi_tgs; ?> Hari <br/>
									<i class="fa fa-caret-right"></i>
									<b><?php echo "Total Biaya : Rp.".number_format($r->total_spd, 0,'','.'); ?> </b>
									
								</td>
								
								<td class="td">
									<?php echo tgl_indo(date("Y-m-d", strtotime($r->tgl_keberangkatan)));?><br/>
									s.d <br/>
									<?php echo tgl_indo(date("Y-m-d", strtotime($r->tgl_kepulangan))); ?>
								</td>
								<td class="td"><?php echo $r->tugas; ?></td>
							</tr>
							<?php $i++;}?>
						</tbody>
					</table>
				</div>
					
					
					
			<?php	
				}
				else
				{
					echo "<mark><b>Data tidak ditemukan...</b></mark>";
				}
			}
			?>
			
		</div>
	</div>
</div>