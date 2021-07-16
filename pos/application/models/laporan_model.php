<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class laporan_model extends CI_Model {
	
	function __construct()
	{
		parent::__construct();
	}

	function get($table)
	{
		$this->db->select("*");
		$this->db->from($table);

		return $this->db->get();
	}

	function getData($table, $condition)
	{
        $this->db->where($condition); 
        $this->db->select("*");
        $this->db->from($table);
        
        return $this->db->get();
	}

	function addData($table,$data)
	{
		$this->db->insert($table, $data);
	}

	function updateData($table, $data, $condition)
	{
        $this->db->where($condition);
        $this->db->update($table, $data);
	}

	function deleteData($table, $condition)
	{
        $this->db->where($condition);
        $this->db->delete($table);
	}
 public function tanggal($tgl2,$tgl3){
        return $this->db->query("select id_anggota,nama_anggota,tgl_simpan,jenis_simpan,total_simpan from simpan where tgl_simpan between '$tgl2' and '$tgl3' group by id_anggota");
    }
	
}

/* End of file simpan_model.php */
/* Location: ./application/models/simpan_model.php */