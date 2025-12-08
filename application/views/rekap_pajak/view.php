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
			<h3 class="panel-title"># Cetak Rekap Pajak</h3>
			<div class="panel-options">
							
			</div>
		</div>
		
		<div class="panel-body">
			
			<form role="form" class="form-inline" action="<?php echo site_url('rekap_pajak');?>" method="POST">
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
								<th class="th" id="th">Tanggal</th>
								<th class="th" id="th">Nama Pelaksana&#8195;&#8195;&#8195;&#8195;&#8195;&#8195;</th>
								<th class="th" id="th">Pendapatan</th>
								<th class="th" id="th">Tarif</th>
								<th class="th" id="th">Pajak</th>
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
								<td class="td"><?php echo $r->tgl_sppd; ?></td>
								<td class="td"><?php echo $r->nama_pelaksana; ?></td>
								<td class="td"><?php echo $r->total; ?></td>
								<td class="td"><?php echo $r->pph; ?></td>
								<td class="td"><?php echo $r->potongan; ?></td>
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