<div class="main-content">
	<div class="panel panel-default col-md-10">
		<div class="panel-heading">
			<h3 class="panel-title"># PAGU</h3>
			<div class="panel-options">
							
			</div>
		</div>
		
		<div class="panel-body col-md-6">
			<a href="<?php echo site_url('pagu/post');?>" class="btn btn-success btn-sm">
				<i class="fa-plus"></i>
				<span>Tambah PAGU</span>
			</a>
			
			<table id="example-1" class="table table-striped table-hover" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th class="th" id="th">Options</th>
						<th class="th" id="th">No</th>
						<th class="th" id="th">Bulan</th>
						<th class="th" id="th">Tahun</th>
						<th class="th" id="th">PAGU</th>
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
							<a href="<?php echo base_url().''.$this->uri->segment(1).'/edit/'.$r->id_pagu;?>" data-toggle="tooltip" title="Edit" class="btn btn-xs btn-white"><i class="fa fa-pencil"></i></a>
							<a href="<?php echo base_url().''.$this->uri->segment(1).'/delete/'.$r->id_pagu;?>" data-toggle="tooltip" title="Delete" class="btn btn-xs btn-red" onclick="return confirm('Anda yakin akan menghapus PAGU?')"><i class="fa fa-times"></i></a>
						</td>
						<td class="td"><?php echo $i;?></td>
						<td class="td"><?php echo strtoupper($r->bulan);?></td>
						<td class="td"><?php echo $r->tahun;?></td>
						<td class="td"><?php echo number_format($r->pagu, 0,'','.');?></td>
						
					</tr>
					<?php $i++;}?>
				</tbody>
			</table>
					
		</div>
	</div>
</div>