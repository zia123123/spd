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
			<h3 class="panel-title"># Daftar SPPD</h3>
			<div class="panel-options">
							
			</div>
		</div>
		
		<div class="panel-body">
			<a href="<?php echo site_url('sppd/post');?>" class="btn btn-success btn-sm">
				<i class="fa-plus"></i>
				<span>Buat SPPD</span>
			</a>
			<script type="text/javascript">
			jQuery(document).ready(function($)
			{
				$("#example-2").dataTable({
					scrollY: "360px",
					scrollX: true,
					"sortable" : false,
					scrollCollapse: false,
					"order": [[ 2, "asc" ]],
					fixedColumns:   {
						leftColumns: 0
					},
					aLengthMenu: [
						[500, 1000, -1], [500, 1000, "All"]
					]
				});
			});
			</script>
			
			<table id="example-2" class="table table-striped table-hover" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th class="th" id="th">Status</th>
						<th class="th" id="th">Options&#8195;&#8195;&#8195;&#8195;&#8195;</th>
						<th class="th" id="th">No</th>
						<th class="th" id="th">Kegiatan</th>
						<th class="th" id="th">Nama Pelaksana</th>
						<th class="th" id="th">Tujuan</th>
						<th class="th" id="th" align="left">Tanggal SPPD</th>
						<th class="th" id="th">Tanggal Berangkat</th>
						<th class="th" id="th">Tanggal Pulang</th>
						<th class="th" id="th">Durasi</th>
						<th class="th" id="th">Jns Plafond</th>
						<!--<th class="th" id="th">Keterangan&#8195;&#8195;&#8195;&#8195;</th>-->
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
							<?php if ($r->sts == 1){ ?>
								<i class="fa-check hijau"></i>
							<?php } elseif ($r->sts == 2){ ?>
								<i class="fa-ban biru"></i>
							<?php } elseif ($r->sts == 9){ ?>
								<i class="fa-close merah"></i>
							<?php } else { ?>
								<i class="fa-clock-o kuning"></i>
							<?php } ?>
						</td>
						<td class="td">
								<?php if ($r->sts == '1'){ ?>
								<a href="<?php echo base_url().''.$this->uri->segment(1).'/cetak_sppd/'.$r->id_sppd.'/'.trim(substr($r->tgl_sppd,0,10));?>" data-toggle="tooltip" title="Cetak" class="btn btn-xs btn-white" target="_blank"><i class="fa fa-print"></i></a>
								<a href="<?php echo base_url().''.$this->uri->segment(1).'/lihat_pelaksana/'.$r->id_sppd;?>" data-toggle="tooltip" title="Lihat Pelaksana Tugas" class="btn btn-xs btn-white"><i class="fa fa-user"></i></a>
								<a href="<?php echo base_url().''.$this->uri->segment(1).'/edit/'.$r->id_sppd;?>" data-toggle="tooltip" title="Edit" class="btn btn-xs btn-white"><i class="fa fa-pencil"></i></a>
								<?php } elseif($r->sts == '0' or $r->sts == '2') { ?>
								<a href="<?php echo base_url().''.$this->uri->segment(1).'/cetak_sppd/'.$r->id_sppd.'/'.trim(substr($r->tgl_sppd,0,10));?>" data-toggle="tooltip" title="Cetak" class="btn btn-xs btn-white" target="_blank"><i class="fa fa-print"></i></a>
								<a href="<?php echo base_url().''.$this->uri->segment(1).'/lihat_pelaksana/'.$r->id_sppd;?>" data-toggle="tooltip" title="Lihat Pelaksana Tugas" class="btn btn-xs btn-white"><i class="fa fa-user"></i></a>
								<a href="<?php echo base_url().''.$this->uri->segment(1).'/edit/'.$r->id_sppd;?>" data-toggle="tooltip" title="Edit" class="btn btn-xs btn-white"><i class="fa fa-pencil"></i></a>
								<a href="<?php echo base_url().''.$this->uri->segment(1).'/delete/'.$r->id_sppd;?>" data-toggle="tooltip" title="Hapus" onclick="return confirm('Anda yakin akan menghapus SPPD?')" class="btn btn-xs btn-white"><i class="fa fa-trash-o"></i></a>
								<?php } elseif($r->sts == '9') { ?>
								<a href="<?php echo base_url().''.$this->uri->segment(1).'/cetak_sppd/'.$r->id_sppd.'/'.trim(substr($r->tgl_sppd,0,10));?>" data-toggle="tooltip" title="Cetak" class="btn btn-xs btn-white" target="_blank"><i class="fa fa-print"></i></a>
								<a href="<?php echo base_url().''.$this->uri->segment(1).'/lihat_pelaksana/'.$r->id_sppd;?>" data-toggle="tooltip" title="Lihat Pelaksana Tugas" class="btn btn-xs btn-white"><i class="fa fa-user"></i></a>
								<?php } ?>
						
						</td>
						
						
						<td class="td" align="center" style="font-size:10pt;"><?php echo $i; ?></td>
						<td class="td" style="font-size:10pt;">
							<?php 
							//strlen($r->tugas) >= 55
							if (count(explode(" ", $r->tugas)) >= 3) {
								echo implode(" ",array_slice(explode(" ",$r->tugas),0,3))."...";
							} else {
								echo $r->tugas; 
							}
							
							?>
						</td>
						<td class="td" style="font-size:10pt;"><?php echo str_replace(","," | ",$r->nama_pelaksana); ?></td>
						<td class="td" style="font-size:10pt;"><?php echo $r->tmpt_tujuan; ?></td>
						<td class="td" style="font-size:10pt;"><?php echo trim(substr($r->tgl_sppd,0,10)); ?></td>
						
						<!--<td class="td"><?php echo ucwords(strtolower($r->tmpt_keberangkatan)); ?></td>-->
						
						<td class="td" style="font-size:10pt;"><?php echo $r->tgl_keberangkatan; ?></td>
						<td class="td" style="font-size:10pt;"><?php echo $r->tgl_kepulangan; ?></td>
						<td class="td" style="font-size:10pt;"><?php echo $r->durasi_tgs; ?> Hari</td>
						<td class="td" style="font-size:10pt;"><?php echo $r->jenis_plafond; ?></td>
						<!--
						<td class="td"><?php echo trim($r->pemberi_tgs); ?></td>
						<td class="td"><?php echo trim($r->pemohon_tgs); ?></td>
						-->
						<!--<td class="td" style="font-size:10pt;"><?php echo $r->ket; ?></td>-->
					</tr>
					<?php $i++;}?>
				</tbody>
			</table>
			<p align="left">
				<label>Keterangan : </label><br/>
				<i class="fa-check hijau"></i> <small> : SKPD Sukses</small>&#8195;
				<i class="fa-clock-o kuning"></i> <small> : SKPD Pending</small>&#8195;
				<i class="fa-ban biru"></i> <small> : SKPD Tolak</small>&#8195;
				<i class="fa-close merah"></i> <small> : SKPD Batal</small>&#8195;
			</p>		
		</div>
	</div>
</div>