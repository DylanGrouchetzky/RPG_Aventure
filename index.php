<?php
session_start();

require ('asset/php/class/autoloader.php');
Autoloader::register();
$database = new Database();

ob_start();
if(isset($_GET['page'])){
    require ('asset/php/view/'.$_GET['page'].'.php');
}else{
    require ('asset/php/view/acceuil.php');
}
$content = ob_get_clean();

require ('asset/php/view/default.php');