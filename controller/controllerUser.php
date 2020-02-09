<?php

require_once('model/model_user.php');

class ControllerUser{
    public function addUser(){
        require('view/view_registration.php');
    }

    public function registerUser(){
        $modelUser = new ManagementUser;
        $modelUser->tryPseudo($_POST['pseudo']);
    }

}