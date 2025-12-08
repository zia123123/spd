<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
 
class export_xls extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->helper("tanggal");
		$this->load->helper("romawi");		
	}
	
	function index()
	{
		$this->load->library("PHPExcel");
		
		$from	= date('Y-m-d', strtotime($this->input->post('from')));
		$to		= date('Y-m-d', strtotime($this->input->post('to')));
		
		
		$dari 	= tgl_indo($from); 
		$sampai = tgl_indo($to); 
		
		$phpExcel = new PHPExcel();
		$baris = $phpExcel->setActiveSheetIndex(0);
		
		// SET MERGE CELL
		$phpExcel->getActiveSheet()->mergeCells('A1:V1');
		$phpExcel->getActiveSheet()->mergeCells('A2:V2');
		$phpExcel->getActiveSheet()->mergeCells('A3:V3');
		$phpExcel->getActiveSheet()->mergeCells('A5:A6');
		$phpExcel->getActiveSheet()->mergeCells('B5:C5');
		$phpExcel->getActiveSheet()->mergeCells('B8:C8');
		//$phpExcel->getActiveSheet()->mergeCells('D5:D6');
		$phpExcel->getActiveSheet()->mergeCells('E5:E6');
		$phpExcel->getActiveSheet()->mergeCells('F5:F6');
		$phpExcel->getActiveSheet()->mergeCells('G5:G6');
		//$phpExcel->getActiveSheet()->mergeCells('N5:O5');
		$phpExcel->getActiveSheet()->mergeCells('P5:P6');
		//$phpExcel->getActiveSheet()->mergeCells('Q5:Q6');
		$phpExcel->getActiveSheet()->mergeCells('R5:R6');
		$phpExcel->getActiveSheet()->mergeCells('S5:S6');
		
		$phpExcel->getActiveSheet()->mergeCells('J5:L5');
		//$phpExcel->getActiveSheet()->mergeCells('M5:M6');
		
		// SET WRAP
		$phpExcel->getActiveSheet()->getStyle('B9:G999')->getAlignment()->setWrapText(true); 
		$phpExcel->getActiveSheet()->getStyle('I6:I'.$phpExcel->getActiveSheet()->getHighestRow())->getAlignment()->setWrapText(true); 
		$phpExcel->getActiveSheet()->getStyle('P5:P6'.$phpExcel->getActiveSheet()->getHighestRow())->getAlignment()->setWrapText(true); 
		
		$phpExcel->getActiveSheet()->getRowDimension(1)->setRowHeight(18);
		$phpExcel->getActiveSheet()->getRowDimension(2)->setRowHeight(18);
		$phpExcel->getActiveSheet()->getRowDimension(3)->setRowHeight(18);
		$styleArray = array(
			'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
			'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
			),
		);
		
		// SET FONT
		$phpExcel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
		$phpExcel->getActiveSheet()->getStyle('A2')->getFont()->setBold(true);
		$phpExcel->getActiveSheet()->getStyle('A3')->getFont()->setBold(true);
		$phpExcel->getActiveSheet()->getStyle('A1')->getFont()->setSize(14);
		$phpExcel->getActiveSheet()->getStyle('A2')->getFont()->setSize(14);
		$phpExcel->getActiveSheet()->getStyle('A3')->getFont()->setSize(14);
		
		// SET STYLE
		$phpExcel->getActiveSheet()->getStyle('A1:W3')->applyFromArray($styleArray);
		$phpExcel->getActiveSheet()->getStyle('A5:W6')->applyFromArray($styleArray);
		$phpExcel->getActiveSheet()->getStyle('A5:W6')->getFont()->setBold(true);
		$phpExcel->getActiveSheet()->getStyle('A7:W7')->getFont()->setItalic(true);
		$phpExcel->getActiveSheet()->getStyle('A8:W8')->getFont()->setBold(true);
		
		//SET FORMAT NUMBER
		$phpExcel->getActiveSheet()->getStyle('J9:V999')->getNumberFormat()->setFormatCode('#,##0');
		
		// STYLE BORDER
		$styleArray1 = array(
		  'borders' => array(
			'allborders' => array(
			  'style' => PHPExcel_Style_Border::BORDER_THIN
			)
		  )
		);
				//background
		$styleArray12 = array(
			'fill' => array(
				'type' => PHPExcel_Style_Fill::FILL_SOLID,
				'startcolor' => array(
					'rgb' => 'FFEC8B',
				),
			),
		);

		$styleArray_currency = array(
			'borders' => array(
				'allborders' => array(
				  'style' => PHPExcel_Style_Border::BORDER_THIN
				)
			),
			'alignment' => array(
				'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
				'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_RIGHT,
			),
		);			
		
		//$phpExcel->getActiveSheet()->freezePane('A8');
		$phpExcel->getActiveSheet()->getColumnDimension('A')->setWidth(4.1);
		$phpExcel->getActiveSheet()->getColumnDimension('B')->setWidth(15);
		$phpExcel->getActiveSheet()->getColumnDimension('C')->setWidth(15);
		$phpExcel->getActiveSheet()->getColumnDimension('D')->setWidth(35);
		$phpExcel->getActiveSheet()->getColumnDimension('E')->setWidth(35);
		$phpExcel->getActiveSheet()->getColumnDimension('F')->setWidth(5);
		$phpExcel->getActiveSheet()->getColumnDimension('G')->setWidth(30);
		$phpExcel->getActiveSheet()->getColumnDimension('H')->setWidth(30);
		$phpExcel->getActiveSheet()->getColumnDimension('I')->setWidth(12);
		$phpExcel->getActiveSheet()->getColumnDimension('J')->setWidth(12);
		$phpExcel->getActiveSheet()->getColumnDimension('K')->setWidth(20);
		$phpExcel->getActiveSheet()->getColumnDimension('L')->setWidth(12);
		$phpExcel->getActiveSheet()->getColumnDimension('M')->setWidth(16);
		$phpExcel->getActiveSheet()->getColumnDimension('N')->setWidth(12);
		$phpExcel->getActiveSheet()->getColumnDimension('O')->setWidth(16);
		$phpExcel->getActiveSheet()->getColumnDimension('P')->setWidth(13);
		$phpExcel->getActiveSheet()->getColumnDimension('Q')->setWidth(12);
		$phpExcel->getActiveSheet()->getColumnDimension('R')->setWidth(20);
		$phpExcel->getActiveSheet()->getColumnDimension('S')->setWidth(16);
		$phpExcel->getActiveSheet()->getColumnDimension('T')->setWidth(16);
		$phpExcel->getActiveSheet()->getColumnDimension('U')->setWidth(16);
		$phpExcel->getActiveSheet()->getColumnDimension('V')->setWidth(16);
		$phpExcel->getActiveSheet()->getColumnDimension('W')->setWidth(16);
		$phpExcel->getActiveSheet()->getColumnDimension('X')->setWidth(16);
		
		//$this->db->get('tb_pegawai');
		$baris->setCellValue('A1', 'REKAPITULASI BIAYA PERJALANAN DINAS DAN AKOMODASI');
		$baris->setCellValue('A2', 'PERIODE TANGGAL '.strtoupper($dari).' S/D '.strtoupper($sampai));
		$baris->setCellValue('A3', 'DIVRE JAWA BARAT');
		
		$phpExcel->getActiveSheet()->getStyle('A5:V9')->applyFromArray($styleArray);
		$phpExcel->getActiveSheet()->getStyle('A5:V9')->applyFromArray($styleArray1);
		$phpExcel->getActiveSheet()->getStyle('A5:V5')->applyFromArray($styleArray12);
		$phpExcel->getActiveSheet()->getStyle('A6:V6')->applyFromArray($styleArray12);
		
		$baris->setCellValue('A5', 'No');
		$baris->setCellValue('B5', 'Uraian');
		$baris->setCellValue('B6', 'Berangkat');
		$baris->setCellValue('C6', 'Pulang');
		$baris->setCellValue('D6', 'No SKPD');
		$baris->setCellValue('E5', 'Nama');
		$baris->setCellValue('F5', 'Gol');
		$baris->setCellValue('G5', 'Jabatan');
		$baris->setCellValue('H5', 'Tujuan');
		$baris->setCellValue('I5', 'Hari');
		$baris->setCellValue('J5', 'Rincian Perjalanan Dinas');
		$baris->setCellValue('J6', 'Hotel');
		$baris->setCellValue('K6', 'Tiket (Lumpsum)');
		$baris->setCellValue('L6', 'Taxi');
		$baris->setCellValue('M6', 'Uang Harian');
		$baris->setCellValue('N6', 'Repres');
		$baris->setCellValue('O5', 'Jumlah');
		$baris->setCellValue('P5', 'PPH');
		$baris->setCellValue('P6', '%');
		$baris->setCellValue('Q6', 'Nilai');
		$baris->setCellValue('R5', 'Tiket (perusahaan)');
		$baris->setCellValue('S5', 'BBM');
		$baris->setCellValue('T5', 'TOL');
		$baris->setCellValue('U5', 'Total');
		$baris->setCellValue('V5', 'Jumlah diterima');
		$baris->setCellValue('W5', 'Tgl SPPD');
		$baris->setCellValue('X5', 'Tugas');
		
		$baris->setCellValue('A7', '1');
		$baris->setCellValue('B7', '2');
		$baris->setCellValue('C7', '3');
		$baris->setCellValue('D7', '4');
		$baris->setCellValue('E7', '5');
		$baris->setCellValue('F7', '6');
		$baris->setCellValue('G7', '7');
		$baris->setCellValue('H7', '8');
		$baris->setCellValue('I7', '9');
		$baris->setCellValue('J7', '10');
		$baris->setCellValue('K7', '11');
		$baris->setCellValue('L7', '12');
		$baris->setCellValue('M7', '13');
		$baris->setCellValue('N7', '14');
		$baris->setCellValue('O7', '15=10+11+12+13+14');
		$baris->setCellValue('P7', '16');
		$baris->setCellValue('Q7', '17');
		$baris->setCellValue('R7', '18');
		$baris->setCellValue('S7', '19');
		$baris->setCellValue('T7', '20');
		$baris->setCellValue('U7', '21=15+18+19+20');
		$baris->setCellValue('V7', '22=21-17');
		$baris->setCellValue('W7', '23');
		$baris->setCellValue('X7', '24');
		
		$phpExcel->getActiveSheet()->getStyle("A7:X7")->getFont()->setSize(9);
		
		// DASAR FAKS PUSAT
		
		$baris->setCellValue('A8', 'I');
		$baris->setCellValue('B8', '');
	
		$query     ="SELECT
						id_pelaksana,no_fax, tgl_fax, no_skpd, attr_skpd, tgl_skpd, nama_pelaksana, gol, tmpt_tujuan, durasi_tgs,
						uang_hotel, uang_pesawat_b, uang_kereta_b, uang_travel_b, 
						uang_taxi, uang_harian, uang_repres, jml_bbm, uang_bbm, uang_tol,
						jumlah, pph, potongan,
						uang_pesawat_p, uang_kereta_p, uang_travel_p, tugas,
						total, jumlah_diterima, jabatan, tgl_keberangkatan, tgl_kepulangan, tgl_sppd
					FROM
						tb_pelaksana a
					INNER JOIN tb_skpd b ON a.id_sppd = b.id_sppd
					INNER JOIN tb_sppd c ON a.id_sppd = c.id_sppd
					WHERE
						STR_TO_DATE(tgl_skpd, '%d-%m-%Y') BETWEEN '$from' and '$to'
					group by id_pelaksana order by id_pelaksana";
	
		$data = $this->db->query($query);
		$num_rows = $data->num_rows();
		
		$no=0;
		$rowexcel = 9;
		$baris_jumlah1 = $rowexcel+$num_rows+2;
		
		$phpExcel->getActiveSheet()->getStyle('A'.($rowexcel+$num_rows).':V'.($rowexcel+$num_rows))->applyFromArray($styleArray);
		$phpExcel->getActiveSheet()->getStyle('A'.($rowexcel+$num_rows).':V'.($rowexcel+$num_rows))->applyFromArray($styleArray1);
		
		foreach($data->result() as $row)
		{
			$tgl_fax= date("Y-m-d", strtotime($row->tgl_fax));
			$tgl_skpd= date("Y-m-d", strtotime($row->tgl_skpd));
			$tiket_brgkt = $row->uang_pesawat_b+$row->uang_kereta_b+$row->uang_travel_b;
			$tiket_pulang = $row->uang_pesawat_p+$row->uang_kereta_p+$row->uang_travel_p;
			
			$phpExcel->getActiveSheet()->getStyle('A'.$rowexcel.':G'.$rowexcel)->applyFromArray($styleArray);
			$phpExcel->getActiveSheet()->getStyle('A'.$rowexcel.':I'.$rowexcel)->applyFromArray($styleArray1);
			$phpExcel->getActiveSheet()->getStyle('J'.$rowexcel.':V'.$rowexcel)->applyFromArray($styleArray_currency);
			
			$phpExcel->getActiveSheet()->getStyle('B'.$rowexcel.':C'.$rowexcel)->getAlignment()->applyFromArray(array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT,));
			
			$dasarfax = $row->no_fax."\nTgl ".tgl_indo($tgl_fax);
			$skpd = str_pad($row->no_skpd,4, "0", STR_PAD_LEFT).$row->attr_skpd."\nTgl ".tgl_indo($tgl_skpd);
			//if ($row->tmpt_tujuan == "Perum Bulog Kantor Pusat Jakarta") { $tujuan= "Jakarta"; } else { $tujuan= "-"; }
			
			$baris->setCellValue('A'.$rowexcel, '='.$no.'+1');						
			$baris->setCellValue('B'.$rowexcel, $row->tgl_keberangkatan);
			$baris->setCellValue('C'.$rowexcel, $row->tgl_kepulangan);
			$baris->setCellValue('D'.$rowexcel, $skpd);
			$baris->setCellValue('E'.$rowexcel, $row->nama_pelaksana);
			$baris->setCellValue('F'.$rowexcel, romawi($row->gol));
			$baris->setCellValue('G'.$rowexcel, $row->jabatan);
			$baris->setCellValue('H'.$rowexcel, $row->tmpt_tujuan);
			$baris->setCellValue('I'.$rowexcel, $row->durasi_tgs);
			$baris->setCellValue('J'.$rowexcel, $row->uang_hotel);
			$baris->setCellValue('K'.$rowexcel, $tiket_brgkt);
			$baris->setCellValue('L'.$rowexcel, $row->uang_taxi);
			$baris->setCellValue('M'.$rowexcel, $row->uang_harian);
			$baris->setCellValue('N'.$rowexcel, $row->uang_repres);
			$baris->setCellValue('O'.$rowexcel, $row->jumlah);
			$baris->setCellValue('P'.$rowexcel, $row->pph. '%');
			$baris->setCellValue('Q'.$rowexcel, $row->potongan);
			$baris->setCellValue('R'.$rowexcel, $tiket_pulang);
			$baris->setCellValue('S'.$rowexcel, $row->uang_bbm);
			$baris->setCellValue('T'.$rowexcel, $row->uang_tol);
			$baris->setCellValue('U'.$rowexcel, $row->total);
			$baris->setCellValue('V'.$rowexcel, $row->jumlah_diterima);
			$baris->setCellValue('W'.$rowexcel, $row->tgl_sppd);
			$baris->setCellValue('X'.$rowexcel, $row->tugas);
			
			$no++;
			$rowexcel++;
		}
		
		// SET JUMLAH I
		$rowexcel = 9;
		
		
		$baris->setCellValue('A'.$baris_jumlah1, '');
		$phpExcel->getActiveSheet()->getStyle('A'.$baris_jumlah1.':V'.$baris_jumlah1)->getFont()->setBold(true);
		$phpExcel->getActiveSheet()->getStyle('A'.($baris_jumlah1-1).':V'.$baris_jumlah1)->applyFromArray($styleArray_currency);
		$baris->setCellValue('B'.$baris_jumlah1, 'JUMLAH I');
		$phpExcel->getActiveSheet()->getStyle('B'.$baris_jumlah1)->getAlignment()->applyFromArray(array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,));
		$phpExcel->getActiveSheet()->mergeCells('B'.$baris_jumlah1.':G'.$baris_jumlah1);
		
		$baris->setCellValue('J'.$baris_jumlah1, '=SUM(J'.$rowexcel.':J'.($baris_jumlah1-1).')');
		$baris->setCellValue('K'.$baris_jumlah1, '=SUM(K'.$rowexcel.':K'.($baris_jumlah1-1).')');
		$baris->setCellValue('L'.$baris_jumlah1, '=SUM(L'.$rowexcel.':L'.($baris_jumlah1-1).')');
		$baris->setCellValue('M'.$baris_jumlah1, '=SUM(M'.$rowexcel.':M'.($baris_jumlah1-1).')');
		$baris->setCellValue('N'.$baris_jumlah1, '=SUM(N'.$rowexcel.':N'.($baris_jumlah1-1).')');
		$baris->setCellValue('O'.$baris_jumlah1, '=SUM(O'.$rowexcel.':O'.($baris_jumlah1-1).')');
		//$baris->setCellValue('P'.$baris_jumlah1, '=SUM(P'.$rowexcel.':P'.($baris_jumlah1-1).')');
		$baris->setCellValue('Q'.$baris_jumlah1, '=SUM(Q'.$rowexcel.':Q'.($baris_jumlah1-1).')');
		$baris->setCellValue('R'.$baris_jumlah1, '=SUM(R'.$rowexcel.':R'.($baris_jumlah1-1).')');
		$baris->setCellValue('S'.$baris_jumlah1, '=SUM(S'.$rowexcel.':S'.($baris_jumlah1-1).')');
		$baris->setCellValue('T'.$baris_jumlah1, '=SUM(T'.$rowexcel.':T'.($baris_jumlah1-1).')');
		$baris->setCellValue('U'.$baris_jumlah1, '=SUM(U'.$rowexcel.':U'.($baris_jumlah1-1).')');
		$baris->setCellValue('V'.$baris_jumlah1, '=SUM(V'.$rowexcel.':V'.($baris_jumlah1-1).')');
		$baris->setCellValue('W'.$baris_jumlah1, '=SUM(W'.$rowexcel.':W'.($baris_jumlah1-1).')');
		$baris->setCellValue('X'.$baris_jumlah1, '=SUM(X'.$rowexcel.':X'.($baris_jumlah1-1).')');
		
		// AKOMODASI HOTEL TAMU PUSAT
		/*
		$query2     = "select * from tb_akomodasi_tamu 
					   where STR_TO_DATE(tgl_skpd, '%d-%m-%Y') BETWEEN '$from' and '$to'
					   order by id_akomodasi desc";
					
		$data2 = $this->db->query($query2);
		$num_rows2 = $data2->num_rows();
		
		$no2=0;
		$rowexcel2 = $baris_jumlah1+2;
		$rowexcelx = $baris_jumlah1+1;
				
		$baris_jumlah2 = $rowexcel2+$num_rows2+2;
		//echo $baris_jumlah1;exit;
		$baris->setCellValue('A'.$rowexcelx, 'II');
		$baris->setCellValue('B'.$rowexcelx, 'Akomodasi Tamu Pusat');
		
		$phpExcel->getActiveSheet()->mergeCells('B'.$rowexcelx.':C'.$rowexcelx);
		$phpExcel->getActiveSheet()->getStyle('A'.$rowexcelx.':B'.$rowexcelx)->getAlignment()->applyFromArray(array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,));
		$phpExcel->getActiveSheet()->getStyle('A'.$rowexcelx.':B'.$rowexcelx)->getFont()->setBold(true);
		$phpExcel->getActiveSheet()->getStyle('A'.$rowexcelx.':R'.$rowexcelx)->applyFromArray($styleArray);
		$phpExcel->getActiveSheet()->getStyle('A'.$rowexcelx.':R'.$rowexcelx)->applyFromArray($styleArray1);
		
		$phpExcel->getActiveSheet()->getStyle('A'.($rowexcel2+$num_rows2).':R'.($rowexcel2+$num_rows2))->applyFromArray($styleArray);
		$phpExcel->getActiveSheet()->getStyle('A'.($rowexcel2+$num_rows2).':R'.($rowexcel2+$num_rows2))->applyFromArray($styleArray1);
		
		foreach($data2->result() as $row)
		{
			
			
			$tgl_skpd= date("Y-m-d", strtotime($row->tgl_skpd));
			$phpExcel->getActiveSheet()->getStyle('A'.$rowexcel2.':G'.$rowexcel2)->applyFromArray($styleArray);
			$phpExcel->getActiveSheet()->getStyle('A'.$rowexcel2.':G'.$rowexcel2)->applyFromArray($styleArray1);
			$phpExcel->getActiveSheet()->getStyle('H'.$rowexcel2.':R'.$rowexcel2)->applyFromArray($styleArray_currency);
			
			$phpExcel->getActiveSheet()->getStyle('B'.$rowexcel2.':C'.$rowexcel2)->getAlignment()->applyFromArray(array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT,));
			
			$skpd = $row->no_skpd."\nTgl ".tgl_indo($tgl_skpd);
			
			$baris->setCellValue('A'.$rowexcel2, '='.$no2.'+1');						
			$baris->setCellValue('B'.$rowexcel2, '-');
			$baris->setCellValue('C'.$rowexcel2, $skpd);
			$baris->setCellValue('D'.$rowexcel2, $row->nama);
			$baris->setCellValue('E'.$rowexcel2, $row->gol);
			$baris->setCellValue('F'.$rowexcel2, $row->tujuan);
			$baris->setCellValue('G'.$rowexcel2, $row->durasi);
			$baris->setCellValue('H'.$rowexcel2, $row->hotel);
			$baris->setCellValue('I'.$rowexcel2, '0');
			$baris->setCellValue('J'.$rowexcel2, '0');
			$baris->setCellValue('K'.$rowexcel2, '0');
			$baris->setCellValue('L'.$rowexcel2, '0');
			$baris->setCellValue('M'.$rowexcel2, '0');
			$baris->setCellValue('N'.$rowexcel2, '');
			$baris->setCellValue('O'.$rowexcel2, '0');
			$baris->setCellValue('P'.$rowexcel2, '0');
			$baris->setCellValue('Q'.$rowexcel2, '=G'.$rowexcel2.'*H'.$rowexcel2.'');
			$baris->setCellValue('R'.$rowexcel2, '=G'.$rowexcel2.'*H'.$rowexcel2.'');
			$rowexcel2++;
			$no2++;
		}
		
		// SET JUMLAH II
		$rowexcel4 = $baris_jumlah1+2;
		
		$baris->setCellValue('A'.$baris_jumlah2, '');
		$phpExcel->getActiveSheet()->getStyle('A'.$baris_jumlah2.':R'.$baris_jumlah2)->getFont()->setBold(true);
		$phpExcel->getActiveSheet()->getStyle('A'.($baris_jumlah2-1).':R'.$baris_jumlah2)->applyFromArray($styleArray_currency);
		$baris->setCellValue('B'.$baris_jumlah2, 'JUMLAH II');
		$phpExcel->getActiveSheet()->getStyle('B'.$baris_jumlah2.':G'.$baris_jumlah2)->getAlignment()->applyFromArray(array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,));
		$phpExcel->getActiveSheet()->mergeCells('B'.$baris_jumlah2.':G'.$baris_jumlah2);
		
		
		$baris->setCellValue('H'.$baris_jumlah2, '=SUM(H'.$rowexcel4.':H'.($baris_jumlah2-1).')');
		$baris->setCellValue('I'.$baris_jumlah2, '0');
		$baris->setCellValue('J'.$baris_jumlah2, '0');
		$baris->setCellValue('K'.$baris_jumlah2, '0');
		$baris->setCellValue('L'.$baris_jumlah2, '0');
		$baris->setCellValue('M'.$baris_jumlah2, '0');
		$baris->setCellValue('O'.$baris_jumlah2, '0');
		$baris->setCellValue('P'.$baris_jumlah2, '0');
		$baris->setCellValue('Q'.$baris_jumlah2, '=SUM(Q'.$rowexcel4.':Q'.($baris_jumlah2-1).')');
		$baris->setCellValue('R'.$baris_jumlah2, '=SUM(R'.$rowexcel4.':R'.($baris_jumlah2-1).')');
		
		// SET JUMLAH I & II
		$baris_jumlah3 = $baris_jumlah2+2;
		$rowexcel5 = $baris_jumlah2+2;
		
		$baris->setCellValue('A'.$baris_jumlah3, '');
		$phpExcel->getActiveSheet()->getStyle('A'.$baris_jumlah3.':R'.$baris_jumlah3)->getFont()->setBold(true);
		$phpExcel->getActiveSheet()->getStyle('A'.($baris_jumlah3-1).':R'.$baris_jumlah3)->applyFromArray($styleArray_currency);
		$baris->setCellValue('B'.$baris_jumlah3, 'JUMLAH I & II');
		$phpExcel->getActiveSheet()->getStyle('B'.$baris_jumlah3)->getAlignment()->applyFromArray(array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,));
		$phpExcel->getActiveSheet()->mergeCells('B'.$baris_jumlah3.':G'.$baris_jumlah3);
		
		
		$baris->setCellValue('H'.$baris_jumlah3, '=H'.$baris_jumlah1.'+H'.$baris_jumlah2.')');
		$baris->setCellValue('I'.$baris_jumlah3, '=I'.$baris_jumlah1.'+I'.$baris_jumlah2.')');
		$baris->setCellValue('J'.$baris_jumlah3, '=J'.$baris_jumlah1.'+J'.$baris_jumlah2.')');
		$baris->setCellValue('K'.$baris_jumlah3, '=K'.$baris_jumlah1.'+K'.$baris_jumlah2.')');
		$baris->setCellValue('L'.$baris_jumlah3, '=L'.$baris_jumlah1.'+L'.$baris_jumlah2.')');
		$baris->setCellValue('M'.$baris_jumlah3, '=M'.$baris_jumlah1.'+M'.$baris_jumlah2.')');
		$baris->setCellValue('O'.$baris_jumlah3, '=O'.$baris_jumlah1.'+O'.$baris_jumlah2.')');
		$baris->setCellValue('P'.$baris_jumlah3, '=P'.$baris_jumlah1.'+P'.$baris_jumlah2.')');
		$baris->setCellValue('Q'.$baris_jumlah3, '=Q'.$baris_jumlah1.'+Q'.$baris_jumlah2.')');
		$baris->setCellValue('R'.$baris_jumlah3, '=R'.$baris_jumlah1.'+R'.$baris_jumlah2.')');
		
		// SET TANDA TANGAN
		$pemeriksa_1 = $this->db->query("select pemeriksa_1 from tb_pejabat_ttd")->row()->pemeriksa_1;
		$jabatan_1 = $this->db->query("select jabatan_1 from tb_pejabat_ttd")->row()->jabatan_1;
		
		$baris_jumlah4 = $baris_jumlah3+2;
		
		$phpExcel->getActiveSheet()->getStyle('N'.($baris_jumlah4+4).':P'.($baris_jumlah4+4))->getFont()->setBold(true);
		
		$phpExcel->getActiveSheet()->getStyle('N'.$baris_jumlah4.':P'.$baris_jumlah4)->getAlignment()->applyFromArray(array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,));
		$phpExcel->getActiveSheet()->getStyle('N'.($baris_jumlah4+4).':P'.($baris_jumlah4+4))->getAlignment()->applyFromArray(array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,));
		$phpExcel->getActiveSheet()->getStyle('N'.($baris_jumlah4+5).':P'.($baris_jumlah4+5))->getAlignment()->applyFromArray(array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,));
		
		$phpExcel->getActiveSheet()->mergeCells('N'.$baris_jumlah4.':P'.$baris_jumlah4);
		$phpExcel->getActiveSheet()->mergeCells('N'.($baris_jumlah4+4).':P'.($baris_jumlah4+4));
		$phpExcel->getActiveSheet()->mergeCells('N'.($baris_jumlah4+5).':P'.($baris_jumlah4+5));
		
		$baris->setCellValue('N'.$baris_jumlah4, 'Semarang,            '.substr($sampai,3,20));
		$baris->setCellValue('N'.($baris_jumlah4+4), $pemeriksa_1);
		$baris->setCellValue('N'.($baris_jumlah4+5), $jabatan_1);
		*/
		
		$baris->setTitle('Rekapitulasi_Tagihan');
		header("Content-Type: application/vnd.ms-excel");
		header("Content-Disposition: attachment; filename=\"Rekap Tagihan Biaya.xls\"");
		header("Cache-Control: max-age=0");
		$objWriter = PHPExcel_IOFactory::createWriter($phpExcel, "Excel5");
		$objWriter->save("php://output");		
		
	}
}