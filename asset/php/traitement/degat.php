<?php
session_start();



$_SESSION['monster']['pv'] = $_SESSION['monster']['pv'] - $_SESSION['degat']['monster'];
$_SESSION['newPvHero'] = $_SESSION['hero']['pv'] - $_SESSION['degat']['hero'];

if($_SESSION['monster']['pv'] <= 0 ){

    $_SESSION['status'] = 'win';
    $_SESSION['monster'] = [];
    $_SESSION['hero']['killNumbers'] = $_SESSION['hero']['killNumbers'] + 1;
    header('Location: ../../../index.php?page=infocombat');

}else if($_SESSION['newPvHero'] <= 0 ){
    
    $_SESSION['status'] = 'lose';
    $_SESSION['monster'] = [];
    header('Location: ../../../index.php?page=infojoueur');    

}else{

    $_SESSION['hero']['pv'] = $_SESSION['newPvHero'];
    header('Location: ../../../index.php?page=combat&action=attaque');

}

?>