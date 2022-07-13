<?php
date_default_timezone_set('Asia/Jakarta');

function nama_file($jenis){
    if (strtolower($jenis) == "aktif") {
        $jenis = "aktif";
        $nama_file = "aktif_";
        $direktori = "/data/aktif/";
    }
    $jenis = "aktif";
    $nama_file = "aktif_";
    $direktori = "/data/aktif/";
    $tanggal = get_date();

    return $direktori.$nama_file.$tanggal.".json";

}

function get_date(){
    return date("Y-m-d_H-i-s");
}