<?php
class akomodasi_tamu extends CI_Controller{
    
    var $folder =   "akomodasi_tamu";
    var $tables =   "tb_akomodasi_tamu";
    var $pk     =   "id_akomodasi";
    var $title  =   "Akomodasi Tamu Pusat";
    
    function __construct() {
        parent::__construct();
		$this->load->helper("terbilang");
	    $this->load->helper("tanggal");
		$this->load->helper("romawi");
		$this->load->library('pdf');
		$this->load->helper('pdf_helper');
		$this->load->library('form_validation');
    }
    
    function index()
    {
        $query="select * from tb_akomodasi_tamu
				order by id_akomodasi desc";
        $data['record']=  $this->db->query($query)->result();
        $data['title']  = $this->title;
        $data['desc']    =   "";
		$this->template->load('template', $this->folder.'/view',$data);
    }
	
    function post()
    {
        if(isset($_POST['submit']))
        {
			$this->form_validation->set_message('required', '%s Harus Diisi.');
			$this->form_validation->set_message('min_length', '%s harus %s digit.');
			$this->form_validation->set_message('integer', '%s harus Angka.');
			$this->form_validation->set_message('is_unique', '%s tersebut sudah ada !!');
			
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
			
				$data=array(
					'no_skpd'=> $this->input->post('no_skpd'),
					'tgl_skpd'=> $this->input->post('tgl_skpd'),
					'nama'=>$this->input->post('nama'),
					'gol'=> $this->input->post('gol'),
					'tujuan'=>$this->input->post('tujuan'),
					'durasi'=>$this->input->post('durasi'),
					'hotel'=>$this->input->post('hotel'),
				);
				
				$insertsppd = $this->db->insert($this->tables,$data);
		
				redirect($this->uri->segment(1));	
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
    
    
	function lihat_pelaksana()
    {
		$data['title']  = $this->title;
		$data['desc']   = "";
		$id             = $this->uri->segment(3);
		$query			=  "select 
							id_pelaksana, nama_pelaksana, noreg, gol, jabatan, unit_kerja, status_pelaksana
							from tb_pelaksana 
							where id_sppd = '$id'
							ORDER BY status_pelaksana DESC";
		$data['record'] = $this->db->query($query)->result();
		$this->template->load('template', $this->folder.'/lihat_pelaksana',$data);
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
	
}