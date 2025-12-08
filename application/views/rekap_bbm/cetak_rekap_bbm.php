<?php 

tcpdf();
$obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$obj_pdf->SetCreator(PDF_CREATOR);
$title = "Rekap BBM";
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
$obj_pdf->SetMargins(10, 15, 10);
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
	font-size:12pt;
	line-height:16px;
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
.smallfont{
	font-size:9pt;
}
.rowpelaksana{
	font-size:10.5pt;
	font-weight:bold;
}
</style>

<div style="width:100%;">	
	<?php
	
	if(isset($get_pejabat_ttd)){	
		foreach($get_pejabat_ttd as $row){
			$pemeriksa_1 = $row->pemeriksa_1;
			$pemeriksa_2 = $row->pemeriksa_2;
			$pemeriksa_3 = $row->pemeriksa_3;
			$jabatan_1 = $row->jabatan_1;
			$jabatan_2 = $row->jabatan_2;
			$jabatan_3 = $row->jabatan_3;
		}
	}
	
	?>
	<table>
	<tr>
		<td>
			<p class="judul">
				REKAPITULASI BBM SPPD<br/>
				PERIODE <?php echo $tgl_awal." s.d ".$tgl_akhir;?><BR/>
				PERUM BULOG DIVRE JATENG<br/>
				[ <?php echo $jenis_biaya; ?> ] 
			</p>
		</td>
	</tr>
	<tr>
		<td> &nbsp; </td>
	</tr>
	</table>
	<br/><br/>
	<table class="gridtable">
	<tr>
		<th width="25px" class="rowpelaksana">NO</th>
		<th width="100px">NO SKPD</th>
		<th width="150px">TANGGAL SKPD</th>
		<th width="110px" align="center">JENIS BIAYA</th>
		<th width="150px" align="right">JUMLAH BBM (RP)</th>
	</tr>
	
	<?php
	$no = 1;
	if(isset($get_rekap_bbm)){
	foreach($get_rekap_bbm as $row){
	?>
	<tr>
		<td align="center"><?php echo $no++;?></td>
		<td align="center"><?php echo $row->no_skpd; ?></td>
		<td align="center"><?php echo $row->tgl_skpd; ?></td>
		<td align="center"><?php echo $row->jenis_biaya; ?></td>
		<td align="right"><?php echo number_format($row->uang_bbm, 0,'','.');?></td>
	</tr>
	<?php
	}
	}
	
	foreach($get_sum_bbm as $row){
		$sum_bbm = $row->sum_bbm;
	}
	
	?>
	<tr>
		<td colspan="4" style="" align="right"><b>JUMLAH</b></td>
		<td align="right"><b><?php echo number_format($sum_bbm, 0,'','.');?></b></td>
	</tr>
	<tr>
		<td colspan="7" style="border:none;font-size:5pt;" height="5px">&nbsp;</td>
	</tr>
	</table>
	
	<br/>
	
	
	<table>
	<tr>
		<td colspan="2" height="5px"> </td>
	</tr>
	<tr>
		<td width="355px"></td>
		<td width="180px">Mengetahui,</td>
	</tr>
	<tr>
		<td colspan="2" height="45px"> </td>
	</tr>
	<tr>
		<td></td>
		<td><b><?php echo ucwords(strtolower($pemeriksa_3));?></b></td>
	</tr>
	<tr>	
		<td></td>
		<td><?php echo ucwords(strtolower($jabatan_3)); ?></td>
	</tr>
	</table>
	<br/><br/>
	<small><i>#Dicetak tanggal <?php echo $tgl_skrg;?></i></small>
</div>

<?php
// we can have any view part here like HTML, PHP etc
$content = ob_get_contents();
ob_end_clean();
$obj_pdf->writeHTML($content, true, false, true, false, '');
$obj_pdf->Output('Rekap_BBM_SPPD.pdf', 'I');
?>