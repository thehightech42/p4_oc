<?php

$titlePage = "Inscription";
ob_start();

if(!isset($userInformation)){
    ?>
    <div class="row">
        <div class="col-lg-10 mx-auto">
            <h3>Pourquoi s'inscrire ?</h3>
            <ul>
                <li>Pour commenter les chapitres</li>
                <li>Pour participer à la modération des commentaires</li>
                <li>Pour être informer des prochains chapitres</li>
            </ul>
        </div>
    </div>

    <div class="row">

        <div class="col-lg-10 mx-auto">
            <h3>
                Inscription :
            </h3>
    <?php
    }
    else{
     ?>
    <div class="row">
        <div class="col-lg-10 mx-auto">
            <h3>Gestion de votre compte</h3>
        </div>
    </div>

    <div class="row">

        <div class="col-lg-10 mx-auto">

   <?php
    }
    ?>
        <form action="index.php?type=user&action=registration" method="POST">
            <div class="form-group">
                <label for="first_name">Prenom :</label>
                <input type="text" class="form-control" id="first_name" aria-describedby="emailHelp" name ="first_name" placeholder="Prenom"
                    <?php
                    if(isset($userInformation['first_name'])){
                        ?>
                        value="<?= $userInformation['first_name']?>"
                        <?php
                    }
                    ?>
                required>
            </div>
            <div class="form-group">
                <label for="last_name">Nom :</label>
                <input type="text" class="form-control" id="last_name" aria-describedby="emailHelp" name ="last_name" placeholder="Nom"
                    <?php
                    if(isset($userInformation['last_name'])){
                        ?>
                        value="<?= $userInformation['last_name']?>"
                        <?php
                    }
                    ?>
                required>
            </div>

            <div class="form-group">
                <label for="pseudo">Pseudo :</label>
                <input type="text" class="form-control
                    <?php
                        if(!isset($userInformation['pseudo']) && isset($userInformation['first_name'])){
                            ?>
                            border border-danger
                            <?php
                        }
                    ?>
                    " id="pseudo" aria-describedby="emailHelp" name ="user_pseudo" placeholder="Entrez votre pseudo"
                    <?php
                    if(isset($userInformation['pseudo'])){
                        ?>
                        value="<?= $userInformation['pseudo']?>"
                        <?php
                    }
                    ?>
                required>
                <small id="pseudoHelp" class="form-text text-muted">Il sera utilisé pour poster des messages et vous connecter.</small>
            </div>
            <div class="form-group">
                <label for="email">Email :</label>
                <input type="email" class="form-control
                    <?php
                        if(!isset($userInformation['mail']) && isset($userInformation['first_name'])){
                            ?>
                             border border-danger
                             <?php
                        }
                    ?>
                    " id="email" aria-describedby="emailHelp" name="user_mail"placeholder="E-Mail"
                    <?php
                    if(isset($userInformation['mail'])){
                        ?>
                        value="<?= $userInformation['mail']?>"
                        <?php
                    }
                    ?>
                required>
                <small id="emailHelp" class="form-text text-muted">Nous ne partagerons jamais votre e-mail !</small>
            </div>
            <?php
                if(isset($userInformation)){
                    ?>
                    <div class="form-group">
                        <label for="password">Ancien Mot de passe :</label>
                        <input type="password" class="form-control" id="password" name="last_password" placeholder="Mot de passe" required>
                    </div>
                    <?php
                }
            ?>

            <div class="form-group">
                <label for="password">Nouveau Mot de passe :</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Mot de passe" required>
            </div>
            <div class="form-group">
                <label for="password1">Mot de passe de confirmation :</label>
                <input type="password" class="form-control" id="password1" name="password1" placeholder="Mot de passe" required>
            </div>

            <button type="submit" class="btn btn-primary">Envoyer</button>
        </form>

        <?php
            if(!isset($userInformation)){
                ?>
                <p>Vous avez un compte ? <a href="index.php?type=user&action=forSingIn"> Connectez vous ici !</a></p>
                <?php
            }
        ?>
    </div>
</div>

<?php
$content = ob_get_clean();

require('template.php');