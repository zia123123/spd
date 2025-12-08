<div class="main-content">
	<div class="panel panel-default col-md-10">
		<div class="panel-heading">
			<h3 class="panel-title"># Akomodasi Tamu</h3>
			<div class="panel-options">
							
			</div>
		</div>
		
		<div class="panel-body">
			<a href="<?php echo site_url('akomodasi_tamu/post');?>" class="btn btn-white btn-sm">
				<i class="fa-plus"></i>
				<span>Tambah</span>
			</a>
			<script type="text/javascript">
			jQuery(document).ready(function($)
			{
				$("#example-1").dataTable({
					aLengthMenu: [
						[50, 100, 125, 150, -1], [50, 100, 125, 150, "All"]
					]
				});
			});
			</script>
			
			<table id="example-1" class="table table-striped table-hover" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th class="th" id="th">Options</th>
						<th class="th" id="th">No</th>
						<th class="th" id="th">No SKPD</th>
						<th class="th" id="th">Tanggal SKPD</th>
						<th class="th" id="th">Nama</th>
						<th class="th" id="th">Gol</th>
						<th class="th" id="th">Tujuan</th>
						<th class="th" id="th">Durasi</th>
						<th class="th" id="th">Hotel</th>
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
							<a href="<?php echo base_url().''.$this->uri->segment(1).'/edit/'.$r->id_akomodasi;?>" data-toggle="tooltip" title="Edit" class="btn btn-xs btn-white"><i class="fa fa-pencil"></i></a>
							<a href="<?php echo base_url().''.$this->uri->segment(1).'/delete/'.$r->id_akomodasi;?>" data-toggle="tooltip" title="Delete" class="btn btn-xs btn-red" onclick="return confirm('Anda yakin akan menghapus?')"><i class="fa fa-times"></i></a>
						</td>
						<td class="td"><?php echo $i;?></td>
						<td class="td"><?php echo $r->no_skpd;?></td>
						<td class="td"><?php echo $r->tgl_skpd;?></td>
						<td class="td"><?php echo $r->nama;?></td>
						<td class="td"><?php echo $r->gol;?></td>
						<td class="td"><?php echo $r->tujuan;?></td>
						<td class="td"><?php echo $r->durasi;?> Hari</td>
						<td class="td"><?php echo "Rp. ".number_format($r->hotel, 0,'','.');?></td>
					</tr>
					<?php $i++;}?>
				</tbody>
			</table>
					
		</div>
	</div>
</div>