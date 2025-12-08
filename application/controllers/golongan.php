<?php
class golongan extends CI_Controller
{
    var $folder =   "golongan";
    var $tables =   "tb_golongan";
    var $pk     =   "id_gol";
    var $title  =   "Data Golongan";
    
    function __construct() {
        parent::__construct();
		$this->load->helper("romawi");
		$this->load->library('form_validation');
    }
     
    function index()
    {
        $data['title'] =  $this->title;
        $data['desc']  =  "";
		$query = "SELECT * FROM tb_golongan ORDER BY id_gol DESC";
		$data['record'] = $this->mcrud->manualquery($query)->result();
		$this->template->load('template', $this->folder.'/view',$data);
    }
    
    function post()
    {
        if(isset($_POST['submit']))
        {
			$gol = $this->input->post('gol');
			
			$this->form_validation->set_message('required', '%s Harus Diisi.');
			$this->form_validation->set_message('min_length', '%s harus %s digit.');
			$this->form_validation->set_message('max_length', '%s harus %s digit.');
			$this->form_validation->set_message('integer', '%s harus Angka.');
			$this->form_validation->set_message('is_unique', '%s tersebut sudah ada !!');
			
			$this->form_validation->set_rules('gol', 'Golongan','trim|required|integer');
			$this->form_validation->set_rules('nama_gol', 'Nama Golongan','trim|required');
			$this->form_validation->set_rules('klasifikasi', 'Klasifikasi','required');
			$this->form_validation->set_rules('dalam_kota', 'Dalam Kota','trim|required|integer');
			$this->form_validation->set_rules('raskin', 'Raskin','trim|required|integer');
			$this->form_validation->set_rules('management_reg', 'Management','trim|required|integer');
			$this->form_validation->set_rules('management_diklat', 'Diklat','trim|required|integer');
			$this->form_validation->set_rules('spi', 'SPI','trim|required|integer');
			$this->form_validation->set_rules('u_hotel', 'Uang Hotel','trim|required|integer');
			$this->form_validation->set_rules('u_taxi', 'Uang Taxi','trim|required|integer');
			
			$cek_gol = $this->db->query("select * from tb_golongan where gol = '$gol'");
				
			if($cek_gol->num_rows()>0){
				$data['msg'] = "Golongan tersebut sudah ada";
				$this->template->load('template', $this->folder.'/post', $data);
			} else {
			
				if ($this->form_validation->run() === FALSE) {
					$this->template->load('template', $this->folder.'/post');
				} else {
					$data   =   array(  'gol'=>$this->input->post('gol'),
										'nama_gol'=>$this->input->post('nama_gol'),
										'klasifikasi'=>$this->input->post('klasifikasi'),
										'dalam_kota'=>$this->input->post('dalam_kota'),
										'raskin'=>$this->input->post('raskin'),
										'management_reg'=>$this->input->post('management_reg'),
										'management_diklat'=>$this->input->post('management_diklat'),
										'spi'=>$this->input->post('spi'),
										'u_hotel'=>$this->input->post('u_hotel'),
										'u_taxi'=>$this->input->post('u_taxi'),
									 );
					$this->db->insert($this->tables,$data);
					redirect($this->uri->segment(1));
				}
			}
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
			$id     = $this->input->post('id_gol');
			
			$this->form_validation->set_message('required', '%s Harus Diisi.');
			$this->form_validation->set_message('min_length', '%s harus %s digit.');
			$this->form_validation->set_message('max_length', '%s harus %s digit.');
			$this->form_validation->set_message('integer', '%s harus Angka.');
			$this->form_validation->set_message('is_unique', '%s tersebut sudah ada !!');
			
			$this->form_validation->set_rules('gol', 'Golongan','trim|required|integer');
			$this->form_validation->set_rules('nama_gol', 'Nama Golongan','trim|required');
			$this->form_validation->set_rules('klasifikasi', 'Klasifikasi','required');
			$this->form_validation->set_rules('dalam_kota', 'Dalam Kota','trim|required|integer');
			$this->form_validation->set_rules('raskin', 'Raskin','trim|required|integer');
			$this->form_validation->set_rules('management_reg', 'Management','trim|required|integer');
			$this->form_validation->set_rules('management_diklat', 'Diklat','trim|required|integer');
			$this->form_validation->set_rules('spi', 'SPI','trim|required|integer');
			$this->form_validation->set_rules('u_hotel', 'Uang Hotel','trim|required|integer');
			$this->form_validation->set_rules('u_taxi', 'Uang Taxi','trim|required|integer');
			
			if ($this->form_validation->run() === FALSE) {
				$data['r']   =  $this->mcrud->getByID($this->tables, $this->pk,$id)->row_array();
				$this->template->load('template', $this->folder.'/edit',$data);
			} else {
				$id     = $this->input->post('id_gol');
				$data   = array  (  'gol'=>$this->input->post('gol'),
									'nama_gol'=>$this->input->post('nama_gol'),
									'klasifikasi'=>$this->input->post('klasifikasi'),
									'dalam_kota'=>$this->input->post('dalam_kota'),
									'raskin'=>$this->input->post('raskin'),
									'management_reg'=>$this->input->post('management_reg'),
									'management_diklat'=>$this->input->post('management_diklat'),
									'spi'=>$this->input->post('spi'),
									'u_hotel'=>$this->input->post('u_hotel'),
									'u_taxi'=>$this->input->post('u_taxi'),
								 );
				$this->mcrud->update($this->tables,$data, $this->pk,$id);
				redirect($this->uri->segment(1));
			}
        }
        else
        {
            $data['title']  = $this->title;
            $id          =  $this->uri->segment(3);
            $data['r']   =  $this->mcrud->getByID($this->tables,  $this->pk,$id)->row_array();
            $this->template->load('template', $this->folder.'/edit',$data);
        }
    }
    function delete()
    {
        $id     =  $this->uri->segment(3);
        $chekid =  $this->db->get_where($this->tables,array($this->pk=>$id));
        if($chekid>0)
        {
            $this->mcrud->delete($this->tables,  $this->pk,  $this->uri->segment(3));
        }
        redirect($this->uri->segment(1));
    }
}