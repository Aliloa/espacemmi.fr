<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
include('connexion.php');
    session_start();
    if (!isset($_SESSION['login'])) {
        header('Location: index.php?access_denied');
        exit();
    }

    if (isset($_GET['id'])) {
        $idToDelete = $_GET['id'];
    
        $requeteUtilisateur = "DELETE FROM utilisateurs WHERE id_utilisateurs = :idToDelete";
        $stmtUtilisateur = $db->prepare($requeteUtilisateur);
        $stmtUtilisateur->bindValue(":idToDelete", $idToDelete, PDO::PARAM_INT);
        $stmtUtilisateur->execute();
    
        header('Location:administration.php');
        exit();
    }
    ?>
</body>
</html>