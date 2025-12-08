<?php
class setting extends CI_Controller
{
    var $folder =   "setting";
    var $tables =   "tb_setting";
    var $pk     =   "id_setting";
    var $title  =   "Setting";
    
    function __construct() {
        parent::__construct();
		$this->load->library('form_validation');
    }
     
    function index()
    {
        $data['title'] =  $this->title;
        $data['desc']  =  "";
		$query = "SELECT * FROM tb_setting ORDER BY id_setting DESC";
		$data['record'] = $this->mcrud->manualquery($query)->result();
		$this->template->load('template', $this->folder.'/view',$data);
    }
    
    function edit()
    {
        if(isset($_POST['submit']))
        {
            $id     = $this->input->post('id_setting');
			$this->form_validation->set_message('required', '%s Harus Diisi.');
			$this->form_validation->set_message('min_length', '%s harus %s digit.');
			$this->form_validation->set_message('decimal', '%s harus Angka.');
			
			$this->form_validation->set_rules('harian_bbm', 'Harian BBM','trim|required');
			$this->form_validation->set_rules('perkalian_bbm', 'Jumlah Liter','trim|required');
			
			if ($this->form_validation->run() === FALSE) {
				$data['r']    =  $this->mcrud->getByID($this->tables,  $this->pk,$id)->row_array();
				$this->template->load('template', $this->folder.'/edit',$data);
			} else {
				$data   = array  (  'harian_bbm'=>$this->input->post('harian_bbm'), //hari
									'perkalian_bbm'=>$this->input->post('perkalian_bbm'), //liter per km
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