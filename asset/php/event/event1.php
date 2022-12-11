<h1>Sorcier</h1>
<p>Bonjour a vous, faite un choix</p>
<button>Regen Mana</button>
<button>Regen Vie</button>
<a href="asset/php/traitement/actionEvent1.php?action=boost"><button>Boost Atk</button></a>
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