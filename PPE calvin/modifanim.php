<?php

include("fonctions.php");
bddConnect();
$CODEANIM = $_GET['CODEANIM'];
?>
<?php echo "<form class=\"insertanim\" action=\"trt_modif_anim.php?CODEANIM=$CODEANIM\" method=\"post\">"; ?>
  <label>Code anime</label>
  <select class="custom-select" name="CODEANIM" id="inputGroupSelect01">
    <option selected>Choose...</option>
    <?php
    $req = "SELECT CODEANIM FROM ANIMATION WHERE CODEANIM = $CODEANIM";
    $res = mysqli_query(bddConnect(), $req);
    while ($lignes = mysqli_fetch_assoc($res)) {
      echo "<option value=".$lignes['CODEANIM'].">".$lignes['CODEANIM']."</option>";
    }
    ?>
  </select>

  <label>Code type animation</label>
  <select class="newAnimation" name="CODETYPEANIM">
    <option value="">Choisissez un type d'animation</option>
    <?php
    $req = "SELECT NOMTYPEANIM, CODETYPEANIM FROM TYPE_ANIM;";
    $res = mysqli_query(bddConnect(), $req);
    while ($lignes = mysqli_fetch_assoc($res)) {
      echo "<option value=".$lignes['CODETYPEANIM'].">".$lignes['CODETYPEANIM']."</option>";
    }
    ?>
  </select>
  <label>Nom animation</label>
  <input class="form-control"  name="NOMANIM" type="text" placeholder="Default input">

  <label>Date validite</label>
  <input name="DATEVALIDITEANIM" class="form-control" type="datetime-local" value="2011-08-19T13:45:00" id="example-datetime-local-input">


  <label>Durée</label>
  <input class="form-control"  name="DUREEANIM" type="text" placeholder="Default input">

  <label>Limite age</label>
  <select class="custom-select" name="LIMITEAGE" id="inputGroupSelect01">
    <option selected>Choose...</option>
    <option value="1">5</option>
    <option value="2">6</option>
    <option value="3">7</option>
    <option value="4">8</option>
    <option value="5">9</option>
    <option value="6">10</option>

  </select>


  <label>Tarif animation</label>
  <input class="form-control" type="text" name="TARIFANIM" placeholder="Default input">

  <label>Nombre place anim:</label>
  <input class="form-control" type="text" name="NBREPLACEANIM" placeholder="Default input">

  <label>Description animation:</label>
  <input class="form-control" type="text" name="DESCRIPTANIM" placeholder="Default input">

  <label>Commentaire:</label>
  <input class="form-control" type="text" name="COMMENTANIM" placeholder="Default input">

  <label>Difficulte animation:</label>
  <input class="form-control" type="text" name="DIFFICULTEANIM" placeholder="Default input">

  <input type="submit" value="Valider">
  <!-- <button type="submit" name="button" form="insertanim" class="btn btn-primary">Ajouter ezaaeaer</button> -->

</form>
