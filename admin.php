<?php
require_once "functions/car.php";
$title = "Administration";

require_once "views/layout/header.php";

if(!empty($_POST['submit']) && ($_POST['choose'] == 1 || $_POST['choose'] == 0)){
    $cars = getCars($_POST['choose']);
}else{
    $cars = getAll();
}
?>
<div class="container">
    <h1 class="text-center">Listes des véhicules</h1>
    <form method="post">
        <div class="form-group">
            <label for="choose">Affichage des voitures</label>
            <select name="choose" class="form-control" id="choose">
                <option value="2">Afficher toutes les voitures</option>
                <option value="1">Afficher les voitures visibles</option>
                <option value="0">Afficher les voitures non visibles</option>
            </select>
        </div>
        <div class="form-group">
            <input type="submit" name="submit" value="Valider">
        </div>
    </form>
    <hr>
    <?php
    if($cars != 0){
        if(!empty($_POST)){ ?>
            <table class="table">
                <thead class=" table-dark">
                <tr>
                    <th scope="col">Nom</th>
                    <th scope="col">Année de sortie</th>
                    <th scope="col">Nombre de kilomètres</th>
                    <th scope="col">Prix</th>
                    <th scope="col">Visible</th>
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
                        <?php
                        if($car['visible']){
                            ?>
                            <td>Oui</td>
                        <?php }else{ ?>
                            <td>Non</td>
                        <?php }
                        ?>
                        <td><a type="button" href="modifcar.php?id=<?= $car['id']; ?>" class="btn btn-primary">Editer</a></td>
                        <td><a type="button" href="delete.php?id=<?= $car['id']; ?>" class="btn btn-danger">Supprimer</a></td>
                    </tr>
                    <?php
                }
                ?>
            </table>
            <?php
        }

    }else{
        ?>
        <div class="alert alert-danger" role="alert">
            <p>Il n'y a pas de véhicules.</p>
        </div>
    <?php
    }
    ?>
</div>

<?php
    require_once "views/layout/footer.php";
?>
