<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class KelolaUser extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('cart');
		$this->load->model('m_login');
		$this->load->model('KelolaUser_model');
	}

	
	public function index()
	{
	$ambil_akun = $this->m_login->ambil_user($this->session->userdata('nama')); //menampilkan session login
		$data = array(
			'user'	=> $ambil_akun,
		);

		$data['title'] = "KelolaUser";
		$table = "user";
		$content = "user";
	
		$data['data_user'] = $this->KelolaUser_model->get($table);
		$data['judule'] = "KELOLA USER";
		$this->template->output($data, $content);
	}
	public function tambahUser()
	{
	$ambil_akun = $this->m_login->ambil_user($this->session->userdata('nama')); //menampilkan session login
		$data = array(
			'user'	=> $ambil_akun,
		);
		$data['title'] = "Tambah user";
		$content = "user/Tambah_user";
		$data['judule'] = "TAMBAH USER";
		$data['id'] = $this->m_login->getIDOtomatis();
		$this->template->output($data, $content);
	}

	function tambahSubmit()
	{
		$table = "user";
		$level = $this->input->post('level');
		$data = array(
			'id_user' => $this->input->post('id'), 
			'nama' => $this->input->post('nama'), 
			'username' => $this->input->post('username'), 
			'password' => md5($this->input->post('password')), 
			'level' => $level,
			);
		$this->KelolaUser_model->addData($table, $data);
		if($level=='anggota'){
			$data_ = array(
				'id_anggota' => $this->input->post('id'), 
				'nama_anggota' => $this->input->post('nama'),
				'status' => 'aktif'			
			);
		   $this->KelolaUser_model->addData('anggota', $data_);
	    }
		redirect('kelolaUser/index','refresh');
	}
	function updateBarang($id_user)
	{
		$table="user";
		$condition['id_user'] = $id_user;

		$data['update'] = $this->KelolaUser_model->getData($table, $condition);

		$data['title'] = "Update user";
		$content = "user/edit_user";
		$data['judule'] = "EDIT USER";
		$this->template->output($data, $content);
	}

	function updateSubmit()
	{
		$table = "user";
		$condition['id_user'] = $this->input->post('id_user');
		$data = array(
			'nama' => $this->input->post('nama'), 
			'username' => $this->input->post('username'), 
			'level' => $this->input->post('level'), 
		);
		$this->KelolaUser_model->updateData($table, $data, $condition);
		redirect('KelolaUser');
	}

	function delete($id_user)
	{
		$table = "user";
		$condition['id_user'] = $id_user;
		$this->KelolaUser_model->deleteData($table, $condition);
		redirect('KelolaUser');
	}
	
    
}

/* End of file KelolaUser.php */
/* Location: ./application/controllers/KelolaUser.php */