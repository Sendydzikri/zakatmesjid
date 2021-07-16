<?php

if (!function_exists('flash_msg')) {

    function flash_msg() {
        $ci = & get_instance();
        echo $ci->session->flashdata('success_message') ? '<div class="alert-layer"><div class="alert alert-success"><span class="glyphicon glyphicon-info-sign"></span> ' . $ci->session->flashdata('success_message') . '</div></div>' : '';
        echo $ci->session->flashdata('error_message') ? '<div class="alert-layer"><div class="alert alert-danger"><span class="glyphicon glyphicon-info-sign"></span> ' . $ci->session->flashdata('error_message') . '</div></div>' : '';
    }
    function to_rupiah($angka) {
        return 'Rp. ' . strrev(implode('.', str_split(strrev(strval($angka)), 3)));
    }

}
?> 