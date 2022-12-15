<?php
session_start();

if($_GET['action'] === 'bonus'){
    if($_GET['caractéristique'] === "pv"){
        $_SESSION['hero']['pvMax'] = $_SESSION['hero']['pvMax'] + 10;
        $_SESSION['hero']['pv'] = $_SESSION['hero']['pv'] +10;
    }
    if($_GET['caractéristique'] === "pm"){
        $_SESSION['hero']['pmMax'] = $_SESSION['hero']['pmMax'] +15;
        $_SESSION['hero']['pm'] = $_SESSION['hero']['pm'] + 15;
    }
    if($_GET['caractéristique'] === "atk"){
        $_SESSION['hero']['atkInitial'] = $_SESSION['hero']['atkInitial'] + 5;
    }
    if($_GET['caractéristique'] === "def"){
        $_SESSION['hero']['def'] = $_SESSION['hero']['def'] + 5;
    }
}

if($_GET['action'] === 'piege'){
    $_SESSION['hero']['pv'] = $_SESSION['hero']['pv'] - 10;
}

if($_SESSION['hero']['etage'] === 'Rez-de-chaussée'){
    $_SESSION['hero']['etage'] = -1;
}else{
    $_SESSION['hero']['etage'] = $_SESSION['hero']['etage'] - 1;
}

header('Location: ../../../index.php?page=infocombat');

?>