<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="http://localhost:8888/?action=chapterList">Un voyage pour <br> l'Alaska</a>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item active">
                <a class="nav-link" href="#">Accueil<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Presentation</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="http://localhost:8888/?action=chapterList">Chapitres</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="http://localhost:8888/?action=chapterList">Contact</a>
            </li>
        </ul>
        <ul>
            <?php
            if(isset($_SESSION['pseudo'])){
                ?>
                <li class="nav-item">
                    <a class="nav-link" href="http://localhost:8888/?action=chapterList"><?= $_SESSION['pseudo'] ?></a>
                </li>
                <a href="#" class="btn btn-info" role="button" aria-pressed="true">Deconnexion</a>
            <?php
            }else{
                ?>
            <ol>
                <a href="#" class="btn btn-secondary" role="button" aria-pressed="true">Connexion</a>
                <a href="#" class="btn btn-info" role="button" aria-pressed="true">Inscription</a>
            </ol>
            <?php
            }
            ?>

        </ul>
    </div>
</nav>