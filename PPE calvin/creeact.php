<?php

include("fonctions.php");
bddConnect();
?>


<form class="" action="trt_enreg_act.php" method="post">
  <label>NUMERO ACTIVITÉ</label>
  <select class="custom-select" name="NOACT">
    <option selected>choisir</option>
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    <option value="5">5</option>
    <option value="6">6</option>
    <option value="7">7</option>
    <option value="8">8</option>
    <option value="9">9</option>
    <option value="10">10</option>

</select>

  <label>Code type animation</label>
  <select class="custom-select" name="CODETYPEANIM">
    <option>Choisissez un type d'animation</option>
    <?php
    $req = "SELECT CODEANIM  FROM ANIMATION;";
    $res = mysqli_query(bddConnect(), $req);
    while ($lignes = mysqli_fetch_assoc($res)) {
      echo "<option value=".$lignes['CODEANIM'].">".$lignes['CODEANIM']."</option>";
    }
    ?>

  </select>



  <label>Code type animation</label>
  <select class="custom-select" name="CODEETATANIM">
    <option>Choisissez un etat</option>
    <?php
    $req = "SELECT CODEETATACT FROM ETAT_ACT;";
    $res = mysqli_query(bddConnect(), $req);
    while ($lignes = mysqli_fetch_assoc($res)) {
      echo "<option value=".$lignes['CODETETATACT'].">".$lignes['CODETETATACT']."</option>";
    }
    ?>

  </select>




  <label>DATE ACTIVITÉ</label>
  <input name="DATEACT" class="form-control" type="date" value="" id="example-datetime-local-input">

  <label> HEURE RENDEZ-VOUS ACTIVITÉ </label>
  <input type="time" id="appt" name="HRRDVACT" min="09:00" max="18:00" required>

  <label> PRIX </label>
  <input class="form-control"  name="PRIXACT" type="text" placeholder="Default input">

  <label> HEURE DEBUT ACTIVITÉ </label>
  <input type="time" id="appt" name="HRDEBUTACT"
  min="09:00" max="18:00" required>

  <label> HEURE FIN ACTIVITÉ </label>
  <input type="time" id="appt" name="HRFINACT"
  min="09:00" max="18:00" required>

  <label>DATE ANNULE ACTIVITÉ</label>
  <input name="DATEANNULEACT" class="form-control" type="date" value="" id="example-datetime-local-input">

  <label> NOMRESP </label>
  <input class="form-control"  name="NOMRESP" type="text" placeholder="Default input">

  <label> PRENOMRESP</label>
  <input class="form-control"  name="PRENOMRESP" type="text" placeholder="Default input">

    <input type="submit" value="Valider">

</form>
