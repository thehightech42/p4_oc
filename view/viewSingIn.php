<?php
$titlePage = "Connexion";

ob_start();
?>
<div class="row h-75 align-items-center">

        <div class="row w-100">
            <div class="col-lg-4 align-items-center mx-auto">
                <h4>Connexion :</h4>
                <form action="index.php?type=user&action=singIn" method="POST">
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


<?php
$content = ob_get_clean();

require('template.php');