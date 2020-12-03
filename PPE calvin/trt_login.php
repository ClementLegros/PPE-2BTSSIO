<?php
session_start();
include("fonctions.php");
mysqli_set_charset($con, "utf8");
$user = $_POST['user'];
$mdp = $_POST['mdp'];

$req = "SELECT* FROM COMPTE WHERE USER = '$user' AND MDP = '$mdp'";
$res = mysqli_query(bddConnect(), $req);

if($ligne = mysqli_fetch_assoc($res))
{

		$_SESSION['USER'] = $ligne['USER'];
		$_SESSION['MDP'] = $ligne['MDP'];
		$_SESSION['NOMCOMPTE'] =$ligne['NOMCOMPTE'];
		$_SESSION['PRENOMCOMPTE'] = $ligne['PRENOMCOMPTE'];
		$_SESSION['DATEINSCRIP'] = $ligne['DATEINSCRIP'];
		$_SESSION['ADRESSEMAIL'] = $ligne['ADRESSEMAIL'];
		$_SESSION['NOTELCOMPTE'] = $ligne['NOTELCOMPTE'];
		$_SESSION['TYPEPROFIL'] = $ligne['TYPEPROFIL'];
		header("Location: accueil.php");
		mysqli_close();

}
else
	echo "Erreur";
header('Refresh:3 ; index.php');
?>
