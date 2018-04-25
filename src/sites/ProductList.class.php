<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class ProductList extends HtmlHelper {

    protected $title = "Product list";

    public function __construct() {
        parent::__construct($this->title);
    }

}

$list = new ProductList();
