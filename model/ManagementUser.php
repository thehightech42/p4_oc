<?php

namespace P4\Model;

require_once('BDD.php');

class ManagementUser extends BDD{


    public function tryPseudo($pseudo){

        $reqPseudo = $this->_bd->prepare('SELECT pseudo FROM users WHERE pseudo = :pseudo');
        $reqPseudo->execute(array('pseudo'=> $pseudo));
        return $reqPseudo;

    }

    public function tryMail($mail){
        $reqMail = $this->_bd->prepare('SELECT mail FROM users WHERE mail = :mail');
        $reqMail->execute(array('mail'=> $mail));
        return $reqMail;
    }

    public function takeLoginInformation($pseudo){
        $reqPass = $this->_bd->prepare('SELECT * FROM users WHERE pseudo = :pseudo');
        $reqPass->execute(array('pseudo'=> $pseudo));
        return $reqPass;
    }

    public function registerUser($first_name, $last_name, $pseudo, $mail, $pass_hash){
        $registerUser = $this->_bd->prepare('INSERT INTO users(pseudo, mail, admin, pass_hash, first_name, last_name, registration_date) VALUES( :pseudo, :mail, :admin, :pass_hash, :first_name, :last_name, NOW())');
        $registerUser->execute(array(
           'pseudo' => $pseudo,
           'mail' => $mail,
           'admin' => 0,
           'pass_hash' => $pass_hash,
           'first_name' => $first_name,
           'last_name' => $last_name,
        ));
    }




}