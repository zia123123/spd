<?php 

tcpdf();
$obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$obj_pdf->SetCreator(PDF_CREATOR);
$title = "SKPD";
$obj_pdf->SetTitle($title);
$obj_pdf->SetAuthor('Divre Jateng');

//$obj_pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, $title, PDF_HEADER_STRING);
$obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
$obj_pdf->setPrintHeader(false);
$obj_pdf->setPrintFooter(false);
$obj_pdf->SetDefaultMonospacedFont('helvetica');
$obj_pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
//$obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
//$obj_pdf->SetMargins(23, PDF_MARGIN_TOP, 23);
$obj_pdf->SetMargins(0, 0, 0);
$obj_pdf->SetAutoPageBreak(TRUE, 15);
$obj_pdf->SetFont('helvetica', '', 11.5);
$obj_pdf->setFontSubsetting(false);

ob_start();
$obj_pdf->SetDisplayMode('fullpage', 'SinglePage', 'UseNone');

$obj_pdf->startPageGroup();
$obj_pdf->AddPage('P', 'A4');
?>
<style type="text/css">
.judul {
	font-weight:bold;
	text-align:center;
	font-size:14pt;
	line-height:20px;
}
.gridtable {
	width:70%; 
    margin-left:15%; 
    margin-right:15%;
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
.smallfont{
	font-size:9pt;
}
.rowpelaksana{
	font-size:10.5pt;
	font-weight:bold;
}
</style>

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
<br/>
<div style="width:100%;">	
	<?php
	if(isset($get_pejabat_ttd)){	
		foreach($get_pejabat_ttd as $row){
			$pemeriksa_4 = $row->pemeriksa_4;
			$pemeriksa_3 = $row->pemeriksa_3;
			$pemeriksa_2 = $row->pemeriksa_2;
			$pemeriksa_1 = $row->pemeriksa_1;
			$jabatan_1 = $row->jabatan_1;
			$jabatan_2 = $row->jabatan_2;
			$jabatan_3 = $row->jabatan_3;
			$jabatan_4 = $row->jabatan_4;
		}
	}
	/*
	if(isset($get_data_sppd)){	
		foreach($get_data_sppd as $row){
			$pemeriksa_1 = $row->pemeriksa_1;
			$pemeriksa_2 = $row->pemeriksa_2;
			$pemeriksa_3 = $row->pemeriksa_3;
			$jabatan_1 = $row->jabatan_1;
			$jabatan_2 = $row->jabatan_2;
			$jabatan_3 = $row->jabatan_3;
		}
	}
	*/
	if(isset($get_data_sppd)){
		
	foreach($get_data_sppd as $row){
	?>
	
	<table border="0px" width="100%">
	<tr>
		<td width="50px">&nbsp;</td>
		<td width="500px">
			<p class="judul"><u>SURAT KETERANGAN PERJALANAN DINAS</u>
				<br/>
				<strong style="text-align:center;font-size:12pt;"> 
					Nomor : <?php 
								$no_skpd = str_pad($row->no_skpd,3, "0", STR_PAD_LEFT)."".$row->attr_skpd; 
								$nomor = str_pad($row->no_skpd,3, "0", STR_PAD_LEFT);
								echo $no_skpd;
							?> 
				</strong>
			</p>
		</td>
		<td width="50px">&nbsp;</td>
	</tr>
	<tr>
		<td style="font-size:5pt;"> &nbsp; </td>
	</tr>
	</table>
	<table border="0px">
	<tr>
	<td width="50px">&nbsp;</td>
	<td width="500px" style="border:solid 1px #000">
	<table class="" width="100%">
	<tr>
		<td width="30px" align="center"><b>I.</b></td>
		<td width="220px"><b>Yang bertanda tangan dibawah ini</b></td>
		<td width="30px"></td>
		<td width="220px"></td>
	</tr>
	<tr>
		<td width="30px"><b>&nbsp;</b></td>
		<td width="150px">a. Nama</td>
		<td width="30px">:</td>
		<td width="220px"><?php echo ucwords(strtolower($pemeriksa_1)); ?></td>
	</tr>
	<tr>
		<td width="30px"><b>&nbsp;</b></td>
		<td width="150px">b. Jabatan</td>
		<td width="30px">:</td>
		<td width="220px"><?php echo ucwords(strtolower($jabatan_1)); ?></td>
	</tr>
	<tr>
		<td colspan="4" width="100%" style="border-bottom:solid 1px #000"> &nbsp; </td>
	</tr>
	<?php
		}
	}
	if(isset($get_ketua_pelaksana_sppd)){
	foreach($get_ketua_pelaksana_sppd as $row){
	?>
	<tr>
		<td width="30px" align="center"><b>II.</b></td>
		<td colspan="3"><b>Menerangkan bahwa, Pejabat tersebut dibawah ini</b></td>
	</tr>
	<tr>
		<td width="30px"><b>&nbsp;</b></td>
		<td width="150px">a. Nama/NIP</td>
		<td width="30px">:</td>
		<td width="220px"><?php echo $row->nama_pelaksana." ".$row->penanda; ?></td>
	</tr>
	<tr>
		<td width="30px"><b>&nbsp;</b></td>
		<td width="150px">b. Jenjang/Jabatan</td>
		<td width="30px">:</td>
		<td width="220px"><?php echo $row->jabatan; ?></td>
	</tr>
	<tr>
		<td colspan="4" width="100%" style="border-bottom:solid 1px #000"> &nbsp; </td>
	</tr>

	<?php
	}
	}
	?>
	<?php
	if(isset($get_data_sppd)){
		
	foreach($get_data_sppd as $row){
	?>
	<tr>
		<td width="30px" align="center"><b>III.</b></td>
		<td width="150px">Akan melaksanakan tugas</td>
		<td width="30px">:</td>
		<td width="290px" align="justify" style="font-size:11pt;"><?php echo ucwords($row->tugas); ?></td>
	</tr>
	<tr>
		<td colspan="4" width="100%" style="border-bottom:solid 1px #000"> &nbsp; </td>
	</tr>
	<tr>
		<td width="30px" align="center"><b>IV.</b></td>
		<td width="150px">Lama Dinas</td>
		<td width="30px">:</td>
		<td width="290px">
			<?php 
				$durasi_malam = $row->durasi_tgs-1;
				echo $row->durasi_tgs." (".to_word($row->durasi_tgs)." ) Hari "; 
				if($row->jenis_biaya == "darat_hotel" or $row->jenis_biaya == "pswt_ka_waka_hotel" or $row->jenis_biaya == "pswt_krywn_hotel"){
					echo " - ".$durasi_malam." (".to_word($durasi_malam)." ) Malam"; 
				}
			  ?>
		</td>
	</tr>
	<tr>
		<td width="30px">&nbsp;</td>
		<td width="150px">Tempat Berangkat</td>
		<td width="30px">:</td>
		<td width="290px"><?php echo ucwords(strtolower($row->tmpt_keberangkatan)); ?></td>
	</tr>
	<tr>
		<td width="30px">&nbsp;</td>
		<td width="150px">Sarana Angkutan</td>
		<td width="30px">:</td>
		<td width="290px"><?php echo ucwords(strtolower($row->angkutan)); ?></td>
	</tr>
	<tr>
		<td width="30px">&nbsp;</td>
		<td width="150px">Tempat Tujuan & <br/>Waktu Keberangkatan</td>
		<td width="30px">:</td>
		<td width="290px">
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
		<td colspan="4" width="100%" style="border-bottom:solid 1px #000"> &nbsp; </td>
	</tr>
	<tr>
		<td width="30px" align="center"><b>V.</b></td>
		<td colspan="3"><b>Pengikut</b></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td colspan="3">
			<table class="gridtable" width="100%">
			<tr>
				<th width="25px">No</th>
				<th width="140px">Nama</th>
				<th width="65px">NIP</th>
				<th width="160px">Jenjang/Jabatan</th>
				<th width="75px">Unit Kerja</th>
			</tr>
			<?php if($get_pelaksana_sppd == NULL){ ?>
			<tr>
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
		</td>
	</tr>
	<tr>
		<td colspan="4">&nbsp;</td>
	</tr>
	<?php
		}
	}
	?>
	<?php
	if(isset($get_data_sppd)){
		
	foreach($get_data_sppd as $row){
	?>
	<tr>
		<td width="30px">&nbsp;</td>
		<td width="150px">Keterangan</td>
		<td width="30px">:</td>
		<td width="290px"><?php echo ucwords(strtolower($row->ket_lain_skpd)); ?></td>
	</tr>
	</table>
	<?php }}?>
	
</td>
<td width="50px">&nbsp;</td>
</tr>
</table>
<table>
<tr>
	<td width="50px">&nbsp;</td>
	<td width="500px">
		<?php
			if(isset($get_data_sppd)){
				
			foreach($get_data_sppd as $row){
			?>
			<table>
			<tr>
				<td colspan="2" height="5px"> </td>
			</tr>
			<tr>
				<td width="295px"></td>
				<td width="200px">Bandung, <?php 
				$tgl_skpd= date("Y-m-d", strtotime($row->tgl_skpd));
					$tanggal= date("dmY", strtotime($row->tgl_skpd));
					$tgl_skpd_indo = tgl_indo($tgl_skpd);
					echo $tgl_skpd_indo; ?></td>
			</tr>
			<tr>
				<td colspan="2" height="45px"> </td>
			</tr>
			<tr>
				<td></td>
				<td><b><?php echo ucwords(strtolower($pemeriksa_1));?></b></td>
			</tr>
			<tr>	
				<td></td>
				<td><?php echo ucwords(strtolower($jabatan_1)); ?></td>
			</tr>
			</table>
			
			
			<table class="smallfont">
			
			
			<tr>
				<td><i>By. <?php echo $row->jenis_plafond; ?></i></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td colspan="3">&nbsp;</td>
			</tr>
			
			
			</table>
		<?php
			}
			}
		?>
	</td>
	<td width="50px">&nbsp;</td>
</tr>	
</table>

</div>
<?php
// we can have any view part here like HTML, PHP etc
$content = ob_get_contents();
ob_end_clean();
$obj_pdf->writeHTML($content, true, false, true, false, '');
$obj_pdf->Output($nomor.'_SKPD_'.$tanggal.'.pdf', 'I');
?>