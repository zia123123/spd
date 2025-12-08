<title> SPPD </title>
<style type="text/css">

td {
	font-size:12pt;
	font-family:Arial;
}

.header_kop {
	font-size:10pt;
	font-family:Arial;
}

.header{
	text-align:left;
	position:fixed;
	border:solid 0px;
}
.content {
	font-family:Arial;
	position:relative;
	top:130px;
	left:60px;
	border:solid 0px;
}
.judul1 {
	font-family:Arial;
	font-weight:bold;
	text-align:center;
	font-size:14pt;
	line-height:20px;
}
.judul2 {
	font-family:Arial;
	text-align:center;
	
}
.judul p{
	font-family:Arial;
}
.judul p b{
	font-family:Arial;
}
.footer {
    width: 100%;
    text-align: left;
    position: fixed;
	color:#e36c0a;
	font-family:Arial;
}
.header {
    top: -20px;
}
.footer {
	left:20px;
    bottom: 0px;
	border:solid 0px;
}
.pagenum:before {
    content: counter(page);
}


</style>

<style type="text/css">
table.gridtable {
	font-family: arial;
	font-size:12pt;
	color:#000;
	border-width: 1px;
	border-color: #000;
	border-collapse: collapse;
}
table.gridtable th {
	border-width: 1px;
	font-size:12pt;
	padding: 4px;
	border-style: solid;
	border-color: #000;
}
table.gridtable td {
	border-width: 1px;
	font-size:12pt;
	padding: 4px;
	border-style: solid;
	border-color: #000;
}
</style>

