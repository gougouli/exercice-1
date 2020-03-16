<?php
require_once "functions/car.php";
$title = "Accueil";

require_once "views/layout/header.php";



if(!empty($_GET['search'])){
    $cars = getByNom($_GET['search']);
}else{
    $cars = getCars(1);
}
?>
<div class="container">
    <form action="">
        <label for="search">Rechercher une voiture par nom:</label>
        <input type="search" name="search" id="search">
    </form>
    <?php
    if($cars == 0){
        ?>
        <div class="alert alert-danger" role="alert">
            <p>Il n'y a aucune voiture portant ce nom</p>
        </div>
    <?php
    }else{
        ?>
        <table class="table">
            <thead class=" table-dark">
            <tr>
                <th scope="col">Nom</th>
                <th scope="col">Année de sortie</th>
                <th scope="col">Nombre de kilomètres</th>
                <th scope="col">Prix</th>
            </tr>

            </thead>
            <?php
            foreach ($cars as $car){
                ?>
                <tr>
                    <td><?= $car['nom']; ?></td>
                    <td><?= $car['annee_sortie']; ?></td>
                    <td><?= $car['nb_km']; ?></td>
                    <td><?= $car['prix']; ?></td>
                </tr>
                <?php
            }
            ?>
        </table>

    <?php
    }
    ?>

</div>
<?php
require_once "views/layout/footer.php";
?>
