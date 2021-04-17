<?php

include("fonctions.php");
mysqli_set_charset(bddConnect(), "utf8");
$NOACT = $_GET['NOACT'];

$requete = "SELECT NOMCOMPTE, PRENOMCOMPTE, NOINSCRIP  FROM INSCRIPTION I, COMPTE C WHERE C.USER = I.USER AND NOACT = $NOACT";
$resultat = mysqli_query(bddConnect(), $requete);


echo"<table  class=\"table table-dark table-striped\">";

echo"<thead>
<tr>
<th>NOACT</th>
<th>NOINSCRIPTION</th>
<th>NOM PRENOM </th>
</tr>";
while($ligne = mysqli_fetch_assoc($resultat))
{
  $NOM = $ligne['NOMCOMPTE'];
  $PRENOM = $ligne['PRENOMCOMPTE'];
  $NOINSCRIP = $ligne['NOINSCRIP'];
  echo"<tr>
  <td>$NOACT</td>
  <td>$NOINSCRIP</td>
  <td>$NOM $PRENOM</td>

  </table>";
}

?>
