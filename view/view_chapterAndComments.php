<?php
ob_start();

while($use_chapter = $chapter->fetch()){

    $titlePage = "Chapitre ". $use_chapter['chapter_number'] .' - ' .$use_chapter['chapter_name'];

?>
    <div>
        <h3>Chapitre <?= $use_chapter['chapter_number'] .' - ' .$use_chapter['chapter_name']; ?></h3>

        <p><?= $use_chapter['chapter_content']; ?></p>
    </div>


    <div>
        <h4>Commentaire :</h4>
<?php
}
if(isset($_SESSION['pseudo'])){
    ?>
    <form action="http://localhost:8888/?type=chapter&action=addComment">
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Example textarea</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Publier</button>
    </form>

    <?php
}

while($comment = $comments->fetch()){
    ?>
        <div>
            <p>Commentaire de : <?= $comment['pseudo'] ?> posté le <?= $comment['date']?></p>
            <p><?= $comment['content']?></p>
        </div>

    </div>


<?php

};

$content = ob_get_clean();

require('template.php');
