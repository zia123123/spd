<div class="main-content">
	<div class="panel panel-default col-md-6">
		<div class="panel-heading">
			<h3 class="panel-title"># Daftar User Aplikasi</h3>
			<div class="panel-options">
							
			</div>
		</div>
		
		<div class="panel-body">
			<a href="<?php echo site_url('users/post');?>" class="btn btn-success btn-sm">
				<i class="fa-plus"></i>
				<span>Tambah User</span>
			</a>			
			<table id="example-1" class="table table-striped table-hover" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th class="th" id="th">Options</th>
						<th class="th" id="th">No</th>
						<th class="th" id="th">Username</th>
						<th class="th" id="th">Hak Akses</th>
						<th class="th" id="th">Last Login</th>
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
									<a href="<?php echo base_url().''.$this->uri->segment(1).'/edit/'.$r->id_users;?>" data-toggle="tooltip" title="Edit" class="btn btn-xs btn-white"><i class="fa fa-pencil"></i></a>
									<a href="<?php echo base_url().''.$this->uri->segment(1).'/delete/'.$r->id_users;?>" data-toggle="tooltip" title="Delete" class="btn btn-xs btn-red" onclick="return confirm('Anda yakin akan menghapus User?')"><i class="fa fa-times"></i></a>
								</td>
								<td class="td"><?php echo $i;?></td>
								<td class="td"><?php echo $r->username;?></a></td>
								<td class="td">
									<?php
									if($r->level==1)
									{
									echo "Admin";
									}
									elseif($r->level==2)
									{
									echo "Pegawai";
									}
									?>
								</td>
								<td class="td"><?php echo tgl_indo($r->last_login);?></td>
							</tr>
							<?php $i++;}?>
				</tbody>
			</table>
					
		</div>
	</div>
</div>