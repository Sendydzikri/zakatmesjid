<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class pembayaran extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('cart');
		$this->load->model('m_login');
		$this->load->model('pembayaran_model');
		$this->load->model('setoran_model');
	}

	
	public function index()
	{
	$ambil_akun = $this->m_login->ambil_user($this->session->userdata('nama')); //menampilkan session login
		$data = array(
			'user'	=> $ambil_akun,
		);
		$data['title'] = "pembayaran";
		$table = "pembayaran";
		$content = "pembayaran";
		$data['rupiah'] = "Rp.";
		$data['data_pembayaran'] = $this->pembayaran_model->get($table);
		$data['judule'] = "KELOLA PEMBAYARAN";
		$this->template->output($data, $content);
	}
	public function notif_pembayaran()
	{
	$ambil_akun = $this->m_login->ambil_user($this->session->userdata('nama')); //menampilkan session login
		$data = array(
			'user'	=> $ambil_akun,
		);
		$data['title'] = "pembayaran";
		$table = "pembayaran";
		$content = "pembayaran/notif_pembayaran";		
		$data['data_pembayaran'] = $this->pembayaran_model->getData($table,array('status'=>'waiting'));
		$data['judule'] = "KONFIRMASI PEMBAYARAN";
		$this->template->output($data, $content);
	}
	function updateStatusPembayaran()
	{
		 $status = array(
		 	'status'=>$this->input->post('status')
		 );
		 $condition = array(
		    'id_pembayaran' => $this->input->post('id_pembayaran')
		 );
          $this->pembayaran_model->updateData("pembayaran",$status,$condition);
	}
	public function tambahpembayaran()
	{
	$ambil_akun = $this->m_login->ambil_user($this->session->userdata('nama')); //menampilkan session login
		$data = array(
			'user'	=> $ambil_akun,
		);
		$data['title'] = "Tambah Pembayaran";
		$content = "pembayaran/Tambah_Pembayaran";
		$data['judule'] = "TAMBAH PEMBAYARAN";
		$this->template->output($data, $content);
	}

	function tambahSubmit()
	{
		$table = "pembayaran";
		$data = array(
			'id_anggota' => $this->input->post('id_anggota'), 
			'nama_anggota' => $this->input->post('nama_anggota'), 
			'tgl_bayar' => $this->input->post('tgl_bayar'), 
			'angsuran_ke' => $this->input->post('angsuran_ke'),
			'jumlah_bayar' => $this->input->post('jumlah_bayar'),
			);
		$this->pembayaran_model->addData($table, $data);
		redirect('pembayaran/index','refresh');
	}
	function updatePembayaran($id_anggota)
	{
		$table="pembayaran";
		$condition['id_anggota'] = $id_anggota;

		$data['update'] = $this->pembayaran_model->getData($table, $condition);

		$data['title'] = "Update Pembayaran";
		$content = "pembayaran/edit_pembayaran";
		$data['judule'] = "EDIT PEMBAYARAN";
		$this->template->output($data, $content);
	}

	function updateSubmit()
	{
		$table = "pembayaran";
		$condition['id_anggota'] = $this->input->post('id_anggota');
		$data = array(
			'id_anggota' => $this->input->post('id_anggota'), 
			'nama_anggota' => $this->input->post('nama_anggota'),
			'tgl_bayar' => $this->input->post('tgl_bayar'),  
			'angsuran_ke' => $this->input->post('angsuran_ke'),  
			'jumlah_bayar' => $this->input->post('jumlah_bayar'),
		);
		$this->pembayaran_model->updateData($table, $data, $condition);
		redirect('pembayaran');
	}
	public function notif_setoran()
	{
	$ambil_akun = $this->m_login->ambil_user($this->session->userdata('nama')); //menampilkan session login
		$data = array(
			'user'	=> $ambil_akun,
		);
		$data['title'] = "setoran";
		$table = "setoran";
		$content = "pembayaran/notif_setoran";
		$data['rupiah'] = "Rp.";
		$data['data_setoran'] = $this->setoran_model->get($table);
		$data['judule'] = "KELOLA SETORAN";
		$this->template->output($data, $content);
	}
	function updateStatusSetoran()
	{
		 $status = array(
		 	'status'=>$this->input->post('status')
		 );
		 $condition = array(
		    'no' => $this->input->post('no')
		 );
          $this->pembayaran_model->updateData("setoran",$status,$condition);

	}

	function delete($id_user)
	{
		$table = "pembayaran";
		$condition['id_anggota'] = $id_user;
		$this->pembayaran_model->deleteData($table, $condition);
		redirect('pembayaran');
	}
	
    
}

/* End of file KelolaUser.php */
/* Location: ./application/controllers/KelolaUser.php */