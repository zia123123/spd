<?php 

tcpdf();
$custom_layout = array(215, 330);
$obj_pdf = new TCPDF('P', 'pt', $custom_layout, true, 'UTF-8', false);
$obj_pdf->SetCreator(PDF_CREATOR);
$title = "SPPD";
$obj_pdf->SetTitle($title);
$obj_pdf->SetAuthor('Kanwil Jabar');

//$obj_pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, $title, PDF_HEADER_STRING);
$obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
$obj_pdf->setPrintHeader(false);
$obj_pdf->setPrintFooter(false);
$obj_pdf->SetDefaultMonospacedFont('helvetica');
$obj_pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
//$obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
$obj_pdf->SetMargins(0, 0, 0);
$obj_pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
$obj_pdf->SetFont('helvetica', '', 11.5);
$obj_pdf->setFontSubsetting(false);

ob_start();
$obj_pdf->SetDisplayMode('fullpage', 'SinglePage', 'UseNone');

$obj_pdf->startPageGroup();
$obj_pdf->AddPage('P', 'F4');
?>
<style type="text/css">
.judul {
	font-weight:bold;
	text-align:center;
	font-size:14pt;
	line-height:20px;
}
table.gridtable {
	width:100%;
}
table.gridtable th {
	padding: 4px;
	text-align:center;
	font-weight:bold;
	border:solid 2px #000;
}
table.gridtable td {
	padding: 4px;
	border:solid 1px #000;
}
</style>

