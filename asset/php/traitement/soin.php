<?php
session_start();



$_SESSION['hero']['pv'] = $_SESSION['hero']['pv'] + $_SESSION['hero']['regen'];
if($_SESSION['hero']['pv'] > $_SESSION['hero']['pvMax']){
    $_SESSION['hero']['pv'] = $_SESSION['hero']['pvMax'];
}
$_SESSION['hero']['pv'] = $_SESSION['hero']['pv'] - $_SESSION['degat']['hero'];

header('Location: ../../../index.php?page=combat&action=regen');

?>