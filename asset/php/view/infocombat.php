<?php

if(isset($_SESSION['status']) && $_SESSION['status'] === 'win' ){
    
    $win = '<p style="font-weight: bold;">Bravo vous avez réussi votre combat</p>';
    $_SESSION['status'] = '';

}

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



$NbRandomEvent = rand(0, 100);

if($NbRandomEvent <= 60){
    $event = 'fightMonster';
}else{
    $event = 'event1';
}

require ('asset/php/event/'.$event.'.php');

?>
</div>