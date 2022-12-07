<?php

    echo '<p>'.$_SESSION['hero']['name'].' a décidé d\'attaquer '.$_SESSION['monster']['name'].'</p>';
    echo '<p>Il lui a infliger '.$_SESSION['degat']['monster'].' de point de dégats</p>';
    echo '<p>Mais '.$_SESSION['monster']['name'].' réplique est inflige '.$_SESSION['degat']['hero'].' point de dégats à '.$_SESSION['hero']['name'].'</p>';


?>