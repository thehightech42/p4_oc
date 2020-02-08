<?php

ob_start();

while($use_chapter = $chapter->fetch()){
    $titlePage = $use_chapter['chapter_name'];

?>
    <div>
        <h3>Chapitre : <?= $use_chapter['chapter_name']; ?></h3>

        <p><?= $use_chapter['chapter_content']; ?></p>
    </div>


    <div>
        <h4>Commentaire :</h4>

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
