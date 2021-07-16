<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class pejakat extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('cart');
		$this->load->model('m_login');
		$this->load->model('pejakat_model');
		
	}
	private function validate() {			
 //            // $this->form_validation->set_rules('parent_id_siswa', 'Men siswa Id', 'trim|max_length[10]|integer');
		$this->form_validation->set_rules('nama_pejakat', 'nama_pejakat', 'trim|required');

       return $this->form_validation->run('nama_pejakat');
   }

	
	public function index()
	{
	$ambil_akun = $this->m_login->ambil_user($this->session->userdata('nama')); //menampilkan session login
		$data = array(
			'pejakat'	=> $ambil_akun,
		);
		$data['title'] = "pejakat";
		$table = "pejakat";
		$content = "pejakat";
		$data['data_pejakat'] = $this->pejakat_model->get($table);
		$data['judule'] = "KELOLA PEJAKAT";
		$this->template->output($data, $content);
	}
	public function tambahpejakat()
	{
	$ambil_akun = $this->m_login->ambil_user($this->session->userdata('nama')); //menampilkan session login
		$data = array(
			'pejakat'	=> $ambil_akun,
		);
		$data['title'] = "Tambah Pejakat";
		$content = "pejakat/Tambah_pejakat";
		$data['judule'] = "TAMBAH PEJAKAT";
		$this->template->output($data, $content);
	}

	function tambahSubmit()
	{
		$table = "pejakat";
		$data = array(
			// 'no' =>  $this->input->post('no'),
			'nama_pejakat' => $this->input->post('nama_pejakat'), 
			'tanggal' => $this->input->post('tanggal'), 
			'alamat' => $this ->input->post('alamat'),
			'jenis_zakat' => $this ->input->post('jenis_zakat'),
			'jum_keluarga' => $this ->input->post('jum_keluarga'),
			'nominal' => $this ->input->post('nominal'),

			// 'inpaq' => $this ->input->post('inpaq'),
			// 'satuanbarang' => $this->input->post('satuanbarang'), 
			// 'harga_beli' => $this->input->post('harga_beli'),
			// 'harga_jual' => $this->input->post('harga_jual'),
			// 'stok' => $this->input->post('stok'),
			
			//'total_simpan2' => $this->set_pinjam_m->insert($this->input->post ('total_simpan')),
			);
		$this->pejakat_model->addData($table, $data);
		redirect('pejakat/index','refresh');
	}
	function updatepejakat($id_anggota)
	{
		$table="pejakat";
		$condition['nama_pejakat'] = $id_anggota;

		$data['update'] = $this->pejakat_model->getData($table, $condition);

		$data['title'] = "Update Pejakat";
		$content = "pejakat/edit_pejakat";
		$data['judule'] = "EDIT PEJAKAT";
		$this->template->output($data, $content);
	}

	function updateSubmit()
	{
		$table = "pejakat";
		$condition['nama_pejakat'] = $this->input->post('nama_pejakat');
		$data = array(
			'nama_pejakat' => $this->input->post('nama_pejakat'), 
			'tanggal' => $this->input->post('tanggal'), 
			'alamat' => $this->input->post('alamat'),
			'jenis_zakat' => $this->input->post('jenis_zakat'), 
			'jum_keluarga' => $this->input->post('jum_keluarga'), 
			'nominal' => $this->input->post('nominal'), 
		);
		
		$this->pejakat_model->updateData($table, $data, $condition);
		redirect('pejakat');
	}

	function delete($nama_pejakat)
	{
		$table = "pejakat";
		$condition['nama_pejakat'] = $nama_pejakat;
		$this->pejakat_model->deleteData($table, $condition);
		redirect('pejakat');
	}
	
    
}

/* End of file KelolaUser.php */
/* Location: ./application/controllers/KelolaUser.php */