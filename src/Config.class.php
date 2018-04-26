<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Config {

    const PREFIX = "koeln/Orderly/src/";
    const ROOT_URL = "http://localhost/" . self::PREFIX;
    const SUPER_NAME = "SuperController.class.php";
    const PRODUCT_LIST = "ProductList.class.php";
    const CART = "Cart.class.php";
    const NAV = "?nav=";
    const SQL_PATH = "../sql/";
    const NAVBAR = [
        [
            "url" => self::SUPER_NAME,
            "content" => "Start"
        ],
        [
            "url" => self::SUPER_NAME . self::NAV . self::PRODUCT_LIST,
            "content" => "Products"
        ],
        [
            "url" => self::SUPER_NAME . self::NAV . self::CART,
            "content" => "Cart"
        ]
    ];

    public static function get_super_url() {
        return self::ROOT_URL . self::SUPER_NAME;
    }

}
