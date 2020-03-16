<?php
require_once "functions/car.php";
$title = "Ajout d'une voiture";

require_once "views/layout/header.php";

if(!empty($_POST['submit']) && !empty($_POST['name']) && !empty($_POST['years']) && !empty($_POST['nb_km'])){
    $name = $_POST['name'];
    $years = $_POST['years'];
    $nb_km = $_POST['nb_km'];
    if(addcar($name, $years, $nb_km)){
        $message = "La voiture à bien été ajoutée.";
        $type = " alert-success";
    }else{
        $message = "La voiture n'a pas été ajoutée. Rentrez de nouveau les informations";
        $type = " alert-danger";
    }

}else{
    $message = "La voiture n'a pas été ajoutée. Rentrez de nouveau les informations";
    $type = " alert-danger";
}

?>
<div class="container">
    <form method="post">
        <div class="form-group">
            <label for="exampleFormControlInput1">Nom de la voiture</label>
            <input type="text" class="form-control" name="name" id="exampleFormControlInput1" placeholder="Audi A1">
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Année de service</label>
            <input type="number" class="form-control" name="years" id="years" placeholder="2001">
        </div>

        <div class="form-group">
            <label for="exampleFormControlTextarea1">Nombre de kilomètres</label>
            <input type="number" class="form-control" name="nb_km" id="nb_km" placeholder="180000">
        </div>
        <input type="submit" name="submit" value="Ajouter">
    </form>
    <?php
    if(!empty($_POST['submit'])){ ?>
        <div class="alert <?= $type; ?>" role="alert">
            <?= $message; ?>
        </div>
        <?php
    }
    ?>
</div>
