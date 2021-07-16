<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Myigniter extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('cart');
        $this->load->model('m_login');
    }

    public function index() {
        $ambil_akun = $this->m_login->ambil_user($this->session->userdata('nama')); //menampilkan session login
        $data = array(
            'user' => $ambil_akun,
        );
        $table = "barang";
        $data['cari'] = $this->myigniter_model->get($table);

        $data['title'] = "Kasri 1.0";
        $data['judule'] = "KUD SARWA MUKTI";
        $content = "myigniter_view";
        $this->template->output($data, $content);
    }

    public function daftarkeranjang() {
        $this->load->view('keranjang_view');
    }

    public function total() {
        echo $this->cart->total();
    }

    public function keranjang($id) {
        $table = "barang";
        $condition['id'] = $id;
        $get = $this->myigniter_model->getData($table, $condition);
        $stok = 0;
        foreach ($get->result() as $row) {
            $stok = $row->stok;
        }
        $jumlah_beli = 0;
        foreach ($this->cart->contents() as $items) {
            $jumlah_beli = $items['qty'] + 1;
        }
        $jml = $get->num_rows();
        $tambah = TRUE;
        if ($jumlah_beli <= $stok) {
            foreach ($this->cart->contents() as $items) {
                $kode = $id;
				$quantity = $qty;
                if ($items['id'] == $kode) {
				    $total = $items['qty'] + 1;
                    $data = array(
                        'rowid' => $items['rowid'],
                        'qty' => $total
                    );

                    $this->cart->update($data);
                    $tambah = FALSE;
                    break;
                }
            }

            if ($tambah) {
                if ($jml == 0) {
                    /*
                      echo "<script>
                      alert('Id barang yang dimasukan tidak ada!');
                      </script>";
                     */
                } else {
                    foreach ($get->result() as $row) {
                        $data = array(
                            'id' => $row->id,
                            'qty' => 1,
                            'price' => $row->harga_jual,
                            'stock' => $row->stok,
                            'name' => $row->nama
                        );
                        $this->cart->insert($data);
                        break;
                    }
                }
            }
        } else {
            $message = 'Maaf stok barang tersisa ' . (String) $stok;
            if ($jumlah_beli > $stok) {
                $this->session->set_flashdata('error_message', $message);
            }
        }
        $this->load->view('keranjang_view');
    }

    public function client() {
        $this->load->view('client_kasir');
    }

    public function penjualan() {
        $ambil_akun = $this->m_login->ambil_user($this->session->userdata('nama')); //menampilkan session login
        $data = array(
            'user' => $ambil_akun,
        );
        $table = "penjualan";
        $data['penjualan'] = $this->myigniter_model->get($table);

        $data['title'] = "penjualan";
        $content = "penjualan";
        $data['judule'] = "PENJUALAN";
        $this->template->output($data, $content);
    }

    public function setoran() {
        $ambil_akun = $this->m_login->ambil_user($this->session->userdata('nama')); //menampilkan session login
        $data = array(
            'user' => $ambil_akun,
        );
        $table = "penjualan";
        $condition['setor'] = '0';
        $data['setoran'] = $this->myigniter_model->setoran($table, $condition);

        $data['title'] = "Penyetoran";
        $content = "setoran";
        $data['judule'] = "SETORAN";
        $this->template->output($data, $content);
    }

    public function setoranSubmit() {
        $ambil_akun = $this->m_login->ambil_user($this->session->userdata('nama')); //menampilkan session login
        $data = array(
            'user' => $ambil_akun,
        );
        $this->load->helper('date');
        $datestring = "%Y-%m-%d";
        $tgl = mdate($datestring);

        $tgl_jual = $this->input->post('tgljual');
        $tablePenjualan = "penjualan";
        $condition['tgl'] = $tgl_jual;
        $selectTotal = $this->myigniter_model->totalSetor($tablePenjualan, $condition);
        foreach ($selectTotal->result() as $tot) {
            $total_jual = $tot->total_harga;
            $total_setor = $this->input->post('setor');
            $selisih = $total_setor - $total_jual;
            $table = "setor";
            $data = array(
                'penyetor' => $this->input->post('nama'),
                'tgl_jual' => $tgl_jual,
                'tgl_setor' => $tgl,
                'total_jual' => $total_jual,
                'total_setor' => $total_setor,
                'selisih' => $selisih
            );
            $this->myigniter_model->addData($table, $data);
        }
        $data = array('setor' => 1,);
        $updatePenjualan = $this->myigniter_model->updateData($tablePenjualan, $data, $condition);

        redirect('myigniter/setoran', 'refresh');
    }

    public function deleterow($id) {
        $data = array(
            'rowid' => $id,
            'qty' => 0
        );

        $this->cart->update($data);
        redirect('myigniter');
    }

    public function delete() {
        $this->cart->destroy();
        redirect('myigniter');
    }

    public function selesai() {
        $this->load->helper('date');
        $datestring = "%Y-%m-%d";

        $tgl = mdate($datestring);
        $table = "penjualan";
        foreach ($this->cart->contents() as $insert) {
            $total = $insert['price'] * $insert['qty'];
            $data = array(
                'id_barang' => $insert['id'],
                'qty' => $insert['qty'],
                'total_harga' => $total,
                'tgl' => $tgl
            );
            $this->myigniter_model->UpdateStok($insert['id'], $insert['qty']);
            $this->myigniter_model->addData($table, $data);
        }
        $this->cart->destroy();
        redirect('myigniter');
    }

}

/* End of file myigniter.php */
            /* Location: ./application/controllers/myigniter.php */            