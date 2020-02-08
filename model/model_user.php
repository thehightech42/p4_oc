<?php

require_once('model.php');

class ManagementUser extends BDD{

    public function registration(){
        $bd = $this->AccesBDD();

    }

    public function testUser(){
        $bd = $this->AccesBDD();
    }


}