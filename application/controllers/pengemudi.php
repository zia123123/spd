<?php

class pengemudi extends CI_Controller{
    
    var $folder =   "pengemudi";
    var $tables =   "tb_pegawai";
    var $pk     =   "id_pegawai";
    var $title  =   "Data Pengemudi Divre Jateng";
    
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
        $sql    =   "SELECT * FROM tb_pegawai where sts = '2' ORDER BY id_pegawai";
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
			
			$this->form_validation->set_rules('nama_pengemudi', 'Nama Pengemudi','trim|required');
			$this->form_validation->set_rules('jabatan', 'Jabatan','trim|required');
			$this->form_validation->set_rules('unitkerja', 'Unit Kerja','trim|required');
			$this->form_validation->set_rules('pajak', 'Pajak','required|min_length[1]|max_length[10]');
			
			if ($this->form_validation->run() === FALSE) {
				$this->template->load('template', $this->folder.'/post');
			} else {
				$nama		    =   $this->input->post('nama_pengemudi');
				$jabatan		=   $this->input->post('jabatan');
				$golongan		=   '0';
				$jenjang		=   'tenaga';
				$unitkerja      =   $this->input->post('unitkerja');
				$sts            =   '2'; //pengemudi
				$pajak		    =   $this->input->post('pajak');
				
				$last_nip_pengemudi = $this->db->query("select max(nip) as nip from tb_pegawai where sts=2")->row()->nip;
				$last_noreg_pengemudi = $this->db->query("select max(noreg) as noreg from tb_pegawai where sts=2")->row()->noreg;
				
				if($last_nip_pengemudi == NULL or $last_nip_pengemudi == 0) {
					$nip = '111111111';
					$noreg = '1111111';
				} else {
					$nip = $last_nip_pengemudi + 1;
					$noreg = $last_noreg_pengemudi + 1;
				}
				
				$data           =   array(  'nip'=>$nip,
											'noreg'=>$noreg,
											'nama_pegawai'=>$nama,
											'golongan'=>$golongan,
											'jenjang'=>$jenjang,
											'jabatan'=>$jabatan,
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
            $data['desc']="Input Pengemudi";
			$data['unitkerja'] = $this->mcrud->getAll('tb_unitkerja')->result();  
            $this->template->load('template', $this->folder.'/post',$data);
        }
    }
    function edit()
    {
        if(isset($_POST['submit']))
        {
            $id_pegawai   =   $this->input->post('id_pegawai');
			$this->form_validation->set_message('required', '%s Harus Diisi.');
			$this->form_validation->set_message('min_length', '%s harus %s digit.');
			$this->form_validation->set_message('integer', '%s harus Angka.');
			
			$this->form_validation->set_rules('nama_pengemudi', 'Nama Pengemudi','trim|required');
			$this->form_validation->set_rules('jabatan', 'Jabatan','trim|required');
			$this->form_validation->set_rules('unitkerja', 'Unit Kerja','trim|required');
			$this->form_validation->set_rules('pajak', 'Pajak','required|min_length[1]|max_length[10]');
			
			if ($this->form_validation->run() === FALSE) {
				$data['r']    =  $this->mcrud->getByID($this->tables,  $this->pk,$id_pegawai)->row_array();
				$this->template->load('template', $this->folder.'/edit',$data);
			} else {
				$nama		    =   $this->input->post('nama_pengemudi');            
				$jabatan		=   $this->input->post('jabatan');
				$unitkerja      =   $this->input->post('unitkerja');
				$pajak		    =   $this->input->post('pajak');
				$data           =   array(  'nama_pegawai'=>$nama,
											'jabatan'=>$jabatan,
											'unitkerja'=>$unitkerja,
											'pajak'=>$pajak,
										 );
				$this->mcrud->update($this->tables,$data, $this->pk,$id_pegawai);
				redirect($this->uri->segment(1));
			}
        }
        else
        {
            $data['title']=  $this->title;
            $data['desc']="Edit Pengemudi";
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