<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Products extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Product');
        $this->load->model('Store');
    }

	public function index()
	{
	    //SimpleUPCAPI
		$query=$this->input->get('query');
	    require_once (APPPATH.'libraries/simpleupcapi/SimpleUPCAPI.php');
	    require_once (APPPATH.'libraries/supermarketapi/SuperMarketAPI.php');
	    $obj=new SimpleUPCAPI();
	    $SimpleUPCAPIresult=$obj->searchProduct($query);

		log_message("info", "The result from SimpleUPC is " . print_r($SimpleUPCAPIresult, true));
		
		//SuperMarketAPI
		$storesURL = 'http://www.supermarketapi.com/api.asmx/StoresByCityState?APIKEY=' . SuperMarketAPIKey.
				'&SelectedCity=San%20Francisco&SelectedState=CA';
	    $SMStores=file_get_contents($storesURL);	
		

		log_message("info", "Stores response is: " . print_r($SMStores, true));

		$xml = simplexml_load_string($SMStores);

		$stores = $xml->Store;
		log_message("info" , "XML object array is: " . print_r($xml, true));
		$j=0;
        $s = new Store();
		foreach($stores as $i => $storeInstance) {
			// extract values nd loop again if needed
			$store[$j]['name']="$storeInstance->Storename";
			$store[$j]['storeid']="$storeInstance->StoreId";
			$store[$j]['address']="$storeInstance->Address";
			$store[$j]['city']="$storeInstance->City";
            //$s->add($store[$j]);
			$j++;
        }
		log_message("info", "Store array is : " . print_r($store, true));
		$itemIds=array ("Grapes Black Seedless");
		log_message("info", "ItemIds array is : " . print_r($itemIds, true));

		for($k=0;$k < sizeof($store); $k++) {
			for($l=0;$l < sizeof($itemIds); $l++) {
				$productsURL="http://www.supermarketapi.com/api.asmx/SearchForItem?APIKEY=" . SuperMarketAPIKey.	
					"&ItemName=" . urlencode($itemIds[$l]) . "&StoreId=" . $store[$k]['storeid']; 
	    		//log_message("info", "URL is " . $productsURL);
				$productPrices=file_get_contents($productsURL);	
				//log_message("Info", "product response for storeID " . $store[$k]['storeid'] . " and product " . $itemIds[$l]
							//. " is " . print_r($productPrices, true));
				$xml = simplexml_load_string($productPrices);
				log_message("Info", "Simple XML is " . print_r($xml, true));
			}
		}

        $header['title'] = 'Shopping Lists that are Awesome - Sholista.com';
        $p = new Product();
        $header['products'] = $p->all();
		$this->load->view('templates/header', $header);
		$this->load->view('products', $header);
		$this->load->view('templates/footer');
	}


    public function test() {
        $p = new Product();
        $header['title'] = 'Shopping Lists that are Awesome - Sholista.com';
        $header['products'] = $p->all();
        log_message('info', print_r($header['products'], true));
		$this->load->view('templates/header', $header);
		$this->load->view('products', $header);
		$this->load->view('templates/footer');
    }
}

?>
