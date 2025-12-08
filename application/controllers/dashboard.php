<?php
class dashboard extends CI_Controller{
    function __construct() {
        parent::__construct();
    }
            
    function index()
    {
		//$data['cp_sppd'] = $this->db->query("select count(id_sppd) as countsppd from tb_sppd where sts = 0")->row()->countsppd;	
		$data['activeTab'] = "dashboard";
        //$update_time = date("Y-m-d H:i:s");
		$update_time = date_create()->format('Y-m-d H:i:s'); // also works in php 5.2
		$tglnow	= date_create()->format('Y-m-d');
		
		if(isset($_POST['submit']))
        {
			$query     ="SELECT CONCAT(YEAR(STR_TO_DATE(tgl_skpd, '%d-%m-%Y')),'/',MONTH(STR_TO_DATE(tgl_skpd, '%d-%m-%Y'))) AS tahun_bulan, 
						SUM(tb_pelaksana.total) AS realisasi
						FROM tb_sppd 
						inner join tb_skpd
						on tb_skpd.id_sppd = tb_sppd.id_sppd
						inner join tb_pelaksana
						on tb_pelaksana.id_sppd = tb_sppd.id_sppd
						where sts = 1 AND jenis_plafond = 'plafond' AND STR_TO_DATE(tgl_skpd, '%d-%m-%Y') BETWEEN '2020-01-01' and '$tglnow'
						GROUP BY YEAR(STR_TO_DATE(tgl_skpd, '%d-%m-%Y')),MONTH(STR_TO_DATE(tgl_skpd, '%d-%m-%Y'))";
			$data = $this->db->query($query);
			
			$reset = $this->db->query("UPDATE tb_pagu SET realisasi=0");
			
			foreach($data->result() as $row)
			{
				// UPDATE KE TABLE PAGU
				$realisasi = $row->realisasi;
				//echo $row->tahun_bulan." | <br/>";
				$thn = substr($row->tahun_bulan,0,4);
				$bln = trim(substr($row->tahun_bulan,5,2));
				//echo $thn."<br/>";
				//echo $bln."<br/>";
				
				$update_realisasi = $this->db->query("UPDATE tb_pagu SET 
												realisasi='$realisasi'
												where tahun = '$thn' AND bln='$bln'");
				
			}
			
			$update_pagutime = $this->db->query("UPDATE tb_upd_pagu SET 
												update_time = NOW()
												where id_upd_pagu = 1");
			
			redirect('dashboard');
		} else {
			$data['desc']  =  "";
			$query = "SELECT * FROM tb_pagu ORDER BY id_pagu desc limit 15";
			$data['record'] = $this->mcrud->manualquery($query)->result();
			$data['update_time'] = $this->db->query("SELECT * FROM tb_upd_pagu where id_upd_pagu = 1")->row()->update_time;
			$data['real_non_plafond'] = $this->db->query("SELECT YEAR(STR_TO_DATE(tgl_skpd, '%d-%m-%Y')) AS tahun, MONTHNAME(STR_TO_DATE(tgl_skpd, '%d-%m-%Y')) AS bulan, 
													MONTH(STR_TO_DATE(tgl_skpd, '%d-%m-%Y')) AS bln,
													SUM(tb_pelaksana.total) AS realisasi
													FROM tb_sppd 
													inner join tb_skpd
													on tb_skpd.id_sppd = tb_sppd.id_sppd
													inner join tb_pelaksana
													on tb_pelaksana.id_sppd = tb_sppd.id_sppd
													where sts = 1 AND jenis_plafond = 'non_plafond' AND STR_TO_DATE(tgl_skpd, '%d-%m-%Y') BETWEEN '2020-01-01' and '$tglnow' 
													GROUP BY YEAR(STR_TO_DATE(tgl_skpd, '%d-%m-%Y')),MONTH(STR_TO_DATE(tgl_skpd, '%d-%m-%Y')) 
													ORDER BY tahun desc, bln desc limit 15")->result();
			$data['real_lainlain'] = $this->db->query("SELECT YEAR(STR_TO_DATE(tgl_skpd, '%d-%m-%Y')) AS tahun, MONTHNAME(STR_TO_DATE(tgl_skpd, '%d-%m-%Y')) AS bulan, 
													MONTH(STR_TO_DATE(tgl_skpd, '%d-%m-%Y')) AS bln,
													SUM(tb_pelaksana.total) AS realisasi
													FROM tb_sppd 
													inner join tb_skpd
													on tb_skpd.id_sppd = tb_sppd.id_sppd
													inner join tb_pelaksana
													on tb_pelaksana.id_sppd = tb_sppd.id_sppd
													where sts = 1 AND jenis_plafond = 'lainlain' AND STR_TO_DATE(tgl_skpd, '%d-%m-%Y') BETWEEN '2020-01-01' and '$tglnow'
													GROUP BY YEAR(STR_TO_DATE(tgl_skpd, '%d-%m-%Y')),MONTH(STR_TO_DATE(tgl_skpd, '%d-%m-%Y')) 
													ORDER BY tahun desc, bln desc limit 15")->result();
			$data['now'] = date('d-m-Y');
			//$this->template->load('template', $this->folder.'/view',$data);
			$this->template->load('template', 'dashboard', $data);
		}
    }
}