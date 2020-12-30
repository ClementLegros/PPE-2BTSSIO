<?php
function bddConnect(){
  $con = mysqli_connect("localhost", "root", "root", "gacti");
  return $con;
}


?>
