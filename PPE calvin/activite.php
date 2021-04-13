<?php
#AFFICHE TOUTES LES ANIMATIONS PAR CODE ANIMATION
include("fonctions.php");
$con = bddConnect();
mysqli_set_charset($con, "utf8");
$ID = $_GET['activite'];
if(!empty($_GET['activite']))
{
	$req = "SELECT * FROM ACTIVITE WHERE CODEANIM = $ID";
	$res = mysqli_query($con, $req);
	#CONSTRUCTION D'UN TABLEAU QUI PERMET D'AFFICHER LES ANIMATIONS
  echo "<table class=\"table table-dark table-striped\">";
	echo"<tr>
			 <th>NOACT</th>
			 <th>ANIMATION D'ORIGINE</th>
			 <th>STATUT</th>
			 <th>DATE DE PUBLICATION</th>
			 <th>HEURE RDV</th>
			 <th>PRIX</th>
			 <th>HEURE DEBUT</th>
			 <th>HEURE FIN ACT</th>
			 <th>DATE ANNULATION</th>
			 <th>REPONSABLE</th>
			 <th> INSCRIPTION <th>
			 ";
	     if($_SESSION['USER'] == 'EN')
	     {
	       echo	"<th>LISTE DES PARTICIPANTS</th>";
	     }
	echo "</tr>";
  while($ligne = mysqli_fetch_assoc($res))
  {
		  $NOACT = $ligne['NOACT'];
			$CODEANIM = $ligne['CODEANIM'];
			$CODEETATACT = $ligne['CODEETATACT'];
		  $DATEACT = $ligne['DATEACT'];
			$HRRDVACT = $ligne['HRRDVACT'];
			$PRIXACT = $ligne['PRIXACT'];
			$HRDEBUTACT = $ligne['HRDEBUTACT'];
			$HRFINACT = $ligne['HRFINACT'];
			$DATEANNULEACT = $ligne['DATEANNULEACT'];
			$NOMRESP = $ligne['NOMRESP'];
			$PRENOMRESP = $ligne['PRENOMRESP'];
       echo "
				<tr>
				   <td>$NOACT</td>
					 <td>$CODEANIM</td>
					 <td>$CODEETATACT</td>
					 <td>$DATEACT	</td>
					 <td>$HRRDVACT</td>
					 <td>$PRIXACT</td>
					 <td>$HRDEBUTACT</td>
					 <td>$HRFINACT</td>
					 <td>$DATEANNULEACT</td>
					 <td>$NOMRESP $PRENOMRESP</td>
           <td> <button type=\"button\" class=\"btn btn-success\">INSCRIPTION</button> </td>";
		 	if($_SESSION['USER'] == 'EN')#SI LE PROFIL EST ENCADRANT ALORS ON AFFICHE UN BOUTON CONSULTE ANNIME
			 {
			   echo	"<td><button type=\"button\" class=\"btn btn-info\">CONSULTER LES PARTICIPANTS</button></td>";
			 }
		echo "</tr>";
  }
  echo "</table>";
}
?>
