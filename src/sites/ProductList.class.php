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
require_once '/Product.class.php';

class ProductList extends HtmlHelper {

    protected $title = "Product list";
    private $products = [];

    public function __construct() {
        parent::__construct($this->title);
        $this->read_products();
    }

    function getProducts() {
        return $this->products;
    }

    public function read_products() {
        $sql = Util::get_sql("get_all_products.sql");
        $products_array = $this->sqlHelper->execute($sql);
        $this->array_to_products($products_array);
        $this->set_cards();
    }

    public function array_to_products(array $product_list) {
        foreach ($product_list as $row) {
            $product = new Product();
            $product
                    ->setId($row["id"])
                    ->setName($row["name"])
                    ->setDescription($row["description"])
                    ->setVat($row["vat"])
                    ->setAmount($row["amount"])
                    ->setPrice($row["price"])
                    ->setCategory($row["rubrik"]);
            $this->products[] = $product;
        }
    }

    public function set_cards(){
        $row_contents = "";
        foreach ($this->products as $product) {
            $card_contents = "";
            $card_body = "";
            
            $card_contents .= $this->create_div("Nur noch " . $product->getAmount() . " auf Lager!", ["class"=>"card-header"]);
            $card_body .= $this->create_tag("h5", $product->getName(), ["class"=>"card-title"]);
            $card_body .= $this->create_tag("h6", Util::number_to_price($product->getPrice()), ["class"=>"card-subtitle mb-2 text-muted"]);
            $card_body .= $this->create_p($product->getDescription(), ["class"=>"card-text"]);
            $card_body .= $this->create_input(["class"=>"", "type"=>"number", "id"=>"amount", "value"=>"0", "name"=>$product->getId()]);
            $card_contents .= $this->create_div($card_body, ["class"=>"card-body"]);
            $card_contents .= $this->create_div($product->getCategory(), ["class"=>"card-footer"]);
            $card = $this->create_div($card_contents, ["class"=>"card"]);
            $card_column = $this->create_div($card, ["class"=>"col-sm-2"]);
            
            $row_contents .= $card_column;
        }
        $row = $this->create_div($row_contents, ["class"=>"row"]);
        $container = $this->create_div($row, ["class"=>"container"]);
        $this->write($container);
    }
}
