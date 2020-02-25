<?php

namespace P4\Model;

class BDD {
    public $_bd;

    function __construct()
    {
        $this->_bd = $this->AccesBDD();

    }

    private function AccesBDD(){
        $bd = new \PDO('mysql:host=localhost;dbname=projet4;charset=utf8', 'root', '');
        return $bd;


    }

}