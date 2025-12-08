<?php
class pagu extends CI_Controller
{
    var $folder =   "pagu";
    var $tables =   "tb_pagu";
    var $pk     =   "id_pagu";
    var $title  =   "PAGU";
    
    function __construct() {
        parent::__construct();
		$this->load->library('form_validation');
    }
     
    function index()
    {
        $data['title'] =  $this->title;
        $data['desc']  =  "";
		$query = "SELECT * FROM tb_pagu ORDER BY id_pagu ASC";
		$data['record'] = $this->mcrud->manualquery($query)->result();
		$this->template->load('template', $this->folder.'/view',$data);
    }
    
    function post()
    {
        if(isset($_POST['submit']))
        {
			$this->form_validation->set_message('required', '%s Harus Diisi.');
			
			$this->form_validation->set_rules('bln', 'bln','trim|required');
			$this->form_validation->set_rules('tahun', 'Tahun','required');
			$this->form_validation->set_rules('pagu', 'Pagu','required');
			
			$bln = $this->input->post('bln');
			
			if ($bln == "1"){
				$bulan = "januari";
			} elseif ($bln == "2"){
				$bulan = "februari";
			} elseif ($bln == "3"){
				$bulan = "maret";
			} elseif ($bln == "4"){
				$bulan = "april";
			} elseif ($bln == "5"){
				$bulan = "mei";
			} elseif ($bln == "6"){
				$bulan = "juni";
			} elseif ($bln == "7"){
				$bulan = "juli";
			} elseif ($bln == "8"){
				$bulan = "agustus";
			} elseif ($bln == "9"){
				$bulan = "september";
			} elseif ($bln == "10"){
				$bulan = "oktober";
			} elseif ($bln == "11"){
				$bulan = "november";
			} elseif ($bln == "12"){
				$bulan = "desember";
			}
			
			if ($this->form_validation->run() === FALSE) {
				$this->template->load('template', $this->folder.'/post');
			} else {
				$data   =   array(  'bulan'=>$bulan,
									'bln'=>$this->input->post('bln'),
									'tahun'=>$this->input->post('tahun'),
									'pagu'=>$this->input->post('pagu'),
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
			$id     = $this->input->post('id_pagu');
			$this->form_validation->set_message('required', '%s Harus Diisi.');
			
			$this->form_validation->set_rules('bln', 'bln','trim|required');
			$this->form_validation->set_rules('tahun', 'Tahun','required');
			$this->form_validation->set_rules('pagu', 'Pagu','required');
			
			$bln = $this->input->post('bln');
			
			if ($bln == "1"){
				$bulan = "januari";
			} elseif ($bln == "2"){
				$bulan = "februari";
			} elseif ($bln == "3"){
				$bulan = "maret";
			} elseif ($bln == "4"){
				$bulan = "april";
			} elseif ($bln == "5"){
				$bulan = "mei";
			} elseif ($bln == "6"){
				$bulan = "juni";
			} elseif ($bln == "7"){
				$bulan = "juli";
			} elseif ($bln == "8"){
				$bulan = "agustus";
			} elseif ($bln == "9"){
				$bulan = "september";
			} elseif ($bln == "10"){
				$bulan = "oktober";
			} elseif ($bln == "11"){
				$bulan = "november";
			} elseif ($bln == "12"){
				$bulan = "desember";
			}
			
			if ($this->form_validation->run() === FALSE) {
				$data['r']   =  $this->mcrud->getByID($this->tables,  $this->pk,$id)->row_array();
				$this->template->load('template', $this->folder.'/post');
			} else {
				$data   =   array(  'bulan'=>$bulan,
									'bln'=>$this->input->post('bln'),
									'tahun'=>$this->input->post('tahun'),
									'pagu'=>$this->input->post('pagu'),
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