<?php
    require "db.php";

    //Remplir un fichier JSON avec une requête SQL
    //préparation de la requête qui va récupérer les magasins de la ville séléctionnée
    $magasins = $bdd->prepare('SELECT nomMAg, latMag, longMag from magasin WHERE latMag BETWEEN :latSW AND :latNE AND longMag BETWEEN :longSW AND :longNE'); // Manque WHERE ville_nom_reel = <ville selectionée>;
    $magasins->bindvalue(':latNE',$_GET['latNE']);
    $magasins->bindvalue(':latSW',$_GET['latSW']);
    $magasins->bindvalue(':longNE',$_GET['longNE']);
    $magasins->bindvalue(':longSW',$_GET['longSW']);
    $posts = array();
    $result=$magasins->execute();
    while($row=$magasins->fetch(PDO::FETCH_ASSOC)) {

            $posts[] = array('nom'=> $row['nomMAg'],
                            'lat'=> $row['latMag'],
                            'long' =>  $row['longMag'],
                            );
    }

    $json_data = json_encode($posts);
    echo $json_data;
    //Remplir un fichier JSON avec une requête SQL (FIN)
    ?>