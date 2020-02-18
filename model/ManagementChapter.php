<?php
namespace P4\Model;

require_once('BDD.php');

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

    public function registerChapter()
    {
        $bd = $this->AccesBDD();
        $registerChapter = $bd->prepare('INSERT INTO chapters(chapter_name, chapter_number, chapter_content) VALUES(:chapter_name, :chapter_number, :chapter_content)');
        $registerChapter->execute(array(
            'chapter_name' => $_POST['chapter_name'],
            'chapter_number' => $_POST['chapter_number'],
            'chapter_content' => $_POST['chapter_content']
        ));

    }

    public function controlUpdateChapter($id){
        $bd = $this->AccesBDD();

        $updateForChapter = $bd->prepare('SELECT * FROM chapters WHERE id = :id');
        $updateForChapter->execute(array('id' => $id));

        return $updateForChapter;
    }

    public function updateChapter($id){
        $bd = $this->AccesBDD();

        $updateChapter = $bd->prepare('UPDATE chapters SET chapter_name= :chapter_name, chapter_number= :chapter_number, chapter_content= :chapter_content WHERE id = :id');
        $updateChapter->execute(array(
            'chapter_name' => $_POST['chapter_name'],
            'chapter_number' => $_POST['chapter_number'],
            'chapter_content' => $_POST['chapter_content'],
            'id' => $id
        ));
    }

    public function deleteChapter($id){
        $bd = $this->AccesBDD();

        $deleteChapter = $bd->prepare('DELETE FROM chapters WHERE id= :id');
        $deleteChapter->execute(array('id'=> $id));

    }


}