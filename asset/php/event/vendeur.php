<div class="row justify-content-md-center" id="event">
    <div class="col col-md-auto" style="width: 30rem;">
    <img src="asset/public/vendeur.png" alt="" style="width:250px; heidth: 250px;">
        <p style="font-weight: bold">Bonjour a vous, faite un choix</p>
        <div class="row justify-content-md-center">
            <div class="col col-md-auto">
                <button class="btn btn-dark" onClick="actionVendeur.RegenVie()">Regen Vie</button>
            </div>

            <div class="col col-md-auto">
                <button class="btn btn-dark" onClick="actionVendeur.RegenMana()">Regen Mana</button>
            </div>

            <div class="col col-md-auto">
                <button class="btn btn-dark" onCLick="actionVendeur.Boost()">Boost L'attaque</button>
            </div>
        </div>
        <br>
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
                    <th><?= $vieHero?>/<?= $_SESSION['hero']['pvMax'] ?></th>
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
</div>

<div style="font-weight:bold" id="actionJoueur"></div>
<div class="col col-md-auto" id="retour">
</div>
<script>

    const pvMaxHero = '<?= $_SESSION['hero']['pvMax'] ?>' * 1
    const pvHero = '<?= $_SESSION['hero']['pv'] ?>' * 1
    const manaHeroMax = '<?= $_SESSION['hero']['pmMax'] ?>' * 1 
    const manaHero = '<?= $_SESSION['hero']['pm'] ?>' * 1
    const atkHero = '<?= $_SESSION['hero']['atk'] ?>' * 1

    const actionVendeur = new Event(pvHero, pvMaxHero, manaHero, manaHeroMax, atkHero)
</script>