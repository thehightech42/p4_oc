<!--Routeur of website-->
<?php
require_once('controller/controllerChapter.php');
require_once('controller/controllerUser.php');

try {
    $controller_chapter = new ControllerChapter;
        if(isset($_GET['type']) && isset($_GET['action'])){

            if($_GET['type'] === "chapter"){
                if($_GET['action'] === 'chapter'){
                    $controller_chapter->chapterAndComments($_GET['id']);

                }elseif($_GET['action'] === "chapterList"){
                    $controller_chapter->chapterList();

                }elseif($_GET['action'] === "addComment"){
                    $controller_chapter->addComment();

                }elseif($_GET['action'] = "addChapter"){
                    $controller_chapter->addChapter();

                }
            }

            elseif($_GET['type'] === "user"){
                $controllerUser = new ControllerUser;
                if($_GET['action'] === 'add'){
                    $controllerUser->addUser();
                }elseif($_GET['action'] === 'register'){

                }elseif($_GET['action'] === "endSession"){
                    $controllerUser->endSession();
                }


            }

        }else{
            $controller_chapter = new ControllerChapter;
            $controller_chapter->chapterList();
        }

}
catch(Exception $e) {
    echo $e -> getMessage();

}