<div>
	<table border="0">
	<tr>
		<td colspan="3" height="10px"> &nbsp;</td>
	</tr>
	<tr>
		<td width="20px"> &nbsp;</td>
		<td><img src="xenon/images/logo_bulog_skpd.png" style="width:110px;"/></td>
		<td> &nbsp;</td>
	</tr>
	</table>
		
	
	<!--
	<table border="0" style="line-height:12px;font-size:10pt;">
	<tr>
		<td rowspan="5" width="40px"></td>
		<td colspan="2">Kantor Wilayah Jawa Barat</td>
	</tr>
	<tr>
		<td colspan="2">Jl. Soekarno Hatta No.711a</td>
	</tr>
	<tr>
		<td colspan="2">Bandung</td>
	</tr>
	<tr>
		<td width="35px" class="header_kop">Telp </td>
		<td class="header_kop"> : (022) 730309 / 95 </td>
	</tr>
	<tr>
		<td class="header_kop">Fax </td>
		<td class="header_kop"> : (022) 7303093 </td>
	</tr>
	</table>
	-->
	<?php
	if(isset($get_data_sppd)){
		
	foreach($get_data_sppd as $row){
		$id_sppd = $row->id_sppd;
	?>
	<br/><br/>
	<table border="0" width="100%">
	<tr>
		<td rowspan="6" width="70px"></td>
		<td colspan="3" width="460px" height="30px">
			<p class="judul"><u>SURAT PERMOHONAN PERJALANAN DINAS</u>
			</p>
		</td>
	</tr>
	<tr>
		<td align="right" width="200px"> Kepada Yth </td>
		<td align="center" width="40px"> : </td>
		<td align="left" width="220px"><?php echo $row->jab_pemberi_tgs; ?></td>
	</tr>
	<tr>
		<td align="right"> Dari </td>
		<td align="center"> : </td>
		<td align="left"><?php echo $row->jab_pemohon_tgs; ?></td>
	</tr>
	<tr>
		<td colspan="3"> &nbsp; </td>
	</tr>
	<tr>
		<td style="text-align:justify;" colspan="3">
			<?php echo $row->dasar_sppd; ?>
		</td>
	</tr>
	<tr>
		<td> &nbsp; </td>
	</tr>
	</table>
	
	<table border="0" class="" width="100%">
	<tr>
		<td rowspan="20" width="70px" style="border:none;"></td>
		<td colspan="6" style="border:none;height:20px;">Menerangkan bahwa, Karyawan tersebut dibawah ini :</td>
	</tr>
	
	
	<?php
		}
	}
	if(isset($get_ketua_pelaksana_sppd)){
	foreach($get_ketua_pelaksana_sppd as $row){
	?>
	<tr>
		<td colspan="2" width="140px">Nama / NIP</td>
		<td width="30px">:</td>
		<?php
		if ($row->jenjang == "tenaga"){
		?>
		<td width="250px"><?php echo $row->nama_pelaksana." / - "; ?></td>
		<?php } else { ?>
		<td width="250px"><?php echo $row->nama_pelaksana." / ".$row->nip; ?></td>
		<?php } ?>
	</tr>
	<tr>
		<td colspan="2" width="140px">Jenjang / Jabatan</td>
		<td width="30px">:</td>
		<td>
			<?php 
				if ($row->jenjang == "99"){
					echo "Utama";
				} elseif ($row->jenjang == "non1") {
					echo "Non Jenjang Utama dan Madya";
				} elseif ($row->jenjang == "non0") {
					echo "Non Jenjang Muda";
				} else {
					echo romawi($row->jenjang);
				}
				echo " / ";
				if ($row->jabatan == "Pemimpin"){
					echo "Pemimpin";
				} elseif ($row->jabatan == "Wakil Pemimpin") {
					echo "Wakil Pemimpin";
				} else {
					echo $row->jabatan;
				}
			?>
		</td>
	</tr>
	<?php
	}
	}
	?>
	<tr>
		<td colspan="6" style="border:none;" height="5px">&nbsp;</td>
	</tr>
	</table>
	<table border="0" class="gridtable" width="100%">
	<tr>
		<td rowspan="20" width="70px" style="border:none;"></td>
		<td colspan="6" style="border:none;">Pengikut</td>
	</tr>
	<tr>
		<th width="25px">No</th>
		<th width="140px">Nama</th>
		<th width="70px">NIP</th>
		<th width="170px">Jenjang/Jabatan</th>
		<th width="80px">Unit Kerja</th>
	</tr>
	<?php if($get_pelaksana_sppd == NULL){ ?>
	<tr>
		<td align="center"> - </td>
		<td align="center"> - </td>
		<td align="center"> - </td>
		<td align="center"> - </td>
		<td align="center"> - </td>
		<td align="center"> - </td>
	</tr>
	<?php } else { 
	$no = 1;
	
	foreach($get_pelaksana_sppd as $row){
	?>
	<tr>
		<td align="center"><?php echo $no++; ?></td>
		<!--<td><?php echo ucwords(strtolower($row->nama_pelaksana)); ?></td>-->
		<td><?php echo $row->nama_pelaksana; ?></td>
		<?php if (substr($row->noreg,0,4) == '1111' or substr($row->noreg,0,4) == '2222') { ?>
		<td align="center">-</td>
		<td align="center">-</td>
		<?php } else { ?>
		<td align="center"><?php echo $row->nip; ?></td>
		<td align="center">
			<?php 
			if ($row->jenjang == "99"){
				echo "Utama";
			} elseif ($row->jenjang == "non1") {
				echo "Non Jenjang Utama dan Madya";
			} elseif ($row->jenjang == "non0") {
				echo "Non Jenjang Muda";
			} else {
				echo romawi($row->jenjang);
			}
			echo " / ";
			if ($row->jabatan == "Pemimpin"){
				echo "Pemimpin";
			} elseif ($row->jabatan == "Wakil Pemimpin") {
				echo "Wakil Pemimpin";
			} else {
				echo $row->jabatan;
			}
			?>
			
		</td>
		<?php } ?>
		
		<td align="center"><?php echo $row->unit_kerja; ?></td>
	</tr>
	<?php } } ?>
	</table>
	
	<br/>
	<?php
	if(isset($get_data_sppd)){
		
	foreach($get_data_sppd as $row){
	?>
	<br/>
	<table border="0">
	<tr>
		<td rowspan="8" width="70px"></td>
		<td colspan="2">
			<b>Rincian Tugas :</b>
		</td>
	</tr>
	<tr>
		<td width="180px">Durasi Tugas</td>
		<td width="15px">:</td>
		<td width="275px"><?php echo $row->durasi_tgs." (".to_word($row->durasi_tgs); ?> ) Hari</td>
	</tr>
	<tr>
		<td>Tempat Keberangkatan</td>
		<td>:</td>
		<td><?php echo ucwords(strtolower($row->tmpt_keberangkatan)); ?></td>
	</tr>
	<tr>
		<td>Sarana Angkutan yang digunakan</td>
		<td>:</td>
		<td><?php echo ucwords(strtolower($row->angkutan)); ?></td>
	</tr>
	<tr>
		<td>Tempat Tujuan & <br/>Waktu Keberangkatan</td>
		<td>:</td>
		<td align="justify">
			<?php echo $row->tmpt_tujuan; ?> <br/>
			<?php 
			$tgl_brgkt = date("Y-m-d", strtotime($row->tgl_keberangkatan));
			//echo $tgl_brgkt;
			$tgl_brgkt_indo = tgl_indo($tgl_brgkt);
			$tgl_pulang = date("Y-m-d", strtotime($row->tgl_kepulangan));
			$tgl_pulang_indo = tgl_indo($tgl_pulang);
			
			$tgl_sppd= date("Y-m-d", strtotime($row->tgl_sppd));
			$tanggal= date("dmY", strtotime($row->tgl_sppd));
			$tgl_sppd_indo = tgl_indo($tgl_sppd);
			echo "( ".$tgl_brgkt_indo." s.d ".$tgl_pulang_indo." )";
			?>
		</td>
	</tr>
	<tr>
		<td>Tugas yang dilaksanakan</td>
		<td>:</td>
		<td align="justify"><?php echo ucwords($row->tugas); ?></td>
	</tr>
	<tr>
		<td>Keterangan lain</td>
		<td>:</td>
		<td align="justify"><?php echo ucwords($row->ket); ?></td>
	</tr>
	</table>
	<br/><br/>
	<table border="0">
	<tr>
		<td width="70px"></td>
		<td width="310px"></td>
		<td>Bandung, <?php echo $tgl_sppd_indo; ?></td>
	</tr>
	<tr>
		<td rowspan="7" width="100px" height="15px"> </td>
		<td width="280px" ><u>Pemberi Tugas</u></td>
		<td><u>Pemohon Tugas</u></td>
	</tr>
	<tr>
		<td>Setuju Menugaskan</td>
		<td></td>
	</tr>
	<tr>
		<td height="50px"></td>
	</tr>
	<tr>
		<!--
		<td><b><?php echo ucwords(strtolower($row->pemberi_tgs));?></b></td>
		<td><b><?php echo ucwords(strtolower($row->pemohon_tgs));?></b></td>
		-->
		<td><b><?php echo $row->pemberi_tgs;?></b></td>
		<td><b><?php echo $row->pemohon_tgs;?></b></td>
	</tr>
	<tr>
		<td>
			<?php 
				if ($row->jab_pemberi_tgs == "Pemimpin"){ 
					echo "Pemimpin";
				} elseif ($row->jab_pemberi_tgs == "Wakil Pemimpin") {
					echo "Wakil Pemimpin";
				} else {
					//echo ucwords(strtolower($row->jab_pemberi_tgs));
					echo $row->jab_pemberi_tgs;
				}
			?>
		</td>
		<td>
			<?php 
				if ($row->jab_pemohon_tgs == "Pemimpin"){ 
					echo "Pemimpin";
				} elseif ($row->jab_pemohon_tgs == "Wakil Pemimpin") {
					echo "Wakil Pemimpin";
				} else {
					//echo ucwords(strtolower($row->jab_pemohon_tgs));
					echo $row->jab_pemohon_tgs;
				}
			?>
		</td>
	</tr>
	</table> <br/>
	
	<table>
	<tr>
		<td width="70px"></td>
		<td><small><i>By. <?php echo $row->jenis_plafond;?></i></small></td>
	</tr>

	</table>	
	
	<table border="0">
	<tr>
		<td height="10px"> &nbsp;</td>
		<td> &nbsp; </td>
		<td rowspan="2" align="right"><img src="xenon/images/logo7.png" style="height:170px"/></td>
	</tr>
	<tr>
		<td width="20px"> &nbsp;</td>
		<td>
			<br/><br/><br/><br/><br/><br/><br/>
			<img src="xenon/images/Picture3.png" style="width:175px;"/>
		</td>
	</tr>
	</table>
<?php
	}
	}
?>
</div>
<?php
// we can have any view part here like HTML, PHP etc
$content = ob_get_contents();
ob_end_clean();
$obj_pdf->writeHTML($content, true, false, true, false, '');
//$obj_pdf->Output('SPPD-'.$id_sppd."-".$tgl_sppd.'.pdf', 'I');
$obj_pdf->Output($id_sppd.'_SPPD_'.$tanggal.'.pdf', 'I');
?>