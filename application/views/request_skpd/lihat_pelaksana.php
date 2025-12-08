<div class="main-content">
	<div class="panel panel-default col-md-8">
		<div class="panel-heading">
			<h3 class="panel-title"># Daftar Pelaksana Tugas</h3>
			<div class="panel-options">
							
			</div>
		</div>
		
		<div class="panel-body">
			<table class="table table-striped">
			<thead>
				<tr>
					<th class="th" id="th" align="center">No</th>
					<th class="th" id="th">Nama Pelaksana</th>
					<th class="th" id="th">Noreg</th>
					<th class="th" id="th">Golongan</th>
					<th class="th" id="th">Jabatan</th>
					<th class="th" id="th">Unit Kerja</th>
					<th class="th" id="th">Status</th>
				</tr>
			</thead>
			
			<tbody>
				<?php
				$i=1;
				foreach ($record as $r)
				{
				?>
				
				<tr>
					<td class="td" align="center">
						<?php echo $i;?>
						<?php echo "<input type='hidden' name='id_pelaksana' value='$r->id_pelaksana'>"; ?>
					</td>
					<td class="td"><?php echo $r->nama_pelaksana;?></td>
					<?php if (substr($r->noreg,0,4) == '1111' or substr($r->noreg,0,4) == '2222') { ?>
					<td class="td" align="center">-</td>
					<td class="td" align="center">-</td>
					<?php } else { ?>
					<td class="td" align="center"><?php echo $r->noreg;?></td>
					<td class="td" align="center"><?php echo romawi($r->gol);?></td>
					<?php } ?>
					<td class="td"><?php echo $r->jabatan;?></td>
					<td class="td" align="center"><?php echo $r->unit_kerja;?></td>
					<td class="td">
						<?php 
							if ($r->status_pelaksana == 1) {
								//echo "Ketua Pelaksana";
								echo '<span class="btn btn-xs btn-blue">Ketua Pelaksana</span>';
							} elseif ($r->status_pelaksana == 0) {
								echo '<span class="btn default btn-xs default">Pelaksana</span>';
							}
						?>
					</td>
				</tr>
				<?php $i++;}?>
			</tbody>
		</table>
		<?php echo anchor($this->uri->segment(1),'Kembali',array('class'=>'btn btn-white'));?>
		</div>
	</div>
</div>