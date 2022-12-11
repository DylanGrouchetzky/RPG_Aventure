<!-- Permet d'afficher en tableau la liste des monstres de la base de donné -->
<div class="container" id="bestiaire">
    <div class="row justify-content-md-center">
        <div class="col col-md-auto">
            <h2 style="font-weight: bold;color: white">BESTIAIRE</h2>
            <p style="font-weight: bold;color: white">Voici le bestiaire du jeux: </p>
            <table class="table">
                <thead>
                    <tr>
                        <th class="scope" style="font-weight: bold;color: white">#</th>
                        <th class="scope" style="font-weight: bold;color: white">Image</th>
                        <th class="scope" style="font-weight: bold;color: white">Nom</th>
                    </tr>
                </thead>

                <?php

                $listMonster = $database->Query('monster');
                while($data = $listMonster->fetch()){
                    ?>
                    <tbody>
                        <tr>
                            <th scope="row" style="font-weight: bold;color: white"><?= $data['id'] ?></th>
                            <td style="font-weight: bold;color: white"><img src="asset/public/monster/<?= $data['img'] ?>" alt="" style="width: 50px; heigth: 50px"></td>
                            <td class="bold" style="font-weight: bold;color: white"><?= $data['name'] ?></td>
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
<script>    
    const bodyStyle = document.getElementById('body')
    bodyStyle.style.backgroundImage = "url('asset/public/fontBestiaire.jpg')";
</script>