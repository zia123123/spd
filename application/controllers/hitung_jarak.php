<?php
class hitung_jarak extends CI_Controller{
    function __construct() {
        parent::__construct();
    }
            
    function index()
    {
		//$data['cp_sppd'] = $this->db->query("select count(id_sppd) as countsppd from tb_sppd where sts = 0")->row()->countsppd;	
		$data['activeTab'] = "hitung_jarak";
		$data['data_tempat'] = $this->mcrud->manualquery('select * from tb_tempat')->result();
        $this->template->load('template', 'hitung_jarak', $data);
    }
}