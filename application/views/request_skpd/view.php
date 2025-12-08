<div class="main-content">
	<div class="panel panel-default col-md-12	">
		<div class="panel-heading">
			<h3 class="panel-title"># Permintaan SKPD</h3>
			<div class="panel-options">
							
			</div>
		</div>
		
		<div class="panel-body">
			<table class="table table-striped">
			<thead>
				<tr>
					<th class="th" id="th">Options&#8195;</th>
					<th class="th" id="th">Tanggal SPPD</th>
					<th class="th" id="th">Nama Pelaksana</th>
					<th class="th" id="th">Kegiatan</th>
					<th class="th" id="th">Tempat Tujuan</th>
					<th class="th" id="th">Berangkat</th>
					<th class="th" id="th">Pulang</th>
					<th class="th" id="th">Durasi</th>
					<th class="th" id="th">Jns Plafond</th>
					<th class="th" id="th">&#8195;&#8195;&#8195;&#8195;&#8195;&#8195;&#8195;&#8195;</th>
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
						<a href="<?php echo base_url().''.$this->uri->segment(1).'/lihat_pelaksana/'.$r->id_sppd;?>" data-toggle="tooltip" title="Lihat Pelaksana Tugas" class="btn btn-xs btn-white black"><i class="fa fa-user"></i></a>
					</td>
					<td class="td" align="center"><?php echo trim(substr($r->tgl_sppd,0,10)); ?></td>
					<td class="td" style="font-size:10pt;"><?php echo str_replace(","," <br/> ",$r->nama_pelaksana); ?></td>
					<td class="td">
						<?php 
						//strlen($r->tugas) >= 55
						if (count(explode(" ", $r->tugas)) >= 5) {
							echo implode(" ",array_slice(explode(" ",$r->tugas),0,5))."...";
						} else {
							echo $r->tugas; 
						}
						
						?>
					</td>
					<td class="td"><?php echo $r->tmpt_tujuan; ?></td>
					<td class="td" align="center"><?php echo $r->tgl_keberangkatan; ?></td>
					<td class="td" align="center"><?php echo $r->tgl_kepulangan; ?></td>
					<td class="td" align="center"><?php echo $r->durasi_tgs; ?> Hari</td>
					<td class="td" align="center"><?php echo $r->jenis_plafond; ?></td>
					<td class="td" align="center">
						<a href="<?php echo base_url().''.$this->uri->segment(1).'/confirm_1/'.$r->id_sppd;?>" data-toggle="tooltip" title="Setujui SKPD" class="btn btn-success btn-xs"><i class="fa fa-check"></i></a>
						<a href="<?php echo base_url().''.$this->uri->segment(1).'/reject/'.$r->id_sppd;?>" data-toggle="tooltip" title="Tolak SKPD" class="btn btn-danger btn-xs" onclick="return confirm('Anda yakin akan menolak SPPD?')"><i class="fa fa-times"></i></a>
					</td>
				</tr>
				<?php $i++;}?>
			</tbody>
		</table>
		<?php echo anchor('skpd','Kembali',array('class'=>'btn btn-white'));?>
		</div>
	</div>
</div>