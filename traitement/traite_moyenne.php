<?php
    session_start();
    include("connexion.php");

    $notes=$_POST["note"];
    $matiere=$_POST["matiere"];


    $requete = "INSERT INTO notes (notes,matiere) VALUES (:notes, :matiere)";
    $stmt = $db->prepare($requete);
    $stmt->bindValue(":notes", $notes, PDO::PARAM_STR);
    $stmt->bindValue(":matiere", $matiere, PDO::PARAM_STR);
    

    $stmt->execute();
    
    if ($stmt->rowCount()) {
        header('Location:vie_scolaire.php');
    } else {
        echo "ça n'a pas marché veuillez recommencer.";
        die($stmt);
    }
    ?>