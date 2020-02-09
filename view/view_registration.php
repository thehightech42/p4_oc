<?php

ob_start();

?>

<h3>
    Inscription
</h3>

<form>
    <div class="form-group">
        <label for="exampleInputEmail1">Pseudo</label>
        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name ="user_pseudo" placeholder="Entrer votre pseudo">
        <small id="emailHelp" class="form-text text-muted">Il sera utilisé pour poster des messages et vous connecter..</small>
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Email </label>
        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="user_mail"placeholder="Enter email">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>

    <div class="form-group">
        <label for="exampleInputPassword1">Mot de passe</label>
        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Mot de passe de confirmation</label>
        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
    </div>
    <div class="form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1" name="user_newsletter">
        <label class="form-check-label" for="exampleCheck1" checked>Je souhaite être informé de la sortie des nouveaux chapitres.</label>
    </div>

    <button type="submit" class="btn btn-primary">Envoyer</button>
</form>

<?php
$content = ob_get_clean();

require('template.php');