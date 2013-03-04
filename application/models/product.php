<?php

class Product extends CI_Model {
    var $has_one = array('id', 'name');
    var $validation = array();

    public function all() {
        $query = 'select * from products';
        $res = $this->db->query($query);
        return $res->result();
    }

    public function getPrices($shoplist) {
        $query = 'select * from products where ItemId in (' . 
                array_reduce($shoplist, function($result, $item) {
                    return (empty($result) ? '' : "$result,") . $item['id'];
                    }, '') . ')';
        //log_message('info', "Query $query");
        $res = $this->db->query($query);
        return $res->result();
    }

}

?>
