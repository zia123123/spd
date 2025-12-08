<style>
th, td { white-space: nowrap; }
</style>
<div class="main-content">
	<div class="panel panel-default col-md-12">
		<div class="panel-heading">
			<h3 class="panel-title"># Daftar Golongan</h3>
			<div class="panel-options">
							
			</div>
		</div>
		
		<div class="panel-body">
			<a href="<?php echo site_url('golongan/post');?>" class="btn btn-success btn-sm">
				<i class="fa-plus"></i>
				<span>Tambah Golongan</span>
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
			<table id="example-1" class="table table-striped" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th class="th" id="th">Options</th>
						<th class="th" id="th">No</th>
						<th class="th" id="th">Jenjang</th>
						<th class="th" id="th">Nama</th>
						<th class="th" id="th">Klasifikasi</th>
						<th class="th" id="th">Biaya Dalam Kota</th>
						<th class="th" id="th">Biaya Raskin</th>
						<th class="th" id="th">Biaya Management</th>
						<th class="th" id="th">Biaya Diklat</th>
						<th class="th" id="th">Biaya SPI</th>
						<th class="th" id="th">Biaya Hotel</th>
						<th class="th" id="th">Biaya Taxi</th>
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
							<a href="<?php echo base_url().''.$this->uri->segment(1).'/edit/'.$r->id_gol;?>" data-toggle="tooltip" title="Edit" class="btn btn-xs btn-white"><i class="fa fa-pencil"></i></a>
							<a href="<?php echo base_url().''.$this->uri->segment(1).'/delete/'.$r->id_gol;?>" data-toggle="tooltip" title="Delete" class="btn btn-xs btn-red" onclick="return confirm('Anda yakin akan menghapus Golongan?')"><i class="fa fa-times"></i></a>
						</td>
						<td class="td" align="center"><?php echo $i;?></td>
						<td class="td" align="center"><?php echo $r->jenjang;?></td>
						<td class="td"><?php echo $r->nama_gol;?></td>
						<td class="td" align="center"><?php echo strtoupper($r->klasifikasi);?></td>
						<td class="td_right"><?php echo "Rp. ".number_format($r->dalam_kota, 0,'','.');?></td>
						<td class="td_right"><?php echo "Rp. ".number_format($r->raskin, 0,'','.');?></td>
						<td class="td_right"><?php echo "Rp. ".number_format($r->management_reg, 0,'','.');?></td>
						<td class="td_right"><?php echo "Rp. ".number_format($r->management_diklat, 0,'','.');?></td>
						<td class="td_right"><?php echo "Rp. ".number_format($r->spi, 0,'','.');?></td>
						<td class="td_right"><?php echo "Rp. ".number_format($r->u_hotel, 0,'','.');?></td>
						<td class="td_right"><?php echo "Rp. ".number_format($r->u_taxi, 0,'','.');?></td>
					</tr>
					<?php $i++;}?>
				</tbody>
			</table>
					
		</div>
	</div>
</div>