<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class login extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_login');
    }
    function index()
    {
        $session = $this->session->userdata('isLogin1'); 
        if($session == FALSE) 
        {
			$sub_data['info']=$this->session->userdata('info');
			$this->load->view('v_login', $sub_data);
			$this->session->unset_userdata('info');     
        }else{
            redirect('anggota');
        }
    }
    function do_login()
    {
        $username = $this->input->post("username");
        $password = $this->input->post("password");
        
        $cek = $this->m_login->cek_user($username,md5($password));
        if(count($cek) == 1){
            foreach ($cek as $cek) {
                $level = $cek['level'];
				$nama = $cek['nama'];
            }
            $this->session->set_userdata(array(
                'isLogin1'   => TRUE, //set data telah login
                'username'  => $username, //set session username
				'nama'  => $nama,
                'lvl'      => $level,
            )); 
            if($level == 'user'){
               redirect('anggota','refresh');
            }elseif ($level == 'admin') {
                redirect('kelolauser','refresh');
            }
            else{
                redirect('pendaftaran_anggota','refresh');
            }
        }else{
			$info='<p class="text-red">Maaf, username atau password yang Anda masukkan salah. Silakan coba lagi.</p>';
			$this->session->set_userdata('info',$info);

			redirect('login');
        }
    }
	
	function logout()
	{
		$this->session->sess_destroy();
		redirect('login','refresh');
	}
}