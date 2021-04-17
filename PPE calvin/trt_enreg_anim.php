#Créer une animation
<?php
include("fonctions.php");
mysqli_set_charset(bddConnect(), "utf8");
$CDANIM = $_POST['CODEANIM'];
#On Verifie la pésence de l'anime
$requete = "SELECT COUNT(*) as NbAnim  FROM ANIMATION WHERE CODEANIM = '$CDANIM'";
$resultat = mysqli_query(bddConnect(),$requete);
while($ligne = mysqli_fetch_assoc($resultat))
{
  $NbAnim = $ligne['NbAnim'];
}

if($NbAnim == 1)
{
  echo "Il y'a une animation qui a déjà ce code et de même nom";
  header('Refresh: 3; url=index.php?index=animation');
}
else
{

  $CDTYPEANIM = $_POST['CODETYPEANIM'];
  $NOMANIM = $_POST['NOMANIM'];
  $DATEVALIDITEANIM = $_POST['DATEVALIDITEANIM'];
  $DUREEANIM = $_POST['DUREEANIM'];
  $LIMITEAGE = $_POST['LIMITEAGE'];
  $TARIFANIM = $_POST['TARIFANIM'];
  $NBREPLACEANIM = $_POST['NBREPLACEANIM'];
  $DESCRIPTANIM = $_POST['DESCRIPTANIM'];
  $COMMENTANIM = $_POST['COMMENTANIM'];
  $DIFFICULTANIM = $_POST['DIFFICULTEANIM'];
  $req2 = "INSERT INTO animation (CODEANIM, CODETYPEANIM, NOMANIM, DATECREATIONANIM, DATEVALIDITEANIM, DUREEANIM, LIMITEAGE, TARIFANIM, NBREPLACEANIM, DESCRIPTANIM, COMMENTANIM, DIFFICULTEANIM)
  VALUES ('$CDANIM', '$CDTYPEANIM' , '$NOMANIM' , NOW(), '$DATEVALIDITEANIM', '$DUREEANIM', '$LIMITEAGE', '$TARIFANIM', '$NBREPLACEANIM', '$DESCRIPTANIM', '$COMMENTANIM', '$DIFFICULTANIM');" ;
  $res2 = mysqli_query(bddConnect(), $req);

  echo "Votre animation a bien été enregistré";
  header('Refresh: 3; url=index.php?index=animation');
}
?>
