<?php
header('Content-Type: text/json');
require_once('lib/nusoap.php');
$client = new nusoap_client('http://localhost/Praktikum7/Praktikum7_soap/server/server.php?wsdl', true);
echo ($client->call('readrdf', array()));
