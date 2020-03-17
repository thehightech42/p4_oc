<?php
require('env.php');
$titlePage = "Changer le mot de passe";

ob_start();
?>

    <div class="row mx-auto">
        <div class="col-lg-12 p-0">
            <h4>Mise à jour de mot de passe</h4>

            <form action="/?type=user&action=updatePassword" method="POST">
                <div class="form-group">
                    <label for="last_password">Ancien mot de passe</label>
                    <input type="password" class="form-control" id="last_password" name="last_password"  placeholder="Ancien mot de passe">
                </div>
                <div class="form-group">
                    <label for="password">Nouveau mot de passe</label>
                    <input type="password" class="form-control" id="password" name="new_password"  placeholder="Nouveau mot de passe">
                </div>
                <div class="form-group">
                    <label for="new_password1">Confirmation nouveau mot de passe</label>
                    <input type="password" class="form-control" id="new_password1" name="new_password1"  placeholder="Confirmation">
                </div>

                <button type="submit">Changer le mot de passe</button>
            </form>

        </div>

    </div>


<?php

$content = ob_get_clean();
require('template.php');