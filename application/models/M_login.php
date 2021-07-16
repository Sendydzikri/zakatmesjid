<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class m_login extends CI_Model{
	function __construct()
	{
		parent::__construct();
	}
 
	function cek_user($username="",$password="")
	{
		$query = $this->db->get_where('user',array('username' => $username, 'password' => $password));
		$query = $query->result_array();
		return $query;
	}
	function ambil_user($nama)
        {
        $query = $this->db->get_where('user', array('nama' => $nama));
        $query = $query->result_array();
        if($query){
            return $query[0];
        }
    }
    function getIDOtomatis() {
        $uniq = substr(strtoupper(uniqid()),5);
        $nextNoTransaksi = 'U-'.$uniq ;
        return $nextNoTransaksi;
    }
}