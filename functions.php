<?php
date_default_timezone_set('Asia/Jakarta');

function nama_file($jenis){
    if (strtolower($jenis) == "aktif") {
        $jenis = "aktif";
        $nama_file = "aktif_";
        $direktori = "data/aktif/";
    }
    $jenis = "aktif";
    $nama_file = "aktif_";
    $direktori = "data/aktif/";
    $tanggal = get_date();

    return $direktori.$nama_file.$tanggal.".json";

}

function get_date(){
    return date("Y-m-d_H-i-s");
}

function find_file_hari_ini($jenis){
    if (strtolower($jenis) == "aktif") {
        $jenis = "aktif";
        $nama_file = "aktif_";
        $direktori = "data/aktif/";
    }

    $tanggal_hari_ini = date("Y-m-d");
    $keyword = $direktori.$nama_file.$tanggal_hari_ini."*";
    $files = glob($keyword);

    if(count($files)>0){
        return true;
    }

    return false;
}
