<?php
require ('asset/php/traitement/degatInfliger.php');
$pourcentPV = 100 * $_SESSION['hero']['pv'] / $_SESSION['hero']['pvMax'];
$pourcentPVMonster = 100 * $_SESSION['monster']['pv'] / $_SESSION['monster']['pvMax'];

if(isset($_SESSION['spellTime'])){
    if($_SESSION['spellTime'] > 0){
        $_SESSION['spellTime'] = $_SESSION['spellTime'] - 1;
    }else if($_SESSION['spellTime'] === 0){
        $_SESSION['spellTime'] = $_SESSION['spellTime'] - 1;
        $_SESSION['hero']['atk'] = $_SESSION['hero']['atkInitial'];
    }
}

if(isset($_SESSION['coutpm']) && $_SESSION['coutpm'] === 'manque'){
    $manquePm = '<p style="font-weight: bold; color: red;">Rias manque de PM</p>';
    $_SESSION['coutpm'] = "";
}

?>
<div class="container" style="text-align: center; margin-top: 50px;">
    <div class="row justify-content-md-center">
        <div class="col col-md-auto">
            <div class="card" style="width: 15rem;background-color: #BABABA">
                <div class="row">
                    <div class="col">
                        <div class="card-body">
                            <h5 class="card-title"><?= $_SESSION['hero']['name'] ?></h5>
                            <h6 class="card-subtitle mb-2 text-muted"><?= $_SESSION['hero']['classes'] ?></h6>
                            <p class="card-text">PV: <?= $_SESSION['hero']['pv'] ?>/<?= $_SESSION['hero']['pvMax'] ?></p>
                            <p class="card-text">PM: <?= $_SESSION['hero']['pm'] ?>/<?= $_SESSION['hero']['pmMax'] ?></p>
                            <p class="card-text">Atk: <?= $_SESSION['hero']['atk'] ?></p>
                            <p class="card-text">Def: <?= $_SESSION['hero']['def'] ?></p>
                            <p class="card-text">Régénération: <?= $_SESSION['hero']['regen'] ?> PV</p>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col col-md-auto">
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
                    <a href="asset/php/traitement/degat.php"><button class="btn btn-secondary">Attaquer</button></a>
                </div>

                <div class="col col-md-auto">
                    <a href="asset/php/traitement/soin.php"><button class="btn btn-secondary">regen</button></a>
                </div>

                <div class="col col-md-auto">
                    <a href="asset/php/traitement/spell.php"><button class="btn btn-secondary"><?= $_SESSION['hero']['sort'] ?> cout : <?= $_SESSION['hero']['coutPm'] ?>PM</button></a>
                </div>
            </div>
            <br>
            <?php
             if(isset($manquePm)){
                ?>
                <div class="row justify-content-md-center">
                    <?= $manquePm ?>     
                </div>
                <?php
             }
            

            ?>
        </div>

        <div class="col col-md-auto">
        <div class="card" style="width: 10rem;background-color: #BABABA">
            <div class="row">
                <div class="col">
                    <div class="card-body">
                        <h5 class="card-title"><?= $_SESSION['monster']['name'] ?></h5>      
                        <p class="card-text">PV: <?= $_SESSION['monster']['pv'] ?>/<?= $_SESSION['monster']['pvMax'] ?></p>
                        <p class="card-text">Atk: <?= $_SESSION['monster']['atk'] ?></p>
                        <p class="card-text">Def: <?= $_SESSION['monster']['def'] ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>    
</div>