<?php
ob_start();
$titlePage = "Listes des articles";
while($chapter = $chapters->fetch()){

    ?>
    <h4>Chapitre : <?= $chapter['chapter_number'] .' - '. $chapter['chapter_name']?></h4>

    <p><a href="../index.php?type=chapter&action=chapter&id=<?= $chapter['id']?> ">Voir le chapitre et ses commentaire.</a></p>
    <?php

};
$content = ob_get_clean();

require('template.php');