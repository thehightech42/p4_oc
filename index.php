<!--Routeur of website-->
<?php
session_start();

require_once('controller/controllerChapter.php');
require_once('controller/controllerUser.php');


try {
    $controller_chapter = new ControllerChapter;
        if(isset($_GET['type']) && isset($_GET['action'])){

            if($_GET['type'] === "chapter"){
                if($_GET['action'] === 'chapter'){
                    $controller_chapter->chapterAndComments($_GET['idChapter']);
                }
                elseif($_GET['action'] === "chapterList"){
                    $controller_chapter->chapterList();
                }
                elseif($_GET['action'] === "forAddChapter"){
                    $controller_chapter->addChapter();
                }
                elseif($_GET['action'] === "addChapter"){
                    $controller_chapter->registerChapter();
                }
                elseif($_GET['action'] === "forUpdateChapter"){
                    $controller_chapter->forUpdateChapter($_GET['idChapter']);
                }
                elseif($_GET['action'] === "updateChapter"){
                    $controller_chapter->updateChapter($_GET['idChapter'], $_POST['chapter_name'], $_POST['chapter_number'], $_POST['chapter_content']);
                }
                elseif($_GET['action'] === "deleteChapter"){
                    $controller_chapter->deleteChapter($_GET['idChapter']);
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
                }
                elseif($_GET['action'] === "registration"){
                    $controllerUser->registerUser($_POST['first_name'],$_POST['last_name'], $_POST['user_pseudo'],$_POST['user_mail'], $_POST['password'], $_POST['password1']);
                }
                elseif($_GET['action'] === "endSession"){
                    $controllerUser->endSession();
                }
                elseif($_GET['action'] === "forSingIn"){
                    $controllerUser->forSingIn();
                }
                elseif($_GET['action'] === "singIn"){
                    $controllerUser->singIn($_POST['pseudo'], $_POST['password']);
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
