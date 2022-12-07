<?php

session_start();

$_SESSION['hero']['pv'] = $_SESSION['hero']['pv'] - $_SESSION['degat']['hero'];

$_SESSION['hero']['atk'] = $_SESSION['hero']['atk'] * 2;

$_SESSION['spellTime'] = 1;

header('Location: ../../../index.php?page=combat&action=sort');

?>