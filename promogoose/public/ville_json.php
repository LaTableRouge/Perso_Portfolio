<?php
require "db.php";


//Remplir un fichier JSON avec une requête SQL
$Noms_Villes = $bdd->prepare('SELECT ville_nom_reel, ville_code_postal, ville_code_commune, ville_longitude_deg, ville_latitude_deg from villes_france where ville_nom_reel LIKE :ville LIMIT 5');
$Noms_Villes->bindvalue(':ville',$_GET['q'], PDO::PARAM_STR);
$posts = array();
$result=$Noms_Villes->execute();
while($row=$Noms_Villes->fetch(PDO::FETCH_ASSOC)) {

    $posts[] = array('ville'=> $row['ville_nom_reel'],
                     'cp'=> $row['ville_code_postal'],
                     'INSEE' =>  $row['ville_code_commune'],
                     'longitude' => $row['ville_longitude_deg'],
                     'latitude' => $row['ville_latitude_deg'],
                    );
}

$json_data = json_encode($posts);
echo $json_data;

//Remplir un fichier JSON avec une requête SQL (FIN)


?>