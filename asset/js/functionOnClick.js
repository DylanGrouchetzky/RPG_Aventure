function controlFormJoueur(joueur){
    const name = document.joueur.name.value
    const classes = document.joueur.classes.value
    if(name === ''){
       document.getElementById('test').innerHTML = "Veuillez rentrer un nom"
    }else{
        if(classes === 'Choissiser votre classes'){
            document.getElementById('test').innerHTML = "Veuillez choisir une classe"
        }else{
            document.location.href="index.php?page=createHero&name="+name+"&classes="+classes
        }
    }
}
