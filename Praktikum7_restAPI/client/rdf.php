<?php
include_once 'util/Utility.php';
include_once 'util/ApiService.php';
header('Content-Type: text/json');
$wsResponse = Utility::curl_get(ApiService::RDF_MAHASISWA_URL, array());
echo ($wsResponse);
