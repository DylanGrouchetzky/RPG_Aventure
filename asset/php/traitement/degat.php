<?php
session_start();

$_SESSION['degat'] = [
    'hero' => $_SESSION['monster']['atk'] - $_SESSION['hero']['def'],
    'monster' => $_SESSION['hero']['atk'] - $_SESSION['monster']['def'],
];

$_SESSION['monster']['pv'] = $_SESSION['monster']['pv'] - $_SESSION['degat']['monster'];
$_SESSION['hero']['pv'] = $_SESSION['hero']['pv'] - $_SESSION['degat']['hero'];

if($_SESSION['monster']['pv'] <= 0 ){

    $_SESSION['status'] = 'win';
    $_SESSION['monster'] = [];
    header('Location: ../../../index.php?page=infocombat');

}else if($_SESSION['hero']['pv'] <= 0 ){
    
    $_SESSION['status'] = 'lose';
    $_SESSION['monster'] = [];
    header('Location: ../../../index.php?page=infojoueur');    

}else{

    header('Location: ../../../index.php?page=combat&action=attaque');

}

?>