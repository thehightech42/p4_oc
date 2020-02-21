<?php

require_once('model/ManagementChapter.php');

    class ControllerChapter{ //Chapter controller

        private $_managementChapter;

        function __construct()
        {
            $this->_managementChapter = new P4\Model\ManagementChapter;
        }

        public function chapterList(){
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
        public function registerChapter($chapter_name, $chapter_number, $chapter_content){
            $model_chapter = new P4\Model\ManagementChapter;
            $registerChapter = $model_chapter->registerChapter($chapter_name, $chapter_number, $chapter_content);

            $this->chapterList();
        }

        public function forUpdateChapter($idChapter){
            $model_chapter = new P4\Model\ManagementChapter();
            $controlUpdateChapter = $model_chapter->forUpdateChapter($idChapter);

            $upChapter = $controlUpdateChapter->fetch();
            require('view/viewAddChapter.php');
        }
        public function updateChapter($id, $chapter_name, $chapter_number, $chapter_content){
            $model_chapter = new P4\Model\ManagementChapter();
            $updateChapter = $model_chapter->updateChapter($id, $chapter_name, $chapter_number, $chapter_content);

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
            $this->chapterAndComments($id);
        }
        public function reportComment($idComment, $idChapter){
            $model_chapter = new p4\Model\ManagementChapter();
            $reportComment = $model_chapter->reportComment($idComment);

            $this->chapterAndComments($idChapter);
        }
        public function commentsManagement(){
            $model_chapter = new P4\Model\ManagementChapter();
            $comments = $model_chapter->commentsManagement();

            require('view/viewReportComment.php');
        }
        public function acceptComment($idComment){
            $acceptComment = $this->_managementChapter->acceptComment($idComment);

            $this->commentsManagement();
        }

        public function deleteComment($idComment){
            $deleteComment = $this->_managementChapter->deleteComment($idComment);

            $this->commentsManagement();
        }

    }