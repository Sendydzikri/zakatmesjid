<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class alat extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('cart');
		$this->load->model('m_login');
		$this->load->model('barang_model');
		
	}

	
	public function index()
	{
	$ambil_akun = $this->m_login->ambil_user($this->session->userdata('nama')); //menampilkan session login
		$data = array(
			'user'	=> $ambil_akun,
		);
		$data['title'] = "alat";
		$table = "barang";
		$content = "barang";
		$data['data_barang'] = $this->barang_model->get($table);
		$data['judule'] = "KELOLA MAKO";
		$this->template->output($data, $content);
	}
	public function tambahalat()
	{
	$ambil_akun = $this->m_login->ambil_user($this->session->userdata('nama')); //menampilkan session login
		$data = array(
			'user'	=> $ambil_akun,
		);
		$data['title'] = "Tambah Mako";
		$content = "alat/Tambah_Alat";
		$data['judule'] = "TAMBAH MAKO";
		$this->template->output($data, $content);
	}

	function tambahSubmit()
	{
		$table = "barang";
		$data = array(
			'id_barang' =>  $this->input->post('id_barang'),
			'nama_barang' => $this->input->post('nama_barang'), 
			'jenisbarang' => $this->input->post('jenisbarang'), 
			'satuanbarang' => $this->input->post('satuanbarang'), 
			'harga_beli' => $this->input->post('harga_beli'),
			'harga_jual' => $this->input->post('harga_jual'),
			'stok' => $this->input->post('stok'),
			
			//'total_simpan2' => $this->set_pinjam_m->insert($this->input->post ('total_simpan')),
			);
		$this->barang_model->addData($table, $data);
		redirect('alat/index','refresh');
	}
	function updateAlat($id_anggota)
	{
		$table="barang";
		$condition['id_barang'] = $id_anggota;

		$data['update'] = $this->barang_model->getData($table, $condition);

		$data['title'] = "Update Mako";
		$content = "alat/edit_alat";
		$data['judule'] = "EDIT MAKO";
		$this->template->output($data, $content);
	}

	function updateSubmit()
	{
		$table = "barang";
		$condition['id_barang'] = $this->input->post('id_barang');
		$data = array(
			'id_barang' => $this->input->post('id_barang'),
			'nama_barang' => $this->input->post('nama_barang'), 
			'jenisbarang' => $this->input->post('jenisbarang'), 
			'satuanbarang' => $this->input->post('satuanbarang'),
			'harga_beli' => $this->input->post('harga_beli'), 
			'harga_jual' => $this->input->post('harga_jual'), 
			'stok' => $this->input->post('stok'), 
		);
		
		$this->barang_model->updateData($table, $data, $condition);
		redirect('alat');
	}

	function delete($id_user)
	{
		$table = "barang";
		$condition['id_barang'] = $id_user;
		$this->barang_model->deleteData($table, $condition);
		redirect('alat');
	}
	
    
}

/* End of file KelolaUser.php */
/* Location: ./application/controllers/KelolaUser.php */