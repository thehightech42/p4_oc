<nav class="navbar navbar-expand-lg navbar-light bg-secondary">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand text-white" href="index.php?type=home">Un billet pour<br>l'Alaska</a>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item active">
                <a class="nav-link text-white" href="index.php?type=home">Accueil<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="#">Présentation</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="index.php?type=chapter&action=chapterList">Chapitres</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="index.php?action=chapterList">Contact</a>
            </li>
            <!--<li class="nav-item">
                <a class="nav-link" href="index.php?type=test&action=hash">Hash</a>
            </li>-->
        </ul>
        <ul>
            <?php
            if(isset($_SESSION['pseudo'])){
                ?>
                <ol class="nav-item">
                    <a href="#" class="btn btn-secondary" role="button" aria-pressed="true"><?= $_SESSION['pseudo'];?></a>
                    <a href="index.php?type=user&action=endSession" class="btn btn-info" role="button" aria-pressed="true">Deconnexion</a>
                </ol>
            <?php
            }else{
                ?>
            <ol>
                <a href="index.php?type=user&action=forSingIn" class="btn btn-secondary" role="button" aria-pressed="true">Connexion</a>
                <a href="index.php?type=user&action=add" class="btn btn-info" role="button" aria-pressed="true">Inscription</a>
            </ol>
            <?php
            }
            ?>

        </ul>
    </div>
</nav>