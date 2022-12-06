<?php
session_start();


ob_start();
if(isset($_GET['action'])){
    require ('asset/php/view/'.$_GET['action'].'.php');
}else{
    require ('asset/php/view/acceuil.php');
}
$content = ob_get_clean();

require ('asset/php/view/default.php');