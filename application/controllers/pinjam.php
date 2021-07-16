<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class pinjam extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('cart');
		$this->load->model('m_login');
		$this->load->model('pinjam_model');
		
	}

	
	public function index()
	{
	$ambil_akun = $this->m_login->ambil_user($this->session->userdata('nama')); //menampilkan session login
		$data = array(
			'user'	=> $ambil_akun,
		);
		$data['title'] = "pinjam";
		$data['rupiah'] = "Rp.";
		$table = "pinjam";
		$content = "pinjam";
		$data['data_pinjam'] = $this->pinjam_model->get($table);
		$data['judule'] = "KELOLA Pinjam";
		$this->template->output($data, $content);
	}
	public function tambahpinjam()
	{
	$ambil_akun = $this->m_login->ambil_user($this->session->userdata('nama')); //menampilkan session login
		$data = array(
			'user'	=> $ambil_akun,
		);
		$data['title'] = "Tambah Pinjam";
		$content = "pinjam/Tambah_Pinjam";
		$data['judule'] = "TAMBAH PINJAMAN";		
		$this->template->output($data, $content);
	}

	function tambahSubmit()
	{
		$table = "pinjam";
		$id_anggota = $this->input->post('id_anggota');
		$jumlah_pinjam = $this->input->post('jml_pinjam');
		$jenis_alat = $this->input->post('jenis_alat');
		$status = $this->input->post('status');
		$data = array(
			'id_anggota' => $id_anggota,
			'nama_anggota' => $this->input->post('nama_anggota'), 
			'tgl_pinjam' => $this->input->post('tgl_pinjam'), 
			'jenis_alat' => $jenis_alat,
			'jml_pinjam' => $jumlah_pinjam, 
			'total_bayar' => $this->input->post('total_bayar'), 
            'status' => $status	
			);
       
		$cek = $this->pinjam_model->addData($table, $data);
		if($cek){			
           $this->pinjam_model->update_jumlah($jumlah_pinjam,$jenis_alat);
           if($status == 'credit'){
           	  $data_pembayaran = $this->pinjam_model->getData("pembayaran",array('id_anggota' => $id_anggota));
           	  
              $this->pinjam_model->update_peminjaman();
           }
		}
		redirect('pinjam/index','refresh');
	}
	function updateSimpan($id_anggota)
	{
		$table="pinjam";
		$condition['id_anggota'] = $id_anggota;

		$data['update'] = $this->pinjam_model->getData($table, $condition);

		$data['title'] = "Update Pinjam";
		$content = "pinjam/edit_pinjam";
		$data['judule'] = "EDIT Pinjam";
		$this->template->output($data, $content);
	}

	public function cekStok()
	{
		$jumlah = $this->input->post('jumlah');
		$jenis = $this->input->post('jenis');
		print_r($jenis);exit;
		$table="barang";
		$condition['jenisbarang'] = $jenis;
		$stok = $this->pinjam_model->getData($table, $condition);	
	}

	function updateSubmit()
	{
		$table = "simpan";
		$condition['id_anggota'] = $this->input->post('id_anggota');
		$data = array(
			'id_anggota' => $this->input->post('id_anggota'),
			'nama_anggota' => $this->input->post('nama_anggota'), 
			'tgl_pinjam' => $this->input->post('tgl_pinjam'), 
			'jml_pinjam' => $this->input->post('jenis_pinjam'), 
		);
		$this->pinjam_model->updateData($table, $data, $condition);
		redirect('pinjam');
	}

	function delete($id_user)
	{
		$table = "pinjam";
		$condition['id_anggota'] = $id_user;
		$this->pinjam_model->deleteData($table, $condition);
		redirect('pinjam');
	}
	
    
}

/* End of file KelolaUser.php */
/* Location: ./application/controllers/KelolaUser.php */