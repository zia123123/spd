<div class="main-content">
	<div class="panel panel-default col-md-10">
		<div class="panel-heading">
			<h3 class="panel-title"># Pejabat Tanda Tangan</h3>
			<div class="panel-options">
							
			</div>
		</div>
		
		<div class="panel-body">
			<table id="example-1" class="table table-striped" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th class="th" id="th">Options</th>
						<th class="th" id="th">Pemeriksa 1</th>
						<th class="th" id="th">Jabatan 1</th>
						<th class="th" id="th">Pemeriksa 2</th>
						<th class="th" id="th">Jabatan 2</th>
						<th class="th" id="th">Pemeriksa 3</th>
						<th class="th" id="th">Jabatan 3</th>
						<th class="th" id="th">Pemeriksa 4</th>
						<th class="th" id="th">Jabatan 4</th>
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
							<a href="<?php echo base_url().''.$this->uri->segment(1).'/edit/'.$r->id_pejabat_ttd;?>" data-toggle="tooltip" title="Edit" class="btn btn-xs btn-white"><i class="fa fa-pencil"></i></a>
						</td>
						<td class="td"><?php echo $r->pemeriksa_1;?></td>
						<td class="td"><?php echo $r->jabatan_1;?></td>
						<td class="td"><?php echo $r->pemeriksa_2;?></td>
						<td class="td"><?php echo $r->jabatan_2;?></td>
						<td class="td"><?php echo $r->pemeriksa_3;?></td>
						<td class="td"><?php echo $r->jabatan_3;?></td>
						<td class="td"><?php echo $r->pemeriksa_4;?></td>
						<td class="td"><?php echo $r->jabatan_4;?></td>
					</tr>
					<?php $i++;}?>
				</tbody>
			</table>
					
		</div>
	</div>
</div>