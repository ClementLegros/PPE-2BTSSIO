<?php
session_start();
include("fonctions.php");
mysqli_set_charset($con, "utf8");
$id = $_GET['id'];

$req = "SELECT * FROM ACTIVITE WHERE CODEANIM = $id;
$res = mysqli_query(bddConnect(), $req);

$
else
	echo "Erreur";
header('Refresh:1 ; index.php?index=accueil');

?>
