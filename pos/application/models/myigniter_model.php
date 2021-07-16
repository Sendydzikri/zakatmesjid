<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Myigniter_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get($table) {
        $this->db->select("*");
        $this->db->from($table);

        return $this->db->get();
    }

    function getData($table, $condition) {
        $this->db->where($condition);
        $this->db->select("*");
        $this->db->from($table);

        return $this->db->get();
    }

    function addData($table, $data) {
        $this->db->insert($table, $data);
    }

    function updateData($table, $data, $condition) {
        $this->db->where($condition);
        $this->db->update($table, $data);
    }

    function deleteData($table, $condition) {
        $this->db->where($condition);
        $this->db->delete($table);
    }

    function setoran($table, $condition) {
        $this->db->group_by("tgl");
        $this->db->where($condition);
        $this->db->select("*");
        $this->db->from($table);

        return $this->db->get();
    }

    function totalSetor($table, $condition) {
        $this->db->select_sum('total_harga');
        $this->db->where($condition);
        $this->db->from($table);

        return $this->db->get();
    }

    function getNotification($table) {
        $query = $this->db->query('select * from barang where stok<=3');
        return $query->result_array();
    }

    function UpdateStok($id, $jumlah) {
        return $this->db->query("update barang set stok= stok-'$jumlah' where id='$id'");
    }
     public function getpenjualan($from,$to) {
       $query= $this->db->query("select *  from penjualan where tgl >= '$from' AND tgl<= '$to'");
        return $query->result_array();        
    }

}

/* End of file myigniter_model.php */
/* Location: ./application/models/myigniter_model.php */