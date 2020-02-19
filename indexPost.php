<!--Routeur POST-->
<?php
session_start();

require_once('controller/controllerChapter.php');
require_once('controller/controllerUser.php');

try {
    if(isset($_POST['chapter_name']) && isset($_POST['chapter_number']) &&isset($_POST['chapter_content']) && !isset($_GET['type'])){
        $controller_chapter = new ControllerChapter;
        $controller_chapter->registerChapter();

    }elseif(isset($_POST['first_name']) && isset($_POST['last_name']) && isset($_POST['user_pseudo']) &&
        isset($_POST['user_mail']) && isset($_POST['password']) && isset($_POST['password1'])){
        $controllerUser = new ControllerUser;
        $controllerUser->registerUser($_POST['first_name'],$_POST['last_name'], $_POST['user_pseudo'],$_POST['user_mail'], $_POST['password'], $_POST['password1']);

    }elseif($_GET['type'] === "chapter" && $_GET['action'] === "updateChapter"){
        $controller_chapter = new ControllerChapter;
        $controller_chapter->updateChapter($_GET['id']);

    }elseif($_GET['type'] === "user" && $_GET['action'] === "singin"){
        $controllerUser = new ControllerUser;
        $controllerUser->singIn($_POST['pseudo'], $_POST['password']);
    }
    else{
        $controller_chapter = new ControllerChapter;
        $controller_chapter->chapterList();
    }

}
catch(Exception $e) {
    echo $e -> getMessage();

}