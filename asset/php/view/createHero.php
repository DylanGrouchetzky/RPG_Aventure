<?php

$donneJoueur = $database->Query('classesjouable', 'WHERE name = "'.$_SESSION['classes'].'"');
$donneJoueur = $donneJoueur->fetch();
$_SESSION['hero'] = [
    'name' => $_SESSION['name'],
    'classes' => $_SESSION['classes'],
    'killNumbers' => 0,
    'pv' => $donneJoueur['pv'],
    'pvMax' => $donneJoueur['pv'],
    'pm' => $donneJoueur['pm'],
    'pmMax' => $donneJoueur['pm'],
    'atk' => $donneJoueur['atk'],
    'def' => $donneJoueur['def'],
    'sort' => $donneJoueur['sort'],
    'img' => $donneJoueur['img'],
];

header('Location: index.php?page=infocombat');

?>