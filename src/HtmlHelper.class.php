<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class HtmlHelper {

    protected $prefix = "koeln/Orderly/src/";
    protected $sqlHelper;
    protected $title;

    public function __construct($title) {
        ini_set("display_errors", 1);
        $this->title = $title;
        $this->sqlHelper = new SqlHelper($this);
        $this
                ->set_head()
                ->set_header();
    }

    public function set_error($content) {
        $this->set_p($content);
        die();
    }

    public function create_tag($tag_name, $content, array $attributes = []) {
        $attributes_string = $this->build_attributes_string($attributes);
        return "<$tag_name $attributes_string>$content</$tag_name>".PHP_EOL;
    }

    public function set_tag($tag_name, $content, array $attributes = []) {
        echo $this->create_tag($tag_name, $content, $attributes);
        return $this;
    }

    private function build_attributes_string(array $attributes) {
        // var_dump($attributes);
        $attributes_string = "";
        foreach ($attributes as $key => $value) {

            $attributes_string .= " ";
            $attributes_string .= "$key=\"$value\"";
        }
        return $attributes_string;
    }

    public function create_nav() {
        $li = $this->create_nav_li();
        $ul = $this->create_ul($li, ["class" => "navbar-nav"]);

        $attributes = [
            "class" => "navbar navbar-expand-lg navbar-light bg-light"
        ];
        return $this->create_tag("nav", $ul, $attributes);
    }

    public function create_nav_li() {
        $li = "";
        $urls = [
            [
                "url" => $this->prefix . "index.php",
                "content" => "Start"
            ],
            [
                "url" => $this->prefix . "ProductList.class.php",
                "content" => "Products"
            ]
        ];
        foreach ($urls as $element) {
            foreach ($element as $key => $value) {
                switch ($key) {
                    case "url":
                        $url = $value;
                        break;
                    case "content":
                        $content = $value;
                }
            }
            $a = $this->create_a(
                    $content, ["href" => $url, "class" => "nav-link"]
            );
            $li .= $this->create_li(
                    $a, ["href" => $url, "class" => "nav-item active"]
            );
        }
        return $li;
    }

    public function create_div($content, array $attributes = []) {
        return $this->create_tag("div", $content, $attributes);
    }

    public function create_ul($content, array $attributes = []) {
        return $this->create_tag("ul", $content, $attributes);
    }

    public function create_li($content, array $attributes = []) {
        return $this->create_tag("li", $content, $attributes);
    }

    public function create_a($content, array $attributes) {
        return $this->create_tag("a", $content, $attributes);
    }
    
    public function create_link(array $attributes) {
        return $this->create_tag("link", "", $attributes);
    }
    
    public function create_script(array $attributes) {
        return $this->create_tag("script", "", $attributes);
    }
    
    public function create_p($content, array $attributes) {
        return $this->create_tag("p", $content, $attributes);
    }
    
    public function create_input(array $attributes) {
        return $this->create_tag("input", "", $attributes);
    }

    public function set_p($content) {
        $this->set_tag("p", $content);
        return $this;
    }

    public function set_head() {
        $content = "";
        $html = "<!doctype html>".PHP_EOL."<html>".PHP_EOL;
        $content .= $this->create_tag("title", $this->title);
        $content .= $this->
                create_link(
                        [
                            "href" => "../assets/css/bootstrap.min.css",
                            "rel" => "stylesheet"
                            ] 
                        );
        $head = $this->create_tag("head", $content);
        $html .= $head;
        $html .= "<body>".PHP_EOL;
        echo $html;
        return $this;
    }

    public function set_header() {
        $content = $this->create_nav();
        $this->set_tag("header", $content);
        return $this;
    }

    public function set_footer() {
        $this->set_p("I'm a footer!");
        return $this;
    }
    
    public function write($content) {
        echo $content;
    }

    public function __destruct() {
        $this->set_footer();
        echo "</body>".PHP_EOL."</html>";
    }

}
