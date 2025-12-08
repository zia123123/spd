<?php 

tcpdf();
$obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$obj_pdf->SetCreator(PDF_CREATOR);
$title = "NI";
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
$obj_pdf->SetFont('helvetica', '', 14);
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
	
	if(isset($get_data_notaintern)){
		
	foreach($get_data_notaintern as $row){
		$no_ni = str_pad($row->no_ni,3, "0", STR_PAD_LEFT)."".$row->kode_ni; 
		$nomor = str_pad($row->no_ni,3, "0", STR_PAD_LEFT);
		
		$tgl_ni= date("Y-m-d", strtotime($row->tgl_ni));
		$now= date("Y-m");
		
		$tanggal= date("dmY", strtotime($row->tgl_ni));
		$tgl_ni_indo = tgl_indo($tgl_ni);
		$now_indo = tgl_indo($now);
	?>	
	<table>
	<tr>
		<td colspan="3">
			<p class="judul" style="font-size:20pt"><u>NOTA INTERN</u></p>
		</td>
	</tr>
	<tr>
		<td colspan="3">
			<p align="center">No : <?php echo $no_ni; ?></p><br/><br/>
		</td>
	</tr>
	<tr>
		<td width="100px" height="20px">Kepada</td>
		<td width="25px">:</td>
		<td width=""><?php echo $row->kepada_jab; ?></td>
	</tr>
	<tr>
		<td height="20px">Dari</td>
		<td>:</td>
		<td><?php echo $row->dari_jab; ?></td>
	</tr>
	<tr>
		<td height="20px">Perihal</td>
		<td>:</td>
		<td align="justify"><?php echo ucwords($row->perihal); ?></td>
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
			<?php echo $row->dasar_ni.""; ?><?php echo $row->isi_ni; ?> 
			sebesar <b><?php echo number_format($row->nominal, 0,'','.');?> 
			(<?php echo to_word($row->nominal);?> rupiah)</b>. 
			</p>
		</td>
	</tr>
	<tr>
		<td> &nbsp;</td>
	</tr>
	<tr>
		<td colspan="3" width="470px">
			<p align="justify;" style="line-height: 20px;">
			<?php echo $row->closing; ?> 
			
			</p>
		</td>
	</tr>
	</table>
	<?php
		}
	}
	?>
	
	<br/><br/><br/>	
	<table>
	<tr>
		<td colspan="2" height="5px"> </td>
	</tr>
	<tr>
		<td width="295px"></td>
		<td width="200px">Bandung, <?php echo $tgl_ni_indo; ?></td>
	</tr>
	<tr>
		<td colspan="2" height="55px"> </td>
	</tr>
	<tr>
		<td></td>
		<td><b><?php echo ucwords(strtolower($row->dari_nama));?></b></td>
	</tr>
	<tr>	
		<td></td>
		<td><?php echo $row->dari_jab; ?></td>
	</tr>
	</table>
	<br/><br/>

