<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class pendaftaran extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('cart');
		$this->load->model('m_login');
		$this->load->model('anggota_model');
	}

	
	public function index()
	{
	$ambil_akun = $this->m_login->ambil_user($this->session->userdata('nama')); //menampilkan session login
		$data = array(
			'user'	=> $ambil_akun,
		);
		$data['title'] = "pendaftaran";
		$table = "pendaftaran";
		$content = "pendaftaran";
		$data['data_pendaftaran'] = $this->pendaftaran_model->get($table);
		$data['judule'] = "PENDAFTARAN";
		$this->template->output($data, $content);
	}
	public function tambahpendaftaran()
	{
	$ambil_akun = $this->m_login->ambil_user($this->session->userdata('nama')); //menampilkan session login
		$data = array(
			'user'	=> $ambil_akun,
		);
		$data['title'] = "Tambah Pendaftaran";
		$content = "pendaftaran/Tambah_Pendaftaran";
		$data['judule'] = "TAMBAH PENDAFTARAN";
		$this->template->output($data, $content);
	}

	function tambahSubmit()
	{
		$table = "anggota";
		$data = array(
			'nama_anggota' => $this->input->post('nama_anggota'), 
			'alamat' => $this->input->post('alamat'),
			'no_tlp' => $this->input->post('no_tlp'), 
			'persyaratan' => $this->input->post('persyaratan'), 
			
			);
		$this->anggota_model->addData($table, $data);
		redirect('pendaftaran/tambahpendaftaran','refresh');
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
		$table = "anggota";
		$condition['id_anggota'] = $id_user;
		$this->anggota_model->deleteData($table, $condition);
		redirect('anggota');
	}
	
    
}

/* End of file KelolaUser.php */
/* Location: ./application/controllers/KelolaUser.php */