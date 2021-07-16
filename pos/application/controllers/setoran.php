<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class setoran extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('cart');
		$this->load->model('m_login');
		$this->load->model('setoran_model');
	}

	
	public function index()
	{
	$ambil_akun = $this->m_login->ambil_user($this->session->userdata('nama')); //menampilkan session login
		$data = array(
			'user'	=> $ambil_akun,
		);
		$data['title'] = "setoran";
		$table = "setoran";
		$content = "setoran";
		$data['rupiah'] = "Rp.";
		$data['data_setoran'] = $this->setoran_model->get($table);
		$data['judule'] = "KELOLA SETORAN";
		$this->template->output($data, $content);
	}
	public function tambahsetoran()
	{
	$ambil_akun = $this->m_login->ambil_user($this->session->userdata('nama')); //menampilkan session login
		$data = array(
			'user'	=> $ambil_akun,
		);
		$data['title'] = "Tambah Setoran";
		$content = "setoran/Tambah_Setor";
		$data['judule'] = "TAMBAH SETORAN";
		$this->template->output($data, $content);
	}

	function tambahSubmit()
	{
		$table = "setoran";
		$data = array(
			'id_anggota' => $this->input->post('id_anggota'), 
			'nama_anggota' => $this->input->post('nama_anggota'), 
			'tgl_setoran' => $this->input->post('tgl_setoran'), 
			'nominal' => $this->input->post('nominal'),
			);
		$this->setoran_model->addData($table, $data);
		redirect('setoran/index','refresh');
	}
	function updateSetor($id_anggota)
	{
		$table="setoran";
		$condition['id_anggota'] = $id_anggota;

		$data['update'] = $this->setoran_model->getData($table, $condition);

		$data['title'] = "Update Setoran";
		$content = "setoran/edit_setor";
		$data['judule'] = "EDIT SETORAN";
		$this->template->output($data, $content);
	}

	function updateSubmit()
	{
		$table = "setoran";
		$condition['id_anggota'] = $this->input->post('id_anggota');
		$data = array(
			'id_anggota' => $this->input->post('id_anggota'), 
			'nama_anggota' => $this->input->post('nama_anggota'),
			'tgl_setoran' => $this->input->post('tgl_setoran'),  
			'nominal' => $this->input->post('nominal'),
		);
		$this->setoran_model->updateData($table, $data, $condition);
		redirect('setoran');
	}

	function delete($id_user)
	{
		$table = "setoran";
		$condition['id_anggota'] = $id_user;
		$this->setoran_model->deleteData($table, $condition);
		redirect('setoran');
	}
	function cetak_struk($no)
	{
		$table = "setoran";
		$condition['no'] = $no;
		$data= $this->setoran_model->getData($table, $condition);
		$this->load->library('cfpdf');
        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(0, 10, "Bukti Setoran", 0, 1, 'L');
        $pdf->Cell(35, 7, 'Id Anggota', 1, 0, 'L');
        $pdf->Cell(50, 7, 'Nama Anggota', 1, 0, 'L');
        $pdf->Cell(35, 7, 'Tanggal Setoran', 1, 0, 'L');
        $pdf->Cell(35, 7, 'Nominal', 1, 0, 'L');
        $pdf->Cell(35, 7, 'Total', 1, 0, 'L');
        $pdf->Ln();       
		 foreach ($data->result() as $val) {
            $pdf->Cell(35, 7, $val->id_anggota, 1, 0, 'L');
            $pdf->Cell(50, 7, $val->nama_anggota, 1, 0, 'L');
            $pdf->Cell(35, 7, $val->tgl_setoran, 1, 0, 'L');
            $pdf->Cell(35, 7, to_rupiah($val->nominal), 1, 0, 'L');
            $pdf->Cell(35, 7, to_rupiah($val->total), 1, 0, 'L');
            $pdf->Ln();
        }
	    $pdf->Output();
	}
	
    
}

/* End of file KelolaUser.php */
/* Location: ./application/controllers/KelolaUser.php */