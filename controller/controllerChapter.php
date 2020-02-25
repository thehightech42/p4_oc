<?php
namespace P4\Controller;

use P4\Model\ManagementChapter;

require_once('model/ManagementChapter.php');

    class ControllerChapter{ //Chapter controller

        private $_managementChapter;

        function __construct()
        {
            $this->_managementChapter = new ManagementChapter;
        }

        public function chapterList(){
            $chapters = $this->_managementChapter->chapterLists();
            if($chapters === false){
                throw new \Exception("Connexion bd, code erreur : " . $e->errorCode());
            }else{
                require('view/viewChapterList.php');
            }

        }

        public function chapterAndComments($idChapter){
            $chapter = $this->_managementChapter->chapter($idChapter);
            $comments = $this->_managementChapter->comments($idChapter);
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
            $registerChapter = $this->_managementChapter->registerChapter($chapter_name, $chapter_number, $chapter_content);

            $this->chapterList();
        }

        public function forUpdateChapter($idChapter){
            $controlUpdateChapter = $this->_managementChapter->forUpdateChapter($idChapter);

            $upChapter = $controlUpdateChapter->fetch();
            require('view/viewAddChapter.php');
        }
        public function updateChapter($id, $chapter_name, $chapter_number, $chapter_content){
            $updateChapter = $this->_managementChapter->updateChapter($id, $chapter_name, $chapter_number, $chapter_content);

            $this->chapterList();
        }

        public function deleteChapter($id){
            $deleteChapter = $this->_managementChapter->deleteChapter($id);

            $this->chapterList(0);
        }

        public function addComment($id, $content){
            $addComment = $this->_managementChapter->addComment($id, $content);
            $this->chapterAndComments($id);
        }
        public function reportComment($idComment, $idChapter){
            $reportComment = $this->_managementChapter->reportComment($idComment);

            $this->chapterAndComments($idChapter);
        }
        public function commentsManagement(){
            $comments = $this->_managementChapter->commentsManagement();

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