<div class="main-content">
	<div class="panel panel-default col-md-3">
		<div class="panel-heading">
			<h3 class="panel-title"># Uang Representatif</h3>
			<div class="panel-options">
							
			</div>
		</div>
		
		<div class="panel-body">
			<table id="example-1" class="table table-striped" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th class="th" id="th">Options</th>
						<th class="th" id="th">Uang Representatif</th>
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
							<a href="<?php echo base_url().''.$this->uri->segment(1).'/edit/'.$r->id_repres;?>" data-toggle="tooltip" title="Edit" class="btn btn-xs btn-white"><i class="fa fa-pencil"></i></a>
						</td>
						<td class="td"><?php echo "Rp. ".number_format($r->u_repres, 0,'','.');?> / Hari</td>
					</tr>
					<?php $i++;}?>
				</tbody>
			</table>
					
		</div>
	</div>
</div>