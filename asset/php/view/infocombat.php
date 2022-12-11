<?php

$NbRandom = rand(1, 4);

if($_SESSION['hero']['killNumbers'] != 10 ){
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
}else{
    $infoMonster = $database->Query('boss', 'WHERE id = "1"');
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

if($_SESSION['hero']['etage'] === 0){
    $_SESSION['hero']['etage'] = 'Rez-de-chaussée';
}

$pourcentVieHero = 100 * $_SESSION['hero']['pv'] / $_SESSION['hero']['pvMax'];
if($pourcentVieHero <= 35){
    $vieHero = '<span style="color: red">'.$_SESSION['hero']['pv'].'</span>';
}else{
    $vieHero = $_SESSION['hero']['pv'];
} 
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
            <div class="col col-md-auto"style="width: 25rem">
                <table class="table table-bordered border-dark">
                    <tbody style="text-align:center">
                        <tr>
                            <th colspan="2"><?= $_SESSION['hero']['name'] ?></th>
                        </tr>
                        <tr>
                            <th>Classes</th>
                            <th><?= $_SESSION['hero']['classes'] ?></th>
                        </tr>

                        <tr>
                            <th>étage</th>
                            <th><?= $_SESSION['hero']['etage'] ?></th>
                        </tr>

                        <tr>
                            <th>Monstre tué</th>
                            <th><?= $_SESSION['hero']['killNumbers'] ?></th>
                        </tr>

                        <tr>
                            <th>PV</th>
                            <th><?= $vieHero ?>/<?= $_SESSION['hero']['pvMax'] ?></th>
                        </tr>

                        <tr>
                            <th>PM</th>
                            <th><?= $_SESSION['hero']['pm'] ?>/<?= $_SESSION['hero']['pmMax'] ?></th>
                        </tr>

                        <tr>
                            <th>Atk</th>
                            <th><?= $_SESSION['hero']['atk'] ?></th>
                        </tr>

                        <tr>
                            <th>Def</th>
                            <th><?= $_SESSION['hero']['def'] ?></th>
                        </tr>

                        <tr>
                            <th>Regen</th>
                            <th><?= $_SESSION['hero']['regen'] ?></th>
                        </tr>
                    </tbody>
                </table>
            </div>
            <br>
            <div class="col col-md-auto" style="width: 25rem;">
                <p style="font-weight: bold;">Ton prochaine adversaire sera</p>
                <?php
                if($_SESSION['hero']['killNumbers'] != 10){
                ?>
                <table class="table table-bordered border-dark">
                    <tbody style="text-align:center">
                        <tr>
                            <th><?= $_SESSION['monster']['name'] ?></th>
                            <th><img src="asset/public/monster/<?= $_SESSION['monster']['img'] ?>" style="width: 50px; heidth: 50px"></th>
                        </tr>

                        <tr>
                            <th>pv</th>
                            <th><?= $_SESSION['monster']['pv'] ?>/<?= $_SESSION['monster']['pvMax'] ?></th>
                        </tr>

                        <tr>
                            <th>atk</th>
                            <th><?= $_SESSION['monster']['atk'] ?></th>
                        </tr>

                        <tr>
                            <th>def</th>
                            <th><?= $_SESSION['monster']['def'] ?></th>
                        </tr>
                    </tbody>
                </table>
                <?php
                }else{
                    ?>
                    <table class="table table-bordered border-dark">
                        <tbody style="text-align:center">
                            <tr>
                                <th><?= $_SESSION['monster']['name'] ?></th>
                                <th><img src="asset/public/monster/boss/<?= $_SESSION['monster']['img'] ?>" style="width: 50px; heidth: 50px"></th>
                            </tr>

                            <tr>
                                <th>pv</th>
                                <th>??/??</th>
                            </tr>

                            <tr>
                                <th>atk</th>
                                <th>??</th>
                            </tr>

                            <tr>
                                <th>def</th>
                                <th>??</th>
                            </tr>
                        </tbody>
                    </table>
                    <?php
                }
                ?>
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