<?php
ob_start();

while($use_chapter = $chapter->fetch()){
    $id = $use_chapter['id'];

    $titlePage = "Chapitre ". $use_chapter['chapter_number'] .' - ' .$use_chapter['chapter_name'];

?>
    <div>
        <h3>Chapitre <?= $use_chapter['chapter_number'] .' - ' .$use_chapter['chapter_name']; ?></h3>

        <p><?= $use_chapter['chapter_content']; ?></p>
    </div>


    <div class="mt-5">
        <h4>Commentaire :</h4>
<?php
}
if(isset($_SESSION['pseudo'])){
    ?>
    <form action="index.php/?type=chapter&action=addComment&idChapter=<?= $id; ?>" method="POST" class="mb-3">
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Votre commentaire : </label>
            <input type="text" id="contentComment" name="content" class="form-control" placeholder="Votre commentaire !">
        </div>

        <button type="submit" class="btn btn-primary">Publier</button>
    </form>

    <?php
}

while($comment = $comments->fetch()){
    ?>
        <div class="row">
            <div class="col-lg-10 mt-3">
                <p>Commentaire de : <?= $comment['pseudo'] ?> posté le <?= $comment['published_date'] ?></p>
                <p><?= $comment['content']?></p>
            </div>

            <div class="col-lg-2">
                <a href="index.php?type=chapter&action=reportComment&idComment=<?= $comment['id']?>&idChapter=<?=$_GET['idChapter']?>">Signaler</a>
            </div>

    </div>

<?php
};
?>
    </div>
<?php

$content = ob_get_clean();

require('template.php');
