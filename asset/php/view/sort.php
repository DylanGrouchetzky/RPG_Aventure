<?php

if($_SESSION['hero']['sort'] === 'Boost'){

    echo '<p>'.$_SESSION['hero']['name'].' a décidé de se booster</p>';
    echo '<p>Il a pus doublé son attaque pendant 1 tour</p>';
    echo '<p>Mais '.$_SESSION['monster']['name'].' réplique et inflige '.$_SESSION['degat']['hero'].' point de dégats à '.$_SESSION['hero']['name'].'</p>';

}

if($_SESSION['hero']['sort'] === 'Boule de Feu'){

    echo '<p>'.$_SESSION['hero']['name'].' a lancer une boule de feu sur '.$_SESSION['monster']['name'].'</p>';
    echo '<p>Il n\'a pas perdu de pm car pas le créateur na pas encore effectué sa</p>';
    echo '<p>'.$_SESSION['monster']['name'].' décide de réplique et inflige '.$_SESSION['degat']['hero'].' point de dégats à '.$_SESSION['hero']['name'].'</p>';
    
}
    
?>