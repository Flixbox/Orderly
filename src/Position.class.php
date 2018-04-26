<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Position {

    private $id;
    private $amount;
    private $vat;
    private $price;
    private $order;
    private $product;

    public function __construct() {
        
    }

    function getId() {
        return $this->id;
    }

    function getAmount() {
        return $this->amount;
    }

    function getVat() {
        return $this->vat;
    }

    function getPrice() {
        return $this->price;
    }

    function getOrder() {
        return $this->order;
    }

    function getProduct() {
        return $this->product;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setAmount($amount) {
        $this->amount = $amount;
    }

    function setVat($vat) {
        $this->vat = $vat;
    }

    function setPrice($price) {
        $this->price = $price;
    }

    function setOrder($order) {
        $this->order = $order;
    }

    function setProduct($product) {
        $this->product = $product;
    }

}
