<?php
class rekap_skpd extends CI_Controller{
    
    var $folder =   "rekap_skpd";
    var $tables =   "tb_skpd";
    var $pk     =   "id_skpd";
    var $title  =   "Rekap SKPD";
    
    function __construct() {
        parent::__construct();
		$this->load->helper("terbilang");
	    $this->load->helper("tanggal");
		$this->load->helper("romawi");
		$this->load->library('pdf');
		$this->load->helper('pdf_helper');
		$this->load->library('form_validation');
		$this->load->helper('string');
		$this->load->helper('url');
		$this->load->model('person_model','person');
		
    }
    
    function index()
    {
		if(isset($_POST['submit']))
        {
			$cari = $this->input->GET('cari', TRUE);
			$from	= date('Y-m-d', strtotime($this->input->post('from')));
			$to		= date('Y-m-d', strtotime($this->input->post('to')));
			$jenis_plafond = $this->input->post('jenis_plafond');
			
			$this->form_validation->set_rules('from', '','');
			
			$cari = $this->db->query("select *, GROUP_CONCAT(tb_pelaksana.nama_pelaksana) as nama_plk, sum(tb_pelaksana.total) as total_spd from tb_sppd 
				inner join tb_skpd
				on tb_skpd.id_sppd = tb_sppd.id_sppd
				inner join tb_pelaksana
				on tb_pelaksana.id_sppd = tb_sppd.id_sppd
				where sts = 1 AND jenis_plafond = '$jenis_plafond' AND STR_TO_DATE(tgl_skpd, '%d-%m-%Y') BETWEEN '$from' and '$to'
				GROUP BY tb_pelaksana.id_sppd
				ORDER BY right(attr_skpd,4) ASC, no_skpd ASC, tgl_skpd ASC, id_skpd ASC");
			
			$total_biaya = $this->db->query("select sum(tb_pelaksana.total) as total_spd from tb_sppd 
				inner join tb_skpd
				on tb_skpd.id_sppd = tb_sppd.id_sppd
				inner join tb_pelaksana
				on tb_pelaksana.id_sppd = tb_sppd.id_sppd
				where sts = 1 AND jenis_plafond = '$jenis_plafond' AND STR_TO_DATE(tgl_skpd, '%d-%m-%Y') BETWEEN '$from' and '$to'
				ORDER BY right(attr_skpd,4) ASC, no_skpd ASC, tgl_skpd ASC, id_skpd ASC")->row()->total_spd;
			
			
			$data['count'] = $cari->num_rows();
			$data['total_biaya_spd'] = $total_biaya;
			
			
			
			$data['cari'] = $cari->result();
			$data['dari'] = date('d-m-Y', strtotime($this->input->post('from')));
			$data['sampai'] = date('d-m-Y', strtotime($this->input->post('to')));
			$data['jenis_plafond'] = $this->input->post('jenis_plafond');
			$this->template->load('template', $this->folder.'/view',$data);
		} elseif (isset($_POST['export_excel'])) {
			
			$this->load->library("PHPExcel");
		
			$from	= date('Y-m-d', strtotime($this->input->post('from')));
			$to		= date('Y-m-d', strtotime($this->input->post('to')));
			$jenis_plafond = $this->input->post('jenis_plafond');
			
			
			$dari 	= tgl_indo($from); 
			$sampai = tgl_indo($to); 
			
			$phpExcel = new PHPExcel();
			$baris = $phpExcel->setActiveSheetIndex(0);
			
			// SET MERGE CELL
			$phpExcel->getActiveSheet()->mergeCells('A1:I1');
			$phpExcel->getActiveSheet()->mergeCells('A2:I2');
			$phpExcel->getActiveSheet()->mergeCells('A3:I3');
			
			// SET WRAP
			$phpExcel->getActiveSheet()->getStyle('B6:I999')->getAlignment()->setWrapText(true); 
			
			$phpExcel->getActiveSheet()->getRowDimension(1)->setRowHeight(18);
			$phpExcel->getActiveSheet()->getRowDimension(2)->setRowHeight(18);
			$phpExcel->getActiveSheet()->getRowDimension(3)->setRowHeight(18);
			$styleArray = array(
				'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
				'vertical' => PHPExcel_Style_Alignment::VERTICAL_TOP,
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
			
			// SET FONT
			$phpExcel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
			$phpExcel->getActiveSheet()->getStyle('A2')->getFont()->setBold(true);
			$phpExcel->getActiveSheet()->getStyle('A3')->getFont()->setBold(true);
			$phpExcel->getActiveSheet()->getStyle('A1')->getFont()->setSize(14);
			$phpExcel->getActiveSheet()->getStyle('A2')->getFont()->setSize(14);
			$phpExcel->getActiveSheet()->getStyle('A3')->getFont()->setSize(14);
			
			// SET STYLE
			$phpExcel->getActiveSheet()->getStyle('A1:I3')->applyFromArray($styleArray);
			$phpExcel->getActiveSheet()->getStyle('A5:I5')->applyFromArray($styleArray);
			$phpExcel->getActiveSheet()->getStyle('A5:I5')->getFont()->setBold(true);
			
			//SET FORMAT NUMBER
			$phpExcel->getActiveSheet()->getStyle('I6:I9999')->getNumberFormat()->setFormatCode('#,##0');
			
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
			
			$phpExcel->getActiveSheet()->getColumnDimension('A')->setWidth(4.1);
			$phpExcel->getActiveSheet()->getColumnDimension('B')->setWidth(23.5);
			$phpExcel->getActiveSheet()->getColumnDimension('C')->setWidth(30);
			$phpExcel->getActiveSheet()->getColumnDimension('D')->setWidth(55);
			$phpExcel->getActiveSheet()->getColumnDimension('E')->setWidth(55);
			$phpExcel->getActiveSheet()->getColumnDimension('F')->setWidth(17);
			$phpExcel->getActiveSheet()->getColumnDimension('G')->setWidth(17);
			$phpExcel->getActiveSheet()->getColumnDimension('H')->setWidth(10);
			$phpExcel->getActiveSheet()->getColumnDimension('I')->setWidth(17);
			
			$baris->setCellValue('A1', 'REKAPITULASI SKPD (BY.'.strtoupper($jenis_plafond).')');
			$baris->setCellValue('A2', 'PERIODE '.strtoupper($dari).' S/D '.strtoupper($sampai));
			$baris->setCellValue('A3', 'PERUM BULOG KANWIL JAWA TENGAH');
			
			$phpExcel->getActiveSheet()->getStyle('A5:I5')->applyFromArray($styleArray);
			$phpExcel->getActiveSheet()->getStyle('A5:I5')->applyFromArray($styleArray1);
			$phpExcel->getActiveSheet()->getStyle('A5:I5')->applyFromArray($styleArray12);
			
			
			$baris->setCellValue('A5', 'No');
			$baris->setCellValue('B5', 'No SKPD | Tgl SKPD');
			$baris->setCellValue('C5', 'Nama Pelaksana');
			$baris->setCellValue('D5', 'Kegiatan');
			$baris->setCellValue('E5', 'Tujuan');
			$baris->setCellValue('F5', 'Tgl Berangkat');
			$baris->setCellValue('G5', 'Tgl Pulang');
			$baris->setCellValue('H5', 'Durasi');
			$baris->setCellValue('I5', 'Total Biaya');
			
			
			// DASAR FAKS PUSAT
			$query     ="select *, GROUP_CONCAT(tb_pelaksana.nama_pelaksana) as nama_plk, sum(tb_pelaksana.total) as total_spd from tb_sppd 
						inner join tb_skpd
						on tb_skpd.id_sppd = tb_sppd.id_sppd
						inner join tb_pelaksana
						on tb_pelaksana.id_sppd = tb_sppd.id_sppd
						where sts = 1 AND jenis_plafond = '$jenis_plafond' AND STR_TO_DATE(tgl_skpd, '%d-%m-%Y') BETWEEN '$from' and '$to'
						GROUP BY tb_pelaksana.id_sppd
						ORDER BY right(attr_skpd,4) ASC, no_skpd ASC, tgl_skpd ASC, id_skpd ASC";
		
			$data = $this->db->query($query);
			$num_rows = $data->num_rows();
			
			$no=0;
			$rowexcel = 6;
			$baris_jumlah1 = $rowexcel+$num_rows;
			
			$phpExcel->getActiveSheet()->getStyle('A'.($rowexcel+$num_rows).':I'.($rowexcel+$num_rows))->applyFromArray($styleArray);
			$phpExcel->getActiveSheet()->getStyle('A'.($rowexcel+$num_rows).':I'.($rowexcel+$num_rows))->applyFromArray($styleArray1);
			
			foreach($data->result() as $row)
			{
				$tgl_fax= date("Y-m-d", strtotime($row->tgl_fax));
				$tgl_skpd= date("Y-m-d", strtotime($row->tgl_skpd));
				
				$phpExcel->getActiveSheet()->getStyle('A'.$rowexcel.':I'.$rowexcel)->applyFromArray($styleArray);
				$phpExcel->getActiveSheet()->getStyle('A'.$rowexcel.':I'.$rowexcel)->applyFromArray($styleArray1);
				
				$phpExcel->getActiveSheet()->getStyle('B'.$rowexcel.':E'.$rowexcel)->getAlignment()->applyFromArray(array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT,));
				$phpExcel->getActiveSheet()->getStyle('I'.$rowexcel.':I'.$rowexcel)->getAlignment()->applyFromArray(array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_RIGHT,));
				
				$dasarfax = $row->no_fax."\nTgl ".tgl_indo($tgl_fax);
				$skpd = str_pad($row->no_skpd,4, "0", STR_PAD_LEFT).$row->attr_skpd."\nTgl ".tgl_indo($tgl_skpd);;
				
				$baris->setCellValue('A'.$rowexcel, '='.$no.'+1');						
				$baris->setCellValue('B'.$rowexcel, $skpd);
				$baris->setCellValue('C'.$rowexcel, trim(str_replace(",","\n",$row->nama_plk)));
				$baris->setCellValue('D'.$rowexcel, $row->tugas);
				$baris->setCellValue('E'.$rowexcel, $row->tmpt_tujuan);
				$baris->setCellValue('F'.$rowexcel, tgl_indo(date("Y-m-d", strtotime($row->tgl_keberangkatan))));
				$baris->setCellValue('G'.$rowexcel, tgl_indo(date("Y-m-d", strtotime($row->tgl_kepulangan))));
				$baris->setCellValue('H'.$rowexcel, $row->durasi_tgs." Hari");
				$baris->setCellValue('I'.$rowexcel, $row->total_spd);
				
				$no++;
				$rowexcel++;
			}
			
			
			$baris->setCellValue('I'.$baris_jumlah1, '=SUM(I6:I'.($baris_jumlah1-1).')');
			$phpExcel->getActiveSheet()->getStyle('I'.$baris_jumlah1.':I'.$baris_jumlah1)->getAlignment()->applyFromArray(array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_RIGHT,));
			
			
			$baris->setTitle('Rekapitulasi_SKPD');
			header("Content-Type: application/vnd.ms-excel");
			header("Content-Disposition: attachment; filename=\"Rekap SKPD.xls\"");
			header("Cache-Control: max-age=0");
			$objWriter = PHPExcel_IOFactory::createWriter($phpExcel, "Excel5");
			$objWriter->save("php://output");	
			
			
		} else {
			$query1="SELECT
							id_pelaksana,no_fax, tgl_fax, no_skpd, attr_skpd, tgl_skpd, nama_pelaksana, gol, tmpt_tujuan, durasi_tgs,
							uang_hotel, uang_pesawat_b, uang_kereta_b, uang_travel_b,
							uang_taxi, uang_harian, uang_repres, jml_bbm,
							jumlah, pph, potongan,
							uang_pesawat_p, uang_kereta_p, uang_travel_p,
							total, total
						FROM
							tb_pelaksana a
						INNER JOIN tb_skpd b ON a.id_sppd = b.id_sppd
						INNER JOIN tb_sppd c ON a.id_sppd = c.id_sppd
						WHERE
							no_fax != ''
						group by id_pelaksana order by id_pelaksana";
			$query2="select * from tb_akomodasi_tamu
					order by id_akomodasi desc";
			$data['record1']=  $this->db->query($query1)->result();
			$data['record2']=  $this->db->query($query2)->result();
			$data['title']  = $this->title;
			$data['count'] = 0;
			$data['cari'] = 0;
			$data['total_biaya_spd'] = 0;
			$data['dari'] = "";
			$data['sampai'] = "";
			$data['desc']    =   "";
			$data['jenis_plafond'] = "";
			$this->template->load('template', $this->folder.'/view',$data);
		}
    }
	
	function export_excel()
    {
		
		
	}

}