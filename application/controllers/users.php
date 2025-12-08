<?php
class users extends CI_Controller{
    
    var $folder =   "users";
    var $tables =   "tb_users";
    var $pk     =   "id_users";
    var $title  =   "Users";
    function __construct() {
        parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->library('form_validation');
    }
    
    function index()
    {
        $data['title']=  $this->title;
		$data['eror']=false;
        $data['register']=false;
        $data['record']=  $this->db->get($this->tables)->result();
		$this->template->load('template', $this->folder.'/view',$data);
    }
       
    function level($level)
    {
        if($level==1)
        {
            return 'admin';
        }
        elseif($level==2)
        {
            return 'users';
        }
    }
    
    function post()
    {
        if(isset($_POST['submit']))
        {
			$this->form_validation->set_message('required', '%s Harus Diisi.');
			$this->form_validation->set_message('min_length', '%s minimal %s karakter.');
			
			$this->form_validation->set_rules('username', 'Username','trim|required|min_length[3]');
			$this->form_validation->set_rules('password', 'Password','required|min_length[5]');
			$this->form_validation->set_rules('level', 'Hak Akses','required');
			
			if ($this->form_validation->run() === FALSE) {
				$this->template->load('template', $this->folder.'/post');
			} else {
				$username  =   $this->input->post('username');
				$password  =   $this->input->post('password');
				$level     =   $this->input->post('level');
			  
				$data      =   array('username'=>$username,'password'=>md5($password),'level'=>$level);
				
				$this->db->insert($this->tables,$data);
				redirect($this->uri->segment(1));
			}
        }
        else
        {
            $data['title']=  $this->title;
            $this->template->load('template', $this->folder.'/post',$data);
        }
    }
	
    function edit()
    {
        if(isset($_POST['submit']))
        {
			$id        =   $this->input->post('id');
			
			$this->form_validation->set_message('required', '%s Harus Diisi.');
			$this->form_validation->set_message('min_length', '%s minimal %s karakter.');
			
			$this->form_validation->set_rules('username', 'Username','trim|required|min_length[3]');
			$this->form_validation->set_rules('password', 'Password','required|min_length[5]');
			$this->form_validation->set_rules('level', 'Hak Akses','required');
			
			if ($this->form_validation->run() === FALSE) {
				$data['r']   =  $this->mcrud->getByID($this->tables,  $this->pk,$id)->row_array();
				$this->template->load('template', $this->folder.'/edit',$data);
			} else {
				$username  =   $this->input->post('username');
				$password  =   $this->input->post('password');
				$level     =   $this->input->post('level');
				$data      =   array('username'=>$username,'password'=>md5($password),'level'=>$level);
				$this->mcrud->update($this->tables,$data, $this->pk,$id);
				redirect($this->uri->segment(1));
			}
        }
        else
        {
			$id          =  $this->uri->segment(3);
            $data['title']=  $this->title;
            $data['r']   =  $this->mcrud->getByID($this->tables,  $this->pk,$id)->row_array();
            $this->template->load('template', $this->folder.'/edit',$data);
        }
    }
    function delete()
    {
        $id     =  $this->uri->segment(3);
        $chekid = $this->db->get_where($this->tables,array($this->pk=>$id));
        if($chekid->num_rows()>0)
        {
            $this->mcrud->delete($this->tables,  $this->pk,  $this->uri->segment(3));
        }
        redirect($this->uri->segment(1));
    }
    
    function profile()
    {
        $id=  $this->session->userdata('id_users');
		$data['eror']=false;
        $data['register']=false;
        if(isset($_POST['submit']))
        {
            $username=  $this->input->post('username');
            $password=  $this->input->post('password');
            $data    =  array('username'=>$username,'password'=>  md5($password));
            $this->mcrud->update($this->tables,$data, $this->pk,$id);
            redirect('users/profile');
        }
        else
        {
            $data['title']=  $this->title;
            $data['r']   =  $this->mcrud->getByID($this->tables,  $this->pk,$id)->row_array();
            $this->template->load('template', $this->folder.'/profile',$data);
        }
    }
	
	function change_pass()
    {
        $id=  $this->session->userdata('id_users');
		
        if(isset($_POST['submit']))
        {
            $current_pass =  $this->input->post('current_pass');
            $new_pass     =  $this->input->post('new_pass');
			$confirm_pass =  $this->input->post('confirm_pass');
            
			$this->form_validation->set_message('required', '%s Harus Diisi.');
			$this->form_validation->set_message('min_length', '%s harus %s digit.');
			
			$this->form_validation->set_rules('current_pass', 'Password Sekarang','required|min_length[5]');
			$this->form_validation->set_rules('new_pass', 'Password Baru','required|min_length[5]');
			$this->form_validation->set_rules('confirm_pass', 'Konfirmasi Password','required|min_length[5]');
			
			if ($this->form_validation->run() === FALSE) {
				$data['title']=  $this->title;
				$data['r']   =  $this->mcrud->getByID($this->tables,  $this->pk,$id)->row_array();
				$this->template->load('template', $this->folder.'/profile',$data);
			} else {
				
				$get_current_pass = $this->db->query("select password from tb_users where id_users='$id'")->row()->password;
				
				if ($get_current_pass != md5($current_pass)){
					echo '<script type="text/javascript">alert("Password Lama tidak cocok !");</script>';
					$this->template->load('template', $this->folder.'/profile');
				} elseif ($new_pass != $confirm_pass) {
					echo '<script type="text/javascript">alert("Password Baru dan Konfirmasi Password Baru tidak cocok !");</script>';
					$this->template->load('template', $this->folder.'/profile');
				} else {
					$pass_baru = md5($new_pass);
					$this->db->query("UPDATE tb_users set PASSWORD='$pass_baru' where id_users='$id'");
					echo '<script type="text/javascript">alert("Ganti Password Sukses !");</script>';
					$this->template->load('template', $this->folder.'/profile');
				}
				
			}
			
        }
        else
        {
            $data['title']=  $this->title;
            $data['r']   =  $this->mcrud->getByID($this->tables,  $this->pk,$id)->row_array();
            $this->template->load('template', $this->folder.'/profile',$data);
        }
    }
    
    function account()
    {
        $id=  $this->session->userdata('keterangan');
        if(isset($_POST['submit']))
        {
            $nama           =   $this->input->post('nama');
            $nidn           =   $this->input->post('nidn');
            $nip            =   $this->input->post('nip');
            $tempat_lahir   =   $this->input->post('tempat_lahir');
            $tanggal_lahir  =   $this->input->post('tanggal_lahir');
            $gender         =   $this->input->post('gender');
            $agama          =   $this->input->post('agama');
            $kawin          =   $this->input->post('kawin');
            $alamat         =   $this->input->post('alamat');
            $hp             =   $this->input->post('hp');
            $email          =   $this->input->post('email');
            $data           =   array(  'nama_lengkap'=>$nama,
                                        'nidn'=>$nidn,
                                        'nip'=>$nip,
                                        'tempat_lahir'=>$tempat_lahir,
                                        'tanggal_lahir'=>$tanggal_lahir,
                                        'gender'=>$gender,
                                        'agama_id'=>$agama,
                                        'status_kawin'=>$kawin,
                                        'alamat'=>$alamat,'hp'=>$hp,
                                        'email'=>$email);
            $this->mcrud->update('app_dosen',$data, 'dosen_id',$id);
            redirect('users/account');
        }
        else
        {
            $data['title']=  $this->title;
            $data['r']   =  $this->mcrud->getByID('app_dosen',  'dosen_id',  $id)->row_array();
            $this->template->load('template', $this->folder.'/account',$data);
        }
    }
}