<?php
include("fonctions.php");
mysqli_set_charset(bddConnect(), "utf8");
$bdd = bddConnect();

$noAct = $_POST['NOACT'];
$cdAnim = $_POST['CODETYPEANIM'];
$cdEtatAct = $_POST['CODEETATACT'];
$dateActivite = $_POST['DATEACT'];
$heureRDV = $_POST['HRRDVACT'];
$prixAct = $_POST['PRIXACT'];
$heureDBT = $_POST['HRDEBUTACT'];
$heureFIN = $_POST['HRFINACT'];
$dtAnnulActivite = $_POST['DATEANNULEACT'];
$nom = $_POST['NOMRESP'];
$prenom = $_POST['PRENOMRESP'];


mysqli_set_charset($bdd, "utf8");


//On vérifie si il n'y a pas une activité déjà enregistrer le même jour
$req = "SELECT COUNT(*) as nbACT FROM ACTIVITE WHERE CODEANIM='$cdAnim' AND DATEACT = '$dateActivite'";
$res = mysqli_query($bdd, $req);
$donnees = mysqli_fetch_assoc($res);

if($donnees['nbACT'] == 1)
{
  echo "l'activité est déjà inscrite le même jour";
    mysqli_close($bdd);
}


$req2 = "INSERT INTO ACTIVITE VALUES('$noAct','$cdAnim','$cdEtatAct','$dateActivite','$heureRDV','$prixAct','$heureDBT','$heureFIN', '$dtAnnulActivite', '$nom', '$prenom')";

if ($res = mysqli_query($bdd, $req2)) {
      echo "activité bien prise en compte";
    mysqli_close($bdd);
} else {

    header('rien pas de problème');
    mysqli_close($bdd);
}
