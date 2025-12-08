<?php
class unitkerja extends CI_Controller
{
    var $folder =   "unitkerja";
    var $tables =   "tb_unitkerja";
    var $pk     =   "id_unitkerja";
    var $title  =   "Unit Kerja";
    
    function __construct() {
        parent::__construct();
		$this->load->library('form_validation');
    }
     
    function index()
    {
        $data['title'] =  $this->title;
        $data['desc']  =  "";
		$query = "SELECT * FROM tb_unitkerja ORDER BY id_unitkerja ASC";
		$data['record'] = $this->mcrud->manualquery($query)->result();
		$this->template->load('template', $this->folder.'/view',$data);
    }
    
    function post()
    {
        if(isset($_POST['submit']))
        {
			$this->form_validation->set_message('required', '%s Harus Diisi.');
			
			$this->form_validation->set_rules('unitkerja', 'Unit Kerja','trim|required');
			$this->form_validation->set_rules('alamat', 'Alamat','required');
			
			if ($this->form_validation->run() === FALSE) {
				$this->template->load('template', $this->folder.'/post');
			} else {
				$data   =   array(  'unitkerja'=>$this->input->post('unitkerja'),
									'alamat'=>$this->input->post('alamat'),
									'sts'=>$this->input->post('sts'),
								 );
				$this->db->insert($this->tables,$data);
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
			$id     = $this->input->post('id_unitkerja');
			$this->form_validation->set_message('required', '%s Harus Diisi.');
			
			$this->form_validation->set_rules('unitkerja', 'Unit Kerja','trim|required');
			$this->form_validation->set_rules('alamat', 'Alamat','required');
			
			if ($this->form_validation->run() === FALSE) {
				$data['r']   =  $this->mcrud->getByID($this->tables,  $this->pk,$id)->row_array();
				$this->template->load('template', $this->folder.'/post');
			} else {
				$data   =   array(  'unitkerja'=>$this->input->post('unitkerja'),
									'alamat'=>$this->input->post('alamat'),
									'sts'=>$this->input->post('sts'),
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