<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="http://localhost:8888/?action=chapterList">Un billet pour <br> l'Alaska</a>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item active">
                <a class="nav-link" href="http://localhost:8888/?type=chapter&action=chapterList">Accueil<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Presentation</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="http://localhost:8888/?type=chapter&action=chapterList">Chapitres</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="http://localhost:8888/?action=chapterList">Contact</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="http://localhost:8888/?type=chapter&action=addChapter">Ajouter un chapitre</a>
            </li>
        </ul>
        <ul>
            <?php
            if(isset($_SESSION['pseudo'])){
                ?>
                <ol class="nav-item">
                    <?= $_SESSION['pseudo'];?>
                    <a href="http://localhost:8888/?type=user&action=endSession" class="btn btn-info" role="button" aria-pressed="true">Deconnexion</a>
                </ol>
            <?php
            }else{
                ?>
            <ol>
                <a href="#" class="btn btn-secondary" role="button" aria-pressed="true">Connexion</a>
                <a href="../index.php?type=user&action=add" class="btn btn-info" role="button" aria-pressed="true">Inscription</a>
            </ol>
            <?php
            }
            ?>

        </ul>
    </div>
</nav>