<?php


$titlePage = "Inscription";
ob_start();

?>
<div class="row">
    <div class="col-lg-1"></div>
    <div class="col-lg-10">
        <h3>Pourquoi s'inscrire ?</h3>
        <ul>
            <li>Pour commenter les chapitres</li>
            <li>Pour participer à la modération des commentaires</li>
            <li>Pour être informer des prochains chapitres</li>
        </ul>
    </div>
</div>

<div class="row">

    <div class="col-lg-1"></div>
    <div class="col-lg-5">
        <h3>
            Inscription :
        </h3>

        <form action="http://localhost:8888/?type=user&action=register" method="POST">
            <div class="form-group">
                <label for="first_name">Prenom :</label>
                <input type="text" class="form-control" id="first_name" aria-describedby="emailHelp" name ="first_name" placeholder="Prenom">
            </div>
            <div class="form-group">
                <label for="last_name">Nom :</label>
                <input type="text" class="form-control" id="last_name" aria-describedby="emailHelp" name ="last_name" placeholder="Nom">
            </div>

            <div class="form-group">
                <label for="pseudo">Pseudo :</label>
                <input type="text" class="form-control" id="pseudo" aria-describedby="emailHelp" name ="user_pseudo" placeholder="Entrer votre pseudo">
                <small id="emailHelp" class="form-text text-muted">Il sera utilisé pour poster des messages et vous connecter..</small>
            </div>
            <div class="form-group">
                <label for="email">Email :</label>
                <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="user_mail"placeholder="E-Mail">
                <small id="emailHelp" class="form-text text-muted">Nous ne partagerons jamais votre e-mail !</small>
            </div>

            <div class="form-group">
                <label for="password">Mot de passe :</label>
                <input type="password" class="form-control" id="password" name="pass_hash" placeholder="Mot de passe">
            </div>
            <div class="form-group">
                <label for="password1">Mot de passe de confirmation :</label>
                <input type="password" class="form-control" id="password1" name="pass_hash1" placeholder="Mot de passe">
            </div>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1" name="user_newsletter">
                <label class="form-check-label" for="exampleCheck1" checked>Je souhaite être informé de la sortie des nouveaux chapitres.</label>
            </div>

            <button type="submit" class="btn btn-primary">Envoyer</button>
        </form>
    </div>
</div>

<?php
$content = ob_get_clean();

require('template.php');