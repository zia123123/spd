<div class="main-content">
	<div class="panel panel-default col-md-5">
		<div class="panel-heading">
			<h3 class="panel-title"># Daftar BBM</h3>
			<div class="panel-options">
							
			</div>
		</div>
		
		<div class="panel-body">
			<a href="<?php echo site_url('bahanbakar/post');?>" class="btn btn-success btn-sm">
				<i class="fa-plus"></i>
				<span>Tambah BBM</span>
			</a>
			
			<table id="example-1" class="table table-striped table-hover" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th class="th" id="th">Options</th>
						<th class="th" id="th">No</th>
						<th class="th" id="th">Jenis BBM</th>
						<th class="th" id="th">Harga Per Liter</th>
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
							<a href="<?php echo base_url().''.$this->uri->segment(1).'/edit/'.$r->id_bbm;?>" data-toggle="tooltip" title="Edit" class="btn btn-xs btn-white"><i class="fa fa-pencil"></i></a>
							<a href="<?php echo base_url().''.$this->uri->segment(1).'/delete/'.$r->id_bbm;?>" data-toggle="tooltip" title="Delete" class="btn btn-xs btn-red" onclick="return confirm('Anda yakin akan menghapus BBM?')"><i class="fa fa-times"></i></a>
						</td>
						<td class="td"><?php echo $i;?></td>
						<td class="td"><?php echo strtoupper($r->jenis_bbm);?></td>
						<td class="td"><?php echo "Rp. ".number_format($r->perliter, 0,'','.');?></td>
					</tr>
					<?php $i++;}?>
				</tbody>
			</table>
					
		</div>
	</div>
</div>