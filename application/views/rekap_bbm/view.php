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
			<h3 class="panel-title"># Cetak Rekap BBM</h3>
			<div class="panel-options">
							
			</div>
		</div>
		
		<div class="panel-body">
			
			<form role="form" class="form-inline" action="<?php echo site_url('rekap_bbm');?>" method="POST">
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
						$awal = substr($dari,6,4)."-".substr($dari,3,2)."-".substr($dari,0,2);
						$akhir = substr($sampai,6,4)."-".substr($sampai,3,2)."-".substr($sampai,0,2);
				?>
					
					<div class="form-group">
						<a href="<?php echo base_url().''.$this->uri->segment(1).'/cetak_rekap_bbm/'.$awal.'/'.$akhir.'/'.$jenis_biaya;?>" class="btn btn-orange btn-sm"  name="cetak_pdf" style="margin-top:10px;" target="_blank">Cetak PDF</a>
					</div>
					<div class="form-group">
						<input type="submit" name="proses_tagihan" class="btn btn-danger btn-single" value="Proses Tagihan"/>
					</div>
				<?php
					}
				}
				?>
				
			</form>
			<br/>
			<mark><label>Total : <?php echo $count; ?> data </label></mark>
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
								<th class="th" id="th">No.</th>
								<th class="th" id="th">No SKPD</th>
								<th class="th" id="th">Tanggal SKPD</th>
								<th class="th" id="th">Jumlah BBM (Rp.)</th>
								<th class="th" id="th">Jenis Biaya</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$i=1;
							foreach ($cari as $r)
							{
							?>
							<tr>
								<td class="td"><?php echo $i; ?></td>
								<td class="td"><?php echo $r->no_skpd; ?></td>
								<td class="td"><?php echo $r->tgl_skpd; ?></td>
								<td class="td"><?php echo $r->uang_bbm; ?></td>
								<td class="td"><?php echo $r->jenis_biaya; ?></td>
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
			}elseif(isset($_POST['proses_tagihan']))
			{
				echo "<br/><br/><mark style='color:#fff;background-color:green;'><b>".$messages."</b></mark>";
			}
			?>
			
		</div>
	</div>
</div>