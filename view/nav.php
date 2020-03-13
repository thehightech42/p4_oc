<nav class="navbar navbar-expand-lg navbar-light bg-secondary">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand text-white" href="index.php?type=home">Billet simple pour<br>l'Alaska</a>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
        <ul class="navbar-nav mr-auto ">
            <li class="nav-item">
                <a class="nav-link text-white" href="index.php?type=chapter&action=chapterList">Chapitres</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="index.php?type=user&action=forContact">Contact</a>
            </li>
            <?php
                if(isset($_SESSION['admin']) && $_SESSION['admin'] === "1"){
                    ?>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="index.php?type=administration">Administration</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="index.php?type=chapter&action=forAddChapter">Ajouter un chapitre</a>
                    </li>
                    <?php
                }

            ?>
            <!--<li class="nav-item">
                <a class="nav-link" href="index.php?type=test&action=hash">Hash</a>
            </li>-->
        </ul>
        <ul class="navbar-nav mr-0 ">
            <?php
            if(isset($_SESSION['pseudo'])){
                ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?= $_SESSION['pseudo'];?>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="index.php?type=user&action=forManageAccount">Gestion du compte</a>
                        <a class="dropdown-item" href="index.php?type=user&action=forUpdatePassword">Changer le mot de passe</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a href="index.php?type=user&action=endSession" class="btn btn-info" role="button" aria-pressed="true">Deconnexion</a>
                </li>
            <?php
            }else{
                ?>
            <li>
                <a href="index.php?type=user&action=forSingIn" class="btn btn-secondary" role="button" aria-pressed="true">Connexion</a>
                <a href="index.php?type=user&action=add" class="btn btn-info" role="button" aria-pressed="true">Inscription</a>
            </li>
            <?php
            }
            ?>


        </ul>
    </div>
</nav>