<style>
th, td { white-space: nowrap; }
.td {
	border-bottom:solid 1px #000;
}
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
					scrollY: "700px",
					scrollX: false,
					bSortable: false,
					scrollCollapse: true,
					fixedColumns:   {
						leftColumns: 0
					},
					aLengthMenu: [
						[25, 50, 100, 125, 150, -1], [25, 50, 100, 125, 150, "All"]
					]
				});
			});
			</script>
			
			<table id="example-1" class="table table-striped table-hover" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th class="th" id="th">Options&#8195;&#8195;&#8195;&#8195;&#8195;</th>
						<th class="th" id="th">No / Tgl SKPD</th>
						<th class="th" id="th">Nama Pelaksana&#8195;&#8195;&#8195;&#8195;&#8195;&#8195;</th>
						<th class="th" id="th">Kegiatan / Tujuan</th>
						<!--
						<th class="th" id="th">Berangkat / Pulang</th>
						<th class="th" id="th">Keterangan</th>-->
					</tr>
				</thead>
				<tbody>
					<?php
					$i=1;
					foreach ($record as $r)
					{
						//echo substr($r->tgl_skpd,6,4);
					?>
					<tr>
						<td class="td" align="left">
							<table border="0">
							<tr>
							<td>
								<a href="<?php echo base_url().''.$this->uri->segment(1).'/cetak_skpd/'.$r->id_sppd.'/'.trim(substr($r->tgl_sppd,0,10));?>" data-toggle="tooltip" title="Cetak SKPD" class="btn btn-xs btn-white" target="_blank"><i class="fa fa-print"></i></a>
							</td>
							<td>
								<?php if($r->no_skpd<402 and trim(substr($r->tgl_skpd,6,4)) == "2016" or trim(substr($r->tgl_skpd,6,4)) == "2015"){ ?>
								<a href="<?php echo base_url().''.$this->uri->segment(1).'/cetak_rekap_biaya/'.$r->id_sppd.'/'.trim(substr($r->tgl_sppd,0,10)).'/'.trim($r->jenis_biaya);?>" data-toggle="tooltip" title="Cetak Rekap Biaya" class="btn btn-xs btn-white" target="_blank"><i class="fa fa-money"></i></a>
								<?php } else { ?>
								<a href="<?php echo base_url().''.$this->uri->segment(1).'/cetak_rekap_biaya_non_km/'.$r->id_sppd.'/'.trim(substr($r->tgl_sppd,0,10)).'/'.trim($r->jenis_biaya);?>" data-toggle="tooltip" title="Cetak Rekap Biaya" class="btn btn-xs btn-white" target="_blank"><i class="fa fa-money"></i></a>
								<?php } ?>
							</td>
							<td>
								<a href="<?php echo base_url().''.$this->uri->segment(1).'/cetak_bon/'.$r->id_sppd.'/'.trim(substr($r->tgl_sppd,0,10)).'/'.trim($r->jenis_biaya);?>" data-toggle="tooltip" title="Cetak BON" class="btn btn-xs btn-white" target="_blank"><i class="fa fa-bold"></i></a>
							</td>
							</tr>
							<tr>
								<td>
									<a href="<?php echo base_url().''.$this->uri->segment(1).'/koreksi/'.$r->id_sppd;?>" data-toggle="tooltip" title="Koreksi Rincian Biaya SKPD" onclick="return confirm('Anda yakin akan mengkoreksi Rincian Biaya SKPD?')" <?php if ($r->sts_edit==1){echo 'class="btn btn-xs btn-red"';}else{echo 'class="btn btn-xs btn-white"';} ?>><i class="fa fa-refresh"></i></a>
								</td>
								<td>
									<a href="<?php echo base_url().''.$this->uri->segment(1).'/ganti_ttd/'.$r->id_sppd;?>" data-toggle="tooltip" title="Ganti TTD" class="btn btn-xs btn-white"><i class="fa fa-cog"></i></a>
								</td>
								<td>
									<a href="<?php echo base_url().''.$this->uri->segment(1).'/batal/'.$r->id_sppd;?>" data-toggle="tooltip" title="Batal SKPD" onclick="return confirm('Anda yakin akan membatalkan SKPD?')" class="btn btn-xs btn-white"><i class="fa fa-times"></i></a>
								</td>
							</tr>
							<tr>
								<td>

									<?php if($r->no_skpd<402 and trim(substr($r->tgl_skpd,6,4)) == "2016" or trim(substr($r->tgl_skpd,6,4)) == "2015"){ ?>
									
									<?php } else { ?>
									<a href="<?php echo base_url().''.$this->uri->segment(1).'/bbm/'.$r->id_sppd.'/'.trim(substr($r->tgl_sppd,0,10)).'/'.trim($r->jenis_biaya);?>" data-toggle="tooltip" title="BBM" class="btn btn-xs btn-white"><i class="fa fa-car"></i></a>
									<?php } ?>
								</td>
								<td></td>
								<td></td>
							</tr>
							</table>
							<!--<a href="<?php echo base_url().''.$this->uri->segment(1).'/lihat_pelaksana/'.$r->id_sppd;?>" data-toggle="tooltip" title="Lihat Pelaksana Tugas" class="btn btn-xs btn-white"><i class="fa fa-user"></i></a>-->
						</td>
						<td class="td" align="left">
							<span style="font-weight:bold;"><?php echo "No : ".str_pad($r->no_skpd,3, "0", STR_PAD_LEFT); ?><br/></span>
							<b><?php echo "Tgl : ".tgl_indo(date("Y-m-d", strtotime(trim(substr($r->tgl_skpd,0,10))))); ?></b><br/>
							<b><?php echo "By : ".$r->jenis_plafond; ?></b>
						</td>
						<td class="td"><?php echo str_replace(","," <br/> ",$r->nama_plk); ?></td>
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
							<?php echo $r->durasi_tgs; ?> Hari<br/>
							<i class="fa fa-caret-right"></i>
							<?php echo tgl_indo(date("Y-m-d", strtotime($r->tgl_keberangkatan)));?>
							s.d 
							<?php echo tgl_indo(date("Y-m-d", strtotime($r->tgl_kepulangan))); ?>
						</td>
						<!--
						<td class="td">
							<?php echo tgl_indo(date("Y-m-d", strtotime($r->tgl_keberangkatan)));?>
							s.d 
							<?php echo tgl_indo(date("Y-m-d", strtotime($r->tgl_kepulangan))); ?>
						</td>
						<td class="td"><?php echo $r->ket; ?></td>-->
					</tr>
					<?php $i++;}?>
				</tbody>
			</table>
		</div>
	</div>
</div>