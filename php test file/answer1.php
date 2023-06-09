<?php

$url = 'http://ftp.geoinfo.msl.mt.gov/Documents/Metadata/GIS_Inventory/35524afc-669b-4614-9f44-43506ae21a1d.xml';

// Load XML data from the URL
$xml = simplexml_load_file($url);

// Convert XML to JSON
$json = json_encode($xml);

// Output the JSON data
echo $json;
