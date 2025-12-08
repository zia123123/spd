<?php

class pegawai extends CI_Controller{
    
    var $folder =   "pegawai";
    var $tables =   "tb_pegawai";
    var $pk     =   "id_pegawai";
    var $title  =   "Data Pegawai Kanwil Jabar";
    
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
        $sql    =   "SELECT * FROM tb_pegawai where sts = '1' ORDER BY id_pegawai";
        $data['title']=  $this->title;
        $data['desc']="";
        $data['record']=  $this->db->query($sql)->result();
		$this->template->load('template', $this->folder.'/view',$data);
    }
    
    
    function post()
    {
		
        if(isset($_POST['submit']))
        {
			$noreg = $this->input->post('noreg');
			$nip = $this->input->post('nip');
			
			$this->form_validation->set_message('required', '%s Harus Diisi.');
			$this->form_validation->set_message('min_length', '%s harus %s digit.');
			$this->form_validation->set_message('integer', '%s harus Angka.');
			$this->form_validation->set_message('is_unique', '%s tersebut sudah ada !!');
			
			$this->form_validation->set_rules('nama_pegawai', 'Nama Pegawai','trim|required');
			$this->form_validation->set_rules('noreg', 'Noreg','required|min_length[7]|max_length[7]');
			$this->form_validation->set_rules('nip', 'NIP','required|min_length[9]');
			$this->form_validation->set_rules('jabatan', 'Jabatan','trim|required');
			$this->form_validation->set_rules('pajak', 'Pajak','required|min_length[1]|max_length[10]');
			
			if ($this->form_validation->run() === FALSE) {
				$this->template->load('template', $this->folder.'/post');
			} else {
				$cek_noreg = $this->db->query("select * from tb_pegawai where noreg = '$noreg'");
				$cek_nip   = $this->db->query("select * from tb_pegawai where nip = '$nip'");
				
				if($cek_noreg->num_rows()>0){
					$data['msg_noreg'] = "Noreg tersebut sudah ada";
					$this->template->load('template', $this->folder.'/post', $data);
				} elseif($cek_nip->num_rows()>0){
					$data['msg_nip'] = "NIP tersebut sudah ada";
					$this->template->load('template', $this->folder.'/post', $data);
				} else {
					$data       =   array(  'nip'=>$this->input->post('nip'),
											'noreg'=>$this->input->post('noreg'),
											'nama_pegawai'=>$this->input->post('nama_pegawai'),
											'golongan'=>$this->input->post('golongan'),
											'jenjang'=>$this->input->post('jenjang'),
											'jabatan'=>$this->input->post('jabatan'),
											'unitkerja'=>$this->input->post('unitkerja'),
											'sts_pejabat'=>$this->input->post('sts_pejabat'),
											'sts'=>'1',
											'pajak'=>$this->input->post('pajak'),
										 );
					$this->db->insert($this->tables,$data);
					redirect($this->uri->segment(1));
				}
			}
        }
        else
        {
            $data['title']=  $this->title;
            $data['desc']="Input Pegawai";
			$data['unitkerja'] = $this->db->query("select * from tb_unitkerja")->result();  
            $this->template->load('template', $this->folder.'/post',$data);
        }
    }
    function edit()
    {
        if(isset($_POST['submit']))
        {
			$id_pegawai = $this->input->post('id_pegawai');
			
			$this->form_validation->set_message('required', '%s Harus Diisi.');
			$this->form_validation->set_message('min_length', '%s harus %s digit.');
			$this->form_validation->set_message('integer', '%s harus Angka.');
			
			$this->form_validation->set_rules('nama_pegawai', 'Nama Pegawai','trim|required');
			$this->form_validation->set_rules('noreg', 'Noreg','required|min_length[7]|max_length[7]');
			$this->form_validation->set_rules('nip', 'NIP','required|min_length[9]');
			$this->form_validation->set_rules('jabatan', 'Jabatan','trim|required');
			$this->form_validation->set_rules('pajak', 'Pajak','required|min_length[1]|max_length[10]');
			
			if ($this->form_validation->run() === FALSE) {
				$data['r']    =  $this->mcrud->getByID($this->tables,  $this->pk,$id_pegawai)->row_array();
				$this->template->load('template', $this->folder.'/edit',$data);
			} else {
			
				$data           =   array(  'nip'=>$this->input->post('nip'),
											'noreg'=>$this->input->post('noreg'),
											'nama_pegawai'=>$this->input->post('nama_pegawai'),
											'golongan'=>$this->input->post('golongan'),
											'jenjang'=>$this->input->post('jenjang'),
											'jabatan'=>$this->input->post('jabatan'),
											'unitkerja'=>$this->input->post('unitkerja'),
											'sts_pejabat'=>$this->input->post('sts_pejabat'),
											'sts'=>'1',
											'pajak'=>$this->input->post('pajak'),
										 );
				$this->mcrud->update($this->tables,$data, $this->pk,$id_pegawai);
				redirect($this->uri->segment(1));
			}
        }
        else
        {
            $data['title']=  $this->title;
            $data['desc'] ="Edit Pegawai";
            $id           =  $this->uri->segment(3);
            $data['r']    =  $this->mcrud->getByID($this->tables,  $this->pk,$id)->row_array();
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