<?php

$donneJoueur = $database->Query('classesjouable', 'WHERE name = "'.$_GET['classes'].'"');
$donneJoueur = $donneJoueur->fetch();
$_SESSION['hero'] = [
    'name' => $_GET['name'],
    'classes' => $_GET['classes'],
    'killNumbers' => 0,
    'pv' => $donneJoueur['pv'],
    'pvMax' => $donneJoueur['pv'],
    'pm' => $donneJoueur['pm'],
    'pmMax' => $donneJoueur['pm'],
    'atk' => $donneJoueur['atk'],
    'atkInitial' => $donneJoueur['atk'],
    'def' => $donneJoueur['def'],
    'sort' => $donneJoueur['sort'],
    'coutPm' => $donneJoueur['coutPm'],
    'regen' => $donneJoueur['regen'],
    'img' => $donneJoueur['img'],
];

header('Location: index.php?page=infocombat');

?>