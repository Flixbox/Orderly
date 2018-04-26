<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Util {

    public static function get_sql($name) {
        $path = Config::$sql_path;
        return self::read_file($path . $name);
    }

    public static function read_file($path) {
        if (!file_exists($path)) {
            var_dump($path);
        }
        return file_get_contents($path, FILE_USE_INCLUDE_PATH);
    }
    
    public static function number_to_price($number) {
        return $number . "€";
    }

}
