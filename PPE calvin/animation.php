<?php

include("fonctions.php");
bddConnect();
?>
<?php if(isset($_SESSION['USER'])=='EN'){
echo "<a href=\"index.php?index=create\" class=\"btn btn-primary btn-lg\" tabindex=\"-1\" role=\"button\" aria-disabled=\"true\">Primary link</a>";
}
?>

<?php
mysqli_set_charset(bddConnect(), "utf8");
$req = "SELECT* FROM ANIMATION";
$res = mysqli_query(bddConnect(), $req);

$i = 0;
while($ligne = mysqli_fetch_assoc($res))
{
  $i = $i + 1;
  $NOMANIM =$ligne['NOMANIM'];
  $DATECREATIONANIM = $ligne['DATECREATIONANIM'];
  $DATEVALIDITEANIM = $ligne['DATEVALIDITEANIM'];
  $DUREEANIM = $ligne['DUREEANIM'];
  $LIMITEAGE = $ligne['LIMITEAGE'];
  $TARIFANIM= $ligne['TARIFANIM'];
  $NBREPLACEANIMs = $ligne['NBREPLACEANIM'];
  $DESCRIPTANIM = $ligne['DESCRIPTANIM'];
  $COMMENTANIM = $ligne[	'COMMENTANIM'];
  $DIFFICULTEANIM =  $ligne['DIFFICULTEANIM'];


    echo "<div class=\"card\" style=\"width: 18rem;\">
    <img src=$COMMENTANIM class=\"card-img-top\" alt=\"...\">
    <div class=\"card-body\">
    <h5 class=\"card-title\">".$NOMANIM."</h5>
    <p class=\"card-text\">".$DESCRIPTANIM."</p>
    <form  action=\"index.php?index=activite\" method=\"post\">
    <a id=\"$i\" href=\"index.php?index=activite\" class=\"btn btn-primary\">Voir les activités</a>
    <a href=\"\" class=\"btn btn-primary\">Modifier activité</a>
    </form>
    </div>
    </div>";
    mysqli_close(bddConnect());

  }
?>
