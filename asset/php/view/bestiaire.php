<!-- Permet d'afficher en tableau la liste des monstres de la base de donné -->
<div class="container" id="bestiaire">
    <div class="row justify-content-md-center">
        <div class="col col-md-auto">
            <h2>BESTIAIRE</h2>
            <p>Voici le bestiaire du jeux: </p>
            <table class="table">
                <thead>
                    <tr>
                        <th class="scope">#</th>
                        <th class="scope">Image</th>
                        <th class="scope">Nom</th>
                    </tr>
                </thead>

                <?php

                $listMonster = $database->Query('monster');
                while($data = $listMonster->fetch()){
                    ?>
                    <tbody>
                        <tr>
                            <th scope="row"><?= $data['id'] ?></th>
                            <td><img src="asset/public/monster/<?= $data['img'] ?>" alt="" style="width: 50px; heigth: 50px"></td>
                            <td class="bold"><?= $data['name'] ?></td>
                        </tr>
                     </tbody>
                    <?php
                }
                ?>
            </table>
        </div>
    </div>
    <div class="row justify-content-md-center">
        <div class="col col-md-auto">
            <a href="index.php"><button class="btn btn-dark">Retour</button></a>
        </div>
    </div>
</div>