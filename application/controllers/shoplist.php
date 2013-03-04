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
                $result['Safeway_price'] += $item['Safeway_price'];
                $result['Luckys_price'] += $item['Luckys_price'];
                $result['TraderJoes_price'] += $item['TraderJoes_price'];
                $result['FoodsCo_price'] += $item['FoodsCo_price'];
                $result['MollieStonesMarket_price'] += $item['MollieStonesMarket_price'];
                $result['AndronicosCommunityMarket_price'] += $item['AndronicosCommunityMarket_price'];
                $result['TheRealFoodCompany_price'] += $item['TheRealFoodCompany_price'];
                $result['CALAFoods_price'] += $item['CALAFoods_price'];
                $result['LuckySupermarkets_price'] += $item['LuckySupermarkets_price'];
                return $result;
                }, array(
                    'Safeway_price' => 0,
                    'Luckys_price' => 0,
                    'TraderJoes_price' => 0,
                    'FoodsCo_price' => 0,
                    'MollieStonesMarket_price' => 0,
                    'AndronicosCommunityMarket_price' => 0,
                    'TheRealFoodCompany_price' => 0,
                    'CALAFoods_price' => 0,
                    'LuckySupermarkets_price' => 0
                    ));
        log_message('info', 'Totals ' . print_r($totals, true));

        // sort the totals array
        asort($totals);
        log_message('info', 'Totals Sorted' . print_r($totals, true));
    }
}

?>
