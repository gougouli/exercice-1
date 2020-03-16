<?php
require_once "functions/car.php";
$title = "Suppression";

require_once "views/layout/header.php";

if(deleteCar($_GET['id'])){
    $message = "La voiture à bien été supprimée !";
    $type = "alert-success";
}else{
    $message = "La voiture n'a pas été supprimée !";
    $type = "alert-danger";
}
?>
<div class="container">
    <div class="alert <?= $type; ?>" role="alert">
        <p><?= $message; ?></p>
    </div>
    <a type="button" href="admin.php" class="text-center btn btn-primary">Revenir à la page d'Administration</a>
</div>

<?php
require_once "views/layout/footer.php";
?>
