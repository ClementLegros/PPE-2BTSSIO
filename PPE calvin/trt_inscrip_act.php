<?php
#Inscription a une activité

include("fonctions.php");
mysqli_set_charset(bddConnect(), "utf8");
$CODEANIM=$_GET['CODEANIM'];
$USER = $_GET['USER'];
$NOACT = $_GET['NOACT'];
$DATEANNULE = $_GET['DATEANNULEACT'];
$DATEACTU  = date("Y-m-d");
$DATEFINSEJOUR = $_GET['DATEFINSEJOUR'];


#On vérifie que l'utilisateur n'est pas déjà inscrit à l'activité.
$verifReq = "SELECT COUNT(*) AS Verif FROM inscription WHERE USER = '$USER' AND NOACT = $NOACT";
$VerifRes = mysqli_query(bddConnect(), $verifReq);
while($ligne = mysqli_fetch_assoc($VerifRes))
{
  $Verif = $ligne['Verif'];
}

#On va récupérer les nombres de place
$NbrePlaceReq = "SELECT NBREPLACEANIM FROM ANIMATION AN, ACTIVITE AC WHERE AC.CODEANIM = AN.CODEANIM AND AC.NOACT = $NOACT";
$NbrPlaceRes= mysqli_query(bddConnect(),$NbrePlaceReq);
while($ligne = mysqli_fetch_assoc($NbrPlaceRes))
{
  $NbPlaceAnim = $ligne['NBREPLACEANIM'];
}


#On va récupérer le numéro d'inscri
// $NoInscripReq = "SELECT NOINSCRIP FROM INSCRIPTION WHERE USER = '$USER' AND NOACT = $NOACT'";
// $NoInscriRes = mysqli_query(bddConnect(),$NoInscripReq);
// while($ligne = mysqli_fetch_assoc($NoInscriRes))
// {
//   $NoInscrip = $ligne['NOINSCRIP'];
// }


#On va compter tous les membres INSCRITS
$NbInscriReq = "SELECT COUNT(*) AS NbInscri FROM inscription WHERE NOACT = $NOACT";
$NbInscri = mysqli_query(bddConnect(), $NbInscriReq);
while($ligne = mysqli_fetch_assoc($NbInscri))
{
  $NbInscriAct = $ligne['NbInscri'];
}

#ON COMPARE LE NOMBRE DE PERSONNE DANS L'ANIMATION AVEC CE QUE L'ON
if($NbPlaceAnim  < ($NbInscriAct+1))
{
  echo "il n'y a pas de place pour cette activité";
  header("Refresh: 10; url= index.php?index=activite&activite=".$CODEANIM);
}
else
{
  if($Verif == 1)#Si il est présent alors il ne pourra pas se connecter
  {


    echo "vous êtes déjà inscrit à cette activité sous le numéro";
    header("Refresh: 10; url= index.php?index=activite&activite=".$CODEANIM);


  }
  else
  {
    #A faire
    if($DATEANNULE > $DATEFINSEJOUR  )
    {
      echo "vous ne pouvez pas vous inscrie car votre période de séjour ne comprends pas cette activité";
      header("Refresh: 10; url= index.php?index=activite&activite=".$CODEANIM);
    }
    else
    {


      //ON INSERE LA PERSONNE QUAND TOUT A ETE VERIFICE
      $Inscription = "INSERT INTO inscription VALUES(NULL,'$USER', '$NOACT', NOW(), '$DATEANNULE')";
      $InscriptionResultat = mysqli_query(bddConnect(), $Inscription);

      //RECUPERER LE NUMERO D'INSCRIPTION A L'ACTIVITE
      #On Va récupérer
      echo "Vous êtes inscrit à cette activité sous le numéro";
      header("Refresh: 10; url= index.php?index=activite&activite=".$CODEANIM);
    }
  }
}
  ?>
