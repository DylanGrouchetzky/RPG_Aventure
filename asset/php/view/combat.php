<?php

$pourcentPV = 100 * $_SESSION['hero']['pv'] / $_SESSION['hero']['pvMax'];
$pourcentPVMonster = 100 * $_SESSION['monster']['pv'] / $_SESSION['monster']['pvMax'];

?>
<div class="container" style="text-align: center">
    <div class="row justify-content-md-center">
        <div class="col col-md-auto" style="width:150px">
            <p style="font-weight: bold;">Vie Ennemie: </p>
        </div>
        <div class="col col-md-auto" style="padding-top: 5px;">
            <div class="progress" style="width: 450px">
                <div class="progress-bar bg-danger" role="progressbar" aria-label="vie" style="width: <?= $pourcentPVMonster ?>%" aria-valuenow="<?= $_SESSION['monster']['pv'] ?>" aria-valuemin="0" aria-valuemax="<?= $_SESSION['monster']['pvMax'] ?>"><?= $_SESSION['monster']['pv'] ?> / <?= $_SESSION['monster']['pvMax'] ?></div>
            </div>
        </div>  
    </div>

    <?php

    ob_start();
    if(isset($_GET['action'])){
        require ($_GET['action'].'.php');
    }else{

    }
    $content = ob_get_clean();
    echo $content;
    ?>

    <div class="row justify-content-md-center">
        <div class="col col-md-auto" style="width:150px">
            <p style="font-weight: bold;">Votre Vie: </p>
        </div>
        <div class="col col-md-auto" style="padding-top: 5px;">
            <div class="progress" style="width: 450px">
                <div class="progress-bar bg-success" role="progressbar" aria-label="vie" style="width:<?= $pourcentPV ?>%" aria-valuenow="<?= $_SESSION['hero']['pv'] ?>" aria-valuemin="0" aria-valuemax="<?= $_SESSION['hero']['pvMax'] ?>"><?= $_SESSION['hero']['pv'] ?> / <?= $_SESSION['hero']['pvMax'] ?></div>
            </div>
        </div>  
    </div>

    <h2>Quelle action voulez vous faire?</h2>
    <div class="row justify-content-md-center">
        <div class="col col-md-auto">
            <a href="asset/php/traitement/degat.php"><button class="btn btn-primary">Attaquer</button></a>
        </div>

        <div class="col col-md-auto">
            <a href="index.php?action=resultat&actions=combat&combat=regen"><button class="btn btn-primary">regen</button></a>
        </div>

        <div class="col col-md-auto">
            <a href="index.php?action=resultat&actions=combat&combat=spell"><button class="btn btn-primary"><?= $_SESSION['hero']['sort'] ?></button></a>
        </div>
    </div>  
</div>