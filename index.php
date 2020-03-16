<?php
ob_start();
session_start();
use P4\Controller\ControllerChapter;
use P4\Controller\ControllerUser;
use P4\Gestion\Gestion;
error_reporting(E_ALL);
ini_set("display_errors", 1);
require('gestion/Autoloader.php');
Autoloader::register();
try {
        if(isset($_GET['type']) && isset($_GET['action'])){
            if($_GET['type'] === "chapter"){
                if(isset($_GET['idComment']) || isset($_GET['idChapter'])){
                    $gestion = new gestion;
                    if(isset($_GET['idComment'])){
                        $test = $gestion->controlNumber($_GET['idComment']);
                    }
                    else{
                        $test = $gestion->controlNumber($_GET['idChapter']);
                    }
                    if(!$test){
                        header('Location: '.$_SERVER['SERVER_NAME']);
                    }
                }

                $controller_chapter = new ControllerChapter;
                if($_GET['action'] === 'chapter'){
                    $controller_chapter->chapterAndComments($_GET['idChapter']);
                }
                elseif($_GET['action'] === "chapterList"){
                    $controller_chapter->chapterList();
                }
                elseif($_GET["action"] === "forAddChapter" || $_GET['action'] === "addChapter" || $_GET['action'] === "forUpdateChapter" || $_GET['action'] === "updateChapter" || $_GET['action'] === "deleteChapter" &&
                    isset($_SESSION['admin']) && $_SESSION['admin'] === "1"){
                    if($_GET['action'] === "forAddChapter"){
                        $controller_chapter->addChapter();
                    }
                    elseif($_GET['action'] === "addChapter"){
                        $controller_chapter->registerChapter(htmlspecialchars($_POST['chapter_name']), htmlspecialchars($_POST['chapter_number']), $_POST['chapter_content']);
                    }
                    elseif($_GET['action'] === "forUpdateChapter"){
                        $controller_chapter->forUpdateChapter($_GET['idChapter']);
                    }
                    elseif($_GET['action'] === "updateChapter"){
                        $controller_chapter->updateChapter($_GET['idChapter'], htmlspecialchars($_POST['chapter_name']), htmlspecialchars($_POST['chapter_number']), $_POST['chapter_content']);
                    }
                    elseif($_GET['action'] === "deleteChapter"){
                        $controller_chapter->deleteChapter($_GET['idChapter']);
                    }else{
                        $controller_chapter->chapterList();
                    }
                }
                elseif($_GET['action'] === "addComment"){
                    $controller_chapter->addComment($_GET['idChapter'], htmlspecialchars($_POST['content']));
                }
                elseif($_GET['action'] === "reportComment"){
                    $controller_chapter->reportComment($_GET['idComment'], $_GET['idChapter']);
                }
                elseif ($_GET['action'] === "commentsManagement" || $_GET['action'] === "acceptComment" || $_GET['action'] === "deleteComment" && isset($_SESSION['admin']) && $_SESSION['admin'] === "1"){
                    if($_GET['action'] === "commentsManagement"){
                        $controller_chapter->commentsManagement();
                    }
                    elseif($_GET['action'] === "acceptComment"){
                        $controller_chapter->acceptComment($_GET['idComment']);
                    }
                    elseif($_GET['action'] === "deleteComment"){
                        $controller_chapter->deleteComment($_GET['idComment']);
                    }
                    else{
                        $controller_chapter->chapterList();
                    }
                }
                else{
                    $controller_chapter->chapterList();
                }
            }

            elseif($_GET['type'] === "user"){
                $controllerUser = new ControllerUser();
                if($_GET['action'] === 'add'){
                    $controllerUser->addUser();
                }
                elseif($_GET['action'] === "registration"){
                    $controllerUser->registerUser(htmlspecialchars($_POST['first_name']),htmlspecialchars($_POST['last_name']),
                        htmlspecialchars($_POST['user_pseudo']),htmlspecialchars($_POST['user_mail']), htmlspecialchars($_POST['password']), htmlspecialchars($_POST['password1']));
                }
                elseif($_GET['action'] === "endSession"){
                    $controllerUser->endSession();
                }
                elseif($_GET['action'] === "forSinIn"){
                    $controllerUser->forSinIn();
                }
                elseif($_GET['action'] === "sinIn"){
                    $controllerUser->sinIn(htmlspecialchars($_POST['pseudo']), htmlspecialchars($_POST['password']));
                }
                elseif($_GET['action'] === "forManageAccount"){
                    $controllerUser->forManageAccount($_SESSION['idUser']);
                }
                elseif($_GET['action'] === "manageAccount"){
                    $controllerUser->manageAccount(htmlspecialchars($_POST['first_name']),htmlspecialchars($_POST['last_name']), htmlspecialchars($_POST['user_pseudo']),htmlspecialchars($_POST['user_mail']));
                }
                elseif($_GET['action'] === "forUpdatePassword"){
                    $controllerUser->forUpdatePassword();
                }
                elseif($_GET['action'] === "updatePassword"){
                    $controllerUser->updatePassword(htmlspecialchars($_POST['last_password']), htmlspecialchars($_POST['new_password']), htmlspecialchars($_POST['new_password1']) );
                }
                elseif($_GET['action'] === "forContact"){
                    $controllerUser->forContact();
                }
                elseif($_GET['action'] === "contact"){
                    $controllerUser->contact(htmlspecialchars($_POST['name']), htmlspecialchars($_POST['email']), htmlspecialchars($_POST['subject']), htmlspecialchars($_POST['message']));
                }
                else{
                    $controllerUser->addUser();
                }
            }
            elseif($_GET['type'] === "test" && $_GET['action'] === "hash"){
                require('view/hash.php');
            }
            elseif($_GET['type'] === "home"){
                require('view/viewHome.php');
            }
            else{
                $controller_chapter = new ControllerChapter;
                $controller_chapter->chapterList();
            }
        }
        elseif(isset($_GET['type']) && $_GET['type'] === "administration"){
            $controller_chapter = new ControllerChapter;
            $controller_chapter->administrationPage();
        }
        else{
            require('view/viewHome.php');
        }
}
catch(Exception $e) {
    die ('Erreur : ' . $e->getMessage());

}