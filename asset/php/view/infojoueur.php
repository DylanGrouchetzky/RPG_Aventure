<?php

if(isset($_POST['name']) && isset($_POST['classes'])){
    if(!empty($_POST['name'])){
        if($_POST['classes'] != 'Choisiser votre classes' ){
            $_SESSION['name'] = $_POST['name'];
            $_SESSION['classes'] = $_POST['classes'];
            header('Location: index.php?page=traitement');
        }else{
            $erreur = "Il manque votre classes";
        }
    }else{
        $erreur = 'Il manque votre nom';
    }
}

?>
<div class="container" style="text-align:center;">    
    <h1>Bienvenue Joueur</h1>
    <br>
    <div class="row justify-content-md-center">
        <div class="col col-md-auto">
            <form action="index.php?page=infojoueur" method="POST">
                <div class="row" style="width: 500px">
                    <div class="col">
                        <label for="name" class="form-label">Quel est votre nom? </label>
                    </div>

                    <div class="col">
                        <input type="text"  name="name" placeholder="Votre Nom" class="form-control">
                    </div>
                </div>
                <br>
                <div class="row" style="width: 500px">
                    <div class="col">
                        <label for="classes" class="form-label">Quel classes veux tu joué? </label>
                    </div>

                        <div class="col">
                        <select name="classes" id="classes" class="form-select">
                            <option select>Choisiser votre classes</option>
                            <?= $database->listClasses('classesjouable') ?>
                        </select>
                    </div>

                </div>
                <br>
                <input type="submit" value="Commencer" class="btn btn-dark">
            </form>
            <a href="index.php"><button class="btn btn-dark">Retour</button></a>
        </div>
        <?php

        if(isset($erreur)){
            echo '<p style="color: red;font-weight: bold;">Veuillez complet les champs vide s\'il vous plaît</p>';
            echo '<p style="color: red;font-weight: bold;">'.$erreur.'</p>';
        }

        ?>
    </div>
</div>