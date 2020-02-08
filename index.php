//Routeur of website
<?php
require_once('controller/controller.php');

//$controller_front = new ControllerFront;

try {
    $controller_front = new ControllerFront;
    if(isset($_GET['action'])){
        if($_GET['action'] === 'chapter'){
            $controller_front->chapterAndComments($_GET['id']);

        }elseif($_GET['action'] === "chapterList"){
            $controller_front->chapterList();
        }
    }else{
        $controller_front->chapterList();
    }

}
catch(Exception $e) {
    echo $e -> getMessage();

}