<div style="border:solid 0px; width:100%;margin:auto;">
<div class="header">
	
    <img src="assets/images/logo_bulog.png" style="width:175px"/><br/>
	<table style="width:85%;position:relative;left:55px;line-height:60%;">
	<tr>
		<td colspan="2" class="header_kop">Kantor Divre Jawa Tengah</td>
	</tr>
	<tr>
		<td colspan="2" class="header_kop">Jl. Menteri Supeno I / 1</td>
	</tr>
	<tr>
		<td colspan="2" class="header_kop">Semarang</td>
	</tr>
	<tr>
		<td width="5px" class="header_kop"> Telp </td>
		<td class="header_kop"> : (024) 8412290 </td>
	</tr>
	<tr>
		<td class="header_kop"> Fax </td>
		<td class="header_kop"> : (024) 8412369 </td>
	</tr>
	</table>
	<?php
	if(isset($get_data_sppd)){
		
	foreach($get_data_sppd as $row){
	?>
	<table border="0" style="width:80%;left:55px;position:relative;line-height:60%;">
	<tr>
		<td colspan="3">
			<p class="judul1">SURAT PERMOHONAN PERJALANAN DINAS
			<br/>( SPPD )</p>
		</td>
	</tr>
	<tr>
		<td width="250px" align="right" height="20px"> Kepada Yth </td>
		<td width="5px" align="center"> : </td>
		<td align="left"><?php echo ucwords(strtolower($row->jab_pemberi_tgs)); ?></td>
	</tr>
	<tr>
		<td align="right"> Dari </td>
		<td width="5px" align="center"> : </td>
		<td align="left"><?php echo ucwords(strtolower($row->jab_pemohon_tgs)); ?></td>
	</tr>
	<tr>
		<td colspan="3"><p style="width:100%;border-bottom:solid 1px"> </p></td>
	</tr>
	<tr>
		<td colspan="3" height="25px"><p style="width:100%;">  </p></td>
	</tr>
	<tr>
		<td colspan="3">
			<p style="width:100%;line-height:100%;text-align:justify;font-size:12pt;margin:auto;"> 
				Bersama ini mohon agar kepada nama/nama-nama berikut ini diperintahkan melaksanakan Perjalanan Dinas dengan rincian sebagai berikut :
			</p>
		</td>
	</tr>
	</table>
	
	<table class="gridtable" style="width:85%;position:relative;left:55px;line-height:60%;">
	<tr>
		<td colspan="6" style="border:none;">
			<p style="width:100%;line-height:100%;text-align:justify;font-size:12pt;margin:auto;"> 
				Ketua Pelaksana Tugas :
			</p>
		</td>
	</tr>
	<tr>
		<th width="1px">No.</th>
		<th >Nama</th>
		<th width="70px">No Reg</th>
		<th width="70px">Golongan</th>
		<th width="130px">Jabatan</th>
		<th width="90px">Unit Kerja</th>
	</tr>
	
	<?php
		}
	}
	if(isset($get_ketua_pelaksana_sppd)){
	foreach($get_ketua_pelaksana_sppd as $row){
	?>
	<tr>
		<td align="center">1</td>
		<td><?php echo ucwords(strtolower($row->nama_pegawai)); ?></td>
		<td align="center"><?php echo $row->noreg; ?></td>
		<td align="center"><?php echo $row->golongan; ?></td>
		<td align="center"><?php echo $row->jabatan; ?></td>
		<td align="center"><?php echo $row->unitkerja; ?></td>
	</tr>
	<?php
	}
	}
	?>
	
	<tr>
		<td colspan="6" style="border:none;" height="5px">
			<p style="width:100%;line-height:100%;text-align:justify;font-size:12pt;margin:auto;"> 
			</p>
		</td>
	</tr>
	<tr>
		<td colspan="6" style="border:none;">
			<p style="width:100%;line-height:100%;text-align:justify;font-size:12pt;margin:auto;"> 
				Pelaksana Tugas :
			</p>
		</td>
	</tr>
	
	<tr>
		<th width="1px">No.</th>
		<th >Nama</th>
		<th width="70px">Noreg</th>
		<th width="70px">Golongan</th>
		<th width="130px">Jabatan</th>
		<th width="90px"><?php echo $row->unitkerja; ?></th>
	</tr>
	<?php
	$no = 1;
	if(isset($get_pelaksana_sppd)){
	foreach($get_pelaksana_sppd as $row){
	?>
	<tr>
		<td align="center"><?php echo $no++; ?></td>
		<td><?php echo ucwords(strtolower($row->nama_pegawai)); ?></td>
		<td align="center"><?php echo $row->noreg; ?></td>
		<td align="center"><?php echo $row->golongan; ?></td>
		<td align="center"><?php echo $row->jabatan; ?></td>
		<td align="center"><?php echo $row->unitkerja; ?></td>
	</tr>
	<?php } } ?>
	</table>
	
	<br/>
	<?php
	if(isset($get_data_sppd)){
		
	foreach($get_data_sppd as $row){
	?>
	<table class="gridtable" style="width:85%;position:relative;left:55px;line-height:60%;">
	<tr>
		<td colspan="2" style="border:none;">
			<p style="width:100%;line-height:100%;text-align:justify;font-size:12pt;margin:auto;"> 
				Rincian Tugas :
			</p>
		</td>
	</tr>
	<tr>
		<td style="border:none;" width="200px">- Durasi Tugas</td>
		<td style="border:none;">: <?php echo $row->durasi_tgs." (".to_word($row->durasi_tgs); ?> ) Hari</td>
	</tr>
	<tr>
		<td style="border:none;">- Tempat Keberangkatan</td>
		<td style="border:none;">: <?php echo ucwords(strtolower($row->tmpt_keberangkatan)); ?></td>
	</tr>
	<tr>
		<td style="border:none;">- Tanggal Keberangkatan</td>
		<?php 
			$tgl_brgkt = date("d F Y", strtotime($row->tgl_keberangkatan));
		?>
		<td style="border:none;">: <?php echo $tgl_brgkt; ?></td>
	</tr>
	<tr>
		<td style="border:none;">- Tempat Tujuan</td>
		<td style="border:none;">: <?php echo $row->tmpt_tujuan; ?></td>
	</tr>
	<tr>
		<td style="border:none;">- Tanggal Kepulangan</td>
		<?php 
			$tgl_pulang = date("d F Y", strtotime($row->tgl_kepulangan));
		?>
		<td style="border:none;">: <?php echo $tgl_pulang; ?></td>
	</tr>
	<tr>
		<td style="border:none;">- Tugas yang dilaksanakan</td>
		<td style="border:none;">: <?php echo ucwords($row->tugas); ?></td>
	</tr>
	</table>
	
	<table class="gridtable" style="width:85%;position:relative;left:55px;line-height:60%;">
	<tr>
		<td style="border:none;" width="20px" height="75px"> </td>
	</tr>
	<tr>
		<td colspan="4" style="border:none;" height="25px">
			<p style="width:100%;line-height:100%;text-align:justify;font-size:12pt;margin:auto;"> 
				Semarang, 20 Oktober 2015
			</p>
		</td>
	</tr>
	<tr>
		<td style="border:none;" width="20px">
			<p style="width:100%;line-height:100%;text-align:justify;font-size:12pt;margin:auto;"> 
			</p>
		</td>
		<td style="border:none;" width="200px"><div style="text-decoration:underline;">Pemberi Tugas</div></td>
		<td style="border:none;">
			<p style="width:100%;line-height:100%;text-align:justify;font-size:12pt;margin:auto;"> 
			</p>
		</td>
		<td style="border:none;" width="145px">Pemohon Tugas</td>
	</tr>
	<tr>
		<td style="border:none;" width="20px">
			<p style="width:100%;line-height:100%;text-align:justify;font-size:12pt;margin:auto;"> 
			</p>
		</td>
		<td style="border:none;" width="200px" colspan="3"><div style="text-decoration:underline;">Setuju menugaskan</div></td>
	</tr>
	<tr>
		<td style="border:none;" width="20px" height="75px"> </td>
	</tr>
	<tr>
		<td style="border:none;" width="20px">
			<p style="width:100%;line-height:100%;text-align:justify;font-size:12pt;margin:auto;"> 
			</p>
		</td>
		<td style="border:none;" width="200px"><div style="text-decoration:none;"><?php echo ucwords(strtolower($row->pemberi_tgs));?></div></td>
		<td style="border:none;">
			<p style="width:100%;line-height:100%;text-align:justify;font-size:12pt;margin:auto;"> 
			</p>
		</td>
		<td style="border:none;"><?php echo ucwords(strtolower($row->pemohon_tgs));?></td>
	</tr>
	<tr>
		<td style="border:none;" width="20px">
			<p style="width:100%;line-height:100%;text-align:justify;font-size:12pt;margin:auto;"> 
			</p>
		</td>
		<td style="border:none;" width="200px"><div style="text-decoration:none;"><?php echo ucwords(strtolower($row->jab_pemberi_tgs)); ?></div></td>
		<td style="border:none;">
			<p style="width:100%;line-height:100%;text-align:justify;font-size:12pt;margin:auto;"> 
			</p>
		</td>
		<td style="border:none;"><?php echo ucwords(strtolower($row->jab_pemohon_tgs)); ?></td>
	</tr>
</div>
<?php
	}
	}
?>
<div class="content">
	
</div>
<div class="footer">
    Bersama Mewujudkan Kedaulatan Pangan 
</div>
</div>
</div>