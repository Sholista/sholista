<?php

class Product extends Datamapper {
    var $has_one = array('id', 'name');
    var $validation => array();
}
