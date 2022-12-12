<?php
session_start();
if($_GET['status'] === 'win'){
$_SESSION['hero']['pv'] = $_GET['pvHero'];
$_SESSION['hero']['pm'] = $_GET['pmHero'];
$_SESSION['hero']['killNumbers'] = $_SESSION['hero']['killNumbers'] + 1;
$_SESSION['status'] = 'win';
$_SESSION['monster'] = '';
if($_SESSION['hero']['etage'] === 'Rez-de-chaussée'){
    $_SESSION['hero']['etage'] = -1;
}else{
    $_SESSION['hero']['etage'] = $_SESSION['hero']['etage'] - 1;
}

header('Location: ../../../index.php?page=infocombat');
}
