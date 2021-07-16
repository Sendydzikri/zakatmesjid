<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class pinjam_model extends CI_Model {
	
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
		return true;
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
	function update_jumlah($jumlah,$jenis){
		$this->db->query("update barang set stok = stok - '$jumlah' where jenisbarang = '$jenis'");
	}
	function update_peminjaman(){
		$this->db->query("update barang set stok = stok - '$jumlah' where jenisbarang = '$jenis'");
	}

	
}

/* End of file simpan_model.php */
/* Location: ./application/models/simpan_model.php */