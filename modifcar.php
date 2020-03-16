<?php
require_once "functions/car.php";
$title = "Modification d'une voiture";

require_once "views/layout/header.php";

if(!empty($_POST['submit']) && !empty($_POST['name']) && !empty($_POST['years']) && !empty($_POST['nb_km'])){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $years = $_POST['years'];
    $nb_km = $_POST['nb_km'];
    if(!empty($_POST['visible'])){
        $visible = 1;
    }else{
        $visible = 0;
    }
    echo $visible;
    if(updateCar($id, $name, $years, $nb_km, $visible)){
        $message = "La voiture à bien été modifiée.";
        $type = " alert-success";
    }else{
        $message = "La voiture n'a pas été modifiée. Rentrez de nouveau les informations";
        $type = " alert-danger";
    }

}else{
    $message = "La voiture n'a pas été modifiée. Rentrez de nouveau les informations";
    $type = " alert-danger";
}

$car = getById($_GET['id']);
?>
<div class="container">
    <form method="post">
        <input type="hidden" name="id" value="<?= $car['id']; ?>">
        <div class="form-group">
            <label for="exampleFormControlInput1">Nom de la voiture</label>
            <input type="text" class="form-control" name="name" id="exampleFormControlInput1" placeholder="Audi A1" value="<?= $car['nom']; ?>">
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Année de service</label>
            <input type="number" class="form-control" name="years" id="years" placeholder="2001" value="<?= $car['annee_sortie']; ?>">
        </div>

        <div class="form-group">
            <label for="exampleFormControlTextarea1">Nombre de kilomètres</label>
            <input type="number" class="form-control" name="nb_km" id="nb_km" placeholder="180000" value="<?= $car['nb_km']; ?>">
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <label for="checkbox">Visible ? (coché: oui)</label>
                <div class="input-group-text">
                    <?php if($car['visible']){ ?>
                        <input id="checkbox" name="visible" type="checkbox" checked aria-label="Checkbox for following text input">
                    <?php }else{ ?>
                        <input id="checkbox" name="visible" type="checkbox"  aria-label="Checkbox for following text input">
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
        <input type="submit" name="submit" value="Modifier">
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
