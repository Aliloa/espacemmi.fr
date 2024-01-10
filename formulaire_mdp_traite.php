<?php
include('connexion.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = $_POST['login_user'];
    $mdp = $_POST['mdp1'];

    $checkLoginQuery = "SELECT * FROM utilisateurs WHERE login = :login";
    $checkStmt = $db->prepare($checkLoginQuery);
    $checkStmt->bindParam(':login', $login);
    $checkStmt->execute();

    if ($checkStmt->rowCount() > 0) {
        $mot_de_passe_hash = password_hash($mdp, PASSWORD_DEFAULT);

        $updateQuery = "UPDATE utilisateurs SET mot_de_passe = :mot_de_passe WHERE login = :login";

        $stmt = $db->prepare($updateQuery);
        $stmt->bindParam(':mot_de_passe', $mot_de_passe_hash);
        $stmt->bindParam(':login', $login);

        if ($stmt->execute()) {
            echo 'Mot de passe mis à jour avec succès!';
            header("Location: connexion_page.php"); 
            exit(); 
        } else {
            echo 'Erreur lors de la mise à jour du mot de passe.';
            print_r($stmt->errorInfo()); 
        }
    } else {
        echo 'Le login n\'existe pas';
    }
} else {
    echo 'Erreur lors de la soumission du formulaire.';
}
?>
