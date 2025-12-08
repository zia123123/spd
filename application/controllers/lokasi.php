<?php

class lokasi extends CI_Controller{
    
    var $folder =   "lokasi";
    var $tables =   "tb_tempat";
    var $pk     =   "id_tempat";
    var $title  =   "Data Lokasi";
    
    function __construct() {
        parent::__construct();
		$this->load->library('form_validation');
    }
    
    function index()
    {
        if($this->session->userdata('level')==2)
        {
            $sess=$this->session->userdata('keterangan');
            $param="and ap.prodi_id='$sess'";
        }
        else
        {
            $param="";
        }
        $sql    =   "SELECT * FROM tb_tempat ORDER BY id_tempat";
        $data['title']=  $this->title;
        $data['desc']="";
        $data['record']=  $this->db->query($sql)->result();
		$this->template->load('template', $this->folder.'/view',$data);
    }
    
    
    function post()
    {
        if(isset($_POST['submit']))
        {
			$this->form_validation->set_message('required', '%s Harus Diisi.');		
			
			$this->form_validation->set_rules('nama_tempat', 'Nama Lokasi','trim|required');
			$this->form_validation->set_rules('wilayah', 'Wilayah','trim|required');
			$this->form_validation->set_rules('titik_koordinat', 'Titik Koordinat','trim|required');
			$this->form_validation->set_rules('alamat', 'Alamat','trim|required');
			
			if ($this->form_validation->run() === FALSE) {
				$this->template->load('template', $this->folder.'/post');
			} else {
				$nama_tempat    =   $this->input->post('nama_tempat');
				$wilayah        =   $this->input->post('wilayah');
				$titik_koordinat=   $this->input->post('titik_koordinat');
				$alamat       	=   $this->input->post('alamat');
			   
				$data           =   array(  'nama_tempat'=>$nama_tempat,
											'wilayah'=>$wilayah,
											'latlng'=>$titik_koordinat,
											'alamat'=>$alamat,
										 );
				$this->db->insert($this->tables,$data);
				redirect($this->uri->segment(1));
			}
        }
        else
        {
            $data['title']=  $this->title;
            $data['desc']="Input Lokasi";
            $this->template->load('template', $this->folder.'/post',$data);
        }
    }
    function edit()
    {
        if(isset($_POST['submit']))
        {
			$id_tempat	    =   $this->input->post('id_tempat');
			$this->form_validation->set_message('required', '%s Harus Diisi.');		
			
			$this->form_validation->set_rules('nama_tempat', 'Nama Lokasi','trim|required');
			$this->form_validation->set_rules('wilayah', 'Wilayah','trim|required');
			$this->form_validation->set_rules('titik_koordinat', 'Titik Koordinat','trim|required');
			$this->form_validation->set_rules('alamat', 'Alamat','trim|required');
			
			if ($this->form_validation->run() === FALSE) {
				$data['r']    =  $this->mcrud->getByID($this->tables,  $this->pk,$id_tempat)->row_array();
				$this->template->load('template', $this->folder.'/edit',$data);
			} else {
				
				$nama_tempat    =   $this->input->post('nama_tempat');
				$wilayah        =   $this->input->post('wilayah');
				$titik_koordinat=   $this->input->post('titik_koordinat');
				$alamat       	=   $this->input->post('alamat');
				
				$data           =   array(  'nama_tempat'=>$nama_tempat,
											'wilayah'=>$wilayah,
											'latlng'=>$titik_koordinat,
											'alamat'=>$alamat,
										 );
				$this->mcrud->update($this->tables,$data, $this->pk,$id_tempat);
				redirect($this->uri->segment(1));
			}
        }
        else
        {
            $data['title']=  $this->title;
            $data['desc']="Edit Pegawai";
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
}