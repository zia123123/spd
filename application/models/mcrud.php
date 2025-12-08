<?php
/**
 * Description of mcrud
 * class ini digunakan untuk melakukan manipulasi  data sederhana
 * dengan parameter yang dikirim dari controller.
 * @author nuris akbar
 */
class mcrud extends CI_Model{
   
    // Menampilkan data dari sebuah tabel dengan pagination.
    public function getList($tables,$limit,$page,$by,$sort){
        $this->db->order_by($by,$sort);
        $this->db->limit($limit,$page);
        return $this->db->get($tables);
    }
    
    // menampilkan semua data dari sebuah tabel.
    public function getAll($tables){
    
        return $this->db->get($tables);
    }
    
    // menghitun jumlah record dari sebuah tabel.
    public function countAll($tables){
        return $this->db->get($tables)->num_rows();
    }
    
    // menghitun jumlah record dari sebuah query.
    public function countQuery($query){
        return $this->db->get($query)->num_rows();
    }
    
    //enampilkan satu record brdasarkan parameter.
    public function kondisi($tables,$where)
    {
        $this->db->where($where);
        return $this->db->get($tables);
    }
    //menampilkan satu record brdasarkan parameter.
    public  function getByID($tables,$pk,$id){
        $this->db->where($pk,$id);
        return $this->db->get($tables);
    }
    
    // Menampilkan data dari sebuah query dengan pagination.
    public function queryList($query,$limit,$page){
       
        return $this->db->query($query." limit ".$page.",".$limit."");
    }
    
    public function queryBiasa($query,$by,$sort){
       // $this->db->order_by($by,$sort);
        return $this->db->query($query);
    }
	public function manualquery($query){
       // $this->db->order_by($by,$sort);
        return $this->db->query($query);
    }
    // memasukan data ke database.
    public function insert($tables,$data){
        $this->db->insert($tables,$data);
    }
    
    // update data kedalalam sebuah tabel
    public function update($tables,$data,$pk,$id){
        $this->db->where($pk,$id);
        $this->db->update($tables,$data);
    }
    
    // menghapus data dari sebuah tabel
    public function delete($tables,$pk,$id){
        $this->db->where($pk,$id);
        $this->db->delete($tables);
    }
    
	function getDataKetuaPelaksanaSppd($id){
        return $this->db->query("select 
				a.nama_pelaksana, a.noreg, a.nip, a.jenjang, a.gol, a.jabatan, a.unit_kerja, a.status_pelaksana,
				a.uang_harian,a.uang_bbm,a.uang_tol,a.uang_repres,a.uang_hotel,a.uang_taxi,a.uang_pesawat_b,a.uang_pesawat_p,
				a.uang_kereta_b, a.uang_kereta_p, a.uang_travel_b, a.uang_travel_p,
				a.jumlah,a.pph,a.potongan,a.jumlah_diterima, a.total, a.penanda
				from tb_pelaksana a 
				where a.id_sppd = '$id' and a.status_pelaksana = 1
				ORDER BY a.status_pelaksana DESC")->result();
    }
	function getDataPelaksanaSppd($id){
        return $this->db->query("select 
				a.nama_pelaksana, a.noreg, a.nip, a.jenjang, a.gol, a.jabatan, a.unit_kerja, a.status_pelaksana,
				a.uang_harian,a.uang_bbm,a.uang_tol,a.uang_repres,a.uang_hotel,a.uang_taxi,a.uang_pesawat_b,a.uang_pesawat_p,
				a.uang_kereta_b, a.uang_kereta_p, a.uang_travel_b, a.uang_travel_p,
				a.jumlah,a.pph,a.potongan,a.jumlah_diterima, a.total, a.penanda
				from tb_pelaksana a 
				where a.id_sppd = '$id' and a.status_pelaksana = 0
				ORDER BY a.status_pelaksana DESC")->result();
    }
	function getsumBiaya($id){
        return $this->db->query("select sum(uang_harian) as jml_uharian, sum(uang_bbm) as jml_ubbm, sum(uang_tol) as jml_utol,
				sum(uang_repres) as jml_urepres, sum(uang_hotel) as jml_uhotel,
				sum(uang_taxi) as jml_utaxi, sum(uang_pesawat_b) as jml_upesawat_b,
				sum(uang_pesawat_p) as jml_upesawat_p,
				sum(uang_kereta_b) as jml_ukereta_b, sum(uang_kereta_p) as jml_ukereta_p,
				sum(uang_travel_b) as jml_utravel_b,
				sum(uang_travel_p) as jml_utravel_p, sum(jumlah) as jml_jumlah, sum(potongan) as jml_potongan,
				sum(jumlah_diterima) as jml_jumlah_diterima, sum(total) as jml_total
				from tb_pelaksana
				where id_sppd = '$id'")->result();
	}
	function getDataLokasi($id){
        return $this->db->query("select * from tb_lokasi where id_sppd = '$id'")->result();
    }
	
    function login($username,$password)
    {
       return $this->db->get_where('users',array('username'=>$username,'password'=>$password));        
    }
}

?>
