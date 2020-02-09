<?php

require_once('model/model_chapter.php');

    class ControllerChapter{ //Chapter controller
        public function chapterList(){
            $model_chapter = new ManagementChapter;
            $chapters = $model_chapter->chapterLists();

            require('view/view_chapterList.php');
        }

        public function chapterAndComments(){
            $model_chapter = new ManagementChapter;
            $chapter = $model_chapter->chapter($_GET['id']);

            $comments = $model_chapter->comments($_GET['id']);

            require('view/view_chapterAndComments.php');

        }
        public function addComment(){


        }
        public function addChapter(){
            require('view/viewAddChapter.php');
        }

        public function registerChapter(){
            $model_chapter = new ManagementChapter;
            $registerChapter = $model_chapter->registerChapter();
            require('template.php');

            header('Location :http://localhost:8888/?type=chapter&action=chapterList');
        }
    }