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
			<h3 class="panel-title"># Nota Intern</h3>
			<div class="panel-options">
							
			</div>
		</div>
		
		<div class="panel-body">
			<a href="<?php echo site_url('notaintern/post');?>" class="btn btn-success btn-sm">
				<i class="fa-plus"></i>
				<span>Buat Nota Intern</span>
			</a>
			<script type="text/javascript">
			jQuery(document).ready(function($)
			{
				$("#example-2").dataTable({
					scrollY: "360px",
					scrollX: true,
					"sortable" : false,
					scrollCollapse: false,
					"order": [[ 2, "desc" ]],
					fixedColumns:   {
						leftColumns: 0
					},
					aLengthMenu: [
						[25, 50, 100, -1], [25, 50, 100, "All"]
					]
				});
			});
			</script>
			
			<table id="example-2" class="table table-striped table-hover" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th class="th" id="th" style="width:120px">Options</th>
						<th class="th" id="th" style="width:40px">No</th>
						<th class="th" id="th" style="width:200px">No NI</th>
						<th class="th" id="th" style="width:100px">Tanggal NI</th>
						<th class="th" id="th">Perihal</th>
						<th class="th" id="th">Nominal</th>
						<th class="th" id="th">Jenis NI</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$i=1;
					foreach ($record as $r)
					{
					?>
					
					<tr>
						<td class="td">
								<?php if ($r->status_ni == '1'){ ?>
								<a href="<?php echo base_url().''.$this->uri->segment(1).'/cetak_ni/'.$r->id_ni.'/'.trim(substr($r->tgl_ni,0,10));?>" data-toggle="tooltip" title="Cetak" class="btn btn-xs btn-white" target="_blank"><i class="fa fa-print"></i></a>
								<a href="<?php echo base_url().''.$this->uri->segment(1).'/edit/'.$r->id_ni;?>" data-toggle="tooltip" title="Edit" class="btn btn-xs btn-white"><i class="fa fa-pencil"></i></a>
								<a href="<?php echo base_url().''.$this->uri->segment(1).'/delete/'.$r->id_ni;?>" data-toggle="tooltip" title="Hapus" onclick="return confirm('Anda yakin akan menghapus NI?')" class="btn btn-xs btn-white"><i class="fa fa-trash-o"></i></a>
								<?php } elseif($r->status_ni == '0' or $r->status_ni == '2') { ?>
								<a href="<?php echo base_url().''.$this->uri->segment(1).'/cetak_ni/'.$r->id_ni.'/'.trim(substr($r->tgl_sppd,0,10));?>" data-toggle="tooltip" title="Cetak" class="btn btn-xs btn-white" target="_blank"><i class="fa fa-print"></i></a>
								<a href="<?php echo base_url().''.$this->uri->segment(1).'/edit/'.$r->id_ni;?>" data-toggle="tooltip" title="Edit" class="btn btn-xs btn-white"><i class="fa fa-pencil"></i></a>
								<a href="<?php echo base_url().''.$this->uri->segment(1).'/delete/'.$r->id_ni;?>" data-toggle="tooltip" title="Hapus" onclick="return confirm('Anda yakin akan menghapus NI?')" class="btn btn-xs btn-white"><i class="fa fa-trash-o"></i></a>
								<?php } elseif($r->status_ni == '9') { ?>
								<a href="<?php echo base_url().''.$this->uri->segment(1).'/cetak_ni/'.$r->id_ni.'/'.trim(substr($r->tgl_sppd,0,10));?>" data-toggle="tooltip" title="Cetak" class="btn btn-xs btn-white" target="_blank"><i class="fa fa-print"></i></a>
								<?php } ?>
						
						</td>
						
						
						<td class="td" align="center" style="font-size:10pt;"><?php echo $i; ?></td>
						<td class="td" style="font-size:10pt;"><?php echo str_pad($r->no_ni,3, "0", STR_PAD_LEFT).$r->kode_ni; ?></td>
						
						<td class="td" style="font-size:10pt;"><?php echo trim(substr($r->tgl_ni,0,10)); ?></td>
						<td class="td" style="font-size:10pt;"><?php echo $r->perihal; ?></td>
						<td class="td"><?php echo "Rp. ".number_format($r->nominal, 0,'','.');?></td>
						<td class="td" style="font-size:10pt;"><?php echo $r->jenis_ni; ?></td>
					</tr>
					<?php $i++;}?>
				</tbody>
			</table>	
		</div>
	</div>
</div>