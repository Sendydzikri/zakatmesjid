<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class amilin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('cart');
		$this->load->model('m_login');
		$this->load->model('amilin_model');
		
	}
	private function validate() {			
 //            // $this->form_validation->set_rules('parent_id_siswa', 'Men siswa Id', 'trim|max_length[10]|integer');
		$this->form_validation->set_rules('nama_amilin', 'nama amilin', 'trim|required');

       return $this->form_validation->run();
   }
	
	public function index()
	{
	$ambil_akun = $this->m_login->ambil_user($this->session->userdata('nama')); //menampilkan session login
		$data = array(
			'amilin'	=> $ambil_akun,
		);
		$data['title'] = "amilin";
		$table = "amilin";
		$content = "amilin";
		$data['data_amilin'] = $this->amilin_model->get($table);
		$data['judule'] = "KELOLA AMILIN";
		$this->template->output($data, $content);
	}
	
	public function tambahamilin()
	{
	$ambil_akun = $this->m_login->ambil_user($this->session->userdata('nama')); //menampilkan session login
		$data = array(
			'amilin'	=> $ambil_akun,
		);
		$data['title'] = "Tambah Amilin";
		$content = "amilin/Tambah_amilin";
		$data['judule'] = "TAMBAH Amilin";
		$this->template->output($data, $content);
	}

	function tambahSubmit()
	{
		$table = "amilin";
		$data = array(
			// 'no' =>  $this->input->post('no'),
			'nama_amilin' => $this->input->post('nama_amilin'), 
			'status' => $this->input->post('status'), 
			// 'satuanbarang' => $this->input->post('satuanbarang'), 
			// 'harga_beli' => $this->input->post('harga_beli'),
			// 'harga_jual' => $this->input->post('harga_jual'),
			// 'stok' => $this->input->post('stok'),
			
			//'total_simpan2' => $this->set_pinjam_m->insert($this->input->post ('total_simpan')),
			);
		$this->amilin_model->addData($table, $data);
		redirect('amilin/index','refresh');
	}
	function updateamilin($nama_amilin)
	{
		$table="amilin";
		$condition['nama_amilin'] = $nama_amilin;

		$data['update'] = $this->amilin_model->getData($table, $condition);

		$data['title'] = "Update Amilin";
		$content = "amilin/edit_amilin";
		$data['judule'] = "EDIT AMILIN";
		$this->template->output($data, $content);
	}

	function updateSubmit()
	{
		$table = "amilin";
		$condition['nama_amilin'] = $this->input->post('nama_amilin');
		$data = array(
			'nama_amilin' => $this->input->post('nama_amilin'),
			'status' => $this->input->post('status'), 
		);
		
		$this->amilin_model->updateData($table, $data, $condition);
		redirect('amilin');
	}

	function delete($nama_amilin)
	{
		$table = "amilin";
		$condition['nama_amilin'] = $nama_amilin;
		$this->amilin_model->deleteData($table, $condition);
		redirect('amilin');
	}
	
    
}

/* End of file KelolaUser.php */
/* Location: ./application/controllers/KelolaUser.php */