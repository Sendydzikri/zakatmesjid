<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class anggota_model extends CI_Model {
	
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
	    public function laporan(){
            $query = $this->db->query("select id_anggota,nama_anggota,alamat,no_tlp,persyaratan FROM anggota
                WHERE id_pendaftaran");
            return $query->result();
        }
	
}

/* End of file anggota_model.php */
/* Location: ./application/models/anggota_model.php */