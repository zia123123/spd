<?php
class rekap_tagihan extends CI_Controller{
    
    var $folder =   "rekap_tagihan";
    var $tables =   "tb_sppd";
    var $pk     =   "id_sppd";
    var $title  =   "rekap_tagihan";
    
    function __construct() {
        parent::__construct();
		$this->load->helper("terbilang");
	    $this->load->helper("tanggal");
		$this->load->helper("romawi");
		$this->load->library('pdf');
		$this->load->helper('pdf_helper');
    }
    
    function index()
    {
		if(isset($_POST['submit']))
        {
			
		} else {
			$query="SELECT
						id_pelaksana,no_fax, tgl_fax, no_skpd, attr_skpd, tgl_skpd, nama_pelaksana, gol, tmpt_tujuan, durasi_tgs,
						uang_hotel, uang_pesawat_b, uang_kereta_b, uang_travel_b,
						uang_taxi, uang_harian, uang_repres,	
						jumlah, pph, potongan,
						uang_pesawat_p, uang_kereta_p, uang_travel_p,
						total, jumlah_diterima
					FROM
						tb_pelaksana a
					INNER JOIN tb_skpd b
					INNER JOIN tb_sppd c ON a.id_sppd = c.id_sppd
					WHERE
						no_fax != ''
					group by id_pelaksana order by id_pelaksana";
			$data['record']=  $this->db->query($query)->result();
			$data['title']  = $this->title;
			$data['desc']    =   "";
			$this->template->load('template', $this->folder.'/view',$data);
		}
    }
	
	function cetak_rekap_biaya(){
		
		$id['id_sppd'] = $this->uri->segment(3);
		$tglsppd = $this->uri->segment(4);
		$jenisbiaya = $this->uri->segment(5);
		//echo '<script type="text/javascript">alert("' . $id['id_sppd'] . '")</script>';
		$filename = $id['id_sppd']."_BIAYA_SKPD_".$tglsppd;
		//echo '<script type="text/javascript">alert("' . $id['id_sppd']. '")</script>';
		
		$data = array(
			'get_data_sppd'=>$this->mcrud->manualquery('select * from tb_sppd inner join tb_skpd on tb_skpd.id_sppd = tb_sppd.id_sppd where tb_sppd.id_sppd ="'.$id['id_sppd'].'" and tb_sppd.sts=1')->result(),
			'get_ketua_pelaksana_sppd'=>$this->mcrud->getDataKetuaPelaksanaSppd($id['id_sppd']),
			'get_pelaksana_sppd'=>$this->mcrud->getDataPelaksanaSppd($id['id_sppd']),
			'get_pelaksana'=>$this->mcrud->manualquery('select * from tb_pelaksana where id_sppd ="'.$id['id_sppd'].'" ORDER BY status_pelaksana DESC')->result(),
			'get_sum_biaya'=>$this->mcrud->getsumBiaya($id['id_sppd']),
			'get_pejabat_ttd'=>$this->mcrud->manualquery('select * from tb_pejabat_ttd')->result(),
		);
		
		//if ($jenisbiaya=="pswt_krywn_hotel" or $jenisbiaya=="pswt_krywn_non_hotel" or $jenisbiaya=="pswt_ka_waka_hotel" or $jenisbiaya=="pswt_ka_waka_non_hotel"){
			//$this->load->view($this->folder.'/cetak_rekap_biaya_pesawat',$data);
		//} else {
			$this->load->view($this->folder.'/cetak_rekap_biaya',$data);
		//}
		//$HTML=$this->load->view($this->folder.'/test',$data,true);
		//$this->pdf->pdf_create($HTML,$filename,'A4','landscape');//render atau membuat pdf dari html diatas
	}
	
}