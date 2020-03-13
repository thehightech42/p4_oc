<?php
//namespace P4\Gestion;
class Autoloader{
   static function register(){
       spl_autoload_register(array(__CLASS__, 'autoload'));
   }
   static function autoload($class){
       $controller = strpos($class, 'Controller');
       $model = strpos($class, 'Management');
       $gestion = strpos($class, 'Gestion');
       if($controller !== FALSE){
           $class = str_replace('P4\Controller\\', 'controller/', $class);
           require($class.".php");
       }
       elseif($model !== FALSE){
           $class = str_replace('P4\Model\\', 'model/', $class);
           require($class.".php");
       }
       elseif ($gestion !== FALSE){
           $class = str_replace('P4\Gestion\\', 'gestion/', $class);
           require($class.".php");
       }
   }
}

//   ' ..... \\ '               '/homepages/11/d711207066/htdocs/p4/....'