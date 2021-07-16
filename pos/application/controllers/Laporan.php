<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Laporan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('cart');
        $this->load->model('m_login');
        $this->load->model('laporan_model');
    }

    public function index() {
        $ambil_akun = $this->m_login->ambil_user($this->session->userdata('nama')); //menampilkan session login
        $data = array(
            'user' => $ambil_akun,
        );
        $data['fungsi'] = "Laporan/cari_tanggal";
        $data['title'] = "Laporan";
        $content = "laporan/tanggal";
        $data['judule'] = "Laporan";

        $this->template->output($data,$content);
    }
    function cari_tanggal(){
        $ambil_akun = $this->m_login->ambil_user($this->session->userdata('nama'));
        $data = array(
            'user' => $ambil_akun,
        );
        $data['title']="Laporan Simpan";
        $data['fungsi'] = "laporan/tanggal";
        $data['judule']="Laporan Simpan";
        $tgl2=$this->input->post('tanggal1');
        $tgl3=$this->input->post('tanggal2');
        $content = "laporan/cari_tanggal";
        $data['tgl_mulai']= $tgl2;
        $data['tgl_selesai']= $tgl3;
        $data['lap'] = $this->laporan_model->tanggal($tgl2,$tgl3)->result();
        $this->template->output($data, $content);
    }

    public function getPenjualan() {
        $from = $this->input->get('from');
        $to = $this->input->get('to');
        $data = array(
            'penjualan' => $this->myigniter_model->getpenjualan($from, $to),
            'from' => $from,
            'to' => $to
        );
    }

    public function pdf($from, $to) {
        $this->load->library('cfpdf');

        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 10);

        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(0, 8, "Laporan Penjualan Tanggal " . $from . " - " .$to, 0, 1, 'L');

        $pdf->Cell(15, 7, 'No', 1, 0, 'L');
        $pdf->Cell(85, 7, 'Tanggal', 1, 0, 'L');
        $pdf->Cell(85, 7, 'Total Penjualan', 1, 0, 'L');
        $pdf->Ln();
       
        $penjualan = $this->myigniter_model->getpenjualan($from, $to);

        $no = 1;
        $total_penjualan = 0;
        foreach ($penjualan as $p) {
            $pdf->Cell(15, 7, $no, 1, 0, 'L');
            $pdf->Cell(85, 7, date('d F Y', strtotime($p['tgl'])), 1, 0, 'L');
            $pdf->Cell(85, 7, "Rp. " . str_replace(",", ".", number_format($p['total_harga'])), 1, 0, 'L');
            $pdf->Ln();
            $total_penjualan = $total_penjualan + $p['total_harga'];
            $no++;
        }

        $pdf->Cell(100, 7, 'Total Seluruh Penjualan', 1, 0, 'L');
        $pdf->Cell(85, 7, "Rp. " . str_replace(",", ".", number_format($total_penjualan)), 1, 0, 'L');
        $pdf->Ln();

        $pdf->Output();
    }
    public function print_laporan($tgl_mulai,$tgl_selesai){
        $this->load->library('cfpdf');

        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 10);

        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(0, 8, "Laporan Simpan " . $tgl_mulai . " - " .$tgl_selesai, 0, 1, 'L');

        $pdf->Cell(15, 7, 'No', 1, 0, 'L');
        $pdf->Cell(35, 7, 'Id Anggota', 1, 0, 'L');
        $pdf->Cell(35, 7, 'Nama Anggota', 1, 0, 'L');
        $pdf->Cell(35, 7, 'Tanggal Simpan', 1, 0, 'L');
        $pdf->Cell(35, 7, 'Jenis Simpan', 1, 0, 'L');
        $pdf->Cell(35, 7, 'Total Simpan', 1, 0, 'L');
        $pdf->Ln();
       
        $simpan = $this->laporan_model->tanggal($tgl_mulai,$tgl_selesai)->result();

        $no = 1;
        
        foreach ($simpan as $p) {
            $pdf->Cell(15, 7, $no, 1, 0, 'L');
            $pdf->Cell(35, 7, $p->id_anggota, 1, 0, 'L');
            $pdf->Cell(35, 7, $p->nama_anggota, 1, 0, 'L');
            $pdf->Cell(35, 7, $p->tgl_simpan, 1, 0, 'L');
            $pdf->Cell(35, 7, $p->jenis_simpan, 1, 0, 'L');
            $pdf->Cell(35, 7, to_rupiah($p->total_simpan), 1, 0, 'L');            
            $pdf->Ln();            
            $no++;
        }        
        $pdf->Output();
    }

}
