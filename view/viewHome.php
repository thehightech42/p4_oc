<?php
$titlePage = "Billet simple pour l'Alaska";
ob_start();
?>
    <div class="container-fluid m-0 p-0" id="viewComputerHome">
        <img src="img/Alaska.jpg" alt="Image d'Alaska" class="img-Alaska-Computer" style="width:100%;">
        <div class="centered"><h1>Billet simple pour <br/> l'Alaska</h1></div>
    </div>

    <div class="container-fluid m-0 p-0" id="viewSmartphoneHome">
        <img src="img/Alaska-Smartphone.jpg" alt="Image de l'Alaska" class="img-Alaska-Smartphone">
        <div class="centered"><h1>Billet simple pour <br/> l'Alaska</h1></div>
    </div>
<?php
$content = ob_get_clean();

require('template.php');