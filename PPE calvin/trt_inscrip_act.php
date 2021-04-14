<?php
#Inscription a une activité

include("fonctions.php");
mysqli_set_charset(bddConnect(), "utf8");
$CODEANIM=$_GET['CODEANIM'];
$USER = $_GET['USER'];
$NOACT = $_GET['NOACT'];
$DATEANNULE = $_GET['DATEANNULEACT'];


#On vérifie que l'utilisateur n'est pas déjà inscrit à l'activité.
$verifReq = "SELECT COUNT* FROM INSCRIPTION WHERE USER = '$USER'  AND NOACT='$NOACT'";
$VerifRes = mysqli_query(bddConnect(), $verifReq);

if($VerifRes = 1)
{
  $NoInscri = "SELECT NOINSCRIP FROM INSCRIPTION WHERE USER = '$USER'  AND NOACT='$NOACT'";
  $NoInscriRes = mysqli_query(bddConnect(), $NoInscri);
  while($ligne = mysqli_fetch_assoc($NoInscriRes))
  {
    $NumInscri = $ligne['NOINSCRIP'];
  }
  echo 'vous êtes déjà inscrit à cette activité sous le numéro'.' '.$NumInscri;
  header("Refresh: 10; url= index.php?index=activite&activite=".$CODEANIM);


}
else
{
  #On peut insérer l'utilisateur
  $Inscription = "INSERT INTO inscription VALUES(NULL,'$USER', '$NOACT', NOW(), '$DATEANNULE')";
  $InscriptionResultat = mysqli_query(bddConnect(), $Inscription);
  $NoInscri = "SELECT NOINSCRIP FROM INSCRIPTION WHERE USER = '$USER'  AND NOACT='$NOACT'";
  $NoInscriRes = mysqli_query(bddConnect(), $NoInscri);
  while($ligne = mysqli_fetch_assoc($NoInscriRes))
  {
    $NumInscri = $ligne['NOINSCRIP'];
  }
  #On Va récupérer
  echo "Vous êtes inscrit à cette activité sous le numéro".$NumInscri;
  header("Refresh: 10; url= index.php?index=activite&activite=".$CODEANIM);



}

?>
