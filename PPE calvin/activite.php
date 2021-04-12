<?php
include("fonctions.php");
$con = bddConnect();
mysqli_set_charset($con, "utf8");
$ID = $_GET['activite'];
if(!empty($_GET['activite']))
{
	$req = "SELECT * FROM ACTIVITE WHERE CODEANIM = $ID";
	$res = mysqli_query($con, $req);
  echo "<table class=\"table table-dark table-striped\">";
  while($ligne = mysqli_fetch_assoc($res))
  {

  }
  echo "</table>";
}
?>
