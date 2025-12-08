<div class="main-content">
	<div class="panel panel-default col-md-12">
		<div class="panel-heading">
			<h3 class="panel-title"># Daftar Lokasi</h3>
			<div class="panel-options">
							
			</div>
		</div>
		
		<div class="panel-body">
			<a href="<?php echo site_url('lokasi/post');?>" class="btn btn-success btn-sm">
				<i class="fa-plus"></i>
				<span>Tambah Lokasi</span>
			</a>
			<script type="text/javascript">
			jQuery(document).ready(function($)
			{
				$("#example-1").dataTable({
					scrollY: "360px",
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
						<th class="th" id="th">Nama Lokasi</th>
						<th class="th" id="th">Wilayah</th>
						<th class="th" id="th">Titik Koordinat</th>
						<th class="th" id="th">Alamat</th>
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
							<a href="<?php echo base_url().''.$this->uri->segment(1).'/edit/'.$r->id_tempat;?>" data-toggle="tooltip" title="Edit" class="btn btn-xs btn-white"><i class="fa fa-pencil"></i></a>
							<a href="<?php echo base_url().''.$this->uri->segment(1).'/delete/'.$r->id_tempat;?>" data-toggle="tooltip" title="Delete" class="btn btn-xs btn-red" onclick="return confirm('Anda yakin akan menghapus Lokasi?')"><i class="fa fa-times"></i></a>
						</td>
						<td class="td"><?php echo $i;?></td>
						<td class="td"><?php echo $r->nama_tempat;?></td>
						<td class="td"><?php echo $r->wilayah;?></td>
						<td class="td"><?php echo $r->latlng;?></td>
						<td class="td"><?php echo $r->alamat;?></td>
					</tr>
					<?php $i++;}?>
				</tbody>
			</table>
					
		</div>
	</div>
</div>