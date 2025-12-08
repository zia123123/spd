<?php
class laporan extends CI_Controller{
    
    var $folder =   "laporan";
    var $tables =   "tb_akomodasi_tamu";
    var $pk     =   "id_akomodasi";
    var $title  =   "Laporan";
    
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
					
					group by id_pelaksana order by id_pelaksana";
		$query2="select * from tb_akomodasi_tamu
				order by id_akomodasi desc";
		$data['record1']=  $this->db->query($query1)->result();
        $data['record2']=  $this->db->query($query2)->result();
        $data['title']  = $this->title;
        $data['desc']    =   "";
		$this->template->load('template', $this->folder.'/view',$data);
    }
	
    function post()
    {
        if(isset($_POST['submit']))
        {
			
			/*
			$this->form_validation->set_rules('no_skpd', 'No SKPD','trim|required');
			$this->form_validation->set_rules('tgl_skpd', 'Tgl SKPD','trim|required');
			$this->form_validation->set_rules('nama', 'Nama','trim|required');
			$this->form_validation->set_rules('gol', 'Golongan','trim|required');
			$this->form_validation->set_rules('tujuan', 'Tujuan','trim|required');
			$this->form_validation->set_rules('durasi', 'Durasi','trim|required');
			$this->form_validation->set_rules('hotel', 'Biaya Hotel','trim|required|integer');
			
			if ($this->form_validation->run() === FALSE) {
				$this->template->load('template', $this->folder.'/post');
			} else {
			*/	
			
			$plk = count($this->input->post('nama'));
			print_r($_REQUEST['plk_tgs']);
			exit;
			if(isset($_REQUEST['submit'])){
				$field_values_array = $_REQUEST['field_name'];
				
				print '<pre>';
				print_r($field_values_array);
				print '</pre>';
				
				foreach($field_values_array as $value){
					//your database query goes here
				}
			}
			exit;
			$capture_field_vals ="";
			foreach($_POST["nama"] as $key => $text_field){
				$capture_field_vals .= $text_field .", ";
				$values = mysql_real_escape_string($text_field);
				$this->db->query("INSERT INTO tb_akomodasi_tamu ( nama ) VALUES( '$values' )");
			}
			
			$plk = count($this->input->post('plk_tgs'));
			print_r($_REQUEST['plk_tgs']);
			exit;
			$nama = $this->input->post('nama');
			$gol = $this->input->post('gol');
			$tujuan = $this->input->post('tujuan');
			$durasi = $this->input->post('durasi');
			$hotel = $this->input->post('hotel');
			foreach($_POST['nama'] AS $key){
				echo $key;
			}
			$data = array(
				array(
					'no_skpd' => $this->input->post('no_skpd'),
					'nama' => 'My title' ,
					'gol' => 'My Name' 
				),
				array(
					'no_skpd' => $this->input->post('no_skpd'),
					'nama' => 'Another title' ,
					'gol' => 'Another Name' 
				),
			);

			$this->db->insert_batch('tb_akomodasi_tamu', $data);
			
			
			$count = count($_POST['plk_tgs']);
			echo $count;exit;
				foreach($_POST['nama'] AS $key){
				$data[]=array(
				
				"nama" => $key,
				//"gol" => $_POST['idkelasmm'],
				//"IDJENIS" => $_POST['jenis'],
				//"IDSEMESTER" => $_POST['semester'],
				//"IDMAPEL" => $_POST['mapel2'],
				
				);
				$this->db->insert('tb_akomodasi_tamu',$data);
			}
			
			
					
			/*
				foreach ($nama as $index){
			
					$data[]=array(

						'no_skpd'=> $this->input->post('no_skpd'),
						'tgl_skpd'=> $this->input->post('tgl_skpd'),
						'nama'=>$nama[$index],
						'gol'=> $gol[$index],
						'tujuan'=>$gol[$index],
						'durasi'=>$gol[$index],
						'hotel'=>$gol[$index],
					);	
					$this->db->insert($this->tables,$data);
				}
			*/
				//$insertsppd = $this->db->insert($this->tables,$dt);
				redirect($this->uri->segment(1));	
			//}
        }
        else
        {
            $data['title']  = $this->title;
            $data['desc']    =   "";
			
            $this->template->load('template', $this->folder.'/post',$data);
        }
    }
    
    
    function edit()
    {
        if(isset($_POST['submit']))
        {
			$id_akomodasi	    =   $this->input->post('id_akomodasi');
			$this->form_validation->set_message('required', '%s Harus Diisi.');
			$this->form_validation->set_message('min_length', '%s harus %s digit.');
			$this->form_validation->set_message('integer', '%s harus Angka.');
			
			$this->form_validation->set_rules('no_skpd', 'No SKPD','trim|required');
			$this->form_validation->set_rules('tgl_skpd', 'Tgl SKPD','trim|required');
			$this->form_validation->set_rules('nama', 'Nama','trim|required');
			$this->form_validation->set_rules('gol', 'Golongan','trim|required');
			$this->form_validation->set_rules('tujuan', 'Tujuan','trim|required');
			$this->form_validation->set_rules('durasi', 'Durasi','trim|required');
			$this->form_validation->set_rules('hotel', 'Biaya Hotel','trim|required|integer');
			
			if ($this->form_validation->run() === FALSE) {
				$data['r']    =  $this->mcrud->getByID($this->tables,  $this->pk,$id_akomodasi)->row_array();
				$this->template->load('template', $this->folder.'/edit',$data);
			} else {
				$id_akomodasi	    =   $this->input->post('id_akomodasi');
			   
				$data=array(
					'no_skpd'=> $this->input->post('no_skpd'),
					'tgl_skpd'=> $this->input->post('tgl_skpd'),
					'nama'=>$this->input->post('nama'),
					'gol'=> $this->input->post('gol'),
					'tujuan'=>$this->input->post('tujuan'),
					'durasi'=>$this->input->post('durasi'),
					'hotel'=>$this->input->post('hotel'),
				);
				$this->mcrud->update($this->tables,$data, $this->pk,$id_akomodasi);
				redirect($this->uri->segment(1));
			}
        }
        else
        {
            $data['title']=  $this->title;
            $data['desc']="Edit";
            $id          =  $this->uri->segment(3);
            $data['r']   =  $this->mcrud->getByID($this->tables,  $this->pk,$id)->row_array();
            $this->template->load('template', $this->folder.'/edit',$data);
        }
    }

	
	function delete()
    {
        $id     =  	$this->uri->segment(3);
        $chekid = 	$this->db->get_where($this->tables,array($this->pk=>$id));
        if($chekid>0)
        {
            $this->mcrud->delete($this->tables,  $this->pk,  $this->uri->segment(3));
        }
        redirect($this->uri->segment(1));
    }
	
	public function ajax_list()
	{
		$list = $this->person->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $person) {
			$no++;
			$row = array();
			$row[] = $person->no_skpd;
			$row[] = $person->tgl_skpd;
			$row[] = $person->nama;
			$row[] = $person->gol;
			$row[] = $person->tujuan;
			$row[] = $person->durasi;
			$row[] = $person->hotel;

			//add html for action
			$row[] = '<a class="btn btn-sm btn-blue" href="javascript:void()" title="Edit" onclick="edit_person('."'".$person->id_akomodasi."'".')"><i class="glyphicon glyphicon-pencil"></i></a>
				  <a class="btn btn-sm btn-red" href="javascript:void()" title="Hapus" onclick="delete_person('."'".$person->id_akomodasi."'".')"><i class="glyphicon glyphicon-trash"></i></a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->person->count_all(),
						"recordsFiltered" => $this->person->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit($id)
	{
		$data = $this->person->get_by_id($id);
		$data->tgl_skpd = ($data->tgl_skpd == '00-00-0000') ? '' : $data->tgl_skpd; // if 0000-00-00 set tu empty for datepicker compatibility
		echo json_encode($data);
	}

	public function ajax_add()
	{
		$this->_validate();
		$data = array(
				'no_skpd' => $this->input->post('no_skpd'),
				'tgl_skpd' => $this->input->post('tgl_skpd'),
				'nama' => $this->input->post('nama'),
				'gol' => $this->input->post('gol'),
				'tujuan' => $this->input->post('tujuan'),
				'durasi' => $this->input->post('durasi'),
				'hotel' => $this->input->post('hotel'),
			);
		$insert = $this->person->save($data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update()
	{
		$this->_validate();
		$data = array(
				'no_skpd' => $this->input->post('no_skpd'),
				'tgl_skpd' => $this->input->post('tgl_skpd'),
				'nama' => $this->input->post('nama'),
				'gol' => $this->input->post('gol'),
				'tujuan' => $this->input->post('tujuan'),
				'durasi' => $this->input->post('durasi'),
				'hotel' => $this->input->post('hotel'),
			);
		//$this->mcrud->update($this->tables,$data, $this->pk,$id_akomodasi);
		$this->person->update(array('id_akomodasi' => $this->input->post('id_akomodasi')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($id)
	{
		$this->person->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}


	private function _validate()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if($this->input->post('no_skpd') == '')
		{
			$data['inputerror'][] = 'no_skpd';
			$data['error_string'][] = 'NO SKPD is required';
			$data['status'] = FALSE;
		}

		if($this->input->post('tgl_skpd') == '')
		{
			$data['inputerror'][] = 'tgl_skpd';
			$data['error_string'][] = 'Tgl SKPD is required';
			$data['status'] = FALSE;
		}

		if($this->input->post('nama') == '')
		{
			$data['inputerror'][] = 'nama';
			$data['error_string'][] = 'Nama is required';
			$data['status'] = FALSE;
		}

		if($this->input->post('gol') == '')
		{
			$data['inputerror'][] = 'gol';
			$data['error_string'][] = 'Golongan is required';
			$data['status'] = FALSE;
		}
		
		if($this->input->post('durasi') == '')
		{
			$data['inputerror'][] = 'durasi';
			$data['error_string'][] = 'Durasi is required';
			$data['status'] = FALSE;
		}
		
		if($this->input->post('tujuan') == '')
		{
			$data['inputerror'][] = 'tujuan';
			$data['error_string'][] = 'Tujuan is required';
			$data['status'] = FALSE;
		}
		
		if($this->input->post('hotel') == '')
		{
			$data['inputerror'][] = 'hotel';
			$data['error_string'][] = 'Hotel is required';
			$data['status'] = FALSE;
		}

		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
	}
	
}