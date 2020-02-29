<?php
namespace P4\Controller;

use P4\Model\ManagementUser;


class ControllerUser{
    private $_managementUser;

    function __construct()
    {
        $this->_managementUser = new ManagementUser;
    }

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
                $tryPseudo = $this->_managementUser->tryPseudo($pseudo);
                $tryMail = $this->_managementUser->tryMail($mail);

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
                    $userRegister = $this->_managementUser->registerUser($first_name, $last_name, $pseudo, $mail, password_hash($password, PASSWORD_DEFAULT));

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
        $reqInformations = $this->_managementUser->takeLoginInformation($pseudo);

        $informationsLogin = $reqInformations->fetch();

        $resultat = password_verify($password, $informationsLogin["pass_hash"]);

        if($resultat){
            $_SESSION['pseudo'] = $informationsLogin['pseudo'];
            $_SESSION['admin'] = $informationsLogin['admin'];
            $_SESSION['first_name'] = $informationsLogin['first_name'];
            $_SESSION['last_name'] = $informationsLogin['last_name'];

            setcookie('pseudo', $informationsLogin['pseudo'], time() + 365*24*3600, null, null, false, true);
            setcookie('admin', $informationsLogin['admin'], time() + 365*24*3600, null, null, false, true);
            setcookie('first_name', $informationsLogin['first_name'], time() + 365*24*3600, null, null, false, true);
            setcookie('last_name', $informationsLogin['last_name'], time() + 365*24*3600, null, null, false, true);
            setcookie('password', $informationsLogin['pass_hash'], time() + 365*24*3600, null, null, false, true);


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
        setcookie("pseudo", '', time());
        setcookie("password", '', time());

        header('Location: index.php');

    }

}

// regex mail [a-zA-Z0-9-_\.]+@[-a-zA-Z0-9]+\.[a-z]+$