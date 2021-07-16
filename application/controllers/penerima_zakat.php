<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class penerima_zakat extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('cart');
		$this->load->model('m_login');
		$this->load->model('penerima_zakat_model');
		
	}
	private function validate() {			
 //            // $this->form_validation->set_rules('parent_id_siswa', 'Men siswa Id', 'trim|max_length[10]|integer');
		$this->form_validation->set_rules('nama_amilin', 'nama amilin', 'trim|required');

       return $this->form_validation->run('nama_penerima');
   }

	
	public function index()
	{
	$ambil_akun = $this->m_login->ambil_user($this->session->userdata('nama')); //menampilkan session login
		$data = array(
			'penerima_zakat'	=> $ambil_akun,
		);
		$data['title'] = "penerima_zakat";
		$table = "penerima_zakat";
		$content = "penerima_zakat";
		$data['data_penerima_zakat'] = $this->penerima_zakat_model->get($table);
		$data['judule'] = "PENERIMA ZAKAT";
		$this->template->output($data, $content);
	}
	public function tambahpenerima()
	{
	$ambil_akun = $this->m_login->ambil_user($this->session->userdata('nama')); //menampilkan session login
		$data = array(
			'penerima_zakat'	=> $ambil_akun,
		);
		$data['title'] = "Tambah Penerima";
		$content = "penerima/Tambah_Penerima";
		$data['judule'] = "TAMBAH Penerima";
		$this->template->output($data, $content);
	}

	function tambahSubmit()
	{
		$table = "penerima_zakat";
		$data = array(
			// 'no' =>  $this->input->post('no'),
			'nama_penerima' => $this->input->post('nama_penerima'),
			'usia' => $this->input->post('usia'),
			'alamat' => $this->input->post('alamat'), 
			'status' => $this->input->post('status'), 
			// 'satuanbarang' => $this->input->post('satuanbarang'), 
			// 'harga_beli' => $this->input->post('harga_beli'),
			// 'harga_jual' => $this->input->post('harga_jual'),
			// 'stok' => $this->input->post('stok'),
			
			//'total_simpan2' => $this->set_pinjam_m->insert($this->input->post ('total_simpan')),
			);
		$this->penerima_zakat_model->addData($table, $data);
		redirect('penerima_zakat/index','refresh');
	}
	function updatepenerima($nama_penerima)
	{
		$table="penerima_zakat";
		$condition['nama_penerima'] = $nama_penerima;

		$data['update'] = $this->penerima_zakat_model->getData($table, $condition);

		$data['title'] = "Update penerima";
		$content = "penerima/edit_penerima_zakat";
		$data['judule'] = "EDIT PENERIMA";
		$this->template->output($data, $content);
	}

	function updateSubmit()
	{
		$table = "penerima_zakat";
		$condition['nama_penerima'] = $this->input->post('nama_penerima');
		$data = array(
			'nama_penerima' => $this->input->post('nama_penerima'),
			'usia' => $this->input->post('usia'),
			'alamat' => $this->input->post('alamat'),
			'status' => $this->input->post('status'), 
		);
		
		$this->penerima_zakat_model->updateData($table, $data, $condition);
		redirect('penerima_zakat');
	}

	function delete($nama_penerima)
	{
		$table = "penerima_zakat";
		$condition['nama_penerima'] = $nama_penerima;
		$this->penerima_zakat_model->deleteData($table, $condition);
		redirect('penerima_zakat');
	}
	
    
}

/* End of file KelolaUser.php */
/* Location: ./application/controllers/KelolaUser.php */