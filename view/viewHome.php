<?php
$titlePage = "Un billet pour l'Alaska";
ob_start();
?>
    <div class="row m-0 p-0">
        <figure class="col-lg-12 p-0">
                <img class="img-fluid" src="img/Alaska.jpg" alt="Image d'Alaska">
            <figcaption class="col-lg-3 p-4 align-items-center text-center mx-auto border-black" style="margin-top : -40%; border : black solid 5px; border-radius : 5px">
                    <h1>Un billet pour </br> l'Alaska</h1>
            </figcaption>
        </figure>

    </div>


<?php
$content = ob_get_clean();

require('template.php');