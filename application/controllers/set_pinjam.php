<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class set_pinjam extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('cart');
		$this->load->model('m_login');
		$this->load->model('set_pinjam_m');
	}

	
	public function index()
	{
	$ambil_akun = $this->m_login->ambil_user($this->session->userdata('nama')); //menampilkan session login
		$data = array(
			'user'	=> $ambil_akun,
		);
		$data['title'] = "simpan";
		$data['presentase'] = "%";
		$table = "set_pinjam";
		$content = "set_pinjam";
		$data['data_set_sim'] = $this->set_pinjam_m->get($table);
		$data['judule'] = "SETTING PINJAMAN";
		$this->template->output($data, $content);
	}
	function updatesetting($id_set_pinjam)
	{
		$table="set_pinjam";
		$condition['id_set_pinjam'] = $id_set_pinjam;

		$data['update'] = $this->set_pinjam_m->getData($table, $condition);

		$data['title'] = "Update setting pinjam";
		$content = "setting/edit_setting_pinjam";
		$data['judule'] = "Setting Pinjaman";
		$this->template->output($data, $content);
	}

	function updateSubmit()
	{
		$table = "set_pinjam";
		$condition['id_set_pinjam'] = $this->input->post('id_set_pinjam');
		$data = array(
			'nilai' => $this->input->post('nilai'),
			
		);
		$this->set_pinjam_m->updateData($table, $data, $condition);
		redirect('set_pinjam');
	}

	
	
    
}

/* End of file KelolaUser.php */
/* Location: ./application/controllers/KelolaUser.php */