<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class pengajuan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('cart');
		$this->load->model('m_login');
		$this->load->model('pengajuan_model');
	}

	
	public function index()
	{
	$ambil_akun = $this->m_login->ambil_user($this->session->userdata('nama')); //menampilkan session login
		$data = array(
			'user'	=> $ambil_akun,
		);
		$data['title'] = "pengajuan";
		$table = "pengajuan";
		$content = "pengajuan";
		$data['rupiah'] = "Rp.";
		$data['data_pengajuan'] = $this->pengajuan_model->get($table);
		$data['judule'] = "KELOLA SETORAN";
		$this->template->output($data, $content);
	}
	public function notif_pengajuan()
	{
	$ambil_akun = $this->m_login->ambil_user($this->session->userdata('nama')); //menampilkan session login
		$data = array(
			'user'	=> $ambil_akun,
		);
		$data['title'] = "pengajuan";
		$table = "pengajuan";
		$content = "pengajuan/notif_pengajuan";
		$data['rupiah'] = "Rp.";
		$data['data_pengajuan'] = $this->pengajuan_model->get($table);
		$data['judule'] = "DAFTAR PENGAJUAN";
		$this->template->output($data, $content);
	}
	public function tambahpengajuan()
	{
	$ambil_akun = $this->m_login->ambil_user($this->session->userdata('nama')); //menampilkan session login
		$data = array(
			'user'	=> $ambil_akun,
		);
		$data['title'] = "Tambah pengajuan";
		$content = "pengajuan/Tambah_Pengajuan";
		$data['judule'] = "TAMBAH Pengajuan";
		$this->template->output($data, $content);
	}

	function tambahSubmit()
	{
		$table = "pengajuan";
		$data = array(
			'id_anggota' => $this->input->post('id_anggota'), 
			'nama_anggota' => $this->input->post('nama_anggota'), 
			'umur' => $this->input->post('umur'), 
			'jumlah_angsuran' => $this->input->post('jumlah_angsuran'), 
			'nominal_pinjam' => $this->input->post('nominal_pinjam'),
			);
		$this->setoran_model->addData($table, $data);
		redirect('pengajuan/index','refresh');
	}
	function updateSetor($id_anggota)
	{
		$table="pengajuan";
		$condition['id_anggota'] = $id_anggota;

		$data['update'] = $this->pengajuan_model->getData($table, $condition);

		$data['title'] = "Update Pengajuan";
		$content = "pengajuan/edit_pengajuan";
		$data['judule'] = "EDIT PENGAJUAN";
		$this->template->output($data, $content);
	}
	function updateStatus()
	{
		 $status = array(
		 	'status'=>$this->input->post('status')
		 );
		 $condition = array(
		    'id_pengajuan' => $this->input->post('id_pengajuan')
		 );
          $this->pengajuan_model->updateData("pengajuan",$status,$condition);
	}

	function updateSubmit()
	{
		$table = "pengajuan";
		$condition['id_anggota'] = $this->input->post('id_anggota');
		$data = array(
			'id_anggota' => $this->input->post('id_anggota'), 
			'nama_anggota' => $this->input->post('nama_anggota'),
			'umur' => $this->input->post('umur'),
			'jumlah_angsuran' => $this->input->post('jumlah_angsuran'),  
			'nominal_pinjam' => $this->input->post('nominal_pinjam'),
		);
		$this->setoran_model->updateData($table, $data, $condition);
		redirect('setoran');
	}

	function delete($id_user)
	{
		$table = "pengajuan";
		$condition['id_anggota'] = $id_user;
		$this->pengajuan_model->deleteData($table, $condition);
		redirect('pengajuan');
	}
	
    
}

/* End of file KelolaUser.php */
/* Location: ./application/controllers/KelolaUser.php */