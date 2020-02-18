<?php

namespace P4\Model;

class BDD {

    protected function AccesBDD(){
        $bd = new \PDO('mysql:host=localhost:8889;dbname=projet4;charset=utf8', 'root', 'root');
        return $bd;

    }

}