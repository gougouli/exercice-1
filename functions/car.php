<?php

require_once 'db.php';


function addcar($name, $years, $km){
    $prix = setPrice($years, $km);
    $db = dbConnect();
    $query = "INSERT INTO voiture (nom, annee_sortie, nb_km, prix) VALUES (?, ?, ?, ?)";
    $req = $db->prepare($query);
    $req->execute([$name,$years,$km,$prix]);
    return $req;
}
function setPrice($years, $km){
    $prix = $km/10000 * $years;
    return $prix;
}
function getCars($isActive){
    $db = dbConnect();
    $query = "SELECT * FROM voiture WHERE visible = ?";
    $req = $db->prepare($query);
    $req->execute([$isActive]);
    if($req->rowCount() == 0){
        return 0;
    }
    return $req->fetchAll(PDO::FETCH_ASSOC);
}
function getAll(){
    $db = dbConnect();
    $query = "SELECT * FROM voiture";
    $req = $db->query($query);
    if($req->rowCount() == 0){
        return 0;
    }
    return $req->fetchAll(PDO::FETCH_ASSOC);
}

function deleteCar($id){
    $db = dbConnect();
    $query ="DELETE FROM voiture WHERE id = ?";
    $req = $db->prepare($query);
    $req->execute([$id]);
    return $req->fetchAll(PDO::FETCH_ASSOC);

}
function getById($id){
    $db = dbConnect();
    $query = "SELECT * FROM voiture WHERE id = ?";
    $req = $db->prepare($query);
    $req->execute([$id]);
    return $req->fetch();
}
function getByNom($name){
    $db = dbConnect();
    $query = "SELECT * FROM voiture WHERE nom LIKE :search";
    $req = $db->prepare($query);
    $req->execute([
        'search' => "%$name%"
    ]);
    if($req->rowCount() == 0){
        return 0;
    }
    return $req->fetchAll(PDO::FETCH_ASSOC);
}
function updateCar($id, $name, $years, $km, $visible){
    $db = dbConnect();
    $query ="UPDATE voiture SET nom = ?, annee_sortie = ?, nb_km = ?, visible = ?, prix = ?  WHERE id = ? ";
    $req = $db->prepare($query);
    $prix = setPrice($years, $km);
    $req=$req->execute([$name,$years,$km,$visible, $prix, $id]);
    return $req;
}
