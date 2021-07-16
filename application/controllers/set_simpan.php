<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class set_simpan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('cart');
		$this->load->model('m_login');
		$this->load->model('set_simpan_m');
	}

	
	public function index()
	{
	$ambil_akun = $this->m_login->ambil_user($this->session->userdata('nama')); //menampilkan session login
		$data = array(
			'user'	=> $ambil_akun,
		);
		$data['title'] = "simpan";
		$data['presentase'] = "%";
		$table = "set_simpan";
		$content = "set_simpan";
		$data['data_set_sim'] = $this->set_simpan_m->get($table);
		$data['judule'] = "SETTING SIMPAN";
		$this->template->output($data, $content);
	}
	function updatesetting($id_set_simpan)
	{
		$table="set_simpan";
		$condition['id_set_simpan'] = $id_set_simpan;

		$data['update'] = $this->set_simpan_m->getData($table, $condition);

		$data['title'] = "Update setting simpan";
		$content = "setting/edit_setting_simpan";
		$data['judule'] = "Setting Simpanan";
		$this->template->output($data, $content);
	}

	function updateSubmit()
	{
		$table = "set_simpan";
		$condition['id_set_simpan'] = $this->input->post('id_set_simpan');
		$data = array(
			'nilai' => $this->input->post('nilai'),
			
		);
		$this->set_simpan_m->updateData($table, $data, $condition);
		redirect('set_simpan');
	}

	
	
    
}

/* End of file KelolaUser.php */
/* Location: ./application/controllers/KelolaUser.php */