<?php
include 'functions.php';

$api_url = "https://inaproc.id/api/blacklist/";
$fetch_data_from_api = file_get_contents($api_url);
$data = json_decode($fetch_data_from_api,true);

$total_data_tersedia = $data['meta']['total'];
echo $total_data_tersedia;

$api_url_all_data = $api_url."?per_page=".$total_data_tersedia;
$fetch_data_from_api = file_get_contents($api_url_all_data);
$all_data = json_decode($fetch_data_from_api,true);

$data_save = json_encode($all_data['data'],JSON_PRETTY_PRINT);
file_put_contents(nama_file('aktif'),$data_save);