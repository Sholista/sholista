<?php

class Product extends CI_Model {
    var $has_one = array('id', 'name');
    var $validation = array();

    public function all() {
        $query = 'select * from products';
        $res = $this->db->query($query);
        return $res->result();
    }

}

?>
