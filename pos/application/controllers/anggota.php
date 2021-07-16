<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Anggota extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('cart');
		$this->load->model('m_login');
		$this->load->model('anggota_model');
	}

	
	public function index()
	{
	$ambil_akun = $this->m_login->ambil_user($this->session->userdata('nama')); //menampilkan session login
		$data = array(
			'user'	=> $ambil_akun,
		);
		$data['title'] = "anggota";
		$table = "anggota";
		$content = "anggota";
		$data['data_anggota'] = $this->anggota_model->get($table);
		$data['judule'] = "KELOLA ANGGOTA";
		$this->template->output($data, $content);
	}
	function updateAnggota($id_pendaftaran)
	{
		$ambil_akun = $this->m_login->ambil_user($this->session->userdata('nama')); //menampilkan session login
		$data = array(
			'user'	=> $ambil_akun,
		);
		$table="anggota";
		$condition['id_pendaftaran'] = $id_pendaftaran;

		$data['update'] = $this->anggota_model->getData($table, $condition);

		$data['title'] = "Update anggota";
		$content = "anggota/edit_anggota";
		$data['judule'] = "EDIT ANGGOTA";
		$this->template->output($data, $content);
	}

	function updateSubmit()
	{
		$table = "anggota";
		$condition['id_anggota'] = $this->input->post('id_anggota');
		$data = array(
			'id_anggota' => $this->input->post('id_anggota'),
			'nama_anggota' => $this->input->post('nama_anggota'), 
			'alamat' => $this->input->post('alamat'), 
			'no_tlp' => $this->input->post('no_tlp'), 
			'persyaratan' => $this->input->post('persyaratan'), 
		);
		$this->anggota_model->updateData($table, $data, $condition);
		redirect('anggota','refresh');
	}

	function laporAnggota($id_daftar){
		$ambil_akun = $this->m_login->ambil_user($this->session->userdata('nama')); //menampilkan session login
		$data = array(
			'user'	=> $ambil_akun,
		);
		$table="anggota";
		$condition['id_pendaftaran'] = $id_daftar;

		$data['datas'] = $this->anggota_model->getData($table, $condition);

		$data['title'] = "Update anggota";
		$content = "anggota/lapor_anggota";
		$data['judule'] = "laporan ANGGOTA";
		$this->template->output($data, $content);

	}
	 function print_pdf(){
            $lap = "anggota";
            $data['laporan'] = $this->anggota_model->laporan();
            $data['title'] = "Rekap Absen";
            $this->load->view('anggota/print_pdf',$data);
            $paper_size = 'A4';
            $orientation = 'potrait';
            $html = $this->output->get_output();

            $this->dompdf->set_paper($paper_size, $orientation);

            $this->dompdf->load_html($html);
            $this->dompdf->render();
            $this->dompdf->stream("Laporan".$lap.".pdf");
                }

	function delete($id_user)
	{
		$table = "anggota";
		$condition['id_anggota'] = $id_anggota;
		$this->anggota_model->deleteData($table, $condition);
		redirect('anggota');
	}
	
    
}

/* End of file KelolaUser.php */
/* Location: ./application/controllers/KelolaUser.php */