<?php
#Inscription a une activité

include("fonctions.php");
mysqli_set_charset(bddConnect(), "utf8");
$CODEANIM=$_GET['CODEANIM'];
$USER = $_GET['USER'];
$NOACT = $_GET['NOACT'];
$DATEANNULE = $_GET['DATEANNULEACT'];

#
#On vérifie que l'utilisateur n'est pas déjà inscrit à l'activité.
$verificationReq = "SELECT COUNT* FROM INSCRIPTION WHERE USER = '$USER'  AND NOACT='$NOACT'";
$VerificationResultat = mysqli_query(bddConnect(), $verificationReq);
if($VerificationResultat = 1)
{
  $NumeroDInscription = "SELECT NOINSCRIP FROM INSCRIPTION WHERE USER = '$USER'  AND NOACT='$NOACT'";
  $NumeroDInscriptionRes = mysqli_query(bddConnect(), $NumeroDInscription);

  echo "vous êtes déjà inscrit à cette activité";

  header('Refresh: 5000 ;Location: index.php?index=\activite&activite=\'.$CODEANIM');


}
else
{
  #On peut insérer l'utilisateur
  $Inscription = "INSERT INTO inscription VALUES(NULL,'$USER', '$NOACT', NOW(), '$DATEANNULE')";
  $InscriptionResultat = mysqli_query(bddConnect(), $Inscription);

  #On Va récupérer son numéro d'inscription ensuite
  $NumeroDInscription = "SELECT NOINSCRIP FROM INSCRIPTION WHERE USER = '$USER'  AND NOACT='$NOACT'";
  $NumeroDInscriptionRes = mysqli_query(bddConnect(), $NumeroDInscription);
  echo "Vous êtes inscrit à cette activité sous le numéro".$NumeroDInscriptionRes;
  Sleep(5);
  header('Location: index.php?index=activite&activite='.$CODEANIM);



}

 ?>
