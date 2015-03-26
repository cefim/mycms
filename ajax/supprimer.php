<?php
//config
include "../config/dbConnect.inc.php";
include "../config/function.php";

spl_autoload_register('chargerClasseAjax');

$manager = new PageManager();

$manager->delete( $_POST['id'] );

echo "Page supprimée avec succès.";