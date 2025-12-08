<?php
class skpd extends CI_Controller{
    
    var $folder =   "skpd";
    var $tables =   "tb_sppd";
    var $pk     =   "id_sppd";
    var $title  =   "SKPD";
    
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
        
		$query = "select *, GROUP_CONCAT(tb_pelaksana.nama_pelaksana) as nama_plk from tb_sppd 
				inner join tb_skpd
				on tb_skpd.id_sppd = tb_sppd.id_sppd
				inner join tb_pelaksana
				on tb_pelaksana.id_sppd = tb_sppd.id_sppd
				where sts = 1 AND STR_TO_DATE(tgl_skpd, '%d-%m-%Y') BETWEEN '2019-01-01' and '2050-12-31'
				GROUP BY tb_pelaksana.id_sppd
				ORDER BY right(attr_skpd,4) DESC, no_skpd DESC, tgl_skpd DESC, id_skpd DESC";
		/*
		$query="select * from tb_sppd inner join tb_skpd
				on tb_skpd.id_sppd = tb_sppd.id_sppd
				where sts = 1 ORDER BY right(attr_skpd,4) DESC, no_skpd DESC, tgl_skpd DESC, id_skpd DESC ";
		*/
		/*
		$query = "select *,
				  GROUP_CONCAT(b.nama_pelaksana) as nama_plk
				  from tb_sppd a 
				  INNER JOIN tb_pelaksana b on a.id_sppd = b.id_sppd
				  LEFT JOIN tb_skpd c on b.id_sppd = b.id_sppd
				  where a.sts = 1
				  GROUP BY c.id_sppd, a.id_sppd
				  ORDER BY c.tgl_skpd DESC, c.id_skpd DESC, c.no_skpd DESC";
		*/
        $data['record']=  $this->db->query($query)->result();
        $data['title']  = $this->title;
        $data['desc']    =   "";
		$this->template->load('template', $this->folder.'/view',$data);
    }
	
	function ganti_ttd()
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
            $this->mcrud->update('tb_pejabat_ttd', $data, "id_pejabat_ttd",$id);
			
            redirect($this->uri->segment(1));
        }
        else
        {
            $data['title'] = $this->title;
            $id            = $this->uri->segment(3);
            $data['ttd']   = $this->mcrud->getByID('tb_pejabat_ttd', 'id_pejabat_ttd','1')->row_array();
            $this->template->load('template', $this->folder.'/ganti_ttd',$data);
			
        }
    }
	
    function post()
    {
        if(isset($_POST['submit']))
        {
			date_default_timezone_set("Asia/Bangkok");
			$time_now 		 = date("d-m-Y h:i:sa");
			
			$date_awal 		 = trim(substr($this->input->post('tgl_tugas'),0,10));
			$date_akhir 	 = trim(substr($this->input->post('tgl_tugas'),-10));
			$selisih 		 = abs(strtotime($date_akhir) - strtotime($date_awal))/(60*60*24)+1; 
			
			$ketua_plk_tugas = $this->input->post('ketua_plk');
			$plk_tugas 		 = $this->input->post('plk_tgs');
			
			$tmpt_brgkt 	 = $this->input->post('tmpt_keberangkatan');
			$tmpt_tujuan 	 = $this->input->post('tmpt_tujuan');
			$temp_tujuan 	 = implode(',', $this->input->post('tmpt_tujuan'));
			
			$data=array(
				'pemberi_tgs'=> $this->input->post('pemberi_tgs'),
				'jab_pemberi_tgs'=> $this->input->post('jab_pemberi_tgs'),
				'pemohon_tgs'=>$this->input->post('pemohon_tgs'),
				'jab_pemohon_tgs'=> $this->input->post('jab_pemohon_tgs'),
				'durasi_tgs'=>$selisih, 
				'tmpt_keberangkatan'=>$this->input->post('tmpt_keberangkatan'),
				'tgl_keberangkatan'=>$date_awal, 
				'tmpt_tujuan'=>$temp_tujuan,
				'tgl_kepulangan'=>$date_akhir, 
				'tugas'=>$this->input->post('tugas'),
				'ket'=>$this->input->post('ket'),
				'sts'=>'0',
				'tgl_sppd'=>$time_now,
			);
			
			$insertsppd = $this->db->insert($this->tables,$data);
		
			if ($this->db->affected_rows($insertsppd) == 1) {
				$last_id_sppd = $this->db->query("select max(id_sppd) as id_sppd from tb_sppd")->row()->id_sppd;
				if ($last_id_sppd = null){
					$last_id_sppd = 1;
				}
				$this->mcrud->manualQuery('INSERT INTO tb_pelaksana (noreg, id_sppd, status_pelaksana) values ("'.$ketua_plk_tugas.'","'.$last_id_sppd.'","1")');
				//echo '<script type="text/javascript">alert("'.$query.'")</script>';
				foreach ($plk_tugas as $noreg){
					$this->mcrud->manualquery('INSERT INTO tb_pelaksana (noreg, id_sppd, status_pelaksana) values ("'.$noreg.'","'.$last_id_sppd.'","0")');
				}
				foreach ($tmpt_tujuan as $t_tujuan){
					$this->mcrud->manualquery('INSERT INTO tb_lokasi (tempat_awal, tempat_tujuan, id_sppd) values ("'.$tmpt_brgkt.'","'.$t_tujuan.'","'.$last_id_sppd.'")');
				}
				 redirect($this->uri->segment(1));
			}
			else {
				echo '<script type="text/javascript">alert("Buat SPPD Gagal !!")</script>';
				redirect("login");
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
            $id     	=   $this->input->post('id_sppd');
            $date_awal 	= 	trim(substr($this->input->post('tgl_tugas'),0,10));
			$date_akhir = 	trim(substr($this->input->post('tgl_tugas'),-10));
			$selisih 	= 	abs(strtotime($date_akhir) - strtotime($date_awal))/(60*60*24)+1;

			$ketua_plk_tugas = $this->input->post('ketua_plk');
			$plk_tugas 		 = $this->input->post('plk_tgs');
			
			$tmpt_brgkt 	 = $this->input->post('tmpt_keberangkatan');
			$tmpt_tujuan 	 = $this->input->post('tmpt_tujuan');
			$temp_tujuan 	 = implode(',', $this->input->post('tmpt_tujuan'));			
			
            $data       =   array(  'pemberi_tgs'=>$this->input->post('pemberi_tgs'),
                                    'jab_pemberi_tgs'=>$this->input->post('jab_pemberi_tgs'),
									'pemohon_tgs'=>$this->input->post('pemohon_tgs'),
									'jab_pemohon_tgs'=>$this->input->post('jab_pemohon_tgs'),
									'durasi_tgs'=>$selisih, 
									'tmpt_keberangkatan'=>$this->input->post('tmpt_keberangkatan'),
									'tgl_keberangkatan'=>$date_awal, 
									'tmpt_tujuan'=>$temp_tujuan,
									'tgl_kepulangan'=>$date_akhir,
									'tugas'=>$this->input->post('tugas'),
									'ket'=>$this->input->post('ket'));
            $updatesppd = $this->mcrud->update($this->tables,$data, $this->pk,$id);
			
			//echo '<script type="text/javascript">alert("'.$this->db->affected_rows($updatesppd).'")</script>';
			//if ($this->db->affected_rows($updatesppd) == 0) {
				$this->mcrud->manualquery('DELETE FROM tb_pelaksana WHERE id_sppd ="'.$id.'"');
				$this->mcrud->manualquery('DELETE FROM tb_lokasi WHERE id_sppd ="'.$id.'"');
				
				$this->mcrud->manualQuery('INSERT INTO tb_pelaksana (noreg, id_sppd, status_pelaksana) values ("'.$ketua_plk_tugas.'","'.$id.'","1")');
				foreach ($plk_tugas as $noreg){
					$this->mcrud->manualquery('INSERT INTO tb_pelaksana (noreg, id_sppd, status_pelaksana) values ("'.$noreg.'","'.$id.'","0")');
				}
				foreach ($tmpt_tujuan as $nama_tempat){
					$this->mcrud->manualquery('INSERT INTO tb_lokasi (tempat_awal, tempat_tujuan, id_sppd) values ("'.$tmpt_brgkt.'","'.$nama_tempat.'","'.$id.'")');
				}
				redirect($this->uri->segment(1));
				 
			//}
        }
        else
        {
            $data['title']  = $this->title;
            $data['desc']   = "";
            $id          	= $this->uri->segment(3);
            $data['r']   	= $this->mcrud->getByID($this->tables,  $this->pk,$id)->row_array();
			$q   			=  "select * from tb_pegawai";
			$y   			=  "select a.id_sppd, 
									GROUP_CONCAT(a.id_pelaksana) as id_pelaksana,
									GROUP_CONCAT(b.nama_pegawai) as nama_pegawai, 
									GROUP_CONCAT(a.noreg) as noreg, 
									GROUP_CONCAT(b.golongan) as golongan, 
									GROUP_CONCAT(b.jabatan) as jabatan, 
									b.unitkerja, a.status_pelaksana
								from tb_pelaksana a 
								INNER JOIN tb_pegawai b on a.noreg = b.noreg
								where a.id_sppd = '$id' and a.status_pelaksana = 0
								GROUP BY a.id_sppd";
			$a   			=  "select * from tb_tempat";
			$b   			=  "select tempat_awal, group_concat(id_lokasi) as id_lokasi, group_concat(tempat_tujuan) as tempat_tujuan,
								id_sppd from tb_lokasi where id_sppd = '$id' group by id_sppd";
			$data['pegawai'] = $this->db->query($q)->result();
			$data['pelaksana'] = $this->db->query($y)->row_array();
			$data['ketua_plk']	= $this->mcrud->manualquery('select * from tb_pelaksana WHERE id_sppd ="'.$id.'" and status_pelaksana=1')->row_array();
			$data['plk_tgs']	= $this->mcrud->manualquery('select * from tb_pelaksana WHERE id_sppd ="'.$id.'" and status_pelaksana=0')->row_array();
			
			$data['tempat'] = $this->db->query($a)->result();
			$data['lokasi'] = $this->db->query($b)->row_array();
            $this->template->load('template', $this->folder.'/edit',$data);
        }
    }
    
    function batal()
    {
        $id     =  $this->uri->segment(3);
        $chekid =  $this->db->get_where($this->tables,array($this->pk=>$id));
        if($chekid->num_rows()>0)
        {
			$this->mcrud->manualquery('UPDATE tb_skpd set sts_skpd="9" WHERE id_sppd ="'.$id.'"');
			$this->mcrud->manualquery('UPDATE tb_sppd set sts="9" WHERE id_sppd ="'.$id.'"');
        }
		else {
			
		}
        redirect($this->uri->segment(1));
    }
	
	function koreksi()
    {
		$data['title']  	 = $this->title;
		$data['desc']   	 = "";
		$id          		 = $this->uri->segment(3);
		$data['id']			 = $this->uri->segment(3);
		$data['data_sppd']	 = $this->mcrud->manualquery('select * from tb_sppd WHERE id_sppd ="'.$id.'"')->row_array();
		$data['data_tempat'] = $this->mcrud->manualquery('select * from tb_tempat')->result();
		$data['bbm'] 		 = $this->mcrud->manualquery('select * from tb_bahanbakar')->result();
		$data['pelaksana']	 = $this->mcrud->manualquery('select id_pelaksana, nama_pelaksana, noreg, gol, jabatan, unit_kerja, status_pelaksana
							   from tb_pelaksana 
							   where id_sppd = "'.$id.'"
							   ORDER BY status_pelaksana DESC')->result();
		
		
		$data['ketua_plk']	 = $this->mcrud->getDataKetuaPelaksanaSppd($id);
		$data['plk_tgs']	 = $this->mcrud->getDataPelaksanaSppd($id);
		$data['lokasi']		 = $this->mcrud->getDataLokasi($id);
								
		$this->template->load('template', 'request_skpd/confirm_1',$data);
    }
	
	function bbm()
    {
		$data['title']  	 = $this->title;
		$data['desc']   	 = "";
		$id          		 = $this->uri->segment(3);
		$data['id']			 = $this->uri->segment(3);
		$data['data_skpd']	 = $this->mcrud->manualquery('select * from tb_skpd WHERE id_sppd ="'.$id.'"')->result();
		$data['data_sppd']	 = $this->mcrud->manualquery('select * from tb_sppd WHERE id_sppd ="'.$id.'"')->row_array();
		$data['data_tempat'] = $this->mcrud->manualquery('select * from tb_tempat')->result();
		$data['bbm'] 		 = $this->mcrud->manualquery('select * from tb_bbm where id_sppd ="'.$id.'"')->result();
		$data['cek_bbm'] 	 = $this->db->get_where("tb_bbm",array("id_sppd"=>$id));
		$data['pelaksana']	 = $this->mcrud->manualquery('select id_pelaksana, nama_pelaksana, noreg, gol, jabatan, unit_kerja, status_pelaksana
							   from tb_pelaksana 
							   where id_sppd = "'.$id.'"
							   ORDER BY status_pelaksana DESC')->result();
		$data['ketua_plk']	 = $this->mcrud->getDataKetuaPelaksanaSppd($id);
		$data['plk_tgs']	 = $this->mcrud->getDataPelaksanaSppd($id);
		$data['lokasi']		 = $this->mcrud->getDataLokasi($id);
								
		$this->template->load('template', 'skpd/bbm',$data);
    }
	
	function update_bbm()
    {
		$no_skpd 	= $this->input->post('no_skpd');
		$tgl_skpd 	= $this->input->post('tgl_skpd');
		$uang_bbm 	= $this->input->post('uang_bbm');
		$jenis_biaya = $this->input->post('jenis_biaya');
		$sts_tagihan = $this->input->post('sts_tagihan');
		$id_skpd 	= $this->input->post('id_skpd');
		$id_sppd 	= $this->input->post('id_sppd');
		
		$tgl 		= trim(substr($this->input->post('tgl_skpd'),6,4))."-".trim(substr($this->input->post('tgl_skpd'),3,2))."-".trim(substr($this->input->post('tgl_skpd'),0,2));
		
        $chekid =  $this->db->get_where("tb_bbm",array("id_skpd"=>$id_skpd));
		
        if($chekid->num_rows()>0)
        {
			$this->mcrud->manualquery('UPDATE tb_bbm set uang_bbm="'.$uang_bbm.'", jenis_biaya="'.$jenis_biaya.'", sts_tagihan="'.$sts_tagihan.'" WHERE id_sppd ="'.$id_sppd.'"');
        }
		else {
			
            $data       =   array(  'no_skpd'=>$this->input->post('no_skpd'),
                                    'tgl_skpd'=>$tgl,
									'uang_bbm'=>$this->input->post('uang_bbm'),
									'jenis_biaya'=>$this->input->post('jenis_biaya'),
									'sts_tagihan'=>$this->input->post('sts_tagihan'),
									'id_skpd'=>$this->input->post('id_skpd'),
									'id_sppd'=>$this->input->post('id_sppd'));
            $updatesppd = $this->mcrud->insert("tb_bbm",$data, "id_skpd",$id_skpd);
		}
        redirect($this->uri->segment(1));
    }
	
	function approve_koreksi()
    {
		date_default_timezone_set("Asia/Bangkok");
		$data['title']   = $this->title;
		$data['desc']    = "";
		
		$time_now 		 = date("d-m-Y");
		$bln	 		 = date("m");
		$thn	 		 = date("Y");
		
		//$attr_skpd		 = " / 11030 / ".$bln." / ".$thn;
		$id          	 = $this->input->post('id_sppd');
		$dasar         	 = $this->input->post('dasar');
		$durasi        	 = $this->input->post('durasi');
		$perlengkapan	 = $this->input->post('perlengkapan');
		$ket_lain		 = $this->input->post('ket_lain');
		$moda_angkutan	 = $this->input->post('moda_angkutan');
		$jenis_biaya	 = $this->input->post('jenis_biaya');
		
		// PERHITUNGAN BBM =======================================================================================================
		if ($jenis_biaya == "dalam_kota"){
			$jumlah_km		 = 0;
		} else {
			$jumlah_km		 = $this->input->post('jumlah_km');
		}
		
		$jenis_bbm		 = $this->input->post('jenis_bbm');
		
		$harian_bbm		 = $this->db->query("select harian_bbm from tb_setting")->row()->harian_bbm;
		$perkalian_bbm	 = $this->db->query("select perkalian_bbm from tb_setting")->row()->perkalian_bbm;
		$harga_bbm		 = $this->db->query("select perliter from tb_bahanbakar where jenis_bbm = '$jenis_bbm'")->row()->perliter;	
		
		$hasil_km 		 = $jumlah_km * $perkalian_bbm;
		$jml_harian_bbm  = $harian_bbm * $durasi;
		$jml_bbm		 = ($hasil_km+$jml_harian_bbm) * $harga_bbm;
		// =======================================================================================================================
		
		// AMBIL DATA PELAKSANA ==================================================================================================
		$get_pelaksana_skpd = $this->db->query("select a.id_pelaksana, a.noreg, a.nama_pelaksana, a.status_pelaksana, a.id_sppd, a.jabatan,
												b.golongan, b.pajak, 
												c.dalam_kota, c.raskin, c.management_reg, c.management_diklat, c.spi, c.u_hotel, c.u_taxi
												from tb_pelaksana a inner join tb_pegawai b
												on a.noreg = b.noreg inner join tb_golongan c
												c.jenjang = b.jenjang
												where a.id_sppd = '$id'")->result();
		// =======================================================================================================================
		
		foreach($get_pelaksana_skpd as $row){
			
			// UANG REPRES =======================================================================================================
			if ($row->jabatan=="Kepala" or $row->jabatan=="Wakil Kepala"){
				$uang_repres = $this->db->query("select u_repres from tb_repres")->row()->u_repres*$durasi;
			} else {
				$uang_repres = 0;
			}
			// ===================================================================================================================
			
			// JENIS BIAYA =======================================================================================================
			if($jenis_biaya=="darat_hotel"){				
				$harian			= $row->raskin;
				$uang_hotel 	= $row->u_hotel*($durasi-1);
				$uang_taxi 		= 0;
				$upesawat_b 	= 0;
				$upesawat_p 	= 0;
				$ukereta_b 		= $this->input->post('ukereta_b');
				$ukereta_p 		= $this->input->post('ukereta_p');
				$utravel_b		= $this->input->post('utravel_b');
				$utravel_p		= $this->input->post('utravel_p');
			} elseif ($jenis_biaya=="darat_non_hotel" or $jenis_biaya=="monev_ada" or $jenis_biaya=="monev_kualitas"){
				$harian 		= $row->management_reg;
				$uang_hotel 	= 0;	
				$uang_taxi 		= 0;
				$upesawat_b 	= 0;
				$upesawat_p 	= 0;
				$ukereta_b 		= $this->input->post('ukereta_b');
				$ukereta_p 		= $this->input->post('ukereta_p');
				$utravel_b		= $this->input->post('utravel_b');
				$utravel_p		= $this->input->post('utravel_p');
			} elseif ($jenis_biaya=="monev_raskin" or $jenis_biaya=="verik_raskin"){
				$harian 		= $row->raskin;
				$uang_hotel 	= 0;
				$uang_taxi 		= 0;
				$upesawat_b 	= 0;
				$upesawat_p 	= 0;
				$ukereta_b 		= $this->input->post('ukereta_b');
				$ukereta_p 		= $this->input->post('ukereta_p');
				$utravel_b		= $this->input->post('utravel_b');
				$utravel_p		= $this->input->post('utravel_p');
			} elseif ($jenis_biaya=="dalam_kota"){
				$harian 		= $row->dalam_kota;
				$uang_hotel 	= 0;
				$uang_taxi 		= 0;
				$upesawat_b 	= 0;
				$upesawat_p 	= 0;
				$ukereta_b 		= 0;
				$ukereta_p 		= 0;
				$utravel_b		= 0;
				$utravel_p		= 0;
			} elseif ($jenis_biaya=="spi"){
				$harian 		= $row->spi;
				$uang_hotel 	= 0;
				$uang_taxi 		= 0;
				$upesawat_b 	= 0;
				$upesawat_p 	= 0;
				$ukereta_b 		= 0;
				$ukereta_p 		= 0;
				$utravel_b		= 0;
				$utravel_p		= 0;
			} elseif ($jenis_biaya=="pswt_krywn_hotel"){
				$harian 		= $row->management_diklat;
				$uang_hotel 	= $row->u_hotel*($durasi-1);
				$uang_taxi 		= $row->u_taxi;
				$upesawat_b 	= $this->input->post('upesawat_b');
				$upesawat_p		= $this->input->post('upesawat_p');
				$ukereta_b 		= 0;
				$ukereta_p 		= 0;
				$utravel_b		= 0;
				$utravel_p		= 0;
			} elseif ($jenis_biaya=="pswt_krywn_non_hotel"){
				$harian 		= $row->management_diklat;
				$uang_hotel 	= 0;
				$uang_taxi 		= $row->u_taxi;
				$upesawat_b 	= $this->input->post('upesawat_b');
				$upesawat_p		= $this->input->post('upesawat_p');
				$ukereta_b 		= 0;
				$ukereta_p 		= 0;
				$utravel_b		= 0;
				$utravel_p		= 0;
			} elseif ($jenis_biaya=="pswt_ka_waka_hotel"){
				$harian 		= $row->management_diklat;
				$uang_hotel 	= $row->u_hotel*($durasi-1);
				$uang_taxi 		= $row->u_taxi;
				$upesawat_b 	= $this->input->post('upesawat_b');
				$upesawat_p		= $this->input->post('upesawat_p');
				$ukereta_b 		= 0;
				$ukereta_p 		= 0;
				$utravel_b		= 0;
				$utravel_p		= 0;
			} elseif ($jenis_biaya=="pswt_ka_waka_non_hotel"){
				$harian 		= $row->management_diklat;
				$uang_hotel 	= 0;
				$uang_taxi 		= $row->u_taxi;
				$upesawat_b 	= $this->input->post('upesawat_b');
				$upesawat_p		= $this->input->post('upesawat_p');
				$ukereta_b 		= 0;
				$ukereta_p 		= 0;
				$utravel_b		= 0;
				$utravel_p		= 0;
			} else {
				$harian 		= $row->raskin;
				$uang_hotel 	= 0;
				$uang_taxi 		= 0;
				$upesawat_b 	= 0;
				$upesawat_p 	= 0;
				$ukereta_b 		= 0;
				$ukereta_p 		= 0;
				$utravel_b		= 0;
				$utravel_p		= 0;
			}
			// ===================================================================================================================
			
			// PERHITUNGAN UANG HARIAN, PAJAK, JUMLAH, JUMLAH DITERIMA ===========================================================
			$id_pelaksana 		= $row->id_pelaksana;
			$pph 				= $row->pajak;
			
			$uangharian 		= $harian*$durasi;
			$jumlah 			= $uangharian+$uang_hotel+$uang_repres+$uang_taxi+$upesawat_b+$ukereta_b+$utravel_b;
			
			$pajak 				= ($jumlah*$pph)/100;
			
			if ($jenis_biaya=="pswt_krywn_hotel" or $jenis_biaya=="pswt_krywn_non_hotel" or $jenis_biaya=="pswt_ka_waka_hotel" or $jenis_biaya=="pswt_ka_waka_non_hotel"){
				$total_pesawat 	= $jumlah + $upesawat_p;
				$jmlhditerima 	= $jumlah - $pajak + $upesawat_p;
			} else {
				$total_pesawat 	= 0;
				$jmlhditerima 	= $jumlah - $pajak ;
			}
			// ===================================================================================================================
			
			// UPDATE TABLE PELAKSANA ============================================================================================
			$update_biaya = $this->db->query("UPDATE tb_pelaksana SET  
											  uang_harian='$uangharian', uang_hotel='$uang_hotel', uang_repres='$uang_repres',
											  uang_taxi='$uang_taxi', uang_pesawat_b='$upesawat_b',
											  jumlah='$jumlah', pph='$pph', potongan='$pajak', 
											  uang_pesawat_p='$upesawat_p', uang_kereta_b='$ukereta_b', uang_kereta_p='$ukereta_p',
											  uang_travel_b='$utravel_b', uang_travel_p='$utravel_p',
											  jumlah_diterima='$jmlhditerima', jumlah_diterima_pswt='$total_pesawat'
											  where id_pelaksana = '$id_pelaksana'");
			// ===================================================================================================================
		}
		
		// AMBIL DATA PELAKSANA AKHIR UNTUK UPDATE BBM ===========================================================================
		$last_id_pelaksana 	= $this->db->query("select max(id_pelaksana) as id_pelaksana from tb_pelaksana where id_sppd = '$id'")->row()->id_pelaksana;
		
		$last_pelaksana		= $this->db->query("select * from tb_pelaksana where id_pelaksana = '$last_id_pelaksana'")->result();
		
		foreach($last_pelaksana as $lp){
			$last_jumlah		= $lp->uang_harian+$lp->uang_hotel+$jml_bbm+$uang_repres+$lp->uang_taxi+$lp->uang_pesawat_b;
			$last_pajak			= ($last_jumlah*$lp->pph)/100;
			if ($jenis_biaya=="pswt_krywn_hotel" or $jenis_biaya=="pswt_krywn_non_hotel" or $jenis_biaya=="pswt_ka_waka_hotel" or $jenis_biaya=="pswt_ka_waka_non_hotel"){
				$last_jmlditerima 	= $last_jumlah - $last_pajak + $lp->uang_pesawat_p;
			} else {
				$last_jmlditerima 	= $last_jumlah - $last_pajak;
			}
			
			$update_bbm = $this->db->query("UPDATE tb_pelaksana SET 
											uang_bbm='$jml_bbm', uang_repres='$uang_repres', jumlah='$last_jumlah', potongan='$last_pajak', 
											jumlah_diterima='$last_jmlditerima', uang_taxi='$uang_taxi'
											where id_pelaksana = '$last_id_pelaksana'");
		}
		// =======================================================================================================================
		
		// AMBIL DATA NOMOR SKPD =================================================================================================
		$last_no_skpd 	 = $this->db->query("select max(no_skpd) as no_skpd from tb_skpd")->row()->no_skpd;
		
		if($last_no_skpd == NULL or $last_no_skpd == 0) {
			$no_skpd = 1;
		} else {
			$no_skpd = $last_no_skpd + 1;
		}
		// =======================================================================================================================
		
		// INSERT TABLE SKPD & UPDATE STATUS SPPD ================================================================================
		$this->mcrud->manualQuery('UPDATE tb_skpd set jenis_biaya="'.$jenis_biaya.'", angkutan="'.$moda_angkutan.'", dasar="'.$dasar.'",
								   perlengkapan="'.$perlengkapan.'", ket_lain="'.$ket_lain.'", jarak="'.$jumlah_km.'", hasil_km="'.$hasil_km.'",
								   jenis_bbm="'.$jenis_bbm.'", harga_bbm="'.$harga_bbm.'", harian_bbm="'.$jml_harian_bbm.'", jml_bbm="'.$jml_bbm.'"
								   where id_sppd = "'.$id.'"
								 ');
		/*
		$this->mcrud->manualQuery('INSERT INTO tb_skpd (
								   no_skpd, tgl_skpd, attr_skpd, jenis_biaya, id_sppd, angkutan, dasar, perlengkapan, ket_lain, jarak,
								   hasil_km, jenis_bbm, harga_bbm, harian_bbm, jml_bbm, sts_skpd) 
								   values (
								   "'.$no_skpd.'","'.$time_now.'","'.$attr_skpd.'","'.$jenis_biaya.'","'.$id.'","'.$moda_angkutan.'","'.$dasar.'",
								   "'.$perlengkapan.'","'.$ket_lain.'","'.$jumlah_km.'","'.$hasil_km.'","'.$jenis_bbm.'","'.$harga_bbm.'",
								   "'.$jml_harian_bbm.'","'.$jml_bbm.'","1")');
								   
		$this->db->query("UPDATE tb_sppd SET sts='1' where id_sppd = '$id'");
		*/
		// =======================================================================================================================
		redirect($this->uri->segment(1));
    }
	
	function tampilkan_jab1()
    {
        $nama_pegawai  =   $_GET['nama_pegawai'];
        $data   = 	$this->db->get_where('tb_pegawai',array('nama_pegawai'=>$nama_pegawai))->result();
        foreach ($data as $r)
        {
            echo "<option value='$r->jabatan'>".  $r->jabatan."</option>";
        }
    }
	
	function lihat_pelaksana()
    {
		$data['title']  = $this->title;
		$data['desc']   = "";
		$id             = $this->uri->segment(3);
		$query			=  "select 
							id_pelaksana, nama_pelaksana, noreg, gol, jabatan, unit_kerja, status_pelaksana
							from tb_pelaksana 
							where id_sppd = '$id'
							ORDER BY status_pelaksana DESC";
		$data['record'] = $this->db->query($query)->result();
		$this->template->load('template', $this->folder.'/lihat_pelaksana',$data);
    }
	
	function cetak_skpd(){
		
		$id['id_sppd'] = $this->uri->segment(3);
		$tglsppd = $this->uri->segment(4);
		//echo '<script type="text/javascript">alert("' . $id['id_sppd'] . '")</script>';
		$filename = "SKPD_".$id['id_sppd']."_".$tglsppd;
		//echo '<script type="text/javascript">alert("' . $id['id_sppd']. '")</script>';
		
		$data = array(
			'get_data_sppd'=>$this->mcrud->manualquery('select * from tb_sppd inner join tb_skpd on tb_skpd.id_sppd = tb_sppd.id_sppd where tb_sppd.id_sppd ="'.$id['id_sppd'].'" and tb_sppd.sts=1')->result(),			
			'get_ketua_pelaksana_sppd'=>$this->mcrud->getDataKetuaPelaksanaSppd($id['id_sppd']),
			'get_pelaksana_sppd'=>$this->mcrud->getDataPelaksanaSppd($id['id_sppd']),
			'get_pejabat_ttd'=>$this->mcrud->manualquery('select * from tb_pejabat_ttd')->result(),
		);

		$this->load->view($this->folder.'/cetak_skpd',$data);
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
	
	function cetak_rekap_biaya_non_km(){
		
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
			$this->load->view($this->folder.'/cetak_rekap_biaya_non_km',$data);
		//}
		//$HTML=$this->load->view($this->folder.'/test',$data,true);
		//$this->pdf->pdf_create($HTML,$filename,'A4','landscape');//render atau membuat pdf dari html diatas
	}
	
	function cetak_bon(){
		
		$id['id_sppd'] = $this->uri->segment(3);
		$tglsppd = $this->uri->segment(4);
		$jenisbiaya = $this->uri->segment(5);
		$filename = $id['id_sppd']."_BIAYA_SKPD_".$tglsppd;
		
		$data = array(
			'get_data_sppd'=>$this->mcrud->manualquery('select * from tb_sppd inner join tb_skpd on tb_skpd.id_sppd = tb_sppd.id_sppd where tb_sppd.id_sppd ="'.$id['id_sppd'].'" and tb_sppd.sts=1')->result(),
			'get_ketua_pelaksana_sppd'=>$this->mcrud->getDataKetuaPelaksanaSppd($id['id_sppd']),
			'get_pelaksana_sppd'=>$this->mcrud->getDataPelaksanaSppd($id['id_sppd']),
			'get_pelaksana'=>$this->mcrud->manualquery('select * from tb_pelaksana where id_sppd ="'.$id['id_sppd'].'" ORDER BY status_pelaksana DESC')->result(),
			'get_sum_biaya'=>$this->mcrud->getsumBiaya($id['id_sppd']),
			'get_pejabat_ttd'=>$this->mcrud->manualquery('select * from tb_pejabat_ttd')->result(),
		);
		
		$this->load->view($this->folder.'/cetak_bon',$data);
	}
	
}