<?php
$titlePage = "Connexion";

ob_start();
?>
<div class="row h-75 align-items-center mx-auto">

    <div class="mx-auto col-lg-4 mx-auto">
        <div class="row">
            <div class="col-lg-12 center-bloc align-items-center">
                <h4>Connexion :</h4>
                <form action="indexPost.php?type=user&action=singin" method="POST">
                    <div class="form-group">
                        <label for="pseudo">Pseudo :
                            <input type="text" id="pseudo" name="pseudo" class="form-control <?php if(isset($_GET['info']) && $_GET['info'] === "echec"){?>border border-danger<?php }?>" placeholder="Pseudo" required>
                        </label>
                    </div>
                    <div class="form-group">
                        <label for="password">Mot de passe :
                            <input type="password" id="password" name="password" class="form-control <?php if(isset($_GET['info']) && $_GET['info'] === "echec"){?> border border-danger<?php }?>" placeholder="Mot de passe" required>
                        </label>
                    </div>
                    <div class="form-group">
                        <button type="submit">Connexion</button>
                    </div>
                </form>


            </div>

        </div>
    </div>

</div>


<?php
$content = ob_get_clean();

require('template.php');