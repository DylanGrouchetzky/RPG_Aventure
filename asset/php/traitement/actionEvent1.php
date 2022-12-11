<?php
session_start();

if($_GET['action'] === 'boost'){
    $_SESSION['hero']['atkInitial'] = $_SESSION['hero']['atkInitial'] + 5;
}

header('Location: ../../../index.php?page=infocombat');
//header('Location: ../../../index.php?page=infocombat');

?>