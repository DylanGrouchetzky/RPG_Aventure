<?php
session_start();

if($_GET['action'] === 'regenVie'){
    $_SESSION['hero']['pv'] = $_GET['pvHero'];
}

if($_GET['action'] === 'regenMana'){
    $_SESSION['hero']['pm'] = $_GET['manaHero'];
}

if($_GET['action'] === 'boost'){
    $_SESSION['hero']['atkInitial'] = $_GET['atkHero'];
}


if($_SESSION['hero']['etage'] === 'Rez-de-chaussée'){
    $_SESSION['hero']['etage'] = -1;
}else{
    $_SESSION['hero']['etage'] = $_SESSION['hero']['etage'] - 1;
}

header('Location: ../../../index.php?page=infocombat');

?>