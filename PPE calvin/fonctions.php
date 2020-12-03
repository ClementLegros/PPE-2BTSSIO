<?php
function bddConnect(){
  $con = mysqli_connect("localhost", "root", "root", "gacti");
  return $con;
}

function deconnexion(){
  $deco = session_destroy();
  return  $deco;
}
?>
