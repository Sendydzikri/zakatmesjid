<?php

abstract class MY_Controller extends CI_Controller {

    var $_user;

    function __construct() {
        parent::__construct();
        $this->_user = $this->session->userdata('LoginPos');   
        $cek_login = ($this->_user) ? null : redirect(base_url('login'));        
    }

}
