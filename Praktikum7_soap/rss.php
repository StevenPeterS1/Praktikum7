<?php
header('Content-Type: text/xml');
require_once('lib/nusoap.php');
$client = new nusoap_client('http://localhost/Praktikum7/Praktikum7_soap/server/server.php?wsdl', true);
echo ($client->call('readxml', array()));
