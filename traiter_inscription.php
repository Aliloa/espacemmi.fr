<?php

session_start();

include("connexionbd.php");

$requete = "INSERT INTO utilisateurs (login, mot_de_passe) VALUES (:login, :mot_de_passe)";
$stmt = $db->prepare($requete);
$stmt->bindParam(':login', $_POST["login"], PDO::PARAM_STR);
$hash = password_hash($_POST["password"], PASSWORD_DEFAULT);
$stmt->bindParam(':mot_de_passe', $hash, PDO::PARAM_STR);
$stmt->execute();
header('Location:connexion_page.php');

?>
