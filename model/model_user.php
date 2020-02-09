<?php

require_once('model.php');

class ManagementUser extends BDD{

    public function tryUser(){
        $bd = $this->AccesBDD();


    }

    public function tryPseudo($pseudo){
        $bd = $this->AccesBDD();
        $reqPseudo = $bd->prepare('SELECT pseudo FROM users WHERE pseudo = :pseudo');
        $reqPseudo->execute(array('pseudo'=> $pseudo));
        return $reqPseudo;

    }

    public function tryMail($mail){
        $bd = $this->AccesBDD();
        $reqMail = $bd->prepare('SELECT pseudo FROM users WHERE pseudo = :mail');
        $reqMail->execute(array('pseudo'=> $mail));
        return $reqMail;
    }

    public function tryPassword($pseudo){
        $bd = $this->AccesBDD();
        $reqPass = $bd->prepare('SELECT pass_hash FROM users WHERE pseudo = :pseudo');
        $reqPass->execute(array('pseudo'=>$pseudo));
        return $reqPass;
    }




}