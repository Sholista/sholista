<?php
//Sample API calls using JSON...

$url = "http://api.simpleupc.com/v1.php";

//An example query for FetchNutritionFactsByUPC method
$request = array(	"auth"=>'Your Auth Code',
					"method"=>'FetchNutritionFactsByUPC',
					"params"=>array("upc"=>'041383096013',
									),
				);

$json = json_encode ($request);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: text/json'));
curl_setopt($ch, CURLOPT_POSTFIELDS, "$json");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$output = curl_exec($ch);
curl_close($ch);

echo $output;

?>