<?php 

tcpdf();
$obj_pdf = new TCPDF('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
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
$obj_pdf->SetMargins(7, 10, 7);
$obj_pdf->SetAutoPageBreak(TRUE, 5);
$obj_pdf->SetFont('helvetica', '', 11);
$obj_pdf->setFontSubsetting(false);

ob_start();
$obj_pdf->SetDisplayMode('fullpage', 'SinglePage', 'UseNone');

$obj_pdf->startPageGroup();
$obj_pdf->AddPage('L', 'A4');
?>
<!-- =============== REKAP BIAYA SKPD =============== -->
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
	font-size:10pt;
}
table.gridtable td {
	padding: 4px;
	border:solid 1px #000;
	font-size:10pt;
}
table.gridtable .row_small{
	text-align:center;
	font-size:8pt;
}
.td_total {
	font-weight:bold;
	font-size:9,5pt;
}
table td {
	font-size:10pt;
}
</style>
<div style="width:100%;">
	<?php
	if(isset($get_data_sppd)){	
		foreach($get_data_sppd as $row){
			$pemeriksa_3 = $row->pemeriksa_3;
			$pemeriksa_2 = $row->pemeriksa_2;
			$pemeriksa_1 = $row->pemeriksa_1;
			$jabatan_1 = $row->jabatan_1;
			$jabatan_2 = $row->jabatan_2;
			$jabatan_3 = $row->jabatan_3;
		}
	}
	if(isset($get_data_sppd)){	
		foreach($get_data_sppd as $row){
			$jenis_biaya = $row->jenis_biaya;
			$angkutan = $row->angkutan;
			$tanggal= date("dmY", strtotime($row->tgl_skpd));
			$tgl_skpd= date("Y-m-d", strtotime($row->tgl_skpd));
			$tanggal = date("dmY", strtotime($row->tgl_skpd));
			$tgl_skpd_indo = tgl_indo($tgl_skpd);
			$jumlah_bbm = $row->jml_bbm;
		}
	}
	if(isset($get_data_sppd)){
		
	foreach($get_data_sppd as $row){
	?>	
	<table>
	<tr>
		<td>
			<p class="judul">REKAPITULASI SKPD KARYAWAN/WATI DIVRE JATENG</p>
		</td>
	</tr>
	</table>
	<br/><br/>
	<table>
	<tr>
		<td width="135px"> NOMOR SKPD </td>
		<td width="735px">
			: <?php 
				$no_skpd = str_pad($row->no_skpd,3, "0", STR_PAD_LEFT)."".$row->attr_skpd; 
				echo $no_skpd;
				?>
		</td>
	</tr>
	<tr>
		<td> TANGGAL SKPD </td>
		<td>
			<?php 
				$tgl_skpd = date("d F Y", strtotime($row->tgl_skpd));
			?>
			: <?php echo strtoupper($tgl_skpd_indo); ?>
		</td>
	</tr>
	<tr>
		<td> KOTA TUJUAN </td>
		<td>
			: <?php echo strtoupper($row->tmpt_tujuan); ?>
		</td>
	</tr>
	<tr>
		<td> LAMA </td>
		<td>
			: <?php 
				$jenisbiaya = $row->jenis_biaya;
				if ($jenis_biaya=="pswt_krywn_hotel" or $jenis_biaya=="pswt_krywn_non_hotel" or $jenis_biaya=="pswt_ka_waka_hotel" or $jenis_biaya=="pswt_ka_waka_non_hotel"){
					if ($row->durasi_tgs >= 2) {
						$durasi = 2;
					} else {
						$durasi = $row->durasi_tgs;
					}
				} else {
					$durasi = $row->durasi_tgs;
				}
				$durasi_malam = $durasi-1;
				echo $durasi." (".strtoupper(to_word($durasi))." ) HARI "; 
				if($jenisbiaya == "pswt_krywn_hotel" or $jenisbiaya == "pswt_ka_waka_hotel" or $jenisbiaya == "darat_hotel"){
					echo $durasi_malam." (".strtoupper(to_word($durasi_malam))." ) MALAM"; 
				}
			  ?>
		</td>
	</tr>
	</table>
	<br/><br/>
	<table class="gridtable">
	<tr>
		<?php if($jenisbiaya == "pswt_krywn_hotel" or $jenisbiaya == "pswt_ka_waka_hotel"){ ?>		
			<th width="25px">NO</th>
			<th width="115px">NAMA</th>
			<th width="30px">GOL</th>
			<th width="55px">UANG HARIAN</th>
			<th width="55px">HOTEL</th>
			<th width="55px">TAXI</th>
			<th width="55px">TIKET</th>
			<th width="50px">UANG REPRES.</th>
			<th width="60px">JUMLAH</th>
			<th width="85px" colspan="2">PPH (Rp)</th>
			<th width="55px">TIKET</th>
			<th width="60px">TOTAL</th>
			<th width="60px">DITERIMA PER ORANG</th>
			<th width="45px">YANG MENERIMA</th>
		<?php } elseif($jenisbiaya == "pswt_krywn_non_hotel" or $jenisbiaya == "pswt_ka_waka_non_hotel"){ ?>		
			<th width="25px">NO</th>
			<th width="115px">NAMA</th>
			<th width="30px">GOL</th>
			<th width="65px">UANG HARIAN</th>
			<th width="55px">TAXI</th>
			<th width="55px">TIKET</th>
			<th width="55px">UANG REPRES.</th>
			<th width="65px">JUMLAH</th>
			<th width="85px" colspan="2">PPH (Rp)</th>
			<th width="55px">TIKET</th>
			<th width="60px">TOTAL</th>
			<th width="75px">DITERIMA PER ORANG</th>
			<th width="65px">YANG MENERIMA</th>
		<?php } elseif($jenisbiaya == "darat_hotel" or $jenisbiaya == "spi"){ ?>		
			<?php if($angkutan == "kendaraan dinas"){ ?>
			<th width="25px">NO</th>
			<th width="130px">NAMA</th>
			<th width="35px">GOL</th>
			<th width="85px">UANG HARIAN</th>
			<th width="75px">HOTEL</th>
			<th width="65px">UANG BBM</th>
			<th width="60px">UANG REPRES.</th>
			<th width="75px">JUMLAH</th>
			<th width="85px" colspan="2">PPH (Rp)</th>
			<th width="95px">DITERIMA PER ORANG</th>
			<th width="75px">YANG MENERIMA</th>
			<?php } else { ?>
			<th width="25px">NO</th>
			<th width="130px">NAMA</th>
			<th width="35px">GOL</th>
			<th width="55px">UANG HARIAN</th>
			<th width="55px">HOTEL</th>
			<th width="55px">TIKET</th>
			<th width="55px">UANG REPRES.</th>
			<th width="65px">JUMLAH</th>
			<th width="85px" colspan="2">PPH (Rp)</th>
			<th width="55px">TIKET</th>
			<th width="70px">TOTAL</th>
			<th width="65px">DITERIMA PER ORANG</th>
			<th width="55px">YANG MENERIMA</th>
			<?php } ?>
		<?php } else { ?>
			<?php if($angkutan == "kendaraan dinas"){ ?>
			<th width="25px">NO</th>
			<th width="150px">NAMA</th>
			<th width="45px">GOL</th>
			<th width="85px">UANG HARIAN</th>
			<th width="85px">UANG BBM</th>			
			<th width="65px">UANG REPRES.</th>
			<th width="80px">JUMLAH</th>
			<th width="85px" colspan="2">PPH (Rp)</th>			
			<th width="100px">DITERIMA PER ORANG</th>
			<th width="85px">YANG MENERIMA</th>
			<?php } else { ?>
			<th width="25px">NO</th>
			<th width="135px">NAMA</th>
			<th width="35px">GOL</th>
			<th width="70px">UANG HARIAN</th>
			<th width="55px">TIKET</th>
			<th width="55px">UANG REPRES.</th>
			<th width="65px">JUMLAH</th>
			<th width="85px" colspan="2">PPH (Rp)</th>
			<th width="55px">TIKET</th>
			<th width="70px">TOTAL</th>
			<th width="80px">DITERIMA PER ORANG</th>
			<th width="75px">YANG MENERIMA</th>
			<?php } ?>
		<?php } ?>
	</tr>
	<tr>
		<?php if($jenisbiaya == "pswt_krywn_hotel" or $jenisbiaya == "pswt_ka_waka_hotel"){ ?>
			<td class="row_small">1</td>
			<td class="row_small">2</td>
			<td class="row_small">3</td>
			<td class="row_small">4</td>
			<td class="row_small">5</td>
			<td class="row_small">6</td>
			<td class="row_small">7</td>
			<td class="row_small">8</td>
			<td class="row_small">9</td>
			<td class="row_small" width="30px">10</td>
			<td class="row_small" width="55px">11 = 9x10</td>
			<td class="row_small">12</td>
			<td class="row_small">13=9+12</td>
			<td class="row_small">14=9-11+12</td>
			<td class="row_small">15</td>		
		<?php } elseif($jenisbiaya == "pswt_krywn_non_hotel" or $jenisbiaya == "pswt_ka_waka_non_hotel"){ ?>
			<td class="row_small">1</td>
			<td class="row_small">2</td>
			<td class="row_small">3</td>
			<td class="row_small">4</td>
			<td class="row_small">5</td>
			<td class="row_small">6</td>
			<td class="row_small">7</td>
			<td class="row_small">8</td>
			<td class="row_small" width="30px">9</td>
			<td class="row_small" width="55px">10 = 8x9</td>
			<td class="row_small">11</td>
			<td class="row_small">12 = 8+11</td>
			<td class="row_small">13 = 8-10+11</td>
			<td class="row_small">14</td>
		<?php } elseif($jenisbiaya == "darat_hotel" or $jenisbiaya == "spi"){ ?>
			<td class="row_small">1</td>
			<td class="row_small">2</td>
			<td class="row_small">3</td>
			<td class="row_small">4</td>
			<td class="row_small">5</td>
			<td class="row_small">6</td>
			<td class="row_small">7</td>
			<td class="row_small">8</td>
			<td class="row_small" width="30px">9</td>
			<td class="row_small" width="55px">10 = 8x9</td>
			<?php if($angkutan == "kendaraan dinas"){ ?>
			<td class="row_small">11</td>
			<td class="row_small">12</td>
			<?php }else{ ?>
			<td class="row_small">11</td>
			<td class="row_small">12 = 8+11</td>
			<td class="row_small">13 = 8-10+11</td>
			<td class="row_small">14</td>
			<?php } ?>
			
		<?php } else { ?>
			<td class="row_small">1</td>
			<td class="row_small">2</td>
			<td class="row_small">3</td>
			<td class="row_small">4</td>
			<td class="row_small">5</td>
			<td class="row_small">6</td>
			<td class="row_small">7</td>
			<td class="row_small" width="30px">8</td>
			<td class="row_small" width="55px">9 = 7x8</td>
			<?php if($angkutan == "kendaraan dinas"){ ?>
			<td class="row_small">10 = 7-9</td>
			<td class="row_small">11</td>
			<?php } else { ?>
			<td class="row_small">10</td>
			<td class="row_small">11 = 7+10</td>
			<td class="row_small">12 = 7-9+10</td>
			<td class="row_small">13</td>
			<?php } ?>
			
		<?php } ?>
	</tr>
	<tr>
		<?php if($jenisbiaya == "pswt_krywn_hotel" or $jenisbiaya == "pswt_ka_waka_hotel"){ ?>
			<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
		<?php } elseif($jenisbiaya == "pswt_krywn_non_hotel" or $jenisbiaya == "pswt_ka_waka_non_hotel"){ ?>
			<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
		<?php } elseif($jenisbiaya == "darat_hotel" or $jenisbiaya == "spi"){ ?>
			<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
			<?php if($angkutan == "kendaraan dinas"){ ?>
			<td>&nbsp;</td><td>&nbsp;</td>
			<?php }else{ ?>
			<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
			<?php } ?>
		<?php } else { ?>
			<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
			<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
			<?php if($angkutan == "kendaraan dinas"){ ?>
			<td>&nbsp;</td><td>&nbsp;</td>
			<?php } else { ?>
			<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
			<?php } ?>
		<?php } ?>
	</tr>
	<?php
		}
	}
	$no=1;
	$nottd=1;
	if(isset($get_ketua_pelaksana_sppd)){
	foreach($get_ketua_pelaksana_sppd as $row){
	$tiket_brgkt = $row->uang_pesawat_b+$row->uang_kereta_b+$row->uang_travel_b;
	$tiket_pulang = $row->uang_pesawat_p+$row->uang_kereta_p+$row->uang_travel_p;
	?>
	<tr>
		<?php if($jenisbiaya == "pswt_krywn_hotel" or $jenisbiaya == "pswt_ka_waka_hotel"){ ?>
			<td style="font-size:9,5pt" align="center"><?php echo $no++; ?></td>
			<td style="font-size:9,5pt"><?php echo strtoupper($row->nama_pelaksana)." ".$row->penanda; ?></td>
			<?php if (substr($row->noreg,0,4) == '1111' or substr($row->noreg,0,4) == '2222') { ?>
			<td style="font-size:9,5pt" align="center">-</td>
			<?php } else { ?>
			<td style="font-size:9,5pt" align="center"><?php echo romawi($row->gol); ?></td>
			<?php } ?>
			<td align="right" style="font-size:9,5pt"><?php echo number_format($row->uang_harian, 2,',','.');?></td>
			<td align="right" style="font-size:9,5pt"><?php echo number_format($row->uang_hotel, 2,',','.');?></td>
			<td align="right" style="font-size:9,5pt"><?php echo number_format($row->uang_taxi, 2,',','.');?></td>
			<td align="right" style="font-size:9,5pt"><?php echo number_format($tiket_brgkt, 2,',','.');?></td>
			<td align="right" style="font-size:9,5pt"><?php echo number_format($row->uang_repres, 2,',','.');?></td>
			<td align="right" style="font-size:9,5pt"><?php echo number_format($row->jumlah, 2,',','.');?></td>
			<td align="right" style="font-size:9,5pt"><?php echo $row->pph;?>&#37;</td>
			<td align="right" style="font-size:9,5pt"><?php echo number_format($row->potongan, 2,',','.');?></td>
			<td align="right" style="font-size:9,5pt"><?php echo number_format($tiket_pulang, 2,',','.');?></td>
			<td align="right" style="font-size:9,5pt"><?php echo number_format($row->total, 2,',','.');?></td>
			<td align="right" style="font-size:9,5pt"><?php echo number_format($row->jumlah_diterima, 2,',','.');?></td>
			<td style="font-size:9,5pt" align="left"><?php echo $nottd++; ?>. .......</td>
		<?php } elseif($jenisbiaya == "pswt_krywn_non_hotel" or $jenisbiaya == "pswt_ka_waka_non_hotel"){ ?>
			<td style="font-size:9,5pt" align="center"><?php echo $no++; ?></td>
			<td style="font-size:9,5pt"><?php echo strtoupper($row->nama_pelaksana)." ".$row->penanda; ?></td>
			<?php if (substr($row->noreg,0,4) == '1111' or substr($row->noreg,0,4) == '2222') { ?>
			<td style="font-size:9,5pt" align="center">-</td>
			<?php } else { ?>
			<td style="font-size:9,5pt" align="center"><?php echo romawi($row->gol); ?></td>
			<?php } ?>
			<td align="right" style="font-size:9,5pt"><?php echo number_format($row->uang_harian, 2,',','.');?></td>
			<td align="right" style="font-size:9,5pt"><?php echo number_format($row->uang_taxi, 2,',','.');?></td>
			<td align="right" style="font-size:9,5pt"><?php echo number_format($tiket_brgkt, 2,',','.');?></td>
			<td align="right" style="font-size:9,5pt"><?php echo number_format($row->uang_repres, 2,',','.');?></td>
			<td align="right" style="font-size:9,5pt"><?php echo number_format($row->jumlah, 2,',','.');?></td>
			<td align="right" style="font-size:9,5pt"><?php echo $row->pph;?>&#37;</td>
			<td align="right" style="font-size:9,5pt"><?php echo number_format($row->potongan, 2,',','.');?></td>
			<td align="right" style="font-size:9,5pt"><?php echo number_format($tiket_pulang, 2,',','.');?></td>
			<td align="right" style="font-size:9,5pt"><?php echo number_format($row->total, 2,',','.');?></td>
			<td align="right" style="font-size:9,5pt"><?php echo number_format($row->jumlah_diterima, 2,',','.');?></td>
			<td style="font-size:9,5pt" align="left"><?php echo $nottd++; ?>. .......</td>
		<?php } elseif($jenisbiaya == "darat_hotel" or $jenisbiaya == "spi"){ ?>
			<td style="font-size:9,5pt" align="center"><?php echo $no++; ?></td>
			<td style="font-size:9,5pt"><?php echo strtoupper($row->nama_pelaksana)." ".$row->penanda; ?></td>
			<?php if (substr($row->noreg,0,4) == '1111' or substr($row->noreg,0,4) == '2222') { ?>
			<td style="font-size:9,5pt" align="center">-</td>
			<?php } else { ?>
			<td style="font-size:9,5pt" align="center"><?php echo romawi($row->gol); ?></td>
			<?php } ?>
			<td align="right" style="font-size:9,5pt"><?php echo number_format($row->uang_harian, 2,',','.');?></td>
			<td align="right" style="font-size:9,5pt"><?php echo number_format($row->uang_hotel, 2,',','.');?></td>
			<?php if($angkutan == "kendaraan dinas"){ ?>
			<td align="right" style="font-size:9,5pt"><?php echo number_format($row->uang_bbm, 2,',','.');?></td>
			<?php } else { ?>
			<td align="right" style="font-size:9,5pt"><?php echo number_format($tiket_brgkt, 2,',','.');?></td>
			<?php } ?>
			<td align="right" style="font-size:9,5pt"><?php echo number_format($row->uang_repres, 2,',','.');?></td>
			<td align="right" style="font-size:9,5pt"><?php echo number_format($row->jumlah, 2,',','.');?></td>
			<td align="right" style="font-size:9,5pt"><?php echo $row->pph;?>&#37;</td>
			<td align="right" style="font-size:9,5pt"><?php echo number_format($row->potongan, 2,',','.');?></td>
			<?php if($angkutan == "kendaraan dinas"){ ?>
			<td align="right" style="font-size:9,5pt"><?php echo number_format($row->jumlah_diterima, 2,',','.');?></td>
			<?php } else { ?>
			<td align="right" style="font-size:9,5pt"><?php echo number_format($tiket_pulang, 2,',','.');?></td>
			<td align="right" style="font-size:9,5pt"><?php echo number_format($row->total, 2,',','.');?></td>
			<td align="right" style="font-size:9,5pt"><?php echo number_format($row->jumlah_diterima, 2,',','.');?></td>
			<?php } ?>
			<td style="font-size:9,5pt" align="left"><?php echo $nottd++; ?>. .......</td>
		<?php } else { ?>
			<td style="font-size:9,5pt" align="center"><?php echo $no++; ?></td>
			<td style="font-size:9,5pt"><?php echo strtoupper($row->nama_pelaksana)." ".$row->penanda; ?></td>
			<?php if (substr($row->noreg,0,4) == '1111' or substr($row->noreg,0,4) == '2222') { ?>
			<td style="font-size:9,5pt" align="center">-</td>
			<?php } else { ?>
			<td align="center" style="font-size:9,5pt"><?php echo romawi($row->gol); ?></td>
			<?php } ?>
			<td align="right" style="font-size:9,5pt"><?php echo number_format($row->uang_harian, 2,',','.');?></td>
			<?php if($angkutan == "kendaraan dinas"){ ?>
			<td align="right" style="font-size:9,5pt"><?php echo number_format($row->uang_bbm, 2,',','.');?></td>
			<?php } else { ?>
			<td align="right" style="font-size:9,5pt"><?php echo number_format($tiket_brgkt, 2,',','.');?></td>
			<?php } ?>
			<td align="right" style="font-size:9,5pt"><?php echo number_format($row->uang_repres, 2,',','.');?></td>
			<td align="right" style="font-size:9,5pt"><?php echo number_format($row->jumlah, 2,',','.');?></td>
			<td align="right" style="font-size:9,5pt"><?php echo $row->pph;?>&#37;</td>
			<td align="right" style="font-size:9,5pt"><?php echo number_format($row->potongan, 2,',','.');?></td>
			<?php if($angkutan == "kendaraan dinas"){ ?>
			<td align="right" style="font-size:9,5pt"><?php echo number_format($row->jumlah_diterima, 2,',','.');?></td>
			<?php } else { ?>
			<td align="right" style="font-size:9,5pt"><?php echo number_format($tiket_pulang, 2,',','.');?></td>
			<td align="right" style="font-size:9,5pt"><?php echo number_format($row->total, 2,',','.');?></td>
			<td align="right" style="font-size:9,5pt"><?php echo number_format($row->jumlah_diterima, 2,',','.');?></td>
			<?php } ?>
			<td style="font-size:9,5pt" align="left"><?php echo $nottd++; ?>. .......</td>
		<?php } ?>
		
	</tr>
	<?php
	}
	}
	?>
	<?php
	$no = 2;
	$nottd=2;
	if(isset($get_pelaksana_sppd)){
	foreach($get_pelaksana_sppd as $row){
	$tiket_brgkt = $row->uang_pesawat_b+$row->uang_kereta_b+$row->uang_travel_b;
	$tiket_pulang = $row->uang_pesawat_p+$row->uang_kereta_p+$row->uang_travel_p;
	?>
	<tr>
		<?php if($jenisbiaya == "pswt_krywn_hotel" or $jenisbiaya == "pswt_ka_waka_hotel"){ ?>
			<td style="font-size:9,5pt" align="center"><?php echo $no++; ?></td>
			<td style="font-size:9,5pt"><?php echo strtoupper($row->nama_pelaksana)." ".$row->penanda; ?></td>
			<?php if (substr($row->noreg,0,4) == '1111' or substr($row->noreg,0,4) == '2222') { ?>
			<td style="font-size:9,5pt" align="center">-</td>
			<?php } else { ?>
			<td style="font-size:9,5pt" align="center"><?php echo romawi($row->gol); ?></td>
			<?php } ?>
			<td align="right" style="font-size:9,5pt"><?php echo number_format($row->uang_harian, 2,',','.');?></td>
			<td align="right" style="font-size:9,5pt"><?php echo number_format($row->uang_hotel, 2,',','.');?></td>
			<td align="right" style="font-size:9,5pt"><?php echo number_format($row->uang_taxi, 2,',','.');?></td>
			<td align="right" style="font-size:9,5pt"><?php echo number_format($tiket_brgkt, 2,',','.');?></td>
			<td align="right" style="font-size:9,5pt"><?php echo number_format($row->uang_repres, 2,',','.');?></td>
			<td align="right" style="font-size:9,5pt"><?php echo number_format($row->jumlah, 2,',','.');?></td>
			<td align="right" style="font-size:9,5pt"><?php echo $row->pph;?>&#37;</td>
			<td align="right" style="font-size:9,5pt"><?php echo number_format($row->potongan, 2,',','.');?></td>
			<td align="right" style="font-size:9,5pt"><?php echo number_format($tiket_pulang, 2,',','.');?></td>
			<td align="right" style="font-size:9,5pt"><?php echo number_format($row->total, 2,',','.');?></td>
			<td align="right" style="font-size:9,5pt"><?php echo number_format($row->jumlah_diterima, 2,',','.');?></td>
			<td style="font-size:9,5pt" align="left"><?php echo $nottd++; ?>. .......</td>
		<?php } elseif($jenisbiaya == "pswt_krywn_non_hotel" or $jenisbiaya == "pswt_ka_waka_non_hotel"){ ?>
			<td style="font-size:9,5pt" align="center"><?php echo $no++; ?></td>
			<td style="font-size:9,5pt"><?php echo strtoupper($row->nama_pelaksana)." ".$row->penanda; ?></td>
			<?php if (substr($row->noreg,0,4) == '1111' or substr($row->noreg,0,4) == '2222') { ?>
			<td style="font-size:9,5pt" align="center">-</td>
			<?php } else { ?>
			<td style="font-size:9,5pt" align="center"><?php echo romawi($row->gol); ?></td>
			<?php } ?>
			<td align="right" style="font-size:9,5pt"><?php echo number_format($row->uang_harian, 2,',','.');?></td>
			<td align="right" style="font-size:9,5pt"><?php echo number_format($row->uang_taxi, 2,',','.');?></td>
			<td align="right" style="font-size:9,5pt"><?php echo number_format($tiket_brgkt, 2,',','.');?></td>
			<td align="right" style="font-size:9,5pt"><?php echo number_format($row->uang_repres, 2,',','.');?></td>
			<td align="right" style="font-size:9,5pt"><?php echo number_format($row->jumlah, 2,',','.');?></td>
			<td align="right" style="font-size:9,5pt"><?php echo $row->pph;?>&#37;</td>
			<td align="right" style="font-size:9,5pt"><?php echo number_format($row->potongan, 2,',','.');?></td>
			<td align="right" style="font-size:9,5pt"><?php echo number_format($tiket_pulang, 2,',','.');?></td>
			<td align="right" style="font-size:9,5pt"><?php echo number_format($row->total, 2,',','.');?></td>
			<td align="right" style="font-size:9,5pt"><?php echo number_format($row->jumlah_diterima, 2,',','.');?></td>
			<td style="font-size:9,5pt" align="left"><?php echo $nottd++; ?>. .......</td>
		<?php } elseif($jenisbiaya == "darat_hotel" or $jenisbiaya == "spi"){ ?>
			<td style="font-size:9,5pt" align="center"><?php echo $no++; ?></td>
			<td style="font-size:9,5pt"><?php echo strtoupper($row->nama_pelaksana)." ".$row->penanda; ?></td>
			<?php if (substr($row->noreg,0,4) == '1111' or substr($row->noreg,0,4) == '2222') { ?>
			<td style="font-size:9,5pt" align="center">-</td>
			<?php } else { ?>
			<td style="font-size:9,5pt" align="center"><?php echo romawi($row->gol); ?></td>
			<?php } ?>
			<td align="right" style="font-size:9,5pt"><?php echo number_format($row->uang_harian, 2,',','.');?></td>
			<td align="right" style="font-size:9,5pt"><?php echo number_format($row->uang_hotel, 2,',','.');?></td>
			<?php if($angkutan == "kendaraan dinas"){ ?>
			<td align="right" style="font-size:9,5pt"><?php echo number_format($row->uang_bbm, 2,',','.');?></td>
			<?php } else { ?>
			<td align="right" style="font-size:9,5pt"><?php echo number_format($tiket_brgkt, 2,',','.');?></td>
			<?php } ?>
			<td align="right" style="font-size:9,5pt"><?php echo number_format($row->uang_repres, 2,',','.');?></td>
			<td align="right" style="font-size:9,5pt"><?php echo number_format($row->jumlah, 2,',','.');?></td>
			<td align="right" style="font-size:9,5pt"><?php echo $row->pph;?>&#37;</td>
			<td align="right" style="font-size:9,5pt"><?php echo number_format($row->potongan, 2,',','.');?></td>
			<?php if($angkutan == "kendaraan dinas"){ ?>
			<td align="right" style="font-size:9,5pt"><?php echo number_format($row->jumlah_diterima, 2,',','.');?></td>
			<?php } else { ?>
			<td align="right" style="font-size:9,5pt"><?php echo number_format($tiket_pulang, 2,',','.');?></td>
			<td align="right" style="font-size:9,5pt"><?php echo number_format($row->total, 2,',','.');?></td>
			<td align="right" style="font-size:9,5pt"><?php echo number_format($row->jumlah_diterima, 2,',','.');?></td>
			<?php } ?>
			<td style="font-size:9,5pt" align="left"><?php echo $nottd++; ?>. .......</td>
		<?php } else { ?>
			<td style="font-size:9,5pt" align="center"><?php echo $no++; ?></td>
			<td style="font-size:9,5pt"><?php echo strtoupper($row->nama_pelaksana)." ".$row->penanda; ?></td>
			<?php if (substr($row->noreg,0,4) == '1111' or substr($row->noreg,0,4) == '2222') { ?>
			<td style="font-size:9,5pt" align="center">-</td>
			<?php } else { ?>
			<td style="font-size:9,5pt" align="center"><?php echo romawi($row->gol); ?></td>
			<?php } ?>
			<td align="right" style="font-size:9,5pt"><?php echo number_format($row->uang_harian, 2,',','.');?></td>
			<?php if($angkutan == "kendaraan dinas"){ ?>
			<td align="right" style="font-size:9,5pt"><?php echo number_format($row->uang_bbm, 2,',','.');?></td>
			<?php } else { ?>
			<td align="right" style="font-size:9,5pt"><?php echo number_format($tiket_brgkt, 2,',','.');?></td>
			<?php } ?>
			<td align="right" style="font-size:9,5pt"><?php echo number_format($row->uang_repres, 2,',','.');?></td>
			<td align="right" style="font-size:9,5pt"><?php echo number_format($row->jumlah, 2,',','.');?></td>
			<td align="right" style="font-size:9,5pt"><?php echo $row->pph;?>&#37;</td>
			<td align="right" style="font-size:9,5pt"><?php echo number_format($row->potongan, 2,',','.');?></td>
			<?php if($angkutan == "kendaraan dinas"){ ?>
			<td align="right" style="font-size:9,5pt"><?php echo number_format($row->jumlah_diterima, 2,',','.');?></td>
			<?php } else { ?>
			<td align="right" style="font-size:9,5pt"><?php echo number_format($tiket_pulang, 2,',','.');?></td>
			<td align="right" style="font-size:9,5pt"><?php echo number_format($row->total, 2,',','.');?></td>
			<td align="right" style="font-size:9,5pt"><?php echo number_format($row->jumlah_diterima, 2,',','.');?></td>
			<?php } ?>
			<td style="font-size:9,5pt" align="left"><?php echo $nottd++; ?>. .......</td>
		<?php } ?>
		
	</tr>
	<?php } } ?>
	<tr>
		<?php if($jenisbiaya == "pswt_krywn_hotel" or $jenisbiaya == "pswt_ka_waka_hotel"){ ?>
			<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
		<?php } elseif($jenisbiaya == "pswt_krywn_non_hotel" or $jenisbiaya == "pswt_ka_waka_non_hotel"){ ?>
			<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
		<?php } elseif($jenisbiaya == "darat_hotel" or $jenisbiaya == "spi"){ ?>
			<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
			<?php if($angkutan == "kendaraan dinas"){ ?>
			<td>&nbsp;</td><td>&nbsp;</td>
			<?php }else{ ?>
			<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
			<?php } ?>
		<?php } else { ?>
			<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
			<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
			<?php if($angkutan == "kendaraan dinas"){ ?>
			<td>&nbsp;</td><td>&nbsp;</td>
			<?php } else { ?>
			<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
			<?php } ?>
		<?php } ?>
	</tr>
	<?php
	if(isset($get_sum_biaya)){	
		foreach($get_sum_biaya as $row){
		$jml_tiket_brgkt = $row->jml_upesawat_b+$row->jml_ukereta_b+$row->jml_utravel_b;
		$jml_tiket_pulang = $row->jml_upesawat_p+$row->jml_ukereta_p+$row->jml_utravel_p;
	?>
	<tr>
		<?php if($jenisbiaya == "pswt_krywn_hotel" or $jenisbiaya == "pswt_ka_waka_hotel"){ ?>
			<td style="font-size:9,5pt" align="center"></td>
			<td style="font-size:9,5pt" align="center"></td>
			<td style="font-size:9,5pt" align="center"></td>
			<td style="font-size:9,5pt" align="right" class="td_total"><?php echo number_format($row->jml_uharian, 2,',','.');?></td>
			<td style="font-size:9,5pt" align="right" class="td_total"><?php echo number_format($row->jml_uhotel, 2,',','.');?></td>
			<td style="font-size:9,5pt" align="right" class="td_total"><?php echo number_format($row->jml_utaxi, 2,',','.');?></td>
			<td style="font-size:9,5pt" align="right" class="td_total"><?php echo number_format($jml_tiket_brgkt, 2,',','.');?></td>
			<td style="font-size:9,5pt" align="right" class="td_total"><?php echo number_format($row->jml_urepres, 2,',','.');?></td>
			<td style="font-size:9,5pt" align="right" class="td_total"><?php echo number_format($row->jml_jumlah, 2,',','.');?></td>
			<td style="font-size:9,5pt" align="right" style="font-size:9,5pt"></td>
			<td style="font-size:9,5pt" align="right" class="td_total"><?php echo number_format($row->jml_potongan, 2,',','.');?></td>
			<td style="font-size:9,5pt" align="right" class="td_total"><?php echo number_format($jml_tiket_pulang, 2,',','.');?></td>
			<td style="font-size:9,5pt" align="right" class="td_total"><?php echo number_format($row->jml_total, 2,',','.');?></td>
			<td style="font-size:9,5pt" align="right" class="td_total"><?php echo number_format($row->jml_jumlah_diterima, 2,',','.');?></td>
			<td style="font-size:9,5pt" align="left"></td>
		<?php } elseif($jenisbiaya == "pswt_krywn_non_hotel" or $jenisbiaya == "pswt_ka_waka_non_hotel"){ ?>
			<td style="font-size:9,5pt" align="center"></td>
			<td style="font-size:9,5pt" align="center"></td>
			<td style="font-size:9,5pt" align="center"></td>
			<td style="font-size:9,5pt" align="right" class="td_total"><?php echo number_format($row->jml_uharian, 2,',','.');?></td>
			<td style="font-size:9,5pt" align="right" class="td_total"><?php echo number_format($row->jml_utaxi, 2,',','.');?></td>
			<td style="font-size:9,5pt" align="right" class="td_total"><?php echo number_format($jml_tiket_brgkt, 2,',','.');?></td>
			<td style="font-size:9,5pt" align="right" class="td_total"><?php echo number_format($row->jml_urepres, 2,',','.');?></td>
			<td style="font-size:9,5pt" align="right" class="td_total"><?php echo number_format($row->jml_jumlah, 2,',','.');?></td>
			<td style="font-size:9,5pt" align="right" style="font-size:9,5pt"></td>
			<td style="font-size:9,5pt" align="right" class="td_total"><?php echo number_format($row->jml_potongan, 2,',','.');?></td>
			<td style="font-size:9,5pt" align="right" class="td_total"><?php echo number_format($jml_tiket_pulang, 2,',','.');?></td>
			<td style="font-size:9,5pt" align="right" class="td_total"><?php echo number_format($row->jml_total, 2,',','.');?></td>
			<td style="font-size:9,5pt" align="right" class="td_total"><?php echo number_format($row->jml_jumlah_diterima, 2,',','.');?></td>
			<td style="font-size:9,5pt" align="left"></td>
		<?php } elseif($jenisbiaya == "darat_hotel" or $jenisbiaya == "spi"){ ?>
			<td style="font-size:9,5pt" align="center"></td>
			<td style="font-size:9,5pt" align="center"></td>
			<td style="font-size:9,5pt" align="center"></td>
			<td style="font-size:9,5pt" align="right" class="td_total"><?php echo number_format($row->jml_uharian, 2,',','.');?></td>
			<td style="font-size:9,5pt" align="right" class="td_total"><?php echo number_format($row->jml_uhotel, 2,',','.');?></td>
			<?php if($angkutan == "kendaraan dinas"){ ?>
			<td style="font-size:9,5pt" align="right" class="td_total"><?php echo number_format($row->jml_ubbm, 2,',','.');?></td>
			<?php } else { ?>
			<td style="font-size:9,5pt" align="right" class="td_total"><?php echo number_format($jml_tiket_brgkt, 2,',','.');?></td>
			<?php } ?>
			<td style="font-size:9,5pt" align="right" class="td_total"><?php echo number_format($row->jml_urepres, 2,',','.');?></td>
			<td style="font-size:9,5pt" align="right" class="td_total"><?php echo number_format($row->jml_jumlah, 2,',','.');?></td>
			<td style="font-size:9,5pt" align="right" style="font-size:9,5pt"></td>
			<td style="font-size:9,5pt" align="right" class="td_total"><?php echo number_format($row->jml_potongan, 2,',','.');?></td>
			<?php if($angkutan == "kendaraan dinas"){ ?>
			<td style="font-size:9,5pt" align="right" class="td_total"><?php echo number_format($row->jml_jumlah_diterima, 2,',','.');?></td>
			<?php } else { ?>
			<td style="font-size:9,5pt" align="right" class="td_total"><?php echo number_format($jml_tiket_pulang, 2,',','.');?></td>
			<td style="font-size:9,5pt" align="right" class="td_total"><?php echo number_format($row->jml_total, 2,',','.');?></td>
			<td style="font-size:9,5pt" align="right" class="td_total"><?php echo number_format($row->jml_jumlah_diterima, 2,',','.');?></td>
			<?php } ?>
			<td style="font-size:9,5pt" align="left"></td>
		<?php } else { ?>
			<td style="font-size:9,5pt" align="center"></td>
			<td style="font-size:9,5pt" align="center"></td>
			<td style="font-size:9,5pt" align="center"></td>
			<td style="font-size:9,5pt" align="right" class="td_total"><?php echo number_format($row->jml_uharian, 2,',','.');?></td>
			<?php if($angkutan == "kendaraan dinas"){ ?>
			<td style="font-size:9,5pt" align="right" class="td_total"><?php echo number_format($row->jml_ubbm, 2,',','.');?></td>
			<?php } else { ?>
			<td align="right" class="td_total"><?php echo number_format($jml_tiket_brgkt, 2,',','.');?></td>
			<?php } ?>
			<td style="font-size:9,5pt" align="right" class="td_total"><?php echo number_format($row->jml_urepres, 2,',','.');?></td>
			<td style="font-size:9,5pt" align="right" class="td_total"><?php echo number_format($row->jml_jumlah, 2,',','.');?></td>
			<td style="font-size:9,5pt" align="right" style="font-size:9,5pt"></td>
			<td style="font-size:9,5pt" align="right" class="td_total"><?php echo number_format($row->jml_potongan, 2,',','.');?></td>
			<?php if($angkutan == "kendaraan dinas"){ ?>
			<td style="font-size:9,5pt" align="right" class="td_total"><?php echo number_format($row->jml_jumlah_diterima, 2,',','.');?></td>
			<?php } else { ?>
			<td style="font-size:9,5pt" align="right" class="td_total"><?php echo number_format($jml_tiket_pulang, 2,',','.');?></td>
			<td style="font-size:9,5pt" align="right" class="td_total"><?php echo number_format($row->jml_total, 2,',','.');?></td>
			<td style="font-size:9,5pt" align="right" class="td_total"><?php echo number_format($row->jml_jumlah_diterima, 2,',','.');?></td>
			<?php } ?>
			<td style="font-size:9,5pt" align="left"></td>
		<?php } ?>
		
	</tr>
	
	<?php }} ?>
	</table>
	
	<br/>
	<?php
	if(isset($get_data_sppd)){
		
	foreach($get_data_sppd as $row){
	?>
	<br/><b>KETERANGAN:</b> <?php echo strtoupper($row->ket_lain); ?><br/>
	<table border="0">
	<?php if($jenisbiaya == "pswt_krywn_hotel" or $jenisbiaya == "pswt_ka_waka_hotel"){ ?>
		<tr>
			<td width="10px"><b>1.</b></td><td colspan="2" width="525px"><b>KOLOM 7 :</b></td>
			<td rowspan="12" width="205px" align="center">
				SEMARANG, &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo strtoupper(substr($tgl_skpd_indo,3,25)); ?> <br/><br/><br/><br/>
				<b><?php echo strtoupper($pemeriksa_3); ?></b><br/>
				<?php echo strtoupper($jabatan_3); ?>
			</td>
		</tr>
		<tr>
			<td> &nbsp; </td><td width="500px">- TIKET <?php echo strtoupper($row->angkutan); ?> DIBERIKAN LUMPSUM.</td>
		</tr>
		<tr><td colspan="2">&#8195;</td></tr>
		<tr>
			<td><b>2.</b></td><td><b>KOLOM 12 :</b></td>
		</tr>
		<tr>
			<td> &nbsp; </td><td>- TIKET <?php echo strtoupper($row->angkutan); ?> DIBELIKAN OLEH PERUSAHAAN.</td>
		</tr>
		<tr><td colspan="2" height="10px">&#8195;</td></tr>
		<tr>
			<td><b>3.</b></td><td><b>KOLOM 10 :</b></td>
		</tr>
		<tr>
			<td> &nbsp; </td><td>- UNTUK PENGHASILAN 1 TAHUN &#62; Rp. 50 JUTA DIKENAKAN PPH 15&#37;.</td>
		</tr>
		<tr>
			<td> &nbsp; </td><td>- UNTUK PENGHASILAN 1 TAHUN &#60; Rp. 50 JUTA DIKENAKAN PPH 5&#37;.</td>
		</tr>
		<tr>
			<td> &nbsp; </td><td>- UNTUK YANG TIDAK MEMPUNYAI NPWP DIKENAKAN PPH 6&#37;.</td>
		</tr>
	<?php } elseif($jenisbiaya == "pswt_krywn_non_hotel" or $jenisbiaya == "pswt_ka_waka_non_hotel"){ ?>
		<tr>
			<td width="10px"><b>1.</b></td><td colspan="2" width="525px"><b>KOLOM 6 :</b></td>
			<td rowspan="12" width="205px" align="center">
				SEMARANG, &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo substr($tgl_skpd_indo,3,25); ?> <br/><br/><br/><br/>
				<b><?php echo strtoupper($pemeriksa_3); ?></b><br/>
				<?php echo strtoupper($jabatan_3); ?>
			</td>
		</tr>
		<tr>
			<td> &nbsp; </td><td width="500px">- TIKET <?php echo strtoupper($row->angkutan); ?> DIBERIKAN LUMPSUM.</td>
		</tr>
		<tr><td colspan="2">&#8195;</td></tr>
		<tr>
			<td><b>2.</b></td><td><b>KOLOM 11 :</b></td>
		</tr>
		<tr>
			<td> &nbsp; </td><td>- TIKET <?php echo strtoupper($row->angkutan); ?> DIBELIKAN OLEH PERUSAHAAN.</td>
		</tr>
		<tr><td colspan="2" height="10px">&#8195;</td></tr>
		<tr>
			<td><b>3.</b></td><td><b>KOLOM 9 :</b></td>
		</tr>
		<tr>
			<td> &nbsp; </td><td>- UNTUK PENGHASILAN 1 TAHUN &#62; Rp. 50 JUTA DIKENAKAN PPH 15&#37;.</td>
		</tr>
		<tr>
			<td> &nbsp; </td><td>- UNTUK PENGHASILAN 1 TAHUN &#60; Rp. 50 JUTA DIKENAKAN PPH 5&#37;.</td>
		</tr>
		<tr>
			<td> &nbsp; </td><td>- UNTUK YANG TIDAK MEMPUNYAI NPWP DIKENAKAN PPH 6&#37;.</td>
		</tr>
	<?php } elseif($jenisbiaya == "darat_hotel" or $jenisbiaya == "spi"){ ?>
			<?php if($angkutan == "kendaraan dinas"){ ?>
			<tr>
				<td width="10px"><b>1.</b></td>
				<td colspan="2" width="525px"><b>KOLOM 6 :</b></td>
				
				<td rowspan="12" width="205px" align="center">
					SEMARANG, &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo substr($tgl_skpd_indo,3,25); ?> <br/><br/><br/><br/>
					<b><?php echo strtoupper($pemeriksa_3); ?></b><br/>
					<?php echo strtoupper($jabatan_3); ?>
					
				</td>
			</tr>
			<tr>
				<td> &nbsp; </td>
				<td width="150px">- LAMA</td>
				<td>: 
					<?php 
						$durasi_malam = $row->durasi_tgs-1;
						echo $row->durasi_tgs." (".strtoupper(to_word($row->durasi_tgs))." ) HARI "; 
						if($row->jenis_biaya == "darat_hotel"){
							echo $durasi_malam." (".strtoupper(to_word($durasi_malam))." ) MALAM"; 
						}
					?>
				</td>
			</tr>
			<tr>
				<td> &nbsp; </td>
				<td>- JARAK</td>
				<td>: <?php echo $row->jarak; ?> KM</td>
			</tr>
			<tr>
				<td> &nbsp; </td>
				<td>- JENIS BBM</td>
				<td>: <?php echo strtoupper($row->jenis_bbm); ?></td>
			</tr>
			<tr>
				<td> &nbsp; </td>
				<td>- HASIL KILOMETER</td>
				<td>: <?php echo $row->hasil_km; ?> LITER</td>
			</tr>
			<tr>
				<td> &nbsp; </td>
				<td>- BBM HARIAN</td>
				<td>: <?php echo $row->harian_bbm; ?> LITER</td>
			</tr>
			<tr>
				<td> &nbsp; </td>
				<td><b>- JUMLAH BBM</b></td>
				<td><b>: 
					<?php 
						$jml_bbm = $row->hasil_km + $row->harian_bbm;
						echo $jml_bbm. " LITER x Rp. ".$row->harga_bbm." = Rp. ".number_format( $row->jml_bbm, 0 , '' , '.' ); 
					?>		
					</b>
					
				</td>
			</tr>
			<tr>
				<td colspan="3" height="10px">&#8195;</td>
			</tr>
			<tr>
				<td><b>2.</b></td>
				<td colspan="2"><b>KOLOM 9 :</b></td>
			</tr>
			<tr>
				<td> &nbsp; </td>
				<td colspan="2">- UNTUK PENGHASILAN 1 TAHUN &#62; Rp. 50 JUTA DIKENAKAN PPH 15&#37;.</td>
			</tr>
			<tr>
				<td> &nbsp; </td>
				<td colspan="2">- UNTUK PENGHASILAN 1 TAHUN &#60; Rp. 50 JUTA DIKENAKAN PPH 5&#37;.</td>
			</tr>
			<tr>
				<td> &nbsp; </td>
				<td colspan="2">- UNTUK YANG TIDAK MEMPUNYAI NPWP DIKENAKAN PPH 6&#37;.</td>
			</tr>
			<?php } else { ?>
			<tr>
				<td width="10px"><b>1.</b></td><td colspan="2" width="525px"><b>KOLOM 6 :</b></td>
				<td rowspan="12" width="205px" align="center">
					SEMARANG, &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo substr($tgl_skpd_indo,3,25); ?> <br/><br/><br/><br/>
					<b><?php echo strtoupper($pemeriksa_3); ?></b><br/>
					<?php echo strtoupper($jabatan_3); ?>
				</td>
			</tr>
			<tr>
				<td> &nbsp; </td><td width="500px">- TIKET <?php echo strtoupper($row->angkutan); ?> DIBERIKAN LUMPSUM.</td>
			</tr>
			<tr><td colspan="2">&#8195;</td></tr>
			<tr>
				<td><b>2.</b></td><td><b>KOLOM 11 :</b></td>
			</tr>
			<tr>
				<td> &nbsp; </td><td>- TIKET <?php echo strtoupper($row->angkutan); ?> DIBELIKAN OLEH PERUSAHAAN.</td>
			</tr>
			<tr><td colspan="2" height="10px">&#8195;</td></tr>
			<tr>
				<td><b>3.</b></td><td><b>KOLOM 9 :</b></td>
			</tr>
			<tr>
				<td> &nbsp; </td><td>- UNTUK PENGHASILAN 1 TAHUN &#62; Rp. 50 JUTA DIKENAKAN PPH 15&#37;.</td>
			</tr>
			<tr>
				<td> &nbsp; </td><td>- UNTUK PENGHASILAN 1 TAHUN &#60; Rp. 50 JUTA DIKENAKAN PPH 5&#37;.</td>
			</tr>
			<tr>
				<td> &nbsp; </td><td>- UNTUK YANG TIDAK MEMPUNYAI NPWP DIKENAKAN PPH 6&#37;.</td>
			</tr>
			<?php } ?>
	<?php } else { ?>
			<?php if($angkutan == "kendaraan dinas"){ ?>
			<tr>
				<td width="10px"><b>1.</b></td>
				<td colspan="2" width="525px"><b>KOLOM 6 :</b></td>
				
				<td rowspan="12" width="205px" align="center">
					SEMARANG, &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo substr($tgl_skpd_indo,3,25); ?> <br/><br/><br/><br/>
					<b><?php echo strtoupper($pemeriksa_3); ?></b><br/>
					<?php echo strtoupper($jabatan_3); ?>
					
				</td>
			</tr>
			<tr>
				<td> &nbsp; </td>
				<td width="150px">- LAMA</td>
				<td>: 
					<?php 
						$durasi_malam = $row->durasi_tgs-1;
						echo $row->durasi_tgs." (".strtoupper(to_word($row->durasi_tgs))." ) HARI "; 
						if($row->jenis_biaya == "darat_hotel"){
							echo $durasi_malam." (".strtoupper(to_word($durasi_malam))." ) MALAM"; 
						}
					?>
				</td>
			</tr>
			<tr>
				<td> &nbsp; </td>
				<td>- JARAK</td>
				<td>: <?php echo $row->jarak; ?> KM</td>
			</tr>
			<tr>
				<td> &nbsp; </td>
				<td>- JENIS BBM</td>
				<td>: <?php echo strtoupper($row->jenis_bbm); ?></td>
			</tr>
			<tr>
				<td> &nbsp; </td>
				<td>- HASIL KILOMETER</td>
				<td>: <?php echo $row->hasil_km; ?> LITER</td>
			</tr>
			<tr>
				<td> &nbsp; </td>
				<td>- BBM HARIAN</td>
				<td>: <?php echo $row->harian_bbm; ?> LITER</td>
			</tr>
			<tr>
				<td> &nbsp; </td>
				<td><b>- JUMLAH BBM</b></td>
				<td><b>: 
					<?php 
						$jml_bbm = $row->hasil_km + $row->harian_bbm;
						echo $jml_bbm. " LITER x Rp. ".$row->harga_bbm." = Rp. ".number_format( $row->jml_bbm, 0 , '' , '.' ); 
					?>		
					</b>
					
				</td>
			</tr>
			<tr>
				<td colspan="3" height="10px">&#8195;</td>
			</tr>
			<tr>
				<td><b>2.</b></td>
				<td colspan="2"><b>KOLOM 8 :</b></td>
			</tr>
			<tr>
				<td> &nbsp; </td>
				<td colspan="2">- UNTUK PENGHASILAN 1 TAHUN &#62; Rp. 50 JUTA DIKENAKAN PPH 15&#37;.</td>
			</tr>
			<tr>
				<td> &nbsp; </td>
				<td colspan="2">- UNTUK PENGHASILAN 1 TAHUN &#60; Rp. 50 JUTA DIKENAKAN PPH 5&#37;.</td>
			</tr>
			<tr>
				<td> &nbsp; </td>
				<td colspan="2">- UNTUK YANG TIDAK MEMPUNYAI NPWP DIKENAKAN PPH 6&#37;.</td>
			</tr>
			<?php } else { ?>
			<tr>
				<td width="10px"><b>1.</b></td><td colspan="2" width="525px"><b>KOLOM 5 :</b></td>
				<td rowspan="12" width="205px" align="center">
					SEMARANG, &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo substr($tgl_skpd_indo,3,25); ?> <br/><br/><br/><br/>
					<b><?php echo strtoupper($pemeriksa_3); ?></b><br/>
					<?php echo strtoupper($jabatan_3); ?>
				</td>
			</tr>
			<tr>
				<td> &nbsp; </td><td width="500px">- TIKET <?php echo strtoupper($row->angkutan); ?> DIBERIKAN LUMPSUM.</td>
			</tr>
			<tr><td colspan="2">&#8195;</td></tr>
			<tr>
				<td><b>2.</b></td><td><b>KOLOM 10 :</b></td>
			</tr>
			<tr>
				<td> &nbsp; </td><td>- TIKET <?php echo strtoupper($row->angkutan); ?> DIBELIKAN OLEH PERUSAHAAN.</td>
			</tr>
			<tr><td colspan="2" height="10px">&#8195;</td></tr>
			<tr>
				<td><b>3.</b></td><td><b>KOLOM 9 :</b></td>
			</tr>
			<tr>
				<td> &nbsp; </td><td>- UNTUK PENGHASILAN 1 TAHUN &#62; Rp. 50 JUTA DIKENAKAN PPH 15&#37;.</td>
			</tr>
			<tr>
				<td> &nbsp; </td><td>- UNTUK PENGHASILAN 1 TAHUN &#60; Rp. 50 JUTA DIKENAKAN PPH 5&#37;.</td>
			</tr>
			<tr>
				<td> &nbsp; </td><td>- UNTUK YANG TIDAK MEMPUNYAI NPWP DIKENAKAN PPH 6&#37;.</td>
			</tr>
			<?php } ?>
	<?php } ?>
	
	</table>
	<small style="font-size:8pt;"><i>#<?php echo $row->jenis_biaya;?></i></small>
</div>
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
	if(isset($get_data_sppd)){
		
	foreach($get_data_sppd as $row){
	?>	
	<table border="0">
	<tr>
		<td colspan="2" width="200px" height="15px" class="smallfont10">PERUM BULOG DIVRE JATENG</td>
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
		<td colspan="3" width="305px" class="fbc10" style="line-height:25px;">VERIFIKASI TEKNIS/SEKSI TU &#38; UMUM</td>
		<td colspan="4" width="500px" class="fbc10" style="line-height:25px;">VERIFIKASI KOMPTABLE</td>
	</tr>
	<tr>
		<td colspan="2" style="border-bottom-style:none;line-height:20px;">Tagihan/pembayaran dari :</td>
		<td style="line-height:20px;">Jumlah :</td>
		<td colspan="2" class="fbc10" style="line-height:20px;">CEKING BUKTI</td>
		<td colspan="2" class="fbc10" style="line-height:20px;">PEMBAYARAN/PENERIMAAN</td>
	</tr>
	<tr>
		<td colspan="2" class="fbc12" style="line-height:20px;">TU &#38; UMUM</td>
		<td style="font-size:12pt" style="line-height:20px;"><b>RP. <?php echo number_format($total_biaya, 2,',','.');?></b></td>
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
		<td colspan="3" height="100px">PENJELASAN LAINNYA : <br/>
			<p style="font-size:14pt;font-weight:bold;">
			<?php 
				$noskpd = str_pad($row->no_skpd,3, "0", STR_PAD_LEFT);
				$no_skpd = str_pad($row->no_skpd,3, "0", STR_PAD_LEFT)."".$row->attr_skpd; 
				$nomor = str_pad($row->no_skpd,3, "0", STR_PAD_LEFT);
				echo "SKPD NO : <BR/>".$no_skpd. " = Rp. ".number_format($total_biaya, 2,',','.');
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
		<td colspan="3" height="50px"> </td>
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
$content = ob_get_contents();
ob_end_clean();
$obj_pdf->writeHTML($content, true, false, true, false, '');
$obj_pdf->Output($noskpd.'_REKAP_SKPD_'.$tanggal.'.pdf', 'I');
?>