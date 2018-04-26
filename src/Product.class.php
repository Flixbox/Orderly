<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Product {
    private $id;
    private $name;
    private $description;
    private $category;
    private $vat;
    private $amount;
    private $price;
    
    function getId() {
        return $this->id;
    }

    function getName() {
        return $this->name;
    }

    function getDescription() {
        return $this->description;
    }

    function getCategory() {
        return $this->category;
    }

    function getVat() {
        return $this->vat;
    }

    function getAmount() {
        return $this->amount;
    }
    
    function getPrice() {
        return $this->price;
    }

    function setId($id) {
        $this->id = $id;
        return $this;
    }

    function setName($name) {
        $this->name = $name;
        return $this;
    }

    function setDescription($description) {
        $this->description = $description;
        return $this;
    }

    function setCategory($category) {
        $this->category = $category;
        return $this;
    }

    function setVat($vat) {
        $this->vat = $vat;
        return $this;
    }

    function setAmount($amount) {
        $this->amount = $amount;
        return $this;
    }
    
    function setPrice($price) {
        $this->price = $price;
        return $this;
    }


}    
    
