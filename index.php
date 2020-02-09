//Routeur of website
<?php
require_once('controller/controller.php');

//$controller_front = new ControllerFront;

try {
    $controller_chapter = new ControllerChapter;
    if(isset($_GET['type']) && isset($_GET['action'])){

        if($_GET['type'] === "chapter"){
            if($_GET['action'] === 'chapter'){
                $controller_chapter->chapterAndComments($_GET['id']);

            }elseif($_GET['action'] === "chapterList"){
                $controller_chapter->chapterList();
            }
        }

        elseif($_GET['type'] === "user"){
                


            }

    }else{
        $controller_chapter = new ControllerChapter;
        $controller_chapter->chapterList();
    }

}
catch(Exception $e) {
    echo $e -> getMessage();

}
