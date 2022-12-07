<?php

    echo '<p>'.$_SESSION['hero']['name'].' a décidé de se booster</p>';
    echo '<p>Il a pus doublé son attaque pendant 1 tour</p>';
    echo '<p>Mais '.$_SESSION['monster']['name'].' réplique est inflige '.$_SESSION['degat']['hero'].' point de dégats à '.$_SESSION['hero']['name'].'</p>';

?>