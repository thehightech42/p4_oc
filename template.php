<?php
if(isset($_SESSION['admin']) && $_SESSION['admin'] == 1){
    $admin = 1;
}else{
    $admin = 0;
}
?>

<!DOCTYPE html>
<html lang="fr">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title> <?= $titlePage; ?> </title>

        <!--CSS Bootstrap-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    </head>

    <body style="height:100vh">

    <div class="container-fluid h-100 p-0 <?php if($admin == 1){?> m-0<?php }?>">
        <?php include('view/nav.php');?>

        <?php if(!isset($_GET['type']) || $_GET['type'] === "home"){ ?>
            <div class="row p-0 m-0">
                <div class="col-lg-12 p-0">
                    <?= $content ; ?>
                </div>
            </div>

            <?php

        }else{
                ?>
                <div class="row h-100">
                <?php
                if($admin === 1){
                    ?>
                    <div class="col-lg-2">
                        <?php include('view/viewNavAdmin.php');?>
                    </div>
                <?php
                }
                ?>
                    <div class="col-lg-8 col-lg-offset-2<?php if($admin == 0){?> mx-auto <?php }?>">
                        <?= $content ; ?>
                    </div>
            </div>
            <?php
        }?>

    </div>






    <!--Script Bootstrap-->
    <?php
    if(!isset($script)){
        $script = "";
    }
    ?>
    <?= $script ?>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    </body>

</html>