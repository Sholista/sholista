<?php


class SimpleUPCAPI
{

    $SimpleUPCAPIKey = 'CrlRcFVoXg51XNwPt0HoS5aPHSshWsPT';
    $url = "http://api.simpleupc.com/v1.php";
    
    public function fetchImage($upc){
	$request = array("auth"=>$SimpleUPCAPIKey,
			"method"=>'FetchImageByUPC',
			"params"=>array("upc"=>'041383096013',),
				);

	$json = json_encode ($request);

	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: text/json'));
	curl_setopt($ch, CURLOPT_POSTFIELDS, "$json");
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$output = curl_exec($ch);
	curl_close($ch);

	return $output;
    }//fetchImage

}//class
?>
