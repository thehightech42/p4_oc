<?php

require_once('model/ManagementChapter.php');

    class ControllerChapter{ //Chapter controller
        public function chapterList($more){
            $model_chapter = new P4\Model\ManagementChapter;
            $chapters = $model_chapter->chapterLists();

            require('view/viewChapterList.php');
        }

        public function chapterAndComments($idChapter){
            $model_chapter = new P4\Model\ManagementChapter;
            $chapter = $model_chapter->chapter($idChapter);
            $comments = $model_chapter->comments($idChapter);
            $test = $chapter->rowCount();
            if($test === 0){
                $this->chapterList();
            }else{
                require('view/viewChapterAndComments.php');
            }

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

            $this->chapterList();
        }

        public function deleteChapter($id){
            $model_chapter = new P4\Model\ManagementChapter();
            $deleteChapter = $model_chapter->deleteChapter($id);

            $this->chapterList(0);
        }
        public function addComment($id, $content){
            $model_chapter = new P4\Model\ManagementChapter();
            $addComment = $model_chapter->addComment($id, $content);
            //var_dump($addComment);

            $this->chapterAndComments($id);
        }
        public function reportComment($idComment, $idChapter){
            $model_chapter = new p4\Model\ManagementChapter();
            $reportComment = $model_chapter->reportComment($idComment);

            //var_dump($idChapter, $idComment);

            $this->chapterAndComments($idChapter);
        }

    }