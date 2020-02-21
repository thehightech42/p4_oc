<?php
namespace P4\Model;

//session_start();
require_once('BDD.php');

class ManagementChapter extends BDD{

    public function chapterLists(){
        $posts = $this->_bd->query('SELECT * FROM chapters ORDER BY id DESC');
        return $posts;
    }

    public function chapter($id){
        $post = $this->_bd->prepare('SELECT * FROM chapters WHERE id = :id');
        $post->execute(array('id' => $id));
        return $post;

    }

    public function comments($id){
        $comments = $this->_bd->prepare('SELECT * FROM comments WHERE id_post = :id_post AND status_of_comment = 0');
        $comments->execute(array('id_post' => $id));
        return $comments;
    }

    public function registerChapter($chapter_name, $chapter_number, $chapter_content){
        $registerChapter = $this->_bd->prepare('INSERT INTO chapters(chapter_name, chapter_number, chapter_content) VALUES(:chapter_name, :chapter_number, :chapter_content)');
        $registerChapter->execute(array(
            'chapter_name' => $chapter_name,
            'chapter_number' => $chapter_number,
            'chapter_content' => $chapter_content
        ));

    }

    public function forUpdateChapter($id){
        $updateForChapter = $this->_bd->prepare('SELECT * FROM chapters WHERE id = :id');
        $updateForChapter->execute(array('id' => $id));
        return $updateForChapter;
    }

    public function updateChapter($idChapter, $chapter_name, $chapter_number, $chapter_content){
        $updateChapter = $this->_bd->prepare('UPDATE chapters SET chapter_name= :chapter_name, chapter_number= :chapter_number, chapter_content= :chapter_content WHERE id = :id');
        $updateChapter->execute(array(
            'chapter_name' => $chapter_name,
            'chapter_number' => $chapter_number,
            'chapter_content' => $chapter_content,
            'id' => $idChapter
        ));
    }

    public function deleteChapter($id){
        $deleteChapter = $this->_bd->prepare('DELETE FROM chapters WHERE id= :id');
        $deleteChapter->execute(array('id'=> $id));

    }

    public function addComment($id, $content){
        $addComment = $this->_bd->prepare('INSERT INTO comments(id_post, pseudo, content, status_of_comment, published_date) VALUES(:id_post, :pseudo, :content, :status_of_comment, NOW())');
        //var_dump($id, $content, $_SESSION['pseudo'], $this->_bd);
        $addComment->execute(array(
            'id_post' => $id,
            'pseudo' => $_SESSION['pseudo'],
            'status_of_comment' => 0,
            'content' => $content
        ));
    }

    public function reportComment($idComment){
        $reportComment = $this->_bd->prepare('UPDATE comments SET status_of_comment = 1 WHERE id = :id ');
        $reportComment->execute(array('id' => $idComment));
    }

    public function commentsManagement(){
        $commentsManagement = $this->_bd->query('SELECT * FROM comments WHERE status_of_comment = 1');
        return $commentsManagement;
    }

    public function acceptComment($idComment){
        $acceptComment = $this->_bd->prepare('UPDATE comments SET status_of_comment = 0 WHERE id = :idComment');
        $acceptComment->execute(array('idComment' => $idComment));
    }

    public function deleteComment($idComment){
        $deteComment = $this->_bd->prepare('DELETE FROM comments WHERE id = :idComment');
        $deteComment->execute(array('idComment' => $idComment));
    }


}