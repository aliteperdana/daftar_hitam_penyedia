<?php
date_default_timezone_set('Asia/Jakarta');
require_once "simple_html_dom.php";

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

function find_last_page($html){
    foreach ($html->find("div[class=pagination]") as $key) {
        return $key->find("a",-1)->plaintext;
    }
}

function find_script($html){
    foreach ($html->find('script',-1) as $key) {
        if (is_object($key)) {
            break;
        }

        if(is_array($key)){
            foreach($key as $data){     
                if (strpos($data->plaintext, 'var daftarHitamCollection')) {
                   return $data->plaintext;
                }
            }
        }
    }
}

function ambil_data_dari_script($script){
    $ss = explode('var promise',$script);
    $sss = explode('var daftarHitamCollection = ',$ss[0]);
    return rtrim($sss[1],';');
}