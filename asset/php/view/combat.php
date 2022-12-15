<?php

$pourcentHero = 100 * $_SESSION['hero']['pv'] / $_SESSION['hero']['pvMax'];
$pourcentMana = 100 * $_SESSION['hero']['pm'] / $_SESSION['hero']['pmMax'];

?>
<div class="container" style="text-align: center; margin-top: 50px;">
    <div class="row justify-content-md-center">
        
        <div class="col col-md-auto">

            <div>
                <p id='actionJoueur' style="font-weight: bold;color: white"></p>
                <p id='consequenceAction' style="font-weight: bold;color: white"></p>
                <p id='actionMonster' style="font-weight: bold;color: white"></p>
            </div>
            <br>
            <p id="erreurAction" style="font-weight: bold;color: red"></p>
        </div>
    </div>    
</div>
<img src="asset/public/classes/<?= $_SESSION['hero']['img'] ?>" style="position: absolute;bottom: 250px; left: 80%; width: 300px; height: 300px" id="imgHero">
<?php 
if($_SESSION['hero']['etage'] != -10){
    $src="asset/public/monster/";
}else{
    $src="asset/public/monster/boss/";
}
?>
<img src="<?= $src ?><?= $_SESSION['monster']['img'] ?>" style="position: absolute;bottom: 250px; right: 75%; width: 400px; height: 400px" id="imgmonster">
<div style="height: 200px;width: 100%;position: absolute;bottom: 0px;border: 5px solid red;border-radius: 5px;padding: 70px 5px 0px 5px;background-image: url('asset/public/fontActionCombat.png')">
    <div class="row">
        <div class="col">
            <div class="row justify-content-md-center">
                <div class="col col-md-auto" style="width:150px">
                    <p style="font-weight: bold;color: white">Vie <?= $_SESSION['monster']['name'] ?>: </p>
                </div>
                <div class="col col-md-auto" style="padding-top: 5px;">
                    <div class="progress" style="width: 450px">
                        <div class="progress-bar bg-danger" id="barreVieEnnemie" role="progressbar" aria-label="vie" style="width:100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"><?= $_SESSION['monster']['pv'] ?> / <?= $_SESSION['monster']['pvMax'] ?></div>
                    </div>
                </div>  
            </div>
        </div>

        <div class="col">
            <div class="row justify-content-md-center" id="buttonAction">
                <div class="col col-md-auto" style="width:150px;">
                    <button class="btn btn-secondary" onClick="hero.attaque(monster)"id="attaque">Attaquer</button>
                </div>
                <div class="col col-md-auto" style="width:150px">
                    <button class="btn btn-secondary" onClick="hero.regeneration(monster)"id="regen">regen</button>
                </div>  
                <div class="col col-md-auto" style="width:150px">
                    <button class="btn btn-secondary" onCLick="hero.spellHero(monster)"id="spell"><?= $_SESSION['hero']['sort'] ?> <br>cout : <?= $_SESSION['hero']['coutPm'] ?>PM</button>
                </div>
            </div>
        </div>

        <div class="col">
            
            <div class="row justify-content-md-center">
                <div class="col col-md-auto" style="width:150px">
                    <p style="font-weight: bold;color: white">Votre Vie: </p>
                </div>
                <div class="col col-md-auto" style="padding-top: 5px;">
                    <div class="progress" style="width: 450px">
                        <div class="progress-bar bg-success" id="barreVieHero" role="progressbar" aria-label="vie" style="width:<?= $pourcentHero ?>%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"><?= $_SESSION['hero']['pv'] ?> / <?= $_SESSION['hero']['pvMax'] ?></div>
                    </div>
                </div>  
            </div>

            <div class="row justify-content-md-center">
                <div class="col col-md-auto" style="width:150px">
                    <p style="font-weight: bold;color: white">Votre mana: </p>
                </div>
                <div class="col col-md-auto" style="padding-top: 5px;">
                    <div class="progress" style="width: 450px">
                        <div class="progress-bar" id="barreManaHero" role="progressbar" aria-label="vie" style="width:<?= $pourcentMana ?>%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"><?= $_SESSION['hero']['pm'] ?> / <?= $_SESSION['hero']['pmMax'] ?></div>
                    </div>
                </div>  
            </div>
        </div>
    </div>
</div>
<script>
const bodyStyle = document.getElementById('body')
bodyStyle.style.backgroundImage = "url('asset/public/fontCombat.jpg')";
bodyStyle.style.backgroundSize = "cover";

    const nameMonster = '<?= $_SESSION['monster']['name'] ?>'
    const pvMonster = '<?= $_SESSION['monster']['pv'] ?>' * 1
    const pvMaxMonster = '<?= $_SESSION['monster']['pvMax'] ?>' * 1
    const atkMonster = '<?= $_SESSION['monster']['atk'] ?>' * 1
    const defMonster = '<?= $_SESSION['monster']['def'] ?>' * 1

    const nameHero = '<?= $_SESSION['hero']['name'] ?>'
    const pvHero = '<?= $_SESSION['hero']['pv'] ?>' * 1
    const pvMaxHero = '<?= $_SESSION['hero']['pvMax'] ?>' * 1
    const pmHero = '<?= $_SESSION['hero']['pm'] ?>' * 1
    const pmMaxHero = '<?= $_SESSION['hero']['pmMax'] ?>'* 1
    const coutSpell = '<?= $_SESSION['hero']['coutPm'] ?>'* 1
    const atkHero = '<?= $_SESSION['hero']['atk'] ?>'* 1
    const atkHeroInitial = '<?= $_SESSION['hero']['atk'] ?>'* 1
    const defHero = '<?= $_SESSION['hero']['def'] ?>'* 1
    const regenHero = '<?= $_SESSION['hero']['regen'] ?>' * 1
    const spellHero = '<?= $_SESSION['hero']['sort'] ?>'

    const monster = new Combat(nameMonster,pvMonster,pvMaxMonster,atkMonster,defMonster)
    const hero = new Combat(nameHero,pvHero ,pvMaxHero,atkHero,defHero,regenHero,spellHero, pmHero, -1, 0,null, pmMaxHero, coutSpell,atkHeroInitial)
</script>