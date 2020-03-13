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
            $_SESSION['mail'] = $informationsLogin['mail'];
            $_SESSION['pseudo'] = $informationsLogin['pseudo'];
            $_SESSION['admin'] = $informationsLogin['admin'];
            $_SESSION['idUser'] = $informationsLogin['id'];
            $_SESSION['first_name'] = $informationsLogin['first_name'];
            $_SESSION['last_name'] = $informationsLogin['last_name'];
            /*setcookie('pseudo', $informationsLogin['pseudo'], time() + 365*24*3600, null, null, false, true);
            setcookie('password', $informationsLogin['pass_hash'], time() + 365*24*3600, null, null, false, true);*/
            header('Location: index.php');
        }else{
           $this->forSingIn();
        }
    }
    public function forSingIn(){
        require('view/viewSingIn.php');
    }
    public function endSession(){
        session_destroy();
        /*setcookie('pseudo');
        setcookie('password');
        unset($_COOKIE['pseudo']);
        unset($_COOKIE['password']);*/
        //ob_start();
        header('Location: index.php?type=home&info=end');
        //$redirect = ob_get_clean();
        //require('redirect.php');
        //echo '<script>window.location.href="index.php?type=home&info=end"</script>';
    }
    public function forManageAccount($id){
        if(is_string($id)){
            $reqInformations = $this->_managementUser->takeInformationWithId($id);
            $userInformation = $reqInformations->fetch();
            require('view/viewManageAccount.php');
        }
        else{
            $userInformation = $id;
            //var_dump($userInformation);
            require('view/viewManageAccount.php');
        }
    }
    public function manageAccount($first_name, $last_name, $pseudo, $mail){
        $tabUserInformation = [
            'first_name'=> $first_name,
            'last_name'=> $last_name,
            'pseudo'=> $pseudo,
            'mail'=>$mail
        ];
        $tryPseudo = $this->_managementUser->tryMail($mail);
        $tryMail = $this->_managementUser->tryPseudo($pseudo);
        $testPseudo = $tryPseudo->rowCount();
        $testMail = $tryMail->rowCount();
        $resultMail = $tryMail->fetch();
        $resultPseudo = $tryPseudo->fetch();
        var_dump($testPseudo, $testMail);
        if($pseudo === $_SESSION["pseudo"] &&  $mail === $_SESSION["mail"])
        {
            $this->_managementUser->updateUserInformation($first_name, $last_name, $pseudo, $mail);
            $_SESSION['mail'] = $mail;
            $_SESSION['pseudo'] = $pseudo;
            $_SESSION['first_name'] = $first_name;
            $_SESSION['last_name'] = $last_name;
            header('Location: index.php?type=chapter&action=chapterList');
        }
        elseif( ($pseudo !== $_SESSION["pseudo"] && $testPseudo !== 0) || ($mail !== $_SESSION["mail"] && $testMail !== 0) )
        {
            if($testPseudo !== 0 && $pseudo !== $_SESSION["pseudo"]){
                unset($tabUserInformation["pseudo"]);
            }
            if($testMail !== 0 && $mail !== $_SESSION["mail"]){
                unset($tabUserInformation["mail"]);
            }
            $this->forManageAccount($tabUserInformation);
        }
        else{
            $this->_managementUser->updateUserInformation($first_name, $last_name, $pseudo, $mail);
            $_SESSION['mail'] = $mail;
            $_SESSION['pseudo'] = $pseudo;
            $_SESSION['first_name'] = $first_name;
            $_SESSION['last_name'] = $last_name;

            header('Location: index.php?type=chapter&action=chapterList');
        }
    }
    public function forUpdatePassword(){
        require('view/viewUpdatePassword.php');
    }
    public function updatePassword($last_password, $new_password, $new_password1){
        $reqInformations = $this->_managementUser->takeInformationWithId($_SESSION['idUser']);
        $userInfo = $reqInformations->fetch();
        $testPassword = password_verify($last_password, $userInfo['pass_hash']);
        if($testPassword){
            if($new_password === $new_password1){
                $pass_hash = password_hash($new_password, PASSWORD_DEFAULT);
                $methodPassHash = $this->_managementUser->updatePassword($pass_hash);
                header('Location: index.php?type=chapter&action=chapterList');
            }else{
                require('view/viewUpdatePassword.php');
            }
        }else{
            require('view/viewUpdatePassword.php');
        }
    }
}

// regex mail [a-zA-Z0-9-_\.]+@[-a-zA-Z0-9]+\.[a-z]+$