</div>
<?php
// we can have any view part here like HTML, PHP etc
$content = ob_get_contents();
ob_end_clean();
$obj_pdf->writeHTML($content, true, false, true, false, '');
ob_start();
$obj_pdf->SetMargins(7, 15, 7);
$obj_pdf->SetFont('helvetica', '', 11);
$obj_pdf->SetDisplayMode('fullpage', 'SinglePage', 'UseNone');
$obj_pdf->startPageGroup();
$obj_pdf->AddPage('L', 'A4');
?>
<!-- =============== NOTA VERIK SKPD =============== -->
<style type="text/css">
.judul {
	font-weight:bold;
	text-align:center;
	font-size:25pt;
	line-height:20px;	
}
table.gridtable {
	width:100%;
}
table.gridtable th {
	padding: 4px;
	text-align:center;
	font-weight:bold;
	
}
table.gridtable td {
	padding: 4px;
	border-style:solid 1px;
	
}
.row_small{
	font-size:8pt;
	text-align:center;
}
.smallfont10{
	font-size:10pt;
}
.smallfont8{
	font-size:8pt;
}
.fbc10 {
	text-align:center;
	font-weight:bold;
}
.fbc12 {
	font-size:12pt;
	text-align:center;
	font-weight:bold;
}
</style>
<div style="width:100%;">
	<?php
	
	if(isset($get_sum_biaya)){	
		foreach($get_sum_biaya as $row){
			$total_biaya = $row->jml_total;
		}
	}
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
	if(isset($get_data_notaintern)){
		
	foreach($get_data_notaintern as $row){
	?>	
	<table border="0">
	<tr>
		<td colspan="2" width="200px" height="15px" class="smallfont10">PERUM BULOG KANWIL JABAR</td>
		<td rowspan="3" width="360px" height="15px">
			<p class="judul">
				NOTA VERIFIKASI<br/>
				<small style="color:#83C3FC;font-size:10pt;"><i>Bekerjalah cepat dan teliti</i></small>
			</p>
		</td>
		<td width="60px" class="smallfont8" style="border-left:solid 1px #000;border-top:solid 1px #000;"> Diterima Seksi</td>
		<td width="70px" class="smallfont8" style="border-left:solid 1px #000;border-top:solid 1px #000;"> Agenda No.</td>
		<td width="35px" rowspan="3" class="smallfont8" style="border:solid 1px #000;"> &nbsp;</td>
		<td width="80px" class="smallfont8" style="border:solid 1px #000;"> Selesai/bayar/terima</td>
	</tr>
	<tr>
		<td class="smallfont10" height="15px">NO</td>
		<td class="smallfont10">.............................. </td>
		<td class="smallfont8" style="border-left:solid 1px #000;"> ....................... </td>
		<td class="smallfont8" style="border-left:solid 1px #000;border-right:solid 1px #000;"> Tgl/Jam</td>
		<td rowspan="2" align="center" style="border:solid 1px #000;margin-top:35px;"><b> SEKSI KEUANGAN </b></td>
	</tr>
	<tr>
		<td class="smallfont10" style="height:15px">TANGGAL</td>
		<td class="smallfont10">.............................. </td>
		<td style="border-left:solid 1px #000;border-bottom:solid 1px #000;">&nbsp;</td>
		<td class="smallfont8" style="border-left:solid 1px #000;border-right:solid 1px #000;border-bottom:solid 1px #000;"> Paraf terima</td>
		
	</tr>
	</table>
	<br/><br/>
	<table class="gridtable" style="border:solid 1px #000;">
	<tr>
		<td colspan="3" width="305px" class="fbc10" style="line-height:25px;">VERIFIKASI TEKNIS/SEKSI SEKUMHUM</td>
		<td colspan="4" width="500px" class="fbc10" style="line-height:25px;">VERIFIKASI KOMPTABLE</td>
	</tr>
	<tr>
		<td colspan="2" style="border-bottom-style:none;line-height:20px;">Tagihan/pembayaran dari :</td>
		<td style="line-height:20px;">Jumlah :</td>
		<td colspan="2" class="fbc10" style="line-height:20px;">CEKING BUKTI</td>
		<td colspan="2" class="fbc10" style="line-height:20px;">PEMBAYARAN/PENERIMAAN</td>
	</tr>
	<tr>
		<td colspan="2" class="fbc12" style="line-height:20px;">SEKRETARIAT, UMUM &#38; HUMAS</td>
		<td style="font-size:12pt" style="line-height:20px;"><b>RP. <?php echo number_format($row->nominal, 0,'','.');?></b></td>
		<td style="width:125px;height:25px;" >1. BUKTI</td>
		<td style="width:125px;"> </td>
		<td style="width:90px;">CASH</td>
		<td style="width:160px;"> </td>
	</tr>
	<tr>
		<td rowspan="3" width="152.5px"> </td>
		<td rowspan="3" width="152.5px" colspan="2"> </td>
		<td style="height:25px;">2. TANDA TANGAN</td>
		<td> </td>
		<td>CEK/GIRO</td>
		<td> </td>
	</tr>
	<tr>
		<td style="height:25px;">3. CAP/STEMPEL</td>
		<td> </td>
		<td>PINDAH BUKU</td>
		<td> </td>
	</tr>
	<tr>
		<td style="height:25px;">4. JUMLAH DISETUJUI</td>
		<td> </td>
		<td>DI BLOKIR</td>
		<td> </td>
	</tr>
	<tr>
		<td  style="height:25px;" colspan="3" class="fbc10">HASIL PEMERIKSAAN BUKTI-BUKTI</td>
		<td>5. PERATURAN YBS</td>
		<td> </td>
		<td>DI KOMPESIR</td>
		<td> </td>
	</tr>
	<tr>
		<td rowspan="2"> </td>
		<td rowspan="2" colspan="2" class="fbc10" style="line-height:25px;">DOKUMEN LENGKAP DAN BENAR</td>
		<td style="height:25px;">6. TARIF&#178;</td>
		<td> </td>
		<td>SALDO</td>
		<td> </td>
	</tr>
	<tr>
		<td colspan="2" rowspan="3">7. PERHITUNGAN&#178;</td>
		<td colspan="2" rowspan="3">PENJELASAN LAIN-LAIN :</td>
	</tr>
	<tr>
		<td height="35px" style="line-height:35px;">PERHITUNGAN TEKNIS</td>
		<td colspan="2"> </td>
	</tr>
	<tr>
		<td colspan="3" height="10px">PENJELASAN LAINNYA : <br/>
		
			<p style="font-size:11pt;font-weight:bold;">
			
			<?php 
				$noskpd = str_pad($row->no_ni,3, "0", STR_PAD_LEFT);
				$no_skpd = str_pad($row->no_ni,3, "0", STR_PAD_LEFT)."".$row->kode_ni; 
				$nomor = str_pad($row->no_ni,3, "0", STR_PAD_LEFT);
				echo "NO NI : <BR/>".$no_ni. " = Rp. ".number_format($row->nominal, 0,'','.');
			?>
			</p>
		</td>
		
	</tr>
	</table>
	<br/><br/>
	<table>
	<tr>
		<td align="center" width="240px"> TELAH DIPERIKSA </td>
		<td align="center" width="280px"> TELAH DIPERIKSA </td>
		<td align="center" width="260px"> SETUJU DIBAYAR/DITERIMA </td>
	</tr>
	<tr>
		<td colspan="3" height="40px"> </td>
	</tr>
	<tr>
		<td class="fbc10"> <?php echo strtoupper($pemeriksa_3); ?> </td>
		<td class="fbc10"> <?php echo strtoupper($pemeriksa_2); ?> </td>
		<td class="fbc10"> <?php echo strtoupper($pemeriksa_1); ?> </td>
	</tr>
	<tr>
		<td align="center"> <?php echo strtoupper($jabatan_3); ?> </td>
		<td align="center"> <?php echo strtoupper($jabatan_2); ?> </td>
		<td align="center"> <?php echo strtoupper($jabatan_1); ?> </td>
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
?>
<?php 

//$obj_pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, $title, PDF_HEADER_STRING);
$obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
$obj_pdf->setPrintHeader(false);
$obj_pdf->setPrintFooter(false);
$obj_pdf->SetDefaultMonospacedFont('helvetica');
$obj_pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
//$obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
$obj_pdf->SetMargins(15, 10, 15);
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
	<img src="xenon/images/logo_bulog.png" style="left:0px;width:125px;"/>
	<br/>
	<table border="0" style="line-height:12px;font-size:10pt;">
	<tr>
		<td rowspan="5" width="40px"></td>
		<td colspan="2">Kantor Wilayah Jawa Barat</td>
	</tr>
	<tr>
		<td colspan="2">Jl. Soekarno Hatta No.711a, Bandung</td>
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
	<?php
	
	if(isset($get_pejabat_ttd)){	
		foreach($get_pejabat_ttd as $row){
			$pemeriksa_1 = $row->pemeriksa_1;
			$pemeriksa_2 = $row->pemeriksa_2;
			$pemeriksa_3 = $row->pemeriksa_3;
			$pemeriksa_4 = $row->pemeriksa_4;
			$jabatan_1 = $row->jabatan_1;
			$jabatan_2 = $row->jabatan_2;
			$jabatan_3 = $row->jabatan_3;
			$jabatan_4 = $row->jabatan_4;
		}
	}
	if(isset($get_data_notaintern)){
		
	foreach($get_data_notaintern as $row){
	?>
	<br/><br/>
	<table>
	<tr>
		<td>
			<p class="judul"><u>BUKTI PEMBAYARAN KAS/BANK</u> <BR/>
				<strong style="text-align:center;font-size:12pt;"> 
					Nomor : ________________________  
				</strong>
			</p>
		</td>
	</tr>
	<tr>
		<td> &nbsp;</td>
	</tr>
	</table>
	
	<table class="gridtable">
	<tr>
		<td width="150px" STYLE="BORDER:none;align:left;"class="rowpelaksana">DIBAYAR KEPADA</td>
		<td width="20px" STYLE="BORDER:none;align:left;">:</td>
		<td width="325px">
			
		</td>
	</tr>
	<tr>
		<td style="border:none;"> &nbsp;</td>
	</tr>
	<tr>
		<td width="150px" STYLE="BORDER:none;align:left;"class="rowpelaksana">JUMLAH</td>
		<td width="20px" STYLE="BORDER:none;align:left;">:</td>
		<td width="325px"><?php echo "Rp. ".number_format($row->nominal, 0,'','.');?></td>
	</tr>
	<tr>
		<td style="border:none;"> &nbsp;</td>
	</tr>
	<tr>
		<td width="150px" STYLE="BORDER:none;align:left;"class="rowpelaksana">TERBILANG</td>
		<td width="20px" STYLE="BORDER:none;align:left;">:</td>
		<td width="325px" style="align:left">
			<?php echo ucwords(to_word($row->nominal)." Rupiah"); ?>
		<br/></td>
	</tr>
	<tr>
		<td style="border:none;"> &nbsp;</td>
	</tr>
	<tr>
		<td width="150px" STYLE="BORDER:none;align:left;"class="rowpelaksana">UNTUK PEMBAYARAN</td>
		<td width="20px" STYLE="BORDER:none;align:left;">:</td>
		<td width="325px" style="align:left">
			
			<?php 
				
				echo "NO NI : <BR/>".$no_ni.$row->kode_ni;
				?>
		<br/></td>
	</tr>
	<tr>
		<td style="border:none;"> &nbsp;</td>
	</tr>
	<tr>
		<td width="150px" STYLE="BORDER:none;align:left;"class="rowpelaksana">DASAR</td>
		<td width="20px" STYLE="BORDER:none;align:left;">:</td>
		<td width="400px" style="BORDER:none;align:left">
		<table class="gridtable" border="0">
		<tr>
			<td width="125px"> DASAR NO </td>
			<td>
				<?php 
				
				$no_ni = str_pad($row->no_ni,3, "0", STR_PAD_LEFT)."".$row->kode_ni; 
				echo $no_ni;
				?>
			</td>
		</tr>
		<tr>
			<td style="border:none;"> &nbsp;</td>
		</tr>
		<tr>
			<td> TANGGAL </td>
			<td> <?php echo $row->tgl_ni;?> </td>
		</tr>
		<tr>
			<td style="border:none;"> &nbsp;</td>
		</tr>
		<tr>
			<td> SPP/GIRO/CHEQ </td>
			<td width="15px"> &nbsp; </td>
			<td width="15px"> &nbsp; </td>
			<td width="15px"> &nbsp; </td>
			<td width="15px"> &nbsp; </td>
			<td width="15px"> &nbsp; </td>
			<td width="15px"> &nbsp; </td>
			<td width="15px"> &nbsp; </td>
			<td width="15px"> &nbsp; </td>
			<td width="15px"> &nbsp; </td>
			<td width="15px"> &nbsp; </td>
			<td width="15px"> &nbsp; </td>
			<td width="15px"> &nbsp; </td>
			<td width="15px"> &nbsp; </td>
		</tr>
		<tr>
			<td style="border:none;"> &nbsp;</td>
		</tr>
		<tr>
			<td> NOTA BANK </td>
			<td width="15px"> &nbsp; </td>
			<td width="15px"> &nbsp; </td>
			<td width="15px"> &nbsp; </td>
			<td width="15px"> &nbsp; </td>
			<td width="15px"> &nbsp; </td>
			<td width="15px"> &nbsp; </td>
			<td width="15px"> &nbsp; </td>
			<td width="15px"> &nbsp; </td>
			<td width="15px"> &nbsp; </td>
			<td width="15px"> &nbsp; </td>
			<td width="15px"> &nbsp; </td>
			<td width="15px"> &nbsp; </td>
			<td width="15px"> &nbsp; </td>
		</tr>
		</table>
		
		</td>
	</tr>
	<tr>
		<td width="150px" STYLE="BORDER:none;align:left;"class="rowpelaksana">KWITANSI TERLAMPIR</td>
	</tr>
	</table>
	<br/><br/>
	
	<table class="gridtable">
		<tr>
			<td colspan="3" STYLE="align:left;width:500px"class="rowpelaksana">DEBET</td>
		</tr>
		<tr>
			<td STYLE="align:left;width:100px"class="rowpelaksana">REKENING</td>
			<td colspan="2" STYLE="text-align:center;width:400px"class="rowpelaksana">JUMLAH</td>
		</tr>
		<tr>
			<td STYLE="align:left;"class="rowpelaksana">NAMA</td>
			<td STYLE="align:left;"class="rowpelaksana">NOMOR</td>
			<td STYLE="align:left;"class="rowpelaksana">RP.</td>
		</tr>
		<tr>
			<td STYLE="align:left; "class="rowpelaksana"></td>
			<td STYLE="align:left;border:none"class="rowpelaksana">
				<table border="1">
					<tr>
						<td width="15px"> &nbsp; </td>
						<td width="15px"> &nbsp; </td>
						<td width="15px"> &nbsp; </td>
						<td width="15px"> &nbsp; </td>
						<td width="15px"> &nbsp; </td>
						<td width="15px"> &nbsp; </td>
						<td width="15px"> &nbsp; </td>
						<td width="15px"> &nbsp; </td>
						<td width="15px"> &nbsp; </td>
						<td width="15px"> &nbsp; </td>
						<td width="15px"> &nbsp; </td>
						<td width="15px"> &nbsp; </td>
						<td width="15px"> &nbsp; </td>
					</tr>
				</table>
			</td>
			<td STYLE="align:left;"class="rowpelaksana">
				<table border="1">
					<tr>
						<td width="15px"> &nbsp; </td>
						<td width="15px"> &nbsp; </td>
						<td width="15px"> &nbsp; </td>
						<td width="15px"> &nbsp; </td>
						<td width="15px"> &nbsp; </td>
						<td width="15px"> &nbsp; </td>
						<td width="15px"> &nbsp; </td>
						<td width="15px"> &nbsp; </td>
						<td width="15px"> &nbsp; </td>
						<td width="15px"> &nbsp; </td>
						<td width="15px"> &nbsp; </td>
						<td width="15px"> &nbsp; </td>
						<td width="15px"> &nbsp; </td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td STYLE="align:left;"class="rowpelaksana"></td>
			<td STYLE="align:left;"class="rowpelaksana">
				<table border="1">
					<tr>
						<td width="15px"> &nbsp; </td>
						<td width="15px"> &nbsp; </td>
						<td width="15px"> &nbsp; </td>
						<td width="15px"> &nbsp; </td>
						<td width="15px"> &nbsp; </td>
						<td width="15px"> &nbsp; </td>
						<td width="15px"> &nbsp; </td>
						<td width="15px"> &nbsp; </td>
						<td width="15px"> &nbsp; </td>
						<td width="15px"> &nbsp; </td>
						<td width="15px"> &nbsp; </td>
						<td width="15px"> &nbsp; </td>
						<td width="15px"> &nbsp; </td>
					</tr>
				</table>
			</td>
			<td STYLE="align:left;"class="rowpelaksana">
				<table border="1">
					<tr>
						<td width="15px"> &nbsp; </td>
						<td width="15px"> &nbsp; </td>
						<td width="15px"> &nbsp; </td>
						<td width="15px"> &nbsp; </td>
						<td width="15px"> &nbsp; </td>
						<td width="15px"> &nbsp; </td>
						<td width="15px"> &nbsp; </td>
						<td width="15px"> &nbsp; </td>
						<td width="15px"> &nbsp; </td>
						<td width="15px"> &nbsp; </td>
						<td width="15px"> &nbsp; </td>
						<td width="15px"> &nbsp; </td>
						<td width="15px"> &nbsp; </td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td STYLE="align:left;"class="rowpelaksana"></td>
			<td STYLE="align:left;"class="rowpelaksana">
				<table border="1">
					<tr>
						<td width="15px"> &nbsp; </td>
						<td width="15px"> &nbsp; </td>
						<td width="15px"> &nbsp; </td>
						<td width="15px"> &nbsp; </td>
						<td width="15px"> &nbsp; </td>
						<td width="15px"> &nbsp; </td>
						<td width="15px"> &nbsp; </td>
						<td width="15px"> &nbsp; </td>
						<td width="15px"> &nbsp; </td>
						<td width="15px"> &nbsp; </td>
						<td width="15px"> &nbsp; </td>
						<td width="15px"> &nbsp; </td>
						<td width="15px"> &nbsp; </td>
					</tr>
				</table>
			</td>
			<td STYLE="align:left;"class="rowpelaksana">
				<table border="1">
					<tr>
						<td width="15px"> &nbsp; </td>
						<td width="15px"> &nbsp; </td>
						<td width="15px"> &nbsp; </td>
						<td width="15px"> &nbsp; </td>
						<td width="15px"> &nbsp; </td>
						<td width="15px"> &nbsp; </td>
						<td width="15px"> &nbsp; </td>
						<td width="15px"> &nbsp; </td>
						<td width="15px"> &nbsp; </td>
						<td width="15px"> &nbsp; </td>
						<td width="15px"> &nbsp; </td>
						<td width="15px"> &nbsp; </td>
						<td width="15px"> &nbsp; </td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td colspan="3" STYLE="align:left;width:500px" class="rowpelaksana">KREDIT</td>
		</tr>
		<tr>
			<td STYLE="align:left;width:100px"class="rowpelaksana">REKENING</td>
			<td colspan="2" STYLE="text-align:center;width:400px"class="rowpelaksana">JUMLAH</td>
		</tr>
		<tr>
			<td STYLE="align:left;"class="rowpelaksana">NAMA</td>
			<td STYLE="align:left;"class="rowpelaksana">NOMOR</td>
			<td STYLE="align:left;"class="rowpelaksana">RP.</td>
		</tr>
		<tr>
			<td STYLE="align:left;"class="rowpelaksana"></td>
			<td STYLE="align:left;"class="rowpelaksana">
				<table border="1">
					<tr>
						<td width="15px"> &nbsp; </td>
						<td width="15px"> &nbsp; </td>
						<td width="15px"> &nbsp; </td>
						<td width="15px"> &nbsp; </td>
						<td width="15px"> &nbsp; </td>
						<td width="15px"> &nbsp; </td>
						<td width="15px"> &nbsp; </td>
						<td width="15px"> &nbsp; </td>
						<td width="15px"> &nbsp; </td>
						<td width="15px"> &nbsp; </td>
						<td width="15px"> &nbsp; </td>
						<td width="15px"> &nbsp; </td>
						<td width="15px"> &nbsp; </td>
					</tr>
				</table>
			</td>
			<td STYLE="align:left;"class="rowpelaksana">
				<table border="1">
					<tr>
						<td width="15px"> &nbsp; </td>
						<td width="15px"> &nbsp; </td>
						<td width="15px"> &nbsp; </td>
						<td width="15px"> &nbsp; </td>
						<td width="15px"> &nbsp; </td>
						<td width="15px"> &nbsp; </td>
						<td width="15px"> &nbsp; </td>
						<td width="15px"> &nbsp; </td>
						<td width="15px"> &nbsp; </td>
						<td width="15px"> &nbsp; </td>
						<td width="15px"> &nbsp; </td>
						<td width="15px"> &nbsp; </td>
						<td width="15px"> &nbsp; </td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td STYLE="align:left;"class="rowpelaksana"></td>
			<td STYLE="align:left;"class="rowpelaksana">
				<table border="1">
					<tr>
						<td width="15px"> &nbsp; </td>
						<td width="15px"> &nbsp; </td>
						<td width="15px"> &nbsp; </td>
						<td width="15px"> &nbsp; </td>
						<td width="15px"> &nbsp; </td>
						<td width="15px"> &nbsp; </td>
						<td width="15px"> &nbsp; </td>
						<td width="15px"> &nbsp; </td>
						<td width="15px"> &nbsp; </td>
						<td width="15px"> &nbsp; </td>
						<td width="15px"> &nbsp; </td>
						<td width="15px"> &nbsp; </td>
						<td width="15px"> &nbsp; </td>
					</tr>
				</table>
			</td>
			<td STYLE="align:left;"class="rowpelaksana">
				<table border="1">
					<tr>
						<td width="15px"> &nbsp; </td>
						<td width="15px"> &nbsp; </td>
						<td width="15px"> &nbsp; </td>
						<td width="15px"> &nbsp; </td>
						<td width="15px"> &nbsp; </td>
						<td width="15px"> &nbsp; </td>
						<td width="15px"> &nbsp; </td>
						<td width="15px"> &nbsp; </td>
						<td width="15px"> &nbsp; </td>
						<td width="15px"> &nbsp; </td>
						<td width="15px"> &nbsp; </td>
						<td width="15px"> &nbsp; </td>
						<td width="15px"> &nbsp; </td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td STYLE="align:left;"class="rowpelaksana"></td>
			<td STYLE="align:left;"class="rowpelaksana">
				<table border="1">
					<tr>
						<td width="15px"> &nbsp; </td>
						<td width="15px"> &nbsp; </td>
						<td width="15px"> &nbsp; </td>
						<td width="15px"> &nbsp; </td>
						<td width="15px"> &nbsp; </td>
						<td width="15px"> &nbsp; </td>
						<td width="15px"> &nbsp; </td>
						<td width="15px"> &nbsp; </td>
						<td width="15px"> &nbsp; </td>
						<td width="15px"> &nbsp; </td>
						<td width="15px"> &nbsp; </td>
						<td width="15px"> &nbsp; </td>
						<td width="15px"> &nbsp; </td>
					</tr>
				</table>
			</td>
			<td STYLE="align:left;"class="rowpelaksana">
				<table border="1">
					<tr>
						<td width="15px"> &nbsp; </td>
						<td width="15px"> &nbsp; </td>
						<td width="15px"> &nbsp; </td>
						<td width="15px"> &nbsp; </td>
						<td width="15px"> &nbsp; </td>
						<td width="15px"> &nbsp; </td>
						<td width="15px"> &nbsp; </td>
						<td width="15px"> &nbsp; </td>
						<td width="15px"> &nbsp; </td>
						<td width="15px"> &nbsp; </td>
						<td width="15px"> &nbsp; </td>
						<td width="15px"> &nbsp; </td>
						<td width="15px"> &nbsp; </td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td style="border:none;"> &nbsp;</td>
		</tr>
	</table>
	<BR/>
	<table class="gridtable" border="0">
	<tr>
		<td align="center" style="border:none;" class="rowpelaksana" width="120px"> DISETUJUI OLEH :<br/><?php echo strtoupper($jabatan_1); ?> </td>
		<td align="center" style="border:none;" class="rowpelaksana" width="120px"> DIBUKUKAN OLEH :<br/><?php echo strtoupper($jabatan_4); ?> </td>
		<td align="center" style="border:none;" class="rowpelaksana" width="120px"> DIBAYAR OLEH :<br/><?php echo strtoupper($jabatan_2); ?> </td>
		<td align="center" style="border:none;" class="rowpelaksana" width="150px"> Bandung, &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;  <br/>DITERIMA OLEH : </td>
	</tr>
	<tr>
		<td colspan="4" style="border:none;" height="35px"> </td>
	</tr>
	<tr>
		<td class="fbc10" style="border:none;" align="center" class="rowpelaksana"> <?php echo strtoupper($pemeriksa_1); ?> </td>
		<td class="fbc10" style="border:none;" align="center" class="rowpelaksana"> <?php echo strtoupper($pemeriksa_4); ?> </td>
		<td class="fbc10" style="border:none;" align="center" class="rowpelaksana"> <?php echo strtoupper($pemeriksa_2); ?> </td>
		<td class="fbc10" style="border:none;" align="center"class="rowpelaksana"> __________________ </td>
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
$obj_pdf->Output($nomor.'_BON_'.$tanggal.'.pdf', 'I');
?>