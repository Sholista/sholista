<?php
require_once(APPPATH.'libraries/REST_Controller.php');
class ShopList extends REST_controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Product');
        $this->load->model('Store');
    }

    public function index_post() {
        //log_message('info', print_r($this->post(), true));
        $p = new Product();
        $shoplist = $this->post('shoplist');
        $prodPrices = $p->getPrices($shoplist);
        //log_message('info', print_r($prodPrices, true));

        $pricelist = array();
        foreach ($shoplist as $i => $item) {
            $pricelist[$item['id']] = $shoplist[$i];
        }
        //log_message('info', 'Pricelist ' . print_r($pricelist, true));

        // get total prices for each store
        foreach ($prodPrices as $i => $prod) {
            $pricelist[$prod->ItemId]['Safeway_price'] =
                $pricelist[$prod->ItemId]['qty'] * $prod->Safeway;
            $pricelist[$prod->ItemId]['Luckys_price'] =
                $pricelist[$prod->ItemId]['qty'] * $prod->Luckys;
            $pricelist[$prod->ItemId]['TraderJoes_price'] =
                $pricelist[$prod->ItemId]['qty'] * $prod->TraderJoes;
            $pricelist[$prod->ItemId]['FoodsCo_price'] =
                $pricelist[$prod->ItemId]['qty'] * $prod->FoodsCo;
            $pricelist[$prod->ItemId]['MollieStonesMarket_price'] =
                $pricelist[$prod->ItemId]['qty'] * $prod->MollieStonesMarket;
            $pricelist[$prod->ItemId]['AndronicosCommunityMarket_price'] =
                $pricelist[$prod->ItemId]['qty'] * $prod->AndronicosCommunityMarket;
            $pricelist[$prod->ItemId]['TheRealFoodCompany_price'] =
                $pricelist[$prod->ItemId]['qty'] * $prod->TheRealFoodCompany;
            $pricelist[$prod->ItemId]['CALAFoods_price'] =
                $pricelist[$prod->ItemId]['qty'] * $prod->CALAFoods;
            $pricelist[$prod->ItemId]['LuckySupermarkets_price'] =
                $pricelist[$prod->ItemId]['qty'] * $prod->LuckySupermarkets;
        }
        log_message('info', 'Item prices ' . print_r($pricelist, true));

        // create the per-store totals array 
        $totals = array_reduce($pricelist, function($result, $item) {
                log_message('info', 'Item is ' . print_r($item, true));
                $result['Safeway'] += $item['Safeway_price'];
                $result['Luckys'] += $item['Luckys_price'];
                $result['Trader Joes'] += $item['TraderJoes_price'];
                $result['Foods Co'] += $item['FoodsCo_price'];
                $result['Mollie Stones Market'] += $item['MollieStonesMarket_price'];
                $result['Andronicos Community Market'] += $item['AndronicosCommunityMarket_price'];
                $result['The Real Food Company'] += $item['TheRealFoodCompany_price'];
                $result['CALA Foods'] += $item['CALAFoods_price'];
                $result['Lucky Supermarkets'] += $item['LuckySupermarkets_price'];
                return $result;
                }, array(
                    'Safeway' => 0,
                    'Luckys' => 0,
                    'Trader Joes' => 0,
                    'Foods Co' => 0,
                    'Mollie Stones Market' => 0,
                    'Andronicos Community Market' => 0,
                    'The Real Food Company' => 0,
                    'CALA Foods' => 0,
                    'Lucky Supermarkets' => 0
                    ));
        //log_message('info', 'Totals ' . print_r($totals, true));

        // sort the totals array
        asort($totals);
        //log_message('info', 'Totals Sorted' . print_r($totals, true));

        $this->response($totals);
    }
}

?>
