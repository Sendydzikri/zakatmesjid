<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pendaftaran_anggota extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('cart');
		$this->load->model('m_login');
	    $this->load->model('pengajuan_model');
	    $this->load->model('pembayaran_model');
		$this->load->model('anggota_model');
        $this->load->model('pinjam_model');
	}
	
	public function index()
	{
	$ambil_akun = $this->m_login->ambil_user($this->session->userdata('nama')); //menampilkan session login
		$data = array(
			'user'	=> $ambil_akun,
		);
		$id = array('id_anggota' => $ambil_akun['id_user']);
		$data['title'] = "anggota";		
		$content = "anggota/main";
		$data['data_anggota'] = $this->anggota_model->getData("anggota",$id);		
		$data['judule'] = "ANGGOTA";
		$this->template->output($data, $content);
	}
        public function pinjam()
	{
	$ambil_akun = $this->m_login->ambil_user($this->session->userdata('nama')); //menampilkan session login
		$data = array(
			'user'	=> $ambil_akun,
		);

		$id = array('id_anggota' => $ambil_akun['id_user']);
		$data['title'] = "anggota";
		$table = "anggota";
		$content = "anggota/pinjam";
		$data['data_pengajuan'] = $this->pengajuan_model->getData("pengajuan",$id);       
        $data['data_anggota'] = $this->anggota_model->getData("anggota",$id);
        $tanggal_lahir = NULL;
        foreach ($data['data_anggota']->result() as $val){
        	$tanggal_lahir = new DateTime($val->tanggal_lahir);
        }
        $today = new DateTime();
        $umur = $today->diff($tanggal_lahir);
        $data['usia'] =  $umur->y;
		$data['judule'] = "PENGAJUAN";
		$this->template->output($data, $content);
	}
        public function bayar()
	{
	$ambil_akun = $this->m_login->ambil_user($this->session->userdata('nama')); //menampilkan session login
		$data = array(
			'user'	=> $ambil_akun,
		);
		$id = array('id_anggota' => $ambil_akun['id_user']);
		$data['title'] = "anggota";
		$table = "anggota";
		$content = "anggota/bayar";
		$data['data_pembayaran'] = $this->pembayaran_model->getData("pembayaran",$id);
        $data['data_anggota'] = $this->pengajuan_model->getData("anggota",$id);
		$data['judule'] = "PEMBAYARAN";
		$this->template->output($data, $content);
	}
	public function tambah_pengajuan()
	{
	$table = "pengajuan";

        $data = array(
            'id_anggota' => $this->input->post('id_anggota'),
            'nama_anggota' => $this->input->post('nama_anggota'),
			'alamat' => $this->input->post('alamat'),
			'no_telepon' => $this->input->post('no_telepon'),
            'tanggal_pengajuan' => $this->input->post('tanggal_pinjam'),
            'nominal_pinjam' => $this->input->post('jumlah_pengajuan'),
            'jumlah_angsuran' => $this->input->post('jumlah_angsuran'),
            'status' => 'request'
        );

        $this->pengajuan_model->addData($table, $data);
        redirect('pendaftaran_anggota/pinjam');
	}
	public function tambah_pembayaran()
	{
	$table = "pembayaran";
	   $ambil_akun = $this->m_login->ambil_user($this->session->userdata('nama')); //menampilkan session login
		
	    $where = array('id_anggota' => $ambil_akun['id_user'],'status'=>'accepted');
	    $data_pengajuan = $this->pengajuan_model->getData("pengajuan",$where);
	    $pembayaran = $this->pembayaran_model->getData("pembayaran",array('id_anggota' => $ambil_akun['id_user']));
	    $angsuran = count($pembayaran->result())+1;	   
	    $sisa_bayar = 0;
	    $jumlah_bayar = $this->input->post('jumlah_bayar');	
	    
	    foreach ($data_pengajuan->result() as $row){
	    	$jumlah_angsuran = $row->jumlah_angsuran;
	    	$sisa_bayar = $row->nominal_pinjam;
	    }	
	   	  
	    foreach ($pembayaran->result() as $val){
	    	  $sisa_bayar = $val->sisa_bayar;
	    }	
	    
        if($jumlah_angsuran){
	        $data = array(
	            'id_anggota' => $this->input->post('id_anggota'),
	            'nama_anggota' => $this->input->post('nama_anggota'),
				'tgl_bayar' => $this->input->post('tanggal_bayar'),
				'jumlah_angsuran' => $jumlah_angsuran,
				'angsuran_ke' => $angsuran,
	            'jumlah_bayar' =>$jumlah_bayar,
	            'sisa_bayar' => $sisa_bayar - $jumlah_bayar,            
	            'status' => 'waiting'
	        );
	        $this->pembayaran_model->addData("pembayaran", $data);
	    }
        redirect('pendaftaran_anggota/bayar');
	}
	public function update() {

        $data = array(
            'username' => $this->input->post('username'),
            'password' => md5($this->input->post('old_password'))
        );
        $check = $this->db->get_where('user', $data);        
        if ($check->result()) {
            $old_password = $this->input->post('old_password');
            $new_password = $this->input->post('new_password');           
            if ($old_password && $new_password) {
                $data = array(
                    'username' => $this->input->post('username'),
                    'password' => md5($new_password),
                );
                $this->anggota_model->updateData('user',$data,array('id_user' => $this->input->post('id_anggota')));    
                $this->session->set_flashdata('success_message', "Success");
            }
            $data_ = array(
                    'nama_anggota' => $this->input->post('username'),
                    'alamat' => $this->input->post('alamat'),
                    'no_tlp' => $this->input->post('no_telepon'),
                    'tempat_lahir' => $this->input->post('tempat_lahir'),
                    'tanggal_lahir' => $this->input->post('tanggal_lahir')
                );   
             $this->anggota_model->updateData('anggota',$data_,array('id_anggota' => $this->input->post('id_anggota')));    
        } else {
            $this->session->set_flashdata('error_message', 'Password yang anda masukkan salah.!');
        }
        redirect(base_url('pendaftaran_anggota'));
    
    }
	
    
}

/* End of file KelolaUser.php */
/* Location: ./application/controllers/KelolaUser.php */