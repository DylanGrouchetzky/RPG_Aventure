class Event{

    constructor(vie, vieMax, mana, manaMax, atk){
        this.vie = vie
        this.vieMax = vieMax 
        this.mana = mana
        this.manaMax = manaMax
        this.atk = atk
    }

    retourPV(){
        document.location.href = 'asset/php/traitement/actionVendeur.php?action=regenVie&pvHero='+this.vie
    }

    retourMana(){
        document.location.href = 'asset/php/traitement/actionVendeur.php?action=regenMana&manaHero='+this.mana
    }

    retourAtk(){
        document.location.href = 'asset/php/traitement/actionVendeur.php?action=boost&atkHero='+this.atk
    }

    RegenVie(){
        const pvActual = this.vie
        this.vie = this.vie + 40
        if(this.vie > this.vieMax){
            this.vie = this.vieMax
        }
        const pvRegenerer = this.vie - pvActual
        document.getElementById('event').innerHTML = ""
        document.getElementById('actionJoueur').innerHTML = `<img src="asset/public/vendeur.png" alt="" style="width:250px; heidth: 250px;">
                                                            <p>Tu as choisi de regagner de la vie, sage decision</p>
                                                            <p>Tu as pus regagner de ${pvRegenerer} point de vie</p>
                                                            <p>Tu es donc as ${this.vie}/${this.vieMax}PV</p>
                                                            <p>Maintenant repart au combat</p>`
        document.getElementById('retour').innerHTML = '<button class="btn btn-dark" onClick="actionVendeur.retourPV()">Retour</button>'
    }

    RegenMana(){
        const manaActual = this.mana
        this.mana = this.mana + 30
        if(this.mana > this.manaMax){
            this.mana = this.manaMax
        }
        const manaRegenerer = this.mana - manaActual
        document.getElementById('event').innerHTML = ""
        document.getElementById('actionJoueur').innerHTML = `<img src="asset/public/vendeur.png" alt="" style="width:250px; heidth: 250px;">
                                                            <p>Tu as choisi de regagner de la mana, sage decision</p>
                                                            <p>Tu as pus regagner de ${manaRegenerer} point de mana</p>
                                                            <p>Tu es donc as ${this.mana}/${this.manaMax}PM</p>
                                                            <p>Maintenant repart au combat</p>`
        document.getElementById('retour').innerHTML = '<button class="btn btn-dark" onClick="actionVendeur.retourMana()">Retour</button>'
    }

    Boost(){
        this.atk = this.atk + 5
        document.getElementById('event').innerHTML = ""
        document.getElementById('actionJoueur').innerHTML = `<img src="asset/public/vendeur.png" alt="" style="width:250px; heidth: 250px;">
                                                            <p>Tu as choisi de booster ton attaque, sage decision</p>
                                                            <p>Ton attaque à augmenter de 5 point</p>
                                                            <p>Tu as donc ${this.atk} de point Attaque</p>
                                                            <p>Maintenant repart au combat</p>`
        document.getElementById('retour').innerHTML = '<button class="btn btn-dark" onClick="actionVendeur.retourAtk()">Retour</button>'
    }

}