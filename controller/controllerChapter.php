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
    }