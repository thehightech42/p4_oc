<?php
namespace P4\Model;
class ManagementBDD {
    public $_bd;
    function __construct()
    {
        $this->_bd = $this->AccesBDD();
    }
    private function AccesBDD(){
        require('env.php');
        $bd = new \PDO('mysql:host='.$domaineBDD.';dbname='.$BDDName.';charset=utf8', ''.$username.'', ''.$password.'');
        /*
        if(!is_object($bd)){
            throw new \Exception('Erreur de connexion à la BDD, merci de contacter l\'administrateur ou de vous reconnecter plus tard.');
           // die('Erreur de connexion à la BDD, merci de contacter l\'administrateur ou de vous reconnecter plus tard .');
        }*/
        try{
            $bd = new \PDO('mysql:host='.$domaineBDD.';dbname='.$BDDName.';charset=utf8', ''.$username.'', ''.$password.'');
        }catch (\Exception $e){
            throw new \Exception('Erreur de connexion à la BDD, merci de contacter l\'administrateur ou de vous reconnecter plus tard.');
        }
        return $bd;
    }
}