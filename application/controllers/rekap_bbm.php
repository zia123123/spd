<?php
class rekap_bbm extends CI_Controller{
    
    var $folder =   "rekap_bbm";
    var $tables =   "tb_bbm";
    var $pk     =   "id_bbm";
    var $title  =   "Rekap BBM";
    
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
			$jenis_biaya = $this->input->post('jenis_biaya');
			$data['jenis_biaya'] = $this->input->post('jenis_biaya');
			$this->form_validation->set_rules('from', '','');
			
			$cari = $this->db->query("select * from tb_bbm 
										where sts_tagihan = 0 and jenis_biaya = '$jenis_biaya' and tgl_skpd BETWEEN '$from' and '$to' 
										ORDER BY tgl_skpd desc, no_skpd desc");
			
			$data['count'] = $cari->num_rows();
			$data['cari'] = $cari->result();
			$data['dari'] = date('d-m-Y', strtotime($this->input->post('from')));
			$data['sampai'] = date('d-m-Y', strtotime($this->input->post('to')));
			
			$this->template->load('template', $this->folder.'/view',$data);
		}
		elseif (isset($_POST['proses_tagihan'])) {		
			$cari = $this->input->GET('cari', TRUE);
			$from	= date('Y-m-d', strtotime($this->input->post('from')));
			$to		= date('Y-m-d', strtotime($this->input->post('to')));
			$jenis_biaya = $this->input->post('jenis_biaya');
			$data['jenis_biaya'] = $this->input->post('jenis_biaya');
			$this->form_validation->set_rules('from', '','');
			$this->mcrud->manualquery('UPDATE tb_bbm set sts_tagihan=1 WHERE sts_tagihan = 0 and jenis_biaya = "'.$data['jenis_biaya'].'" and tgl_skpd BETWEEN "'.$from.'" and "'.$to.'"');
			
			$data['count'] = "";
			$data['cari'] = "";
			$data['messages'] = "Tagihan Sukses diproses..";
			$data['dari'] = date('d-m-Y', strtotime($this->input->post('from')));
			$data['sampai'] = date('d-m-Y', strtotime($this->input->post('to')));
			
			$this->template->load('template', $this->folder.'/view',$data);
		}elseif (isset($_POST['export_excel'])) {
			
			$this->load->library("PHPExcel");
		
			$from	= date('Y-m-d', strtotime($this->input->post('from')));
			$to		= date('Y-m-d', strtotime($this->input->post('to')));
			
			
			$dari 	= tgl_indo($from); 
			$sampai = tgl_indo($to); 
			
			$phpExcel = new PHPExcel();
			$baris = $phpExcel->setActiveSheetIndex(0);
			
			// SET MERGE CELL
			$phpExcel->getActiveSheet()->mergeCells('A1:D1');
			$phpExcel->getActiveSheet()->mergeCells('A2:D2');
			$phpExcel->getActiveSheet()->mergeCells('A3:D3');
			
			// SET WRAP
			$phpExcel->getActiveSheet()->getStyle('B6:D999')->getAlignment()->setWrapText(true); 
			
			$phpExcel->getActiveSheet()->getRowDimension(1)->setRowHeight(18);
			$phpExcel->getActiveSheet()->getRowDimension(2)->setRowHeight(18);
			$phpExcel->getActiveSheet()->getRowDimension(3)->setRowHeight(18);
			$styleArray = array(
				'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
				'vertical' => PHPExcel_Style_Alignment::VERTICAL_TOP,
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
			$phpExcel->getActiveSheet()->getStyle('A1:D3')->applyFromArray($styleArray);
			$phpExcel->getActiveSheet()->getStyle('A5:D5')->applyFromArray($styleArray);
			$phpExcel->getActiveSheet()->getStyle('A5:D5')->getFont()->setBold(true);
			
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
			
			$phpExcel->getActiveSheet()->getColumnDimension('A')->setWidth(5);
			$phpExcel->getActiveSheet()->getColumnDimension('B')->setWidth(10);
			$phpExcel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
			$phpExcel->getActiveSheet()->getColumnDimension('D')->setWidth(40);
			
			$baris->setCellValue('A1', 'REKAPITULASI BBM SPPD');
			$baris->setCellValue('A2', 'PERIODE '.strtoupper($dari).' S/D '.strtoupper($sampai));
			$baris->setCellValue('A3', 'PERUM BULOG DIVRE JAWA TENGAH');
			
			$phpExcel->getActiveSheet()->getStyle('A5:D5')->applyFromArray($styleArray);
			$phpExcel->getActiveSheet()->getStyle('A5:D5')->applyFromArray($styleArray1);
			$phpExcel->getActiveSheet()->getStyle('A5:D5')->applyFromArray($styleArray12);
			$phpExcel->getActiveSheet()->getStyle('D6:D999')->getNumberFormat()->setFormatCode('#,##0.00');
			
			$baris->setCellValue('A5', 'No');
			$baris->setCellValue('B5', 'No SKPD');
			$baris->setCellValue('C5', 'Tgl SKPD');
			$baris->setCellValue('D5', 'Jumlah BBM');
			
			// DASAR FAKS PUSAT
			$query     ="select * from tb_bbm where sts_tagihan = 0 and tgl_skpd BETWEEN '$from' and '$to' ORDER BY tgl_skpd desc, no_skpd desc";
		
			$data = $this->db->query($query);
			$num_rows = $data->num_rows();
			
			$no=0;
			$rowexcel = 6;
			$baris_jumlah1 = $rowexcel+$num_rows+0;
			
			$phpExcel->getActiveSheet()->getStyle('A'.($rowexcel+$num_rows).':D'.($rowexcel+$num_rows))->applyFromArray($styleArray);
			$phpExcel->getActiveSheet()->getStyle('A'.($rowexcel+$num_rows).':D'.($rowexcel+$num_rows))->applyFromArray($styleArray1);
			
			foreach($data->result() as $row)
			{
				//$tgl_fax= date("Y-m-d", strtotime($row->tgl_fax));
				//$tgl_skpd= date("Y-m-d", strtotime($row->tgl_skpd));
				
				$phpExcel->getActiveSheet()->getStyle('A'.$rowexcel.':D'.$rowexcel)->applyFromArray($styleArray);
				$phpExcel->getActiveSheet()->getStyle('A'.$rowexcel.':D'.$rowexcel)->applyFromArray($styleArray1);
				
				$phpExcel->getActiveSheet()->getStyle('A'.$rowexcel.':D'.$rowexcel)->getAlignment()->applyFromArray(array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,));
				$phpExcel->getActiveSheet()->getStyle('D'.$rowexcel.':D'.$rowexcel)->applyFromArray($styleArray_currency);
				//$dasarfax = $row->no_fax."\nTgl ".tgl_indo($tgl_fax);
				//$skpd = str_pad($row->no_skpd,4, "0", STR_PAD_LEFT).$row->attr_skpd."\nTgl ".tgl_indo($tgl_skpd);;
				$baris->setCellValue('A'.$rowexcel, $no+1);
				$baris->setCellValue('B'.$rowexcel, $row->no_skpd);						
				$baris->setCellValue('C'.$rowexcel, date("d/m/Y", strtotime($row->tgl_skpd)));						
				$baris->setCellValue('D'.$rowexcel, $row->uang_bbm);
				
				$no++;
				$rowexcel++;
			}
			// JUMLAH
			$rowexcel = 6;
			
			$phpExcel->getActiveSheet()->getStyle('C'.$baris_jumlah1.':D'.$baris_jumlah1)->getFont()->setBold(true);
			$phpExcel->getActiveSheet()->getStyle('D'.$baris_jumlah1.':D'.$baris_jumlah1)->applyFromArray($styleArray_currency);
			
			$baris->setCellValue('C'.$baris_jumlah1, "JUMLAH");
			$baris->setCellValue('D'.$baris_jumlah1, '=SUM(D'.$rowexcel.':D'.($baris_jumlah1-1).')');
			
			$baris->setTitle('Rekapitulasi_BBM_SPPD');
			header("Content-Type: application/vnd.ms-excel");
			header("Content-Disposition: attachment; filename=\"Rekap BBM SPPD.xls\"");
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
							total, jumlah_diterima
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
			$data['dari'] = "";
			$data['sampai'] = "";
			$data['desc']    =   "";
			$this->template->load('template', $this->folder.'/view',$data);
		}
    }
	function cetak_rekap_bbm(){
		date_default_timezone_set("Asia/Bangkok");
		$data['tgl_awal'] = $this->uri->segment(3);
		$data['tgl_akhir'] = $this->uri->segment(4);
		$data['jenis_biaya'] = $this->uri->segment(5);
		$filename = "Rekap_BBM_".$data['tgl_awal']."_".$data['tgl_akhir'];
		
		$data = array(
			'get_rekap_bbm'=>$this->mcrud->manualquery('select * from tb_bbm where sts_tagihan = 0 and jenis_biaya = "'.$data['jenis_biaya'].'" and tgl_skpd BETWEEN "'.$data['tgl_awal'].'" and "'.$data['tgl_akhir'].'" ORDER BY tgl_skpd desc, no_skpd desc')->result(),			
			'get_sum_bbm'=>$this->mcrud->manualquery('select sum(uang_bbm) as sum_bbm from tb_bbm where sts_tagihan = 0 and jenis_biaya = "'.$data['jenis_biaya'].'" and tgl_skpd BETWEEN "'.$data['tgl_awal'].'" and "'.$data['tgl_akhir'].'" ORDER BY tgl_skpd desc, no_skpd desc')->result(),			
			'get_pejabat_ttd'=>$this->mcrud->manualquery('select * from tb_pejabat_ttd')->result(),
			'tgl_awal'=> $data['tgl_awal'],
			'tgl_akhir'=> $data['tgl_akhir'],
			'tgl_skrg'=>date("d-m-Y h:i:sa"),
			'jenis_biaya'=>$data['jenis_biaya'],
		);

		$this->load->view($this->folder.'/cetak_rekap_bbm',$data);
	}
	

}
