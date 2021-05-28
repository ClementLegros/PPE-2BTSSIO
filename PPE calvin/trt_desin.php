<?php
include("fonctions.php");
mysqli_set_charset(bddConnect(), "utf8");
$bdd = bddConnect();
$USER = $_GET['USER'];

$req = "DELETE FROM INSCRIPTION WHERE USER = '$USER'";
mysqli_query($bdd, $req);
echo "vous n'êtes plus inscrit";
