<div class="main-content">
	<div class="panel panel-default col-md-10">
		<div class="panel-heading">
			<h3 class="panel-title"># Daftar Pengemudi</h3>
			<div class="panel-options">
							
			</div>
		</div>
		
		<div class="panel-body">
			<a href="<?php echo site_url('pengemudi/post');?>" class="btn btn-success btn-sm">
				<i class="fa-plus"></i>
				<span>Tambah Pengemudi</span>
			</a>
			<script type="text/javascript">
			jQuery(document).ready(function($)
			{
				$("#example-1").dataTable({
					scrollY: "400px",
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
						<th class="th" id="th">Nama Pengemudi</th>
						<th class="th" id="th">Jabatan</th>
						<th class="th" id="th">Unit Kerja</th>
						<th class="th" id="th">Pajak</th>
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
							<a href="<?php echo base_url().''.$this->uri->segment(1).'/edit/'.$r->id_pegawai;?>" data-toggle="tooltip" title="Edit" class="btn btn-xs btn-white"><i class="fa fa-pencil"></i></a>
							<a href="<?php echo base_url().''.$this->uri->segment(1).'/delete/'.$r->id_pegawai;?>" data-toggle="tooltip" title="Delete" class="btn btn-xs btn-red" onclick="return confirm('Anda yakin akan menghapus Pengikut?')"><i class="fa fa-times"></i></a>
						</td>
						<td class="td"><?php echo $i;?></td>
						<td class="td"><?php echo $r->nama_pegawai;?></td>
						<td class="td"><?php echo $r->jabatan;?></td>
						<td class="td"><?php echo $r->unitkerja;?></td>
						<td class="td"><?php echo $r->pajak;?>&#37;</td>
					</tr>
					<?php $i++;}?>
				</tbody>
			</table>
					
		</div>
	</div>
</div>