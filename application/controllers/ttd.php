<?php
class ttd extends CI_Controller
{
    var $folder =   "ttd";
    var $tables =   "tb_pejabat_ttd";
    var $pk     =   "id_pejabat_ttd";
    var $title  =   "Data Pejabat Tanda Tangan";
    
    function __construct() {
        parent::__construct();
    }
     
    function index()
    {
        $data['title'] =  $this->title;
        $data['desc']  =  "";
		$query = "SELECT * FROM tb_pejabat_ttd ORDER BY id_pejabat_ttd DESC";
		$data['record'] = $this->mcrud->manualquery($query)->result();
		$this->template->load('template', $this->folder.'/view',$data);
    }
    
    function edit()
    {
        if(isset($_POST['submit']))
        {
			$pemeriksa_1 = $this->input->post('pemeriksa_1');
			$pemeriksa_2 = $this->input->post('pemeriksa_2');
			$pemeriksa_3 = $this->input->post('pemeriksa_3');
			$pemeriksa_4 = $this->input->post('pemeriksa_4');
			
			$jabatan_1 	= $this->db->query("select jabatan from tb_pegawai where nama_pegawai = '$pemeriksa_1'")->row()->jabatan;
			$jabatan_2 	= $this->db->query("select jabatan from tb_pegawai where nama_pegawai = '$pemeriksa_2'")->row()->jabatan;
			$jabatan_3 	= $this->db->query("select jabatan from tb_pegawai where nama_pegawai = '$pemeriksa_3'")->row()->jabatan;
			$jabatan_4 	= $this->db->query("select jabatan from tb_pegawai where nama_pegawai = '$pemeriksa_4'")->row()->jabatan;
			
            $id     = $this->input->post('id_pejabat_ttd');
            $data   = array  (  'pemeriksa_1'=>$pemeriksa_1,
								'pemeriksa_2'=>$pemeriksa_2,
								'pemeriksa_3'=>$pemeriksa_3,
								'pemeriksa_4'=>$pemeriksa_4,
								'jabatan_1'=>$jabatan_1,
								'jabatan_2'=>$jabatan_2,
								'jabatan_3'=>$jabatan_3,
								'jabatan_4'=>$jabatan_4,
                             );
            $this->mcrud->update($this->tables,$data, $this->pk,$id);
            redirect($this->uri->segment(1));
        }
        else
        {
            $data['title']  = $this->title;
            $id          =  $this->uri->segment(3);
            $data['r']   =  $this->mcrud->getByID($this->tables,  $this->pk,$id)->row_array();
            $this->template->load('template', $this->folder.'/edit',$data);
        }
    }

}