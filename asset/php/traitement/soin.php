<?php
session_start();

$_SESSION['degat'] = [
    'hero' => $_SESSION['monster']['atk'] - $_SESSION['hero']['def'],
];

$_SESSION['hero']['pv'] = $_SESSION['hero']['pv'] + 35;
if($_SESSION['hero']['pv'] > $_SESSION['hero']['pvMax']){
    $_SESSION['hero']['pv'] = $_SESSION['hero']['pvMax'];
}
$_SESSION['hero']['pv'] = $_SESSION['hero']['pv'] - $_SESSION['degat']['hero'];

header('Location: ../../../index.php?page=combat&action=regen');

?>