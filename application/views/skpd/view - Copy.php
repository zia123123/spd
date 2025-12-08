<style>
th, td { white-space: nowrap; }
small{color:#000000;font-weight:bold;}
.hijau {
color:#68B201;
}
.biru {
color:#0782AF;
}
.kuning {
color:#E5A400;
}
.merah {
color:#B21318;
}
</style>
<div class="main-content">
	<div class="panel panel-default col-md-12">
		<div class="panel-heading">
			<h3 class="panel-title"># Daftar SKPD</h3>
			<div class="panel-options">
							
			</div>
		</div>
		
		<div class="panel-body">
			<script type="text/javascript">
			jQuery(document).ready(function($)
			{
				$("#example-1").dataTable({
					scrollY: "360px",
					scrollX: true,
					bSortable: false,
					scrollCollapse: true,
					fixedColumns:   {
						leftColumns: 0
					},
					aLengthMenu: [
						[50, 100, 125, 150, -1], [50, 100, 125, 150, "All"]
					]
				});
			});
			</script>
			
			<table id="example-1" class="table table-striped table-hover" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th class="th" id="th">Options&#8195;&#8195;&#8195;&#8195;&#8195;</th>
						<th class="th" id="th">No SKPD</th>
						<th class="th" id="th">Tanggal SKPD</th>
						<th class="th" id="th">Kegiatan</th>
						<th class="th" id="th">Tujuan</th>
						<th class="th" id="th">Tanggal Berangkat</th>
						<th class="th" id="th">Tanggal Pulang</th>
						<th class="th" id="th">Durasi</th>
						<th class="th" id="th">Keterangan&#8195;&#8195;&#8195;&#8195;</th>
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
							<a href="<?php echo base_url().''.$this->uri->segment(1).'/cetak_skpd/'.$r->id_sppd.'/'.trim(substr($r->tgl_sppd,0,10));?>" data-toggle="tooltip" title="Cetak SKPD" class="btn btn-xs btn-white" target="_blank"><i class="fa fa-print"></i></a>
							<a href="<?php echo base_url().''.$this->uri->segment(1).'/cetak_rekap_biaya/'.$r->id_sppd.'/'.trim(substr($r->tgl_sppd,0,10)).'/'.trim($r->jenis_biaya);?>" data-toggle="tooltip" title="Cetak Rekap Biaya" class="btn btn-xs btn-white" target="_blank"><i class="fa fa-money"></i></a>
							<a href="<?php echo base_url().''.$this->uri->segment(1).'/cetak_bon/'.$r->id_sppd.'/'.trim(substr($r->tgl_sppd,0,10)).'/'.trim($r->jenis_biaya);?>" data-toggle="tooltip" title="Cetak BON" class="btn btn-xs btn-white" target="_blank"><i class="fa fa-bold"></i></a>
							<a href="<?php echo base_url().''.$this->uri->segment(1).'/lihat_pelaksana/'.$r->id_sppd;?>" data-toggle="tooltip" title="Lihat Pelaksana Tugas" class="btn btn-xs btn-white"><i class="fa fa-user"></i></a>
							<a href="<?php echo base_url().''.$this->uri->segment(1).'/koreksi/'.$r->id_sppd;?>" data-toggle="tooltip" title="Koreksi Rincian Biaya SKPD" onclick="return confirm('Anda yakin akan mengkoreksi Rincian Biaya SKPD?')" <?php if ($r->sts_edit==1){echo 'class="btn btn-xs btn-red"';}else{echo 'class="btn btn-xs btn-white"';} ?>><i class="fa fa-refresh"></i></a>
							<a href="<?php echo base_url().''.$this->uri->segment(1).'/batal/'.$r->id_sppd;?>" data-toggle="tooltip" title="Batal SKPD" onclick="return confirm('Anda yakin akan membatalkan SKPD?')" class="btn btn-xs btn-white"><i class="fa fa-times"></i></a>
						</td>
						<td class="td" align="center"><?php echo str_pad($r->no_skpd,3, "0", STR_PAD_LEFT); ?></td>
						<td class="td" align="center"><?php echo trim(substr($r->tgl_skpd,0,10)); ?></td>
						<td class="td">
							<?php 
							//strlen($r->tugas) >= 55
							if (count(explode(" ", $r->tugas)) >= 3) {
								echo implode(" ",array_slice(explode(" ",$r->tugas),0,3))."...";
							} else {
								echo $r->tugas; 
							}
							
							?>
						</td>
						<td class="td"><?php echo $r->tmpt_tujuan; ?></td>
						<td class="td"><?php echo $r->tgl_keberangkatan; ?></td>
						<td class="td"><?php echo $r->tgl_kepulangan; ?></td>
						<td class="td"><?php echo $r->durasi_tgs; ?> Hari</td>
						<td class="td"><?php echo $r->ket; ?></td>
					</tr>
					<?php $i++;}?>
				</tbody>
			</table>
		</div>
	</div>
</div>