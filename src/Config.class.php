<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Config {
    
    private static $root_url = "http://localhost/koeln/orderly/src/";
    private static $super_name = "SuperController.class.php";
    
    public static function get_super_url() {
        return self::$root_url . self::$super_name;
    } 
    
    public static $sql_path = "../sql/";
    
}
