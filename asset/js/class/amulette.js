class Amulette{

    constructor(pvMax, pmMax, atk, def, action = null){
        this.pvMax = pvMax
        this.pmMax = pmMax
        this.atk = atk
        this.def = def
        this.action = action
    }

    getRandomInt(max){
        return Math.floor(Math.random() * (max + 1));
    }

    randomBonus(){
        let number = this.getRandomInt(4);
        if(number === 0){
            number = 1
        }
        let caractéristique = ""
        if(number === 1){
            caractéristique = "pv"
        }else if(number === 2){
            caractéristique = "pm"
        }else if(number === 3){
            caractéristique ="atk"
        }else if(number === 4){
            caractéristique = "def"
        }
        this.action = caractéristique
        document.getElementById('amulette').innerHTML = '<p>Ta caractéristique '+caractéristique+' à était améliorer</p>'
        document.getElementById('retour').innerHTML = '<button class="btn btn-dark" onClick="action.retourBonus()">Retour</button>'
    }

    retourBonus(){
        document.location.href = 'asset/php/traitement/actionAmulette.php?action=bonus&caractéristique='+this.action
    }

    retourPiege(){
        document.location.href = 'asset/php/traitement/actionAmulette.php?action=piege'
    }

    piege(){
        document.getElementById('amulette').innerHTML = `<p>L'amulette explose est ta infliger 10 point de dégat</p>`
        document.getElementById('retour').innerHTML = '<button class="btn btn-dark" onClick="action.retourPiege()">Retour</button>'
    }

    fight(){

    }

}