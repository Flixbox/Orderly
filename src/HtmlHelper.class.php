<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once '/SqlHelper.class.php';
require_once '/Util.class.php';
require_once 'Config.class.php';

class HtmlHelper {

    
    protected $sqlHelper;
    protected $title;

    public function __construct($title) {
        ini_set("display_errors", 1);
        session_start();
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
        if($content != "") {
            $content = PHP_EOL . $content . PHP_EOL;
        }
        return
                "<$tag_name $attributes_string>" .
                $content
                . "</$tag_name>" .
                PHP_EOL;
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
        var_dump(Config);
        foreach (Config::navbar as $element) {
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

    public function create_button($content, array $attributes) {
        return $this->create_tag("button", $content, $attributes);
    }

    public function create_link(array $attributes) {
        return $this->create_tag("link", "", $attributes);
    }

    public function create_script(array $attributes) {
        return $this->create_tag("script", "", $attributes);
    }

    public function create_p($content, array $attributes = []) {
        return $this->create_tag("p", $content, $attributes);
    }

    public function create_input(array $attributes) {
        return $this->create_tag("input", "", $attributes);
    }

    public function create_form($content, array $attributes) {
        return $this->create_tag("form", $content, $attributes);
    }

    public function set_p($content) {
        $this->set_tag("p", $content);
        return $this;
    }

    public function set_head() {
        $content = "";
        $html = "<!doctype html>" . PHP_EOL . "<html>" . PHP_EOL;
        $content .= $this->create_tag("title", $this->title);
        $content .= $this->
                create_link(
                [
                    "href" => "../assets/css/bootstrap.min.css",
                    "rel" => "stylesheet"
                ]
        );
        $content .= $this->
                create_link(
                [
                    "href" => "../assets/css/material-kit.min.css",
                    "rel" => "stylesheet"
                ]
        );
        $content .= $this->
                create_link(
                [
                    "href" => "../assets/css/custom.css",
                    "rel" => "stylesheet"
                ]
        );
        $head = $this->create_tag("head", $content);
        $html .= $head;
        $html .= "<body>" . PHP_EOL;
        echo $html;
        return $this;
    }

    public function set_header() {
        $content = $this->create_nav();
        $this->set_tag("header", $content);
        return $this;
    }

    public function set_footer() {
        $content = $this->create_p("I'm a footer!");
        $content .= $this->create_script(["src" => "../assets/js/jquery.min.js"]);
        $content .= $this->create_script(["src" => "../assets/js/core/popper.min.js"]);
        $content .= $this->create_script(["src" => "../assets/js/bootstrap-material-design.min.js"]);
        $content .= $this->create_script(["src" => "../assets/js/material-kit.min.js"]);
        $footer = $this->create_tag("footer", $content);
        $this->write($footer);
        return $this;
    }

    public function write($content) {
        echo $content;
    }

    public function __destruct() {
        $this->set_footer();
        echo "</body>" . PHP_EOL . "</html>";
    }

}
