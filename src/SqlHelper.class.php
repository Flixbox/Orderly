<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class SqlHelper {

    protected $pdo;
    
    protected $htmlHelper;

    public function __construct($htmlHelper) {
        $this->htmlHelper = $htmlHelper;
        $this->connect();
    }

    private function createPDO() {
        $this->pdo = new PDO(
                'mysql:host=localhost;dbname=webproject', 'webprojekt', 'Start123+++', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"]
        );
    }

    public function connect() {
        try {
            $this->createPDO();
        } catch (PDOException $e) {
            $this->htmlHelper->setError($e->getMessage());
        }
    }

    public function execute($sql, array $params = []) {
        try {
            if ($params == []) {
                return $this->create($sql);
            } else {
                return $this->prepare($sql, $params);
            }
        } catch (Exception $ex) {
            $this->htmlHelper->set_p("Var dump of SQL: ");
            var_dump($sql);
            $this->htmlHelper->set_error($ex->getMessage());
        }
    }

    private function prepare($sql, array $params) {
        $sth = $this->pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $sth->execute($params);
        return $sth->fetchAll();
    }

    private function create($sql) {
        return $this->pdo->query($sql);
    }
}
