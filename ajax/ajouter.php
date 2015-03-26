<?php
//config
include "../config/dbConnect.inc.php";
include "../config/function.php";

spl_autoload_register('chargerClasseAjax');

$manager = new PageManager();

$pageAjout = new Page($_POST);

$info = $manager->create( $pageAjout );

$retour = [
	'message' => "Patate",
	'info' => $info
];

echo json_encode($retour);