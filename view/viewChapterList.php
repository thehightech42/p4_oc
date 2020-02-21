<?php
ob_start();
$titlePage = "Listes des articles";

while($chapter = $chapters->fetch()){

    ?>
    <div class="row p-5">
        <div class="col-lg-8">
            <h4>Chapitre <?= $chapter['chapter_number'] .' - '. $chapter['chapter_name']?></h4>

            <p><a href="index.php?type=chapter&action=chapter&idChapter=<?= $chapter['id']?> ">Voir le chapitre et ses commentaires.</a></p>
        </div>
        <?php
            if(isset($_SESSION['admin']) && $_SESSION['admin'] == 1 && $more == "admin" ){
                ?>
            <div class="col-lg-2">
                <p><a href="index.php?type=chapter&action=updateChapter&idChapter=<?= $chapter['id'] ?>">Modifier</a></p>
            </div>
            <div class="col-lg-2">
                <p><a href="index.php?type=chapter&action=deleteChapter&idChapter=<?= $chapter['id'] ?>">Supprimer</a></p>
            </div>
                <?php
                }
        ?>
    </div>

    <?php

};
$content = ob_get_clean();

require('template.php');