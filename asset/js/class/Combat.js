class Combat{

    constructor(name, pv, vieMax, atk, def, regen = null, spell = null, pm = null, spellTime = -1, degat = 0, crit = null, pmMaxHero = null, coutSpell = null, atkHeroInitial = null){
        this.name = name
        this.pv = pv
        this.pvMax = vieMax
        this.atk = atk
        this.def = def
        this.regen = regen
        this.spell = spell
        this.pm = pm
        this.spellTime = spellTime
        this.degat = degat
        this.crit = crit
        this.pmMaxHero = pmMaxHero
        this.coutSpell = coutSpell
        this.atkHeroInitial = atkHeroInitial
    } 
    
    afficheInfo(ou, quoi){
        document.getElementById(ou).innerHTML = quoi
    }

    isWin(){
        this.modifBarreVie('barreVieEnnemie' ,monster.pv, monster.pvMax)
        this.afficheInfo('actionJoueur', 'Bravo, tu as gagner')
        this.afficheInfo('consequenceAction', '')
        this.afficheInfo('actionMonster', '')
        this.afficheInfo('buttonAction', `<button class="btn btn-secondary" onClick="hero.menuWin()">Retour au camps</button>`)
    }

    isLose(){
        this.modifBarreVie('barreVieHero', this.pv, this.pvMax)
        this.afficheInfo('actionJoueur', 'Dommage tu as perdu')
        this.afficheInfo('consequenceAction', '')
        this.afficheInfo('actionMonster', '')
        this.afficheInfo('buttonAction', `<button class="btn btn-secondary" onClick="hero.menuLose()">Retour au menu</button>`)
    }

    menuWin(){
        document.location.href = 'asset/php/traitement/finFight.php?pvHero='+this.pv+'&pmHero='+this.pm+'&status=win'
    }

    menuLose(){
        document.location.href = 'index.php?page=infojoueur'
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
        if(Actual <= 0){    
            barreVie.style.width = '0%'
        }else{
            const pourcent = 100 * Actual / AuMax
            barreVie.style.width = pourcent+'%'
            barreVie.innerHTML = Actual+'/'+AuMax
        }
    }

    animationCombat(monster){
        const imgHero = document.getElementById('imgHero')
        const imgMonster = document.getElementById('imgmonster')
        imgHero.style.left = '60%'
        setTimeout(() => {this.modifBarreVie('barreVieEnnemie', monster.pv, monster.pvMax)}, 300);
        setTimeout(() => {imgHero.style.left = '80%'}, 500)
        setTimeout(() => {imgMonster.style.right = '55%'}, 800)
        setTimeout(() => {this.modifBarreVie("barreVieHero", this.pv, this.pvMax)}, 1000);
        setTimeout(() => {imgMonster.style.right = '75%'}, 1400)
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
   
    attaqueMonster(monster){
        if(this.isCrit(5)){
            this.pv = this.pv - (monster.atk * 2 - this.def)
            monster.crit = true
        }else{
            this.pv = this.pv - (monster.atk - this.def)
        }
    }

    attaque(monster){
        const pvMonsterAvantAttaque = monster.pv
        if(this.isCrit(5)){
            monster.pv = monster.pv - (this.atk * 2 - monster.def)
            this.crit = true
        }else{
        monster.pv = monster.pv - (this.atk - monster.def)
        }
        monster.degat = pvMonsterAvantAttaque - monster.pv
        if(monster.pv <= 0){
            this.isWin()
        }else{
            const pvHeroAvantAttaque = this.pv
            this.attaqueMonster(monster)

            if(this.pv <= 0){
                this.isLose()
            }else{

                this.degat = pvHeroAvantAttaque - this.pv

                if(this.crit === null){
                    this.afficheInfo('actionJoueur', '<p>'+monster.name+' c\'est fait attaquer et a subi '+monster.degat+' point de dégat</p>')
                }else{
                    this.afficheInfo('actionJoueur', '<p>'+monster.name+' a subie un <span style="font-weight: bold;color: red;">Coup Critique</span> et a reçu '+monster.degat+' point de dégat</p>')
                    this.crit = null
                }

                this.afficheInfo('consequenceAction', '<p>'+monster.name+' a répliquer</p>')

                if(monster.crit === null){
                    this.afficheInfo('actionMonster', '<p>'+this.name+' c\'est fait attaquer et a subi '+this.degat+' point de dégat</p>')
                }else{
                    this.afficheInfo('actionMonster', '<p>'+this.name+' a subie un <span style="font-weight: bold;color: red;">Coup Critique</span> et a reçu '+this.degat+' point de dégat</p>')
                    monster.crit = null
                }

                this.animationCombat(monster)
            }
        }

        this.spellTimeCount()
        this.afficheInfo('erreurAction', '')
    }

    regeneration(monster){
        let pvActualHero = this.pv
        this.pv = this.pv + this.regen
        if(this.pv > this.pvMax){
            this.pv = this.pvMax
        }
        
        const nbRegeneration = this.pv - pvActualHero 
        pvActualHero = this.pv
        this.attaqueMonster(monster)
        if(this.pv <= 0){
            this.isLose()
        }else{
            this.degat = pvActualHero - this.pv

            this.afficheInfo('actionJoueur', '<p>'+this.name+' c\'est Régénérer de '+nbRegeneration+'</p>')
            this.afficheInfo('consequenceAction', '<p>'+monster.name+' en a profité pour attaquer</p>')
            
            if(monster.crit === null){
                this.afficheInfo('actionMonster', '<p>'+this.name+' c\'est fait attaquer et a subi '+this.degat+' point de dégat</p>')
            }else{
                this.afficheInfo('actionMonster', '<p>'+this.name+' a subie un <span style="font-weight: bold;color: red;">Coup Critique</span> et a reçu '+this.degat+' point de dégat</p>')
                monster.crit = null
            }
        }

        this.animationCombat(monster)
        this.spellTimeCount()
        this.afficheInfo('erreurAction', '')
    }

    spellHero(monster){
        if(this.pm < coutSpell){
            document.getElementById('erreurAction').innerHTML = 'Tu na pas assez de pm'
        }else{
            let phrase = ""
            if(this.spell === 'Boost'){
                this.pm = this.pm - 2
                this.atk = this.atk * 2
                this.spellTime = 1
                phrase = "c'est booster son atk pour 1 tour"
            }

            if(this.spell === 'Boule de Feu'){
                    this.pm = this.pm - coutSpell
                    monster.pv = monster.pv - 20
                    if(monster.pv <= 0){
                        this.isWin()
                    }else{
                        phrase = "a lancer une boule de feu sur "+monster.name
                    }
            }

            if(monster.pv > 0){
                const pvActualHero = this.pv
                this.attaqueMonster(monster)
                const degat = pvActualHero - this.pv
                if(this.pv <= 0){
                    this.isLose()
                }else{
                    const imgHero = document.getElementById('imgHero')
                    const imgMonster = document.getElementById('imgmonster')
                    imgHero.style.left = '60%'
                    setTimeout(() => {this.modifBarreVie("barreManaHero", this.pm, pmMaxHero)}, 300);
                    if(this.spell === "Boost"){
                        setTimeout(() => {imgHero.style.left = '80%'}, 500)
                        setTimeout(() => {imgMonster.style.right = '55%'}, 800)
                        setTimeout(() => {this.modifBarreVie("barreVieHero", this.pv, this.pvMax)}, 1000);
                        setTimeout(() => {imgMonster.style.right = '75%'}, 1400)
                    }
                    if(this.spell === "Boule de Feu"){
                        setTimeout(() => {this.modifBarreVie('barreVieEnnemie', monster.pv, monster.pvMax)}, 500)
                        setTimeout(() => {imgHero.style.left = '80%'}, 800)
                        setTimeout(() => {imgMonster.style.right = '55%'}, 1000)
                        setTimeout(() => {this.modifBarreVie("barreVieHero", this.pv, this.pvMax)}, 1400);
                        setTimeout(() => {imgMonster.style.right = '75%'}, 1800)
                    }

                    this.afficheInfo('actionJoueur', '<p>'+this.name+' '+phrase+'</p>')
                    this.afficheInfo('consequenceAction', '<p>'+monster.name+' a attaquer</p>')
                    if(monster.crit === null){
                        this.afficheInfo('actionMonster', '<p>'+this.name+' c\'est fait attaquer et a subi '+degat+' point de dégat</p>')
                    }else{
                        this.afficheInfo('actionMonster', '<p>'+this.name+' a subie un <span style="font-weight: bold;color: red;">Coup Critique</span> et a reçu '+degat+' point de dégat</p>')
                        monster.crit = null
                    }
                }
            }
        }
    }

}
