<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once 'SqlHelper.class.php';

class HtmlHelper {

    protected $sqlHelper;
    protected $title;

    public function __construct() {
        $this->sqlHelper = new SqlHelper($this);
        $this->set_head();
    }

    public function set_error($content) {
        set_p($content);
        die();
    }

    private function create_tag($tag_name, $content, array $attributes = []) {
        $attributes_string = $this->build_attributes_string($attributes);
        return "<$tag_name $attributes_string>$content</$tag_name>/n";
    }

    public function set_tag($tag_name, $content, array $attributes = []) {
        echo $this->create_tag($tag_name, $content, $attributes);
        return $this;
    }

    private function build_attributes_string(array $attributes) {
        $attributes_string = "";
        foreach ($attributes as $element) {
            foreach ($element as $key => $value) {

                $attributes_string .= " ";
                $attributes_string .= "$key=$value";
            }
        }
        return $attributes_string;
    }

    public function create_nav($content) {
        $attributes[] = [
            "class" => "nav"
        ];
        return $this->create_tag("nav", $content, $attributes);
       
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

    public function set_p($content) {
        $this->set_tag("p", $content);
        return $this;
    }

    public function set_head() {
        $html = "<!doctype html>\n<html>\n";
        $title = $this->create_tag("title", $title);
        $head = $this->create_tag("head", $title);
        $html .= $head;
        $html .= "<body>\n";
        echo $html;
        return $this;
    }

    public function set_header() {
        $content = $this->create_nav($nav_content);
        $this->set_tag("header", $content);
        
    }

    public function set_footer() {
        
    }

    public function __destruct() {
        echo "</body>\n</html>";
    }

}
