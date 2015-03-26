<?php
if ( !isset ($_GET['page'])) $_GET['page'] = "";

$page=$_GET['page'];


include ('config/dbConnect.inc.php');
include ('config/function.php');
spl_autoload_register('chargerClasse');
// On enregistre la fonction en autoload pour qu'elle soit appelée dès qu'on instanciera une classe non déclarée.


$manager = new PageManager();

$pageActive = $manager->read($page);

include "view/front/layout/top.inc.php";
include "view/front/page.inc.php";
include "view/front/layout/bottom.inc.php";