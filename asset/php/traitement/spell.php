<?php

session_start();

if($_SESSION['hero']['pm'] < $_SESSION['hero']['coutPm']){

    $_SESSION['coutpm'] = 'manque';
    header('Location: ../../../index.php?page=combat');

}else{

    if($_SESSION['hero']['sort'] === 'Boost'){

        $_SESSION['hero']['pm'] = $_SESSION['hero']['pm'] - $_SESSION['hero']['coutPm'];
        $_SESSION['newPvHero'] = $_SESSION['hero']['pv'] - $_SESSION['degat']['hero'];
        $_SESSION['hero']['atk'] = $_SESSION['hero']['atk'] * 2;
        $_SESSION['spellTime'] = 1;
        if($_SESSION['newPvHero'] <= 0 ){
        
            $_SESSION['status'] = 'lose';
            $_SESSION['monster'] = [];
            header('Location: ../../../index.php?page=infojoueur');    
        }else{
            $_SESSION['hero']['pv'] = $_SESSION['hero']['pv'] - $_SESSION['degat']['hero'];
            header('Location: ../../../index.php?page=combat&action=sort');
        }
    }

    if($_SESSION['hero']['sort'] === 'Boule de Feu'){

        $_SESSION['monster']['pv'] = $_SESSION['monster']['pv'] - 20;
        $_SESSION['hero']['pm'] = $_SESSION['hero']['pm'] - $_SESSION['hero']['coutPm'];
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
            $_SESSION['hero']['pv'] = $_SESSION['hero']['pv'] - $_SESSION['degat']['hero'];
            header('Location: ../../../index.php?page=combat&action=sort');
        }

    }

}

?>