<!--Routeur of website-->
<?php
session_start();

require_once('controller/controllerChapter.php');
require_once('controller/controllerUser.php');

if(isset($_GET['more'])){
    $more = $_GET['more'];
}else{
    $more = NULL;
}

try {
    $controller_chapter = new ControllerChapter;
        if(isset($_GET['type']) && isset($_GET['action'])){

            if($_GET['type'] === "chapter"){
                if($_GET['action'] === 'chapter'){
                    $controller_chapter->chapterAndComments($_GET['idChapter']);

                }elseif($_GET['action'] === "chapterList"){
                    $controller_chapter->chapterList($more);

                }elseif($_GET['action'] === "addChapter"){
                    $controller_chapter->addChapter();

                }elseif($_GET['action'] === "updateChapter"){
                    $controller_chapter->controlUpdateChapter();
                }
                elseif($_GET['action'] === "deleteChapter"){
                    $controller_chapter->deleteChapter($_GET['id']);
                }
                elseif($_GET['action'] === "addComment"){
                    $controller_chapter->addComment($_GET['idChapter'], $_POST['content']);

                }elseif($_GET['action'] === "reportComment"){
                    //var_dump($_GET['idChapter'], $_GET['idComment']);
                    $controller_chapter->reportComment($_GET['idComment'], $_GET['idChapter']);
                }

            }

            elseif($_GET['type'] === "user"){
                $controllerUser = new ControllerUser;
                if($_GET['action'] === 'add'){
                    $controllerUser->addUser();
                }elseif($_GET['action'] === "endSession"){
                    $controllerUser->endSession();
                }elseif($_GET['action'] === "forSingIn"){
                    $controllerUser->forSingIn();
                }

            }
            elseif($_GET['type'] === "home"){
                require('view/viewHome.php');
            }

            elseif($_GET['type'] === "test" && $_GET['action'] === "hash"){
                require('view/hash.php');
            }

        }
        else{
            //$controller_chapter = new ControllerChapter;
            //$controller_chapter->chapterList($more);
            require('view/viewHome.php');
        }

}
catch(Exception $e) {
    echo $e -> getMessage();

}
