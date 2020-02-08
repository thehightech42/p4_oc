<?php
require_once('model.php');

class ManagementChapter extends BDD{

    public function chapterLists(){
        $bd = $this->AccesBDD();
        $posts = $bd->query('SELECT * FROM chapters ORDER BY id DESC');

        return $posts;
    }

    public function chapter($id){
        $bd = $this->AccesBDD();

        $post = $bd->prepare('SELECT * FROM chapters WHERE id = :id');
        $post->execute(array('id' => $id));

        return $post;

    }

    public function comments($id){
        $bd = $this->AccesBDD();

        $comments = $bd->prepare('SELECT * FROM comments WHERE id_post = :id_post');
        $comments->execute(array('id_post' => $id));

        return $comments;
    }


}