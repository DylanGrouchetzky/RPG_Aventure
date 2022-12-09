function control(joueur){
    const name = document.joueur.name.value
    const classes = document.joueur.classes.value
    if(name === ''){
       alert('Veuillez rentrer un nom')
    }else{
        if(classes === 'Choissiser votre classes'){
            alert('Veuillez choisir une classes')
        }else{
            document.location.href="index.php?page=createHero&name="+name+"&classes="+classes
        }
    }
}