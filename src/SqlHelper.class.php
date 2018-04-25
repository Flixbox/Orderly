<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class SqlHelper {

    protected $pdo;

    public function __construct() {
        
    }

    public function createPDO() {
        $this->pdo = new PDO(
                'mysql:host=localhost;dbname=webproject', 'webprojekt', 'Start123+++', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"]
        );
    }

    public function connect() {
        try {
            createPDO();
        } catch (PDOException $ex) {
            echo $e->getMessage();
            die("<p>Datenbank konnte nicht konnektiert werden ...</p>");
        }
    }
    