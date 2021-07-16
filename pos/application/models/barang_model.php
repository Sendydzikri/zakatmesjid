<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class barang_model extends CI_Model {
	
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

	function bunga($qambil,$q,$nilai,$nominalakhir,$nominalpersen,$nominal)
	{
		$qtambah=mysql_query("INSERT INTO simpan (id_anggota, nama_anggota, tgl_simpan, jenis_simpan ,total_simpan) VALUES('$id_anggota','$nama_anggota', '$tgl_simpan','$jenis_simpan', 'total_simpan');");
				$qupdatesaldo=mysql_query("UPDATE simpan SET saldo=saldo+$nominalakhir WHERE id_anggota='$id_anggota'");
			}
	}

/* End of file simpan_model.php */
/* Location: ./application/models/simpan_model.php */