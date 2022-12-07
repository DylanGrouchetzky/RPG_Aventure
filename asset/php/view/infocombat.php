<?php

$NbRandom = rand(1, 4);

if(!isset($_SESSION['monster']) || empty($_SESSION['monster'])){

    $infoMonster = $database->Query('monster', 'WHERE id = "'.$NbRandom.'"');
    $infoMonster = $infoMonster->fetch();

    $_SESSION['monster'] = [
        'name' => $infoMonster['name'],
        'pv' => $infoMonster['pv'],
        'pvMax' => $infoMonster['pv'],
        'atk' => $infoMonster['atk'],
        'def' => $infoMonster['def'],
        'img' => $infoMonster['img'],
    ];

}

if($_SESSION['hero']['killNumbers'] <= 1){
    $phrase = 'Monstre déjà tué: ';
}else{
    $phrase = "Monstres déjà tués: ";
}

if(isset($_SESSION['status']) && $_SESSION['status'] === 'win' ){
    
    $win = '<p style="font-weight: bold;">Bravo vous avez réussi votre combat</p>';
    $_SESSION['status'] = '';

}

$_SESSION['hero']['atk'] = $_SESSION['hero']['atkInitial'];
    ?>
    <div class="container" style="text-align:center;">
        <h1 style="text-decoration: underline red;">Bonjour Aventurier</h1>
    <?php

    if(isset($win)){
        echo $win;
    }else{
        echo '<br>';
    }

    ?>
        <div class="row justify-content-md-center">
            <div class="col col-md-auto">
                <div class="card" style="width: 18rem;background-color: #BABABA">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="asset/public/classes/<?= $_SESSION['hero']['img'] ?>" class="img-fluid rounded-start" alt="..." style="padding-top: 40px;">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title"><?= $_SESSION['hero']['name'] ?></h5>
                                <h6 class="card-subtitle mb-2 text-muted"><?= $_SESSION['hero']['classes'] ?></h6>
                                <h6 class="card-subtitle mb-2 text-muted"><?= $phrase?> <?= $_SESSION['hero']['killNumbers'] ?></h6>
                                <p class="card-text">PV: <?= $_SESSION['hero']['pv'] ?>/<?= $_SESSION['hero']['pvMax'] ?></p>
                                <p class="card-text">PM: <?= $_SESSION['hero']['pm'] ?>/<?= $_SESSION['hero']['pmMax'] ?></p>
                                <p class="card-text">Atk: <?= $_SESSION['hero']['atk'] ?></p>
                                <p class="card-text">Def: <?= $_SESSION['hero']['def'] ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="col col-md-auto">
                <p style="font-weight: bold;">Ton prochaine adversaire sera</p>
                <div class="card" style="width: 18rem;background-color: #BABABA">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="asset/public/monster/<?= $_SESSION['monster']['img'] ?>" class="img-fluid rounded-start" alt="..." style="padding-top: 40px">
                        </div>
                        <div class="col-md-8">
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
        <br>
        <div class="row justify-content-md-center">
            <div class="col col-md-auto">
                <a href="index.php?page=infojoueur"><button class="btn btn-danger">Quitter</button></a>
            </div>
            <div class="col col-md-auto">
                <a href="index.php?page=combat"><button class="btn btn-primary">Commencer</button></a>
            </div>
        </div>
       
    </div>