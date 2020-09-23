<?php
$conn =  new mysqli("localhost", "root", "root", "gacti");
$email=$_POST['email'];
$mdp= $_POST['mdp'];

$requete = "SELECT * FROM compte WHERE ADRMAILCOMPTE= '".$email."' AND MDP='" .$mdp."'";
$resultat = mysqli_query($conn,  $requete);

if($ligne = mysqli_fetch_array($resultat))
{
 session_start();
 $_SESSION['NOMCOMPTE'] = $ligne['NOMCOMPTE'];
 $_SESSION['PRENOMCOMPTE'] = $ligne['PRENOMCOMPTE'];
 $_SESSION['TYPEPROFIL'];
 header('Location: accueil.php');

}
else
{
echo "error";
}
 ?>
