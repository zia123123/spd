<?php
class notaintern extends CI_Controller{
    
    var $folder =   "notaintern";
    var $tables =   "tb_notaintern";
    var $pk     =   "id_ni";
    var $title  =   "Nota Intern";
    
    function __construct() {
        parent::__construct();
		$this->load->helper("terbilang");
		$this->load->helper("tanggal");
	    $this->load->helper("romawi");    
		$this->load->library('pdf');
		$this->load->helper('pdf_helper');
		$this->load->library('form_validation');
    }
    
    function index()
    {

        //$query="SELECT * FROM tb_sppd where STR_TO_DATE(tgl_sppd, '%d-%m-%Y') BETWEEN '2018-06-01' and '2018-12-31' ORDER BY id_sppd desc";
		$query = "select *
				  from tb_notaintern
				  ORDER BY id_ni DESC";
		
        $data['record']=  $this->db->query($query)->result();
        $data['title']  = $this->title;
        $data['desc']    =   "";
		$this->template->load('template', $this->folder.'/view',$data);
    }
	
    function post()
    {
        if(isset($_POST['submit']))
        {
			$this->form_validation->set_message('required', '%s Harus Diisi.');
			
			date_default_timezone_set("Asia/Bangkok");
			$time_now 		 = date("d-m-Y");
			$data['tahun_ini']=date("Y");
			$data['bulan_ini']=date("m");
			$data['blnthn_ini']=date("F Y");
			$data['hari_ini']= date("d-m-Y");
			$data['no_ni'] = '';
			
			$no_ni	 		= $this->input->post('no_ni');
			$kode_ni 		= $this->input->post('kode_ni');
			$tgl_ni	 		= $this->input->post('tgl_ni');
			$kepada_nama	= $this->input->post('kepada_nama');
			$kepada_jab		= $this->input->post('kepada_jab');
			$dari_nama		= $this->input->post('dari_nama');
			$dari_jab		= $this->input->post('dari_jab');
			$perihal		= $this->input->post('perihal');
			$dasar_ni		= $this->input->post('dasar_ni');
			$isi_ni			= $this->input->post('isi_ni');
			$nominal		= $this->input->post('nominal');
			$closing		= $this->input->post('closing');
			$jenis_ni		= $this->input->post('jenis_ni');
			$status_ni		= $this->input->post('status_ni');
			$tahun_ni    	= trim(substr($this->input->post('tgl_ni'),6,10));
			
			
		
				// CEK NOMOR NI
				
				$cek_no_ni = $this->db->query("select * from tb_notaintern where no_ni = '$no_ni' and tahun_ni = '$tahun_ni'");

				if($cek_no_ni->num_rows()>0)
				{
					echo '<script type="text/javascript">alert("Input NI Gagal ! Nomor '.$nama.' sudah terpakai !");window.history.go(-1);</script>';
				}
				else
				{
					$data=array(
						'no_ni'=> $this->input->post('no_ni'),
						'kode_ni'=> $this->input->post('kode_ni'),
						'tgl_ni'=>$this->input->post('tgl_ni'),
						'kepada_nama'=> $this->input->post('kepada_nama'), 
						'kepada_jab'=>$this->input->post('kepada_jab'),
						'dari_nama'=>$this->input->post('dari_nama'),
						'dari_jab'=>$this->input->post('dari_jab'),
						'perihal'=>$this->input->post('perihal'),
						'dasar_ni'=>$this->input->post('dasar_ni'),
						'isi_ni'=>$this->input->post('isi_ni'),
						'nominal'=>str_replace(',','',$this->input->post('nominal')),
						'closing'=>$this->input->post('closing'),
						'jenis_ni'=>$this->input->post('jenis_ni'),
						'closing'=>$this->input->post('closing'),
						'status_ni'=>'1',
						'tahun_ni'=>$tahun_ni,
						
					);
					
					$insertnotaintern = $this->db->insert($this->tables,$data);
					
					redirect($this->uri->segment(1));
						
					
				}
			
        }
        else
        {
            $data['title']  = $this->title;
            $data['desc']    =   "";
			$thn	 		 = date("Y");
			$data['tahun_ini']=date("Y");
			$data['bulan_ini']=date("m");
			$data['blnthn_ini']=date("F Y");
			$data['hari_ini']= date("d-m-Y");
			$id          	 = $this->uri->segment(3);
			$data['pegawai'] = $this->mcrud->manualquery("select * from tb_pegawai order by id_pegawai asc")->result();
			$data['notaintern'] = $this->mcrud->manualquery("select * from tb_notaintern order by id_ni asc")->result();
			$data['lokasi'] = $this->mcrud->manualquery("select * from tb_tempat")->result();
			
			// AMBIL DATA NOMOR NI =================================================================================================
			$checknomor =  $this->db->get_where('tb_notaintern',array($this->pk=>$id));
			if($checknomor->num_rows()>0){
				$data['no_ni'] =  $this->db->get_where('tb_notaintern',array($this->pk=>$id))->row()->no_ni;
				$data['tgl_ni'] =  $this->db->get_where('tb_notaintern',array($this->pk=>$id))->row()->tgl_ni;
				
			} 
			else 
			{
				$last_no_ni 	 = $this->db->query("select max(no_ni) as no_ni from tb_notaintern where right(tgl_ni,4) = '$thn' ")->row()->no_ni;
				
				if($last_no_ni == NULL or $last_no_ni == 0) {
					$data['no_ni'] = 1;
				} else {
					$data['no_ni'] = $last_no_ni + 1;
				}
				
				$data['tgl_ni'] = date("d-m-Y");
				
			}
			
            $this->template->load('template', $this->folder.'/post',$data);
        }
    }
    
    
    function edit()
    {
        if(isset($_POST['submit']))
        {
            $id     	= $this->input->post('id_ni');
			$tahun_ni   = trim(substr($this->input->post('tgl_ni'),6,10));
			$data=array(
						'no_ni'=> $this->input->post('no_ni'),
						'kode_ni'=> $this->input->post('kode_ni'),
						'tgl_ni'=>$this->input->post('tgl_ni'),
						'kepada_nama'=> $this->input->post('kepada_nama'), 
						'kepada_jab'=>$this->input->post('kepada_jab'),
						'dari_nama'=>$this->input->post('dari_nama'),
						'dari_jab'=>$this->input->post('dari_jab'),
						'perihal'=>$this->input->post('perihal'),
						'dasar_ni'=>$this->input->post('dasar_ni'),
						'isi_ni'=>$this->input->post('isi_ni'),
						'nominal'=>str_replace(',','',$this->input->post('nominal')),
						'closing'=>$this->input->post('closing'),
						'jenis_ni'=>$this->input->post('jenis_ni'),
						'closing'=>$this->input->post('closing'),
						'status_ni'=>'1',
						'tahun_ni'=>$tahun_ni,	
					);
										
			$updatenotaintern = $this->mcrud->update($this->tables,$data, $this->pk,$id);	
			redirect($this->uri->segment(1));			
			
        }
        else
        {
            $data['title']  = $this->title;
            $data['desc']   = "";
            $id          	= $this->uri->segment(3);
            $data['r']   	= $this->mcrud->getByID($this->tables,  $this->pk,$id)->row_array();
			$q   			=  "select * from tb_pegawai order by nama_pegawai asc";
			$data['pegawai'] = $this->db->query($q)->result();
			
            $this->template->load('template', $this->folder.'/edit',$data);
        }
    }
    
