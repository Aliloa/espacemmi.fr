<?php
include('connexion.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = $_POST['login_user'];
    $mdp = password_hash($_POST['mdp1'], PASSWORD_DEFAULT);


    $requetecherchelogin = "SELECT * FROM utilisateurs WHERE login = :login";
    $stmtuser = $db->prepare($requetecherchelogin);
    $stmtuser->bindParam(':login', $login);
    $stmtuser->execute();

    if ($stmtuser->rowCount()) {

        $requete = "UPDATE utilisateurs SET mot_de_passe = :mot_de_passe WHERE login = :login";

        $stmt = $db->prepare($requete);
        $stmt->bindValue(':mot_de_passe', $mdp);
        $stmt->bindValue(':login', $login);

        if ($stmt->execute()) {
            echo 'Mot de passe mis à jour avec succès!';
            header("Location: connexion_page.php"); 
            exit(); 
        } else {
            echo 'Erreur lors de la mise à jour du mot de passe.';
            die($stmt);
        }
    } else {
        echo 'Le login n\'existe pas';
    }
} else {
    echo 'Erreur lors de la soumission du formulaire.';
}
?>
<!-- 

<php


    $testlogin = "SELECT * FROM utilisateurs WHERE nom=:nom AND prenom = :prenom AND login = :login";
    $stmt = $db->prepare($testlogin);
    $stmt->bindValue(":nom", $nom, PDO::PARAM_STR);
    $stmt->bindValue(":prenom", $prenom, PDO::PARAM_STR);
    $stmt->bindValue(":login", $login, PDO::PARAM_STR);
    $stmt->execute();
    if ($stmt->rowCount()) {
        echo "Ce login n'est pas disponible";
        // exit();
        header('Location:Inscription_page.php?erreur=login');
    }

    $stmt->execute();
    
    if ($stmt->rowCount()) {
        header('Location:administration.php?added_successfully');
    } else {
        echo "ça n'a pas marché veuillez recommencer.";
        die($stmt);
    }  ;

    ?> -->
