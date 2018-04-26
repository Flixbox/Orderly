<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Config {
    
    private static $prefix = "koeln/Orderly/src/";
    private static $root_url = "http://localhost/" . self::prefix;
    private static $super_name = "SuperController.class.php";
    private static $product_list = "ProductList.class.php";
    private static $cart = "Cart.class.php";
    private static $nav = "?nav=";
    public static $navbar = [
            [
                "url" => self::prefix . self::super_name,
                "content" => "Start"
            ],
            [
                "url" => self::prefix . self::super_name . self::nav . self::product_list,
                "content" => "Products"
            ]
        ];
    
    public static function get_super_url() {
        return self::$root_url . self::$super_name;
    } 
    
    public static $sql_path = "../sql/";
    
}
