<?php
class repres extends CI_Controller
{
    var $folder =   "repres";
    var $tables =   "tb_repres";
    var $pk     =   "id_repres";
    var $title  =   "Data Uang Representatif";
    
    function __construct() {
        parent::__construct();
		$this->load->library('form_validation');
    }
     
    function index()
    {
        $data['title'] =  $this->title;
        $data['desc']  =  "";
		$query = "SELECT * FROM tb_repres ORDER BY id_repres DESC";
		$data['record'] = $this->mcrud->manualquery($query)->result();
		$this->template->load('template', $this->folder.'/view',$data);
    }
    
    function edit()
    {
        if(isset($_POST['submit']))
        {
			$id     = $this->input->post('id_repres');
			$this->form_validation->set_message('required', '%s Harus Diisi.');			
			
			$this->form_validation->set_rules('u_repres', 'Uang Representatif','trim|required');
			
			if ($this->form_validation->run() === FALSE) {
				$data['r']    =  $this->mcrud->getByID($this->tables,  $this->pk,$id)->row_array();
				$this->template->load('template', $this->folder.'/edit',$data);
			} else {
				$data   = array  (  'u_repres'=>$this->input->post('u_repres'),
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

}