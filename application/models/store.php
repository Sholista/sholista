<?php

class Store extends CI_Model {

    public function add($store) {
        log_message('info', 'Store is '. print_r($store, true));
        $this->db->insert('stores', $store);
    }

}

?>
