<?php
#AFFICHE TOUTES LES ANIMATIONS PAR CODE ANIMATION
include("fonctions.php");
$con = bddConnect();
mysqli_set_charset($con, "utf8");
$ID = $_GET['activite'];
$TYPEPROFIL = $_SESSION['TYPEPROFIL'];
$USER = $_SESSION['USER'];
$DATEDEBSEJOUR = $_SESSION['DATEDEBSEJOUR'];
$DATEFINSEJOUR = $_SESSION['DATEFINSEJOUR'];

if($TYPEPROFIL == 'EN')
{
   echo "<a href=\"index.php?index=creeact\" class=\"btn btn-primary btn-lg\" tabindex=\"-1\" role=\"button\" aria-disabled=\"true\">nouvelle activité</a>";

}

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
	<th>PRIX(€)</th>
	<th>HEURE DEBUT</th>
	<th>HEURE FIN ACT</th>
	<th>DATE ANNULATION</th>
	<th>REPONSABLE</th>
	<th> INSCRIPTION </th>
	";
	if($TYPEPROFIL == 'EN')
	{
		echo	"<th>LISTE DES PARTICIPANTS</th>
		<th></th>";

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
     <form class=\"\" action=\"trt_inscrip_act.php?CODEANIM=$CODEANIM&USER=$USER&NOACT=$NOACT&DATEANNULEACT=$DATEANNULEACT&DATEDEBSEJOUR=$DATEDEBSEJOUR&DATEFINSEJOUR=$DATEFINSEJOUR\" method=\"post\">
		<td> <button type=\"submit\" class=\"btn btn-success\">INSCRIPTION</button> </td>
		</form>";
    if($TYPEPROFIL == 'VA')
    {
      echo "<td> <form class=\"\" action=\"trt_desin.php?USER=$USER\" method=\"post\">
      <button type=\"submit\" class=\"btn btn-danger\">S'ANNULER</button>
      </form></td>";

    }

		if($TYPEPROFIL == 'EN')#SI LE PROFIL EST ENCADRANT ALORS ON AFFICHE UN BOUTON CONSULTE ANNIME
		{
			echo	"<td><a href=\"index.php?index=participant&NOACT=$NOACT\" class=\"btn btn-info btn-lg\" role=\"button\" aria-disabled=\"true\">Participants</a></td>";

			echo "<td> <form class=\"\" action=\"\" method=\"\">
			<button type=\"submit\" class=\"btn btn-danger\">ANNULER</button>
			</form></td>";
		}
		echo "</tr>";
	}
	echo "</table>";

}
?>
