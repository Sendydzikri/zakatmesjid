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
            'pejakat' => $ambil_akun,
        );
        $data['title']="zakat_masuk";
        $data['fungsi'] = "laporan/tanggal";
        $data['judule']="zakat_masuk";
        $tgl2=$this->input->post('tanggal1');
        $tgl3=$this->input->post('tanggal2');
        $content = "laporan/cari_tanggal";
        $data['tgl_mulai']= $tgl2;
        $data['tgl_selesai']= $tgl3;
        $data['lap'] = $this->laporan_model->tanggal($tgl2,$tgl3)->result();
        $this->template->output($data, $content);
    }

    public function getpejakat() {
        $from = $this->input->get('from');
        $to = $this->input->get('to');
        $data = array(
            'pejakat' => $this->myigniter_model->getpejakat($from, $to),
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
       
        $pejaka = $this->myigniter_model->getpejakat($from, $to);

        $no = 1;
        $nomil = 0;
        foreach ($nominal as $p) {
            $pdf->Cell(15, 7, $no, 1, 0, 'L');
            $pdf->Cell(85, 7, date('d F Y', strtotime($p['tgl'])), 1, 0, 'L');
            $pdf->Cell(85, 7, "Rp. " . str_replace(",", ".", number_format($p['nominal'])), 1, 0, 'L');
            $pdf->Ln();
            $nominal = $nominal+ $p['nominal'];
            $no++;
        }

        $pdf->Cell(100, 7, 'Total Seluruh pejakat', 1, 0, 'L');
        // $pdf->Cell(85, 7, " " . str_replace(",", ".", number_format($nominal), 1, 0, 'L');
        // $pdf->Ln();

        $pdf->Output();
    }
    public function print_laporan($tgl_mulai,$tgl_selesai){
        $this->load->library('cfpdf');

        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 10);

        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(0, 8, "zakat_masuk " . $tgl_mulai . " - " .$tgl_selesai, 0, 1, 'L');

        $pdf->Cell(15, 7, 'nama_pejakat', 1, 0, 'L');
        $pdf->Cell(35, 7, 'tanggal', 1, 0, 'L');
        $pdf->Cell(35, 7, 'alamat', 1, 0, 'L');
        $pdf->Cell(35, 7, 'jeni_zakat', 1, 0, 'L');
        $pdf->Cell(35, 7, 'Jum_keluarga', 1, 0, 'L');
        $pdf->Cell(35, 7, 'nominal', 1, 0, 'L');
        $pdf->Ln();
       
        $pejakat = $this->laporan_model->tanggal($tgl_mulai,$tgl_selesai)->result();

        $no = 1;
        
        // foreach ($nominal $p) {
        //     $pdf->Cell(15, 7, $no, 1, 0, 'L');
        //     $pdf->Cell(35, 7, $p->nama_pejakat, 1, 0, 'L');
        //     $pdf->Cell(35, 7, $p->tanggal, 1, 0, 'L');
        //     $pdf->Cell(35, 7, $p->alamat, 1, 0, 'L');
        //     $pdf->Cell(35, 7, $p->jeni_zakat, 1, 0, 'L');
        //     $pdf->Cell(35, 7, $p->jum_alamat, 1, 0, 'L');
        //     $pdf->Cell(35, 7, $p->nominal), 1, 0, 'L');            
        //     $pdf->Ln();            
        //     $no++;
        // }        
        // $pdf->Output();
    }

}
