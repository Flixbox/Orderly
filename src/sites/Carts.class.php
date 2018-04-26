<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once '/HtmlHelper.class.php';
require_once '/SqlHelper.class.php';
require_once '/Util.class.php';
require_once '/Config.class.php';
require_once '/Product.class.php';

class Cart extends HtmlHelper {

    private $products = [];

    public function __construct() {
        parent::__construct($this->title);
        $this->read_products();
    }

    function getProducts() {
        return $this->products;
    }

}
