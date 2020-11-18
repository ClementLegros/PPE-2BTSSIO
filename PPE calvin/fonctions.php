<?php
function bddConnect(){
  $con = mysqli_connect("localhost", "root", "", "ndfgestion");
  mysqli_set_charset($con, "utf8");
  return $con;
}

function verifConnect($user, $mdp){
  $con = bddConnect();
  $req = "SELECT *
      FROM user, type_compte, service
      WHERE  user.numTC = type_compte.numTC
      AND user.numService = service.numService
      AND loginUser = '$user'
      AND mdpUser = '$mdp'";
  //récupère le nombre d'enregistrements de la table résultat
  $res = mysqli_query($con, $req);
  //si il y a 1 enregistrement dans la table résultat
  //(ie : l'utilisateur qui a les login / mot de passe passés en paramètre a été trouvé)
  if (mysqli_num_rows($res)==1) {
    return mysqli_fetch_array($res);
  }
  else{
    return 0 ;
  }
  mysqli_close($con);
}

 ?>
