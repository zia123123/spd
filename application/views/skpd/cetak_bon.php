<?php 

tcpdf();
$obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$obj_pdf->SetCreator(PDF_CREATOR);
$title = "BON";
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
$obj_pdf->SetMargins(23, PDF_MARGIN_TOP, 23);
$obj_pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
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
	if(isset($get_sum_biaya)){	
		foreach($get_sum_biaya as $row){
			$total_biaya = $row->jml_jumlah_diterima;
		}
	}
	if(isset($get_data_sppd)){
		
	foreach($get_data_sppd as $row){
		$no_skpd = str_pad($row->no_skpd,3, "0", STR_PAD_LEFT)."".$row->attr_skpd; 
		$nomor = str_pad($row->no_skpd,3, "0", STR_PAD_LEFT);
		
		$tgl_skpd= date("Y-m-d", strtotime($row->tgl_skpd));
		$now= date("Y-m");
		
		$tanggal= date("dmY", strtotime($row->tgl_skpd));
		$tgl_skpd_indo = tgl_indo($tgl_skpd);
		$now_indo = tgl_indo($now);
	?>	
	<table>
	<tr>
		<td colspan="3">
			<p class="judul">BON</p><br/><br/>
		</td>
	</tr>
	<tr>
		<td width="100px" height="20px">Kepada</td>
		<td width="25px">:</td>
		<td width=""><?php echo $jabatan_2; ?></td>
	</tr>
	<tr>
		<td height="20px">Dari</td>
		<td>:</td>
		<td><?php echo $jabatan_3; ?></td>
	</tr>
	<tr>
		<td height="20px">Perihal</td>
		<td>:</td>
		<td align="justify">BON SKPD <br/>(<?php echo ucwords($row->tugas); ?>)</td>
	</tr>
	<tr>
		<td> &nbsp;</td>
	</tr>
	<tr>
		<td colspan="3" width="470px" style="font-size:5pt;border-bottom:solid 1px #000;">&nbsp;</td>
	</tr>
	<tr>
		<td> &nbsp;</td>
	</tr>
	<tr>
		<td colspan="3" width="470px">
			<p align="justify;" style="line-height: 20px;">
			Berdasarkan SKPD Nomor : <?php echo $no_skpd; ?> tanggal <?php echo $tgl_skpd_indo; ?>, 
			bersama ini mohon untuk dapat di berikan bon sebesar Rp. <?php echo number_format($total_biaya, 0,'','.');?> 
			( <?php echo to_word($total_biaya);?> rupiah ) 
			untuk biaya perjalanan dinas sebagaimana rincian perhitungan terlampir.
			</p>
		</td>
	</tr>
	</table>
	<?php
		}
	}
	?>
	
	<br/><br/><br/><br/><br/>
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
		<td width="200px">Bandung, &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $now_indo; ?></td>
	</tr>
	<tr>
		<td colspan="2" height="55px"> </td>
	</tr>
	<tr>
		<td></td>
		<td><b><?php echo ucwords(strtolower($pemeriksa_3));?></b></td>
	</tr>
	<tr>	
		<td></td>
		<td><?php echo $jabatan_3; ?></td>
	</tr>
	</table>
	<br/><br/>
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
$obj_pdf->Output($nomor.'_BON_'.$tanggal.'.pdf', 'I');
?>