<?php

if(isset($_SESSION['status']) && $_SESSION['status'] === 'lose' ){
    
    $lose = '<p style="font-weight: bold;">'.$_SESSION['hero']['name'].' c\'est fait battre</p>';
    $_SESSION['status'] = '';

}

if(!empty($_SESSION['monster'])){
    
    $_SESSION['monster'] = [];

}

if(!empty($_SESSION['hero'])){
    
    $nameHero = $_SESSION['hero']['name'];

}

?>
<div class="container" style="text-align:center;">    
    <h1>Bienvenue Joueur</h1>
    <?php

    if(isset($lose)){
        echo $lose;
    }else{
        echo '<br>';
    }

    ?>
    <div class="row justify-content-md-center" id="formJoueur">
        <div class="col col-md-auto">
            <form name="joueur">
                <div class="row" style="width: 500px">
                    <div class="col">
                        <label for="name" class="form-label">Quel est votre nom? </label>
                    </div>

                    <div class="col">
                        <input type="text"  name="name" placeholder="Votre nom" class="form-control" value="<?php if(isset($nameHero)){ echo $nameHero; }?>">
                    </div>
                </div>
                <br>
                <div class="row" style="width: 500px">
                    <div class="col">
                        <label for="classes" class="form-label">Quel classes veux tu joué? </label>
                    </div>

                        <div class="col">
                        <select name="classes" id="classes" class="form-select">
                            <option select>Choissiser votre classes</option>
                            <?= $database->listClasses('classesjouable') ?>
                        </select>
                    </div>

                </div>
                <br>
                <input type="button" name="button" value="Commencer" onClick="controlFormJoueur(joueur)" class="btn btn-dark">
            </form>
            <a href="index.php"><button class="btn btn-dark">Retour</button></a>
            <p id="test" style="font-weight: bold; color: red"></p>
        </div>
    </div>
</div>