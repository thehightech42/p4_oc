<?php

require_once('model/model_chapter.php');

    class ControllerChapter{ //Chapter controller
        public function chapterList(){
            $model_chapter = new P4\Model\ManagementChapter;
            $chapters = $model_chapter->chapterLists();

            require('view/view_chapterList.php');
        }

        public function chapterAndComments(){
            $model_chapter = new P4\Model\ManagementChapter;
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
            $model_chapter = new P4\Model\ManagementChapter;
            $registerChapter = $model_chapter->registerChapter();

            $this->chapterList();

        }

        public function controlUpdateChapter(){
            $model_chapter = new P4\Model\ManagementChapter();
            $controlUpdateChapter = $model_chapter->controlUpdateChapter($_GET['id']);

            while($upChapter = $controlUpdateChapter->fetch()){
                require('view/viewAddChapter.php');
            }


        }

        public function updateChapter($id){
            $model_chapter = new P4\Model\ManagementChapter();
            $updateChapter = $model_chapter->updateChapter($id);
            //var_dump($id);
            //var_dump($updateChapter);

            $this->chapterList();

        }

        public function deleteChapter($id){
            $model_chapter = new P4\Model\ManagementChapter();
            $deleteChapter = $model_chapter->deleteChapter($id);

            $this->chapterList();
        }
    }