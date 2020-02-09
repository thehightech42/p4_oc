<?php

require_once('model/model_chapter.php');

    class ControllerChapter{ //Chapter controller
        public function chapterList(){
            $model_front = new ManagementChapter;
            $chapters = $model_front->chapterLists();

            require('view/view_chapterList.php');
        }

        public function chapterAndComments(){
            $model_front = new ManagementChapter;
            $chapter = $model_front->chapter($_GET['id']);

            $comments = $model_front->comments($_GET['id']);

            require('view/view_chapterAndComments.php');


        }
    }