<?php

$_SESSION['degat'] = [
    'hero' => $_SESSION['monster']['atk'] - $_SESSION['hero']['def'],
    'monster' => $_SESSION['hero']['atk'] - $_SESSION['monster']['def'],
];


?>