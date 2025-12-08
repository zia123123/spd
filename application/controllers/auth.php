<?php
class auth extends CI_Controller
{
    function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
    }
   
    function index()
    {
        redirect('login');
    }
    
    function login()
    {
        if(isset($_POST['submit']))
        {
			$this->form_validation->set_message('required', '%s Harus Diisi.');
			$this->form_validation->set_rules('username', 'Username','trim|required');
			$this->form_validation->set_rules('password', 'Password','trim|required');
			
            $username   =  $this->input->post('username');
            $password   =  $this->input->post('password');
            
			if ($this->form_validation->run() === FALSE) {
				$this->load->view('login');
			} else {
			
				$login=  $this->db->get_where('tb_users',array('username'=>$username,'password'=>  md5($password)));
				
				if($login->num_rows()>0)
				{
					$r=  $login->row_array();
					$data=array('id_users'=>$r['id_users'],
								'level'=>$r['level'],
								'keterangan'=>$r['keterangan'],
								'username'=>$username);
					$this->session->set_userdata($data);
					$this->mcrud->update('tb_users',array('last_login'=>  waktu()), 'username',$username);
					redirect('dashboard');
					
				}
				else
				{
					$data['message'] = '<b>Login Gagal !</b><br/>Username dan Password Anda Salah.';
					$this->load->view('login',$data);
				}
			}
        }
        else
        {
            $this->load->view('login');
        }
    }
    
    function logout()
    {
        $this->session->sess_destroy();
        redirect('auth/login');
    }
}