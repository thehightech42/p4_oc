<!--Routeur POST-->
<?php
require_once('controller/controllerChapter.php');
require_once('controller/controllerUser.php');

try {
    if(isset($_POST['chapter_name']) && isset($_POST['chapter_number']) &&isset($_POST['chapter_content']) && !isset($_GET['type'])){
        $controller_chapter = new ControllerChapter;
        $controller_chapter->registerChapter();

    }elseif(isset($_POST['first_name']) && isset($_POST['last_name']) && isset($_POST['user_pseudo']) &&
        isset($_POST['user_mail']) && isset($_POST['pass_hash']) && isset($_POST['pass_hash']) && isset($_POST['pass_hash1'])){
        $controllerUser = new ManagementUser;

    }elseif($_GET['type'] === "chapter" && $_GET['action'] === "updateChapter"){
        $controller_chapter = new ControllerChapter;
        $controller_chapter->updateChapter($_GET['id']);
    }
    else{
        $controller_chapter = new ControllerChapter;
        $controller_chapter->chapterList();
    }

}
catch(Exception $e) {
    echo $e -> getMessage();

}