<?php
session_start();
if($_GET['status'] === 'win'){
$_SESSION['hero']['pv'] = $_GET['pvHero'];
$_SESSION['hero']['pm'] = $_GET['pmHero'];
$_SESSION['hero']['killNumbers'] = $_SESSION['hero']['killNumbers'] + 1;
$_SESSION['status'] = 'win';
$_SESSION['monster'] = '';

header('Location: ../../../index.php?page=infocombat');
}

if($_GET['status'] === 'lose'){
    $_SESSION['status'] = 'lose';
    header('Location: ../../../index.php?page=infojoueur');
}