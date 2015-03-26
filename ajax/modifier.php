<?php
//config
include "../config/dbConnect.inc.php";
include "../config/function.php";

spl_autoload_register('chargerClasseAjax');

$manager = new PageManager();

$info = $manager->update( $_POST );

$retour = array(
	'success' => $info
);
echo json_encode($retour);