<?php

$_SESSION['hero']['atk'] = $_SESSION['hero']['atkInitial'];

if($_SESSION['hero']['etage'] === 0){
    $_SESSION['hero']['etage'] = 'Rez-de-chaussée';
}

$pourcentVieHero = 100 * $_SESSION['hero']['pv'] / $_SESSION['hero']['pvMax'];
if($pourcentVieHero <= 35){
    $vieHero = '<span style="color: red">'.$_SESSION['hero']['pv'].'</span>';
}else{
    $vieHero = $_SESSION['hero']['pv'];
} 
?>
<div class="container" style="text-align:center;">
    <h1 style="text-decoration: underline red;">Bonjour Aventurier</h1>
<?php


if($_SESSION['hero']['etage'] != -10){
    $NbRandomEvent = rand(0, 100);
}else{
    $NbRandomEvent = 50 ;
}
$listeEvent = array("vendeur", "amulette");

$NblisteEvent = count($listeEvent) - 1;
$NbRandomEvents = rand(0 , $NblisteEvent);

if($NbRandomEvent < 55){
    $event = 'fightMonster';
}else{
    $event = $listeEvent[$NbRandomEvents];
}

require ('asset/php/event/'.$event.'.php');

?>
</div>