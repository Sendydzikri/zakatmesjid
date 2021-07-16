<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kelolaamilin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('cart');
		$this->load->model('m_login');
		$this->load->model('Kelolaamilin_model');
	}

	
	public function index()
	{
	$ambil_akun = $this->m_login->ambil_user($this->session->userdata('nama_amilin')); //menampilkan session login
		$data = array(
			'amilin'	=> $ambil_akun,
		);

		$data['title'] = "Kelolaamilin";
		$table = "amilin";
		$content = "amilin";
	
		$data['data_user'] = $this->Kelolaamilin_model->get($table);
		$data['judule'] = "KELOLA AMILIN";
		$this->template->output($data, $content);
	}
	public function tambahamilin()
	{
	$ambil_akun = $this->m_login->ambil_user($this->session->userdata('nama_amilin')); //menampilkan session login
		$data = array(
			'amilin'	=> $ambil_akun,
		);
		$data['title'] = "Tambah amilin";
		$content = "amilin/Tambah_amilin";
		$data['judule'] = "TAMBAH AMILIN";
		$data['id'] = $this->m_login->getIDOtomatis();
		$this->template->output($data, $content);
	}

	function tambahSubmit()
	{
		$table = "amilin";
		$data = array(
			'no' =>  $this->input->post('no'),
			'nama_amilin' => $this->input->post('nama_amilin'), 
			'status' => $this->input->post('status'),
			
			//'total_simpan2' => $this->set_pinjam_m->insert($this->input->post ('total_simpan')),
			);
		$this->Kelolaamilin_model->addData($table, $data);
		redirect('Kelolaamilin/index','refresh');
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