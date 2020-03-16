<?php
namespace P4\Controller;
use P4\Model\ManagementUser;
ob_start();
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
                header("Status: 301 Move permanently", false, 301);
                header('Location: /?type=user&action=forSingIn', true);
                exit();
            }
        }else{
            $this->addUser($userInformation);
        }
    }
    public function sinIn($pseudo, $password){
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
            header('Location: /', TRUE);
        }else{
           header('Location: /?type=user&action=forSinIn&info=echec');
        }
    }
    public function forSinIn(){
        require('view/viewSinIn.php');
    }
    public function endSession(){
        session_destroy();
        header('Location: /?type=home&info=end');
    }
    public function forManageAccount($id){
        if(is_string($id)){
            $reqInformations = $this->_managementUser->takeInformationWithId($id);
            $userInformation = $reqInformations->fetch();
            require('view/viewManageAccount.php');
        }
        else{
            $userInformation = $id;
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
        if($testPseudo === 0 || $pseudo === $_SESSION['pseudo'] && $testMail === 0 || $mail === $_SESSION['mail']){
            $this->_managementUser->updateAllUserInformation($first_name, $last_name, $pseudo, $mail);
            $_SESSION['mail'] = $mail;
            $_SESSION['pseudo'] = $pseudo;
            $_SESSION['first_name'] = $first_name;
            $_SESSION['last_name'] = $last_name;
            header('Location: /?type=chapter&action=chapterList');
        }elseif ($testMail !== 0 || $testPseudo !== 0){
            if($testPseudo !== 0 && $pseudo !== $_SESSION["pseudo"]){
                unset($tabUserInformation["pseudo"]);
            }
            if($testMail !== 0 && $mail !== $_SESSION["mail"]){
                unset($tabUserInformation["mail"]);
            }
            $this->_managementUser->updateNamesUser($first_name, $last_name);
            $this->forManageAccount($tabUserInformation);
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
                header('Location: /?type=chapter&action=chapterList');
            }else{
                require('view/viewUpdatePassword.php');
            }
        }else{
            require('view/viewUpdatePassword.php');
        }
    }
    public function forContact(){
        require('view/viewContact.php');
    }

    public function contact($name, $mail, $subject, $message){
        $entete  = 'MIME-Version: 1.0' . "\r\n";
        $entete .= 'Content-type: text/html; charset=utf-8' . "\r\n";
        $entete .= 'From: ' . $mail . "\r\n";

        $message = '<h4>Message du site " Billet simple pour l\'Alaska ”</h4>
        <p><b>Nom : </b>' . $name . '<br>
        <b>Email : </b>' . $mail . '<br>
        <b>Message : </b>' . $message . '</p>';

        $retour = mail('antonin.pfistner@gmail.com', $subject, $message, $entete);
        if($retour) {
            echo '<p>Votre message a bien été envoyé.</p>';
            $this->forContact();
        }else{
            $this->forContact();
        }
    }
}