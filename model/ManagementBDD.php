<?php

namespace P4\Model;

class ManagementBDD {
    public $_bd;

    function __construct()
    {
        $this->_bd = $this->AccesBDD();

    }

    private function AccesBDD(){
        $bd = new \PDO('mysql:host=localhost:8889;dbname=projet4;charset=utf8', 'root', 'root');
        return $bd;


    }

}