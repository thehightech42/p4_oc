<?php

require_once('model/ManagementUser.php');

class ControllerUser{
    public function addUser($userInformation = []){
        require('view/viewRegistration.php');
    }

    public function registerUser($first_name, $last_name, $pseudo, $mail, $password, $password1){
        $userInformation = [
            "first_name" => $first_name,
            "last_name" => $last_name,
            "pseudo" => $pseudo,
            "mail" => $mail
        ];
        if(preg_match('#[-_\.a-zA-Z0-9]+@[-a-zA-Z0-9]+\.[a-z]+$#', $mail)){
            if($password === $password1){
                $modelUser = new P4\Model\ManagementUser;
                $tryPseudo = $modelUser->tryPseudo($pseudo);
                $tryMail = $modelUser->tryMail($mail);

                $reqTryPseudo = $tryPseudo->rowcount();
                $reqTryMail = $tryMail->rowcount();

                if($reqTryPseudo !== 0 || $reqTryMail !== 0){
                    if($reqTryMail !== 0){
                        unset($userInformation["mail"]);
                    }
                    if($reqTryPseudo !== 0){
                        unset($userInformation["pseudo"]);
                    }
                    $this->addUser($userInformation);
                }else{
                    $pass_hash = password_hash($password, PASSWORD_DEFAULT);
                    $userRegister = $modelUser->registerUser($first_name, $last_name, $pseudo, $mail, $pass_hash);

                    header('Location: index.php?type=user&action=forSingIn');
                }
            }else{
                $this->addUser($userInformation);
            }
        }else{
            unset($userInformation["mail"]);
            $this->addUser($userInformation);
        }


    }
    public function singIn($pseudo, $password){
        $modelUser = new P4\Model\ManagementUser;
        $reqInformations = $modelUser->takeLoginInformation($pseudo);
        $informationsLogin = $reqInformations->fetch();

        $resultat = password_verify($password, $informationsLogin["pass_hash"]);

        if($resultat){
            $_SESSION['pseudo'] = $informationsLogin['pseudo'];
            $_SESSION['admin'] = $informationsLogin['admin'];
            $_SESSION['first_name'] = $informationsLogin['first_name'];
            $_SESSION['last_name'] = $informationsLogin['last_name'];

            header('Location: index.php?info=connexion-ok');
        }else{
            header('Location: index.php?type=user&action=forSingIn&info=echec');
        }
    }

    public function forSingIn(){
        require('view/viewSingIn.php');
    }

    public function endSession(){
        session_destroy();
        header('Location: http://localhost/P4/p4_oc');

    }

}

// regex mail [a-zA-Z0-9-_\.]+@[-a-zA-Z0-9]+\.[a-z]+$