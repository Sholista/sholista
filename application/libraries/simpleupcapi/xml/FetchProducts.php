<?php

$url = "http://api.simpleupc.com/v1.php";

$xml = '<?xml version="1.0"?>
<request>
    <auth>Your Auth Code</auth>
	<method>FetchProducts</method>
	<params>
		<search>Lactaid</search>
		<field>brand</field>
		<requirenutrition>true</requirenutrition>
		<matchtype>exact</matchtype>
		<limit>10</limit>
		<offset>10</offset>
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