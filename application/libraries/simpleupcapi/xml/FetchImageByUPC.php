<?php

$url = "http://api.simpleupc.com/v1.php";

$xml = '<?xml version="1.0"?>
<request>
    <auth>Your Auth Code</auth>
	<method>FetchImageByUPC</method>
	<params>
		<upc>041383096013</upc>
	</params>
</request>';

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: text/xml'));
curl_setopt($ch, CURLOPT_POSTFIELDS, "$xml");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$output = curl_exec($ch);
curl_close($ch);

echo $output;
			
			
?>