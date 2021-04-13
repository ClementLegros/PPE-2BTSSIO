#S'inscrire a une activité
<?php
include("fonctions.php");
mysqli_set_charset(bddConnect(), "utf8");
$rez=$_GET['CODEEANIM'];
$req = "INSERT INTO inscription(NOINSCRIP,USER,NOACT,DATEINSCRIP,DATEANNULE)
        VALUES(,$_SESSION['USER'], $_GET['NOACT'], $_GET['DATEINSCRIP'], $_GET['DATEANNULE'])";
$res = mysqli_query(bddConnect(), $req);
header('Location: index.php?index=activite&activite='.$rez);
 ?>
