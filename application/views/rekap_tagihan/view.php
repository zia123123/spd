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
			<h3 class="panel-title"># Rekapitulasi Tagihan</h3>
			<div class="panel-options">
							
			</div>
		</div>
		
		<div class="panel-body">
			<div class="table-toolbar">
				<form action="<?php echo site_url('export_xls');?>" method="post">
				<table border="0">
				<tr>
					<td width="50px"> Dari : </td>
					<td width="170px"><input class="form-control datepicker" data-format="dd-mm-yyyy" type="text" name="tgl_skpd" placeholder="DD/MM/YYYY" value="" style="width:150px;"/></td>
					<td width="40px"> Ke : </td>
					<td width="170px"><input class="form-control datepicker" data-format="dd-mm-yyyy" type="text" name="tgl_skpd" placeholder="DD/MM/YYYY" value="" style="width:150px;"/></td>
					<td width="170px"><input class="btn default" type="submit" value="Export Excel" name="export_excel"/>
				</tr>
				</table>
				</form>
			</div>
			<script type="text/javascript">
			jQuery(document).ready(function($)
			{
				$("#example-2").dataTable({
					"scrollX": true,
					"sortable" : false,
					 "order": [[ 2, "asc" ]],
					aLengthMenu: [
						[25, 50, 100, 150, -1], [25, 50, 100, 150, "All"]
					]
				});
			});
			</script>
			
			<table id="example-2" class="table table-striped table-hover" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th class="th" id="th">No</th>
						<th class="th" id="th">Uraian &#8195;&#8195;&#8195;&#8195;&#8195;&#8195;&#8195;&#8195;&#8195;&#8195;&#8195;</th>
						<th class="th" id="th">Nama</th>
						<th class="th" id="th">GOL</th>
						<th class="th" id="th">Tujuan</th>
						<th class="th" id="th">Hari</th>
						<th class="th" id="th">Hotel&#8195;&#8195;&#8195;</th>
						<th class="th" id="th">Tiket (lumpsum)</th>
						<th class="th" id="th">Taxi&#8195;&#8195;&#8195;</th>
						<th class="th" id="th">Uang Harian</th>
						<th class="th" id="th">Repres&#8195;&#8195;</th>
						<th class="th" id="th">Jumlah&#8195;&#8195;&#8195;&#8195;</th>
						<th class="th" id="th">PPH</th>
						<th class="th" id="th">Potongan&#8195;</th>
						<th class="th" id="th">Tiket dibelikan Perusahaan</th>
						<th class="th" id="th">Total&#8195;&#8195;&#8195;&#8195;</th>
						<th class="th" id="th">Jumlah diterima</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$i=1;
					foreach ($record as $r)
					{
					$tgl_fax= date("Y-m-d", strtotime($r->tgl_fax));
					$tgl_skpd= date("Y-m-d", strtotime($r->tgl_skpd));
					$tiket_brgkt = $r->uang_pesawat_b+$r->uang_kereta_b+$r->uang_travel_b;
					$tiket_pulang = $r->uang_pesawat_p+$r->uang_kereta_p+$r->uang_travel_p;
					?>
					<tr>
						<td class="td"><?php echo $i; ?></td>
						<td class="td">
							<?php echo $r->no_fax."<br/>".tgl_indo($tgl_fax)."<br/>"; ?>
							<?php echo "SKPD No. ".str_pad($r->no_skpd,4, "0", STR_PAD_LEFT).$r->attr_skpd."<br/>".tgl_indo($tgl_skpd); ?>
						</td>
						<td class="td"><?php echo $r->nama_pelaksana; ?></td>
						<td class="td"><?php echo romawi($r->gol); ?></td>
						<td class="td">
							<?php if ($r->tmpt_tujuan == "Perum Bulog Kantor Pusat Jakarta") { echo "Jakarta"; } else { echo "-"; } ?>
						</td>							
						<td class="td"><?php echo $r->durasi_tgs; ?> Hari</td>
						<td class="td"><?php echo "Rp. ".number_format($r->uang_hotel, 0,'','.');?></td>
						<td class="td"><?php echo "Rp. ".number_format($tiket_brgkt, 0,'','.');?></td>
						<td class="td"><?php echo "Rp. ".number_format($r->uang_taxi, 0,'','.');?></td>
						<td class="td"><?php echo "Rp. ".number_format($r->uang_harian, 0,'','.');?></td>
						<td class="td"><?php echo "Rp. ".number_format($r->uang_repres, 0,'','.');?></td>
						<td class="td"><?php echo "Rp. ".number_format($r->jumlah, 0,'','.');?></td>
						<td class="td"><?php echo $r->pph;?>&#37;</td>
						<td class="td"><?php echo "Rp. ".number_format($r->potongan, 0,'','.');?></td>
						<td class="td"><?php echo "Rp. ".number_format($tiket_pulang, 0,'','.');?></td>
						<td class="td"><?php echo "Rp. ".number_format($r->total, 0,'','.');?></td>
						<td class="td"><?php echo "Rp. ".number_format($r->jumlah_diterima, 0,'','.');?></td>
					</tr>
					<?php $i++;}?>
				</tbody>
			</table>
		</div>
	</div>
</div>