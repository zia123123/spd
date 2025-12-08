<?php

class pengikut extends CI_Controller{
    
    var $folder =   "pengikut";
    var $tables =   "tb_pegawai";
    var $pk     =   "id_pegawai";
    var $title  =   "Data Pengikut";
    
    function __construct() {
        parent::__construct();
		$this->load->helper("romawi");
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
        $sql    =   "SELECT * FROM tb_pegawai where sts = '3' ORDER BY id_pegawai";
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
			$this->form_validation->set_message('min_length', '%s harus %s digit.');
			$this->form_validation->set_message('integer', '%s harus Angka.');
			$this->form_validation->set_message('is_unique', '%s tersebut sudah ada !!');
			
			$this->form_validation->set_rules('nama_pengikut', 'Nama Pengikut','trim|required');
			$this->form_validation->set_rules('golongan', 'Golongan','required');
			
			$this->form_validation->set_rules('instansi', 'Instansi','trim|required');
			$this->form_validation->set_rules('unitkerja', 'Unit Kerja','trim|required');
			$this->form_validation->set_rules('pajak', 'Pajak','required|min_length[1]|max_length[10]');
			
			if ($this->form_validation->run() === FALSE) {
				$this->template->load('template', $this->folder.'/post');
			} else {
				$nama		    =   $this->input->post('nama_pengikut');
				$golongan       =   $this->input->post('golongan');
				$jenjang       =   $this->input->post('jenjang');
				$instansi       =   $this->input->post('instansi');
				$unitkerja      =   $this->input->post('unitkerja');
				$sts            =   '3';
				$pajak		    =   $this->input->post('pajak');
				
				$last_nip_pengikut = $this->db->query("select max(nip) as nip from tb_pegawai where sts=3")->row()->nip;
				$last_noreg_pengikut = $this->db->query("select max(noreg) as noreg from tb_pegawai where sts=3")->row()->noreg;
				
				if($last_nip_pengikut == NULL or $last_noreg_pengikut == 0) {
					$nip = '222222222';
					$noreg = '2222222';
				} else {
					$nip = $last_nip_pengikut + 1;
					$noreg = $last_noreg_pengikut + 1;
				}
				
				$data           =   array(  'nip'=>$nip,
											'noreg'=>$noreg,
											'nama_pegawai'=>$nama,
											'golongan'=>$golongan,
											'jenjang'=>$jenjang,
											'jabatan'=>$instansi,
											'unitkerja'=>$unitkerja,
											'sts'=>$sts,
											'pajak'=>$pajak,
										 );
				$this->db->insert($this->tables,$data);
				redirect($this->uri->segment(1));
			}
        }
        else
        {
            $data['title']=  $this->title;
            $data['desc']="Input Pengikut";
			$data['unitkerja'] = $this->mcrud->getAll('tb_unitkerja')->result();  
            $this->template->load('template', $this->folder.'/post',$data);
        }
    }
    function edit()
    {
        if(isset($_POST['submit']))
        {
            $id		  		=   $this->input->post('id_pengikut');
			
			$this->form_validation->set_message('required', '%s Harus Diisi.');
			$this->form_validation->set_message('min_length', '%s harus %s digit.');
			$this->form_validation->set_message('integer', '%s harus Angka.');
			
			$this->form_validation->set_rules('nama_pengikut', 'Nama Pengikut','trim|required');
			$this->form_validation->set_rules('golongan', 'Golongan','required');
			
			$this->form_validation->set_rules('instansi', 'Instansi','trim|required');
			$this->form_validation->set_rules('unitkerja', 'Unit Kerja','trim|required');
			$this->form_validation->set_rules('pajak', 'Pajak','required|min_length[1]|max_length[10]');
			
			if ($this->form_validation->run() === FALSE) {
				$data['r']    =  $this->mcrud->getByID($this->tables,  $this->pk,$id)->row_array();
				$this->template->load('template', $this->folder.'/edit',$data);
			} else {
				$nama		    =   $this->input->post('nama_pengikut');
				$golongan	    =   $this->input->post('golongan');
				$jenjang	    =   $this->input->post('jenjang');
				$instansi       =   $this->input->post('instansi');
				$unitkerja      =   $this->input->post('unitkerja');
				$pajak		    =   $this->input->post('pajak');
				$data           =   array(  'nama_pegawai'=>$nama,
											'golongan'=>$golongan,
											'jenjang'=>$jenjang,
											'jabatan'=>$instansi,                                        
											'unitkerja'=>$unitkerja,
											'pajak'=>$pajak,
										 );
				$this->mcrud->update($this->tables,$data, $this->pk,$id);
				redirect($this->uri->segment(1));
			}
        }
        else
        {
            $data['title']=  $this->title;
            $data['desc']="Edit Pengikut";
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