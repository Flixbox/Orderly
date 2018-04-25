<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Util {
    
    public static function get_sql($name) {
        $path = Config::$sql_path;
        self::read_file($path . $name);
    } 
    
    public static function read_file($path) {
        return file_get_contents($path);
    }
}