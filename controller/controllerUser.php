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

                    var_dump($pass_hash);
                    //header('Location: index.php');
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
        $reqPassHash = $modelUser->takePassword($pseudo);
        $passHashBDD = $reqPassHash->fetch();

        $resultat = password_verify($password, $passHashBDD["pass_hash"]);

        if($resultat){
            var_dump($resultat);
            //header('Location: index.php?info=connexion-ok');
        }else{
            header('Location: index.php?type=user&action=forSingIn&info=echec');
        }
    }

    public function forSingIn(){
        require('view/viewSingIn.php');
    }

    public function endSession(){
        session_destroy();
        header('Location: index.php');

    }

}

// regex mail [a-zA-Z0-9-_\.]+@[-a-zA-Z0-9]+\.[a-z]+$