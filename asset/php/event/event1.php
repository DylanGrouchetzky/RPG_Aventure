<div class="row justify-content-md-center" id="event">
    <div class="col col-md-auto" style="width: 30rem;">
        <h1>Sorcier</h1>
        <p style="font-weight: bold">Bonjour a vous, faite un choix</p>
        <div class="row justify-content-md-center">
            <div class="col col-md-auto">
                <button class="btn btn-dark" onClick="actionEvent.RegenVie()">Regen Vie</button>
            </div>

            <div class="col col-md-auto">
                <button class="btn btn-dark" onClick="actionEvent.RegenMana()">Regen Mana</button>
            </div>

            <div class="col col-md-auto">
                <button class="btn btn-dark" onCLick="actionEvent.Boost()">Boost L'attaque</button>
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

    class Event{

        constructor(vie, vieMax, mana, manaMax, atk){
            this.vie = vie
            this.vieMax = vieMax 
            this.mana = mana
            this.manaMax = manaMax
            this.atk = atk
        }

        retourPV(){
            document.location.href = 'asset/php/traitement/actionEvent1.php?action=regenVie&pvHero='+this.vie
        }

        retourMana(){
            document.location.href = 'asset/php/traitement/actionEvent1.php?action=regenMana&manaHero='+this.mana
        }

        retourAtk(){
            document.location.href = 'asset/php/traitement/actionEvent1.php?action=boost&atkHero='+this.atk
        }

        RegenVie(){
            const pvActual = this.vie
            this.vie = this.vie + 40
            if(this.vie > this.vieMax){
                this.vie = this.vieMax
            }
            const pvRegenerer = this.vie - pvActual
            document.getElementById('event').innerHTML = ""
            document.getElementById('actionJoueur').innerHTML = `<p>Tu as choisi de regagner de la vie, sage decision</p>
                                                                <p>Tu as pus regagner de ${pvRegenerer} point de vie</p>
                                                                <p>Tu es donc as ${this.vie}/${this.vieMax}PV</p>
                                                                <p>Maintenant repart au combat</p>`
            document.getElementById('retour').innerHTML = '<button class="btn btn-dark" onClick="actionEvent.retourPV()">Retour</button>'
        }

        RegenMana(){
            const manaActual = this.mana
            this.mana = this.mana + 30
            if(this.mana > this.manaMax){
                this.mana = this.manaMax
            }
            const manaRegenerer = this.mana - manaActual
            document.getElementById('event').innerHTML = ""
            document.getElementById('actionJoueur').innerHTML = `<p>Tu as choisi de regagner de la mana, sage decision</p>
                                                                <p>Tu as pus regagner de ${manaRegenerer} point de mana</p>
                                                                <p>Tu es donc as ${this.mana}/${this.manaMax}PM</p>
                                                                <p>Maintenant repart au combat</p>`
            document.getElementById('retour').innerHTML = '<button class="btn btn-dark" onClick="actionEvent.retourMana()">Retour</button>'
        }

        Boost(){
            this.atk = this.atk + 5
            document.getElementById('event').innerHTML = ""
            document.getElementById('actionJoueur').innerHTML = `<p>Tu as choisi de booster ton attaque, sage decision</p>
                                                                <p>Ton attaque à augmenter de 5 point</p>
                                                                <p>Tu as donc ${this.atk} de point Attaque</p>
                                                                <p>Maintenant repart au combat</p>`
            document.getElementById('retour').innerHTML = '<button class="btn btn-dark" onClick="actionEvent.retourAtk()">Retour</button>'
        }

    }

    const actionEvent = new Event(pvHero, pvMaxHero, manaHero, manaHeroMax, atkHero)
</script>