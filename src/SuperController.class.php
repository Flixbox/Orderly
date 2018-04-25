<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once '/sites/ProductList.class.php';
require_once '/HtmlHelper.class.php';
require_once '/SqlHelper.class.php';

class SuperController {
    
    
    public function navigate() {
        $nav = $_GET["nav"];
        switch($nav) {
            case "Product_List":
                $this->create_product_list();
                break;
            default:
                $this->create_product_list();
                break;
        }
    }
    
    
    public function create_product_list() {
        
    }
    
    public function 
}
