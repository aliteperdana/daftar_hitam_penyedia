<?php
require "simple_html_dom.php";
include "functions.php";

$api_url = "https://inaproc.id/daftar-hitam/non-aktif";
$fetch_api = file_get_html($api_url);

$last_page = find_last_page($fetch_api);
// echo $last_page;

$ambil_script = find_script($fetch_api);

$data_non_aktif = ambil_data_dari_script($ambil_script);

echo $data_non_aktif;