<?php
use P4\Gestion\Gestion;
ob_start();

$titlePage = "Listes des articles";

require_once('gestion/Gestion.php');
$gestion = new Gestion;

?>
    <div class="container"><?php
    while($chapter = $chapters->fetch()){

    ?>
    <div class="row p-5">
        <div class="col-lg-8">

            <h4>Chapitre <?= $chapter['chapter_number'] .' - '. $chapter['chapter_name']?></h4>
            <?php $text = $gestion->reductionText($chapter['chapter_content'], 500); ?>
            <p><a href="index.php?type=chapter&action=chapter&idChapter=<?= $chapter['id']?>"><?= $text ?></a></p>

        </div>

        <?php
            if(isset($_SESSION['admin']) && $_SESSION['admin'] == 1 ){
                ?>
            <div class="col-lg-2">
                <p><a href="index.php?type=chapter&action=forUpdateChapter&idChapter=<?= $chapter['id'] ?>">Modifier</a></p>
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
    ?></div><?php
$content = ob_get_clean();

require('template.php');