    function delete()
    {
        $id     =  $this->uri->segment(3);
        $chekid =  $this->db->get_where($this->tables,array($this->pk=>$id));
        if($chekid->num_rows()>0)
        {
            $this->mcrud->delete($this->tables,  $this->pk,  $this->uri->segment(3));
			//$this->mcrud->manualquery('DELETE FROM tb_pelaksana WHERE id_sppd ="'.$id.'"');
			//$this->mcrud->manualquery('DELETE FROM tb_lokasi WHERE id_sppd ="'.$id.'"');
        }
		else {
			//$this->mcrud->manualquery('DELETE FROM tb_pelaksana WHERE id_sppd ="'.$id.'"');
		}
        redirect($this->uri->segment(1));
    }
	
	function tampilkan_jab1()
    {
        $nama_pegawai  =   $_GET['nama_pegawai'];
        $data   = 	$this->db->get_where('tb_pegawai',array('nama_pegawai'=>$nama_pegawai))->result();
        foreach ($data as $r)
        {
            //echo "<option value='$r->jabatan'>".  $r->jabatan."</option>";
			echo $r->jabatan;
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
	
	function cetak_ni(){
		
		$id['id_ni'] = $this->uri->segment(3);
		$tgl_ni = $this->uri->segment(4);
		$filename = "NI_".$id['id_ni']."_".$tgl_ni;
		
		$data = array(
			'get_data_notaintern'=>$this->mcrud->manualquery('select * from tb_notaintern WHERE id_ni ="'.$id['id_ni'].'"')->result(),
			'get_pejabat_ttd'=>$this->mcrud->manualquery('select * from tb_pejabat_ttd')->result(),
		);

		$this->load->view($this->folder.'/cetak_ni',$data);
	}
	
}
