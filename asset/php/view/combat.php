<?php

$pourcentHero = 100 * $_SESSION['hero']['pv'] / $_SESSION['hero']['pvMax'];
$pourcentMana = 100 * $_SESSION['hero']['pm'] / $_SESSION['hero']['pmMax'];

?>
<div class="container" style="text-align: center; margin-top: 50px;">
    <div class="row justify-content-md-center">
        
        <div class="col col-md-auto">
            <div class="row justify-content-md-center">
                <div class="col col-md-auto" style="width:150px">
                    <p style="font-weight: bold;color: white">Vie Ennemie: </p>
                </div>
                <div class="col col-md-auto" style="padding-top: 5px;">
                    <div class="progress" style="width: 450px">
                        <div class="progress-bar bg-danger" id="barreVieEnnemie" role="progressbar" aria-label="vie" style="width:100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"><?= $_SESSION['monster']['pv'] ?> / <?= $_SESSION['monster']['pvMax'] ?></div>
                    </div>
                </div>  
            </div>

            <div>
                <p id='actionJoueur' style="font-weight: bold;color: white"></p>
                <p id='consequenceAction' style="font-weight: bold;color: white"></p>
                <p id='actionMonster' style="font-weight: bold;color: white"></p>
            </div>

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

            <h2 style="color: white">Quelle action voulez vous faire?</h2>
            <div class="row justify-content-md-center">
                <div class="col col-md-auto">
                    <button class="btn btn-secondary" onClick="hero.attaque(monster)">Attaquer</button>
                </div>

                <div class="col col-md-auto">
                    <button class="btn btn-secondary" onClick="hero.regeneration(monster)">regen</button>
                </div>

                <div class="col col-md-auto">
                    <button class="btn btn-secondary" onCLick="hero.spellHero(monster)"><?= $_SESSION['hero']['sort'] ?> cout : <?= $_SESSION['hero']['coutPm'] ?>PM</button>
                </div>
            </div>
            <br>
            <p id="erreurAction" style="font-weight: bold;color: red"></p>
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

    class Combat{

        constructor(name, pv, vieMax, atk, def, regen = null, spell = null, pm = null, spellTime = -1, degat = 0, crit = null){
            this.name = name
            this.pv = pv
            this.vieMax = vieMax
            this.atk = atk
            this.def = def
            this.regen = regen
            this.spell = spell
            this.pm = pm
            this.spellTime = spellTime
            this.degat = degat
            this.crit = crit
        }

        getRandomInt(max){
            return Math.floor(Math.random() * (max + 1));
        }

        isCrit(nbRandomMax){
            const crit = this.getRandomInt(nbRandomMax)
            if(crit === 3){
                return true
            }else{
                return false
            }
        }

        modifBarreVie(idBarre, Actual, AuMax){
            const barreVie = document.getElementById(idBarre)
            const pourcent = 100 * Actual / AuMax
            barreVie.style.width = pourcent+'%'
            barreVie.innerHTML = Actual+'/'+AuMax
        }

        afficheInfo(ou, quoi){
            document.getElementById(ou).innerHTML = quoi
        }

        spellTimeCount(){
            if(this.spellTime >= 1){
                this.spellTime = this.spellTime - 1
            }
            if(this.spellTime === 0){
                this.atk = atkHeroInitial
                this.spellTime = -1
            }
        }

        attaque(cible){
            const pvCible = cible.pv
            if(this.isCrit(5)){
                cible.pv = cible.pv - (this.atk * 2 - cible.def)
                this.crit = true
            }else{
            cible.pv = cible.pv - (this.atk - cible.def)
            }
            const degat = pvCible - cible.pv
            if(cible.pv <= 0){
                document.location.href = 'asset/php/traitement/finFight.php?pvHero='+this.pv+'&pmHero='+this.pm+'&status=win'
            }else{
                const pvRestant = this.pv
                if(this.isCrit(5)){
                    this.pv = this.pv - (cible.atk * 2 - this.def)
                    cible.crit = true
                }else{
                    this.pv = this.pv - (cible.atk - this.def)
                }

                if(this.pv <= 0){
                    document.location.href = 'asset/php/traitement/finFight.php?&status=lose'
                }else{
                
                    this.modifBarreVie("barreVieEnnemie", cible.pv, cible.vieMax)
                    this.modifBarreVie("barreVieHero", this.pv, this.vieMax)
                    
                    if(this.crit === null){
                        this.afficheInfo('actionJoueur', '<p>'+cible.name+' c\'est fait attaquer et a subi '+degat+' point de dégat</p>')
                    }else{
                        this.afficheInfo('actionJoueur', '<p>'+cible.name+' a subie un <span style="font-weight: bold;color: red;">Coup Critique</span> et a reçu '+degat+' point de dégat</p>')
                        this.crit = null
                    }
                    this.afficheInfo('consequenceAction', '<p>'+cible.name+' a répliquer</p>')

                    const degatRecu = pvRestant - this.pv

                    if(cible.crit === null){
                        this.afficheInfo('actionMonster', '<p>'+this.name+' c\'est fait attaquer et a subi '+degatRecu+' point de dégat</p>')
                    }else{
                        this.afficheInfo('actionMonster', '<p>'+this.name+' a subie un <span style="font-weight: bold;color: red;">Coup Critique</span> et a reçu '+degatRecu+' point de dégat</p>')
                        cible.crit = null
                    }
                
                }
            }

            this.spellTimeCount()
            this.afficheInfo('erreurAction', '')
        }

        attaqueMonster(monster){
            if(this.isCrit(5)){
                this.pv = this.pv - (monster.atk * 2 - this.def)
                monster.crit = true
            }else{
                this.pv = this.pv - (monster.atk - this.def)
            }
        }

        regeneration(attaquand){
            let pvActualHero = this.pv
            this.pv = this.pv + this.regen
            if(this.pv > this.vieMax){
                this.pv = this.vieMax
            }
            const nbRegeneration = this.pv - pvActualHero 
            pvActualHero = this.pv
            this.attaqueMonster(attaquand)
            if(this.pv <= 0){
                document.location.href = 'asset/php/traitement/finFight.php?&status=lose'
            }else{
                this.afficheInfo('actionJoueur', '<p>'+this.name+' c\'est Régénérer de '+nbRegeneration+'</p>')
                this.afficheInfo('consequenceAction', '<p>'+attaquand.name+' en a profité pour attaquer</p>')
                const degat = pvActualHero - this.pv
                this.modifBarreVie("barreVieHero", this.pv, this.vieMax)
                if(attaquand.crit === null){
                    this.afficheInfo('actionMonster', '<p>'+this.name+' c\'est fait attaquer et a subi '+degat+' point de dégat</p>')
                }else{
                    this.afficheInfo('actionMonster', '<p>'+this.name+' a subie un <span style="font-weight: bold;color: red;">Coup Critique</span> et a reçu '+degat+' point de dégat</p>')
                    attaquand.crit = null
                }
            }

            this.spellTimeCount()
            this.afficheInfo('erreurAction', '')
        }

        spellHero(attaquand){
            if(this.pm < coutSpell){
                document.getElementById('erreurAction').innerHTML = 'Tu na pas assez de pm'
            }else{
                let phrase = ""
                if(this.spell === 'Boost'){
                    this.pm = this.pm - 2
                    this.atk = this.atk * 2
                    this.modifBarreVie("barreManaHero", this.pm, pmMaxHero)
                    this.spellTime = 1
                    phrase = "c'est booster son atk pour 1 tour"
                }

                if(this.spell === 'Boule de Feu'){
                        this.pm = this.pm - coutSpell
                        attaquand.pv = attaquand.pv - 20
                        this.modifBarreVie("barreManaHero", this.pm, pmMaxHero)
                        if(attaquand.pv <= 0){
                            document.location.href = 'asset/php/traitement/finFight.php?pvHero='+this.pv+'&pmHero='+this.pm+'&status=win'
                        }else{
                            this.modifBarreVie('barreVieEnnemie', attaquand.pv, attaquand.vieMax)
                            phrase = "a lancer une boule de feu sur "+attaquand.name
                        }
                }

                if(attaquand.pv > 0){
                    const pvActualHero = this.pv
                    this.attaqueMonster(attaquand)
                    const degat = pvActualHero - this.pv
                    if(this.pv <= 0){
                        document.location.href = 'asset/php/traitement/finFight.php?&status=lose'
                    }else{
                        this.modifBarreVie("barreVieHero", this.pv, this.vieMax)
                        this.afficheInfo('actionJoueur', '<p>'+this.name+' '+phrase+'</p>')
                        this.afficheInfo('consequenceAction', '<p>'+attaquand.name+' a attaquer</p>')
                        if(attaquand.crit === null){
                            this.afficheInfo('actionMonster', '<p>'+this.name+' c\'est fait attaquer et a subi '+degat+' point de dégat</p>')
                        }else{
                            this.afficheInfo('actionMonster', '<p>'+this.name+' a subie un <span style="font-weight: bold;color: red;">Coup Critique</span> et a reçu '+degat+' point de dégat</p>')
                            attaquand.crit = null
                        }
                    }
                }
            }
        }

    }

    const monster = new Combat(nameMonster,pvMonster,pvMaxMonster,atkMonster,defMonster)
    const hero = new Combat(nameHero,pvHero ,pvMaxHero,atkHero,defHero,regenHero,spellHero, pmHero)
</script>