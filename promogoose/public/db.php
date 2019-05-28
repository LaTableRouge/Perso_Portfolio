<?php
$servername = "localhost";
$username = "goosestyle";
$password = "goosestyle";
$myDB = "test";

//$servername = env('DB_HOST', '127.0.0.1');
//$username = env('DB_USERNAME', 'forge');
//$password = env('DB_PASSWORD', '');
//$myDB = env('DB_DATABASE', 'forge');

try{
    $bdd = new PDO(
        'mysql:host='.$servername.';dbname='.$myDB.';charset=utf8',
        $username,
        $password,
        array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_WARNING)
    );

}catch(Exception $e){
    die('Erreur : '.$e->getMessage());
}
?>