<div class="main-content">
	<div class="panel panel-default col-md-5">
		<div class="panel-heading">
			<h3 class="panel-title"># Setting</h3>
			<div class="panel-options">
							
			</div>
		</div>
		
		<div class="panel-body">
			<table id="example-1" class="table table-striped" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th class="th" id="th">Options</th>
						<th class="th" id="th">BBM Per Hari (Liter)</th>
						<th class="th" id="th">Jumlah Liter BBM per 1 KM</th>
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
							<a href="<?php echo base_url().''.$this->uri->segment(1).'/edit/'.$r->id_setting;?>" data-toggle="tooltip" title="Edit" class="btn btn-xs btn-white"><i class="fa fa-pencil"></i></a>
						</td>
						<td class="td"><?php echo $r->harian_bbm. " Liter / Hari ";?></td>
						<td class="td"><?php echo $r->perkalian_bbm. " Liter / 1 KM";?></td>
					</tr>
					<?php $i++;}?>
				</tbody>
			</table>
					
		</div>
	</div>
</div>