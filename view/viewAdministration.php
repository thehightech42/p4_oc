<?php
$titlePage = "Administration";
ob_start();
?>

    <div class="row mt-5 ml-0 mr-0 d-flex justify-content-between">
            <div class="col-lg-6">
                <div class="row m-0">
                    <h5>Commentaires signalés :</h5>
                </div>
                <?php
                if($commentsReport->rowcount() === 0){
                    ?>
                    <div class="col-lg-12">
                        <p>Aucun commentaire signalé actuellement !</p>
                    </div>
                    <?php
                }else{
                    while($commentReport = $commentsReport->fetch()) {
                        //var_dump($commentReport);
                        ?>
                        <div class="row m-0">
                            <div class="col-lg-8 p-0">
                                <p class="">Commentaire de : <?= $commentReport['pseudo'] ?> posté le <?= $commentReport['day'] ?>.<?= $commentReport['month'] ?>.<?= $commentReport['year'] ?></p>
                                <p class=""><?= $commentReport['content']?></p>

                            </div>

                            <div class="col-lg-4 p-0">
                                <p class=""><a href="index.php?type=chapter&action=acceptComment&idComment=<?= $commentReport['id']?>">Valider</a></p>
                                <p class=""><a href="index.php?type=chapter&action=deleteComment&idComment=<?= $commentReport['id']?>">Supprimer définitvement</a></p>
                            </div>
                        </div>
                        <?php
                    }

                }
                ?>
            </div>

            <div class="col-lg-6">
                <div class="row m-0">
                    <div class="col-lg-12 p-0">
                        <h5>Les 10 derniers commentaires :</h5>
                    </div>
                </div>
                <?php
                while($lastComment = $tenLastComments->fetch()) {
                    ?>
                    <div class="row m-0">
                        <div class="col-lg-12 p-0">
                            <p class="">Commentaire posté par <?= $lastComment['pseudo'] ?> le <?= $lastComment['day'] ?>.<?= $lastComment['month'] ?>.<?= $lastComment['year'] ?> - <?= $lastComment['content'] ?></p>
                        </div>

                    </div>
                    <?php
                }
                ?>

            </div>

    </div>

    <div class="row mt-5 ml-0 mr-0">
        <h5 class="col-lg-12">Gestions des articles :</h5>
        <?php
            while($chapter = $chapters->fetch()){

        ?>
        <div class="col-lg-7">
            <a href="index.php?type=chapter&action=chapter&idChapter=<?= $chapter['id']?>">
                <h6>Chapitre <?= $chapter['chapter_number'] .' - '. $chapter['chapter_name']?></h6>
            </a>
        </div>


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
$content = ob_get_clean();

require('template.php');