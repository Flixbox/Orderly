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

class ProductList extends HtmlHelper {

    protected $title = "Product list";

    public function __construct() {
        parent::__construct($this->title);
        $this->get_products();
    }
    
    public function get_products() {
        $sql = Util::get_sql("get_all_products.sql");
        $products = $this->sqlHelper->execute($sql);
        var_dump($sql);
    }

}
