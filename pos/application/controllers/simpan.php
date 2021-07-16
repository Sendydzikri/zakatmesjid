<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class simpan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('cart');
		$this->load->model('m_login');
		$this->load->model('simpan_model');
		
	}

	
	public function index()
	{
	$ambil_akun = $this->m_login->ambil_user($this->session->userdata('nama')); //menampilkan session login
		$data = array(
			'user'	=> $ambil_akun,
		);
		$data['title'] = "simpan";
		$data['rupiah'] = "Rp.";
		$table = "simpan";
		$content = "simpan";
		$data['data_simpan'] = $this->simpan_model->get($table);
		$data['judule'] = "KELOLA SIMPANAN";
		$this->template->output($data, $content);
	}
	public function tambahsimpan()
	{
	$ambil_akun = $this->m_login->ambil_user($this->session->userdata('nama')); //menampilkan session login
		$data = array(
			'user'	=> $ambil_akun,
		);
		$data['title'] = "Tambah Simpanan";
		$content = "simpan/Tambah_Simpan";
		$data['judule'] = "TAMBAH SIMPANAN";
		$this->template->output($data, $content);
	}

	function tambahSubmit()
	{
		$table = "simpan";
		$data = array(
			'id_anggota' =>  $this->input->post('id_anggota'),
			'nama_anggota' => $this->input->post('nama_anggota'), 
			'tgl_simpan' => $this->input->post('tgl_simpan'), 
			'jenis_simpan' => $this->input->post('jenis_simpan'), 
			'total_simpan' => $this->input->post('total_simpan'),
			
			//'total_simpan2' => $this->set_pinjam_m->insert($this->input->post ('total_simpan')),
			);
		$this->simpan_model->addData($table, $data);
		redirect('simpan/index','refresh');
	}
	function updateSimpan($id_anggota)
	{
		$table="simpan";
		$condition['id_anggota'] = $id_anggota;

		$data['update'] = $this->simpan_model->getData($table, $condition);

		$data['title'] = "Update simpan";
		$content = "simpan/edit_simpan";
		$data['judule'] = "EDIT SIMPANAN";
		$this->template->output($data, $content);
	}

	function updateSubmit()
	{
		$table = "simpan";
		$condition['id_anggota'] = $this->input->post('id_anggota');
		$data = array(
			'id_anggota' => $this->input->post('id_anggota'),
			'nama_anggota' => $this->input->post('nama_anggota'), 
			'tgl_simpan' => $this->input->post('tgl_simpan'), 
			'jenis_simpan' => $this->input->post('jenis_simpan'),
			'total_simpan' => $this->input->post('total_simpan'), 
		);
		$this->simpan_model->updateData($table, $data, $condition);
		redirect('simpan');
	}

	function delete($id_user)
	{
		$table = "simpan";
		$condition['id_anggota'] = $id_user;
		$this->simpan_model->deleteData($table, $condition);
		redirect('simpan');
	}
	
    
}

/* End of file KelolaUser.php */
/* Location: ./application/controllers/KelolaUser.php */