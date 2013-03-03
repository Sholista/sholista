<?php

class SimpleUPCAPI
{

    var $SimpleUPCAPIKey = 'CrlRcFVoXg51XNwPt0HoS5aPHSshWsPT';
    var $url = "http://api.simpleupc.com/v1.php";
    
    public function fetchImage($upc){
	$request = array("auth"=>$SimpleUPCAPIKey,
			"method"=>'FetchImageByUPC',
			"params"=>array("upc"=>$upc,),
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

    public function fetchNutrition($upc){
	$request = array("auth"=>$SimpleUPCAPIKey,
			"method"=>'FetchNutritionFactsByUPC',
			"params"=>array("upc"=>$upc,),
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
    }//fetchNutrition

public function searchProduct($query){
	$request = array ( "auth"=>$SimpleUPCAPIKey,
                           "method"=>'FetchProducts',
                           "params"=> array("search"=> $query,
        	               "field" => 'description',
			       "requirenutrition" => True,
			       "matchtype" => 'present',
			       "limit" =>      20,
			       "offset" => 20,
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

	return $output;
    }//fetchProduct

public function fetchProductByUPC($upc){
	$request = array("auth"=>$SimpleUPCAPIKey,
			"method"=>'FetchProductByUPC',
			"params"=>array("upc"=>$upc,),
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
    }//fetchProductByUPC

}//class
?>
